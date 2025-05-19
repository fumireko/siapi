$(document).ready(function(){
    jQuery('#formSalvaUsuario').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            url: 'salvarUsuario.php',
            dataType: 'json',
            cache: false,
            data: dados,
            type: "POST",
            beforeSend: function(){
                document.getElementById('btn_cadastro').style.display = "none";
                document.getElementById('btnAguarde').style.display = "block";
            },
            success: function (retorno) {
                if(retorno == false){
                    document.getElementById('MsgErro').style.display = "block";
                    document.getElementById('nome_usuario').value = "";
                    document.getElementById('email_usuario').value = "";
                    document.getElementById('senha_usuario').value = "";
                    document.getElementById('nivel_usuario').value = "0";
                    document.getElementById('unidade_usuario').value = "0";
                    document.getElementById('btn_cadastro').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                        $('#MsgErro').fadeOut('fast');
                    }, 2500);
                }
                else if(retorno == true){
                    document.getElementById('MsgSucesso').style.display = "block";
                    document.getElementById('nome_usuario').value = "";
                    document.getElementById('email_usuario').value = "";
                    document.getElementById('senha_usuario').value = "";
                    document.getElementById('nivel_usuario').value = "0";
                    document.getElementById('unidade_usuario').value = "0";
                    document.getElementById('btn_cadastro').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                        $('#MsgSucesso').fadeOut('fast');
                    }, 2500);
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