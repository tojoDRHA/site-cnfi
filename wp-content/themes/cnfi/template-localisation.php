<?php
/**
 * Template Name: Page Localisation.
 *
 * @package WordPress
 * @subpackage lpc
 * @since Typy 1.0
 */
 get_header();
 ?>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

<script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"
  integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh"
  crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
  integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
  crossorigin=""></script>
<script type="text/javascript">
	 window.urlFrontAjax = "<?php echo get_template_directory_uri(); ?>/front-ajax.php";
</script>
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
			    <div class="block-triangle"></div>
			  </div>
			 
			  <div class="et_pb_section et_section_regular section_has_divider et_pb_bottom_divider">
					<div class="et_pb_row et_pb_row_localisation et_pb_row_0" style="padding: 36px 0;">
					    <!-- start filarianne -->
						<div class="wrap">
						  <p class="filarianne">
						  <?php
								getMenuBreadcumbs();
						   ?>
						   </p>
						</div>
						<!-- end filarianne-->
						<div class="et_pb_column et_pb_column_all aos-init aos-animate border-red">
							<div class="enteteTitre center">
								<div class="wrapper">
									<h1 class="titrePage center" data-aos="fade-down" ><?php the_title(); ?></h1>        
								</div>
							</div>
							<div class="et_pb_column et_pb_column_1_3 " style="float:left;position:absolute;z-index:5000">
								<div class="gf_browser_unknown  " id="gform_wrapper_34" >
										<div class="gform_body" style="position:absolute">
												<!-- bloc en bleu -->
												<div class="bloc blocBlue">
													<div class="imgPt Parent-image1">
														<a href="#" title="" class="image"></a>
														<div class="blocAbs" style="position:relative">
															<div class="txt">
																<h2 class="center"><?php echo  pll_e("Recherche"); ?></h2>
																<hr>
																<span class="thingPadding">
																	Type d'institution : 
																	<select id="iTypeId" name="iTypeId" onChange="changeAll();">
																		<?php getTypeInstitution(); ?>
																	</select>
																</span>
																<span class="thingPadding">
																	Recherche par Région : 
																	<select id="iRegionId" style="width:100%" name="iRegionId" onChange="getDistrict(this.value)">
																		<?php getRegion(); ?>
																	</select>
																</span>
																<span class="thingPadding" id="isDistrict" style="display:none">
																	Recherche par District : 
																	<select id="iDistrictId" style="width:100%;" name="iDistrictId" onChange="getCommune(this.value)">
																		<option value="0">Tous</option>
																	</select>
																</span>
																<span class="thingPadding" id="isCommune" style="display:none">
																	Recherche par Commune : 
																	<select id="iCommuneId" style="width:100%;" name="iCommuneId">
																		<option value="0">Tous</option>
																	</select>
																</span>
																<span class="thingPadding">
																	Recherche par nom : 
																	<input type="text" style="width:100%" value="" name="zSearchAdvenced" id="zSearchAdvenced">
																</span>
																<span class="thingPadding">
																	<input type="button" class="gform_search" name="btnSearch" id="btnSearch" value="Rechercher">
																</span>
															</div>
														</div>
													</div>
												</div>
												<!-- fin bloc en bleu -->
										</div>
								</div>
						    </div>
							<div data-aos="fade-up">
							<div id="map" style="width: 100%; height: 700px; border: 1px solid #AAA;"></div>
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
        <!-- #main-footer --> </div>
      <!-- #et-main-area --> </div>
    <!-- #page-container -->
    <style type="text/css" id="et-builder-advanced-style">		
		.et_pb_section {
			padding: 17px 0!important;
		}
	</style>
    <style type="text/css" id="et-builder-page-custom-style">
				 .et_pb_bg_layout_dark { color: #ffffff !important; } .page.et_pb_pagebuilder_layout #main-content { background-color: rgba(255,255,255,0); } .et_pb_section { background-color: #ffffff; }
			</style>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/css/maps/markers.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/css/maps/leaf-demo.js'></script>
  </body>
</html>
