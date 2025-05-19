<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
$hoje = date("Y/m/d H:i:s ");
//$nome_usuario = $_SESSION['nome_usuario'];
$nome_usuario = $_POST['rec_user'];
$plaqueta = STRTOUPPER($_POST['plaqueta']);
$nome_pc = STRTOUPPER($_POST['nome_equip']);
$id_loc = $_POST['loc_id'];
$id_sec = $_POST['sec_id'];
$tipo_equip = $_POST['tipo_equip'];
$so = $_POST['so_tipo'];
$so_arq = $_POST['so_arq'];

$placa_sel = $_POST['placa'];
$proc_sel = $_POST['processador'];

// tratamento para placa e processador digitado manunalmente
if (isset($_POST['placaD'])) {
    $placa_dig = $_POST['placaD'];
}
else{
    $placa_dig = "VAZIO";
    }

if (isset($_POST['processadorD'])) {
    $proc_dig = $_POST['processadorD'];
} else {
    $proc_dig = "VAZIO";
}
// fim do tratamento 


// tratamento da placa mae para campo Digitavel ou Selecionavel
if(($placa_sel=="0")or($placa_sel=="1")){
    $placamae = $placa_dig;
}
else{
    $placamae = $placa_sel;
}

// tratamento do processador para campo Digitavel ou Selecionavel
if (($proc_sel == "0")or($proc_sel=="1")) {
    $processador = "Processador  ".$proc_dig;
} else {
    $processador = "Processador  " .$proc_sel;
    
}

$arm_tipo = $_POST['arm_tipo'];
$arm_tam = $_POST['arm_tam'];
$arm_sectipo = $_POST['arm_sec'];
$arm_sectam = $_POST['arm_sec_tam'];
$mem_tipo = $_POST['mem_tipo'];
$mem_tam = $_POST['mem_qtd'];
$mem_slot = $_POST['slots'];
$mem_slot_uso = $_POST['slots_uso'];
$monitor_tipo = $_POST['mon_tipo'];
// tratamento de monitor(s) de acordo com o especificado

// tratamento do monitor
if ($monitor_tipo == "Unico") 
  {
   
    
    
    
    $mon_qtd = 1;
    $monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
    $monitor1_tam = $_POST['mon1_tam'];
    $monitor1_plaq = $_POST['mon1_pat']; 

  }
else
{
       if ($monitor_tipo == "Duplo") 
         {
          $mon_qtd = 2;
            $monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
            $monitor1_tam = $_POST['mon1_tam'];
            $monitor1_plaq = $_POST['mon1_pat'];
            $monitor2_marca = STRTOUPPER($_POST['mon2_mar']);
            $monitor2_tam = $_POST['mon2_tam'];
            $monitor2_plaq = $_POST['mon2_pat'];  
       }
       else 
       {
         if ($monitor_tipo == "Triplo") 
           {
             $mon_qtd = 3;
            $monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
            $monitor1_tam = $_POST['mon1_tam'];
            $monitor1_plaq = $_POST['mon1_pat'];
            $monitor2_marca = STRTOUPPER($_POST['mon2_mar']);
            $monitor2_tam = $_POST['mon2_tam'];
            $monitor2_plaq = $_POST['mon2_pat'];
            $monitor3_marca = STRTOUPPER($_POST['mon3_mar']);
            $monitor3_tam = $_POST['mon3_tam'];
            $monitor3_plaq = $_POST['mon3_pat'];
           }
          else
           {
            $mon_qtd = 0;
           }
       }
}
// tratamento de saida de video  de acordo com o especificado
        if (isset($_POST['vga'])) {
            //echo "checkbox marcado! <br/>";
            $vga = " VGA ";
            $monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
            $monitor1_tam = $_POST['mon1_tam'];
            $monitor1_plaq = $_POST['mon1_pat'];
            $monitor1_tipo = $_POST['mon1_cat'];



        } else {
            $vga = "";
           // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['hdmi'])) {
            //echo "checkbox marcado! <br/>";
            $hdmi = " HDMI ";
        } else {
            $hdmi = "";
            // echo "checkbox não marcado! <br/>";
        }
        
        if (isset($_POST['dvi'])) {
            //echo "checkbox marcado! <br/>";
            $dvi = " DVI ";
        } else {
            $dvi = "";
            // echo "checkbox não marcado! <br/>";
        }
        
        if (isset($_POST['display'])) {
            //echo "checkbox marcado! <br/>";
            $display = " Display ";
        } else {
            $display = "";
            // echo "checkbox não marcado! <br/>";
        }

        $video_saida = $vga . $hdmi . $dvi . $display;

$vga_uso =" VGA  : " $_POST['vga_util']." / ";
$hdmi_uso = " HDMI  : " $_POST['hdmi_util']." / ";
$dvi_uso = " DVI  : " $_POST['dvi_util']." / ";
$display_uso = " DISPLAY  : " $_POST['display_util']."  ";


$video_portas_uso = $vga_uso.$hdmi_uso.$dvi_uso.$display_uso;


$monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
$monitor1_tam = $_POST['mon1_tam'];
$monitor1_plaq = $_POST['mon1_pat'];
$monitor2_marca =STRTOUPPER( $_POST['mon2_mar']);
$monitor2_tam = $_POST['mon2_tam'];
$monitor2_plaq = $_POST['mon2_pat'];
$monitor3_marca = STRTOUPPER($_POST['mon1_mar']);
$monitor3_tam = $_POST['mon1_tam'];
$monitor3_plaq = $_POST['mon1_pat'];
$monitor4_marca = STRTOUPPER($_POST['mon2_mar']);
$monitor4_tam = $_POST['mon2_tam'];
$monitor4_plaq = $_POST['mon2_pat'];


$app_outros = $_POST['app_outros'];
$obs = $_POST['obs'];
$status = "1"; 

// tratamento do aplicativos
if (isset($_POST['office']))
{
    $app = "Office";
}
else
    $app = "";

if (isset($_POST['autocad']))
{
	$app1 = "AutoCad";
} else
    $app1 = "";
$apps = $app . ' ' . $app1;
// tratamento da referencia do registro 
$ref_equip = $hoje . '/ ' . $plaqueta;
/*
echo '  Patrimonio plaqueta : ' . $plaqueta . '  Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . ' tipo_equip ' . $tipo_equip.' <br>' ;
echo ' so ' .$so. ' so_arq ' .$so_arq. ' placa Mae ' .$placamae. ' processador ' .$processador. ' arm_tipo ' .$arm_tipo. ' arm_tam '.$arm_tam. ' arn_sec '  .$arm_sectipo. ' arm_sec_tam '.$arm_sectam.' <br>';
echo ' memoria_tipo '.$mem_tipo. ' mem_qtd '.$mem_tam. ' slots '  .$mem_slot. ' slots_uso '.$mem_slot_uso. ' mon_tipo '  .$monitor_tipo. ' mon1_mar '.$monitor1_marca.  ' mon1_tam ' .$monitor1_tam. ' mon1_pat '.$monitor1_plaq 
 .' mon2_mar '.$monitor2_marca.' mon2_tam '.$monitor2_tam.' mon2_pat ' .$monitor2_plaq.' <br>';
echo' App_outros '.$app_outros.' Aplicativos registrados  '.$app.'  '.$app1.' Obs '.$obs.'  '.$hoje .' parametro de referencia  '.$ref_equip;
echo "<br>";
/*/
if ($id_loc !="")
{
    if ($plaqueta <> "PENDENTE")
    {
        $result = mysqli_query($conn,'SELECT * FROM tbequip where tbequip_plaqueta = "' . $plaqueta . '" ');
        $retorno_checkInEng = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_checkInEng<>0) {
          do {
              $ret_idloc = $row['tbequi_tbcmei_id'];
              $ret_desc = $row['tbequi_mod'];
              $ret_id = $row['tbequip_id'];
              $ret_status = $row['status'];
              
             } while ($row = mysqli_fetch_assoc($result)) ;
                
               $loc_cad =nomedolocal($conn,$ret_idloc);
                $msg = "<br><br> Esse Numero de Plaqueta ( ".$plaqueta." ), ja se encontra Cadastrada em \n".$loc_cad." \n Logo nao é possivel registra-lo novamente ! ";
                    echo "<center> <p style=color:blue> <b>".nl2br($msg)." </b>  </p></center> <br><br>";
                    echo "<ul> <li> <P> <a>";
                    echo "<h3> <a href='ret_dados.php? id={$ret_id} '> * </a>  &nbsp - Id: {$ret_id} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                    echo "</a>";
                    echo "</li></P> ";
                    echo "</ul>";




                exit;
                exit;
            
        }
    }
 }

//$sqlinsert  = "INSERT INTO  tbequip (`status`, `tbequip_plaqueta`, `tb_equi_nome`, `tb_equi_tipo`, `tbequip_monitor`, `tbequi_mod`, `tbequip_so`, `tb_equi_so_arq`, `tbequi_modplaca`, `tbequi_memoria`, `tb_equi_slots`, `tb_equi_slots_uso`, `tbequi_modelomemoria`, `tbequi_armazenamento`, `tbequi_tparmazenamento`, `tb_equi_arm_sec`, `tb_equi_arm_sectam`, `tbequi_datalanc`, `tbequi_teclado`, `tbequi_mouse`, `tbequi_filtrodelinha`, `tbequi_tecnico`, `tbequi_tbcmei_id`, `tbequip_dtaalterado`, `tb_equi_app_out`, `tb_equi_app`, `tb_equi_proc`, `tb_equi_obs`)
//VALUES('$plaqueta','$monitor','$desc','$placamae','$qtdememo','$tpmemoria','$qtdehd','$tparmaz',now(),'$estteclado','$estmouse','$filtrolinha','$id_unidade')";
// $sqlinsert  = "INSERT INTO  tbequip(tbequip_plaqueta,tbequip_monitor,tbequi_mod,tbequi_modplaca,tbequi_memoria,tbequi_modelomemoria,tbequi_armazenamento,
//tbequi_tparmazenamento,tbequi_datalanc,tbequi_teclado,tbequi_mouse,	tbequi_filtrodelinha,tbequi_tbcmei_id)
//VALUES('$plaqueta','$monitor','$desc','$placamae','$qtdememo','$tpmemoria','$qtdehd','$tparmaz',now(),'$estteclado','$estmouse','$filtrolinha','$id_unidade')";

$sqlinsert = "INSERT INTO  tbequip (`status`, `tbequip_plaqueta`, `tbequi_nome`, `tbequi_tipo`, `tbequip_monitor`, `tbequi_mod`, `tbequip_so`, `tbequi_so_arq`,
    `tbequi_modplaca`, `tbequi_memoria`, `tbequi_slots`, `tbequi_slots_uso`, `tbequi_modelomemoria`, `tbequi_armazenamento`, `tbequi_tparmazenamento`,
    `tbequi_arm_sec`, `tbequi_arm_sectam`, `tbequi_datalanc`, `tbequi_teclado`, `tbequi_mouse`, `tbequi_filtrodelinha`, `tbequi_tecnico`, `tbequi_tbcmei_id`, `tbequip_dtaalterado`,
    `tbequi_app_out`, `tbequi_app`, `tbequi_proc`, `tbequi_obs`,`tbequi_ref`)
VALUES('$status','$plaqueta','$nome_pc','$tipo_equip','$monitor_tipo','$processador','$so','$so_arq',
'$placamae','$mem_tam','$mem_slot','$mem_slot_uso','$mem_tipo','$arm_tam','$arm_tipo','$arm_sectipo','$arm_sectam','$hoje','teclado','mouse','filto','$nome_usuario','$id_loc',now(),
'$app_outros','$apps','$processador','$obs','$ref_equip')";


$retorno_add = mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
            if (($retorno_add == '0') or ($retorno_add == "")) 
                {
                    echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
                    echo "<script>history.go(-1);</script>";
                }
            else
           {
               // recuperaçao do id e insercao dos monitores com o ID de referencia
               //$sql =  "SELECT * FROM tbequip where tb_equi_ref = LIKE '%".$param_busca."%' and STATUS=1 and MODULO=ESCOLAR ";
                $sql =  "SELECT * FROM tbequip where tbequi_ref ='".$ref_equip."'";
			     $result = mysqli_query($conn, $sql);
			     $linha = mysqli_fetch_assoc($result);
                 $retorno_checkInEng = mysqli_num_rows($result);
			        if(($retorno_checkInEng == 0)or($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
			         {  //  echo"retorno zero de nome na base   ".$nome;
                    echo  "Não foi possivel registrar o(s) Monitor(s) , Referencia do equipamento nao encontrada ! ";
                    }
                    else
                    {
                      $ret_equip_id = $linha['tbequip_id'];
                   // insercao de controle_ti dados do computador
                      add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                      
                      
                      
                      switch ($mon_qtd)
						  {
								  case '0':
                                {
                                  echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                }
                                   break;				
                        	  case '1':
                                { // insercao de um monitor na base
                                 $sqlmon = "INSERT INTO  tb_monitores (`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `data`) VALUES('$status','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$hoje')";
                                 $ret_add_mon = mysqli_query($conn,$sqlmon) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                           echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                ?>
                                <center>
                                     <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    
                                </center>
                                <?php

            }
                                   break;
                     	  case '2':
                                {// insercao de 2 monitores na base 
                                 $sqlmon1 = "INSERT INTO  tb_monitores (`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `data`) VALUES('$status','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$hoje')";
                                 $ret_add_mon1 = mysqli_query($conn,$sqlmon1) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                 $sqlmon2 = "INSERT INTO  tb_monitores (`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `data`) VALUES('$status','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$hoje')";
                                 $ret_add_mon2 = mysqli_query($conn,$sqlmon2) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                 echo "<script>alert('DADOS DO EQUIPAMENTO / MONITORES  SALVOS.');</script>";
                             //    echo "<br> location.href=precadequip.php?id=0"; 
                                ?>
                                  <center>
                                   <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                     <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                      <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  
                                </center>
                                <?php                                
}
                           break;    
                       }
                     }

             // exit;
           }
//echo $id_unidade . "  " . $desc . "  " . $placamae . "  " . $plaqueta . "  " . $monitor . "  " . $qtdememo . "  " . $tpmemoria . "  " . $qtdehd . "  " . $tparmaz . "  " . $estteclado . "  " . $estmouse . "  " . $filtrolinha;

?>
