$(document).ready(function(){
    jQuery('#formSalvaUnidade').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            url: 'salvarUnidade.php',
            dataType: 'json',
            cache: false,
            data: dados,
            type: "POST",
            
            beforeSend: function(){
                document.getElementById('btn_cadastro_unidade').style.display = "block";
                document.getElementById('btnAguarde').style.display = "block";
                document.getElementById('Msgvazio').value = "novo";
                setTimeout(function() {
                    $('#Msgvazio').fadeOut('fast');
                    }, 200);
                
            },
            success: function (retorno) {
                if(retorno == false){
                    document.getElementById('MsgErro').style.display = "block";
                    document.getElementById('nome_unidade').value = "";
                    document.getElementById('coordenador_unidade').value = "";
                    document.getElementById('telefone_unidade').value = "";
                    document.getElementById('btn_cadastro_unidade').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                    $('#MsgErro').fadeOut('fast');
                    }, 200);
                }
                else if(retorno == true){
                    document.getElementById('MsgSucesso').style.display = "block";
                    document.getElementById('nome_unidade').value = "";
                    document.getElementById('coordenador_unidade').value = "";
                    document.getElementById('telefone_unidade').value = "";
                    document.getElementById('btn_cadastro_unidade').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                        $('#MsgSucesso').fadeOut('fast');
                    }, 200);
                }
            },
        });
        event.preventDefault();		
    });
});

if($("#MsgSucesso").is(":visible")){
    setTimeout(function(){
    $('#MsgSucesso').remove();
    },8000);
}
if($("#MsgErro").is(":visible")){
    setTimeout(function(){
    $('#MsgErro').remove();
    },8000);
}
