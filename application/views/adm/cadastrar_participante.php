<section id="formulario_participante">

     cadastro de participante

    <?php echo form_open_multipart("adm_painel/cadastro_participante", array("id"=>"form_participante")); ?>

        <table>

            <?php if(isset($sucesso_cadastro_participante)){ ?>

                <p><?php echo $sucesso_cadastro_participante; ?></p>

            <?php }elseif(isset($erro_cadastro_participante)){ ?>

                <p><?php echo $erro_cadastro_participante; ?></p>

            <?php } ?>

            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="participante_nome" id="participante_nome" value="<?php if(isset($usuario_cadastrado)){ echo $usuario_cadastrado->get_nome(); } ?>"/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><textarea name="participante_descricao" id="participante_descricao"><?php if(isset($usuario_cadastrado)){ echo $usuario_cadastrado->get_descricao(); } ?></textarea></td>
            </tr>
            <tr>
                <td><label>Autor: </label></td>
                <td>
                    <select name="participante_autor">
                    <?php if(isset($usuario_cadastrado)){ $autor = $usuario_cadastrado->get_autor(); ?>
                        <option value="<?php echo $autor; ?>"><?php echo $autor; ?></option>
                    <?php } ?>

                    <?php for($i=0 ; $i < count($usuario) ; $i++){
                            if($usuario[$i]->nome != $autor){
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