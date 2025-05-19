<?php
include "../Config/config_sistema.php";
//$assunto = $_POST['assunto'];
$assunto = "708";
//echo $assunto;
if ($assunto !=""){
    $result = mysqli_query($conn,'SELECT * FROM tbcmei where tbcmei_id = "'.$assunto.'" ');
	if ($result){
		 while ($row = mysqli_fetch_assoc($result)) 
         $unidade = $row['tbcmei_nome']; 
         {       
 ?>     
        
	    <!DOCTYPE html>
<html class=" ">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="utf-8" />
        <title>CADASTRANDO EQUIPAMENTOS  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    </head>
<form method="post" action="salvaequip.php" name="salvaequip">
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">EQUIPAMENTOS <?php echo $unidade;?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                            <div class="form-group">
                            <label class="form-label" for="field-3">Descriçao Processador</label>
                            <div class="controls">
                            <input type="text" class="form-control" id="field-3" name="desc" >
                            <input type="hidden" class="form-control" id="field-3" name="id_unidade" value="<?php echo $assunto;?>" >                       
                                        <div class="form-group">
                                        <label class="form-label" for="field-4">Descrição placa mãe</label>
                                            <div class="controls">
                                            <input type="text" id="field-4" class="form-control" name="placamae" >
                                            <div class="form-group">
                                            <label class="form-label" for="field-4">Plaqueta</label>
                                            <div class="controls">
                                            <input type="text" id="field-4" class="form-control" name="plaqueta" >
                                            <div class="form-group">
                                            <label class="form-label" for="field-4">Monitor</label>
                                            <div class="controls">
                                            <select class="form-control m-bot15" name="monitor" required>
                                            <option>19 Pol ou superior</option>
                                            <option>Inferiores</option>
                                        </select>   
                                            <label class="form-label" for="field-4">Qtde memoria</label>
                                            <div class="controls">
                                            <select class="form-control m-bot15" name="qtdememo" required>
                                            <option>4 GB</option>
                                            <option>8 GB</option>
                                            <option>16 GB</option>
                                            <option>Inferiores</option>
                                        </select>   
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Tipo de memoria</label>                                        
                                        <select class="form-control m-bot15" name="tpmemoria">
                                            <option>DDR3</option>
                                            <option>DDR4</option>
                                        </select>                                   
                                        <div class="form-group">
                                            <label class="form-label" for="field-4">Armazenamento(espaço em disco)</label>
                                            <div class="controls">
                                            <select class="form-control m-bot15" name="qtdehd" required>
                                            <option>1 TB</option>
                                            <option>500 GB</option>
                                            <option>320 GB</option>
                                            <option>Inferiores</option>
                                        </select> 
                                      <div class="form-group">
                                        <label class="form-label" for="field-7">Tipo de Armazenamento </label>                                       
                                        <select class="form-control m-bot15" name="tparmaz" required>
                                            <option>HD</option>
                                            <option>SSD</option>
                                        </select> </div>
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Estado teclado </label>
                                        <select class="form-control m-bot15" name="estteclado" required>
                                            <option>Bom</option>
                                            <option>Ruim</option>
                                            <option>péssimo</option>
                                       </select>                                                                         
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Estado mouse </label>
                                        <select class="form-control m-bot15" name="estmouse" required>
                                        <option>Bom</option>
                                            <option>Ruim</option>
                                            <option>péssimo</option>
                                         </select>
                                  <div class="form-group">
                                        <label class="form-label" for="field-7">Filtro de linha </label>
                                        <select class="form-control m-bot15" name="filtrolinha" required>
                                            <option>Bom</option>
                                            <option>Ruim</option>
                                            <option>péssimo</option>
                                        </select>
                                        <div class="form-group">
                                                <input type="submit" class="btn btn-primary " name="enviar"></input>
                                                <a id="gerarExcel" href="frmequip.php" class="btn btn-primary">Mudar unidade</a>  
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                             </div>
                            </form>
                     </html> 
<?php
	}
}
}

?>
