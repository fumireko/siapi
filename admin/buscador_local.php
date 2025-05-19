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
width: 650px;
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
echo "<br> <center> <p style=color:blue> <b> Checagem por  " . $tpservico." </b>   ";   
       echo "  " . $busca."   </p></center> <br>";
    $campo = $busca;
    if ($tpservico == "Local") {
        //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
        $sql = "SELECT * FROM  order by tbcmei_nome"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n  " . $total . "  Registro Localizado (s) em Computadores ";
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else 
		{
            echo "<center>Computadores </center><br>";    
			$retnome = $linha['tbcmei_nome'];
            $retID = $linha['tbcmei_id'];
            //$retplaqueta = $linha['tbequip_plaqueta'];
            //$retloc = $linha['tbequi_tbcmei_id'];
            // $retstatus = $linha['Al_01status'];

            //	  $total = mysqli_num_rows($dados);
            //  echo $total;
            $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
           // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
            if ($total > 0) {
    		  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID     </strong>";               
			  do {
                $row = mysqli_fetch_assoc($resultado1);
                $nome_local = $row['tbcmei_nome'];
                $ret_sec_id = $row['tbcmei_sec_id'];
                $unidade = $nome_local;
                "<input  type='hidden'  id='nome_loc'  name='nome_loc' type='text' value='" . $nome_local . "' size = '60' >";
                "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
                "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
            
			  
			  
                             $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                          }
                          ?>
                              <!--     <select name="sec_id" required>          
                            <?php
                                  echo "<option value='0'>  </option>";
                                  echo $option;
							} while ($row = mysqli_fetch_assoc($resultado1));            
			?>        
                           </select> 
                                                                                             -->
                          <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                          <br />				


				<?              
 				       <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                                <option value=""></option>
                                                <option value=  "Desktop"selected>Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                                <option value="Outros">Outros</option>
                                     </select>
				<?php
                    echo "<ul> <li> <P> <a>";
                   echo "<a href=ret_dados.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
				  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
					//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
                    //echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
				//	echo "</center> ";
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
								
								echo "<ul> <li> <P> <a>";
							   echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
							  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
								//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
								//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
							//	echo "</center> ";
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
								
								echo "<ul> <li> <P> <a>";
							   echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
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
				   echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
	}
     else
    {
        if ($tpservico == "id")
		{
						// consulta em tAbela // EQUIP 
						$sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $campo . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
						$dados = mysqli_query($conn, $sql) or die(mysqli_error());
						$linha = mysqli_fetch_assoc($dados);
						$total = mysqli_num_rows($dados);
						if ($total == 0) {
							$titulo = " " . $total . "  Registro Localizado (s) em  Computadores  ";
							echo "<center> <p>  <b>" . nl2br($titulo) . " </b>  </p></center> ";
						} else 
						{
							echo "<center>Monitores</center>"; 
							$retnome = $linha['tbequi_nome'];
							$retID = $linha['tbequip_id'];
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
						
									echo "<ul> <li> <P> <a>";
								   echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
								  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
								//	echo "</center> ";
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
							echo "<center>Monitores</center>"; 
							$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
							$retID = $linham['id'];
							$retplaqueta = $linham['mon_plaqueta'];
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
									
									echo "<ul> <li> <P> <a>";
								   echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
								  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
								//	echo "</center> ";
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
									
									echo "<ul> <li> <P> <a>";
								   echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
								  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
									//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
								//	echo "</center> ";
									echo "</a>";
									echo "</li></P> ";
									echo "</ul>";
								} while ($linhad = mysqli_fetch_assoc($dadosd));
							}
						}
							  // fim de consulta em tabela
							     echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
        }
		else
		{
            if ($tpservico == "Nome")
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
						$retplaqueta = $linha['tbequip_plaqueta'];
						$retloc = $linha['tbequi_tbcmei_id'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n Resultado da Busca  por  " . $tpservico . " Registro Localizado (s) na busca por " . $busca . "  ";
						echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($total > 0) {
							   echo "<strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";
							do {
								$retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$retloc = $linha['tbequi_tbcmei_id'];

								echo "<ul> <li> <P> <a>";
							   // echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";
								echo "<a href=ret_dados.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";
								//   echo "</center> ";
								echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linha = mysqli_fetch_assoc($dados));
						}
						
				    }
				 
							//	echo " <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a>";
	 
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
									echo "<center>Monitores</center>"; 
									$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
									$retID = $linham['id'];
									$retplaqueta = $linham['mon_plaqueta'];
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
											
											echo "<ul> <li> <P> <a>";
										   echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
										  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
										//	echo "</center> ";
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
											
											echo "<ul> <li> <P> <a>";
										   echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
										  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
										//	echo "</center> ";
											echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								 
								  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								}
				
						// fim de consulta em tabela
               echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
			}
			else
			{
			   if ($tpservico == "Local")
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
						$retplaqueta = $linha['tbequip_plaqueta'];
						$retloc = $linha['tbequi_tbcmei_id'];
						// $retstatus = $linha['Al_01status'];

						//	  $total = mysqli_num_rows($dados);
						//  echo $total;
						$titulo = "\n Resultado da Busca  por  " . $tpservico . " Registro Localizado (s) na busca por " . $busca . "  ";
						//echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
						if ($total > 0) {
							   echo "<strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    </strong>";
							do {
								$retnome = $linha['tbequi_nome'];
								$retID = $linha['tbequip_id'];
								$retplaqueta = $linha['tbequip_plaqueta'];
								$retloc = $linha['tbequi_tbcmei_id'];

								echo "<ul> <li> <P> <a>";
							   // echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";
								echo "<a href=ret_dados.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   -Patrimonio : {$retplaqueta} &nbsp  <br /> ";
								//   echo "</center> ";
								echo "</a>";
								echo "</li></P> ";
								echo "</ul>";
							} while ($linha = mysqli_fetch_assoc($dados));
						}
						
				    }
				 
							//	echo " <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a>";
	 
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
									echo "<center>Monitores</center>"; 
									$retnome = $linham['mon_marca']."  ".$linham['mon_tam']." Pol ".$linham['mon_tipo'] ;
									$retID = $linham['id'];
									$retplaqueta = $linham['mon_plaqueta'];
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
											
											echo "<ul> <li> <P> <a>";
										   echo "<a href=ret_dadosm.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
										  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
										//	echo "</center> ";
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
											
											echo "<ul> <li> <P> <a>";
										   echo "<a href=ret_dadosd.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$retnome} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";				  
										  //echo "<h3>  <a href='ret_dados.php?id='{$retID} '> *  </a>  &nbsp&nbsp   id {$retnome}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='ret_dados.php?id=".$retID."> *  </a>  &nbsp&nbsp   id {$retID}  &nbsp&nbsp  - {$retplaqueta} &nbsp  <br /> </h3>";
											//echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";                    
										//	echo "</center> ";
											echo "</a>";
											echo "</li></P> ";
											echo "</ul>";
										} while ($linhad = mysqli_fetch_assoc($dadosd));
									}
								 
								  // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
								}
				
						// fim de consulta em tabela
               echo "<center> <br><br> <a href=busca_diversos.php?pat=" . $campo . "  > Voltar </a> </center> ";
			}
			
			
	  		   else
			   {
				echo "<br><center> Voce nao escolheu nenhuma opcao de busca  <br><br> "; 
				echo " <a href=busca_diversos.php  >  Voltar </a></center>";
			   }
			}
        }
    }
  }
echo"</div> </div>";

?>



