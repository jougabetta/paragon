<div id="adm_painel_loggin">

    <?php echo form_open("adm_painel/verifica_login", array("id"=>"form_adm_login")); ?>
    <table>
        <tr>
            <td><label>Login: </label></td>
            <td><input type="text" name="login" /></td>
        </tr>
        <tr>
            <td><label>Senha: </label></td>
            <td><input type="password" name="senha" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" /></td>
        </tr>
    </table>
    <?php echo form_close(); ?>

</div>