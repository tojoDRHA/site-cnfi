<?php
include("../../../wp-load.php");
do_action( 'wp_ajax_' . $_REQUEST['action'] );
