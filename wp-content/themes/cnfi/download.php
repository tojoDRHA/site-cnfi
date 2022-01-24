<?php
include("../../../wp-load.php");
header('Content-type:application/pdf');  
header('Content-Disposition: attachment; filename='.$_GET['fic']);
readfile(get_theme_root() .'/lpc2/pdf_fiches_creches/'.$_GET['fic']);
