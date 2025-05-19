
<?php
//$ref_ini = $_POST['num_ini'];
//$ref_fim = $_POST['num_fim'];

if (isset($_GET['cti'])) {
    $ref_cti = $_GET['cti'];
} else
    $ref_cti = "";


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


                        input[type=text] {
                            height: 50px;
                            font-family: 'Roboto Medium', sans-serif;
                            width: 10%;
                            box-sizing: border-box;
                            border: 2px solid #ccc;
                            border-radius: 4px;
                            font-size: 25px;
                            background-color: white;
                            background-image: url('img/searchicon.png');
                            background-position: 10px 10px;
                            background-repeat: no-repeat;
                            padding: 30px 30px 40px 40px;
                        }
						/* CSS */
                        .button-48 {
                            appearance: none;
                            background-color: #D92323;
                            border-width: 0;
                            box-sizing: border-box;
                            color: #000000;
                            cursor: pointer;
                            display: inline-block;
                            font-family: Clarkson,Helvetica,sans-serif;
                            font-size: 14px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 1em;
                            margin: 0;
                            opacity: 1;
                            outline: 0;
                            padding: 1.5em 2.2em;
                            position: relative;
                            text-align: center;
                            text-decoration: none;
                            text-rendering: geometricprecision;
                            text-transform: uppercase;
                            transition: opacity 300ms cubic-bezier(.694, 0, 0.335, 1),background-color 100ms cubic-bezier(.694, 0, 0.335, 1),color 100ms cubic-bezier(.694, 0, 0.335, 1);
                            user-select: none;
                            -webkit-user-select: none;
                            touch-action: manipulation;
                            vertical-align: baseline;
                            white-space: nowrap;
                        }

							.button-48:before {
							  animation: opacityFallbackOut .5s step-end forwards;
							  backface-visibility: hidden;
							  background-color: #90B7DE;
							  clip-path: polygon(-1% 0, 0 0, -25% 100%, -1% 100%);
							  content: "";
							  height: 100%;
							  left: 0;
							  position: absolute;
							  top: 0;
							  transform: translateZ(0);
							  transition: clip-path .5s cubic-bezier(.165, 0.84, 0.44, 1), -webkit-clip-path .5s cubic-bezier(.165, 0.84, 0.44, 1);
							  width: 100%;
							}

							.button-48:hover:before {
							  animation: opacityFallbackIn 0s step-start forwards;
							  clip-path: polygon(0 0, 101% 0, 101% 101%, 0 101%);
							}

							.button-48:after {
							  background-color: #FFFFFF;
							}

							.button-48 span {
							  z-index: 1;
							  position: relative;
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
								<h2 class="title pull-left">Informacoes sobre ALTERACOES em Dispositivos   </h2><br />
								
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							
								<form method="post"action="buscador_div_alt.php">
 									<center>
									 <h1> <span class="danger">consultas por </span>  </h1><br /><br />

									<table>
									<tr>
									<td> <input type="radio" name="opcao" checked value="ctrl_TI"/>  </td>  <td><label title="Numero de Controle CTI"> Controle TI</label>  </td>   <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Plaqueta"/> </td> <td><label title="Numero de Patrimonio">Patrimonio</label>  </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="lacre"/> </td> <td><label title="Breve Descricao do Nome do dispositivo ">Lacre TI</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Local"/> </td> <td><label title="Nome do Local do Dispositivo">Local</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Local_Cod"/> </td> <td> <label title="Codigo do Local ">Codigo do Local</label></td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Secretaria"/> </td> <td><label title="Nome da Secretaria"> Secretaria</label></td> <td>&nbsp &nbsp </td> 
								    </tr>
								<tr></tr> <tr></tr>
								   <tr>
									<td><input type="radio" name="opcao" value="Usuarios"/> </td> <td> <label title="Nome do Utilizador do Pc">Usuarios</label></td> <td>&nbsp &nbsp </td> 
								   <td> <input type="radio" name="opcao"  value="Tecnicos"/>  </td>  <td><label title="Nome do Tecnico ">Tecnicos </label>  </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Data"/> </td> <td><label title="Data de Cadastro">Data</label></td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Id"/> </td> <td><label title="ID da tabela tbequip">Identificacao</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Sequencial"/> </td> <td><label title="SEquencia de Inicio e fim para conferencia">Sequencial</label> </td> <td>&nbsp &nbsp </td>
									 <td><input type="radio" name="opcao" value="resp"/> </td> <td> <label title="Visualiza Registros CTI por Responsavel ">Responsavel</label></td> <td>&nbsp &nbsp </td> 
								
								    </tr>
							     <tr></tr> <tr></tr>
									<tr>
									   <td> <input type="radio" name="opcao"  value="pcs"/>  </td>  <td> <label title="Mostra todos os Computadores">Computadores</label>  </td> <td>&nbsp &nbsp </td>	
									<td><input type="radio" name="opcao" value="div"/> </td> <td><label title="Mostra todos os Dispositivos Diversos">Disp. Diversos</label>  </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="mon"/> </td> <td><label title="Mostra todos os Monitores">Monitores</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="swi"/> </td> <td><label title="Mostra todos os Switch">Switch</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="rack"/> </td> <td><label title="Mostra todos os Racks"> Rack</label></td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="tvs"/> </td> <td><label title="Mostra todos as Tvs Cadastradas"> TVs</label></td> <td>&nbsp &nbsp </td> 

									</tr>
								<tr></tr> <tr></tr>
									
									<tr>
									
									<td><input type="radio" name="opcao" value="arm_tp"/> </td> <td><label title="Visualiza Registros por tipo de armazenamento (IDE , SATA_HD , SATA_SSD, NVME , NAS , SCSI)  ">Armazenamento</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="arm_tam"/> </td> <td><label title="Visualiza Registros por tamanho de armazenamento ( INFERIORES , 120GB, 256GB, 512GB, 1TB, 2TB OU ACIMA 2TB)">Tamanho </label></td> <td>&nbsp &nbsp </td> 
								    <td><input type="radio" name="opcao" value="pl_mae"/> </td> <td> <label title="Visualiza Registros tipo Placa Mae "> Placa Mae </label>&nbsp</td> <td>&nbsp &nbsp </td> 
									 <td><input type="radio" name="opcao" value="proc"/> </td> <td> <label title="Visualiza Registros tipo Processador ">Processador</label></td> <td>&nbsp &nbsp </td> 
                                     <td><input type="radio" name="opcao" value="mem_tp"/> </td> <td> <label title="Visualiza Registros tipo Memoria ">Memoria tipo</label></td> <td>&nbsp &nbsp </td> 
									 <td><input type="radio" name="opcao" value="mem_tam"/> </td> <td> <label title="Visualiza Registros tamanho Memoria ">Memoria Tam</label></td> <td>&nbsp &nbsp </td> 
									</tr>
								
								
									
									</table>
									 
							<br /><br />  
							 <input type="text" name="digito" id="digito" value="<?php echo $ref_cti; ?>  "/>
							&nbsp&nbsp 	&nbsp&nbsp 	&nbsp&nbsp 
								<button class="button-48" type="submit"  role="button"><span class="text">Consulta </span></button>

							 		  
							   <br /><br />   <br /><br /> 
							 
							 <a href="newsfeed.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 

							  <a href="visualiza_erros.php" title="SELECIONAR ">Descritivos Erros </a>  <br /><br /> 

						</center>
				</div>
			</form>
</body>
</html>