
<?php
/**
 * Template Name: Page Galerie.
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
get_header(); 

?> 
      <link rel='stylesheet' id='page222.css'  href='<?php echo WP_CONTENT_URL?>/plugins/foogallery/extensions/default-templates/shared/css/foogallery.css' type='text/css' media='all' />
	  <!-- #main-header -->
      <div id="et-main-area">
        <div id="main-content">
          <article id="post-69" class="post-69 page type-page status-publish hentry">
            <div class="entry-content">
              
              <div class="et_pb_section et_pb_fullwidth_section  et_pb_section_0 et_section_regular">
                <div class="et_pb_module et_pb_slider et_slider_auto et_slider_speed_5000  et_pb_fullwidth_slider_0">
                  <div class="et_pb_slides">
						
                  </div>
                </div>
               </div>
			   <div>
			  </div>
			 
			  <div class="et_pb_section et_section_regular section_has_divider et_pb_bottom_divider">
					
					<div class=" et_pb_row et_pb_row_0" >
						<!-- start filarianne -->
						<div class="wrap">
						  <p class="filarianne">
						  <?php
								getMenuBreadcumbs();
						   ?>
						   </p>
						</div>
						<!-- end filarianne-->
						<div class="aos-animate">
							<!--<div class="enteteTitre center">
								<div class="wrapper">
									<h1 class="titrePage center" data-aos="fade-down" ><?php the_title(); ?></h1>        
								</div>
							</div>-->
							<div data-aos="fade-up">
							
								<section class="content11">
									<div class="wrap11">
										<?php the_content() ; ?>
									</div>
								</section>
							</div>
						</div>
						
					</div>

					
			  </div>
             
              <!-- .et_pb_section -->
              <div class="et_pb_section  et_pb_section_7 et_section_specialty">
                <div class="et_pb_row"> </div>
                <!-- .et_pb_row --> </div>
              <!-- .et_pb_section --> </div>
            <!-- .entry-content --> </article>
          <!-- .et_pb_post --> </div>
        <!-- #main-content -->
		 <script src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/masonry.min.js?ver=4.2.2' id='masonry-js'></script>
		 <script src='<?php echo WP_PLUGIN_URL?>/foogallery/extensions/default-templates/shared/js/foogallery.js?ver=2.1.33' id='foogallery-core-js'></script>
         <?php
			get_footer();
		 ?>
        <!-- #main-footer --> </div>
      <!-- #et-main-area --> </div>
    <!-- #page-container -->
    
