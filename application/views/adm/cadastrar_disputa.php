<section id="formulario_disputa">

     cadastro de participante

    <?php echo form_open_multipart("adm_painel/cadastro_disputa", array("id"=>"form_disputa")); ?>

        <table>

            <?php if(isset($sucesso_cadastro_disputa)){ ?>

                <p><?php echo $sucesso_cadastro_disputa; ?></p>

            <?php }elseif(isset($erro_cadastro_disputa)){ ?>

                <p><?php echo $erro_cadastro_disputa; ?></p>

            <?php } ?>

            <tr>
                <td><label>Título: </label></td>
                <td><input type="text" name="disputa_titulo" id="disputa_titulo" value="<?php if(isset($disputa_cadastrada)){ echo $disputa_cadastrada->get_titulo(); } ?>"/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><textarea name="disputa_descricao" id="disputa_descricao"><?php if(isset($disputa_cadastrada)){ echo $disputa_cadastrada->get_descricao(); } ?></textarea></td>
            </tr>
            <tr>
                <td><label>Autor: </label></td>
                <td>
                    <select name="disputa_autor">
                    <?php if(isset($disputa_cadastrada)){ $autor = $disputa_cadastrada->get_autor(); ?>
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
                <td><label>Status: </label></td>
                <?php if(isset($disputa_cadastrada) && $disputa_cadastrada->get_status() == 1){ ?>
                    <script> muda_status('on', '1'); </script>
                <?php }elseif(isset($disputa_cadastrada)){ ?>
                    <script> muda_status('off', '0'); </script>
                <?php } ?>
                <input type="hidden" id="disputa_status" name="disputa_status" value="0"/>
                <td>
                    <div id="on" class="status icones" onclick="muda_status('on', '1')" title="Status: On"></div>
                    <div id="off" class="status icones" onclick="muda_status('off', '0')" title="Status: Off"></div>
                </td>
            </tr>
            <tr>
            <?php $checked = ""; for($i=0 ; $i < count($participantes) ; $i++){


                    if(isset($disputa_cadastrada)){

                        if(($participantes[$i]->id == $disputa_cadastrada->get_participante1()) || ($participantes[$i]->id == $disputa_cadastrada->get_participante2()) ){

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