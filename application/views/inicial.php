﻿<?php if(isset($votos) && $votos != ""){
    $diplay_block = "style='display:block;'";
    $diplay_none = "style='display:none;'";
    $voto_participante1 = $votos->participante1;
    $voto_participante2 = $votos->participante2;
}else{
    $diplay_block = $diplay_none = $voto_participante1 = $voto_participante2 = "";
}
?>

<section id="disputa">

    <h1 id="titulo_disputa"><?php echo $disputa->titulo; ?></h1>

    <a href="javascript: void(0)" onclick="get_disputa('<?php echo $anterior->id; ?>')"><?php echo "<< Anterior" ?></a>
    <a href="javascript: void(0)" onclick="get_disputa('<?php echo $proxima->id; ?>')"><?php echo "Próxima >>" ?></a>

    <article id="participante1">
        <img src="<?php echo site_url(); ?>imagens/participantes/<?php echo $participante1->imagem; ?>" />
        <h2><?php echo $participante1->nome; ?></h2>
        <a class="botao_votar" <?php echo $diplay_none; ?> href="javascript: void(0)" onclick="registra_voto('<?php echo $disputa->id; ?>', 'participante1')">Votar!</a>
        <img <?php echo $diplay_none; ?> src="<?php echo site_url(); ?>/imagens/carregando_voto.gif" class="carregando_voto" width="70px" height:"48px" />
    </article>
    <article id="participante2">
        <img src="<?php echo site_url(); ?>imagens/participantes/<?php echo $participante2->imagem; ?>" />
        <h2><?php echo $participante2->nome; ?></h2>
        <a class="botao_votar" <?php echo $diplay_none; ?> href="javascript: void(0)" onclick="registra_voto('<?php echo $disputa->id; ?>', 'participante2')">Votar!</a>
        <img <?php echo $diplay_none; ?> src="<?php echo site_url(); ?>/imagens/carregando_voto.gif" class="carregando_voto" width="70px" height:"48px" />
    </article>

    <div class="votos">
        <p class="resultado_voto" <?php echo $diplay_block; ?> id="votos_participante1"><?php echo $voto_participante1; ?></p>
        <p class="resultado_voto" <?php echo $diplay_block; ?> id="votos_participante2"><?php echo $voto_participante2; ?></p>
    </div>

</section>
<img src="<?php echo site_url(); ?>imagens/carregando.gif" width="50" height="50" id="carregando"/>
