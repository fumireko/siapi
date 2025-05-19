
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   $dta_nasc_busca = $_REQUEST['dta_nasc_busca'];
   $dt = implode("-",array_reverse(explode("/",$dta_nasc_busca)));

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

        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Incluir na fila</h2>
                     
        </header>
         <!-- Dados do aluno-->
         <?php
             $sql = "SELECT * FROM tbaluno where tbaluno_dtnasc = '".$dt."'  ORDER BY tbaluno_nome";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> <td> <a href='./incfila.php' class='btn btn-primary'>Nova busca</a> </td></tr>
              <table class="table table-hover table-bordered display" >
             
              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Nome</th>
                       <th>Nome da mãe</th>
                       <th>Status</th>
                       <th>Dt nasc</th>
                       <th>Acão</th>
                     </tr>
                         </thead>
                               <?php
                                    
                                $i=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $i++;
                                  $data = $ln['tbaluno_dtnasc'];
                                  $id = $ln['tbaluno_id'];
								  $status = $ln['tbaluno_status'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                            <td><a href="../admin/alteraaluno.php?tbaluno_id=<?php echo $ln['tbaluno_id'];?>" 
                                            rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                                            data-toggle="tooltip" data-original-title="Alterar cadastro?" 
                                            data-placement="top"><u class='text-dark'><?php echo $ln['tbaluno_id'];?></u></a></td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ln['tbaluno_nmae'];?></td>
                                            <td><?php echo $ln['tbaluno_status'];?></td>
                                            <td><?php echo  $dt;?></td>
                                            <td>
											 <?php
												if ($status == 'matriculado' )   
												{
												echo "Matriculado";
                                                }
                                                else 
                                                    
                                                    {
                                                        echo "<a href='dadosfila.php?tbaluno_id=$id' class='btn btn-primary'>Incluir</a>
		";   
                                                    }
											?>  
											
											</td>
                                        </tr>
                                </tbody>
                                <?php
                                }    
                                ?>                                   
                            </table>
                           </form>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>