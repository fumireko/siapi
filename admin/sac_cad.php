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
   if (isset($_POST['cod'])) {
     $busca = $_POST['cod'];
    } else
     $busca = "0";

    if (ret_sac_by_cod($conn, $busca) == "1")  // verifica  a existencia de avaliacao  atraves do cod do chamado tecnico    ;
    {
    include "index.php";

    echo "<br><br> <br><br><div class='example_ERRO'>";

    $novo_msg = " <br> Essa Avaliaçao ja foi REALIZADA,  \n logo não eh possivel refaze-la !  ";

    echo "<center> <p style=color:red> <b>" . nl2br($novo_msg) . " </b>  </p></center> ";

    $rodape = "Colombo, " .$date . "   ";

    echo "<center> <p style=color:red> <b>" . nl2br($rodape) . " </b>  </p> <br><br>";
    echo "<a href='JavaScript: window.history.back();' title ='Voltar a pagina anterior para correçao ! ' >Voltar</a> </center> ";
    echo "</div>";


}
  else // nao existe avaliacao ainda
    {

    //$prob = $_POST['prob'];
    $hora = date("H:i:s");
    $sql = "SELECT * FROM tbldados WHERE id_dados = '" . $busca . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
//$sql = "SELECT * FROM tbldados WHERE id_dados LIKE '%" . $campo . "%' order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em CHAMADOS  ";
        echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        if ($total == 1) {
            //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
            do {

                //$qr = mysql_query($sql) or die(mysql_error());

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
    

       .fake-sel {
           display: none;
       }

       .fake-sel-wrap {
           display: inline-block;
           position: relative;
           height: 46px;
       }

           .fake-sel-wrap ul {
               margin: 0;
               padding: 0;
               list-style: none;
               border: 1px solid #ddd;
               position: absolute;
               top: 0;
               left: 0;
               font-family: Arial;
               font-size: 14px;
               width: 100%;
               height: 100%;
               overflow: hidden;
               cursor: default;
               background-color: white;
           }

               .fake-sel-wrap ul li {
                   padding: 3px;
                   line-height: 1em;
                   display: flex;
                   align-items: center;
               }


                   .fake-sel-wrap ul li:nth-child(1) {
                       border-bottom: 1px solid #ddd;
                   }

                   .fake-sel-wrap ul li.ativo {
                       background-color: blue;
                       color: white;
                   }

                   .fake-sel-wrap ul li:not(:nth-child(1)):not(.ativo):hover {
                       background-color: #ddd;
                   }


               .fake-sel-wrap ul.ativo {
                   overflow: auto;
                   height: auto;
               }

               .fake-sel-wrap ul li img {
                   width: 120px;
                   height: 40px;
                   margin-right: 10px;
               }

               /* ESTE É O CSS DA SETINHA */
               .fake-sel-wrap ul li:nth-child(1)::after {
                   content: '';
                   width: 0;
                   height: 0;
                   border-style: solid;
                   border-width: 6px 5px 0 5px;
                   border-color: #000000 transparent transparent transparent;
                   margin-left: auto;
               }

       //



       .fake-sel2 {
           display: none;
       }

       .fake-sel2-wrap {
           display: inline-block;
           position: relative;
           height: 46px;
       }

           .fake-sel2-wrap ul {
               margin: 0;
               padding: 0;
               list-style: none;
               border: 1px solid #ddd;
               position: absolute;
               top: 0;
               left: 0;
               font-family: Arial;
               font-size: 14px;
               width: 100%;
               height: 100%;
               overflow: hidden;
               cursor: default;
               background-color: white;
           }

               .fake-sel2-wrap ul li {
                   padding: 3px;
                   line-height: 1em;
                   display: flex;
                   align-items: center;
               }


                   .fake-sel2-wrap ul li:nth-child(1) {
                       border-bottom: 1px solid #ddd;
                   }

                   .fake-sel2-wrap ul li.ativo {
                       background-color: blue;
                       color: white;
                   }

                   .fake-sel2-wrap ul li:not(:nth-child(1)):not(.ativo):hover {
                       background-color: #ddd;
                   }


               .fake-sel2-wrap ul.ativo {
                   overflow: auto;
                   height: auto;
               }

               .fake-sel2-wrap ul li img {
                   width: 120px;
                   height: 40px;
                   margin-right: 10px;
               }

               /* ESTE É O CSS DA SETINHA */
               .fake-sel2-wrap ul li:nth-child(1)::after {
                   content: '';
                   width: 0;
                   height: 0;
                   border-style: solid;
                   border-width: 6px 5px 0 5px;
                   border-color: #000000 transparent transparent transparent;
                   margin-left: auto;
               }






   </style>     


    </head>
    <!-- BEGIN BODY -->
    <body>
    
      <script>
          
          $(function(){
   
   var sels = $(".fake-sel");
   
   var imgs_ = [
      [
         './img/star0.png','./img/star1.png', './img/star2.png','./img/star3.png','./img/star4.png','./img/star5.png',
 
      ],
      [
         '',
         ''
      ]
   ];

   sels.each(function(x){
      
      var $t = $(this);
      
      var opts_ = '', first;
      
      $t.find("option").each(function(i){
         
         if(i == 0){
            first = "<li><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
         }
         opts_ += "<li"+ (i == 0 ? " class='ativo'" : '') +"><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
      });

      $t
      .wrap("<div class='fake-sel-wrap'></div>")
      .parent()
      .css("width", $t.outerWidth()+100)
      .append("<ul>"+ first+opts_ +"</ul>")
      .find("ul")
      .on("click", function(e){
         e.stopPropagation();
         $(".fake-sel-wrap ul")
         .not(this)
         .removeClass("ativo");
         $(this).toggleClass("ativo");
      })
      .find("li:not(:first)")
      .on("click", function(){
         $(this)
         .addClass("ativo")
         .siblings()
         .removeClass("ativo")
         .parent()
         .find("li:first")
         .html($(this).html());
         
         $t.val($(this).text());
         
      });
   });
   
   $(document).on("click", function(){
      $(".fake-sel-wrap ul").removeClass("ativo");
   });
   
});


//

          $(function(){
   
   var sels = $(".fake-sel2");
   
   var imgs_ = [
      [
         './img/star0.png','./img/star1.png', './img/star2.png','./img/star3.png','./img/star4.png','./img/star5.png',
 
      ],
      [
         '',
         ''
      ]
   ];

   sels.each(function(x){
      
      var $t = $(this);
      
      var opts_ = '', first;
      
      $t.find("option").each(function(i){
         
         if(i == 0){
            first = "<li><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
         }
         opts_ += "<li"+ (i == 0 ? " class='ativo'" : '') +"><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
      });

      $t
      .wrap("<div class='fake-sel2-wrap'></div>")
      .parent()
      .css("width", $t.outerWidth()+100)
      .append("<ul>"+ first+opts_ +"</ul>")
      .find("ul")
      .on("click", function(e){
         e.stopPropagation();
         $(".fake-sel2-wrap ul")
         .not(this)
         .removeClass("ativo");
         $(this).toggleClass("ativo");
      })
      .find("li:not(:first)")
      .on("click", function(){
         $(this)
         .addClass("ativo")
         .siblings()
         .removeClass("ativo")
         .parent()
         .find("li:first")
         .html($(this).html());
         
         $t.val($(this).text());
         
      });
   });
   
   $(document).on("click", function(){
      $(".fake-sel2-wrap ul").removeClass("ativo");
   });
   
});



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
                 <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary'>Consultar Chamados(SAC) </a>
                <a href='./sac_consulta2.php' class='btn btn-primary'>Consultar Avaliaçoes(SAC) </a>
              
             
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

    