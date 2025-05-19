<?php

include "conn2.php";
include "bco_fun.php";
//include "../validar_session.php";
//include "../Config/config_sistema.php"; //<a href=nota_ind.php?parametro=" . $id . "> local</a>

$id_loc = $_POST["id_loc"];
$id_sec = $_POST["id_sec"];
$id_tipo = $_POST["id_tipo"];
$nome_loc = "";
$campo = $_POST["plaqueta"];
if ($campo != "pendente" and $campo != "") {
    //$campo = "%" . $_POST['plaqueta'] . "%";
    //echo "checagem de ".$campo."  <br> ";<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  />
    $sql = $mysqli->prepare(
        "select id,ctrl_ti,tab_cam ,tab_chave from tb_controle_ti  where ctrl_ti like ? "
    );
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta like ?");
    //$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta = ?");
    $sql->bind_param("s", $campo);
    $sql->execute();
    $sql->bind_result($id, $plaqueta, $tab_cam, $pos);

    while ($sql->fetch()) {
        $nome_loc = "Controle ja Utilizado";
        $tp_equip = substr($tab_cam, 0, 1);
        $tbequip_id = substr($tab_cam, 1);
    
        if ($tp_equip == "C") {
            // Equipamentos
            echo "
                <div class='alert alert-warning mb-3' role='alert' style='margin-top: 1em'>
                    <i class='fas fa-exclamation-triangle'></i>
                    <strong>Código de Controle: $plaqueta</strong> já utilizado em Computador!
                    <span class='text-muted'>$tab_cam</span>
                    <a href='editaequip.php?tbequip_id=$tbequip_id' class='text-primary'>Visualizar</a>
                </div>
            ";
        } else if ($tp_equip == "M") {
            // Monitores
            echo "
                <div class='alert alert-warning mb-3' role='alert' style='margin-top: 1em'>
                    <i class='fas fa-exclamation-triangle'></i>
                    <strong>Código de Controle: $plaqueta</strong> já utilizado em Monitor!
                    <br>
                    <span class='text-muted'>$tab_cam</span>
                    <a href='editaequip.php?tbequip_id=$tbequip_id' class='text-primary'>Visualizar</a>
                </div>
            ";
        } else {
            // Diversos
            echo "
                <div class='alert alert-warning mb-3' role='alert' style='margin-top: 1em'>
                    <i class='fas fa-exclamation-triangle'></i>
                    <strong>Código de Controle: $plaqueta</strong> já utilizado em Outro Dispositivo!
                    <br>
                    <span class='text-muted'>$tab_cam</span>
                    <a href='editaequip.php?tbequip_id=$tbequip_id' class='text-primary'>Visualizar</a>
                </div>
            ";
        }
    }
}
if ($nome_loc == "") {
    echo '<h2 class="title pull-left">';
    echo '<a class="btn btn-primary" href="cadequips.php?pat=' . $campo . '&loc=' . $id_loc . '&sec=' . $id_sec . '&tipo=' . $id_tipo . '">Cadastrar</a>';
    echo '</h2>';
} else {
    echo '</h2>';
}
?>
