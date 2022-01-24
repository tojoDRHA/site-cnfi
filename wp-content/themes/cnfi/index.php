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
						<?php getSlide(); ?>
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
									getBlocAccueil("Actualités sur le secteur",0); 
									getBlocAccueil("Les projets",1); 
									getBlocAccueil("Stratégies nationales",2); 
									getBlocAccueil("Rubriques à thèmes",3); 
									getBlocAccueil("Coin Juridiques",4); 
								?>
						</div>
						<div class="et_pb_column  aos-init " style="width:58%;margin-left:17px;">
							
								<section class="content">
									<div class="wrap">

										<div class="sliderContainer">
										<?php getAlaUne();?>
										</div>

											<div class="blocList">
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<div class="colFloat shadowListHome clearFix">
													<div class="imgPt Parent-image">
														<a href="#" title="" class="image" style="background-image:url('<?php echo WP_CONTENT_URL?>/themes/cnfi/images/laureat.jpg')"></a>
													</div>
													<div class="txt">
														<p class="titre"><a href="#" title="">Développement des activités</a></p>
														<hr>
														<h2><a href="#" title="">Selon les dispositions de la loi 2005-016 du 29 septembre 2005, l’APIMF est une association civile reconnue d’utilité publique (article 61).</a></h2>
														<p class="short">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<p class="high">assurer la représentation des Institutions de microfinance et la défense des intérêts professionnels auprès du Gouvernement, auprès des institutions professionnelles des établissements de crédit ou des institutions et organisations internationales</p>
														<ul class="share">     
															 <li><a href="#" class="fb"></a><span>2<em></em></span></li>
															 <li><a href="#" class="tw"></a><span>2<em></em></span></li>
															 <li><a href="#" class="gg"></a><span>2<em></em></span></li>
														 </ul>
														<span class="lire">lire la suite</span>
													</div>
												</div>
												<p class="paginationList">
													<a href="#" class="first">&nbsp;</a>
													<a href="#" class="prev">&nbsp;</a>
													<a href="#" class="active">1</a>
													<a href="#">2</a>
													<a href="#">3</a>
													<span>...</span>
													<a href="#">54</a>
													<a href="#" class="next">&nbsp;</a>
													<a href="#" class="last">&nbsp;</a>
												</p>
											</div>
										</div>
								</section>
						</div>
				
						<div style="float:right;" class="et_pb_column et_pb_column_1_4"  data-aos="">
								<?php 
									getBlocMeteo(); 
									getBlocAccueil("Galérie Photo",1);
									getBlocAccueil("Indicateurs d'inclusion financière",2); 
									getBlocAccueil("Données clés sur la microfinance",3); 
									getBlocAccueil("Localisation géographique",4); 
									
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