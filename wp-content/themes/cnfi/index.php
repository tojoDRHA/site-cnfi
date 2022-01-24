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
  <body class="home page-template-default page page-id-69 et_pb_button_helper_class et_fullwidth_secondary_nav et_fixed_nav et_show_nav et_cover_background et_secondary_nav_enabled et_secondary_nav_only_menu et_pb_gutter windows et_pb_gutters3 et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_pb_footer_columns4 et_header_style_centered et_pb_pagebuilder_layout et_right_sidebar et_cnfi_theme unknown">
    <div id="page-container">
      <div id="top-header">
		<div class="navbar-header" style="float:left">
		<a href="/" class="navbar-brand scroll-top wow fa animated" style="visibility: visible;"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Tahirim-Bolam Panjakana" class="fa-gg"></a>
	  </div>
        <div class="container clearfix">
          <div id="et-secondary-menu"> <br>
            <ul id="et-secondary-nav" class="menu">
			  <li><a target="_blank" href="http://www.tresorpublic.mg/">Tresor Public Malagasy</a></li>
            </ul>
          </div>
          <!-- #et-secondary-menu --> </div>
        <!-- .container --> </div>
      <!-- #top-header -->
      <header id="main-header" data-height-onload="66">
        <div class="container clearfix et_menu_container">
          <div class="logo_container"> <span class="logo_helper"></span> <a href="index.html">
              <img src="wp-content/uploads/2017/07/logo_numen_madagascar_RGB.jpg"

                alt="Coordination Nationale de la Finance Inclusive" id="logo" data-height-percentage="60"> </a>
          </div>
          <div id="et-top-navigation" data-height="66" data-fixed-height="60">
            <nav id="top-menu-nav">
			  <!-- menu -->
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'top-menu', 'menu_class' => 'nav' ) );?>
					
			   <!-- fin menu -->
            </nav>
            <div id="et_top_search"> <span id="et_search_icon"></span> </div>
            <div id="et_mobile_nav_menu">
              <div class="mobile_nav closed"> <span class="select_page">Sélectionner
                  une page</span> <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
              </div>
            </div>
          </div>
          <!-- #et-top-navigation --> </div>
        <!-- .container -->
        <div class="et_search_outer">
          <div class="container et_search_form_container">
            <form role="search" method="get" class="et-search-form" action="https://www.numenmadagascar.com/">
              <input class="et-search-field" placeholder="Rechercher …" value=""

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
				padding:15px 5px 15px 15px;border-radius:5px;-web-border-radius:5px;-moz-border-radius:5px;background-image:url("wp-content/uploads/2017/07/form-1.png");}
				</style>
              <div class="et_pb_section et_pb_fullwidth_section  et_pb_section_0 et_section_regular">
                <div class="et_pb_module et_pb_slider et_slider_auto et_slider_speed_5000  et_pb_fullwidth_slider_0">
                  <div class="et_pb_slides">
						<!-- Slides -->
						<?php
							$args            = array (
										'post_type'		=> 'slide',
										'orderby'   	=> 'date',
										'order' 		=> 'DESC',
										'post_status' 	=> 'publish',
										'nopaging'		=> true
									);
							$toSlidePosts     = new WP_Query( $args );

							$toSlide = $toSlidePosts->posts;

							if( count($toSlide) > 0 ){
								foreach( $toSlide as $oSlide ){

									if( trim($oSlide->post_title)!='' ){
												
										$zTitre = get_field('slide_titre', $oSlide->ID);
										$zContenu = get_field('slide_contenu', $oSlide->ID);
										$toPhoto = get_field('slide_photo', $oSlide->ID);

										$zPhoto = "";
										if(sizeof($toPhoto)>0){
											$zPhoto =  $toPhoto['sizes']['bg_visite_image_size'];
										}

										?>
											<div class="et_pb_slide" style="background-color:#4695c6;background-image: url(<?php echo $zPhoto; ?>);" data-dots_color="#4695c6" data-arrows_color="#4695c6">
												<div class="et_pb_container clearfix">
													<div class="et_pb_slider_container_inner">
														<div class="et_pb_slide_description">
															<h2 class="et_pb_slide_title"><?php echo $zTitre; ?></h2>
															<div class="et_pb_slide_content">
															<p style="text-align: center;"><span style="color: #4695c6;"><?php echo $zContenu; ?></span></p>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php
									}
								}
							}
							
						?>
						<!-- fin slides -->
                  </div>
                </div>
              
              <div class="et_pb_section  et_pb_section_1 et_section_regular">
                <div class=" et_pb_row et_pb_row_0">
                  <div class="et_pb_column et_pb_column_1_2  et_pb_column_0">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_blurb_0 et_pb_blurb_position_top">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_off et-pb-icon-circle et-pb-icon-circle-border"

                            style="color: #4695c6; background-color: #ffffff; border-color: #4695c6;"></span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Qualité</h4>
                          <p class="p1" style="text-align: center;"><span class="s1">L’assurance
                              du succès.<br>
                              Coordination Nationale de la Finance Inclusiveest certifié ISO 9001 depuis 2007<br>
                              et </span><span class="s1">ISO 9001:2015 depuis
                              2016</span></p>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column -->
                  <div class="et_pb_column et_pb_column_1_2  et_pb_column_1">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_blurb_1 et_pb_blurb_position_top">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_off et-pb-icon-circle et-pb-icon-circle-border"

                            style="color: #4695c6; background-color: #ffffff; border-color: ef7d00;"></span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Objectifs</h4>
                          <p style="text-align: center;">Etre un opérateur de
                            confiance pour le traitement digital de documents
                            sensibles et l’externalisation des processus.<br>
                            Encourager les initiatives de nos collaborateurs et
                            les perspectives de carrière.</p>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column --> </div>
                <!-- .et_pb_row --> </div>
              <!-- .et_pb_section -->
              <!-- .et_pb_section -->
              <div class="et_pb_section  et_pb_section_2 et_pb_with_background  et_section_regular">
                <div class=" et_pb_row et_pb_row_2">
                  <div class="et_pb_column et_pb_column_4_4  et_pb_column_5">
                    <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_1">
                      <div class="et_pb_text_inner">
                        <h3 style="text-align: center;"><span style="color: #4695c6;">Au coeur des contenus et des projets métiers de ses
                            clients.</span></h3>
                      </div>
                    </div>
                    <!-- .et_pb_text --> </div>
                  <!-- .et_pb_column --> </div>
                <!-- .et_pb_row -->
                <div class=" et_pb_row et_pb_row_3">
                  <div class="et_pb_column et_pb_column_1_3  et_pb_column_6">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_2 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_top et-pb-icon-circle"

                            style="color: #ffffff; background-color: #0786b7;"></span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Numérisation patrimoniale</h4>
                          <p style="text-align: left;">Valorisez vos ouvrages et
                            documents anciens en préservant leur intégrité.</p>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column -->
                  <div class="et_pb_column et_pb_column_1_3  et_pb_column_7">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_3 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_top et-pb-icon-circle"

                            style="color: #ffffff; background-color: #0786b7;">l</span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Services éditoriaux</h4>
                          <p style="text-align: left;">Un ensemble de services
                            pour la gestion électronique de vos fonds
                            documentaires.</p>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column -->
                  <div class="et_pb_column et_pb_column_1_3  et_pb_column_8">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_4 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_top et-pb-icon-circle"

                            style="color: #ffffff; background-color: #0786b7;">i</span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Traitement de documents de gestion</h4>
                          <p style="text-align: left;">Générez des économies en
                            externalisant le traitement de vos factures
                            fournisseurs.</p>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column --> </div>
                <!-- .et_pb_row --> </div>
              <!-- .et_pb_section -->
              <div class="et_pb_section  et_pb_section_4  et_section_regular">
                <div class=" et_pb_row et_pb_row_4">
                  <div class="et_pb_column et_pb_column_4_4  et_pb_column_9">
                    <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center  et_pb_text_2">
                      <div class="et_pb_text_inner">
                        <h1><span style="color: #4695c6;">Nos engagements</span></h1>
                      </div>
                    </div>
                    <!-- .et_pb_text --> </div>
                  <!-- .et_pb_column --> </div>
                <!-- .et_pb_row -->
                <div class=" et_pb_row et_pb_row_5">
                  <div class="et_pb_column et_pb_column_1_2  et_pb_column_10">
                    <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_3">
                      <div class="et_pb_text_inner"> <img class="aligncenter wp-image-460"

                          src="wp-content/uploads/2017/04/Mains_accord.png" alt=""

                          height="108" width="180"> </div>
                    </div>
                    <!-- .et_pb_text --> </div>
                  <!-- .et_pb_column -->
                  <div class="et_pb_column et_pb_column_1_2  et_pb_column_11">
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_5 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left et-pb-icon-circle et-pb-icon-circle-border"

                            style="color: #ffffff; background-color: #4695c6; border-color: #4695c6;">N</span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Satisfaire, accompagner et proposer les meilleurs
                            processus à nos clients</h4>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb -->
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_6 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left et-pb-icon-circle et-pb-icon-circle-border"

                            style="color: #ffffff; background-color: #4695c6; border-color: #4695c6;">N</span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Etre en permanence dans une dynamique de recherche
                            d'amélioration</h4>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb -->
                    <div class="et_pb_blurb et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_blurb_7 et_pb_blurb_position_left">
                      <div class="et_pb_blurb_content">
                        <div class="et_pb_main_blurb_image"><span class="et-pb-icon et-waypoint et_pb_animation_left et-pb-icon-circle et-pb-icon-circle-border"

                            style="color: #ffffff; background-color: #4695c6; border-color: #4695c6;">N</span></div>
                        <div class="et_pb_blurb_container">
                          <h4>Placer nos collaborateurs au centre de nos
                            préoccupations pour travailler dans les meilleures
                            conditions possibles</h4>
                        </div>
                      </div>
                      <!-- .et_pb_blurb_content --> </div>
                    <!-- .et_pb_blurb --> </div>
                  <!-- .et_pb_column --> </div>
                <!-- .et_pb_row --> </div>
              <!-- .et_pb_section -->

             </div>
			 </div>
			  <!------ mitsofoka eto ny CV ------->
					<?php getContentCV(); ?>
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
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/frontend-builder-scripts591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="wp-includes/js/wp-embed.min125b.js?ver=4.7.4"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzUzxaZskMxa_NS4HJ4tL3NHWwRmlbyBk&ver=3.0.51#038;callback=initMap"></script>
  </body>
</html>
