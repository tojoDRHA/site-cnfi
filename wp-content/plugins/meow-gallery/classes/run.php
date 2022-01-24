<?php

class Meow_MGL_Run {

	public function __construct( $core ) {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_shortcode( 'gallery', array( $core, 'gallery' ) );
		add_shortcode( 'meow-gallery', array( $core, 'gallery' ) );
		// Yoast: Some people really want this, but it needs to be reviewed as Yoast changed its API
		//add_filter( 'wpseo_sitemap_urlimages', array( $this, 'wpseo_siteimap' ), 10, 2 );
	}

	function enqueue_scripts() {
		$physical_file = MGL_PATH . '/app/galleries.js';
		$cache_buster = file_exists( $physical_file ) ? filemtime( $physical_file ) : MGL_VERSION;
		wp_enqueue_script( 'mgl-js', MGL_URL . '/app/galleries.js', array( 'jquery' ), $cache_buster, false );

		// TODO: This should be moved in a getter (since it is also used by tiles.php)
		$density = [];
		if ( isset( $this->atts['density'] ) ) {
			$density['desktop'] = $this->atts['density'];
			$density['tablet'] = $this->atts['density'];
			$density['mobile'] = $this->atts['density'];
		}
		else {
			$density['desktop'] = get_option( 'mgl_tiles_density', 'high' );
			$density['tablet'] = get_option( 'mgl_tiles_density_tablet', 'medium' );
			$density['mobile'] = get_option( 'mgl_tiles_density_mobile', 'low' );
		}

		wp_localize_script('mgl-js', 'mgl_settings',
			array(
				'disable_right_click' => !get_option( 'mgl_right_click', false ),
				'tiles' => array( 'density' => $density )
			)
		);
		wp_enqueue_style( 'mgl-css', MGL_URL . '/app/style.min.css', null, $cache_buster );
	}

	/*
		For Yoast SEO
	*/

	function wpseo_siteimap( $images, $post_id ) {
		$galleries = get_post_galleries( $post_id );
		$images_ids = array();
		foreach ( $galleries as $gallery ) {
			preg_match_all( '/wp\-image\-([0-9]{1,16})/', $gallery, $matches );
			if ( !empty( $matches ) ) {
				foreach ( $matches[1] as $id )
					array_push( $images_ids, $id );
			}
		}
		$images_ids = array_unique( $images_ids );
		foreach ( $images_ids as $id ) {
			array_push( $images, array(
				'src' => wp_get_attachment_url( $id ),
				'title' => get_the_title( $id ),
				'alt' => get_post_meta( $id, '_wp_attachment_image_alt', true )
			) );
		}
		return $images;
	}

}

?>
