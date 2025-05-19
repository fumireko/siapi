
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   if (!isset($_SESSION)){
    session_start();
   }
   $id_grupo = $_REQUEST['id_grupo'];
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
        $id_grupo = $_REQUEST['id_grupo'];
        $consulta = mysql_query("SELECT * from tbgrupos where id_grupo =$id_grupo ");
        while($linhas = mysql_fetch_object($consulta)) {
        $dtn = $linhas->tbaluno_dtnasc;
        $dtansc = implode("/",array_reverse(explode("-",$dtn)));
        ?>
        <header class="panel_header">
           <h2 class="title pull-left">INCLUIR MEMBRO</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="formEditEstagiario" action = "salvamembro.php">
                                <!-- Text input-->
                            <div class="form-row">
                            <div class="col">
                                
                            <label class="col-md-4 control-label" for="">Grupo</label>                         
                                     <div class="col-md-4">
                                         <input type="hidden" class="form-control" id="field-1" name="id_grupo" value="<?PHP echo $id_grupo?>" >

                                         <input type="text"name="" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->gp_nome?>" >
                                    </div>                                <!-- Fechando wille com dados do aluno-->
                             <?php
                             } 
                           ?>
                           <br><br>
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="membro">Membros</label>
                                <div class="col-md-4">
                                    <select class="form-control m-bot15" name="membro">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM usuarios order by email";
                                            $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                            while($row = mysql_fetch_array($resultado))
                                            {
                                                $selected = ($row['email'] == $_POST['email'])?'selected':'';
                                        ?>
                                        <option value="<?php echo $row['email'];  ?>" <?php echo $selected; ?>>
                                        <?php echo $row['email']; ?>            </option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
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
