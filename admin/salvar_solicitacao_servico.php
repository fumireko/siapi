<?php 
    include "../Config/config_sistema.php";

    if(isset($_POST['unidade_usuario']) && isset($_POST['solicitante']) && isset($_POST['email']) && isset($_POST['indicacao_solicitacao']) && isset($_POST['complexidade']) && isset($_POST['tipo_servico'])){       
        $unidade_escolar = $_POST['unidade_usuario'];
        $solicitante = $_POST['solicitante'];
        $email = $_POST['email'];
        $ind_solicitacao = $_POST['indicacao_solicitacao'];
        $complexidade = $_POST['complexidade'];
        $tipo_servico = $_POST['tipo_servico'];
        $local_servico = $_POST['local_servico'];
        $outro_servico = $_POST['outro_servico'];
        $tipo_servico_fossa = $_POST['tipo_servico_fossa'];
        $descricao_servico = $_POST['descricao_servico'];
        $qtd_caixas = $_POST['qtd_caixas'];
        $tmnho_caixas = $_POST['tmnho_caixas'];
        $dta_ult_limpeza = $_POST['dta_ult_limpeza'];
        $descricao_material = $_POST['descricao_material'];
        $material_disponivel = $_POST['material_disponivel'];
        $tipo_inseto = $_POST['tipo_inseto'];
        $metragem = $_POST['metragem'];
        $resultado_final = substr(uniqid(rand()), 0, 8);
        $assunto = "Solicitação de serviços SEMED";

        $sql = "INSERT INTO solicitacao_servicos(id_solicitacao,num_pedido, id_unidade, solicitante, email, id_ind_solicitacao, id_complexidade, id_tipo_servico, id_status_servico, local_sala, outro_servico, id_tipo_servico_fossa, descricao_servico_txt, qtd_caixas, tmnh_caixas, dta_ult_limpeza, desc_material, material_disponivel, tipo_inseto, metragem) VALUES(NULL,'$resultado_final', '$unidade_escolar','$solicitante','$email','$ind_solicitacao','$complexidade','$tipo_servico', '1', '$local_servico', '$outro_servico', '$tipo_servico_fossa', '$descricao_servico', '$qtd_caixas', '$tmnho_caixas', '$dta_ult_limpeza', '$descricao_material', '$material_disponivel', '$tipo_inseto', '$metragem')";
        $result = mysql_query($sql);
        
        echo json_encode($result);

    }


?>