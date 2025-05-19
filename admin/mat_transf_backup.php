<?php
    include "../validar_session.php"; 
    include "../Config/config_sistema.php";
    $id_aluno = $_REQUEST['id_aluno'];
    $tbfila_status = $_REQUEST['tbfila_status'];
    $tbfila_id = $_REQUEST['tbfila_id'];
    $tbcmei_id = $_REQUEST['tbcmei_id'];
    
    $sql = "SELECT tbfila.tbfila_id, 
    tbaluno.tbaluno_id,
    tbaluno.tbaluno_nome,
    tbfila.tbfila_status,
    tbfila.tbcmei_tbcmcei_id,
    tbfila.tbaluno_tbaluno_id
     FROM tbaluno INNER JOIN tbfila
    ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    where tbaluno_id = '$id_aluno' 
    ORDER BY tbfila_id DESc";
    $qr = mysql_query($sql) or die(mysql_error());
          // resultado da consulta (valor inteiro)
    $cont = mysql_num_rows($qr);
         // se resultado for igual a zero, uma mensagem é exibida
        // exibindo o resultado
		echo "<strong>Lista de alunos</strong>:";
		echo "<br />";	
        $i=0;
        while ($rows = mysql_fetch_array($qr)){
            $id_fila = $rows['tbfila_id'];
            $idaluno = $rows['tbaluno_id'];
            $nome = $rows['tbaluno_nome'];
            $status = $rows['tbfila_status'];
            $id_cmei = $rows['tbcmei_tbcmcei_id'];
            if ($i == 0)
            {
                //$sql = ("UPDATE tbfila SET tbfila.tbfila_status = 'Transferido' where tbfila_id = '$tbfila_id'");
                //$consulta = mysql_query($sql);
                //$sql1 = ("UPDATE tbtran SET tbtran.tbtran_status = 'Transferido' where tbtran.tbfila_tbfila_id = '$tbfila_id'");
                //$consulta = mysql_query($sql);
                echo $i; echo '<br>';
                echo $id_fila; echo '<br>';
                echo $id_cmei; echo '<br>';
                echo $idaluno; echo '<br>';
                echo $nome; echo '<br>';
                echo $status; echo '<br>';
                //echo "<script>alert('Transferido.');</script>";
                //echo "<script>history.go(-1);</script>";
                //header ("Location:busca_inc.php?dta_nasc_busca=$dtansc");
                //exit;
            }
            //  else 
            if ($i == 1){
               //$sql2 = ("UPDATE tbfila SET tbfila.tbfila_status = 'Matriculado' where tbfila_id = '$tbfila_id'");
               //$consulta = mysql_query($sql);
               // $sql3 = ("UPDATE tbtran SET tbtran.tbtran_status = 'Matriculado' where tbtran.tbfila_tbfila_id = '$tbfila_id'");
               //$consulta = mysql_query($sql);
               echo $i; echo '<br>';
               echo $id_fila; echo '<br>';
               echo $id_cmei; echo '<br>';
               echo $idaluno; echo '<br>';
               echo $nome; echo '<br>';
               echo $status; echo '<br>';

               // echo "<script>alert('Matriculado.');</script>";
               // echo "<script>history.go(-1);</script>";
            }
            $i++;
            
         
		}
	

?>