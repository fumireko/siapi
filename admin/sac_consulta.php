<style>
    .example{
    height: 450px;
    width: 45%;
    border: 5px solid black;
    background-color: lemonchiffon;
    margin: 0 auto;
}
    .example_ERRO {
        height: 200px;
        width: 45%;
        border: 5px solid black;
        background-color: tan;
        margin: 0 auto;
    }


.sidebar{
     height:500px;   
}
    </style>


<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
include "bco_fun.php";

date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');


if (isset($_GET['cod'])) {
    $busca = $_GET['cod'];
} else
     $busca = "0";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SMTI - Sistema de Gestao T.I</title>
       <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <style>
    



   </style>     


    </head>
    <!-- BEGIN BODY -->
    <body>
    
      <script>
          

</script>
        <!-- START TOPBAR -->
        <?php
                        include "index.php"
                            ?> 
        <div id="main-content">
        <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Sistema de Gestao T.I</h1>
        </div>
    </div>
    </div>
     <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
            <h2 class="title pull-left">Controle de Qualidade em Atendimentos T.I  </h2><br />
     
        <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='./sac_chamados.php' class='btn btn-primary'>Consultar Chamados(SAC) </a>
                <a href='./emprest_consulta.php' class='btn btn-primary'>Consultar Avaliaçoes(SAC) </a>
              
             
            </div>
     </header>
    <form class="form-horizontal" method="POST" id="sdev" action="sac_salva.php">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
            <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
                      <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
          
            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
            <br/>
   

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



        <!-- Text input-->
                    <div class="form-group">
                 <div class="col-md-11">
                    <label class="col-md-4 control-label" for="telefone">Solicitante :  <?php echo "  " . $linha['nsolicitante'] . "  " . $linha['telefone']; ?>   </label> 
                  
                   <label  class="col-md-8 control-label" for="telefone"> <?php echo " Local  " . nomedolocal($conn, $linha['id_setor']) . "   --    " . nomedesecretaria($conn, $linha['id_sec']) . " -- "; ?>  </label> 
                 </div>
                    
                    </div>

         <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-2 control-label" for="telefone">Chamado Nº : </label>
                    <div class="col-md-2">
                      <input  name="ch_cod" id="ch_cod" type="text" title="Codigo do Chamado"  value = "<?php echo $linha['id_dados']; ?> "
                      placeholder="Codigo do Chamado "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none" readonly> 
                                         
                    </div>
                      <label class="col-md-1 control-label" for="telefone">Tecnico : </label>   
                        <div class="col-md-2">
                     <input  name="tecnico" id="tecnico" type="text" title="tecnico que atendeu o Chamado"  value = " <?php echo $linha['tecnico']; ?>  "
                      placeholder="Tecnico do Serviço "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none" readonly> 
                        </div>

                    <label class="col-md-2 control-label" for="telefone">Tipo Serviço  : </label>   
                        <div class="col-md-2">
                     <input  name="tp" id="tp" type="text" title="tipo de Serviço"  value = " <?php echo $linha['tpservico']; ?>  "
                      placeholder="tipo de Serviço "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none" readonly> 
                        </div>

                    

                    </div>     
            
      <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-2 control-label" for="telefone">Data do Chamado  : </label>
                    <div class="col-md-2">
                      <input  name="dt_ch" id="dt_ch" type="text" title="Data e hora da Abertura "  value = "<?php echo $linha['data'] . " Hr " . $linha['hora']; ?> "
                    placeholder="Data e Hora da abertura do Chamado "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none" readonly > 
                    </div>

                       
                    <label class="col-md-1 control-label" for="telefone">Atendimento : </label>
                    <div class="col-md-2">
                   <input  name="dt_aten" id="dt_aten" type="text" title="Data e hora do Atendimento"  value = "<?php echo $linha['dtaatendido'] . " Hr " . $linha['cha_horai']; ?> "
                    placeholder="Data e hora do Atendimento "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none"readonly > 
                    </div>

                    <label class="col-md-2 control-label" for="telefone">Finalizaçao : </label>
                    <div class="col-md-2">
                   <input  name="dt_fim" id="dt_fim" type="text" title="Data e hora de Finalizacao"  value = "<?php echo $linha['dtafin'] . " Hr " . $linha['cha_horaf']; ?> "
                    placeholder="Data e hora da Finalizaçao do Atendimento "   class="form-control input-md" style="background-color: lightgray;color:#000000; resize:none" readonly> 
                    </div>


                    </div>     
          
        
    
                     <!-- Text input-->
                     <div class="form-group" id="justificativa">
                            <label class="col-md-2 control-label" for="justificativa">Descrição:</label>
                            <div class="col-md-4">
                            <textarea id="desc" name="desc" style="background-color: lightgray;color:#000000; resize:none"
                            rows="6"  placeholder="" class="form-control input-md" readonly > "<?php echo $linha['prob']; ?> "
                          </textarea> 
                            </div>
                        
                      
                  
                            <label class="col-md-2 control-label" for="justificativa">Resoluçao:</label>
                            <div class="col-md-3">
                            <textarea id="res" name="res" style="background-color: lightgray;color:#000000; resize:none"
                            rows="6" placeholder="" class="form-control input-md" readonly > "<?php echo $linha['solucao']; ?> "
                                                            </textarea>
                            </div>
                        </div>

                      <!-- Text input-->

            

                      <!-- -->
                      <!-- Text input-->
                     <div class="form-group" id="justificativa">
                            <label class="col-md-4 control-label" for="justificativa">Observação / Sugestão :</label>
                            <div class="col-md-6">
                            <textarea id="sugestao" name="sugestao"  style="background-color: beige;color:#000000;"
                            rows="3" title="Alguma Observaçao referente  ao atendimento" class="form-control input-md"  > 
                            </textarea>
                            </div>
                        
       </div>
                       

                   <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Avaliação do Serviço : </label>
                    <div class="col-md-8">
                        <img src="./img/star0.png" title="0 Estrelas " width="85" height="30"/> 
                                <input type="radio" id="inputradio" class="personalizado" title="0 Estrelas" checked name="name" value="0">
                        &nbsp &nbsp   <img src="./img/star1.png" title="1 Estrela " width="85" height="30"/>
                                <input type="radio" id="inputradio" class="personalizado" title="1 Estrelas" name="name" value="1">
                     &nbsp &nbsp    <img src="./img/star2.png" title="2 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio" class="personalizado" title="2 Estrelas" name="name" value="2">   
                    &nbsp &nbsp    <img src="./img/star3.png" title="3 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio" class="personalizado" title="3 Estrelas" name="name" value="3"> 
                     &nbsp &nbsp   <img src="./img/star4.png" title="4 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio" class="personalizado" title="4 Estrelas" name="name" value="4">    
                    &nbsp &nbsp    <img src="./img/star5.png" title="5 Estrelas " width="85" height="30"/>
                               <input type="radio" id="inputradio" class="personalizado" title="5 Estrelas" name="name" value="5">
                        </select>

                    </div>
                        </div>



          <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Avaliação do Tecnico : </label>
                    <div class="col-md-8">
                        <img src="./img/star0.png" title="0 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio1" class="personalizado" title="0 Estrelas"  checked name="name1" value="0">
                     &nbsp &nbsp      <img src="./img/star1.png" title="1 Estrela " width="85" height="30"/>
                                <input type="radio" id="inputradio1" class="personalizado" title="1 Estrelas" name="name1" value="1">
                   &nbsp &nbsp      <img src="./img/star2.png" title="2 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio1" class="personalizado" title="2 Estrelas" name="name1" value="2">   
                    &nbsp &nbsp    <img src="./img/star3.png" title="3 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio1" class="personalizado" title="3 Estrelas" name="name1" value="3"> 
                    &nbsp &nbsp    <img src="./img/star4.png" title="4 Estrelas " width="85" height="30"/>
                                <input type="radio" id="inputradio1" class="personalizado" title="4 Estrelas" name="name1" value="4">    
                   &nbsp &nbsp     <img src="./img/star5.png" title="5 Estrelas " width="85" height="30"/>
                               <input type="radio" id="inputradio1" class="personalizado" title="5 Estrelas" name="name1" value="5">
                        </select>

                    </div>
                        </div>



                    </div>              
        
                   
                   

                          <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="REGISTRAR" name="salvar" class="btn btn-primary" /></div>
                         </div>
                        </div>
                        </fieldset>
                        </form>
                       <?php
            } while ($linha = mysqli_fetch_assoc($dados));
        }

    }
}             ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    