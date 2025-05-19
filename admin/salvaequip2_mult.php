<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
$hoje = date("Y/m/d H:i:s ");
$nome_usuario = $_SESSION['nome_usuario'];
$origem = $_POST['origem']; // ficar atento a cadastro de notebook
//$nome_usuario = $_POST['rec_user'];
    if ($origem == "cadastro_m") // formulario de cadastro de pc = cadastro   /     formulario de cadastro de notebook = cadastro_n   /    
    {
          // dados comum 
           //$plaqueta = STRTOUPPER($_POST['plaqueta']);
          // $nome_pc = STRTOUPPER($_POST['nome_equip']);
           //$ctrl_ti = $_POST['ctrl_ti'];
          //  $ref_equip = $hoje . '/ ' . $plaqueta;
        $id_loc = $_POST['loc_id'];
        $id_sec = codsecretaria_by_idCmei($conn, $id_loc);  // retorna o cod da secretaria em funcao do cmei_id  $_POST['sec_id'];
        $tipo_equip = $_POST['tipo_equip'];
        $so = $_POST['so_tipo'];
        $reserva = $_POST['reserva'];
        $lacre = $_POST['lacre'];
     
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
       
        
            $mon_qtd = "0";
            $monitor_resumo = "Monitor do Equipamento";
            $monitor1_source = "";


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
              //  $ref_equip = $hoje . '/ ' . $plaqueta;

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

         
    
          // inclusao de dados na base 
         $num_disp = $_POST['utilizadores_num'];
          switch ($num_disp)
                   {
                     case '1':
                       {
                             //    echo " Uma inserçao ";
                                 $plaqueta = $_POST['num1'];
                                 $nome_pc = STRTOUPPER($_POST['nome_equip']);
                                 $ctrl_ti = $_POST['disp1'];
                                 //tratamento da referencia do registro 
                                 $ref_equip = $hoje . '/ ' . $plaqueta;
                               if ($id_loc != "")
                                {
                                   if ($plaqueta <> "PENDENTE") 
                                     {
                                        $result = mysqli_query($conn, 'SELECT * FROM tbequip where tbequip_plaqueta = "' . $plaqueta . '" ');
                                        $retorno_checkInEng = mysqli_num_rows($result);
                                        $row = mysqli_fetch_assoc($result);
                                        if ($retorno_checkInEng <> 0) 
                                        {
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
                                            echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                                            echo "</a>";
                                            echo "</li></P> ";
                                            echo "</ul>";
                                            // exit;
                                            exit;
                                         }
                                        else // retorno_checkIng 0
                                        {
                                             //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                                                if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                                                {
                                                    echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                                                    $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                                    arquivo_grava("descritivos.txt", $posicao);
                                                    add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                                                } else  // checagem ok e apto para insercao 
                                                {
                                                                                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                        echo "<center> <br> <b> ";
                                                                                                        echo "Descritivo do Equipamento Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                        echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                        echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                        echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                        echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                        echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                <br><br>
                                                                                  <a href="cad_multiplos.php?par=1&cti=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Mesmo Equipamento para  Outro  Local </a>  <br /><br />
                                    
                                                                            </center>
                                                                              </body>
		            	    	                                            </html>
                                                                                      <?php
                                                                                        // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                                                                    } // fim do case
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
                                                }  // fim do else  $retorno_checking
                                               // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                                             } // fim do else  $retorno_add */  
                                           } // fim do else apto
                                        } // fim do else retorno_checkIng 0
                                    } // fim do if plaqueta<>pendende
                               }  // fim do if id_loc!= ""
                            break; 
                       } // fim do case 1
                       
                       case '2':
                           {
                             // echo " 2 inserçao "; 
                                 //    insercao equip 1
                                 $plaqueta = $_POST['num1'];
                                 $nome_pc = STRTOUPPER($_POST['nome_equip']);
                                 $ctrl_ti = $_POST['disp1'];
                                 //tratamento da referencia do registro 
                                 $ref_equip = $hoje . '/ ' . $plaqueta;
                               if ($id_loc != "")
                                {
                                   if ($plaqueta <> "PENDENTE") 
                                     {
                                        $result = mysqli_query($conn, 'SELECT * FROM tbequip where tbequip_plaqueta = "' . $plaqueta . '" ');
                                        $retorno_checkInEng = mysqli_num_rows($result);
                                        $row = mysqli_fetch_assoc($result);
                                        if ($retorno_checkInEng <> 0) 
                                        {
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
                                            echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                                            echo "</a>";
                                            echo "</li></P> ";
                                            echo "</ul>";
                                            // exit;
                                            exit;
                                         }
                                        else // retorno_checkIng 0
                                        {
                                             //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                                                if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                                                {
                                                    echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                                                    $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                                    arquivo_grava("descritivos.txt", $posicao);
                                                    add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                                                } else  // checagem ok e apto para insercao 
                                                {
                                                                                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                        echo "<center> <br><b> ";
                                                                                                        echo "Descritivo do Equipamento (01) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                        echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                        echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                        echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                        echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                        echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                      <?php
                                                                                        // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                                                                    } // fim do case
                //                                                                                        break;

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
                                                }  // fim do else  $retorno_checking
                                               // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                                             } // fim do else  $retorno_add */  
                                           } // fim do else apto
                                        } // fim do else retorno_checkIng 0
                                    } // fim do if plaqueta<>pendende
                               }  // fim do if id_loc!= ""
                           // insercao do equip 2
           
                                        $plaqueta = $_POST['num2'];
                                        $nome_pc = STRTOUPPER($_POST['nome_equip']);
                                        $ctrl_ti = $_POST['disp2'];
                                        //tratamento da referencia do registro 
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
                                                    echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                                                    echo "</a>";
                                                    echo "</li></P> ";
                                                    echo "</ul>";
                                                    // exit;
                                                    exit;
                                                } else // retorno_checkIng 0
                                                {
                                                    //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                                                    if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                                                    {
                                                        echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                                                        $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                                                        arquivo_grava("descritivos.txt", $posicao);
                                                        add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                                                    } else  // checagem ok e apto para insercao 
                                                    {
                                                        // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                                                     echo "<center> <br> <b> ";
                                                                                                                                     echo "Descritivo do Equipamento (02) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                                                     echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                                                     echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                                                     echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                                                     echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                                                     echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                                            <br><br>
                                                                                                              <a href="cad_multiplos.php?par=1&cti=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Mesmo Equipamento para  Outro  Local </a>  <br /><br />
                                    
                                                                                                        </center>
                                                                                                          </body>
		            	    	                                                                        </html>
                                                                                                                  <?php
                                                                        // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                                                    } // fim do case
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
                                                            }  // fim do else  $retorno_checking
                                                            // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                                                        } // fim do else  $retorno_add */  
                                                    } // fim do else apto
                                                } // fim do else retorno_checkIng 0
                                            } // fim do if plaqueta<>pendende
                                        }
                               
                               
                               
                               break; 
                       } // fim do case 2
        case '3': {
            // echo " 2 inserçao "; 
            //    insercao equip 1
            $plaqueta = $_POST['num1'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp1'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                         echo "<center> <br><b> ";
                                                                                                         echo "Descritivo do Equipamento (01) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                         echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                         echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                         echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                         echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                         echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                      <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        //                                                                                        break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }  // fim do if id_loc!= ""
            // insercao do equip 2

            $plaqueta = $_POST['num2'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp2'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                                                     echo "<center> <br> <b> ";
                                                                                                                                     echo "Descritivo do Equipamento (02) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                                                     echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                                                     echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                                                     echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                                                     echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                                                     echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                                    
                                                                                                                  <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        // break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }

            //    insercao equip 3
            $plaqueta = $_POST['num3'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp3'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                         echo "<center> <br><b> ";
                                                                                                         echo "Descritivo do Equipamento (03) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                         echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                         echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                         echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                         echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                         echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                                            <br><br>
                                                                                                              <a href="cad_multiplos.php?par=1&cti=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Mesmo Equipamento para  Outro  Local </a>  <br /><br />
                                    
                                                                                                        </center>
                                                                                                          </body>
		            	    	                                                                        </html>


                                                                                                         
                                                                                      <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        //                                                                                        break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }  // fim do if id_loc!= ""
            // insercao do equip 2
              // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;

            break;
        } // fim do case
           case '4': {
            // echo " 2 inserçao "; 
            //    insercao equip 1
            $plaqueta = $_POST['num1'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp1'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                         echo "<center> <br><b> ";
                                                                                                         echo "Descritivo do Equipamento (01) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                         echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                         echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                         echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                         echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                         echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                      <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        //                                                                                        break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }  // fim do if id_loc!= ""
            // insercao do equip 2

            $plaqueta = $_POST['num2'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp2'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                                                     echo "<center> <br> <b> ";
                                                                                                                                     echo "Descritivo do Equipamento (02) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                                                     echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                                                     echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                                                     echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                                                     echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                                                     echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                                    
                                                                                                                  <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        //                                                                                        break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }  // fim do if id_loc!= ""
            // insercao do equip 3
            
            //    insercao equip 3
            $plaqueta = $_POST['num3'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp3'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                         echo "<center> <br><b> ";
                                                                                                         echo "Descritivo do Equipamento (03) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                         echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                         echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                         echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                         echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                         echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                      <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                        //                                                                                        break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }  // fim do if id_loc!= ""
            // insercao do equip 4

            $plaqueta = $_POST['num4'];
            $nome_pc = STRTOUPPER($_POST['nome_equip']);
            $ctrl_ti = $_POST['disp4'];
            //tratamento da referencia do registro 
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
                        echo "<h3> <a href='ret_dados.php? id={$ctrl_ti} '> * </a>  &nbsp - CTI: {$ctrl_ti} &nbsp -  Local:  {$loc_cad} &nbsp -  Equipamento:  {$ret_desc} &nbsp &nbsp - Status: {$ret_status}<br /> </h3>";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                        // exit;
                        exit;
                    } else // retorno_checkIng 0
                    {
                        //function ret_ctrl_ti_tbequip($Fconexao, $Fref) // informa se ja existe numeracao de controle_ti dentro de tab equip
                        if (ret_ctrl_ti_tbequip($conn, $ctrl_ti) == "1") // ja existe um cti em tbequip cadastrado
                        {
                            echo " <br><br> <p style=color:RED> <b>  <CENTER> O CTI : " . $ctrl_ti . "  ja foi Cadastrado na base de dados dos Computadores ! NÃO PODENDO SER INSERIDO NOVAMENTE </CENTER> </b> </p>";
                            $posicao = " Tentativa de add Dispositivo (noate)" . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base  - " . $hoje . " Tecnico " . $nome_usuario;
                            arquivo_grava("descritivos.txt", $posicao);
                            add_acao("Inote_rec", $ctrl_ti, $nome_usuario);
                        } else  // checagem ok e apto para insercao 
                        {
                            // echo "CTI  :" . $ctrl_ti . "  Plaqueta :" . $plaqueta ." Dispositivo tipo : ".$tipo_equip. " Codigo do Local :" . $id_loc . "  " . nomedolocal($conn, $id_loc);
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
                                                                                                                                     echo "<center> <br> <b> ";
                                                                                                                                     echo "Descritivo do Equipamento (04) Cadastrado  CTI = " . $ctrl_ti . "</b> <br> ";
                                                                                                                                     echo ' Patrimonio plaqueta : ' . $plaqueta . ' <br> Nome_equip  :' . $nome_pc . '  local id  ' . $id_loc . '  sec id  ' . $id_sec . '<br> tipo_equip ' . $tipo_equip . '  Lacre da TI ' . $lacre . '  Reserva: ' . $reserva . ' <br>';
                                                                                                                                     echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                                                                                                                     echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                                                                                                                     echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                                                                                                                     echo '<br> Infs Monitor  ' . $monitor_resumo . " <br> ";
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
                                                                                                            <br><br>
                                                                                                              <a href="cad_multiplos.php?par=1&cti=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Mesmo Equipamento para  Outro  Local </a>  <br /><br />
                                    
                                                                                                        </center>
                                                                                                          </body>
		            	    	                                                                        </html>
                                                                                                                  <?php
                                            // echo  "Não será registrado nenhum  Monitor para o equipamento ".$nome_pc."     " ;
                                        } // fim do case
                                           // break;

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
                                }  // fim do else  $retorno_checking
                                // cadastra-se o nome na base cad_eng e obtem o ID_eng 
                            } // fim do else  $retorno_add */  
                        } // fim do else apto
                    } // fim do else retorno_checkIng 0
                } // fim do if plaqueta<>pendende
            }





            break;
                        }
                       
                   }
       
         }  // fim do else inclusao na base
     // }
    // }// fim do cadastro_M
  // }
 //}

 ?>
