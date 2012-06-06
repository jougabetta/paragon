<div id="adm_painel_loggin">

    <?php echo form_open("adm_painel/verifica_login", array("id"=>"form_adm_login")); ?>
    <div id="mensagem">
        <?php if(isset($erro)){echo $erro;} ?>
    </div>
    <table>
        <tr>
            <td><label>Login: </label></td>
            <td><input type="text" name="login" /><?php if(isset($erro_login)){echo "<label>".$erro_login."</label>";} ?></td>
        </tr>
        <tr>
            <td><label>Senha: </label></td>
            <td><input type="password" name="senha" /><?php if(isset($erro_senha)){echo "<label>".$erro_senha."</label>";} ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" /></td>
        </tr>
    </table>
    <?php echo form_close(); ?>

</div>