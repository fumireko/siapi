 <?php 
include "../Config/config_sistema.php";
include "bco_fun.php";
$hoje = date("Y/m/d H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$origem = $_POST['origem']; // ficar atento a cadastro de notebook
//$nome_usuario = $_POST['rec_user'];
if ($origem=="cadastro") // formulario de cadastro de pc = cadastro   /     formulario de cadastro de notebook = cadastro_n   /    
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
}
else{
    $placa_dig = "VAZIO";
    }

if (isset($_POST['processadorD'])) {
    $proc_dig = $_POST['processadorD'];
} else {
    $proc_dig = "VAZIO";
}



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

// tratamento de CTI do(s) monitor(s)

$codigo_v = "";
$codigo_h = "";
$codigo_d = "";
$codigo_p = "";
    $erro = "";

if ($monitor_tipo == "UNICO") 
{
    if (isset($_POST['monv_cti']) )
      {
       $ret_monitor = $_POST['monv_cti'];
       $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);           
      }
    else
    {
       if (isset($_POST['monh_cti']) )
      {
       $ret_monitor = $_POST['monh_cti'];
       $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);           
      } 
      else
       {
         if (isset($_POST['mond_cti']) )
          {
          $ret_monitor = $_POST['mond_cti'];
          $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);           
          }
         else{
             $ret_monitor = $_POST['monp_cti'];
             $ret_cti_monitor = ret_ctrl_ti($conn, $ret_monitor);           
         } 
       }
    }
  if ($ret_cti_monitor == 1) 
     { // ja encontra-se cadastrado na base o CTI do monitor .
            $erro = 1;
            echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor de CTI nº :" . $monitor1_cti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
            echo " <br> <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento   </b>  </p></center>     ";
            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
            
      } 
}
else
    if ($monitor_tipo == "DUPLO") 
    {
       if (isset($_POST['monv_cti']) )
              {
               $ret_monitor = $_POST['monv_cti'];
               $ret_cti_monitorv = ret_ctrl_ti($conn, $ret_monitor);           
             $codigo_v = $ret_cti_monitorv;
               }
        if (isset($_POST['monh_cti']) )
           {
               $ret_monitor = $_POST['monh_cti'];
               $ret_cti_monitorh = ret_ctrl_ti($conn, $ret_monitor);           
           $codigo_h = $ret_cti_monitorh;
        } 
       if (isset($_POST['mond_cti']) )
          {
               $ret_monitor = $_POST['mond_cti'];
              $ret_cti_monitord = ret_ctrl_ti($conn, $ret_monitor);           
             $codigo_d = $ret_cti_monitord;  
       }
       if (isset($_POST['monp_cti']) )
          {
             $ret_monitor = $_POST['monp_cti'];
             $ret_cti_monitorp = ret_ctrl_ti($conn, $ret_monitor);           
             $codigo_p = $ret_cti_monitorp;
       }
       $codigo = $codigo_v." ".$codigo_h." ".$codigo_d." ".$codigo_p;

      if ( ($ret_cti_monitorv == 1) or ($ret_cti_monitorh == 1) or ($ret_cti_monitord == 1) or ($ret_cti_monitorp == 1) )
     { // ja encontra-se cadastrado na base o CTI do monitor .
                $erro = 1;
          echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor de CTI nº :" . $codigo . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
            echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento   </b>  </p></center>     ";
            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
            
      }


     }   
    else
      if ($monitor_tipo == "TRIPLO") 
        {
       if (isset($_POST['monv_cti']) )
              {
               $ret_monitor = $_POST['monv_cti'];
               $ret_cti_monitorv = ret_ctrl_ti($conn, $ret_monitor);           
             $codigo_v = $ret_monitor;
               }
        if (isset($_POST['monh_cti']) )
           {
               $ret_monitor = $_POST['monh_cti'];
               $ret_cti_monitorh = ret_ctrl_ti($conn, $ret_monitor);           
           $codigo_h = $ret_monitor;
        } 
       if (isset($_POST['mond_cti']) )
          {
               $ret_monitor = $_POST['mond_cti'];
              $ret_cti_monitord = ret_ctrl_ti($conn, $ret_monitor);           
       $codigo_d = $ret_monitor;  
       }
       if (isset($_POST['monp_cti']) )
          {
             $ret_monitor = $_POST['monp_cti'];
             $ret_cti_monitorp = ret_ctrl_ti($conn, $ret_monitor);           
             $codigo_p = $ret_monitor;
       }
       $codigo = $codigo_v." ".$codigo_h." ".$codigo_d." ".$codigo_p; 

      if ( ($ret_cti_monitorv == 1) or ($ret_cti_monitorh == 1) or ($ret_cti_monitord == 1) or ($ret_cti_monitorp == 1) )
     { // ja encontra-se cadastrado na base o CTI do monitor .
                    $erro = 1;
          echo " <br> <br> <center>  <p style=color:RED> <b>  O monitor de CTI nº :" . $codigo  . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
            echo " <br> <br> <center>  <p style=color:RED> <b> Logo não é possivel associar o monitor a esse equipamento   </b>  </p></center>     ";
            echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
            
      }

  }

    if ($erro <> 1) {

        // tratamento de monitor(s) de acordo com o especificado

        // tratamento do monitor
        if ($monitor_tipo == "UNICO") {
            $mon_qtd = 1;
            // verifica qual esta em uso //
            if ($_POST['vga_util'] == "Em Uso") {
                $monitor1_marca = STRTOUPPER($_POST['monv_mar']);
                $monitor1_tam = $_POST['monv_pol'];
                $monitor1_plaq = $_POST['monv_pat'];
                $monitor1_tipo = $_POST['monv_cat'];
                $monitor1_cti = $_POST['monv_cti'];
                $monitor1_saida = "VGA";
                $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI " . $monitor1_cti;
            } else {
                if ($_POST['hdmi_util'] == "Em Uso") {
                    $monitor1_marca = STRTOUPPER($_POST['monh_mar']);
                    $monitor1_tam = $_POST['monh_pol'];
                    $monitor1_plaq = $_POST['monh_pat'];
                    $monitor1_tipo = $_POST['monh_cat'];
                    $monitor1_cti = $_POST['monh_cti'];
                    $monitor1_saida = "HDMI";
                    $monitor_resumo = $monitor1_marca . " " . $monitor1_tam . "  " . $monitor1_plaq . "  " . $monitor1_tipo . " CTI  " . $monitor1_cti;
                } else {
                    if ($_POST['dvi_util'] == "Em Uso") {
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
        } else {
            if ($monitor_tipo == "DUPLO") {
                $mon_qtd = 2;
                // verifica qual esta em uso //
                if (($_POST['vga_util'] == "Em Uso") and ($_POST['hdmi_util'] == "Em Uso")) {
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
                if (($_POST['vga_util'] == "Em Uso") and ($_POST['dvi_util'] == "Em Uso")) {
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
                if (($_POST['vga_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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
                if (($_POST['hdmi_util'] == "Em Uso") and ($_POST['dvi_util'] == "Em Uso")) {
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
                if (($_POST['hdmi_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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
                if (($_POST['dvi_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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


            } else {
                if ($monitor_tipo == "TRIPLO") {
                    $mon_qtd = 3;
                    if (($_POST['vga_util'] == "Em Uso") and ($_POST['hdmi_util'] == "Em Uso") and ($_POST['dvi_util'] == "Em Uso")) {
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
                    if (($_POST['vga_util'] == "Em Uso") and ($_POST['hdmi_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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
                    if (($_POST['vga_util'] == "Em Uso") and ($_POST['dvi_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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
                    if (($_POST['hdmi_util'] == "Em Uso") and ($_POST['dvi_util'] == "Em Uso") and ($_POST['display_util'] == "Em Uso")) {
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
                } else {
                    $mon_qtd = 0;
                    $monitor_resumo = "Nenhum Monitor";
                }
            }
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
            $vga_uso = " VGA  : " . $_POST['vga_util'] . " / ";
        } else {
            $vga = "";
            $vga_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['hdmi'])) {
            //echo "checkbox marcado! <br/>";
            $hdmi = " HDMI ";
            $hdmi_uso = " HDMI  : " . $_POST['hdmi_util'] . " / ";
        } else {
            $hdmi = "";
            $hdmi_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['dvi'])) {
            //echo "checkbox marcado! <br/>";
            $dvi = " DVI ";
            $dvi_uso = " DVI  : " . $_POST['dvi_util'] . " / ";
        } else {
            $dvi = "";
            $dvi_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        if (isset($_POST['display'])) {
            //echo "checkbox marcado! <br/>";
            $display = " Display ";
            $display_uso = " DISPLAY  : " . $_POST['display_util'] . "  ";
        } else {
            $display = "";
            $display_uso = "";
            // echo "checkbox não marcado! <br/>";
        }

        $video_saida = $vga . $hdmi . $dvi . $display;

        //$vga_uso =" VGA  : ".$_POST['vga_util']." / ";
//$hdmi_uso = " HDMI  : ".$_POST['hdmi_util']." / ";
//$dvi_uso = " DVI  : ".$_POST['dvi_util']." / ";
//$display_uso = " DISPLAY  : ".$_POST['display_util']."  ";


        $video_portas_uso = $vga_uso . $hdmi_uso . $dvi_uso . $display_uso;
        // tratamento de fonte
        $fonte_inst = $_POST['fonte_tipo'] . " / " . $_POST['fonte_pot'];
        // tratamento de utilizadores
        $utilizadores_qtd = $_POST['utilizadores_num'];

        $utilizadores_nomes = $_POST['utilizadores_nomes'];

        $responsavel = $_POST['resp'];

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

        $sqlinsert = "INSERT INTO  tbequip (`status`,`ctrl_ti`, `tbequip_plaqueta`, `tbequi_nome`, `tbequi_tipo`, `tbequip_monitor`, `tbequi_mod`, `tbequip_so`, `tbequi_so_arq`,
    `tbequi_modplaca`, `tbequi_memoria`, `tbequi_slots`, `tbequi_slots_uso`, `tbequi_modelomemoria`, `tbequi_armazenamento`, `tbequi_tparmazenamento`,
    `tbequi_arm_sec`, `tbequi_arm_sectam`, `tbequi_datalanc`, `tbequi_teclado`, `tbequi_mouse`, `tbequi_filtrodelinha`, `tbequi_tecnico`, `tbequi_tbcmei_id`, `tbequip_dtaalterado`,
    `tbequi_app_out`, `tbequi_app`, `tbequi_proc`, `tbequi_obs`,`tbequi_ref`,`tbequip_lacre`,`tbequip_vid_saidas`,`tbequip_vid_uso`,`tbequip_fonte`,`tbequip_util_num`,`tbequip_util_nomes`,`tbequip_resp`,`tbequip_monitor_num`,`tbequip_monitor_obs`,`tbequip_reserva`)
VALUES('$status','$ctrl_ti','$plaqueta','$nome_pc','$tipo_equip','$monitor_tipo','$processador','$so','$so_arq',
'$placamae','$mem_tam','$mem_slot','$mem_slot_uso','$mem_tipo','$arm_tam','$arm_tipo','$arm_sectipo','$arm_sectam','$hoje','teclado','mouse','filto','$nome_usuario','$id_loc',now(),
'$app_outros','$apps','$processador','$obs','$ref_equip', '$lacre','$video_saida','$video_portas_uso','$fonte_inst','$util_qtd','$util_nomes','$responsavel','$mon_qtd','$obsvid','$reserva')";





        $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
        if (($retorno_add == '0') or ($retorno_add == "")) {
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
            } else {
               $ret_equip_id = $linha['tbequip_id'];
             //   $ret_equip_id = $linha['ctrl_ti'];
              
               
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
                                      <a href="ret_dados.php?id=<?php echo $ret_equip_id; ?>" title="Registro Cadastrado ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?> " title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                    
                                    <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                 <br><br>
                                      <a href="busca_diversos.php" title="SELECIONAR ">Consultar Equipamento  </a>  <br /><br />
                                     
                                </center>
                                <?php

                    }
                        break;
                    case '1': { // insercao de um monitor na base

                        $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                        $sqlmon = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                        echo "<script>alert('CONJUNTO DE DADOS  SALVOS.');  </script>";
                             // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                              if ($ref_idm == "sem referencia") 
                               {
                                 echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";
                            
                               } else
                               {
                                //$ctrl_ti = $_POST['ctrl_ti'];
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                        
                        // visualizacao de teste //
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
                                      <a href="ret_dados.php?id=<?php echo $ret_equip_id; ?>" title="Registro Cadastrado ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                    <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?> " title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                    <br><br>

                                    <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                      <a href="busca_diversos.php" title="SELECIONAR ">Consultar Equipamento  </a>  <br /><br />
                                  
                                </center>
                                <?php

                    }
                              }
                            break;
                    case '2': {// insercao de 2 monitores na base 

                        $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                        $sqlmon1 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                        //  $sqlmon1 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje')";
                        $ret_add_mon1 = mysqli_query($conn, $sqlmon1) or die("Nao foi possivel inserir os 2 Monitores na base"); //Ou vai..., ou racha.;
                      
                          // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                        if ($ref_idm == "sem referencia") {
                            echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                        } else
                        {
                            //$ctrl_ti = $_POST['ctrl_ti'];
                            // insercao de controle_ti dados do computador
                            // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                            $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                            //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                            // insercao do segundo monitor na base
                            $ref_equip = $hoje . '/ ' . $monitor2_plaq;
                            $sqlmon2 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor2_tipo','$monitor2_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                            // $sqlmon2 = "INSERT INTO  tb_monitores (`status`, `ctrl_ti`,`id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor1_tipo','$monitor2_saida','$hoje')";
                            $ret_add_mon2 = mysqli_query($conn, $sqlmon2) or die("Nao foi possivel inserir os 2 Monitores na base"); //Ou vai..., ou racha.;
                          
                             // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                            if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                            } else {
                                //$ctrl_ti = $_POST['ctrl_ti'];
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor2_cti, $hoje, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                 echo "<script>alert('DADOS DO EQUIPAMENTO / 2 MONITORES  SALVOS.');</script>";
                                //    echo "<br> location.href=precadequip.php?id=0"; 
                                // visualizacao de teste //
                                echo "<center> <br> ";
                                echo "Descritivo do Equipamento Cadastrado  CTI = " . $ctrl_ti . " <br> ";
                                echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                echo '<br> Infs Monitor <br> ' . $monitor_resumo;
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
                                      <a href="ret_dados.php?id=<?php echo $ret_equip_id; ?>" title="Registro Cadastrado ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                      <br><br>
                                      <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                     <br><br>
                                      <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                    <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                      <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                      <a href="busca_diversos.php" title="SELECIONAR ">Consultar Equipamento  </a>  <br /><br />
                                  
                                </center>
                                <?php
                            }
                        }
                       }
                        break;
                    case '3': {// insercao de 3 monitores na base 
                        $ref_equip = $hoje . '/ ' . $monitor1_plaq;
                        $sqlmon1 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                        //    $sqlmon1 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`, `mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor1_cti','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$monitor1_saida','$hoje')";
                        $ret_add_mon1 = mysqli_query($conn, $sqlmon1) or die("Nao foi possivel inserir os 3 Monitores na base"); //Ou vai..., ou racha.;
                         // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                             if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                             }
                             else
                          {
                            //$ctrl_ti = $_POST['ctrl_ti'];
                            // insercao de controle_ti dados do computador
                            // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                            $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor1_cti, $hoje, $nome_usuario);
                            //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                            // insercao do segundo monitor na base

                            $ref_equip = $hoje . '/ ' . $monitor2_plaq;
                            $sqlmon2 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor2_tipo','$monitor2_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                            //$sqlmon2 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor2_cti','$ret_equip_id','$monitor2_marca','$monitor2_tam','$monitor2_plaq','$monitor2_tipo','$monitor2_saida','$hoje')";
                            $ret_add_mon2 = mysqli_query($conn, $sqlmon2) or die("Nao foi possivel inserir os 3 Monitores na base"); //Ou vai..., ou racha.;
                             // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                            if ($ref_idm == "sem referencia") {
                                echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                            } else {
                                //$ctrl_ti = $_POST['ctrl_ti'];
                                // insercao de controle_ti dados do computador
                                // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                   $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor2_cti, $hoje, $nome_usuario);
                                //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                $ref_equip = $hoje . '/ ' . $monitor3_plaq;
                                $sqlmon3 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`, `local_id`, `sec_id`, `usuario`, `ref`) VALUES('$status','$monitor3_cti','$ret_equip_id','$monitor3_marca','$monitor3_tam','$monitor3_plaq','$monitor3_tipo','$monitor3_saida','$hoje','$id_loc','$id_sec','$nome_usuario','$ref_equip')";
                                // $sqlmon3 = "INSERT INTO  tb_monitores (`status`,`ctrl_ti`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`,`mon_saida`, `data`) VALUES('$status','$monitor3_cti','$ret_equip_id','$monitor3_marca','$monitor3_tam','$monitor3_plaq','$monitor3_tipo','$monitor3_saida','$hoje')";
                                $ret_add_mon3 = mysqli_query($conn, $sqlmon2) or die("Nao foi possivel inserir os 3 Monitores na base"); //Ou vai..., ou racha.;

                                 // insercao de controle_ti do monitor 
                             // recupera o id cadastrado na base tb_equip
                              $ref_idm = busca_id($conn, $ref_equip, "tb_monitores");
                                if ($ref_idm == "sem referencia") {
                                    echo "Problema de identificacao do Monitor !  nao identificado na base tb_Monitores";

                                } else {
                                    //$ctrl_ti = $_POST['ctrl_ti'];
                                    // insercao de controle_ti dados do computador
                                    // add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti,$Fhoje,$Fusuario ) // inserte /  adiciona em controle TI 
                                    $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_idm, $ref_idm, $monitor3_cti, $hoje, $nome_usuario);
                                    //$add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);

                                    echo "<script>alert('DADOS DO EQUIPAMENTO / 3 MONITORES  SALVOS.');</script>";
                                    //    echo "<br> location.href=precadequip.php?id=0"; 
                                    // visualizacao de teste //

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
                                      <a href="ret_dados.php?id=<?php echo $ret_equip_id; ?>" title="Registro Cadastrado ">Verificar Item Cadastrado  </a>  <br /><br /> 
                                      <br><br>
                                      <a href="listaequip.php?var=<?php echo $ret_equip_id; ?>&tipo=1" title="SELECIONAR ">Lista Equipamentos  </a>  <br /><br /> 
                                      <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                     
                                      <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                      <br><br>
                                    <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                      <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                   <br><br>
                                      <a href="busca_diversos.php" title="SELECIONAR ">Consultar Equipamento  </a>  <br /><br />
                                  

                                </center>
                                <?php
                              }
                            }
                          }
                        }
                 break;
                }
               
            }

            
        }
    }
}
















<?php
/*
include "../Config/config_sistema.php";
include "bco_fun.php";
$hoje = date("d/m/Y H:i:s ");
$nome_usuario = "Local";//$_SESSION['nome_usuario'];
$plaqueta = STRTOUPPER($_POST['plaqueta']);
$nome_pc = STRTOUPPER($_POST['nome_equip']);
$id_loc = $_POST['loc_id'];
$id_sec = $_POST['sec_id'];
$tipo_equip = $_POST['tipo_equip'];
$so = $_POST['so_tipo'];
$so_arq = $_POST['so_arq'];
$placamae = $_POST['placa'];
$processador = $_POST['processador'];
$arm_tipo = $_POST['arm_tipo'];
$arm_tam = $_POST['arm_tam'];
$arm_sectipo = $_POST['arm_sec'];
$arm_sectam = $_POST['arm_sec_tam'];
$mem_tipo = $_POST['mem_tipo'];
$mem_tam = $_POST['mem_qtd'];
$mem_slot = $_POST['slots'];
$mem_slot_uso = $_POST['slots_uso'];
$monitor_tipo = $_POST['mon_tipo'];
$monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
$monitor1_tam = $_POST['mon1_tam'];
$monitor1_plaq = $_POST['mon1_pat'];
$monitor2_marca =STRTOUPPER( $_POST['mon2_mar']);
$monitor2_tam = $_POST['mon2_tam'];
$monitor2_plaq = $_POST['mon2_pat'];
$app_outros = $_POST['app_outros'];
$obs = $_POST['obs'];
$status = "1"; 
// tratamento do montitor
if($monitor_tipo=="Unico") 
   $mon_qtd=1;
else
{
  if($monitor_tipo=="Duplo") 
    $mon_qtd=2;
  else 
   $mon_qtd=0;
}

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
               
                                <center>
                                    <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>$tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
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
                                 echo "<br> location.href=precadequip.php?id=0"; 
                                ?>
                                  <center>
                                   <br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>$tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                      <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
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
  <a href="qrimpressao.php?var=<?php echo $ret_equip_id; ?>$tipo=1" title="SELECIONAR ">GERAR QRCODE  </a>  <br /><br /> 
                                    <a href="cadedquipmult.php?id=<?php echo $loc; ?>&id_ref=<?php echo $ret_equip_id; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                      <a href="chk_plaqueta.php?id=<?php echo $id_loc; ?>&tipo=1" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />


