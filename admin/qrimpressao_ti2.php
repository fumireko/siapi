<?php
//include ('conn2.php');
include ('bco_fun.php');
//include "../Config/config_sistema.php";

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
$email_usuario = $_SESSION['email_usuario'];
// para exibir todos os registrosuse esse select : $sql="SELECT * FROM users ";
$conexao=$conn;
//session_start();
// $rec_usuario= $_SESSION['usuario']; 
$agora = date('d/m/Y H:i');

  if((busca_ult_CTI($conn)<>0) and (busca_ult_CTI($conn)<>"0"))
  {
      $cti_novo = busca_ult_CTI($conn) + 1;
      $ret_parametroP = $cti_novo; //
   
            if (ret_ctrl_ti($conn, $ret_parametroP) <> "1") 
             {
                 if ($ret_parametroP <> "")
                    {
                                // recebimento atraves do metodo post direto de qr_ind
                                $parametro = $ret_parametroP;
                                $ret_id = $parametro;

                                if (($parametro == "") or ($parametro == "0")) {
                                    echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
                                    echo " <br><br> REGISTRO EM BRANCO   ";
                                    echo " <br><br> <a href='qr_ind_ti.php?parametro=0'>";
                                    echo " <input type='button' value='Voltar'>  </a> </center>";
                                } else 
                                {
                                          //$email_usuario = $_SESSION['email_usuario'];
                                          $usuario = $email_usuario;
                                        $nomeArquivo = "controleQR.txt";
                                        $conteudo = "Usuario " . $usuario . "    QR_Gerado (A): " . $ret_parametroP . " Data : " . $agora . PHP_EOL;
                                        //$msg = 'teste' . PHP_EOL;
                                        //file_put_contents('lista.txt', $msg, FILE_APPEND);
                                        file_put_contents($nomeArquivo, $conteudo, FILE_APPEND);
                                        $arquivo = fopen($_SERVER['DOCUMENT_ROOT'] . $nomeArquivo, 'w');
                                        if ($arquivo) {
                                            // Escreve no arquivo
                                            fwrite($arquivo, $conteudo);
                                            // fecha o arquivo
                                            fclose($arquivo);
                                        }





                //$localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipg.php?tbequip_id='; metodo antigo pelo get
                                    $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipti.php?tbequip_id=';
                                    //$localizacao = "servidor";
                                    //value = $localizacao.$ret_id; anterior
                                    //$value = $localizacao.$ret_id.$complemento;
                                    // $tipagem="C";                       
                                    $value = $localizacao . $ret_id;
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


                                                                        label.code {
                                                                            color: black;
                                                                            font: 140% sans-serif;
                                                                            font-weight: 200;
                                                                            padding: 0px;
                                                                        }

                                                                        #resultado2 {
                                                                            font: bolder, 'Arial';
                                                                            font-size: 9px;
                                                                            color: black;
                                                                            width: 50%;
                                                                            text-align: right;
                                                                        }

                                                                        div.Validacao {
                                                                            display: inline-block;
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
                                                                            width: 253px;
                                                                            height: 95px;
                                                                            background: transparente;
                                                                            border: 3px solid#161718;
                                                                        }




                                                              
                                    
                                                        </style>


                                                        <html>
                                                          <body>
                                                                <div class="Recorte">
                                                                  <div id="div1">
                                                                      <table border="0">
                                                                      <tr>
                                                                       <td>  <table border="0">
                                                                             <tr><td>  <img class="imglogo" src="img/BrasaoL.png" />  </td></tr>
                                                                             <tr><td> <?php echo "<center> <label class='code'> <b> ID:" . $ret_id . "   </b>  </label></center> "; ?> </td></tr>
                                                                             </table>  </td> 
                                                                          <td>   <?php echo "<img  src='{$qrCodeName}'width='159px'height='90px'>"; ?> </td>
                                                 
                                                                      </tr>
                                             
                                                                  </table>
                                                                 </div>
                                                                </div>
                                                         </body>
  
                                                      </html>
                                                           <?php
                                } // fim do else  --  if (($parametro == "") or ($parametro == "0")) {
                 } // fim do if parametro vazio
            }//  fim do if  (ret_ctrl_ti($conn, $ret_parametroP) <> "1")  
     } // fim da busca por ultimo numero de cti ..
     else
     {
        echo "<div style='width:100px' 'border-width:2px';border-color:blue';'border-style:solid'> teste  </div>";
        echo "<br><br><center>  <p style=color:RED>  <b> O CTI " . $cti_novo . " Invalido </b>  </p> </center>   ";
        echo " <br> <center> <input type='button' value='Voltar' onClick='JavaScript: window.history.back();'> </center> ";
     } 
    

