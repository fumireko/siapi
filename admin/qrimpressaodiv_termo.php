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
 //$rec_usuario= $_SESSION['usuario']; 
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

if ($ret_parametroP <> "") 
{
    // recebimento atraves do metodo post direto de qr_ind
    $parametro = $ret_parametroP;
    
    if (($parametro == "") or ($parametro == "0"))
      {
            echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
            echo " <br><br> REGISTRO EM BRANCO   ";
            echo " <br><br> <a href='qr_ind.php?parametro=0'>";
            echo " <input type='button' value='Voltar'>  </a> </center>";
      } else   
        {
         $sql =  "SELECT * FROM tb_diversos where patrimonio = '".$parametro."'  ";
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
                       $ret_idloc = $row['local_cod']; //cmei  id
                        $ret_desc = $row['descricao'];  
                        $ret_tipo = $row['descricao'];  
						$ret_id = $row['id']; // id
                        $ret_status = $row['status']; // 
                        $ret_nome = $row['descricao']; // par1
                        $ret_patrimonio = $row['patrimonio'];// par2
                        $ret_nome_loc = nomedolocal($conn, $row['local_cod']); // par4
                        $ret_nome_sec = nomedesecretaria($conn,cod_sec($conn,$row['local_cod']));// par3
                        $ret_obs = $row['obs']; // par12
							if(($ret_tipo=="RACK")||($ret_tipo=="Rack")){
							$tipagem="R";                       
					      }else {
							 if(($ret_tipo=="PATCH PANEL")||($ret_tipo=="Patch Panel")||($ret_tipo=="patch panel")){
								 $tipagem="P";                       
							    }
							 else{
								 if(($ret_tipo=="SWITCH")||($ret_tipo=="Switch")||($ret_tipo=="switch")){
								 $tipagem="S";                       
							      }
								 else{
									 if(($ret_tipo=="TV")||($ret_tipo=="Tv")||($ret_tipo=="tv")){
								      $tipagem="T";                       
							         }
									 else
							          $tipagem="X";                       		 
								 }
							 }
						 }
					
				 //     $complemento = "&par1=" . $ret_nome . "&par2=" . $ret_patrimonio . "&par3=" . $ret_nome_sec . "&par4=" . $ret_nome_loc . "&par5=" . $ret_tipo . "&par6=" . $ret_so . "&par7=" . $ret_placa . "&par8=" . $ret_proc . "&par9=" . $ret_mem . "&par10=" . $ret_hd . "&par11=" . $ret_mon . "&par12=" . $ret_obs;
                        $rettemp ="";
                        //$localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipg.php?tbequip_id='; metodo antigo pelo get
                        $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equip.php?tbequip_id=';
                        //$localizacao = "servidor";

                        //value = $localizacao.$ret_id; anterior
                        //$value = $localizacao.$ret_id.$complemento;
                        $value = $localizacao .$tipagem. $ret_id;
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
                                              <label> teste</label>
                  
                                               </center>
                                           </div>
                                      </div>
                                     </div>
                                      <br />
                                      <div> 
                                       Colombo, 01 de Abril de 2024

                                        Data de cria&ccedil;ao  

                                        Termo de Responsabilidade Guarda e Uso de Equipamento.

                                        Identifica&ccedil;&atilde;o Funcionario : 
                                        Local : 

                                        Encontra-se em meu local de trabalho (descrito acima) , o equipamento especificado nesse termo de responsabiliade, comprometendo-me a mant&ecirc;-lo em perfeito estado de conserva&ccedil;&atilde;o, ficando ciente que:
                                        1-Se o equipamento for danificado ou inutilizado por emprego inadequado, mau uso, neglig&ecirc;ncia ou extravio, a empresa me fornecer&aacute; novo equipamento e cobrar&aacute; o valor de um equipamento da mesma marca ou equivalente ao da pra&ccedil;a.
                                        2- Em caso de dano, inutiliza&ccedil;&atilde;o ou extravio do equipamento deverei comunicar imediatamente ao setor competente. 
                                        3-No caso de rescis&atilde;o do contrato ou transferencia de local de trabalho, comunicarei o Departamento de Informatica, para que o mesmo providencie um novo termo com o novo funcionario que ficar&aacute; responsavel pelo local .
                                        4-Estando os equipamentos em minha posse, estarei sujeito a inspe&ccedil;&otilde;es sem pr&eacute;vio aviso.
                                      
                                      
                                      </div>
                                 
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      </div>
                                       <br /><br /><br />
                                      <label> <strong> ****   Resumo da Busca  **** </strong> </label><br /><br />
                                      <label> Equipamento Nome :  <?php echo $ret_nome; ?>   </label><br />
                                      <label> Plaqueta Patrimonio :  <?php echo $ret_patrimonio; ?>     </label> <br />
                                      <label> Local / Departamento :  </label><br />
                                       <label>  <?php echo nomedolocal($conn, $ret_idloc); ?> </label> <br /><br />
                                      <label><strong> ****   Fim do Resumo da Busca  **** </strong> </label><br />


                                      <br /><br /><br />	
                                        <button onclick="window.print()" display="none" >Imprimir</button>
      
      
                                      <br /><br /><br />
 
                                      <a href="qr_ind.php?id=0" title="SELECIONAR " display="none" >Voltar   </a>  <br /><br />

                                </body>
  
                                </html>
                                   <?php
                                    }
                                    } // fim de metodo post 
   

} 
else
{      // recebimento atraves do metodo  GET direto do listaequip
         $parametro = $ret_parametroG;

    if (($parametro == "") or ($parametro == "0")) {
        echo "<center><br><br> <img src='img/problema0.png' width='250' height='300'  />";
        echo " <br><br> REGISTRO EM BRANCO   ";
        echo " <br><br> <a href='qr_ind.php?parametro=0'>";
        echo " <input type='button' value='Voltar'>  </a> </center>";
    } else {
        $caminho = ret_caminho_ctrl_ti($conn, $parametro);
        $caminho = substr($caminho, 1);
        if ($caminho <> "0") {
            $sql = "SELECT * FROM tb_diversos where id = '" . $caminho . "'  ";
            $result = mysqli_query($conn, $sql);
            $retorno_checkInEng = mysqli_num_rows($result);

            if (($retorno_checkInEng == 0) or ($retorno_checkInEng == ""))   // cadastra-se o nome na base cad_eng e obtem o ID_eng 
            {  //  echo"retorno zero de nome na base   ".$nome;
                //  $msg = " \n  Veiculo Motocicleta Placa ". $placa." \n    ".$permissionario."\n  Inserido em   ".$dt_inclusao."\n  retorno  ".$retorno_checkInEng; 
                $titulo = "\n Resultado da busca do Patrimonio    \n " . $caminho . " \n  Registro nao sEncontrado  ";
                echo "<center> <p style=color:red> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                echo " <center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> <br>";

            } else {
                //	  $sql = "SELECT * FROM dadoste WHERE D_ID = '".$parametro."'" ;
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                $row = mysqli_fetch_assoc($dados);

                $ret_idloc = $row['local_cod']; //cmei  id
                $ret_desc = $row['descricao'];
                $ret_tipo = $row['descricao'];
                $ret_id = $row['id']; // id
                $ret_cod = $row['descricao_cod']; // id
                $ret_status = $row['status']; // 
                $ret_nome = $row['descricao']; // par1
                $ret_patrimonio = $row['patrimonio'];// par2
                $ret_marca = $row['marca'];
                $ret_tam = $row['tam'];
                $ret_nome_loc = nomedolocal($conn, $row['local_cod']); // par4
                $ret_nome_sec = nomedesecretaria($conn, cod_sec($conn, $row['local_cod']));// par3
                $ret_obs = $row['obs']; // par12
                //    $complemento = "&par1=" . $ret_nome . "&par2=" . $ret_patrimonio . "&par3=" . $ret_nome_sec . "&par4=" . $ret_nome_loc . "&par5=" . $ret_tipo . "&par6=" . $ret_so . "&par7=" . $ret_placa . "&par8=" . $ret_proc . "&par9=" . $ret_mem . "&par10=" . $ret_hd . "&par11=" . $ret_mon . "&par12=" . $ret_obs;
                if (($ret_tipo == "RACK") || ($ret_tipo == "Rack")) {
                    $tipagem = "R";
                } else {
                    if (($ret_tipo == "PATCH PANEL") || ($ret_tipo == "Patch Panel") || ($ret_tipo == "patch panel")) {
                        $tipagem = "P";
                    } else {
                        if (($ret_tipo == "SWITCH") || ($ret_tipo == "Switch") || ($ret_tipo == "switch")) {
                            $tipagem = "S";
                        } else {
                            if (($ret_tipo == "TV") || ($ret_tipo == "Tv") || ($ret_tipo == "tv")) {
                                $tipagem = "T";
                            } else
                                $tipagem = "X";
                        }
                    }
                }

                $rettemp = "";
                $localizacao = 'https://portal.colombo.pr.gov.br/siapi/admin/ver_equipti.php?tbequip_id=';
                //$localizacao = "servidor";

                //  $value = $localizacao.$ret_id;
                $value = $localizacao. $parametro;  // ret_id
                // Configuramos um nome único para o QR Code com base no número da matrícula. 
                //  <a href="javascript:;" onclick="window.print();return false"><button type="button" class="no-print" title="Imprimir">Imprimir</button></a>

                $qrCodeName = "x_qrcode_{$parametro}.png";
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
                                                                    
																	 div.a4 {
																	 width: 800px; 
																	height: 1000px;																	
																	margin: auto;
																	border: 0px solid #151515;																	
																	}
																	div.Pagina {
                                                                   width: 230px; 
																  /*width: 100%;*/                                                                   
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
                                                                       display:block;
                                                                              }     

                                                                @media print { 
                                                                #no-print { display:none; } 
                                                                body { background: #fff; }
                                                                }
 								.apresentacao__conteudo__texto {
									font-size: 20px;
									font-family: 'Montserrat', sans-serif;
									justify-content: center;
									margin-bottom: 15px;
									text-align: justify;
								}
									
                                </style>

                             <html>
                              <body>
      <div class="a4">
                            <div class="Pagina">
                                <div class="Recorte1">
                                  <div class="Recorte">
                                       <div class="boxmodel1">
                                        <img class="imglogo" src="img/Brasao.png" /> 
                                         <?php echo "<img  src='{$qrCodeName}'width='99px'height='63px'>"; ?>
           
                                            <div class="ver">
                                             <!--    <?php //echo "<center> <label style=color:black> <b> ID = " . $ret_id . "   </b>  </label></center> "; ?> -->
                                                <?php echo "<center> <label style=color:black> <b> ID = " . $parametro . "   </b>  </label></center> "; ?> 
                                              </div>
                                             <span id="resultado2"><label class="codeseg1"> <?php echo " **   Secretaria Municipal de Tecnologia da Informação   **" ?> </label></span><br />

                                       </div>
                                               <?php echo " <br><br> <img  src='./img/tesoura.jpg' width='199px'height='10px' > "; ?>
                                        <center>
                                           </center>
                                       </div>
                                  </div>
                                 </div>
                                     <br /><br /><br />
                                        <label>   Colombo,  <?php echo $agora; ?>  </label><br /><br />
                                   <strong> <label style="font-weight: bold; font-size: 18px;">  &nbsp  &nbsp  &nbsp Termo de Responsabilidade Guarda e Uso de Equipamento Nº<  <?php echo $parametro; ?>  >.</label> </strong> <br /><br /> 
                                    <label> <i> Responsavel :  Gestor / Coordenador </i> </label> <br />
                                      <label>  Local :   <?php echo nomedolocal($conn, $ret_idloc) ?> </label>  <br /> 
									<p class="apresentacao__conteudo__texto">Encontra-se em meu local de trabalho (descrito acima), o equipamento especificado    
                                      nesse termo de responsabilidade,  comprometendo-me a mant&ecirc;-lo em perfeito estado de conserva&ccedil;&atilde;o, ficando ciente que:</p> 
                                      <p class="apresentacao__conteudo__texto"> 1- Se o equipamento for danificado ou inutilizado por emprego inadequado, mau uso, neglig&ecirc;ncia ou extravio, a empresa me fornecer&aacute; novo equipamento e cobrar&aacute; o valor de um equipamento da mesma marca ou equivalente ao da pra&ccedil;a.</p>
                                       <p class="apresentacao__conteudo__texto">2- Em caso de dano, inutiliza&ccedil;&atilde;o ou extravio do equipamento deverei comunicar imediatamente ao setor competente. </p>
                                       <p class="apresentacao__conteudo__texto">3- No caso de rescis&atilde;o do contrato ou transferencia de local de trabalho, comunicarei o Departamento de Informatica, para que o mesmo providencie um novo termo com o novo funcionario que ficar&aacute; responsavel pelo local .</p>
                                       <p class="apresentacao__conteudo__texto">4- Estando os equipamentos em minha posse, estarei sujeito a inspe&ccedil;&otilde;es sem pr&eacute;vio aviso.</p>
                                   
                                  <label> <strong> ****   Dados do Equipamento  ID:  <?php echo $parametro; ?>   ****   </strong> </label><br />
                                  <label> Equipamento Nome :  <?php echo $ret_nome; ?>   </label><br />
                                  <label> Plaqueta Patrimonio :  <?php echo $ret_patrimonio; ?>     </label> <br />
                                  <label> Tipo do Equipamento :  <?php echo $ret_tipo; ?>   </label><br />
                                  <label> Marca :  <?php echo $ret_marca; ?>   </label><br />
                                  <label> Tamanho :  <?php echo $ret_tam; ?>   </label><br /> 
                                  
                                  <label> Local / Departamento :  </label><br />
                                   <label>  <?php echo nomedolocal($conn, $ret_idloc); ?> </label>
                                 <?php echo " <br><br> <img  src='./img/tesoura.jpg' width='199px'height='10px' > "; ?><br>
                                  <label><strong> ---------------------------------------------------------------------------------------------------------------------------- </strong> </label><br />
                                    <strong> <label style="font-weight: bold; font-size: 18px;"> (<?php echo $parametro.'/'.ret_caminho_ctrl_ti($conn, $parametro).'/'; ?>) - &nbsp  &nbsp Termo de Responsabilidade Guarda e Uso de Equipamento.  </label> </strong> <br />
                                    <label>(  <?php echo nomedolocal($conn, $ret_idloc); ?> )</label> <br /> 
                                  <label> Tipo do Equipamento :  <?php echo $ret_tipo . '  ->  ID   : ' . $parametro; ?>     </label> <br />
                                  <label> Equipamento Nome :  <?php echo $ret_nome . '  ->  Plaqueta Patrimonio  : ' . $ret_patrimonio; ?>     </label> <br />
                                  
                                  <label> <i>   Identifica&ccedil;&atilde;o Responsavel :  </i>   </label> <br /><br />
                                  <label> <i>  ___________________________   </i>   </label> <br />
                                  <label> <i>   Assinatura    <?php echo $agora ?> </i>   </label> 
                                  <label style="font-weight: bold; font-size: 12px;" > <i> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp Retorna para a T.I </i> </label>&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp 
									&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  <a  href="newsfeed.php" title="SELECIONAR "  >Voltar   </a> &nbsp  						  
									<a style="display:none" href=" <?php echo $value ?>" title="Vericar dados completos do Equipamento ">Ver Completo1  </a>  &nbsp  &nbsp <br> 
								  <label><strong> ---------------------------------------------------------------------------------------------------------------------------- </strong> </label><br />
                                
                                  
                                  
				</div>				
                            </body>
  
                            </html>
                    <?php
            }
        }
    }
} // fim do metodo get


