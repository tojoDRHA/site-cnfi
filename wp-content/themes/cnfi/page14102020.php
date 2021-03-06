<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Typy
 * @since Typy 1.0
 */
get_header(); 
?> 
  <link rel='stylesheet' id='bootstrap.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/bootstrap.css' type='text/css' media='all' />
  <link rel='stylesheet' id='page.css'  href='<?php echo WP_CONTENT_URL?>/themes/cnfi/css/page.css' type='text/css' media='all' />
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/jquery-1.11.3.min.js' id='script1-js'></script>
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/bootstrap.min.js' id='bootstrap-script-js'></script>
  <script type='text/javascript' src='<?php echo WP_CONTENT_URL?>/themes/cnfi/js/script.js' id='script-js'></script>
  <body class="home page-template-default page page-id-69 et_pb_button_helper_class et_fullwidth_secondary_nav et_fixed_nav et_show_nav et_cover_background et_secondary_nav_enabled et_secondary_nav_only_menu et_pb_gutter windows et_pb_gutters3 et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_pb_footer_columns4 et_header_style_centered et_pb_pagebuilder_layout et_right_sidebar et_cnfi_theme unknown">
    <div id="page-container">
      <div id="top-header">
		<div class="navbar-header" style="float:left">
		<a href="/" class="navbar-brand scroll-top wow fa animated" style="visibility: visible;"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Tahirim-Bolam Panjakana" class="fa-gg"></a>
	  </div>
        <div class="container clearfix">
          <div id="et-secondary-menu"> <br>
            <ul id="et-secondary-nav" class="menu">
			  <li><?php pll_the_languages(array('show_flags'=>1,'show_names'=>1)); ?></li>
			  <!--<li><a target="_blank" href="http://www.tresorpublic.mg/">Tresor Public Malagasy</a></li>-->
            </ul>
          </div>
          <!-- #et-secondary-menu --> </div>
        <!-- .container --> </div>
      <!-- #top-header -->
      <header id="main-header" data-height-onload="66">
        <div class="container clearfix et_menu_container">
          <div class="logo_container"> <span class="logo_helper"></span> <a href="index.html">
              <img src="<?php echo WP_CONTENT_URL?>/uploads/2020/09/logo_cnfi_madagascar_RGB.jpg" alt="Coordination Nationale de la Finance Inclusive" id="logo" data-height-percentage="60"> </a>
          </div>
          <div id="et-top-navigation" data-height="66" data-fixed-height="60">
            <nav id="top-menu-nav">
			  <!-- menu -->
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'top-menu', 'menu_class' => 'nav' ) );?>
					
			   <!-- fin menu -->
            </nav>
            <div id="et_top_search"> <span id="et_search_icon"></span> </div>
            <div id="et_mobile_nav_menu">
              <div class="mobile_nav closed"> <span class="select_page">S??lectionner
                  une page</span> <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
              </div>
            </div>
          </div>
          <!-- #et-top-navigation --> </div>
        <!-- .container -->
        <div class="et_search_outer">
          <div class="container et_search_form_container">
            <form role="search" method="get" class="et-search-form" action="https://www.cnfi.com/">
              <input class="et-search-field" placeholder="Rechercher ???" value=""

                name="s" title="Rechercher:" type="search"> </form>
            <span class="et_close_search_field"></span> </div>
        </div>
      </header>
      <!-- #main-header -->
      <div id="et-main-area">
        <div id="main-content">
			<article id="post-69" class="post-69 page type-page status-publish hentry">
				<div class="entry-content">
						<div class="et_pb_section et_section_regular section_has_divider et_pb_bottom_divider">
								<div class=" et_pb_row et_pb_row_0" >
									<!-- -->
									<section class="content">
										<div class="wrap">
											<div class="blocToggle">
												<div class="toggleBloc">
													<h2>Pr??senter un projet</h2>
												</div>
												<div class="child">
													<p>
														Pour permettre aux services de p??diatrie, m??decine de l???adolescent et g??riatrie des ??tablissements publics et priv??s non lucratifs de pr??senter un projet et d???obtenir une subvention, la Fondation H??pitaux de
														Paris-H??pitaux de France met ?? leur disposition, chaque ann??e au mois de mai et d???octobre, les formulaires de demandes de subvention t??l??chargeables en ligne.
													</p>
													<p class="paper">Pour les projets de p??diatrie et de m??decine de l???adolescent, dossier disponible d??s le mois d???octobre.</p>
													<p class="paper">Pour les projets de g??riatrie, le dossier est disponible d??s le mois de mai.</p>
													<ul>
														<li>
															Les projets doivent s???inscrire dans les six th??mes d???intervention de la Fondation : rapprochement des familles, lutte contre la douleur, d??veloppement des activit??s, am??lioration de l???accueil, prise en charge des
															adolescents en souffrance et la transition adolescents-jeunes adultes.
														</li>
														<li>La Fondation ne subventionne ni la recherche m??dicale, ni les ??ventuelles r??mun??rations du personnel hospitalier, ni les frais de fonctionnement des associations.</li>
														<li>Pour ??tre instruit, le dossier doit imp??rativement tenir compte des modalit??s figurant en derni??re page de ce document.</li>
													</ul>
													<p class="tel">
														Pour toute information compl??mentaire, contacter <strong>Christelle Manzano au 01 40 27 19 29 </strong>ou <a href="mailto:christelle.manzano@fondationhopitaux.fr">christelle.manzano@fondationhopitaux.fr</a>
													</p>

													<!-- start blocTab-->
													<div class="blocTab">
														<span class="toggleTab"></span>
														<div class="nav nav-tabs">
															<li class="active"><a data-toggle="tab" href="#pj">Pi??ces Jaunes</a></li>
															<li><a data-toggle="tab" href="#pados">Programme ados</a></li>
															<li><a data-toggle="tab" href="#pjadulte">Programme Jeunes Adultes</a></li>
															<li><a data-toggle="tab" href="#plusvie">+ de Vie</a></li>
														</div>

														<div class="tab-content">
															<div id="pj" class="tab-pane fade">
																<div class="colFloat">
																	<div class="txt">
																		<p><strong>Pi??ces Jaunes 2015</strong></p>
																		<p>
																			<a href="#" class="bx"> Dossier de demande de subvention 2015 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																		<p>
																			<a href="#" class="bx"> Lettre d???accompagnement ados 2015 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																	</div>
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																</div>
																<div class="clear"></div>
															</div>
															<div id="pados" class="tab-pane fade in active">
																<div class="colFloat">
																	<div class="txt">
																		<p><strong>Programme ados 2015</strong></p>
																		<p>
																			<a href="#" class="bx"> Dossier de demande de subvention 2016 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																		<p>
																			<a href="#" class="bx"> Lettre d???accompagnement ados 2015 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																	</div>
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																</div>
																<div class="clear"></div>
															</div>
															<div id="pjadulte" class="tab-pane fade">
																<div class="colFloat">
																	<div class="txt">
																		<p><strong>Programme Jeunes Adultes 2015</strong></p>
																		<p>
																			<a href="#" class="bx"> Dossier de demande de subvention 2017 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																		<p>
																			<a href="#" class="bx"> Lettre d???accompagnement ados 2015 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																	</div>
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																</div>
																<div class="clear"></div>
															</div>
															<div id="plusvie" class="tab-pane fade">
																<div class="colFloat">
																	<div class="txt">
																		<p><strong>Plus de vie 2015</strong></p>
																		<p>
																			<a href="#" class="bx"> Dossier de demande de subvention 2018 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																		<p>
																			<a href="#" class="bx"> Lettre d???accompagnement ados 2015 </a><br />
																			<a href="#" title="" class="bt btBleu br_24">t??l??charger</a>
																		</p>
																	</div>
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>
													<!-- start blocTab-->
												</div>
											</div>

											<div class="blocToggle">
												<div class="toggleBloc">
													<h2>Concourir ?? un Prix</h2>
												</div>
												<div class="child">
													<div class="listColor">
														<h3>Prix Pi??ces Jaunes et + de Vie</h3>
													</div>
													<p>La Fondation H??pitaux de Paris-H??pitaux de France organise depuis 1994, un prix qui r??compense les ??tablissements qui se sont mobilis??s pour sensibiliser le public aux op??rations Pi??ces Jaunes et + de Vie.</p>
													<ul class="puce">
														<li>Pour le Prix Pi??ces Jaunes, le dossier est disponible au d??but du mois de d??cembre.</li>
														<li>Pour le Prix + de Vie, le dossier est disponible ?? la fin du mois d???ao??t.</li>
													</ul>

													<ul>
														<li>Ces prix, ind??pendants des subventions accord??es, sont destin??s ?? financer des projets en vue d???am??liorer la qualit?? de vie des enfants, adolescents et des personnes ??g??es hospitalis??s.</li>
														<li>
															Des crit??res d???attribution sont ?? prendre en consid??ration : les actions doivent avoir lieu aux dates de l???op??ration Pi??ces Jaunes ou + de Vie et les enfants et adolescents d???une part et les personnes ??g??es d???autre
															part doivent ??tre au c??ur de la mobilisation.
														</li>
														<li>Trois Prix par op??ration sont d??cern??s : le premier Prix d???un montant de 7 700 euros, le deuxi??me Prix d???un montant de 3 100 euros, le troisi??me Prix d???un montant de 1 600 euros.</li>
													</ul>
													<p class="tel">Pour toute information compl??mentaire, contacter <strong>Maud ALFONSI au 01 40 27 19 25 </strong>ou <a href="mailto:maud.alfonsi@fondationhopitaux.fr ">maud.alfonsi@fondationhopitaux.fr </a></p>
													<br />
													<p class="paper paper2">T??l??charger le <a href="#">formulaire du Prix Pi??ces Jaunes 2015</a></p>
													<p class="paper paper2">T??l??charger le <a href="#">formulaire du Prix + de Vie 2015</a></p>
													<p><strong>Pour d??couvrir les ??tablissements laur??ats des Prix 2014-2015, choisissez Pi??ces Jaunes ou + de vie et vous serez redirig?? vers la page d??di??e :</strong></p>
													<p class="logoInside">
														<a href="#"><img src="images/jaunes-big.png" alt="" /></a>
														<a href="#"><img src="images/vie-big.png" alt="" /></a>
													</p>
													<div class="listColor">
														<h3>Prix H??lioscope-GMF</h3>
													</div>
													<p>
														Ce prix, organis?? par la Fondation H??pitaux de Paris-H??pitaux de France et la GMF, a pour objectif de r??compenser des ??quipes hospitali??res ayant r??alis?? des actions de coop??ration mises en oeuvre entre les diff??rents
														services ou m??tiers de l???h??pital au b??n??fice du malade et de ses proches. Cinq h??pitaux laur??ats sont d??sign??s. L???ensemble des dossiers est examin?? par un jury compos?? de repr??sentants de la Fondation et de repr??sentants
														de la GMF.
													</p>
													<p class="tel">Pour toute information compl??mentaire, contacter <strong>ean-Luc Lepan au 01 40 27 45 90 </strong>ou <a href="mailto:jeanluc.lepan@fondationhopitaux.fr">jeanluc.lepan@fondationhopitaux.fr</a></p>
													<p class="paper paper2">T??l??charger le <a href="#">formulaire du Prix H??lioscope - GMF 2015</a></p>
													<p class="paper paper2">T??l??charger le <a href="#">r??glement du Prix H??lioscope - GMF 2015</a></p>
													<p><strong>Etablissements laur??ats du Prix H??lioscope-GMF 2015</strong></p>
													<div class="contBloc owl3">
														<div id="owl-demo3">
															<div class="colChild item">
																<div class="colFloat">
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																	<div class="txt">
																		<p><strong>l???H??pital de Dieppe ??? Grand Prix Pi??ces Jaunes ??? 7 700 ???</strong></p>
																		<p>
																			Au CHU de Dieppe, le mois de janvier a ??t?? rythm?? par Pi??ces Jaunes. Plusieurs animations ont ??t?? propos??es aux enfants hospitalis??s : zumba g??ante organis??e par l?????cole d???infirmi??res, accueil des
																			??coles, coll??ges et lyc??es pour d??couvrir le monde de l???h??pital, concours de dessin, match de basket f??minin au profit de Pi??ces Jaunes, accueil des footballeurs du FC Dieppe pour une rencontre avec
																			les enfants et les ados hospitalis??s autour des r??alisations financ??es par l???op??ration Pi??ces Jaunes, r??alisation d???un barom??tre g??ant par les patients d???art-th??rapie... Gr??ce ?? la r??compense du Prix
																			Pi??ces Jaunes, l???h??pital de Dieppe va pouvoir d??corer les services de p??diatrie et de n??onatalogie.
																		</p>
																	</div>
																</div>
															</div>

															<div class="colChild item">
																<div class="colFloat">
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																	<div class="txt">
																		<p><strong>l???H??pital de Dieppe ??? Grand Prix Pi??ces Jaunes ??? 7 700 ???</strong></p>
																		<p>
																			Au CHU de Dieppe, le mois de janvier a ??t?? rythm?? par Pi??ces Jaunes. Plusieurs animations ont ??t?? propos??es aux enfants hospitalis??s : zumba g??ante organis??e par l?????cole d???infirmi??res, accueil des
																			??coles, coll??ges et lyc??es pour d??couvrir le monde de l???h??pital, concours de dessin, match de basket f??minin au profit de Pi??ces Jaunes, accueil des footballeurs du FC Dieppe pour une rencontre avec
																			les enfants et les ados hospitalis??s autour des r??alisations financ??es par l???op??ration Pi??ces Jaunes, r??alisation d???un barom??tre g??ant par les patients d???art-th??rapie... Gr??ce ?? la r??compense du Prix
																			Pi??ces Jaunes, l???h??pital de Dieppe va pouvoir d??corer les services de p??diatrie et de n??onatalogie.
																		</p>
																	</div>
																</div>
															</div>

															<div class="colChild item">
																<div class="colFloat">
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																	<div class="txt">
																		<p><strong>l???H??pital de Dieppe ??? Grand Prix Pi??ces Jaunes ??? 7 700 ???</strong></p>
																		<p>
																			Au CHU de Dieppe, le mois de janvier a ??t?? rythm?? par Pi??ces Jaunes. Plusieurs animations ont ??t?? propos??es aux enfants hospitalis??s : zumba g??ante organis??e par l?????cole d???infirmi??res, accueil des
																			??coles, coll??ges et lyc??es pour d??couvrir le monde de l???h??pital, concours de dessin, match de basket f??minin au profit de Pi??ces Jaunes, accueil des footballeurs du FC Dieppe pour une rencontre avec
																			les enfants et les ados hospitalis??s autour des r??alisations financ??es par l???op??ration Pi??ces Jaunes, r??alisation d???un barom??tre g??ant par les patients d???art-th??rapie... Gr??ce ?? la r??compense du Prix
																			Pi??ces Jaunes, l???h??pital de Dieppe va pouvoir d??corer les services de p??diatrie et de n??onatalogie.
																		</p>
																	</div>
																</div>
															</div>

															<div class="colChild item">
																<div class="colFloat">
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																	<div class="txt">
																		<p><strong>l???H??pital de Dieppe ??? Grand Prix Pi??ces Jaunes ??? 7 700 ???</strong></p>
																		<p>
																			Au CHU de Dieppe, le mois de janvier a ??t?? rythm?? par Pi??ces Jaunes. Plusieurs animations ont ??t?? propos??es aux enfants hospitalis??s : zumba g??ante organis??e par l?????cole d???infirmi??res, accueil des
																			??coles, coll??ges et lyc??es pour d??couvrir le monde de l???h??pital, concours de dessin, match de basket f??minin au profit de Pi??ces Jaunes, accueil des footballeurs du FC Dieppe pour une rencontre avec
																			les enfants et les ados hospitalis??s autour des r??alisations financ??es par l???op??ration Pi??ces Jaunes, r??alisation d???un barom??tre g??ant par les patients d???art-th??rapie... Gr??ce ?? la r??compense du Prix
																			Pi??ces Jaunes, l???h??pital de Dieppe va pouvoir d??corer les services de p??diatrie et de n??onatalogie.
																		</p>
																	</div>
																</div>
															</div>

															<div class="colChild item">
																<div class="colFloat">
																	<div class="imgPt Parent-image">
																		<span class="image" style="background-image: url('images/laureat.jpg');"></span>
																	</div>
																	<div class="txt">
																		<p><strong>l???H??pital de Dieppe ??? Grand Prix Pi??ces Jaunes ??? 7 700 ???</strong></p>
																		<p>
																			Au CHU de Dieppe, le mois de janvier a ??t?? rythm?? par Pi??ces Jaunes. Plusieurs animations ont ??t?? propos??es aux enfants hospitalis??s : zumba g??ante organis??e par l?????cole d???infirmi??res, accueil des
																			??coles, coll??ges et lyc??es pour d??couvrir le monde de l???h??pital, concours de dessin, match de basket f??minin au profit de Pi??ces Jaunes, accueil des footballeurs du FC Dieppe pour une rencontre avec
																			les enfants et les ados hospitalis??s autour des r??alisations financ??es par l???op??ration Pi??ces Jaunes, r??alisation d???un barom??tre g??ant par les patients d???art-th??rapie... Gr??ce ?? la r??compense du Prix
																			Pi??ces Jaunes, l???h??pital de Dieppe va pouvoir d??corer les services de p??diatrie et de n??onatalogie.
																		</p>
																	</div>
																</div>
															</div>
														</div>
														<div class="customNavigation">
															<a class="btn prev">&nbsp;</a>
															<a class="btn next">&nbsp;</a>
														</div>
													</div>
												</div>
											</div>

											<div class="blocToggle">
												<div class="toggleBloc">
													<h2>Commande de mat??riel</h2>
												</div>
												<div class="child">
													<p><strong>Pour recevoir d??s ?? pr??sent votre mat??riel de collecte choisissez + de Vie ou Pi??ces Jaunes et vous serez redirig?? sur la page d??di??e.</strong></p>
													<p class="logoInside">
														<a href="#"><img src="images/jaunes-big.png" alt="" /></a>
														<a href="#"><img src="images/vie-big.png" alt="" /></a>
													</p>
												</div>
											</div>

											<div class="blocToggle show">
												<div class="toggleBloc">
													<h2>Projets subventionn??s</h2>
												</div>
												<div class="child">
													<p>Depuis 1989, 13 000 projets ont ??t?? subventionn??s par la Fondation, pour un montant de plus de 124 millions d???euros. Pour les consulter, remplir les champs propos??s.</p>

													<form name="" action="" method="post" class="wpcf7-form">
														<!---colonne select---->
														<div class="select">
															<div class="col">
																<div class="input">
																	<span class="form-wrap">
																		<select class="selectpicker" title=" " data-selected-text-format="count>3">
																			<option>Enfants / Ados hospitalis??s</option>
																		</select>
																	</span>
																	<label for="beneficiaire">B??n??ficiaire</label>
																	<div class="clear"></div>
																</div>

																<div class="input">
																	<span class="form-wrap">
																		<select class="selectpicker" title=" " data-selected-text-format="count>3">
																			<option>Non pr??cis??</option>
																		</select>
																	</span>
																	<label for="departement">D??partement</label>
																	<div class="clear"></div>
																</div>

																<div class="input">
																	<span class="form-wrap">
																		<select class="selectpicker" title=" " data-selected-text-format="count>3">
																			<option>Non pr??cis??</option>
																		</select>
																	</span>
																	<label for="Ville">Ann??e</label>
																	<div class="clear"></div>
																</div>
															</div>

															<div class="col">
																<div class="input">
																	<span class="form-wrap">
																		<select class="selectpicker" title=" " data-selected-text-format="count>3">
																			<option>Non pr??cis??e</option>
																		</select>
																	</span>
																	<label for="Ville">R??gion</label>
																	<div class="clear"></div>
																</div>

																<div class="input">
																	<span class="form-wrap">
																		<select class="selectpicker" title=" " data-selected-text-format="count>3">
																			<option>Non pr??cis??e</option>
																			<option>Non pr??cis??e</option>
																		</select>
																	</span>
																	<label for="Ville">Ville</label>
																	<div class="clear"></div>
																</div>

																<a href="#" title="" class="bt btBleu br_24">rechercher</a>
															</div>
															<div class="clear"></div>
														</div>
														<!---fin colonne select---->
													</form>
													<div class="wrapTabl">
														<table class="tableau tg" id="searchResult">
															<tbody>
																<tr>
																	<th>Ann??e</th>
																	<th>Ville</th>
																	<th>D??partement</th>
																	<th>R??gion</th>
																	<th>Service</th>
																	<th>Th??me</th>
																	<th>Descriptif</th>
																	<th>Hopital</th>
																	<th>Subvention accord??e</th>
																	<th>B??n??ficiaire</th>
																</tr>

																<tr>
																	<td>2013</td>
																	<td>madagascar rrr</td>
																	<td>Rh??ne</td>
																	<td>Rh??ne-Alpes</td>
																	<td>M. le Dr SCHELL - P??diatrie Oncologie</td>
																	<td>Rapprochement des familles</td>
																	<td>Am??nagement d'un lieu d'accueil, social, humain, permettant de pr??parer avec les familles un retour apais?? au domicile</td>
																	<td>Centre L??on BERARD</td>
																	<td>300 000 ???</td>
																	<td>&nbsp;</td>
																</tr>

																<tr>
																	<td>2013</td>
																	<td>LYON</td>
																	<td>Rh??ne</td>
																	<td>Rh??ne-Alpes</td>
																	<td>M. le Dr SCHELL - P??diatrie Oncologie</td>
																	<td>Rapprochement des familles</td>
																	<td>Am??nagement d'un lieu d'accueil, social, humain, permettant de pr??parer avec les familles un retour apais?? au domicile</td>
																	<td>Centre L??on BERARD</td>
																	<td>300 000 ???</td>
																	<td>&nbsp;</td>
																</tr>

																<tr>
																	<td>2013</td>
																	<td>LYON</td>
																	<td>Rh??ne</td>
																	<td>Rh??ne-Alpes</td>
																	<td>M. le Dr SCHELL - P??diatrie Oncologie</td>
																	<td>Rapprochement des familles</td>
																	<td>Am??nagement d'un lieu d'accueil, social, humain, permettant de pr??parer avec les familles un retour apais?? au domicile</td>
																	<td>Centre L??on BERARD</td>
																	<td>300 000 ???</td>
																	<td>&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</section>

									<!-- -->
								</div>
						</div>
				</div>
			</article>
          <!-- .et_pb_post --> </div>
        <!-- #main-content -->
         <?php
			get_footer();
		 ?>
        <!-- #main-footer --> </div>
      <!-- #et-main-area --> </div>
    <!-- #page-container -->
    <style type="text/css" id="et-builder-advanced-style">
				

	</style>
    <style type="text/css" id="et-builder-page-custom-style">
				 .et_pb_bg_layout_dark { color: #ffffff !important; } .page.et_pb_pagebuilder_layout #main-content { background-color: rgba(255,255,255,0); } .et_pb_section { background-color: #ffffff; }
			</style>
    
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/frontend-builder-global-functions591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom591a.js?ver=3.0.51"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/waypoints.min591a.js?ver=3.0.51"></script>
    <script type="text/javascript">
/* <![CDATA[ */
var et_pb_custom = {};
/* ]]> */
</script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/builder/scripts/frontend-builder-scripts591a.js?ver=3.0.51"></script>
  </body>
</html>
