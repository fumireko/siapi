<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $id_cmei = $_SESSION['id_unidade'];
// faz consulta no banco de dados
$consulta = mysql_query("SELECT * FROM usuarios where email = '".$email_usuario."'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">SISTEMA DE GESTÃO ESCOLAR<?php
   echo $id_cmei?></h1>                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Dados do aluno</h2>
                                <div class="actions panel_actions pull-right">
                                    <a href='./#/busca_cadaluno' class='btn btn-primary'>Nova busca</a>
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <!-- ********************************************** -->
<div  id="consulta">
<?php
  $quantidade = 100000;
  $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
  $inicio     = ($quantidade * $pagina) - $quantidade;
  $data_convertida = 
  $get= "&nome=".$_REQUEST['nome'];
 
if($_REQUEST['nome'] == ""){
    $sql = "";
}
else{
  if($_REQUEST['nome']){ 
    $sql = "SELECT tbaluno.tbaluno_id,
	tbaluno.tbaluno_nome,
    tbaluno_nmae,
    tbaluno_cpfmae,
    tbaluno_tel,
    celu,
    celular,
    tbaluno.tbaluno_dtnasc,
	tbaluno.tbaluno_turma,
    tbaluno.tbaluno_status
	FROM tbaluno where tbaluno_nome LIKE '%".$_REQUEST['nome']."%'
    ORDER BY tbaluno_id";
    $sql.=" LIMIT ".$inicio.",". $quantidade;

  }else{
  $sql = "SELECT tbaluno.tbaluno_id,
  tbaluno.tbaluno_nome,
  tbaluno_nmae,
  tbaluno_cpfmae,
  tbaluno_tel,
    celu,
    celular,
  tbaluno.tbaluno_dtnasc,
  tbaluno.tbaluno_turma,
  tbaluno.tbaluno_status
    FROM tbaluno ORDER BY tbaluno_id LIMIT ". $inicio.','. $quantidade;
  }
  }//Executa o SQL
  $qr  = mysql_query($sql) or die(mysql_error());
  ?>
</p>
<table id="example" class="display" cellspacing="0" width="100%">
											<thead>
                                                <tr>
                                                   <th>CodAluno</th>
                                                   <th>Nome</th>
                                                   <th>CPF</th>
                                                   <th>Nome mãe</th>
                                                   <th>Telefones</th>
                                                   <th>Status aluno</th>
                                                   <th>Data nasc</th>
                                                   <th>Turma</th>
                                                   
                                                 </tr>
                                            </thead>
<tbody>
<?php
  $i=0;
  $ordem=0;
  while( $ln = mysql_fetch_assoc($qr) ){
    $ordem++;
	$dtcad = $ln['tbfila_dtacad'];
	$nac= $ln['tbaluno_dtnasc'];
	$dtran = $ln['dtatrans'];
	$datnasc = implode("/",array_reverse(explode("-",$nac))); 
	$datatran = implode("/",array_reverse(explode("-",$dtran)));
	 $i++;
	$style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
	
  ?>

    <tr>
    <td><a href="../admin/alteraaluno.php?tbaluno_id=<?php echo $ln['tbaluno_id'];?>" 
                                            rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                                            data-toggle="tooltip" data-original-title="Alterar cadastro?" 
                                            data-placement="top"><u class='text-dark'><?php echo $ln['tbaluno_id'];?></u></a></td>
      <td><?php echo $ln['tbaluno_nome'];?></td>
      <td><?php echo $ln['tbaluno_cpfmae'];?></td>
      <td><?php echo $ln['tbaluno_nmae'];?></td>
      <td><?php echo $ln['tbaluno_tel'];?>  <?php echo $ln['celu'];?> | <?php echo $ln['celular'];?></td>
      <td align="center" ><?php echo $ln['tbaluno_status'];?></td>
      <td align="center" ><?php echo $datnasc;?></td>
      <td align="center" ><?php echo $ln['tbaluno_turma'];?></td>
    </tr>
    <?php
  }
  ?>
  </tbody>
</table>

                                        <!-- ********************************************** -->
                                    </div>
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
