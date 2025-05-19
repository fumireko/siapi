<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
$codigo = $_GET['buscar'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>Altera Local</title>
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
                <h1 class="title">Altera nome do local </h1>
            </div>
        </div>
    </div>
  

        <section class="box ">
      
         <!-- Dados do atendimento-->
           
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="salvacmei_alterado.php" enctype="multipart/form-data">
           
                
                <table>
            <tr> 
            
        
            <?php
            $sql = "SELECT tbcmei_id, tbcmei_nome from tbcmei where tbcmei_id = '".$codigo."'";
              $qr  = mysqli_query($conn,$sql) or die(mysql_error());
            ?>
            </p>
                <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       <th>Codigo cmei</th>
                       <th>Cmei nome</th>
                    </tr>
                </thead>
            <tbody>
            <?php
                while( $ln = mysqli_fetch_assoc($qr) )
                {
                $nome_d = $ln['tbcmei_nome'];
                $id_d = $ln['tbcmei_id'];
                    ?>
                <tr>
                <td><?php echo $ln['tbcmei_id'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
             </tr>
            <?php
                }    
                
                
                ?>    
            </tbody>                              
        </table>

                   <input type="hidden" name="nome_cmei" size=50 value= "<?php echo $nome_d; ?>">
                        <input type="hidden" name="id_cmei" size=50 value= "<?php echo $id_d; ?>">
                     

                <label>Nome do Departamento  
                  <div>
                   <input id="nome" name="nome" type="text" value ="<?php echo $nome_d; ?>" size = "60" >
                       <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Modificar</button>

                  </div>  
                                
                           <br />
                 <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'>

                                        <!-- ********************************************** -->
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
    </form>
</body>

</html>