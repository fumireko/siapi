<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
}
$id_fila = $_GET['id_fila'];
$tbcmei_nome = $_SESSION['tbcmei_nome'];
$hoje = date('d/m/Y');
$sql = "SELECT tbaluno.tbaluno_id, 
tbaluno.tbaluno_nome, 
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_nmae, 
tbaluno.tbaluno_cpfmae, 
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbcaec.caec_id, 
tbcaec.caec_tbcmei_id,
tbcaec.caec_numsere, 
tbcaec.caec_turma, 
tbcaec.caec_turno, 
tbcaec.caec_professor, 
tbcaec.caec_diretor, 
tbcaec.caec_ass_semed, 	
tbcaec.caec_dataenvio,
tbcaec.caec_datadev, 
tbcaec.caec_queixa,
tbcaec.caec_dev,
tbcaec.caec_esp, 
tbcaec.caec_especialista,
tbcaec.caec_status, 
tbcaec.dados_usuarios_ID,
usuarios.id,
usuarios.nome	 
FROM tbaluno INNER JOIN tbcaec 
ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
inner Join tbcmei 
ON tbcmei.tbcmei_id = tbcaec.caec_tbcmei_id
inner join usuarios
on tbcaec.dados_usuarios_ID = usuarios.id

where tbcaec.caec_id = '$id_fila' ORDER BY caec_id";
$qr  = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )
{
    $cod = $ln['caec_id'];
    $dtn = $ln['tbaluno_dtnasc'];
    $dtdev = $ln['caec_datadev'];
    $status = $ln['caec_status'];
    $dtansc = implode("/",array_reverse(explode("-",$dtn)));
    $datadevolutiva = implode("/",array_reverse(explode("-",$dtdev)));

//}
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
            <h2 class="title pull-left">Devolutiva <?php echo $cod; ?></h2>
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./agendar_triagem.php' class='btn btn-primary'>Voltar</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
            <input id="cod" name="cod" type="text" value="<?php echo $cod;?>" hidden>
            <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome;?>" hidden>
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
            <br/>
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Nome:</label>
            <div class="col-md-4">
            <input id="objeto" name="nsolicitante" id="nsolicitante" type="text" value = "<?php echo $ln['tbaluno_nome'];?>"
            placeholder="Nome do solicitante" class="form-control input-md"required disabled>
            </div>
                  </div>
                     <!-- Text input-->
                   <div class="form-group">
                   <label class="col-md-4 control-label" for="email">Data de nascimento:</label>
                   <div class="col-md-4">
                   <input id="email" name="email" id="email" type="text" value = "<?php echo $dtansc;?>"
                   placeholder="Email do solicitante" class="form-control input-md"required disabled>
               </div>
            </div>
                <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Nome do(s) responsável(eis: </label>
              <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value = "<?php echo $ln['tbaluno_nmae'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required disabled >
               </div>
                    </div>
                     <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Especialidade: </label>
              <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value = "<?php echo $ln['caec_esp'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required disabled> 
               </div>
                    </div>
                    <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Escola/Unidade: </label>
              <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value = "<?php echo $ln['tbcmei_nome'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required disabled> 
               </div>
                    </div>
                    <!-- Text input-->
                 <div class="form-group">
                 <label class="col-md-4 control-label" for="telefone">Número do cadastro no SERE: </label>
                 <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value = "<?php echo $ln['caec_numsere'];?>"
                    placeholder="" class="form-control input-md"required disabled> 
               </div>
                    </div>

                    
               <!-- Text input-->
                       <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Queixa principal:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="prob" style="resize:none"
                            rows="3" placeholder="PROBLEMA" class="form-control input-md" disabled>
                            <?php echo $ln['caec_queixa'];?>
                        </textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                       <div class="form-group" id="dev">
                            <label class="col-md-4 control-label" for="justificativa">Devolutiva:</label>
                            <div class="col-md-4">
                            <textarea id="prob" name="dev" style="resize:none"
                            rows="3" placeholder="PROBLEMA" class="form-control input-md" disabled>
                            <?php echo $ln['caec_dev'];?>
                        </textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                 <div class="form-group">
                 <label class="col-md-4 control-label" for="telefone">Status: </label>
                 <div class="col-md-4">
                   <input id="objeto" name="telefone" id="objeto" type="text" value = "<?php echo $ln['caec_status'];?>"
                    placeholder="Telefone do solicitante" class="form-control input-md"required disabled> 
               </div>
                    </div>
                         <!-- Text input-->
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Profissional:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="text" value = "<?php echo $ln['caec_especialista']?>"
                            placeholder="" class="form-control input-md"required disabled>
                        </div>
                        </div>
                         <!-- Text input-->      
                      
                         <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data envio:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="text" value = "<?php echo $hoje;?>"
                            placeholder="Email do solicitante" class="form-control input-md"required disabled>
                        </div>
                        </div>
                         <!-- Text input-->
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Data devolutiva:</label>
                            <div class="col-md-4">
                            <input id="email" name="dtinicio" id="dtinicio" type="text" value = "<?php echo $datadevolutiva;?>"
                            placeholder="Email do solicitante" class="form-control input-md"required disabled>
                        </div>
                        </div>
                       
                         <!-- Text input-->
                         <!-- Button -->
                              <div class="form-group">
                                                           
                   
                              <div align="center">
                               <?php 
                               if ($status == 'Inserido lista de espera')
                               {
                                echo "<a href='../admin/imptriagem.php?id_fila=$id_fila' target='_blanck' class='btn btn-primary'>IMPRIMIR</a>";      
                               }
                               else 
                                    {
                                        echo "<a href='' class='btn btn-primary'>Pendente</a>";   
                                    }

                               
                               ?>   
                              
                              
                             </div>
                              
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

    
