<?php
/**
 * The template for displaying custom taxo realisation
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */

get_header(); 
$oTerm      = get_term_by('name', $wp_query->queried_object->name, 'clients');
$oClient    = get_term( $oTerm, $taxonomy, $output, $filter );
$zAcfNom    = get_field('client_nom','clients_'.$oClient->term_id);
$zNomClient = ( trim($zAcfNom)!='' )?$zAcfNom:$oClient->name;
?>

<section class="content">

        <!-- popupPartage-->
        <section class="popupPartage">
             <div>
                 <img src="<?php echo get_template_directory_uri(); ?>/images/icones/arrow2.png"/>
                 <p class="textH3"><?php echo __('Vous aimez ? Partagez !','typy'); ?></p>
                 <p>
                    <a href="javascript:void(0);" class="fb br_5" id="shareFacebook" title="<?php echo get_bloginfo('name').' | '.get_the_title(); ?>" rel="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php echo __('Facebook', 'typy'); ?>
                    </a>
                    <a href="javascript:void(0);" class="twitter br_5" id="shareTwitter" title="<?php echo get_bloginfo('name').' | '.get_the_title(); ?>" rel="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php echo __('Twitter', 'typy'); ?>
                    </a>
                    <a href="javascript:void(0);" class="mail br_5" id="shareMail" title="<?php echo get_bloginfo('name').' | '.get_the_title(); ?>" rel="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php echo __('Email', 'typy'); ?>
                    </a>
                 </p>
             </div>
        </section>
        <!-- fin popupPartage-->

       <!-- Section Gris-->
      <section class="Gris Blog">
           <div class="wrap Full">
               <div class="wrapBloc clearFix  topTitle">
                  <div class="Bloc">
                          <h1><?php _e( 'blog', 'typy' ); ?></h1>
                          <div class="bt_abs">
                            <a href="javascript:history.back();" class="btRetour br_5 "><span><?php _e( 'RETOUR', 'typy' ); ?></span></a>
                            <span>
                                 <a href="javascript:void(0);" class="bt2 br_5 coeur">&nbsp;</a>
                                 <a class="Filtre br_5"><span><?php _e( 'FILTRES', 'typy' ); ?></span></a>
                            </span>  
                          </div>        
                 </div>
              </div>
           </div>
      </section>
      <!-- Fin Section Gris-->

   <!-- Position Absolute image Left-->
  <section class="fiche">

            <?php 

                $paged          = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                $zTermSlug      = get_query_var( 'term' );
                $zTaxonomyName  = get_query_var( 'taxonomy' );
                $zCurrentTerm   = get_term_by( 'slug', $zTermSlug, $zTaxonomyName );                
                $args           = array(
                                            'post_type'        => 'realisation',
                                            'posts_per_page'   => NB_ARTICLE_BLOG_PAR_PAGE,
                            				'orderby'          => 'date',
                            				'order'            => 'DESC',
                            				'post_status'      => 'publish',
                            				'paged'            => $paged,  
                                            'tax_query'        => array(
                                                                            array(
                                                                                'taxonomy'  => $zTaxonomyName,
                                                                                'field'     => $zTermSlug,
                                                                                'terms'     => $zCurrentTerm,
                                                                            )
                                                                       )
                                        );
                
                                
            	$toRealisation =  query_posts($args);   

                if ( have_posts() ) :    
                    while ( have_posts() ) : the_post();                           
                        $toTerms = get_the_terms( get_the_ID(), 'clients' );
                        //$zSubCat = get_terms                        
                        //$zDate  = get_the_time( 'd.m.Y', get_the_ID() );  
                        //$zSrc   = typyGetFeaturedImage ( get_the_ID(), false, 'blog_listing_image_size'); 
                        //$oCat 	= get_the_category( get_the_ID() );                                                                   
            ?>    
           <div class="wrap Full">
               <div class="wrapBloc ImgLeft clearFix">
                    <div class="Left Parent-image" style="height:300px;">
                       <?php if( trim($zSrc)!='' ): ?> 
                       <a class="image" style="background-image:url('<?php echo $zSrc; ?>')"></a>
                       <?php endif; ?>
                    </div>
                    <div class="Right ">
                         <div class="Right_1 clearFix">                         
                                <h3><?php echo strtoupper($zNomClient); ?> | <?php echo strtoupper($oClient->name); ?> </h3>
                                <h2><?php the_title() ?></h2>
                                <?php the_content(); ?>
                                <a href="<?php the_permalink() ?>"><?php _e( 'Voir le projet', 'typy' ); ?></a>
                         </div>
                    </div>                    
             </div>              
           </div>
		   <?php endwhile; ?>                      
		   <?php if (function_exists("wp_pagination")) { wp_pagination(); wp_reset_query(); }; ?>            
    <?php 
		else :			
            echo '<div class="nocontent"><p style="text-align:center;"><span>'.__('Pas de projet disponible dans cette section.', 'typy').'</span></p></div>';
		endif;        
     ?>                      
       </div>
  </section>
  <!-- Fin Position Absolute image Left-->
</section> 
 <?php
get_footer();