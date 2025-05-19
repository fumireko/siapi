
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $id_cmei = $_SESSION['unidade_usuario'];
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
        $consulta = mysql_query("SELECT * from tbcmei where tbcmei_id = $tbcmei_id ");
        while($linhas = mysql_fetch_object($consulta)) {
        $id_depto = $linhas->tbcmei_id;
        ?>
        <header class="panel_header">
        <h2 class="title pull-left"> <a id="gerarExcel" href="./editasec.php?id_depto=<?php echo $id_depto;?>" class="btn btn-primary">Mudar secretaria</a> </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" id="" action = "salteradpto.php">
                                <!-- Text input-->
                            <div class="form-row">
                                <label class="col control-label" for="cpf_estag">Nome departamento</label>
                               <div class="col">
                                <input type="hidden" name="id_dpto" value="<?php echo $linhas->tbcmei_id ?>">  
                                <input id="aluno_id" name="nome_dpto" type="text"  value="<?php echo $linhas->tbcmei_nome?>" placeholder="Nome Cmei"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="cpf_estag">Responsável</label>
                                <div class="col">
                                <input id="aluno_id" name="nome_resp" type="text"  value="<?php echo $linhas->tbcmei_coord?>" placeholder="Nome Responsável"
                                class="form-control input-md">
                                </div>
                                <label class="col control-label" for="telefone">Telefone</label>
                                <div class="col">
                                <input id="aluno_id" name="telefone" type="text"  value="<?php echo $linhas->tbcmei_tel?>" placeholder="Telefone"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="email">Email</label>
                                <div class="col">
                                <input id="aluno_id" name="email" type="text"  value="<?php echo $linhas->tbcmei_email?>" placeholder="Email"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="cep">Cep</label>
                                <div class="col">
                                <input id="aluno_id" name="cep" type="text"  value="<?php echo $linhas->tbcmei_cep?>" placeholder="Cep"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="endereco">Enedereço</label>
                                <div class="col">
                                <input id="aluno_id" name="endereco" type="text"  value="<?php echo $linhas->tbcmei_end?>" placeholder="Endereço"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="num">Num</label>
                                <div class="col">
                                <input id="aluno_id" name="num" type="text"  value="<?php echo $linhas->tbcmei_num?>" placeholder="Número"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="comp">Complemento</label>
                                <div class="col">
                                <input id="aluno_id" name="comp" type="text"  value="<?php echo $linhas->tbcmei_comp?>" placeholder="Complemento"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="bairro">Bairro</label>
                                <div class="col">
                                <input id="aluno_id" name="bairro" type="text"  value="<?php echo $linhas->tbcmei_bairro?>" placeholder="Bairro"
                                class="form-control input-md">
                                </div>

                                <label class="col control-label" for="cidade">Cidade</label>
                                <div class="col">
                                <input id="aluno_id" name="cidade" type="text"  value="<?php echo $linhas->tbcmei_cidade?>" placeholder="Cidade"
                                class="form-control input-md">
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