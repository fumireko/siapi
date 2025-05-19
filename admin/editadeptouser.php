
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
   $id = $_REQUEST['id'];   
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
                <h1 class="title">SMTI</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
         <!-- Dados do aluno-->
        <?php
        $tbcmei_id = $_REQUEST['tbcmei_id'];
        $consulta = mysql_query("SELECT * from usuarios where id = $id");
        while($linhas = mysql_fetch_object($consulta)) {
        
        ?>
        <header class="panel_header">
        <h2 class="title pull-left"> Mudar usuário de departamento </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="seditadeptouser.php" action = "seditadeptouser.php">
                                <!-- Text input-->
                            <div class="form-row">
                                <label class="col control-label" for="cpf_estag">Lgin/Email</label>
                               <div class="col">
                                <input type="hidden" name="id" value="<?php echo $linhas->id?>">  
                                <input id="aluno_id" name="login" type="text" disabled value="<?php echo $linhas->email?>" placeholder="Nome Cmei"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="cpf_estag" >Departamento/Unidade</label>
                                <div class="col">
                                <select class="form-control m-bot15" name="id_depto" required>
			                        <option value=""></option>
			                        <?php
			                            $sql = "SELECT * FROM tbcmei order by tbcmei_nome";
			                            $resultado = mysql_query($sql) or die('Erro ao selecionar: ' .mysql_error());
                                        while($row = mysql_fetch_array($resultado))
			                            {
    	    	                            $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome'])?'selected':'';
			                            ?>
                                            <option value="<?php echo $row['tbcmei_id'];?>" <?php echo $selected; ?>>
                                            <?php echo $row['tbcmei_nome']; ?>            </option>
                                            <?php 
                                         }
                                        ?>
                                    </select>
                                </div>
                                


                               
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