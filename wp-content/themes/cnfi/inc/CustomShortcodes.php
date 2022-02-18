<?php

/**
 * bloc blocToggle
 * Colonne Bloc toogle
 * @param mixed $args
 * @param mixed $content
 * @return
 */
add_shortcode('bloc-toogle-div', 'blocToggle');
function blocToggle( $args , $content = null ){
    
    $zTitre     = ( isset($args['titre']) ) ? trim($args['titre']) : '';
	$zShow		= ( isset($args['show']) ) ? trim($args['show']) : '';
	$zId		= ( isset($args['id']) ) ? trim($args['id']) : '';
	$zClass		= ( isset($args['class']) ) ? trim($args['class']) : '';
	$zOutput    = '';
    $zOutput    .= '<div class="blocToggle '.$zShow.' '.$zClass.'" id="'.$zId.'">';
	$zOutput    .= '	<div class="toggleBloc">';
	$zOutput    .= '		<h2>'.$zTitre.'</h2>';
	$zOutput    .= '			<div class="child"><p>';
    $zOutput    .= do_shortcode( $content );
	$zOutput    .= '			</div></p>';	
	$zOutput    .= '	</div>';	
    $zOutput    .= '</div>';
    return $zOutput;
}


add_shortcode('blocTitrePrincipale', 'blocTitre');
function blocTitre( $args , $content = null ){
    
	$zOutput    = '<p><strong style="text-transform: uppercase;font-size: 17px;">';
    $zOutput    .= do_shortcode( $content );
	$zOutput    .= '</strong></p>';	
    return $zOutput;
}


add_shortcode('blocParagraphe', 'blocParagraphe');
function blocParagraphe( $args , $content = null ){
    
	$zOutput    = '<p>';
    $zOutput    .= do_shortcode( $content );
	$zOutput    .= '</p>';	
    return $zOutput;
}


add_shortcode('buttonhRef', 'buttonhRef');
function buttonhRef( $args , $content = null ){
    
	$args = array_change_key_case( (array) $args, CASE_LOWER );

	$zHref			= ( isset($args['zhref']) ) ? trim($args['zhref']) : '';
	$ztarget		= ( isset($args['ztarget']) ) ? '_blank' : '';
	$iCenter		= ( isset($args['icenter']) ) ? 1 : 0;

	$zOutput		= "";
	if($iCenter==1){
		$zOutput		.= '<p style="text-align:center">';
	}

	$zOutput		.= '<a class="buttonP" href="'.$zHref.'" target="'.$ztarget.'">';
    $zOutput		.= do_shortcode( $content );
	$zOutput		.= '</a>';	

	if($iCenter==1){
		$zOutput		.= '</p>';
	}
    return $zOutput;
}


add_shortcode('DownlowadStrategieNationale', 'DownlowadStrategieNationale');
function DownlowadStrategieNationale( $args , $content = null ){
    
	$args = array_change_key_case( (array) $args, CASE_LOWER );

	$zRepeTeur		= ( isset($args['zrep']) ) ? trim($args['zrep']) : '';
	$zAlign		= ( isset($args['zalign']) ) ? trim($args['zalign']) : 'center';

	$toFichierDownload = get_field($zRepeTeur);
	$zOutput		= "";

	foreach ($toFichierDownload as $oFichierDownload){
		$zOutput		.= '<p style="text-align:'.$zAlign.';">';
		$zOutput		.= '<a class="" href="'.$oFichierDownload['fichier']['link'].'" target="_blank">';
		$zOutput		.=  '<span class="fa fa-rounded fa-file-pdf-o" style="#bead5d;vertical-align:middle"> </span><span class"titreDoc">&nbsp;'.$oFichierDownload['document'].'</span>';
		$zOutput		.= '</a>';	
		$zOutput		.= '</p>';
	}

    return $zOutput;
}


add_shortcode('recrutementInstitution', 'recrutementInstitution');
function recrutementInstitution( $args , $content = null ){
    
	$args = array_change_key_case( (array) $args, CASE_LOWER );

	$iId = get_the_ID();

	
	$toRepeterRecrutement = get_field('repetear', $iId);

	//print_r ($toRepeterRecrutement);

	$zOutput		= "";

	$iShow = 0;
	foreach ($toRepeterRecrutement as $toRepeterRecrutement){
		$zIntitule = $toRepeterRecrutement['intitule'];
		$zContenu = $toRepeterRecrutement['contenu'];
		$zImage = $toRepeterRecrutement['image']['url'];
		$zPermalink = "";

		$zShow = "";
		$zStyle= 'style="display: none;"';
		if($iShow==0){
			$zShow = "show";
			$zStyle= 'style="display: block;"';
		}

		$zOutput .= '<div class="blocToggle  '.$zShow.'">	
						<div class="toggleBloc toggleBloc1" style="display:inline-block">		
						<h2>'.$zIntitule.'</h2>			
							<div class="child" '.$zStyle.'>
							<div class="et_pb_column_1_3" style="float:left">
								<img src="'.$zImage.'">
							</div>
							<div class="et_pb_column_2_3" style="float:right">
								<p>'.nl2br($zContenu).'</p>
							</div>
							</div>
						</div>
					</div>';
				

		/*$zOutput .= '
					  
						<div class="colChild item">
						 <div class="colFloat">
							<div class="imgPt Parent-image">
							  <a href="'.$zPermalink.'" target="_blank"><span class="image" style="width: 50%;background-image:url(\''.$zImage.'\')"></span></a>
							</div>
							<div class="txt txt5">
								<h3><a href="'.$zPermalink.'" target="_blank">'.$zIntitule.'</a></h3>
								<hr/>
								<p>';*/


		//$zContenu = truncate($zContenu,250);


		//$zReturn .= truncate(strip_tags($zContenu), 500, '... >>> lire la suite').'</p>
		/*$zOutput .= $zContenu.'</p>
						 
						 </div>
					 </div>
				  </div>';*/
		$iShow++;
	}

    return $zOutput;
}


add_shortcode('indicateurIFM', 'indicateurIFM');
function indicateurIFM( $args , $content = null ){
    
	$args = array_change_key_case( (array) $args, CASE_LOWER );

	$zRepeTeur		= ( isset($args['zrep']) ) ? trim($args['zrep']) : '';

	$toContent = get_field($zRepeTeur);
	$zOutput		= '<p><table class="ifm" border="0">';

	foreach ($toContent as $oContent){
		$zOutput		.= '<tr>
								<td class="colInst"><span class="fa fa-rounded fa-arrow-right" style="#bead5d;vertical-align:middle"> </span>&nbsp;&nbsp;'.nl2br($oContent['intitule']).'</td>
								<td class="colvalue">'.nl2br($oContent['valeur']).'</td>
							</tr>';
	}

	$zOutput		.= '</table></p>';

    return $zOutput;
}



add_shortcode('cadrelegalAffichage', 'cadrelegalAffichage');
function cadrelegalAffichage( $args , $content = null ){
    
	$iType			= ( isset($args['iType']) ) ? trim($args['iType']) : '';
	
	$iId = get_the_ID();
	$toRepeterCacreLegal = get_field('cadrelegal_repeteur', $iId);

	$zOutput    = "<ul>";
	foreach ($toRepeterCacreLegal as $oRepeterCacreLegal){
		$zNomFichier = $oRepeterCacreLegal['nom_de_fichier'];
		$zFichier = $oRepeterCacreLegal['fichier']['url'];

		//print_r ($zFichier);
		//die();
		$zOutput    .= '<li>';	
		$zOutput    .= '<a target="_blank" href="'.$zFichier.'">'.$zNomFichier.'</a>';	
		$zOutput    .= '</li>';	
	}

	$zOutput    .= '</ul>';	
    return $zOutput;
}


add_shortcode('tableauAxeStrategie', 'tableauAxeStrategie');
function tableauAxeStrategie( $args , $content = null ){
    
	
	$zOutput    .= '<style>
						table.sn {
							border:1px solid black;
						}

						.sn tr td, tr th {
							border:1px solid black;
						}

						.sn strong {
							display:block;
						}

						.sn .col1{
							background-color:#d49999;
							width:33.33%;
						}

						.sn .col2{
							background-color:#dce0cf;
							width:33.33%;
						}

						.sn .col3{
							background-color:#e2f4ff;
						}
						</style>
						<table class="sn" >
							<tr>
								<td class="col1"><center><strong>AXE STRATEGIQUE N°1</strong>
						Education financière et protection des consommateurs</center>
						</td>
								<td class="col2"><center><strong>AXE STRATEGIQUE N°2</strong>
						Accès et utilisation des services financiers</center>
						</td>
								<td class="col3"><center><strong>AXE STRATEGIQUE N°3</strong>
						Renforcement des politiques, cadre légal et réglementaire et institutionnel</center>
						</td>
							</tr>
							<tr>
								<td class="col1"><strong>Objectif spécifique 1 :</strong>
						Amélioration de l’éducation financière de toutes les catégories de la population pour une meilleure inclusion financière
						</td>
								<td class="col2"><strong>Objectif spécifique 1 :</strong> 
						Mobilisation de l’Epargne pour faire face aux chocs et constituer un capital productif
						</td>
								<td class="col3"><strong>Objectif spécifique 1 :</strong> 
						Instauration d’un environnement favorable à l’inclusion financière
						</td>
							</tr>
							<tr>
								<td class="col1"><strong>Objectif spécifique 2 :</strong>
						Campagne d’information et de communication pour promouvoir l’inclusion financière</td>
								<td class="col2"><strong>Objectif spécifique 2 :</strong>
						Développement des opportunités d’assurance de niche pour la résilience et la productivité
						</td>
								<td class="col3"><strong>Objectif spécifique 2 : </strong>
						Renforcement de la capacité institutionnelle de la CNFI et de la CSBF
						</td>
							</tr>
							<tr>
								<td rowspan="2" class="col1"><strong>Objectif spécifique 3 :</strong>
						Protection des consommateurs de services financiers pour instaurer un climat de confiance entre la population et les fournisseurs
						</td>
								<td class="col2"><strong>Objectif spécifique 3 :</strong>
						Optimisation du paiement pour la résilience et le commerce</td>
								<td rowspan="2" class="col3"><strong>Objectif spécifique 3 :</strong>
						Instauration d’un climat de confiance entre les fournisseurs de services financiers et le système judiciaire
						</td>
							</tr>
							<tr>
								
								<td class="col2"><strong>Objectif spécifique 4 :</strong>
						Offre de crédits ciblés pour élargir les opportunités économiques</td>
								
							</tr>
						</table>';	

    return $zOutput;
}

