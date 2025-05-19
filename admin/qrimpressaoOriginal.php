<?php
include ('conn2.php');
include ('bco_fun.php');
include "../Config/config_sistema.php";

require_once('phpqrcode/qrlib.php');

$agora = date('Y/m/d H:i'); 
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
//session_start();
 $rec_usuario= $_SESSION['usuario']; 
$agora = date('d/m/Y H:i');

if (isset($_POST['plaqueta'])){ // recebimento por post
   
    $ret_parametroP = $_POST['plaqueta']; // campo digitavel em qr_ind.php    
}
else{
    $ret_parametroP = ""; // campo vazio digitavel em qr_ind.php
}

if (isset($_GET['var'])) {
    $ret_parametroG = $_GET['var']; // campo digitavel em qr_ind.php    
} else {
    $ret_parametroG = ""; // campo vazio digitavel em qr_ind.php
}

if ($ret_parametroP <> "") {
    // recebimento atraves do metodo post direto de qr_ind
    $parametro = $ret_parametroP;
    
if (($parametro == "") or ($parametro == "0")) {
    echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
    echo " <br><br> REGISTRO EM BRANCO   ";
    echo " <br><br> <a href='qr_ind.php?parametro=0'>";
    echo " <input type='button' value='Voltar'>  </a> </center>";
} else   
{
 $sql =  "SELECT * FROM tbequip where tbequip_plaqueta = '".$parametro."'  ";
	$result = mysqli_query($conn, $sql);
	$retorno_checkInEng = mysqli_num_rows($result);

  if(($retorno_checkInEng == 0)or($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
   {  //  echo"retorno zero de nome na base   ".$nome;
 //  $msg = " \n  Veiculo Motocicleta Placa ". $placa." \n    ".$permissionario."\n  Inserido em   ".$dt_inclusao."\n  retorno  ".$retorno_checkInEng; 
        $titulo = "\n Resultado da busca do Patrimonio    \n " . $parametro . " \n  Registro nao sEncontrado  ";
        echo "<center> <p style=color:red> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        echo " <center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> <br>";
      
   }
  else
  {
				//	  $sql = "SELECT * FROM dadoste WHERE D_ID = '".$parametro."'" ;
                      $dados = mysqli_query($conn,$sql) or die(mysqli_error());
                      $row = mysqli_fetch_assoc($dados);
                        $ret_idloc = $row['tbequi_tbcmei_id'];
                        $ret_desc = $row['tbequi_mod'];
                        $ret_id = $row['tbequip_id'];
                        $ret_status = $row['status'];
                        $ret_nome = $row['tbequi_nome'];
                         



                        $rettemp ="";
                        $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equip.php?tbequip_id=';
                        //$localizacao = "servidor";

                        $value = $localizacao.$ret_id;
                      // Configuramos um nome único para o QR Code com base no número da matrícula. 
 //  <a href="javascript:;" onclick="window.print();return false"><button type="button" class="no-print" title="Imprimir">Imprimir</button></a>

                        $qrCodeName = "x_qrcode_{$ret_id}.png";
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

                                       label.codeseg {
                                           color: grey;
                                           font: 25% ClearSans-Italic;
                                           font-weight: 35;
                                           padding: 0px;
                                       }
                                     
       
                                        label.code{
                                         color:black;
                                           font: 90% sans-serif;   
                                           font-weight:200;
                                           padding: 50px; 
                                       }

                                       #resultado2 {
                                           font: bolder, 'Arial';
                                           font-size: 9px;
                                           color: black;
                                           width: 50%;
                                           text-align: right;
                                       }

                                        div.Validacao {
                                        display:inline-block;
                                        width: 190px;
                                        height: 105px;
                                        background: White;
                                        color: #EEEEEE;
                                        padding: 1px;
                                        border: 0px solid red;
   
                                        }
                                            div.Pagina {
                                        width: 230px;
                                        height: 110px;
                                        background: transparente;
                                        color: #FCF7F7;
                                        border: 5px solid #151515;
                                          }

                                       div.Recorte1 {
                                           width: 263px;
                                           height: 180px;
                                           background: transparente;
                                           border: 0px dotted#959292;
                                       }


                                       div.Recorte {
                                           width: 225px;
                                           height: 104px;
                                           background: transparente;
                                           border: 2px dotted#C3BBBB;
                                       }

                                           div.boxmodel1 {
                                               width: 221px;
                                               height: 92px;
                                               background: transparente;
                                               border: 0px solid #8F8F8F;
                                               padding: 0px;
                                           }
    
                                           div.ver {
                                           width: 220px;
                                           height: 20px;
                                           background: #FFFCFC;
                                           border: 0px dotted #F75959;
                                       }

                                     .imglogo {
	                                     width:115px;
                                        height:49px;
	                                    padding: 1px;
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
             <?php echo "<img  src='{$qrCodeName}'width='99px'height='63px'>"; ?>
           
                <div class="ver">
                     <?php echo "<center> <label style=color:black> <b> ID = ".$ret_id."   </b>  </label></center> "; ?> 
                  </div>
                 <span id="resultado2"><label class="codeseg1"> <?php echo " **   Secretaria Municipal de Tecnologia da Informação   **" ?> </label></span><br />

           </div>
                   <?php echo " <br><br> <img  src='./img/tesoura.jpg' width='199px'height='10px' > "; ?>
            <center>
                
                  
               </center>
           </div>
      </div>
     </div>

  </div>
       <br /><br /><br />
      <label> <strong> ****   Resumo da Busca  **** </strong> </label><br /><br />
      <label> Equipamento Nome :  <?php echo $ret_nome; ?>   </label><br />
      <label> Plaqueta Patrimonio :  <?php echo $parametro; ?>     </label> <br />
      <label> Local / Departamento :  </label><br />
       <label>  <?php echo nomedolocal($conn, $ret_idloc); ?> </label> <br /><br />
      <label><strong> ****   Fim do Resumo da Busca  **** </strong> </label><br />


      <br /><br /><br />	
        <button onclick="window.print()">Imprimir</button>
      
      
      <br /><br /><br />
 
      <a href="qr_ind.php?id=0" title="SELECIONAR ">Voltar   </a>  <br /><br />

</body>
  
</html>
   <?php
    }
    } // fim de metodo post 
   

} else
{// recebimento atraves do metodo  GET direto do listaequip
    $parametro = $ret_parametroG;
    
if (($parametro == "") or ($parametro == "0")) {
    echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
    echo " <br><br> REGISTRO EM BRANCO   ";
    echo " <br><br> <a href='qr_ind.php?parametro=0'>";
    echo " <input type='button' value='Voltar'>  </a> </center>";
} else   
{
 $sql =  "SELECT * FROM tbequip where tbequip_id = '".$parametro."'  ";
	$result = mysqli_query($conn, $sql);
	$retorno_checkInEng = mysqli_num_rows($result);

  if(($retorno_checkInEng == 0)or($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
   {  //  echo"retorno zero de nome na base   ".$nome;
 //  $msg = " \n  Veiculo Motocicleta Placa ". $placa." \n    ".$permissionario."\n  Inserido em   ".$dt_inclusao."\n  retorno  ".$retorno_checkInEng; 
        $titulo = "\n Resultado da busca do Patrimonio    \n " . $parametro . " \n  Registro nao sEncontrado  ";
        echo "<center> <p style=color:red> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        echo " <center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> <br>";
      
   }
  else
  {
				//	  $sql = "SELECT * FROM dadoste WHERE D_ID = '".$parametro."'" ;
                      $dados = mysqli_query($conn,$sql) or die(mysqli_error());
                      $row = mysqli_fetch_assoc($dados);
                        $ret_idloc = $row['tbequi_tbcmei_id'];
                        $ret_desc = $row['tbequi_mod'];
                        $ret_id = $row['tbequip_id'];
                        $ret_status = $row['status'];
                        $ret_nome = $row['tbequi_nome'];
                         



                        $rettemp ="";
                        $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equip.php?tbequip_id=';
                        //$localizacao = "servidor";

                        $value = $localizacao.$ret_id;
                      // Configuramos um nome único para o QR Code com base no número da matrícula. 
 //  <a href="javascript:;" onclick="window.print();return false"><button type="button" class="no-print" title="Imprimir">Imprimir</button></a>

                        $qrCodeName = "x_qrcode_{$ret_id}.png";
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

                                       label.codeseg {
                                           color: grey;
                                           font: 25% ClearSans-Italic;
                                           font-weight: 35;
                                           padding: 0px;
                                       }
                                     
       
                                        label.code{
                                         color:black;
                                           font: 90% sans-serif;   
                                           font-weight:200;
                                           padding: 50px; 
                                       }

                                       #resultado2 {
                                           font: bolder, 'Arial';
                                           font-size: 9px;
                                           color: black;
                                           width: 50%;
                                           text-align: right;
                                       }

                                        div.Validacao {
                                        display:inline-block;
                                        width: 190px;
                                        height: 105px;
                                        background: White;
                                        color: #EEEEEE;
                                        padding: 1px;
                                        border: 0px solid red;
   
                                        }
                                            div.Pagina {
                                        width: 230px;
                                        height: 110px;
                                        background: transparente;
                                        color: #FCF7F7;
                                        border: 5px solid #151515;
                                          }

                                       div.Recorte1 {
                                           width: 263px;
                                           height: 180px;
                                           background: transparente;
                                           border: 0px dotted#959292;
                                       }


                                       div.Recorte {
                                           width: 225px;
                                           height: 104px;
                                           background: transparente;
                                           border: 2px dotted#C3BBBB;
                                       }

                                           div.boxmodel1 {
                                               width: 221px;
                                               height: 92px;
                                               background: transparente;
                                               border: 0px solid #8F8F8F;
                                               padding: 0px;
                                           }
    
                                           div.ver {
                                           width: 220px;
                                           height: 20px;
                                           background: #FFFCFC;
                                           border: 0px dotted #F75959;
                                       }

                                     .imglogo {
	                                     width:115px;
                                        height:49px;
	                                    padding: 1px;
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
             <?php echo "<img  src='{$qrCodeName}'width='99px'height='63px'>"; ?>
           
                <div class="ver">
                     <?php echo "<center> <label style=color:black> <b> ID = ".$ret_id."   </b>  </label></center> "; ?> 
                  </div>
                 <span id="resultado2"><label class="codeseg1"> <?php echo " **   Secretaria Municipal de Tecnologia da Informação   **" ?> </label></span><br />

           </div>
                   <?php echo " <br><br> <img  src='./img/tesoura.jpg' width='199px'height='10px' > "; ?>
            <center>
                
                  
               </center>
           </div>
      </div>
     </div>

  </div>
       <br /><br /><br />
      <label> <strong> ****   Resumo da Busca  **** </strong> </label><br /><br />
      <label> Equipamento Nome :  <?php echo $ret_nome; ?>   </label><br />
      <label> Plaqueta Patrimonio :  <?php echo $parametro; ?>     </label> <br />
      <label> Local / Departamento :  </label><br />
       <label>  <?php echo nomedolocal($conn, $ret_idloc); ?> </label> <br /><br />
      <label><strong> ****   Fim do Resumo da Busca  **** </strong> </label><br />

      <br /><br /><br />	
        <button onclick="window.print()">Imprimir</button>
      

      <br /><br /><br />
 
      <a href="qr_ind.php?id=0" title="SELECIONAR ">Voltar   </a>  <br /><br />

</body>
  
</html>
   <?php
    }
    }
    
} // fim do metodo get


