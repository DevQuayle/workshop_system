<?php
	define("DEFAULT_LANG","pl");
	define("CHARSET","utf-8");
	define("SITE_TITLE"," EuroBus Warsztat ");
	define("DEFAULT_DESCRIPTION","Warsztat samochodowy - EuroBus");
?>
<!DOCTYPE html>
<html lang="<?= DEFAULT_LANG ?>">
	<head>
		<meta charset="<?= CHARSET ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?= DEFAULT_DESCRIPTION ?>" />
		<title><?= SITE_TITLE ?></title>
        
 
        <!-- Bootstrap CSS -->    
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?=base_url()?>/assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?=base_url()?>/assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?=base_url()?>/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="Stylesheet" media="print" type="text/css" href="<?=base_url()?>/assets/css/dodruku.css" />


		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="<?=base_url()?>/assets/js/jquery.js"></script>
    

     <script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?=base_url()?>/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->

    <script src="<?=base_url()?>/assets/js/scripts.js"></script>


	</head>
