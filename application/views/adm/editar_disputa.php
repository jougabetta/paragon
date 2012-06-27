<section id="formulario_disputa">

     edicao de disputa

    <?php echo form_open_multipart("adm_painel/edicao_disputa", array("id"=>"form_disputa")); ?>

        <input type="hidden" name="disputa_id" value="<?php echo $disputa->get_id(); ?>" />

        <table>

            <?php if(isset($sucesso_edicao_disputa)){ ?>

                <p><?php echo $sucesso_edicao_disputa; ?></p>

            <?php }elseif(isset($erro_edicao_disputa)){ ?>

                <p><?php echo $erro_edicao_disputa; ?></p>

            <?php } ?>

            <tr>
                <td><label>Título: </label></td>
                <td><input type="text" name="disputa_titulo" id="disputa_titulo" value="<?php echo $disputa->get_titulo(); ?>"/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><textarea name="disputa_descricao" id="disputa_descricao"><?php echo $disputa->get_descricao(); ?></textarea></td>
            </tr>
            <tr>
                <td><label>Autor: </label></td>
                <td>
                    <select name="disputa_autor">
                    <?php $autor = $disputa->get_autor(); ?>
                        <option value="<?php echo $autor; ?>"><?php echo $autor; ?></option>
                    <?php for($i=0 ; $i < count($usuario) ; $i++){
                            if($usuario[$i]->nome != $autor){
                    ?>
                               <option value="<?php echo $usuario[$i]->nome; ?>"><?php echo $usuario[$i]->nome; ?></option>
                        <?php } } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Status: </label></td>
                <input type="hidden" id="disputa_status" name="disputa_status" value="0"/>
                <td>
                    <div id="on" class="status icones" onclick="muda_status('on', '1')" title="Status: On"></div>
                    <div id="off" class="status icones" onclick="muda_status('off', '0')" title="Status: Off"></div>
                </td>
                <?php if($disputa->get_status() == 1){ ?>
                    <script> muda_status('on', '1'); </script>
                <?php }else{ ?>
                    <script> muda_status('off', '0'); </script>
                <?php } ?>
            </tr>
            <tr>
            <?php $checked = ""; for($i=0 ; $i < count($participantes) ; $i++){

                    if(isset($disputa)){

                        if(($participantes[$i]->id == $disputa->get_participante1()) || ($participantes[$i]->id == $disputa->get_participante2()) ){

                            $checked = "checked='checked'";

                        }

                    }
            ?>

                  <td>
                    <label><?php echo $participantes[$i]->nome; ?></label>
                    <input type="checkbox" <?php echo $checked; ?> name="disputa_participante<?php echo $i; ?>" id="disputa_participante" value="<?php echo $participantes[$i]->id; ?>"/>
                  </td>

            <?php } ?>
            </tr>
            <tr>
                <td><input type="submit" name="disputa_submit" /></td>
            </tr>

        </table>

    <?php echo form_close(); ?>

</section>