<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de departamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </head>
<!-- BEGIN BODY -->

<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php 
       include "index.php"
    ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>
                    <h2 class="title pull-left"> <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a> </h2></h2>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                                
                            </header>
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                             <form method="post" action="salvacmei.php">
                             <div>  
                             <label>Nome do Departamento: 
                                </div>
                                <div>
                                <input id="nome" name="nome" type="text" placeholder="Digite o nome do Departamento" size = "60" required>
                                </div>  
                                <div>  
                             <label>Nome da Secretaria: 
                                </div>
                                <div>
                                <?php 
                                    $sql = "SELECT * FROM tbsecretaria order by sec_nome";
                                    $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                    $option = '';
                                    while($row = mysql_fetch_array($resultado))
                                     { 
                                       $option .= "<option value = '".$row['sec_id']."'>".$row['sec_nome']."</option>";
                                     }                                   
                                ?>
                                <select name="sec_id" required>          
                                    <?php
                                        echo "<option value='0'></option>";
                                        echo $option;
                                    ?>        
                                    </select>
                                </div> 
                                <div>  
                             <label>É Interno?: 
                                </div>
                                <div>
                                <select name="interno">
                                        <option value=""></option>
                                        <option value="sim">sim</option>
                                        <option value="nao">não</option>
                                    </select>
                                </div>   
                             <div>  
                             <div>  
                             <label>Local?: 
                                </div>
                                <div>
                                <select name="local">
                                        <option value=""></option>
                                        <option value="Cmeis">Cmeis</option>
                                        <option value="Escolas">Escolas</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>   
                                
                                <div>
                                  <label for="coord">Diretor(a)</label>    
                               </div>        

                                <div>
                                <input id="coord" name="responsavel" type="text" placeholder="Digite o nome do(a) Diretor(a)" size = "60" required>
                                </div>  
                                <div>
                                  <label for="telefone">Telefone(a)</label>    
                               </div>        

                                <div>
                                <input id="telefone" name="telefone" type="text" placeholder="Digite o nome do(a) Diretor(a)" size = "60">
                                </div>  

                                <div>
                                  <label for="email">Email</label>    
                               </div>        

                                <div>
                                <input id="email" name="email" type="text" placeholder="Digite o email" size = "60" required>
                                </div>  
                                
                                <div>  
                                    <label>Cep: 
                                </div>
                                <div>
                                    <input name="cep" type="text" id="cep" value="" size="60" maxlength="9" required /></label><br />
                                </div>  
                                
                                <div>
                                    <label>Rua:
                                </div>
                                <div>
                                    <input name="rua" type="text" id="rua" size="60" /></label><br />
                                </div>

                                <div>
                                    <label>Num:
                                </div>
                                <div>
                                    <input name="num" type="text" id="rua" size="10" required /></label><br />
                                </div>
                                <div>
                                    <label>Bairro:
                                </div>
                               <div> 
                                <input name="bairro" type="text" id="bairro" size="60" /></label><br />
                                </div>
                                <div>
                                <label>Cidade:
                                </div>
                                <div>
                                <input name="cidade" type="text" id="cidade" size="60" /></label><br />
                                </div>
                                <div>
                                <label>Estado:
                                 </div>
                                 <div>
                                 <input name="uf" type="text" id="uf" size="2" /></label><br />
                                </div>
                                <br>
                            <div>
                            
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
