<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $email_usuario = $_SESSION['email_usuario'];
   $unidade_usuario = $_SESSION['unidade_usuario'];
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
            <form id="form1" name="form1" method="post" action="frmminhassolcitacoes.php" enctype="multipart/form-data">
            <table>
            <tr> 
                
            <div> 
                <td> Status </td>
            </div>    
                <td style="padding:0 15px;">
                <select class="form-control m-bot15" name="status">
                  <option></option>
                  <option>Atendendo</option>
                  <option>Finalizado</option>
                  <option>Pendente</option>
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
  $get= "&status=".$_REQUEST['status'];
  if($_REQUEST['status'] ){
    $sql = "SELECT tbldados.id_dados,
	tbldados.data,
	tbldados.telefone,
	tbldados.nsolicitante,
    tbldados.regiao,
    tbldados.tpservico,
	tbldados.id_setor,
	tbldados.prob,
	tbldados.solucao,
	tbldados.status,
    tbldados.tecnico,
    tbldados.hora,
    tbldados.dtafin,
	tbldados.id_sec,
	tbsecretaria.sec_id,
	tbsecretaria.sec_nome,
	tbcmei.tbcmei_id,
	tbcmei.tbcmei_nome
	from tbldados 
	inner Join tbsecretaria
	On tbsecretaria.sec_id = tbldados.id_sec 
	Inner Join tbcmei
	ON tbcmei.tbcmei_id = tbldados.id_setor  
	where tbldados.status LIKE '%".$_REQUEST['status']."%'
    and tbcmei.tbcmei_id = '$unidade_usuario'
	ORDER BY id_dados";
   $sql.=" LIMIT ".$inicio.",". $quantidade;
  }else{
  		$sql = "SELECT tbldados.id_dados,
		tbldados.data,
		tbldados.telefone,
        tbldados.regiao,
        tbldados.tpservico,
		tbldados.nsolicitante,
		tbldados.id_setor,
		tbldados.prob,
		tbldados.solucao,
		tbldados.status,
        tbldados.tecnico,
        tbldados.hora,
        tbldados.dtafin,
		tbldados.id_sec,
		tbsecretaria.sec_id,
		tbsecretaria.sec_nome,
		tbcmei.tbcmei_id,
		tbcmei.tbcmei_nome
		from tbldados 
		inner Join tbsecretaria
		On tbsecretaria.sec_id = tbldados.id_sec 
		Inner Join tbcmei
		ON tbcmei.tbcmei_id = tbldados.id_setor  
		where tbcmei.tbcmei_id = '$unidade_usuario'
		ORDER BY id_dados LIMIT ". $inicio.','. $quantidade;
  		}//Executa o SQL
  	$qr  = mysql_query($sql) or die(mysql_error());
      ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       <th></th>
                       <th>Cod</th>
                       <th>Data aber</th>
                       <th>Data fim</th>
                       <th>Tp serviço</th>
                       <th>Nome</th>
                       <th>Problema</th>
                       <th>Status</th>
                       <th>Atendente</th>
                       <th>Solucao</th>  
                                   
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysql_fetch_assoc($qr) )
                {
                    
                    $data_aber = $ln['data'];
                    $dtaab= implode("/",array_reverse(explode("-",$data_aber)));
                    $data_fim = $ln['dtafin'];
                    $datafin = implode("/",array_reverse(explode("-",$data_fim)));
                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <td></td>

                <td><a href="../aqui-vai-a-pagina?demanda_id=<?php echo $ln['id_dados'];?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                data-toggle="tooltip" data-original-title="Editar?" 
                data-placement="top"><u class='text-dark'><?php echo $ln['id_dados'];?></u></a></td>


                <td><?php echo $dtaab;?></td>
                <td><?php echo $datafin;?></td>
                <td><?php echo $ln['tpservico'];?></td>
                <td><?php echo $ln['nsolicitante'];?></td>
                 <td><?php echo $ln['prob'];?></td>
                <td><?php echo $ln['status'];?></td>
                <td><?php echo $ln['tecnico'];?></td>
                <td><a href="mdetalhe.php?id_dados=<?php echo $ln['id_dados']?>">Visualizar</a></td>
                             
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
