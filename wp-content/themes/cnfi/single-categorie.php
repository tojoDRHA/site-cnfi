<?php
/**
 * The template for displaying single category realisation pages
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
get_header(); 
$oClient = get_post( $iIdClient );
$iIdPageRealisation	= icl_object_id( ID_PAGE_REALISATION, 'page', true );	
$iIdPageRealDirect  = icl_object_id( ID_PAGE_REALISATION_DIRECT, 'page', true );
?>
<script type="text/javascript">
jQuery('li#menu-item-2262 > a').addClass('MenuActive');
</script>
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
               <div class="wrapBloc clearFix topTitle">
                  <div class="Bloc">
                          <h1><?php echo $oClient->post_title; ?></h1>
                          <div class="bt_abs">
                            <a href="javascript:history.back();" class="btRetour br_5 retour"><span><?php echo __('retour', 'typy'); ?></span></a>
                            <a href="<?php echo get_permalink($iIdPageRealDirect); ?>" class="bt2 br_5 grille"><span>&nbsp;</span></a>
                            <a href="<?php echo get_permalink($iIdPageRealisation); ?>" class="bt2 br_5 listeR active"><span>&nbsp;</span></a><br/>
                            
                            <span>
                                 <a href="javascript:void(0);" class="bt2 br_5 coeur"><span>&nbsp;</span></a>
                                <a href="javascript:void(0);" class="Filtre br_5"><span><?php _e( 'FILTRES', 'typy' ); ?></span></a>
                            </span>  
                          </div>        
                 </div>
              </div>
           </div>
      </section>
      <!-- Fin Section Gris-->

     <!-- popup filtre -->
      <section class="popup">
           <div class="bgPopup">     
	<?php 
			$args      		=  array ( 
								'post_type'        => 'categorie',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'post_status'      => 'publish',
								'nopaging'         => true
								);
			$toCat			= new WP_Query( $args ); 	
			$toCategories   = $toCat->posts;
			$iNbCategories  = count($toCategories);
			$iNbColCat      = ( $iNbCategories > 5 )?ceil( $iNbCategories/5 ):1;  	
	?>

				<?php if( $iNbCategories > 0 ) : ?>                 
                    <div class="first">
                       <div>
                           <h2><?php echo __('Catégorie', 'typy'); ?></h2>
                           <p>
                           <?php 
                                $k  = 0;
                                $m  = 5;                       
                                for( $i=0; $i<$iNbColCat; $i++ ){            
                                    echo '<span>';
                                    for( $j=$k; $j<$m; $j++ ){                                        
                                        if( trim($toCategories[$j]->post_title)!='' ){
                                            $zLink = get_permalink( $toCategories[$j]->ID );
											if( $oClient->ID == $toCategories[$j]->ID ){
												echo '<a href="'.$zLink.'" title="'.$toCategories[$j]->post_title.'" class="active"><em>'.ucfirst($toCategories[$j]->post_title).'</em></a>';
											}
											else{
												echo '<a href="'.$zLink.'" title="'.$toCategories[$j]->post_title.'"><em>'.ucfirst($toCategories[$j]->post_title).'</em></a>';
											}
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
                <?php 
					endif; 
				
					$args      		=  array ( 
										'post_type'        => 'secteur',
										'orderby'          => 'date',
										'order'            => 'DESC',
										'post_status'      => 'publish',
										'nopaging'         => true
										);
					$toSec			= new WP_Query( $args ); 	
					$toSecteurs		= $toSec->posts;
					$iNbSecteurs	= count($toSecteurs);
					$iNbColSec      = ( $iNbSecteurs > 5 )?ceil( $iNbSecteurs/5 ):1;								
					if( $iNbSecteurs > 0 ) : 					
					?>
                    <div class="last">
                       <div>
                           <h2><?php echo __('Secteur', 'typy'); ?></h2>
                           <p>
                           <?php                           
                                $r  = 0;
                                $s  = 5;                
                                for( $p=0; $p<$iNbColSec; $p++ ){            
                                    echo '<span>';
                                    for( $q=$r; $q<$s; $q++ ){                                               
                                        if( trim($toSecteurs[$q]->post_title)!='' ){
											$zSecteurLink = get_permalink( $toSecteurs[$q]->ID );
											echo '<a href="'.$zSecteurLink.'"><em>'.$toSecteurs[$q]->post_title.'</em></a>';                                    
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
  
    <?php 
	
		$tiIdRealisation = rpt_get_object_relation(get_the_ID(), 'realisation');
		$paged 	 		 = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$temp			 = $wp_query; 
		$wp_query		 = null;
		
		
		if( count($tiIdRealisation)>0 && $tiIdRealisation!=false ) :
		
			$tiIdRealisation = ( count($tiIdRealisation)>0 && $tiIdRealisation!=false)?$tiIdRealisation:array(0);
			
			$args			 = array(
									'post_type'		=> 'realisation',
									'post__in'		=> $tiIdRealisation,
									'orderby'   	=> 'date',
									'order' 		=> 'ASC',
									'post_status' 	=> 'publish',
									'paged'			=> $paged , 
									'posts_per_page'=> NB_REALISATION_PAR_PAGE
								);
			query_posts($args);

			while ($wp_query->have_posts()) : $wp_query->the_post();
				$zSeparator = '';
				// catégorie & secteur
				$tzCat		= getCategorieRealisation( get_the_ID() );	
				$tzClient	= getClientRealisation( get_the_ID() );
				$tzSec		= getSecteurRealisation( get_the_ID() );		
				$zSrc   	= typyGetFeaturedImage ( get_the_ID(), false, 'realisation_listing_image_size');
				if( count($tzCat)>0 && count($tzSec)>0 ){
					$zSeparator .= ', ';
				}
				$zCat		= ( count($tzCat)>0 )? implode( ' - ', $tzCat ).$zSeparator:'';
				$zSec		= ( count($tzSec)>0 )? implode( ' - ', $tzSec ):'';	
?>

           <div class="wrap Full">
               <div class="wrapBloc ImgLeft clearFix">
                    <div class="Left Parent-image heightFond" >
                       <?php if( trim($zSrc)!='' ): ?> 
                       <a class="image" style="background-image:url('<?php echo $zSrc; ?>')"></a>
                       <?php endif; ?>
                    </div>
                    <div class="Right heightFond">
                         <div class="Right_1 clearFix">
                                <h2><?php the_title(); ?></h2>                         
                                <h3>
								<?php echo strtoupper( $tzClient[0] ); ?> | 
								<?php echo strtoupper($zCat); ?>  
								<?php echo strtoupper($zSec); ?> 
								</h3>                                
								<p>
								 <?php 
                                        $zContenu = get_field( 'realisation_description_courte', get_the_ID() );//get_the_content();
                                        //echo truncate($zContenu, 250, '');  
                                        echo $zContenu; 
                                    ?>
								</p>
                                <a href="<?php echo get_permalink( get_the_ID() ); ?>">
									<?php _e( 'Voir le projet', 'typy' ); ?>
								</a>
                         </div>
                    </div>                    
             </div>              
           </div>
			<?php 
				endwhile;		
				if (function_exists("wp_pagination")) { wp_pagination(); wp_reset_query(); }; 
				$wp_query = null;  $wp_query = $temp;
				
			else:
				$wp_query = null;  $wp_query = $temp;
			?>	
				<div class="noContent">
				<p><?php echo __('Pas de contenu disponible.', 'typy'); ?></p>
				</div>
			<?php 
			endif;
			?> 
           </div>
      </section>
      <!-- Fin Position Absolute image Left-->
		<?php echo do_shortcode('[blocContact]'); ?>		  
    </section>		   
 <?php
get_footer();