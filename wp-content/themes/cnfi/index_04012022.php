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
  
   <link rel="stylesheet" href="<?php echo WP_CONTENT_URL?>/themes/cnfi/css/formoid-solid-blue-chart.css" type="text/css" />
 <script type='text/javascript' src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/highcharts.js"></script>
 <script type='text/javascript' src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/highcharts-3d.js"></script>
 <script type='text/javascript' src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/exporting.js"></script>
 <script type='text/javascript' src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/export-data.js"></script>
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
			  <!--- à la une -->
						<?php getAlaUne();?>
			  <!--- fin à la une -->
              <div class="et_pb_section  et_section_regular section_has_divider et_pb_bottom_divider">
					<?php getDocumentation();?>	
               </div>
			   <!--- à la une -->
				<?php /*getStatChiffreCle();*/ ?>
				<?php getRandomStat(); ?>

				<div class="et_pb_section_0 et_pb_section">
					<div class="et_pb_row et_pb_row_0 divider">
					<div class="enteteTitre center">
						<div class="wrapper">
							<h1 class="titrePage center">Galerie de photos</h1>        
						</div>
					</div>
					<?php
					echo do_shortcode('[smartslider3 slider="2"]');
					?>
					</div>
				</div>
			   <!--- fin à la une -->
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