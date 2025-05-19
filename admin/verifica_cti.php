<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun.php";
//$resolucao = ver_res_w();
////$ret_cmei_id = $_GET['id'];
$tipo = $_GET['tipo']; // parametro de tipo de busca em controle_ti
$col = $_GET['col']; // parametro de tipo de busca em controle_ti
$limite = 30; // qtd de linhas 
if ($tipo == "1") 
{
    $query = "select * from tb_controle_ti order by ctrl_ti";
    $dados = mysqli_query($conn, $query);
    $resultadoDaInsercao = mysqli_num_rows($dados);
    $total = mysqli_num_rows($dados);
    echo "<center>".$total."</center>";
    if ($resultadoDaInsercao == '0') {
        echo " <center> Nenhum resultado obtido no controle T.I   </center>";
    } 
    else
    {
        //   $linha = mysqli_fetch_assoc($dados);    
         ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>Cadastro de Equipamentos</title>
                                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                            
                                                                <div class="content-body">    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="actions panel_actions pull-right">     </div>
                                                                        </div>
                                                                <form method="post" action="qrimpressao_zebra.php">    
                                  
                                                                       <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                                                       <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                
                                                                    <div>  
                                                        <h3>Controle CTI  utilizados    <?php echo $total;  ?>  </h3> 
                                         <?php 
                                           $i = 0;
                                            $linha = mysqli_fetch_assoc($dados);
                                              //  echo "<center>" . $total . "</center>";
                                                 //  for ($col = 0; $col <= 2; $col++)
                                                   //   {
                                               do{
                                                           
                                                             $ret_id = $linha['tab_origem'];
                                                            $ret_status = $linha['status'];
                                                            $ctrl_ti = $linha['ctrl_ti'];
                                                            $ret_tab_origem = $linha['tab_origem'];
                                                            $ret_tab_chave = $linha['tab_chave'];
                                                            $ret_tab_cam = $linha['tab_cam'];
                                                            $ret_dtcad = $linha['dt_cad'];
                                                            $ret_tecnico = $linha['tecnico'];
                                                            $ret_descricao = strtoupper($linha['descricao']);
                                                            
                                                        for ($x = 0; $x < $col; $x++) 
                                                          {
                                                                   for ($y = 0; $y < $col; $y++) 
                                                                         {
                                                                          $i = $i + 1;
                                                                             $linha = mysqli_fetch_assoc($dados);
                                                                                $ret_status = $linha['status'];
                                                                                if ($ret_status == 0) {
                                                                                    $ret_status = " Equip.  Excluido ";
                                                                                } else
                                                                                    $ret_status = " Equip.  em Uso  ";

                                                                                $ctrl_ti = $linha['ctrl_ti'];
                                                                                $vis_cti = mascara_cti($ctrl_ti);
                                                                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                                                               if($vis_cti<>"")
                                                                                  echo " <a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                                                          }
                                                                echo "<br>";
                                                 }
                                        } while ($linha = mysqli_fetch_assoc($dados));
                                             
                                              ///echo "<br>";
                                      $queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
                                        $dadosb = mysqli_query($conn, $queryb);
                                        $resultado = mysqli_num_rows($dadosb);
                                        $totalb = mysqli_num_rows($dadosb);
                                        $linhab = mysqli_fetch_assoc($dadosb);
                                       do{
                                                             $ret_ctrl_ti = $linhab['ctrl_ti'];
                                                             $ret_id = $linhab['id'];
                                    } while ($linhab = mysqli_fetch_assoc($dadosb));

                                    $numero = $ret_ctrl_ti;
                                            if ($resultado == '1') {
                                                echo "  <p style=color:RED> < <b> Ultimo Controle Utilizado ". $numero .   "> </b>  </p>  ";
                                                }
                                        
                                             //Select Max(ctrl_ti) from controle_ti

                                        /*   for ($x = 0; $x <= 10; $x++) 
                                        {
                                            for ($y = 0; $y <= 10; $y++) 
                                            {
                                                echo $x. ",". $y . " ";
                                            }
                                            echo "<br>";
                                          }
                                        /*/
                                        ?>
                                </div>
                                <div>
                                 </div>  
                                <br>
                            <div>
                                  <a href="ver_sequencial.php?tipo=1&col=10" title="Verifica SEQUENCIAL CTI EM EQUIP ">Visualiza Sequencial de Equipamentos </a><br />
                                <a href="verifica_cti.php?tipo=2&col=10" title="Verifica CTI nao Utilizados">Verificar Controle NÃO  Utilizados em Equipamentos </a><br />
                                <a href="exibe_exc.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar Controles EXCLUIDOS  em Equipamentos </a><br />
                                   <a href="verifica_cti_lista.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar lista  de  Equipamentos </a><br />
                                 <a href="conversao_manual.php" title="Altera Numeracao de CTI Utilizados">Manutençao de CTI  </a><br />
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
                </body>

                </html>
            <?php      
    }
}
else
{
?>
<style>
.container {

display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
}
.box {
width: 750px;
height: auto;
background: #fff;
}
body {

}
</style>



<?php
include ('index.php');
 echo " <div  class='container'>";
	 echo " <div class='box'>" ;
        echo "<br> <br> <br>";
    
    echo "<h3> Controles não Utilizados  </h3> <br>   ";
    $queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
    $dadosb = mysqli_query($conn, $queryb);
    $resultado = mysqli_num_rows($dadosb);
    $totalb = mysqli_num_rows($dadosb);
    $linhab = mysqli_fetch_assoc($dadosb);
      do
      {
            //$linhab = mysqli_fetch_assoc($dadosb);
            $ret_ctrl_ti = $linhab['ctrl_ti'];
            $ret_id = $linhab['id'];
            //echo $ret_ctrl_ti;
      } while ($linhab = mysqli_fetch_assoc($dadosb));
        $maximo = $ret_ctrl_ti;
        for ($x = 1; $x <= $maximo; $x++)
        {
            $ret = ret_ctrl_ti($conn, $x);
            if($ret==0)
            {
                echo mascara_cti($x) . " -  ";  
            }
       }


        echo "</div> </div>";  




}


