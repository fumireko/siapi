<?php
include "../validar_session.php"; 
include "../Config/config_sistema.php";
$nome_usuario = $_SESSION['nome_usuario'];
header('Content-Type: text/html; charset=utf-8');
//include_once  "./atualiza.php";
?>
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Documentação legal</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">         

                    <html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Celke</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript">
		
		</script>
	</head>
    <?php  $get= "&nome=".$dt;
    if($dt)
         {
            $sql = "SELECT * FROM tbaluno where tbaluno_dtnasc = '".$dt."'  ORDER BY tbaluno_nome";
            //$sql.=" LIMIT ".$inicio.",". $quantidade;
        }
        else
            {
                $sql = "SELECT * FROM tbaluno  ORDER BY tbaluno_id DESC LIMIT 10";
            }//Executa o SQL
            $qr  = mysql_query($sql) or die(mysql_error());
    ?>
	<body>
		<h1>Listar usuários</h1>
		<table id="listar-usuario" class="display" style="width:100%">
			<thead>
                <tr> <th>Codigo</th><th>Nome</th><th>Nome da mae</th><th>Status</th><th>Dt nasc</th><th>Acao</th>    </tr>
			
			</thead>
        <tr>
        <?php 
        $i=0;
        while( $ln = mysql_fetch_assoc($qr) )
        {
          $i++;
          $data = $ln['tbaluno_dtnasc'];
          $dt = implode("/",array_reverse(explode("-",$data)));
          
        ?>
        </tr>
        <tr>
            <td> <?php echo $ln['tbaluno_id'];?></td>
            <td> <?php echo $ln['tbaluno_nome'];?></td>
            <td> <?php echo $ln['tbaluno_nmae'];?></td>
            <td> <?php echo $ln['tbaluno_status'];?></td>
            <td> <?php echo $ln['tbaluno_nome'];?></td>
            <td> <a href="../admin/filaespera.php?tbaluno_id=<?php echo $ln['tbaluno_id'];?>&Status=<?php echo $ln['tbaluno_status'];?>">Incluir</a>      
      </td>
        </tr>
		</table>
        <?php
  }
  ?>		
	</body>
</html>


                    </div>
                </div>
            </div>
        </section>
    </div>
</section>