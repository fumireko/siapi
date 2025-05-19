<?php
   include "../validar_session.php";
   include "../Config/config_sistema.php";
   $id_arquivo = $_REQUEST['id_arquivo'];
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
    .img-with-text {
        text-align: justify;
        width: 150px;
    }

    .img-with-text img {
        display: block;
        margin: 0 auto;
    }
    </style>
</head>
<?php
$search = "SELECT * FROM tipo_arquivo WHERE id_tipo_arquivo like '%".$id_arquivo."%' ";
$qr  = mysql_query($search) or die(mysql_error());
   while( $linha = mysql_fetch_assoc($qr) )
    {
        $titulo = $linha['descricao_arquivo'];
        echo $titulo;
    }
?>

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
           <h2 class="title pull-left">Selecione o documento que sera apagado</h2>
            </header>
            <div class="content-body">                  
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="p-3 mb-2 bg-info text-white"><?php echo $titulo?></div>
                                <br>
                                <?php
                                    $search = "SELECT * FROM arquivo WHERE id_tipo_arquivo like '$id_arquivo' ORDER BY codigo";
                                    $query  = mysql_query($search) or die(mysql_error());
                                ?>
                                <?php
                                    $t = 0;
                                    $i=0;
                                    while( $linha = mysql_fetch_assoc($query) )
                                    {
                                        $data= implode("/",array_reverse(explode("-",$dia )));
                                        $t++;
                                   
                                        $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <div class="img-with-text">
                                    <a href="./tiraDocumento.php?id=<?php echo $linha['codigo'];?>" onclick="return confirm_delete()"><img id="foo" src="./upload/Documentos_para_download/<?php echo $linha['arquivo'];?>" width="150" height="100" alt="Icone" onerror="this.src='./upload/comeco_obras/icon.png';"></a>
                                    <p><?php echo $linha['arquivo'];?></p>    
                                </div>
                                <?php
                                    }
                                ?> 
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

        </div>

</body>

</html>
<script type="text/javascript">
    function confirm_delete() {
        return confirm('Você tem certeza?');
    }
</script>