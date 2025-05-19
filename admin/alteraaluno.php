
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];

   $tbaluno_id = $_REQUEST['tbaluno_id'];   

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
        $consulta = mysql_query("SELECT * from tbaluno where tbaluno_id = $tbaluno_id ");
        while($linhas = mysql_fetch_object($consulta)) {
        $dtn = $linhas->tbaluno_dtnasc;
        $dtansc = implode("/",array_reverse(explode("-",$dtn)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">INCLUIR NA FILA</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="salteraaluno" action = "salteraaluno.php">
                                <!-- Text input-->
                            <div class="form-row">
                                <label class="col control-label" for="cpf_estag">Nome da crianca</label>
                               <div class="col">
                                <input type="hidden" name="aluno_id" value="<?php echo $linhas->tbaluno_id ?>">  
                                <input id="aluno_id" name="nome" type="text"  value="<?php echo $linhas->tbaluno_nome?>" placeholder="Informe o CPF do estagiário"
                                class="form-control input-md">
                                     </div>
                                     <label class="col control-label" for="cpf_estag">Data de nascimento</label>                         
                                     <div class="col">
                                         <input type="hidden" class="form-control" id="field-1" name="dtansc" value="<?PHP echo $dtansc?>" >
                                         <input type="text" name = "dtansc" class="form-control" id="field-1"  value="<?PHP echo $dtansc?>" >
                                    </div>
                                    <label class="col control-label" for="cpf_estag">Nome da mãe</label> 
                                    <div class="controls">
                                       <input type="text" class="form-control" id="field-1" name="nmae" value="<?PHP echo $linhas->tbaluno_nmae?>">
                                </div>

                                <label class="col control-label" for="cpf_estag">CPF da mãe</label> 
                                    <div class="controls">
                                       <input type="text" class="form-control" id="field-1" name="cpfmae" value="<?PHP echo $linhas->tbaluno_cpfmae?>">
                                </div>


                                <label class="form-label" for="field-1">Telefone</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name="telefone" value="<?PHP echo $linhas->tbaluno_tel?>">
                                </div>
                                <label class="form-label" for="field-1">Celular</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name= "cel" value="<?PHP echo $linhas->celu?>">
                                </div>
                                <label class="form-label" for="field-1">Celular 2</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name= "celular" value="<?PHP echo $linhas->celular?>">
                                </div>
                                <label class="form-label" for="field-1">CEP</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name ="cep" value="<?PHP echo $linhas->tbaluno_cep?>">
                                
                                <label class="form-label" for="field-1">Rua</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name="rua" value="<?PHP echo $linhas->tbaluno_end?>">

                                    <label class="form-label" for="field-1">Num</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name="num" value="<?PHP echo $linhas->tbaluno_num?>">

                                    <label class="form-label" for="field-1">Complemento</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name = "comple" value="<?PHP echo $linhas->tbaluno_comple?>">
                                
                                    <label class="form-label" for="field-1">Bairro</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name="bairro" value="<?PHP echo $linhas->tbaluno_bairro?>">
                                    
                                    <label class="form-label" for="field-1">Cidade</label>
                                    <div class="controls">
                                    <input type="text" class="form-control" id="field-1" name="cidade" value="<?PHP echo $linhas->tbaluno_cidade?>">
                               
                                    

                                <!-- Fechando wille com dados do aluno-->
                             <?php
                             } 
                           ?>   
                              
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