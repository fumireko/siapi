<?php
//include "bco_fun.php";
include "../validar_session_off.php";  


$retorno = $_GET['tbequip_id'];

$tp_equip=substr ($retorno, 0, 1);

$tbequip_id=substr ($retorno, 1);

//echo "Equipamento tipo ".$tp_equip;
//echo "<br> Equipamento Codigo ".$tbequip_id;

  
	if ($tp_equip=="C")  // visualiza Computadores
	 {
			$sql = "SELECT tbequip.tbequip_id,
			tbequip.tbequip_plaqueta,
			tbequip.tbequip_monitor,
			tbequip.tbequi_mod,
			tbequip.tbequi_modplaca,
			tbequip.tbequi_memoria,
			tbequip.tbequi_modelomemoria, 
			tbequip.tbequi_armazenamento,	 
			tbequip.tbequi_tparmazenamento,
			tbequip.tbequi_datalanc,
			tbequip.tbequi_teclado,
			tbequip.tbequi_mouse,
			tbequip.tbequi_filtrodelinha,
			tbequip.tbequi_tecnico,
			tbequip.tbequi_tbcmei_id,
			tbcmei.tbcmei_id,
			tbcmei.tbcmei_nome,
			tbequip.tbequi_nome,
			tbequip.tbequi_arm_sec,
			tbequip.tbequi_arm_sectam,
			tbequip.tbequi_slots,
			tbequip.tbequi_slots_uso,
			tbequip.tbequip_so,
			tbequip.tbequi_so_arq,
			tbequip.tbequi_app,
			tbequip.tbequi_app_out,
			tbequip.tbequi_obs,
			tbequip.tbequi_tipo
			FROM tbequip INNER JOIN tbcmei 
			ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
			where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";
			//$qr = mysql_query($sql) or die(mysql_error());
			$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
			//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
			//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
			$ln = mysqli_fetch_assoc($qr);
			do {
				$unidade_id = $ln['tbcmei_id'];
				$nomeunidade = $ln['tbcmei_nome'];
				$codequip = $ln['tbequip_id'];
				$dtlan = $ln['tbequi_datalanc'];
				$datalanc = implode("/", array_reverse(explode("-", $dtlan)));

				//}
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
					height: 80px;
					font-family: 'Roboto Medium', sans-serif;
					font_size: 80px;
				}


			</style>


				<!-- BEGIN BODY -->
				<body>
					 <!-- START TOPBAR -->
					<?php
					//  include "index_eng.php"
					?> 
			   
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
					<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $codequip; ?></h2><br />
				   <a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
					<div class="form-group  col-md-6">
						</div>
						<div class="actions panel_actions pull-right">
							 
							 <i class="box_toggle fa fa-chevron-down"></i>
							 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
							 <i class="box_close fa fa-times"></i>
						</div>
				</center> 
				</header>

				<form class="form-horizontal" method="POST" id="sdev" action="">
			  
					<br />
					   <div>
						   <center>
						   <label for="name"> Equipamento :</label>
							   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['tbequi_nome'] ?> "  disabled >
						   <label for="name">Patrimonio:</label>
							   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['tbequip_plaqueta'] ?> disabled >
						
						 <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
						 
					
						<input type="text" name="secretaria" size=48 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['tbequi_tbcmei_id']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
				   <br /> 
					   <input type="text" name="local" size=48 value="<?php echo nomedolocal($conn, $ln['tbequi_tbcmei_id']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
				   <label for="name">Tipo Equipamento : </\label>
					  <input type="text"  name="equip_tipo" size=10 value="<?php echo $ln['tbequi_tipo']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled  > 
						 
				  <br /> <br />  <label for="name"> SO : </\label>
					   <input type=text name="sistema" size=20   value= "<?php echo $ln['tbequip_so']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
						 <input type=text name="sistema_arq" size=10 value="<?php echo $ln['tbequi_so_arq']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled ><br /><br />

					<label for="name"> Placa Mae :</\label> 
						  <input type=text name="processador_tipo"  size=35 value= "<?php echo $ln['tbequi_modplaca']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
					<label for="name"> Processador :</\label> 
						<input type="text" name="processador" size=35 value="<?php echo $ln['tbequi_mod']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
						  
						  <label for="name"> Memoria : </\label>
							  <input type=text name="memoria"  size =10 value= "<?php echo $ln['tbequi_memoria']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled >
							  <input type=text name="memoria_qtd"  size=4 value= <?php echo $ln['tbequi_modelomemoria']; ?> style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
						<br> <br>   <label for="name"> HD  : </\label>
							   <input type=text name="hd" size=9 value="<?php echo $ln['tbequi_armazenamento']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
							  <input type=text name="hd_tipo"  size=4 value= <?php echo $ln['tbequi_tparmazenamento'] ?>  style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled> <br />  <br />     
						 <label for="name"> Monitor  :</\label> 
							 <input type=text name="monitor" size=28 value= "<?php echo $ln['tbequip_monitor'] ?> "style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled   > <br /><br />
						<label for="name"> Obs. :</\label>
							<input type=text name="observacao" size=30 value="<?php echo $ln['tbequi_obs'] ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br />  <br />           <br />  <br />  
						 <label> Cadastrado em  :  "<?php echo $ln['tbequi_datalanc'].' / '. $ln['tbequi_tecnico'] ?>"  </label>  <br />  <br />   
						<a href= 'https:\\portal.colombo.pr.gov.br\siapi\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
			</center>
					</div>
				  </form>
						   <?php
								} while ($ln = mysqli_fetch_assoc($qr));
							 ?>
				</section> 
				</section>   
				</div>
				</body>

				</html>
	<?php
     }
	else
	{
		if ($tp_equip=="I")  // visualiza Impressoras 
		{
				$sql = "SELECT tb_diversos.id,
					tb_diversos.descricao,
					tb_diversos.descricao_cod,
					tb_diversos.patrimonio,
					tb_diversos.dt_cad,
					tb_diversos.marca,
					tb_diversos.tam,
					tb_diversos.posicao, 
					tb_diversos.comps,	 
					tb_diversos.tipo,
					tb_diversos.portas,
					tb_diversos.por_total,
					tb_diversos.por_util,
					tb_diversos.por_disp,
					tb_diversos.rede,
					tb_diversos.ip,
					tb_diversos.gerenciavel,
					tb_diversos.obs,
					tb_diversos.usuario,
					tb_diversos.local_cod,
					tb_diversos.sec_cod,
					tbcmei.tbcmei_id,
					tbcmei.tbcmei_nome,
					tbcmei.tbcmei_cep,
					tbcmei.tbcmei_coord
					FROM tb_diversos INNER JOIN tbcmei 
					ON tb_diversos.local_cod = tbcmei.tbcmei_id
					where tb_diversos.id = '$id' ";
					//$qr = mysql_query($sql) or die(mysql_error());
					$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
					//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
					//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
					$ln = mysqli_fetch_assoc($qr);
					do {
						$unidade_id = $ln['tbcmei_id'];
						$nomeunidade = $ln['tbcmei_nome'];
						$codequip = $ln['tb_diversos.id'];
						$dtlan = $ln['tb_diversos.dt_cad'];
						$datalanc = implode("/", array_reverse(explode("-", $dtlan)));

						//}
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
							height: 80px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
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
								<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $codequip; ?></h2><br />
								<a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							<form class="form-horizontal" method="POST" id="sdev" action="">
										<br />
									<div>
								   <center>
									<label for="name"> Equipamento :</label>
									   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['tbequi_nome'] ?> "  disabled >
								   <label for="name">Patrimonio:</label>
									   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['tbequip_plaqueta'] ?> disabled >
									   <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
										<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['tbequi_tbcmei_id']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
									<br /> 
									<input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['tbequi_tbcmei_id']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
									<label for="name">Tipo Equipamento : </\label>
									<input type="text"  name="equip_tipo" size=10 value="<?php echo $ln['tbequi_tipo']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled  > 
									   <br /> <br />  <label for="name"> SO : </\label>
									<input type=text name="sistema" size=20   value= "<?php echo $ln['tbequip_so']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<input type=text name="sistema_arq" size=10 value="<?php echo $ln['tbequi_so_arq']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled ><br /><br />
									<label for="name"> Placa Mae :</\label> 
									<input type=text name="processador_tipo"  size=35 value= "<?php echo $ln['tbequi_modplaca']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
									<label for="name"> Processador :</\label> 
									<input type="text" name="processador" size=35 value="<?php echo $ln['tbequi_mod']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
									  <label for="name"> Memoria : </\label>
									  <input type=text name="memoria"  size =10 value= "<?php echo $ln['tbequi_memoria']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled >
									  <input type=text name="memoria_qtd"  size=4 value= <?php echo $ln['tbequi_modelomemoria']; ?> style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<label for="name"> HD  : </\label>
									   <input type=text name="hd" size=9 value="<?php echo $ln['tbequi_armazenamento']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									  <input type=text name="hd_tipo"  size=4 value= <?php echo $ln['tbequi_tparmazenamento'] ?>  style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled> <br />  <br />     
									 <label for="name"> Monitor  :</\label> 
									 <input type=text name="monitor" size=28 value= "<?php echo $ln['tbequip_monitor'] ?> "style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled   > <br /><br />
									<label for="name"> Obs. :</\label>
									<input type=text name="observacao" size=30 value="<?php echo $ln['tbequi_obs'] ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br />  <br />           <br />  <br />  
									<label> Cadastrado em  :  "<?php echo $ln['tbequi_datalanc'].' / '. $ln['tbequi_tecnico'] ?>"  </label>  <br />  <br />  <br />  <br />  
									<a href= 'https:\\portal.colombo.pr.gov.br\siap\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
									</center>
									</div>
							</form>
									<?php
										} while ($ln = mysqli_fetch_assoc($qr));
									 ?>
								</section> 
								</section>   
								</div>
								</body>
							</html>
      <?php		
	    }
		 else
		 {
		 if ($tp_equip=="M")  // visualiza Monitor
		  {
					$sql = "SELECT tb_monitores.id,
					tb_monitores.id_equip,
					tb_monitores.mon_marca,
					tb_monitores.mon_tam,
					tb_monitores.mon_plaqueta,
					tb_monitores.mon_tipo,
					tb_monitores.data,
					tb_monitores.mon_saida, 
					tb_monitores.usuario,	 
					tbequip.tbequip_id,
					tbequip.tbequi_tbcmei_id,
					tbequip.tbequi_tecnico,
					tbequip.tbequip_plaqueta
					FROM tb_monitores INNER JOIN tbequip 
					ON tb_monitores.id_equip = tbequip.tbequip_id
					where tb_monitores.id = '$tbequip_id' ";
					$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
					$ln = mysqli_fetch_assoc($qr);
					do {
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
							height: 80px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
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
								<br /><br /><br /><br /> <br />  <br />  
								<h2 class="title pull-left"> GESTAO DE TI </h2>
								<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $tbequip_id; ?></h2><br />
								<a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							<form class="form-horizontal" method="POST" id="sdev" action="">
										<br />
									<div>
								   <center>
									<br />  <br />   <label for="name"> Equipamento :</label>
									   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= " MONITOR "  disabled >
								 <br /><br />  <label for="name">Patrimonio:</label>
									   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['mon_plaqueta'] ?> disabled >
									   <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
										<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['tbequi_tbcmei_id']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
									<br /> 
									<input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['tbequi_tbcmei_id']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
								           <br />  <br />  	<label for="name">Marca : </\label>
									<input type="text"  name="equip_tipo" size=10 value="<?php echo $ln['mon_marca']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled  > 
									<br />  <br />   <label for="name"> Tam : </\label>
									<input type=text name="sistema" size=5   value= "<?php echo $ln['mon_tam']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<br /> <br />
									<label for="name"> Tipo Tela :</\label> 
									<input type=text name="processador_tipo"  size=15 value= "<?php echo $ln['mon_tipo']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
									<label for="name"> PC Associado  :</\label> 
									<input type="text" name="processador" size=10 value="<?php echo $ln['tbequip_id']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<br />  <br />    <label for="name"> Plaqueta PC : </\label>
									  <input type=text name="memoria"  size =10 value= "<?php echo $ln['tbequip_plaqueta']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled >
									           <br />  <br />             <br />  <br />  
								<i>	 Cadastrado em  :  "<?php echo $ln['data'].' / '. $ln['tbequi_tecnico'] ?>"   </i> <br />  <br />  <br />  <br />  
									<a href= 'https:\\portal.colombo.pr.gov.br\siapi\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
									</center>
									</div>
							</form>
									<?php
										} while ($ln = mysqli_fetch_assoc($qr));
									 ?>
								</section> 
								</section>   
								</div>
								</body>
							</html>
      <?php		
	      }
		   else
		   {
			if ($tp_equip=="R")  // visualiza Rack
		     {
			$sql = "SELECT tb_diversos.id,
					tb_diversos.descricao,
					tb_diversos.descricao_cod,
					tb_diversos.patrimonio,
					tb_diversos.dt_cad,
					tb_diversos.marca,
					tb_diversos.tam,
					tb_diversos.posicao, 
					tb_diversos.comps,	 
					tb_diversos.tipo,
					tb_diversos.portas,
					tb_diversos.por_total,
					tb_diversos.por_util,
					tb_diversos.por_disp,
					tb_diversos.rede,
					tb_diversos.ip,
					tb_diversos.gerenciavel,
					tb_diversos.obs,
					tb_diversos.usuario,
					tb_diversos.local_cod,
					tb_diversos.sec_cod,
					tbcmei.tbcmei_id,
					tbcmei.tbcmei_nome,
					tbcmei.tbcmei_cep,
					tbcmei.tbcmei_coord
					FROM tb_diversos INNER JOIN tbcmei 
					ON tb_diversos.local_cod = tbcmei.tbcmei_id
					where tb_diversos.id = '$tbequip_id' ";
					//$qr = mysql_query($sql) or die(mysql_error());
					$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
					//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
					//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
					$ln = mysqli_fetch_assoc($qr);
					do {
						
						
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
							height: 80px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
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
								<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $tbequip_id; ?></h2><br />
								<a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							<form class="form-horizontal" method="POST" id="sdev" action="">
										<br />
									<div>
								   <center>
									<label for="name"> Equipamento :</label>
									   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['descricao'] ?> "  disabled >
								   <label for="name">Patrimonio:</label>
									   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['patrimonio'] ?> disabled >
									   <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
										<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['sec_cod']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
									<br /> 
									<input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['local_cod']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
										
									    <label for="name"> Instalação  : </\label>
									<input type=text name="sistema" size=20   value= "<?php echo $ln['posicao']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<br /><br />  
									<label for="name"> Componentes Inclusos :</\label> <br /> 
									<input type=text name="processador_tipo"  size=45 value= "<?php echo $ln['comps']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
									<label for="name"> Obs :</\label> 
									<input type="text" name="processador" size=35 value="<?php echo $ln['obs']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
									       <br />  <br />  
									<label> Cadastrado em  :  "<?php echo $ln['dt_cad'].' / '. $ln['usuario'] ?>"  </label>  <br />  <br />  <br />  <br />  
									<a href= 'https:\\portal.colombo.pr.gov.br\siapi\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
									</center>
									</div>
							</form>
									<?php
										} while ($ln = mysqli_fetch_assoc($qr));
									 ?>
								</section> 
								</section>   
								</div>
								</body>
							</html>
      <?php	
		         }
		     else
		      {
			   if ($tp_equip=="S") // visualiza Switch
		       {
							$sql = "SELECT tb_diversos.id,
					tb_diversos.descricao,
					tb_diversos.descricao_cod,
					tb_diversos.patrimonio,
					tb_diversos.dt_cad,
					tb_diversos.marca,
					tb_diversos.tam,
					tb_diversos.posicao, 
					tb_diversos.comps,	 
					tb_diversos.tipo,
					tb_diversos.portas,
					tb_diversos.por_total,
					tb_diversos.por_util,
					tb_diversos.por_disp,
					tb_diversos.rede,
					tb_diversos.ip,
					tb_diversos.gerenciavel,
					tb_diversos.obs,
					tb_diversos.usuario,
					tb_diversos.local_cod,
					tb_diversos.sec_cod,
					tbcmei.tbcmei_id,
					tbcmei.tbcmei_nome,
					tbcmei.tbcmei_cep,
					tbcmei.tbcmei_coord
					FROM tb_diversos INNER JOIN tbcmei 
					ON tb_diversos.local_cod = tbcmei.tbcmei_id
					where tb_diversos.id = '$tbequip_id' ";
					//$qr = mysql_query($sql) or die(mysql_error());
					$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
					//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
					//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
					$ln = mysqli_fetch_assoc($qr);
					do {
						
						
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
							height: 80px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
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
								<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $tbequip_id; ?></h2><br />
								<a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							<form class="form-horizontal" method="POST" id="sdev" action="">
										<br />
									<div>
								   <center>
									<label for="name"> Equipamento :</label>
									   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['descricao'] ?> "  disabled >
								   <label for="name">Patrimonio:</label>
									   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['patrimonio'] ?> disabled >
									   <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
										<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['sec_cod']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
									<br /> 
									<input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['local_cod']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
									
									<br /><br />  
									<label for="name"> Informações  Portas </\label> <br />  <br />
									<label for="name"> Portas Totais  </\label> &nbsp &nbsp &nbsp &nbsp  <label for="name"> Portas Utilizadas </\label> &nbsp &nbsp &nbsp  &nbsp <label for="name"> Portas Livres  </\label> <br /> 
									<input type=text name="processador_tipo"  size=5 value= "<?php echo $ln['comps']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled >   
									&nbsp &nbsp &nbsp &nbsp <input type=text name="processador_tipo"  size=5 value= "<?php echo $ln['comps']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									&nbsp &nbsp &nbsp &nbsp <input type=text name="processador_tipo"  size=5 value= "<?php echo $ln['comps']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br><br>
									<br />   
									<label for="name"> Gerenciavel  :</\label> <br>
									<input type="text" name="processador" size=5 value="<?php echo $ln['gerenciavel']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
							      <br />  <br />  
									
									<label for="name"> Obs :</\label> 
									<input type="text" name="processador" size=35 value="<?php echo $ln['obs']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
									       <br />  <br />  
									<label> Cadastrado em  :  "<?php echo $ln['dt_cad'].' / '. $ln['usuario'] ?>"  </label>  <br />  <br />  <br />  <br />  
									<a href= 'https:\\portal.colombo.pr.gov.br\siapi\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
									</center>
									</div>
							</form>
									<?php
										} while ($ln = mysqli_fetch_assoc($qr));
									 ?>
								</section> 
								</section>   
								</div>
								</body>
							</html>
      <?php	
	
	           }
		        else
		        {
					if ($tp_equip=="T")  // visualiza Tablet
				    {
								$sql = "SELECT tbequip.tbequip_id,
			tbequip.tbequip_plaqueta,
			tbequip.tbequip_monitor,
			tbequip.tbequi_mod,
			tbequip.tbequi_modplaca,
			tbequip.tbequi_memoria,
			tbequip.tbequi_modelomemoria, 
			tbequip.tbequi_armazenamento,	 
			tbequip.tbequi_tparmazenamento,
			tbequip.tbequi_datalanc,
			tbequip.tbequi_teclado,
			tbequip.tbequi_mouse,
			tbequip.tbequi_filtrodelinha,
			tbequip.tbequi_tecnico,
			tbequip.tbequi_tbcmei_id,
			tbcmei.tbcmei_id,
			tbcmei.tbcmei_nome,
			tbequip.tbequi_nome,
			tbequip.tbequi_arm_sec,
			tbequip.tbequi_arm_sectam,
			tbequip.tbequi_slots,
			tbequip.tbequi_slots_uso,
			tbequip.tbequip_so,
			tbequip.tbequi_so_arq,
			tbequip.tbequi_app,
			tbequip.tbequi_app_out,
			tbequip.tbequi_obs,
			tbequip.tbequi_tipo
			FROM tbequip INNER JOIN tbcmei 
			ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
			where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";
			//$qr = mysql_query($sql) or die(mysql_error());
			$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
			//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
			//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
			$ln = mysqli_fetch_assoc($qr);
			do {
				$unidade_id = $ln['tbcmei_id'];
				$nomeunidade = $ln['tbcmei_nome'];
				$codequip = $ln['tbequip_id'];
				$dtlan = $ln['tbequi_datalanc'];
				$datalanc = implode("/", array_reverse(explode("-", $dtlan)));

				//}
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
					height: 80px;
					font-family: 'Roboto Medium', sans-serif;
					font_size: 80px;
				}
			</style>

				<!-- BEGIN BODY -->
				<body>
					 <!-- START TOPBAR -->
					<?php
					//  include "index_eng.php"
					?> 
			   
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
					<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $codequip; ?></h2><br />
				   <a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
					<div class="form-group  col-md-6">
						</div>
						<div class="actions panel_actions pull-right">
							 
							 <i class="box_toggle fa fa-chevron-down"></i>
							 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
							 <i class="box_close fa fa-times"></i>
						</div>
				</center> 
				</header>

				<form class="form-horizontal" method="POST" id="sdev" action="">
			  
					<br />
					   <div>
						   <center>
						   <br> <label for="name"> Equipamento :</label><br>
							   <input type="text" name="equip_nome" id="equip_nome"  size=25 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['tbequi_nome'] ?> "  disabled >
						   <br><br><label for="name">Patrimonio:</label>
							   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['tbequip_plaqueta'] ?> disabled >
						
						 <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
						 
					
						<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['tbequi_tbcmei_id']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
				   <br /> 
					   <input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['tbequi_tbcmei_id']) ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
				   <label for="name">Tipo Equipamento : </\label>
					  <input type="text"  name="equip_tipo" size=10 value="<?php echo $ln['tbequi_tipo']; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled  > 
						 
				  <br /> <br />  <label for="name"> SO : </\label>
					   <input type=text name="sistema" size=20   value= "<?php echo $ln['tbequip_so']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
					

					         <br />  <br />  
						 <label> Cadastrado em  :  "<?php echo $ln['tbequi_datalanc'].' / '. $ln['tbequi_tecnico'] ?>"  </label>  <br />  <br />  <br />  <br />  
						<a href= 'https:\\portal.colombo.pr.gov.br\siap\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
			</center>
					</div>
				  </form>
						   <?php
								} while ($ln = mysqli_fetch_assoc($qr));
							 ?>
				</section> 
				</section>   
				</div>
				</body>

				</html>
	<?php
				    }
				    else
				    {
					  if ($tp_equip=="P") // Pach Panel
					  {
				$sql = "SELECT tb_diversos.id,
					tb_diversos.descricao,
					tb_diversos.descricao_cod,
					tb_diversos.patrimonio,
					tb_diversos.dt_cad,
					tb_diversos.marca,
					tb_diversos.tam,
					tb_diversos.posicao, 
					tb_diversos.comps,	 
					tb_diversos.tipo,
					tb_diversos.portas,
					tb_diversos.por_total,
					tb_diversos.por_util,
					tb_diversos.por_disp,
					tb_diversos.rede,
					tb_diversos.ip,
					tb_diversos.gerenciavel,
					tb_diversos.obs,
					tb_diversos.usuario,
					tb_diversos.local_cod,
					tb_diversos.sec_cod,
					tbcmei.tbcmei_id,
					tbcmei.tbcmei_nome,
					tbcmei.tbcmei_cep,
					tbcmei.tbcmei_coord
					FROM tb_diversos INNER JOIN tbcmei 
					ON tb_diversos.local_cod = tbcmei.tbcmei_id
					where tb_diversos.id = '$tbequip_id' ";
					//$qr = mysql_query($sql) or die(mysql_error());
					$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
					//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
					//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
					$ln = mysqli_fetch_assoc($qr);
					do {
						
						
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
							height: 80px;
							font-family: 'Roboto Medium', sans-serif;
							font_size: 80px;
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
								<h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $tbequip_id; ?></h2><br />
								<a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
								<div class="form-group  col-md-6">   </div>
								<div class="actions panel_actions pull-right">  </div>
							   </center> 
							</header>
							<form class="form-horizontal" method="POST" id="sdev" action="">
										<br />
									<div>
								   <center> <br>
									<label for="name"> Equipamento :</label> <br><br>
									   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $ln['descricao'] ?> "  disabled >
								   <br><br><label for="name">Patrimonio:</label> <br><br>
									   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $ln['patrimonio'] ?> disabled >
									   <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
										<input type="text" name="secretaria" size=40 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['sec_cod']))); ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
									<br /> 
									<input type="text" name="local" size=40 value="<?php echo nomedolocal($conn, $ln['local_cod']) ?>" style= "font-family: 'Arial Black'; font-size: 25px; text-align:center;" disabled > <br /><br /> 
										
									    <label for="name"> Tipo  : </\label>
									<input type=text name="sistema" size=20   value= "<?php echo $ln['tipo']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
									<br /><br />  
									<label for="name"> Rede :</\label> <br /> 
									<input type=text name="processador_tipo"  size=20 value= "<?php echo $ln['rede']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
									<label for="name"> Obs :</\label> 
									<input type="text" name="processador" size=35 value="<?php echo $ln['obs']; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
									       <br />  <br />  
									<label> Cadastrado em  :  "<?php echo $ln['dt_cad'].' / '. $ln['usuario'] ?>"  </label>  <br />  <br />  <br />  <br />  
									<a href= 'https:\\portal.colombo.pr.gov.br\siap\'> ** Acesso ao Sistema **</a>  <br />  <br />                       
									</center>
									</div>
							</form>
									<?php
										} while ($ln = mysqli_fetch_assoc($qr));
									 ?>
								</section> 
								</section>   
								</div>
								</body>
							</html>
      <?php	
					  }
					   else
					  {
					  echo " <h1><center><strong>  Nenhum Retorno foi Identificado  </strong></center></h1>";
					  echo " <center><a  href='newsfeed.php' title='SELECIONAR '  >Voltar   </a> </center> ";
					  } 
		        }
			 }
		    } 
		  }
	   }
	}
  

    