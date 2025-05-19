
<?php
//$ref_ini = $_POST['num_ini'];
//$ref_fim = $_POST['num_fim'];


?>

<!DOCTYPE html >

					<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">

						<head>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						<title>SMTI - Sistema de Gestao T.I</title>
						</head>
					<style>
						body {
							background-image: url("img/siapi.jpg");
						 
							background-position: center;
							background-repeat: no-repeat;
							background-size: cover;
							position: relative;
						}
						label {
							font-family: 'Roboto Medium', sans-serif;
							font-size: 25px;
							color: #000;
							font-weight: 500;
						}
						input[type=text] {
							height: 30px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
						}
						  span {
							 font-size: 18px;
							 font-weight: 600;
							 color: white;
							 padding: 8px;
						  }
						  .success {
							 background-color: #4caf50;
						  }
						  .info {
							 background-color: #2196f3;
						  }
						  .warning {
							 background-color: #ff9800;
						  }
						  .danger {
							 background-color: #f44336;
						  }
						  .other {
							 background-color: #e7e7e7;
							 color: black;
						  }
						
						
					 </style>
						<!-- BEGIN BODY -->
						<body>
							 <!-- START TOPBAR -->
						  <div id="main-content">
						  <section class="wrapper main-wrapper">
						   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
							<div class="page-title">
							 <div class="pull-left">
							   <center>
								<br /><br />
								  <h1 class="title"></h1>
								</center>
							 </div>
							</div>
						   </div>
						 <div class="clearfix"></div>
						<section class="box ">
							<header class="panel_header">
							   <center>
								<br /><br /><br /><br />
								<h2 class="title pull-left"> GESTAO DE TI </h2>
								<h2 class="title pull-left">Busca Informaçoes sobre Computadores   </h2><br />
								
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							
								<form method="post"action="buscador.php">
 									<center>
									 <h1> <span class="success">Checagem de Identificaçao</span>  </h1>

									  <input type="radio" name="opcao" value="id"/>ID do PC
												<input type="radio" name="opcao" value="Plaqueta"/> Plaqueta do PC
												<input type="radio" name="opcao" value="Nome"/>Nome Desktop<br /><br />

									  <input type="text" name="digito" id="digito" value=""/>

								 <input type="submit" name="button1"
												class="button" value=" consulta" />
										  
									   <br /><br /> 
								 
									 <a href="newsfeed.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 
									</center>
									</div>
							</form>

</body>
</html>