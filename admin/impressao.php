<?php
require('pdf_codabar.php');
include ('conn.php');
require_once('phpqrcode/qrlib.php');

$agora = date('d/m/Y H:i'); 
// processo de identificacao da maquina pelo ip .
 $ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
//echo "$ip"."<br>"; // imprimi o número IP
$ipF = $_SERVER["REMOTE_ADDR"]; //Pego o IP
//echo "$ip"."<br>"; // imprimi o número IP
$host = gethostbyaddr("$ip"); //pego o host
//echo "$host"."<br>";
$local = $ip."/".$ipF."/".$host;
$outros = $agora.'/'.$local;

// para exibir todos os registrosuse esse select : $sql="SELECT * FROM users ";
$conexao=$conn;
session_start();
 $rec_usuario= $_SESSION['usuario']; 
$agora = date('d/m/Y H:i'); 

$parametro = $_GET['var'];
//$parametro_val = $_POST['habilitacao_ven'];
if(($parametro=="")or($parametro=="0"))
{
 echo "<center> <img src='img/problema0.png' width='250' height='300'  />";
echo " <br><br> REGISTRO EM BRANCO   ";
echo " <br><br> <a href='insere.php?parametro=0'>";
echo " <input type='button' value='Voltar'>  </a> </center>";
}
else
{
 $sql =  "SELECT * FROM dadoste where D_ID LIKE '%".$parametro."%'and STATUS = 1 ";
	$result = mysqli_query($conn, $sql);
	$retorno_checkInEng = mysqli_num_rows($result);

  if(($retorno_checkInEng == 0)or($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
   {  //  echo"retorno zero de nome na base   ".$nome;
 //  $msg = " \n  Veiculo Motocicleta Placa ". $placa." \n    ".$permissionario."\n  Inserido em   ".$dt_inclusao."\n  retorno  ".$retorno_checkInEng; 
    echo "Dados nao encontrados ";
   }
  else
  {
					  $sql = "SELECT * FROM dadoste WHERE D_ID = '".$parametro."'" ;
                      $dados = mysqli_query($conn,$sql) or die(mysqli_error());
                      $linha = mysqli_fetch_assoc($dados);
                       $retnome = $linha['PERMISSIONARIO'];
				       $retnum  = $linha['VNUMVEICULO'];
                       $retveiculo  = $linha['VEICULO'];
		               $retprocesso = $linha['PROCESSONUM'];
				       $retplaca = $linha['VPLACA'];
					   $retmodelo = $linha['VMODELO'];
					  $retano = $linha['VANO'];
				       $retchassi = $linha['VCHASSI'];
					   $retemissor = $linha['VVISTORIANTE'];
					$rettemp=$linha['TEMP'];	
					$retmf_emissao=$linha['ALVAGENTEFISCAL'];	
					$rettpvistoria = $linha['MF_VISTORIA_TPO'];	
					$retmflimite = $linha['MF_LIMITE'];
                    $retmf_emissaodata= $linha['MF_EMISSAO'];	
                     $retrenavam=$linha['VRENAVAM'];	
				     $retusuario = $linha['MF_LOGIN'];
					  $total = mysqli_num_rows($dados);
				        //	$retmflimite ="15/12/2025";	
				        $obs=$linha['OBS'];	
                        $retcap=$linha['VCAPACIDADE'];	
                        $rettemp ="";	
					
	  
           $value = $retrenavam." ".$retplaca." ".$parametro.''.$retnome.''.$retnum;
          // Configuramos um nome único para o QR Code com base no número da matrícula. 
 //  <a href="javascript:;" onclick="window.print();return false"><button type="button" class="no-print" title="Imprimir">Imprimir</button></a>

          $qrCodeName = "imagem_qrcode_{$value}.png";
                 /**
                   * Realizamos a criação da imagem PNG, sendo passado as seguintes informações:
                   * 1º - A string que desejamos inserir no QR Code.
                   * 2º - O nome da imagem que criamos no passo anterior.
                   */
                  QRcode::png($value, $qrCodeName);

                  // Para finalizar realizamos a exibição da imagem no navegador.
//                  echo "<img src='{$qrCodeName}'>";

  
  

  ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Carteira</title>

  </head>
   <style>
                                      div {
                                       /* border: thick  groove  rgb(255,0,255);/*/
                                        border-style: solid;
                                        border-bottom-width: 10px;
                                        border-top-width: 0;
                                        border-right-width: 0;
                                        border-left-width: 0;
        
                                      }
                                      label.codDescricao {
                                       color:Red;
                                        font: 150% sans-serif;   
                                        font-weight:100;
                                        padding: 5px; 
                                       background: #D6D610; 
                                      }
                                      
                                      
                                      }
                                      label.code{
                                         color:black;
                                           font: 160% sans-serif;   
                                           font-weight:400;
                                           padding: 20px; 
                                       }
                                        label.code1{
                                           color:black;
                                           font: 90% sans-serif;   
                                           font-weight:600;
                                           padding: 3px; 
                                       }
                                       label.code2{
                                           color:Red;
                                           font: 90% sans-serif;   
                                           font-weight:100;
                                           padding: 3px; 
                                       }
                                        label.codeTit{
                                           color:black;
                                           font: 120% sans-serif;   
                                           font-weight:95;
                                           background: #F4EFEF;
                                           padding: 1px; 
                                       }
                                        label.codeseg{
                                           color:grey;
                                           font: 25% ClearSans-Italic ;   
                                           font-weight:35;
                                           padding: 0px; 
                                       }

                                          label.codeseg1{
                                           color:red;
                                           font: 55% sans-serif ;   
                                           font-weight:55;
                                           padding: 0px; 
                                       }
                                          div.Tabelas {
                                         display:inline-block;
                                        width: 110px;
                                        height: 45px;
                                        background: #FFFCFC;
                                        color: #EFE7E7;
                                        padding: 3px;
                                        border: 5px solid White;
   
                                        }

                                         div.Tabelas2 {
                                         display:inline-block;
                                        width: 115px;
                                        height: 40px;
                                        background: #FFFCFC;
                                        color: #3E3C3C;
                                        padding: 1px;
                                        border: 0px solid #EFE7E7;
   
                                        }

                                        div.Tabelas2S {
                                       
                                        width: 115px;
                                        height: 40px;
                                        border: 0px solid #EFE7E7;
   
                                        }

                                        div.Permissionario {
                                         display:inline-block;
                                          width: 250px;
                                        height: 15px;
                                        background: #FFFCFC;
                                        color: #EFE7E7;
                                        padding: 1px;
                                        border: 6px solid Snow;
   
                                        }

                                        div.Validacao {
                                        display:inline-block;
                                        width: 110px;
                                        height: 65px;
                                        background: #FFFCFC;
                                        color: #EFE7E7;
                                        padding: 1px;
                                        border: 0px solid red;
   
                                        }
                                            div.Pagina {
                                        width: 310px;
                                        height: 588px;
                                        background: transparente;
                                        color: #FCF7F7;
                                        border: 5px solid #DDDEEC;
                                          }


                                          div.Recorte1 {
                                        width: 295px;
                                        height: 510px;
                                        background: transparente;
                                        
                                        border: 5px dotted #F1EB48;
                                          }

    
                                        div.Recorte {
                                        width: 290px;
                                        height: 499px;
                                        background: transparente;
                                       
                                        border: 5px dotted #313030;
                                          }


                                          div.boxmodel1 {
                                        width: 260px;
                                        height: 468px;
                                        background: transparente;
                                      
                                        border: 5px solid #C3BD25;
                                        padding: 10px;
                                          }
                                        
                                          div.imgveiculo{
                                        width: 204px;
                                        height: 48px;
                                        
                                        background:  #E2ECEB;
                                        color: #FFF;
                                        border: 0px solid#CCC;
                                          }

                                         } 

                                         div.seguranca {
                                        width: 560px;
                                        height: 15px;
                                        background:  #E2ECEB;
                                        color: #FFF;
                                        border: 5px solid#CCC;
                                          }

                                          p.boxmodel2 {
                                        width: 240px;
                                        height: 35px;
                                        background: #F7F2F2;
                                        color: #FFF;
                                        padding: 1px;
                                        border: 1px solid #CCC;
                                         color:Red;
                                         font: 70% sans-serif;   
                                         font-weight:100;
                                    }
                                     .imglogo {
	                                     width:68px;
                                        height:22px;
	                                    padding: 1px;
                                       }
   
                                       .lin1 {
	                                    position:absolute; 
                                        width:260px;
                                         height:5px;
	                                     padding: 10px;
                                         left: 30px; /* posiciona a 90px para a esquerda */ 
	                                     top: 395px; /* posiciona a 70px para baixo */
                                        }
                                        .lin2 {
	                                    position:absolute; 
                                        width:500px;
                                         height:5px;
	                                     padding: 10px;
                                         left: 45px; /* posiciona a 90px para a esquerda */ 
	                                     top: 370px; /* posiciona a 70px para baixo */
                                        }


                                       .cab1 {
	                                    position:absolute; 
                                        width:194px;
                                         height:40px;
	                                     padding: 15px;
                                         left: 93px; /* posiciona a 90px para a esquerda */ 
	                                     top: 19px; /* posiciona a 70px para baixo */
                                        }
  
                                       .cab2 {
	                                    position:absolute; 
                                        width:135px;
                                         height:25px;
	                                     padding: 1px;
                                         left: 125px; /* posiciona a 90px para a esquerda */ 
	                                     top: 49px; /* posiciona a 70px para baixo */
                                        }
   
                                       .cab3 {
	                                    position:absolute; 
                                        width:100px;
                                         height:15px;
	                                     padding: 10px;
                                         left: 95px; /* posiciona a 90px para a esquerda */ 
	                                     top: 155px; /* posiciona a 70px para baixo */
                                        }
                                         .cab4 {
	                                    position:absolute; 
                                        width:400px;
                                        height:45px;
	                                     padding: 10px;
                                         left: 90px; /* posiciona a 90px para a esquerda */ 
	                                     top: 455px; /* posiciona a 70px para baixo */
                                        }
                                        .final {
	                                    position:absolute; 
                                        width:145px;
                                        height:20px;
	                                     padding: 10px;
                                         left: 145px; /* posiciona a 90px para a esquerda */ 
	                                     top: 380px; /* posiciona a 70px para baixo */
                                        }

    
                                    .vert { writing-mode: vertical-rl; }

                                        p{margin:10px 0;}
                                    
                                     .coder{color:red;font-weight:20;}
                                    .codermod{color:red;font-weight:500; font: 80% sans-serif;}
                                    .coderchassi{color:red;font-weight:500; font: 80% sans-serif;}
                                    .um {white-space: pre;}
                                    .dois {white-space: pre-wrap;}
                                    .tres {white-space: nowrap;}
                                    .quatro {white-space: pre-line;}
                                    .cinco {word-break: break-all;}
                                    .seis {word-break: keep-all;}
                                    .sete {line-break: break-all;}
                                    .oito {line-break: keep-all;}


                                    table.comBordaSimples {
                                        border-collapse: collapse; /* CSS2 */
                                        background: #FCFCF2;
                                    }
                                    table.comBordaSimples1 td {
                                        border: 1px solid black;
                                    }

                                    table.comBordaSimples td {
                                        border: 0px solid black;
                                    }
 
                                    table.comBordaSimples th {
                                        border: 0px solid black;
                                        background: #F0FFF0;
                                    }
                                    #resultado{
                                           text-align: left;
                                           color:black;
                                           font: 60% sans-serif;   
                                           font-weight:10;
                                           padding: 2px; 
                                    }
                                    #resultado2 {
                                        font: bolder, 'Arial';
                                        font-size: 9px;
                                        color: black;
                                        width: 50%;
                                      text-align: right;  
                                    }
                                    .container{
                                      position: relative;
                                      width: 264px;
                                      height: 55px;
                                    
                                      border: 0px solid #DDDEEC; 
                                    }

                                    .texto {
                                      position: absolute;
                                      top: 50%;
                                      left: 50%;
                                      transform: translate(-50%, -50%);
                                      z-index: 0;
                                    }
                                     .no-print {
                                           display::none
                                                  }     

                                    @media print { 
                                    #no-print { display:none; } 
                                    body { background: #fff; }
                                    }
                                    
    </style>

 <html>
  <body>
<div class="Pagina">
<div class="Recorte1">
  
  <div class="Recorte">
  <div class="boxmodel1">
              <img class="imglogo" src="img/Brasao.png" /> 
              <img class="cab1" src="img/titulov2.png" /> 
              
               <br>  <br>
              <label class="codeTit">LICENÇA PARA TRAFEGAR</label><br>
     <center>
               <div class="Tabelas">
                <center>
                   <table class="comBordaSimples1">
                      <thead>
                        <tr>
                         <th scope="col">ESCOLAR Nº</th>
                        </tr>
                     </thead>
                     <tbody>
                       <tr>
                          <td><center><label class="code2"><?php echo $retnum;?></label></center> </td>
                      </tr>
                     </tbody>
                   </table>
                   </center>
               </div>
              
             <div class="Tabelas">        
               <thead>
                 <center>
                  <table class="comBordaSimples1">       
                   <tr>
                     <th scope="col">VALIDADE </th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <td><center><label class="code2"><?php echo $retmflimite;?></label></center> </td>
                     </tr>
                   </tbody>
                 </table>
                  </center>
             </div>
     </center>        
     
          <div class="Permissionario">        
             <center>
              <img class="cab3" src="img/permissionario.png" /> 
              <label class="code1"> <?php echo $retnome?> </label>
             </center>
             
          </div>
     
         
    <center> 
             <div class="Tabelas2">
               <table class="comBordaSimples">
                  <thead>
                    <tr>
                     <th scope="col">PLACA</th>
                   </tr>
                   </thead>
                  <tbody>
                   <tr>
                      <td class="coder"><center><?php echo $retplaca;?></center> </td>
                    </tr>
                  </tbody>
               </table>
             </div>
           <div class="Tabelas2">
             <table class="comBordaSimples">
                  <thead>
                    <tr>
                     <th scope="col">ANO FAB</th>
                   </tr>
                  </thead>
                   <tbody>
                    <tr>
                      <td class="coder"><center><?php echo $retano;?></center> </td>
                    </tr>
                   </tbody>
             </table>
           </div>

      </center>
         <center>
          <div class="Tabelas2">
               <table class="comBordaSimples">
                  <thead>
                    <tr>
                     <th scope="col">MODELO/CAP</th>
                   </tr>
                  </thead>
                  <tbody>
                   <tr>
                      <td class="codermod"><center><?php echo $retmodelo."/".$retcap ;?></center> </td>
                    </tr>
                  </tbody>
               </table>
         
         </div>
          <div class="Tabelas2">
            <table class="comBordaSimples">
               <thead>
                <tr>
                 <th scope="col">CHASSI</th>
                </tr>
               </thead>
              <tbody>
               <tr>
                  <td class="coderchassi"><?php echo  mb_strimwidth($retchassi, 0, 15, "...");?> </td>
                </tr>
              </tbody>
            </table>
          </div>
     </center>
    
      <div class="Tabelas2S">
              <center>
                <p class="boxmodel2"> Sujeita a perda de validade e ou registro de serviço. Fixar no vertice superior direito do parabrisa  </p>          
              </center>
        </div>
   
              <div class="Validacao">        
                <?php echo "<img  src='{$qrCodeName}'width='116px'height='65px'>";?>
               </div>
    <img class="final" src="img/final.png"  /> 

<?php 
if (($retveiculo=="CAMIONETA")or($retveiculo=="CAMIONETE")){
 ?>
 <div class="imgveiculo"> 
       <img src="img/veic-camioneta.png" /> 
   </div>
<?php
  }
else
if (($retveiculo=="MICRO-ÔNIBUS")or($retveiculo=="MICRO-ONIBUS")or($retveiculo=="MICROONIBUS")){
    ?>
 <div class="imgveiculo"> 
       <img src="img/veic-micro.png" /> 
   </div>
<?php
  }
else
	{
        ?>
 <div class="imgveiculo"> 
       <img src="img/veic-onibus.png" /> 
   </div>
<?php

    }# code...


?>



 <div class="seguranca">        
   <center>  <label class="codeseg"> <?php echo $value;?> </label> <br>
    <span id="resultado2"><label class="codeseg1"> <?php echo $retveiculo ?> </label></span>           
    <span id="resultado2"><label class="codeseg1"> <?php echo "Emitido por : ".$rec_usuario." em  ".$outros;?> </label></span>
   </center>
 </div>
   
  <center>
 <br>
<div class="container">
<img src="img/obs.png" alt="Observacoes"><br>
 <span id="resultado"><?php echo $obs;?> </span></center>           
</div>
</div>
<br><br><br><br><br>
<br><br><br><br><br>

    <center>
<!-- exibe botao flutuante para imprimiar a pagina   -->
<a class="no-print" onClick="window.print();" >
    <img class="no-print" width="40px" height="40px" src="img/print.gif" border="0" title="Clique para Imprimir" />
</a>

</center>

</div>
</div>   

</div>    
</body>
    
</html>
   <?php
    }
    }
   ?>
