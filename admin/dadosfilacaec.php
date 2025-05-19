<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
$tbcmei_nome = $_SESSION['tbcmei_nome'];
$id_cmei = $_SESSION['unidade_usuario'];
$nivel = $_SESSION['nivel_usuario'];
if (!isset($_SESSION)){
 session_start();
}

$email_usuario = $_SESSION['email_usuario'];
$nome_usuario = $_SESSION['nome_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario'];
$unidade_usuario = $_SESSION['unidade_usuario']; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="author" content="Admin" />
        <title>SEMTI - Sistema de Gestao T.I</title>
       
      
<script>

	function valida(){

		if(document.form.simexame.value == "" && document.form.exame.value == "sim"){
			alert("Digite o exame");
			document.getElementById("simexame").focus();
			return false;
		}

        if(document.form.simlaudo.value == "" && document.form.laudo.value == "sim"){
			alert("Digite o laudo");
			document.getElementById("laudo").focus();
			return false;
		}

        if(document.form.simmedicacao.value == "" && document.form.medicacao.value == "sim"){
			alert("Digite a medicação");
			document.getElementById("medicacao").focus();
			return false;
		}

        if(document.form.simterapeuta.value == "" && document.form.terapeuta.value == "sim"){
			alert("Digite a especilaidade");
			document.getElementById("terapeuta").focus();
			return false;
		}

	}
		
</script>
    </head>
    <!-- BEGIN BODY -->
    <body>
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
    <!-- Dados do aluno-->
    <?php
        $tbaluno_id = $_REQUEST['tbaluno_id'];
        $consulta = mysql_query("SELECT * from tbaluno where tbaluno_id =$tbaluno_id ");
        while($linhas = mysql_fetch_object($consulta)) {
        $dtn = $linhas->tbaluno_dtnasc;
        $dtansc = implode("/",array_reverse(explode("-",$dtn)));
       ?>
    <header class="panel_header">
            <h2 class="title pull-left">Atender direto</h2>
            <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 <a href='' class='btn btn-primary'>Novo</a>
                 <a href='' class='btn btn-primary'>Novo</a>
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
     </header>

     
    <form class="form-horizontal" id="form" 
        name = "form"
        onsubmit="return valida(this);"
        action = "salvaenvio.php" 
        method="POST">
    <fieldset>
            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
            role="alert">Solicitacao feita com sucesso!</div>
            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
            role="alert">Erro ao realizar a solicitacao!</div>
    
            <!-- Text input-->          
            <br/>
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Escola/CMEI:</label>
            <div class="col-md-4">
            <?php 
            $sql = "SELECT * FROM tbcmei where tbcmei_local like '%cmei%' order by tbcmei_nome";
            $resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
            $option = '';
                 while($row = mysql_fetch_array($resultado))
                { 
                  $option .= "<option value = '".$row['tbcmei_id']."'>".$row['tbcmei_nome']."</option>";
                }                                    
               ?>
               <td>
            <select class="form-control m-bot15" name="id_cmei" class="form-control input-md" required>          
            <?php
                if ($nivel == 1){
                echo "<option value='0'></option>";
                echo $option;
                }
                 else    
                     {
                      echo "<option value=$id_cmei>$tbcmei_nome</option>";
                     }
                    ?>        
                 </select>
            </div>
            </div>
             <!-- Text input-->   
            <div class="form-group">
            <label class="col-md-4 control-label" for="objeto">Nome da crianca:</label>
            <div class="col-md-4">
            <input type="hidden" name="aluno_id" value="<?php echo $linhas->tbaluno_id ?>">  
            <input id="aluno_id" name="aluno_id" type="text" disabled="disable" 
             value="<?php echo $linhas->tbaluno_nome;?>" placeholder="Informe o nome do aluno"
             placeholder="Nome do solicitante" class="form-control input-md"required>
            </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="email">Data de nascimento:</label>
            <div class="col-md-4">
            <input type="hidden" class="form-control" id="field-1" name="dtcad" value="<?PHP echo $dtansc?>" > 
            <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $dtansc?>" >  
               </div>
            </div>
                <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Nome do(s) responsável(eis): </label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_nmae?>">
              </div>
              </div>
               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Telefone: </label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_tel?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Celular: </label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->celu?>">
              </div>
              </div>

               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Celular: </label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->celular?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Turma: </label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="field-1" disabled="disable" value="<?PHP echo $linhas->tbaluno_turma?>">
              </div>
              </div>

               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Especialidade: </label>
              <div class="col-md-4">
                   <select class="form-control m-bot15" name="espec" class="form-control input-md" required>
        		   <option value=""> </option>
          		   <option value="Psicologia">Psicologia</option>
				    <option value="Fonoaudiologia">Fonoaudiologia</option>
          	 	</select>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="nsere">Número do cadastro no SERE: </label>
              <div class="col-md-4">
              <input type="text" name="nsere" class="form-control" id="field-1" >
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="dccf">Algumas das possíveis queixas: </label>
              <div class="col-md-4">
              <input type="checkbox" id="dccf" name="dccf" value="Dificuldade para compreender o que a criança fala"> 
              <label for="dccf">Dificuldade para compreender o que a criança fala; </label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="af"></label>
              <div class="col-md-4">
              <input type="checkbox" id="af" name="af" value="Ausência de fala">
              <label for="af">Ausência de fala;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="acpf"></label>
              <div class="col-md-4">
              <input type="checkbox" id="acpf" name="acpf" value="A criança parece não compreender o que as pessoas falam">
               <label for="acpf">A criança parece não compreender o que as pessoas falam;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="da"></label>
              <div class="col-md-4">
              <input type="checkbox" id="da" name="da" value ="Desinteresse pela aprendizagem">
              <label for="da">Desinteresse pela aprendizagem;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="pv"></label>
              <div class="col-md-4">
              <input type="checkbox" id="pv" name="pv" value = "Problema vocal">
              <label for="pv">Problema vocal;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="qauditiva"></label>
              <div class="col-md-4">
              <input type="checkbox" id="qa" name="qauditiva" value ="Queixa auditiva">
              <label for="qauditiva">Queixa auditiva;</label>
              
              </div>
              </div>

            
               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="qvisual"></label>
              <div class="col-md-4">
              <input type="checkbox" id="qvisual" name="qvisual" value ="Queixa visual">
              <label for="qvisual">Queixa visual;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="difia"></label>
              <div class="col-md-4">
              <input type="checkbox" id="difia" name="difia" value="Dificuldade na alfabetização">
              <label for="difia">Dificuldade na alfabetização;</label>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="desatencao"></label>
              <div class="col-md-4">
              <input type="checkbox" id="desatencao" name="desatencao" value ="Desatenção">
              <label for="desatencao">Desatenção;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="dle"></label>
              <div class="col-md-4">
              <input type="checkbox" id="dle" name="dle" value = "Distúrbio de leitura e escrita">
              <label for="dle">Distúrbio de leitura e escrita;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="ee"></label>
              <div class="col-md-4">
              <input type="checkbox" id="ee" name="ee" value="Enurese e/ou encoprese (xixi e cocô na cama ou na calça)"> 
              <label for="ee">Enurese e/ou encoprese (xixi e cocô na cama ou na calça);</label>
              
              </div>
              </div>

               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="agressividade"></label>
              <div class="col-md-4">
              <input type="checkbox" id="agressividade" name="agressividade" value ="Agressividade">
              <label for="agressividade">Agressividade; </label>
              
              </div>
              </div>

               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="autoagressividade"></label>
              <div class="col-md-4">
              <input type="checkbox" id="autoagressividade" name="autoagressividade" value ="Auto-agressividade" >
              <label for="autoagressividade">Auto-agressividade; </label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="apatia"></label>
              <div class="col-md-4">
              <input type="checkbox" id="apatia" name="apatia" value = "Apatia">
              <label for="apatia">Apatia;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="gagueira"></label>
              <div class="col-md-4">
              <input type="checkbox" id="gagueira" name="gagueira" value = "Gagueira">
              <label for="gagueira">Gagueira;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="exageradoemotivo"></label>
              <div class="col-md-4">
              <input type="checkbox" id="exageradoemotivo" name="exageradoemotivo" value = "Exageradamente emotivo">
              <label for="exageradoemotivo">Exageradamente emotivo;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="nervosismo"></label>
              <div class="col-md-4">
              <input type="checkbox" id="nervosismo" name="nervosismo" value = "Nervosismo">
              <label for="nervosismo">Nervosismo;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="agitacao"></label>
              <div class="col-md-4">
              <input type="checkbox" id="agitacao" name="agitacao" value = "Agitação">
              <label for="agitacao">Agitação;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="sintomasinseguranca"></label>
              <div class="col-md-4">
              <input type="checkbox" id="sintomasinseguranca" name="sintomasinseguranca" value = "Sintomas de Insegurança">
              <label for="sintomasinseguranca">Sintomas de Insegurança;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="hiperatividade"></label>
              <div class="col-md-4">
              <input type="checkbox" id="hiperatividade" name="hiperatividade" value = "Hiperatividade">
              <label for="hiperatividade">Hiperatividade;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="baixaautoestima"></label>
              <div class="col-md-4">
              <input type="checkbox" id="baixaautoestima" name="baixaautoestima" value = "Baixa autoestima">
              <label for="baixaautoestima">Baixa autoestima;</label>
              
              </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="sintomasdepressao"></label>
              <div class="col-md-4">
              <input type="checkbox" id="sintomasdepressao" name="sintomasdepressao" value= "Sintomas de depressão">
              <label for="sintomasdepressao">Sintomas de depressão;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="dificuldadesocializacao"></label>
              <div class="col-md-4">
              <input type="checkbox" id="dificuldadesocializacao" name="dificuldadesocializacao" value = "Dificuldade na socialização">
             <label for="dificuldadesocializacao">Dificuldade na socialização;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="atrasonalinguagemoral"></label>
              <div class="col-md-4">
              <input type="checkbox" id="atrasonalinguagemoral" name="atrasonalinguagemoral" value ="Atraso na linguagem oral">
              <label for="atrasonalinguagemoral">Atraso na linguagem oral;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="epasec"></label>
              <div class="col-md-4">
              <input type="checkbox" id="epasec" name="epasec" value="Está passando por alguma situação emocionalmente complicada">
              <label for="epasec">Está passando por alguma situação emocionalmente complicada;</label>
              
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="seletividadealimentar"></label>
              <div class="col-md-4">
              <input type="checkbox" id="aeletividadealimentar" name="seletividadealimentar" value = "Seletividade Alimentar" >
              <label for="aeletividadealimentar">Seletividade Alimentar.</label>
              
              </div>
              </div>
                
              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">QUEIXA PRINCIPAL: </label>
              <div class="col-md-4">
              <textarea id="queixa" name="queixa" rows="4" cols="50" minlength= "250"  required>
               </textarea>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="exame">Tem exames e/ou avaliações ? </label>
              <div class="col-md-4">
              <select class="form-control m-bot15" name="exame" id = "exame">
                <option></option>
                <option value="sim">Sim</option>
				<option value="nao">Não</option>
                
              </select>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="simexame">Em caso afirmativo, quais? </label>
              <div class="col-md-4">
              <input type="text" name="simexame" class="form-control" id="simexame" >
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="laudo">Tem algum laudo médico ? </label>
              <div class="col-md-4">
               <select class="form-control m-bot15" name="laudo" id="laudo">
                <option></option>
                <option value="sim">Sim</option>
				<option value="nao">Não</option>               
              </select>
              </div>
              </div>


              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="simlaudo">Em caso afirmativo, quais? </label>
              <div class="col-md-4">
              <input type="text" name="simlaudo" class="form-control" id="simlaudo" >
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="medicacao">Faz uso de medicação ? </label>
              <div class="col-md-4">
              <select class="form-control m-bot15" name="medicacao" id="medicacao">
                <option></option>
                <option value="sim">Sim</option>
				<option value="nao">Não</option>  
              </select>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="simmedicacao">Em caso afirmativo, quais? </label>
              <div class="col-md-4">
              <input type="text" name="simmedicacao" class="form-control" id="simmedicacao" >
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="terapeuta">Está em algum acompanhamento médico e/ou terapêutico? </label>
              <div class="col-md-4">
              <select class="form-control m-bot15" name="terapeuta" id="terapeuta">
                <option></option>
                <option value="sim">Sim</option>
				<option value="nao">Não</option>  
              </select>
              </div>
              </div>
               <!-- Text input-->
               <div class="form-group">
              <label class="col-md-4 control-label" for="simterapeuta">Em caso afirmativo, qual(is) especialidade(s)? </label>
              <div class="col-md-4">
              <input type="text" name="simterapeuta" class="form-control" id="simterapeuta" >
              </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Nome do(a) Professor(a)</label>
              <div class="col-md-4">
              <input type="text" name="nprefessor" class="form-control" id="field-1" required>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Nome do(a) Diretora/Coordenador(a)</label>
              <div class="col-md-4">
              <input type="text" name="ndiretor" class="form-control" id="field-1" required>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="telefone">Assessora Pedagógica da SEMED</label>
              <div class="col-md-4">
              <input type="text" name="nassessora" class="form-control" id="field-1" required>
              </div>
              </div>
                    <?php } ?>
              <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="ENVIAR CADASTRO" 
                              id="salvar" name="salvar" class="btn btn-primary" /></div>
                         </div>
                                    </div>
                                </fieldset>
                            </form>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    