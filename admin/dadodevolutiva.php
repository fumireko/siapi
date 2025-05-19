
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $id_fila = $_GET['id_fila'];
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   $nivel = $_SESSION['nivel_usuario'];
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $unidade_usuario = $_SESSION['unidade_usuario']; 
   ?>
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
        <?php
        $tbaluno_id = $_REQUEST['tbaluno_id'];
        $consulta = mysql_query("SELECT * from tbaluno where tbaluno_id =$tbaluno_id ");
        while($linhas = mysql_fetch_object($consulta)) {
        $dtn = $linhas->tbaluno_dtnasc;
        $dtansc = implode("/",array_reverse(explode("-",$dtn)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">INCLUIR NA FILA-CAEC</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formEditEstagiario" action = "salvafilacaec.php">
                                <!-- Text input-->
                                <div class="form-row">
                                <label class="form-label" for="field-1">Escola/CMEI</label>
                               <!-- Testando PHP -->
                               <?php 
                                    $sql = "SELECT * FROM tbcaec where caec_esp = '%cmei%' order by tbcmei_nome";
                                    $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                    $option = '';
                                    while($row = mysql_fetch_array($resultado))
                                     { 
                                       $option .= "<option value = '".$row['tbcmei_id']."'>".$row['tbcmei_nome']."</option>";
                                     }                                    
                                ?>
                                <td>
                                    <select class="form-control m-bot15" name="id_cmei" class="form-control input-md" required>          
                                    <?php
                                        if ($nivel == 1){
                                        echo "<option value='0'></option>";
                                        echo $option;

                                        }
                                        else    
                                        {
                                            echo "<option value=$id_cmei>$tbcmei_nome</option>";
                                        }
                                        
                                    ?>        
                                    </select> </td>
                                    <td>
                               
                            <div class="form-row">
                                <label class="col control-label" for="cpf_estag">Nome da crianca</label>
                            <div class="col">
                                <input type="hidden" name="aluno_id" value="<?php echo $linhas->tbaluno_id ?>">  
                                <input id="aluno_id" name="aluno_id" type="text" disabled="disable" value="<?php echo $linhas->tbaluno_nome?>" placeholder="Informe o nome do aluno"
                                class="form-control input-md">
                                     </div>
                                     <label class="col control-label" for="cpf_estag">Data de nascimento</label>                         
                                     <div class="col">
                                         <input type="hidden" class="form-control" id="field-1" name="dtcad" value="<?PHP echo $dtansc?>" >
                                         <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $dtansc?>" >
                                    </div>
                                    <label class="col control-label" for="cpf_estag">Nome do(s) responsável(eis</label> 
                                    <div class="controls">
                                       <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_nmae?>">
                                </div>
                                <label class="form-label" for="field-1">Telefone</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_tel?>">
                                </div>
                                <label class="form-label" for="field-1">Celular</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->celu?>">
                                </div>
                                <label class="form-label" for="field-1">Celular</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->celular?>">
                                </div>
                                <label class="form-label" for="field-1">Turma</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_turma?>">
                                <!-- Fechando wille com dados do aluno-->
                             <?php
                             } 
                           ?>   
                           <label class="form-label" for="field-1">Especialidade</label>
                            <div class="controls">
                                    <select class="form-control m-bot15" name="espec" class="form-control input-md" required>
        											<option value=""> </option>
          											<option value="Psicologia">Psicologia</option>
													<option value="Fonoaudiologia">Fonoaudiologia</option>
          								</select>
                                           </div>
                              <label class="form-label" for="field-1">Número do cadastro no SERE</label>
                                           
                                            <div class="controls">
                                                <input type="text" name="nsere" class="form-control" id="field-1" >
                                            </div>
                                <label class="form-label" for="field-1">QUEIXA PRINCIPAL</label>
                                           
                                            <div class="controls">
                                               <textarea id="queixa" name="queixa" rows="4" cols="50" required>
                                                Digite aqui a queixa principal...
                                                </textarea>
                                            </div>
                           
                               <label class="form-label" for="field-1">Nome do(a) Professor(a)</label>
                                           
                                            <div class="controls">
                                                <input type="text" name="nprefessor" class="form-control" id="field-1" required>
                                            </div>
                                <label class="form-label" for="field-1">Nome do(a) Diretora/Coordenador(a)</label>
                                           
                                            <div class="controls">
                                                <input type="text" name="ndiretor" class="form-control" id="field-1" required >
                                            </div>
                                <label class="form-label" for="field-1">Assessora Pedagógica da SEMED</label>
                                           
                                            <div class="controls">
                                                <input type="text" name="nassessora" class="form-control" id="field-1" required>
                                            </div>
                                             <label class="form-label" for="field-1">Data de cadastro</label>
                                            <input type="hidden" name="status" value="fila"/>
                                            <div class="controls">
                                                <input type="date" name="dtcad" class="form-control" id="field-1" >
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