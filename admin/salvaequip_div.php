<?php
include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_usuario = $_SESSION['nome_usuario'];
$hoje = date("Y/m/d H:i:s");
$modalidade = $_POST['modalidade'];
$tipo =$modalidade;
switch ($tipo) {
    case '0': {
        echo "<script>alert('OPÇAO NAO SELECIONADA');</script>";
        echo "<script>history.go(-1);</script>";
    }
        break;
    case '1': {
        // opcao de salvar kits pc
        // echo "Salvar kits pc ";
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $descricao = $_POST['descricao'];
        $marca = STRTOUPPER($_POST['marca']);
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $proc = $_POST['proc'];
        $mem = STRTOUPPER($_POST['mem_tipo']);
        $mem_qtd = $_POST['mem_qtd'];
        $so = $_POST['so_tipo'];
        $slots = $_POST['slots'];
        //$slots_uso = $_POST['slots_uso'];
        $arm = $_POST['arm_tipo'];
        $arm_qtd = $_POST['arm_tam'];

        //	$arm_sec = $_POST['arm_sec'];
        // $arm_sec_tam = $_POST['arm_sec_tam'];
        $monitor = $_POST['mon_tipo'];
        $comp_V = '';
        $comp_H = '';
        $comp_D = '';
        $comp_P = '';

        if (isset($_POST['vga'])) {
            $comp_V = 'VGA ';
        }
        if (isset($_POST['hdmi'])) {
            $comp_H = 'HDMI ';
        }
        if (isset($_POST['dvi'])) {
            $comp_D = 'DVI ';
        }
        if (isset($_POST['display'])) {
            $comp_P = 'Display Port ';
        }
        $componentes = $comp_V . "/ " . $comp_H . "/ " . $comp_D . "/ " . $comp_P;

        $sqlinsert = "INSERT INTO  tb_kits (`descritivo`, `modelo`, `placa`, `marca`, `processador`, `mem_tipo`, `mem_tam`, `slots`,
    `so`, `arm_tipo`, `arm_qtd`,`vid_saidas`,`monitor`)VALUES('$descricao','$modelo','$placa','$marca','$proc','$mem','$mem_qtd','$slots','$so','$arm','$arm_qtd','$componentes','$monitor')";

        add_acao("IKM", "0kit-0", $ret_usuario);
        $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
        if (($retorno_add == '0') or ($retorno_add == "")) {
            echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
            echo "<script>history.go(-1);</script>";
            //$posicao = " Tentativa de add Monitor " . $ret_monitor . " no PC " . $ctrl_ti . "  recusado !  motivo , equip ja cadastrado na base para Controle T.I " . $makina . " - " . $hoje . " Tecnico " . $nome_usuario;
            //arquivo_grava("descritivos.txt", $posicao);
            $posicao = " Tentativa de add Kit    recusado !  motivo , erro de dados em tabela  - " . $hoje . " Tecnico " . $ret_usuario;
            arquivo_grava("descritivos.txt", $posicao);
        } else {
            echo "<script>alert('DADOS DO KIT PC  REGISTRADOS');</script>";
            echo "<h1><center><br><br>";
            echo " <strong> Dados Recebidos <br><br>";
            echo " KIT PC <br> <br>";
            echo "Descricao  " . $descricao . " <br>";
            echo "Patrimonio NAO INFORMADO <br>";
            echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
            echo "Secretaria  NENHUM ESPECIFICADO  <br>";
            echo "</strong> </center></h1>";
            echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
            add_acao("I_kits", "Kits", $ret_usuario);

            ?>
                 <center>
                                   <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />  
                                </center>
            
            <?PHP


        }
    }
        break;
    case '2': {
        // opcao de Processador
        //    echo "Salvar Processador ";
        //$status = "1";
        $descricao = $_POST['descricao'];
        $sqlproc = "INSERT INTO `tb_processadores` (`proc_nome`)VALUES('$descricao')";
        $ret_add_mon = mysqli_query($conn, $sqlproc) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
        echo "<script>alert('Componente Processador SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " PROCESSADOR <br> <br>";
        echo "Descricao  " . $descricao . " <br>";
        echo "Patrimonio NAO INFORMADO <br>";
        echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
        echo "Secretaria  NENHUM ESPECIFICADO  <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
        add_acao("IPro", "Proc", $ret_usuario);

        ?>
                                <center>
                                   <br><br>
                                     <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php
    }
        break;
    case '3': {
        // opcao de salvar Placa mae pc
        //echo "Salvar Placa Mae ";
        //$status = "1";
        $descricao = $_POST['descricao'];
        $sqlplac = "INSERT INTO  `tb_placa` (`p_desc`)VALUES('$descricao')";
        $ret_add_mon = mysqli_query($conn, $sqlplac) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
        echo "<script>alert('Componente Placa Mae  SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " PLACA MAE <br> <br>";
        echo "Descricao  " . $descricao . " <br>";
        echo "Patrimonio NAO INFORMADO <br>";
        echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
        echo "Secretaria  NENHUM ESPECIFICADO  <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
        add_acao("IPL", "Placa", $ret_usuario);

        ?>
                                <center>
                                   <br><br>
                                      <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                              <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php
    }
        break;
    case '4': {
        //tvs
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        $tam = $_POST['tam'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        $resp = STRTOUPPER($_POST['resp']);
        $ref = $hoje;
        $obs = $_POST['obs'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "TV";
        $descricao_cod = "4";
        $ctrl_ti = $_POST['ctrl_ti'];


        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`,`tam`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`resp`,`ctrl_ti`,`ref`) VALUES ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$tam','$id_loc','$id_sec','$obs','$hoje','$resp','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        //$ctrl_ti = $_POST['ctrl_ti'];
        $add_ti = add_TI($conn, "2", "TV", "T" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("ITV", $ctrl_ti, $ret_usuario);

        // fim da rotina



        echo "<script>alert('TV SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " TV <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Controle T.I. " . $ctrl_ti . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Responsavel " . $resp . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
                                     <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  <br /><br /> 
								    <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="newsfeed.php" title="listagem ">Inicio </a>  <br /><br />
                                </center>
                                <?php



    }
        break;
    case '5': {
        //switchs

        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";

        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        $gerenciavel = $_POST['gerenciavel'];
        $portas_tot = $_POST['portas_tot'];
        $portas_uso = $_POST['portas_uso'];
        $portas_livre = $_POST['portas_livre'];
        $obs = $_POST['obs'];
        $poe = $_POST['poe'];
        $ref = $hoje . "/" . $patrimonio;

        $rack_id = $_POST['rack_id'];
        $ctrl_ti = $_POST['ctrl_ti'];

        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "SWITCH";
        $descricao_cod = "3";

        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`ctrl_ti`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`, `gerenciavel`, `por_total`,`por_util`,`por_disp`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`ref`,`rack`,`poe`) VALUES
        ('$ret_usuario','$ctrl_ti','$status','$patrimonio','$descricao','$descricao_cod','$marca','$gerenciavel','$portas_tot','$portas_uso','$portas_livre','$id_loc','$id_sec','$obs','$hoje','$ref','$rack_id','$poe')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        echo "<script>alert('SWITCH SALVO.');  </script>";

        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao($conn), $Ftab(1,2,3),$Fdescricao(tipo),$Fcaminho(tipo+id), $Fid_equip(id tabela_orig), $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        add_acao("ISW", $ctrl_ti, $ret_usuario);
        $add_ti = add_TI($conn, "2", "SWITH", "S" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);


        // fim da rotina




        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " SWITCH CTI " . $ctrl_ti . " <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo " Switch Gerenciavel " . $gerenciavel . " Inserido no Rack id : " . $rack_id . " <br>";
        echo "Portas Utilizadas:  " . $portas_uso . " Portas Livres :" . $portas_livre . "  Portas Totais :  " . $portas_tot . " <br><br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
   <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_id; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>   
	
								  <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php


    }
        break;
    case '6': {
        //impressoras

        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $ctrl_ti = $_POST['ctrl_ti'];
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        //  $gerenciavel = $_POST['gerenciavel'];
        $porta = $_POST['porta'];
        $obs = $_POST['obs'];
        $ref = $hoje . "/" . $patrimonio;
        $comp_M = "";
        $comp_C = "";
        $comp_S = "";
        $comp_CP = "";

        if (isset($_POST['componente1'])) {
            $comp_M = 'Mono ';
        }
        if (isset($_POST['componente2'])) {
            $comp_C = 'Color ';
        }
        if (isset($_POST['componente3'])) {
            $comp_S = 'Scanner ';
        }
        if (isset($_POST['componente4'])) {
            $comp_CP = 'Copiadora';
        }
        $componentes = $comp_M . "/ " . $comp_C . "/ " . $comp_S . "/ " . $comp_CP;






        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4   IMPRESSORA COD 5
        $descricao = "IMPRESSORA";
        $descricao_cod = "5";

        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`ctrl_ti`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`, `comps`, `portas`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`ref`) VALUES
        ('$ret_usuario','$ctrl_ti','$status','$patrimonio','$descricao','$descricao_cod','$marca','$componentes','$porta','$id_loc','$id_sec','$obs','$hoje','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        echo "<script>alert('IMPRESSORA  SALVO.');  </script>";
        add_acao("I_IMP", $ctrl_ti, $ret_usuario);
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao($conn), $Ftab(1,2,3),$Fdescricao(tipo),$Fcaminho(tipo+id), $Fid_equip(id tabela_orig), $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");

        $add_ti = add_TI($conn, "2", "IMPRESSORA", "I" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);


        // fim da rotina




        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " IMPRESSORA  CTI " . $ctrl_ti . " <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Conexao Porta  " . $porta . " <br>";
        echo "Informaçoes complementares :  " . $componentes . " <br><br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
   <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>   
	
								  <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php











        //echo "<script>history.go(-1);</script>";
    }
        break;
    case '7': {
        //componentes em outro form
        echo "<script>alert('OPÇAO NAO HABILITADA  / componentes tipo 7');</script>";
        echo "<script>history.go(-1);</script>";
    }
        break;
    case '8': // cadastro direto de monitores  
    {
        $status = "1";
        $ctrl_ti = $_POST['ctrl_ti'];

        $nome_usuario = $_SESSION['nome_usuario'];
        $ret_usuario = $nome_usuario;
        $pc_ctrl_ti = $_POST['id_pc']; // cti informado na pagina anterior
        $id_loc = $_POST['loc_id']; 
        $id_sec = cod_sec($conn, $id_loc);
        $id_mon = $_POST['id_mon']; // id setado devido a escolha do item ja cadastrado
        
        if (($pc_ctrl_ti == 0) || ($pc_ctrl_ti == "0") || ($pc_ctrl_ti == "")) {
            $mon_saida = "";
            $ret_equip_id =  "0";
        } 
        else
         {
            $mon_saida = $_POST['mon_saida'];
            $ret_equip_id =  substr(ret_caminho_ctrl_ti($conn,$pc_ctrl_ti),1);   //busca o  tbequip_id do pc passado pelo cti informado na pagina anterior
         }
         // checagem pra saber se os dados sao digitados ou selecionados 
         if (($id_mon == "0") || ($id_mon == 0) || ($id_mon == "")) 
         {
            $monitor1_marca = STRTOUPPER($_POST['mon1_mar']);
            $monitor1_tam = $_POST['mon1_tam'];
            $monitor1_tipo = STRTOUPPER($_POST['mon_cat']);
            $monitor1_plaq = $_POST['mon1_pat'];
            $plaqueta = $monitor1_plaq;
            $obs = $_POST['mon1_obs'];
         }
         else // busca pelo ID do monitor na tabela Kits 
         {
            $sql = "SELECT * FROM tb_kits where id ='".$id_mon."' ORDER BY descritivo";
            $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());  
               $qtd = mysqli_num_rows($resultado);  // $option = '';
              if ($qtd == 0)
                 $erro = "1";
               else
                  {
                    do {
                            $row = mysqli_fetch_assoc($resultado);
                            $ret_tab_tipo = STRTOUPPER($row['tela']);
                            $ret_tab_marca = STRTOUPPER($row['marca']);
                            $ret_tab_modelo = STRTOUPPER($row['modelo']);
                            $ret_tab_tam = $row['mem_tam'];
                      } while ($row = mysqli_fetch_assoc($resultado));
              }

            $monitor1_marca = $ret_tab_marca."  ". $ret_tab_modelo;
            $monitor1_tam = $ret_tab_tam;
            $monitor1_tipo = $ret_tab_tipo;
            $monitor1_plaq = $_POST['mon1_pat'];
            $plaqueta = $monitor1_plaq;
            $obs = $_POST['mon1_obs'];

        }
        // checagem de existencia de ctrl_ti em controle_ti e monitores 

         //  busca em controle_ti  se ja existe cadastro // 
          if (ret_ctrl_ti($conn, $ctrl_ti) == "0") 
          {
             //realiza a busca em Monitores  se ja existe cadastro //       
               if (ret_ctrl_ti_monitor($conn, $ctrl_ti) == "0")
                 $erros = "0";
                else
                $erros = "1";
           } 
          else
               $erros = "1";
              // fim das checagens ...
               if($erros=="1")
              {
              echo " <br> <br> <center>  <p style=color:RED> <b>  O Controle CTI nº :" . $ctrl_ti . "  Ja esta em uso para outro equipamento !    </b>  </p></center>     ";
              echo " <br>   <br> <center>  <p style=color:RED> <b> Logo não é possivel cadastra-lo novamente   </b>  codigo de erro 471  </p></center>     ";
              echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
              echo " <br><br> <center><a href='busca_diversos.php?cti=".$ctrl_ti."' title='Visualizar Dados do Equipamento'>Consultar Infs do Equipamento</a> </center> <br/>";
            }
        else
          { // tudo certo para a inserçao dos dados na base 

            //  $tipo_equip = $_POST['tipo_equip'];
                $ref = $hoje . "/" . $nome_usuario;
                $sqlmon = "INSERT INTO  `tb_monitores` (`usuario`,`status`, `id_equip`, `mon_marca`, `mon_tam`, `mon_plaqueta`,`mon_tipo`, `data`,`local_id`,`sec_id`,`ctrl_ti`,`obs`,`ref`)VALUES('$ret_usuario','$status','$ret_equip_id','$monitor1_marca','$monitor1_tam','$monitor1_plaq','$monitor1_tipo','$hoje','$id_loc','$id_sec','$ctrl_ti','$obs','$ref')";
                $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Monitor na base"); //Ou vai..., ou racha.;
                add_acao("I_D_MOn", $ctrl_ti, $ret_usuario);
                // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 

                // recupera o id cadastrado na base  $ref = $hoje."/".$nome_usuario;
                $ref_id = busca_id($conn, $ref, "tb_monitores");
                $ctrl_ti = $_POST['ctrl_ti'];
                //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
                $add_ti = add_TI($conn, "3", "MONITOR", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
                
                // vincula monitor ao pc 
                //    $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $cti_pc_ant, $ctrl_ti, $ret_usuario);
                $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $pc_ctrl_ti, $ctrl_ti,$mon_saida,$ret_usuario);



                // fim da rotina





        echo "<script>alert('Monitor SALVO.');  </script>";
        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " MONITOR <br>";
        echo "Equipamento marca " . $monitor1_marca . " <br>";
        echo "Patrimonio " . $monitor1_plaq . " CONTROLE T.I " . $ctrl_ti . "     <br>";
        echo "Tipo : " . $monitor1_tipo . " <br>";
        echo "Tamanho :  " . $monitor1_tam . " <br>";
        echo "Vinculo ao PC CTI nº:  " . $pc_ctrl_ti . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_monitores") . "  </i></center>";
        ?>
                                <center>
                                  <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  
								  <br><br>
                                     <a href="chk_plaquetadiv.php?id=<?php echo $id_loc; ?>&tipo=8&CTI=<?php echo $ctrl_ti; ?>&Patrimonio=<?php echo $monitor1_plaq; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local e mesmas configuraçoes </a>  <br /><br /> 
                                     <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                  
                                    <a href="busca_diversos.php" title="consulta ">Consulta Equipamentos  </a>  <br /><br />
                                    
                                </center>
                                <?php


        }
    }
        break;
    case '9':  // cadastro de tablets 
    {
        $status = "1";
        //  $nome_usuario = "Local";//$_SESSION['nome_usuario'];
        //$ret_equip_id = $_POST['id_pc'];
        $ctrl_ti = $_POST['ctrl_ti'];
        $id_loc = $_POST['loc_id'];
        $id_sec = $_POST['sec_id'];
        $eq_marca = STRTOUPPER($_POST['mar']);
        $eq_tam = $_POST['tam'];
        $eq_plaq = $_POST['pat'];
        $eq_so = strtoupper($_POST['so']);
        $plaqueta = $eq_plaq;
        $eq_tipo = "TABLET  " . $eq_tam;
        $ref = $hoje . " / " . $plaqueta;
        $obs = $_POST['obs'];
        $eq_nome = $eq_marca;
        $status = "1";

        $sqlmon = "INSERT INTO  `tbequip` (`tbequi_tecnico`,`ctrl_ti`,`status`, `tbequip_plaqueta`, `tbequi_nome`, `tbequi_tipo`, `tbequip_so`,`tbequi_tbcmei_id`,`tbequi_obs`,`tbequi_ref`, `tbequi_datalanc`) VALUES
            ('$ret_usuario','$ctrl_ti','$status','$plaqueta','$eq_nome','$eq_tipo','$eq_so','$id_loc','$obs','$ref','$hoje')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o Tablet na base"); //Ou vai..., ou racha.;
        echo "<script>alert('Tablet   SALVO.');  </script>";

        // rotina para insercao em tb_controle_ti  tb_equip = 1 tb_diversos = 2 tb_monitores=3 

        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_equip");
        //   $ctrl_ti = $_POST['ctrl_ti'];
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        $add_ti = add_TI($conn, "1", "TABLET", "C" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("I_TAb", $ctrl_ti, $ret_usuario);
        //   echo $add_ti;

        // fim da rotina


        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Tablet <br> <br>";
        echo "Equipamento marca " . $eq_marca . " <br>";
        echo "Patrimonio " . $eq_plaq . " <br>";
        echo "Tamanho " . $eq_tam . " <br>";
        echo "Sistema   :" . $eq_so . " <br><br>";
        echo "Obs : " . $obs . " <br> <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_equip") . "  </i></center>";



        ?>
                                <center>
									<br><br>
                                    <a href="qrimpressao.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  								  
								  <br><br>
                                    
                                   <br><br>
                                    <a href="chk_plaquetadiv.php?id=<?php echo $id_loc; ?>&tipo=9" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php




    }
        break;
    case '10': { // rack
        $status = "1";
        $nome_usuario = $_SESSION['nome_usuario'];
        $ctrl_ti = $_POST['ctrl_ti'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "RACK";
        $descricao_cod = "2";
        $localizacao = $_POST['localizacao'];
        $patrimonio = $_POST['pat'];
        $ref = $hoje . " / " . $patrimonio;
        $id_loc = $_POST['loc_id'];
        $id_sec = $_POST['sec_id'];
        $marca = STRTOUPPER($_POST['marca']);
        $tam = $_POST['tam'];
        // $loc_inst = $_POST['tipo'];
        $obs = $_POST['obs'];

        $tipo = $_POST['tipo']; // local onde esta instalado ( parede ou piso)
        // tratamento dos checskbox
        $comp_P = "";
        $comp_S = "";
        $comp_H = "";
        $comp_F = "";
        /* if (isset($_POST['componente1'])) {

             $comp_P = 'Patch Panel ' . $_POST['porta_patch'];
            // echo "checkbox marcado! <br/>";
             //echo "valor: " . $_POST['componente1'];
         
         } else {
          //   echo "checkbox não marcado! <br/>";
         }
         */

        if (isset($_POST['componente1'])) {
            $comp_P = 'Patch Panel ' . $_POST['porta_patch'] . " Portas  " . $_POST['qtd_patch'] . " unid. ";
        }
        if (isset($_POST['componente2'])) {
            $comp_S = 'Switch ' . $_POST['porta_switch'] . " Portas  " . $_POST['qtd_switch'] . " unid. ";
        }
        if (isset($_POST['componente3'])) {
            $comp_H = 'HUB ' . $_POST['porta_hub'] . " Portas  " . $_POST['qtd_hub'] . " unid. ";
        }
        if (isset($_POST['componente4'])) {
            $comp_F = 'FILTRO DE LINHA ' . $_POST['porta_fil'] . " Portas  " . $_POST['qtd_fil'] . " unid. ";
        }
        $componentes = $comp_P . "/ " . $comp_S . "/ " . $comp_H . "/ " . $comp_F;

        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        //$descricao = "RACk";
        //$descricao_cod = "2";

        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`, `tam`, `posicao`, `comps`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`localizacao`,`ctrl_ti`,`ref`) VALUES
        ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$tam','$tipo','$componentes','$id_loc','$id_sec','$obs','$hoje','$localizacao','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        echo "<script>alert('RACk SALVO.');  </script>";

        // rotina para insercao em tb_controle_ti  tb_equip = 1 tb_diversos = 2 tb_monitores=3 

        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");

        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        $add_ti = add_TI($conn, "2", "RACK", "R" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        //  echo $add_ti;

        // fim da rotina
        add_acao("I_RA", $ctrl_ti, $ret_usuario);



        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo $add_ti;
        echo " Rack  CTI  :" . $ctrl_ti . " <br> <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Tamanho " . $tam . " <br>";
        echo "Instalado em :  " . $tipo . " <br> Componentes  :" . $componentes . " <br><br>";
        echo "Obs : " . $obs . " <br> <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";






        ?>
                                <center>
								  <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  
                                   <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php


    }
        break;
    case '11':  // patch panel
    {
        $status = "1";
        $nome_usuario = "Local";//$_SESSION['nome_usuario'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "PATCH PANEL";
        $descricao_cod = "1";
        $patrimonio = $_POST['pat'];
        $id_loc = $_POST['loc_id'];
        $id_sec = $_POST['sec_id'];
        $marca = STRTOUPPER($_POST['marca']);
        $tipo = $_POST['tipo'];
        $portas = $_POST['portas'];
        $rede = $_POST['rede'];
        $obs = $_POST['obs'];
        $ref = $hoje . " / " . $patrimonio;
        $ctrl_ti = $_POST['ctrl_ti'];
        //   if (isset($_POST['gerenciavel'])) {
        //     $comp = 'Gerenciavel ';
        //}
        //else{
        //     $comp = '';
        // }

        //$plaqueta = $monitor1_plaq;
        //  $tipo_equip = $_POST['tipo_equip'];

        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`, `tipo`, `portas`,`rede`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`ctrl_ti`,`ref`) VALUES
        ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$tipo','$portas','$rede','$id_loc','$id_sec','$obs','$hoje','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tb_equip = 1 tb_diversos = 2 tb_monitores=3 

        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");

        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        $add_ti = add_TI($conn, "2", "PATCH PANEL", "P" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("I_PP", $ctrl_ti, $ret_usuario);


        echo "<script>alert('PATCH PANEL SALVO.');  </script>";
        echo "<center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Patch Panel <br> <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Tipo " . $tipo . "     <br>";
        echo "Portas :  " . $portas . " <br> Rede  :" . $rede . " <br><br>";
        echo "Obs : " . $obs . " <br> <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";


        ?>
                                <center>
								  <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  
								
                                   <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />
                                </center>
                                <?php


    }
        break;
    case '12': {
        // opcao de salvar notebook 
        // echo "Salvar kits pc ";
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $descricao = $_POST['descricao'];
        $marca = STRTOUPPER($_POST['marca']);
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $proc = $_POST['proc'];
        $mem = STRTOUPPER($_POST['mem_tipo']);
        $mem_qtd = $_POST['mem_qtd'];
        $so = $_POST['so_tipo'];
        // $slots = $_POST['slots'];
        //$slots_uso = $_POST['slots_uso'];
        $arm = $_POST['arm_tipo'];
        $arm_qtd = $_POST['arm_tam'];
        $tipo = "NOTEBOOK";
        //	$arm_sec = $_POST['arm_sec'];
        // $arm_sec_tam = $_POST['arm_sec_tam'];


        $tela = $_POST['tela'];
        $res = $_POST['res'];


        $rede_wifi = '';
        $rede_rj = '';

        if (isset($_POST['wifi'])) {
            $rede_wifi = 'wifi ';
        }
        if (isset($_POST['rj45'])) {
            $rede_rj = 'rj45 ';
        }


        $rede = $rede_wifi . '  /  ' . $rede_rj;
        $fonte = $_POST['fonte_w'] . " W   -  " . $_POST['fonte_a'] . "a";
        $fonte_plug = $_POST['plug'];


        $monitor = "UNICO";
        $comp_V = '';
        $comp_H = '';
        $comp_D = '';
        $comp_P = '';


        if (isset($_POST['vga'])) {
            $comp_V = 'VGA ';
        }
        if (isset($_POST['hdmi'])) {
            $comp_H = 'HDMI ';
        }
        if (isset($_POST['dvi'])) {
            $comp_D = 'DVI ';
        }
        if (isset($_POST['display'])) {
            $comp_P = 'Display Port ';
        }
        $componentes = $comp_V . "/ " . $comp_H . "/ " . $comp_D . "/ " . $comp_P;

        //$sqlinsert = "INSERT INTO  tb_kits (`tipo`,`descritivo`,`modelo`,`placa`,`marca`,`processador`,`mem_tipo`,`mem_tam`,`so`,`arm_tipo`,`arm_qtd`,`vid_saidas`,`tela`,`tela_res`,`rede`,`fonte`,`fonte_plug`,`monitor`)VALUES
        //('$tipo','$descricao','$modelo','$placa','$marca','$proc','$mem','$mem_qtd','$so','$arm','$arm_qtd','$componentes','$tela','$res','$rede','$fonte','$fonte_plug','$monitor')";

        $sqlinsert = " INSERT INTO `tb_kits`(`tipo`, `descritivo`, `modelo`, `placa`, `marca`,`processador`, `mem_tipo`, `mem_tam`, `so`, `arm_tipo`, `arm_qtd`, `vid_saidas`, `monitor`, `tela`, `rede`, `tela_res`, `fonte`, `fonte_plug`,`dt_cad`)
          VALUES ('$tipo','$descricao','$modelo','$placa','$marca','$proc','$mem','$mem_qtd','$so','$arm','$arm_qtd','$componentes','$monitor','$tela','$rede','$res','$fonte','$fonte_plug','$hoje' )";
        $resultadoDaInsercao = mysqli_query($conn, $sqlinsert);
        add_acao("IKN", $ctrl_ti, $ret_usuario);

        if ($resultadoDaInsercao == '1') {
            //    echo "Tudo ok";
            echo "<script>alert('DADOS DO KIT NOTEBOOK  REGISTRADOS');</script>";
            echo "<h1><center><br><br>";
            echo " <strong> Dados Recebidos <br><br>";
            echo " Cadastro de KIT Notebook <br> <br>";
            echo "Descricao  " . $descricao . " <br>";

            echo "Tela   " . $tela . " Resolucao  " . $res . "  <br>";
            echo "Video    " . $componentes . " <br>";
            echo "Rede  " . $rede . " <br>";
            echo "Fonte   " . $fonte . "  Tipo de Conector    " . $fonte_plug . " <br>";
            echo "Descricao  " . $descricao . " <br>";

            echo "Patrimonio NAO INFORMADO <br>";
            echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
            echo "Secretaria  NENHUM ESPECIFICADO  <br>";
            echo "</strong> </center></h1>";
            echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
            add_acao("I_kits", "Note", $ret_usuario);

        } else
            echo "<center> Nao foi Realizado o Cadastro ! < " . $resultadoDaInsercao . " >  </center>";
       
        //     $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;

        /*  if (($retorno_add == '0') or ($retorno_add == "")) {
              echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
              echo "<script>history.go(-1);</script>";
          } else {
        */



        ?>
                 <center>
                                   
                                    <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />  
                               <br><br>
                                     <a href="newsfeed.php" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                 </center>
            
            <?PHP



    }

        break;
    case '13': {  // VINCULA MONITOR AO PC 
        // opcao de salvar monitor em novo pc   pelo CTI do novo pc ..
        // echo "Salvar kits pc ";
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $mon_id = $_POST['id_monitor'];
        $local_id = $_POST['loc_id'];
        $sec_ant = cod_sec($conn, $local_id);  // busca o codigo sec_cod  
        $plaqueta = $_POST['plaqueta'];
        $ctrl_ti = $_POST['ctrl_ti']; // cti do monitor 
        //$obs= $_POST['mon1_obs'];
        $mon_saida = $_POST['mon_saida'];
        $pc_novo = $_POST['novo_pc']; // cti do pc novo
        $condicao = ret_ctrl_ti($conn, $pc_novo);   

        if ($condicao == "0") {
            echo "  <br> <br> <strong>  <center> Equipamento nao encontrado em Controle T.I !  </center> </strong>  ";
            echo "  <br> <br> <strong>  <center> Realize uma consulta para averiguar a existencia do CTI : " . $pc_novo . "  </center> </strong> <br /><br />  ";
            echo "<center><a href='busca_diversos.php' title='Consulta de Dispositivos'>Consultar Equipamento  </a>  </center> <br /><br />";
        } else
        {// existe cti
           $cod_cti_pc_novo = substr(ret_caminho_ctrl_ti($conn, $pc_novo),0, 1);  // codigo da tabeça id_equip  do pc novo buscado no controle_ti    
          //  echo $cod_cti_pc_novo;
           if($cod_cti_pc_novo=="C")  // condicao tabela 1
           {
                    $cti_pc_novo = substr(ret_caminho_ctrl_ti($conn, $pc_novo), 1);  // id_equip  do pc novo buscado no controle_ti
                    $novo_local = mostra_local($conn, $cti_pc_novo);  // busca o codigo local_cod em tb-equip 
                    $novo_sec = cod_sec($conn, $novo_local);  // busca o codigo sec_cod 
                    $pc_antigo = $_POST['pc_antigo']; // id_equip do pc antigo
                    $cti_pc_ant = ret_cti_tbequip($conn, $pc_antigo);  // cti do pc antigo
                
                     //   echo " <br> <br> <center>   <br> ";
                      //  echo " CTI ( Pc_antigo )" . $cti_pc_ant . " id da tabela  - " . $pc_antigo . "<br>";
                       // echo " CTI ( PC - Novo )." . $pc_novo . " id da tabela  - " . $cti_pc_novo . " </center> <br>";

                if ($pc_novo == $cti_pc_ant)
                  {
                    echo " <br> <br> <center>  Procedimento nao realizado,  Equipamentos iguais  <br> ";
                    echo " CTI ( Pc_antigo )" . $cti_pc_ant . " id da tabela  - " . $pc_antigo . "<br>";
                    echo " CTI ( PC - Novo )." . $pc_novo . " id da tabela  - " . $cti_pc_novo . " </center> <br>";
                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                  }
                else // realiza rotina de execucao 
                { 
                        // echo  " update `tb_monitores` set `id_equip` = '".$cti_pc_novo."'   where  tabela monitor  `id`='".$mon_id."'";
                      $sqlinsert = " update `tb_monitores` set `id_equip` = '" . $cti_pc_novo . "', `local_id` = '" . $novo_local . "', `sec_id` = '" . $novo_sec . "'   where `id`='" . $mon_id . "'";
                        //    $resultadoDaInsercao = "1";
                      $resultadoDaInsercao = mysqli_query($conn, $sqlinsert);
                    if ($resultadoDaInsercao == '1')
                    {
                        add_acao("ALT_Vin_MO", $ctrl_ti, $ret_usuario);
                        // modifica o antigo

                        $des_vincula_cti_mon = DESvinculaMON_cti_mon2tbequip($conn, $cti_pc_ant, $mon_id, $ret_usuario);

                        // modifica o novo  // conexao , cti_emEquip , CTIdoMonitor, usuario
                        //    $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $cti_pc_ant, $ctrl_ti, $ret_usuario);
                        $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $pc_novo, $ctrl_ti, $mon_saida,$ret_usuario);

                        //    echo "Tudo ok";
                        // registra historico
                        if ($cti_pc_ant <> $pc_novo) {
                            $campo = "id_equip";
                            $dados = $cti_pc_ant . " (" . $pc_antigo . ") --> " . $pc_novo . " (" . $cti_pc_novo . ") ";
                            $outros = " ";
                            //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                            $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                        }
                        if ($local_id <> $novo_local) {
                            $campo = "Local";
                            $dados = $local_id . " --> " . $novo_local;
                            $outros = " ";
                            //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                            $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                        }
                        if ($sec_ant <> $novo_sec) {
                            $campo = "SEC";
                            $dados = $sec_ant . " --> " . $novo_local;
                            $outros = " ";
                            //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                            $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                        }


                        echo "<script>alert('DADOS DO MONITOR  ALTERADO');</script>";
                        echo "<center><br><br>";
                        echo " <strong> Dados Recebidos Alteracao  de Computador  <br><br>";
                        echo "Monitor  CTI :  " . $ctrl_ti . "     <br>";
                        echo "Patrimonio " . $plaqueta . " <br> <br>";

                        echo "Vinculo Equip. Antigo   CTI :  " . $cti_pc_ant . "     <br>";
                        //  echo "Vinculo Equip. antigo  id_equip :  ".$pc_antigo." <br> <br>";
                        echo "Vinculo Equip. Novo    CTI :  " . $pc_novo . "     <br>";
                        //    echo "Vinculo Equip. Novo    id_equip :  " . $cti_pc_novo . "  <br>   <br>";


                        echo "Local : " . nomedolocal($conn, $local_id) . " <br><br>";

                        echo "</strong> </center></h1>";
                        echo "<center><i>Alterado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";


                    } else // fim do resultado = a 1
                        echo "<center> Nao foi Realizado a Alteracao ! < " . $resultadoDaInsercao . " >  </center>";
                    } // fim do realiza rotina execuacao
           }// fim da cond tabela 1
           else // negativa de cti ser tabela 1 ( Desktop ou notebook)
                { 
                    echo "<br> <br> <strong><center> O numero de Controle Informado nao corresponde  a um Computador  !  CTI : ".$pc_novo ."  <  " . $cod_cti_pc_novo . " >  </strong> </center>";
                    echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                $posicao = " Tentativa de vinculacao de Monitor  recusado !  motivo : Controle Informado nao corresponde  a um Computador  !  CTI : " . $pc_novo . "   " . $cod_cti_pc_novo . "  - " . $hoje . " Tecnico " . $ret_usuario;
                arquivo_grava("descritivos.txt", $posicao);     
           }   
        }// fim do existe cti
           ?>
                 <center>
                                   
                                    <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="busca_diversos.php" title="listagem ">Consultar  Equipamentos  </a>  <br /><br />  
                               <br><br>
                                     <a href="newsfeed.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 
                 </center>
            
            <?PHP
         }// fim do case
        break;
    case '14': {
     //   echo "kits de monitores ";
        $mon_tam = $_POST['mon_tam'];
        $tipo_disp = $_POST['tipo'];
        $mon_tela = $_POST['mon_cat'];
        $mon_marca = $_POST['mon_mar'];
        $mon_obs = $_POST['mon_obs'];
       $mon_mod = $_POST['mon_mod'];
        $descritivo = $mon_marca . "  ". $mon_mod ."  ". $mon_tam . "  Pol. ".$mon_tela;
        //   $hoje =

        if(($mon_marca=="")||($mon_tam=="")||($mon_tela==""))
        {
            echo " <br> <br> <center>  Procedimento nao realizado,  Campos vazios detectados </center>";
            echo " <br> <center>      <a href='caddiversos.php?loc=Liberado&tipo=7' title='SELECIONAR '>Voltar  </a>  <br /><br />  </center> ";            
        }
        else
        {
        $sqlinsert = "INSERT INTO  tb_kits (`descritivo`, `tipo`, `marca`, `modelo`, `tela`, `mem_tam`,`dt_cad`)VALUES('".$descritivo. "','".$tipo_disp. "','".$mon_marca. "','".$mon_mod. "','".$mon_tela. "','".$mon_tam. "','".$hoje. "')";
            add_acao("IKMO", "0kit-Mo", $ret_usuario);

        $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;
            if (($retorno_add == '0') or ($retorno_add == "")) {
                echo "<script>alert('DADOS DO Monitor nao foram REGISTRADOS em Kits ');</script>";
                echo "<script>history.go(-1);</script>";
            } else {
                echo "<script>alert('DADOS DO KIT  REGISTRADOS');</script>";
                echo "<h1><center><br><br>";
                echo " <strong> Dados Recebidos <br><br>";
                echo " KIT Monitor <br> <br>";
                echo "Descricao  " . $descritivo. " <br>";
                echo "Patrimonio NAO INFORMADO <br>";
                echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
                echo "Secretaria  NENHUM ESPECIFICADO  <br>";
                echo "</strong> </center></h1>";
                echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
                add_acao("I_kitsM", "Mon", $ret_usuario);



                ?>
                 <center>
                                   <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />  
                                </center>
            
            <?PHP

            }
        }
        break;
    }
    case '15':
      {  // DESVINCULA MONITOR AO PC 
        // opcao de salvar monitor em novo pc   pelo CTI do novo pc ..
        // echo "Salvar kits pc ";
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $mon_id = $_POST['id_monitor'];
        $local_id = $_POST['loc_id'];
        $sec_ant = cod_sec($conn, $local_id);  // busca o codigo sec_cod  
        $plaqueta = $_POST['plaqueta'];
        $ctrl_ti = $_POST['ctrl_ti']; // cti do monitor 
        //$obs= $_POST['mon1_obs'];
        $cti_pc_inf = $_POST['novo_pc']; // cti do pc A SER RETIRADO O VINCULO
        $condicao = ret_ctrl_ti($conn, $cti_pc_inf); // verifica a existencia de um CTI em controle
        $id_equip_pc_inf = substr(ret_caminho_ctrl_ti($conn, $cti_pc_inf), 1);  // id_equip  do pc buscado no controle_ti
                //  $novo_local_pci = mostra_local($conn, $cti_pc_novo);  // busca o codigo local_cod em tb-equip 
                // $novo_sec_pci = cod_sec($conn, $novo_local);  // busca o codigo sec_cod 
        $id_equip_pc_ant = $_POST['id_equip_pc_ant']; // id_equip do pc antigo
        $cti_pc_ant = ret_cti_tbequip($conn, $id_equip_pc_ant);  // cti do pc antigo
                //$cti_pc_ant = substr(ret_caminho_ctrl_ti($conn, $pc_antigo), 1);  // cti do pc antigo 

        if ($condicao == "0") {
            echo "  <br> <br> <strong>  <center> Equipamento nao encontrado em Controle T.I !  </center> </strong>  ";
            echo "  <br> <br> <strong>  <center> Realize uma consulta para averiguar a existencia do CTI : " . $cti_pc_inf . "  </center> </strong> <br /><br />  ";
            echo "<center><a href='busca_diversos.php' title='Consulta de Dispositivos'>Consultar Equipamento  </a>  </center> <br /><br />";
        } else
          {// existencia de ctrl_ti na base
              //( id_equip do cti informado == id equip da tabela monitores )
            if($id_equip_pc_inf== $id_equip_pc_ant)
            { // equidade de id_equip
            
                if ($cti_pc_inf <> $cti_pc_ant) {
                   echo " <br> <br> <center>  Procedimento nao realizado,  Equipamentos diferentes  <br> ";
                   echo " CTI ( Pc_antigo )" . $cti_pc_ant . " id da tabela  - " . $id_equip_pc_ant . "<br>";
                   echo " CTI ( PC - Novo )." . $cti_pc_inf . " id da tabela  - " . $id_equip_pc_inf . " </center> <br>";
                   echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
                } 
                else
                {
                        // echo  " update `tb_monitores` set `id_equip` = '".$cti_pc_novo."'   where  tabela monitor  `id`='".$mon_id."'";
                        $sqlinsert = " update `tb_monitores` set `id_equip` = '0', `local_id` = '0', `sec_id` = '0'   where `id`='" . $mon_id . "'";
                        //    $resultadoDaInsercao = "1";

                    //    $resultadoDaInsercao = '1';
                        $resultadoDaInsercao = mysqli_query($conn, $sqlinsert);


                        if ($resultadoDaInsercao == '1') 
                          {
                        add_acao("ALT_DesV_MO", $ctrl_ti, $ret_usuario);
                            // modifica o antigo
                            $des_vincula_cti_mon = DESvinculaMON_cti_mon2tbequip($conn, $cti_pc_ant, $mon_id, $ret_usuario);
                                                // modifica o novo  // conexao , cti_emEquip , CTIdoMonitor, usuario
                                 //    $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $cti_pc_ant, $ctrl_ti, $ret_usuario);
                                    //  $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $pc_novo, $ctrl_ti, $ret_usuario);
                                           //    echo "Tudo ok";
                                // registra historico
                            if ($cti_pc_ant == $cti_pc_inf) 
                            {
                                $campo = "id_equip";
                                $dados = $cti_pc_ant . " (" . $cti_pc_ant . ") --> " .  "0";
                                $outros = " ";
                                //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                                $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                            }
                    
                                 $campo = "Local";
                                $dados = $local_id . " --> " . "0";
                                $outros = " ";
                                //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                                $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                    
                    
                                $campo = "SEC";
                                $dados = $sec_ant . " --> " . "0";
                                $outros = " ";
                                //function registra_alt($Fconexao, $Fctrl_ti, $Fid, $Ftabela, $Fcampo, $Fd_b, $Foutros, $Fusuario)
                                $retorno = registra_alt($conn, $ctrl_ti, $mon_id, "3", $campo, $dados, $outros, $ret_usuario);
                    


                                    echo "<script>alert('DADOS DO MONITOR  ALTERADO');</script>";
                                    echo "<center><br><br>";
                                    echo " <strong> Dados Recebidos Desvinculacao de Monitor <br><br>";
                                    echo "Monitor  CTI :  " . $ctrl_ti . "     <br>";
                                    echo "Patrimonio " . $plaqueta . " <br> <br>";

                                    echo "Vinculo Equip. Antigo   CTI :  " . $cti_pc_ant . "     <br>";
                                    //  echo "Vinculo Equip. antigo  id_equip :  ".$pc_antigo." <br> <br>";
                                    echo "DESVINCULADO de  CTI :  " . $cti_pc_inf . "     <br>";
                                    //    echo "Vinculo Equip. Novo    id_equip :  " . $cti_pc_novo . "  <br>   <br>";


                                    echo "Nao pertence mais ao  Local : " . nomedolocal($conn, $local_id) . " <br><br>";

                                    echo "</strong> </center></h1>";
                                    echo "<center><i>Alterado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";


                         }
                         else
                          echo "<center> Nao foi Realizado a Alateracao ! < " . $resultadoDaInsercao . " >  </center>";
                }
             }//  fim de equidade de id_equip
            else
                {
                echo " <br> <br> <h1> <P align='center'> " ;
		        echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#EC3765' >   ";
                echo "CTI digitado " . $cti_pc_inf . " nao esta vinculado ao Monitor " . $ctrl_ti . "  cod. erro . < " . $id_equip_pc_inf . " - ".$id_equip_pc_ant." > </center> </p> </h1> ";
                echo "<center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'></center> ";
                }

        } //fim  existencia de ctrl_ti na base

        ?>
                 <center>
                                   
                                    <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />  
                               <br><br>
                                     <a href="newsfeed.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 
                 </center>
            
            <?PHP
      
      
      }// fim do case
     break;
    case '16': { // cadastro de Acess Point
        //tvs
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        //$portas = $_POST['portas'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        $resp = STRTOUPPER($_POST['resp']);
        $ref = $hoje;
        $obs = $_POST['obs'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "Acess Point";
        $descricao_cod = "6";  // 1 Patch  - 2 Rack - 3 Switch - 4 Tv - 5 Impressora  - 6 Acess Point
        $ctrl_ti = $_POST['ctrl_ti'];


        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`resp`,`ctrl_ti`,`ref`) VALUES ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$id_loc','$id_sec','$obs','$hoje','$resp','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        //$ctrl_ti = $_POST['ctrl_ti'];
        $add_ti = add_TI($conn, "2", "AP", "A" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("IAP", $ctrl_ti, $ret_usuario);

        // fim da rotina



        echo "<script>alert('Acess Point SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Acess Point  <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Controle T.I. " . $ctrl_ti . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Responsavel " . $resp . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
                                     <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  <br /><br /> 
								    <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="newsfeed.php" title="listagem ">Inicio </a>  <br /><br />
                                </center>
                                <?php



    }
        break;
    case '17': { // cadastro de Nobreak
        //tvs
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        //$portas = $_POST['portas'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        $resp = "  ";//STRTOUPPER($_POST['resp']);
        $comps = "Tensao :  " . $_POST['tensao'] . "  Tomadas : " . $_POST['tomadas'] . "  Potencia : " . $_POST['pot'];
        $ref = $hoje;
        $obs = $_POST['obs'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "Nobreak";
        $descricao_cod = "7";  // 1 Patch  - 2 Rack - 3 Switch - 4 Tv - 5 Impressora  - 6 Acess Point - 7 Nobreak - 8 Modulo
        $ctrl_ti = $_POST['ctrl_ti'];


        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`comps`,`resp`,`ctrl_ti`,`ref`) VALUES ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$id_loc','$id_sec','$obs','$hoje','$comps','$resp','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        //$ctrl_ti = $_POST['ctrl_ti'];
        $add_ti = add_TI($conn, "2", "NOBREAK", "N" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("INOB", $ctrl_ti, $ret_usuario);

        // fim da rotina



        echo "<script>alert('Nobreak  SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Nobreak  <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Controle T.I. " . $ctrl_ti . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Responsavel " . $resp . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
                                     <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  <br /><br /> 
								    <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="newsfeed.php" title="listagem ">Inicio </a>  <br /><br />
                                </center>
                                <?php



    }
        break;
    case '18': { // cadastro de Modulo Bateria
        //tvs
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        //$portas = $_POST['portas'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        $comps = "Capacidade :  ".$_POST['tam']."  Tensao : " . $_POST['cap'];
        $tipo =  $_POST['tipo'];
        $ref = $hoje;
        $obs = $_POST['obs'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "Modulo";
        $descricao_cod = "8";  // 1 Patch  - 2 Rack - 3 Switch - 4 Tv - 5 Impressora  - 6 Acess Point - 7 Nobreak  - 8 Modulo
        $ctrl_ti = $_POST['ctrl_ti'];


        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`comps`,`posicao`,`ctrl_ti`,`ref`) VALUES ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$id_loc','$id_sec','$obs','$hoje','$comps','$tipo','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        //$ctrl_ti = $_POST['ctrl_ti'];
        $add_ti = add_TI($conn, "2", "MODULO", "M" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("IMOD_B", $ctrl_ti, $ret_usuario);

        // fim da rotina



        echo "<script>alert('Modulo SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Modulo  <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Controle T.I. " . $ctrl_ti . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
                                     <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  <br /><br /> 
								    <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="newsfeed.php" title="listagem ">Inicio </a>  <br /><br />
                                </center>
                                <?php



    }
        break;
    case '19': { // cadastro de Controlador wi fi
        //tvs
        $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $status = "1";
        $id_sec = $_POST['sec_id'];
        $id_loc = $_POST['loc_id'];
        //$portas = $_POST['portas'];
        $patrimonio = $_POST['patrimonio'];
        $marca = STRTOUPPER($_POST['marca']);
        //$comps = "Capacidade :  " . $_POST['tam'] . "  Tensao : " . $_POST['cap'];
        $tipo = $_POST['tipo_id'];
        $ref = $hoje;
        $obs = $_POST['obs'];
        //$ret_equip_id = $_POST['id_pc'];
        //"PATCH PANEL cod 1 , RACK COD 2 , SWITCH COD 3 , TV  COD 4
        $descricao = "Controlador WIFI";
        $descricao_cod = "9";  // 1 Patch  - 2 Rack - 3 Switch - 4 Tv - 5 Impressora  - 6 Acess Point - 7 Nobreak  - 8 Modulo - 9 Controlador WIFI";
        $ctrl_ti = $_POST['ctrl_ti'];


        $sqlmon = "INSERT INTO  `tb_diversos` (`usuario`,`status`,`patrimonio`,`descricao`,`descricao_cod`,`marca`,`local_cod`,`sec_cod`,`obs`,`dt_cad`,`posicao`,`ctrl_ti`,`ref`) VALUES ('$ret_usuario','$status','$patrimonio','$descricao','$descricao_cod','$marca','$id_loc','$id_sec','$obs','$hoje','$tipo','$ctrl_ti','$ref')";
        $ret_add_mon = mysqli_query($conn, $sqlmon) or die("Nao foi possivel inserir o EQUIPAMENTO na base"); //Ou vai..., ou racha.;
        // rotina para insercao em tb_controle_ti  tbeuqip = 1 tb_diversos = 2 tb_monitores=3 
        //function add_TI($Fconexao, $Ftab,$Fdescricao,$Fcaminho, $Fid_equip, $Fctrl_ti ) 
        // recupera o id cadastrado na base
        $ref_id = busca_id($conn, $ref, "tb_diversos");
        //$ctrl_ti = $_POST['ctrl_ti'];
        $add_ti = add_TI($conn, "2", "CONTROLADOR", "W" . $ref_id, $ref_id, $ctrl_ti, $hoje, $ret_usuario);
        add_acao("ICONT_W", $ctrl_ti, $ret_usuario);

        // fim da rotina



        echo "<script>alert('Controlador WI-FI  SALVO.');  </script>";
        echo "<h1><center><br><br>";
        echo " <strong> Dados Recebidos <br><br>";
        echo " Controlador WI-FI  <br>";
        echo "Equipamento marca " . $marca . " <br>";
        echo "Controle T.I. " . $ctrl_ti . " <br>";
        echo "Patrimonio " . $patrimonio . " <br>";
        echo "Local : " . nomedolocal($conn, $id_loc) . " <br><br>";
        echo "Secretaria : " . nomedesecretaria($conn, $id_sec) . " <br>";
        echo "</strong> </center></h1>";
        echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . " referencia : " . busca_id($conn, $ref, "tb_diversos") . "  </i></center>";
        ?>
                                <center>
                                     <br><br>
                                    <a href="qrimpressao_div.php?var=<?php echo $ctrl_ti; ?>" title="SELECIONAR ">Gerar QR_Code do Equipamento </a>  <br /><br /> 
								    <br><br>
                                    <a href="precadequip.php?id=<?php echo $id_loc; ?>" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                    <br><br>
                                    <a href="newsfeed.php" title="listagem ">Inicio </a>  <br /><br />
                                </center>
                                <?php



    }
        break;
    case '20':
        {
     $hoje = date("Y/m/d H:i:s ");
        //$descricao = STRTOUPPER($_POST['plaqueta']);
        $descricao = $_POST['descricao'];
        $marca = STRTOUPPER($_POST['marca']);
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $proc = $_POST['proc'];
        $mem = STRTOUPPER($_POST['mem_tipo']);
        $mem_qtd = $_POST['mem_qtd'];
        $so = $_POST['so_tipo'];
        // $slots = $_POST['slots'];
        //$slots_uso = $_POST['slots_uso'];
        $arm = $_POST['arm_tipo'];
        $arm_qtd = $_POST['arm_tam'];
        $tipo = "CHROMEBOOK";
        //	$arm_sec = $_POST['arm_sec'];
        // $arm_sec_tam = $_POST['arm_sec_tam'];


        $tela = $_POST['tela'];
        $res = $_POST['res'];


        $rede_wifi = '';
        $rede_rj = '';

        if (isset($_POST['wifi'])) {
            $rede_wifi = 'wifi ';
        }
        if (isset($_POST['rj45'])) {
            $rede_rj = 'rj45 ';
        }


        $rede = $rede_wifi . '  /  ' . $rede_rj;
        $fonte = $_POST['fonte_w'] . " W   -  " . $_POST['fonte_a'] . "a";
        $fonte_plug = $_POST['plug'];


        $monitor = "UNICO";
        $comp_V = '';
        $comp_H = '';
        $comp_D = '';
        $comp_P = '';


        if (isset($_POST['vga'])) {
            $comp_V = 'VGA ';
        }
        if (isset($_POST['hdmi'])) {
            $comp_H = 'HDMI ';
        }
        if (isset($_POST['dvi'])) {
            $comp_D = 'DVI ';
        }
        if (isset($_POST['display'])) {
            $comp_P = 'Display Port ';
        }
        $componentes = $comp_V . "  " . $comp_H . "  " . $comp_D . "  " . $comp_P;

        //$sqlinsert = "INSERT INTO  tb_kits (`tipo`,`descritivo`,`modelo`,`placa`,`marca`,`processador`,`mem_tipo`,`mem_tam`,`so`,`arm_tipo`,`arm_qtd`,`vid_saidas`,`tela`,`tela_res`,`rede`,`fonte`,`fonte_plug`,`monitor`)VALUES
        //('$tipo','$descricao','$modelo','$placa','$marca','$proc','$mem','$mem_qtd','$so','$arm','$arm_qtd','$componentes','$tela','$res','$rede','$fonte','$fonte_plug','$monitor')";

        $sqlinsert = " INSERT INTO `tb_kits`(`tipo`, `descritivo`, `modelo`, `placa`, `marca`,`processador`, `mem_tipo`, `mem_tam`, `so`, `arm_tipo`, `arm_qtd`, `vid_saidas`, `monitor`, `tela`, `rede`, `tela_res`, `fonte`, `fonte_plug`,`dt_cad`)
          VALUES ('$tipo','$descricao','$modelo','$placa','$marca','$proc','$mem','$mem_qtd','$so','$arm','$arm_qtd','$componentes','$monitor','$tela','$rede','$res','$fonte','$fonte_plug','$hoje' )";
        $resultadoDaInsercao = mysqli_query($conn, $sqlinsert);
         //  add_acao("IKN", $ctrl_ti, $ret_usuario);

        if ($resultadoDaInsercao == '1') {
            //    echo "Tudo ok";
            echo "<script>alert('DADOS DO KIT CHROMEBOOK  REGISTRADOS');</script>";
            echo "<h1><center><br><br>";
            echo " <strong> Dados Recebidos <br><br>";
            echo " Cadastro de KIT CHROMEBOOK <br> <br>";
            echo "Descricao  " . $descricao . " <br>";

            echo "Tela   " . $tela . " Resolucao  " . $res . "  <br>";
            echo "Video    " . $componentes . " <br>";
            echo "Rede  " . $rede . " <br>";
            echo "Fonte   " . $fonte . "  Tipo de Conector    " . $fonte_plug . " <br>";
            echo "Descricao  " . $descricao . " <br>";

            echo "Patrimonio NAO INFORMADO <br>";
            echo "Local : NENHUM DEPARTAMENTO ESPECIFICADO  <br><br>";
            echo "Secretaria  NENHUM ESPECIFICADO  <br>";
            echo "</strong> </center></h1>";
            echo "<center><i>Cadastrado em " . $hoje . " por usuario : " . $ret_usuario . "  </i></center>";
            add_acao("I_kits", "Note", $ret_usuario);

        } else
            echo "<center> Nao foi Realizado o Cadastro ! < " . $resultadoDaInsercao . " >  </center>";
       
        //     $retorno_add = mysqli_query($conn, $sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.;

        /*  if (($retorno_add == '0') or ($retorno_add == "")) {
              echo "<script>alert('DADOS DO EQUIPAMENTO NAO FORAM  REGISTRADOS');</script>";
              echo "<script>history.go(-1);</script>";
          } else {
        */



        ?>
                 <center>
                                   
                                    <br><br>
                                    <a href="caddiversos.php?loc=Liberado&tipo=7" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                                    <br><br>
                                    <a href="precadequip.php?id=0" title="SELECIONAR ">Novo Equipamento de  Outro  Local </a>  <br /><br />
                                  <br><br>
                                    <a href="listaequip.php" title="listagem ">Listar Equipamentos Cadastrados </a>  <br /><br />  
                               <br><br>
                                     <a href="newsfeed.php" title="SELECIONAR ">Novo Equipamento do Mesmo Local </a>  <br /><br /> 
                 </center>
            
            <?PHP



    }
  

//}
break;
}
