<?php

include('conn2.php');
include "bco_fun.php";
//include "../validar_session.php";
//include "../Config/config_sistema.php"; //<a href=nota_ind.php?parametro=" . $id . "> local</a>

$id_loc = $_POST['id_loc'];
$id_sec = $_POST['id_sec'];
$id_tipo = $_POST['id_tipo'];
$id_equip = $_POST['id_equip'];
$campo=$_POST['plaqueta'];
if (($campo <> 'pendente')and($campo <> "")) {



    //$campo = "%" . $_POST['plaqueta'] . "%";
    //echo "checagem de ".$campo."  <br> ";<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  />
    $sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta like ?");
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta = ?");
    $sql->bind_param("s", $campo);
    $sql->execute();
    $sql->bind_result($id, $plaqueta, $local);

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
        $nome_loc = "  Ja cadastrado  em   " . nomedolocal($conn, $local)." ----- ";
        echo " 
                        <tr style='background-color: #FBD603'>            
                            <td>Equipamento  $plaqueta</td>
                            <td>  ----  </td>
                            <td> $nome_loc </td>
                            <td> <a href=editaequip.php?tbequip_id=" . $id . "> Visualizar</a> </td>	                      
                </tr>
                      ";
    }

    echo "
                        </tbody>
                    </table>
          <br>       ";
}
echo "<div>";
echo " <a href=cadequipsdiv.php?pat=".$campo."&loc=".$id_loc."&sec=".$id_sec."&tipo=".$id_tipo. "&ID_PC=" . $id_equip ."  > Cadastrar </a>";
echo "</div>";


?>