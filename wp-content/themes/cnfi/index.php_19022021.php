<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
get_header(); 
?> 
  <link rel='stylesheet' id='page.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/page.css' type='text/css' media='all' />
   <link rel='stylesheet' id='owl.carousel.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/owl.carousel.css' type='text/css' media='all' />
    <link rel='stylesheet' id='owl.theme.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/owl.theme.css' type='text/css' media='all' />
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/jquery-1.11.3.min.js' id='script1-js'></script>
  <body class="home page-template-default page page-id-69 et_pb_button_helper_class et_fullwidth_secondary_nav et_fixed_nav et_show_nav et_cover_background et_secondary_nav_enabled et_secondary_nav_only_menu et_pb_gutter windows et_pb_gutters3 et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_pb_footer_columns4 et_header_style_centered et_pb_pagebuilder_layout et_right_sidebar et_cnfi_theme unknown">
    <div id="page-container">
      <div id="top-header">
		<div class="navbar-header" style="float:left">
			<a href="/" class="navbar-brand" style="visibility: visible;"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" class="fa-gg"></a>
		</div>
		<div class="navbar-header-presidence" style="float:left">
			<a><img src="<?php echo WP_CONTENT_URL?>/uploads/2020/09/2020-10-21.png" alt="Coordination Nationale de la Finance Inclusive" id="logo" data-height-percentage="60"></a>
		</div>
        <div class="container clearfix">
          <div id="et-secondary-menu"> <br>
            <ul id="et-secondary-nav" class="menu">
			  <li><?php pll_the_languages(array('show_flags'=>1,'show_names'=>1)); ?></li>
			  <!--<li><a target="_blank" href="http://www.tresorpublic.mg/">Tresor Public Malagasy</a></li>-->
            </ul>
          </div>
          <!-- #et-secondary-menu --> </div>
        <!-- .container --> </div>
      <!-- #top-header -->
      <header id="main-header" data-height-onload="66">
        <div class="container clearfix et_menu_container">
          <div class="logo_container"> <span class="logo_helper"></span> <a href="/">
              <img src="<?php echo WP_CONTENT_URL?>/uploads/2020/09/logo_cnfi_madagascar_RGB.jpg" alt="Coordination Nationale de la Finance Inclusive" id="logo" data-height-percentage="60"> </a>
          </div>
          <div id="et-top-navigation" data-height="66" data-fixed-height="60">
            <nav id="top-menu-nav">
			   <!-- menu -->
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'top-menu', 'menu_class' => 'nav' ) );?>
			   <!-- fin menu -->
            </nav>
            <div id="et_top_search"> <span id="et_search_icon"></span> </div>
            <div id="et_mobile_nav_menu">
              <div class="mobile_nav closed"> <span class="select_page">S?lectionner
                  une page</span> <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
              </div>
            </div>
          </div>
          <!-- #et-top-navigation --> </div>
        <!-- .container -->
        <div class="et_search_outer">
          <div class="container et_search_form_container">
            <form role="search" method="get" class="et-search-form" action="https://www.cnfi.com/">
              <input class="et-search-field" placeholder="Rechercher ?" value=""

                name="s" title="Rechercher:" type="search"> </form>
            <span class="et_close_search_field"></span> </div>
        </div>
      </header>
      <!-- #main-header -->
      <div id="et-main-area">
        <div id="main-content">
          <article id="post-69" class="post-69 page type-page status-publish hentry">
            <div class="entry-content">
              <style type="text/css">
				body #gform_wrapper_2 {
				padding:15px 5px 15px 15px;border-radius:5px;-web-border-radius:5px;-moz-border-radius:5px;background-image:url("<?php echo WP_CONTENT_URL?>/uploads/2017/07/form-1.png");}
				</style>
              <div class="et_pb_section et_pb_fullwidth_section  et_pb_section_0 et_section_regular">
                <div class="et_pb_module et_pb_slider et_slider_auto et_slider_speed_5000  et_pb_fullwidth_slider_0">
                  <div class="et_pb_slides">
						<!-- Slides -->
						<?php getSlide(); ?>
						<!-- fin slides -->
                  </div>
                </div>
               </div>
			   <div>
			    <!--<div class="block-triangle"></div>-->
			  </div>
			 
			  <!--<div class="et_pb_section  et_section_regular section_has_divider et_pb_bottom_divider">
					
					<div class=" et_pb_row et_pb_row_0" >
						<div class="et_pb_column et_pb_column_1_3 HideImg">
							<img data-aos="fade-right" src="<?php echo WP_CONTENT_URL?>/uploads/2020/09/data-center1.png" > 
						</div>
						<div class="et_pb_column et_pb_column_2_3 aos-init aos-animate">
						<?php getBienvenue();?>
						</div>
					</div>

			  </div>-->
			  <!--- ? la une -->
			  <div class="et_pb_section_1 et_pb_section  et_section_regular section_has_divider et_pb_bottom_divider ">
					
					<div class=" et_pb_row et_pb_row_0 divider" >
						<?php getAlaUne();?>
						
						</div>
						<div class="et_pb_bottom_inside_divider" style=""></div>
					</div>
					
			  </div>
			  <!--- fin ? la une -->
              <div class="et_pb_section  et_section_regular section_has_divider et_pb_bottom_divider" style="padding: 40px 0;">
					<!--<div class="enteteTitre">
						<div class="wrapper">
							<h1 class="titre" data-aos="fade-down" > <?php echo  pll_e("Th?mes"); ?></h1>        
						</div>
					</div>-->
					<?php getDocumentation();?>
					
               </div>
			   <div class="et_pb_section_1 et_pb_section et_pb_section_0 section_has_divider et_pb_bottom_divider">		
				<div class="et_pb_row et_pb_row_0 divider">
					
					<?php getStatChiffreCle(); ?>
				</div>
				<!--<div class="et_pb_bottom_inside_divider" style=""></div>-->
				<!-- .et_pb_row -->
			   </div>

              
			
			  <!------ mitsofoka eto ny CV ------->	
					<!--<div class="et_pb_section  et_section_regular section_has_divider et_pb_bottom_divider" style="padding: 40px 0;">
					<div class="enteteTitre">
						<div class="wrapper">
							<h1 class="titre" data-aos="fade-down" > <?php echo  pll_e("Les dirigeants"); ?></h1>        
						</div>
					</div>
					<?php getContentCV(); ?>
					</div>-->
			  <!-------fin mitsofoka eto ny CV ------>
              <!-- .et_pb_section -->
              <div class="et_pb_section  et_pb_section_7 et_section_specialty">
                <div class="et_pb_row"> </div>
                <!-- .et_pb_row --> </div>
              <!-- .et_pb_section --> </div>
            <!-- .entry-content --> </article>
          <!-- .et_pb_post --> </div>
        <!-- #main-content -->
         <?php
			get_footer();
		 ?>
        <!-- #main-footer --> </div>
      <!-- #et-main-area --> </div>
    <!-- #page-container -->
    <style type="text/css" id="et-builder-advanced-style">
				

	</style>
    <style type="text/css" id="et-builder-page-custom-style">
				 .et_pb_bg_layout_dark { color: #ffffff !important; } .page.et_pb_pagebuilder_layout #main-content { background-color: rgba(255,255,255,0); } .et_pb_section { background-color: #ffffff; }
			</style>
    
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/frontend-builder-global-functions591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/jquery.mobile.custom.min591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/jquery.fitvids591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/waypoints.min591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/jquery.magnific-popup591a.js?ver=3.0.51"></script>
    <script type="text/javascript">
/* <![CDATA[ */
var et_pb_custom = {};
/* ]]> */
</script>
<script>
    $(document).ready(function($) {
      /************ start owl-demo2 *****************/
      var owl2 = jQuery("#owl-demo2");

      owl2.owlCarousel({

      items : 1, //10 items above 1000px browser width
      itemsDesktop :[1100,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [1000,1], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".owl2 .next").click(function(){
        owl2.trigger('owl.next');
      })
      $(".owl2 .prev").click(function(){
        owl2.trigger('owl.prev');
      })
      
      /************ end owl-demo1 *****************/
    });
</script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/frontend-builder-scripts591a.js?ver=3.0.51"></script>
  </body>
</html>
