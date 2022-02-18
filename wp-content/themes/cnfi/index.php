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
					background-image:url("<?php echo WP_CONTENT_URL?>/uploads/2017/07/form-1.png");
				}
				</style>
              <div class="et_pb_section et_pb_fullwidth_section  et_pb_section_0 et_section_regular">
                <div class="et_pb_module et_pb_slider et_slider_auto et_slider_speed_5000  et_pb_fullwidth_slider_0">
                  <div class="et_pb_slides">
						<!-- Slides -->
						<?php /*getSlide();*/ ?>
						<!-- fin slides -->
                  </div>
                </div>
               </div>
			   <div>
			    <!--<div class="block-triangle"></div>-->
			  </div>
			 
				<div class="et_pb_section et_section_regular section_has_divider et_pb_bottom_divider">
					
					<div class=" et_pb_row et_pb_row_0" >
						<!-- start filarianne -->
						<div class="wrap">
						  <p class="filarianne">&nbsp;</p>
						</div>
						<!-- end filarianne-->
						<div class="et_pb_column et_pb_column_1_4"  data-aos="">
								<?php 
									/*getBlocTag("Galérie Photo",4); */
									getBlocAccueilActuSecteur("Actualités sur le secteur"); 
									getBlocAccueil("Les projets",1,"projet-en-cours",1); 
									getBlocAccueil("Stratégies nationales",2,"strategies-nationales-dinclusion-financiere"); 
									getBlocAccueil("Rubriques à thèmes",3,'rubriques-a-themes'); 
									getBlocAccueil("Coin Juridiques",4,'coin-juridiques'); 
								?>
						</div>
						<div class="et_pb_column  aos-init " style="width:58%;margin-left:17px;">
							
								<section class="content">
									<div class="wrap">

										<div class="sliderContainer">
										<!-- multi slider -->
											<?php getAlaUne();?>
										<!-- multi slider -->
										</div>

											<div class="blocList">
												<?php getArchive();?>
											</div>
										</div>
								</section>
						</div>
				
						<div style="float:right;" class="et_pb_column et_pb_column_1_4"  data-aos="">
								<?php 
									getBlocMeteo(); 
									getBlocAccueil("Gallérie Photos",1,'galerie-photo');
									getBlocAccueil("Indicateurs d'inclusion financière",2,"indicateurs-de-linclusion-financiere-a-madagascar"); 
									getBlocAccueil("Données clés sur la microfinance",3,"statistiques"); 
									getBlocAccueil("Localisation géographique",4,'localisation-geographique'); 
									
								?>
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
		 <link href="<?php echo WP_CONTENT_URL?>/themes/cnfi/css/horizontal.min.css" rel="stylesheet" type="text/css" media="screen" />
         <?php
			get_footer();
		 ?>