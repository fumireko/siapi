<?php
$c_ep = $_REQUEST['c_ep'];
echo $c_ep;
//include_once  "./atualiza.php";
?>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


<script type="text/javascript" src="js/carregamento.js"></script>
	
</head>

<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Assessoria Pedagógica</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">        
                    <div id="form">
  <input type="hidden" name="nome" value="Marcos" class="nome" />
  <input type="submit" name="exibir" value="Minhas Informações" class="exibir" />         
</div><!--FORM-->
<div id="mostrar" style="display:none;"></div>

  
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</body>
</html> 