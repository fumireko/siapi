<?php
include "../../Config/config_sistema.php";

// require "grafico_2cb.php";
// espaço funcooes

function ret_Qtd_disp_tbequip_bySec($Fconexao, $Fref,$Fsec) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%".$Fref."%' and  tbequip_sec ='".$Fsec."' and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_disp_tbequip($Fconexao, $Fref) // informa qtd de pcs por secretaria    ret_Qtd_disp_tbequip_bySec
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%".$Fref."%' and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_divbySec_cod($Fconexao, $Fref,$Fsec) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos WHERE descricao_cod = '" . $Fref . "' and sec_cod ='" . $Fsec . "' and   status='1' "; // 
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_div($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos WHERE descricao_cod = '" . $Fref . "' and status='1' "; // 
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_controle_ti  where tab_origem=1 and status='1' ";//WHERE tbequip_sec = '" . $Fref . "'";
        //  $sql = "SELECT * FROM tbequip where status='1' ";//WHERE tbequip_sec = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}




function ret_Qtd_DivbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos where status='1' ";//WHERE sec_cod = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_MonbySec_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores WHERE sec_id = '" . $Fref . "' and status='1' ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_MonbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores where status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_CTRL_TI($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_controle_ti where status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total <> 0)
            return $total;
        else
            return 0;
    }
}

function ret_Qtd_PcbySec_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $Fref . "' and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_DivbySec_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos WHERE sec_cod = '" . $Fref . "' and status='1' ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

/*
function ret_Qtd_MonbySec_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores WHERE sec_id = '" . $Fref . "' and status='1' ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}




function ret_Qtd_DivbySec_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos WHERE sec_cod = '" . $Fref . "'and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

*/
function ret_Qtd_Monby1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 1";
        //$sql = "SELECT * FROM tb_monitores where id_equip=0 and status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_Monby2($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 2";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_Monby0($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_monitores where id_equip=0 and status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Tot_Mon($Fconexao) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_monitores where  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Tot_Disp_geral($Fconexao) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tbequip where  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Tot_equip_ind($Fconexao,$Fref) // informa qtd de pcs por secretaria     ret_Qtd_disp_tbequip_bySec
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tbequip  where tbequi_tipo like '%".$Fref."%' and  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Tot_Div_ind($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_diversos where descricao_cod = '".$Fref."'and  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Tot_Div_geral($Fconexao) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_diversos where  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}






function ret_Qtd_Pcby0mon($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 0) {
                    do {
                        $cont = $cont + 1;
                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($linha = mysqli_fetch_assoc($dados));
    }
    return $cont;
}

function ret_Qtd_Pcby0monV_1($Fconexao, $Fref) // informa qtd de pcs  com 0 monitores com base no cti
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            //$ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 0) {
                    do {
                        $cont = $cont + 1;
                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}



function ret_Qtd_Pcby1monV_1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            // $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "' and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 1) {
                    do {
                        $cont = $cont + 1;
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}


function ret_Qtd_Pcby2monV_1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            //    $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm > 1) {
                    $cont = $cont + 1;
                    do {

                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}

function ret_Qtd_total($Fconexao, $Fref) // informa qtd total de pcs 
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        // if ($total == 0)
        //   return 0;
        //else
        return $total;
    }
}

function ret_Qtd_CentroCustosbySec($Fconexao, $Fref)
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $ident = $Fref;
        $sql = "SELECT * FROM tbcmei WHERE tbcmei_sec_id = '" . $ident . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


// fim do espaço funcoes


$ret_tp = $_GET['tab']; 
   
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de Equipamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    <style>

        table {
            border-collapse: collapse;
            border: 2px solid rgb(140 140 140);
            font-family: sans-serif;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        caption {
            caption-side: bottom;
            padding: 10px;
            font-weight: bold;
        }

        thead,
        tfoot {
            background-color: rgb(228 240 245);
        }

        th,
        td {
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
          text-align: center;
            }

            td:last-of-type {
                text-align: center;
            }

        tbody > tr:nth-of-type(even) {
            background-color: rgb(237 238 242);
        }

        tfoot th {
            text-align: right;
        }

        tfoot td {
            font-weight: bold;
        }



    </style>
    
    </head>
<!-- BEGIN BODY -->

<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php 
    
    ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>
                  

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                                
                            </header>
                            
                          <div class="content-body">
                            <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                     <!-- ********************************************** -->
                                       <div  id="consulta"> 
                                         <!-- ********************************************** -->
                                       </div>
                                       <div class="form-group">
                                
                                        </div>
                                     </div>
                            
								 <form method="post" action="edita.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo "" ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "">
                                    
                                    <section class="box ">
                                 <header class="panel_header">
                                <h2 class="title pull-left"> <?php echo "" ?></h2>                                
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                                      </div>
                               

                                 <?php 
                                   			 switch ($ret_tp)
													{
													    case '0':
													    {
													    break; 
													    }
													    case '1': // 
													    {
                                                         ?>
                                                            <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                 <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>DESKTOP</label></td>
                                                                 <td><center><?php  echo ret_Qtd_disp_tbequip($conn,"DES")?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                 <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>NOTEBOOK</label></td>
                                                                 <td> <center> <?php echo ret_Qtd_disp_tbequip($conn, "NOT") ?> </center></td>
                                                                 <td> </td>
                                                                  </tr>
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>TABLET</label></td>
                                                                 <td> <center> <?php echo ret_Qtd_disp_tbequip($conn, "TAB") ?> </center></td>
                                                                 <td> </td>
                                                                  </tr>
                                                                         <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>CELULAR</label></td>
                                                                 <td> <center> <?php echo ret_Qtd_disp_tbequip($conn, "CEL")?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                   <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>MONITOR</label></td>
                                                                 <td> <center> <?php echo ret_Qtd_MonbySec($conn, "CEL") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>PATCH PANEL</label></td>
                                                                 <td> <center> <?php echo ret_Qtd_div($conn, "1") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>RACK</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "2") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>SWITCH</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "3") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>TV</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "4") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>IMPRESSORA</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "5") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>ACESS POINT</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "6") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>NO-BREAK</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "7") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>MODULO BAT</label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "8") ?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           
                                                                           <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>CONTROLADOR WIFI </label></td>
                                                                 <td> <center> <?php  echo ret_Qtd_div($conn, "9")?> </center> </td>
                                                                 <td> </td>
                                                                  </tr>
           


                                                                  </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php
                                                          break;
                                                        }
                                                     case '2': // 
                                                     {
                                                       ?>
                                                         <label> Computadores por Secretaria   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                   <th scope="col"></th>  
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                            
                                                                  <tr>
                                                                         <th scope="col"></th>
                                                              <th scope="row">GAB</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "22"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">Vice</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "23"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">Proc.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "24"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                 <th scope="col"></th>
                                                               <th scope="row">Contr.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "25"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">Ouv.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "26"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMAD</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "29"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMAA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "39"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMAS</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "37"); ?> </td>
                                                                 <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SECOM</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "28"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEDUH</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "34"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SMECLJ</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "42"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMED</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "35"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEFAZ</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "32"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEGOV</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "30"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEICTT</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "41"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMMA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "40"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEMOV</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "38"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SEPLAN</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "31"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SESA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "36"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>
                                                           <tr>
                                                                  <th scope="col"></th>
                                                              <th scope="row">SMTI</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "33"); ?> </td>
                                                                <th scope="col"></th>
                                                            </tr>



                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php
                                                         
                                                         break;
                                                     }
                                                     case '3': // 
                                                     {
                                         ?>
                                                         <label> Monitores por Secretaria   </label> <br /> <br />
                              

                                                           <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>GAB</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "22") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                 <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>VICE</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "23") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Procuradoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "24") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Controladoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "25") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Ouvidoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "26") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Comunicação</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "28") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Administração </label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "29") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Governo</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "30") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Planejamento</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "31") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Fazenda</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "32") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>T.I</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "33") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                     <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Urbanismo</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "34") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                                                              
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Educação</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "35") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Saude</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "36") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Social</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "37") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Obras</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "38") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Agricultura</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "39") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Meio Ambiente</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "40") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Industria Comercio</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "41") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Esporte, Cultura</label></td>
                                                                 <td><center><?php echo ret_Qtd_MonbySec_ind($conn, "42") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           


                                                           


                                                              </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php


                                                             break;
                                                     }
                                                     case '4': // 
                                                     {
                                         ?>
                                                         <label> Dispositivos Diversos por Secretaria   </label> <br /> <br />
                                                              <table>
                                                               <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>GAB</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind ($conn, "22") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                 <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>VICE</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "23") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Procuradoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "24") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Controladoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "25") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Ouvidoria</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "26") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Comunicação</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "28") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Administração </label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "29") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Governo</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "30") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Planejamento</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "31") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Fazenda</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "32") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>T.I</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "33") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                     <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Urbanismo</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "34") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                                                                              
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Educação</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "35") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Saude</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "36") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           
                                                                    <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Social</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "37") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Obras</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "38") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Agricultura</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "39") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Meio Ambiente</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "40") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Industria Comercio</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "41") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>Esporte, Cultura</label></td>
                                                                 <td><center><?php echo ret_Qtd_DivbySec_ind($conn, "42") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                           


                                                           
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php

                                                             break;
                                                     }
                                                     case '5': //  
                                                     {
                                         ?>
                                                         <label> Informaçoes Gerais por Secretaria   </label> <br /> <br />
                                                                                      <table>
                                                          <caption>
  
                                                          </caption>
                                                          <thead>
                                                            <tr>
                                                              <th scope="col">Secretaria</th>
                                                              <th scope="col">Disp. Pcs</th>
                                                                <th scope="col">Monitores</th>
                                                                <th scope="col">Desktop</th>
                                                                <th scope="col">Notebook</th>
                                                                <th scope="col">Tablet</th>
                                                              <th scope="col">Celular</th>
                                                              <th scope="col">Diversos</th>
                                                              <th scope="col">Path Panel</th>
                                                              <th scope="col">Rack</th>
                                                              <th scope="col">Switch</th>
                                                              <th scope="col">TV</th>
                                                              <th scope="col">Impressora</th>
                                                              <th scope="col">Acess Point</th>
                                                              <th scope="col">No-break</th>
                                                              <th scope="col">Modulo</th>
                                                              <th scope="col">Controlador Wifi</th>
                                                              




                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                              <th scope="row">GAB</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "22"); ?> </td>  
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "22"); ?> </td>
                                                               <td><?php  echo ret_Qtd_disp_tbequip_bySec($conn,"DES","22")?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "22") ?> </td>
                                                                <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "22") ?> </td>
                                                                <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "22") ?> </td>
                                                                <td><?php echo ret_Qtd_DivbySec_ind($conn, "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1","22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "22"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "22"); ?> </td>
                                                            </tr>
                                                           <tr>
                                                              <th scope="row">Vice</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "23"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "23"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "23") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "23") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "23") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "23") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "23"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "23"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">Proc.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "24"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "24"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "24") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "24") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "24") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "24") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "24"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "24"); ?> </td> 
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">Contr.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "25"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "25"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "25") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "25") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "25") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "25") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "25"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "25"); ?> </td> 
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">Ouv.</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "26"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "26"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "26") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "26") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "26") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "26") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "26"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "26"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMAD</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "29"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "29"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "29") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "29") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "29") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "29") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "29"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "29"); ?> </td> 
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMAA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "39"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "39"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "39") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "39") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "39") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "39") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "39"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "39"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMAS</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "37"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "37"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "37") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "37") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "37") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "37") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "37"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "37"); ?> </td> 
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SECOM</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "28"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "28"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "28") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "28") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "28") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "28") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "28"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "28"); ?> </td> 
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEDUH</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "34"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "34"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "34") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "34") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "34") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "34") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "34"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "34"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SMECLJ</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "42"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "42"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "42") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "42") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "42") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "42") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "42"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "42"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMED</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "35"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "35"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "35") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "35") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "35") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "35") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "35"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "35"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEFAZ</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "32"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "32"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "32") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "32") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "32") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "32") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "32"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "32"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEGOV</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "30"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "30"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "30") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "30") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "30") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "30") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "30"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "30"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEICTT</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "41"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "41"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "41") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "41") ?> </td>
                                                              <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "41") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "41") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "41"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "41"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMMA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "40"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "40"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "40") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "40") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "40") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "40") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "40"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "40"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEMOV</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "38"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "38"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "38") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "38") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "38") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "38") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "38"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "38"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SEPLAN</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "31"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "31"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "31") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "31") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "31") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "31") ?> </td>
                                                               <td><?php echo ret_Qtd_DivbySec_ind($conn, "31"); ?> </td>
                                                               <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "31"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "31"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SESA</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "36"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "36"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "36") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "36") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "36") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "36") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "36"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "36"); ?> </td>
                                                           </tr>
                                                           <tr>
                                                              <th scope="row">SMTI</th>
                                                              <td><?php echo ret_Qtd_PcbySec_ind($conn, "33"); ?> </td>
                                                              <td><?php echo ret_Qtd_MonbySec_ind($conn, "33"); ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "DES", "33") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "NOT", "33") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "TAB", "33") ?> </td>
                                                               <td><?php echo ret_Qtd_disp_tbequip_bySec($conn, "CEL", "33") ?> </td>
                                                              <td><?php echo ret_Qtd_DivbySec_ind($conn, "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "1", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "2", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "3", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "4", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "5", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "6", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "7", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "8", "33"); ?> </td>
                                                              <td scope="col"><?php echo ret_Qtd_DivbySec_cod($conn, "9", "33"); ?> </td>
                                                           </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                     <th scope="row" colspan="1"></th>
                                                                     <td> <?php echo ret_Tot_Disp_geral($conn); ?></td>
                                                                     <td> <?php echo ret_Tot_Mon ($conn); ?></td>
                                                                     <td> <?php echo ret_Tot_equip_ind($conn,"DESK"); ?></td>
                                                                     <td> <?php echo ret_Tot_equip_ind($conn, "NOT"); ?></td>
                                                                     <td> <?php echo ret_Tot_equip_ind($conn, "TAB"); ?></td>
                                                                     <td><?php  echo ret_Tot_equip_ind($conn, "CEL") ?> </td>
                                                                     <td> <?php echo ret_Tot_Div_geral($conn);?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "1"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "2"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "3"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "4"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "5"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "6"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "7"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "8"); ?></td>
                                                                      <td> <?php echo ret_Tot_Div_ind($conn, "9"); ?></td>
                                                                   

                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                             

                                                             <?php

                                                             break;
                                                     }
                                                     case '6': // 
                                                     {
                                         
                                                           
                                                         
                                                         ?>
                                                         <label> Monitores e Computadores    </label> <br /> <br />
                                                          
                                                            <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Sem Pcs</th>
                                                                  <th scope="col">Unico PC</th>
                                                                  <th scope="col">Duplo PC</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td><center><?php echo ret_Qtd_Monby0($conn, "DES") ?></center> </td>
                                                                 <td><center><?php echo ret_Qtd_Monby1($conn, "DES") ?></center> </td>
                                                                 <td><center><?php echo ret_Qtd_Monby2($conn, "DES") ?></center> </td>
                                                                      <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                            
                                                                <?php echo "<br> Todos os Monitores da base   " . ret_Tot_Mon($conn)."<br> " ?>                               
                                                                <?php


                                                             break;
                                                     }
                                                     case '7': // 
                                                     {
                                         ?>
                                                         <label> Computadores e Monitores   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>DESKTOP</label></td>
                                                                 <td><center><?php echo ret_Qtd_disp_tbequip($conn, "DES") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php

                                                             break;
                                                     }
                                                     case '8': // 
                                                     {
                                         ?>

                                                         <label> Computadores e Monitores   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Pcs sem Monitor</th>
                                                                  <th scope="col">Pcs com 1 Monitor</th>
                                                                  <th scope="col">Pcs com 2 Monitores</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td><center><?php echo ret_Qtd_Pcby0MonV_1($conn, "DES") ?></center> </td>
                                                                 <td><center><?php echo ret_Qtd_Pcby1MonV_1($conn, "DES") ?></center> </td>
                                                                 <td><center><?php echo ret_Qtd_Pcby2MonV_1($conn, "DES") ?></center> </td>
                                                                      <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                            
                                                                <?php echo "<br> Todos os Computadores da base   " . ret_Qtd_total($conn,"1") . "<br> " ?>                               
                                                          
                                                             <?php

                                                             break;
                                                     }
                                                     case '9': // 
                                                     {
                                         ?>
                                                         <label> Computadores por Secretaria   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>DESKTOP</label></td>
                                                                 <td><center><?php echo ret_Qtd_disp_tbequip($conn, "DES") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php

                                                             break;
                                                     }
                                                     case '10': // 
                                                     {
                                         ?>
                                                         <label> Computadores por Secretaria   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>DESKTOP</label></td>
                                                                 <td><center><?php echo ret_Qtd_disp_tbequip($conn, "DES") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php

                                                             break;
                                                     }
                                                     case '11': // 
                                                     {
                                         ?>
                                                         <label> Computadores por Secretaria   </label> <br /> <br />
                                                              <table>
                                                              <caption>
  
                                                              </caption>
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col"></th>
                                                                  <th scope="col">Descriçao</th>
                                                                  <th scope="col">Quantidade</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                                  <tr>
                                                                  <th scope="row"></th>
                                                                 <td> <label>DESKTOP</label></td>
                                                                 <td><center><?php echo ret_Qtd_disp_tbequip($conn, "DES") ?></center> </td>
                                                                 <td> </td>
                                                                  </tr>
                                                             </tbody>
                                                                  <tfoot>
                                                                    <tr>
                                                                      <th scope="row" colspan="2"></th>
                                                                      <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                  </tfoot>
                                                                </table>
                                                             <?php

                                                             break;
                                                     }
                                                     case '12': // 
                                                     {
                                                         break;
                                                     }
                                                     case '13': // 
                                                     {
                                                         break;
                                                     }
                                                     case '14': // 
                                                     {
                                                       ?>    <br />
                                                        <label> Centro de Custos por Secretaria   </label>  <br />  <br />                                    
                                                      <table>
                                                      <caption>
  
                                                      </caption>
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Secretaria</th>
                                                          <th scope="col">Centro Custos</th>
      
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <th scope="row">GAB</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "22"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">Vice</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "23"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">Proc.</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "24"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">Contr.</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "25"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">Ouv.</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "26"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMAD</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "29"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMAA</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "39"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMAS</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "37"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SECOM</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "28"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEDUH</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "34"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SMECLJ</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "42"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMED</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "35"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEFAZ</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "32"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEGOV</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "30"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEICTT</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "41"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMMA</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "40"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEMOV</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "38"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SEPLAN</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "31"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SESA</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "36"); ?> </td>
     
                                                        </tr>
                                                       <tr>
                                                          <th scope="row">SMTI</th>
                                                          <td><?php echo ret_Qtd_CentroCustosbySec($conn, "33"); ?> </td>
     
                                                        </tr>
   


                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                          <th scope="row" colspan="2"></th>
   
   
                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                    <?php
                                                         break;
                                                     }

                                                    }//fim do switch  				 &nbsp  <?php echo "    <sup> Cadastrado por : " . $ret_tec . "  em  " . $ret_datalanc . "    </sup>";    &nbsp  &nbsp  									 
                                              ?>
                                              <br>					
								
                              
                              
                              
                                                            <a href="dashb_1.php" title="Pagina de tabelas e Graficos">Voltar</a><br /><br />
															<a href="../busca_diversos.php" title="Consultar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
															<a href="../newsfeed.php"  title="Pagina Inicial do Sistema">Inicio</a><br /><br />                           														  
														     
																 </div>
														</form>
													</div>
												</section></div>
											</section>
										</section>
									</body>
							</html>
															