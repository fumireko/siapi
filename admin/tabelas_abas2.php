<?php
include "bco_fun.php";  
include "../validar_session.php";  
   include "../Config/config_sistema.php";
$ret_campo = $_GET['campo'];
$ret_busca = $_GET['busca'];


$campo = $ret_campo;
$campo = somente_numeros($campo);

$busca = $ret_busca; {
    $seq = "";
    $temp_pc = "";
    $temp_div = "";
    $temp_mon = "";
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
    //echo "<center> <strong>" . nomedolocal($conn, $campo) . "</strong> </center> ";

    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Resultados</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <script src="js/checkbox.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .gg {
        width: 100px;
    }

    .ggg {
        width: 200px;
    }

    .btn {
        margin-top: 100px;
    }

    .wrapper {
        display: grid;
        grid-template-columns: 200px 200px 200px;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 10px;
        margin: 8px 0;
        box-sizing: border-box;
        /*border: 1px solid #555;*/
        outline: none;
    }

        input[type=text]:focus {
            background-color: lightblue;
            color: black;
        }

    label input {
        float: left;
    }

    div.divEsq {
        width: 49%;
        display: inline-block;
    }

    div.divDir {
        width: 50%;
        display: inline-block;
    }


    /* Popup container */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

   
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content {
        display: flex;
        margin: auto;
    }

    .rTable {
        width: 100%;
        text-align: center;
    }

        .rTable thead {
            text-align: center;
            background: black;
            font-weight: bold;
            color: #fff;
        }

        .rTable tbody tr:nth-child(2n) {
            background: #ccc;
        }

        .rTable th, .rTable td {
            text-align: center;
            padding: 7px 0;
        }

    @media screen and (max-width: 480px) {
        .content {
            width: 94%;
        }

        .rTable thead {
            text-align: center;
            display: none;
        }

        .rTable tbody td {
            display: flex;
            flex-direction: column;
        }
    }

    @media only screen and (min-width: 1200px) {
        .content {
            width: 100%;
        }

        .rTable tbody tr td:nth-child(1) {
            width: 5%;
        }

        .rTable tbody tr td:nth-child(2) {
            width: 15%;
        }

        .rTable tbody tr td:nth-child(3) {
            width: 10%;
        }

        .rTable tbody tr td:nth-child(4) {
            width: 10%;
        }

        .rTable tbody tr td:nth-child(5) {
            width: 20%;
        }

        .rTable tbody tr td:nth-child(6) {
            width: 20%;
        }

        .rTable tbody tr td:nth-child(7) {
            width: 20%;
        }

        .text-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

</style>

<body>
<?php
        include 'index.php';
        ?>
    
    <!--     <select name="sec_id" required>    -->
                  <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                              <h2>Visualizaçao Completa   </h2>   
                                                     <?php echo "<center> <strong>" . nomedolocal($conn, $campo) . "</strong> </center> "; ?>   
                                                          <ul class="nav nav-tabs">
                                                           
                                                              <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                              <li><a data-toggle="tab" href="#menu2">Monitores</a></li>
                                                              <li><a data-toggle="tab" href="#menu3">Diversos</a></li>
                                                             <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                            </ul>
                                                 <div class="tab-content">
                                                        <div id="menu1" class="tab-pane fade">
                                                           <center> <h3>Desktop(s) e Notebooks </h3> </center>
                                                            <?php
                                                               $diversos_ic ="0";
                                                               $diversos_im ="0";
                                                               $diversos_id ="0";

                                                            $sql = "SELECT * from tb_controle_ti  WHERE tab_cam like  '%C%'and  status='1' order by ctrl_ti";
                                                            $dados_cti = mysqli_query($conn, $sql) or die(mysqli_error());
                                                            //$linha = mysqli_fetch_assoc($dados);
                                                            $total_cti = mysqli_num_rows($dados_cti);
                                                            if ($total_cti == 0) {
                                                                $titulo = "\n  " . $total_cti. "  Registro Localizado (s) em Controle TI ";
                                                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                            }
                                                            else
                                                            {
                                                               do{
                                                                            $ln_ini = mysqli_fetch_assoc($dados_cti);
                                                                            $tab = $ln_ini['tab_origem'];
                                                                            $id_tab = $ln_ini['tab_chave'];
                                                                            $codequip = $ln_ini['tab_cam'];
                                                                            $retorno = $codequip;
                                                                            $tp_equip = substr($retorno, 0, 1);
                                                                            $tbequip_id = substr($retorno, 1);
                                                                            $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                                                                            $ret_tabela = $ln_ini['tab_origem'];
                                                                            $ret_chave = $ln_ini['tab_chave'];
                                                                            $codequip = $ln_ini['tab_cam'];
                                                                            $desc = $ln_ini['descricao'];
                                                                            $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                                                                            //   $dados_tec = $ln_ini['descricao'];
                                                                            $seq .= $ret_ctrl_ti . " ";
                                                                         if ($tp_equip == "C") // computadores
                                                                            {

                                                                                $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $id_tab . "' order by tbequi_nome";
                                                                                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                                                                                $linha = mysqli_fetch_assoc($dados);
                                                                                $total = mysqli_num_rows($dados);
                                                                                if ($total == 0) {
                                                                                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                                                                                   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                                                } else {
                                                                                 
                                                                                    $retnome = $linha['tbequi_nome'];
                                                                                    $retID = $linha['tbequip_id'];
                                                                                    $retplaqueta = $linha['tbequip_plaqueta'];
                                                                                    $retloc = $linha['tbequi_tbcmei_id'];
                                                                                    // $retstatus = $linha['Al_01status'];
                                                        
                                                                                    //	  $total = mysqli_num_rows($dados);
                                                                                    //  echo $total;
                                                                                    $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                                                                    // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                                                    if ($total > 0) {
                                                                                        //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                                                                        do {
                                                                                            $diversos_ic = $diversos_ic + 1;
                                                                                            $retnome = $linha['tbequi_nome'];
                                                                                            $retID = $linha['tbequip_id'];
                                                                                            $retctrl_ti = $linha['ctrl_ti'];
                                                                                            $retplaqueta = $linha['tbequip_plaqueta'];
                                                                                            $retloc = $linha['tbequi_tbcmei_id'];
                                                                                            $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                                                                                            $ret_desc_cod = substr(strtoupper($linha['tbequi_tipo']), 0, 2);
                                                                                            if ($ret_desc_cod == "DES")//1
                                                                                                $img_nome = "tp1.png";
                                                                                            if ($ret_desc_cod == "NOT")
                                                                                                $img_nome = "notebook.png";
                                                                                            if ($ret_desc_cod == "TAB")
                                                                                                $img_nome = "tablet.png";
                                                                                            if ($ret_desc_cod == "CEL")
                                                                                                $img_nome = "celular.png";
                                                                                            else
                                                                                                $img_nome = "nenhum.png";


                                                                                    if (($ret_tabela == "1") or ($ret_tabela == 1)) // significa q o dispositivo eh um Computador
                                                                                    {
                                                                                        // consulta em outra tabela // monitores 
                                                                                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                                                                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                                                                        $linham = mysqli_fetch_assoc($dadosm);
                                                                                        $totalm = mysqli_num_rows($dadosm);
                                                                                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);

                                                                                        //$retloc = $linham['local_id'];
                                                                                        if ($totalm == 0) { // retorna dados com monitor nao cadastrado
                                                                                            echo " <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  &nbsp Sem  Monitor (0) <br> ";
                                                                                        } else { // retorna dados do monitor
                                                                                            if ($totalm > 0) {
                                                                                                echo " <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                                                                                do {
                                                                                                    $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                                                                    $retID = $linham['id'];
                                                                                                    $retplaqueta = $linham['mon_plaqueta'];
                                                                                                    $retloc = $linham['local_id'];
                                                                                                    $pc_id = $linham['id_equip'];
                                                                                                    $retm_ctrl_ti = $linham['ctrl_ti'];
                                                                                                    $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                                                                                    $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                                                                                    echo " &nbsp <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp  -  CTI :  {$retm_ctrl_ti} &nbsp &nbsp ";
                                                                                                } while ($linham = mysqli_fetch_assoc($dadosm));
                                                                                                echo "<br />";
                                                                                            }
                                                                                        }
                                                                                    } // fim do if ret 1
                                                                                  } while ($linha = mysqli_fetch_assoc($dados));
                                                                                }
                                                                         }
                                                                } // fim do if computadores
                                                               } while ($ln_ini = mysqli_fetch_assoc($dados_cti));
                                                             } // fim do else
}   
                 
                 
                 ?>
                             </div>
                            <div id="menu2" class="tab-pane fade">
                          <center> <h3> Monitores</h3> </center>
                   <?php
                                    $sql = "SELECT * from tb_controle_ti  WHERE tab_cam like '%M%' and status='1' ";
                                                            $dados_cti2 = mysqli_query($conn, $sql) or die(mysqli_error());
                                                            //$linha = mysqli_fetch_assoc($dados);
                                                            $total_cti2 = mysqli_num_rows($dados_cti2);
                                                            if ($total_cti2 == 0) {
                                                                $titulo = "\n  " . $total_cti2. "  Registro Localizado (s) em Controle TI ";
                                                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                            }
                                                            else
                                                            {
                                                               do{
                                                                            $ln_ini = mysqli_fetch_assoc($dados_cti2);
                                                                            $tab = $ln_ini['tab_origem'];
                                                                            $id_tab = $ln_ini['tab_chave'];
                                                                            $codequip = $ln_ini['tab_cam'];
                                                                            $retorno = $codequip;
                                                                            $tp_equip = substr($retorno, 0, 1);
                                                                            $tbequip_id = substr($retorno, 1);
                                                                            $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                                                                            $ret_tabela = $ln_ini['tab_origem'];
                                                                            $ret_chave = $ln_ini['tab_chave'];
                                                                            $codequip = $ln_ini['tab_cam'];
                                                                            $desc = $ln_ini['descricao'];
                                                                            $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                                                                            //   $dados_tec = $ln_ini['descricao'];
                                                                            $seq .= $ret_ctrl_ti . " ";
                                                                         if ($tp_equip == "M") // computadores
                                                                          {
                                                                                $sqlm = "SELECT * FROM tb_monitores WHERE id = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                                                                 $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                                                                 $linham = mysqli_fetch_assoc($dadosm);
                                                                                 $totalm = mysqli_num_rows($dadosm);
                                                                                $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                                                                                if ($totalm == 0) {
                                                                                    $titulo = "\n  " . $totalm . "  Registro Localizado (s) em Computadores ";
                                                                                   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                                                } else
                                                                                {
                                                                                  if ($totalm > 0)
                                                                                    {
                                                                                         //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                                                                          do {
                                                                                                    $diversos_im = $diversos_im + 1;
                                                                                                 $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                                                                $retID = $linham['id'];
                                                                                                  $retplaqueta = $linham['mon_plaqueta'];
                                                                                                  $retloc = $linham['local_id'];
                                                                                                  $pc_id = $linham['id_equip'];
                                                                                                  $retm_ctrl_ti = $linham['ctrl_ti'];
                                                                                                  $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida']."  ". nomedolocal($conn,$linham['local_id']);
                                                                                                  $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                                                                                 echo " &nbsp <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp  -  CTI :  {$retm_ctrl_ti} &nbsp &nbsp ";
                                                                                           } while ($linham = mysqli_fetch_assoc($dadosm));
                                                                                            echo "<br />";
                                                                                    } // fim do if >0
                                                                                 }  // fim do else >0
                                                                          }// fim do if M 
                                                                      //   else
                                                                      //     echo " " . $tp_equip . "  {$ret_ctrl_ti} &nbsp &nbsp ";
                                                               } while ($ln_ini = mysqli_fetch_assoc($dados_cti2));
                                                            } // fim do else cti> 0
                                                           
                   ?>
                                                       </div>
                                                        <div id="menu3" class="tab-pane fade">
                                                               <center> <h3>Diversos</h3> </center>
                                                              <?php

                                                              $sql = "SELECT * from tb_controle_ti  WHERE tab_origem=2 and  status='1' ";
                                                              $dados_cti3 = mysqli_query($conn, $sql) or die(mysqli_error());
                                                              //$linha = mysqli_fetch_assoc($dados);
                                                              $total_cti3 = mysqli_num_rows($dados_cti3);
                                                              if ($total_cti3 == 0) {
                                                                  $titulo = "\n  " . $total_cti3 . "  Registro Localizado (s) em Controle TI ";
                                                                  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                              } else {
                                                                  do {
                                                                      $ln_ini = mysqli_fetch_assoc($dados_cti3);
                                                                      $tab = $ln_ini['tab_origem'];
                                                                      $id_tab = $ln_ini['tab_chave'];
                                                                      $codequip = $ln_ini['tab_cam'];
                                                                      $retorno = $codequip;
                                                                      $tp_equip = substr($retorno, 0, 1);
                                                                      $tbequip_id = substr($retorno, 1);
                                                                      $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                                                                      $ret_tabela = $ln_ini['tab_origem'];
                                                                      $ret_chave = $ln_ini['tab_chave'];
                                                                      $codequip = $ln_ini['tab_cam'];
                                                                      $desc = $ln_ini['descricao'];
                                                                      $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                                                                      //   $dados_tec = $ln_ini['descricao'];
                                                                      $seq .= $ret_ctrl_ti . " ";
                                                                    //  if (($tp_equip <> "C")and($tp_equip <> "M")and($tp_equip <> "0")  )// computadores
                                                                     // {
                                                                          $sqld = "SELECT * FROM tb_diversos WHERE id = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                                                          $dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
                                                                          //$linhad = mysqli_fetch_assoc($dadosd);
                                                                          $totald = mysqli_num_rows($dadosd);
                                                                          $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                                                                          if ($totald == 0) {
                                                                              $titulo = "\n  " . $totald . "  Registro Localizado (s) em Computadores ";
                                                                              // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                                          } else {
                                                                              if ($totald > 0) {
                                                                                  //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                                                                  do {
                                                                                      $diversos_id = $diversos_id + 1;
                                                                                      $linhad = mysqli_fetch_assoc($dadosd);
                                                                                      $retnome = $linhad['descricao'] ;
                                                                                  $desc_cod = $linhad['descricao_cod'];
                                                                                      $retID = $linhad['id'];
                                                                                      $retplaqueta = $linhad['patrimonio'];
                                                                                      $retloc = $linhad['local_cod'];
                                                                                     // $pc_id = $linham['id_equip'];
                                                                                      $retd_ctrl_ti = $linhad['ctrl_ti'];
                                                                                      $descritivo = " " . $linhad['descricao'] . "  " . nomedolocal($conn, $linhad['local_cod']);
                                                                                      $codificacao = "C" . $linhad['ctrl_ti'] . "- M" . $linhad['id'] . "- L" . $linhad['local_cod'] ;

                                                                                  if ($retd_ctrl_ti == "")
                                                                                      $retd_ctrl_ti = " ----- ";

                                                                                      // tratamento de icones para visualizacao
                                                                                      if ($desc_cod == "1")
                                                                                      $icone = "d1.png";
                                                                                       else
                                                                                          if ($desc_cod == "2")
                                                                                              $icone = "d2.png";
                                                                                          else
                                                                                              if ($desc_cod == "3")
                                                                                                  $icone = "d3.png";
                                                                                              else
                                                                                                  if ($desc_cod == "4")
                                                                                                      $icone = "d4.png";
                                                                                                  else
                                                                                                  if ($desc_cod == "5")
                                                                                                      $icone = "impressora.png";
                                                                                                  else
                                                                                                      if ($desc_cod == "6")
                                                                                                          $icone = "acess.png";
                                                                                                      else

                                                                                                      $icone = "tp3.png";
                                                                                     // fim do trat_imagem

                                                                                      echo " <img src='img/".$icone."' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp  -  CTI :  {$retd_ctrl_ti} &nbsp &nbsp ";
                                                                                  } while ($linhad = mysqli_fetch_assoc($dadosd));
                                                                                  echo "<br />";
                                                                              } // fim do if >0
                                                                          }  // fim do else >0
                                                                      //}// fim do if M 
                                                                } while ($ln_ini = mysqli_fetch_assoc($dados_cti3));
                                                              } // fim do else cti> 0
                                                              


                                                              ?>      
                                                        </div>
                                           
                                                   <div id="home" class="tab-pane fade in active">
                                                    
                                                    <?php echo "<center> <strong> Dados Resumidos para checagem  </strong> </center> <br> "; ?>   
                                                       <?php echo "<center> <strong> Computadores " . $diversos_ic  . "</strong> </center> <br> "; ?>   
                                                       <?php echo "<center> <strong> Monitores " . $diversos_im  . "</strong> </center> <br>"; ?>   
                                                       <?php echo "<center> <strong> Diversos " . $diversos_id  . "</strong> </center> "; ?>   
                                                    
                                                            
                                                   </div>
                                           
                                         </div>
                                        
                                        </div>
                                   
                                      
                                                     

                          </form>                    
                       </body>
                </html>

        