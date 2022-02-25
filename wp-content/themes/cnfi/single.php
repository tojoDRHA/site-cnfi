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
  <!--<link rel='stylesheet' id='bootstrap.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/bootstrap.css' type='text/css' media='all' />-->
  <link rel='stylesheet' id='page.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/page.css' type='text/css' media='all' />
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/jquery-1.11.3.min.js' id='script1-js'></script>
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/bootstrap.min.js' id='bootstrap-script-js'></script>
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/script.js' id='script-js'></script>
  
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
					
					<div class="  " >
						<div class="aos-init aos-animate" style="padding:50px">
							<div class="enteteTitre center">
								<div class="wrapper">
									<h1 class="titrePage center" data-aos="fade-down" ><?php the_title(); ?></h1>        
								</div>
							</div>
							<div data-aos="fade-up">
							
								<section class="content">
									<div class="wrap">
										<?php $zPhoto = get_field('photo_actu', get_the_ID());?>
										<div class="imgPt Parent-image" style="margin-right: 17px;">
											<a href="#" target="_blank" title="" class="image" style="background-image:url('<?php echo $zPhoto?>')"></a>
										</div>
										<?php nl2br(the_content()) ; ?>
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
         <?php
			get_footer();
		 ?>

</html>
