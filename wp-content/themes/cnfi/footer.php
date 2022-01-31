<footer id="main-footer">
    <div class="container et_menu_container" style="max-width:1080px;">
        <div id="footer-widgets" class="clearfix">
            <div class="footer-widget">
                <div id="custom_html-4" class="widget_text fwidget et_pb_widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
                        <div class="card">
                            <h3 id="ftitle">
                                <?php echo  pll_e("Contacts"); ?>
                            </h3>
                            <div>
                                <span class="fa fa-rounded fa-map-marker"></span>
                                &nbsp; 21, Rue Rainitovo Antsahavola Antananarivo
                            </div>
                            <div>
                                <span class="fa fa-rounded fa-phone"></span>
                                &nbsp;(261) 020 22 383 85
                            </div>
                            <div>
                                <span class="fa fa-rounded fa-phone"></span>
                                &nbsp;(261) 020 22 626 33
                            </div>
                            <div>
                                <span class="fa fa-rounded fa-envelope"></span>&nbsp;
                                <a href="mailto:coordmicrofinance@moov.mg">
                                    coordmicrofinance@moov.mg
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .fwidget -->
            </div>
            <!-- end .footer-widget -->
            <div class="footer-widget">
                <div id="custom_html-5" class="widget_text fwidget et_pb_widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
                        <div class="card">
                            <h3 id="ftitle">
                                <?php echo pll_e("Liens Utiles"); ?>
                            </h3>
							<?php
								wp_nav_menu(array(
									'menu'    => 16, //menu id
								));
							?>
                        </div>
                    </div>
                </div>
                <!-- end .fwidget -->
            </div>
            <!-- end .footer-widget -->
            <div class="footer-widget">
                <div id="custom_html-6" class="widget_text fwidget et_pb_widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
						<div class="card">
                            <h3 id="ftitle">
                                <?php echo  pll_e("Cours de Change"); ?>
                            </h3>
                            <div>
                                <?php getDevise(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .fwidget -->
            </div>
            <!-- end .footer-widget -->
        </div>
        <!-- #footer-widgets -->
    </div>
	<style>


</style>
	<script src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/multislider.js"></script> 
	<script>
		AOS.init({   
			delay: 0,
			duration: 1500
		});

    </script>
	<script>
		$('#mixedSlider').multislider({
			duration: 750,
			interval: 5000
		});
</script>
    <!-- .container -->
    <div id="footer-bottom">
        <div class="container clearfix">
            <div id="footer-info">CNFI</div>
        </div>
        <!-- .container -->
    </div>
</footer>
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
	<script src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/chaty-pro-front.js"></script>
	<script src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/litespeed.js"></script> 
	<script src="<?php echo WP_CONTENT_URL?>/themes/cnfi/js/litespeed-media.js"></script>
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
