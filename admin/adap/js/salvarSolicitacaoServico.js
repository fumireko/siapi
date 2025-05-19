$(document).ready(function(){
    jQuery('#formSolicitacao').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            url: 'salvar_solicitacao_servico.php',
            dataType: 'json',
            cache: false,
            data: dados,
            type: "POST",
            beforeSend: function(){
                document.getElementById('btn_solitacao').style.display = "none";
                document.getElementById('btnAguarde').style.display = "block";
            },
            success: function (retorno) {
                if(retorno == false){
                    document.getElementById('MsgErro').style.display = "block";
                    document.getElementById('unidade_escolar').value = "";
                    document.getElementById('local_servico').value = "";
                    document.getElementById('solicitante').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('indicacao_solicitacao').value = "0";
                    document.getElementById('complexidade').value = "0";
                    document.getElementById('tipo_servico').value = "0";
                    document.getElementById('outro_servico').value = "";
                    document.getElementById('tipo_servico_fossa').value = "0";
                    document.getElementById('descricao_servico').value = "";
                    document.getElementById('qtd_caixas').value = "0";
                    document.getElementById('tmnho_caixas').value = "";
                    document.getElementById('dta_ult_limpeza').value = "";
                    document.getElementById('descricao_material').value = "";
                    document.getElementById('material_disponivel').value = "0";
                    document.getElementById('tipo_inseto').value = "";
                    document.getElementById('metragem').value = "";
                    document.getElementById('btn_solitacao').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                        $('#MsgErro').fadeOut('fast');
                    }, 2500);
                }
                else if(retorno == true){
                    document.getElementById('MsgSucesso').style.display = "block";
                    document.getElementById('unidade_escolar').value = "";
                    document.getElementById('local_servico').value = "";
                    document.getElementById('solicitante').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('indicacao_solicitacao').value = "0";
                    document.getElementById('complexidade').value = "0";
                    document.getElementById('tipo_servico').value = "0";
                    document.getElementById('outro_servico').value = "";
                    document.getElementById('tipo_servico_fossa').value = "0";
                    document.getElementById('descricao_servico').value = "";
                    document.getElementById('qtd_caixas').value = "0";
                    document.getElementById('tmnho_caixas').value = "";
                    document.getElementById('dta_ult_limpeza').value = "";
                    document.getElementById('descricao_material').value = "";
                    document.getElementById('material_disponivel').value = "0";
                    document.getElementById('tipo_inseto').value = "";
                    document.getElementById('metragem').value = "";
                    document.getElementById('btn_solitacao').style.display = "block";
                    document.getElementById('btnAguarde').style.display = "none";
                    setTimeout(function() {
                        $('#MsgSucesso').fadeOut('fast');
                    }, 2500);
                }
            }
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