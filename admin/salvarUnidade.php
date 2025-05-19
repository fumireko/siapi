<?php 
    include "../Config/config_sistema.php";

    if(isset($_POST['nome_unidade']) && isset($_POST['coordenador_unidade']) && isset($_POST['telefone_unidade'])){       
        $nome_unidade = $_POST['nome_unidade'];
        $coordenador_unidade = $_POST['coordenador_unidade'];
        $telefone_unidade = $_POST['telefone_unidade'];

        $sql = "INSERT INTO semed.tbcmei(tbcmei_id, tbcmei_nome, tbcmei_tel, tbcmei_coord, tbcmei_email, tbcmei_cep, tbcmei_end, tbcmei_num, tbcmei_comp, tbcmei_bairro, tbcmei_cidade, tbcmei_login, dados_usuarios_ID) VALUES (NULL, '$nome_unidade', '$telefone_unidade', '$coordenador_unidade', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);";
        
        $result = mysql_query($sql);
        echo json_encode($result);
    }
?>