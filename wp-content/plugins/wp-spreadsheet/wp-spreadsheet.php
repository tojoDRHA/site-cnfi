<?php
/*
Plugin Name: WPSpreadSheet
Description: Plugin to import Google Spreadsheet into WordPress posts
Version: 1.0
*/

    if ( ! defined( 'ABSPATH' ) ) exit;
    
    if ( !defined( 'WP_SPREADSHEET_PLUGIN_DIR' ) ) {
    	define( 'WP_SPREADSHEET_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    }
    if ( !defined( 'WP_SPREADSHEET_REDIRECT_URL' ) ) {
    	define( 'WP_SPREADSHEET_REDIRECT_URL', admin_url().'admin.php?page=wp-spreadsheet/wp-spreadsheet.php' );
    }
    include( WP_SPREADSHEET_PLUGIN_DIR.'src/Google/Spreadsheet/bootstrap.php');
    include( WP_SPREADSHEET_PLUGIN_DIR.'src/Google_Client.php'); 
      
    use Google\Spreadsheet\DefaultServiceRequest;
    use Google\Spreadsheet\ServiceRequestFactory;
    session_start();
    include( WP_SPREADSHEET_PLUGIN_DIR . 'wp-settings-ui.php' );    
    $oGoogleClient = new Google_Client();
    $oGoogleClient->setClientId(get_option('wpspreadsheet_google_client_id'));
    $oGoogleClient->setClientSecret(get_option('wpspreadsheet_google_client_secret'));
    $oGoogleClient->setRedirectUri( WP_SPREADSHEET_REDIRECT_URL );
    $oGoogleClient->setScopes(array('https://spreadsheets.google.com/feeds'));
    $_SESSION['zGoogleConnectUrl'] = $oGoogleClient->createAuthUrl();  
    
     
    /* API connection status */
    if( isset($_SESSION['access_token']) && $_SESSION['access_token'] ){
        $oGoogleClient->setAccessToken( $_SESSION['access_token'] );
        if($oGoogleClient->isAccessTokenExpired()) {
            //die("expire");
            $oGoogleClient->refreshToken( $_SESSION['refresh_token'] ); 
            $_SESSION['access_token']   = $oGoogleClient->getAccessToken();             
            exit();
        }                            
    }
    elseif( isset($_GET['code']) ){
        $oGoogleClient->authenticate();
        $accessToken                = $oGoogleClient->getAccessToken();
        $_SESSION['access_token']   = $accessToken;
        $oDataTokens                = json_decode( $accessToken, true );
        $_SESSION['refresh_token']  = $oDataTokens['refresh_token']; 
        echo "<script>document.location.href='".WP_SPREADSHEET_REDIRECT_URL."'</script>";
        exit();        
    }
    else{
        //die("else");
        //unset($_SESSION['access_token']);
        //wpspreadsheet_show_ui_settings_page();        
    }    
    
    /* plugin admin menu */
    add_action('admin_menu', 'wpspreadsheet_create_menu');    
    function wpspreadsheet_create_menu() {
    	add_menu_page('WPSpreadsheet Plugin Settings', 'WPSpreadsheet', 'administrator', __FILE__, 'wpspreadsheet_settings_page',plugins_url('/images/wpspreadsheet.png', __FILE__));
    	add_action( 'admin_init', 'register_wpspreadsheet_settings' );
    }    
    
    /* plugin register settings */
    function register_wpspreadsheet_settings() {
        register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_google_client_id' );
        register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_google_client_secret' );
        register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_spreadsheet_sheet_title' );        
        register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_spreadsheet_sheet' );
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_allow_delete_from_spreadsheet' );        
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_allow_update_from_spreadsheet' );
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_allow_update_fields' );
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_allow_delete_from_spreadsheet' );
		// for categories and other options
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_default_post_type' );
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_debug_mode' );
		// for default status and more
		register_setting( 'wpspeadsheet-settings-group', 'wpspreadsheet_default_status' );
    }
    
    /* plugin page settings */
    function wpspreadsheet_settings_page(){
        
        $zFormSubmitAction = @$_POST['zPostFormAction'];
        /* render settings form */
        if( empty($zFormSubmitAction) AND $zFormSubmitAction=='' ){
            wpspreadsheet_show_ui_settings_page();

        }
        /* connect Google API account */
        else if ( !empty($zFormSubmitAction) AND $zFormSubmitAction == 'connect' ){ 
			echo "<script>document.location.href='".$_SESSION['zGoogleConnectUrl']."'</script>";
		}
        /* run a synch */
        else if ( !empty($zFormSubmitAction) AND $zFormSubmitAction == 'preview' ){ 
            wpsync_run_sync();
		}                
    }    
   
    function removeRel( $iIdCentre ){
        global $wpdb;
        $QryRm = "DELETE FROM `wp_posts_relations` WHERE `object_id_1` = '".$iIdCentre."'";
        $wpdb->query( $QryRm );
    }  
    
    function addRel( $iIdCentre, $iIdVille ){
        global $wpdb;
        $QryAd = "INSERT INTO `wp_posts_relations` (`id`, `object_id_1`, `object_id_2`) VALUES (NULL, '".$iIdCentre."', '".$iIdVille."');";
        $wpdb->query( $QryAd );        
    }
    
      
        
	function wpsync_run_sync(){
	   
	    global $wpdb;
        $accessToken   = '';
        $oGoogleClient = new Google_Client();
        $oGoogleClient->setClientId(get_option('wpspreadsheet_google_client_id'));
        $oGoogleClient->setClientSecret(get_option('wpspreadsheet_google_client_secret'));
        $oGoogleClient->setRedirectUri( WP_SPREADSHEET_REDIRECT_URL );
        $oGoogleClient->setScopes(array('https://spreadsheets.google.com/feeds'));
        
        if($oGoogleClient->isAccessTokenExpired()) {            
            $oGoogleClient->refreshToken( $_SESSION['refresh_token'] ); 
            $_SESSION['access_token']   = $oGoogleClient->getAccessToken(); 
            $accessToken = json_decode($_SESSION['access_token'],true);               
        }
        else{
            $accessToken = json_decode($_SESSION['access_token'],true);
        }
        $oServiceRequest = new Google\Spreadsheet\DefaultServiceRequest( $accessToken['access_token'] );
        Google\Spreadsheet\ServiceRequestFactory::setInstance( $oServiceRequest );
        $oSpreadsheetService    = new Google\Spreadsheet\SpreadsheetService();
        $oSpreadsheetFeed       = $oSpreadsheetService->getSpreadsheets();        
        $oSpreadsheet           = $oSpreadsheetFeed->getByTitle('Creches');          
        $oWorksheetFeed         = $oSpreadsheet->getWorksheets();
        
        $oWorksheet     = $oWorksheetFeed->getByTitle('Creches');

        //var_dump( $oWorksheet );exit();
      
        $toListFeed             = $oWorksheet->getListFeed();       
        $zCustomType            = 'creche';
        $zDefaultStatus         = get_option('wpspreadsheet_default_status');
        $zDefaultStatus         = ( $zDefaultStatus =='' )?'draft':$zDefaultStatus; 

        foreach ($toListFeed->getEntries() as $oListFeed) {
            $oValues        = $oListFeed->getValues();            
            
            /* AJOUT */ 
            if( $oValues['id']=='' && $oValues['suppression']!=1 ){    
                $tNewCreche   = array(
                                    'post_type'         => $zCustomType ,
                                    'post_title'        => $oValues['nom'] ,
                                    'post_name'         => sanitize_title_with_dashes($oValues['nom']) ,
                                    'post_status'       => $zDefaultStatus ,
                                    'comment_status'    => 'closed' ,   
                                    'ping_status'       => 'closed' ,
                                );                                
                $iPostId    = wp_insert_post( $tNewCreche ); 
                addRel( $iPostId, $oValues["idville"] );              
                $oValues["id"] = $iPostId;
                $oListFeed->update($oValues);                                                   
                if( $iPostId ){ 
                        
                        add_post_meta( $iPostId, 'nom_creche', $oValues['nom'], true );
                        add_post_meta( $iPostId, 'adresse', $oValues['adresse'], true );
                        add_post_meta( $iPostId, 'appartenant_à_les_petites_canailles', $oValues['petitescanailles'], true );
                        add_post_meta( $iPostId, 'ouverture', $oValues['ouverture'], true );
                        add_post_meta( $iPostId, 'nombre_de_berceaux', $oValues['berceaux'], true );
                        add_post_meta( $iPostId, 'superficie', $oValues['superficie'], true ); 
                        add_post_meta( $iPostId, 'horaire', $oValues['horaire'], true ); 
                        add_post_meta( $iPostId, 'lien_visite_virtuel', $oValues['lien'], true ); 
                        add_post_meta( $iPostId, 'latitude', $oValues['latitude'], true ); 
                        add_post_meta( $iPostId, 'longitude', $oValues['longitude'], true );
                        add_post_meta( $iPostId, 'pdf', $oValues['pdf'], true );                                                                                              
                }           
            }
            
            /* MISE A JOUR */
            elseif( $oValues['id']!='' && $oValues['suppression']!=1 ){
                
                $iPostId    = intval( $oValues['id'] );
                $zQry       = "UPDATE `wp_posts` 
                               SET 
                                `post_author` = '1', 
                                `post_title` = '". $oValues['nom'] ."', 
                                `post_excerpt` = '', 
                                `post_status` = '". $zDefaultStatus ."', 
                                `comment_status` = 'closed', 
                                `ping_status` = 'closed', 
                                `post_name` = '". sanitize_title_with_dashes($oValues['nom']) ."', 
                                `post_modified` = '". date("Y-m-d H:i:s") ."', 
                                `post_modified_gmt` = '". date("Y-m-d H:i:s") ."', 
                                `post_type` = $zCustomType
                               WHERE 
                                `wp_posts`.`ID` = '". $iPostId ."'";         
                                
                    $wpdb->query( $zQry );
                    
                    update_post_meta( $iPostId, 'nom_creche', $oValues['nom'] );
                    update_post_meta( $iPostId, 'adresse', $oValues['adresse'] );
                    update_post_meta( $iPostId, 'appartenant_à_les_petites_canailles', $oValues['petitescanailles'] );
                    update_post_meta( $iPostId, 'ouverture', $oValues['ouverture'] );
                    update_post_meta( $iPostId, 'nombre_de_berceaux', $oValues['berceaux'] );
                    update_post_meta( $iPostId, 'superficie', $oValues['superficie'] ); 
                    update_post_meta( $iPostId, 'horaire', $oValues['horaire'] ); 
                    update_post_meta( $iPostId, 'lien_visite_virtuel', $oValues['lien'] ); 
                    update_post_meta( $iPostId, 'latitude', $oValues['latitude'] ); 
                    update_post_meta( $iPostId, 'longitude', $oValues['longitude'] ); 
                    update_post_meta( $iPostId, 'pdf', $oValues['pdf'] ); 
                    removeRel( $iPostId );
                    addRel( $iPostId, $oValues['idville'] );
                                                                             
            }
            elseif( $oValues['suppression']==1 ){
                $iPostId    = intval( $oValues['id'] );
                if( wp_delete_post( $iPostId, true ) ){
                    delete_post_meta( $iPostId, 'nom_creche' );
                    delete_post_meta( $iPostId, 'adresse' );
                    delete_post_meta( $iPostId, 'appartenant_à_les_petites_canailles' );
                    delete_post_meta( $iPostId, 'ouverture' );
                    delete_post_meta( $iPostId, 'nombre_de_berceaux' );
                    delete_post_meta( $iPostId, 'superficie' );
                    delete_post_meta( $iPostId, 'horaire' );
                    delete_post_meta( $iPostId, 'lien_visite_virtuel' );
                    delete_post_meta( $iPostId, 'latitude' );
                    delete_post_meta( $iPostId, 'longitude' );
                    delete_post_meta( $iPostId, 'pdf' );
                }
            }
	   }       
        echo "<script>document.location.href='".WP_SPREADSHEET_REDIRECT_URL."&success=1'</script>";
        exit();        
    }    
