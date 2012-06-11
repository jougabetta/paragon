<section id="formulario_comparacao">

    <?php form_open("disputa/criar_disputa", array("id"=>"form_disputa")); ?>

        <table>

            <tr>
                <td><label>Título: </label></td>
                <td><input type="text" name="disputa_titulo" id="disputa_titulo" value=""/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><input type="text" name="disputa_descricao" id="disputa_descricao" value=""/></td>
            </tr>
            <tr>
                <td><label>Autor: </label></td>
                <td><input type="text" name="disputa_autor" id="disputa_autor" value=""/></td>
            </tr>
            <tr>
                <td><label>Participante 1: </label></td>
            </tr>
            <tr>
                <td><label>Foto: </label></td>
                <td><input type="file" name="participante1_imagem" id="participante1_imagem" value=""/></td>
            </tr>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="participante1_nome" id="participante1_nome" value=""/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><input type="text" name="participante1_descricao" id="participante1_descricao" value=""/></td>
            </tr>
            <tr>
                <td><label>Participante 2: </label></td>
            </tr>
            <tr>
                <td><label>Foto: </label></td>
                <td><input type="file" name="participante2_imagem" id="participante2_imagem" value=""/></td>
            </tr>
            <tr>
                <td><label>Nome: </label></td>
                <td><input type="text" name="participante2_nome" id="participante2_nome" value=""/></td>
            </tr>
            <tr>
                <td><label>Descrição: </label></td>
                <td><input type="text" name="participante2_descricao" id="participante2_descricao" value=""/></td>
            </tr>
            <tr>
                <td><input type="submit" name="disputa_submit" /></td>
            </tr>
        </table>

    <?php form_close(); ?>

</section>