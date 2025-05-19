<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
$hoje = date("d/m/Y H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$ctrl_ti = $_POST['mon1_cti'];
$id_loc = $_POST['loc_id'];

$id_sec = $_POST['sec_id'];
$tipo_equip = $_POST['tipo_equip'];
$ret_equip_id = $_POST['pc_id'];

$plaqueta = STRTOUPPER($_POST['num_plaqueta']);
$monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
$monitor1_tam = $_POST['mon1_tam'];
$monitor1_plaq = $plaqueta;
$monitor1_cat = STRTOUPPER($_POST['mon1_cat']);
$monitor1_cti = $ctrl_ti;
$monitor1_tipo = $monitor1_cat;
$monitor1_saida = "";
$ref = $hoje . "/" . $plaqueta;

$mon_qtd= "1";
$obs = $_POST['obs'];
$status = "1"; 

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
        $result = mysqli_query($conn,'SELECT * FROM tb_monitores where mon_plaqueta = "' . $plaqueta . '" ');
        $retorno_checkInEng = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($retorno_checkInEng<>0) {
          do {
              $ret_idloc = $row['local_id'];
              $ret_ctrl_ti = $row['ctrl_ti'];
              
              
             } while ($row = mysqli_fetch_assoc($result)) ;
                
               $loc_cad =nomedolocal($conn,$ret_idloc);
                $msg = "<br><br> Esse Numero de Plaqueta ( ".$plaqueta." ), ja se encontra Cadastrada em \n".$loc_cad." \n Logo nao é possivel registra-lo novamente ! ";
                    echo "<center> <p style=color:blue> <b>".nl2br($msg)." </b>  </p></center> <br><br>";
                    echo "<ul> <li> <P> <a>";
                    echo "<h3> <a href='ret_dadosm.php? id={$ret_ctrl_ti} '> * </a>  &nbsp - CTI: {$ret_ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp - <br /> </h3>";
                    echo "</a>";
                    echo "</li></P> ";
                    echo "</ul>";




                exit;
                exit;
            
        }
    }
 }                   switch ($mon_qtd)
						  {
								  case '0':
                                {
                                  echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                }
                                   break;				
                        	  case '1': { // insercao de um monitor na base

                                            //  busca em controle_ti  se ja existe cadastro // 
                                            if (ret_ctrl_ti($conn, $ctrl_ti) == "0") { // busca em controle_ti  se ja existe cadastro   
                                                //realiza a busca em Monitores  se ja existe cadastro //       
                                                if (ret_ctrl_ti_monitor($conn, $ctrl_ti) == "0")  //realiza a busca em Monitores  se ja existe cadastro // 
                                                    $erros = "0";
                                                else
                                                    $erros = "1";
                                            } else
                                                $erros = "1";
                                              // fim das checagens ...

                                               if($erros=="1")
                                               {
                                                    echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $ctrl_ti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                                                    echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                                                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                                                    echo " <br><br> <center><a href='busca_diversos.php?cti=".$ctrl_ti."' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                               }
                                            else
                                            {
                                                // insercao em tabela monitores 
                                                $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref')";
                                                $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                                echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";

                                                // recupera o id cadastrado na base  $ref = $hoje."/".$nome_usuario;
                                                $ref_id = busca_id($conn, $ref, "tb_monitores");
                                                //   $ctrl_ti = $_POST['ctrl_ti'];


                                                // insercao em controle_ti ...
                                                //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
                                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $nome_usuario);

                                                if ($add_ti == 0) {
                                                    echo "Erro de Inserçao de Controle T.I." . " CTI :" . $ctrl_ti;
                                                } else {

                                                    echo "<script>alert('Monitor SALVO.');  </script>";
                                                    echo "<center><br><br>";
                                                    echo " <strong> Dados Recebidos <br><br>";
                                                    echo " MONITOR <br>";
                                                    echo "Equipamento marca " . $monitor1_marca . " <br>";
                                                    echo "Patrimonio " . $monitor1_plaq . " CONTROLE T.I " . $ctrl_ti . "     <br>";
                                                    echo "Tipo : " . $monitor1_tipo . " <br>";
                                                    echo "Tamanho :  " . $monitor1_tam . " <br><br>";
                                                    echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
                                                    echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
                                                    echo "</strong> </center>";
                                                    echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $nome_usuario . " referencia : " . busca_id($conn, $ref, "tb_monitores") . "  </i></center>";
                                                    ?>
                                                                                <center>
                                                                                <br><br>
                                                                                <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?>$tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                                                                <a href="cadequipmult_mon.php?loc=<?php echo $id_loc; ?>&id_ref=<?php echo $ctrl_ti; ?> &CTI=<?php echo $ctrl_ti; ?>&Patrimonio=<?php echo $monitor1_plaq; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                                                                <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    
                                                                            </center>
                                                                            <?php
                                                }
                                            }
                                        }
                                   break;
                     	  case '2':
                                {// insercao de 2 monitores na base   desabilitado
                                 $sqlmon1 = "INSERT INTO  tb_monitores (`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `data`) VALUES('$status','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$hoje')";
                                 $ret_add_mon1 = mysqli_query($conn,$sqlmon1) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                 $sqlmon2 = "INSERT INTO  tb_monitores (`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `data`) VALUES('$status','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$hoje')";
                                 $ret_add_mon2 = mysqli_query($conn,$sqlmon2) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                                 echo "<script>alert('DADOS DO EQUIPAMENTO / MONITORES  SALVOS.');</script>";
                                 echo "<br> location.href=precadequip.php?id=0"; 
                                ?>
                                  <center>
                                   <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>$tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                   
                                      <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  
                                </center>
                                <?php                                
}
                           break;    
                       }
                     //}

             // exit;
          // }
//echo $id_unidade . "  " . $desc . "  " . $placamae . "  " . $plaqueta . "  " . $monitor . "  " . $qtdememo . "  " . $tpmemoria . "  " . $qtdehd . "  " . $tparmaz . "  " . $estteclado . "  " . $estmouse . "  " . $filtrolinha;

?>
