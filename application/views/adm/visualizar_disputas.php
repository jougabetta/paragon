<table cellpadding="0" cellspacing="0">

    <div id="dialog-confirm" style="display:none;" title="Empty the recycle bin?">
	    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Essa disputa será deletada permanentemente do sistema. Você tem certeza disso?</p>
    </div>

    <?php if(isset($sucesso_exclusao_disputa)){ ?>

        <p><?php echo $sucesso_exclusao_disputa; ?></p>

    <?php }elseif(isset($erro_exclusao_disputa)){ ?>

        <p><?php echo $erro_exclusao_disputa; ?></p>

    <?php } ?>

    <tr>

        <td width="30" class="topolista"><label>ID</label></td>
        <td width="150" class="topolista"><label>TÍTULO</label></td>
        <td width="150" class="topolista"><label>AUTOR</label></td>
        <td width="100" align="center" class="topolista"><label>STATUS</label></td>
        <td width="100" align="center" class="topolista"><label>EDITAR</label></td>
        <td width="100" align="center" class="topolista"><label>EXCLUIR</label></td>

    </tr>
    <?php for($i=0 ; $i < count($disputas) ; $i++){ ?>

        <tr>

            <td class="td"><?php echo $disputas[$i]->id; ?></td>
            <td class="td"><?php echo $disputas[$i]->titulo; ?></td>
            <td class="td"><?php echo $disputas[$i]->autor; ?></td>
            <td class="td"><?php if($disputas[$i]->status){ ?> <a href="<?php echo site_url(); ?>adm_painel/troca_disputa_status/?id=<?php echo $disputas[$i]->id; ?>&status=0" id="on" class="status icones" style="float:none;" title="mudar status para off"></a> <?php }else{ ?> <a href="<?php echo site_url(); ?>adm_painel/troca_disputa_status/?id=<?php echo $disputas[$i]->id; ?>&status=1" id="off" class="status icones" style="float:none;" title="mudar status para on"></a> <?php } ?></td>
            <td class="td"><a href="<?php echo site_url(); ?>adm_painel/editar_disputa/?id=<?php echo $disputas[$i]->id; ?>" class="icones editar"></a></td>
            <td class="td"><a href="javascript: void(0)" onclick="confirmacao_exclusao('<?php echo site_url()."adm_painel/excluir_disputa"; ?>', '<?php echo $disputas[$i]->id; ?>')" class="icones excluir"></a></td>

        </tr>

    <?php } ?>

</table>