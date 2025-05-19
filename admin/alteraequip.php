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
$tabela = "1";// tbequip = 1 diversos =2 monitores=3 ";
$id_equip = $_POST['codequip'];
$ctrl_ti = $_POST['ctrl_ti'];




$plaqueta = STRTOUPPER($_POST['plaqueta']);
$nome_pc = $_POST['nome_equip'];
$equip_nome = $nome_pc;
$id_loc = $_POST['unidade_id'];
//$id_sec = $_POST['sec_id'];
$tipo_equip = $_POST['tipo_equip'];
$so = $_POST['so'];
//$so_arq = $_POST['so_arq'];
$placamae = $_POST['descplaca'];
$processador = $_POST['modelprocessador'];
$arm_tipo = $_POST['tparmazenamento'];
$arm_tam = $_POST['armazenamento'];

$arm_sectipo = $_POST['arm_sec'];
$arm_sectam = $_POST['arm_sectam'];
$mem_mod = $_POST['modmemoria'];
$mem_tam = $_POST['memoria'];
$slots = $_POST['slots'];
$slots_uso = $_POST['slots_uso'];
$monitor_tipo = $_POST['monitor'];
$teclado = $_POST['teclado'];
$mouse = $_POST['mouse'];
$filtrodelinha = $_POST['filtrodelinha'];
$app=$_POST['app'];

$app_outros = $_POST['app_out'];
$obs = $_POST['obs'];
$status = "1"; 
// novos elementos

$lacre = $_POST['lacre'];
$fonte = $_POST['fonte'];
$vid_saida = $_POST['vid_saidas'];
$vid_uso = $_POST['vid_uso'];
$vid_obs = $_POST['monitor_obs'];
$monitor_num = $_POST['monitor_num'];
$monitor_obs = $_POST['monitor_obs'];

$resp = remover_acentos1($_POST['responsavel']);
$util_num = $_POST['util_num'];
$util_nomes = $_POST['util_nomes'];



$apps = $app . ' ' . $app_outros;
// tratamento da referencia do registro   (27/05/2024 23:11:06 / PENDENTE )
$ref_equip = $hoje . '/ ' . $plaqueta;

/*
echo '  Patrimonio plaqueta : ' . $plaqueta . '  Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . ' tipo_equip ' . $tipo_equip.' <br>' ;
echo ' so ' .$so. ' so_arq ' .$so_arq. ' placa Mae ' .$placamae. ' processador ' .$processador. ' arm_tipo ' .$arm_tipo. ' arm_tam '.$arm_tam. ' arn_sec '  .$arm_sectipo. ' arm_sec_tam '.$arm_sectam.' <br>';
echo ' memoria_tipo '.$mem_tipo. ' mem_qtd '.$mem_tam. ' slots '  .$mem_slot. ' slots_uso '.$mem_slot_uso. ' mon_tipo '  .$monitor_tipo. ' mon1_mar '.$monitor1_marca.  ' mon1_tam ' .$monitor1_tam. ' mon1_pat '.$monitor1_plaq 
 .' mon2_mar '.$monitor2_marca.' mon2_tam '.$monitor2_tam.' mon2_pat ' .$monitor2_plaq.' <br>';
echo' App_outros '.$app_outros.' Aplicativos registrados  '.$app.'  '.$app1.' Obs '.$obs.'  '.$hoje .' parametro de referencia  '.$ref_equip;
echo "<br>";
/*/

// busca de dados da base de dados

$tbequip_id = $id_equip;
$sql = "SELECT * from tbequip where tbequip_id ='" . $tbequip_id . "'";
/*
$sql = "SELECT tbequip.tbequip_id,
tbequip.tbequip_plaqueta,
tbequip.tbequip_monitor,
tbequip.tbequi_mod,
tbequip.tbequi_modplaca,
tbequip.tbequi_memoria,
tbequip.tbequi_modelomemoria, 
tbequip.tbequi_armazenamento,	 
tbequip.tbequi_tparmazenamento,
tbequip.tbequi_datalanc,
tbequip.tbequi_teclado,
tbequip.tbequi_mouse,
tbequip.tbequi_filtrodelinha,
tbequip.tbequi_tecnico,
tbequip.tbequi_tbcmei_id,
tbequip_reserva,status,ctrl_ti,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbequip.tbequi_nome,
tbequip.tbequip_lacre,
tbequip.tbequip_vid_saidas,
tbequip.tbequip_vid_uso,
tbequip.tbequip_fonte,
tbequip.tbequip_util_num,
tbequip.tbequip_util_nomes,
tbequip.tbequip_resp,
tbequip.tbequip_monitor_obs,
tbequip.tbequip_monitor_num,
tbequip.tbequi_arm_sec,
tbequip.tbequi_arm_sectam,
tbequip.tbequi_slots,
tbequip.tbequi_slots_uso,
tbequip.tbequi_app,
tbequip.tbequi_app_out,
tbequip.tbequi_obs,
tbequip.tbequip_so,
tbequip.tbequi_tipo
FROM tbequip INNER JOIN tbcmei 
ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";

/*/
$qr = mysqli_query($conn, $sql);//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )

 $retorno_checkInEng = mysqli_num_rows($qr);
//$resultado = mysqli_query($conn, $qr);

 if ($retorno_checkInEng == 0) {
    echo " Nenhum retorno da base de dados em tbequip com o ID nº ".$tbequip_id; 
 }
 else
 {
    do {
        $unidade_idb = $ln['tbequi_tbcmei_id'];
        $codequip = $ln['tbequip_id'];
        $dtlan = $ln['tbequi_datalanc'];
        $ctrl_tib = $ln['ctrl_ti'];
        $plaquetab = $ln['tbequip_plaqueta'];
        $nome_pcb = $ln['tbequi_nome'];
        $idb = $ln['tbequip_id'];
        //$id_sec = $_POST['sec_id'];
        $tipo_equipb = $ln['tbequi_tipo'];
        $sob = $ln['tbequip_so'];
        //$so_arq = $_POST['so_arq'];
        $placamaeb = $ln['tbequi_modplaca'];
        $processadorb = $ln['tbequi_mod'];
        $arm_tipob = $ln['tbequi_tparmazenamento'];
        $arm_tamb = $ln['tbequi_armazenamento'];
        $arm_sectipob = $ln['tbequi_arm_sec'];
        $arm_sectamb = $ln['tbequi_arm_sectam'];
        $mem_modb = $ln['tbequi_modelomemoria'];
        $mem_tamb = $ln['tbequi_memoria'];
        $slotsb = $ln['tbequi_slots'];
        $slots_usob = $ln['tbequi_slots_uso'];
        $monitor_tipob = $ln['tbequip_monitor'];
        $tecladob = $ln['tbequi_teclado'];
        $mouseb = $ln['tbequi_mouse'];
        $filtrodelinhab = $ln['tbequi_filtrodelinha'];
        $appb = $ln['tbequi_app'];
        $app_outrosb = $ln['tbequi_app_out'];
        $obsb = $ln['tbequi_obs'];
        $statusb = $ln['status'];
        // novos elementos
        $lacreb = $ln['tbequip_lacre'];
        $fonteb = $ln['tbequip_fonte'];
        $vid_saidab = $ln['tbequip_vid_saidas'];
        $vid_usob = $ln['tbequip_vid_uso'];
        $monitor_obsb = $ln['tbequip_monitor_obs'];
        $monitor_numb = $ln['tbequip_monitor_num'];
        $respb = $ln['tbequip_resp'];
        $util_numb = $ln['tbequip_util_num'];
        $util_nomesb = $ln['tbequip_util_nomes'];
        $reserva = $ln['tbequip_reserva'];
        $equip_nomeb = $ln['tbequi_nome'];
    } while ($ln = mysqli_fetch_assoc($qr));
                                //mysqli_close($conn); 

//mysqli_close($conn); 

// rotina para registrar alteracao // 


/*
echo " CTI :" .$ctrl_ti . " Nome Disp. :".$equip_nomeb. "   <".$codequip.   " >  <BR> <BR> <BR>";

echo " BASE :". strlen((preg_replace('/\s\s+/', ' ', $processadorb))) . "<BR>";
echo " DIGS :".strlen((preg_replace('/\s\s+/', ' ', $processador))) . "<BR>";

echo " BASE :" . strlen($processadorb)."  ".(preg_replace('/\s\s+/', ' ', $processadorb)) . "<BR>";;
echo " DIGS :" . strlen($processador)."  ".(preg_replace('/\s\s+/', ' ', $processador)) . "<BR>";;


 if (strlen(preg_replace('/\s\s+/', ' ', $processadorb))==(strlen(preg_replace('/\s\s+/', ' ', $processador))))   // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )
     echo "bases Iguais  em Processador  <br> ";
  else
    echo "bases Diferentes em Processador  <br> ";

/*/

    if ($id_equip != "") {
        $teste = "1";
        //altera registro 
        $query_alt = "UPDATE `tbequip` SET `tbequi_nome`='" . $nome_pc . "',`tbequip_dtaalterado`='" . date("Y/m/d ") . "',`tbequi_modplaca`='" . $placamae ."',`tbequi_mod`='" . $processador ."',`tbequip_monitor`='" . $monitor_tipo . "',`tbequip_vid_uso`='" . $vid_uso . "',`tbequi_modelomemoria`='" . $mem_mod . "',`tbequi_memoria`='" . $mem_tam . "',`tbequi_tparmazenamento`='" . $arm_tipo . "',`tbequi_armazenamento`='" . $arm_tam . "',`tbequip_plaqueta`='" . $plaqueta . "',`tbequi_arm_sec`='" . $arm_sectipo . "',`tbequi_arm_sectam`='" . $arm_sectam . "',`tbequi_slots`='" . $slots . "',`tbequi_slots_uso`='" . $slots_uso . "',`tbequip_so`='" . $so . "',`tbequi_app`='" . $app . "',`tbequi_app_out`='" . $app_outros . "',`tbequi_obs`='" . $obs . "',`tbequi_teclado`='" . $teclado . "',`tbequi_mouse`='" . $mouse . "',`tbequi_filtrodelinha`='" . $filtrodelinha . "',`tbequip_monitor_num`='" . $monitor_num . "',`tbequip_fonte`='" . $fonte . "',`tbequip_lacre`='" . $lacre . "',`tbequip_resp`='" . $resp . "',`tbequip_util_nomes`='" . $util_nomes . "',`tbequip_util_num`='" . $util_num ."',`tbequip_resp`='" . $resp ."',`tbequip_monitor_obs`='" . $monitor_obs ."',`tbequip_vid_saidas`='" . $vid_saida .   " ' WHERE `tbequip_id`='" . $id_equip . "' ";

        $result = mysqli_query($conn, $query_alt);
        // $retorno_checkInEng = mysqli_num_rows($result);
        //  $row = mysqli_fetch_assoc($result);
        if ($result == 0) {
            // echo "Erro de Alteraçao de dados ";
            echo "<script>alert('DADOS DO EQUIPAMENTO ID " . $id_equip . " NAO FORAM  ALTERADOS');</script>";
            //  echo "<script>history.go(-1);</script>";
        } else {
            //|| (empty ($resp)

            if (strlen(preg_replace('/\s\s+/', ' ', $idb)) <> (strlen(preg_replace('/\s\s+/', ' ', $tbequip_id)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Ref_id";
                $dados = $idb . " --> " . $id;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (($respb <> $resp)) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Resp";
                $dados = $respb . " --> " . $resp;
                //$dados = $respb;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }


            if (strlen(preg_replace('/\s\s+/', ' ', $unidade_idb)) <> (strlen(preg_replace('/\s\s+/', ' ', $id_loc)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Local";
                $dados = $unidade_idb . " --> " . $unidade_id;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $processadorb)) <> (strlen(preg_replace('/\s\s+/', ' ', $processador)))) {
                $campo = "Processador";
                $dados = $processadorb . " --> " . $processador;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $placamaeb)) <> (strlen(preg_replace('/\s\s+/', ' ', $placamae)))) {
                $campo = "Placa mae";
                $dados = $placamaeb . " --> " . $placamae;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $tipo_equipb)) <> (strlen(preg_replace('/\s\s+/', ' ', $tipo_equip)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Tipo equip";
                $dados = $tipo_equipb . " --> " . $tipo_equip;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $plaquetab)) <> (strlen(preg_replace('/\s\s+/', ' ', $plaqueta)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Patrimonio";
                $dados = $plaquetab . " --> " . $plaqueta;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $lacreb)) <> (strlen(preg_replace('/\s\s+/', ' ', $lacre)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Lacre t.i.";
                $dados = $lacreb . " --> " . $lacre;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $monitor_tipob)) <> (strlen(preg_replace('/\s\s+/', ' ', $monitor_tipo)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Monitor tipo";
                $dados = $monitor_tipob . " --> " . $monitor_tipo;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $monitor_numb)) <> (strlen(preg_replace('/\s\s+/', ' ', $monitor_num)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = " Monitor num ";
                $dados = $monitor_numb . " --> " . $monitor_num;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $monitor_obsb)) <> (strlen(preg_replace('/\s\s+/', ' ', $monitor_obs)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Monitor_obs";
                $dados = $monitor_obsb . " --> " . $monitor_obs;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $vid_saidab)) <> (strlen(preg_replace('/\s\s+/', ' ', $vid_saida)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Vid_saida";
                $dados = $vid_saidab . " --> " . $vid_saida;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $vid_usob)) <> (strlen(preg_replace('/\s\s+/', ' ', $vid_uso)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Video em uso";
                $dados = $vid_usob . " --> " . $vid_uso;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $mem_modb)) <> (strlen(preg_replace('/\s\s+/', ' ', $mem_mod)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Memoria mod";
                $dados = $mem_modb . " --> " . $mem_mod;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $mem_tamb)) <> (strlen(preg_replace('/\s\s+/', ' ', $mem_tam)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Memoria tam";
                $dados = $mem_tamb . " --> " . $mem_tam;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $arm_tipob)) <> (strlen(preg_replace('/\s\s+/', ' ', $arm_tipo)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Armazen. tipo";
                $dados = $arm_tipob . " --> " . $arm_tipo;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $arm_tamb)) <> (strlen(preg_replace('/\s\s+/', ' ', $arm_tam)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Armaz. tam";
                $dados = $arm_tamb . " --> " . $arm_tam;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $slotsb)) <> (strlen(preg_replace('/\s\s+/', ' ', $slots)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Slots";
                $dados = $slotsb . " --> " . $slots;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $slots_usob)) <> (strlen(preg_replace('/\s\s+/', ' ', $slots_uso)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Slots_uso";
                $dados = $slots_usob . " --> " . $slots_uso;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $fonteb)) <> (strlen(preg_replace('/\s\s+/', ' ', $fonte)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Fonte";
                $dados = $fonteb . " --> " . $fonte;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $sob)) <> (strlen(preg_replace('/\s\s+/', ' ', $so)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "SO";
                $dados = $sob . " --> " . $so;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $appb)) <> (strlen(preg_replace('/\s\s+/', ' ', $app)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "App";
                $dados = $appb . " --> " . $app;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }

            if (strlen(preg_replace('/\s\s+/', ' ', $app_outrosb)) <> (strlen(preg_replace('/\s\s+/', ' ', $app_outros)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "App outros ";
                $dados = $app_outrosb . " --> " . $appOoutro;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $tecladob)) <> (strlen(preg_replace('/\s\s+/', ' ', $teclado)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Teclado";
                $dados = $tecladob . " --> " . $teclado;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $mouseb)) <> (strlen(preg_replace('/\s\s+/', ' ', $mouse)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Mouse";
                $dados = $mouseb . " --> " . $mouse;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $obsb)) <> (strlen(preg_replace('/\s\s+/', ' ', $obs)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Obs";
                $dados = $obsb . " --> " . $obs;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }



            if (strlen(preg_replace('/\s\s+/', ' ', $filtrodelinhab)) <> (strlen(preg_replace('/\s\s+/', ' ', $filtrodelinha)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Filtro ";
                $dados = $filtrodelinhab . " --> " . $filtrodelinha;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $util_numb)) <> (strlen(preg_replace('/\s\s+/', ' ', $util_num)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Utilizadores num";
                $dados = $util_numb . " --> " . $util_num;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $util_nomesb)) <> (strlen(preg_replace('/\s\s+/', ' ', $util_nomes))) and (empty($util_nomes))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "utilizadores nome";
                $dados = $util_nomesb . " --> " . $util_nomes;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }
            if (strlen(preg_replace('/\s\s+/', ' ', $equip_nomeb)) <> (strlen(preg_replace('/\s\s+/', ' ', $equip_nome)))) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                $campo = "Nome disp.";
                $dados = $equip_nomeb . " --> " . $equip_nome;
                $retorno = registra_alt($conn, $ctrl_ti, $id_equip, $tabela, $campo, $dados, $outros, $nome_usuario);
            }


            // fim da rotina registra alter
            add_acao("Alt_PC", $ctrl_ti, $nome_usuario);
            $loc_cad = nomedolocal($conn, $id_loc);
            $msg = "<br><br> Equipamento  " . $nome_pc . " CTI nº:   ".$ctrl_ti.  "  \n do  Local ( " . $loc_cad . " ),  alterado com sucesso ! ";
            echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
            ?>
 <center> <a href="newsfeed.php"> Inicio </a> </center> <br><br>
  <center> <a href="busca_diversos.php?cti=<?php echo $ctrl_ti ;?>" title="Visualiza Dados do Dispositivo alterado " > Consulta Dispositivo CTI :  <?php echo $ctrl_ti ;?> </a> </center>
 <br><br>   <center> <a href="qrimpressao_termo.php?var= <?php echo $ctrl_ti; ?>" > Gerar Termo do Equipamento  </a> </center>
<?php
        }
    }
}
?>
