<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
include "conn2.php";

// processo de identificacao da maquina pelo ip .
$ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
//echo "$ip"."<br>"; // imprimi o número IP
$ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
//echo "$ip"."<br>"; // imprimi o número IP
$host = gethostbyaddr("$ip"); //pego o host

// registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);  $tabela = "1";// tbequip = 1 diversos =2 monitores=3 "; $nome_usuario = $_SESSION['nome_usuario'];$id_equip = $_POST['codequip'];
$hoje = date("d/m/Y H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$outros = $host;
$tabela = "3";// tbequip = 1 diversos =2 monitores=3 ";

$id_equip = $_POST['codequip']; // endereço id da tabela monitores
/*
id , status , id_equip , mon_marca , mon_tam , mon_plaqueta , mon_tipo , data , mon_saida , usuario , ref , local_id , sec_id , ctrl_ti


*/
$ctrl_ti = $_POST['ctrl_ti'];
//$ret_id = $_POST['id']; 
$ret_marca = $_POST['mon_marca'];
$ret_tam = $_POST['mon_tam'];
$ret_plaqueta = STRTOUPPER($_POST['mon_plaqueta']);
$ret_tipo = $_POST['mon_tipo'];
//$ret_data = $_POST['data'];
$ret_saida = $_POST['mon_saida'];
$ret_pc = $_POST['id_doequip']; // retorno  tbequip_id do pc formulario anterior  
$id_loc = $_POST['unidade_id'];
$ret_obs = $_POST['mon_obs'];

if(($ret_pc=="0")||($ret_pc==0)||($ret_pc=="")){
  $ret_pc_cti = "0";
}
else
$ret_pc_cti = substr(ret_caminho_ctrl_ti($conn, $ret_pc), 1);  // busca o cti em funcao do  tbequip_id  informado    



//$ret_usuario = $_POST['usuario'];


// busca de dados da base de dados

$tbequip_id = $id_equip;
$sql = "SELECT * from tb_monitores where id = '$tbequip_id' ORDER BY id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
while ($ln = mysqli_fetch_assoc($qr)) 
{
   // $ret_idb = $_POST['id'];
    $ret_marcab = $ln['mon_marca'];
    $ret_tamb = $ln['mon_tam'];
    $ret_plaquetab = STRTOUPPER($ln['mon_plaqueta']);
    $ret_tipob = $ln['mon_tipo'];
     $ret_saidab = $ln['mon_saida'];
     $ret_pcb = $ln['id_equip'];
     $ret_loc_id = $ln['local_id'];
    $ret_obsb = $ln['obs'];
}
//mysqli_close($conn); 

// rotina para registrar alteracao // 



if ($id_equip != "") {
    $teste = "1";
    //altera registro 
    $query_alt = "UPDATE `tb_monitores` SET `id_equip`='".$ret_pc."',`mon_marca`='".$ret_marca."',`mon_tam`='".$ret_tam."',`mon_plaqueta`='".$ret_plaqueta."',`mon_tipo`='".$ret_tipo."',`data`='".$hoje."',`mon_saida`='".$ret_saida. "',`obs`='" . $ret_obs ."',`usuario`='".$nome_usuario." ' WHERE `id`='".$id_equip."' ";
       $result = mysqli_query($conn, $query_alt);
   
       // $retorno_checkInEng = mysqli_num_rows($result);
       //  $row = mysqli_fetch_assoc($result);
       //    $result ="0" ;
    if ($result == 0)
      {
       // echo "Erro de Alteraçao de dados ";
          echo "<script>alert('DADOS DO MONITOR CTI ".$ctrl_ti."( ".$id_equip.") NAO FORAM  ALTERADOS');</script>";
      //  echo "<script>history.go(-1);</script>";
      } 
    else
      {
        if ($ret_marcab <> $ret_marca) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "Marca";
            $dados = $ret_marcab . " --> " . $ret_marca;

            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }


        if ($ret_tamb <> $ret_tam) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "tamanho";
            $dados = $ret_tamb . " --> " . $ret_tam;
            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }



        if ($ret_plaquetab <> $ret_plaqueta) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "plaqueta";
            $dados = $ret_plaquetab . " --> " . $ret_plaqueta;
            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }

        if ($ret_tipob <> $ret_tipo) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "tipo Tela ";
            $dados = $ret_tipob . " --> " . $ret_tipo;
            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }

        if ($ret_saidab <> $ret_saida) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "saida";
            $dados = $ret_saidab . " --> " . $ret_saida;
            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }
        if ($ret_pcb <> $ret_pc) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "equip_id";
            $dados = $ret_pcb . " --> " . $ret_pc;
            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }

        if ($ret_obsb <> $ret_obs) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
            $campo = "obs";
            $dados = $ret_obsb . " --> " . $ret_obs;

            $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
        }



        //$retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, "usuario", $nome_usuario, $outros, $nome_usuario);


        // fim da rotina registra alter


        add_acao("Alt_Mon", $ctrl_ti, $nome_usuario);
        $loc_cad = nomedolocal($conn, $id_loc);
        $msg = "<br><br> MONITOR  CTI ".$ctrl_ti."( ".$id_equip." )  \n do  Local ( " . nomedolocal($conn, $ret_loc_id). " ), \n Alterado com sucesso ! ";
        echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
        ?>
 <center> <a href="newsfeed.php"> Inicio </a> </center>
<?php
    }

}
?>
