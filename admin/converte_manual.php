<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
include "bco_fun.php";
$nome_usuario = $_SESSION['nome_usuario'];

$cti_antigo = $_POST['cti_ant'];
$cti_atual = $_POST['cti_atual'];
     $sql = "SELECT * FROM tb_controle_ti WHERE ctrl_ti = '" . $cti_antigo . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
    //$sql = "SELECT * FROM tbldados WHERE id_dados LIKE '%" . $campo . "%' order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n  " . $total . "  Registro Nao Localizado  com o CTI  " . $cti_antigo;
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else
        {
            if ($total == 1) 
            {
               $id_cti = $linha['id'];
               $id_equip = $linha['tab_chave'];
               $tabela = $linha['tab_origem'];
            
                switch ($tabela)
                   {
	                    case '1': 
                           {
                               // alteracao de tab controle_ti  
                                 $query =  "update tb_controle_ti set ctrl_ti ='".$cti_atual."' where  id ='".$id_cti."'";
                                  $resultadoDaInsercao = mysqli_query($conn, $query);
                                   if($resultadoDaInsercao=="0") // erro na alteraçao
                                   {
                                     echo " Erro na alteraçao do Cadastro "  ;
                                   }        
                                   else 
                                   {
                                     // alteracao de tab tbequip  
                                        $query2 =  "update tbequip set ctrl_ti ='".$cti_atual."' where  tbequip_id ='".$id_cti."'";
                                        $resultadoDaInsercao2 = mysqli_query($conn, $query2);
                                         if($resultadoDaInsercao=="0") // erro na alteraçao
                                            {
                                                echo " Erro na alteraçao do Cadastro em Tb_equip "  ;
                                            }
                                       else
                                         {

                        if (($cti_atual <> $cti_antigo)) {  // registra a informacao de alteraçao e guarda a da base  function registra_alt($Fconexao, $Fctrl_ti,$Fid, $Ftabela, $Fcampo,$Fd_b, $Foutros,$Fusuario  )/
                            $campo = "CTI";
                            $ctrl_ti = $cti_atual;
                            $dados = $cti_antigo . " --> " . $cti_atual;
                            //$dados = $respb;
                            $retorno = registra_alt($conn, $ctrl_ti, $cti_antigo, "1", $campo, $dados, "--", $nome_usuario);
                        }
                                             
                                             ?>
                                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                <html>
                                                    <head>
                                                    <title>Manutencao de CTI</title>
                                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                    <!-- Adicionando JQuery -->
                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                            crossorigin="anonymous"></script>
    
                                                    <!-- Adicionando Javascript -->
   
                                                    </head>
                                                <!-- BEGIN BODY -->

                                                <body>
                                                    <!-- aqui começa o menu -->
                                                    <!-- START TOPBAR -->
         
                                                    <?php include "index.php"; ?> 
                                                         <!-- aqui termina o menu -->
                                                        <!-- MAIN MENU - END -->
                                                        <!--  SIDEBAR - END -->
                                                        <!-- START CONTENT -->
        
                                                        <section id="main-content" class=" ">
                                                                <section class="wrapper main-wrapper" style=''>
                                                                    <div class="clearfix"></div>

                                                                    <div class="col-lg-12">
                                                                        <section class="box">
                                                                            <header class="card-header">
                                                                                <h2 class="title">Corretor Manual CTI</h2>
                                                                            </header>
                            
                                                                            <div class="container-fluid" style="padding-bottom: 1em;">
                                                                                <div class="col">
                                                                                    <h4 class="bold text-left"> <?php echo ""; ?></h4>
                                    
                                    
                                        
                                                                                    <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a>
                                                                                </div> 
                                                                            </div> 
                            
                                                                            <form method="post" action="converte_manual.php">    
                                                                                <input  type="hidden"  id="nome"  name="nome" type="text" value=  ""  size = "10" >
                                        
                                                                                <h2 class="bold">Manutençao Realizada  :</h2>  
                                                                                <hr>

                                                                                <div class="container-fluid">
                                                                                    <h4 class="bold">CTI (antigo)  :</h4>  
                                                                                    <input type="text" id="cti_ant" name="cti_ant" type="text" size="10" value="<?php echo $cti_antigo ?>  " >
                                   
                                                                                    <h4 class="bold">CTI (atualizado)  :</h4>  
                                                                                    <input type="text" id="cti_atual" name="cti_atual" type="text" size="10" value="<?php echo $cti_atual ?>  " >
                                                                                    <div>






                                                                                  <a href="busca_diversos.php?tbequip_id= <?php echo $cti_atual; ?>" title="Consulta  Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />
                       

                                                                                   <br /> <br />
                                                                                    </div>
                                                                                </div>

                                                                            </form>      
                                                                        </section>
                                                                    </div>
                                                                </section>
                                                        </section>
        
                                                </body>

                                                </html>
 
                                            <?php

                                         } // fim de alteracao de tbequip
                                      // }
                           } // fim de alteracao de controle_ti
                           
                           break;
                           }
                        case '2':
                            {

                              break;
                            }
                        case '3':
                            {

                               break;
                             }
                          default:	
	                          {
	                            echo "<br><center> Voce nao escolheu nenhuma opcao de busca  <br><br> "; 
	                            echo " <a href=busca_diversos.php  >  Voltar </a></center>";
	                          }
                     
                     }
           } // fim do if total == 1
        } // fim do else



 ?>
