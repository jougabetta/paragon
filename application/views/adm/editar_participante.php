<section id="formulario_participante">

     Edição de participante

    <?php echo form_open_multipart("adm_painel/edicao_participante", array("id"=>"form_participante")); ?>

        <input type="hidden" name="participante_id" value="<?php echo $participante->get_id(); ?>" />

        <table>

            <?php if(isset($sucesso_edicao_participante)){ ?>

                <p><?php echo $sucesso_edicao_participante; ?></p>

            <?php }elseif(isset($erro_edicao_participante)){ ?>

                <p><?php echo $erro_edicao_participante; ?></p>

            <?php } ?>

            <tr><td colspan="2"><img src="<?php echo site_url(); ?>imagens/participantes/<?php echo $participante->get_imagem(); ?>" /></td></tr>

            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="participante_nome" id="participante_nome" value="<?php echo $participante->get_nome(); ?>"/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><textarea name="participante_descricao" id="participante_descricao"><?php echo $participante->get_descricao(); ?></textarea></td>
            </tr>
            <tr>
                <td><label>Autor: </label></td>
                <td>
                    <select name="participante_autor">

                        <option value="<?php echo $participante->get_autor(); ?>"><?php echo $participante->get_autor(); ?></option>

                    <?php for($i=0 ; $i < count($usuario) ; $i++){
                            if($usuario[$i]->nome != $participante->get_autor()){
                    ?>

                        <option value="<?php echo $usuario[$i]->nome; ?>"><?php echo $usuario[$i]->nome; ?></option>

                    <?php } } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Imagem: </label></td>
                <td><input type="file" name="participante_imagem" id="participante_imagem" value=""/></td>
            </tr>
            <tr>
                <td><input type="submit" name="participante_submit" /></td>
            </tr>

        </table>

    <?php echo form_close(); ?>

</section>