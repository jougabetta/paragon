function get_disputa(idDisputa){
    $.ajax({ url: "http://127.0.0.1/paragon/inicial/disputa", type: "POST", data: { id: idDisputa }, beforeSend: function(){ $("img#carregando").fadeIn("fast"); }, complete: function(){ $("img#carregando").fadeOut("fast"); } ,success: function(feedback){ $("section#disputa").html(feedback); } });
}

function registra_voto(disp, part){

    $.ajax({
        url: "http://127.0.0.1/paragon/inicial/registrar_voto",
        type: "POST",
        data: { participante: part, disputa: disp },
        beforeSend: function(){ $(".botao_votar").fadeOut("fast"); $("img.carregando_voto").fadeIn("fast"); },
        complete: function(){ $("img.carregando_voto").fadeOut("fast"); },
        success: function(feedback){ $(".botao_votar").fadeOut("slow"); $(".votos").html(feedback); $(".resultado_voto").fadeIn("slow"); }
    });
}
$(document).ready(function(){

});