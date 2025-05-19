<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$hoje = date('Y-m-d');
$id_cmei = $_REQUEST['id_cmei'];
$aluno_id = $_POST['aluno_id'];
$nsere = $_REQUEST['nsere'];
$queixa = $_POST['queixa'];
$espec = $_POST['espec'];
$nprefessor = $_POST['nprefessor'];
$ndiretor = $_POST['ndiretor'];
$nassessora = $_POST['queixa'];
$queixa = $_POST['queixa'];
$dtcad = $_POST['dtcad'];
$status = $_POST['status'];
$id_usuario  = $_SESSION['id_usuario'];
$datan = implode("-",array_reverse(explode("/",$dtcad)));
if ($aluno_id !=""){
    $result = mysql_query('SELECT * FROM tbcaec where caec_aluno_id = "'.$aluno_id.'"');
    if ($result)
    {
         while ($row = mysql_fetch_assoc($result)) {
            echo "<font color=red><b>  ".'DATA DE CADASTRO :' .$row['caec_dataenvio'].' <br>';
            echo "<font color=red><b>  ".'DATA DE DEVOLUTIVA :' .$row['caec_datadev'].' <br>';
            echo "<font color=red><b>  ".'ESPECIALIDADE :' .$row['caec_esp'].' <br>';
            echo "<font color=red><b>  ".'DATA :' .$hoje.' <br>';
    
            exit;
    }

}
mysql_query($result);
}
$sqlinsert  = "INSERT INTO tbcaec(caec_numsere, 
caec_queixa, 
caec_professor, 
caec_diretor, 
caec_ass_semed, 
caec_aluno_id,
caec_tbcmei_id,
caec_dataenvio,
caec_esp,
caec_status_agenda,
dados_usuarios_ID)
VALUES('$nsere','$queixa','$nprefessor','$ndiretor','$nassessora','$aluno_id','$id_cmei',now(),'$espec','Pendente','$id_usuario')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
//header("Location:busca_mat.php_backup?motivo=$motivo&turma=$turma&data_nasc=$data_nasc");
echo "<script>alert('ALUNO INCLUSO.');</script>";
echo "<script>history.go(-1);</script>";
exit;
?>
<html>
    <table border ="1">
        <tr>
            <td>Data </td>
            <td><?php echo $hoje; ?> </td>
        </tr>
        <tr>
            <td>IdCmei </td>
            <td><?php echo $id_cmei; ?> </td>
        </tr>
        <tr>
            <td>IDaluno </td>
            <td><?php echo $aluno_id; ?> </td>
        </tr>
        <tr>
            <td>NumSere </td>
            <td><?php echo $nsere; ?> </td>
        </tr>


        <tr>
            <td>Possiveis Queixas </td>
            <td><?php echo $pqueixas; ?> </td>
        </tr>


        <tr>
            <td>Queixa </td>
            <td><?php echo $queixa; ?> </td>
        </tr>
        <tr>
            <td>Especialidade </td>
            <td><?php echo $espec; ?> </td>
        </tr>
        <tr>
            <td>Professor </td>
            <td><?php echo $nprefessor; ?> </td>
        </tr>
        <tr>
            <td>Diretor </td>
            <td><?php echo $ndiretor; ?> </td>
        </tr>
        <tr>
            <td>Assessora Pedagogica </td>
            <td><?php echo $nassessora; ?> </td>
        </tr>
        <tr>
            <td>Datacad </td>
            <td><?php echo $dtcad; ?> </td>
        </tr>
        <tr>
            <td>Status </td>
            <td><?php echo $status; ?> </td>
        </tr>
        <tr>
            <td>IdUsuario </td>
            <td><?php echo $id_usuario; ?> </td>
        </tr>
    </table>


