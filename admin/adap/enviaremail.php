<?php
include "../Config/config_sistema.php";
$cpfcrianca = $_REQUEST['cpfcrianca'];

if ($cpfcrianca == "");
{
  echo "<script>alert('CPF EM BRANCO, EMAIL NÃO PODE SER ENVIADO.');</script>";
  echo "<script>history.go(-1);</script>";
 exit;
}
//Variáveis
$consulta = mysql_query("SELECT * from  tbrecad where tbrec_cpfcrianca = '$cpfcrianca'");
while($linhas = mysql_fetch_object($consulta)) 
{
  $codigo = $linhas->tbrec_id;
  $nome = $linhas->tbrec_nome;
  $cpf = $linhas->tbrec_cpfcrianca;
  $dtnasc = $linhas->tbrec_dtanasc;
  $dtnasc = implode("/",array_reverse(explode("-",$dtnasc)));
  $serie = $linhas->tbrec_serie;
  $nmae = $linhas->tbrec_nmae;
  $npai = $linhas->tbrec_npai;
  $telefone = $linhas->tbrec_tel;
  $email = $linhas->tbrec_email;
  $opc1 = $linhas->tbrec_opc1;
  $opc2 = $linhas->tbrec_opc2;
  $opc3 = $linhas->tbrec_opc3;
  $datacad = $linhas-> tbrec_dtacad;
  $datacad = implode("/",array_reverse(explode("-",$dtnasc)));
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');
  mysql_query("SET NAMES 'utf8'");
  mysql_query('SET character_set_connection=utf8');
  mysql_query('SET character_set_client=utf8');
  mysql_query('SET character_set_results=utf8');	

// Compo E-mail
  $arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
              <tr>
                      <td width='500'>Codigo:$codigo</td>
                    </tr>
                <tr>
                  <tr>
                      <td width='500'>Nome:$nome</td>
                    </tr>
                <tr>
                  <td width='320'>CPF:<b>$cpf</b></td>
                  </tr>
                <tr>
                  <td width='320'>Data nasc:<b>$dtnasc</b></td>
                </tr>
               
                <tr>
                  <td width='320'>Série:$serie</td>
                </tr>
                
                <tr>
                  <td width='320'>Nome da mãe:$nmae</td>
                </tr>
                <tr>
                <td width='320'>Nome do pai:$npai</td>
              </tr>
              <tr>
                <td width='320'>Telefone:$telefone</td>
              </tr>
                
                <tr>
                  <td width='320'>Email:$email</td>
                </tr>
                <tr>
                <td width='320'>Opção 1:$opc1</td>
              </tr>
              <tr>
                <td width='320'>Opção 2:$opc2</td>
              </tr>
              
              <tr>
                <td width='320'>Opção 3:$opc3</td>
              </tr>

              <tr>
                <td width='320'>Data cad:$datacad</td>
              </tr>
             
            </td>
          </tr>
          <tr>
            <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
  ";
//enviar
  // emails para quem será enviado o formulário
  $emailenviar = $email ;
  $destino = $emailenviar;
  $assunto = "CADASTRO INF4/INF5";
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset="UTF-8"/>' . "\r\n";
  $headers .= 'From: Suporte';
  //$headers .= "Bcc: $EmailPadrao\r\n";
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=../index.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  } 
  
}


?>