
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   $tbcmei_id = $_GET['tbcemi_id'];
   $tbcmei_id = $_REQUEST['tbcmei_id'];   

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
        $tbcmei_id = $_REQUEST['tbcmei_id'];
        $consulta = mysqli_query($conn,"SELECT * from tbcmei where tbcmei_id = $tbcmei_id ");
        while($linhas = mysqli_fetch_object($consulta)) {
        
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">INCLUIR NA FILA</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="salteracmei.php" action = "salteracmei.php">
                                <!-- Text input-->
                            <div class="form-row">
                                <label class="col control-label" for="cpf_estag">Nome cmei</label>
                               <div class="col">
                                <input type="hidden" name="id_cmei" value="<?php echo $linhas->tbcmei_id ?>">  
                                <input id="aluno_id" name="nome_cmei" type="text"  value="<?php echo $linhas->tbcmei_nome?>" placeholder="Nome Cmei"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="cpf_estag">Responsável</label>
                                <div class="col">
                                <input id="aluno_id" name="nome_resp" type="text"  value="<?php echo $linhas->tbcmei_coord?>" placeholder="Nome Responsável"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="cpf_estag">Unidade</label>
                                <div class="col">
                                <input id="aluno_id" name="local_unidade" type="text"  value="<?php echo $linhas->tbcmei_local?>" placeholder="Nome Responsável"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="cpf_estag">Pré escolar </label>
                                <div class="col">
                                <select class="form-control m-bot15" name="preescola" required>>
          							<option value="Sim"> Sim</option>
          							<option value="Não">Não</option>
        						                                 
        						</select>
                               
                                </div>
                                <!-- Fechando wille com dados do aluno-->
                             <?php
                             } 
                           ?>   
                              <br>
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