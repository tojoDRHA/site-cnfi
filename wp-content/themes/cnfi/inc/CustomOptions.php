<?php

add_action( 'admin_init', 'themeOptionsInit' );
add_action( 'admin_menu', 'themeOptionsAddPage' );

/**
 * Init plugin options to white list our options
 */
function themeOptionsInit(){
	register_setting( 'sample_options', 'typy_options', 'themeOptionsValidate' );
}

/**
 * Load up the menu page
 */
function themeOptionsAddPage() {
	add_theme_page( __( 'Theme Options', 'cnfi' ), __( 'Theme Options', 'cnfi' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' theme options', 'cnfi' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'cnfi' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'typy_options' ); ?>

			<table class="form-table">
				<tr valign="top"><th scope="row"><?php _e( 'Facebook', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkFacebook]" class="regular-text" type="text" name="typy_options[lnkFacebook]" value="<?php esc_attr_e( $options['lnkFacebook'] ); ?>" />
						<label class="description" for="typy_options[lnkFacebook]"><?php _e( 'Lien Facebook', 'cnfi' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkTwitter]" class="regular-text" type="text" name="typy_options[lnkTwitter]" value="<?php esc_attr_e( $options['lnkTwitter'] ); ?>" />
						<label class="description" for="typy_options[lnkTwitter]"><?php _e( 'Lien Twitter', 'cnfi' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Google+', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkGoogle]" class="regular-text" type="text" name="typy_options[lnkGoogle]" value="<?php esc_attr_e( $options['lnkGoogle'] ); ?>" />
						<label class="description" for="typy_options[lnkGoogle]"><?php _e( 'Lien Google+', 'cnfi' ); ?></label>
					</td>
				</tr>  
				<tr valign="top"><th scope="row"><?php _e( 'Linkedin', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkLinkedin]" class="regular-text" type="text" name="typy_options[lnkLinkedin]" value="<?php esc_attr_e( $options['lnkLinkedin'] ); ?>" />
						<label class="description" for="typy_options[lnkLinkedin]"><?php _e( 'Lien Linkedin', 'cnfi' ); ?></label>
					</td>
				</tr>                 
				<tr valign="top"><th scope="row"><?php _e( 'Youtube', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkYoutube]" class="regular-text" type="text" name="typy_options[lnkYoutube]" value="<?php esc_attr_e( $options['lnkYoutube'] ); ?>" />
						<label class="description" for="typy_options[lnkYoutube]"><?php _e( 'Lien Youtube', 'cnfi' ); ?></label>
					</td>
				</tr>                                  
				<tr valign="top"><th scope="row"><?php _e( 'Pinterest', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[lnkPinterest]" class="regular-text" type="text" name="typy_options[lnkPinterest]" value="<?php esc_attr_e( $options['lnkPinterest'] ); ?>" />
						<label class="description" for="typy_options[lnkPinterest]"><?php _e( 'Lien Pinterest', 'cnfi' ); ?></label>
					</td>
				</tr>                   
				<tr valign="top"><th scope="row"><?php _e( 'Adresse', 'cnfi' ); ?></th>
					<td>
						<textarea id="typy_options[typyAdresse]" class="large-text" cols="50" rows="10" name="typy_options[typyAdresse]"><?php echo esc_textarea( $options['typyAdresse'] ); ?></textarea>
						<label class="description" for="typy_options[typyAdresse]"><?php _e( 'Adresse sur la page contact', 'cnfi' ); ?></label>
					</td>
				</tr>                          
				<tr valign="top"><th scope="row"><?php _e( 'Url Google Map', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[typyUrlGmap]" class="regular-text" type="text" name="typy_options[typyUrlGmap]" value="<?php esc_attr_e( $options['typyUrlGmap'] ); ?>" />
						<label class="description" for="typy_options[typyUrlGmap]"><?php _e( 'ex: https://goo.gl/maps/Smhny', 'cnfi' ); ?></label>
					</td>
				</tr>  
				<tr valign="top"><th scope="row"><?php _e( 'Téléphone', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[typyTelephone]" class="regular-text" type="text" name="typy_options[typyTelephone]" value="<?php esc_attr_e( $options['typyTelephone'] ); ?>" />
						<label class="description" for="typy_options[typyTelephone]"><?php _e( 'Téléphone sur la page contact', 'cnfi' ); ?></label>
					</td>
				</tr>  
				<tr valign="top"><th scope="row"><?php _e( 'Email', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[typyEmail]" class="regular-text" type="text" name="typy_options[typyEmail]" value="<?php esc_attr_e( $options['typyEmail'] ); ?>" />
						<label class="description" for="typy_options[typyEmail]"><?php _e( 'Email page contact', 'cnfi' ); ?></label>
					</td>
				</tr>  


				<tr valign="top"><th scope="row"><?php _e( 'Url réalisation en direct (fr) ', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[typyRealisationDirectFr]" class="regular-text" type="text" name="typy_options[typyRealisationDirectFr]" value="<?php esc_attr_e( $options['typyRealisationDirectFr'] ); ?>" />
						<label class="description" for="typy_options[typyRealisationDirectFr]"><?php _e( 'Adresse réalisations en direct', 'cnfi' ); ?></label>
					</td>
				</tr> 

				<tr valign="top"><th scope="row"><?php _e( 'Url réalisation en direct (en) ', 'cnfi' ); ?></th>
					<td>
						<input id="typy_options[typyRealisationDirectEn]" class="regular-text" type="text" name="typy_options[typyRealisationDirectEn]" value="<?php esc_attr_e( $options['typyRealisationDirectEn'] ); ?>" />
						<label class="description" for="typy_options[typyRealisationDirectEn]"><?php _e( 'Adresse réalisations en direct', 'cnfi' ); ?></label>
					</td>
				</tr>
				
			</table>			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'cnfi' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}
    
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function themeOptionsValidate( $tzInput ) {
	$tzInput['lnkFacebook']   = wp_filter_nohtml_kses( $tzInput['lnkFacebook'] );
    $tzInput['lnkTwitter']    = wp_filter_nohtml_kses( $tzInput['lnkTwitter'] );
    $tzInput['lnkGoogle']     = wp_filter_nohtml_kses( $tzInput['lnkGoogle'] );
    $tzInput['lnkLinkedin']   = wp_filter_nohtml_kses( $tzInput['lnkLinkedin'] );
    $tzInput['lnkYoutube']    = wp_filter_nohtml_kses( $tzInput['lnkYoutube'] );
    $tzInput['lnkPinterest']  = wp_filter_nohtml_kses( $tzInput['lnkPinterest'] );
    $tzInput['typyAdresse']   = wp_filter_nohtml_kses( $tzInput['typyAdresse'] );
	$tzInput['typyUrlGmap']   = wp_filter_nohtml_kses( $tzInput['typyUrlGmap'] );	
    $tzInput['typyTelephone'] = wp_filter_nohtml_kses( $tzInput['typyTelephone'] );
    $tzInput['typyEmail']		= wp_filter_nohtml_kses( $tzInput['typyEmail'] );    
	$tzInput['typyRealisationDirectFr']		= wp_filter_nohtml_kses( $tzInput['typyRealisationDirectFr'] );  
	$tzInput['typyRealisationDirectEn']		= wp_filter_nohtml_kses( $tzInput['typyRealisationDirectEn'] );  
	return $tzInput;
}
