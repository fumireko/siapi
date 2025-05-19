<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php
//include "../validar_session.php";
//include "../Config/config_sistema.php";
include "bco_fun.php";
$codigo = $_GET['sec'];
$campo = $codigo;

				echo "<b> ".nomedesecretaria($conn,$campo)."</b>";				 
				 $sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $campo . "'  group by tbequi_tbcmei_id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
					$dados = mysqli_query($conn, $sql) or die(mysqli_error());
					$linha = mysqli_fetch_assoc($dados);
					$total = mysqli_num_rows($dados);
					if ($total == 0) {
						$titulo = "\n  " . $total . "  Registro de Computadores Localizado (s) ";
						echo " <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p> ";
					} else 
					{
						//echo "<br><center>Computadores  ( ".$total." )  </center> <br>";    
					
					if ($total > 0) {
						         
						   do {

								//   $linha = mysqli_fetch_assoc($dados);
								   $retloc = $linha['tbequi_tbcmei_id'];
                                   $retresp = $linha['tbequip_resp'];
									$nome_resp = nomedoresponsavel($conn, $retloc);
								   //echo $retloc."  ";
                               
									 $sql1 = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $campo . "' and tbequi_tbcmei_id ='".$retloc."'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
									$dados1 = mysqli_query($conn, $sql1) or die(mysqli_error());
								 	 $linha1 = mysqli_fetch_assoc($dados1);
									$total1 = mysqli_num_rows($dados1);
										if ($total1 == 0) {
											$titulo = "\n  " . $total1 . "  Registro de Computadores Localizado (s)";
											echo " <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p> ";
										} else
                                          {
											//	$retloc = $linha['tbequi_tbcmei_id'];
												$nome_local = nomedolocal($conn, $retloc);
                                                echo "<ul> <li> <b> ($campo) / $retloc / $nome_local    </b>  <img src='img/seta.png' title=' ( " . str_replace('   ', '*', $nome_resp) . " )' height='15' width='15' >   <P> <a> </a> </li></P> </ul>  ";
									
										    	if ($total1 > 0) {
											  		 do {
																//$linha1 = mysqli_fetch_assoc($dados1);
																$ret_ctrl_ti = $linha1['ctrl_ti'];
																$retnome = $linha1['tbequi_nome'];
																$retID = $linha1['tbequip_id'];
																$retplaqueta = $linha1['tbequip_plaqueta'];
																$retloc = $linha1['tbequi_tbcmei_id'];
																 $retutil = $linha1['tbequip_util_nomes'];
																$nome_local = nomedolocal($conn, $retloc);
																echo "<ul> <li> <P> <a>";
																echo "<a href='ret_dados.php?id=" . $ret_ctrl_ti . "'><img src='img/tp1.png' title=' ( " . $retutil . " )' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_ti} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp   ";
																echo "</a>";
																echo "</li></P> ";
																echo "</ul>";

														} while ($linha1 = mysqli_fetch_assoc($dados1));

											}
										}

                           
                           } while ($linha = mysqli_fetch_assoc($dados));
						}
							//    echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
							 //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
					}
						// consulta em outra tabela // monitores 
								//$sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $campo . "'  group by tbequi_tbcmei_id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";		
								$sqlm = "SELECT * FROM tb_monitores WHERE sec_id = '" . $campo . "' group by local_id"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
								$linham = mysqli_fetch_assoc($dadosm);
								$totalm = mysqli_num_rows($dadosm);
								if ($totalm == 0) {
									$titulo = "\n " . $totalm . "  Registro de Monitores Localizado (s) ";
									echo "<p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p>  ";
								} else 
								{
                                     // $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                        echo "<br><br><center>Monitores ( ".$totalm." )   </center> <br> "; 
								      // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
										//$nome_local = nomedolocal($conn, $retloc);
										//echo "<ul> <li> <b> ($campo) / $retloc / $nome_local    </b>  <img src='img/seta.png' title=' ( " . str_replace('   ', '*', $nome_resp) . " )' height='15' width='15' >   <P> <a> </a> </li></P> </ul>  ";
									if ($totalm > 0) {
								         do {
												//   $linha = mysqli_fetch_assoc($dados);
											   $retloc = $linham['local_id'];
												//    $retresp = $linha['tbequip_resp'];
												$nome_resp = nomedoresponsavel($conn, $retloc);
											   //echo $retloc."  ";
                               
												 $sqlm1 = "SELECT * FROM tb_monitores WHERE sec_id = '" . $campo . "' and local_id ='".$retloc."'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
											   	 $dadosm1 = mysqli_query($conn, $sqlm1) or die(mysqli_error());
								 				 $linham1 = mysqli_fetch_assoc($dadosm1);
												 $totalm1 = mysqli_num_rows($dadosm1);
													if ($totalm1 == 0) {
														$titulo = "\n  " . $totalm1 . "  Registro Localizado (s) em Computadores ";
														echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
													} else
													  {
														//	$retloc = $linha['tbequi_tbcmei_id'];
															$nome_local = nomedolocal($conn, $retloc);
															echo "<ul> <li> <b> ($campo) / $retloc / $nome_local    </b>  <img src='img/seta.png' title=' ( " . str_replace('   ', '*', $nome_resp) . " )' height='15' width='15' >   <P> <a> </a> </li></P> </ul>  ";
										    			if ($totalm1 > 0) {
											  					 do {
																	//  $linham = mysqli_fetch_assoc($dadosm);
																		$ret_ctrl_tim = $linham1['ctrl_ti'];
																		$retnome = $linham1['mon_marca'] . "  " . $linham1['mon_tam'] . " Pol " . $linham1['mon_tipo'];
																		$retID = $linham1['id'];
																		$retplaqueta = $linham1['mon_plaqueta'];
																		$retloc = $linham1['local_id'];
																		$nome_local = nomedolocal($conn, $retloc);
																		$pc_id = $linham1['id_equip'];
																		$codificacao = "C" . $linham1['ctrl_ti'] . "- M" . $linham1['id'] . "- L" . $linham1['local_id'] . "-E" . $linham1['id_equip'];
																		echo "<ul> <li> <b>  </b> <P> <a>";
																		echo "<a href='ret_dadosm.php?id=" . $ret_ctrl_tim . "'><img src='img/tp2.png' title='Monitor localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  CTI :  {$ret_ctrl_tim} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta}";
																		echo "</a>";
																		echo "</li></P> ";
																		echo "</ul>";
														   							
																	} while ($linham1 = mysqli_fetch_assoc($dadosm1));
															}
													}
											 } while ($linham = mysqli_fetch_assoc($dadosm));
									}
								}
							    
								// fim de consulta em tabela
							       // consulta em outra tabela // diversos 
								$sqld = "SELECT * FROM tb_diversos WHERE sec_cod ='" . $campo . "' group by local_cod "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
								$dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
								$linhad = mysqli_fetch_assoc($dadosd);
								$totald = mysqli_num_rows($dadosd);
								if ($totald == 0) {
									$titulo = "\n " . $totald . "  Registro de Diversos Localizado (s) ";
									echo "<p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p>";
								} else 
								{
									//echo "<center>Diversos</center>"; 
										//	$titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
										// echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
									if ($totald > 0) {
									   do {
											$retnome = $linhad['descricao'] . "  " . $linhad['marca'] . "  ";
											$retID = $linhad['id'];
											$retplaqueta = $linhad['patrimonio'];
											$retloc = $linhad['local_cod'];
										//	echo $retloc; 
										   $sqld1 = "SELECT * FROM tb_diversos WHERE sec_cod = '" . $campo . "' and local_cod ='" . $retloc . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
											$dadosd1 = mysqli_query($conn, $sqld1) or die(mysqli_error());
											$linhad1 = mysqli_fetch_assoc($dadosd1);
											$totald1 = mysqli_num_rows($dadosd1);
											if ($totald1 == 0) {
												$titulo = "\n  " . $totald1 . "  Registro Localizado (s) em Computadores ";
												echo "<p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p> ";
											} else {
												//	$retloc = $linha['tbequi_tbcmei_id'];
												$nome_local = nomedolocal($conn, $retloc);
												echo "<ul> <li> <b> ($campo) / $retloc / $nome_local    </b>  <img src='img/seta.png' title=' ( " . str_replace('   ', '*', $nome_resp) . " )' height='15' width='15' >   <P> <a> </a> </li></P> </ul>  ";
												if ($totald1 > 0) {
													do {
														//  $linham = mysqli_fetch_assoc($dadosm);
														$retnome = $linhad1['descricao'] . "  " . $linhad1['marca'] . "  ";
														$retID = $linhad1['id'];
														$retplaqueta = $linhad1['patrimonio'];
														$retloc = $linhad1['local_cod'];
														$nome_local = nomedolocal($conn, $retloc);
														$codificacao = "C" . $linhad1['ctrl_ti'] . "- D" . $linhad1['id'] . "- L" . $linhad1['local_cod'] . "- S" . $linhad1['sec_cod'];
														echo "<ul> <li>  <P> <a>";
														echo "<a href='ret_dadosd.php?id=" . $retID . "'><img src='img/tp3.png' title='Dispositivo localizado em " . nomedolocal($conn, $retloc) . "' height='25' width='25' ></a>&nbsp&nbsp   -  Id :  {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - Patrimonio : {$retplaqueta} &nbsp   ";
														echo "</a>";
														echo "</li></P> ";
														echo "</ul>";


													} while ($linhad1 = mysqli_fetch_assoc($dadosd1));
												}
											}
            							} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								}
							     // fim de consulta em tabela
							   echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
                                echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Visualizar Tabelas </a> </center> ";

?>

</body>
</html>