<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $status = $_REQUEST['status'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SISTEMA DE GESTÃO T.I</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php 
       include "index.php"
    ?> 
        <!-- aqui termina o menu -->
         <div id="main-content">

        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Computadores</h2>
                    
        </header>
         <!-- Dados do atendimento-->
            <tr> 
                <td> <a id="gerarExcel" href="excel_equip.php?" class="btn btn-primary">Gerar Relatório</a> </td>
                
            </tr>
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="listaequip.php" enctype="multipart/form-data">
            <table>
            <tr> 
            <div> 
                <td> Unidade </td>
            </div>    
                <td style="padding:0 15px;">
                <select class="form-control m-bot15" name="status">
                <option value="Geral">Geral</option>
			      <?php
			           $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
			           $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                        while($row = mysql_fetch_array($resultado))
			 {
    	    	$selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome'])?'selected':'';
			?>
             <option value="<?php echo $row['tbcmei_id'];?>"<?php echo $selected; ?>>
            <?php echo $row['tbcmei_nome']; ?></option>
            <?php 
            }
             ?>

            </select>
                </td>
                <td>
                    <input type="submit" name="btnPESQUISAR" id="btnPESQUISAR" class="btn btn-primary" value="Localizar" />
                </td>
            </tr> 
            </form>
            <?php
            if ($_REQUEST['status'] == 'Geral')
            {
            $quantidade = 100000;
            $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio     = ($quantidade * $pagina) - $quantidade; 
            $sql = "select tbequip.tbequip_id,
            tbequip.tbequip_plaqueta,
            tbequip.tbequip_monitor,
            tbequip.tbequi_mod,
            tbequip.tbequip_so,
            tbequip.tbequi_modplaca,
            tbequip.tbequi_memoria,
            tbequip.tbequi_modelomemoria,
            tbequip.tbequi_armazenamento,
            tbequip.tbequi_tparmazenamento,
            tbequip.tbequi_teclado,
            tbequip.tbequi_mouse,
            tbequip.tbequi_filtrodelinha,
            tbcmei.tbcmei_id,
            tbcmei.tbcmei_nome
            FROM tbequip INNER JOIN tbcmei 
            ON tbequi_tbcmei_id = tbcmei.tbcmei_id 
            where tbcmei.tbcmei_id = '$status'";
              
            $sql.=" LIMIT ".$inicio.",". $quantidade;
            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Plaqueta</th>
                       <th>Desc Proc</th>
                       <th>Desc Placa</th>
                       <th>Setor</th>
                       <th>Monitor</th>
                       <th>Memoria</th>
                       <th>Tipo de memoria</th>
                       <th>Espaço em disco</th>
                       <th>Tipo de disco</th>
                       <th>Estado teclado</th>
                       <th>Estado mouse</th>   
                       <th>Estado filtro</th> 
                       <th>Ação</th>  
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysql_fetch_assoc($qr) )
                {
                    $data_lanc = $ln['tbequi_datalanc'];
                    $dtlanc = implode("/",array_reverse(explode("-",$data_lanc)));
                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <td><a href="editaequip.php?tbequip_id=<?php echo $ln['tbequip_id'];?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                data-toggle="tooltip" data-original-title="Editar?" 
                data-placement="top"><u class='text-dark'><?php echo $ln['tbequip_id'];?></u></a></td>
                <td><?php echo $ln['tbequip_plaqueta'];?></td>
                <td><?php echo $ln['tbequi_mod'];?></td>
                <td><?php echo $ln['tbequi_modplaca'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                <td><?php echo $ln['tbequip_monitor'];?></td>
                <td><?php echo $ln['tbequi_memoria'];?></td>
                <td><?php echo $ln['tbequi_modelomemoria'];?></td>
                <td><?php echo $ln['tbequi_armazenamento'];?></td>
                <td><?php echo $ln['tbequi_tparmazenamento'];?></td>
                <td><?php echo $ln['tbequi_teclado'];?></td>
                <td><?php echo $ln['tbequi_mouse'];?></td>
                <td><?php echo $ln['tbequi_filtrodelinha'];?></td>
                <td><a href="del_equip.php?tbequip_id=<?php echo $ln['tbequip_id']?>">Excluir</a></td>
            </tr>
            <?php
                }  
            }

                else    
                    {
                     $status= $_REQUEST['status'];
                     echo $status;
                     header("Location:listaequipsetor?status=$"); 
                    }
            ?>    
            </tbody>                              
        </table>
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>
