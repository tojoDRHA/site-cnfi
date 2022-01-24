<?php
/**************************************************************************************
*                             CUSTOM POST TYPE
***************************************************************************************/
    
/*  */


add_action( 'init', 'registerCptCreche' );
function registerCptCreche() {
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

/*

add_filter('images_cpt','my_image_cpt');
function my_image_cpt(){
	$cpts = array('page','slide');
	return $cpts;
}


add_action( 'init', 'registerCptVille' );
function registerCptVille() {
	$labels = array( 
		'name' => _x( 'villes', 'ville' ),
		'singular_name' => _x( 'ville', 'ville' ),
		'add_new' => _x( 'Ajouter', 'ville' ),
		'add_new_item' => _x( 'Ajouter une ville', 'ville' ),
		'edit_item' => _x( 'Editer une ville', 'ville' ),
		'new_item' => _x( 'Nouvelle ville', 'ville' ),
		'view_item' => _x( 'Voir la ville', 'ville' ),
		'search_items' => _x( 'Rechercher une ville', 'ville' ),
		'not_found' => _x( 'Aucune ville trouvée', 'ville' ),
		'not_found_in_trash' => _x( 'Aucune ville dans la corbeille', 'ville' ),
		'parent_item_colon' => _x( 'ville parent :', 'ville' ),
		'menu_name' => _x( 'Villes', 'ville' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les villes.',
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
	register_post_type( 'ville', $args );
}


add_action( 'init', 'registerCptDepartement' );
function registerCptDepartement() {
	$labels = array( 
		'name'               => _x( 'departements', 'departement' ),
		'singular_name'      => _x( 'departement', 'departement' ),
		'add_new'            => _x( 'Ajouter', 'departement' ),
		'add_new_item'       => _x( 'Ajouter un departement', 'departement' ),
		'edit_item'          => _x( 'Editer un departement', 'departement' ),
		'new_item'           => _x( 'Nouveau departement', 'departement' ),
		'view_item'          => _x( 'Voir le departement', 'departement' ),
		'search_items'       => _x( 'Rechercher un departement', 'departement' ),
		'not_found'          => _x( 'Aucun departement trouvée', 'departement' ),
		'not_found_in_trash' => _x( 'Aucun departement dans la corbeille', 'departement' ),
		'parent_item_colon'  => _x( 'Departement parent :', 'departement' ),
		'menu_name'          => _x( 'Departements', 'departement' ),
	);

	$args = array( 
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'Les departements.',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
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
		'rewrite'             => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'departement', $args );
}
*/

/*add_action( 'init', 'registerCptEntreprise' );
function registerCptEntreprise() {
	$labels = array( 
		'name' => _x( 'entreprises', 'entreprise' ),
		'singular_name' => _x( 'entreprise', 'entreprise' ),
		'add_new' => _x( 'Ajouter', 'entreprise' ),
		'add_new_item' => _x( 'Ajouter une entreprise', 'entreprise' ),
		'edit_item' => _x( 'Editer une entreprise', 'entreprise' ),
		'new_item' => _x( 'Nouvelle entreprise', 'entreprise' ),
		'view_item' => _x( 'Voir la entreprise', 'entreprise' ),
		'search_items' => _x( 'Rechercher une entreprise', 'entreprise' ),
		'not_found' => _x( 'Aucune entreprise trouvée', 'entreprise' ),
		'not_found_in_trash' => _x( 'Aucune entreprise dans la corbeille', 'entreprise' ),
		'parent_item_colon' => _x( 'entreprise parent :', 'entreprise' ),
		'menu_name' => _x( 'Entreprises', 'entreprise' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les entreprises.',
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
	register_post_type( 'entreprise', $args );
}

add_action( 'init', 'registerCptMairie' );
function registerCptMairie() {
	$labels = array( 
		'name' => _x( 'mairies', 'mairie' ),
		'singular_name' => _x( 'mairie', 'mairie' ),
		'add_new' => _x( 'Ajouter', 'mairie' ),
		'add_new_item' => _x( 'Ajouter une mairie', 'mairie' ),
		'edit_item' => _x( 'Editer une mairie', 'mairie' ),
		'new_item' => _x( 'Nouvelle mairie', 'mairie' ),
		'view_item' => _x( 'Voir la mairie', 'mairie' ),
		'search_items' => _x( 'Rechercher une mairie', 'mairie' ),
		'not_found' => _x( 'Aucune mairie trouvée', 'mairie' ),
		'not_found_in_trash' => _x( 'Aucune mairie dans la corbeille', 'mairie' ),
		'parent_item_colon' => _x( 'mairie parent :', 'mairie' ),
		'menu_name' => _x( 'Mairies', 'mairie' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les mairies.',
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
	register_post_type( 'mairie', $args );
}*/


/*
add_action( 'init', 'registerCptFormation' );
function registerCptFormation() {
	$labels = array( 
		'name' => _x( 'Politiques RH', 'formation' ),
		'singular_name' => _x( 'Politique RH', 'formation' ),
		'add_new' => _x( 'Ajouter', 'formation' ),
		'add_new_item' => _x( 'Ajouter une politique RH', 'formation' ),
		'edit_item' => _x( 'Editer une politique RH', 'formation' ),
		'new_item' => _x( 'Nouvelle politique RH', 'formation' ),
		'view_item' => _x( 'Voir la politique RH', 'formation' ),
		'search_items' => _x( 'Rechercher une politique RH', 'formation' ),
		'not_found' => _x( 'Aucune politique RH trouvée', 'formation' ),
		'not_found_in_trash' => _x( 'Aucune politique RH dans la corbeille', 'formation' ),
		'parent_item_colon' => _x( 'politique RH parent :', 'formation' ),
		'menu_name' => _x( 'Politique RH', 'formation' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les politiques RH.',
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions','page-attributes'),
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
	register_post_type( 'formation', $args );
}
*/