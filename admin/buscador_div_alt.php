<style>
.container {
width: 100vw;
height: 150vh;

display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
}
.box {
top : 5%;
position:absolute;
width: 950px;
height: auto;
background: #fff;
}
body {
margin: 0px;
}
</style>



<?php
include "../Config/config_sistema.php";
include ('conn2.php');
include ('bco_fun.php');
include ('index.php');
 echo " <div  class='container'>";
	 echo " <div class='box'>" ;
//$tpservico = $_POST['opcao'];
if (isset($_POST['digito'])) {
    $busca = $_POST['digito'];
}else
   $busca = "Campo Vazio ";
//$prob = $_POST['prob'];
$hora = date("H:i:s");

if (isset($_POST['opcao'])) {
    $tpservico = $_POST['opcao'];
   // var_dump("escolheu " . $tpservico);
echo "<br><br>  <center> <p style=color:blue> <b> Checagem ALTERACOES por  " . $tpservico." </b> <br>";   
       echo "  " . $busca."   </p></center> ";
    $campo =  trim($busca);
// echo $tpservico;
    add_acao("Cons_" . $tpservico, $busca, $nome_usuario);
switch ($tpservico)
 {
	 case 'Plaqueta':
	{
	  $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'patrimonio' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else 
		{
            echo "<center>Patrimonio </center><br>";    
			
            // $retstatus = $linha['Al_01status'];

            //	  $total = mysqli_num_rows($dados);
            //  echo $total;
            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
           // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            if ($total > 0) {
    		//  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
			   do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];	               
				
				   echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                   // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
				 
                    echo "</a>";
                    echo "</li></P> ";
                    echo "</ul>";
                } while ($linha = mysqli_fetch_assoc($dados));
            }
				//    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
				 //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
		}
				   echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
	
	
	break; 
	}
        case 'lacre': {
            //$sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE '%lacre%' order by abs(ctrl_ti)"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Lacre T.I.  </center><br>";
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            break;
        }

        case 'Id':
	{
		
		break; 
	}
	case 'Nome':
	{
            //$sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'nome' order by abs(ctrl_ti)"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Nome  </center><br>";
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                         echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            break; 
	}
        case 'resp': {
            //$nome_local = nomedolocal($conn, $campo);
            //$sql = "SELECT * FROM tb_registra WHERE tabela_dados LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'Resp' and tabela_dados like  '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            //$sql = "SELECT * FROM tb_registra WHERE   tabela_cpo = 'Resp' and tabela_dados like  '%" . $campo . "' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "   <center>    Responsavel " . $campo . " </center><br>";

                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            //header('location: tabelas_abas.php');
            //   header("Location: tabelas_abas.php?campo=".$campo."");
            //header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
            //echo " header('location: tabelas_abas.php?campo=".$campo."'); 

            break;
        }
    
    case 'Local_Cod':
	{
            $nome_local = nomedolocal($conn, $campo); 
        //$sql = "SELECT * FROM tb_registra WHERE tabela_dados LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $sql = "SELECT * FROM tb_registra WHERE   tabela_cpo like 'Local'  and tabela_dados like  '%" . $campo . "' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "   <center> ". $nome_local."  Codigo de Local ".$campo." </center><br>";
                
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        if ($rettabela == '1') {
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                            // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                        } else {
                            if ($rettabela == '2') {
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $rettabela_id . "'><img src='img/tp3.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                                // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            } else {
                                if ($rettabela == '3') {
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                                    // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";

                                }
                            }
                        }
                        } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            //header('location: tabelas_abas.php');
         //   header("Location: tabelas_abas.php?campo=".$campo."");
            //header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=0");
        //echo " header('location: tabelas_abas.php?campo=".$campo."'); 

		break; 
	} 
	case 'Local';	
	{
    			//ok  $sql = "SELECT tbcmei_id, tbcmei_nome from tbcmei where tbcmei_nome in (select DISTINCT tbcmei_nome FROM tbcmei) ";	             
				//  $sql = "SELECT tbcmei_nome from tbcmei where tbcmei_nome in (select DISTINCT tbcmei_nome FROM tbcmei)";
				   $sql = "SELECT tbcmei_nome ,tbcmei_id FROM tbcmei  where tbcmei_nome LIKE '%" . $campo . "%' order by tbcmei_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
					  if ($total > 0)
						{
						 //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
						?>                      
							<form method="post" enctype="multipart/form-data" action="buscador_div_alt.php">    
							<input type="hidden" name="origem" size=50 value= "Unidade">
							<input type="hidden" name="opcao" size=50 value= "Unidade">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-11">   
                                   <input type="radio" name="opcao" value="Unidade" checked/>&nbsp &nbsp Local &nbsp	
										  <select name='digito' id='digito'>
											<option>Selecionar Serviço</option>									  	 
										
									   <?php
										
										  do
										  {
											$retnome = $linha['tbcmei_nome'];
											$retID = $linha['tbcmei_id'];							

											//$option .= "<option value = '" . $retID . "' title='" . $retID . "'>" . $retnome . "   </option>";
											// echo $option;
											 echo "<option value=".$retID." title='" . $retID ."'>".$retnome."</option>";
										  } while ($linha = mysqli_fetch_assoc($dados));            
											echo "</select> ";							 
	
	                                  ?>        
						            </div>
 				 			  </div>
							 </div>
						   </div>	 
							 
							 	<button class="button-48" type="submit"  role="button"><span class="text">Consulta </span></button>
						
							<br />				
							<?php
						}
				    }
	   break;
	}
   case 'Unidade':
	{
            $seq = "";
            $nome_local = nomedolocal($conn, $campo);
          
            
            //$sql = "SELECT * FROM tb_registra WHERE   tabela_cpo like 'Local'  and tabela_dados like '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $sql = "SELECT * FROM tb_registra WHERE  tabela_cpo like '%Local' and tabela_dados like '%" . $nome_local . "%'  order by ctrl_ti"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados_equip = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados_equip);
            
            $total_equip = mysqli_num_rows($dados_equip);
            if ($total_equip == 0) {
                $titulo = " " . $total_equip . "  Registro Localizado (s) em  Computadores  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";

                //echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else // retrono > 0 
            {
                echo "<center> <strong>" . nomedolocal($conn, $campo) . "</strong> </center> ";
                do {
                    $retusuario = $linha['usuario'];
                    $retID = $linha['id'];
                    $ret_ctrl_ti = $linha['ctrl_ti'];
                    $rettabela = $linha['tabela'];
                    $rettabela_id = $linha['tabela_id'];
                    $retcampo = $linha['tabela_cpo'];
                    $retdados = $linha['tabela_dados'];
                    $retoutros = $linha['outros'];
                    $retdata = $linha['data'];


                    if ($rettabela == '1') {
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } else {
                        if ($rettabela == '2') {
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $rettabela_id . "'><img src='img/tp3.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                            // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        } else {
                            if ($rettabela == '3') {
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                                // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            }
                        }
                    }
                } while ($linha = mysqli_fetch_assoc($dados_equip));						// fim de consulta em tabela
             }
              echo "<center> <br><br> <a href=tabelas_abas1.php?campo=" . $campo . "&busca=" . $busca . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
              echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
	break; 
	}

	case 'Secretaria':
	    {
     $sql = "SELECT * FROM tbsecretaria ";// where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
					  if ($total > 0)
						{
						 //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
						?>                      
							<form method="post" enctype="multipart/form-data" action="buscador_div_alt.php">    
							<input type="hidden" name="origem" size=50 value= "Sec_esp">
							<input type="hidden" name="opcao" size=50 value= "Sec_esp">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-11">   
                                   <input type="radio" name="opcao" value="Sec_esp" checked/> &nbsp	 Local &nbsp &nbsp	&nbsp										
										  <select name='digito' id='digito'>
									  	  <option value='0'>  </option>
									<?php
										//	echo "  <select name='digitobusca' >";          						 
										//	echo "<option value='0'>  </option>";
										   do{
                                            //  $linha = mysqli_fetch_assoc($dados);
                                              $retnome = $linha['sec_nome'];
											  $retID = $linha['sec_id'];							
											  //$unidade = $nome_local;
                                             // $option .= "<option value = '" . $retID . "'>" . $retnome . "   </option>";
                                              $option = "<option value = '" . $retID . "' title='" . $retID . "'  >" . $retnome . "   </option>";
											  echo $option;
										} while ($linha = mysqli_fetch_assoc($dados));            
										echo "</select> ";							 
										 ?>        
						            </div>
 				 			  </div>
							 </div>
						   </div>	 
							 
							 	<button class="button-48" type="submit"  role="button"><span class="text">Consulta </span></button>
						
							<br />				
							<?php
						}
				    }
					 
				    
	  break; 
	}
   case 'Sec_esp':
	{
	?>
		                    	
		<?php

                $sql = "SELECT * FROM tb_registra WHERE tabela_cpo ='Sec'   and tabela_dados like '%" . $campo . "%'  order by ctrl_ti"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                $linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    echo "<center> " . nomedesecretaria($conn, $campo) . " Cod : ".$campo ."</center>";
                    

                    $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . " <br> ";
                    // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                    if ($total > 0) {
                        //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                        do {
                            $retusuario = $linha['usuario'];
                            $retID = $linha['id'];
                            $ret_ctrl_ti = $linha['ctrl_ti'];
                            $rettabela = $linha['tabela'];
                            $rettabela_id = $linha['tabela_id'];
                            $retcampo = $linha['tabela_cpo'];
                            $retdados = $linha['tabela_dados'];
                            $retoutros = $linha['outros'];
                            $retdata = $linha['data'];

                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                            // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
    
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                        } while ($linha = mysqli_fetch_assoc($dados));
                    }
                    
                }
                
			     // fim de consulta em tabela
							   echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
                         

                break; 
	}
      
  
     case 'Usuarios':
	{
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'usuario' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];


                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            break; 
	}
        case 'Resp1': {
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'Resp' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                $retusuario = $linha['usuario'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $rettabela = $linha['tabela'];
                $rettabela_id = $linha['tabela_id'];
                $retcampo = $linha['tabela_cpo'];
                $retdados = $linha['tabela_dados'];
                $retoutros = $linha['outros'];
                $retdata = $linha['data'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        //  $retnome = $linha['tbequi_nome'];
                        //  $retID = $linha['tbequip_id'];
                        // $retplaqueta = $linha['tbequip_plaqueta'];
                        // $retloc = $linha['tbequi_tbcmei_id'];
                        //$ret_ctrl_ti = $linha['ctrl_ti'];
                        //   $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            break;
        }
     case 'ctrl_TI': {
            $sql = "SELECT * FROM tb_registra WHERE ctrl_ti LIKE '%" . $campo . "%'  order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
               
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$rettabela_id}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Data :  {$retdata} &nbsp&nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp   <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'Excluidos': {

        
            break;
        }
        case 'Tecnicos': {
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'tecnico' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                $retusuario = $linha['usuario'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $rettabela = $linha['tabela'];
                $rettabela_id = $linha['tabela_id'];
                $retcampo = $linha['tabela_cpo'];
                $retdados = $linha['tabela_dados'];
                $retoutros = $linha['outros'];
                $retdata = $linha['data'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        //  $retnome = $linha['tbequi_nome'];
                        //  $retID = $linha['tbequip_id'];
                        // $retplaqueta = $linha['tbequip_plaqueta'];
                        // $retloc = $linha['tbequi_tbcmei_id'];
                        //$ret_ctrl_ti = $linha['ctrl_ti'];
                        //   $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";


            break;
        }
        case 'Data': {

            $sql = "SELECT * FROM tb_registra WHERE data LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                $retusuario = $linha['usuario'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $rettabela = $linha['tabela'];
                $rettabela_id = $linha['tabela_id'];
                $retcampo = $linha['tabela_cpo'];
                $retdados = $linha['tabela_dados'];
                $retoutros = $linha['outros'];
                $retdata = $linha['data'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        //  $retnome = $linha['tbequi_nome'];
                        //  $retID = $linha['tbequip_id'];
                        // $retplaqueta = $linha['tbequip_plaqueta'];
                        // $retloc = $linha['tbequi_tbcmei_id'];
                        //$ret_ctrl_ti = $linha['ctrl_ti'];
                        //   $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";


            break;
        }
        case 'Tb_equip': {

         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'Tb_div': {

            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Tb_mon': {

        
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }

        case 'Tb_cont': {
		 	echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }

        case 'Tb_reg': {
			 $sql = "SELECT * from tb_registra where id= '" . $campo . "' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_id = $ln_ini['id'];
					$ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela_id = $ln_ini['tabela_id'];
                    $ret_tabela = $ln_ini['tabela'];
                    $ret_tabela_cpo = $ln_ini['tabela_cpo'];
                    $ret_tabela_dados = $ln_ini['tabela_dados'];
                    $ret_usuario = $ln_ini['usuario'];
                    $ret_outros = $ln_ini['outros'];
                    $ret_data = $ln_ini['data'];
                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }
            echo "<b><center>  Id : " . $ret_id . "    --------  Controle   CTI : " . $ret_ctrl_ti .   "  </b> </center>  <br>  <br>";
			echo "<center>  <table> <tr> <td> Tabela Id </td>  <td> ************ </td>  <td> Tabela   </td>  <td> ************ </td>   <td> Tabela campo  </td>  </tr>";
            echo "<tr>  <td> ". $ret_tabela_id." </td>  <td>  ************  </td>  <td> " . $ret_tabela . " </td>  <td> ************ </td>  <td> " . $ret_tabela_cpo . " </td> </tr>  ";
            echo "</table> </center>  ";
            echo " <br> <center>  Descriçao da Alteracao   :   " . $ret_tabela_dados . "  ";
            echo "<br> Usuario :  " . $ret_usuario;
            echo "<br> Local " . $ret_outros." <br> Data :   ".$ret_data." </center>  ";
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Sequencial': 
         {
					?>		<form method="post" enctype="multipart/form-data" action="buscador_div2.php">    
							<input type="hidden" name="origem" size=50 value= "Sequencial1">
							<input type="hidden" name="opcao" size=50 value= "Sequencial1">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-11">   
                                   
											<!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Inicio: </label>
                                                    <div class="col-md-4">
                                                   <input  name="ini"  type="text" value = ""
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">FIM: </label>
                                                    <div class="col-md-4">
                                                   <input  name="fim"  type="text" value = ""
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
						            </div>
 				 			  </div>
							 </div>
						   </div>	 
							 	<center><button class="button-48" type="submit"  role="button"><span class="text">Mostrar </span></button> </center>
							<br />				
			 <?php
         break;
        }
        case 'Sequencial1': {
            $ret_ini = somente_numeros($_POST['ini']);
            $ret_fim = somente_numeros($_POST['fim']);
            echo " <br><br> <center> <p style=color:blue> <b> Inicio em  CTI  : ". $ret_ini . "   Final em  CTI :  " . $ret_fim."  </b>  </p></center> ";
            if (($ret_ini <> "") and ($ret_fim <> ""))
            {
                $sql = "SELECT * from tb_controle_ti where ctrl_ti BETWEEN '" . $ret_ini . "' AND '" . $ret_fim . "' order by ctrl_ti ";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                $linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else
                {
                     if ($total > 0) {
                        do {

                            $retnome = $linha['descricao'];
                            $retID = $linha['id'];
                            $codequip = $linha['tab_cam'];
                            $desc = $linha['descricao'];
                            $retorno = $codequip;
                            $tp_equip = substr($retorno, 0, 1);
                            $tbequip_id = substr($retorno, 1);
                            $ret_desc_cod = $tp_equip;
                            $codificacao = "C" . $linha['ctrl_ti'] . " " . $linha['tab_cam'];


                            $retctrl_ti = $linha['ctrl_ti'];
                            $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_cam'] . "- L" . $linha['tab_origem'] . "- S" . $linha['id'];

                            if ($tp_equip == "C") // computadores
                            {
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/tp1.png' title='computador  localizado '  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp   - {$desc} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";
                            } else {
                                if ($tp_equip == "M") // monitores   
                                {
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosm.php?id=" . $retctrl_ti . "'><img src='img/tp2.png' title='Monitor  localizado'   height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp  - {$desc} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";
                                } else // diversos
                                {
                                    $img_nome = "diversos.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosd.php?id=" . $tbequip_id . "'><img src='img/" . $img_nome . "' title='Dispositivo localizado'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp - {$desc} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";
                                }
                            }
			            } while ($linha = mysqli_fetch_assoc($dados));
                    }
                }
			} else
               echo " <center> <b>Campos digitados Invalidos </b> </center> ";
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'pcs': {
            $sql = "SELECT * FROM tb_registra WHERE tabela='1'  order by id desc";
            //data LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
              
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' title='" . mostra_local($conn, $ret_ctrl_ti) . "' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ({$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp  -  Data :  {$retdata} &nbsp  Usuario :  {$retusuario} &nbsp <br> - Campo alterado  :  {$retcampo} &nbsp - Dados Digitados : {$retdados}  &nbsp    &nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";


            break;


        }
        case 'div': {
            $sql = "SELECT * FROM tb_registra WHERE tabela= 2  order by id desc";
            //data LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Dispositivos Diversos </center><br>";

                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dadosd.php?id=" . $rettabela_id . "'><img src='img/tp3.png'  height='25' width='25' title='" . mostra_local_divby_cti($conn, $ret_ctrl_ti) . "'  ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ({$rettabela}) &nbsp tab_id ({$rettabela_id}) &nbsp  -  Data :  {$retdata} &nbsp&nbsp -  Usuario :  {$retusuario} &nbsp <br> - Campo Alterado  :  {$retcampo} &nbsp - Dados Modificado  : {$retdados}  &nbsp  &nbsp   <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                   
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
       }
        case 'mon': {

            $sql = "SELECT * FROM tb_registra WHERE tabela= 3  order by id desc";
            //data LIKE '%" . $campo . "%' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Monitores </center><br>";

                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png'  height='25' width='25' title='". mostra_local_monby_cti($conn,$ret_ctrl_ti)."'  ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ({$rettabela}) &nbsp tab_id ({$rettabela_id}) &nbsp  -  Data :  {$retdata} &nbsp&nbsp -  Usuario :  {$retusuario} &nbsp <br> - Campo Alterado  :  {$retcampo} &nbsp - Dados Modificado  : {$retdados}  &nbsp  &nbsp   <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ({$rettabela}) &nbsp tab_id ({$rettabela_id}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'resumo': {
		  $sql = "SELECT * from tb_controle_ti  WHERE ctrl_ti = '" . $campo . "' and status='1' ";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $tab = $ln_ini['tab_origem'];
                    $id_tab = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);

                    if ($tp_equip == "C") // computadores
                    {

                        $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $id_tab . "' order by tbequi_nome";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $row = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {


                            echo "<center>Computadores </center><br>";
                           // $retnome = $linha['tbequi_nome'];
                            //$retID = $linha['tbequip_id'];
                            //$retplaqueta = $linha['tbequip_plaqueta'];
                            //$retloc = $linha['tbequi_tbcmei_id'];
                            // $retstatus = $linha['Al_01status'];

                            //	  $total = mysqli_num_rows($dados);
                            //  echo $total;
                            //$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                            // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            if ($total > 0) {
                                //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                do {

                                           $ret_idlocal = $row['tbequip_id'];
                                             //$ret_idsec = $row['tbequi'];
                                             $ret_plaqueta = $row['tbequip_plaqueta'];
                                             $ret_nome = $row['tbequi_nome'];
                                             $ret_equi_tipo = $row['tbequi_tipo'];
                                             $ret_monitor = $row['tbequip_monitor'];
                                             $ret_monitor_num = $row['tbequip_monitor_num'];
                                             $ret_monitor_obs = $row['tbequip_monitor_obs'];
                                             $ret_equi_mod = $row['tbequi_mod'];
                                             $ret_so = $row['tbequip_so'];
                                             $ret_so_arq = $row['tbequi_so_arq'];
                                             $ret_mod_placa = $row['tbequi_modplaca'];
                                             $ret_memoria = $row['tbequi_modelomemoria'];
                                             $ret_memtam = $row['tbequi_memoria'];
                                             $ret_slots = $row['tbequi_slots'];
                                             $ret_slots_uso = $row['tbequi_slots_uso'];
                                             $ret_modmem = $row['tbequi_modelomemoria'];
                                             $ret_armaz = $row['tbequi_armazenamento'];
                                             $ret_tparmaz = $row['tbequi_tparmazenamento'];
                                             $ret_arm_sec = $row['tbequi_arm_sec'];
                                             $ret_arm_sectam = $row['tbequi_arm_sectam'];
                                             $ret_datalanc = $row['tbequi_datalanc'];
                                             $ret_tec = $row['tbequi_tecnico'];
                                             $ret_status = $row['status'];
                                             $ret_resp = $row['tbequip_resp'];
                                             $ret_cmei_id = $row['tbequi_tbcmei_id'];
                                             $ret_sec_id = $row['tbequip_sec'];
                                             $ret_app = $row['tbequi_app'];
                                             $ret_app_out = $row['tbequi_app_out'];
                                             $ret_proc = $row['tbequi_mod'];
                                             $ret_obs = $row['tbequi_obs'];
                                             $ret_ref = $row['tbequi_ref'];
                                             $ret_vid_uso = $row['tbequip_vid_uso'];
                                             $ret_vid_saidas = $row['tbequip_vid_saidas'];
                                             $ret_lacre = $row['tbequip_lacre'];
                                             $ret_fonte = $row['tbequip_fonte'];
                                             $ret_util_qtd = $row['tbequip_util_num'];
                                             $ret_util_nome = $row['tbequip_util_nomes'];
                                             $ret_ctrl_ti = $row['ctrl_ti'];
                                             $unidade = nomedolocal($conn, $ret_cmei_id);
                                             $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                             $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_idlocal . "-l-" . $ret_cmei_id . "-s-" . $ret_sec_id."  ".$codequip." status ".$ret_status;  
                                    $ret_desc_cod = substr(strtoupper($row['tbequi_tipo']), 0, 2);
                                    if ($ret_desc_cod == "DES")//1
                                        $img_nome = "tp1.png";
                                    if (($ret_desc_cod == "NOT")or ($ret_desc_cod_letra == "CHR"))
                                        $img_nome = "notebook.png";
                                    if ($ret_desc_cod == "TAB")
                                        $img_nome = "tablet.png";
                                    if ($ret_desc_cod == "CEL")
                                        $img_nome = "celular.png";
                                    else
                                        $img_nome = "nenhum.png";

                                 echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_plaqueta."   Status : ".$ret_status. " <br>";
                                        
                                  echo "&nbsp &nbsp Local Codigo  :  ".$ret_cmei_id."   Secretaria  Codigo  : ".$ret_sec_id." <br>";
                                  echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                  echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_equi_tipo."    ID tabela : < ".$ret_idlocal."> <br>";
                                  echo "&nbsp &nbsp Monitor  :  ".$ret_monitor."   Qtd  : ".$ret_monitor_num."      OBS  : ".$ret_monitor_obs. " <br>";
                                  echo "&nbsp &nbsp".mostra_monitores($conn,$ret_idlocal)."  <br>";
                                  echo "&nbsp &nbsp".ret_resumo_ctrl_ti($conn,somente_numeros($ret_monitor_obs))."<br>";
                                 echo "&nbsp &nbsp ".  $ret_obs." <br>"; 
                                  echo "&nbsp &nbsp Utilizadores  :  ".$ret_util_nome."    <br>";
                                  echo "&nbsp &nbsp Responsavel  :  ".$ret_resp." <br>";
                                  echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_datalanc." <br>";
                                  echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i>";
                                echo "<br><br>&nbsp &nbsp  <h4> CTI (s) " . $ret_ctrl_ti . "  " . $ret_monitor_obs . "</h4>";
                                } while ($linha = mysqli_fetch_assoc($dados));
                            }
                            //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                            //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        }
                    } else {
                        if ($tp_equip == "M") { // monitores

                            $sql = "SELECT * FROM tb_monitores WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em MOnitores ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {


                                echo "<center>Monitores </center><br>";
                                $ret_equi_tipo = "MONITOR ";
                                $ret_status = $linha['status'];
                                $retnome = $linha['mon_marca'];
                                $ret_saida = $linha['mon_saida'];
                                $rettam = $linha['mon_tam'];
                                $retID = $linha['id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                                $ret_plaqueta = $linha['mon_plaqueta'];
                                $ret_tipo = $linha['mon_tipo'];
                                $retloc = $linha['local_id'];
                                $retsec = $linha['sec_id'];
                                $ret_vinculo=$linha['id_equip'];
                                $ret_tec = $linha['usuario'];
                                $ret_obs= $linha['obs'];
                                $ret_dt = $linha['data'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                               $unidade = nomedolocal($conn, $retloc);
                                $codificacao = "C" . $linha['ctrl_ti'] . "- M" . $linha['id'] . "- L" . $linha['local_id'] . "-E" . $linha['id_equip'];
                                if ($total > 0) {
                                    do {

                                        //$retnome = $linha['tbequi_nome'];
                                        //   $retID = $linha['tbequip_id'];
                                        //  $retplaqueta = $linha['tbequip_plaqueta'];
                                        // $retloc = $linha['tbequi_tbcmei_id'];

                                  echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_plaqueta."   Status : ".$ret_status. " <br>";" <br>";
                                  echo "&nbsp &nbsp Local Codigo  :  ".$retloc."   Secretaria  Codigo  : ".$retsec." <br>";
                                  echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                  echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_equi_tipo."    ID tabela : < ".$retID."> <br>";
                                  echo "&nbsp &nbsp Descriçao : ".$retnome."   ".$rettam."  ".$ret_tipo. "  ".$ret_saida. "<br>";
                                  echo "&nbsp &nbsp Vinculado a PC  :  ".  ret_cti_tbequip($conn, $ret_vinculo)."  <a href=ret_dados.php?id=".ret_cti_tbequip($conn, $ret_vinculo)." >  Consultar Pc </a></center>   <br>";
                                 echo "&nbsp &nbsp ".  $ret_obs." <br>";
                                  echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_dt." <br>";
                                  echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i>";      
                                } while ($linha = mysqli_fetch_assoc($dados));
                              }
                             
                            }
                        } else // diversos
                        {
                            $sql = "SELECT * FROM tb_diversos WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em Dispositivos Diversos ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {
                                echo "<center>Dispositivo </center><br>";
                                //$ret_des = $linha['descricao'];
                                $ret_desc_cod = $linha['descricao_cod'];
                             
                                     $ret_ctrl_ti = $linha['ctrl_ti'];
                        $ret_id = $linha['id'];
                        $ret_status = $linha['status'];
                        $ret_descricao = $linha['descricao'];
                        $ret_descricao_cod = $linha['descricao_cod'];
                        $ret_patrimonio = $linha['patrimonio'];
                        $ret_marca = $linha['marca'];
                        $ret_tam= $linha['tam'];
                        $ret_posicao = $linha['posicao'];
                        $ret_comps = $linha['comps'];
                        $ret_tipo = $linha['tipo'];
                        $ret_portas = $linha['portas'];
                        $ret_por_total = $linha['por_total'];
                        $ret_por_util = $linha['por_util'];
                        $ret_por_disp = $linha['por_disp'];
                        $ret_rede = $linha['rede'];
                        $ret_ip = $linha['ip'];
                        $ret_gerenciavel = $linha['gerenciavel'];
                        $ret_obs = $linha['obs'];
                        $ret_usuario = $linha['usuario'];
                        $ret_loc = $linha['local_cod'];
                        $ret_sec = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                     $unidade = nomedolocal($conn, $ret_loc);
                                
                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- L" . $linha['local_cod'] . "- S" . $linha['sec_cod'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                if ($total > 0) {
                                    do {
                                        if ($ret_desc_cod == "1")
                                            $img_nome = "d1.png";
                                        else
                                            if ($ret_desc_cod == "2")
                                                $img_nome = "d2.png";
                                            else
                                                if ($ret_desc_cod == "3")
                                                    $img_nome = "d3.png";
                                                else
                                                    if ($ret_desc_cod == "4")
                                                        $img_nome = "d4.png";
                                                    else
                                                        $img_nome = "nenhum.png";

                                              echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_patrimonio."   Status : ".$ret_status. " <br>";" <br>";
                                              echo "&nbsp &nbsp Local Codigo  :  ".$ret_loc."   Secretaria  Codigo  : ".$ret_sec." <br>";
                                              echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                              echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_descricao." Codigo ".$linha['descricao_cod'] ."  ID tabela : < ".$ret_id."> <br>";
                                             echo "&nbsp &nbsp ".  $ret_obs." <br>";
                                            //  echo "&nbsp &nbsp Descriçao : ".$retnome."   ".rettam."  ".$ret_tipo. "  ".$ret_saida. "<br>";
                                              echo "&nbsp &nbsp Vinculado a PC  :  ".  ret_cti_tbequip($conn, $ret_vinculo)." <br>";
                                              echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_datalanc." <br>";
                                              echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i> <br> <br>";

                                              echo "&nbsp &nbsp <h4> CTI (s) " . $ret_ctrl_ti ."  ". $ret_monitor_obs.    "</h4>";



                                } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            }
                        }
                    }
                }
                echo "<center> <br><br> <a href=busca_diversos_x.php?pat=" . $campo . "  > Voltar Especial </a> </center> ";
        
            break;
       }
      case 'resumo0': {
		  $sql = "SELECT * from tb_controle_ti  WHERE ctrl_ti = '" . $campo . "'  ";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $tab = $ln_ini['tab_origem'];
                    $id_tab = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);

                    if ($tp_equip == "C") // computadores
                    {

                        $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $id_tab . "' order by tbequi_nome";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $row = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {


                            echo "<center>Computadores </center><br>";
                           // $retnome = $linha['tbequi_nome'];
                            //$retID = $linha['tbequip_id'];
                            //$retplaqueta = $linha['tbequip_plaqueta'];
                            //$retloc = $linha['tbequi_tbcmei_id'];
                            // $retstatus = $linha['Al_01status'];

                            //	  $total = mysqli_num_rows($dados);
                            //  echo $total;
                            //$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                            // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            if ($total > 0) {
                                //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                do {

                                           $ret_idlocal = $row['tbequip_id'];
                                            // $ret_status = $row['status'];
                                             $ret_plaqueta = $row['tbequip_plaqueta'];
                                             $ret_nome = $row['tbequi_nome'];
                                             $ret_equi_tipo = $row['tbequi_tipo'];
                                             $ret_monitor = $row['tbequip_monitor'];
                                             $ret_monitor_num = $row['tbequip_monitor_num'];
                                             $ret_monitor_obs = $row['tbequip_monitor_obs'];
                                             $ret_equi_mod = $row['tbequi_mod'];
                                             $ret_so = $row['tbequip_so'];
                                             $ret_so_arq = $row['tbequi_so_arq'];
                                             $ret_mod_placa = $row['tbequi_modplaca'];
                                             $ret_memoria = $row['tbequi_modelomemoria'];
                                             $ret_memtam = $row['tbequi_memoria'];
                                             $ret_slots = $row['tbequi_slots'];
                                             $ret_slots_uso = $row['tbequi_slots_uso'];
                                             $ret_modmem = $row['tbequi_modelomemoria'];
                                             $ret_armaz = $row['tbequi_armazenamento'];
                                             $ret_tparmaz = $row['tbequi_tparmazenamento'];
                                             $ret_arm_sec = $row['tbequi_arm_sec'];
                                             $ret_arm_sectam = $row['tbequi_arm_sectam'];
                                             $ret_datalanc = $row['tbequi_datalanc'];
                                             $ret_tec = $row['tbequi_tecnico'];
                                             $ret_status = $row['status'];
                                             $ret_resp = $row['tbequip_resp'];
                                             $ret_cmei_id = $row['tbequi_tbcmei_id'];
                                             $ret_sec_id = $row['tbequip_sec'];
                                             $ret_app = $row['tbequi_app'];
                                             $ret_app_out = $row['tbequi_app_out'];
                                             $ret_proc = $row['tbequi_mod'];
                                             $ret_obs = $row['tbequi_obs'];
                                             $ret_ref = $row['tbequi_ref'];
                                             $ret_vid_uso = $row['tbequip_vid_uso'];
                                             $ret_vid_saidas = $row['tbequip_vid_saidas'];
                                             $ret_lacre = $row['tbequip_lacre'];
                                             $ret_fonte = $row['tbequip_fonte'];
                                             $ret_util_qtd = $row['tbequip_util_num'];
                                             $ret_util_nome = $row['tbequip_util_nomes'];
                                             $ret_ctrl_ti = $row['ctrl_ti'];
                                             $unidade = nomedolocal($conn, $ret_cmei_id);
                                             $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                             $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_idlocal . "-l-" . $ret_cmei_id . "-s-" . $ret_sec_id."  ".$codequip." status ".$ret_status;  
                                    $ret_desc_cod = substr(strtoupper($row['tbequi_tipo']), 0, 2);
                                    if ($ret_desc_cod == "DES")//1
                                        $img_nome = "tp1.png";
                                    if ($ret_desc_cod == "NOT")
                                        $img_nome = "notebook.png";
                                    if ($ret_desc_cod == "TAB")
                                        $img_nome = "tablet.png";
                                    if ($ret_desc_cod == "CEL")
                                        $img_nome = "celular.png";
                                    else
                                        $img_nome = "nenhum.png";

                                  echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_plaqueta."   Status : ".$ret_status. " <br>";
                                  echo "&nbsp &nbsp Local Codigo  :  ".$ret_cmei_id."   Secretaria  Codigo  : ".$ret_sec_id." <br>";
                                  echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                  echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_equi_tipo."    ID tabela : < ".$ret_idlocal."> <br>";
                                  echo "&nbsp &nbsp Monitor  :  ".$ret_monitor."   Qtd  : ".$ret_monitor_num."      OBS  : ".$ret_monitor_obs. " <br>";
                                  echo "&nbsp &nbsp: ".mostra_monitores($conn,$ret_idlocal)."  <br>";
                                  echo "&nbsp &nbsp".ret_resumo_ctrl_ti($conn,somente_numeros($ret_monitor_obs))."<br>";
                                  echo "&nbsp &nbsp ".  $ret_obs." <br>";
                                  echo "&nbsp &nbsp Utilizadores  :  ".$ret_util_nome."    <br>";
                                  echo "&nbsp &nbsp Responsavel  :  ".$ret_resp." <br>";
                                  echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_datalanc." <br>";
                                  echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i>";
                                  echo " <br><br> &nbsp &nbsp <h4> Combinacao de CTI (s) " . $ret_ctrl_ti . "  " . $ret_obs . "</h4>";
                                
                                } while ($linha = mysqli_fetch_assoc($dados));
                            }
                            //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                            //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        }
                    } else {
                        if ($tp_equip == "M") { // monitores

                            $sql = "SELECT * FROM tb_monitores WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em MOnitores ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {


                                echo "<center>Monitores </center><br>";
                                $ret_equi_tipo = "MONITOR ";
                                $ret_status = $linha['status'];
                                $retnome = $linha['mon_marca'];
                                $ret_saida = $linha['mon_saida'];
                                $rettam = $linha['mon_tam'];
                                $retID = $linha['id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                                $ret_plaqueta = $linha['mon_plaqueta'];
                                $ret_tipo = $linha['mon_tipo'];
                                $retloc = $linha['local_id'];
                                $retsec = $linha['sec_id'];
                                $ret_vinculo=$linha['id_equip'];
                                $ret_tec = $linha['usuario'];
                                 $ret_obs = $linha['obs'];
                                $ret_dt = $linha['data'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                               $unidade = nomedolocal($conn, $retloc);
                                $codificacao = "C" . $linha['ctrl_ti'] . "- M" . $linha['id'] . "- L" . $linha['local_id'] . "-E" . $linha['id_equip'];
                                if ($total > 0) {
                                    do {

                                        //$retnome = $linha['tbequi_nome'];
                                        //   $retID = $linha['tbequip_id'];
                                        //  $retplaqueta = $linha['tbequip_plaqueta'];
                                        // $retloc = $linha['tbequi_tbcmei_id'];

                                  echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_plaqueta."   Status : ".$ret_status. " <br>";
                                  echo "&nbsp &nbsp Local Codigo  :  ".$retloc."   Secretaria  Codigo  : ".$retsec." <br>";
                                  echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                  echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_equi_tipo."    ID tabela : < ".$retID."> <br>";
                                  echo "&nbsp &nbsp Descriçao : ".$retnome."   ".$rettam."  ".$ret_tipo. "  ".$ret_saida. "<br>";
                                  echo "&nbsp &nbsp Vinculado a PC  :  ".  ret_cti_tbequip($conn, $ret_vinculo)."  <a href=ret_dados.php?id=".ret_cti_tbequip($conn, $ret_vinculo)." >  Consultar Pc </a></center>   <br>";
                                echo "&nbsp &nbsp ".  $ret_obs." <br>";
                                  echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_dt." <br>";
                                  echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i>";      
                                } while ($linha = mysqli_fetch_assoc($dados));
                              }
                             
                            }
                        } else // diversos
                        {
                            $sql = "SELECT * FROM tb_diversos WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em Dispositivos Diversos ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {
                                echo "<center>Dispositivo </center><br>";
                                //$ret_des = $linha['descricao'];
                                $ret_desc_cod = $linha['descricao_cod'];
                             
                                     $ret_ctrl_ti = $linha['ctrl_ti'];
                        $ret_id = $linha['id'];
                        $ret_status = $linha['status'];
                        $ret_descricao = $linha['descricao'];
                        $ret_descricao_cod = $linha['descricao_cod'];
                        $ret_patrimonio = $linha['patrimonio'];
                        $ret_marca = $linha['marca'];
                        $ret_tam= $linha['tam'];
                        $ret_posicao = $linha['posicao'];
                        $ret_comps = $linha['comps'];
                        $ret_tipo = $linha['tipo'];
                        $ret_portas = $linha['portas'];
                        $ret_por_total = $linha['por_total'];
                        $ret_por_util = $linha['por_util'];
                        $ret_por_disp = $linha['por_disp'];
                        $ret_rede = $linha['rede'];
                        $ret_ip = $linha['ip'];
                        $ret_gerenciavel = $linha['gerenciavel'];
                        $ret_obs = $linha['obs'];
                        $ret_usuario = $linha['usuario'];
                        $ret_loc = $linha['local_cod'];
                        $ret_sec = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                     $unidade = nomedolocal($conn, $ret_loc);
                                
                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- L" . $linha['local_cod'] . "- S" . $linha['sec_cod'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                if ($total > 0) {
                                    do {
                                        if ($ret_desc_cod == "1")
                                            $img_nome = "d1.png";
                                        else
                                            if ($ret_desc_cod == "2")
                                                $img_nome = "d2.png";
                                            else
                                                if ($ret_desc_cod == "3")
                                                    $img_nome = "d3.png";
                                                else
                                                    if ($ret_desc_cod == "4")
                                                        $img_nome = "d4.png";
                                                    else
                                                        $img_nome = "nenhum.png";

                                              echo "&nbsp &nbsp Controle CTI :  ".$ret_ctrl_ti."   Patrimonio : ".$ret_patrimonio."   Status : ".$ret_status. " <br>";
                                              echo "&nbsp &nbsp Local Codigo  :  ".$ret_loc."   Secretaria  Codigo  : ".$ret_sec." <br>";
                                              echo "&nbsp &nbsp <i>".$unidade." </i> <br>";
                                              echo "&nbsp &nbsp Tipo de Equipamento :  ".$ret_descricao." Codigo ".$linha['descricao_cod'] ."  ID tabela : < ".$ret_id."> <br>";
                                             
                                            //  echo "&nbsp &nbsp Descriçao : ".$retnome."   ".rettam."  ".$ret_tipo. "  ".$ret_saida. "<br>";
                                              echo "&nbsp &nbsp Vinculado a PC  :  ".  ret_cti_tbequip($conn, $ret_vinculo)." <br>";
                                                 echo "&nbsp &nbsp ".  ret_obs." <br>";
                                              echo "&nbsp &nbsp Tecnico  :  ".$ret_tec."   ".$ret_datalanc." <br>";
                                              echo "&nbsp &nbsp <i>Codificaçao ".$codificacao."</i>";      


                                       
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            }
                        }
                    }
                }
          //  echo "<center> <br><br> <a href=tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
                echo "<center> <br><br> <a href=busca_diversos_x.php?pat=" . $campo . "  > Voltar Especial </a> </center> ";
        
            break;
       }
        case 'Visual': {
            ?>		<form method="post" enctype="multipart/form-data" action="buscador_div2.php">    
							<input type="hidden" name="origem" size=50 value= "Visual1">
							<input type="hidden" name="opcao" size=50 value= "Visual1">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-11">   
                                   
											<!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">Inicio: </label>
                                                    <div class="col-md-4">
                                                   <input  name="ini"  type="text" value = ""
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
             
                                           <!-- Text input-->
                                                          <div class="form-group">
                                                    <label class="col-md-4 control-label" for="telefone">FIM: </label>
                                                    <div class="col-md-4">
                                                   <input  name="fim"  type="text" value = ""
                                                     class="form-control input-md" > 
                                                    </div>
                                                    </div
						            </div>
 				 			  </div>
							 </div>
						   </div>	 
							 	<center><button class="button-48" type="submit"  role="button"><span class="text">Mostrar Sequencia </span></button> </center>
							<br />				
			 <?php
            break;
        }
        case 'Visual1':
         {
            $seq = "";
             $temp_pc = "";
            $temp_div = "";
            $temp_mon = "";
            $ret_ini = somente_numeros($_POST['ini']);
             $ret_fim = somente_numeros($_POST['fim']);
             echo " <br><br> <center> <p style=color:blue> <b> Inicio em  CTI  : ". $ret_ini . "   Final em  CTI :  " . $ret_fim."  </b>  </p></center> ";
            if (($ret_ini <> "") and ($ret_fim <> "")) 
            {
                $sql = "SELECT * from tb_controle_ti where ctrl_ti BETWEEN '" . $ret_ini . "' AND '" . $ret_fim . "' order by ctrl_ti desc";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                 $ln_ini = mysqli_fetch_assoc($dados);
                 $total = mysqli_num_rows($dados);
                  if ($total == 0) 
                   {
                      $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                      echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                    }
                  else 
                   {
                 //   echo "<br>";
                          //  $ln_ini = mysqli_fetch_assoc($dados);
                   do {
                      //  $ln_ini = mysqli_fetch_assoc($dados);
                        $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                        $ret_tabela = $ln_ini['tab_origem'];
                        $ret_chave = $ln_ini['tab_chave'];
                        $codequip = $ln_ini['tab_cam'];
                        $desc = $ln_ini['descricao'];
                        $usuariopc = ret_userbycti($conn, $ret_ctrl_ti);
                        $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                        //   $dados_tec = $ln_ini['descricao'];
                        $seq .= $ret_ctrl_ti." ";
                        
                        if (($ret_tabela == "1") or ($ret_tabela == 1)) // significa q o dispositivo eh um Computador
                          {
                            // consulta em outra tabela // monitores 
                            $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                            $linham = mysqli_fetch_assoc($dadosm);
                            $totalm = mysqli_num_rows($dadosm);
                            $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                          
                            //$retloc = $linham['local_id'];
                            if ($totalm == 0)
                            {
                              echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc ."  ". $dados_tec ." Usuario(s) :  ". $usuariopc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Monitor não cadastrado  <br> ";
                            }
                            else
                            {
                                if ($totalm > 0)
                                 {
                                  echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . " Usuario(s) :  " . $usuariopc ."' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                    do {
                                        $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                        $retID = $linham['id'];
                                        $retplaqueta = $linham['mon_plaqueta'];
                                        $retloc = $linham['local_id'];
                                        $pc_id = $linham['id_equip'];
                                        $retm_ctrl_ti = $linham['ctrl_ti'];
                                        $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                        $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                        echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                                    } while ($linham = mysqli_fetch_assoc($dadosm));
                                    echo "<br />";
                                 }
                            }
                        } // fim do if ret 1
                       
                        

                        if ($ret_tabela==1)
                            $temp_pc .= $ret_ctrl_ti . " ";
                        if ($ret_tabela == 2)
                            $temp_div .= $ret_ctrl_ti . " ";
                        if ($ret_tabela == 3)
                            $temp_mon .= $ret_ctrl_ti . " ";
                       //  $ln_ini = mysqli_fetch_assoc($dados); 
                   } while ($ln_ini = mysqli_fetch_assoc($dados));
                } // fim do else retorno >0
            }
            else
            {
                echo "Sequencia Invalida "; 
            }
          /*  echo "<br> <br> ---  Resumo da busca   " ;
            echo  "<br> &nbsp Pcs  ".$temp_pc;
            echo " <br> &nbsp Div   " . $temp_div;
            echo "<br> &nbsp Mon  " . $temp_mon;
            echo "<br> &nbsp Geral<br>  " . $seq;
            /*/
            echo "<center> <br><br> <a href=busca_diversos_x.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }

        case 'ListaCTI':
           {
            $sql = "SELECT * from tb_controle_ti where status=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else
            {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $retctrl_ti = $ln_ini['ctrl_ti'];
                    $tab = $ln_ini['tab_origem'];
                    $id_tab = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                    if ($tp_equip == "C") // computadores
                    {
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/tp1.png' title='Dispositivo  localizado '  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp   - {$desc} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  Tabela ".  $tab."  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";


                    } 
                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }



             echo "<center> <br><br> <a href=busca_diversos_x.php?pat=" . $campo . "  > Voltar </a> </center> ";
             break;
           }
        case 'mon_0': {
            $sql = "SELECT * from tb_controle_ti where status=1 order by ctrl_ti desc ";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela = $ln_ini['tab_origem'];
                    $ret_chave = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                    if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                        // consulta em outra tabela // monitores 
                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                        $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
                        if ($totalm == 0) {
                            echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                        } 
                    }
                } while ($ln_ini = mysqli_fetch_assoc($dados));
            }

            echo "<center> <br><br> <a href=tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center> <br> ";

            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'mon_1': {
            $sql = "SELECT * from tb_controle_ti where status=1 order by ctrl_ti desc ";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela = $ln_ini['tab_origem'];
                    $ret_chave = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                    if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                        // consulta em outra tabela // monitores 
                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                        $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
                       if ($totalm == 1) 
                        {
                            do {
                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                $retID = $linham['id'];
                                $retplaqueta = $linham['mon_plaqueta'];
                                $retloc = $linham['local_id'];
                                $pc_id = $linham['id_equip'];
                                $retm_ctrl_ti = $linham['ctrl_ti'];
                                $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                            } while ($linham = mysqli_fetch_assoc($dadosm));
                            echo "<br>";
                           //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                        }

                    } 
                } while ($ln_ini = mysqli_fetch_assoc($dados));
            }


            echo "<center> <br><br> <a href=tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }

        case 'mon_2': {
            $sql = "SELECT * from tb_controle_ti where status=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela = $ln_ini['tab_origem'];
                    $ret_chave = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao_pc = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                    if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                        // consulta em outra tabela // monitores 
                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                       $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
                        if ($totalm > 1)
                           {
                              //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                            echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc ."  ".$codificacao_pc. "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                            do {
                              //  $linham = mysqli_fetch_assoc($dadosm);
                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                $retID = $linham['id'];
                                $retplaqueta = $linham['mon_plaqueta'];
                                $retloc = $linham['local_id'];
                                $pc_id = $linham['id_equip'];
                                $retm_ctrl_ti = $linham['ctrl_ti'];
                                $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip']." <> ".$totalm;
                                echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo ." ".$codificacao. "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                            } while ($linham = mysqli_fetch_assoc($dadosm));
                            echo "<br />";
                       }
                    }
                } while ($ln_ini = mysqli_fetch_assoc($dados));
            }


            echo "<center> <br><br> <a href=tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Monitor_0': {
            $sql = "SELECT * from tb_controle_ti where tab_origem= 3 and status=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            $col = 0;
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela = $ln_ini['tab_origem'];
                    $ret_chave = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao_pc = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'];
                    if (($ret_tabela == "3") or ($ret_tabela == 3)) {
                        // consulta em outra tabela // monitores 
                        $sqlm = "SELECT * FROM tb_monitores WHERE id = '".$ret_chave."'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                        $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
                        if ($totalm == 1) {
                            //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                            //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                            do {
                                //  $linham = mysqli_fetch_assoc($dadosm);
                                $col = $col + 1;
                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                $retID = $linham['id'];
                                $retplaqueta = $linham['mon_plaqueta'];
                                $retloc = $linham['local_id'];
                                $pc_id = $linham['id_equip'];
                                $retm_ctrl_ti = $linham['ctrl_ti'];
                                $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'] . " <> " . $totalm; 
                               
                                
                                if (($pc_id==0)or($pc_id=="0")) 
                                {
                                    if ($col < 4)
                                         echo "&nbsp &nbsp  <a href=ret_dadosm.php?id=" . $ret_ctrl_ti . "  >  &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                                    else {
                                        echo "&nbsp &nbsp  <a href=ret_dadosm.php?id=" . $ret_ctrl_ti . "  >  &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                                        $col = 0;
                                    }
                                }
                              } while ($linham = mysqli_fetch_assoc($dadosm));
                          //  echo "<br />";
                        }
                    }
                } while ($ln_ini = mysqli_fetch_assoc($dados));
            }


           // echo "<center> <br><br> <a href=tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'bco_cti': {
            $col = 0;
            $vazio = "";
            $sqlm = "SELECT * FROM tb_controle_ti WHERE ctrl_ti = '" . $vazio . "' or tab_origem = '" . $vazio . "' or tab_chave = '" . $vazio . "'or tab_cam = '" . $vazio . "' or descricao = '" . $vazio . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
            $linham = mysqli_fetch_assoc($dadosm);
            $totalm = mysqli_num_rows($dadosm);
            //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
            //$retloc = $linham['local_id'];
            if ($totalm > 0) {
                //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                do {
                    //  $linham = mysqli_fetch_assoc($dadosm);
                    $col = $col + 1;
                    $retnome = "Descricao ". $linham['descricao'] . " Cod " . $linham['id']  ;
                    $retID = $linham['id'];
                    //$retplaqueta = $linham['mon_plaqueta'];
                    //$retloc = $linham['local_cod'];
                    //$pc_id = $linham['id_equip'];
                    $retm_ctrl_ti = $linham['ctrl_ti'];
                    $descritivo = $retnome . "  Tab_origem " . $linham['tab_origem'] . "  - Tab_chave  " . $linham['tab_chave'] . "  - Tab_cam  " . $linham['tab_cam'];
                    $codificacao = "CTI  " . $linham['ctrl_ti'] . " - id_div  " . $linham['id'] . "  <>  " . $totalm;



                    if ($col < 4)
                        echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $retID . "  >  &nbsp   <img src='img/pesquisar.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                    //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                    else {
                        echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $retID . "  >  &nbsp   <img src='img/pesquisar.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                        $col = 0;
                    }
                    //  }
                } while ($linham = mysqli_fetch_assoc($dadosm));
            }
            break;


        }
        case 'bco_equi': {
            $col = 0;
            $vazio = "";
            $sqlm = "SELECT * FROM tbequip WHERE ctrl_ti = '" . $vazio . "' or tbequi_nome = '" . $vazio . "' or tbequi_tipo = '" . $vazio . "'or tbequi_tbcmei_id = '" . $vazio . "' or tbequip_sec = '" . $vazio . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
            $linham = mysqli_fetch_assoc($dadosm);
            $totalm = mysqli_num_rows($dadosm);
            //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
            //$retloc = $linham['local_id'];
            if ($totalm > 0) {
                //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                do {
                    //  $linham = mysqli_fetch_assoc($dadosm);
                    $col = $col + 1;
                    $retnome ="Descrição  ". $linham['tbequi_nome'] . "  " . $linham['tbequi_tipo'] ." CTI : ".$linham['ctrl_ti'];
                    $retID = $linham['tbequip_id'];
                    $retplaqueta = $linham['tbequip_plaqueta'];
                    $retloc = $linham['tbequi_tbcmei_id'];
                   // $pc_id = $linham['id_equip'];
                    $ret_ctrl_ti = $linham['ctrl_ti'];
                    $descritivo = $retnome . "  Local " . $retloc . "  - Sec  " . $linham['tbequip_sec'];
                    $codificacao = "C" . $linham['ctrl_ti'] . "-E" . $retID . " <> " . $totalm;


                   
                        if ($col < 4)
                            echo "&nbsp &nbsp  <a href=ret_dados_id.php?id=" . $retID . "  >  &nbsp   <img src='img/tp1.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        else {
                            echo "&nbsp &nbsp  <a href=ret_dados_id.php?id=" . $retID . "  >  &nbsp   <img src='img/tp1.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            $col = 0;
                        }
                   // }
                } while ($linham = mysqli_fetch_assoc($dadosm));
            }
            break;




        }
        case 'bco_mon': {
            $col = 0;
            $vazio = "";
            $sqlm = "SELECT * FROM tb_monitores WHERE ctrl_ti = '".$vazio."' or mon_marca = '".$vazio."' or mon_plaqueta = '".$vazio."'or local_id = '".$vazio."' or sec_id = '".$vazio."' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                        $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                      //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
            if ($totalm > 0) {
                //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                do {
                    //  $linham = mysqli_fetch_assoc($dadosm);
                    $col = $col + 1;
                    $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                    $retID = $linham['id'];
                    $retplaqueta = $linham['mon_plaqueta'];
                    $retloc = $linham['local_id'];
                    $pc_id = $linham['id_equip'];
                    $retm_ctrl_ti = $linham['ctrl_ti'];
                    $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida']. "  Local " . $linham['local_id']. "  - Sec  " . $linham['sec_id'];
                    $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'] . " <> " . $totalm;


                    if (($pc_id == 0) or ($pc_id == "0")) {
                        if ($col < 4)
                            echo "&nbsp &nbsp  <a href=ret_dadosm.php?id=" . $retm_ctrl_ti . "  >  &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        else {
                            echo "&nbsp &nbsp  <a href=ret_dadosm.php?id=" . $retm_ctrl_ti . "  >  &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            $col = 0;
                        }
                    }
                } while ($linham = mysqli_fetch_assoc($dadosm));
            }            
            break;
        }
        case 'bco_div': {
            $col = 0;
            $vazio = "";
            $sqlm = "SELECT * FROM tb_diversos WHERE ctrl_ti = '" . $vazio . "' or descricao = '" . $vazio . "' or descricao_cod = '" . $vazio . "'or local_cod = '" . $vazio . "' or sec_cod = '" . $vazio . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
            $linham = mysqli_fetch_assoc($dadosm);
            $totalm = mysqli_num_rows($dadosm);
            //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
            //$retloc = $linham['local_id'];
            if ($totalm > 0) {
                //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                do {
                    //  $linham = mysqli_fetch_assoc($dadosm);
                    $col = $col + 1;
                    $retnome = $linham['descricao'] . " Cod " . $linham['descricao_cod'] . " Pat " . $linham['patrimonio'];
                    $retID = $linham['id'];
                    //$retplaqueta = $linham['mon_plaqueta'];
                    $retloc = $linham['local_cod'];
                    //$pc_id = $linham['id_equip'];
                    $retm_ctrl_ti = $linham['ctrl_ti'];
                    $descritivo = $retnome. "  Local " . $linham['local_cod'] . "  - Sec  " . $linham['sec_cod'];
                    $codificacao = "CTI  " . $linham['ctrl_ti'] . " - id_div  " . $linham['id'] . "  <>  " . $totalm;


                  
                        if ($col < 4)
                            echo "&nbsp &nbsp  <a href=ret_dadosd.php?id=" . $retID . "  >  &nbsp   <img src='img/pesquisar.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                        else {
                            echo "&nbsp &nbsp  <a href=ret_dadosd.php?id=" . $retID . "  >  &nbsp   <img src='img/pesquisar.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            //echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . " " . $codificacao . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp  <br> ";
                            $col = 0;
                        }
                  //  }
                } while ($linham = mysqli_fetch_assoc($dadosm));
            }
            break;
        }

        case 'bco_rel': {
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'patrimonio' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                $retusuario = $linha['usuario'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $rettabela = $linha['tabela'];
                $rettabela_id = $linha['tabela_id'];
                $retcampo = $linha['tabela_cpo'];
                $retdados = $linha['tabela_dados'];
                $retoutros = $linha['outros'];
                $retdata = $linha['data'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        //  $retnome = $linha['tbequi_nome'];
                        //  $retID = $linha['tbequip_id'];
                        // $retplaqueta = $linha['tbequip_plaqueta'];
                        // $retloc = $linha['tbequi_tbcmei_id'];
                        //$ret_ctrl_ti = $linha['ctrl_ti'];
                        //   $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Campo :  {$retcampo} &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            echo " <center> <a href=busca_diversos.php  >  Voltar </a></center>";
            break;




        }
        case 'arm_tp': {
            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'Armazen. tipo' order by data desc"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } 
            else 
            {
                echo "<center><b> Tipo Armazenamento </center> </b><br>";
             
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) 
                {
                     do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];

                        echo "<ul> <li> <P> <a>";
                          echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp- CTI: {$ret_ctrl_ti} &nbsp Tabela  ({$rettabela})_({$ret_ctrl_ti}) &nbsp - Dados : {$retdados}  &nbsp -Data :  {$retdata} &nbsp - Usuario : {$retusuario} &nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                          echo "</a>";
                          echo "</li></P> ";
                          echo "</ul>";
                        } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



            break;
        }
        case 'arm_tam': {

            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'armaz. tam' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) _({$ret_ctrl_ti}) &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                         echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";


            break;
        }
        case 'pl_mae': {

            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'placa mae' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Placa Mãe </center></b><br>";
              
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                      
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) _({$ret_ctrl_ti}) &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                         echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'proc': {

            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'processador' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Processador </center></b><br>";
                
                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                         echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'mem_tp': {

            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'memoria mod' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Memoria Tipo </center></b><br>";
               
                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'mem_tam': {

            $sql = "SELECT * FROM tb_registra WHERE tabela_cpo LIKE 'memoria tam' order by id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Memoria Tamanho </center></b><br>";
              
                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retusuario = $linha['usuario'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $rettabela = $linha['tabela'];
                        $rettabela_id = $linha['tabela_id'];
                        $retcampo = $linha['tabela_cpo'];
                        $retdados = $linha['tabela_dados'];
                        $retoutros = $linha['outros'];
                        $retdata = $linha['data'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png'  height='25' width='25' ></a>&nbsp -  CTI :  {$ret_ctrl_ti} &nbsp Tabela  ( {$rettabela}) &nbsp tab_id ({$ret_ctrl_ti}) &nbsp  - Dados : {$retdados}  &nbsp  -  Usuario :  {$retusuario} &nbsp&nbsp  -  Data :  {$retdata} &nbsp&nbsp <img src='img/tela.jpg' title='controle interno  ' height='10' width='10' >  <br /> ";
                        // echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";


            break;
        }
        default:	
	 {
	  echo "<br><center> Voce nao escolheu nenhuma opcao de busca  <br><br> "; 
	  echo " <a href=busca_diversos.php  >  Voltar </a></center>";
	  }
     echo"</div> </div>";		
  }
}

?>
