$(document).ready(function(){

    $("#form_adm_login").validate({

        rules:{
            "login": {
                required: true
            },
            "senha": {
                required: true,
                minlength: 6
            }
        },
        messages:{
            "login": {
              required: "Digite o login!"
            },
            "senha": {
                required: "Digite a senha!",
                minlength: "A senha deve conter no m&iacute;nimo 6 caracteres"
            }
        }
    });

});
