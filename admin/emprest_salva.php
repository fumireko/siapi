
<style>
    .example{
    height: 450px;
    width: 45%;
    border: 5px solid black;
    background-color: lightblue;
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
include "index.php";
$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];

date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

$hoje = $date;
$unidade_id = $_POST['unidade_id'];
$nomeunidade = nomedolocal($conn,$_POST['unidade_id']);
$ctrl_ti = $_POST['ctrl_ti'];

$solicitante = $_POST['solicitante'];
$autorizador = $_POST['autorizador'];
$tipo_equip = $_POST['tipo_equip'];
$retorno = $_POST['retorno'];
$temp = $solicitante . "  " . $tipo_equip . "  Cod. Local : " . $unidade_id . "  " .$nomeunidade."  Data Emprestimo : " . $hoje ."  Previsao Entrega :  ".$retorno. "  Usuario : " . $nome_usuario."  CTI ". $ctrl_ti."  Autorizado por : ". $auttorizador ;

//$outros = "wks";
if (isset($_POST['unidade_id']) or $_POST['unidade_id'] != "") {
    $novaunidade_id = $_POST['unidade_id'];
} else
    $novaunidade_id = "0";


//$novaunidade_id = $_POST['novaunidade_id'];
$nova_sec = cod_sec($conn, $novaunidade_id);
//echo " unidade :___" . $novaunidade_id."___";

if(($novaunidade_id=="0")or($novaunidade_id=="")or($novaunidade_id == "1")) {
   echo " <br> <br><br> <label title =".$novaunidade_id." >Voce deve informar ( Selecionar )  o nome do Local a ser Substituido </label> ";
    echo "<a href='JavaScript: window.history.back();' title ='Voltar a pagina anterior para correçao ! ' >Voltar</a>";
   //echo "<input type='button' value='Voltar' onClick='<script>history.go(-1);</script>'>"; 
   //echo "<script>history.go(-1);</script>";

} 
else
{
$sqlinsert  = "INSERT INTO `tb_emprestimo`(`status`, `local_cod`, `data_cad`, `cti`, `nome_solicitante`, `nome_autorizador`, `previsao`, `usuario`, `temp`) VALUES('1','$unidade_id','$hoje','$ctrl_ti','$solicitante','$autorizador','$retorno','$nome_usuario','$temp')";
//mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
// MSG -> echo "<script>alert('DADOS SALVOS.');</script>";
    if (mysqli_query($conn, $sqlinsert))
       {
        echo "<br><br> <br><br><div class='example'>";
        $msg = "<br>\n Equipamento Emprestado \n  \n  CTI nº:   " . $ctrl_ti . "  Tipo  " . $tipo_equip . " \n Solicitado por  ( " . $solicitante . " )\n  Autorizado por:    ( " . $autorizador . " )\n  Previsao de Retorno em : ( " . $retorno . " )  ";

        echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br>";

        $novo_msg = "Local  <  " . $novaunidade_id . " > \n  ( " . nomedolocal($conn, $novaunidade_id) . " )\n \n  Emprestimo Cadastrado  com sucesso ! ";

        echo "<center> <p style=color:red> <b>" . nl2br($novo_msg) . " </b>  </p></center> ";

        $rodape = "Colombo, " . $hoje . "   <i> Usuario  : " . $nome_usuario . "</i>";

        echo "<center> <p style=color:red> <b>" . nl2br($rodape) . " </b>  </p></center> <br><br>";
        echo "  <a href='./emprest_consulta.php' class='btn btn-primary'>Consultar  Emprestimos </a>";
        echo "</div>";


    }
    else
    {
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
?>
