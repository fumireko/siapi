<?php
include "../validar_session.php";
include "../Config/config_sistema.php";


// Verifica se existe a variável txtnome
if (isset($_GET["txtnome"])) {
    $nome = $_GET["txtnome"];
    // Conexao com o banco de dados
       $base = "colombo_siap";
    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT * FROM tbcmei";
    } else {
        $nome .= "%";
        $sql = "SELECT * FROM tbcmei WHERE tbcmei_nome like  '%" . $nome . "'";
    }
    sleep(1);
    $result = mysqli_query($conn,$sql);
   $cont =  mysqli_num_rows($result);
       // Verifica se a consulta retornou linhas
    if ($cont > 0)
    {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>id</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysqli_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["tbcmei_nome"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["tbcmei_id"]) . "</td>";
            
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    } else
    {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>

