<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Painel Paragon</title>
    <link href="<?php echo site_url(); ?>css/adm_style.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>css/jquery-ui-1.8.21.custom.css" rel="stylesheet"/>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="<?php echo site_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo site_url(); ?>js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="<?php echo site_url(); ?>js/adm_functions.js"></script>
</head>
<body>

<?php if(isset($adm_user)) { echo "bem vindo ".$adm_user; } ?>

<a href="<?php echo site_url(); ?>adm_painel/logout">LogOut</a>
