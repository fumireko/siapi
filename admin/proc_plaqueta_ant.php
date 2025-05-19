<?php

include('conn2.php');
include "bco_fun.php";
//include "../validar_session.php";
//include "../Config/config_sistema.php"; //<a href=nota_ind.php?parametro=" . $id . "> local</a>

$id_loc = $_POST['id_loc'];
$id_sec = $_POST['id_sec'];
$id_tipo = $_POST['id_tipo'];
$nome_loc = "";
$campo=$_POST['plaqueta'];
if (($campo <> 'pendente')and($campo <> "")) {



    //$campo = "%" . $_POST['plaqueta'] . "%";
    //echo "checagem de ".$campo."  <br> ";<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  />
    $sql = $mysqli->prepare("select id,ctrl_ti,tab_cam ,tab_chave from tb_controle_ti  where ctrl_ti like ? ");
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta like ?");
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta = ?");
    $sql->bind_param("s", $campo);
    $sql->execute();
    $sql->bind_result($id, $plaqueta, $tab_cam,$pos);
    
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
        $nome_loc = "  Controle ja Utilizado  " ;  //. nomedolocal($conn, $local)." ----- ";
        $tp_equip = substr($tab_cam, 0, 1);
        $tbequip_id = substr($tab_cam, 1);
        if ($tp_equip == "C") // equipamentos
        {
            echo " 
                        <tr style='background-color: #FBD603'>            
                            <td> &nbsp Codigo de Controle   $plaqueta</td>
                            <td> &nbsp Ja utilizado em Computador ! &nbsp  </td>
                            <td> &nbsp  $tab_cam  &nbsp</td>
                            <td> <a href=editaequip.php?tbequip_id=" . $pos . "> Visualizar</a> </td>	                      
                </tr>
                      ";
        }
        else{
            if ($tp_equip == "M") // monitores
            {
                echo " 
                        <tr style='background-color: #FBD603'>            
                            <td> &nbsp Codigo de Controle   $plaqueta</td>
                            <td> &nbsp Ja utilizado em Monitor ! &nbsp  </td>
                            <td> &nbsp  $tab_cam  &nbsp</td>
                            <td> <a href=editaequip.php?tbequip_id=" . $tbequip_id . "> Visualizar</a> </td>	                      
                </tr>
                      ";



            }
            else  // diversos
            {
                echo " 
                        <tr style='background-color: #FBD603'>            
                            <td> &nbsp Codigo de Controle   $plaqueta</td>
                            <td> &nbsp Ja utilizado em Outro Dispositivo ! &nbsp  </td>
                            <td> &nbsp  $tab_cam  &nbsp</td>
                            <td> <a href=editaequip.php?tbequip_id=" . $tbequip_id . "> Visualizar</a> </td>	                      
                </tr>
                      ";
            
            }

        }
    
    
    }
    echo "
                        </tbody>
                    </table>
          <br>       ";
}
echo "<div>";
//echo $nome_loc;
if ($nome_loc == "")
{
    echo " <a href=cadequips.php?pat=" . $campo . "&loc=" . $id_loc . "&sec=" . $id_sec . "&tipo=" . $id_tipo . "  > Cadastrar </a>";
    echo "</div>";
}
else{
    echo "</div>";
}
?>