<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$hoje = date('Y-m-d');
$id_cmei = $_REQUEST['id_cmei'];
$aluno_id = $_POST['aluno_id'];
$nsere = $_REQUEST['nsere'];

$dccf = $_REQUEST['dccf'];
$af = $_REQUEST['af'];
$acpf = $_REQUEST['acpf'];
$da = $_REQUEST['da'];
$pv = $_REQUEST['pv'];
$qauditiva = $_REQUEST['qauditiva'];
$qvisual = $_REQUEST['qvisual'];
$difia = $_REQUEST['difia'];
$queixa = $_REQUEST['queixa'];
$espec = $_REQUEST['espec'];
$desatencao = $_REQUEST['desatencao'];
$dle = $_REQUEST['dle'];
$ee = $_REQUEST['ee'];
$agressividade = $_REQUEST['agressividade'];
$autoagressividade = $_REQUEST['autoagressividade'];
$apatia = $_REQUEST['apatia'];
$gagueira = $_REQUEST['gagueira'];
$exageradoemotivo = $_REQUEST['exageradoemotivo'];
$nervosismo = $_REQUEST['nervosismo'];
$agitacao = $_REQUEST['agitacao'];
$sintomasinseguranca = $_REQUEST['sintomasinseguranca'];
$hiperatividade = $_REQUEST['hiperatividade'];
$baixaautoestima = $_REQUEST['baixaautoestima'];
$sintomasdepressao = $_REQUEST['sintomasdepressao'];
$dificuldadesocializacao = $_REQUEST['dificuldadesocializacao'];
$atrasonalinguagemoral = $_REQUEST['atrasonalinguagemoral'];
$epasec = $_REQUEST['epasec'];
$aeletividadealimentar = $_REQUEST['aeletividadealimentar'];



$nprefessor = $_POST['nprefessor'];
$ndiretor = $_POST['ndiretor'];
$nassessora = $_POST['nassessora'];
$queixa = $_POST['queixa'];
$dtcad = $_POST['dtcad'];
$status = $_POST['status'];
$pqueixas =  "$dccf"."- "
."$af"."- "
."$acpf"."- "
."$da"."- "
."$pv"."- "
."$qauditiva"."- "
."$qvisual"."- "
."$difia"."- "
."$desatencao"."- "
."$dle"."- "
."$ee"."- " 
."$agressividade"."- " 
."$autoagressividade"."- "
."$apatia"."- " 
."$gagueira"."- "
."$exageradoemotivo"."- "
."$nervosismo"."- "
."$agitacao"."- "
."$sintomasinseguranca"."- "
."$hiperatividade"."- " 
."$baixaautoestima"."- "
."$sintomasdepressao"."- "
."$dificuldadesocializacao"."- "
."$atrasonalinguagemoral"."- "
."$epasec"."- " 
."$aeletividadealimentar";
$exame = $_REQUEST['exame'];
$simexame = $_REQUEST['simexame'];
$laudo = $_REQUEST['laudo'];
$simlaudo = $_REQUEST['simlaudo'];
$medicacao = $_REQUEST['medicacao'];
$simmedicacao = $_REQUEST['simmedicacao'];
$terapeuta = $_REQUEST['terapeuta'];
$simterapeuta = $_REQUEST['simterapeuta'];

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
caec_pqueixas,
caec_exames,
caec_laudo,
caec_medicacao,
caec_tratamento,
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
VALUES('$nsere',
'$pqueixas',
'$simexame',
'$simlaudo',
'$simmedicacao',
'$simterapeuta',
'$queixa',
'$nprefessor',
'$ndiretor',
'$nassessora',
'$aluno_id',
'$id_cmei',
now(),
'$espec',
'Pendente',
'$id_usuario')";
mysql_query($sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
//header("Location:busca_mat.php_backup?motivo=$motivo&turma=$turma&data_nasc=$data_nasc");
echo "<script>alert('ALUNO INCLUSO.');</script>";
echo "<script>history.go(-1);</script>";
exit;
?>

