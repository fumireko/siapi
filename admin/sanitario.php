<?php
   include "../validar_session.php";
   include "../Config/config_sistema.php";

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
        <header class="panel_header">
           <h2 class="title pull-left">Vigilância Sanitária</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
        
                            <form class="form-horizontal" method="POST" id="PDF" action="ssanitario.php" enctype="multipart/form-data">
                                <!--Vigilância Sanitária-->
                                    <!-- Pdf input-->
                                    <input id="tipo_documento" name="tipo_documento" type="text" value="19" hidden>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="arquivo">Documento Vigilância Sanitária</label>
                                        <div class="col-md-4">
                                            <input type="file" name="arquivo" id="arquivo" required/>
                                        </div>
                                    </div>
                                    <!-- Date input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="validade">Data de Validade</label>
                                        <div class="col-md-4">
                                            <input type="date" id="validade" name="validade" required>
                                        </div>
                                    </div>
                                <div align ="center"><input type="submit" value="Salvar" name="salvar" class='btn btn-primary' /></div>
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
