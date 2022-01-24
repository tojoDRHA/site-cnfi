<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */

get_header(); 

if(!isPostJobAffinity(get_the_ID()))
{
	$zCurrentLink   = get_permalink( get_the_ID() );
	$zDate  = getDateLongue(get_the_time( 'Y-m-d', get_the_ID() ));  	
	$aImages 	= get_post_custom_values( 'actu-image', get_the_ID() ); 
	$aImage		= wp_get_attachment_image_src( $aImages[0], 'actu_image_size_large' );
	$zSrc   = ''; 
	if(isset($aImage[0]))
	{
		$zSrc   = $aImage[0];
	}
	$iUserId    = $post->post_author;
	$oUserData  = get_userdata($iUserId);

	?>
	  <!-- sof: Main content -->
			<section>
				<div class="main-content clearFix">
				  <div class="blocWrap"> 
					<?php if( trim($zSrc)!='' ) {?> 	
					   <div class="Parent-image"><a class="image" style="background-image:url('<?php echo $zSrc; ?>')"></a></div> 
					<?php } ?>  
					   <article class="content">
						 <h1><?php the_title() ?></h1>   
						 <p class="pub">Publié le <?php echo $zDate; ?> - Par <?php  echo $oUserData->display_name; ?></p> 
						 <hr class="sep"/> 
						<?php echo apply_filters('the_content', $post->post_content); ?>
						 <div class="pagination2">
						
							
							
						
							<?php 
								if(get_previous_post_link())
								{
									$oPreviousPost = get_previous_post();
									$zLinkPrev = get_permalink( $oPreviousPost->ID );
									echo '<a href="'.$zLinkPrev.'" class="lire left"><span>Article</span> précédent</a>';		
								}
								
								if(get_next_post_link())
								{
									$oNextPost = get_next_post();
									$zLinkNext = get_permalink( $oNextPost->ID );
									echo '<a href="'.$zLinkNext.'" class="lire right"><span>Article</span> suivant</a>';		
								}
							?>
							 <?php echo do_shortcode("[social_share facebook='yes' twitter='yes' google='yes' urltoshare='".	get_permalink(get_the_ID())."' sharetitle='".get_the_title()."' media='".$zSrc."']"); 
							 ?>
						 </div>

					   </article> 
					  
				  </div>
					<?php listeActualitesSimilaires(get_the_ID()) ?>
			   </div>
			</section>
			<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/init/actus.js"></script>
			<!-- eof: Main content -->
<?php
}
else
{
	//JOB AFFINITY 
	
?>
	<div class="main-content">
		<div class="wrapper">
			<article class="content">
				<div class="job_shortcode single_job_listing">
							
								<h2><?php the_title() ?></h2>

					<div>			
						<ul class="meta">							
							<li  class="job-type freelance"><?php echo get_field('job_contract_type',get_the_ID()) ?></li>
							<li  class="location"><a target="_blank" href="http://maps.google.com/maps?q=<?php  echo get_field('job_location',get_the_ID()) ?>&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" class="google_map_link"><?php echo get_field('job_location',get_the_ID()) ?></a></li>
							<li  class="date-posted"><date>Posté il y a <?php  echo getTimePassed(get_the_time( 'Y-m-d H:i:s', get_the_ID() )) ?></date></li>
						</ul>

						
						<div  class="job_description">
							<?php echo apply_filters('the_content', $post->post_content); ?>
						</div>

						<div class="job_application application">											
							<a href="<?php  echo get_field('job_link',get_the_ID()) ?>" target="_blank"><input type="button" value="Postuler" class="application_button button" style="cursor:pointer;"></a>						
						</div>
											
						
					</div>
							
				</div> 
			</article>
		</div>
	</div>
<?php
}
get_footer();
