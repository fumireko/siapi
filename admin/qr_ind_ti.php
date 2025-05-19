<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$email_usuario = $_SESSION['email_usuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SISTEMA DE GESTÃO T.I</title>
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
<body >
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
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
              
        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Gerar QR Code de Equipamento</h2>
                
       </header>
         <!-- Dados do atendimento-->
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action=" qrimpressao_ti.php" enctype="multipart/form-data">
            
            
                 <h2 class="title pull-left">Numero do Controle TI </h2><br /><br /><br />
                <div> 
                <input type="text" name="ctrl_ti" id="ctrl_ti" value="" class="nome" />

                 <input type="submit" name="exibir" value="Gerar QR Code" class="exibir" />         
                </div>
             <br />
                <a  class='btn btn-primary' href="busca_diversos.php" title="Consultar Patrimonio , ID ou Nome do Equipamento">Checar Referencias do Equipamento</a>  
                &nbsp  &nbsp &nbsp  &nbsp 
                 <a  class='btn btn-primary' href="qrimpressao_ti2.php" title="Gera Qr Code Automaticamente ( <?php echo busca_ult_CTI($conn)+1?> )  ">Qr Code Automatico</a>  
                
                </form>
           
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>
