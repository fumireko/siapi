<?php
    include "../Config/config_sistema.php";

    if(isset($_POST['cpf_estag']) && isset($_POST['unidade_preferencia']) && isset($_POST['turno_preferencia']) && isset($_POST['nome_estag']) && isset($_POST['email_estag']) &&  isset($_POST['end_estag']) && isset($_POST['bairro_estag']) && isset($_POST['cidade_estag']) && isset($_POST['cel_estag']) && isset($_POST['inst_ens_estag'])){


    $id_estag = $_POST['id_estag'];    
    $unidade_preferencia = $_POST['unidade_preferencia'];
    $turno_preferencia = $_POST['turno_preferencia'];
    $cpf_estag = $_POST['cpf_estag'];
    $nome_estag = $_POST['nome_estag'];
    $nasc_estag = $_POST['nasc_estag'];
    $email_estag = $_POST['email_estag'];
    $end_estag = $_POST['end_estag'];
    $bairro_estag = $_POST['bairro_estag'];
    $cidade_estag = $_POST['cidade_estag'];
    $fixo_estag = $_POST['fixo_estag'];
    $cel_estag = $_POST['cel_estag'];
    $recado_estag = $_POST['recado_estag'];
    $falar_com_estag = $_POST['falar_com_estag'];
    $inst_ens_estag = $_POST['inst_ens_estag'];
    $nvl_estag = $_POST['nvl_estag'];
    $form_complementar = $_POST['form_complementar'];
    $curso_estag = $_POST['curso_estag'];
    $hr_aula_estag = $_POST['hr_aula_estag'];
    $dta_ini_estag = $_POST['dta_ini_estag'];
    $dta_fim_estag = $_POST['dta_fim_estag'];
    $empresa_ult_estag = $_POST['empresa_ult_estag'];
    $cargo_ult_estag = $_POST['cargo_ult_estag'];
    $exp_ult_estag = $_POST['exp_ult_estag'];
    $empresa_penult_estag = $_POST['empresa_penult_estag'];    
    $cargo_penult_estag = $_POST['cargo_penult_estag'];
    $exp_penult_estag = $_POST['exp_penult_estag'];
    $cursos_extras_estag = $_POST['cursos_extras_estag'];
    $cv_estag = $_POST['cv_estag'];
    $outro_tec = $_POST['outro_tec_estag'];
    $tipo_medio = $_POST['tipo_medio'];
    $tipo_tecnico = $_POST['tipo_tecnico'];
    $status_estag = $_POST['status_estag'];
    $obs_estag = $_POST['obs_estag'];

    
    $sql = "UPDATE `tbestagiario` SET `tbestagiario_nome`= '$nome_estag',`tbestagiario_cpf`= '$cpf_estag',`tbestagiario_email`= '$email_estag',`tbestagiario_dtnasc`= '$nasc_estag',`tbestagiario_endereco`= '$end_estag',`tbestagiario_bairro`= '$bairro_estag',`tbestagiario_cidade`= '$cidade_estag',`tbestagiario_telfixo`= '$fixo_estag',`tbestagiario_telcel`= '$cel_estag',`tbestagiario_telreca`= '$recado_estag',`tbestagiario_falarcom`= '$falar_com_estag',`tbestagiario_unipref`= '$unidade_preferencia',`tbestagiario_turnopref`= '$turno_preferencia',`tbestagiario_instituicao`= '$inst_ens_estag',`tbestagiario_nivel`= '$nvl_estag',`tbestagiario_curso`= '$curso_estag',`tipo_medio`= '$tipo_medio',`tipo_tecnico`= '$tipo_tecnico',`tbestagiario_horario`= '$hr_aula_estag',`tbestagiario_datainiciocurso`= '$dta_ini_estag',`tbestagiario_datatermcurso`= '$dta_fim_estag',`tbestagiario_formacaocomple`= '$form_complementar',`tbestagiario_empresa`= '$empresa_ult_estag',`tbestagiario_cargo`= '$cargo_ult_estag',`tbestagiario_tempexperiencia`= '$exp_ult_estag',`tbestagiario_empresa1`= '$empresa_penult_estag',`tbestagiario_cargo1`= '$cargo_penult_estag',`tbestagiario_tempexperiencia1`= '$exp_penult_estag',`tbestagiario_cursosextra`= '$cursos_extras_estag',`tbestagiario_resumodocurriculo`= '$cv_estag',`tbestagiario_status`= '$status_estag',`obs_estag`= '$obs_estag',`outro_tec_estag`= '$outro_tec' WHERE tbestagiario_id = $id_estag";          
    // ADICIONAR 3 CAMPOS QUE FALTAM NO CADASTRO... GERAR EXCEL

    $consulta = mysql_query($sql);
    echo json_encode($consulta);
    // header ("Location:cadEstagiario.php");
        
    } 
?>    