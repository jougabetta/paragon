<table cellpadding="0" cellspacing="0">


    <div id="dialog-confirm" style="display:none;" title="Empty the recycle bin?">
	    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Esse participante será deletado permanentemente do sistema. Você tem certeza disso?</p>
    </div>

    <?php if(isset($sucesso_exclusao_participante)){ ?>

        <p><?php echo $sucesso_exclusao_participante; ?></p>

    <?php }elseif(isset($erro_exclusao_participante)){ ?>

        <p><?php echo $erro_exclusao_participante; ?></p>

    <?php } ?>

    <tr>

        <td width="30" class="topolista"><label>ID</label></td>
        <td width="150" class="topolista"><label>NOME</label></td>
        <td width="150" class="topolista"><label>AUTOR</label></td>
        <td width="100" align="center" class="topolista"><label>EDITAR</label></td>
        <td width="100" align="center" class="topolista"><label>EXCLUIR</label></td>

    </tr>
    <?php for($i=0 ; $i < count($participantes) ; $i++){ ?>

        <tr>

            <td class="td"><?php echo $participantes[$i]->id; ?></td>
            <td class="td"><?php echo $participantes[$i]->nome; ?></td>
            <td class="td"><?php echo $participantes[$i]->autor; ?></td>
            <td class="td"><a href="<?php echo site_url(); ?>adm_painel/editar_participante/?id=<?php echo $participantes[$i]->id; ?>" class="icones editar"></a></td>
            <td class="td"><a href="javascript: void(0)" onclick="confirmacao_exclusao('<?php echo site_url()."adm_painel/excluir_participante"; ?>', '<?php echo $participantes[$i]->id; ?>')" class="icones excluir"></a></td>

        </tr>

    <?php } ?>

</table>