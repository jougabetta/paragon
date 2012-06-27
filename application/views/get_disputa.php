<?php

$id = $_POST["id"];



?>

    <h1 id="titulo_disputa"><?php echo $disputa->titulo; ?></h1>

    <a href="javascript: void(0)" onclick="get_disputa('<?php echo $proxima->id; ?>')">Próxima!</a>
    <a href="javascript: void(0)">Anterior!</a>

    <h2><?php echo $participante1->nome; ?></h2>
    <img src="<?php echo site_url(); ?>imagens/participantes/<?php echo $participante1->imagem; ?>" />
    <h2><?php echo $participante2->nome; ?></h2>
    <img src="<?php echo site_url(); ?>imagens/participantes/<?php echo $participante2->imagem; ?>" />

    <a href="#">Votar!</a>
    <a href="#">Votar!</a>