<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$aluno_id = $_POST['aluno_id'];
$id_cmei = $_REQUEST['id_cmei'];
//$turma = $_REQUEST['turma'];
$motivo = $_POST['motivo'];
$dtcad = $_POST['dtcad'];
$status = $_POST['status'];
$id_usuario  = $_SESSION['id_usuario'];
$datan = implode("-",array_reverse(explode("/",$dtcad)));
//$dtansc = $_POST['dtansc'];
//$data_nasc = implode("-",array_reverse(explode("/",$dtansc)));

if ($aluno_id !=""){
    $result = mysql_query('SELECT * FROM tbfila where tbcmei_tbcmcei_id = "'.$id_cmei.'" and tbaluno_tbaluno_id = "'.$aluno_id.'"  and tbfila_status = "fila"');
	if ($result){
		 while ($row = mysql_fetch_assoc($result)) {
		 echo "<font color=red><b>  ".'ALUNO JA ESTA NA FILA PARA ESSE CMEI:<BR>';
    exit;
    }
}
mysql_query($result);
}
$sqlinsert  = "INSERT INTO tbfila(tbfila_ord,tbaluno_tbaluno_id,tbcmei_tbcmcei_id,tbfila_turma,tbfila_motivo,tbfila_dtacad,tbfila_status,dados_usuarios_ID)
		 VALUES('$totoal','$aluno_id','$id_cmei','$turma','$motivo','$datan','$status','$id_usuario')";
         mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
         //header("Location:busca_mat.php_backup?motivo=$motivo&turma=$turma&data_nasc=$data_nasc");
         echo "<script>alert('ALUNO INCLUSO.');</script>";
         echo "<script>history.go(-1);</script>";
         exit;
?>
