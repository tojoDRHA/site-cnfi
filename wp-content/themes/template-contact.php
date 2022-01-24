<?php
/**
 * Template Name: Page Contact.
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
get_header();
$tzOptions = get_site_option('typy_options');

?>

    <!-- sof: Main content -->
    <section>
        <div class="main-content">
            <div class="googleMap">
                <div class="blocMap">
                    <div class="wrap">
                        <div class="content">
                            <div class="bloc one">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/ico-home.png" alt="">

                                <h2>Siège social</h2>
                                <hr class="sep">
                                <p>
                                    96 rue Charles Laffitte<br/>
                                    92200 Neuilly-sur-Seine<br/>
									01.58.83.48.35<br/>
                                    <a href="mailto:info@lespetitescanailles.fr">info@lespetitescanailles.fr</a>
                                </p>
                            </div>

                            <div class="bloc res-hum two">
                                <h2>Ressources humaines</h2>
                                <hr class="sep">
                                <p>
                                    <a href="mailto:recrutement@lespetitescanailles.fr">recrutement@lespetitescanailles.fr</a>
                                </p>
                                <p>01.58.83.48.34</p>
                            </div>

                            <div class="bloc three">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/ico-phone.png" alt="">

                                <h2>Standard - Commercial et familles</h2>
                                <hr class="sep">
                                <p>
                                    01.58.83.48.35<br/>
                                    <a href="mailto:info@lespetitescanailles.fr">info@lespetitescanailles.fr</a>
                                </p>
                            </div>

                            <div class="bloc res four">
                                <article class="inside sociaux">
                                        <p class="title">Retrouvez-nous sur</p>
                                        <ul>
                                            <li class="fb"><a href="https://www.facebook.com/pages/Les-Petites-Canailles/247100295450682" title="" target="_blank"><span><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=" " width="17"></span></a></li>
                                            <li class="vd"><a href="http://www.viadeo.com/v/company/les-petites-canailles" title="" target="_blank"><span><img src="<?php echo get_template_directory_uri(); ?>/images/logo-viadeo.png" alt=" " width="33"></span></a></li>
                                            <li class="in"><a href="https://www.linkedin.com/company/les-petites-canailles?trk=company_logo" title="" target="_blank"><span><img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn-logo.png" alt=" " width="33"></span></a></li>
                                        </ul>
                                </article>
                            </div>

						 <div class="clear">&nbsp;</div>
					 </div>
				 </div>
				 <div id="map" style=" height:868px; "></div>
				 
			 </div>
		</div>
	</div>
</section>
<!-- eof: Main content -->
 <?php
get_footer();