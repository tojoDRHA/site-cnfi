<?php
/**
 * Template Name: Page standart.
 *
 * @package WordPress
 * @subpackage lpc
 * @since Typy 1.0
 */
 get_header();
 ?>
 <!-- sof: Main content -->
<section>
    <div class="main-content">
        <div class="bloc right">
            <div class="info">
                <div class="child">
                   <div class="wrap"> 
                        <h2>Qui sommes-nous</h2>
                        <p>Les Petites Canailles est une société privée fondée en 2011, conventionnée par la Caf, qui crée et gère des crèches pour les Entreprises et les Mairies.</p>
                        <p>Chaque jour, nous accueillons plus de 400 enfants dans nos crèches. Nous vous accompagnons également dans la recherche d’une place pour votre enfant dans un réseau de 300 crèches partenaires.</p>
                        <div class="expand">
                            <p>Chaque année, nous ouvrons de nouvelles crèches, en gardant en tête les valeurs sur lesquelles repose notre vision&nbsp;:<br>pédagogie, respect et qualité.</p>
                        </div>
                   </div>
                    <a href="#" class="arrow"></a>
                </div>
            </div>
            <div class="Parent-image" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/qsn1.jpg')"></div>
            
        </div>

        <div class="bloc left">
            <div class="Parent-image" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/qsn2.jpg');"></div>
            <div class="info">
                <div class="child">
                    <div class="wrap"> 
                        <h2>Nos valeurs<br/>pédagogiques</h2>
                        <p>Le projet éducatif « Les Petites Canailles » repose sur des valeurs fondamentales pour mener à bien nos missions : accueillir et assurer le bien-être des enfants, des familles et des professionnels.</p>
                        <div class="expand">
                            <p>Ce projet s’articule autour de 4 promesses&nbsp;:</p>
                            <ul>
                                <li>Nous nous engageons à personnaliser la relation avec l’enfant au sein d’un environnement collectif,</li>
                                <li>Nous accompagnons l’enfant dans sa construction et son autonomie à travers le jeu,</li>
                                <li>Parents&nbsp;: nous vous proposons un climat de confiance au sein duquel vous avez votre place,</li>
                                <li>Architecture et aménagement pensés pour le développement du tout-petit.</li>
                            </ul>
                        </div>
                   </div>
                   <a href="#" class="arrow"></a>
                </div>
            </div>
        </div>  
    </div>
</section>
<!-- eof: Main content -->

<section>
    <?php 
    /*
        <div class="googleMap" id="visitez">
            <p class="topTitle">Géolocalisez nos crèches</p>
            <div class="blocMap">   
                <div style="display:none;" id="blocJSMap"></div>
                <div id="map" style=" height:718px; "><?php echo load_searchCreche_results(0,1); ?></div>
                <div class="wrapBlocRech">
                    <div class="BlocRech">
                        <div class="left">
                           <div class="leftBloc">
                              <p class="rech-wrap"><input type="text" id="zSearchTerm" name="rech" required="" placeholder="Recherchez votre crèche"  class="rech"  onfocus="if(this.value == 'Recherchez votre crèche') this.value = '';" onblur="if(this.value == '') this.value = 'Recherchez votre crèche';" onKeyUp="chargerListeCreche(0)"></p>
                              <ul class="listRech" id="ulResultSearch"> 
                                <?php echo load_searchCreche_results(1,0); ?>
                              </ul>
                           </div>
                        </div>
                        <div class="right" id="blocDetailFicheCreche">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    */   
    ?>
    <?php /* remplacer la carte par bouton + CTA */ ?>

    <div class="table">
        <img src="<?php echo get_template_directory_uri() ; ?>/images/chambre3.jpg" class="imgCover" alt="" /> 
        <div class="abs">
             <div class="table_bloc">
                  <div class="table_cell">
                        <img src="<?php echo get_template_directory_uri() ; ?>/images/icones/rond.png" alt="" />
                        <div>
                            <span>Visitez nos crèches</span>
                            <?php /*<p>virtuellement</p>*/ ?> 
                        </div>                        
                        <hr class="hr" />
                        <p class="btn"> <?php /*echo $zLienVirtuel;*/ ?>
                            <a href="<?php echo get_permalink(ID_PAGE_VISITEZ); ?>" title="en savoir plus" class="btn-bleu">En savoir plus</a>
                        </p>
                  </div>
             </div>
        </div>
    </div>

</section>
<?php
	if(isset($_GET['id']))
	{
		echo ' <script type="text/javascript">
					 $( document ).ready(function() {							 						
						chargerFicheCreche('.$_GET['id'].', "#linkFicheCreche_'.$_GET['id'].'");
					 });
				</script>
		';
	}
?>
<?php
get_footer();