
<style>
    .example{
    height: 450px;
    width: 45%;
    border: 5px solid black;
    background-color: lemonchiffon;
    margin: 0 auto;
}
    .example_ERRO {
        height: 200px;
        width: 45%;
        border: 5px solid black;
        background-color: burlywood;
        margin: 0 auto;
    }


.sidebar{
     height:500px;   
}
    </style>


<?php
//include "../validar_session.php"; 
include "../Config/config_sistema.php";
include "bco_fun.php";
//include "index.php";
$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];

date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

$hoje = $date;
$ch_cod = $_POST['ch_cod'];
  $obs = $_POST['sugestao'];
  $ava_serv = $_POST['name'];
  $ava_tec = $_POST['name1'];

  $sql = "SELECT * FROM tbldados WHERE id_dados = '" . $ch_cod . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
    //$sql = "SELECT * FROM tbldados WHERE id_dados LIKE '%" . $campo . "%' order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n  " . $total . "  Registro Localizado (s) em CHAMADOS  com o Codigo  ".$ch_cod;
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else 
		{
    if ($total == 1) {

        $unidade_id = $linha['id_setor'];
        //$nomeunidade = nomedolocal($conn,$_POST['unidade_id']);
        $secretaria_id = $linha['id_sec'];
        $solicitante = $linha['nsolicitante'];
        $tecnico = $linha['tecnico'];
        $tp_serv = $linha['tpservico'];
        $regiao = $linha['regiao'];
        $datas = " Abertura :" . $linha['data'] . "  H " . $linha['hora'] . "  Atendimento :" . $linha['dtaatendido'] . "  H " . $linha['cha_horai'] . "  Finalizaçao  :" . $linha['dtafin'] . "  H " . $linha['cha_horaf'] .
            $desc = $linha['prob'];


            $sqlinsert  = "INSERT INTO `tb_sac`(`status`,`cod_loc`,`cod_sec`,`dt_cad`,`aval_tec`,`aval_serv`,`obs`,`cham_solic`,`cham_tecnico`,`cham_cod`,`cham_tipo`,`cham_datas`,`cham_desc`,`avaliador`,`cham_regiao`) 
VALUES('1','$unidade_id','$secretaria_id','$hoje','$ava_tec','$ava_serv','$obs','$solicitante','$tecnico','$ch_cod','$tp_serv','$datas','$desc','$nome_usuario','$regiao')";
//mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
// MSG -> echo "<script>alert('DADOS SALVOS.');</script>";
        if  (mysqli_query($conn, $sqlinsert))
         {
            echo "<br><br> <br><br><div class='example'>";
            $msg = "<br>\n Avaliaçao Registrada \n  \n  Chamado nº:   " . $ch_cod . "  Tipo  " . $tp_serv . " \n   Solicitado  por:    ( " . $solicitante . " )\n \n   Tecnico ".$tecnico ."   Avaliaçao  : ( " . $ava_tec . " ) Estrela(s) \n \n Serviço  Avaliaçao  : ( " . $ava_serv . " ) Estrela(s)  ";

            echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br>";

            $novo_msg = "Local  <  " . $unidade_id . " > \n  ( " . nomedolocal($conn, $unidade_id) . " ) ";

            echo "<center> <p style=color:red> <b>" . nl2br($novo_msg) . " </b>  </p></center> ";

            $rodape = "Colombo, " . $hoje . "   <i> Usuario  : " . $nome_usuario . "</i>";

            echo "<center> <p style=color:red> <b>" . nl2br($rodape) . " </b>  </p></center> <br><br>";
            echo "<center>  <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary'>Consultar  Chamados (SAC) </a> </center>";
            echo "</div>";


        } else {
            echo "<br><br> <br><br><div class='example_ERRO'>";

            $novo_msg = " <br> Erro de Cadastro, EMPRESTIMO NAO REGISTRADO !  ";

            echo "<center> <p style=color:red> <b>" . nl2br($novo_msg) . " </b>  </p></center> ";

            $rodape = "Colombo, " . $hoje . "   <i> Usuario  : " . $nome_usuario . "</i>";

            echo "<center> <p style=color:red> <b>" . nl2br($rodape) . " </b>  </p> <br><br>";
            echo "<a href='JavaScript: window.history.back();' title ='Voltar a pagina anterior para correçao ! ' >Voltar</a> </center> ";
            echo "</div>";



        }









        ?>
 
<?php
    }
         }
?>
