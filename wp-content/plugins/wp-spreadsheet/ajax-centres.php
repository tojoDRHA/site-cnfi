<?php 
include("../../../wp-load.php");
    
$iParPage       = 5;
$tRes           = array(); 
$iPage          = $_POST['iPage'];    
$iOffset        = ($iPage-1) * $iParPage;
$args           =   array( 
                        'post_type'      => 'centre' ,
                        'orderby'        => 'date' , 
                        'order'          => 'DESC' ,
                        'posts_per_page' => $iParPage ,
                        'offset'         => $iOffset                              
                    );
                    
                        
                                                  
$oQryCentre     = new WP_Query( $args );
$toCentre       = $oQryCentre->posts;
$zIds           = array();
if( !empty($toCentre) ){
    foreach( $toCentre as $oCentre ){            
        /*
        $zAddress       = get_field('centre_coordonnees', $oCentre->ID);   
        if( $zAddress==false || trim($zAddress)=='' ){
        */
            $zAddress = get_field('adresse', $oCentre->ID);
        /*}*/       
        $oJsonGeocode   = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($zAddress['address']).'&sensor=false');
        $oOutput        = json_decode($oJsonGeocode);                                    
        $iLat           = $oOutput->results[0]->geometry->location->lat;
        $iLong          = $oOutput->results[0]->geometry->location->lng;
        $zValues        = array(
                                'address' => $zAddress['address'],
                                'lat'     => $iLat,
                                'lng'     => $iLong,
                                'zoom'    => 12
                            );
                            
        array_push($zIds, $iLat."-".$iLong);                                                                                                                                               
        update_post_meta($oCentre->ID, 'centre_coordonnees',  json_encode($zValues) ); 
        update_post_meta($oCentre->ID, '_centre_coordonnees', 'field_5559d1fd0a4d1');    
    }
    $tRes['succes']  = 1;
    $tRes['ids']     = implode(',',$zIds);   
    $tRes['next']    = intval($iPage) + 1;
} 
else{
    $tRes['succes'] = 0;
    $tRes['next']   = 0;        
}
echo json_encode( $tRes );
//die();    
