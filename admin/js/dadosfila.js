$(document).ready(function(){
    jQuery('#dadosfila').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            url: 'dadosfila.php',
            dataType: 'json',
            cache: false,
            data: dados,
            type: "POST",
            beforeSend: function(){
                document.getElementById('btn_cadastro_unidade').style.display = "none";
               
            },
            success: function (retorno) {
                if(retorno == false){
                    document.getElementById('tbaluno_id').value = "";
                    document.getElementById('btn_cadastro_unidade').style.display = "block";
                    setTimeout(function() {
                        $('#MsgErro').fadeOut('fast');
                    }, 2500);
                }
                else if(retorno == true){
                    document.getElementById('tbaluno_id').value = "";
                    document.getElementById('btn_cadastro_unidade').style.display = "block";
                 
                    setTimeout(function() {
                        $('#MsgSucesso').fadeOut('fast');
                    }, 2500);
                }
            },
        });
        event.preventDefault();		
    });
});


