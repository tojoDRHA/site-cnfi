<?php
require_once ('inc/SocialShare.php');
$share_url			= (isset($_POST) && $_POST['shareurl']!='')?trim($_POST['shareurl']):"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$countResult		= array();
$share_count		= new shareCount($share_url);
$countResult['f']	= $share_count->get_fb(); 	
$countResult['t']	= $share_count->get_tweets();
$countResult['g']	= $share_count->get_google();
echo json_encode($countResult);
?>
