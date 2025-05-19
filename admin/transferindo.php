
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   $tbfila_id = $_REQUEST['tbfila_id'];
   $unidade_usuario = $_SESSION['unidade_usuario'];

$sql = "SELECT tbaluno.tbaluno_id,
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_nome,
tbaluno.tbaluno_turma,
tbaluno.tbaluno_nmae,
tbaluno.tbaluno_tel, 
tbaluno.tbaluno_cpfmae,
tbaluno.tbaluno_cep,
tbaluno.tbaluno_end,
tbaluno.tbaluno_num,
tbaluno.tbaluno_bairro,
tbaluno.tbaluno_comple,
tbfila.tbfila_id, 		  
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_turma,
tbfila.tbfila_motivo,
tbfila.tbfila_dtacad,
tbfila.tbcmei_tbcmcei_id,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbfila.data_cadalterado
FROM tbaluno INNER JOIN tbfila ON tbfila.tbaluno_tbaluno_id= tbaluno.tbaluno_id 
iNNER JOIN tbcmei 
on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id
where tbfila_id = '".$tbfila_id."'";
$qr  = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) ){
$dtn = $ln['tbaluno_dtnasc'];
$dtansc = implode("/",array_reverse(explode("-",$dtn)));

$dtacad = $ln['tbfila_dtacad'];
$dtcad = implode("/",array_reverse(explode("-",$dtacad)));

$dtaalt = $ln['data_cadalterado'];
$dtalt = implode("/",array_reverse(explode("-",$dtaalt)));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR">
<link rel= "stylesheet" type="text/css" href="../estilocme.css">
<head>
     <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
	<meta name="author" content="Admin" />
	<title>Cadastro de Alunos | SMTI</title>
</head>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
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
         <div id="main-content">
        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestao Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
         <!-- Dados do aluno-->
        
        <header class="panel_header">
           <h2 class="title pull-left">TRANSFERINDO ALUNO <?php echo $tbfila_id?> </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="salvatransf" action = "salvatransf.php">
                                <!-- Text input-->
                            <div class="form-row">
                               <label class="form-label" for="field-1"><p class="text-center">Nome da crianca</p></label>
                                <div class="controls">
                                <input type="hidden" class="form-control" name="tbaluno_id" value="<?php echo $ln['tbaluno_id'] ?>">
                                <input type="hidden" class="form-control" name="tbfila_id" value="<?php echo $ln['tbfila_id'] ?>">
                                <input type="text" class="form-control" disabled="disabled" id="field-1" value="<?PHP echo $ln['tbaluno_nome']?>"> 
                                </div>
                                <label class="form-label" for="field-1"><p class="text-center">Data de nascimento</p></label>
                                <div class="controls">
                                <input type="hidden" class="form-control" id="field-1" name="dtnasc" value="<?PHP echo $dtansc?>" >
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $dtansc?>" >
                                </div>

                                <label class="form-label" for="field-1"><p class="text-center">Data de cadastro</p></label>
                                <div class="controls">
                                <input type="hidden" class="form-control" id="field-1" name="dtcad" value="<?PHP echo $dtcad?>" >
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $dtcad?>" >
                                </div>
                                <label class="form-label" for="field-1">Nome da mae</label>
                                <div class="controls">
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $ln['tbaluno_nmae']?>">
                                </div>
                                <label class="form-label" for="field-1">Telefone</label>
                                <div class="controls">
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $ln['tbaluno_tel']?>">
                                </div>
                                <label class="form-label" for="field-1">Turma</label>
                                <div class="controls">
                                <input type="hidden" class="form-control" id="field-1" name="turma" value="<?PHP echo $ln['tbaluno_turma']?>" >
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $ln['tbaluno_turma']?>">
                                </div>
                                <label class="form-label" for="field-1">Tramite </label>
                                <div class="controls">
                                <input type="hidden" class="form-control" id="field-1" name="motivo" value="<?PHP echo $ln['tbfila_motivo']?>" >
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $ln['tbfila_motivo']?>">
                                </div>
								<label class="form-label" for="field-1">Cmei matriculado</label>
                                <div class="controls">
                                <input type="hidden" class="form-control" id="field-1" name="cmei_antigo" value="<?PHP echo $ln['tbcmei_nome']?>" >
                                <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $ln['tbcmei_nome']?>">
                                </div>
								
                                 <!-- Fechando wille com dados da fila-->
                                <?php
                                }
                                ?>
                               <label class="form-label" for="field-1">Cmei destino</label>
                                <div class="controls">
                                <select class="form-control m-bot15" name="id_cmei" required>>
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM tbcmei where tbcmei_local like '%cmei%' order by tbcmei_nome";
                                            $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                            while($row = mysql_fetch_array($resultado))
                                            {
                                                $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome'])?'selected':'';
                                        ?>
                                        <option value="<?php echo $row['tbcmei_id'];  ?>" <?php echo $selected; ?>>
                                        <?php echo $row['tbcmei_nome']; ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label class="form-label" for="field-1">Motivo</label>
                                <div class="controls">
                                <select class="form-control m-bot15" name="" required>>
          							    <option value="Transferencia">Transferencia</option>
        						</select>
                                </div>
                                <label class="form-label" for="field-1">Data solicitado</label>
                                <input type="hidden" name="status" value="nor"/>
                                <div class="controls">
                                <input type="date" name="datatransf" class="form-control" id="field-1" required>
                                 </div>
                                 </div>
                                <div align ="center"><input type="submit" value="Salvar" name="salvar"  class='btn btn-primary' /> </div>   
                        </form>    
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
        
        </div>
        
</body>

</html>