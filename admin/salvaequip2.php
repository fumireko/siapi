<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');


$hoje = date("Y/m/d H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$origem = $_POST['origem']; // ficar atento a cadastro de notebook
//$nome_usuario = $_POST['rec_user'];
if ($origem == "cadastro") // formulario de cadastro de pc = cadastro   /     formulario de cadastro de notebook = cadastro_n   /    
{
    $plaqueta = STRTOUPPER($_POST['plaqueta']);
    $nome_pc = STRTOUPPER($_POST['nome_equip']);
    $id_loc = $_POST['loc_id'];
    $id_sec = $_POST['sec_id'];
    $tipo_equip = strtoupper($_POST['tipo_equip']);
    $so = $_POST['so_tipo'];
    $reserva = $_POST['reserva'];
    $lacre = $_POST['lacre'];
    $ctrl_ti = $_POST['ctrl_ti'];
    $util_qtd = $_POST['utilizadores_num'];
    $util_nomes = $_POST['utilizadores_nomes'];
    $so_arq = "64 b";

    //$so_arq = $_POST['so_arq'];

    $placa_sel = $_POST['placa'];
    $proc_sel = $_POST['processador'];

    // tratamento para placa e processador digitado manunalmente
    if (isset($_POST['placaD'])) {
        $placa_dig = $_POST['placaD'];
    } else {
        $placa_dig = "VAZIO";
    }

    if (isset($_POST['processadorD'])) {
        $proc_dig = $_POST['processadorD'];
    } else {
        $proc_dig = "VAZIO";
    }



    // tratamento da placa mae para campo Digitavel ou Selecionavel
    if (($placa_sel == "0") or ($placa_sel == "1")) {
        $placamae = $placa_dig;
    } else {
        $placamae = $placa_sel;
    }

    // tratamento do processador para campo Digitavel ou Selecionavel
    if (($proc_sel == "0") or ($proc_sel == "1")) {
        $processador =  $proc_dig;
    } else {
        $processador =  $proc_sel;
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

    // tratamento de CTI do(s) monitor(s)

    $codigo_v = "";
    $codigo_h = "";
    $codigo_d = "";
    $codigo_p = "";
    $erro = "";

    $ret_monitorv = "";
    $ret_monitorh = "";
    $ret_monitord = "";
    $ret_monitorp = "";
    $ret_monitor = "Vazio";
    $ret_cti_monitor = "0";

    if ($monitor_tipo == "UNICO")
    {
        if (($_POST['vga_util']) == "1") // if (isset($_POST['monv_cti'])<>"")  
        {
            $vid_uso = $_POST['vga_util']." VGA";
            $ret_monitorv = $_POST['monv_cti'];
            $ret_monitor = $_POST['monv_cti'];
            $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);
        } else
        {
            if ($_POST['hdmi_util'] == "1")  // if (isset($_POST['monh_cti']) <> "") 
            {
                 $vid_uso = $_POST['hdmi_util'] . " HDMI";
                $ret_monitorh = $_POST['monh_cti'];
                $ret_monitor = $_POST['monh_cti'];
                $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);
            } else
            {
                if ($_POST['dvi_util'] == "1") //  if (isset($_POST['mond_cti']) <> "")
                {
                    $vid_uso = $_POST['dvi_util'] . " DVI";
                    $ret_monitord = $_POST['mond_cti'];
                    $ret_monitor = $_POST['mond_cti'];
                    $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);
                } else 
                {
                   if ($_POST['display_util']=="1"){ // if (isset($_POST['monp_cti']) <> "") {
                       $vid_uso = $_POST['display_util']." DISPLAY";
                        $ret_monitorp = $_POST['monp_cti'];
                        $ret_monitor = $_POST['monp_cti'];
                        $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);
                    }
                  
                }
            }
        }
        //   echo " Monitor tipo ". $monitor_tipo  . " CTI V ". $ret_monitorv  ."CTI H " . $ret_monitorh."CTI d ". $ret_monitord  ."CTI P " . $ret_monitorp."  Geral : ". $ret_monitor; 
                   $makina =  ret_uso_mon_cti_ctrl_ti($conn, $ret_monitor);  // if (($ret_cti_monitor == 1)or($ret_monitor==""))  { // ja encontra-se cadastrado na base o CTI do monitor .
          if (($ret_cti_monitor == 1)|| ($ret_cti_monitor == "vazio")) 
           {        // or ($ret_cti_monitor="vazio") ja encontra-se cadastrado na base o CTI do monitor .
               $erro = 1;
            if ($ret_cti_monitor == "vazio")
                $motivo = "Campo Vazio";
            else
                $motivo = " ja foi Cadastrado no sistema  anteriormente";
                   $posicao = " Tentativa de add Monitor (unico) " . $ret_monitor . " no PC " . $ctrl_ti . "  recusado !  motivo , ".$motivo." , Controle T.I " . $makina . " - " . $hoje . " Tecnico " . $nome_usuario;
                    arquivo_grava("descritivos.txt", $posicao);
                    echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor ". $monitor_tipo."  (Unico), saida de Video  :".$vid_uso  ."        de CTI nº :" . $ret_monitor ." ( ".$ret_cti_monitor. " ) " .$motivo. "  !   (" . $makina . ")    </b>  </p></center>     ";
                    echo " <br> <br> <center>  <p style=color:RED> <b> Logo não é possivel associar ou cadastra-lo  novamente para esse dispositivo  nessa pagina ! (erro131).    </b>  </p></center>     ";
                    echo " <br> <br> <center>  <p style=color:black> <b> Voce conseguira vincular esse monitor ao pc no realizando uma  alteraçao no Monitor e associando ao CTI desse PC " . $ctrl_ti . " . </b>  </p></center>     ";
                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center>  ";
                    echo " <br><br> <center><a href='ret_dadosm_pop.php?id=" . $ret_monitor . "' title='Visualizar Dados do Monitor Cadatrado ' target='_blank' >Visualizar Infs do Monitor " . $ret_monitor . " </a> </center> <br/>";
                    //echo " <br><br> <center><a href='busca_diversos.php?cti=" . $ret_monitor . "' title='Visualizar Dados do Monitor'>Consultar Infs do Monitor " . $ret_monitor . " </a> </center> <br/>";
          //     }
          } // fim do  if (($ret_cti_monitor == 1)|| ($ret_cti_monitor = "vazio")) 
    }// fim do if unico
    else
        if ($monitor_tipo == "DUPLO")
        {
            $duplos_cti = "";
            $duplos_vazio = 0;
              $ret_cti_monitorv="";
              $ret_cti_monitorh="";
              $ret_cti_monitord="";
              $ret_cti_monitorp="";

            if ($_POST['vga_util'] == "1") //if (isset($_POST['monv_cti'])) 
            {
                $ret_monitor = $_POST['monv_cti'];
                $ret_monitorv = $ret_monitor;
                $ret_cti_monitorv = ret_ctrl_ti($conn, $ret_monitor);
                $codigo_v = $ret_cti_monitorv;
                $duplos_cti.=$ret_monitor." ";
                if ($ret_monitor == "")
                    $duplos_vazio = $duplos_vazio + 1;
            
            }
            if ($_POST['hdmi_util'] == "1") // if (isset($_POST['monh_cti']))
            {
                $ret_monitor = $_POST['monh_cti'];
                $ret_monitorh = $ret_monitor;
                $ret_cti_monitorh = ret_ctrl_ti($conn, $ret_monitor);
                $codigo_h = $ret_cti_monitorh;
                $duplos_cti.=$ret_monitor." ";
                if ($ret_monitor == "")
                    $duplos_vazio = $duplos_vazio + 1;
            }
           if ($_POST['dvi_util'] == "1") //  if (isset($_POST['mond_cti'])) 
           {
                $ret_monitor = $_POST['mond_cti'];
                $ret_monitord = $ret_monitor;
                $ret_cti_monitord = ret_ctrl_ti($conn, $ret_monitor);
                $codigo_d = $ret_cti_monitord;
                $duplos_cti.=$ret_monitor." ";
                if ($ret_monitor == "")
                    $duplos_vazio = $duplos_vazio + 1;
            }
            if ($_POST['display_util'] == "1")  //if (isset($_POST['monp_cti'])) 
            {
                $ret_monitor = $_POST['monp_cti'];
                $ret_monitorp = $ret_monitor;
                $ret_cti_monitorp = ret_ctrl_ti($conn, $ret_monitor);
                $codigo_p = $ret_cti_monitorp;
                $duplos_cti.=$ret_monitor." ";
                if ($ret_monitor == "")
                    $duplos_vazio = $duplos_vazio + 1;
            }
            $codigo = $codigo_v . " " . $codigo_h . " " . $codigo_d . " " . $codigo_p;

            if (($ret_cti_monitorv == 1) or ($ret_cti_monitorh == 1) or ($ret_cti_monitord == 1) or ($ret_cti_monitorp == 1)or($duplos_vazio > 2)) { // ja encontra-se cadastrado na base o CTI do monitor .
                $erro = 1;
               $posicao = " Tentativa de add Monitor (D)".$duplos_cti  . " no PC ".$ctrl_ti."  recusado !  motivo , equip ja cadastrado na base ou CTI em branco  - ".$hoje." Tecnico ".$nome_usuario;
               arquivo_grava("descritivos.txt",$posicao) ;
                echo " <br> <br> <center>  <p style=color:RED> <b>  Problema na inserçao (DUPLO) de Monitor(es) Verifique o CTI Digitado ou  Consulte o CTI deles  !!    </b>  </p></center>     ";

                echo "  <center>  <p style=color:RED> <b> ".ret_ctrl_ti_ref($conn,$ret_monitorv).  " <br> " . ret_ctrl_ti_ref($conn,$ret_monitorh). " <br> ".ret_ctrl_ti_ref($conn,$ret_monitord). " <br> ".ret_ctrl_ti_ref($conn,$ret_monitorp).  "</b>  </p> </center>     ";
                echo " <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento nessa pagina !  </b>  </p></center>     ";
               
                echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                echo " <br><br> <center><a href='busca_diversos.php' title='Visualizar Dados do Monitor'  target='_blank' >Visualizar Infs dos Monitores " . $duplos_cti . " </a> </center> <br/>";
            }
        }// fim do duplo 
        else
            if ($monitor_tipo == "TRIPLO")
            {
              //  $erro = 1;
                $ret_cti_monitorv = "";
                $ret_cti_monitorh = "";
                $ret_cti_monitord = "";
                $ret_cti_monitorp = "";
                $vazio = 3;
                $triplos_cti = "";
                if ($_POST['vga_util'] == "1") //if (isset($_POST['monv_cti']))
                {
                    if (!empty($_POST['monv_cti'])) {
                        $ret_monitor = $_POST['monv_cti'];
                        $ret_monitorv = $ret_monitor;
                        $ret_cti_monitorv = ret_ctrl_ti($conn, $ret_monitor);
                        $codigo_v = $ret_monitor;
                        $triplos_cti .= $ret_monitor . " ";
                        $vazio = $vazio - 1;
                    }
                }
                if ($_POST['hdmi_util'] == "1") // if (isset($_POST['monh_cti']) )
                {
                    if (!empty($_POST['monh_cti'])) {
                    $ret_monitor = $_POST['monh_cti'];
                    $ret_monitorh = $ret_monitor;
                    $ret_cti_monitorh = ret_ctrl_ti($conn, $ret_monitor);
                    $codigo_h = $ret_monitor;
                    $triplos_cti.=$ret_monitor." ";
                    $vazio = $vazio - 1;
                    }
                    }
                if ($_POST['dvi_util'] == "1") //if (isset($_POST['mond_cti'])) 
                {
                     if (!empty($_POST['mond_cti'])) { 
                    $ret_monitor = $_POST['mond_cti'];
                    $ret_monitord = $ret_monitor;
                    $ret_cti_monitord = ret_ctrl_ti($conn, $ret_monitor);
                    $codigo_d = $ret_monitor;
                    $triplos_cti.=$ret_monitor." ";
                    $vazio = $vazio - 1;
                  }
                }
                if ($_POST['display_util'] == "1") //if (isset($_POST['monp_cti'])) 
                {
                    if (!empty($_POST['monp_cti'])) {
                    $ret_monitor = $_POST['monp_cti'];
                    $ret_monitorp = $ret_monitor;
                    $ret_cti_monitorp = ret_ctrl_ti($conn, $ret_monitor);
                    $codigo_p = $ret_monitor;
                    $triplos_cti.=$ret_monitor." ";
                    $vazio = $vazio - 1;
                    }
                }
                $codigo = $codigo_v . " " . $codigo_h . " " . $codigo_d . " " . $codigo_p;

                // checagem dos tipos de videos marcados 
                $sem_uso = 4;
                if ($_POST['vga_util'] == "1")
                    $sem_uso = $sem_uso - 1;
                if ($_POST['hdmi_util'] == "1")
                    $sem_uso = $sem_uso - 1;
                if ($_POST['dvi_util'] == "1")
                    $sem_uso = $sem_uso - 1;
                if ($_POST['display_util'] == "1")
                    $sem_uso = $sem_uso - 1;

                // fim de checagem de Sem uso



                if (($vazio>0) or ($sem_uso>1) or ($ret_cti_monitorv == 1) or ($ret_cti_monitorh == 1) or ($ret_cti_monitord == 1) or ($ret_cti_monitorp == 1))
                {
                  //  if (($ret_cti_monitorv == 1) or ($ret_cti_monitorh == 1) or ($ret_cti_monitord == 1) or ($ret_cti_monitorp == 1)) { // ja encontra-se cadastrado na base o CTI do monitor .
                        $erro = 1;
                        $posicao = " Tentativa de add Monitor (T)" . $triplos_cti . " no PC " . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                        arquivo_grava("descritivos.txt", $posicao);
                        echo " <br> <br> <center>  <p style=color:RED> <b>  Houve um Problema nos dados de um ou mais Monitores (TRIPLO) , verifique novamente ou Consulte o CTI deles  !    </b>  </p></center>     ";
                        // echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor de CTI nº :" . $codigo . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                    echo "  <center>  <p style=color:RED> <b> " . ret_ctrl_ti_ref($conn, $ret_monitorv) . " <br> " . ret_ctrl_ti_ref($conn, $ret_monitorh) . " <br> " . ret_ctrl_ti_ref($conn, $ret_monitord) . " <br> " . ret_ctrl_ti_ref($conn, $ret_monitorp) . "</b>  </p> </center>     ";
                        echo " <br> <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento   </b>  </p></center>     ";
                        echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                        echo " <br><br> <center><a href='busca_diversos.php' title='Visualizar Dados do Monitor'  target='_blank' >Visualizar Infs dos Monitores " . $triplos_cti . " </a> </center> <br/>";
                    //}
                }
             //   echo "   " . $monitor_tipo . "   " . $erro . "  Vazio =  " . $vazio . "  " . $codigo . "   Sem uso " . $sem_uso;
                


            }// fim do triplo

    if ($erro <> 1)  // checagem se houve alguma ocorrencia de erro em monitores 
    {
        // tratamento de monitor(s) de acordo com o especificado
        // tratamento do monitor
        if ($monitor_tipo == "UNICO")
        {
            $mon_qtd = 1;
            // verifica qual esta em uso //
            if ($_POST['vga_util'] == "1") {
                $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                $monitor1_tam = $_POST['monv_pol'];
                $monitor1_plaq = $_POST['monv_pat'];
                $monitor1_tipo = $_POST['monv_cat'];
                $monitor1_cti = $_POST['monv_cti'];
                $monitor1_saida = "VGA";
                $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti;
            } else
               {
                if ($_POST['hdmi_util'] == "1") {
                    $monitor1_marca = STRTOUPPER($_POST['monh_mar']);
                    $monitor1_tam = $_POST['monh_pol'];
                    $monitor1_plaq = $_POST['monh_pat'];
                    $monitor1_tipo = $_POST['monh_cat'];
                    $monitor1_cti = $_POST['monh_cti'];
                    $monitor1_saida = "HDMI";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI  " . $monitor1_cti;
                } else {
                    if ($_POST['dvi_util'] == "1") {
                        $monitor1_marca = STRTOUPPER($_POST['mond_mar']);
                        $monitor1_tam = $_POST['mond_pol'];
                        $monitor1_plaq = $_POST['mond_pat'];
                        $monitor1_tipo = $_POST['mond_cat'];
                        $monitor1_cti = $_POST['mond_cti'];
                        $monitor1_saida = "DVI";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti;
                    } else {
                        $monitor1_marca = STRTOUPPER($_POST['monp_mar']);
                        $monitor1_tam = $_POST['monp_pol'];
                        $monitor1_plaq = $_POST['monp_pat'];
                        $monitor1_tipo = $_POST['monp_cat'];
                        $monitor1_cti = $_POST['monp_cti'];
                        $monitor1_saida = "DISPLAY PORT";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti;
                    }
                }
            }
        } // fim do unico 
        else
        {
           if ($monitor_tipo == "DUPLO") 
             {
                $mon_qtd = 2;
                // verifica qual esta em uso //
                if (($_POST['vga_util'] == "1") and ($_POST['hdmi_util'] == "1")) {
                    $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                    $monitor1_tam = $_POST['monv_pol'];
                    $monitor1_plaq = $_POST['monv_pat'];
                    $monitor1_tipo = $_POST['monv_cat'];
                    $monitor1_cti = $_POST['monv_cti'];
                    $monitor1_saida = "VGA";
                    $monitor2_marca = STRTOUPPER($_POST['monh_mar']);
                    $monitor2_tam = $_POST['monh_pol'];
                    $monitor2_plaq = $_POST['monh_pat'];
                    $monitor2_tipo = $_POST['monh_cat'];
                    $monitor2_cti = $_POST['monh_cti'];
                    $monitor2_saida = "HDMI";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . "  CTI " . $monitor2_cti;
                }
                if (($_POST['vga_util'] == "1") and ($_POST['dvi_util'] == "1")) {
                    $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                    $monitor1_tam = $_POST['monv_pol'];
                    $monitor1_plaq = $_POST['monv_pat'];
                    $monitor1_tipo = $_POST['monv_cat'];
                    $monitor1_cti = $_POST['monv_cti'];
                    $monitor1_saida = "VGA";
                    $monitor2_marca = STRTOUPPER($_POST['mond_mar']);
                    $monitor2_tam = $_POST['mond_pol'];
                    $monitor2_plaq = $_POST['mond_pat'];
                    $monitor2_tipo = $_POST['mond_cat'];
                    $monitor2_cti = $_POST['mond_cti'];
                    $monitor2_saida = "DVI";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti;
                }
                if (($_POST['vga_util'] == "1") and ($_POST['display_util'] == "1")) {
                    $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                    $monitor1_tam = $_POST['monv_pol'];
                    $monitor1_plaq = $_POST['monv_pat'];
                    $monitor1_tipo = $_POST['monv_cat'];
                    $monitor1_cti = $_POST['monv_cti'];
                    $monitor1_saida = "VGA";
                    $monitor2_marca = STRTOUPPER($_POST['monp_mar']);
                    $monitor2_tam = $_POST['monp_pol'];
                    $monitor2_plaq = $_POST['monp_pat'];
                    $monitor2_tipo = $_POST['monp_cat'];
                    $monitor2_cti = $_POST['monp_cti'];
                    $monitor2_saida = "Display Port";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti;
                }
                if (($_POST['hdmi_util'] == "1") and ($_POST['dvi_util'] == "1")) {
                    $monitor1_marca = STRTOUPPER($_POST['monh_mar']);
                    $monitor1_tam = $_POST['monh_pol'];
                    $monitor1_plaq = $_POST['monh_pat'];
                    $monitor1_tipo = $_POST['monh_cat'];
                    $monitor1_cti = $_POST['monh_cti'];
                    $monitor1_saida = "HDMI";
                    $monitor2_marca = STRTOUPPER($_POST['mond_mar']);
                    $monitor2_tam = $_POST['mond_pol'];
                    $monitor2_plaq = $_POST['mond_pat'];
                    $monitor2_tipo = $_POST['mond_cat'];
                    $monitor2_cti = $_POST['mond_cti'];
                    $monitor2_saida = "DVI";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti;
                }
                if (($_POST['hdmi_util'] == "1") and ($_POST['display_util'] == "1")) {
                    $monitor1_marca = STRTOUPPER($_POST['monh_mar']);
                    $monitor1_tam = $_POST['monh_pol'];
                    $monitor1_plaq = $_POST['monh_pat'];
                    $monitor1_tipo = $_POST['monh_cat'];
                    $monitor1_cti = $_POST['monh_cti'];
                    $monitor1_saida = "HDMI";
                    $monitor2_marca = STRTOUPPER($_POST['monp_mar']);
                    $monitor2_tam = $_POST['monp_pol'];
                    $monitor2_plaq = $_POST['monp_pat'];
                    $monitor2_tipo = $_POST['monp_cat'];
                    $monitor2_cti = $_POST['monp_cti'];
                    $monitor2_saida = "DISPLAY PORT";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti;
                }
                if (($_POST['dvi_util'] == "1") and ($_POST['display_util'] == "1")) 
                  {
                    $monitor1_marca = STRTOUPPER($_POST['mond_mar']);
                    $monitor1_tam = $_POST['mond_pol'];
                    $monitor1_plaq = $_POST['mond_pat'];
                    $monitor1_tipo = $_POST['mond_cat'];
                    $monitor1_cti = $_POST['mond_cti'];
                    $monitor1_saida = "DVI";
                    $monitor2_marca = STRTOUPPER($_POST['monp_mar']);
                    $monitor2_tam = $_POST['monp_pol'];
                    $monitor2_plaq = $_POST['monp_pat'];
                    $monitor2_tipo = $_POST['monp_cat'];
                    $monitor2_cti = $_POST['monp_cti'];
                    $monitor2_saida = "DISPLAY PORT";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti;
                 }
            } // fim do duplo
            else
               {
                 if ($monitor_tipo == "TRIPLO")
                 {
                    $mon_qtd = 3;
                    if (($_POST['vga_util'] == "1") and ($_POST['hdmi_util'] == "1") and ($_POST['dvi_util'] == "1")) {
                        $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                        $monitor1_tam = $_POST['monv_pol'];
                        $monitor1_plaq = $_POST['monv_pat'];
                        $monitor1_tipo = $_POST['monv_cat'];
                        $monitor1_cti = $_POST['monv_cti'];
                        $monitor1_saida = "VGA";
                        $monitor2_marca = STRTOUPPER($_POST['monh_mar']);
                        $monitor2_tam = $_POST['monh_pol'];
                        $monitor2_plaq = $_POST['monh_pat'];
                        $monitor2_tipo = $_POST['monh_cat'];
                        $monitor2_cti = $_POST['monh_cti'];
                        $monitor2_saida = "HDMI";
                        $monitor3_marca = STRTOUPPER($_POST['mond_mar']);
                        $monitor3_tam = $_POST['mond_pol'];
                        $monitor3_plaq = $_POST['mond_pat'];
                        $monitor3_tipo = $_POST['mond_cat'];
                        $monitor3_cti = $_POST['mond_cti'];
                        $monitor3_saida = "DVI";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . "   CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . "   CTI " . $monitor2_cti . " / " . $monitor3_marca . " " . $monitor3_tam . "  " . $monitor3_plaq . "  " . $monitor3_tipo . "  CTI  " . $monitor3_cti;
                    }
                    if (($_POST['vga_util'] == "1") and ($_POST['hdmi_util'] == "1") and ($_POST['display_util'] == "1")) {
                        $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                        $monitor1_tam = $_POST['monv_pol'];
                        $monitor1_plaq = $_POST['monv_pat'];
                        $monitor1_tipo = $_POST['monv_cat'];
                        $monitor1_cti = $_POST['monv_cti'];
                        $monitor1_saida = "VGA";
                        $monitor2_marca = STRTOUPPER($_POST['monh_mar']);
                        $monitor2_tam = $_POST['monh_pol'];
                        $monitor2_plaq = $_POST['monh_pat'];
                        $monitor2_tipo = $_POST['monh_cat'];
                        $monitor2_cti = $_POST['monh_cti'];
                        $monitor2_saida = "HDMI";
                        $monitor3_marca = STRTOUPPER($_POST['monp_mar']);
                        $monitor3_tam = $_POST['monp_pol'];
                        $monitor3_plaq = $_POST['monp_pat'];
                        $monitor3_tipo = $_POST['monp_cat'];
                        $monitor3_cti = $_POST['monp_cti'];
                        $monitor3_saida = "DISPLAY PORT";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . "  CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . "  CTI " . $monitor2_cti . " / " . $monitor3_marca . " " . $monitor3_tam . "  " . $monitor3_plaq . "  " . $monitor3_tipo . " CTI " . $monitor3_cti;
                    }
                    if (($_POST['vga_util'] == "1") and ($_POST['dvi_util'] == "1") and ($_POST['display_util'] == "1")) {
                        $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                        $monitor1_tam = $_POST['monv_pol'];
                        $monitor1_plaq = $_POST['monv_pat'];
                        $monitor1_tipo = $_POST['monv_cat'];
                        $monitor1_cti = $_POST['monv_cti'];
                        $monitor1_saida = "VGA";
                        $monitor2_marca = STRTOUPPER($_POST['mond_mar']);
                        $monitor2_tam = $_POST['mond_pol'];
                        $monitor2_plaq = $_POST['mond_pat'];
                        $monitor2_tipo = $_POST['mond_cat'];
                        $monitor2_cti = $_POST['mond_cti'];
                        $monitor2_saida = "DVI";
                        $monitor3_marca = STRTOUPPER($_POST['monp_mar']);
                        $monitor3_tam = $_POST['monp_pol'];
                        $monitor3_plaq = $_POST['monp_pat'];
                        $monitor3_tipo = $_POST['monp_cat'];
                        $monitor3_cti = $_POST['monp_cti'];
                        $monitor3_saida = "DISPLAY PORT";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI  " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti . " / " . $monitor3_marca . " " . $monitor3_tam . "  " . $monitor3_plaq . "  " . $monitor3_tipo . " CTI " . $monitor3_cti;
                    }
                    if (($_POST['hdmi_util'] == "1") and ($_POST['dvi_util'] == "1") and ($_POST['display_util'] == "1")) {
                        $monitor1_marca = STRTOUPPER($_POST['monh_mar']);
                        $monitor1_tam = $_POST['monh_pol'];
                        $monitor1_plaq = $_POST['monh_pat'];
                        $monitor1_tipo = $_POST['monh_cat'];
                        $monitor1_cti = $_POST['monh_cti'];
                        $monitor1_saida = "HDMI";
                        $monitor2_marca = STRTOUPPER($_POST['mond_mar']);
                        $monitor2_tam = $_POST['mond_pol'];
                        $monitor2_plaq = $_POST['mond_pat'];
                        $monitor2_tipo = $_POST['mond_cat'];
                        $monitor2_cti = $_POST['mond_cti'];
                        $monitor2_saida = "DVI";
                        $monitor3_marca = STRTOUPPER($_POST['monp_mar']);
                        $monitor3_tam = $_POST['monp_pol'];
                        $monitor3_plaq = $_POST['monp_pat'];
                        $monitor3_tipo = $_POST['monp_cat'];
                        $monitor3_cti = $_POST['monp_cti'];
                        $monitor3_saida = "DISPLAY PORT";
                        $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti . " / " . $monitor2_marca . " " . $monitor2_tam . "  " . $monitor2_plaq . "  " . $monitor2_tipo . " CTI " . $monitor2_cti . " / " . $monitor3_marca . " " . $monitor3_tam . "  " . $monitor3_plaq . "  " . $monitor3_tipo . " CTI " . $monitor3_cti;
                    }
                } // fim do triplo
                 else // inicio do nenhum
                  {
                    $mon_qtd = 0;
                    $monitor_resumo = "Nenhum Monitor";
                  } // fim do nenhum
            } // fim do else ante triplo
        } 

        if ($_POST['local_cad'] == "1") 
        {
            $local_cad = "Laboratorio";
        }
        if ($_POST['local_cad'] == "2") {
            $local_cad = "Local";
        }

        // tratamento de saida de video  de acordo com o especificado e saidas em uso 

        /*$vga_uso = " VGA  : " . $_POST['vga_util'] . " / ";
        $hdmi_uso = " HDMI  : " . $_POST['hdmi_util'] . " / ";
        $dvi_uso = " DVI  : " . $_POST['dvi_util'] . " / ";
        $display_uso = " DISPLAY  : " . $_POST['display_util'] . "  ";
        */

        if (isset($_POST['vga'])) {
            //echo "checkbox marcado! <br/>";
            $vga = " VGA ";
              if ($_POST['vga_util'] == "1") // Em uso
                $vga_uso = " VGA   ";// . $_POST['vga_util'] . " / ";
              else
                $vga_uso = "";
            
        } else {
            $vga = "";
            $vga_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['hdmi'])) {
            //echo "checkbox marcado! <br/>";
            $hdmi = " HDMI ";
            if ($_POST['hdmi_util'] == "1") // Em uso
                $hdmi_uso = " HDMI   ";// . $_POST['hdmi_util'] . "  ";
            else
                $hdmi_uso = "";
        } else {
            $hdmi = "";
            $hdmi_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['dvi'])) {
            //echo "checkbox marcado! <br/>";
            $dvi = " DVI ";
            if ($_POST['dvi_util'] == "1")
                $dvi_uso = " DVI   ";// . $_POST['dvi_util'] . "  ";
            else
                $dvi_uso = "";
        } else {
            $dvi = "";
            $dvi_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['display'])) {
            //echo "checkbox marcado! <br/>";
            $display = " Display ";
            if ($_POST['display_util'] == "1")
                $display_uso = " DISPLAY   ";// . $_POST['display_util'] . " / ";
            else
                $display_uso = "";
        } else {
            $display = "";
            $display_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        $video_saida = $vga . $hdmi . $dvi . $display;


        $mon_hist = $ret_monitorv." - " . $ret_monitorh." - " .$ret_monitord." - " . $ret_monitorp; //$_POST['monv_cti'] . " - " . $_POST['monh_cti'] . " - " . $_POST['mond_cti'] . " - " . $_POST['monp_cti'] ;
        //$vga_uso =" VGA  : ".$_POST['vga_util']." / ";
//$hdmi_uso = " HDMI  : ".$_POST['hdmi_util']." / ";
//$dvi_uso = " DVI  : ".$_POST['dvi_util']." / ";
//$display_uso = " DISPLAY  : ".$_POST['display_util']."  ";


        $video_portas_uso = $vga_uso . $hdmi_uso . $dvi_uso . $display_uso;
        // tratamento de fonte
        $fonte_inst = $_POST['fonte_tipo'] . " / " . $_POST['fonte_pot'];
        // tratamento de utilizadores
        $utilizadores_qtd = $_POST['utilizadores_num'];

        $utilizadores_nomes =remover_acentos1(strtoupper($_POST['utilizadores_nomes']));
       

        $responsavel = remover_acentos1(strtoupper($_POST['resp']));

        $obsvid = $_POST['obsvid'];

        $obs = $_POST['obs'];
        $status = "1";

        // tratamento do aplicativos
        $app_outros = $_POST['app_outros'];
        if (isset($_POST['office'])) {
            $app = "Office";
        } else
            $app = "";

        if (isset($_POST['cad'])) {
            $app1 = "ZW_Cad";
        } else
            $app1 = "";
        $apps = $app . ' ' . $app1;
        // tratamento da referencia do registro 
        $ref_equip = $hoje . '/ ' . $plaqueta;
        /*

        // visualizacao de teste //
        echo "<center> <br> ";
        echo "Dados do Equipamento <br> ";
        echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip. ' Lacre da TI ' . $lacre .' <br>' ;
        echo '<br>Sistema Operacional : ' .$so. '<br> Placa Mae ' .$placamae. ' <br> Processador ' .$processador. '<br>  Armazenamento  tipo ' .$arm_tipo. ' HD Tam '.$arm_tam. ' Arn_sec '  .$arm_sectipo. ' arm_sec_tam '.$arm_sectam.' <br>';
        echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso."<br>";
        echo '<br>Monitor tipo '  .$monitor_tipo. '   Qtd Monitores  '.$mon_qtd ;
        echo '<br> Infs Monitor  ' . $monitor_resumo;
        echo '<br>  Saidas Videos  : '.$video_saida.'  <br>  Videos em uso    '.$video_portas_uso ;
        echo '<br>  fonte     ' . $fonte_inst ;
        echo ' <br><br>App_outros '.$app_outros.' Aplicativos registrados  '.$app.'  '.$app1.'<br> Obs '.$obs.'  '.$hoje .'<br> parametro de referencia  '.$ref_equip;
        echo '<br> Utilizadores qtd :    '.$util_qtd.'  <br> Nome dos Utilizadores   '.$util_nomes;
        echo '<br>';
        echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ' ;
        echo "</center>";
        // fim de visualizacao teste //
        */


        if ($id_loc != "")
        {
            if ($plaqueta <> "PENDENTE") {
                $result = mysqli_query($conn, 'SELECT * FROM tbequip where tbequip_plaqueta = "' . $plaqueta . '" ');
                $retorno_checkInEng = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                if ($retorno_checkInEng <> 0) {
                    do {
                        $ret_idloc = $row['tbequi_tbcmei_id'];
                        $ret_desc = $row['tbequi_mod'];
                        $ret_id = $row['tbequip_id'];
                        $ret_status = $row['status'];

                    } while ($row = mysqli_fetch_assoc($result));

                    $loc_cad = nomedolocal($conn, $ret_idloc);
                    $msg = "<br><br> Esse Numero de Patrimonio  ( " . $plaqueta . " ), ja se encontra Cadastrado em \n" . $loc_cad . " \n Logo nao é possivel registra-lo novamente ! ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                    echo "<ul> <li> <P> <a>";
                    echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
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


     //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
     if(ret_ctrl_ti_tbequip($conn, $ctrl_ti)=="1") // ja existe um cti em tbequip cadastrado
     {
            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
            $posicao = " Tentativa de add Dispositivo (note)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
            arquivo_grava("descritivos.txt", $posicao);
     
     }
     else//9
       {
        $sqlinsert = "INSERT INTO  tbequip (`status`,`ctrl_ti`, `tbequip_plaqueta`, `tbequi_nome`, `tbequi_tipo`,`tbequip_monitor`, `tbequi_mod`, `tbequip_so`, `tbequi_so_arq`,
    `tbequi_modplaca`, `tbequi_memoria`, `tbequi_slots`, `tbequi_slots_uso`, `tbequi_modelomemoria`, `tbequi_armazenamento`, `tbequi_tparmazenamento`,
    `tbequi_arm_sec`, `tbequi_arm_sectam`, `tbequi_datalanc`, `tbequi_teclado`, `tbequi_mouse`, `tbequi_filtrodelinha`, `tbequi_tecnico`, `tbequip_sec`, `tbequi_tbcmei_id`, `tbequip_dtaalterado`,
    `tbequi_app_out`, `tbequi_app`, `tbequi_proc`, `tbequi_obs`,`tbequi_ref`,`tbequip_lacre`,`tbequip_vid_saidas`,`tbequip_vid_uso`,`tbequip_fonte`,`tbequip_util_num`,
`tbequip_util_nomes`,`tbequip_resp`,`tbequip_monitor_num`,`tbequip_monitor_obs`,`tbequip_monitor_hist`,`tbequip_reserva`,`tbequip_local_cad`)
VALUES('$status','$ctrl_ti','$plaqueta','$nome_pc','$tipo_equip','$monitor_tipo','$processador','$so','$so_arq',
'$placamae','$mem_tam','$mem_slot','$mem_slot_uso','$mem_tipo','$arm_tam','$arm_tipo','$arm_sectipo','$arm_sectam','$hoje','teclado','mouse','filtro','$nome_usuario','$id_sec','$id_loc',now(),
'$app_outros','$apps','$processador','$obs','$ref_equip', '$lacre','$video_saida','$video_portas_uso','$fonte_inst','$util_qtd','$util_nomes','$responsavel','$mon_qtd','$obsvid','$mon_hist','$reserva','$local_cad')";

        $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados cod594_tbequip "); //Ou vai..., ou racha.;
        if (($retorno_add == '0') or ($retorno_add == "")) {
           // armazena dados caso retorne erro
               $usuario = $nome_usuario;  // recebe o nome 
                $ativo = '0';
                $nomeArquivo = "nao_registro.txt"; // seta o arquivo TXT
                $campos = $status." - CTI ".$ctrl_ti." - ".$plaqueta." - ".$nome_pc." - ".$tipo_equip." -Mon.  ".$monitor_tipo." - ".$processador." - ".$so." - ".$so_arq." - ".$placamae." -Mem. ".$mem_tam." - Slot".$mem_slot." - ".$mem_slot_uso." - ".$mem_tipo." - ".$arm_tam." - ".$arm_tipo." - ".$arm_sectipo." - ".$arm_sectam." -  Secret . ".$id_sec."  Local  ".$id_loc." - ".$app_outros." - ".$apps." - ".$processador." - ".$obs." - ".$ref_equip." -  ".$lacre." - ".$video_saida." - ".$video_portas_uso." - ".$fonte_inst." - Utiliz. ".$util_qtd." - ".$util_nomes." -Resp  ".$responsavel." - Qtd Mon.".$mon_qtd." - ".$obsvid." - ".$mon_hist." - ".$reserva." - ".$local_cad;
                $conteudo = "Usuario " . $usuario . " Data : " . $agora ."  ".$campos. PHP_EOL;

                //$msg = 'teste' . PHP_EOL;
                //file_put_contents('lista.txt', $msg, FILE_APPEND);
                file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
                $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
                if ($arquivo) {
                    // Escreve no arquivo
                    fwrite($arquivo, $conteudo);
                    // fecha o arquivo
                    fclose($arquivo);
                }

            // fim do armazena dados


            echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
            echo "<script>history.go(-1);</script>";
        } else {// 8
                add_acao("IMI", $ctrl_ti, $nome_usuario);
            // recuperaçao do id e insercao dos monitores com o ID de referencia
            //$sql =  "SELECT * FROM tbequip where tb_equi_ref = LIKE '%".$param_busca."%' and STATUS=1 and MODULO=ESCOLAR ";
            $sql = "SELECT * FROM tbequip where tbequi_ref ='" . $ref_equip . "'";
            $result = mysqli_query($conn, $sql);
            $linha = mysqli_fetch_assoc($result);
            $retorno_checkInEng = mysqli_num_rows($result);
            if (($retorno_checkInEng == 0) or ($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
            {  //  echo"retorno zero de nome na base   ".$nome;
                echo "Não foi possivel registrar o(s) Monitor(s) , Referencia do equipamento nao encontrada ! ";
            } else { // 7
                $ret_equip_id = $linha['tbequip_id'];
                //   $ret_equip_id = $linha['ctrl_ti'];


                // insercao de controle_ti do computador 
                // recupera o id cadastrado na base tb_equip
                $ref_id = busca_id($conn, $ref_equip, "tb_equip");
                //$ctrl_ti = $_POST['ctrl_ti'];
                // insercao de controle_ti dados do computador
                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                $add_ti = add_TI($conn, "1", $tipo_equip, "C" . $ref_id, $ref_id, $ctrl_ti, $hoje, $nome_usuario);
                    add_acao("I_T.I.", $ctrl_ti, $nome_usuario);

                switch ($mon_qtd) {
                    case '0': {
                        // visualizacao de teste //
                            //echo "<form>  ";
                        echo "<center> <br> ";
                        echo "Descritivo do Equipamento Cadastrado  CTI = " . $ctrl_ti . " <br> ";
                        echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                        echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                        echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                        echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                        echo '<br> Infs Monitor  ' . $monitor_resumo;
                        echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  Videos em uso    ' . $video_portas_uso;
                        echo '<br>  fonte     ' . $fonte_inst;
                        //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                        echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                        echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                        echo '<br>';
                        echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                        echo 'local id : ' . $id_loc . '  Descriçao ' . nomedolocal($conn, $id_loc) . '<br>';
                        echo 'Secretaria id : ' . $id_sec . '  Descriçao  ' . nomedesecretaria($conn, $id_sec) . '<br>';
                        echo "</center>";
                        // fim de visualizacao teste //


                        ?>
                               <center>
                                                   <br><br>
                                                      <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Checagem de dados  Cadastrados ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                                    
                                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="Lista de Computadores Cadastrados ">Lista Equipamentos  </a>  <br /><br /> 
                                                    
                                                   <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="Visualizaçao e Impressao de Termo ">Termo Responsabilidade  </a>  <br /><br /> 
                                                    
                                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="Instalação de Novo Dispositivo no mesmo Local ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                                    
                                                    <a href="precadequip.php?id=0" title="Instalação de Novo Dispositivo em Outro Local ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                                    
                                                      <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?> " title="Consultas diversas de dispositivos  ">Consultar Equipamento  </a>  <br /><br />
                                  
                                                </center>
                                <?php

                    }
                        break;
                    case '1': { // insercao de um monitor na base
                        //  busca em controle_ti  se ja existe cadastro // 
                        if (ret_ctrl_ti($conn, $monitor1_cti) == "0") {
                            //realiza a busca em Monitores  se ja existe cadastro //       
                            if (ret_ctrl_ti_monitor($conn, $monitor1_cti) == "0")
                                $erros = "0";
                            else
                                $erros = "1";
                        } else
                            $erros = "1";
                        // fim das checagens ...
                        if (($erros == "1") || ($monitor1_cti=="")){
                            echo " <br> <br> <center>  <p style=color:RED> <b>  O (Monitor Unico )  Controle CTI nº : __ " . $monitor1_cti . " __   esta Vazio ou ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                            echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel inseri-lo  para esse Dispositivo (cod711) !   </b>  </p></center>     ";
                            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                            echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor1_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                $posicao = " Tentativa de add Monitor (Unico) " . $monitor1_cti . "  recusado  no PC (".$ctrl_ti.") !  motivo , equip ja cadastrado na base ou Campo nao Informado  - " . $hoje . " Tecnico " . $nome_usuario;
                                arquivo_grava("descritivos.txt", $posicao);
                                add_acao("IpcM1_rec_vazio", $monitor1_cti, $nome_usuario);

                        } else 
                        {  // tudo certo com as checagens de cti do monitor nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                            $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                            $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                            $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor CTI ".$monitor1_cti ."  na base de dados  cod669_tbmon "); //Ou vai..., ou racha.;
                            echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                            // insercao de controle_ti do monitor 
                            // recupera o id cadastrado na base tb_equip
                            $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                            if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                            } else {
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                                
                                   add_acao("IMO", $monitor1_cti, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                                    add_acao("I_T.I.mo", $monitor1_cti, $nome_usuario);
                                // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor1_cti, $monitor1_saida, $nome_usuario);

                                // fim da inserçao
                                // visualizacao de teste //
                                echo "<center> <br> ";
                                echo "<h3>Descritivo do Dispositivo </h3><br>";
                                echo "Tipo Dispositivo <B> " . $tipo_equip . " </B>  Controle CTI : <B>" . $ctrl_ti . "</B> <br> ";
                                echo ' Patrimonio plaqueta :<B> ' . $plaqueta . '</B> <br> Nome_equip <B> :' . $nome_pc . ' </B> <BR>';
                                echo ' <I> Local id <b> ' . $id_loc . ' </b> ' . nomedolocal($conn, $id_loc) . '  <br> Sec id <b> ' . $id_sec . '</b>    ' . nomedesecretaria($conn, $id_sec) . ' </I> <br>    Lacre da TI <B>' . $lacre . '</B>     Reserva: <B> ' . $reserva . '</B> <br>';
                                echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                echo 'Memoria tipo ' . $mem_tipo . ' * Mem qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                echo '<br> Infs Monitor <b> ' . $monitor_resumo . ' </b> ';
                                echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  Videos em uso    ' . $video_portas_uso;
                                echo '<br>  Fonte     ' . $fonte_inst;
                                //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                                echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                                echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                                echo '<br>';
                                echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                                echo "</center>";
                                // fim de visualizacao teste //


                                ?>
                                                <center>
                                                   <br><br>
                                                      <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Checagem de dados  Cadastrados ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                                    
                                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="Lista de Computadores Cadastrados ">Lista Equipamentos  </a>  <br /><br /> 
                                                    
                                                   <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="Visualizaçao e Impressao de Termo ">Termo Responsabilidade  </a>  <br /><br /> 
                                                    
                                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="Instalação de Novo Dispositivo no mesmo Local ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                                    
                                                    <a href="precadequip.php?id=0" title="Instalação de Novo Dispositivo em Outro Local ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                                    
                                                    <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?> " title="Consultas diversas de dispositivos  ">Consultar Equipamento  </a>  <br /><br />
                                  
                                                </center>
                                                <?php
                            }
                        }
                    }
                        break;
                    case '2': {// insercao de 2 monitores na base 
                        // inicio das checagens em controle e tb_monitores  para descartar duplicidade   
                        if (ret_ctrl_ti($conn, $monitor1_cti) == "0") {
                            //realiza a busca em Monitores  se ja existe cadastro //       
                            if (ret_ctrl_ti_monitor($conn, $monitor1_cti) == "0")
                                $erros = "0";
                            else
                                $erros = "1";
                        } else
                            $erros = "1";
                        // fim das checagens ... nas tabelas controle e tb_monitores monitor 1
                        if ($erros == "1") {
                            echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor1_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                            echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                            echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor1_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                $posicao = " Tentativa de add Monitor (D1)" . $monitor1_cti . "  recusado no PC (" . $ctrl_ti . ") !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                arquivo_grava("descritivos.txt", $posicao);
                                add_acao("IpcM1_rec", $monitor1_cti, $nome_usuario);
                        } else {  // tudo certo com as checagens de cti do monitor (1) nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                            $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                            $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                            $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor na base cod669_tbmon "); //Ou vai..., ou racha.;
                            echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                                add_acao("IMO.d", $monitor1_cti, $nome_usuario);
                            // insercao de controle_ti do monitor 
                            // recupera o id cadastrado na base tb_equip
                            $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                            if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                            } else {
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor1_cti,$monitor1_saida, $nome_usuario);


                                // inicio das checagens do monitor 2
                                if (ret_ctrl_ti($conn, $monitor2_cti) == "0") { //realiza a busca em Monitores  se ja existe cadastro //       
                                    if (ret_ctrl_ti_monitor($conn, $monitor2_cti) == "0")
                                        $erros = "0";
                                    else
                                        $erros = "1";
                                } else
                                    $erros = "1";
                                // fim das checagens ...para  monitor 2
                                if ($erros == "1") {
                                    echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor2_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                                    echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                                    echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor2_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                        $posicao = " Tentativa de add Monitor(D2) " . $monitor2_cti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                        arquivo_grava("descritivos.txt", $posicao);
                                        add_acao("IpcM2_rec", $monitor2_cti, $nome_usuario);
                                } else {  // tudo certo com as checagens de cti do monitor (2) nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                                    // insercao do segundo monitor na base
                                    $ref_equip = $hoje . '/ ' . $monitor2_plaq. '/ ' . $monitor2_cti;
                                    $sqlmon2 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor2_tipo','$monitor2_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                                    // $sqlmon2 = "INSERT INTO  tb_monitores (`status`, `ctrl_ti`,`id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor1_tipo','$monitor2_saida','$hoje')";
                                    $ret_add_mon2 = mysqli_query($conn, $sqlmon2) or die("Nao foi possivel inserir os 2 Monitores na base  ".$monitor1_cti."  e  ".$monitor2_cti  ); //Ou vai..., ou racha.;
                                        add_acao("IMO.d", $monitor2_cti, $nome_usuario);
                                    // insercao de controle_ti do monitor 
                                    // recupera o id cadastrado na base tb_equip
                                    $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                                    if ($ref_idm == "sem referencia") {
                                        echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                                    } else {

                                        // insercao de controle_ti dados do computador
                                        // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                        $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor2_cti, $hoje, $nome_usuario);
                                        //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                        // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                        $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor2_cti, $monitor2_saida,$nome_usuario);

                                        echo "<center> <br> ";
                                        echo "<h3>Descritivo do Dispositivo </h3><br>";
                                        echo "Tipo Dispositivo <B> " . $tipo_equip . " </B> Controle CTI : <B>" . $ctrl_ti . "</B> <br> ";
                                        echo ' Patrimonio plaqueta :<B> ' . $plaqueta . '</B> <br> Nome_equip <B> :' . $nome_pc . ' </B> <BR>';
                                        echo ' <I> Local id <b> ' . $id_loc . ' </b> ' . nomedolocal($conn, $id_loc) . '  <br> Sec id <b> ' . $id_sec . '</b>    ' . nomedesecretaria($conn, $id_sec) . ' </I> <br>    Lacre da TI <B>' . $lacre . '</B>     Reserva: <B> ' . $reserva . '</B> <br>';
                                        echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                        echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                        echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                        echo '<br> Infs Monitor <b> ' . $monitor_resumo . ' </b> ';
                                        echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  Videos em uso    ' . $video_portas_uso;
                                        echo '<br>  Fonte     ' . $fonte_inst;
                                        //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                                        echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                                        echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                                        echo '<br>';
                                        echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                                        echo "</center>";
                                        // fim de visualizacao teste //



                                        ?>
                                 <center>
                                                   <br><br>
                                                      <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Checagem de dados  Cadastrados ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                                    
                                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="Lista de Computadores Cadastrados ">Lista Equipamentos  </a>  <br /><br /> 
                                                    
                                                   <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="Visualizaçao e Impressao de Termo ">Termo Responsabilidade  </a>  <br /><br /> 
                                                    
                                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="Instalação de Novo Dispositivo no mesmo Local ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                                    
                                                    <a href="precadequip.php?id=0" title="Instalação de Novo Dispositivo em Outro Local ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                                    
                                                   <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?> " title="Consultas diversas de dispositivos  ">Consultar Equipamento  </a>  <br /><br />
                                  
                                                </center>
                                <?php
                                    }
                                }
                            }
                        }
                    }
                        break;
                    case '3': {//  insercao de 3 monitores na base 

                        // inicio das checagens em controle e tb_monitores  para descartar duplicidade   
                        if (ret_ctrl_ti($conn, $monitor1_cti) == "0") {
                            //realiza a busca em Monitores  se ja existe cadastro //       
                            if (ret_ctrl_ti_monitor($conn, $monitor1_cti) == "0")
                                $erros = "0";
                            else
                                $erros = "1";
                        } else
                            $erros = "1";
                        // fim das checagens ... nas tabelas controle e tb_monitores monitor 1
                        if ($erros == "1") {
                            echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor1_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                            echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                            echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor1_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                $posicao = " Tentativa de add Monitor(t1) " . $monitor1_cti . "  recusado no PC (" . $ctrl_ti . ") !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                arquivo_grava("descritivos.txt", $posicao);
                                add_acao("IpcM1_rec", $monitor1_cti, $nome_usuario);
                        } else { //6 // tudo certo com as checagens de cti do monitor (1) nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                            $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                            $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                            $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor CTI : ".$monitor1_cti." na base cod847_tbmon  "  ); //Ou vai..., ou racha.;
                            echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                            // insercao de controle_ti do monitor 
                            // recupera o id cadastrado na base tb_equip
                            $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                            if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores(1)";
                            } else { //5
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                                    add_acao("IMO.t", $monitor1_cti, $nome_usuario);
                                // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor1_cti,$monitor1_saida ,$nome_usuario);


                                // inicio das checagens do monitor 2
                                if (ret_ctrl_ti($conn, $monitor2_cti) == "0") { //realiza a busca em Monitores  se ja existe cadastro //       
                                    if (ret_ctrl_ti_monitor($conn, $monitor2_cti) == "0")
                                        $erros = "0";
                                    else
                                        $erros = "1";
                                } else
                                    $erros = "1";
                                // fim das checagens ...para  monitor 2
                                if ($erros == "1") {
                                    echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor2_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                                    echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                                    echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor2_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                        $posicao = " Tentativa de add Monitor(t2) " . $monitor2_cti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                        arquivo_grava("descritivos.txt", $posicao);
                                        add_acao("IpcM2_rec", $monitor2_cti, $nome_usuario);
                                } else { //4  // tudo certo com as checagens de cti do monitor (2) nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                                    // insercao do segundo monitor na base
                                    $ref_equip = $hoje . '/ ' . $monitor2_plaq;
                                    $sqlmon2 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor2_tipo','$monitor2_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                                    // $sqlmon2 = "INSERT INTO  tb_monitores (`status`, `ctrl_ti`,`id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor1_tipo','$monitor2_saida','$hoje')";
                                    $ret_add_mon2 = mysqli_query($conn, $sqlmon2) or die("Nao foi possivel inserir os  Monitores na base   CTI ". $monitor2_cti); //Ou vai..., ou racha.;

                                    // insercao de controle_ti do monitor 
                                    // recupera o id cadastrado na base tb_equip
                                    $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                                    if ($ref_idm == "sem referencia") {
                                        echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores(2)";
                                    } else { //3
                                        // insercao de controle_ti dados do computador
                                        // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                        $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor2_cti, $hoje, $nome_usuario);
                                        //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                        // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                        $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor2_cti,$monitor2_saida, $nome_usuario);
                                            add_acao("IMO.t", $monitor2_cti, $nome_usuario);
                                        // inicio das checagens do monitor 3
                                        if (ret_ctrl_ti($conn, $monitor3_cti) == "0") { //realiza a busca em Monitores  se ja existe cadastro //       
                                            if (ret_ctrl_ti_monitor($conn, $monitor3_cti) == "0")
                                                $erros = "0";
                                            else
                                                $erros = "1";
                                        } else
                                            $erros = "1";
                                        // fim das checagens ...para  monitor 2
                                        if ($erros == "1") {
                                            echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor3_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                                            echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                                            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                                            echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor3_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                                $posicao = " Tentativa de add Monitor(t1) " . $monitor3_cti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                                arquivo_grava("descritivos.txt", $posicao);
                                                add_acao("IpcM3_rec", $monitor3_cti, $nome_usuario);
                                        } else {  //2 // tudo certo com as checagens de cti do monitor (2) nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                                            // insercao do segundo monitor na base
                                            $ref_equip = $hoje . '/ ' . $monitor3_plaq . '/ ' . $monitor3_cti;
                                            $sqlmon3 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor3_cti','$ret_equip_id','$monitor3_marca','$monitor3_tam','$monitor3_plaq','$monitor3_tipo','$monitor3_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                                            $ret_add_mon3 = mysqli_query($conn, $sqlmon3) or die("Nao foi possivel inserir o  Monitor   na base   CTI ". $monitor3_cti ); //Ou vai..., ou racha.;
                                            // insercao de controle_ti do monitor 
                                                add_acao("IMO.t", $monitor3_cti, $nome_usuario);
                                            // recupera o id cadastrado na base tb_equip
                                            $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                                            if ($ref_idm == "sem referencia") {
                                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores(3)";
                                            } else {//1   
                                                // insercao de controle_ti dados do computador
                                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor3_cti, $hoje, $nome_usuario);
                                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                                                // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                                $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor3_cti, $monitor3_saida ,$nome_usuario);
                                                echo "<script>alert('DADOS DO EQUIPAMENTO / 3 MONITORES  SALVOS.');</script>";
                                                //    echo "<br> location.href=precadequip.php?id=0"; 
                                                // visualizacao de teste //

                                                echo "<center> <br> ";
                                                echo "<h3>Descritivo do Dispositivo </h3><br>";
                                                echo "Tipo Dispositivo <B> " . $tipo_equip . " </B> Controle CTI : <B>" . $ctrl_ti . "</B> <br> ";
                                                echo ' Patrimonio plaqueta :<B> ' . $plaqueta . '</B> <br> Nome_equip <B> :' . $nome_pc . ' </B> <BR>';
                                                echo ' <I> Local id <b> ' . $id_loc . ' </b> ' . nomedolocal($conn, $id_loc) . '  <br> Sec id <b> ' . $id_sec . '</b>    ' . nomedesecretaria($conn, $id_sec) . ' </I> <br>    Lacre da TI <B>' . $lacre . '</B>     Reserva: <B> ' . $reserva . '</B> <br>';
                                                echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                echo '<br> Infs Monitor  <b>' . $monitor_resumo . ' </b> ';
                                                echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  Videos em uso    ' . $video_portas_uso;
                                                echo '<br>  Fonte     ' . $fonte_inst;
                                                //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                                                echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                                                echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                                                echo '<br>';
                                                echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                                                echo "</center>";
                                                // fim de visualizacao teste //
                                                ?>
                                                                                <center>
                                                                                       <br><br>
                                                                                          <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Checagem de dados  Cadastrados ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                                    
                                                                                        <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="Lista de Computadores Cadastrados ">Lista Equipamentos  </a>  <br /><br /> 
                                                    
                                                                                       <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="Visualizaçao e Impressao de Termo ">Termo Responsabilidade  </a>  <br /><br /> 
                                                    
                                                                                        <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="Instalação de Novo Dispositivo no mesmo Local ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                                    
                                                                                        <a href="precadequip.php?id=0" title="Instalação de Novo Dispositivo em Outro Local ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                                    
                                                                                    <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?> " title="Consultas diversas de dispositivos  ">Consultar Equipamento  </a>  <br /><br />
                                  
                                                                                    </center>
                                                                                                 <?php
                                            }// f 1
                                        }// f2
                                    } //f3
                                }//f4
                            }//f5
                        }//f6
                    }// fim do case
                        break;
                } // fim do switch
            }//f 7
        } //f8
      }//9
   } // fim do erro <> 1
} // fim do  micro computador cadastro 
else
{
    if ($origem == "cadastro_n") // formulario de cadastro de pc = cadastro   /     formulario de cadastro de notebook = cadastro_n   /    
    {
        $plaqueta = STRTOUPPER($_POST['plaqueta']);
        $nome_pc = STRTOUPPER($_POST['nome_equip']);
        $id_loc = $_POST['loc_id'];
        $id_sec = $_POST['sec_id'];
        $tipo_equip = $_POST['tipo_equip'];
        $so = $_POST['so_tipo'];
        $reserva = $_POST['reserva'];
        $lacre = $_POST['lacre'];
        $ctrl_ti = $_POST['ctrl_ti'];
        $util_qtd = $_POST['utilizadores_num'];
        $util_nomes = $_POST['utilizadores_nomes'];
        $so_arq = "64 b";

        //$so_arq = $_POST['so_arq'];

        $placa_sel = $_POST['placa'];
        $proc_sel = $_POST['processador'];

        // tratamento para placa e processador digitado manunalmente
        if (isset($_POST['placaD'])) {
            $placa_dig = $_POST['placaD'];
        } else {
            $placa_dig = "VAZIO";
        }

        if (isset($_POST['processadorD'])) {
            $proc_dig = $_POST['processadorD'];
        } else {
            $proc_dig = "VAZIO";
        }



        // tratamento da placa mae para campo Digitavel ou Selecionavel
        if (($placa_sel == "0") or ($placa_sel == "1")) {
            $placamae = $placa_dig;
        } else {
            $placamae = $placa_sel;
        }

        // tratamento do processador para campo Digitavel ou Selecionavel
        if (($proc_sel == "0") or ($proc_sel == "1")) {
            $processador = "Processador  " . $proc_dig;
        } else {
            $processador = "Processador  " . $proc_sel;

        }

        $arm_tipo = $_POST['arm_tipo'];
        $arm_tam = $_POST['arm_tam'];
        $arm_sectipo = $_POST['arm_sec'];
        $arm_sectam = $_POST['arm_sec_tam'];
        $mem_tipo = $_POST['mem_tipo'];
        $mem_tam = $_POST['mem_qtd'];
        $mem_slot = $_POST['slots'];
        $mem_slot_uso = $_POST['slots_uso'];

        $monitor_tipo = "PROPRIO";

        $monitor_aux = $_POST['mon_tipo'];
        $monitor1_saida = 'VGA';
       
        if ($monitor_aux == "NENHUM") {
            $mon_qtd = "0";
            $monitor_resumo = "Monitor do Equipamento";
            $monitor1_source = "";

        } else {
            $mon_qtd = "1";
            $monitor1_marca = STRTOUPPER($_POST['mon_mar']);
            $monitor1_tam = $_POST['mon_pol'];
            $monitor1_plaq = $_POST['mon_pat'];
            $monitor1_tipo = $_POST['mon_cat'];
            $monitor1_cti = $_POST['mon_cti'];
            $monitor1_source = $_POST['mon_saida'];
            $monitor_resumo = "Monitor Auxiliar  " . $monitor1_marca . '  ' . $monitor1_tam . '  pol ' . $monitor1_plaq . ' ' . $monitor1_tipo . '  CTI  ' . $monitor1_cti . ' Video ' . $monitor1_source . ' ';
            // tratamento de checagem CTI de monitor a ser incluido //
            $ret_cti_monitor = ret_ctrl_ti($conn, $monitor1_cti);
        }


        if (($mon_qtd == "1") and ($ret_cti_monitor == 1)) { // ja encontra-se cadastrado na base o CTI do monitor .
           $makina =  ret_uso_mon_cti_ctrl_ti($conn, $ret_cti_monitor); 
           $posicao = " Tentativa de add Monitor (Note)". $ret_cti_monitor. " no PC ".$ctrl_ti."  recusado !  motivo , equip ja cadastrado na base para equip ".$makina." - ".$hoje." Tecnico ".$nome_usuario;
           arquivo_grava("descritivos.txt",$posicao) ;

        echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor de CTI nº :" . $monitor1_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
            echo " <br> <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento   </b>  </p></center>     ";
            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
            // break;   
        } else {

            // tratamento de saida de video  de acordo com o especificado e saidas em uso 
            $comp_V = "";
            $comp_H = "";
            $comp_D = "";
            $comp_P = "";

            if (isset($_POST['vga'])) {
                $comp_V = 'Vga';
            }
            if (isset($_POST['hdmi'])) {
                $comp_H = 'Hdmi';
            }
            if (isset($_POST['dvi'])) {
                $comp_D = 'Dvi';
            }
            if (isset($_POST['display'])) {
                $comp_P = 'Display Port';
            }
            $componentes = $comp_V . "/ " . $comp_H . "/ " . $comp_D . "/ " . $comp_P;

            $video_saida = $componentes;

            // tratamento de fonte
            $fonte_inst = $_POST['fonte_w'] . " V / " . $_POST['fonte_a'] . " a ";
            // tratamento de utilizadores
            $utilizadores_qtd = $_POST['utilizadores_num'];

            $utilizadores_nomes = $_POST['utilizadores_nomes'];

           // $responsavel = strtoupper($_POST['resp']);
            $responsavel = remover_acentos1(strtoupper($_POST['resp']));
            $obsvid = $_POST['obsvid'];

            $obs = $_POST['obs'];
            $status = "1";

            // tratamento de local de cadastro
            if ($_POST['local_cad'] == "1") {
                $local_cad = "Laboratorio";
            }
            if ($_POST['local_cad'] == "2") {
                $local_cad = "Local";
            }

            // tratamento do aplicativos
            $app_outros = $_POST['app_outros'];
            if (isset($_POST['office'])) {
                $app = "Office";
            } else
                $app = "";

            if (isset($_POST['cad'])) {
                $app1 = "ZW_Cad";
            } else
                $app1 = "";
            $apps = $app . ' ' . $app1;
            // tratamento da referencia do registro 
            $ref_equip = $hoje . '/ ' . $plaqueta;

            // tratamento de redes
            $app_outros = $_POST['wifi'];
            if (isset($_POST['office'])) {
                $wifi = "Wifi";
            } else
                $wifi = "";

            if (isset($_POST['rj-45'])) {
                $rj45 = "Rj-45";
            } else
                $rj45 = "";
            $redes = $wifi . ' ' . $rj45;

            // tratamento da referencia do registro 
            $ref_equip = $hoje . '/ ' . $plaqueta;


            if ($id_loc != "") {
                if ($plaqueta <> "PENDENTE") {
                    $result = mysqli_query($conn, 'SELECT * FROM tbequip where tbequip_plaqueta = "' . $plaqueta . '" ');
                    $retorno_checkInEng = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    if ($retorno_checkInEng <> 0) {
                        do {
                            $ret_idloc = $row['tbequi_tbcmei_id'];
                            $ret_desc = $row['tbequi_mod'];
                            $ret_id = $row['tbequip_id'];
                            $ret_status = $row['status'];

                        } while ($row = mysqli_fetch_assoc($result));

                        $loc_cad = nomedolocal($conn, $ret_idloc);
                        $msg = "<br><br> Esse Numero de Plaqueta ( " . $plaqueta . " ), ja se encontra Cadastrada em \n" . $loc_cad . " \n Logo nao é possivel registra-lo novamente ! ";
                        echo "<center> <p style=color:blue> <b>" . nl2br($msg) . " </b>  </p></center> <br><br>";
                        echo "<ul> <li> <P> <a>";
                        echo "<h3> <a href='ret_dados.php? id={$ret_id} '> * </a>  &nbsp - Id: {$ret_id} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                       // exit;
                        exit;

                    }
                }
            }
            
              //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
     if(ret_ctrl_ti_tbequip($conn, $ctrl_ti)=="1") // ja existe um cti em tbequip cadastrado
     {
       echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : ".$ctrl_ti."  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                arquivo_grava("descritivos.txt", $posicao);
                add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
     }
     else
       {
            $sqlinsert = "INSERT INTO  tbequip (`status`,`ctrl_ti`, `tbequip_plaqueta`, `tbequi_nome`, `tbequi_tipo`, `tbequip_monitor`, `tbequi_mod`, `tbequip_so`, `tbequi_so_arq`,
    `tbequi_modplaca`, `tbequi_memoria`, `tbequi_slots`, `tbequi_slots_uso`, `tbequi_modelomemoria`, `tbequi_armazenamento`, `tbequi_tparmazenamento`,
    `tbequi_arm_sec`, `tbequi_arm_sectam`, `tbequi_datalanc`, `tbequi_teclado`, `tbequi_mouse`, `tbequi_filtrodelinha`, `tbequi_tecnico`,`tbequip_sec`, `tbequi_tbcmei_id`, `tbequip_dtaalterado`,
    `tbequi_app_out`, `tbequi_app`, `tbequi_proc`, `tbequi_obs`,`tbequi_ref`,`tbequip_lacre`,`tbequip_vid_saidas`,`tbequip_vid_uso`,`tbequip_fonte`,`tbequip_util_num`,
`tbequip_util_nomes`,`tbequip_resp`,`tbequip_monitor_num`,`tbequip_monitor_obs`,`tbequip_reserva`,`tbequip_local_cad`)
VALUES('$status','$ctrl_ti','$plaqueta','$nome_pc','$tipo_equip','$monitor_tipo','$processador','$so','$so_arq',
'$placamae','$mem_tam','$mem_slot','$mem_slot_uso','$mem_tipo','$arm_tam','$arm_tipo','$arm_sectipo','$arm_sectam','$hoje','teclado','mouse','filto','$nome_usuario','$id_sec','$id_loc',now(),
'$app_outros','$apps','$processador','$obs','$ref_equip', '$lacre','$video_saida','$monitor1_source','$fonte_inst','$util_qtd','$util_nomes','$responsavel','$mon_qtd','$obsvid','$reserva','$local_cad')";



                add_acao("IMI", $ctrl_ti, $nome_usuario);

            $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
            if (($retorno_add == '0') or ($retorno_add == "")) {
                // armazena dados caso retorne erro
               $usuario = $nome_usuario;  // recebe o nome 
                $ativo = '0';
                $nomeArquivo = "nao_registro.txt"; // seta o arquivo TXT
                $campos = $status." - CTI ".$ctrl_ti." - ".$plaqueta." - ".$nome_pc." - ".$tipo_equip." -Mon.  ".$monitor_tipo." - ".$processador." - ".$so." - ".$so_arq." - ".$placamae." -Mem. ".$mem_tam." - Slot".$mem_slot." - ".$mem_slot_uso." - ".$mem_tipo." - ".$arm_tam." - ".$arm_tipo." - ".$arm_sectipo." - ".$arm_sectam." -  Secret . ".$id_sec."  Local  ".$id_loc." - ".$app_outros." - ".$apps." - ".$processador." - ".$obs." - ".$ref_equip."  - ".$lacre." - ".$video_saida." - ".$video_portas_uso." - ".$fonte_inst." - Utiliz. ".$util_qtd." - ".$util_nomes." -Resp  ".$responsavel." - Qtd Mon.".$mon_qtd." - ".$obsvid." - ".$mon_hist." - ".$reserva." - ".$local_cad;
                $conteudo = "Usuario " . $usuario . " Data : " . $agora ."  ".$campos. PHP_EOL;

                //$msg = 'teste' . PHP_EOL;
                //file_put_contents('lista.txt', $msg, FILE_APPEND);
                file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
                $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
                if ($arquivo) {
                    // Escreve no arquivo
                    fwrite($arquivo, $conteudo);
                    // fecha o arquivo
                    fclose($arquivo);
                }

            // fim do armazena dados
                
                
                echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
                echo "<script>history.go(-1);</script>";
            } else {
                // recuperaçao do id e insercao dos monitores com o ID de referencia
                //$sql =  "SELECT * FROM tbequip where tb_equi_ref = LIKE '%".$param_busca."%' and STATUS=1 and MODULO=ESCOLAR ";
                $sql = "SELECT * FROM tbequip where tbequi_ref ='" . $ref_equip . "'";
                $result = mysqli_query($conn, $sql);
                $linha = mysqli_fetch_assoc($result);
                $retorno_checkInEng = mysqli_num_rows($result);
                if (($retorno_checkInEng == 0) or ($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                {  //  echo"retorno zero de nome na base   ".$nome;
                    echo "Não foi possivel registrar o(s) Monitor(s) , Referencia do equipamento nao encontrada ! ";
                        $posicao = " Tentativa de registrar Monitor() " . $ref_equip . "  recusado no PC (" . $ctrl_ti . ") !  motivo , referencia nao localizada na base  - " . $hoje . " Tecnico " . $nome_usuario;
                        arquivo_grava("descritivos.txt", $posicao);
                       // add_acao("IpcM1_rec", $monitor1_cti, $nome_usuario);
                } else {
                    $ret_equip_id = $linha['tbequip_id'];

                    // insercao de controle_ti do computador 
                    // recupera o id cadastrado na base tb_equip
                    $ref_id = busca_id($conn, $ref_equip, "tb_equip");
                    //$ctrl_ti = $_POST['ctrl_ti'];
                    // insercao de controle_ti dados do computador
                    // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                    $add_ti = add_TI($conn, "1", $tipo_equip, "C" . $ref_id, $ref_id, $ctrl_ti, $hoje, $nome_usuario);



                    switch ($mon_qtd) {
                        case '0': {
                            // visualizacao de teste //
                                ?>
                              <!DOCTYPE html>
                                <html lang="pt-br">
                                  <head>
                                    <!-- Meta tags Obrigatórias -->
                                    <meta charset="utf-8">
                                   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <title>Salvar</title>
                                       </head>
                                            <style> </style>
         			                <html>
                                  	<body style="background-color: #ffffff;">
                            <?php
                            echo "<center> <br> <B> ";
                            echo "Descritivo do Equipamento Cadastrado  CTI = " . $ctrl_ti . " </B> <br> ";
                            echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                            echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                            echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                            echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                            echo '<br> Infs Monitor  ' . $monitor_resumo." <b> ";
                            echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>';
                            echo '<br>  fonte     ' . $fonte_inst;
                            //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                            echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                            echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                            echo '<br>';
                            echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                            echo 'local id : ' . $id_loc . '  Descriçao ' . nomedolocal($conn, $id_loc) . '<br>';
                            echo 'Secretaria id : ' . $id_sec . '  Descriçao  ' . nomedesecretaria($conn, $id_sec) . '<br>';
                            echo "</center>";
                            // fim de visualizacao teste //

                            ?>
                                <center>
                                   <br><br>
                                      <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Registro Cadastrado ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                    <br><br>
                                  <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="SELECIONAR ">Termo Responsabilidade  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    
                                </center>
                                  </body>
		            	    	</html>
                                          <?php
                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                        }
                            break;
                        case '1': { // insercao de um monitor na base

                            //  busca em controle_ti  se ja existe cadastro // 
                            if (ret_ctrl_ti($conn, $monitor1_cti) == "0") {
                                //realiza a busca em Monitores  se ja existe cadastro //       
                                if (ret_ctrl_ti_monitor($conn, $monitor1_cti) == "0")
                                    $erros = "0";
                                else
                                    $erros = "1";
                            } else
                                $erros = "1";
                            // fim das checagens ...
                            if ($erros == "1") {
                                echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $monitor1_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
                                echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  </p></center>     ";
                                echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                                echo " <br><br> <center><a href='busca_diversos.php?cti=" . $monitor1_cti . "' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
                                    $posicao = " Tentativa de add Monitor " . $monitor1_cti . "  recusado no PC (" . $ctrl_ti . ") !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                    arquivo_grava("descritivos.txt", $posicao);
                                    add_acao("Inote_rec", $monitor1_cti, $nome_usuario);
                            
                            } else {  // tudo certo com as checagens de cti do monitor nas tabelas Controle_ti ( inexistentes)   e Tb_monitores (inexistentes) 
                                $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                                $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_source','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                                $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor na base cod1269_tbmon "); //Ou vai..., ou racha.;
                                echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                                // insercao de controle_ti do monitor 
                                // recupera o id cadastrado na base tb_equip
                                    add_acao("IMO", $monitor1_cti, $nome_usuario);
                                $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                                if ($ref_idm == "sem referencia") {
                                    echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                                } else {
                                    // insercao de controle_ti dados do computador
                                    // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                    $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                                    //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                                        add_acao("ITI", $monitor1_cti, $nome_usuario);
                                    // insere em tbequip_monitor_obs (tbequip) o cti do monitor vinculado ao pc .. 
                                    $vincula_cti_mon = vincula_cti_mon2tbequip($conn, $ctrl_ti, $monitor1_cti, $monitor1_saida, $nome_usuario);

                                    // fim da inserçao
                                    // visualizacao de teste //
                                    echo "<center> <br> ";
                                    echo "<h3>Descritivo do Dispositivo </h3>  <B><br>";
                                    echo "Tipo Dispositivo <B> " . $tipo_equip . " </B> Controle CTI : <B>" . $ctrl_ti . "</B> <br> ";
                                    echo ' Patrimonio plaqueta :<B> ' . $plaqueta . '</B> <br> Nome_equip <B> :' . $nome_pc . ' </B> <BR>';
                                    echo ' <I> Local id <b> ' . $id_loc . ' </b> ' . nomedolocal($conn, $id_loc) . '  <br> Sec id <b> ' . $id_sec . '</b>    ' . nomedesecretaria($conn, $id_sec) . ' </I> <br>    Lacre da TI <B>' . $lacre . '</B>     Reserva: <B> ' . $reserva . '</B> <br>';
                                    echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                    echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                    echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                    echo '<br> Infs Monitor  <b>' . $monitor_resumo.'</b> ';
                                    echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  ';
                                    echo '<br>  Fonte     ' . $fonte_inst;
                                    //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                                    echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                                    echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                                    echo '<br>';
                                    echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                                    echo "</center>";
                                    // fim de visualizacao teste //


                                    ?>
                                                <center>
                                                   <br><br>
                                                      <a href="ret_dados.php?id=<?php echo $ctrl_ti; ?>" title="Checagem de dados  Cadastrados ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                                    
                                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="Lista de Computadores Cadastrados ">Lista Equipamentos  </a>  <br /><br /> 
                                                    
                                                   <a href="qrimpressao_termo.php?var=<?php echo $ctrl_ti; ?> " title="Visualizaçao e Impressao de Termo ">Termo Responsabilidade  </a>  <br /><br /> 
                                                    
                                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="Instalação de Novo Dispositivo no mesmo Local ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                                    
                                                    <a href="precadequip.php?id=0" title="Instalação de Novo Dispositivo em Outro Local ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                                    
                                                   <a href="busca_diversos.php?cti=<?php echo $ctrl_ti; ?> " title="Consultas diversas de dispositivos  ">Consultar Equipamento  </a>  <br /><br />
                                  
                                                </center>
                                                <?php
                                }
                            }
                            break;
                        }
                        // rotina para insercao em tb_controle_ti  tb_euqip = 1 tb_diversos = 2 tb_monitores=3 
                        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
                        // recupera o id cadastrado na base tb_equip
                        //$ref_id = busca_id($conn, $ref_equip, "tb_equip");
                        //$ctrl_ti = $_POST['ctrl_ti'];
                        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
                        // $add_ti = add_TI($conn, "1", $tipo_equip, "C" . $ref_id, $ref_id, $ctrl_ti, $hoje, $nome_usuario);
                        //   echo $add_ti;
                        // fim da rotina
                    }
                }
            }
        }
    }
  }
}

?>
