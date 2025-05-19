<?php
include "bco_fun.php";  
include "../validar_session.php";  
   include "../Config/config_sistema.php";
$ret_campo = $_GET['campo'];
$ret_busca = $_GET['busca'];
$ret_tipo = $_GET['tipo'];
if ($ret_tipo=="mon_0")
    $tipo="0";
if ($ret_tipo == "mon_1")
    $tipo = "1";
if ($ret_tipo == "mon_2")
    $tipo = "2";
if ($ret_tipo == "mon_monitor")
    $tipo = "3";


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
        switch ($tipo) {
           case '0': 
               {
              ?>
                   <!--     <select name="sec_id" required>    -->
               <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                              <h2>Visualizaçao Completa   </h2>   
                                                     <?php echo "<center> <strong> Dispositivos sem Monitor   </strong> </center> "; ?>   
                                                          <ul class="nav nav-tabs">
                                                           
                                                              <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                              <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                            </ul>
                                               <div class="tab-content">
                                                        <div id="menu1" class="tab-pane fade">
                                                           <center> <h3>Desktop(s) e Notebooks </h3> </center>
                                                            <?php
                                                            $diversos_ic = "0";
                                                            $diversos_im = "0";
                                                            $diversos_id = "0";
                                                            $i = "0";
                                                            $col = "0";
                   
                   $sql = "SELECT * from tb_controle_ti where status=1 order by ctrl_ti desc ";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    echo "<br>";
                    do {
                       
                        $ln_ini = mysqli_fetch_assoc($dados);
                        $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                        $ret_tabela = $ln_ini['tab_origem'];
                        $ret_chave = $ln_ini['tab_chave'];
                        $codequip = $ln_ini['tab_cam'];
                        $descritivo_pc = strtoupper($ln_ini['descricao']) . "  " . nomedolocal($conn, mostra_local($conn, $ln_ini['tab_chave']));
                        $desc = strtoupper($ln_ini['descricao']);
                        $retorno = $codequip;
                        $tp_equip = substr($retorno, 0, 1);
                        $tbequip_id = substr($retorno, 1);
                        $ret_desc_cod = $tp_equip;
                        $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                            // tratamento do icone do dispositivo                                        
                        $ret_desc_cod = substr($desc, 0, 2); 
                                 if ($ret_desc_cod == "DE")  // desktip
                                      $img_nome = "tp1.png";
                                 else
                                     if ($ret_desc_cod == "NO")  // note
                                      $img_nome = "tp5.png";
                                     else
                                        if ($ret_desc_cod == "TA")  // tablet
                                           $img_nome = "tablet.png";
                                         else
                                            if ($ret_desc_cod == "CE")  // celular
                                             $img_nome = "celular.png";
                                            else
                                              if ($ret_desc_cod == "SW")  // switch
                                               $img_nome = "d3.png";
                                              else
                                                if ($ret_desc_cod == "PA") // patch panel
                                                  $img_nome = "d1.png";
                                                else
                                                  if ($ret_desc_cod == "RA") // rack
                                                   $img_nome = "d2.png";
                                                   else
                                                     if ($ret_desc_cod == "TV")  // tv
                                                       $img_nome = "d4.png";
                                                    else
                                                    $img_nome = "nenhum.png";
                        // fim de trat_icone
                        
                        if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                            // consulta em outra tabela // monitores 
                             //$diversos_ic = $diversos_ic + 1;
                            $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                            $linham = mysqli_fetch_assoc($dadosm);
                            $totalm = mysqli_num_rows($dadosm);
                            $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                            //$retloc = $linham['local_id'];
                            if ($totalm == 0)
                            {
                               $diversos_ic = $diversos_ic + 1;
                                $col = $col + 1;
                                if($col<4)
                                  echo "<a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/".$img_nome."' title=' " . $descritivo_pc . "    ' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . "</a> &nbsp  Sem Monitor &nbsp";
                               else
                                {
                                echo "<a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >   <img src='img/" . $img_nome . "' title=' " . $descritivo_pc. "  ' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . "</a> &nbsp  Sem Monitor &nbsp <br>";
                                $col = 0;
                                }

                            }
                        }
                    } while ($ln_ini = mysqli_fetch_assoc($dados));
                }
                         
                ?>
                            </div>
                                 <div id="home" class="tab-pane fade in active">
                                  <?php echo "<center> <strong> Dados Resumidos para checagem  </strong> </center> <br> "; ?>   
                                  <?php echo "<center> <strong> Dispositivos  " . $diversos_ic . "</strong> </center> <br> "; ?>   
                             </div>
                       </div>
                   </div>
                </form>                    
                <?php
            }
                break;
            case '1': {
                ?>
                   <!--     <select name="sec_id" required>    -->
               <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                              <h2>Visualizaçao Completa   </h2>   
                                                     <?php echo "<center> <strong> Dispositivo com 1 Monitor   </strong> </center> "; ?>   
                                                          <ul class="nav nav-tabs">
                                                             <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                             <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                           </ul>
                                               <div class="tab-content">
                                                        <div id="menu1" class="tab-pane fade">
                                                           <center> <h3>Desktop(s) e Notebooks </h3> </center>
                                                            <?php
                                                            $diversos_ic = "0";
                                                            $diversos_im = "0";
                                                            $diversos_id = "0";
                                                            $i = "0";

                                                            $sql = "SELECT * from tb_controle_ti where status=1 order by ctrl_ti desc ";
                                                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                                                            //$linha = mysqli_fetch_assoc($dados);
                                                            $total = mysqli_num_rows($dados);
                                                            if ($total == 0) {
                                                                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                                                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                            } else {
                                                                echo "<br>";
                                                                do {
                                                                    $ln_ini = mysqli_fetch_assoc($dados);
                                                                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                                                                    $ret_tabela = $ln_ini['tab_origem'];
                                                                    $ret_chave = $ln_ini['tab_chave'];
                                                                    $codequip = $ln_ini['tab_cam'];
                                                                    $desc = strtoupper($ln_ini['descricao']);
                                                                    $descritivo_pc = strtoupper($ln_ini['descricao'])."  ". nomedolocal($conn, mostra_local($conn,$ln_ini['tab_chave']));
                                                                    $retorno = $codequip;
                                                                    $tp_equip = substr($retorno, 0, 1);
                                                                    $tbequip_id = substr($retorno, 1);
                                                                    $ret_desc_cod = $tp_equip;
                                                                    $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                                                                    // tratamento do icone do dispositivo                                        
                                                                   // $desc = strtoupper($ln_ini['descricao']);
                                                                    $ret_desc_cod = substr($desc, 0, 2);
                                                                    if ($ret_desc_cod == "DE")  // desktip
                                                                        $img_nome = "tp1.png";
                                                                    else
                                                                        if ($ret_desc_cod == "NO")  // note
                                                                            $img_nome = "tp5.png";
                                                                        else
                                                                            if ($ret_desc_cod == "TA")  // tablet
                                                                                $img_nome = "tablet.png";
                                                                            else
                                                                                if ($ret_desc_cod == "CE")  // celular
                                                                                    $img_nome = "celular.png";
                                                                                else
                                                                                    if ($ret_desc_cod == "SW")  // switch
                                                                                        $img_nome = "d3.png";
                                                                                    else
                                                                                        if ($ret_desc_cod == "PA") // patch panel
                                                                                            $img_nome = "d1.png";
                                                                                        else
                                                                                            if ($ret_desc_cod == "RA") // rack
                                                                                                $img_nome = "d2.png";
                                                                                            else
                                                                                                if ($ret_desc_cod == "TV")  // tv
                                                                                                    $img_nome = "d4.png";
                                                                                                else
                                                                                                    $img_nome = "nenhum.png";
                                                                    // fim de trat_icone
                                                                    
                                                                    if (($ret_tabela == "1") or ($ret_tabela == 1)) { // garantia de o CTRL_TI tratar-se de um computador tab=1
                                                                        // consulta em outra tabela // monitores 
                                                                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "' and status=1 "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                                                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                                                        $linham = mysqli_fetch_assoc($dadosm);
                                                                        $totalm = mysqli_num_rows($dadosm);
                                                                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                                                                        //$retloc = $linham['local_id'];
                                                                        if ($totalm == 1) {
                                                                            do {
                                                                                $diversos_ic = $diversos_ic + 1;
                                                                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                                                $retID = $linham['id'];
                                                                                $retplaqueta = $linham['mon_plaqueta'];
                                                                                $retloc = $linham['local_id'];
                                                                                $pc_id = $linham['id_equip'];
                                                                                $retm_ctrl_ti = $linham['ctrl_ti'];
                                                                               
                                                                                $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                                                                $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                                                                echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/".$img_nome."' title=' " . $descritivo_pc . "  " . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                                                                echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                                                                            } while ($linham = mysqli_fetch_assoc($dadosm));
                                                                            echo "<br>";
                                                                            //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                                                                        }

                                                                    }
                                                                } while ($ln_ini = mysqli_fetch_assoc($dados));
                                                            }


                                                        
                       ?>
                             </div>
                                                    
                                                        <div id="home" class="tab-pane fade in active">
                                                      <?php echo "<center> <strong> Dados Resumidos para checagem  </strong> </center> <br> "; ?>   
                                                       <?php echo "<center> <strong> Computadores " . $diversos_ic . "</strong> </center> <br> "; ?>   
                                                      </div>
                                               </div>
                                         </div>
                </form>                    
 
             <?php
            }
               break;
              case '2':
             {
             ?>
                <!--     <select name="sec_id" required>    -->
               <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                              <h2>Visualizaçao Completa   </h2>   
                                                     <?php echo "<center> <strong>   Dispositivo com 2 Monitores   </strong> </center> "; ?>   
                                                          <ul class="nav nav-tabs">
                                                             <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                             <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                           </ul>
                                               <div class="tab-content">
                                                        <div id="menu1" class="tab-pane fade">
                                                           <center> <h3>Desktop(s) e Notebooks </h3> </center>
                                                            <?php
                                                            $diversos_ic = "0";
                                                            $diversos_im = "0";
                                                            $diversos_id = "0";
                                                            $i = "0";

                 
                 
                 $sql = "SELECT * from tb_controle_ti where status=1";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    echo "<br>";
                    do {
                        $ln_ini = mysqli_fetch_assoc($dados);
                        $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                        $ret_tabela = $ln_ini['tab_origem'];
                        $ret_chave = $ln_ini['tab_chave'];
                        $codequip = $ln_ini['tab_cam'];
                        $descritivo_pc = strtoupper($ln_ini['descricao']) . "  " . nomedolocal($conn, mostra_local($conn, $ln_ini['tab_chave']));
                        $desc = strtoupper($ln_ini['descricao']);
                        $retorno = $codequip;
                        $tp_equip = substr($retorno, 0, 1);
                        $tbequip_id = substr($retorno, 1);
                        $ret_desc_cod = $tp_equip;
                        $codificacao_pc = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];

                        // tratamento do icone do dispositivo                                        
                        $ret_desc_cod =  substr($desc, 0, 2);
                        if ($ret_desc_cod == "DE")  // desktip
                            $img_nome = "tp1.png";
                        else
                            if ($ret_desc_cod == "NO")  // note
                                $img_nome = "tp5.png";
                            else
                                if ($ret_desc_cod == "TA")  // tablet
                                    $img_nome = "tablet.png";
                                else
                                    if ($ret_desc_cod == "CE")  // celular
                                        $img_nome = "celular.png";
                                    else
                                        if ($ret_desc_cod == "SW")  // switch
                                            $img_nome = "d3.png";
                                        else
                                            if ($ret_desc_cod == "PA") // patch panel
                                                $img_nome = "d1.png";
                                            else
                                                if ($ret_desc_cod == "RA") // rack
                                                    $img_nome = "d2.png";
                                                else
                                                    if ($ret_desc_cod == "TV")  // tv
                                                        $img_nome = "d4.png";
                                                    else
                                                        $img_nome = "nenhum.png";
                        // fim de trat_icone
                        
                        if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                              
                            // consulta em outra tabela // monitores 
                            $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                            $linham = mysqli_fetch_assoc($dadosm);
                            $totalm = mysqli_num_rows($dadosm);
                            $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                            //$retloc = $linham['local_id'];
                            if ($totalm > 1) {
                                  $diversos_ic = $diversos_ic + 1;
                                    //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                                echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/".$img_nome."' title=' " . $descritivo_pc ."' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                do {
                                    //  $linham = mysqli_fetch_assoc($dadosm);
                                    $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                    $retID = $linham['id'];
                                    $retplaqueta = $linham['mon_plaqueta'];
                                    $retloc = $linham['local_id'];
                                    $pc_id = $linham['id_equip'];
                                    $retm_ctrl_ti = $linham['ctrl_ti'];
                                    $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                    $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'] . " <> " . $totalm;
                                    echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                                } while ($linham = mysqli_fetch_assoc($dadosm));
                                echo "<br />";
                            }
                        }
                    } while ($ln_ini = mysqli_fetch_assoc($dados));
                }
                                        ?> 
                                   </div>
                                              <div id="home" class="tab-pane fade in active">
                                                      <?php echo "<center> <strong> Dados Resumidos para checagem  </strong> </center> <br> "; ?>   
                                                       <?php echo "<center> <strong> Computadores " . $diversos_ic . "</strong> </center> <br> "; ?>   
                                              </div>
                                   </div>
                            </div>
                </form>                    
 
             <?php
            




                break;



             }
            break;
            case '3': {
                ?>    
                <!--     <select name="sec_id" required>    -->
                       <form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
                                    </BR> </BR> </BR> 
                                    <center>  
                                    <div class="container">
                                              <h2>Visualizaçao Completa   </h2>   
                                                     <?php echo "<center> <strong>   Monitores sem Dispositivos associados  </strong> </center> "; ?>   
                                                          <ul class="nav nav-tabs">
                                                             <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                             <li class="active"><a data-toggle="tab" href="#home">Resumo </a></li>
                                                           </ul>
                                               <div class="tab-content">
                                                        <div id="menu1" class="tab-pane fade">
                                                           <center> <h3>Desktop(s) e Notebooks </h3> </center>
                                                            <?php
                                                            $diversos_ic = "0";
                                                            $diversos_im = "0";
                                                            $diversos_id = "0";
                                                            $i = "0";

                                                            $sqlm = "SELECT * FROM tb_monitores where id_equip=0  order by ctrl_ti  "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                                            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                                            $linham = mysqli_fetch_assoc($dadosm);
                                                            $totalm = mysqli_num_rows($dadosm);
                                                            $col = 0;
                                                            if ($totalm == 0) {
                                                                $titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
                                                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                            } else {
                                                                echo "<br> <br> <center>Monitores</center> <br> <br>";
                                                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                                $retID = $linham['id'];
                                                                $retplaqueta = $linham['mon_plaqueta'];
                                                                $retloc = $linham['local_id'];
                                                                $pc_id = $linham['id_equip'];
                                                                $ret_ctrl_ti = $linham['ctrl_ti'];
                                                                // $retstatus = $linha['Al_01status'];
    
                                                                //	  $total = mysqli_num_rows($dados);
                                                                //  echo $total;
                                                                $titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
                                                                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                                if ($totalm > 0) {
                                                                    //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                                                                    do {
                                                                                                                    $diversos_im = $diversos_im + 1;
                                                                        $col = $col + 1;
                                                                        $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol ";
                                                                        //$retnome = "";
                                                                        $retID = $linham['id'];
                                                                        $retplaqueta = $linham['mon_plaqueta'];
                                                                        $ret_ctrl_ti = $linham['ctrl_ti'];
                                                                        $retloc = $linham['local_id'];
                                                                        $pc_id = $linham['id_equip'];
                                                                        $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                                                        if ($col < 5) {
                                                                            // echo " CTI ".$ret_ctrl_ti. "   ";
                                                                            echo " &nbsp &nbsp <a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "   " . $retnome . "' height='25' width='25' ></a>&nbsp  CTI :  {$ret_ctrl_ti} &nbsp  <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  </a>";
                                                                        } else {
                                                                            // echo " CTI ".$ret_ctrl_ti." <br> ";
                                                                            $col = 0;
                                                                            echo "&nbsp &nbsp <a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "   " . $retnome . "' height='25' width='25' ></a>&nbsp  CTI :  {$ret_ctrl_ti} &nbsp   <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' > </a> <br>";
                                                                        }
                                                                    } while ($linham = mysqli_fetch_assoc($dadosm));
                                                                }

                                                            }
                
                                                           // echo "<center> tipo mon_2 </center>";
                                                        }
                                                             ?> 
                                   </div>
                                              <div id="home" class="tab-pane fade in active">
                                                      <?php echo "<center> <strong> Dados Resumidos para checagem  </strong> </center> <br> "; ?>   
                                                       <?php echo "<center> <strong> Computadores " . $diversos_im . "</strong> </center> <br> "; ?>   
                                              </div>
                                   </div>
                            </div>
                </form>                    
 <?php

                break;
        }
     } // fim do switch
     ?>
        </body>
   </html>
