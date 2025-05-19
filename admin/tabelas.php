<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Tabelas</title>
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
                                                       <h2>Visualizaçao de Tabelas  </h2>   
 
                                                          <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#home">Controle T.I</a></li>
                                                              <li><a data-toggle="tab" href="#menu1">Pcs e afins</a></li>
                                                              <li><a data-toggle="tab" href="#menu2">Monitores</a></li>
                                                              <li><a data-toggle="tab" href="#menu3">Diversos</a></li>
                                                              <li><a data-toggle="tab" href="#menu4">Registra</a></li>
                                                            </ul>

                                                      <div class="tab-content">
                                                        <div id="home" class="tab-pane fade in active">
                                                    
                                                                    <table class="rTable">
                                                                        <thead>
                                                                           <tr>
                                                                            <th>Status</th>
                                                                            <th>ID</th>
                                                                            <th>Ctrl_ti</th>
                                                                           <th>Descriçao</th>
                                                                           <th>Origem</th>
                                                                            <th>Chave</th>
                                                                            <th>Cam</th>
                                                                            <th>Data Cad</th>
                                                                            <th>Tecnico</th>
                                                                         </tr>
                                                                        </thead>
 
                                                            <?php 
                                                                $query = "select * from tb_controle_ti order by ctrl_ti desc ";
                                                                $dados = mysqli_query($conn, $query);
                                                                $resultadoDaInsercao = mysqli_num_rows($dados);
                                                               // $total = mysqli_num_rows($dados);
                                                            $linha = mysqli_fetch_assoc($dados);
                                                                do {
                                                                 //$linha = mysqli_fetch_assoc($dados);
                                                                 
                                                                 $ret_id = $linha['id'];
                                                                 $ret_status = $linha['status'];
                                                                 $ctrl_ti = $linha['ctrl_ti'];
                                                                 $ret_tab_origem = $linha['tab_origem'];
                                                                 $ret_tab_chave = $linha['tab_chave'];
                                                                 $ret_tab_cam = $linha['tab_cam'];
                                                                 $ret_dtcad = $linha['dt_cad'];
                                                                 $ret_tecnico = $linha['tecnico'];
                                                                 $ret_descricao = strtoupper($linha['descricao']);
                                                                 $codificacao = "C" . $linha['ctrl_ti'] . " " . $linha['tab_chave'] . "- " . $linha['tab_cam'];
                                                            ?>
                                                                      
                                                               <tbody>
                                                                <tr>
                                                                  <td> <?php echo $ret_status; ?> </td>
                                                                  <td> <?php echo " " . $ret_id; ?> </td>
                                                                  <td><?php echo $ctrl_ti ?></td>
                                                                  <td><?php echo $ret_descricao ?></td>
                                                                  <td><?php echo $ret_tab_origem ?></td>
                                                                  <td><?php echo $ret_tab_chave ?></td>
                                                                  <td><?php echo $ret_tab_cam ?></td>
                                                                  <td><?php echo $ret_dtcad ?></td>
                                                                  <td><?php echo $ret_tecnico ?></td>
                                                               </tr>
                                                                 <?php

                                                            } while ($linha = mysqli_fetch_assoc($dados));



                                                                ?>
                                                         </tbody>
                                                </table>
                                               
                                                </form>
                                                                   
                               </div>
                                        <div id="menu1" class="tab-pane fade">
                                                             <center> <h3>Componentes Pcs</h3> </center>
                                                          <table class="rTable">
                                                                        <thead>
                                                                           <tr>
                                                                             <th>Status </th>
                                                                            <th>ID</th>
                                                                            <th>Ctrl_ti</th>
                                                                           <th>Descriçao</th>
                                                                           <th>Nome</th>
                                                                            <th>Plaqueta</th>
                                                                            <th>SO.</th>
                                                                            <th>Local</th>
                                                                            <th>Tecnico</th>
                                                                         </tr>
                                                                        </thead>       
                                        <?php
                                            $sql1 = "SELECT * FROM tbequip order by tbequip_id desc ";
                                            $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                            $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                        $row = mysqli_fetch_assoc($resultado1);
                                        do {
                                           //  $row = mysqli_fetch_assoc($resultado1);
                                             $ret_id = $row['tbequip_id'];
                                             $ret_status = $row['status'];
                                             $ret_plaqueta = $row['tbequip_plaqueta'];
                                             $ret_nome = $row['tbequi_nome'];
                                             $ret_descricao = $row['tbequi_tipo'];
                                             $ret_monitor = $row['tbequip_monitor'];
                                             $ret_equi_mod = $row['tbequi_mod'];
                                             $ret_so = $row['tbequip_so'];
                                             $ret_so_arq = $row['tbequi_so_arq'];
                                             $ret_mod_placa = $row['tbequi_modplaca'];
                                             $ret_memoria = $row['tbequi_modelomemoria'];
                                             $ret_memtam = $row['tbequi_memoria'];
                                             $ret_slots = $row['tbequi_slots'];
                                             $ret_slots_uso = $row['tbequi_slots_uso'];
                                             $ret_modmem = $row['tbequi_modelomemoria'];
                                             $ret_armaz = $row['tbequi_armazenamento'];
                                             $ret_tparmaz = $row['tbequi_tparmazenamento'];
                                             $ret_arm_sec = $row['tbequi_arm_sec'];
                                             $ret_arm_sectam = $row['tbequi_arm_sectam'];
                                             $ret_dtcad = $row['tbequi_datalanc'];
                                             $ret_tec = $row['tbequi_tecnico'];
                                             $ret_cmei_id = $row['tbequi_tbcmei_id'];
                                             $ret_sec_id = $row['tbequip_sec'];
                                             $ret_app = $row['tbequi_app'];
                                             $ret_app_out = $row['tbequi_app_out'];
                                             $ret_proc = $row['tbequi_proc'];
                                             $ret_obs = $row['tbequi_obs'];
                                             $ret_ref = $row['tbequi_ref'];
                                             $ret_vid_uso = $row['tbequip_vid_uso'];
                                             $ret_vid_saidas = $row['tbequip_vid_saidas'];
                                             $ret_lacre = $row['tbequip_lacre'];
                                             $ret_fonte = $row['tbequip_fonte'];
                                             $ret_util_qtd = $row['tbequip_util_num'];
                                             $ret_util_nome = $row['tbequip_util_nomes'];
                                             $ctrl_ti = $row['ctrl_ti'];
                                          //   $unidade = nomedolocal($conn, $ret_cmei_id);
                                           //  $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                         //    $codificacao = "cti".$ret_ctrl_ti."-t".$ret_idlocal."-l-".$ret_cmei_id."-s-". $ret_sec_id;
                                                  ?>
                                                               <tbody>
                                                                <tr>
                                                                   <td> <?php echo $ret_status; ?> </td>
                                                                    <td> <?php echo " " . $ret_id; ?> </td>
                                                                  <td><?php echo $ctrl_ti ?></td>
                                                                  <td><?php echo $ret_descricao ?></td>
                                                                  <td><?php echo $ret_nome ?></td>
                                                                  <td><?php echo $ret_plaqueta ?></td>
                                                                  <td><?php echo $ret_so ?></td>
                                                                  <td><?php echo $ret_cmei_id." / ". $ret_sec_id ?></td>
                                                                  <td><?php echo $ret_tec."  ". $ret_dtcad ?></td>
                                                               </tr>
                                                                 <?php
                                                                    } while ($row = mysqli_fetch_assoc($resultado1));
                                                            ?>
                                                                 </tbody>
                                                                </table>
                                                                </form>
                                        </div>
                                      <div id="menu2" class="tab-pane fade">
                                                           <center> <h3>Componentes Monitores</h3> </center>
                                                                    <table class="rTable">
                                                                        <thead>
                                                                           <tr>
                                                                            <th>Status </th>
                                                                               <th>ID-Cam </th>
                                                                            <th>Ctrl_ti</th>
                                                                           <th>Descriçao</th>
                                                                           <th>Tamanho</th>
                                                                            <th>Plaqueta</th>
                                                                            <th>id_equip</th>
                                                                            <th>Local</th>
                                                                            <th>Tecnico</th>
                                                                            <th></th>
                                                                           </tr>
                                                                        </thead>
                                                            <?php
                                                                 $sql1 = "SELECT * FROM tb_monitores order by id desc ";
                                                                 $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                                 $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                                            $row = mysqli_fetch_assoc($resultado1);
                                                                 do {
                                                                     //$row = mysqli_fetch_assoc($resultado1);
                                                                     $ret_status = $row['status'];
                                                                     $ret_id = $row['id'];
                                                                     $ret_idlocal = $row['local_id'];
                                                                     $ret_idsec = $row['sec_id'];
                                                                     $ret_plaqueta = $row['mon_plaqueta'];
                                                                     $ret_nome = $row['mon_marca'];
                                                                     $ret_desc = "Monitor ";
                                                                     $ret_tam = $row['mon_tam'];
                                                                     $ret_id_equip = $row['id_equip'];
                                                                     $ret_tipo = $row['mon_tipo'];
                                                                     $ret_data = $row['data'];
                                                                     $ret_saida = $row['mon_saida'];
                                                                     $ret_tecnico = $row['usuario'];
                                                                     $ret_ctrl_ti = $row['ctrl_ti'];
                                                                     $ret_ref = $row['ref'];
                                                                     $ret_obs = $row['obs'];
                                                                     //$unidade = nomedolocal($conn, $ret_idlocal);
                                                                     $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_id . "-l-" . $ret_idlocal . "-s-" . $ret_idsec;
                                         
                                     //}
                                  

                                                                ?>
                                                                      
                                                               <tbody>
                                                                <tr>
                                                                          <td> <?php echo $ret_status; ?> </td>
                                                                    <td> <?php echo " " . $ret_id; ?> </td>
                                                                  <td><?php echo $ret_ctrl_ti ?></td>
                                                                  <td><?php echo $ret_nome ?></td>
                                                                  <td><?php echo $ret_tam ?></td>
                                                                  <td><?php echo $ret_plaqueta ?></td>
                                                                  <td><?php echo $ret_id_equip ?></td>
                                                                  <td><?php echo $ret_idlocal."/".$ret_idsec ?></td>
                                                                  <td><?php echo $ret_tecnico . "/" . $ret_id_equip ?></td>
                                                                  <td><?php echo " ";  ?></td>
                                                               </tr>
                                                                 <?php
                                                            } while ($row = mysqli_fetch_assoc($resultado1));

                                                            ?>
                                                                  </tbody>
                                                                </table>
                                                                </form>
                                                           </div>
                                                    

                                                      <div id="menu3" class="tab-pane fade">
                                                               <center> <h3>Diversos</h3> </center>
                                                                     <table class="rTable">
                                                                        <thead>
                                                                           <tr>
                                                                            <th>Status </th>
                                                                               <th>ID </th>
                                                                            <th>Ctrl_ti</th>
                                                                            <th>Descriçao</th>
                                                                            <th>Marca</th>
                                                                            <th>Plaqueta</th>
                                                                            <th>Tipo</th>
                                                                            <th>Local</th>
                                                                            <th>Tecnico</th>
                                                                            <th></th>
                                                                           </tr>
                                                                        </thead>
 
                                                                
                                                               
                                                               <?php
                                                                $sql1 = "SELECT * FROM tb_diversos order by id desc ";
                                                                $resultado1 = mysqli_query($conn,$sql1) or die('Erro ao selecionar especialidade: ' .mysqli_error());
                                                                $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                                               $row = mysqli_fetch_assoc($resultado1);
                                                               //$row = mysqli_fetch_assoc($resultado1); 
                                                               do
                                                                {
                                                                    $ret_status = $row['status'];
                                                                    $ret_id = $row['id'];
                                                                    $ret_cod_desc = $row['descricao_cod'];
                                                                    $ret_plaqueta = $row['patrimonio'];
                                                                    $ret_nome = $row['descricao'];
                                                                    $ret_equi_tipo = $row['descricao'];
                                                                    $ret_datalanc = $row['dt_cad'];
                                                                    $ret_tec = $row['usuario'];
                                                                    $ret_cmei_id = $row['local_cod'];
                                                                    $ret_obs = $row['obs'];
                                                                    $ret_ref = $row['ref'];
                                                                    $ret_marca = $row['marca'];
                                                                    $ret_tam = $row['tam'];
                                                                    $ret_posicao = $row['posicao'];
                                                                    $ret_comps = $row['comps'];
                                                                    $ret_tipo = $row['tipo'];
                                                                    $ret_portas = $row['portas'];
                                                                    $ret_por_total = $row['por_total'];
                                                                    $ret_por_util = $row['por_util'];
                                                                    $ret_por_disp = $row['por_disp'];
                                                                    $ret_rede = $row['rede'];
                                                                    $ret_ip = $row['ip'];
                                                                    $ret_gerenciavel = $row['gerenciavel'];
                                                                    $ret_sec_cod = $row['sec_cod'];
                                                                    $ret_ctrl_ti = $row['ctrl_ti'];
                                                                    $ret_resp = $row['resp'];
                                                                     // $unidade = nomedolocal($conn, $ret_cmei_id);
                                                                     // $secretaria = nomedesecretaria($conn, $ret_sec_cod);
                                                                     //} while ($row = mysqli_fetch_assoc($resultado1));
                                                                     // 
                                                                        ?>
                                                                           <tbody>
                                                                            <tr>
                                                                                     <td> <?php echo $ret_status; ?> </td>
                                                                                <td><?php echo " " . $ret_id; ?> </td>
                                                                              <td><?php echo $ret_ctrl_ti; ?></td>
                                                                              <td><?php echo $ret_nome; ?></td>
                                                                              <td><?php echo $ret_marca; ?></td>
                                                                              <td><?php echo $ret_plaqueta; ?></td>
                                                                              <td><?php echo $ret_tipo; ?></td>
                                                                              <td><?php echo $ret_cmei_id . "/" . $ret_sec_cod; ?></td>
                                                                              <td><?php echo $ret_tec; ?></td>
                                                                              <td><?php echo " ";  ?></td>
                                                                           </tr>
                                                                        <?php
                                                                } while ($row = mysqli_fetch_assoc($resultado1));
                                                            ?>
                                                                 </tbody>
                                                                </table>
                                                                </form>

                                                            </div>
     
                                     <div id="menu4" class="tab-pane fade">
                                                               <center> <h3>Alteracoes Regisradas</h3> </center>
                                                                     <table class="rTable">
                                                                        <thead>
                                                                           <tr>
                                                                            <th>Status </th>
                                                                               <th>ID </th>
                                                                            <th>Ctrl_ti</th>
                                                                            <th>Descriçao</th>
                                                                            <th>tabela Id</th>
                                                                            <th>Tabela Cpo</th>
                                                                            <th>Usuario</th>
                                                                            <th>data</th>
                                                                            <th>Outros</th>
                                                                            <th></th>
                                                                           </tr>
                                                                        </thead>
 
                                                                
                                                               
                                                               <?php
                                                               $sql1 = "SELECT * FROM tb_registra order by ctrl_ti  desc ";
                                                               $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                               $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                                               $row = mysqli_fetch_assoc($resultado1);
                                                               //$row = mysqli_fetch_assoc($resultado1); 
                                                               do {
                                                                  // $ret_status = $row['status'];
                                                                   $ret_id = $row['id'];
                                                                   $ret_ctrl_ti = $row['ctrl_ti'];
                                                                   $ret_tabela_id = $row['tabela_id'];
                                                                   $ret_tabela = $row['tabela'];
                                                                   $ret_tabela_cpo = $row['tabela_cpo'];
                                                                   $ret_tabela_dados = $row['tabela_dados'];
                                                                   $ret_usuario = $row['usuario'];
                                                                   $ret_outros = $row['outros'];
                                                                   $ret_data = $row['data'];
                                                                   
                                                                   // $unidade = nomedolocal($conn, $ret_cmei_id);
                                                                   // $secretaria = nomedesecretaria($conn, $ret_sec_cod);
                                                                   //} while ($row = mysqli_fetch_assoc($resultado1));
                                                                   // 
                                                                   ?>
                                                                           <tbody>
                                                                            <tr>
                                                                                     <td> <?php echo "1"; ?> </td>
                                                                                <td><?php echo " " . $ret_id; ?> </td>
                                                                              <td><?php echo $ret_ctrl_ti; ?></td>
                                                                              <td><?php echo $ret_tabela_dados; ?></td>
                                                                              <td><?php echo $ret_tabela_id; ?></td>
                                                                              <td><?php echo $ret_tabela_cpo; ?></td>
                                                                              <td><?php echo $ret_usuario; ?></td>
                                                                              <td><?php echo $ret_data ; ?></td>
                                                                              <td><?php echo "" ?></td>
                                                                              <td><?php echo " "; ?></td>
                                                                           </tr>
                                                                        <?php
                                                               } while ($row = mysqli_fetch_assoc($resultado1));
                                                               ?>
                                                                 </tbody>
                                                                </table>
                                                                </form>

                                                            </div>
     

                                                             <div id="box1a"> </div>
                                                             <div id="box2a"> </div>
                                                             <div id="box3a"> </div>
                                                            <div id="pessoais2">   </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                               </div>
                          </form>                    
                       </body>
                </html>
<?PHP
        