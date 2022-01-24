<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) arehttp://les-petites-canailles.dev/jobs/
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
require_once ( get_template_directory() . '/inc/GlobalsInc.php' );
require_once ( get_template_directory() . '/inc/CustomOptions.php' );
require_once ( get_template_directory() . '/inc/CustomPostType.php' );
require_once ( get_template_directory() . '/inc/CustomShortcodes.php' );

define( 'ID_ARTICLLE_CV', 109 );
define( 'ID_ARTICLLE_DOCUMENTATION', 113 );

 show_admin_bar(false);

if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	//add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
	) );

	function register_my_menu() {
		register_nav_menu('Menu Secondaire',__( 'Menu Secondaire' ));
		register_nav_menu('Menu primaire',__( 'Menu Header' ));
	}
	add_action( 'init', 'register_my_menu' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

function themeScripts() {
	
    // Load specific stylesheet.
	wp_enqueue_style( 'cnfi-fonts-css', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext' );
	wp_enqueue_style( 'et-gf-poiret-one-css', 'https://fonts.googleapis.com/css?family=Poiret+One:400&amp;subset=latin,latin-ext,cyrillic' );
	wp_enqueue_style( 'et-gf-lato-css', 'https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext' );
	wp_enqueue_style( 'cnfi-style-css', get_template_directory_uri() . '/css/style.css?ver=3.0.51' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min03ec.css' );
   

	// Load script
    if ( !is_admin() ) {
        wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), date("Ymd") );
        wp_enqueue_script( 'scroll-script', get_template_directory_uri() . '/js/jquery-scrollTo.min.js', array(), date("Ymd") );
        wp_enqueue_script( 'select-script', get_template_directory_uri() . '/js/bootstrap-select.js', array(), date("Ymd") );
        wp_enqueue_script( 'bootstrapvalidate-script', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js', array(), date("Ymd") );
        wp_enqueue_script( 'bootstrapvalidatetip-script', get_template_directory_uri() . '/js/jquery-validate.bootstrap-tooltip.min.js', array(), date("Ymd") );
		wp_enqueue_script( 'datepicker-script', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array(), date("Ymd") );	wp_enqueue_script( 'fhp-script', get_template_directory_uri() . '/js/script.js', array(), date("Ymd") );
        wp_enqueue_script( 'dev-script', get_template_directory_uri() . '/js/script-dev.js', array(), date("Ymd") );
		wp_enqueue_script( 'lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array(), date("Ymd") );
		wp_enqueue_script( 'share-script', get_template_directory_uri() . '/js/share.js', array(), date("Ymd") );
	}
}
add_action( 'wp_enqueue_scripts', 'themeScripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	//$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

function sc_slide_func( $atts, $content) {
    extract( shortcode_atts( array(
        'bg_image' => 'bg_image',
        'header' => 'header'
    ), $atts ) );

    $end_content = ' <div class="slide">';
    $end_content .= wp_get_attachment_image( 1 );
    $end_content .= '<h2 class="text-center">'.$header.'</h2>';
    $end_content .= '</div>';
    return $end_content;
}

add_shortcode( 'sc_slide', 'sc_slide_func');

/**************************************************************************************
*           Custom menu walker
***************************************************************************************/
class CustomWalkerNavMenu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "";
    }


	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		/* activation menu quand article fiche */
		if($item->attr_title == 'act')
		{
			if(basename(get_single_template()) == "single.php" && is_single() == 1)
			{
				if(!isPostJobAffinity(get_the_ID()))
				{
					$class_names .= " active";
				}
			}
		}


		/* activation menu quand recrutement fiche */
		if($item->attr_title == 'rec')
		{

			if(basename(get_single_template()) == "single.php" && is_single() == 1)
			{
				if(isPostJobAffinity(get_the_ID()))
				{
					$class_names .= " active";
				}
			}

			if(basename(get_single_template()) == "single-job_listing.php" && is_single() == 1)
			{
				$class_names .= " active";
			}
		}


		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= ""; //$indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/* traitement menu */
		$zTitreMenu = $item->title ;
		$oTitreMenu = split(" ", $zTitreMenu);
		$zTitreMenu = str_replace($oTitreMenu[0],$oTitreMenu[0] . " <br/> ", $zTitreMenu);
		

		$item_output .= ' <li class="menu-'.$atts['title'].'">';
		$item_output .=	'<a '.$class_names.' href="'.$atts['href'].'" title="">';
		$item_output .=	'<span></span>';
		$item_output .= '<span>';
		$item_output .= $zTitreMenu;
		$item_output .= '</span></a></li>';



		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

    function end_el(&$output, $item, $depth) {
        $output .= "";
    }
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){

	 if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


/**************************************************************************************
*           Custom menu walker
***************************************************************************************/
class CustomWalkerNavMenuFooter extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "";
    }


	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= ""; //$indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/* traitement menu */
		$zTitreMenu = $item->title ;
		$oTitreMenu = split(" ", $zTitreMenu);
		$zTitreMenu = str_replace($oTitreMenu[0],$oTitreMenu[0] . " <br/> ", $zTitreMenu);
		$zTitreMenu = str_replace("?", "&nbsp;?", $zTitreMenu);


		$item_output .= '<li>';
		$item_output .=	'<a href="'.$atts['href'].'" title="'.$item->title.'">';
		$item_output .= $item->title;
		$item_output .= '</a></li>';



		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

    function end_el(&$output, $item, $depth) {
        $output .= "";
    }
}


/**************************************************************************************
*           Pagination
***************************************************************************************/

if ( ! function_exists( 'wp_pagination_rh' ) ):
	function wp_pagination_rh($iPages = '', $iRange = 2) {
		global $paged;
        $iShowItems = ($iRange * 2)+1;
		if(empty($paged)) $paged = 1;

		if($iPages == '') {
			global $wp_query;
			$iPages = $wp_query->max_num_pages;
			if(!$iPages) {
				$iPages = 1;
			}
		}

		if(1 != $iPages) {
			echo '<ul class="pagination">';
			if($paged > 1 && $iShowItems < $iPages) echo "<li class='prev' style='visibility:visible'><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
			for ($i=1; $i <= $iPages; $i++) {
				if (1 != $iPages &&( !($i >= $paged+$iRange+1 || $i <= $paged-$iRange-1) || $iPages <= $iShowItems )) {
					echo ($paged == $i)? "<li><a class='active'>".$i."</a>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}
    		if ($paged < $iPages && $iShowItems < $iPages) echo "<li class='next'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
    		echo '</ul>';
		}

	}
endif;


if ( ! function_exists( 'wp_pagination_actu' ) ):
	function wp_pagination_actu($iPages = '', $iRange = 2) {
		global $paged;
        $iShowItems = ($iRange * 2)+1;
		if(empty($paged)) $paged = 1;

		if($iPages == '') {
			global $wp_query;
			$iPages = $wp_query->max_num_pages;
			if(!$iPages) {
				$iPages = 1;
			}
		}

		if(1 != $iPages) {
			echo '<article><ul class="pagination">';
			if($paged > 1 && $iShowItems < $iPages) echo "<li class='prev' style='visibility:visible'><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
			for ($i=1; $i <= $iPages; $i++) {
				if (1 != $iPages &&( !($i >= $paged+$iRange+1 || $i <= $paged-$iRange-1) || $iPages <= $iShowItems )) {
					echo ($paged == $i)? "<li><a class='active'>".$i."</a>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}
    		if ($paged < $iPages && $iShowItems < $iPages) echo "<li class='next'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
    		echo '</ul></article>';
		}

	}
endif;


function ir_social_share($args)
{

    $facebook	= $args["facebook"];
    $twitter	= $args["twitter"];
    $google		= $args["google"];
	$urltoshare	= $args["urltoshare"];
	$sharetitle	= $args["sharetitle"];
	$pintmedia	= $args['media'];

	$output ='<p class="res-sociaux social-share-inactive">';
    if($facebook == 'yes')
	{
		$output .= '<a href="#" class="count_fb countFb share-facebook" rel="'.$urltoshare.'" title="'.$sharetitle.'"></a>';
	}
    if($twitter == 'yes')
	{
		$output .= '<a href="#" class="count_twitter countTweet share-twitter" rel="'.$urltoshare.'" title="'.$sharetitle.'"></a>';

	}
    if($google == 'yes')
	{
		$output .= '<a href="#" class="count_google countGoogle share-google" rel="'.$urltoshare.'" title="'.$sharetitle.'"></a>';
	}
    $output .='</p>';


    return $output;
}
add_shortcode('social_share', 'ir_social_share');


/**************************************************************************************
*                             DEFINES
***************************************************************************************/
define( 'ID_PAGE_QSN', 7 );
define( 'ID_PAGE_CCM', 10 );
define( 'ID_PAGE_RESERVEZ', 12 );
define( 'ID_PAGE_VISITEZ', 14 );
define( 'ID_PAGE_ACTUALITE', 16 );
define( 'ID_PAGE_RECRUTEMENT', 18 );
define( 'ID_PAGE_CONTACT', 20 );
define( 'ID_PAGE_POLITIQUE_RH', 207 );
define( 'ID_PAGE_CANDIDATURE_SPONTANEE', 67 );


define( 'NB_RECRUTEMENT_PAR_PAGE', 6 );
define( 'NB_ARTICLE_BLOG_PAR_PAGE', 3 );
define( 'NB_SERVICE_PAR_PAGE', 6 );
define( 'NB_CLIENT_PAR_PAGE', 999 );
define( 'NB_REALISATION_PAR_PAGE', 6 );

define( 'DEFAULT_RAYON', 1 );
define( 'NB_ARTICLE_ACTUALITE_PAR_PAGE', 3 );

/* Override image_resize_dimensions */
add_filter( 'image_resize_dimensions', 'customImageResizeDimensions', 10, 6 );
function customImageResizeDimensions( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
{
	if( false ){return $payload;}
	if ( $crop ) {
		$aspect_ratio	= $orig_w / $orig_h;
		$new_w			= min($dest_w, $orig_w);
		$new_h			= min($dest_h, $orig_h);
		if ( !$new_w )
		{
			$new_w = intval($new_h * $aspect_ratio);
		}
		if ( !$new_h )
		{
			$new_h = intval($new_w / $aspect_ratio);
		}
		$size_ratio	= max($new_w / $orig_w, $new_h / $orig_h);
		$crop_w		= round($new_w / $size_ratio);
		$crop_h		= round($new_h / $size_ratio);
		$s_x		= floor( ($orig_w - $crop_w) / 2 );
		$s_y		= floor( ($orig_h - $crop_h) / 2 );
	}
	else{
		$crop_w	= $orig_w;
		$crop_h = $orig_h;
		$s_x	= 0;
		$s_y	= 0;
		list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
	}
	if ( ($new_w >0 && $new_h >0) && ($new_w >= $orig_w || $new_h >= $orig_h) ){
		$new_w		= $dest_w;
		$new_h		= $dest_h;
		$size_ratio	= max($new_w / $orig_w, $new_h / $orig_h);
		$crop_w		= round($new_w / $size_ratio);
		$crop_h		= round($new_h / $size_ratio);
		$s_x		= floor( ($orig_w - $crop_w) / 2 );
		$s_y		= floor( ($orig_h - $crop_h) / 2 );
	}
	return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}

/* No internal ping */
add_action( 'pre_ping' , 'noPingInterne' );
function noPingInterne( $tzlinks )
{
	$zHome = get_option( 'home' );
	foreach ( $tzlinks as $l => $zLink )
	if ( 0 === strpos( $zLink, $zHome ) )
	unset($tzlinks[$l]);
}

/* Disable helps */
/*add_action('admin_head', 'hideContextualHelp');
function hideContextualHelp() {
    if( current_user_can('administrator') ){
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
    }
}*/

function truncate($zText, $iMax=35, $zEtc = ' ...'){
	if (strlen($zText)>$iMax) {
			$zText = substr($zText,0,$iMax);
			$zSpace = strrpos($zText, " ");
			$zText = substr($zText, 0, $zSpace);
			$zText = $zText.$zEtc;
		}
	$zText = htmlentities($zText, ENT_NOQUOTES, "UTF-8");
	$zText = htmlspecialchars_decode($zText);
	return $zText;
}


function titreEnTetePage ($_zTemplateName)
{
	$zOutPut = "";
	switch ($_zTemplateName)
	{

		case 'page.php':

			if(basename(get_single_template()) != "" && is_single() == 1)
			{
				switch(basename(get_single_template()))
				{
					case 'single.php':
						$iPostId = get_the_ID();
						if(isPostJobAffinity($iPostId))
						{
							$zOutPut = '<h1>
										<span>Rejoignez-nous</span>
										<span>une autre vision de la petite enfance</span>
									</h1>';
						}
						else
						{
							$zOutPut = '<h1>
					                    <span>Le BLOG des petites canailles</span>
					                    <span>Découvrez nos actualités</span>
					                </h1>';
						}
						echo $zOutPut ;
						break;

					case 'single-job_listing.php':
						$zOutPut = '<h1>
										<span>Rejoignez-nous</span>
										<span>une autre vision de la petite enfance</span>
									</h1>';
						echo $zOutPut ;
						break;

					default:
						echo $zOutPut ;
						break;
				}
			}
			else
			{
				$zPermalinkReservez = get_permalink( ID_PAGE_RESERVEZ ) ;
				$zOutPut = '<h1>
							<span>Trouver une place en crèche,</span>
							<span>un jeu d\'enfant.</span>
						</h1>
						<p class="btn"><a href="'.$zPermalinkReservez.'" title="Je réserve une place" class="btn-rose">Je réserve une place</a></p>';

				echo $zOutPut ;
			}

			break;

		case 'template-qui-sommes-nous.php':
			$zOutPut = '<h1>
							<span>NOTRE VISION</span>
						</h1>
						<hr class="sep"/>
						<p class="intro">
						 Aider les parents à mieux concilier vie familiale et vie professionnelle.
						</p>';

			echo $zOutPut ;
			break;

		case 'template-creches-dediee.php':
			$zOutPut = '<h1>
		                    <span>découvrez</span>
		                    <span>toutes nos crèches</span>
		                </h1>
		                <hr class="sep"/>
		                <p class="intro">
		                    &nbsp;
		                </p>';
	        echo $zOutPut ;
			break;

		case 'template-contact.php':
			$zOutPut = '<h1>
							<span>contacter</span>
							<span>les Petites Canailles</span>
						</h1>
						';

			echo $zOutPut ;
			break;

		case 'template-politique-rh.php':
			$zOutPut = '<h1>
							<span>Notre politique RH</span>
							<span>bien-être et accompagnement</span>
						</h1>
						<hr class="sep"/>
						<p class="intro">
							Nous plaçons le bien-être des équipes<br>
							au coeur de nos priorités
						</p>';

			echo $zOutPut ;
			break;

		case 'template-comment-ca-marche.php':
			$zOutPut = '<h1>
							<span>Comment ça marche ?</span>
						</h1>
						<hr class="sep">';

			echo $zOutPut ;
			break;


		case 'template-reservez.php':
			$zOutPut = '<h1>
							<span>Vous souhaitez</span>
							<span>réserver une place en crèche ?</span>
						</h1>
						<p class="btn"><a href="'.get_permalink(ID_PAGE_CCM).'" title="Comment ça marche" class="btn-rose">Comment ça marche</a></p>';
			echo $zOutPut ;
			break;

		case 'template-candidat-spontanee.php':
			$zOutPut = '<h1>
		                    <span>Vous souhaitez </span>
		                    <span>postuler dans une de nos crèches ?</span>
		                </h1>
		                <hr class="sep"/>';
	        echo $zOutPut ;
			break;

		case 'template-recrutement.php':
			$zOutPut = '<h1>
		                    <span>Rejoignez-Nous !</span>
		                    <span>une autre vision de la petite enfance</span>
		                </h1>
		                <hr class="sep"/>
		                <p class="intro">
		                    Postuler dans l’une de nos crèches,<br>
		                    c’est la chance de rejoindre des équipes de professionnels<br>
		                    passionnés par la petite enfance
		                </p>';
	        echo $zOutPut ;
			break;

		case 'template-blog.php':
			$zOutPut = '<h1>
		                    <span>Le BLOG des petites canailles</span>
		                    <span>Découvrez nos actualités</span>
		                </h1>';
			echo $zOutPut ;
			break;

		case 'template-confirmation-reservation.php':
			$zOutPut = '<h1>
							<span>Vous souhaitez</span>
							<span>réserver une place en crèche ?</span>
						</h1>
						<p class="btn"><a href="'.get_permalink(ID_PAGE_CCM).'" title="Comment ça marche" class="btn-rose">Comment ça marche</a></p>';
			echo $zOutPut ;
			break;
		case 'template-fichePage.php':
			$zOutPut = '<h1>
							<span>présentation de la crèche</span>
							<span>les Petites Canailles Colombes</span>
						</h1>
						<hr class="hr">';
			echo $zOutPut ;
			break;
	}

	echo "" ;
}

function classPage ($_zTemplateName)
{
	$zOutPut = "";
	switch ($_zTemplateName)
	{
		case 'page.php':

			if(basename(get_single_template()) != "" && is_single() == 1)
			{
				switch(basename(get_single_template()))
				{
					case 'single.php':
						$iPostId = get_the_ID();
						if(isPostJobAffinity($iPostId))
						{
							echo 'class="emploi"' ;
						}
						else
						{

							echo "class='actus fiche'" ;
						}
						break;

					case 'single-job_listing.php':
						echo 'class="emploi"' ;
						break;

					default:
						echo "" ;
						break;
				}
			}
			else
			{
				echo 'class="home"' ;
			}

			break;

		case 'template-comment-ca-marche.php':
			echo 'class="ccm"';
			break;

		case 'template-politique-rh.php':
			echo 'class="rh"';
			break;

		case 'template-reservez.php':
			echo 'class="resa"';
			break;

		case 'template-qui-sommes-nous.php':
			echo 'class="qsn"';
			break;

		case 'template-creches-dediee.php':
			echo 'class="recrutement creches "';
			break;

		case 'template-contact.php':
			echo 'class="qsn contact"';
			break;

		case 'template-candidat-spontanee.php':
			echo 'class="candidat"';
			break;

		case 'template-recrutement.php':
			echo 'class="recrutement"';
			break;

		case 'template-blog.php':
			echo 'class="actus"';
			break;

		case 'template-confirmation-reservation.php':
			echo 'class="resa"';
			break;

		case 'template-fichePage.php':
			echo 'class="fichePage"';
			break;
	}

	echo "" ;
}

function entetePage ($_zDirectory, $_zTemplateName)
{

	$zOutPut = "";
	switch ($_zTemplateName)
	{
		case 'page.php':
			if(basename(get_single_template()) != "")
			{
				switch(basename(get_single_template()))
				{
					case 'single.php':

						$iPostId = get_the_ID();
						if(isPostJobAffinity($iPostId))
						{

						}
						else
						{
							echo '
							<script type="text/javascript">
								 window.urlCounterAjax = "'.get_stylesheet_directory_uri().'/ajax-counter.php";
							</script>
							<link rel="stylesheet" id="style-css"  href="'.get_stylesheet_directory_uri() . '/css/init/actus.css" type="text/css"  />' ;
						}
						break;
					case 'single-job_listing.php':

						echo '
							<script type="text/javascript">
								$( document ).ready(function() {
									var elementDejaPostule = $(".job-manager-applications-applied-notice");
										if(elementDejaPostule.length)
										{
											$(".job_application .application_button").hide();
										}
								});
							</script>
							';


						if(isset($_POST['wp_job_manager_send_application']))
						{

							echo '
								 <script type="text/javascript">
								$( document ).ready(function() {
									var elementSuccess = $(".job-manager-applications-applied-notice");
									if(elementSuccess.length)
									{
										petitesCanailles.showPopup("#resa-confirm");
										$(".job-manager-applications-applied-notice").hide();
									}
								});
								</script>
							';
						}


						break;
					default:
						echo "" ;
						break;
				}
			}
			else
			{
				echo "" ;
			}


			break;


		case 'template-qui-sommes-nous.php':

			echo '
					<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.6&sensor=false"></script>
					<script type="text/javascript">
						 window.urlFrontAjax = "'.get_stylesheet_directory_uri().'/front-ajax.php";
						 window.zDirectory = "'.$_zDirectory.'";
					</script>
				  	<script type="text/javascript" src="'.get_stylesheet_directory_uri() . '/js/init/creche.js"></script>';

			break;

		case 'template-creches-dediee.php':

			echo '
					<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.6&sensor=false"></script>
					<script type="text/javascript">
						 window.urlFrontAjax = "'.get_stylesheet_directory_uri().'/front-ajax.php";
						 window.zDirectory = "'.$_zDirectory.'";
					</script>
				  	<script type="text/javascript" src="'.get_stylesheet_directory_uri() . '/js/init/creche.js"></script>';

			break;

		case 'template-reservez.php':
			echo '
					<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.6&sensor=false"></script>
				    <script type="text/javascript">
						 window.urlFrontAjax = "'.get_stylesheet_directory_uri().'/front-ajax.php";
						 window.zDirectory = "'.$_zDirectory.'";

						 $( document ).ready(function() {
							$("#blockSelectRayon").hide();
							$("#blockFormMessage").hide();
							$("#blockCrecheResult").hide();
							$("#blockFormResaWrap").hide();
							$("#blockBoutonToFormResa").hide();
							$("#blockResaConfirm").hide();
							petitesCanailles.updateResaProgression(1);
							$("#select-rayon").change(function(){
								var searchRayon		= $("#select-rayon").val();
								$("#search-rayon").val(searchRayon);
								validFormSearchResa(0);
							});

						});
					</script>
				  <script type="text/javascript" src="'.get_stylesheet_directory_uri() . '/js/init/resa.js"></script>
				  <link rel="stylesheet" id="style-css"  href="'.get_stylesheet_directory_uri() . '/css/init/resa.css" type="text/css"  />
			';

			if(isset($_GET['succes']))
			{
				echo '
					 <script type="text/javascript">
					$( document ).ready(function() {
						$(".blockRecherche").hide();
						$("#blockFormResaWrap").hide();
						$("#blockResaConfirm").show();
						petitesCanailles.updateResaProgression(3);

					});
					</script>
				';
			}

			if(isset($_POST['w2lsubmit']))
			{
				$zTel           = (isset($_POST['phone']))?trim($_POST['phone']):'';
				$zMel           = $_POST['email'];
				$zTelMail       = $zTel.'|'.$zMel;
				$zTelMailCrypte = encrypt($zTelMail);
				echo '
					 <script type="text/javascript">
					$( document ).ready(function() {

						$(".blockRecherche").hide();

						var elementSuccess = $(".success_message");
						if(elementSuccess.length)
						{
							/*
							$("#blockFormResaWrap").hide();
							window.history.pushState("Object", "Title","'.get_permalink( ID_PAGE_RESERVEZ ).'?succes=1");
							petitesCanailles.updateResaProgression(3);
							$("#blockResaConfirm").show();
							*/
							top.location.href= "'.esc_url( home_url( '/' ) ).'confirmation-reservation?tm='.$zTelMailCrypte.'";
						}
						else
						{
							petitesCanailles.updateResaProgression(2);
							$("#blockFormResaWrap").show();
						}
					});
					</script>
				';
			}
			break;

		case 'template-blog.php':
			echo '

				<script type="text/javascript">
								 window.urlCounterAjax = "'.get_stylesheet_directory_uri().'/ajax-counter.php";
							</script>
			';
			break;

		case 'template-contact.php':
			echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';
			break;

		case 'template-recrutement.php':

			echo '
					<script type="text/javascript" src="'.get_stylesheet_directory_uri() . '/js/init/job-affinity.js"></script>
					<script type="text/javascript">
						window.urlFrontAjax = "'.get_stylesheet_directory_uri().'/front-ajax.php";
						window.zDirectory = "'.$_zDirectory.'";
					</script>
				 ';

			break;

		case 'template-creches-dediee.php':
			echo '<script type="text/javascript">
						 window.urlFrontAjax = "'.get_stylesheet_directory_uri().'/front-ajax.php";
						 window.zDirectory = "'.$_zDirectory.'";

						$( document ).ready(function() {
							 $("#zSearchTerm").on("keyup", function(e) {

								if (e.which == 13) {
									goSearchCrecheDedie();
									e.preventDefault();
								}
							});
						});
					</script>
				  	<script type="text/javascript" src="'.get_stylesheet_directory_uri() . '/js/init/dediee.js"></script>';
		break;

		case 'template-confirmation-reservation.php':
			echo '<link rel="stylesheet" id="style-css"  href="'.get_stylesheet_directory_uri() . '/css/init/resa.css" type="text/css"  />';
		break;
	}

	echo "" ;
}



function getListeCrechesCanaille ($_zIsCanaille, $_zTermSearch=0, $_bIsDedie = 0)
{
		global $wpdb;
		$aIdResult   = array();
		$aIdCrecheIn = array();
		$zCrecheIn   = '';
		$sQry        = "SELECT  P1.ID  FROM wp_posts P1

						INNER JOIN wp_postmeta ON (  P1.ID = wp_postmeta.post_id)
						LEFT JOIN wp_posts_relations  ON (wp_posts_relations.object_id_1 =   P1.ID)
						LEFT JOIN wp_posts P2 ON (P2.ID = wp_posts_relations.object_id_2)
						WHERE
							  P1.post_status = 'publish'
							and   P1.post_type='creche' ";

		if( !empty($_zIsCanaille) && trim($_zIsCanaille)!='' )
		{
				$sQry.= 	" AND
									  P1.ID IN
												(
													SELECT wp_postmeta.post_id FROM wp_postmeta
													WHERE wp_postmeta.meta_key = 'appartenant_à_les_petites_canailles'
													AND CAST(wp_postmeta.meta_value AS CHAR) = '".$_zIsCanaille."'
							)";

		}

		if( intval($_zTermSearch)!=0 )
		{

			$iDeptID     = intval($_zTermSearch);
			$aIdCrecheIn = rpt_get_object_relation($iDeptID, 'creche');
			if( is_array($aIdCrecheIn) && !empty($aIdCrecheIn) ){
				$sQry.= " AND P1.ID IN ( ". implode(', ', $aIdCrecheIn) ." )";
			}
		}

		$sQry.= " GROUP BY P1.ID ORDER BY P1.post_date DESC";

		$qryRes	= $wpdb->get_results( $sQry );

		if( !empty($qryRes) )
		{
			foreach($qryRes as $kk => $vv)
			{
				$aIdResult[] = intval($vv->ID);
			}
		}

		if( !empty($aIdResult) && count($aIdResult)>0 ){
			$args =  array (
							'post_type' => 'creche',
							'post__in'  => $aIdResult,
							'orderby'   => 'date',
							'order'     => 'DESC',
							'nopaging'  => 'true'
						);
			$toCrecheAll       = new WP_Query($args);
			$toCrecheCanailles = $toCrecheAll->posts;
		}

	return $toCrecheCanailles ;
}


function getListeCreches ($_zIsCanaille, $_zTermSearch,$_bIsDedie = 0)
{
		global $wpdb;
		$aIdResult	= array();



		$sQry = "SELECT  P1.ID  FROM wp_posts P1

				INNER JOIN wp_postmeta ON (  P1.ID = wp_postmeta.post_id)
				LEFT JOIN wp_posts_relations  ON (wp_posts_relations.object_id_1 =   P1.ID)
				LEFT JOIN wp_posts P2 ON (P2.ID = wp_posts_relations.object_id_2)
				WHERE
					  P1.post_status = 'publish'
					and   P1.post_type='creche' ";

		if( !empty($_zIsCanaille) && trim($_zIsCanaille)!='' )
		{
				$sQry.= 	" AND
									  P1.ID IN
												(
													SELECT wp_postmeta.post_id FROM wp_postmeta
													WHERE wp_postmeta.meta_key = 'appartenant_à_les_petites_canailles'
													AND CAST(wp_postmeta.meta_value AS CHAR) = '".$_zIsCanaille."'
							)";

		}


		if( !empty($_zTermSearch) && trim($_zTermSearch)!='' )
		{
				$sQry.= 	" AND (
									(
											  P1.ID IN
														(
															SELECT wp_postmeta.post_id FROM wp_postmeta
															WHERE wp_postmeta.meta_key = 'nom_creche'
															AND lower(CAST(wp_postmeta.meta_value AS CHAR)) LIKE '%".strtolower($_zTermSearch)."%'
										)
									)
									OR
									(
										  P2.ID IN
													(
														SELECT wp_postmeta.post_id FROM wp_postmeta
														WHERE wp_postmeta.meta_key = 'adresse'
														AND lower(CAST(wp_postmeta.meta_value AS CHAR)) LIKE '%".strtolower($_zTermSearch)."%'
										)
									)
									OR
									(
										lower(P2.post_title) LIKE '%".strtolower($_zTermSearch)."%'
									)";

								if($_bIsDedie == 1)
								{
									$sQry.= 	"	OR
									(
										lower(P1.post_content) LIKE '%".strtolower($_zTermSearch)."%'
									)";

								}

								$sQry.= 	"		OR
									(
										  P2.ID IN
														(
															SELECT wp_postmeta.post_id FROM wp_postmeta
															WHERE wp_postmeta.meta_key = 'code_postal'
															AND lower(CAST(wp_postmeta.meta_value AS CHAR)) LIKE '%".strtolower($_zTermSearch)."%'
											)
									)
								)
								";

		}


		$sQry.= " GROUP BY P1.ID ORDER BY P1.post_date DESC";

		$qryRes	= $wpdb->get_results( $sQry );

		if( !empty($qryRes) )
		{
			foreach($qryRes as $kk => $vv)
			{
				$aIdResult[] = intval($vv->ID);
			}
		}

		if( !empty($aIdResult) && count($aIdResult)>0 ){
						$args =  array (

						'post_type' => 'creche',
						'post__in' => $aIdResult,
						'orderby'   => 'date',
						'order' => 'DESC',
						'nopaging' => 'true'
						);

			$toCrecheAll = new WP_Query($args);
			$toCrecheCanailles = $toCrecheAll->posts;
		}


	return $toCrecheCanailles ;
}

add_action( 'wp_ajax_load_searchCreche_results', 'load_searchCreche_results' );
add_action( 'wp_ajax_nopriv_load_searchCreche_results', 'load_searchCreche_results' );
function load_searchCreche_results($_isResult = 0, $_isMap = 0)
{
	$zSearchTerm          = (isset($_POST['zSearchTerm']))?$_POST['zSearchTerm']:'';
	$idCrecheCentre       = (isset($_POST['idCrecheCentre']))?$_POST['idCrecheCentre']:0;
	// $toCrecheCanailles = getListeCreches ('oui', $zSearchTerm,0);
	$toCrecheCanailles    = getListeCrechesCanaille ('oui', $zSearchTerm, 0);
	$zOutputResult        = '';
	$zOutputMap           = '';


	if(sizeof($toCrecheCanailles) >0)
	{
		//AFFICHAGE RESULTAT RECHERCHE
		foreach ($toCrecheCanailles as $k=>$oCrecheCanailles)
		{
			//$iNumeroMarker = $k+1;
			$iNumeroMarker   = "";
			$iIdCreche       =	$oCrecheCanailles->ID;
			$zVileNom        = "" ;
			$iVilleId        = rpt_get_object_relation($iIdCreche, 'ville');
			$args            = array (
									'post_type'		=> 'ville',
									'post__in'		=> $iVilleId,
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'nopaging'		=> true
								);
			$toVille     = new WP_Query( $args );
			//print_r ($toVille);
			$zVileNom    = "" ;
			$zCodePostal = "";
			if( count($toVille) > 0 ){
				foreach( $toVille as $oVille ){
					if( trim($oVille->post_title)!='' ){
						$zVileNom    = $oVille->post_title;
						$zCodePostal = get_field('code_postal', $oVille->ID);
					}
				}
			}

			/* enlever le Paris (75020 )*/
			if (preg_match("/\b".$zCodePostal."\b/i", $zVileNom, $match))
			{
				$zVileNom = str_replace ('('.$zCodePostal.')','',$zVileNom);
				$zVileNom = str_replace ($zCodePostal,'',$zVileNom);
			}


		$zOutputResult.= '
		 <li>
			<div id="linkFicheCreche_'.$iIdCreche.'" onClick="chargerListeCreche('.$iIdCreche.', false);return false;">
				<span>'.$iNumeroMarker.get_field('nom_creche', $iIdCreche).'</span>
				<address>
						 '.get_field('adresse', $iIdCreche).'<br/>
						 '.$zCodePostal . "  " . $zVileNom.'
				</address>
			</div>
			<a href="'.get_permalink( $iIdCreche ).'" class="qsn_voirFiche" >Voir la fiche</a>
		 </li>';
		 }
	}
	else
	{
		 $zOutputResult.='<li class="no-result">Aucun résultat</li>';
	}

	//AFFICHAGE CARTE

	$toLatitudeLongitude = array();
	if(sizeof($toCrecheCanailles)	>0)
	{
		foreach ($toCrecheCanailles as $k=>$oCrecheCanailles)
		{
			//$iNumeroMarker = $k+1;
			$iNumeroMarker = "";
			$iIdCreche	=	$oCrecheCanailles->ID;

			$zVileNom = "" ;
			$iVilleId = rpt_get_object_relation($iIdCreche, 'ville');
			$oVille = getDetailVille($_iVilleId);

			$zVileNom = $oVille->post_title;
			$zCodePostal	= get_field('code_postal', $oVille->ID);

			$zAddress = getAdresseCreche($iIdCreche);

				$oLatitudeLongitude = new StdClass();
				$oLatitudeLongitude->iCrecheId 	= $iIdCreche;
				$oLatitudeLongitude->titre 		= get_field('adresse', $iIdCreche).' '.$zVileNom.'-'.$zCodePostal;
				$oLatitudeLongitude->latitude 	= get_field('latitude', $iIdCreche);
				$oLatitudeLongitude->longitude 	= get_field('longitude', $iIdCreche);
				$oLatitudeLongitude->adresse 	= $zAddress;
				//GENERATE MARKER
					//die(get_theme_root());
					$zDirTheme = get_theme_root().'/lpc2';
					$zDirWorkshop = $zDirTheme.'/PHPImageWorkshop/ImageWorkshop.php';
					require_once($zDirWorkshop);
					$oBjWorkshop = new PHPImageWorkshop\ImageWorkshop();


					$zNomFichier			= 'marker_'.$iNumeroMarker.'.png';
					$zDirMarker				= $zDirTheme.'/markers/';
					$zEmplacementFichier0 	= $zDirMarker.'marker_0.png';
					$zEmplacementFichier	= $zDirTheme.'/markers/created/'.$zNomFichier;
					$zDirFont				= $zDirTheme.'/fonts/opensans/';

					if(!file_exists($zEmplacementFichier))
					{
						//creer le fichier;
						$zText 				= $iNumeroMarker;
						$zFontPath 			= $zDirFont."opensans-semibold-webfont.ttf";
						if($iNumeroMarker >10)
						{
							$zFontSize 			= 13;
						}
						else
						{
							$zFontSize 			= 16;
						}
						$zFontColor 		= "FF3855";
						$zTextRotation 		= 0;
						$zBackgroundColor 	= null;

						$oText = $oBjWorkshop::initTextLayer($zText, $zFontPath, $zFontSize, $zFontColor, $zTextRotation, $zBackgroundColor);


						$oLayer = $oBjWorkshop::initFromPath($zEmplacementFichier0);

						$oLayer->addLayer(1,$oText, -7, 17, "MT");


						//SAVE
						$bCreateFolders = true;
						$zBackgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
						$iImageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

						$oLayer->save($zDirMarker.'created/', $zNomFichier, $bCreateFolders, $zBackgroundColor, $iImageQuality);

					}
				//FIN MARKER
				$oLatitudeLongitude->marker = $zNomFichier;
				array_push ($toLatitudeLongitude, $oLatitudeLongitude);



		}
	}
	//die();

	$zOutputMap.='
		<script type="text/javascript">

		function getArrayFiche()
		{
			var arr = []; ';


			foreach($toLatitudeLongitude as $oLatitudeLongitude)
			{

				$zOutputMap.= 	'
									var fLong = "'.$oLatitudeLongitude->longitude.'";
									var fLat  = "'.$oLatitudeLongitude->latitude.'";

								';
				$zOutputMap.='var arrayTemp = ["'.$oLatitudeLongitude->titre.'",fLat,fLong,"'.$oLatitudeLongitude->marker.'","'.$oLatitudeLongitude->adresse.'","'.$oLatitudeLongitude->iCrecheId.'"];

				arr.push(arrayTemp);
				';
			}

	$zOutputMap.='return arr;
		}


		function initialiser(){

				  var locations = getArrayFiche();
				  var latLng = new google.maps.LatLng(48.858859, 2.3470599);

				  var myOptions = {
					zoom      : 13,
					center    : latLng,
					zoomControl: true,
					zoomControlOptions: {
						style: google.maps.ZoomControlStyle.SMALL,
						position: google.maps.ControlPosition.RIGHT_BOTTOM
					},
					streetViewControl: true,
					panControl: false,
					mapTypeControl: false,
				    mapTypeControlOptions: {
				      style: google.maps.MapTypeControlStyle.DEFAULT,
				      mapTypeIds: [
				        google.maps.MapTypeId.ROADMAP,
				        google.maps.MapTypeId.TERRAIN
				      ]
				    },
					mapTypeId : google.maps.MapTypeId.TERRAIN,
					maxZoom   : 20
				  };

				  map      = new google.maps.Map(document.getElementById(\'map\'), myOptions);

				  window.bounds = new google.maps.LatLngBounds();
				  for (var i = 0; i < locations.length; i++)
				  {
					var iCenter = 0;
					if(i==0)
					{
						var iCenter = 1;
					}
					drawMarker(locations[i],map,iCenter,'.$idCrecheCentre.');

				   }
			};



			$(document).ready(function($){
					$("#blocDetailFicheCreche").hide();
					$("#blocDetailFicheCreche").html("");
					initialiser();
			});


		</script>';
	if($_isResult == 0 && $_isMap == 0)
	{
		$tData['result'] = $zOutputResult;
		$tData['map'] 	= $zOutputMap;
		$tData = json_encode($tData);
		 header( 'Content-Type: application/json' );
		echo $tData;
	}
	else
	{
		if($_isResult == 1)
		{
			return  $zOutputResult;
		}

		if($_isMap == 1)
		{
			return $zOutputMap;
		}
	}
	die();
}


add_action( 'wp_ajax_load_ficheCreche_qsn', 'load_ficheCreche_qsn' );
add_action( 'wp_ajax_nopriv_load_ficheCreche_qsn', 'load_ficheCreche_qsn' );
function load_ficheCreche_qsn()
{
	$iCrecheId = (isset($_POST['iCrecheId']))?$_POST['iCrecheId']:'';
	$zOutPutDetail= '';
	$args			= array (
									'post_type'		=> 'creche',
									'post__in'		=> array($iCrecheId),
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'nopaging'		=> true
								);
			$toCreche		= new WP_Query( $args );
			$toCreche = $toCreche->posts;

			if(isset($toCreche[0]))
			{
				$oCreche				= $toCreche[0];
				$zAdresse				= get_field('adresse', $iCrecheId);
				$zOuverture				= get_field('ouverture', $iCrecheId);
				$zNombre_de_berceaux	= get_field('nombre_de_berceaux', $iCrecheId);
				$zSuperficie			= get_field('superficie', $iCrecheId);
				$zHoraire				= get_field('horaire', $iCrecheId);
				$zLien_visite_virtuel	= get_field('lien_visite_virtuel', $iCrecheId);
				$zOutPutDetail.= '
					<div class="wrapSlider">
						<a href="#" onclick="fermerFicheCreche(); return false;" class="close"></a>';

						$toImages = get_multi_images_src('qui_sommes_nous_slider_image_size','full',false,$iCrecheId);
						//echo "<pre>";print_r($toImages); echo "</pre>";
						$zOutPutDetail.= '<div id="owl-demo" class="owl-carousel owl-theme slider">';
						if(sizeof($toImages))
						{

							foreach($toImages as $k=>$tImg)
							{
								if(isset($tImg[0][0]))
								{
									$zOutPutDetail.= '<div class="item"><img src="'.$tImg[0][0].'" alt="'.$k.'"></div>';
								}

							}

						}
						else
						{
							$zOutPutDetail.= '<div class="item"><img src="'. get_template_directory_uri() .'/images/empty-carousel.png" alt="" width="860" height="360"></div>';
						}

						$zOutPutDetail.= ' </div>';

					$zOutPutDetail.= '
					 </div>
					   <div class="blocInfo clearFix">
						 <div class="lt">
							 <div class="child">
								<h3>'.get_field('nom_creche', $iCrecheId).'</h3>
								<hr class="sep"/>
								<p>'.nl2br($oCreche->post_content).'</p>
							</div>';
						if($zLien_visite_virtuel !='')
						{
							$zOutPutDetail.= '<span class="cpBt"><a href="'.$zLien_visite_virtuel.'" target="_blank">visitez la crèche</a></span>';
						}
						$zOutPutDetail.= '
						 </div>
						 <div class="rt">
							 <div class="child info">
								<h3>informations pratiques</h3>
								<hr class="sep"/>';
								if($zAdresse!='')
								{
									$zOutPutDetail.= '<p><span>ADRESSE :</span> '.$zAdresse.'</p>';
								}
								if($zOuverture!='')
								{
									$zOutPutDetail.= '<p><span>OUVERTURE :</span> '.$zOuverture.'</p>';
								}
								if($zNombre_de_berceaux!='')
								{
									$zOutPutDetail.= '<p><span>NOMBRE DE BERCEAUX :</span> '.$zNombre_de_berceaux.'</p>';
								}

								if($zSuperficie!='')
								{
									$zOutPutDetail.= '<p><span>SUPERFICIE :</span> '.$zSuperficie.'</p>';
								}
								if($zHoraire!='')
								{
									$zOutPutDetail.= '<p><span>HORAIRES :</span> '.$zHoraire.'</p>';
								}
						$zOutPutDetail.='
							</div>
						 </div>
					   </div>
						';
			}
			else
			{
				$zOutPutDetail.= 'Crèche introuvable.';
			}

	$tData['detail'] = $zOutPutDetail;
	$tData = json_encode($tData);
	 header( 'Content-Type: application/json' );
    echo $tData;
	die();
}


/***
	RESERVATION
***/


add_action( 'wp_ajax_load_searchCrecheResa_results', 'load_searchCrecheResa_results' );
add_action( 'wp_ajax_nopriv_load_searchCrecheResa_results', 'load_searchCrecheResa_results' );
function load_searchCrecheResa_results()
{
	$toCrecheFinal		= array();
	$toCrecheCanaille	= array();
	$toCrecheAutre		= array();
	$zCrecheResult		= '';
	$tVilleCanaille		= array();
	$iAdresseIntrouvable	= 0;

	$tDataSearch['zSearchAdress']	= (isset($_POST['searchAdress']))?trim($_POST['searchAdress']):'';
	$tDataSearch['zSearchCode']		= (isset($_POST['searchCode']))?trim($_POST['searchCode']):'';
	$tDataSearch['zSearchVille']	= (isset($_POST['searchVille']))?trim($_POST['searchVille']):'';
	$tDataSearch['iNbrRecherche']	= (isset($_POST['iNbrRecherche']))?$_POST['iNbrRecherche']:'';
	$tDataSearch['searchRayon']		= (isset($_POST['searchRayon']))?$_POST['searchRayon']:'';
	$searchNombre					= (isset($_POST['searchNombre']))?$_POST['searchNombre']:0;
	$latSearch						= (isset($_POST['searchLatitude']))?$_POST['searchLatitude']:'';
	$lngSearch						= (isset($_POST['searchLongitude']))?$_POST['searchLongitude']:'';



	$zOutputMessage = '';
	$zRayon = '';

	$iShowForm = 0;
	$iShowSelectRayon = 0;
	if($tDataSearch['zSearchAdress'] !='' && $tDataSearch['zSearchCode'] !='' && $tDataSearch['zSearchVille'] !='' && $tDataSearch['searchRayon']!='')
	{
		$tDataSearchMin['zSearchAdress']	= '';
		$tDataSearchMin['zSearchCode']		= '';
		$tDataSearchMin['zSearchVille']		= '';
		$toCreche	= rechercheCrechesResa ($tDataSearchMin);



		if($latSearch != '' &&  $lngSearch != '')
		{
			$zPointDeDepart = '';
			$zRayon = ' <strong>dans un rayon de '.$tDataSearch['searchRayon'].' km</strong>';
			if(sizeof($toCreche) >0)
			{

				foreach($toCreche as $tCreche)
				{
					$zAdresseCreche = getAdresseCreche($tCreche->ID);


					$latCreche = get_field('latitude',$tCreche->ID);
					$lngCreche = get_field('longitude',$tCreche->ID);


					if($latCreche != '' &&  $lngCreche != '')
					{
						$iDistance = getDistanceBetweenPointsNew($latSearch,$lngSearch,$latCreche,$lngCreche,'K');

						if($iDistance <= $tDataSearch['searchRayon'])
						{
							array_push($toCrecheFinal,$tCreche);
						}
					}
				}
			}
		}
		else
		{
			$iAdresseIntrouvable = 1;
		}
	}
	else
	{
		/*$toCreche 				= rechercheCrechesResa ($tDataSearch);
		$toCrecheFinal = $toCreche*/

		/*

		recette client dans un rayon de 1 km
		Page Réservation : Mettre en tolérance de base = 1km. Supprimer le rayon "1km" pour passer directement à 2.

		*/

		$tDataSearchMin['zSearchAdress']	= '';
		$tDataSearchMin['zSearchCode']		= '';
		$tDataSearchMin['zSearchVille']		= '';
		$toCreche	= rechercheCrechesResa ($tDataSearchMin);

		if($tDataSearch['zSearchAdress'] !='' && $tDataSearch['zSearchCode'] !='' && $tDataSearch['zSearchVille'] !='')
		{
			$zAddress = $tDataSearch['zSearchAdress'].', '.$tDataSearch['zSearchCode'].' '.$tDataSearch['zSearchVille'].' ,France';
			$tCcoordinates = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($zAddress) . '&sensor=true');
			$tCcoordinates = json_decode($tCcoordinates);

			if(is_object($tCcoordinates) && isset($tCcoordinates->results[0]))
			{
				$fLat=  $tCcoordinates->results[0]->geometry->location->lat;
				$fLong=  $tCcoordinates->results[0]->geometry->location->lng;
				if($fLat > 0 && $fLong>0)
				{
					$latSearch  = $fLat;
					$lngSearch = $fLong;
				}
			}
		}



		if($latSearch != '' &&  $lngSearch != '')
		{
			$zPointDeDepart = '';
			$zRayon = ' <strong>dans un rayon de 1 km</strong>';
			if(sizeof($toCreche) >0)
			{

				foreach($toCreche as $tCreche)
				{
					$zAdresseCreche = getAdresseCreche($tCreche->ID);


					$latCreche = get_field('latitude',$tCreche->ID);
					$lngCreche = get_field('longitude',$tCreche->ID);


					if($latCreche != '' &&  $lngCreche != '')
					{
						$iDistance = getDistanceBetweenPointsNew($latSearch,$lngSearch,$latCreche,$lngCreche,'K');

						/* inférieur à 1 km */
						if($iDistance <= 1)
						{
							array_push($toCrecheFinal,$tCreche);
						}
					}
				}
			}
		}
		else
		{
			$iAdresseIntrouvable = 1;
		}

	}

	$iNbrResultat = sizeof($toCrecheFinal);
	if($iNbrResultat >0)
	{
		foreach($toCrecheFinal as $tCreche)
		{
			$isCrecheCarnaille = get_field('appartenant_à_les_petites_canailles', $tCreche->ID);
			if($isCrecheCarnaille == 'oui')
			{
				array_push($toCrecheCanaille,$tCreche);
				$tVilleCrecheId = rpt_get_object_relation($tCreche->ID, 'ville');
				$iVilleCrecheId = 0;
				if(isset($tVilleCrecheId[0]))
				{
					$iVilleCrecheId = $tVilleCrecheId[0];
					$oVille = getDetailVille($tVilleCrecheId);
				}


				if(isset($tVilleCanaille[$iVilleCrecheId]['list']))
				{

					array_push($tVilleCanaille[$iVilleCrecheId]['list'],$tCreche);
				}
				else
				{
					$tVilleCanaille[$iVilleCrecheId]['list'] = array($tCreche);
					if(isset($oVille))
					{
						$tVilleCanaille[$iVilleCrecheId]['nom'] = $oVille->post_title;
					}
					else
					{
						$tVilleCanaille[$iVilleCrecheId]['nom'] = 'Autre';
					}
				}
			}
			else
			{
				array_push($toCrecheAutre,$tCreche);
			}
		}
	}


	$zPluriel = '';
	if($iNbrResultat > 1)
	{
		$zPluriel = 's';
	}

	$searchNombre++;
	if($iNbrResultat >0)
	{
		$iShowSelectRayon = 0;
		if(sizeof($toCrecheAutre) > 0)
		{
			//$zOutputMessage.=' Résultats <strong>'.$tDataSearch['zSearchVille'].'</strong> '.$zRayon.' : '.$iNbrResultat.'&nbsp;crèche'.$zPluriel.'<br>';
			$zOutputMessage.=' Nous avons  '.$iNbrResultat.'&nbsp;crèche'.$zPluriel.' '.$zRayon.'  à vous proposer<br> Pour obtenir une place dans l\'une de ces crèches, remplissez le formulaire. ';
		}
		 $iNbrCanaille = sizeof($toCrecheCanaille);
		 if($iNbrCanaille > 0)
		 {
			$zPluriel1 = '';
			if($iNbrCanaille > 1)
			{
				$zPluriel1 = 's';
			}
			if(sizeof($toCrecheAutre) > 0)
			{
               //$zOutputMessage.='  dont '.$iNbrCanaille.' crèche'.$zPluriel1.' Les Petites Canailles ';
			}
			else
			{
				//$zOutputMessage.=' Résultats <strong>'.$tDataSearch['zSearchVille'].'</strong> '.$zRayon.' : '.$iNbrResultat.'&nbsp;crèche'.$zPluriel.' Les Petites canailles <br>';
				$zOutputMessage.=' Nous avons '.$iNbrResultat.'&nbsp;crèche'.$zPluriel.' '.$zRayon.' à vous proposer<br> Pour obtenir une place dans l\'une de ces crèches, remplissez le formulaire. ';
			}

			//LISTE CANAILLE
			if(sizeof($tVilleCanaille)>0)
			{
				$zCrecheResult.= '<div class="wrapper">';
				foreach($tVilleCanaille as $tVille)
				{
					$zCrecheResult.= '<p class="ville">'.$tVille['nom'].' :</p>';
					if(sizeof($tVille['list']) > 0)
					{
						$tListCreche = $tVille['list'];
						foreach($tListCreche as $tCreche)
						{
							$zCrecheResult.= '<p>'.get_field('nom_creche', $tCreche->ID);
							$zCrecheResult.= '<a href="'.get_permalink( $tCreche->ID ).'" title="En savoir plus" >En savoir +</a>';
							$zCrecheResult.= '</p>';
						}
					}

				}
				$zCrecheResult.= '</div>';
			}
		 }
		$iShowForm = 1;
	}
	else
	{

		if($tDataSearch['searchRayon'] < 10)
		{

			$zOutputMessage.='<strong class="desole">Désolé,</strong><br>
							Il n’y a aucun résultat pour votre recherche '.$zRayon.'.<br>
							Élargissez votre recherche :';
			$iShowSelectRayon = 1;

		}
		else
		{
			$zOutputMessage.=' <strong>
                                    Nous n’avons pour le moment aucune crèche<br>
                                    dans votre secteur de recherche.
                                </strong><br>
                                Vous pouvez tout de même vous inscrire et nous vous recontacterons<br>
                                dès qu’un établissement sera disponible.';
			$iShowForm = 1;
		}
	}

	$tData['message'] = $zOutputMessage;
	$tData['iNbrResultat']		= $iNbrResultat;
	$tData['searchNombre']		= $searchNombre;
	$tData['iShowForm']			= $iShowForm;
	$tData['iShowSelectRayon']	= $iShowSelectRayon;
	$tData['zCrecheResult']		= $zCrecheResult;
	$tData['iAdresseIntrouvable'] = $iAdresseIntrouvable;
	$tData = json_encode($tData);
	header( 'Content-Type: application/json' );
	echo $tData;

	die();
}




function rechercheCrechesResa ($_tDataSearch)
{
		global $wpdb;
		$aIdResult	= array();



		$sQry = "SELECT  P1.ID  FROM wp_posts P1

				INNER JOIN wp_postmeta ON (  P1.ID = wp_postmeta.post_id)
				LEFT JOIN wp_posts_relations  ON (wp_posts_relations.object_id_1 =   P1.ID)
				LEFT JOIN wp_posts P2 ON (P2.ID = wp_posts_relations.object_id_2)
				WHERE
					  P1.post_status = 'publish'
					and   P1.post_type='creche' ";




		if( !empty($_tDataSearch['zSearchAdress']) && trim($_tDataSearch['zSearchAdress'])!='' )
		{
			$sQry.= 	" AND P1.ID IN (
														SELECT wp_postmeta.post_id FROM wp_postmeta
														WHERE wp_postmeta.meta_key = 'adresse'
														AND lower(CAST(wp_postmeta.meta_value AS CHAR)) LIKE '%".strtolower($_tDataSearch['zSearchAdress'])."%'
										)";
		}

		if( !empty($_tDataSearch['zSearchCode']) && trim($_tDataSearch['zSearchCode'])!='' )
		{
			$sQry.= 	" AND P2.ID IN (
															SELECT wp_postmeta.post_id FROM wp_postmeta
															WHERE wp_postmeta.meta_key = 'code_postal'
															AND lower(CAST(wp_postmeta.meta_value AS CHAR)) LIKE '%".strtolower($_tDataSearch['zSearchCode'])."%'
											)";
		}

		if( !empty($_tDataSearch['zSearchVille']) && trim($_tDataSearch['zSearchVille'])!='' )
		{
			$sQry.= 	" AND lower(P2.post_title) LIKE '%".strtolower($_tDataSearch['zSearchVille'])."%' ";
		}

		$sQry.= " GROUP BY P1.ID ORDER BY P1.post_date DESC";
		//echo $sQry;
		$qryRes	= $wpdb->get_results( $sQry );

		if( !empty($qryRes) )
		{
			foreach($qryRes as $kk => $vv)
			{
				$aIdResult[] = intval($vv->ID);
			}
		}

		if( !empty($aIdResult) && count($aIdResult)>0 ){
						$args =  array (

						'post_type' => 'creche',
						'post__in' => $aIdResult,
						'orderby'   => 'date',
						'order' => 'DESC',
						'nopaging' => 'true'
						);

			$toCrecheAll = new WP_Query($args);
			$toCrecheCanailles = $toCrecheAll->posts;
		}


	return $toCrecheCanailles ;
}

function getCoordinates($_zAddress)
{
	$tReturn = array();
	$zAddress = get_field('adresse', $iIdCreche).', '.$zVileNom.' '.$zCodePostal.' ,France';
	$tCcoordinates = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_zAddress) . '&sensor=true');

	//echo $zAddress ;

	$tCcoordinates = json_decode($tCcoordinates);

	if(is_object($tCcoordinates) && isset($tCcoordinates->results[0]))
	{
		$fLat	=  $tCcoordinates->results[0]->geometry->location->lat;
		$fLong	=  $tCcoordinates->results[0]->geometry->location->lng;
		$tReturn = array(
								"lat"	=>	$fLat,
								"long"	=>	$fLong
							);

	}
	return $tReturn;
}

function getAdresseCreche($_iCrecheId)
{
	$iVilleId = rpt_get_object_relation($_iCrecheId, 'ville');

			$args			= array (
									'post_type'		=> 'ville',
									'post__in'		=> $iVilleId,
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'nopaging'		=> true
								);
			$toVille		= new WP_Query( $args );



			$zVileNom = "" ;
			$zCodePostal = "";
			if( count($toVille) > 0 ){
				foreach( $toVille as $oVille ){
					if( trim($oVille->post_title)!='' ){
						$zVileNom = $oVille->post_title;
						$zCodePostal	= get_field('code_postal', $oVille->ID);
					}
				}
			}
	return get_field('adresse', $_iCrecheId).', '.$zVileNom.' '.$zCodePostal.' ,France';
}

function getDistanceBetweenPointsNew($lat1, $lon1, $lat2, $lon2, $unit)
{

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K")
	{
		return ($miles * 1.609344);
	}
	else if ($unit == "N")
	{
		return ($miles * 0.8684);
	}
	else
	{
		return $miles;
	}
}

function getDetailVille($_iVilleId)
{
	$tVille = null;
	$args			= array (
									'post_type'		=> 'ville',
									'post__in'		=> $_iVilleId,
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'nopaging'		=> true
								);
			$toVille		= new WP_Query( $args );

			//print_r ($toVille);

			$zVileNom = "" ;
			$zCodePostal = "";
			if( count($toVille) > 0 ){
				foreach( $toVille as $oVille ){
					if( trim($oVille->post_title)!='' ){
						$tVille = $oVille;
					}
				}
			}
	return $tVille;
}



function getDateLongue($_dDate)
{

	$toDate = explode('-', $_dDate);
	$iJour   = $toDate[2];
	$iMois   = $toDate[1];
	$iAnnee  = $toDate[0];
	$toMois=array("1"=>"Janvier",
			 "2"=> "Fevrier",
			 "3"=> "Mars",
			 "4"=> "Avril",
			 "5"=> "Mai",
			 "6"=> "Juin",
			 "7"=> "Juillet",
			 "8"=> utf8_encode("Ao°t"),
			 "9"=> "Septembre",
			 "10"=> "Octobre",
			 "11"=>"Novembre",
			 "12"=> "DÈcembre");

	$iMois = (int)($iMois);

	return $iJour ." " . $toMois[$iMois] . " " . $iAnnee;
}

function listeActualitesSimilaires($_iPostId)
{
	$tags = wp_get_post_tags($_iPostId);
	if ($tags)
	{
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$args=array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($_iPostId),
			'showposts'=>3, // nombre d'articles à afficher
			'caller_get_posts'=>1,
			'author__not_in' => getIdUserAffinity()
		);
		$my_query = new wp_query($args);
		if( $my_query->have_posts() ) {
			echo '<section class="similaire">
					<p class="topTitle">NOS ACTUALITéS SIMILAIRES</p>
					 <section class="blocWrap clearFix">
					';
			while ($my_query->have_posts())
			{
				$my_query->the_post();
				$zDate  = getDateLongue(get_the_time( 'Y-m-d', $_iPostId ));
				$aImages 	= get_post_custom_values( 'actu-image', get_the_ID() );
				$aImage		= wp_get_attachment_image_src( $aImages[0], 'actu_image_size' );
				$zSrc   = '';
				if(isset($aImage[0]))
				{
					$zSrc   = $aImage[0];
				}

			?>
				<article>
                    <div class="listActu">
					<?php if( trim($zSrc)!='' ) {?>
                           <div class="imgL Parent-image"><a href="<?php the_permalink() ?>" class="image" style="background-image:url('<?php echo $zSrc; ?>')"></a></div>
					<?php } ?>

                      <div class="rt">
                        <div>
                          <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                          <span class="pub">Publié le <?php echo $zDate; ?></span>
                          <hr class="sep">
                          <p>
							<?php
                                        $zContenu = get_the_content();
                                        echo truncate(strip_tags($zContenu), 150, '...');
                            ?>
						  </p>
                          <a href="<?php the_permalink() ?>" class="lire">Lire la suite</a>
                          <?php echo do_shortcode("[social_share facebook='yes' twitter='yes' google='yes' urltoshare='".	get_permalink(get_the_ID())."' sharetitle='".get_the_title()."' media='".$zSrc."']");
						 ?>
                        </div>
                      </div>
                    </div>
                   </article>
			<?php
			}
			echo '
				</section>
				</section>';
		}
		wp_reset_postdata();
	}
}






add_action( 'wp_ajax_load_saveLongLatCreche', 'load_saveLongLatCreche' );
add_action( 'wp_ajax_nopriv_load_saveLongLatCreche', 'load_saveLongLatCreche' );
function load_saveLongLatCreche()
{
	$_iCrecheID = (isset($_POST['_iCrecheID']))?$_POST['_iCrecheID']:'';
	$_lng 		= (isset($_POST['_lng']))?$_POST['_lng']:'';
	$_lat		= (isset($_POST['_lat']))?$_POST['_lat']:'';
	if($_iCrecheID!='')
	{
		update_post_meta($_iCrecheID,'latitude',$_lat);
		update_post_meta($_iCrecheID,'longitude',$_lng);
	}
}

/**
 * Determines the difference between two timestamps.
 *
 * The difference is returned in a human readable format such as "1 hour",
 * "5 mins", "2 days".
 *
 * @since 1.5.0
 *
 * @param int $from Unix timestamp from which the difference begins.
 * @param int $to Optional. Unix timestamp to end the time difference. Default becomes time() if not set.
 * @return string Human readable time difference.
 */
function human_time_diff11( $from, $to = '' ) {
	if ( empty( $to ) ) {
		$to = time();
	}

	$diff = (int) abs( $to - $from );

	if ( $diff < HOUR_IN_SECONDS ) {
		$mins = round( $diff / MINUTE_IN_SECONDS );
		if ( $mins <= 1 )
			$mins = 1;
		/* translators: min=minute */
		$since = sprintf( _n( '%s minute', '%s minutes', $mins ), $mins );
	} elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
		$hours = round( $diff / HOUR_IN_SECONDS );
		if ( $hours <= 1 )
			$hours = 1;
		$since = sprintf( _n( '%s heure', '%s heures', $hours ), $hours );
	} elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
		$days = round( $diff / DAY_IN_SECONDS );
		if ( $days <= 1 )
			$days = 1;
		$since = sprintf( _n( '%s jour', '%s jours', $days ), $days );
	} elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
		$weeks = round( $diff / WEEK_IN_SECONDS );
		if ( $weeks <= 1 )
			$weeks = 1;
		$since = sprintf( _n( '%s semaine', '%s semaines', $weeks ), $weeks );
	} elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {
		$months = round( $diff / ( 30 * DAY_IN_SECONDS ) );
		if ( $months <= 1 )
			$months = 1;
		$since = sprintf( _n( '%s mois', '%s mois', $months ), $months );
	} elseif ( $diff >= YEAR_IN_SECONDS ) {
		$years = round( $diff / YEAR_IN_SECONDS );
		if ( $years <= 1 )
			$years = 1;
		$since = sprintf( _n( '%s an', '%s ans', $years ), $years );
	}

	/**
	 * Filter the human readable difference between two timestamps.
	 *
	 * @since 4.0.0
	 *
	 * @param string $since The difference in human readable text.
	 * @param int    $diff  The difference in seconds.
	 * @param int    $from  Unix timestamp from which the difference begins.
	 * @param int    $to    Unix timestamp to end the time difference.
	 */
	return apply_filters( 'human_time_diff11', $since, $diff, $from, $to );
}


// Entreprises
add_image_size ('entreprise_icon_home_image_size', 84, 83, true);


// Mairie
add_image_size ('mairie_listing_image_size', 84, 83, true);

// Politique RH
add_image_size ('politique_listing_image_size', 299, 188, true);

// CRECHE QUI SOMME NOUS
add_image_size ('qui_sommes_nous_slider_image_size', 860, 360, true);

// ACTUS
add_image_size ('actu_image_size', 350, 270, true);
add_image_size ('actu_image_size_large', 980, 342, false);
add_image_size ('creche_dediee_slider_image_size', 593, 493, false);
add_image_size ('creche_fiche_slider_image_size', 9999, 534, false);
add_image_size ('header_fiche_image_size', 9999, 584, false);
add_image_size ('bg_visite_image_size', 9999, 393, false);

add_image_size ('slide_image_cnfi_size_large', 1657, 269, false);

function getIdUserAffinity()
{
	$tIdUser = array();

	$args = array (
		'search'         => USER_JOB_AFFINITY,
		'search_columns' => array( 'user_login', 'user_nicename' )
	);

	// The User Query
	$user_query = new WP_User_Query($args);
	$tData = $user_query->results;
	if ( ! empty( $user_query->results ) )
	{
		foreach ( $user_query->results as $user )
		{
			$tIdUser[] = $user->ID;
		}
	}
	else
	{
		$tIdUser[] = 0;
	}

	return $tIdUser;

}

/**
	JOB AFFINITY
**/

add_action( 'wp_ajax_load_searchJobAffinity_results', 'load_searchJobAffinity_results' );
add_action( 'wp_ajax_nopriv_load_searchJobAffinity_results', 'load_searchJobAffinity_results' );
function load_searchJobAffinity_results($_isPage = 0, $_isBtnVoirPlus = 0 )
{

	$iNextPage          = 0;
	$iNbrResultat       = 0;
	$zOutputResult      = '';
	$zBtnVoirPlus       = '';
	$zResumeSearch      = '';
	$iPage              = (isset($_POST['iPage']))?trim($_POST['iPage']):1;
	$zListSearchJobType = (isset($_POST['zListSearchJobType']))?trim($_POST['zListSearchJobType']):'';
	$search_keywords    = (isset($_POST['search_keywords']))?trim($_POST['search_keywords']):'';
	$search_location    = (isset($_POST['search_location']))?trim($_POST['search_location']):'';
	$search_metier      = (isset($_POST['search_metier']))?intval($_POST['search_metier']):0;

	$tMetaQuerySearch   = array();
	$tMetaQueryMetier	= array();
	$aIdResult          = array();
	$aIdResultMet		= array();
	$result 		    = array();
	$tMetaLoc           = array(
								'relation'		=> 'OR',
								array(
									'key'		=> 'job_location',
									'value'		=> $search_location,
									'compare'	=> 'LIKE'
								),
								array(
									'key'		=> 'job_postalcode',
									'value'		=> $search_location,
									'compare'	=> 'LIKE'
								));


	if(trim($zListSearchJobType) != '' || trim($search_location) != '')
	{
		$tMetaQuerySearch  = array('relation' => 'AND');
		if($zListSearchJobType != '' && trim($search_location) == '')
		{
			$tJobType           = explode('|',$zListSearchJobType);
			$tMetaQuerySearch[] = array(
											'key'     => 'job_contract_type',
											'value'   => $tJobType,
											'compare' => 'IN'
										);
		}
		elseif(trim($search_location) != '' && trim($zListSearchJobType) == '')
		{
			$tMetaQuerySearch = $tMetaLoc;
		}
		elseif(trim($search_location) != '' && trim($zListSearchJobType) != '')
		{

			$tJobType            = explode('|',$zListSearchJobType);
			$tMetaQueryJobType[] = array(
										'key'     => 'job_contract_type',
										'value'   => $tJobType,
										'compare' => 'IN'
									);

			$argsJobType =  array (
									'post_type'   => 'post',
									'orderby'     => 'date',
									'order'       => 'DESC',
									'post_status' => 'publish',
									/*'offset'      => $ioffset , */
									'nopaging'    => true,
									'author__in'  => getIdUserAffinity(),
									'meta_query'  => $tMetaQueryJobType
									);

			$toJobsType		= new WP_Query( $argsJobType );//echo $toJobs->request;
			$tJobsList = $toJobsType->posts;

			if( !empty($tJobsList) )
			{
				foreach($tJobsList as $kk => $vv)
				{
					$aIdResult[] = intval($vv->ID);
				}
			}

			$tMetaQuerySearch = $tMetaLoc;
		}

		//echo "<pre>";print_r($tMetaQuerySearch); echo "</pre>";
	}


	if( intval($search_metier)> 0 )
	{

		$argsMetier =  array (
								'post_type'   => 'post',
								'orderby'     => 'date',
								'order'       => 'DESC',
								'post_status' => 'publish',
								'tax_query'   => array(
								        array(
											'taxonomy' => 'metier',
											'field'    => 'id',
											'terms'    => array(intval($search_metier))
								        )
								    )
								);

		$toMetier		= new WP_Query( $argsMetier );
		$toMetierList  = $toMetier->posts;

		if( !empty($toMetierList) )
		{
			foreach($toMetierList as $v)
			{
				array_push($aIdResultMet, $v->ID);
			}
		}

		if(count($aIdResultMet) == 0){
			$aIdResult = array(-1);
		}
		else{
			$aIdResult = $aIdResultMet;
		}
	}


	$ioffset = ($iPage-1) * NB_VOIR_PLUS_PAR_PAGE;

	if($search_keywords != '')
	{

			$args =  array (
								'post_type'      => 'post',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_status'    => 'publish',
								/*'offset'       => $ioffset ,
								'posts_per_page' => NB_VOIR_PLUS_PAR_PAGE,*/
								'nopaging'       => true,
								'author__in'     => getIdUserAffinity(),
								'meta_query'     => $tMetaQuerySearch,
								's'              => $search_keywords,
								'post__in'       => $aIdResult
							);

	}
	else
	{

			$args =  array (
								'post_type'      => 'post',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_status'    => 'publish',
								/*'offset'       => $ioffset ,
								'posts_per_page' => NB_VOIR_PLUS_PAR_PAGE,*/
								'nopaging'       => true,
								'author__in'     => getIdUserAffinity(),
								'meta_query'     => $tMetaQuerySearch,
								'post__in'       => $aIdResult
							);
	}


	$toJobs       = new WP_Query( $args );//echo $toJobs->request;

	$tJobsList    = $toJobs->posts;
	$iNbrResultat = sizeof($tJobsList);

	if($iNbrResultat >0)
	{
		foreach ($tJobsList as $tPost)
		{
			$zDate = getTimePassed($tPost->post_date);
			$zOutputResult.='
						<li>
							<a href=" '.get_permalink($tPost->ID).'" title="Voir l\'offre" >
								<div class="list-inner clearfix">
									<div class="intitule">
										<p class="titre">'.$tPost->post_title.'</p>
										<p class="desc">Entreprise : '.get_field('job_organisation',$tPost->ID).'</p>
									</div>
									<hr class="sep">
									<div class="ville">
										<p>
											'.get_field('job_location',$tPost->ID).'<br>
											'.get_field('job_postalcode',$tPost->ID).'
										</p>
									</div>
									<hr class="sep">
									<div class="poste">
										<p class="titre">'.get_field('job_contract_type',$tPost->ID).'</p>
										<p class="date">il y a '.$zDate.'</p>
									</div>
								</div>
							</a>
						</li>
						';
		}

	}
	else
	{
		if($zListSearchJobType == '' || $search_keywords != '' || $search_location != '')
		{
			$zMessage = "Il n'y a pas d'offre correspondant à votre recherche.";
		}
		else
		{
			$zMessage = "Aucun offre posté.";
		}
		$zOutputResult.= '<li class="no_job_listings_found">'.$zMessage.'</li>';
	}

	//VERIFICATION Si ON AFFICHE LE BOUTON VOIR PLUS OFFRE


	/* $ioffsetNext = ($iPage) * NB_VOIR_PLUS_PAR_PAGE; */


	if($search_keywords != '')
	{
		$argsNext =  array (
								'post_type'      => 'post',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_status'    => 'publish',
								/*
								'offset'         =>  $ioffsetNext,
								'posts_per_page' => NB_VOIR_PLUS_PAR_PAGE,*/
								'nopaging'       => true,
								'author__in'     => getIdUserAffinity(),
								'meta_query'     => $tMetaQuerySearch,
								's'              => $search_keywords,
								'post__in'       => $aIdResult
							);
	}
	else
	{
		$argsNext =  array (
								'post_type'      => 'post',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_status'    => 'publish',
								/*
								'offset'         =>  $ioffsetNext,
								'posts_per_page' => NB_VOIR_PLUS_PAR_PAGE,*/
								'nopaging'       => true,
								'author__in'     => getIdUserAffinity(),
								'meta_query'     => $tMetaQuerySearch,
								'post__in'       => $aIdResult
							);
	}
	$toJobsNext    = new WP_Query( $argsNext );//echo $toJobs->request;
	$tJobsListNext = $toJobsNext->posts;

	/*
	if(sizeof($tJobsListNext) > 0)
	{
		$iNextPage = $iPage+1;
		$zBtnVoirPlus.= '<a style="" href="#" class="load_more_jobs" id="btnVoirPlusOffre" onClick="voir_plus_offre('.$iNextPage.');return false;"><strong>Voir plus d\'offres</strong></a>';
	}
	*/




	//RESUMER DES RECHERCHE POSTE
	if($search_keywords != '' || $search_location != '')
	{
		$zResumeSearch.= '<div class="showing_jobs" id="showingResumeJobs" style="display:block;">';
		$zResumeSearch.= '<span>Les Postes ';

		if($search_keywords != '')
		{
			$zResumeSearch.= ' “'.$search_keywords.'” ';
		}

		if($search_location != '')
		{
			$zResumeSearch.= ' situés à “'.$search_location.'” ';
		}

		$zResumeSearch.= '</span>';
		$zResumeSearch.= '<a href="#" onClick="reInitSearch();return false;" class="reset">Réinitialiser</a></div>';
	}




	if($_isPage == 0)
	{

		$tData['iNextPage']     = $iNextPage;
		$tData['iNbrResultat']  = $iNbrResultat;
		$tData['zOutputResult'] = $zOutputResult;
		$tData['zResumeSearch'] = $zResumeSearch;
		$tData                  = json_encode($tData);
		header( 'Content-Type: application/json' );
		echo $tData;
	}
	else
	{
		if($_isBtnVoirPlus == 1)
		{
			return $zBtnVoirPlus;

		}
		else
		{
			return $zOutputResult;
		}
	}
	die();
}


function  getTimePassed($_zDate)
{
	$zDate = human_time_diff( strtotime( $_zDate ), current_time( 'timestamp' ) );
	$tEn = array("secs","sec", "mins", "min", "hours","hour","days","day","weeks","week","months","month","years","year");
	$tFr = array("secondes","seconde", "minutes", "minute","heurs","heur","jours","jour","semaines","semaine","mois","mois","ans","an");
	//$zDate = str_replace( $tEn , $tFr , $zDate);
	return $zDate;
}

function getListeJobType()
{
	$tReturn = array();
	$args =  array (
										'post_type' => 'post',
										'orderby'   => 'date',
										'order' => 'DESC',
										'post_status' => 'publish',
										'author__in' => getIdUserAffinity(),
										'nopaging'		=> true
										);
	$toJobs		= new WP_Query( $args );
	$tJobsList = $toJobs->posts;
	if(sizeof($tJobsList) > 0)
	{
		foreach ($tJobsList as $tPost)
		{
			$zJobType = get_field('job_contract_type',$tPost->ID);
			if(!in_array($zJobType,$tReturn) && $zJobType!='')
			{
				array_push($tReturn,$zJobType);
			}
		}
	}
	sort($tReturn);
	return $tReturn;
}


function isPostJobAffinity($_iPostId)
{
	$tIdJobAffinity = getIdUserAffinity();

	$tReturn  = false;
	$args			= array (
									'post_type'		=> 'post',
									'post__in'		=> array($_iPostId),
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'author__in' 	=> getIdUserAffinity()
								);
			$toJobs		= new WP_Query( $args );

			$tJobsList = $toJobs->posts;
			if(isset($tJobsList[0]))
			{
				$tReturn  = true;
			}

	return $tReturn;
}



add_action( 'wp_ajax_load_searchCrecheDediee_results', 'load_searchCrecheDediee_results' );
add_action( 'wp_ajax_nopriv_load_searchCrecheDediee_results', 'load_searchCrecheDediee_results' );
function load_searchCrecheDediee_results($_isPage = 0)
{
	$zSearchTerm = (isset($_POST['zSearchTerm']))?$_POST['zSearchTerm']:'';

	$toCrecheCanailles = getListeCreches ('oui', $zSearchTerm,1);
	$zOutputResult = '';

	if(sizeof($toCrecheCanailles) >0)
	{
	//AFFICHAGE RESULTAT RECHERCHE
		foreach ($toCrecheCanailles as $k=>$oCrecheCanailles)
		{

			$iIdCreche	=	$oCrecheCanailles->ID;

			$zVileNom = "" ;
			$iVilleId = rpt_get_object_relation($iIdCreche, 'ville');

			$args			= array (
									'post_type'		=> 'ville',
									'post__in'		=> $iVilleId,
									'orderby'   	=> 'date',
									'order' 		=> 'DESC',
									'post_status' 	=> 'publish',
									'nopaging'		=> true
								);
			$toVille		= new WP_Query( $args );

			//print_r ($toVille);

			$zVileNom = "" ;
			$zCodePostal = "";
			if( count($toVille) > 0 ){
				foreach( $toVille as $oVille ){
					if( trim($oVille->post_title)!='' ){
						$zVileNom = $oVille->post_title;
						$zCodePostal	= get_field('code_postal', $oVille->ID);
					}
				}
			}

			/* enlever le Paris (75020 )*/
			if (preg_match("/\b".$zCodePostal."\b/i", $zVileNom, $match))
			{
				$zVileNom = str_replace ('('.$zCodePostal.')','',$zVileNom);
				$zVileNom = str_replace ($zCodePostal,'',$zVileNom);
			}

			$toImages = get_multi_images_src('creche_dediee_slider_image_size','full',false,$iIdCreche);
			$zOutputResult.= '
				<article id="creche_'.$iIdCreche.'">

							<div class="listActu">';
							if(isset($toImages['image1'][0][0]))
							{
								$zOutputResult.= ' <div class="imgL Parent-image"><a class="image" style="background-image:url(\''.$toImages['image1'][0][0].'\')"></a></div>';
							}
							else
							{
								$zOutputResult.= ' <div class="imgL Parent-image"><a class="image" style="background-image:url(\''. get_template_directory_uri() .'/images/empty-carousel.png\')"></a></div>';
							}
			$zOutputResult.= '
							  <div class="rt">
								  <h2>'.get_field('nom_creche', $iIdCreche).'</h2>
								  <p>'.nl2br($oCrecheCanailles->post_content).'</p>
								  <span class="voir"><a href="'.get_permalink($iIdCreche).'" title="Voir la fiche">Voir la fiche</a></span>
							  </div>
							</div>


						   </article>';
		}
	}
	else
	{
		 $zOutputResult.='<article class="no-result">Aucun résultat</article>';
	}


	if($_isPage == 0)
	{
		$tData['result'] = $zOutputResult;
		$tData = json_encode($tData);
		 header( 'Content-Type: application/json' );
		echo $tData;
	}
	else
	{
		return  $zOutputResult;
	}
	die();
}



function getSelectDepartement(){

	$zHtmlSelect	= '';
	$args			= array (
							'post_type'		=> 'departement',
							'orderby'   	=> 'post_title',
							'order' 		=> 'ASC',
							'post_status' 	=> 'publish',
							'nopaging'		=> true
						);
	$toDept		= new WP_Query( $args );
	$tDeptList = $toDept->posts;
	// echo "<pre>";print_r($tDeptList);echo "</pre>";
	if(is_array($tDeptList) && !empty($tDeptList) ){
		$zHtmlSelect.= '<div class="selCategorie2">';
		$zHtmlSelect.= '<select class="selectDept" id="zSearchTerm" name="drop1" style="width:42px; overflow:hidden; position:relative; ">';
		$zHtmlSelect.= '<option value="0">Recherchez votre crèche</option>';
		foreach ($tDeptList as $tDept)
		{
			$zHtmlSelect.= '<option value="'.$tDept->ID.'">'.$tDept->post_title.'</option>';
		}
        $zHtmlSelect.= '</select></div>';
	}
	return $zHtmlSelect;
}

function getSelectMetier(){

	$zHtmlSelect = '';
	$zTaxonomies = array(
					    'metier'
					  );
	$aArgs 		 = array(
						'orderby'    => 'name',
						'order'      => 'ASC',
						'hide_empty' => false,
						'fields'     => 'all'
					);

	$aTerms = get_terms($zTaxonomies, $aArgs);

	if( is_array($aTerms) && !empty($aTerms) ){
		foreach ($aTerms as $key => $value) {
			echo $value->term_id;
			$zHtmlSelect .= "<option value='".$value->term_id."'>".$value->name."</option>";
		}
	}
	return $zHtmlSelect;
}

/*
add_action( 'init', 'create_job_metier_taxonomy', 0 );
function create_job_metier_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Metiers', 'metiers' ),
    'singular_name'              => _x( 'Metier', 'metier' ),
    'search_items'               =>  __( 'Rechercher Metiers' ),
    'popular_items'              => __( 'Metiers Popular' ),
    'all_items'                  => __( 'Tous les Metiers' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Editr Metier' ),
    'update_item'                => __( 'Modifier Metier' ),
    'add_new_item'               => __( 'Ajouter Metier' ),
    'new_item_name'              => __( 'Nouveau Metier' ),
    'separate_items_with_commas' => __( 'Séparer metier par virgule' ),
    'add_or_remove_items'        => __( 'Ajout ou suppression metier' ),
    'choose_from_most_used'      => __( 'Metiers les plus utilisés' ),
    'menu_name'                  => __( 'Métiers' ),
  );

  register_taxonomy('metier','post',array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'metier' ),
  ));
}
*/

add_action('init', 'create_job_metier_taxonomy', 0);
function create_job_metier_taxonomy() {
	register_taxonomy(
		'metier',
		'post',
		array(
				'label'             => 'Métier',
				'show_ui'           => true,
				'show_admin_column' => true,
				'hierarchical'      => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'metier')
			)
	);
}

function encrypt($data) {
    $key = "9zGKCDwI";
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data;
}

function decrypt($data) {
    $key = "9zGKCDwI";
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = mdecrypt_generic($td, base64_decode($data));
    mcrypt_generic_deinit($td);

    if (substr($data,0,1) != '!')
        return false;

    $data = substr($data,1,strlen($data)-1);
    return unserialize($data);
}

function getContentCV(){

			$toCv = get_field('contenu_cv_cnfi', ID_ARTICLLE_CV);
			
			$zReturn  = '<div class=" et_pb_row et_pb_row_7">';

				$iIncrement = 0;
				$iIncr2 = 15;

				foreach ($toCv as $oCv){

					$iIncr3 = ($iIncr3==0)?1:0;

					$zNom = $oCv['nom_cv'];
					$zFonction = $oCv['fonction_cv'];
					$zDescription = $oCv['description_cv'];
					$zPhoto = $oCv['photo_cv']['sizes']['thumbnail'];

					if($iIncrement%2==0 && $iIncrement>0){
						$zReturn .= '</div>';
						
					}

					if($iIncrement%2==0 || $iIncrement==0){
						$zReturn  .= '<div class="'.$iIncrement.' et_pb_column et_pb_column_1_3  et_pb_column_'.$iIncr2.'">';
						$iIncr2++;
					}

					if($iIncrement%2==0){
						$iIncr3 = ($iIncr3==0)?1:0;
					}

					$zReturn .= '<div class="et_pb_testimonial  et_pb_testimonial_'.$iIncr3.' et_pb_icon_off et_pb_module et_pb_bg_layout_light et_pb_text_align_left clearfix">
												  <div class="et_pb_testimonial_portrait" style="background-image: url('.$zPhoto.');"></div>
															  <div class="et_pb_testimonial_description">
																			<div class="et_pb_testimonial_description_inner">
																						  <p>'.$zDescription.'</p>
																						  <strong class="et_pb_testimonial_author">'.$zNom.'</strong>
																						  <p class="et_pb_testimonial_meta">'.$zFonction.'</p>
																			</div>
															   </div>
												   </div>
									';

					
					$iIncrement++;
				}
			$zReturn .= '</div>';
			$zReturn .= '</div>';
			echo $zReturn;
}