<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Painel Paragon</title>
    <link href="<?php echo site_url(); ?>css/adm_style.css" rel="stylesheet"/>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="<?php echo site_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo site_url(); ?>js/adm_functions.js"></script>
</head>
<body>

bem vindo <?php echo $adm_user; ?>

<br /><br />
<nav>

    <ul>

        <li><a href="<?php echo site_url(); ?>adm_painel/">INICIAL</a></li>
        <li><a href="<?php echo site_url(); ?>adm_painel/criar_disputa">criar disputa</a></li>
        <li><a href="<?php echo site_url(); ?>adm_painel/cadastrar_participante">criar participante</a></li>

    </ul>

</nav>

<br /><br />