<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Painel Paragon</title>
    <link href="<?php echo site_url(); ?>css/adm_style.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>css/jquery-ui-1.8.21.custom.css" rel="stylesheet"/>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="<?php echo site_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo site_url(); ?>js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="<?php echo site_url(); ?>js/adm_functions.js"></script>
</head>
<body>

  <div id="adm_painel_loggin">

      <?php echo form_open("adm_login/verifica_login", array("id"=>"form_adm_login")); ?>
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

</body>

</html>