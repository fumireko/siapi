<?php
    include "../validar_session.php"; 
    include "../Config/config_sistema.php";
    $tbfila_id_mat = $_REQUEST['tbfila_id_mat'];
    $tbfila_id_transf = $_REQUEST['tbfila_id_transf'];
    $tbfila_status_mat = $_REQUEST['tbfila_status_mat'];
    $tbfila_status_transf = $_REQUEST['tbfila_status_transf'];
    $cod_cmei_transf = $_REQUEST['cod_cmei_transf'];
    $cod_cmei_mat = $_REQUEST['cod_cmei_mat'];  
    $cmei_id = $_SESSION['unidade_usuario'];
    
    if ($tbfila_status_transf == 'Aguardando transf'){
        $sql2 = ("UPDATE tbfila SET tbfila.tbfila_status = 'Matriculado' 
        where tbfila_id = '".$tbfila_id_transf."'");
        $consulta = mysql_query($sql2);
        
    }    
      
    if ($tbfila_status_mat == 'matriculado'){
       
         $sql = ("UPDATE tbfila INNER JOIN tbtran 
        ON  tbfila.tbfila_id = tbtran.tbfila_tbfila_id
       SET tbfila.tbfila_status = 'transferido',
      tbtran_status = 'transferido' 
      where tbfila_id = '".$tbfila_id_mat."'");
      $consulta = mysql_query($sql);
      header ("Location:minha_listatransf.php?tbcmei_id=$cmei_id");
    }
    

?>