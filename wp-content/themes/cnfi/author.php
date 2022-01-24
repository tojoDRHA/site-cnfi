<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); 
$iCurAuthorId = get_the_author_ID();
?>
<script type="text/javascript">
jQuery('li#menu-item-2347 > a').addClass('MenuActive');
</script>
<section class="content pageBlog">
        <!-- popupPartage-->
        <section class="popupPartage">
             <div>
                 <img src="<?php echo get_template_directory_uri(); ?>/images/icones/arrow2.png"/>
                 <h3>Vous aimez ? Partagez !</h3>
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
               <div class="wrapBloc clearFix topTitle">
                  <div class="Bloc">
                          <h1><?php _e( 'blog', 'typy' ); ?></h1>
                          <div class="bt_abs">
                            <a href="javascript:history.back();" class="btRetour br_5"><span><?php _e( 'RETOUR', 'typy' ); ?></span></a>
                            <span>
                                 <a href="javascript:void(0);" class="bt2 br_5 coeur">&nbsp;</a>
                                 <a href="javascript:void(0);" class="Filtre br_5"><span><?php _e( 'FILTRES', 'typy' ); ?></span></a>
                            </span>  
                          </div>        
                 </div>
              </div>
           </div>
      </section>
      <!-- Fin Section Gris-->
	  
	  
     <!-- popup filtre -->     
     <?php

        $args = array(
        	'child_of'                 => 0,
        	'parent'                   => '',
        	'orderby'                  => 'name',
        	'order'                    => 'ASC',
        	'hide_empty'               => 0,
            'exclude'                  => 2, 
        	'hierarchical'             => 1,
        	'taxonomy'                 => 'category'
        
        );            
        $toCategories   = get_categories( $args );
        $iNbCategories  = count($toCategories);
        $iNbColCat      = ( $iNbCategories > 5 )?ceil( $iNbCategories/5 ):1;  
        $toAuthors      = get_users();
        $iNbAuthor      = count($toAuthors);
        $iNbColAuthor   = ( $iNbAuthor > 5 )?ceil( $iNbAuthor/5 ):1;         
                 
     ?>     
      <section class="popup">
           <div class="bgPopup"> 
                                          
                <?php if( $iNbCategories > 0 ) : ?>                 
                    <div class="first">
                       <div>
                           <h2><?php echo __('Catégorie', 'typy'); ?></h2>
                           <p>
                           <?php 
                                /* affichage 5 catégories par colonnes */
                                $k  = 0;
                                $m  = 5;                       
                                for( $i=0; $i<$iNbColCat; $i++ ){            
                                    echo '<span>';
                                    for( $j=$k; $j<$m; $j++ ){
                                        if( trim($toCategories[$j]->name)!='' ){
                                            $zLink = get_category_link( $toCategories[$j]->cat_ID );
                                            echo '<a href="'.$zLink.'" title="'.$toCategories[$j]->name.'"><em>'.ucfirst( strtolower($toCategories[$j]->name) ).'</em></a>';
                                        }
                                    }
                                    $k += 5;
                                    $m += 5;
                                    echo '</span>';
                                }
                           ?>                                                        
                           </p>                       
                       </div>                   
                    </div>
                <?php endif; ?>   
                
                
                <?php if( $iNbAuthor > 0 ) : ?>                               
                    <div class="last">
                       <div>
                           <h2><?php echo __('Auteur', 'typy'); ?></h2>
                           <p>
                           <?php  
                                /* affichage 5 auteurs par colonnes */                          
                                $r		= 0;
                                $s 		= 5;         

                                for( $p=0; $p<$iNbColAuthor; $p++ ){            
                                    echo '<span>';
                                    for( $q=$r; $q<$s; $q++ ){ 
                                        if( trim($toAuthors[$q]->data->display_name)!='' ){
                                            $oUserData      = get_userdata($toAuthors[$q]->data->ID);
                                            $zAuthorLink    = get_author_posts_url($toAuthors[$q]->data->ID);
                                            $zClass 		= ( $iCurAuthorId==$toAuthors[$q]->data->ID )?' class="active" ':'';	
											if( $oUserData->last_name!='' && $oUserData->first_name ){
                                                echo '<a href="'.$zAuthorLink.'" '.$zClass.'><em>'.ucfirst($oUserData->last_name) . " " . ucfirst($oUserData->first_name).'</em></a>';
                                            }
                                            else{
                                                echo '<a href="'.$zAuthorLink.'" '.$zClass.'><em>'.ucfirst( strtolower($toAuthors[$q]->display_name) ).'</em></a>';
                                            }											
                                        }
                                    }
                                    $r += 5;
                                    $s += 5;
                                    echo '</span>';
                                }
                           ?>                                                        
                           </p>    
                       </div>                  
                    </div>
                <?php endif; ?> 
				<div class="clear"></div>
           </div>
      </section>
      <!-- fin popup filtre --> 	  
	  

   <!-- Position Absolute image Left-->
  <section class="list-Blog"> 
    <?php if ( have_posts() ) : ?>
          
            <?php
            	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;     
                while ( have_posts() ) : the_post();
                    $zDate  = get_the_time( 'd.m.Y', get_the_ID() );  
                    $zSrc   = typyGetFeaturedImage ( get_the_ID(), false, 'blog_listing_image_size'); 
                    $oCat 	= get_the_category( get_the_ID() );                                                                   
            ?>    
           <div class="wrap Full">
               <div class="wrapBloc ImgLeft clearFix">
					<div class="Left Parent-image heightFond" style="height:300px;"> 
					<?php if( trim($zSrc)!='' ): ?>                           
						<a class="image" style="background-image:url('<?php echo $zSrc; ?>')"></a>  
						 <?php endif; ?>                          
					</div> 
					
					<div class="Right heightFond">
						 <div class="Right_1 clearFix">
								<h3>
								<?php echo strtoupper( $oCat[0]->name ); ?> | <?php echo strtoupper($zDate); ?></h3> 							 
								<h2><?php the_title() ?></h2>                                   
								<p>
								<?php 
                                        $zContenu = get_the_content();
										$zContenu = strip_tags ($zContenu);
                                        echo truncate($zContenu, 250, ' ...');
								?>
								</p>
								<a href="<?php the_permalink() ?>"><?php _e( 'Lire l’article', 'typy' ); ?></a>
						 </div>
					</div>  					
             </div>              
           </div>
		   <?php endwhile; ?> 
			<div class="blocPagination">		   
				<?php if (function_exists("wp_pagination")) { wp_pagination(); wp_reset_query(); }; ?>  
            </div>
    <?php 
		else :			
            echo '<div class="erreur"><p style="text-align:center;"><span>'.__('Pas d\'article disponible dans cette section.', 'typy').'</span></p></div>';
		endif;        
     ?>           
       
       </div>
  </section>
  <!-- Fin Position Absolute image Left-->
</section> 
 <?php
get_footer();