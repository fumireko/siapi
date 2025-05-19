<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $email_usuario = $_SESSION['email_usuario'];
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
<body >
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
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="listaequip.php" enctype="multipart/form-data">
            <table>
            <tr> 
                
            <div> 
                <td> Região </td>
            </div>    
                <td style="padding:0 15px;">
                <select class="form-control m-bot15" name="regiao">
                <option value="">Geral</option>
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
             $quantidade = 100000;
             $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
             $inicio     = ($quantidade * $pagina) - $quantidade;
             $get= "&regiao=".$_REQUEST['regiao'];
            if($_REQUEST['regiao'] ){
              $sql = "SELECT tbvisitante.visi_id,
              tbvisitante.visi_codcracha,
              tbvisitante.visi_rg,
              tbvisitante.visi_nome,
              tbvisitante.visi_motivo,
              tbvisitante.visi_dataentrada,
              tbvisitante.visi_horaentrada,
              tbvisitante.visi_datasaida,
              tbvisitante.visi_horasaida,
              tbvisitante.visi_status,
              tbvisitante.visi_idusuario,
              tbvisitante.visi_setor,
              tbcmei.tbcmei_id,
              tbcmei.tbcmei_nome
              FROM tbvisitante INNER JOIN tbcmei 
              ON tbvisitante.visi_setor = tbcmei.tbcmei_id   
	          where tbcmei.tbcmei_id = '".$_REQUEST['regiao']."'
  	          ORDER BY visi_id";
              $sql.=" LIMIT ".$inicio.",". $quantidade;
             }else{
                $sql = "SELECT tbvisitante.visi_id,
                tbvisitante.visi_codcracha,
                tbvisitante.visi_rg,
                tbvisitante.visi_nome,
                tbvisitante.visi_motivo,
                tbvisitante.visi_dataentrada,
                tbvisitante.visi_horaentrada,
                tbvisitante.visi_datasaida,
                tbvisitante.visi_horasaida,
                tbvisitante.visi_status,
                tbvisitante.visi_idusuario,
                tbvisitante.visi_setor,
                tbcmei.tbcmei_id,
                tbcmei.tbcmei_nome
                 FROM tbvisitante INNER JOIN tbcmei 
                 ON tbvisitante.visi_setor = tbcmei.tbcmei_id   
		         ORDER BY visi_id LIMIT ". $inicio.','. $quantidade;
  		        }//Executa o SQL
  	            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th>Codigo</th>
                       <th>Cod cracha</th>
                       <th>RG</th>
                       <th>Nome </th>
                       <th>Motivo</th>
                       <th>Data Entrada</th>
                       <th>Hora entrada</th>
                       <th>Data saída</th>
                       <th>Hora saída</th>
                       <th>Status</th>
                       <th>Setor</th>
                       <th>Ação</th>  
            
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;s
                while( $ln = mysql_fetch_assoc($qr) )
                {
                    $data_entrada = $ln['visi_dataentrada'];
                    $dtentrada = implode("/",array_reverse(explode("-",$data_entrada)));

                    $data_saida = $ln['visi_datasaida'];
                    $dtsaida = implode("/",array_reverse(explode("-",$dtsaida)));



                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <td><a href="editaequip.php?visi_id=<?php echo $ln['visi_id'];?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                data-toggle="tooltip" data-original-title="Editar?" 
                data-placement="top"><u class='text-dark'><?php echo $ln['visi_id'];?></u></a></td>
                
                <td><?php echo $ln['visi_codcracha'];?></td>
                <td><?php echo $ln['visi_rg'];?></td>
                <td><?php echo $ln['visi_nome'];?></td>
                <td><?php echo $ln['visi_motivo'];?></td>
                <td><?php echo $dtentrada;?></td>
                <td><?php echo $ln['visi_horaentrada'];?></td>
                <td><?php echo $dtsaida;?></td>
                <td><?php echo $ln['visi_horasaida'];?></td>
                <td><?php echo $ln['visi_status'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                       
                <td><a href="del_equip.php?visi_id=<?php echo $ln['visi_id']?>">Excluir</a></td>
            </tr>
            <?php
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
