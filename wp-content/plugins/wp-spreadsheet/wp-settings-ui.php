<?php
function wpspreadsheet_show_ui_settings_page(){ 
      
    $iSuccess    = ( isset($_GET['success']) )? intval($_GET['success']):0;
    if( $iSuccess == 1 ): 
?>      
 	<div id="message" class="updated below-h2 fade" style="margin-top:30px; margin-left:5px; width:600px; cursor:pointer;" onclick="jQuery('div#message').css('display','none');">
    <p style="float:right; font-size:10px; font-variant:small-caps; color:#600000; padding-top:4px;">(fermer)</p>
    <p><b>La synchronisation s'est terminée avec succès !<br/> Vérifiez la mise à jour de vos données.</b></p>
	</div>    
<?php endif; ?>
 
        <div class="wrap metabox-holder has-right-sidebar" id="poststuff">
			<div id="post-body">
				<div id="post-body-content">
                    <h2>Import Google Spreadsheets</h2>         
					<br/>
					<div id="wpspeadsheet-settings" class="postbox">
					<div class="handlediv" title="Click to toggle"><br/></div><h3 class="hndle"><span>Paramètres</span></h3>
					<div class="inside">
					<form name="wpspreadsheet_options" method="POST" action="options.php">
						<?php settings_fields( 'wpspeadsheet-settings-group' ); ?>
						<input type="hidden" name="zPostFormAction" value="save" />

						<table>					                                                
						<tr>
							<td scope="row">Google Client Id</td> 
							<td><input type="text" name="wpspreadsheet_google_client_id" value="<?php echo get_option('wpspreadsheet_google_client_id'); ?>" style="width: 400px;" /></td>
						</tr>                        
                                                
						<tr>
							<td scope="row">Google Client Secret</td> 
							<td><input type="text" name="wpspreadsheet_google_client_secret" value="<?php echo get_option('wpspreadsheet_google_client_secret'); ?>" style="width: 400px;" /></td>
						</tr>                         
                        
						<tr>
							<td scope="row">Spreadsheet Title</td> 
							<td>
                                <?php if( get_option('wpspreadsheet_spreadsheet_sheet_title')=='Creches' ): ?>
                                    <input type="text" name="wpspreadsheet_spreadsheet_sheet_title" value="<?php echo get_option('wpspreadsheet_spreadsheet_sheet_title'); ?>" style="width: 400px;" disabled="disabled" />
                                <?php else: ?>
                                    <input type="text" name="wpspreadsheet_spreadsheet_sheet_title" value="Creches" style="width: 400px;" disabled="disabled"/>                                
                                <?php endif; ?>
                            </td>                            
						</tr>                                                 
						</table>
						<hr/>
						<div>
							<p>Statut par défaut des posts importés ?</p>
							<select name="wpspreadsheet_default_status">
								<option name="" <?php echo (get_option('wpspreadsheet_default_status')==''?'selected':''); ?>  ></option>
								<option name="draft" <?php echo (get_option('wpspreadsheet_default_status')=='draft'?'selected':''); ?> >draft</option>
								<option name="publish" <?php echo (get_option('wpspreadsheet_default_status')=='publish'?'selected':''); ?> >publish</option>
								<option name="private" <?php echo (get_option('wpspreadsheet_default_status')=='private'?'selected':''); ?> >private</option>
								<option name="future" <?php echo (get_option('wpspreadsheet_default_status')=='future'?'selected':''); ?> >future</option>
								<option name="pending" <?php echo (get_option('wpspreadsheet_default_status')=='pending'?'selected':''); ?> >pending</option>
							</select>
							<span></span>
						</div>
						<p class="submit">
							<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
						</p>
					</form>
                    
                    <?php  if( !isset($_SESSION['access_token']) ) : ?>
    					<form name="wpspreadsheet_connect" method="POST" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" style="" onclick="return checkData();">
    						<input type="hidden" name="zPostFormAction" value="connect"/>
    						<p class="submit">
    						<input type="submit" class="button-primary" name="submit" value="Connexion Google API" /> 
    						</p>
    					</form>
                    <?php endif; ?>                    
					</div>
					</div>
                    <?php  if( isset($_SESSION['access_token']) && $_SESSION['access_token'] ) : ?>
                    <div id="wpspeadsheet-settings" class="postbox">
    					<div class="handlediv" title="Click to toggle"><br/></div>
                        <h3 class="hndle">
                            <span>Google API status : <a style="color: green;font-weight: bold;">CONNECTED</a> </span>
                        </h3>
    					<div class="inside">                      
    						<table>					              
        						<tr>
        							<td scope="row">
                    					<form name="wpspreadsheet_preview" method="POST" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" style="" onclick="return confirm('Synchroniser les données?')">
                    						<input type="hidden" name="zPostFormAction" value="preview"/>
                    						<p class="submit">
                    						   <input type="submit" class="button-primary" name="submit" value="Synchronisation" /> <br/><br/>Lancer la synchronisation des posts avec Googgle Spreadsheet
                    						</p>
                    					</form>                                                        
                                    </td>                               
        						</tr>                                                                      
                            </table>
                        </div>
                    </div>                    
                    <?php endif; ?>
                    </div>

				</div> <!-- end post body content -->
			</div>

		</div><!-- end wrap-->        
    	<script type="text/javascript">
	      function checkData(){
	          if( jQuery("input[name='wpspreadsheet_google_client_id']").val().length==0 ){
                  alert("Veuillez fournir ID Client Google.");   
	              return false;
	          }
              if( jQuery("input[name='wpspreadsheet_google_client_secret']").val().length==0 ){
                  alert("Veuillez fournir ID Client Secret.");
                  return false;  
              }
              return true;
	      }
    	</script>                
	<?php
} 
// end wpspreadsheet_show_ui_settings_page
