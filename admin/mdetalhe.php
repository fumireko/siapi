<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
include "slog.php";
$login_usuario = $_SESSION['login_usuario'];
if (!isset($_SESSION)){
    session_start();
}
$tbcmei_nome = $_SESSION['tbcmei_nome'];
$id_dados = $_GET['id_dados'];
$sql = "SELECT tbldados.id_dados,
	tbldados.data,
	tbldados.telefone,
	tbldados.nsolicitante,
    tbldados.email,
    tbldados.regiao,
    tbldados.tpservico,
	tbldados.id_setor,
	tbldados.prob,
	tbldados.solucao,
	tbldados.status,
    tbldados.tecnico,
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
	where tbldados.id_dados = '$id_dados'
	ORDER BY id_dados";
    $qr  = mysql_query($sql) or die(mysql_error());

    while( $ln = mysql_fetch_assoc($qr) ){
        $data = $ln['data'];
        $dtacad = implode("/",array_reverse(explode("-",$data)));
        $nome = $ln['nsolicitante'];
        
        $data_fim = $ln['dtafin'];
        $datafin = implode("/",array_reverse(explode("-",$data_fim)));
           

        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SEMTI - Sistema de Gestao T.I</title>
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
    </head>
    <!-- BEGIN BODY -->
    <body>
         <!-- START TOPBAR -->
        <?php 
          include "index.php"
        ?> 
        <div id="main-content">
        <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Sistema de Gestao T.I</h1>
        </div>
    </div>
    </div>
   
    <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
            <h2 class="title pull-left">Chamado <?php echo $id_dados;?></h2>
            <div class="form-group  col-md-6">
             
            </div>
                 <div class="actions panel_actions pull-right">
                 
                 <a href='frmminhassolcitacoes.php' class='btn btn-primary'>Meus chamados</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
                                
    </header>

    <form class="form-horizontal" method="POST" id="disabled" action="sdetalhar.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <br/>
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Tecnico:</label>
            <div class="col-md-4">
            <input id="objeto" name="nsolicitante" id="nsolicitante" type="text" value= "<?php echo $ln['tecnico'];?>"
            placeholder="Nome do solicitante" class="form-control input-md" disabled>
            <input name="id_dados" id="id_dados" type="hidden" value= "<?php echo $ln['id_dados'];?>">
            </div>
                  </div>
                     <!-- Text input-->
                   <div class="form-group">
                   <label class="col-md-4 control-label" for="email">Email:</label>
                   <div class="col-md-4">
                   <input id="email" name="email" id="email" type="text" value= "ti.maracana@colombo.pr.gov.br"
                   placeholder="Email do solicitante" class="form-control input-md"disabled>
               </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                   <label class="col-md-4 control-label" for="email">Email Sede:</label>
                   <div class="col-md-4">
                   <input id="email" name="email" id="email" type="text" value= "tecnologia.informacao@colombo.pr.gov.br"
                   placeholder="Email do solicitante" class="form-control input-md"disabled>
               </div>
            </div>
                <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Telefone: </label>
              <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value= "41 3656-8111/ 3675-5963"
                    placeholder="Telefone do solicitante" class="form-control input-md"disabled>
               </div>
                    </div>
                           <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data abertura:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="text" value= "<?php echo $dtacad;?>"
                            placeholder="Email do solicitante" class="form-control input-md" disabled>
                        </div>
                        </div>
                         <!-- Text input-->
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data Finalizado:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="text" value= "<?php echo $datafin;?>"
                            placeholder="Email do solicitante" class="form-control input-md" disabled>
                        </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Problema:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="prob" style="resize:none" disabled
                            rows="3" placeholder="PROBLEMA" class="form-control input-md"><?php echo $ln['prob'];?></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group" id="jusStificativa"> 
                            <label class="col-md-4 control-label" for="justificativa">Solução:</label>
                            <div class="col-md-4">
                            <textarea id="solucao" name="solucao" style="resize:none" disabled
                            rows="3" placeholder="SOLUÇÃO" class="form-control input-md"><?php echo $ln['solucao'];?></textarea>
                            </div>
                        </div>
                         <!-- Text input-->
                         <!-- Button -->
                              <div class="form-group">
                              <div align="center"> <a href='frmminhassolcitacoes.php' class='btn btn-primary'>Voltar</a></div>
                         </div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                                }
                                ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    