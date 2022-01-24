<?php
/**************************************************************************************
*                             CUSTOM POST TYPE
***************************************************************************************/
    
/*  */


add_action( 'init', 'registerCptSlide' );
function registerCptSlide() {
	$labels = array( 
		'name' => _x( 'slides', 'slide' ),
		'singular_name' => _x( 'slide', 'slide' ),
		'add_new' => _x( 'Ajouter', 'slide' ),
		'add_new_item' => _x( 'Ajouter une slide', 'slide' ),
		'edit_item' => _x( 'Editer une slide', 'slide' ),
		'new_item' => _x( 'Nouveau slide', 'slide' ),
		'view_item' => _x( 'Voir le slide', 'slide' ),
		'search_items' => _x( 'Rechercher une slide', 'slide' ),
		'not_found' => _x( 'Aucune slide trouvée', 'slide' ),
		'not_found_in_trash' => _x( 'Aucune slide dans la corbeille', 'slide' ),
		'parent_item_colon' => _x( 'slide parent :', 'slide' ),
		'menu_name' => _x( 'Slides', 'slide' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les slides',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'slide', $args );
}

add_action( 'init', 'registerCptAccueil' );
function registerCptAccueil() {
	$labels = array( 
		'name' => _x( 'Accueil', 'Accueil' ),
		'singular_name' => _x( 'Accueil', 'Accueil' ),
		'add_new' => _x( 'Ajouter', 'Accueil' ),
		'add_new_item' => _x( 'Ajouter un Accueil', 'Accueil' ),
		'edit_item' => _x( 'Editer un Accueil', 'Accueil' ),
		'new_item' => _x( 'Nouveau mot', 'Accueil' ),
		'view_item' => _x( 'Voir le mot dans l\'accueil', 'Accueil' ),
		'search_items' => _x( 'Rechercher un Accueil', 'Accueil' ),
		'not_found' => _x( 'Aucun Accueil trouvé', 'Accueil' ),
		'not_found_in_trash' => _x( 'Aucun Accueil dans la corbeille', 'Accueil' ),
		'parent_item_colon' => _x( 'Accueil parent :', 'Accueil' ),
		'menu_name' => _x( 'Accueil', 'Accueil' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les Accueil',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'Accueil', $args );
}

add_action( 'init', 'registerCptCv' );
function registerCptCv() {
	$labels = array( 
		'name' => _x( 'cvs', 'cv' ),
		'singular_name' => _x( 'cv', 'cv' ),
		'add_new' => _x( 'Ajouter', 'cv' ),
		'add_new_item' => _x( 'Ajouter un curriculum vitae', 'cv' ),
		'edit_item' => _x( 'Editer un curriculum vitae', 'cv' ),
		'new_item' => _x( 'Nouveau curriculum vitae', 'cv' ),
		'view_item' => _x( 'Voir le cv', 'cv' ),
		'search_items' => _x( 'Rechercher un cv', 'cv' ),
		'not_found' => _x( 'Aucune cv trouvé', 'cv' ),
		'not_found_in_trash' => _x( 'Aucun cv dans le corbeille', 'cv' ),
		'parent_item_colon' => _x( 'Curriculum vitae parent :', 'cv' ),
		'menu_name' => _x( 'Curriculum vitae', 'cv' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les cvs',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'cv', $args );
}


add_action( 'init', 'registerCptDocumentation' );
function registerCptDocumentation() {
	$labels = array( 
		'name' => _x( 'documentations', 'documentation' ),
		'singular_name' => _x( 'documentation', 'documentation' ),
		'add_new' => _x( 'Ajouter', 'documentation' ),
		'add_new_item' => _x( 'Ajouter une documentation', 'documentation' ),
		'edit_item' => _x( 'Editer une documentation', 'documentation' ),
		'new_item' => _x( 'Nouvelle documentation', 'documentation' ),
		'view_item' => _x( 'Voir le documentation', 'documentation' ),
		'search_items' => _x( 'Rechercher un documentation', 'documentation' ),
		'not_found' => _x( 'Aucune documentation trouvé', 'documentation' ),
		'not_found_in_trash' => _x( 'Aucun documentation dans le corbeille', 'documentation' ),
		'parent_item_colon' => _x( 'Documentation parent :', 'documentation' ),
		'menu_name' => _x( 'Thèmes', 'documentation' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les documentations',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'documentation', $args );
}

add_action( 'init', 'registerCptFichier' );
function registerCptFichier() {
	$labels = array( 
		'name' => _x( 'fichiers', 'fichier' ),
		'singular_name' => _x( 'fichier', 'fichier' ),
		'add_new' => _x( 'Ajouter', 'fichier' ),
		'add_new_item' => _x( 'Ajouter un fichier', 'fichier' ),
		'edit_item' => _x( 'Editer un fichier', 'fichier' ),
		'new_item' => _x( 'Nouvelle fichier', 'fichier' ),
		'view_item' => _x( 'Voir le fichier', 'fichier' ),
		'search_items' => _x( 'Rechercher un fichier', 'fichier' ),
		'not_found' => _x( 'Aucune fichier trouvé', 'fichier' ),
		'not_found_in_trash' => _x( 'Aucun fichier dans le corbeille', 'fichier' ),
		'parent_item_colon' => _x( 'Fichier parent :', 'fichier' ),
		'menu_name' => _x( 'Les Fichiers', 'fichier' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les fichiers',
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'fichier', $args );
}

add_action( 'init', 'registerPostTypeChiffreCle' ); 
function registerPostTypeChiffreCle() {
	$aLabels = array( 
		'name'                => _x( 'Chiffres clés', 'chiffre-cle' ),
		'singular_name'       => _x( 'Chiffre clé', 'chiffre-cle' ),
		'add_new'             => _x( 'Ajouter', 'chiffre-cle' ),
		'add_new_item'        => _x( 'Ajouter un Chiffre clé', 'chiffre-cle' ),
		'edit_item'           => _x( 'Editer un Chiffre clé', 'chiffre-cle' ),
		'new_item'            => _x( 'Nouveau chiffre clé', 'chiffre-cle' ),
		'view_item'           => _x( 'Voir le chiffre clé', 'chiffre-cle' ),
		'search_items'        => _x( 'Rechercher un chiffre clé', 'chiffre-cle' ),
		'not_found'           => _x( 'Aucun chiffre clé trouvée', 'chiffre-cle' ),
		'not_found_in_trash'  => _x( 'Aucun chiffre clé dans la corbeille', 'chiffre-cle' ),
		'parent_item_colon'   => _x( 'Réalisation parente :', 'chiffre-cle' ),
		'menu_name'           => _x( 'Chiffres clés', 'chiffre-cle' )
	);

	$aArgs = array( 
		'labels'              => $aLabels,
		'hierarchical'        => true,
		'description'         => __( 'Chiffre clé statistique page accueil.', 'chiffre-cle' ),
		'supports'            => array( 'title', 'thumbnail', 'custom-fields'),
		'sort'				  => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'			  => array( 'slug' => 'book' ),
        'show_admin_column'   => true,
		'capability_type'     => 'page'
	);
	register_post_type( 'chiffre-cle', $aArgs );
    
    /* taxonomie chiffre clé */
	register_taxonomy(
		'cat_chiffre-cle',
		'chiffre-cle',
		array(     
				'label'         => 'Catégories',
                'i_order_terms' => true,
				'show_admin_column' => true,
				'labels'        => array(
        									'name'             => _x( 'Catégories', 'categorie' ),
        									'singular_name'    => _x( 'Catégorie', 'categorie' ),
        									'all_items'        => _x( 'Toutes les Catégories', 'categorie' ),
        									'edit_item'        => _x( 'Éditer la Catégorie', 'categorie' ),
        									'view_item'        => _x( 'Voir la Catégorie', 'categorie' ),
        									'update_item'      => _x( 'Mettre à jour la Catégorie', 'categorie' ),
        									'add_new_item'     => _x( 'Ajouter une Catégorie', 'categorie' ),
        									'new_item_name'    => _x( 'Nouvelle Catégorie', 'categorie' ),
        									'search_items'     => _x( 'Rechercher parmi les Catégorie', 'categorie' ),
                                            'popular_items'    => _x( 'Catégorie les plus utilisées', 'categorie' )
                                        ),   
                'hierarchical'  => true   
		  ) 
	);     

}

add_action( 'init', 'registerCptBanque' );
function registerCptBanque() {
	$labels = array( 
		'name' => _x( 'Banques', 'Banque' ),
		'singular_name' => _x( 'Banque', 'Banque' ),
		'add_new' => _x( 'Ajouter', 'Banque' ),
		'add_new_item' => _x( 'Ajouter une Banque', 'Banque' ),
		'edit_item' => _x( 'Editer une Banque', 'Banque' ),
		'new_item' => _x( 'Nouveau Banque', 'Banque' ),
		'view_item' => _x( 'Voir le Banque', 'Banque' ),
		'search_items' => _x( 'Rechercher une Banque', 'Banque' ),
		'not_found' => _x( 'Aucune Banque trouvée', 'Banque' ),
		'not_found_in_trash' => _x( 'Aucune Banque dans la corbeille', 'Banque' ),
		'parent_item_colon' => _x( 'Banque parent :', 'Banque' ),
		'menu_name' => _x( 'Banques', 'Banque' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les Banques',
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'Banque', $args );
}

add_filter( 'manage_banque_posts_columns', 'set_custom_edit_banque_columns' );

function set_custom_edit_banque_columns( $columns ) {

  $columns['logo'] = __( 'Logo', 'banque' );
  $columns['frais_de_tenue_de_compte_en_ariary_hors_pack'] = __( 'Frais de tenue de compte en Ariary (Hors pack)', 'banque' );
  $columns['taux_dinteret'] = __( 'Taux d\'intérêt', 'banque' );


  return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_banque_posts_custom_column' , 'custom_banque_column', 10, 2 );
function custom_banque_column( $column, $post_id ) {
    switch ( $column ) {
        case 'logo' :
            $image_id =  get_post_meta( $post_id , 'logo' , true ); 
			echo '<img src="'.wp_get_attachment_image_url($image_id,'full').'" />';
            break;

		case 'frais_de_tenue_de_compte_en_ariary_hors_pack' :
            echo  get_post_meta( $post_id , 'frais_de_tenue_de_compte_en_ariary_hors_pack_libelle' , true ); 
            break;
	

		case 'taux_dinteret' :
            echo get_post_meta( $post_id , 'taux_dinteret' , true ); 
            break;

    }
}


/*add_action( 'init', 'registerCptAlaUne' );
function registerCptAlaUne() {
	$labels = array( 
		'name' => _x( 'Actualité à la une', 'AlaUne' ),
		'singular_name' => _x( 'AlaUne', 'AlaUne' ),
		'add_new' => _x( 'Ajouter', 'AlaUne' ),
		'add_new_item' => _x( 'Ajouter une actualité à la Une', 'AlaUne' ),
		'edit_item' => _x( 'Editer une actualité à la Une', 'AlaUne' ),
		'new_item' => _x( 'Nouvelle actualité à la Une', 'AlaUne' ),
		'view_item' => _x( 'Voir une actualité à la Une', 'AlaUne' ),
		'search_items' => _x( 'Rechercher une actualité à la Une', 'AlaUne' ),
		'not_found' => _x( 'Aucune une actualité à la Une trouvée', 'AlaUne' ),
		'not_found_in_trash' => _x( 'Aucune une actualité à la Une dans la corbeille', 'AlaUne' ),
		'parent_item_colon' => _x( 'une actualité à la Une parent :', 'AlaUne' ),
		'menu_name' => _x( 'Actualités à la une', 'AlaUne' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les actualités à la Une',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'AlaUne', $args );
}*/
