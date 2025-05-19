<?php
//include "../validar_session.php"; 
include "../Config/config_sistema.php";
include('conexao.php');
$id_setor = $_GET['id_setor'];
if (file_exists('init.php'))
{
    require_once 'init.php';
}
else
{
    exit('Nao foi possivel encontrar o arquivo de inicializacao');
}
?>
<!DOCTYPE html>
<html class=" ">
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="utf-8" />
        <title>Ultra Admin : Default Layout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
          <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
    function buscar_cidades(){
      var estado = $('#estado').val();
      if(estado){
        var url = 'ajax_buscar_cidades.php?estado='+estado;
        $.get(url, function(dataReturn) {
          $('#load_cidades').html(dataReturn);
        });
      }
    }
    </script>
        </div>
         <!--  SIDEBAR - END -->
         <!-- START CONTENT -->
          <section id="main-content" class=" ">
             <section class="wrapper main-wrapper" style=''>
               <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">
                        <div class="pull-left">
                          <h1 class="title">SEU CHAMADO FOI ENVIADO COM SUCESSO!</h1>                            
                        </div>
                       </div>
                    </div>
                    <div class="clearfix"></div>

                <form method="post" action="" name="Frmchamado" onSubmit="return(valida(this))">
                <?php $consulta = mysql_query("SELECT tbldados.id_dados, 
                tbldados.data, tbldados.telefone,
                tbldados.regiao,
                tbldados.tpservico,
                tbldados.dtaatendido, 
                tbldados.dtafin,
                tbldados.nsolicitante, 
                tbldados.email, 
                tbldados.id_setor, 
                tbldados.prob, 
                tbldados.solucao, 
                tbldados.status, 
                tbldados.tecnico,
	            tbldados.id_sec, 
                tbsecretaria.sec_id, 
                tbsecretaria.sec_nome, 
                tbcmei.tbcmei_id, 
                tbcmei.tbcmei_nome
	            from tbldados inner Join tbsecretaria
	            On tbsecretaria.sec_id = tbldados.id_sec 
	            Inner Join tbcmei
	            ON tbcmei.tbcmei_id = tbldados.id_setor  
                where tbldados.id_setor = '".$id_setor."'
                ORDER BY id_dados DESC LIMIT 1");
                while($linhas = mysql_fetch_object($consulta)) {
                ?>
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                                             <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                            <div class="form-group">
                                           <label class="form-label" for="field-1">Num chamado<?PHP echo $id_setor?></label>
                                           <div class="controls">
                                            <input type="text" class="form-control"  name="num_chamado" id="field-1"  
                                                disabled value="<?PHP echo $linhas->id_dados?>">
                                               <div class="form-group">
                                           <label class="form-label" for="field-1">Solicitante</label>
                                           <div class="controls">
                                            <input type="text" class="form-control"  name="nsolicitante" id="field-1"  
                                                disabled value="<?PHP echo $linhas->nsolicitante?>">
                                           </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Email</label>
                                            <input type="text" class="form-control" name="email" id="field-3"
                                             name="email" disabled value="<?PHP echo $linhas->email?>">
                                            </div>
                                             <div class="form-group">
                                            <label class="form-label" for="field-4">Telefone</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name = "telefone" id="field-3"
                                             name="email" disabled value="<?PHP echo $linhas->telefone?>">
                                            </div>
                                                                               
                                        <div class="form-group">
                                        <label class="form-label" for="field-7">Regi&atilde;o</label>
                                                <div class="controls">
                                                <input type="text" class="form-control" id="field-3" name="regiao" disabled value="<?PHP echo $linhas->regiao?>">
                                            </div>
                                             
                                            <div class="form-group">
                                        <label class="form-label" for="field-7">Tipo de serviço</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-3" name="regiao" disabled value="<?PHP echo $linhas->tpservico?>">
                                            </div>
                                            <div class="form-group">
                                            <label class="form-label" for="field-8">Problema</label>
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" id="field-6" name="prob" disabled>
												<?PHP echo $linhas->prob?></textarea>
                                            </div>
                                        </div>
                                    
                                </div>
                                
                                       

                            </div>
                            </form>
                            <?php
                            
								}
								?>
                                   
    </body>
</html>
