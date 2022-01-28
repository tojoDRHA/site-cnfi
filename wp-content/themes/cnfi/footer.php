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

#mixedSlider {
  position: relative;
}
#mixedSlider .MS-content {
  white-space: nowrap;
  overflow: hidden;
  margin: 0 5%;
}
#mixedSlider .MS-content .item {
  display: inline-block;
  width: 33.3333%;
  position: relative;
  vertical-align: top;
  overflow: hidden;
  height: 100%;
  white-space: normal;
  padding: 0 10px;
}
@media (max-width: 991px) {
  #mixedSlider .MS-content .item {
    width: 50%;
  }
}
@media (max-width: 767px) {
  #mixedSlider .MS-content .item {
    width: 100%;
  }
}
#mixedSlider .MS-content .item .imgTitle {
  position: relative;
}
#mixedSlider .MS-content .item .imgTitle .blogTitle {
  margin: 0;
  text-align: left;
  letter-spacing: 2px;
  color: #252525;
  font-style: italic;
  position: absolute;
  background-color: rgba(255, 255, 255, 0.5);
  width: 100%;
  bottom: 0;
  font-weight: bold;
  padding: 0 0 2px 10px;
}
#mixedSlider .MS-content .item .imgTitle img {
  height: auto;
  width: 100%;
}
#mixedSlider .MS-content .item p {
  font-size: 14px;
  margin: 2px 10px 0 5px;
  text-indent: 15px;
}
#mixedSlider .MS-content .item a {
  float: right;
  margin: 0 20px 0 0;
  font-size: 16px;
  font-style: italic;
  color: rgba(173, 0, 0, 0.82);
  font-weight: bold;
  letter-spacing: 1px;
  transition: linear 0.1s;
}
#mixedSlider .MS-content .item a:hover {
  text-shadow: 0 0 1px grey;
}
#mixedSlider .MS-controls button {
  position: absolute;
  border: none;
  background-color: transparent;
  outline: 0;
  font-size: 50px;
  top: 95px;
  color: rgba(0, 0, 0, 0.4);
  transition: 0.15s linear;
}
#mixedSlider .MS-controls button:hover {
  color: rgba(0, 0, 0, 0.8);
}
@media (max-width: 992px) {
  #mixedSlider .MS-controls button {
    font-size: 30px;
  }
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls button {
    font-size: 20px;
  }
}
#mixedSlider .MS-controls .MS-left {
  left: 0px;
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls .MS-left {
    left: -10px;
  }
}
#mixedSlider .MS-controls .MS-right {
  right: 0px;
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls .MS-right {
    right: -10px;
  }
}
#basicSlider { position: relative; }

#basicSlider .MS-content {
  white-space: nowrap;
  overflow: hidden;
  margin: 0 2%;
  height: 50px;
}

#basicSlider .MS-content .item {
  display: inline-block;
  width: 20%;
  position: relative;
  vertical-align: top;
  overflow: hidden;
  height: 100%;
  white-space: normal;
  line-height: 50px;
  vertical-align: middle;
}
@media (max-width: 991px) {

#basicSlider .MS-content .item { width: 25%; }
}
@media (max-width: 767px) {

#basicSlider .MS-content .item { width: 35%; }
}
@media (max-width: 500px) {

#basicSlider .MS-content .item { width: 50%; }
}

#basicSlider .MS-content .item a {
  line-height: 50px;
  vertical-align: middle;
}

#basicSlider .MS-controls button { position: absolute; }

#basicSlider .MS-controls .MS-left {
  top: 35px;
  left: 10px;
}

#basicSlider .MS-controls .MS-right {
  top: 35px;
  right: 10px;
}
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
			interval: 3000
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
