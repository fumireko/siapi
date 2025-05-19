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
    echo " <br> <center> Checagem por  " . $tpservico."  ";
    echo "  " . $busca." </center> <br>";
    $campo = $busca;
    if ($tpservico == "Plaqueta") {
        //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
        $sql = "SELECT * FROM tbequip WHERE tbequip_plaqueta LIKE '%" . $campo . "%' order by tbequip_plaqueta"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
        $dados = mysqli_query($conn, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0) {
            $titulo = "\n Resultado da Busca por  \n " . $tpservico . "  Registro Localizado (s) ";
            echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
        } else {
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
    		  echo" <strong>&nbsp&nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
			   do {
                    $retnome = $linha['tbequi_nome'];
                    $retID = $linha['tbequip_id'];
                    $retplaqueta = $linha['tbequip_plaqueta'];
                    $retloc = $linha['tbequi_tbcmei_id'];
				
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
            echo "<center> <br><br> <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a> </center> ";
           echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
		}
    }
        else
    {
        if ($tpservico == "id") {
            $sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_id like ?");
            //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta = ?");
            $sql->bind_param("s", $campo);
            $sql->execute();
            $sql->bind_result($id, $plaqueta, $local);
            echo "<br><br>";
            echo "<br>
                    <table>
                        <thead>
                       <tr>
                        <th></th>
                        <th></th>       
                        <th></th>
                        <th></th>
                       </tr>
                        </thead>
                    <tbody>                
                    ";
            while ($sql->fetch()) {
                $nome_loc = " " . nomedolocal($conn, $local) . " - ";
				$retID = $id;
				//$retnome = $id;
				$retplaqueta = $plaqueta;
                          echo "<ul> <li> <P> <a>";
                           // echo "<h3>  <a href='editaequip.php?tbequip_id='{$retID} '> *  </a>  &nbsp&nbsp   - {$retnome} &nbsp  <br /> </h3>";
                            echo "<a href=ret_dados.php?id=" . $retID . "  > Ver </a> &nbsp&nbsp   - {$retID} &nbsp&nbsp&nbsp   - {$nome_loc} &nbsp &nbsp&nbsp   - {$retplaqueta} &nbsp  <br /> ";
							//   echo "</center> ";
                            echo "</a>";
                            echo "</li></P> ";
                            echo "</ul>";
                                      
	/*		   echo " 
                        <tr style='background-color: #FBD603'>            
                            <td>Equipamento  $plaqueta</td>
                            <td>  ----  </td>
                            <td> $nome_loc </td>
                            <td> <a href=ret_dados.php?id=" . $id . "> Visualizar</a> </td>	                      
                </tr>
                      ";
       /*/     }

            echo "
                        </tbody>
                    </table>
          <br>       ";

            echo "<div>";
            //  echo "Nenhum equipamento localizado <br>";
            echo " <center><a href=corretor_manual2.php?pat=" . $campo . "&loc=" . $local . "  > Voltar </a> </center>";
            echo "</div>";

        } else {
            if ($tpservico == "Nome") {
                //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequi_nome like ?");
                $sql = "SELECT * FROM tbequip WHERE tbequi_nome LIKE '%" . $campo . "%' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                $linha = mysqli_fetch_assoc($dados);
                $total = mysqli_num_rows($dados);
                if ($total == 0) {
                    $titulo = "\n Resultado da Busca por  \n " . $tpservico . "  Registro Localizado (s) ";
                    echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                } else {
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
            }
            echo " <a href=corretor_manual2.php?pat=" . $campo . "  > Voltar </a>";
        }
    }
}
       else
        {
            echo "<br> Voce nao escolheu nenhuma opcao de busca  <br><br> "; 
            echo " <a href=corretor_manual2.php  >  Voltar </a>";
        }

echo"</div> </div>";

?>



