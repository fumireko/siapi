<?php
 //  include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_ctrl_ti = $_POST['ctrl_ti']; // parametro de busca em controle_ti
$ret_sec = $_POST['sec_id']; // sec  
$ret_loc = $_POST['loc_id'];// local 
$ret_tabela = $_POST['tabela'];// tabela  
$ret_chave = $_POST['chave'];// id tabela 
$ret_just = $_POST['just'];// id tabela 
$ret_id = $ret_chave;
$nome_usuario = $_SESSION['email_usuario'];
$usuario = $nome_usuario;
$hoje = date("Y/m/d H:i:s");
$status = "0";

if(($ret_just=="")||(strlen($ret_just)==64))
{
    echo " <br><br><br> <center> O Campo de Justificativa encontra-se em branco , alteraçao não realizada no controle T.I nº :" . $ret_ctrl_ti . "  </center> <br><br><br>";
    echo "<center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'></center> ";
}
else
{
    echo " <center> <br><br><br><br> controle T.I nº :" . strlen($ret_just) . "  </center>";
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
                            
                                 <?php
                                 //  echo " tabela  " . $ret_tabela;
                                 switch ($ret_tabela) {
                                     case '0': {
                                         echo "Erro de identificaçao de tabela !";
                                         break;
                                     }
                                     case '1': { // remove em tbequip
                                         //  echo "Controle CTI :" . $ret_ctrl_ti . "  Local id  :" . $ret_loc . "  Sec id :" . $ret_sec . " Tabela  :" . $ret_tabela . "  Id tabela  :" . $ret_chave;
                                         //remove_TI($conn, $tabela, $justificativa, $id, $ctrl_ti, $hoje, $usuario) // remover equip em status = 0 ;
                                         // remocao em tbequip
                             
                                         $retorno_remocao = remove_TI($conn, $ret_tabela, $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // status = 0 em equip ;
                             
                                         if ($retorno_remocao == '0') {
                                             echo " <center> Nenhuma alteraçao realizada em Diversos  no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                         } else { // retorno de alteraçao em equip
                                             // remocao em controle_ti 
                                             $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); //  status = 0 em controle ti ;  
                                             if ($retorno_remocao1 == '0') {
                                                 echo " <center> Alteraçao não realizada no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                             } else {
                                                $monitor_id= ret_id_by_equip_id($conn, $ret_chave);   // busca o indice do monitor de acordo com o id_equip na tabela Monitor
                                              $sqlmuda = " update `tbequip` set `tbequip_monitor_obs` = ' ', `tbequip_vid_uso` = ' ', `tbequip_monitor` = '  ', `tbequi_obs` = 'alterado devido a Exclusao do pc '   where `tbequip_id`='" . $ret_chave . "'";   
                                              $resultadoDaInsercao1 = mysqli_query($conn, $sqlmuda); 
                                                // echo "chave de busca nº : ".$ret_chave."  Retorno do id do Monitor :".$monitor_id;
                                              $sqlinsert = " update `tb_monitores` set `id_equip` = '0', `local_id` = '0', `sec_id` = '0', `obs` = 'alterado devido a Exclusao do pc '   where `id`='" . $monitor_id . "'";   
                                              $resultadoDaInsercao = mysqli_query($conn, $sqlinsert);
                                            if ($resultadoDaInsercao == '1')
                                            {
                                                     add_acao("Rem_PC.Exc", $ret_ctrl_ti, $nome_usuario);
                                                echo "<strong> <center> Equipamento  CTI:  " . $ret_ctrl_ti . " removido com sucesso      <br> ";
                                                 echo "  Usuario :  " . $usuario . "  em " . $hoje . "       <br> ";
                                                 echo "  Motivo  :  " . $ret_just . "       <br> </center> </strong>";

                                            }
                                             }


                                         }// fim de retorno de alteracao em equip
                             
                                         break;

                                     } // fim do case 1
                                     case '2': { // remove em tb_diversos
                                         //  echo "Controle CTI :" . $ret_ctrl_ti . "  Local id  :" . $ret_loc . "  Sec id :" . $ret_sec . " Tabela  :" . $ret_tabela . "  Id tabela  :" . $ret_chave;
                                         //remove_TI($conn, $tabela, $justificativa, $id, $ctrl_ti, $hoje, $usuario) // remover equip em status = 0 ;
                                         // remocao em tbequip
                             
                                         $retorno_remocao = remove_TI($conn, $ret_tabela, $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                             
                                         if ($retorno_remocao == '0') {
                                             echo " <center> Nenhuma alteraçao realizada em Diversos  no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                         } else { // retorno de alteraçao em equip
                                             // remocao em controle_ti 
                                             $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                             if ($retorno_remocao1 == '0') {
                                                 echo " <center> Alteraçao não realizada no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                             } else {
                                                add_acao("Rem_Div.Exc",$ret_ctrl_ti,$nome_usuario);
                                                 echo "<strong> <center> Equipamento  CTI:  " . $ret_ctrl_ti . " removido com sucesso      <br> ";
                                                 echo "  Usuario :  " . $usuario . "  em " . $hoje . "       <br> ";
                                                 echo "  Motivo  :  " . $ret_just . "       <br> </center> </strong>";


                                             }


                                         }// fim de retorno de alteracao em diversos
                             
                                         break;


                                     }// fim do case 2
                                     case '3': { // remove em tb_monitores 
                                         //  echo "Controle CTI :" . $ret_ctrl_ti . "  Local id  :" . $ret_loc . "  Sec id :" . $ret_sec . " Tabela  :" . $ret_tabela . "  Id tabela  :" . $ret_chave." <br>";
                                         //remove_TI($conn, $tabela, $justificativa, $id, $ctrl_ti, $hoje, $usuario) // remover equip em status = 0 ;
                                         // remocao em tbequip
                                         // procedimento para zerar o vinculo com pc na base 
                                         zera_Monitor_bycti($conn, $ret_ctrl_ti, $usuario);
                                         add_acao("Vinc_M_0", $ret_ctrl_ti, $usuario);
                                         
                                         $retorno_remocao = remove_TI($conn, $ret_tabela, $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                             
                                         if ($retorno_remocao == '0') {
                                             echo " <center> Nenhuma alteraçao realizada em Monitor  no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                         } else { // retorno de alteraçao em equip
                                             // remocao em controle_ti 
                                             $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                             if ($retorno_remocao1 == '0') {
                                                 echo " <center> Alteraçao não realizada no controle T.I nº :" . $ret_ctrl_ti . "  </center>";
                                             } else {
                                                add_acao("Rem_M.Exc",$ret_ctrl_ti,$nome_usuario);
                                                 echo " <center> Equipamento  CTI:  " . $ret_ctrl_ti . " removido com sucesso      <br> ";
                                                 echo "  Usuario :  " . $usuario . "  em " . $hoje . "       <br> ";
                                                 echo "  Motivo  :  " . $ret_just . "       <br> </center> ";
                                             }


                                         }// fim de retorno de alteracao em monitores
                             
                                         break;
                                     }// fim do case 3
                             
                                 }
}  
                                ?> 
                                 
                                
                                <br>
                            <div>
                          <br /><br />
                                <center>  
							<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
							</center>
                            
						  </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
                                             
        
</body>

</html>
