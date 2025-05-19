<?php
include "../Config/config_sistema.php";
$unidade_usuario = $_POST['unidade_usuario'];
$Numero = $_POST['Numero'];
$caixa_agua = $_POST['caixa_agua'];
$dedetizacao = $_POST['dedetizacao'];
$projeto = $_POST['projeto'];
$gas = $_POST['gas'];
$hidrantes = $_POST['hidrantes'];
$extintores = $_POST['extintores'];
$sinalizacao = $_POST['sinalizacao'];
$brigada = $_POST['brigada'];
$iluminacao = $_POST['iluminacao'];
$guarda_corpo = $_POST['guarda_corpo'];
$corrimao = $_POST['corrimao'];

$atas = $_POST['atas'];
$conselho = $_POST['conselho'];
$credenciamento = $_POST['credenciamento'];
$infantil = $_POST['infantil'];
$fundamental = $_POST['fundamental'];

$result = mysql_query('SELECT * FROM cmei_validacao where cmei = "'.$unidade_usuario.'" ');
if ($result){
    while ($row = mysql_fetch_assoc($result)) {
	    echo "<font color=red><b>  ".'JA EXISTE UM CADASTRO DO CMEI :' .$row['cmei'].' <br>';
        exit;
    }
}

$sqlinsert  = "INSERT INTO cmei_validacao(cmei, n_processo_Pendencia, caixa_da_agua, dedetizacao, projeto, central_glp, hidrantes, extintores, sinalizacao, brigada_de_incendio, iluminacao, guarda_corpo, corrimao, atas, conselho, credenciamento, infantil, fundamental)
VALUES('$unidade_usuario', '$Numero', '$caixa_agua', '$dedetizacao', '$projeto', '$gas', '$hidrantes', '$extintores', '$sinalizacao', '$brigada', '$iluminacao', '$guarda_corpo', '$corrimao', '$atas', '$conselho', '$credenciamento', '$infantil', '$fundamental')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.

echo "<script>alert('Serviço Cadastrado');</script>";
header("Location: ./bom.php");
exit;
?>