<?php 
include "../validar_session.php"; 
include "../Config/config_sistema.php";
//header('Content-Type: text/html; charset=utf-8');
//if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){   
if (!isset($_SESSION)){
	session_start();
}
$membro = $_POST['membro'];
$id_grupo = $_REQUEST['id_grupo'];

$sqlinsert = "INSERT INTO  semed.gp_membro(grupo, email) VALUES('$id_grupo', '$membro');";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados na tabela grupo"); //Ou vai..., ou racha.

header("Location:./#/");

// Comparando as Datas

        
        //$sql = "INSERT INTO semed.tbaluno(tbaluno_nome, tbaluno_dtnasc,tbaluno_nmae,tbaluno_cpfmae,	
        //tbaluno_tel,celu,tbaluno_cep,tbaluno_end,tbaluno_num,tbaluno_comple,tbaluno_bairro,tbaluno_cidade,tbaluno_status,tbaluno_datacad,tbaluno_login)
         //VALUES ('$nome','$dta_nasc','$nome_mae','$cpf_mae','$telefone','$celu','$cep','$rua','$num','$comp','$bairro','$cidade','Pendente',now(),'$nome_usuario');";
       // $result = mysql_query($sql);
        //header("Location:./#/cadaluno");
        //echo json_encode($result);    
       
    //}
?>