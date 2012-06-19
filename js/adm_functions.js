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
                minlength: "A senha deve conter no mínimo 6 caracteres"
            }
        }
    });

    $("#form_participante").validate({

        rules:{
            "participante_nome": {
                required: true,
                maxlength: 150
            },

            "participante_descricao": {
                required: false,
                maxlength: 300
            },

            "participante_autor": {
                required: true
            },

            "participante_imagem": {
                required: true
            },

        },

        messages:{

            "participante_nome": {
              required: "Digite o nome do participante!",
              maxlength: "O título deve conter no máximo 150 caracteres."
            },

            "participante_descricao": {
              maxlength: "A descrição deve conter no máximo 300 caracteres."
            },

            "participante_autor": {
              required: "Digite o autor da disputa!",
            },

            "participante_imagem": {
              required: ""
            }

        }

    });

});
