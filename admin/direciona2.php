<?php
// inclui o arquiv o de configuração do sistema
//include "Config/config_sistema.php";
//include "../validar_session.php";
//include "../Config/config_sistema.php";
include "bco_fun.php";

// revebe dados do formulario

$tipo = $_POST['tipo'];
$local = $_POST['nome'];
$local_id = $_POST['id_loc'];
$sec_id = $_POST['id_sec'];
$plaqueta = $_POST['plaqueta'];

//echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
if (($local == "Nenhum local especificado") or ($local == "") or ($local == "0")) {
    //  echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
    header("Location: precadequip.php?id=0");

} else {


    // verifica e direciona para o formulario correto

    switch ($tipo) {
        case '0': {
            header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
        }
            break;
        case '1': {
            //   echo "tipo ".$tipo." Local ".$local." Local ID ".$local_id;
            header("Location: cadequip2.php?id=" . $local_id . "");
        }
            break;
        case '2': {
            //  echo "2";
            //echo "tipo de Dispositivo TV   codigo :  " . $tipo . " Local " . $local . " Local ID " . $local_id;

         //   include "../validar_session.php";
         //   include "../Config/config_sistema.php";

            $ret_cmei_id = $local_id;// $_GET['id'];

            $sql1 = "SELECT * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
            $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
            $qtd = mysqli_num_rows($resultado1);  // $option = '';
            if ($qtd == 0)
                $nome_local = "Nenhum local encontrado";
            else {
                do {
                    $row = mysqli_fetch_assoc($resultado1);
                    $nome_local = $row['tbcmei_nome'];
                    $ret_sec_id = $row['tbcmei_sec_id'];
                    $unidade = $nome_local;
                    "<input  type='hidden'  id='nome_loc'  name='nome_loc' type='text' value='" . $nome_local . "' size = '60' >";
                    "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
                    "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
                } while ($row = mysqli_fetch_assoc($resultado1));
            }
            ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Equipamentos</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                            </script>
                                            </head>
                                        <!-- BEGIN BODY -->

                                        <body>
                                            <!-- aqui começa o menu -->
                                            <!-- START TOPBAR -->
         
                                            <?php
                                            include "index.php"
                                                ?> 
                                                 <!-- aqui termina o menu -->
                                                <!-- MAIN MENU - END -->
                                                <!--  SIDEBAR - END -->
                                                <!-- START CONTENT -->
        
                                                <section id="main-content" class=" ">
                                                        <section class="wrapper main-wrapper" style=''>
                                                            <div class="clearfix"></div>
                                                            <h2 class="title pull-left"> <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a> </h2></h2>

                                                            <div class="col-lg-12">
                                                                <section class="box ">
                                                                    <header class="panel_header">
                                                                        <h2 class="title pull-left">Sistema de Gestão T.I
                                                                        </h2>
                               
                                                                         </h1>
                                
                                
                                                                    </header>
                            
                                                                  <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                             <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                
                                                                                </div>
                                                                             </div>
                            
                                
                                                                        <form method="post" action="cadequip2a.php">
                                                                            <input type="hidden" name="loc_id" size=50 value= "<?php echo $local_id ?>">
                                                                            <input type="hidden" name="sec_id" size=50 value= "<?php echo $sec_id ?>">

                                                                            <section class="box ">
                                                                         <header class="panel_header">
                                                                        <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                              </div>
                                                                      <div>  
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                                        <?php
                                                                                        $sql_proc = "SELECT * FROM tb_kits order by descritivo";
                                                                                        $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                        $option2 = '';
                                                                                        while ($row = mysqli_fetch_array($res_proc)) {
                                                                                            $option2 .= "<option value = '" . $row['id'] . "'>" . mb_strimwidth($row['descritivo'], 0, 88, "...") . "   </option>";
                                                                                            $ret_kit_id = $row['id'];
                                                                                        }
                                                                                        ?>
                                                                      <br /><br />              
                                                                      <select name="kit" required  >          
                                                                                      <?php
                                                                                      //   echo "<option value='0'>  </option>";
                                                                                      echo $option2;
                                                                                      ?>        
                                                                                     </select>         </label>                         
                                                                                    <a href="" title="Adicionar novo Processador ">+</a><br /><br />
                                                                                    
                                                                                    
                                                                   <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                                                  </div>


                          
                          
                          
                          
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section></div>
                                                        </section>
                                                    </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP
        }
            break;
        case '3': {
            //echo "3";
            //echo "tipo de Dispositivo  Multiplos PCs no mesmo Local :  " . $tipo . " Local " . $local . " Local ID " . $local_id;
            header("Location: cadequip2.php?id=" . $local_id . "");
        }
            break;
        case '4': {
            //          echo "4";
            //echo "tipo de Dispositivo Impressoras codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '5': {
            //                echo "5";
            echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");
        }
            break;
        case '6': {
            //                echo "5";
            echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");

            break;
        }
        case '7': {
            //                echo "5";
            echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            // header("Location: cadequip2.php?par=outros");

            break;
        }
        case '8': {
            //           insere vinculo de monitor ao equipamento      echo "5"; oriundo de vincula_monitor
              //    echo "tipo de Dispositivo Outros codigo :   " . $tipo . " Local " . $local . " Local ID " . $local_id;
            
            
           $bco_id_equip = $_POST['id_equip'];
           $bco_local_id = $local_id;
           $bco_sec_id = $_POST['id_sec'];
           $plaqueta = $_POST['plaqueta'];
           $mon_ctrl_ti = $_POST['mon_ctrl_ti'];
           $mon_saida = $_POST['mon_saida'];
           $ctrl_ti = $_POST['ctrl_ti'];
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
            $tabela = "3";//



           if (($mon_ctrl_ti=="")||($mon_ctrl_ti=="0"))
           {
                echo "<strong><br> <br> <br> <br>  <center> CTI invalido ou em branco ...  <br> <br> Selecione o Modelo de Monitor correto, com seu respectivo codigo  CTI !   </center> <br><br> </strong> ";
                echo "<center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'></center> ";
           }
           else
           {
                // selecionar dados da tabela monitores
                $sql = "SELECT * FROM  tb_monitores where ctrl_ti = '" . $mon_ctrl_ti . "' ";
                $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                while ($row = mysqli_fetch_array($resultado)) {
                    $ret_id = $row['id'];
                    $id_equipb = $row['id_equip'];
                    $local_idb = $row['local_id'];
                    $sec_idb = $row['sec_id'];
                }

                //   echo   "  <br> Alterando Monitor CTI nº " . $mon_ctrl_ti . "  CTI do Equipamento ( PC)  ". $ctrl_ti . "  Id na tabela :".$bco_id_equip. " Local :".$bco_local_id."   Sec : ".$bco_sec_id ;

                $query_alt = "UPDATE `tb_monitores` SET `id_equip`='" . $bco_id_equip . "',`local_id`='" . $bco_local_id . "',`sec_id`='" . $bco_sec_id . " ' WHERE `tb_monitores`.`ctrl_ti`='" . $mon_ctrl_ti . "' ";
                $result = mysqli_query($conn, $query_alt);
                // $result = 1;
                // $retorno_checkInEng = mysqli_num_rows($result);
                //  $row = mysqli_fetch_assoc($result);
                //    $result ="0" ;
                if ($result == 0) {
                    // echo "Erro de Alteraçao de dados ";
                    echo "<script>alert('DADOS DO MONITOR CTI " . $mon_ctrl_ti . "( " . $bco_id_equip . ") NAO FORAM  ALTERADOS');</script>";
                    //  echo "<script>history.go(-1);</script>";
                } else {
                      $vincula_cti_mon = vinculaMON_cti_mon2tbequip($conn, $ctrl_ti, $mon_ctrl_ti, $mon_saida, $nome_usuario);

                    echo " <h1><br><br> <P align='center'> ";
                    echo "<font Face='Georgia, Times New Roman, Times, serif'  size='3' color='#0000FF' >   ";
                    echo "--------------------------------------------------------------------------------------------------------<br>";
                    echo "<br> <br>  DADOS DO MONITOR CTI " . $mon_ctrl_ti . "( " . $bco_id_equip . ") <br> <br>  Vinculado ao Equipamento CTI : " . $ctrl_ti . " <br>  <br> ";
                    echo "--------------------------------------------------------------------------------------------------------<br>";
                    echo "</font>";
                    echo "</h1> </P>";


                    
                  
                    // registra alteracao
                    if($id_equipb <> $bco_id_equip){
                    $campo = "id_equip";
                    $dados = $id_equipb . " --> " . $bco_id_equip;
                    $retorno = registra_alt($conn, $mon_ctrl_ti, $ret_id, $tabela, $campo, $dados, $outros, $nome_usuario);
                    }

                    if ($local_idb <> $bco_local_id) {
                        $campo = "Local";
                        $dados = $local_idb . " --> " . $bco_local_id;
                        $retorno = registra_alt($conn, $mon_ctrl_ti, $ret_id, $tabela, $campo, $dados, $outros, $nome_usuario);
                    }

                    if ($sec_idb <> $bco_sec_id) {
                        $campo = "Sec";
                        $dados = $sec_idb . " --> " . $bco_sec_id;
                        $retorno = registra_alt($conn, $mon_ctrl_ti, $ret_id, $tabela, $campo, $dados, $outros, $nome_usuario);
                    }
                    ?>
                     <center>   <a href="busca_diversos.php?tipo=2&col=10" title="Consulta de equipamentos">Consultas de Equipamentos </a><br /><br />
                        <a href="newsfeed.php" title="Inicio">Inicio </a><br /><br />
                        </center>
                    <?php
                    //echo "<script>alert('DADOS DO MONITOR CTI " . $mon_ctrl_ti . "( " . $bco_id_equip . ")  Vinculado ao Equipamento CTI : ".$ctrl_ti ." ;</script>";
                }



            }       // header("Location: cadequip2.php?par=outros");

            break;
        }
    }// fim do switch
}
//    header("Location: cadequip2.php?par=computador");



	//header("Location: index.php?par=Erro_qr0");

?>

