<style>
.container {
width: 100vw;
height: 100vh;

display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
}
.box {
top : 5%;
position:absolute;
width: 750px;
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
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

$hora = $date;

if (isset($_POST['opcao'])) {
    $tpservico = $_POST['opcao'];
   // var_dump("escolheu " . $tpservico);
echo "<br><br>  <center> <p style=color:blue> <b> Checagem por  " . $tpservico." </b> <br>";   
       echo "  " . $busca."   </p></center> ";
    $campo =  trim($busca);
// echo $tpservico;
    add_acao("Cons_" . $tpservico, $busca, $nome_usuario);
switch ($tpservico)
 {
	 case 'Plaqueta':
	{
	  $sql = "SELECT * FROM tbequip WHERE tbequip_plaqueta LIKE '%" . $campo . "%' order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else 
		{
            echo "<center>Computadores </center><br>";    
			$retnome = $linha['tbequi_nome'];
            $retID = $linha['tbequip_id'];
            $retplaqueta = $linha['tbequip_plaqueta'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
			$retloc = $linha['tbequi_tbcmei_id'];
            // $retstatus = $linha['Al_01status'];

            //	  $total = mysqli_num_rows($dados);
            //  echo $total;
            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
           // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            if ($total > 0) {
    		//  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
			   do {
				               
				  $retnome = $linha['tbequi_nome'];
                    $retID = $linha['tbequip_id'];
                    $retplaqueta = $linha['tbequip_plaqueta'];
                    $retloc = $linha['tbequi_tbcmei_id'];
                   $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
				   echo "<ul> <li> <P> <a>";
                    echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
				 
                    echo "</a>";
                    echo "</li></P> ";
                    echo "</ul>";
                } while ($linha = mysqli_fetch_assoc($dados));
            }
				//    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
				 //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
		}
			// consulta em outra tabela // monitores 
					$sqlm = "SELECT * FROM tb_monitores WHERE mon_plaqueta LIKE '%" . $campo . "%' order by mon_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
					$linham = mysqli_fetch_assoc($dadosm);
					$totalm = mysqli_num_rows($dadosm);
					if ($totalm == 0) {
						$titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
						echo "<center>Monitores</center>"; 
						$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
						$retID = $linham['id'];
						$retplaqueta = $linham['mon_plaqueta'];
						$retloc = $linham['local_id'];
						$pc_id = $linham['id_equip'];
						$ret_ctrl_ti = $linha['ctrl_ti'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
					   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($totalm > 0) {
						//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
						   do {
								$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
								$retID = $linham['id'];
								$retplaqueta = $linham['mon_plaqueta'];
							   $ret_ctrl_ti = $linham['ctrl_ti'];
								$retloc = $linham['local_id'];
								$pc_id = $linham['id_equip'];
                        $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];	
								echo "<ul> <li> <P> <a>";
							   echo "<a href='ret_dadosm.php?id=". $ret_ctrl_ti ."'><img src='img/tp2.png' title='Monitor localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
							
								echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linham = mysqli_fetch_assoc($dadosm));
						}
					 
					}
				// fim de consulta em tabela
				  // consulta em outra tabela // diversos 
					$sqld = "SELECT * FROM tb_diversos WHERE patrimonio LIKE '%" . $campo . "%' order by patrimonio"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
					$linhad = mysqli_fetch_assoc($dadosd);
					$totald = mysqli_num_rows($dadosd);
					if ($totald == 0) {
						$titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
						echo "<center>Diversos</center>"; 
						$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
						$retID = $linhad['id'];
						$retplaqueta = $linhad['patrimonio'];
						$ret_ctrl_ti = $linhad['ctrl_ti'];
						$retloc = $linhad['local_cod'];
						//$pc_id = $linham['id_equip'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
					   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($totald > 0) {
						//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
						   do {
								$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
								$retID = $linhad['id'];
								$retplaqueta = $linhad['patrimonio'];
								$retloc = $linhad['local_cod'];
                                $codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
								echo "<ul> <li> <P> <a>";
							    echo "<a href='ret_dadosd.php?id=". $retID ."'><img src='img/tp3.png' title='Dispositivo localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
									echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linhad = mysqli_fetch_assoc($dadosd));
						}
					 //   echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
					  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					}
				// fim de consulta em tabela
				   echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
	
	
	break; 
	}
	 case 'Id':
	{
		// consulta em tAbela // EQUIP 
		$campo=  somente_numeros($campo);
		if (is_numeric($campo)<>1){
			echo "<strong> <center>Numero com formato invalido ! <center> </strong>";
		 echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
                echo "<center> <br><br> <a href=tabelas.php  > Tabelas </a> </center> ";

		}else
		{
						 //echo "numero valido";
						$sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $campo . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
						$dados = mysqli_query($conn, $sql) or die(mysqli_error());
						$linha = mysqli_fetch_assoc($dados);
						$total = mysqli_num_rows($dados);
						if ($total == 0) {
							$titulo = " " . $total . "  Registro Localizado (s) em  Computadores  ";
							echo "<center> <p>  <b>" . nl2br($titulo) . " </b>  </p></center> ";
						} else 
						{
							echo "<br><br> <center>Computadores</center> "; 
							$retnome = $linha['tbequi_nome'];
							$retID = $linha['tbequip_id'];
							$ret_ctrl_ti = $linha['ctrl_ti'];
							$retplaqueta = $linha['tbequip_plaqueta'];
							$retloc = $linha['tbequi_tbcmei_id'];
						

							//	  $total = mysqli_num_rows($dados);
							//  echo $total;
							$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
						   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
							if ($total > 0) {
							//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
							   do {
										 $retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$retloc = $linha['tbequi_tbcmei_id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                            $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
								echo "<ul> <li> <P> <a>";
								   //echo "<a href=ret_dados.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  <br /> ";				  
                                   echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
								 	echo "</a>";
									echo "</li></P> ";
									echo "</ul>";
								} while ($linha = mysqli_fetch_assoc($dados));
							}            
						}

			              //  echo "Nenhum equipamento localizado <br>";
						//echo " <center><a href=buscador_div.php?pat=" . $campo . "&loc=" . $local . "  > Voltar </a> </center>";
					//	echo "</div>";
                     // consulta em outra tabela // monitores 
						$sqlm = "SELECT * FROM tb_monitores WHERE id = '" . $campo . "' order by mon_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
						$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
						$linham = mysqli_fetch_assoc($dadosm);
						$totalm = mysqli_num_rows($dadosm);
						if ($totalm == 0) {
							$titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
							echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						} else 
						{
							echo "<br><br> <center>Monitores</center>"; 
							$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
							$retID = $linham['id'];
							$retplaqueta = $linham['mon_plaqueta'];
							$ret_ctrl_ti = $linham['ctrl_ti'];
							$retloc = $linham['local_id'];
							$pc_id = $linham['id_equip'];
							// $retstatus = $linha['Al_01status'];

							//	  $total = mysqli_num_rows($dados);
							//  echo $total;
							$titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
						   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
							if ($totalm > 0) {
							//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
							   do {
									$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
									$retID = $linham['id'];
									$retplaqueta = $linham['mon_plaqueta'];
									$retloc = $linham['local_id'];
									$pc_id = $linham['id_equip'];
									  $ret_ctrl_ti = $linham['ctrl_ti'];
                                  $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                            ;
									echo "<ul> <li> <P> <a>";
								   //echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  <br /> ";				  
								   echo "<a href='ret_dadosm.php?id=". $ret_ctrl_ti ."'><img src='img/tp2.png' title='Monitor localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
								  	echo "</a>";
									echo "</li></P> ";
									echo "</ul>";
								} while ($linham = mysqli_fetch_assoc($dadosm));
							}
						 //   echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
						  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						}
							// fim de consulta em tabela
							  // consulta em outra tabela // diversos 
						$sqld = "SELECT * FROM tb_diversos WHERE id = '" . $campo . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
						$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
						$linhad = mysqli_fetch_assoc($dadosd);
						$totald = mysqli_num_rows($dadosd);
						if ($totald == 0) {
							$titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
							echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						} else 
						{
							echo "<center>Diversos</center>"; 
							$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
							$retID = $linhad['id'];
							$retplaqueta = $linhad['patrimonio'];
							$ret_ctrl_ti = $linhad['ctrl_ti'];
							$retloc = $linhad['local_cod'];
							//$pc_id = $linham['id_equip'];
							// $retstatus = $linha['Al_01status'];

							//	  $total = mysqli_num_rows($dados);
							//  echo $total;
							$titulo = "\n " . $totald . " Registro Localizado (s) na busca por " . $busca . "  ";
						   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
							if ($totald > 0) {
							//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
							   do {
									$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
									$retID = $linhad['id'];
									$retplaqueta = $linhad['patrimonio'];
									$retloc = $linhad['local_cod'];
                                     $codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
									echo "<ul> <li> <P> <a>";
								   //echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  <br /> ";				  
								   echo "<a href='ret_dadosd.php?id=". $retID ."'><img src='img/tp3.png' title='Dispositivo localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
								 	echo "</a>";
									echo "</li></P> ";
									echo "</ul>";
								} while ($linhad = mysqli_fetch_assoc($dadosd));
							}
						}
							  // fim de consulta em tabela
							     echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
		}
		break; 
	}
	case 'Nome':
	{
	  //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
					$sql = "SELECT * FROM tbequip WHERE tbequi_nome LIKE '%" . $campo . "%' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = " " . $total . "  Registro Localizado (s) em  Computadores  ";					
								echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
							
						//echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else
					{
						$retnome = $linha['tbequi_nome'];
						$retID = $linha['tbequip_id'];
						$ret_ctrl_ti = $linha['ctrl_ti'];
						$retplaqueta = $linha['tbequip_plaqueta'];
						$retloc = $linha['tbequi_tbcmei_id'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n Resultado da Busca  por  " . $tpservico . " Registro Localizado (s) na busca por " . $busca . "  ";
					//	echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($total > 0) {
							//   echo "<strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";
							do {
								$retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$ret_ctrl_ti = $linha['ctrl_ti'];
								$retloc = $linha['tbequi_tbcmei_id'];
                                $desc = strtoupper($linha['tbequi_tipo']);
                        // tratamento do icone do dispositivo                                        
                        $ret_desc_cod = substr($desc, 0, 2);
                        if ($ret_desc_cod == "DE")  // desktip
                            $img_nome = "tp1.png";
                        else
                            if (($ret_desc_cod == "NO") or ($ret_desc_cod == "CH"))  // note
                                $img_nome = "tp5.png";
                            else
                                if ($ret_desc_cod == "TA")  // tablet
                                    $img_nome = "tablet.png";
                                else
                                    if ($ret_desc_cod == "CE")  // celular
                                        $img_nome = "celular.png";
                                    else
                                        if ($ret_desc_cod == "SW")  // switch
                                            $img_nome = "d3.png";
                                        else
                                            if ($ret_desc_cod == "PA") // patch panel
                                                $img_nome = "d1.png";
                                            else
                                                if ($ret_desc_cod == "RA") // rack
                                                    $img_nome = "d2.png";
                                                else
                                                    if ($ret_desc_cod == "TV")  // tv
                                                        $img_nome = "d4.png";
                                                    else
                                                        $img_nome = "nenhum.png";
                        // fim de trat_icone



                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
								echo "<ul> <li> <P> <a>";
							   // echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";
								  echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/".$img_nome."' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CIT :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
								echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linha = mysqli_fetch_assoc($dados));
						}
						
				    }
				 
							//	echo " <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a>";
	 
						         // consulta em outra tabela // monitores 
								$sqlm = "SELECT * FROM tb_monitores WHERE mon_marca LIKE '%" . $campo . "%'  order by mon_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
								$linham = mysqli_fetch_assoc($dadosm);
								$totalm = mysqli_num_rows($dadosm);
								if ($totalm == 0) {
									$titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
									echo "<br><br> <center>Monitores</center>"; 
									$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
									$retID = $linham['id'];
									$retplaqueta = $linham['mon_plaqueta'];
                                    $ret_ctrl_ti = $linham['ctrl_ti'];
									$retloc = $linham['local_id'];
									$pc_id = $linham['id_equip'];
									// $retstatus = $linha['Al_01status'];

									//	  $total = mysqli_num_rows($dados);
									//  echo $total;
									$titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
								        // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totalm > 0) {
									   //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
									   do {
											$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
											$retID = $linham['id'];
											$retplaqueta = $linham['mon_plaqueta'];
											$retloc = $linham['local_id'];
											$pc_id = $linham['id_equip'];
										    $ret_ctrl_ti = $linham['ctrl_ti'];
                                            $pc_id = $linham['id_equip'];
											
											$codificacao = "C".$linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id']."-E".$linham['id_equip'];;
                        
											echo "<ul> <li> <P> <a>";
										    echo "<a href='ret_dadosm.php?id=". $ret_ctrl_ti ."'><img src='img/tp2.png' title='Monitor localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CIT :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " .$codificacao . "' height='10' width='10' >  <br /> ";								 
										  	echo "</a>"  ;
											echo "</li></P> ";
											echo "</ul>";
										} while ($linham = mysqli_fetch_assoc($dadosm));
									}
								}
						        	// fim de consulta em tabela
					   		      // consulta em outra tabela // diversos 
								$sqld = "SELECT * FROM tb_diversos WHERE descricao LIKE '%" . $campo . "%'  "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
								$linhad = mysqli_fetch_assoc($dadosd);
								$totald = mysqli_num_rows($dadosd);
								if ($totald == 0) {
									$titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
									echo "<center>Diversos</center>"; 
									$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
									$retID = $linhad['id'];
									$retplaqueta = $linhad['patrimonio'];
									$ret_ctrl_ti = $linhad['ctrl_ti'];
									$retloc = $linhad['local_cod'];
									//$pc_id = $linham['id_equip'];
									// $retstatus = $linha['Al_01status'];

									//	  $total = mysqli_num_rows($dados);
									//  echo $total;
									$titulo = "\n " . $totald . " Registro Localizado (s) na busca por " . $busca . "  ";
								   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totald > 0) {
									//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
									   do {
											$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
											$ret_desc_cod_letra = substr(strtoupper($linhad['descricao']), 0, 2);
                                            $retID = $linhad['id'];
											$retplaqueta = $linhad['patrimonio'];
											$retloc = $linhad['local_cod'];
											$ret_ctrl_ti = $linhad['ctrl_ti'];
											$codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
                        if ($ret_desc_cod_letra == "PA")
                            $img_nome = "d1.png";
                        else
                            if ($ret_desc_cod_letra == "RA")
                                $img_nome = "d2.png";
                            else
                                if ($ret_desc_cod_letra == "SW")
                                    $img_nome = "d3.png";
                                else
                                    if ($ret_desc_cod_letra == "TV")
                                        $img_nome = "d4.png";
                                    else
                                        if ($ret_desc_cod_letra == "IM")
                                            $img_nome = "impressora.png";
                                        else
                                            if ($ret_desc_cod_letra == "AP")
                                                $img_nome = "acess.png";
                                            else
                                                if ($ret_desc_cod_letra == "NO")
                                                    $img_nome = "nobreak.png";
                                                else
                                                    if ($ret_desc_cod_letra == "MO")
                                                        $img_nome = "baterias.png";
                                                    else
                                                        if ($ret_desc_cod_letra == "CO")
                                                            $img_nome = "controlador_wifi.png";
                                                        else
                                                            $img_nome = "nenhum.png";

                                            echo "<ul> <li> <P> <a>";
										   echo "<a href='ret_dadosd.php?id=". $retID ."'><img src='img/".$img_nome."' title='Dispositivo localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
										 	echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								 
								  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								}
				
						// fim de consulta em tabela
               echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";



	  break; 
	}
	case 'Local_Cod':
	{
            echo "<center> <br><br> <a href=tabelas_abas1.php?campo=".$campo. "&busca=" . $busca . "  > Visualizaçao completa Detalhada </a> </center> ";
            $campo = somente_numeros($campo);
            if (is_numeric($campo) <> 1) {
                echo "<strong> <center>Codigo de Local com formato invalido ! <center> </strong>";
                echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            } else
            {
                $seq = "";
                $temp_pc = "";
                $temp_div = "";
                $temp_mon = "";
                //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
                echo "<center> <strong>" . nomedolocal($conn, $campo) . "</strong> </center> ";
                $sql = "SELECT * FROM tbequip WHERE tbequi_tbcmei_id ='" . $campo . "' and status='1' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dados_equip = mysqli_query($conn, $sql) or die(mysqli_error());
                $linha = mysqli_fetch_assoc($dados_equip);
                $total_equip = mysqli_num_rows($dados_equip);
                if ($total_equip == 0) {
                    $titulo = " " . $total_equip . "  Registro Localizado (s) em  Computadores  ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";

                    //echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else // retrono > 0 
                {
                    do {
                        $ret_ctrl_ti_equip = $linha['ctrl_ti'];
                        $sql = "SELECT * from tb_controle_ti where ctrl_ti  ='" . $ret_ctrl_ti_equip . "'";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $ln_ini = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {
                            //   echo "<br>";
                            //  $ln_ini = mysqli_fetch_assoc($dados);
                            do {
                                //  $ln_ini = mysqli_fetch_assoc($dados);
                                $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                                $ret_tabela = $ln_ini['tab_origem'];
                                $ret_chave = $ln_ini['tab_chave'];
                                $codequip = $ln_ini['tab_cam'];
                                $desc = $ln_ini['descricao'];
                                $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                                $resp_d = retresp_by_idequip($conn, $ret_chave);
                                    //   $dados_tec = $ln_ini['descricao'];
                                $seq .= $ret_ctrl_ti . " ";

                                if (($ret_tabela == "1") or ($ret_tabela == 1)) // significa q o dispositivo eh um Computador
                                {
                                    // consulta em outra tabela // monitores 
                                    $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                    $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                    $linham = mysqli_fetch_assoc($dadosm);
                                    $totalm = mysqli_num_rows($dadosm);
                                    $retloc = retLOCAL_by_idequip($conn, $ret_chave);

                                    //$retloc = $linham['local_id'];
                                    if ($totalm == 0) {
                                        echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "  Resp " . $resp_d . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Monitor não cadastrado  <br> ";
                                    } else {
                                        if ($totalm > 0) {
                                            echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "  Resp " . $resp_d . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> "; //   $resp_d = retresp_by_idequip($conn, $ret_chave);
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

                                if ($ret_tabela == 1)
                                    $temp_pc .= $ret_ctrl_ti . " ";
                                if ($ret_tabela == 2)
                                    $temp_div .= $ret_ctrl_ti . " ";
                                if ($ret_tabela == 3)
                                    $temp_mon .= $ret_ctrl_ti . " ";
                                //  $ln_ini = mysqli_fetch_assoc($dados); 
                            } while ($ln_ini = mysqli_fetch_assoc($dados));
                        }
                    } while ($linha = mysqli_fetch_assoc($dados_equip));
                } // fim do else retorno >0

      
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE local_id ='" . $campo . "' ";// and id_equip='0'  order by mon_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 0) {
                    $titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    echo "<center>Monitores</center> <br> ";
                    $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                    $retID = $linham['id'];
                    $ret_ctrl_ti = $linham['ctrl_ti'];
                    $retplaqueta = $linham['mon_plaqueta'];
                    $retloc = $linham['local_id'];
                    $pc_id = $linham['id_equip'];
                    //$vin_pc = ret_cti_tbequip($conn, $pc_id);
                    // $retstatus = $linha['Al_01status'];

                    //	  $total = mysqli_num_rows($dados);
                    //  echo $total;
                    $titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
                    // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                    if ($totalm > 0) {
                        //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                        do {
                            $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                            $retID = $linham['id'];
                            $retplaqueta = $linham['mon_plaqueta'];
                            $retloc = $linham['local_id'];
                            $pc_id = $linham['id_equip'];
                            $vin_pc = ret_cti_tbequip($conn, $pc_id);
                            $ret_ctrl_ti = $linham['ctrl_ti'];
                            $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor  localizado em " . nomedolocal($conn, $retloc) ." Vinc. em  Pc ".$vin_pc. "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                        } while ($linham = mysqli_fetch_assoc($dadosm));
                    }
                }



                // fim de consulta em tabela
                // consulta em outra tabela // diversos 
                $sqld = "SELECT * FROM tb_diversos WHERE local_cod =  '" . $campo . "'  "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
                $linhad = mysqli_fetch_assoc($dadosd);
                $totald = mysqli_num_rows($dadosd);
                if ($totald == 0) {
                    $titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
                    echo "<center>Diversos</center><br>";
                    $retnome = $linhad['descricao'] . "  " . $linhad['marca'] . "  ";
                    $retID = $linhad['id'];
                    $retplaqueta = $linhad['patrimonio'];
                    $retloc = $linhad['local_cod'];
                    //$pc_id = $linham['id_equip'];
                    // $retstatus = $linha['Al_01status'];

                    //	  $total = mysqli_num_rows($dados);
                    //  echo $total;
                    $titulo = "\n " . $totald . " Registro Localizado (s) na busca por " . $busca . "  ";
                    // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                    if ($totald > 0) {
                        //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                        do {
                            $retnome = $linhad['descricao'] . "  " . $linhad['marca'] . "  ";
                            $retID = $linhad['id'];
                            $ret_ctrl_ti_div = $linhad['ctrl_ti'];
                            $retplaqueta = $linhad['patrimonio'];
                            $retloc = $linhad['local_cod'];
                            $codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $retID . "'><img src='img/tp3.png' title='Dispositivo localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti_div} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                        } while ($linhad = mysqli_fetch_assoc($dadosd));
                    }

                    // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                }

                // fim de consulta em tabela
                echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo ."  > Voltar </a> </center> ";
            }



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
							<form method="post" enctype="multipart/form-data" action="buscador_div2.php">    
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
        /*    echo "<center> " . nomedolocal($conn, $campo) . "</center>";
            $sql = "SELECT * FROM tbequip WHERE tbequi_tbcmei_id = '" . $campo . "' and status='1'  order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            //$sql = "SELECT * from tb_controle_ti where status=1 order by ctrl_ti desc ";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            //$linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br><br><center> <p style=color:blue> <b> Computadores e Monitores  </b>  </p></center> ";
                echo "<br>";
                do {
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                    $ret_tabela = "1";//$ln_ini['tab_origem'];
                    $ret_chave = $ln_ini['tbequip_id']; // 
                    $codequip = "C".$ln_ini['tbequip_id'];
                //   $ret_loc_pc = $ln_ini['tbequi_tbcmei_id'];
                    
                    $desc = $ln_ini['tbequi_tipo'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tbequip_id'];
                    if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                        // consulta em outra tabela // monitores 
                        $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                        $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                        $linham = mysqli_fetch_assoc($dadosm);
                        $totalm = mysqli_num_rows($dadosm);
                        $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                        //$retloc = $linham['local_id'];
                        if ($totalm == 1) {
                            do {
                                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                $retID = $linham['id'];
                                $retplaqueta = $linham['mon_plaqueta'];
                                $retloc = $linham['local_id'];
                                $pc_id = $linham['id_equip'];
                                $retm_ctrl_ti = $linham['ctrl_ti'];
                                $descritivo = " Marca  " . $linham['mon_marca'] . "  - Tam.  " . $linham['mon_tam'] . "  - Tela  " . $linham['mon_tipo'] . "  - Saida  " . $linham['mon_saida'];
                                $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . nomedolocal($conn,$retloc) . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                                echo " &nbsp   &nbsp   <img src='img/tp2.png' title=' " . $descritivo . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retm_ctrl_ti} &nbsp&nbsp&nbsp   ";
                            } while ($linham = mysqli_fetch_assoc($dadosm));
                            echo "<br>";
                            //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                        }

                    }
                } while ($linha = mysqli_fetch_assoc($dados));
            }
            /*/
            $seq = "";
            echo "<center> <strong>" . nomedolocal($conn, $campo) . "</strong> </center> ";
            $sql = "SELECT * FROM tbequip WHERE tbequi_tbcmei_id ='" . $campo . "' and status='1' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dados_equip = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados_equip);
            $total_equip = mysqli_num_rows($dados_equip);
            if ($total_equip == 0) {
                $titulo = " " . $total_equip . "  Registro Localizado (s) em  Computadores  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";

                //echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else // retrono > 0 
            {
                do {
                    $ret_ctrl_ti_equip = $linha['ctrl_ti'];
                    $sql = "SELECT * from tb_controle_ti where ctrl_ti  ='" . $ret_ctrl_ti_equip . "'";
                    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                    $ln_ini = mysqli_fetch_assoc($dados);
                    $total = mysqli_num_rows($dados);
                    if ($total == 0) {
                        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                        echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                    } else {
                        //   echo "<br>";
                        //  $ln_ini = mysqli_fetch_assoc($dados);
                        do {
                            //  $ln_ini = mysqli_fetch_assoc($dados);
                            $ret_ctrl_ti = $ln_ini['ctrl_ti'];
                            $ret_tabela = $ln_ini['tab_origem'];
                            $ret_chave = $ln_ini['tab_chave'];
                            $codequip = $ln_ini['tab_cam'];
                            $desc = $ln_ini['descricao'];
                            $dados_tec = retAUTOR_by_idequip($conn, $ret_chave);
                            //   $dados_tec = $ln_ini['descricao'];
                            $seq .= $ret_ctrl_ti . " ";

                            if (($ret_tabela == "1") or ($ret_tabela == 1)) // significa q o dispositivo eh um Computador
                            {
                                // consulta em outra tabela // monitores 
                                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                $linham = mysqli_fetch_assoc($dadosm);
                                $totalm = mysqli_num_rows($dadosm);
                                $retloc = retLOCAL_by_idequip($conn, $ret_chave);

                                //$retloc = $linham['local_id'];
                                if ($totalm == 0) {
                                    echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Monitor não cadastrado  <br> ";
                                } else {
                                    if ($totalm > 0) {
                                        echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
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
/*
                            if ($ret_tabela == 1)
                                $temp_pc .= $ret_ctrl_ti . " ";
                            if ($ret_tabela == 2)
                                $temp_div .= $ret_ctrl_ti . " ";
                            if ($ret_tabela == 3)
                                $temp_mon .= $ret_ctrl_ti . " ";
  /*/                          //  $ln_ini = mysqli_fetch_assoc($dados); 
                        } while ($ln_ini = mysqli_fetch_assoc($dados));
                    }
                } while ($linha = mysqli_fetch_assoc($dados_equip));
            } // fim do else retorno >0

            // consulta em outra tabela // monitores 
								$sqlm = "SELECT * FROM tb_monitores WHERE local_id = '" . $campo . "' order by mon_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
								$linham = mysqli_fetch_assoc($dadosm);
								$totalm = mysqli_num_rows($dadosm);
								if ($totalm == 0) {
									$titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
									echo "<br><br> <center> <b>Relaçao Individual de Monitores </b> </center> <br> "; 
									$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
									$retID = $linham['id'];
									$retplaqueta = $linham['mon_plaqueta'];
									$retloc = $linham['local_id'];
									$pc_id = $linham['id_equip'];
									// $retstatus = $linha['Al_01status'];

									//	  $total = mysqli_num_rows($dados);
									//  echo $total;
									$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
								   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totalm > 0) {
									//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
									   do {
											$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
											$retID = $linham['id'];
											$retplaqueta = $linham['mon_plaqueta'];
											$retloc = $linham['local_id'];
											$pc_id = $linham['id_equip'];
                                            $ret_ctrl_ti = $linham['ctrl_ti'];
											$codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
											echo "<ul> <li> <P> <a>";
										    echo "<a href='ret_dadosm.php?id=". $ret_ctrl_ti ."'><img src='img/tp2.png' title='Monitor localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                     
											echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linham = mysqli_fetch_assoc($dadosm));
									}
								 //   echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
								  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								}
							// fim de consulta em tabela
							  // consulta em outra tabela // diversos 
								$sqld = "SELECT * FROM tb_diversos WHERE local_cod ='" . $campo . "' order by patrimonio"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
								$linhad = mysqli_fetch_assoc($dadosd);
								$totald = mysqli_num_rows($dadosd);
								if ($totald == 0) {
									$titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
									echo "  <br> <center> <b> Diversos </b> </center> <br>"; 
									$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
									$retID = $linhad['id'];
									$retplaqueta = $linhad['patrimonio'];
									$retloc = $linhad['local_cod'];
									//$pc_id = $linham['id_equip'];
									// $retstatus = $linha['Al_01status'];

									//	  $total = mysqli_num_rows($dados);
									//  echo $total;
									$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
								   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totald > 0) {
									//  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
									   do {
											$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
											$retID = $linhad['id'];
											$retplaqueta = $linhad['patrimonio'];
											$retloc = $linhad['local_cod'];
										   $codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
											echo "<ul> <li> <P> <a>";
										   echo "<a href='ret_dadosd.php?id=". $retID ."'><img src='img/tp3.png' title='Dispositivo localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        //   echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   -  Patrimonio :  {$retplaqueta} &nbsp  <br /> ";				  
										  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
										//	echo "</center> ";
											echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								 //   echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
								  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								}
							// fim de consulta em tabela
                                echo "<center> <br><br> <a href=tabelas_abas1.php?campo=" . $campo . "&busca=" . $busca . "  > Visualizaçao completa Detalhada </a> </center> <br> ";
                                echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
	break; 
	}
	case 'Secretaria':
	{
	  // echo "sec";
					 //$sql = "SELECT * FROM tbsecretaria where sec_nome LIKE '%" . $campo . "%' order by sec_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
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
							<form method="post" enctype="multipart/form-data" action="buscador_div2.php">    
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
                                              $option = "<option value = '" . $retID . "'>" . $retnome . "   </option>";
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
		echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
				 $sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $campo . "' and status='1' order by ctrl_ti"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
						echo "<br><center>Computadores </center><br>";    
						$retnome = $linha['tbequi_nome'];
						$retID = $linha['tbequip_id'];
						$retplaqueta = $linha['tbequip_plaqueta'];
						$retloc = $linha['tbequi_tbcmei_id'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
					   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($total > 0) {
						         
						   do {
										   
							  $retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$retloc = $linha['tbequi_tbcmei_id'];
								$ret_ctrl_ti = $linha['ctrl_ti'];
                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
								echo "<ul> <li> <P> <a>";
							   echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                           
								echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linha = mysqli_fetch_assoc($dados));
						}
							//    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
							 //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					}
						// consulta em outra tabela // monitores 
								$sqlm = "SELECT * FROM tb_monitores WHERE sec_id = '" . $campo . "' order by ctrl_ti"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
								$linham = mysqli_fetch_assoc($dadosm);
								$totalm = mysqli_num_rows($dadosm);
								if ($totalm == 0) {
									$titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
                                   $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                    echo "<br><br><center>Monitores ( ".$totalm." )   </center> <br> "; 
								   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totalm > 0) {
								        do {
                                          //  $linham = mysqli_fetch_assoc($dadosm);
                                            $ret_ctrl_tim = $linham['ctrl_ti'];
                                            $retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
											$retID = $linham['id'];
											$retplaqueta = $linham['mon_plaqueta'];
											$retloc = $linham['local_id'];
											$pc_id = $linham['id_equip'];
											$codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
											echo "<ul> <li> <P> <a>";
										    echo "<a href='ret_dadosm.php?id=". $ret_ctrl_tim ."'><img src='img/tp2.png' title='Monitor localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_tim} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
											 echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linham = mysqli_fetch_assoc($dadosm));
									}
								}
							       // fim de consulta em tabela
							       // consulta em outra tabela // diversos 
								$sqld = "SELECT * FROM tb_diversos WHERE sec_cod ='" . $campo . "' order by patrimonio"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
								$linhad = mysqli_fetch_assoc($dadosd);
								$totald = mysqli_num_rows($dadosd);
								if ($totald == 0) {
									$titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
									echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								} else 
								{
									echo "<center>Diversos</center>"; 
									$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
									$retID = $linhad['id'];
									$retplaqueta = $linhad['patrimonio'];
									$retloc = $linhad['local_cod'];
									$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
								   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totald > 0) {
									   do {
											$retnome = $linhad['descricao']."  ".$linhad['marca']."  "  ;
											$retID = $linhad['id'];
											$retplaqueta = $linhad['patrimonio'];
											$retloc = $linhad['local_cod'];
										  $codificacao = "C" . $linhad['ctrl_ti'] . "- D" . $linhad['id'] . "- L" . $linhad['local_cod'] . "- S" . $linhad['sec_cod'];
											echo "<ul> <li> <P> <a>";
										    echo "<a href='ret_dadosd.php?id=". $retID ."'><img src='img/tp3.png' title='Dispositivo localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								}
							     // fim de consulta em tabela
							   echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
                               echo "<center> <br> <a href=visualiza_tabela.php?sec=" . $campo . " > Descritivo por Departamentos </a> </center> <br>";
                    break; 
	}
     case 'Usuarios':
	{
	
			//	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
				 $sql = "SELECT * FROM tbequip WHERE tbequip_util_nomes LIKE '%" . $campo . "%' order by tbequi_nome";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					} else 
					{
						echo "<center>Computadores </center><br>";    
						$retnome = $linha['tbequi_nome'];
						$retID = $linha['tbequip_id'];
						$retplaqueta = $linha['tbequip_plaqueta'];
						$retloc = $linha['tbequi_tbcmei_id'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
					   // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($total > 0) {
						//  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
						   do {
										   
							  $retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$retloc = $linha['tbequi_tbcmei_id'];
                               $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
								echo "<ul> <li> <P> <a>";
							    echo "<a href='ret_dados.php?id=". $ret_ctrl_ti ."'><img src='img/tp1.png' title='Computador localizado em ".nomedolocal($conn,$retloc) ."' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                       			echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linha = mysqli_fetch_assoc($dados));
						}
							//    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
							 //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					}
						
							
							   echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";   
	
	 break; 
	}
        case 'resp': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequip_resp LIKE '%" . $campo . "%' order by ctrl_ti";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Computadores </center><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
     case 'ctrl_TI': {
            $col = 0;
            if($campo==""){
				 $sql = "SELECT * from tb_controle_ti where status=1";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                $ln_ini = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else
                {
                    echo "<br>";
					do
                  {
                        $col = $col + 1;
                      //  $ln_ini = mysqli_fetch_assoc($dados);
                    $retctrl_ti = $ln_ini['ctrl_ti'];
                        $retctrl_ti = mascara_cti($retctrl_ti);
					$tab = $ln_ini['tab_origem'];
                    $id_tab = $ln_ini['tab_chave'];
                    $codequip = $ln_ini['tab_cam'];
                    $desc = $ln_ini['descricao'];
                    $retorno = $codequip;
                    $tp_equip = substr($retorno, 0, 1);
                    $tbequip_id = substr($retorno, 1);
                    $ret_desc_cod = $tp_equip;
                    $ret_desc_cod_letra = substr(strtoupper($ln_ini['descricao']), 0, 2);
                      // $retloc = nomedolocal($conn,retLOCAL_by_idequip($conn, $codequip));
                     $retloc = retLOCAL_by_idequip($conn, $id_tab);
                        $resp_d = retresp_by_idequip($conn, $id_tab);
                     $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'] . "  " . $retloc."  ".$codequip; 
                   if ($col < 5)
                    {
                       //     echo $col ."   ";
                       if ($tp_equip == "C") // computadores
                        {
                           
                            if ($ret_desc_cod_letra == "DE")//1
                                $img_nome = "tp1.png";
                            else if (($ret_desc_cod_letra == "NO")  or ($ret_desc_cod_letra == "CH"))  // note
                                $img_nome = "tp5.png";
                            else if ($ret_desc_cod_letra == "TA")
                                $img_nome = "tablet.png";
                            else if ($ret_desc_cod_letra == "CE")
                                $img_nome = "celular.png";
                            else
                                $img_nome = "nenhum.png";


                            echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'>&nbsp <img src='img/".$img_nome."' title='Dispositivo ".$desc."     ".$retloc."  Resp : ".$resp_d.  "'  height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >";
                            echo "</a>  ";
                        }
						else
                        {
                          if (($tp_equip == "M")and($tab==3)) // monitores   
                          {
                                echo "<a href='ret_dadosm.php?id=" . $retctrl_ti . "'>&nbsp <img src='img/tp2.png' title='Dispositivo " . $desc . "  ".$retloc."'   height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10'>";
                                echo "</a>";
                            }
						  else // diversos
                          {
                             //   $img_nome = "diversos.png";
                                if ($ret_desc_cod_letra == "PA")
                                    $img_nome = "d1.png";
                                else
                                    if ($ret_desc_cod_letra == "RA")
                                        $img_nome = "d2.png";
                                    else
                                        if ($ret_desc_cod_letra == "SW")
                                            $img_nome = "d3.png";
                                        else
                                            if ($ret_desc_cod_letra == "TV")
                                                $img_nome = "d4.png";
                                            else
                                                if ($ret_desc_cod_letra == "IM")
                                                    $img_nome = "impressora.png";
                                                else
                                                    if ($ret_desc_cod_letra == "AP")
                                                        $img_nome = "acess.png";
                                                    else
                                                          if ($ret_desc_cod_letra == "NO")
                                                                $img_nome = "nobreak.png";
                                                            else
                                                                if ($ret_desc_cod_letra == "MO")
                                                                    $img_nome = "baterias.png";
                                                                 else
                                                                    if ($ret_desc_cod_letra == "CO")
                                                                        $img_nome = "controlador_wifi.png";
                                                                    else
                                                                    $img_nome = "nenhum.png";

                                echo "<a href='ret_dadosd.php?id=" . $id_tab . "'> &nbsp <img src='img/" . $img_nome . "' title='Dispositivo " . $desc . "  " .$retloc." '  height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >";
                                echo "</a>";
                          }
                        }
                    }// fim do if < 5 
                 else
                 {
                          //  echo $col . "   ";
                            if ($tp_equip == "C") // computadores
                            {

                                if ($ret_desc_cod_letra == "DE")//1
                                    $img_nome = "tp1.png";
                                else if (($ret_desc_cod_letra == "NO")or ($ret_desc_cod_letra == "CH"))
                                    $img_nome = "tp5.png";
                                else if ($ret_desc_cod_letra == "TA")
                                    $img_nome = "tablet.png";
                                else if ($ret_desc_cod_letra == "CE")
                                    $img_nome = "celular.png";
                                else
                                    $img_nome = "nenhum.png";  // echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $dados_tec . "  Resp " . $resp_d . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> "; //   $resp_d = retresp_by_idequip($conn, $ret_chave);
                                echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'> &nbsp <img src='img/" . $img_nome . "' title='Dispositivo  " . $desc . " " . $retloc . "  Resp " . $resp_d . "'  height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}    &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >";
                                echo "</a> <br>";
                            } else
                            {
                                if (($tp_equip == "M")and($tab == 3)) // monitores   
                                {
                                    echo "<a href='ret_dadosm.php?id=" . $retctrl_ti . "'> &nbsp <img src='img/tp2.png' title='Dispositivo  " . $desc . "    " . $retloc . "'   height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >";
                                    echo "</a> <br> ";
                                } else // diversos
                                {
                                    //   $img_nome = "diversos.png";
                                    if ($ret_desc_cod_letra == "PA")
                                        $img_nome = "d1.png";
                                    else
                                        if ($ret_desc_cod_letra == "RA")
                                            $img_nome = "d2.png";
                                        else
                                            if ($ret_desc_cod_letra == "SW")
                                                $img_nome = "d3.png";
                                            else
                                                if ($ret_desc_cod_letra == "TV")
                                                    $img_nome = "d4.png";
                                                else
                                                    if ($ret_desc_cod_letra == "IM")
                                                        $img_nome = "impressora.png";
                                                    else
                                                        if ($ret_desc_cod_letra == "AP")
                                                            $img_nome = "acess.png";
                                                        else
                                                            if ($ret_desc_cod_letra == "NO")
                                                                $img_nome = "nobreak.png";
                                                            else
                                                                if ($ret_desc_cod_letra == "CO")
                                                                    $img_nome = "controlador_wifi.png";
                                                                else
                                                                    $img_nome = "nenhum.png";



                                    
                                      echo "<a href='ret_dadosd.php?id=" . $id_tab . "'> &nbsp <img src='img/" . $img_nome . "' title='Dispositivo localizado " . $retloc . " '  height='25' width='25' ></a>&nbsp-  CTI :  {$retctrl_ti}   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >";
                                      echo "</a> <br>";
                                }
                                //$col = 0;
                            }
                            $col = 0;
                   }
                    } while ($ln_ini = mysqli_fetch_assoc($dados));
                }
            }
            else
            {    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
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
                    $retloc = retLOCAL_by_idequip($conn, $id_tab);
                    $resp_d = retresp_by_idequip($conn, $id_tab);
                    if ($tp_equip == "C") // computadores
                    {

                        $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $id_tab . "' order by tbequi_nome";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $linha = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {


                            echo "<center>Computadores </center><br>";
                            $retnome = $linha['tbequi_nome'];
                            $retID = $linha['tbequip_id'];
                            $retplaqueta = $linha['tbequip_plaqueta'];
                            $retloc = $linha['tbequi_tbcmei_id'];
                            // $retstatus = $linha['Al_01status'];

                            //	  $total = mysqli_num_rows($dados);
                            //  echo $total;
                            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                            // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            if ($total > 0) {
                                //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                do {

                                    $retnome = $linha['tbequi_nome'];
                                    $retID = $linha['tbequip_id'];
                                    $retctrl_ti = $linha['ctrl_ti'];
                                    $retplaqueta = $linha['tbequip_plaqueta'];
                                    $retloc = $linha['tbequi_tbcmei_id'];
                                    $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                                    $ret_desc_cod = substr(strtoupper($linha['tbequi_tipo']), 0, 2);
                                    $ret_desc_cod_letra = substr(strtoupper($ln_ini['descricao']), 0, 2);
                                    if ($ret_desc_cod_letra == "DE")//1
                                        $img_nome = "tp1.png";
                                    else if( ($ret_desc_cod_letra == "NO") or ($ret_desc_cod_letra == "CH"))
                                        $img_nome = "tp5.png";
                                    else if ($ret_desc_cod_letra == "TA")
                                        $img_nome = "tablet.png";
                                    else if ($ret_desc_cod_letra == "CE")
                                        $img_nome = "celular.png";
                                    else
                                        $img_nome = "nenhum.png";

                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/".$img_nome."' title='Computador localizado em " . nomedolocal($conn, $retloc) . "  Resp " . $resp_d . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$campo} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                 
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";
                                } while ($linha = mysqli_fetch_assoc($dados));
                            }
                            //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                            //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        }
                    } else {
                        if (($tp_equip == "M")and ($tab ==3)) { // monitores

                            $sql = "SELECT * FROM tb_monitores WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em MOnitores ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {


                                echo "<center>Monitores </center><br>";
                                $ret_des = "MONITOR ";
                                $retnome = $linha['mon_marca'];
                                $rettam = $linha['mon_tam'];
                                $retID = $linha['id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                                $retplaqueta = $linha['mon_plaqueta'];
                                $ret_tipo = $linha['mon_tipo'];
                                $retloc = $linha['local_id'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                $codificacao = "C" . $linha['ctrl_ti'] . "- M" . $linha['id'] . "- L" . $linha['local_id'] . "-E" . $linha['id_equip'];
                                if ($total > 0) {
                                    do {

                                        //$retnome = $linha['tbequi_nome'];
                                        //   $retID = $linha['tbequip_id'];
                                        //  $retplaqueta = $linha['tbequip_plaqueta'];
                                        // $retloc = $linha['tbequi_tbcmei_id'];

                                        echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$campo} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                       
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";

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
                                $retnome = $linha['descricao'];
                                $rettam = $linha['tam'];
                                $ret_cti = $linha['ctrl_ti'];
                                $retID = $linha['id'];
                                $ret_tab_origem = $linha['descricao_cod'];
                                $retplaqueta = $linha['patrimonio'];
                                $ret_tipo = $linha['tipo'];
                                $retloc = $linha['local_cod'];
                                $ret_desc_cod_letra = substr(strtoupper($ln_ini['descricao']), 0, 2);
                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- L" . $linha['local_cod'] . "- S" . $linha['sec_cod'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                if ($total > 0) {
                                    do {

                                        if ($ret_desc_cod_letra == "PA")
                                            $img_nome = "d1.png";
                                        else
                                            if ($ret_desc_cod_letra == "RA")
                                                $img_nome = "d2.png";
                                            else
                                                if ($ret_desc_cod_letra == "SW")
                                                    $img_nome = "d3.png";
                                                else
                                                    if ($ret_desc_cod_letra == "TV")
                                                        $img_nome = "d4.png";
                                                    else
                                                        if ($ret_desc_cod_letra == "IM")
                                                            $img_nome = "impressora.png";
                                                        else
                                                            if ($ret_desc_cod_letra == "AP")
                                                                $img_nome = "acess.png";
                                                            else
                                                                if ($ret_desc_cod_letra == "NO")
                                                                    $img_nome = "nobreak.png";
                                                                else
                                                                    if ($ret_desc_cod_letra == "MO")
                                                                        $img_nome = "baterias.png";
                                                                    else
                                                                        if ($ret_desc_cod_letra == "CO")
                                                                            $img_nome = "controlador_wifi.png";
                                                                        else
                                                                $img_nome = "nenhum.png";
                                        
                                        echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosd.php?id=" . $retID . "'><img src='img/" . $img_nome . "' title='Dispositivo localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_cti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                      
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            }
                        }
                    }
                }
               
            }
            echo "<center> <br> <a href=tabelas_abas2.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center>  ";
            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Excluidos': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $col = "3";
            $i = "0";
            echo " <br> <br> <br> <br> <br> <br>  ";
			$sql = "SELECT * FROM tb_controle_ti WHERE status=0  order by id";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
          //  $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Dispositivos Excluidos </center><br>";
       
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                $linhas = ($total / 4);
              //  echo "Linhas = " . $linhas . " Colunas : " . $col . "  total de registros :  " . $total." <br><br>";
				if ($total > 0) {
       	  		  do {
		                for ($x = 0; $x < $linhas; $x++) {
                            for ($y = 0; $y < $col; $y++) {
                                $i = $i + 1;
                                $linha = mysqli_fetch_assoc($dados);
                                $retcam = $linha['tab_cam'];
                                $rettab = $linha['tab_origem'];
                                $retID = $linha['id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                                $retdescricao =  formaliza_10(strtoupper($linha['descricao']));
                                $codificacao = "C" . $linha['ctrl_ti'] . "- P" . $linha['id'] . "-  tab. " . $linha['tab_origem'] . " - " . $linha['descricao'];
                                if ($rettab == "1") {
                                    $img = "img/tp1.png";
                                } else {
                                    if ($rettab == "2") {
                                        $img = "img/tp3.png";
                                    } else {
                                        if ($rettab == "3") {
                                            $img = "img/tp2.png";
                                        }
                                    }
                                }
                                //$ctrl_ti = $linha['ctrl_ti'];
                                $vis_cti = mascara_cti($ret_ctrl_ti);
                                //$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                if ($vis_cti <> "")
                                     echo "&nbsp <a href='ret_dados_ctigeral2.php?cti=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp -  CTI :  {$vis_cti} - {$retdescricao} &nbsp  <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >   ";
									//  echo " <a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                            }
                            echo "<br>";
                        }
						
						
						//echo "&nbsp &nbsp  <a href='ret_dados_ctigeral2.php?cti=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Tecnicos': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tb_controle_ti WHERE status=1 and tecnico LIKE '%" . $campo . "%' order by ctrl_ti";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center> <br> <br>Tecnico </center><br>";
                $retcam = $linha['tab_cam'];
                $rettab = $linha['tab_origem'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $retdescricao = $linha['descricao'];

                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                 echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> <br><br>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retcam = $linha['tab_cam'];
                        $retchave = $linha['tab_chave'];
                        $rettab = $linha['tab_origem'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $retdescricao = $linha['descricao'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['tab_origem'] . "- " . $linha['descricao'];
                        if ($rettab == "1") {
                            $img = "img/tp1.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Computador localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        } else {
                            if ($rettab == "2") {
                                $img = "img/tp3.png";
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $retchave . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            } else {
                                if ($rettab == "3") {
                                    $img = "img/tp2.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Monitor localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
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

            break;
        }
        case 'Data': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tb_controle_ti WHERE status=1 and dt_cad LIKE '%" . $campo . "%' order by tab_origem";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
             //   echo "<center> <br> <br> Data </center><br>";
                $retcam = $linha['tab_cam'];
                $rettab = $linha['tab_origem'];
                $retID = $linha['id'];
                $ret_ctrl_ti = $linha['ctrl_ti'];
                $retdescricao = $linha['descricao'];

                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> <br><br>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retcam = $linha['tab_cam'];
                        $retchave = $linha['tab_chave'];
                        $rettab = $linha['tab_origem'];
                        $retID = $linha['id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $retdescricao = $linha['descricao'] ;
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['tab_origem'] . "E - " . $linha['tab_chave'] . "- " . $linha['descricao']." -->  ". mostra_monitores($conn,$retchave);
                        if ($rettab == "1") {
                            $img = "img/tp1.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Computador Cadastrado  em : ".ret_dtCad_byctrl_ti($conn, $ret_ctrl_ti)."  " .retLOCAL_by_idequip($conn,$retchave)." ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        } else {
                            if ($rettab == "2") {
                                $img = "img/tp3.png";
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $retchave . "'><img src='" . $img . "' title='Dispositivo  Localizado '  'height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            } else {
                                if ($rettab == "3") {
                                    $img = "img/tp2.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='" . $img . "' title=' Monitor  Localizado   '   height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
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

            break;
        }
        case 'Tb_equip': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $campo . "'";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center> <br> <br>Tabela Equipamentos  </center><br>";
            
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> <br><br>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {
                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $retdescricao = $linha['tbequi_tipo'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                       
                                    $img = "img/tp1.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retdescricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
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
        case 'Tb_div': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tb_diversos WHERE id =' " . $campo . "'";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center> <br> <br>Tabela Equipamentos  </center><br>";
                    $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> <br><br>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "1") { // patch panel
                            $img = "img/d1.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Computador localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        } else {
                            if ($ret_descricao_cod == "2") { // rack
                                $img = "img/d2.png";
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            } else {
                                if ($ret_descricao_cod == "3") { // switch
                                    $img = "img/d3.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Monitor localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";

                                } else {
                                    if ($ret_descricao_cod == "4") { // tv
                                        $img = "img/d4.png";
                                        echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Monitor localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";

                                    }
                                }
                            
                            
                            }


                        }




                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Tb_mon': {

            // consulta em outra tabela // monitores 
            $sqlm = "SELECT * FROM tb_monitores WHERE id =  '" . $campo . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
            $linham = mysqli_fetch_assoc($dadosm);
            $totalm = mysqli_num_rows($dadosm);
            if ($totalm == 0) {
                $titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center>Monitores</center>";
                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                $retID = $linham['id'];
                $retplaqueta = $linham['mon_plaqueta'];
                $retloc = $linham['local_id'];
                $pc_id = $linham['id_equip'];
                $ret_ctrl_ti = $linham['ctrl_ti'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($totalm > 0) {
                    //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                    do {
                        $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                        $retID = $linham['id'];
                        $retplaqueta = $linham['mon_plaqueta'];
                        $ret_ctrl_ti = $linham['ctrl_ti'];
                        $retloc = $linham['local_id'];
                        $pc_id = $linham['id_equip'];
                        $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";

                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                }

            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }

        case 'Tb_cont': {
			 $sql = "SELECT * from tb_controle_ti where id= '" . $campo . "' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else
                {
                    echo "<br>";
					do
                  {
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
                     $codificacao = "C" . $ln_ini['ctrl_ti'] . " " . $ln_ini['tab_cam'] ;
                        if ($tp_equip == "C") // computadores
                        {
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/tp1.png' title='Dispositivo  localizado '  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp   - {$desc} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                          
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                        }
						else
                        {
                          if ($tp_equip == "M") // monitores   
                          {
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosm.php?id=" . $retctrl_ti . "'><img src='img/tp2.png' title='Dispositivo  localizado'   height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp  - {$desc} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                              
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";
                            }
						  else // diversos
                          {
                                $img_nome = "diversos.png";

                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $id_tab . "'><img src='img/" . $img_nome . "' title='Dispositivo localizado'  height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp - {$desc} &nbsp &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                              
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";
                          }
                        }
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
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
		     $sql = "SELECT * FROM tbequip  order by ctrl_ti desc";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $linha = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {


                            echo "<center>Computadores </center><br>";
                            $retnome = $linha['tbequi_nome'];
                            $retID = $linha['tbequip_id'];
                            $retplaqueta = $linha['tbequip_plaqueta'];
                            $retloc = $linha['tbequi_tbcmei_id'];
                            $retstatus = $linha['status'];

                            //	  $total = mysqli_num_rows($dados);
                            //  echo $total;
                            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                            // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            if ($total > 0) {
                                //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                do {

                                    $retnome = $linha['tbequi_nome'];
                                    $retID = $linha['tbequip_id'];
                                    $retctrl_ti = $linha['ctrl_ti'];
                                    $retplaqueta = $linha['tbequip_plaqueta'];
                                    $retloc = $linha['tbequi_tbcmei_id'];
                                    $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                                    $ret_desc_cod = substr(strtoupper($linha['tbequi_tipo']), 0, 2);
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

                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$retctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                 
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";
                                } while ($linha = mysqli_fetch_assoc($dados));
                            }
                            //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                            //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        }
        break;

        }
        case 'div': {
		   $sql = "SELECT * FROM tb_diversos  order by ctrl_ti";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<center> <br> <br>Tabela Equipamentos  </center><br>";
                    $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> <br><br>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "1") { // patch panel
                            $img = "img/d1.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Computador localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        } else {
                            if ($ret_descricao_cod == "2") { // rack
                                $img = "img/d2.png";
                                echo "<ul> <li> <P> <a>";
                                echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                echo "</a>";
                                echo "</li></P> ";
                                echo "</ul>";

                            } else {
                                if ($ret_descricao_cod == "3") { // switch
                                    $img = "img/d3.png";
                                    echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Monitor localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";

                                } else {
                                    if ($ret_descricao_cod == "4") { // tv
                                        $img = "img/d4.png";
                                        echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Monitor localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";

                                    }
                                }
                            
                            
                            }


                        }




                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;	 
        }
        case 'mon': {
		   $sqlm = "SELECT * FROM tb_monitores order by ctrl_ti  "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
            $linham = mysqli_fetch_assoc($dadosm);
            $totalm = mysqli_num_rows($dadosm);
            $col = 0;
            if ($totalm == 0) {
                $titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br> <br> <center>Monitores</center> <br> <br>";
                $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                $retID = $linham['id'];
                $retplaqueta = $linham['mon_plaqueta'];
                $retloc = $linham['local_id'];
                $pc_id = $linham['id_equip'];
                $ret_ctrl_ti = $linham['ctrl_ti'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $totalm . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($totalm > 0) {
                    //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                    do {
                        $col = $col + 1;
                        $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol ";
                        //$retnome = "";
                        $retID = $linham['id'];
                        $retplaqueta = $linham['mon_plaqueta'];
                        $ret_ctrl_ti = $linham['ctrl_ti'];
                        $retloc = $linham['local_id'];
                        $pc_id = $linham['id_equip'];
                        $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                        if ($col < 5)
                        {
                           // echo " CTI ".$ret_ctrl_ti. "   ";
                             echo " &nbsp &nbsp <a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) ."   ".$retnome. "' height='25' width='25' ></a>&nbsp  CTI :  {$ret_ctrl_ti} &nbsp  <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  </a>";
                        }
                        else
                        {
                           // echo " CTI ".$ret_ctrl_ti." <br> ";
                            $col = 0;
                             echo "&nbsp &nbsp <a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) ."   ".$retnome. "' height='25' width='25' ></a>&nbsp  CTI :  {$ret_ctrl_ti} &nbsp   <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' > </a> <br>";
                        }
                       } while ($linham = mysqli_fetch_assoc($dadosm));
                }

            }
         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;	


        }
        case 'swi': {
	     $sql = "SELECT * from tb_diversos where descricao_cod= '3' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $linha = mysqli_fetch_assoc($dados);
                 
                    
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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "3") { // patch panel
                            $img = "img/d3.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        }

                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }
         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break; 
        
        }
        case 'rack': {
		 $sql = "SELECT * from tb_diversos where descricao_cod= '2' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $linha = mysqli_fetch_assoc($dados);
                 
                    
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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "2") { // patch panel
                            $img = "img/d2.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        }

                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }
         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;	

        }
        case 'pat': {
			 $sql = "SELECT * from tb_diversos where descricao_cod= '1' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $linha = mysqli_fetch_assoc($dados);
                 
                    
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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "1"){ // patch panel
                            $img = "img/d1.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        }

                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }
         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'tvs': {
			 $sql = "SELECT * from tb_diversos where descricao_cod= '4' ";
                  $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                //$linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<br>";
                do {
                    $linha = mysqli_fetch_assoc($dados);
                 
                    
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
                        $ret_local_cod = $linha['local_cod'];
                        $ret_sec_cod = $linha['sec_cod'];
                        $ret_ref = $linha['ref'];
                        $ret_rack = $linha['rack'];
                        $ret_localizacao = $linha['localizacao'];
                        $ret_poe = $linha['poe'];
                        $ret_resp = $linha['resp'];
                        


						
						$codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- " . $linha['local_cod'] . "- " . $linha['descricao'];
                        if ($ret_descricao_cod == "4") { // patch panel
                            $img = "img/d4.png";
                            echo "<ul> <li> <P> <a>";
                            echo "<a href='ret_dadosd.php?id=" . $ret_id . "'><img src='" . $img . "' title='Dispositivo localizado ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$ret_descricao} &nbsp &nbsp&nbsp   &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";

                        }

                    
                } while ($linha = mysqli_fetch_assoc($dados));
            }
         
            echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }
        case 'Resumo': {
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
                                    if (($ret_desc_cod == "NOT")or ($ret_desc_cod == "CHR"))
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
            $col = 0;
            $vazio = "";
            $sql = "SELECT * FROM tb_controle_ti WHERE tab_origem = 1 and status = 1 ";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
           // $linham = mysqli_fetch_assoc($dadosm);
            $total = mysqli_num_rows($dados);
            //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
            //$retloc = $linham['local_id'];
            if ($total > 0) 
            {
                //   echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> &nbsp  Sem Monitor  <br> ";
                //echo "&nbsp &nbsp  <a href=ret_dados.php?id=" . $ret_ctrl_ti . "  >  <img src='img/tp1.png' title=' " . $desc . "  " . $ret_ctrl_ti . "  " . $retloc . "  " . $codificacao_pc . "' height='30' width='30' >  &nbsp CTI &nbsp" . $ret_ctrl_ti . " </a> ";
                do {
                     $linha = mysqli_fetch_assoc($dados);
                     $ret_ctrl_ti = $linha['ctrl_ti'];
                     $pc_id = $linha['tab_chave'];
                     $descritivo = "  Descricao  ".$linha['descricao']. "  Tab_origem " . $linha['tab_origem'] . "  - Tab_chave  " . $linha['tab_chave'] . "  - Tab_cam  " . $linha['tab_cam'];
                            $sqlm = "SELECT * FROM tbequip WHERE tbequip_id = '" . $pc_id . "'";
                            $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                            $linham = mysqli_fetch_assoc($dadosm);
                            $totalm = mysqli_num_rows($dadosm);
                            //  $retloc = retLOCAL_by_idequip($conn, $ret_chave);
                             //$retloc = $linham['local_id'];
                           if ($totalm == 0) { // nao localizou em tbequip 
                                echo "&nbsp &nbsp  <a href=ret_dados_id.php?id=" . $pc_id . "  >  &nbsp   <img src='img/tp1.png' title=' " . $descritivo . " "  . "  ' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp <br>  ";
                                }
                    //  }
                } while ($linha = mysqli_fetch_assoc($dados));
            }
            echo"<br> <center>  ". $total." Registros verificados </center><br>";
            echo " <center> <a href=busca_diversos.php  >  Voltar </a></center>";
            break;




        }
        case 'arm_tp': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_tparmazenamento LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Armazenamento Tipo </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Arm. : " . $linha['tbequi_tparmazenamento'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'arm_tam': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_armazenamento LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Armazenamento Tipo </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Arm. Tam.  : " . $linha['tbequi_armazenamento'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'pl_mae': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_modplaca LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Placa Mãe </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Placa  : " . $linha['tbequi_modplaca'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'proc': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_proc LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Processador </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Proc. : " . $linha['tbequi_proc'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'mem_tp': {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_modelomemoria LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Memoria  Tipo </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria  : " . $linha['tbequi_modelomemoria'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'mem_tam': // ects
            {

            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            $sql = "SELECT * FROM tbequip WHERE tbequi_memoria LIKE '%" . $campo . "%' order by abs(ctrl_ti)";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Memoria Tamanho </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria Tam. : " . $linha['tbequi_memoria'];
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "</a>";
                       
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
 case 'ects': // especificacoes tecnicas por secretaria 
     {
            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            //$sql = "SELECT * FROM tbequip WHERE tbequip_sec  LIKE '%" . $campo . "%' order by abs(ctrl_ti)";       
            $sql = "SELECT * FROM tbequip WHERE tbequip_sec  = '" . $campo . "' order by tbequi_tbcmei_id";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Conferencia <br> ".nomedesecretaria($conn,$campo)."   </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria Tam. : " . $linha['tbequi_memoria'];
                        echo "  - <b> " . nomedolocal($conn,$linha['tbequi_tbcmei_id'])."</b>";
                        echo "<ul> <li> <P> <a>";
                        echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        echo "<b> Processador : </b>" . $linha['tbequi_mod']."<br>";
                        echo "<b> Memoria Tipo : </b> " . $linha['tbequi_modelomemoria']."    <b> Qtd :</b> " . $linha['tbequi_memoria'] . "   - <b> Arm_tipo : </b>" . $linha['tbequi_tparmazenamento'] . "    -<b> Qtd :</b> " . $linha['tbequi_armazenamento']."<br>";
                        echo "<b> Usuario : </b>" . $linha['tbequip_util_nomes']; 
                        echo "</a>";
                        echo "</li></P> ";
                        echo "</ul>";
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'ects2': // especificacoes tecnicas por secretaria 
        {
            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            //$sql = "SELECT * FROM tbequip WHERE tbequip_sec  LIKE '%" . $campo . "%' order by abs(ctrl_ti)";       
            $sql = "SELECT * FROM tbequip WHERE tbequip_sec  = '" . $campo . "' order by tbequi_tbcmei_id";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Conferencia <br> " . nomedesecretaria($conn, $campo) . "   </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria Tam. : " . $linha['tbequi_memoria'];
                        /*echo "  - <b> " . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . "</b>";
                         echo "<ul> <li> <P> <a>";
                         echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                         echo "<b> Processador : </b>" . $linha['tbequi_mod'] . "<br>";
                         echo "<b> Memoria Tipo : </b> " . $linha['tbequi_modelomemoria'] . "    <b> Qtd :</b> " . $linha['tbequi_memoria'] . "   - <b> Arm_tipo : </b>" . $linha['tbequi_tparmazenamento'] . "    -<b> Qtd :</b> " . $linha['tbequi_armazenamento'] . "<br>";
                         echo "<b> Usuario : </b>" . $linha['tbequip_util_nomes'];
                         echo "</a>";
                         echo "</li></P> ";
                        /*echo "</ul>";
                    */
                        echo "* ; ". nomedesecretaria($conn, $campo).";". nomedolocal($conn, $linha['tbequi_tbcmei_id']) . ";" .$ret_ctrl_ti.";". $retnome . ";" . $retplaqueta . ";". $linha['tbequi_mod'] . ";". $linha['tbequi_modelomemoria'] .";". $linha['tbequi_memoria'].";". $linha['tbequi_tparmazenamento'].";". $linha['tbequi_armazenamento'].";". $linha['tbequip_util_nomes'] .";<br>";
                        //echo "<ul> <li> <P> <a>";
                        //echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title='Computador localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                        //echo "<b> Processador : </b>" . $linha['tbequi_mod'] . "<br>";
                        //echo "<b> Memoria Tipo : </b> " . $linha['tbequi_modelomemoria'] . "    <b> Qtd :</b> " . $linha['tbequi_memoria'] . "   - <b> Arm_tipo : </b>" . $linha['tbequi_tparmazenamento'] . "    -<b> Qtd :</b> " . $linha['tbequi_armazenamento'] . "<br>";
                        //echo "<b> Usuario : </b>" . $linha['tbequip_util_nomes'];
                        //echo "</a>";
                        //echo "</li></P> ";
                        //echo "</ul>";


                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
         case 'ecst3_local': 
           {// especificacoes tecnicas por secretaria  relatorio cesar
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
							<form method="post" enctype="multipart/form-data" action="buscador_div2.php">    
							<input type="hidden" name="origem" size=50 value= "ecst3">
							<input type="hidden" name="opcao" size=50 value= "ecst3">
							<div class="container-fluid">
                              <div class="form-horizontal meuform">
                                <div class="form-group row">
                                  <div class="col-md-11">   
                                   <input type="radio" name="opcao" value="ecst3" checked/>&nbsp &nbsp Local &nbsp	
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
        
        case 'ecst3': // especificacoes tecnicas por secretaria  relatorio cesar
        {
            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            //$sql = "SELECT * FROM tbequip WHERE tbequip_sec  LIKE '%" . $campo . "%' order by abs(ctrl_ti)";       


            $cod_local = $_POST['digito'];
            
            $sql = "SELECT * FROM tbequip WHERE tbequi_tbcmei_id  = '" . $cod_local . "' order by tbequi_tbcmei_id";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Conferencia <br> " . nomedesecretaria($conn, $campo) . "   </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                echo "  - <b> " . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . "</b>";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    //echo "  - <b> " . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . "</b>";
                    ?>
                        <table class="table">
                            <thead>
                            <tr>
                  <?php
                   
                  do 
                       {
                          $retnome = $linha['tbequi_nome'];
                          $retID = $linha['tbequip_id'];
                          $retplaqueta = $linha['tbequip_plaqueta'];
                          $retloc = $linha['tbequi_tbcmei_id'];
                          $ret_ctrl_ti = $linha['ctrl_ti'];
                          $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria Tam. : " . $linha['tbequi_memoria'];
                          //echo "  - <b> " . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . "</b>";
                          echo " <table class='table'>  <thead>  <tr>";
                          echo " <th> Patrimonio </th> <th> CTI  </th> <th> Memoria </th> <th> Disco  </th><th> Videos </th> <th> em USO </th> <th> Monitor(es)  </th> </tr>";
                          echo " '<tr><td> " . $retplaqueta . " </td> <td> " . $ret_ctrl_ti . "  </td> <td> " . $linha['tbequi_modelomemoria'] . "/ " . $linha['tbequi_memoria'] . "</td> <td> " . $linha['tbequi_tparmazenamento'] . " / " . $linha['tbequi_armazenamento'] . " </td> <td> " . $linha['tbequip_vid_saidas'] . "  </td> <td> " . $linha['tbequip_vid_uso'] . "  </td>  <td> " . $linha['tbequip_monitor_num'] . "  </td></tr>";

                          echo "</table>";
                          echo "<b> Processador  </b> : " . $linha['tbequi_mod'] . "<br>";
                          echo "<b> Placa Mae  </b>   : " . $linha['tbequi_modplaca'] . "<br>";
                          echo "<b> Usuario </b>   : " . $linha['tbequip_util_nomes'] . "<br> <br>";




                          // echo "* ; " . nomedesecretaria($conn, $campo) . ";" . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . ";" . $ret_ctrl_ti . ";" . $retnome . ";" . $retplaqueta . ";" . $linha['tbequi_mod'] . ";" . $linha['tbequi_modelomemoria'] . ";" . $linha['tbequi_memoria'] . ";" . $linha['tbequi_tparmazenamento'] . ";" . $linha['tbequi_armazenamento'] . ";" . $linha['tbequip_util_nomes'] . ";<br>";
                      ?>
                           


                      <?php


                    } while ($linha = mysqli_fetch_assoc($dados));
                        ?>  
                         </thead>
                       </table>

                   <?php
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'ecst4': // especificacoes tecnicas por secretaria 
        {
            //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
            //$sql = "SELECT * FROM tbequip WHERE tbequip_sec  LIKE '%" . $campo . "%' order by abs(ctrl_ti)";       
            $sql = "SELECT * FROM tbequip WHERE tbequip_sec  = '" . $campo . "' order by tbequi_tbcmei_id";
            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            if ($total == 0) {
                $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            } else {
                echo "<b> <center>Conferencia <br> " . nomedesecretaria($conn, $campo) . "   </center></b><br>";
                $retnome = $linha['tbequi_nome'];
                $retID = $linha['tbequip_id'];
                $retplaqueta = $linha['tbequip_plaqueta'];
                $retloc = $linha['tbequi_tbcmei_id'];
                // $retstatus = $linha['Al_01status'];

                //	  $total = mysqli_num_rows($dados);
                //  echo $total;
                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                if ($total > 0) {
                    //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                    do {

                        $retnome = $linha['tbequi_nome'];
                        $retID = $linha['tbequip_id'];
                        $retplaqueta = $linha['tbequip_plaqueta'];
                        $retloc = $linha['tbequi_tbcmei_id'];
                        $ret_ctrl_ti = $linha['ctrl_ti'];
                        $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'] . "- Memoria Tam. : " . $linha['tbequi_memoria'];
                        echo "  - <b> " . nomedolocal($conn, $linha['tbequi_tbcmei_id']) . "</b>";
                        echo " <table class='table'>  <thead>  <tr>";
                        echo " <th> Patrimonio </th> <th> CTI  </th> <th> Memoria </th> <th> Disco  </th><th> Videos </th> <th> em USO </th> <th> Monitor(es)  </th> </tr>";
                        echo " '<tr><td> ".$retplaqueta." </td> <td> ".$ret_ctrl_ti."  </td> <td> " . $linha['tbequi_modelomemoria']."/ ".$linha['tbequi_memoria']. "</td> <td> " . $linha['tbequi_tparmazenamento'] ." / ".$linha['tbequi_armazenamento']. " </td> <td> " . $linha['tbequip_vid_saidas'] . "  </td> <td> " . $linha['tbequip_vid_uso'] . "  </td>  <td> " . $linha['tbequip_monitor_num'] . "  </td></tr>";
                        
                        echo "</table>";
                        echo "<b> Processador  </b> : " . $linha['tbequi_mod'] . "<br>";
                        echo "<b> Placa Mae  </b>   : " . $linha['tbequi_modplaca'] . "<br>";
                        echo "<b> Usuario </b>   : " . $linha['tbequip_util_nomes'] . "<br> <br>";
                     

                     } while ($linha = mysqli_fetch_assoc($dados));
                }
                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            }


            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";

            break;
        }
        case 'infs_tab': // especificacoes tecnicas infs de tabelas 
        {
                //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 

            $sql0 = "SELECT * from tb_reserva_cti  WHERE cti ='" . $campo . "' ";
            $dados0 = mysqli_query($conn, $sql0) or die(mysqli_error());
            $ln_ini0 = mysqli_fetch_assoc($dados0);
            $total0 = mysqli_num_rows($dados0);
                if ($total0 == 1) 
                 {
             echo "  <center>  <p style=color:red> <b> Tabela Reserva    CTRL_TI : " . $ln_ini0['cti'] ."    Local Id : " . $ln_ini0['id']."    <br>  Dados  :  " . $ln_ini0['dados'] ." <br>   </b> </p> </center>";
            }
               
                    // busca em controle_ti 
                $sql = "SELECT * from tb_controle_ti  WHERE ctrl_ti ='" . $campo . "' and status='1' ";
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
                    $retloc = retLOCAL_by_idequip($conn, $id_tab);
                    $resp_d = retresp_by_idequip($conn, $id_tab);
                echo "  <center>  <p style=color:blue> <b> Tabela controle_ti  CTRL_TI : ". $ln_ini['ctrl_ti']."   Tabela Origem  : ". $ln_ini['tab_origem']."  Local ID : ". $ln_ini['tab_cam']." <br> ".  $ln_ini['dt_cad']."  ". $ln_ini['tecnico']."  </b> </p> </center>";  
                    if ($tp_equip == "C") // computadores
                    {

                        $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $id_tab . "' order by tbequi_nome";
                        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                        $linha = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                        if ($total == 0) {
                            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
                            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        } else {


                            echo "<center>Computadores </center><br>";
                            $retnome = $linha['tbequi_nome'];
                            $retID = $linha['tbequip_id'];
                            $retplaqueta = $linha['tbequip_plaqueta'];
                            $retloc = $linha['tbequi_tbcmei_id'];
                            // $retstatus = $linha['Al_01status'];

                            //	  $total = mysqli_num_rows($dados);
                            //  echo $total;
                            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                            // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            if ($total > 0) {
                                //  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
                                do {

                                    $retnome = $linha['tbequi_nome'];
                                    $retID = $linha['tbequip_id'];
                                    $retctrl_ti = $linha['ctrl_ti'];
                                    $retplaqueta = $linha['tbequip_plaqueta'];
                                    $retloc = $linha['tbequi_tbcmei_id'];
                                    $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                                    $ret_desc_cod = substr(strtoupper($linha['tbequi_tipo']), 0, 2);
                                    $ret_desc_cod_letra = substr(strtoupper($ln_ini['descricao']), 0, 2);
                                    if ($ret_desc_cod_letra == "DE")//1
                                        $img_nome = "tp1.png";
                                    else if( ($ret_desc_cod_letra == "NO") or ($ret_desc_cod_letra == "CH"))
                                        $img_nome = "tp5.png";
                                    else if ($ret_desc_cod_letra == "TA")
                                        $img_nome = "tablet.png";
                                    else if ($ret_desc_cod_letra == "CE")
                                        $img_nome = "celular.png";
                                    else
                                        $img_nome = "nenhum.png";
                                echo "  <center>  <p style=color:blue> <b>  CTRL_TI : " . $linha['ctrl_ti'] . "    Local ID : " . $linha['tbequip_id'] . " <br> Referencia : " . $linha['tbequi_ref'] . "  " . $linha['tbequi_tecnico'] . "  </b> </p> </center> ";
                                echo "<ul> <li> <P> <a>";
                                    echo "<a href='ret_dados.php?id=" . $retctrl_ti . "'><img src='img/".$img_nome."' title='Computador localizado em " . nomedolocal($conn, $retloc) . "  Resp " . $resp_d . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$campo} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                 
                                    echo "</a>";
                                    echo "</li></P> ";
                                    echo "</ul>";
                                } while ($linha = mysqli_fetch_assoc($dados));
                            }
                            //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                            //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                        }
                    } else {
                        if (($tp_equip == "M")and ($tab ==3)) { // monitores

                            $sql = "SELECT * FROM tb_monitores WHERE id = '" . $id_tab . "'";
                            $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);
                            if ($total == 0) {
                                $titulo = "\n  " . $total . "  Registro Localizado (s) em MOnitores ";
                                echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            } else {


                                echo "<center>Monitores </center><br>";
                                $ret_des = "MONITOR ";
                                $retnome = $linha['mon_marca'];
                                $rettam = $linha['mon_tam'];
                                $retID = $linha['id'];
                                $ret_ctrl_ti = $linha['ctrl_ti'];
                                $retplaqueta = $linha['mon_plaqueta'];
                                $ret_tipo = $linha['mon_tipo'];
                                $retloc = $linha['local_id'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                $codificacao = "C" . $linha['ctrl_ti'] . "- M" . $linha['id'] . "- L" . $linha['local_id'] . "-E" . $linha['id_equip'];
                                if ($total > 0) {
                                    do {

                                        //$retnome = $linha['tbequi_nome'];
                                        //   $retID = $linha['tbequip_id'];
                                        //  $retplaqueta = $linha['tbequip_plaqueta'];
                                        // $retloc = $linha['tbequi_tbcmei_id'];
                                    echo "  <center>  <p style=color:blue> <b> Tabela Monitores  CTRL_TI : " . $linha['ctrl_ti'] . "    Local ID : " . $linha['id'] . " <br> Referencia : " . $linha['ref']."  ". $linha['usuario']. "  </b> </p> </center> ";
                                    echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_ti . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$campo} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                       
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";

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
                                $retnome = $linha['descricao'];
                                $rettam = $linha['tam'];
                                $ret_cti = $linha['ctrl_ti'];
                                $retID = $linha['id'];
                                $ret_tab_origem = $linha['descricao_cod'];
                                $retplaqueta = $linha['patrimonio'];
                                $ret_tipo = $linha['tipo'];
                                $retloc = $linha['local_cod'];
                                $ret_desc_cod_letra = substr(strtoupper($ln_ini['descricao']), 0, 2);
                                $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['id'] . "- L" . $linha['local_cod'] . "- S" . $linha['sec_cod'];
                                $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                if ($total > 0) {
                                    do {

                                        if ($ret_desc_cod_letra == "PA")
                                            $img_nome = "d1.png";
                                        else
                                            if ($ret_desc_cod_letra == "RA")
                                                $img_nome = "d2.png";
                                            else
                                                if ($ret_desc_cod_letra == "SW")
                                                    $img_nome = "d3.png";
                                                else
                                                    if ($ret_desc_cod_letra == "TV")
                                                        $img_nome = "d4.png";
                                                    else
                                                        if ($ret_desc_cod_letra == "IM")
                                                            $img_nome = "impressora.png";
                                                        else
                                                            if ($ret_desc_cod_letra == "AP")
                                                                $img_nome = "acess.png";
                                                            else
                                                                if ($ret_desc_cod_letra == "NO")
                                                                    $img_nome = "nobreak.png";
                                                                else
                                                                    if ($ret_desc_cod_letra == "MO")
                                                                        $img_nome = "baterias.png";
                                                                    else
                                                                        if ($ret_desc_cod_letra == "CO")
                                                                            $img_nome = "controlador_wifi.png";
                                                                        else
                                                                $img_nome = "nenhum.png";
                                    echo "  <center>  <p style=color:blue> <b> Tabela Diversos  CTRL_TI : " . $linha['ctrl_ti'] . "    Local ID : " . $linha['id'] . " <br> Referencia :" . $linha['ref'] . "  " . $linha['usuario'] . "  </b> </p> </center> ";
                                        echo "<ul> <li> <P> <a>";
                                        echo "<a href='ret_dadosd.php?id=" . $retID . "'><img src='img/" . $img_nome . "' title='Dispositivo localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_cti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}  &nbsp <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";
                                      
                                        echo "</a>";
                                        echo "</li></P> ";
                                        echo "</ul>";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                //    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                            }
                        }
                    }
                }
               
           // }
            echo "<center> <br> <a href=tabelas_abas2.php?campo=VAZIO&busca=VAZIO&tipo=" . $tpservico . "  > Visualizaçao completa Detalhada </a> </center>  ";
            echo "<center> <br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
            break;
        }  // fim

        default:	
	 {
	  echo "<br><center> Voce nao escolheu nenhuma opcao de busca  <br><br> "; 
	  echo " <a href=busca_diversos.php  >  Voltar </a></center>";
	  }
     echo"</div> </div>";		
  }
}

?>
