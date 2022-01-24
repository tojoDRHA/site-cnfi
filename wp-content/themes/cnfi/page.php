<?php
/**
 * Template Name: Page Recrutement.
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
 get_header();

 
 ?>
 <section>
	<div class="main-content page_default" id="homepage">
	<?php // echo  nl2br($post->post_content) ; ?>
	<?php the_content() ; ?>
	</div>
</section>
 
 <?php
get_footer();