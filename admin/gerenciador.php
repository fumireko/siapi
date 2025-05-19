<?php 
      $today = date("Y-m-d H:i:s");     
      include ("conn.php");
      Function privilegio($conexao,$Fbase) {
        $status="1";
	    $query = "select * from tbusuarios where login ='".$Fbase."'";
         $result = mysqli_query($conexao, $query);
         $retorno_check = mysqli_num_rows($result);
         $row = mysqli_fetch_assoc($result);  
            if ($retorno_check == 1) { // foi encontrado usuario 
                     do {
                         $nivel = $row['nivel'];
                        }while($row = mysqli_fetch_assoc($result));
                        //   mysqli_close($conexao);                     
                       if ($nivel>2)
                          $msg="2";
                        else
                          $msg="1";  
            }     
            else // retorno negativo pois ou nao achou ou varios logins
             {
             
             $msg = "0"; //  "erro "
             }
        return $msg;
      } 
         ?>
<!DOCTYPE html>

<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro Diversos Tecnologia da Informação SMTI </title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	 <style type="text/css">
          .header{
           overflow : hidden;
	   	     background-color: #f2f2f2;  
		       position: fixed;
           top:0;
           width:100%;
	  	  }
		  .header a {
              float: left;
              display: block;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
           }
            /* Change background on mouse-over */
           .header a:hover {
             background: #ddd;
              color: black;
             }
     </style>
<script>
$(document).ready(function(){
   $('.btnDeletar').on('click', function(){
       $.ajax({ method: "POST",
       url: "not_add.php",
       success: function(data){
        alert('notificaçao Inserida');
       }
       });
   });
});

            function clickMe(){
                var result ="<?php php_func(); ?>"
               document.write(result);
             }

</script>


</head>

<body>
   


<?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        
        function php_func(){
            echo "Stay Safe";
        }
        
        function button2() 
            {
                echo "Botao 2 acionado " ;
            }
        function button1()
            {
                    include("conn.php");
                      $parametroSQL = "insert into tbnotificacao (status,autor,destino,msg_curta,msg_completa,data,hora,tipo,desc_evento) VALUES ('1', 'TESTE', 'CLAUDIO', 'ATIVIDADE INSERIDA', 'TESTE DE ATIVIDADE INSERIDA', '05/07/2023', '13:38:40', 'ATIVIDADE', 'INSERCAO DE ATIVIDADE : (NOME DA ATIVIDADE) , INSERIDO (NOME DO DESTINO) COMO RESPONSAVEL TECNICO. DATA PROGRAMADA ( DATA PROGRAMADA)')";      
                    $sql = $parametroSQL;
                    $result = mysqli_query($conn, $sql);
                      if($result == 1)
                           echo "Inserçao correta de notificaçao";
                         else
                           echo "nenhuma Inserçao realizada";
             }
    ?>
   <form method="POST" enctype="multipart/form-data" action="" >
      <div class="header">
			 <a href="inicial.php">Inicio</a>
			 <a href="consulta2.php">Consulta</a>
             <a href="manutencao.html">Manutençao  </a>
   	  </div>
	<br><br><br>

<div class="container">
      <h2>Gerenciador       </h2><br>
      <h4>  <?php echo $today ;?>  <br>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Dados Atividades</a></li>
        <li><a data-toggle="tab" href="#menu1">Dados Visita</a></li>
        <li><a data-toggle="tab" href="#menu2">Dados Acessos</a></li>
        <li><a data-toggle="tab" href="#menu3">Dados Usuarios</a></li>
        <li><a data-toggle="tab" href="#menu4">Arquivos diversos</a></li>
      </ul>
 <div class="tab-content">
    <div id="home" class="tab-pane fade in active" align="center" >
                <table id="table1">
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>    
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            <tr>
                            <td><a href= "compara.php"><img src="img\bbusca.png" BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = "Visualizar"  /> Compara </a></td>	
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td><a href= "ccs.php?par=55"><img src="img\bbusca.png" BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = "Visualizar"  /> CCS Altera </a></td>	
                            <td> &#8287 </td>
                            <td>  &#8287 </td>
                            <td><a href= "gerar_word.php"><img src="img\wordb.png" BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = "Visualizar"  /> Gerar Word </a></td>	
                            <td></td>
                            </tr>
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td> 
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            <tr>
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td> &#8287 </td>
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            
                            <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            </tr>
                            <tr>
                            <td><input type="submit" name="button1"    class="button" value="Button1" /> </td>
                            <td>  &#8287 </td>
                            <td>  &#8287 </td>
                            <td> <button type="button" onclick="btnDeletar()">Adicionar</button> </td>
                            <td>  &#8287 </td>
                           
                            <td> <button onclick="clickMe()"> Click </button> </td>
                            </tr>
                            </tr>
                              

                            
                            <tr>
                            <a href="not_master.php?ref_a=CLAUDIO">Notificaçoes Diversas &#8287 &#8287</a>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <a href="acesso_master.php?ref_a=CLAUDIO">&#8287 &#8287 Acessos Diversas</a><td>&#8287 </td>
                            </tr>
                            <tr>
                            <td> <input class="form-check-input" type="radio" name="RadioOption" id="Patrimonio" value="Patrimonio" ><label class="form-check-label" for="EquiPatrimonio">Patrimonio </label></td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td> <input class="form-check-input" type="radio" name="RadioOption" id="Geralequip" value="Geralequip" ><label class="form-check-label" for="Sistema64">Geral </label></td>
                            <td>&#8287 </td>
                            <td><input type="submit" name="button2"  class="button" value="teste" /> </td>
                            <td>&#8287 </td>
                            </tr>
                </table>       
                 <br /><br />
              
      </div>
    <div id="menu1" class="tab-pane fade">
           <h3></h3>
        <div id="home" class="tab-pane fade in active" align="center" >
                 <br><br>
                      <table id="table1">
                        <tr>
                          <td>   <!-- Email input -->
                                   <select name="destino" id="destino">
                                    <option value="VAZIO"> -----    NOME DO USUARIO   ------- </option>
                                    <option value="ADEMIR">ADEMIR</option>
                                    <option value="AMANDA">AMANDA</option>
                                    <option value="CEZAR">CEZAR</option>
                                    <option value="DANIELE">DANIELE</option>
                                    <option value="FABRICIO">FABRICIO</option>
                                    <option value="HENRIQUE">HENRIQUE</option>
                                    <option value="JOELMA">JOELMA</option>
                                    <option value="KELLY">KELLY</option>
                                    <option value="LEONARDO">LEONARDO</option>
                                    <option value="SKAU">SKAU</option>
                                    <option value="CLAUDIO">CLAUDIO</option>
                                    <option value="OUTRO">OUTRO</option>
                                   </select> </td>
                                         <td>&#8287 </td>
                                         <td>&#8287 </td>
                            <td><a href= "ver_acessos.php"><img src="img\bbusca.png" BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = "Visualizar"  /> Acessos Usuario </a></td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td><a href= "compara.php"><img src="img\bbusca.png" BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = "Visualizar"  /> Notificacoes Usuario </a></td>
                        </tr>
                        <tr>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                            <td>&#8287 </td>
                        </tr>
                     </table> 
                   <br><br>
                      </div>
        </div>
    <div id="menu2" class="tab-pane fade">
                      <div id="home" class="tab-pane fade in active" align="center" >
                            <table id="table3">
                                <tr>
                                 <td>&#8287 </td>
                                <td>&#8287 </td>
                                <td>&#8287 </td>
                                <td>&#8287 </td>
                                <td>&#8287 </td>
                                <td>&#8287 </td>
                                <td>&#8287 </td>
                                </tr>
                                <?php 
                                //   include ("conn.php");
	                             $query2 = "select * from tbacessos order by id desc LIMIT 25";
                                 $result2 = mysqli_query($conn, $query2);
                                 $retorno_check2 = mysqli_num_rows($result2);
                                  $row2 = mysqli_fetch_assoc($result2);  
                                    if ($retorno_check2 > 0) { // foi encontrado usuario 
                                             do {
                                                 $id = $row2['id'];   
                                                 $dt = $row2['data'];   
                                                 $login = $row2['login'];
                                                 $local = $row2['local'];
                                             ?>
                                 <tr>
                                   <td>Nome :&#8287 </td> 
                                   <td>&#8287 <?php echo "   ".$login; ?> </td>  
                                    <td>&#8287 Local :&#8287  </td> 
                                   <td> <?php echo "   ".$local; ?> </td>  
                                     <td>&#8287  Data :&#8287  </td> 
                                   <td> <?php echo "   ".$dt; ?> </td>  
                                   </tr>     
                                 <?php
                                          }while($row2 = mysqli_fetch_assoc($result2));
                                          }// fim do if retorno_check
                                          // mysqli_close($conexao);  
                                         ?> 
                            </table>     
                       </div>    
          </div>
    <div id="menu3" class="tab-pane fade">
       
    <div id="home" class="tab-pane fade in active" align="center" >
      <table id="table3">
        <tr>
       <td>&#8287 </td>
       </tr>
       <?php 
          include ("conn.php");
	     $query = "select * from tbusuarios where status=1";
         $result = mysqli_query($conn, $query);
         $retorno_check = mysqli_num_rows($result);
         $row = mysqli_fetch_assoc($result);  
            if ($retorno_check > 0) { // foi encontrado usuario 
                     do {
                         $id = $row['id'];   
                         $nome = $row['nome'];
                         $login = $row['login'];
                         $cpf = $row['cpf'];
                         $nivel = $row['nivel'];
                  //                   }while($row = mysqli_fetch_assoc($result));
                       ?>
        <tr>
        <td>Nome  : &#8287    </td>
        <td> <?php echo"   ".$nome; ?> </td>
        <td>&#8287 login : &#8287</td>
        <td><?php echo "   ".$login; ?> </td>
        <td>&#8287 CPF  :&#8287 </td>
        <td><?php echo "   ".$cpf." <>  Nivel : ".$nivel."   <>  Id : ".$id; ?> </td>
        <td> </td> </tr>     
        <?php
          }while($row = mysqli_fetch_assoc($result));
          }// fim do if retorno_check
         ?> 
       </table>     
      </div>    
       </div>
     
   
    <div id="menu4" class="tab-pane fade">
             <div id="home" class="tab-pane fade in active" align="center" >
           <textarea id="desc" name="desc" rows="10" cols="75" style="color:indianred">
                  Usuário: colombo Senha: aVeeb4pe7
                   acesso acesso phpmyadmin  https://138.122.92.70:2031/pma/
                    usuario : colombo
                    senha : R4bJr8Qr
                    acesso ftp
                    Endereço: 138.122.92.70
                    Usuário: sede@colombo.pr.gov.br
                        Senha: n68r71hB9iky
                    links uteis
                    IPM
                    https://colombo.atende.net/cidadao
                    portal ti
       https://colombo.atende.net/subportal/secretaria-municipal-de-tecnologia-da-informacao
                    orientacoes ti ...
                    https://portal.colombo.pr.gov.br/sede/TI/orientacoes.php
                    memorando ti...
                    Printer Brasil
                    https://printerdobrasil.com.br/
                    Sig Web  CtmGeo
                    https://colombo.ctmgeo.com.br:10085/geo-view/index.ctm
                    Web Mail
                    https://webmail.colombo.pr.gov.br/
                    Logim suporte Chamados
                    http://portal.colombo.pr.gov.br/siap/index.php
                    
                    UPDATE `tbatividades_visita` SET `id`='43' WHERE `data` ='12/06/2023' and`dt_programada`='23/06' and `resp_ter`='TESTE' AND`atividade_id`='19'
                    SELECT * FROM `tbatividades_visita` WHERE `data` ='02/06/2023' and`dt_programada`='10/06/2023'
                   https://api.whatsapp.com/send?phone=5541988594762&text=Ola%20,%20Preciso%20falar%20contigo%20sobre%20o%20Sistema
                   
                    Email criacao
                    https://webmail.colombo.pr.gov.br:7071/zimbraAdmin/
              </textarea>
                    </div>    
      </div>
        
  </div> <!--  fim do div tab content     --> 
    </div> <!--  fim do div container    --> 
       

     <div id="home" class="tab-pane fade in active" align="center" >
       <div class="container">
           <table>      
             <tr>
              <td>&#8287 </td>
              <td>&#8287 </td>
               <td>&#8287 </td>
              <td><input type="text" style="text-align:center ; text-transform:uppercase;" name="parametro" id="parametro" size=30 value= ""  >  </td>
              <td>&#8287 </td>
               <td>&#8287 </td>
              <td><button class="btn btn-default" >Buscar</button> </td>
              </tr>
           </table>
       </div>
      </div>


                <br><br><br><br><br><br><br><br>
                               
                 <center
            <div class="barra_atalhos">
                <table style="border-collapse: collapse;  "border="0"> 
                <tbody>
                <tr style="height: 117.266px;">
                 <td><a title="I N I C I O " href="inicial.php"img src="img/bsituacao.png"><img class="imagem1" src="img/bsituacao.png" alt="primeiro Icone" width="56" height="58"></a>  </td>
                <td><a title="C A D A S T R O S " href="cadastros.php"img src="img/binserir.png"><img class="imagem1" src="img/binserir.png" alt="primeiro Icone" width="56" height="58"></a>  </td>
                <td> <a title="C O N S U L T A S " href="pre_consulta.php"img src="img/bbusca.png"><img class="imagem1" src="img/bbusca.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="A L T E R A Ç O E S " href="pre_alterar.php"img src="img/balterar.png"><img class="imagem1" src="img/balterar.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td> <a title="R E L A T Ó R I O S " href=""img src="img/b_impressora.png"><img class="imagem1" src="img/b_impressora.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="C O M P R O M I S S O S " href="vis_diario.php"img src="img/bimplemento.png"><img class="imagem1" src="img/bimplemento.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td> <a title="Visualiza todas Atividades" href="diario.php"img src="img/b_caderno.png"><img class="imagem1" src="img/b_caderno.png" alt="primeiro Icone" width="54" height="56"></a>   </td>
                <td> <a title="Atividades Geral " href="atividades_geral.php"img src="img/bindisponivel.png"><img class="imagem1" src="img/bindisponivel.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="Cadastro Atividades ou Compromissos  " href="atividades.php"img src="img/banexo.png"><img class="imagem1" src="img/banexo.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="Cadastro de visitas " href="pre_insercao.php"img src="img/b_curriculos.png"><img class="imagem1" src="img/b_curriculos.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="Cadastro de Contratos " href="contratos.php"img src="img/bduvida.png"><img class="imagem1" src="img/bduvida.png" alt="primeiro Icone" width="56" height="58"></a>  </td>
                <td> <a title="Cadastro de Usuarios " href="cad_usuario.php"img src="img/b_usuario.png"><img class="imagem1" src="img/b_usuario.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="Consulta Atividades " href="pre_consulta.php"img src="img/btempo.png"><img class="imagem1" src="img/btempo.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td> <a title="Consulta Visitas " href="pre_insercao2.php"img src="img/bemail.png"><img class="imagem1" src="img/bemail.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td> <a title="Consulta Contratos " href="pre_contratos.php"img src="img/bfinalizar.png"><img class="imagem1" src="img/bfinalizar.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td><a title="Exclusivo " href="acesso_esp.php"img src="img/bcadeado.png"><img class="imagem1" src="img/bcadeado.png" alt="primeiro Icone" width="56" height="58"></a>   </td>
                <td> <a title="Anotaçoes Especiais Exclusivo do Secretario " href="anotacoes.php"img src="img/banotacoes1.png"><img class="imagem1" src="img/banotacoes1.png" alt="primeiro Icone" width="58" height="60"></a>   </td>
                <td><a title="Alterar Senha de Acesso  " href="alt_usuario.php?user=<?php echo $usuario?>"img src="img/b_key.png"><img class="imagem1" src="img/b_key.png" alt="primeiro Icone" width="56" height="58"></a>  </td>
                <td><a title="Contatar Desenvolvedor " href="https://api.whatsapp.com/send?phone=5541988594762&text=Ola%20,%20Preciso%20falar%20contigo%20sobre%20o%20Sistema" target="_blank"><img class="imagem1" height="56px" width="58px" src="img/bwats2.png"> </a></td>
                </tr>
                </tbody></table>
             </div>
             </center>
 </form>
</body>
</html>

<?php
        
?>