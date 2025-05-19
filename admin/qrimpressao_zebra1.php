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
                                                                    border-bottom-width: 0px;
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
                                                                       font: 140% sans-serif;   
                                                                       font-weight:200;
                                                                       padding:0px; 
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
                                                                   div.PaginaX {
                                                                       width: 95px;
                                                                       height: 35px;
                                                                       background: transparente;
                                                                       color: #FCF7F7;
                                                                       border: 1px dotted #4AD147;
                                                                   }

                                                                   div.Recorte1X {
                                                                       width: 243px;
                                                                       height: 90px;
                                                                       background: transparente;
                                                                       border: 1px dotted#B7D121;
                                                                   }


                                   

                                                                       div.boxmodel1 {
                                                                           width: 140px;
                                                                           height: 25px;
                                                                           background: transparente;
                                                                           border: 1px solid #D2E130;
                                                                           padding: 0px;
                                                                       }
    
                                                                       div.ver {
                                                                       width: 120px;
                                                                       height: 20px;
                                                                       background: #FFFCFC;
                                                                       border: 1px dotted #F75959;
                                                                   }

                                                                   .imglogo {
                                                                       width: 75px;
                                                                       height: 46px;
                                                                       margin: 0px 0;
                                                                       padding: 0px;
                                                                   }
                                                                  #div1 {
                                                                           display: flex;
                                                                  }

                                                                 div.Recorte {
                                                                           margin: 0px 0;
                                                                           width: 247px;
                                                                           height: 95px;
                                                                           background: transparente;
                                                                           border: 3px solid#161718;
                                                                 }

                                                              
                                    
                                </style>

                             <html>
                              <body>
                     



<?php
include ('conn2.php');
//include "../Config/config_sistema.php";
//include ('bco_fun.php');

require_once('phpqrcode/qrlib.php');

function ret_ctrl_ti($Fconexao, $Fref) // informa se ja existe numeracao para controle_ti
{
    if ($Fref <> "") {
        $query = "select * from tb_controle_ti where ctrl_ti ='" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        if ($resultadoDaInsercao == '1') {
            //$linha = mysqli_fetch_assoc($dados);
            //$nome = $linha['descricao_status'];
            return "1";
        } else
            return "0";
    } else
        return "0";
}




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




$usados = "";
// para exibir todos os registrosuse esse select : $sql="SELECT * FROM users ";
$conexao=$conn;

$agora = date('d/m/Y H:i');
$teste="";
if (isset($_POST['inicio'])){ // recebimento por post
    $ret_inicio = $_POST['inicio']; // campo digitavel em qr_ind.php    
}
else{
    $ret_inicio = "1"; // campo vazio digitavel em qr_ind.php
}

if (isset($_POST['fim'])) {
    $ret_fim = $_POST['fim']; // campo digitavel em qr_ind.php    
} else {
    $ret_fim = "2"; // campo vazio digitavel em qr_ind.php
}
// rotina de checagem de existencia de cti ja gerado .
for ($i = $ret_inicio; $i < $ret_fim; $i++) 
 {
    $checagem = ret_ctrl_ti($conn, $i);
    if ($checagem==1)
      $usados .= $i. " - ";
 }
if($usados<>"")
{
echo " <br><br> <center>  <p style=color:red> <b>   Os numeros abaixo ja foram utilizados para outros dispositivos ,<br> <br>Logo nao eh possivel gerar o QR code novamente !  <br>  <br> ";
echo $usados;
 echo "<br><br> <input type='button' value='Voltar'>  </a> </center>";
    echo " </b> </p> </center> </p> </body></html>";
}
else
{






$usuario = $_POST['usuario'];

$nomeArquivo = "controleQR.txt";
$conteudo =  "Usuario ".$usuario."    QR_ini : ".$ret_inicio. "  QR_final :".$ret_fim.   " Data : ". $agora . PHP_EOL;

//$msg = 'teste' . PHP_EOL;
//file_put_contents('lista.txt', $msg, FILE_APPEND);
file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
$arquivo = fopen($_SERVER['DOCUMENT_ROOT']. $nomeArquivo, 'w');
    if($arquivo) 
    {
    // Escreve no arquivo
        fwrite($arquivo,$conteudo);
    // fecha o arquivo
        fclose($arquivo);
    }
    else
    {
       
    }



if (($ret_inicio == "") or ($ret_fim == "0"))
      {
            echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
            echo " <br><br> REGISTRO EM BRANCO   ";
            echo " <br><br> <a href='qr_ind.php?parametro=0'>";
            echo " <input type='button' value='Voltar'>  </a> </center>";
      } else   
        {
                 for ( $i = $ret_inicio; $i <= $ret_fim  ; $i++) 
                     {    
                       //$localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipg.php?tbequip_id='; metodo antigo pelo get
                        $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipti.php?tbequip_id=';
                    //  $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipg.php?tbequip_id=';
                        $value = $localizacao .$i;
                        // Configuramos um nome único para o QR Code com base no número da matrícula. 
                         $qrCodeName = "x_qrcode_{$i}.png";
                                 /**
                                   * Realizamos a criação da imagem PNG, sendo passado as seguintes informações:
                                   * 1º - A string que desejamos inserir no QR Code.
                                   * 2º - O nome da imagem que criamos no passo anterior.
                                   */
                                  QRcode::png($value, $qrCodeName);
                           // Para finalizar realizamos a exibição da imagem no navegador.
                           //                  echo "<img src='{$qrCodeName}'>";

                                  ?>  <br /> <div class="Recorte">
                                          <div id="div1">
                                              <table border="0">
                                              <tr>
                                               <td>  <table border="0">
                                                     <tr><td>  <img class="imglogo" src="img/BrasaoL.png" />  </td></tr>
                                                     <tr><td> <?php echo "<center> <label class='code'> <b> ID:" . $i . "   </b>  </label></center> "; ?> </td></tr>
                                                     </table>  </td> 
                                                  <td>   <?php echo "<img  src='{$qrCodeName}'width='155px'height='90px'>"; ?> </td>
                                              </tr>
                                             
                                          </table>
                                         </div>
                                        </div>
                                    
                                  <br />
                                  <?php
                     }
            }
}// fim do else tudo ok


    


?>   



    </body>
  
                            </html>

