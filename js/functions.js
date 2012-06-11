$(document).ready(function(){

    $("#form_disputa").validate({

        rules:{
            "disputa_titulo": {
                required: true
                maxlength: 100
            },

            "disputa_descricao": {
                required: false,
                maxlength: 250
            },

            "disputa_autor": {
                required: true,
                maxlength: 50
            },

            "participante1_imagem": {
                required: true,
            },

            "participante1_nome": {
                required: true,
                maxlength: 150
            },

            "participante1_descricao": {
                required: false,
                maxlength: 250
            },

            "participante2_imagem": {
                required: true,
            },

            "participante2_nome": {
                required: true,
                maxlength: 150
            },

            "participante2_descricao": {
                required: false,
                maxlength: 250
            },

        },

        messages:{

            "disputa_titulo": {
              required: "Digite o título da disputa!"
              maxlength: "O título deve conter no máximo 100 caracteres"
            },

            "disputa_descricao": {
              maxlength: "A descrição deve conter no máximo 250 caracteres"
            },

            "disputa_autor": {
              required: "Digite o autor da disputa!"
              maxlength: "O autor deve conter no máximo 250 caracteres"
            },

            "participante1_foto": {
              required: "Selecione a imagem do primeiro participante!"
            },

            "participante1_nome": {
                required: "Digite o nome do primeiro participante!",
                minlength: "A nome deve conter no máximo 150 caracteres"
            }

            "participante1_descricao": {
                minlength: "A descrição deve conter no máximo 250 caracteres"
            }

        }

    });

});