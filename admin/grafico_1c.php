<?php
include "../../Config/config_sistema.php";

function ret_Qtd_MonbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

//include "../bco_fun.php";
# PHPlot Example: Bar chart, with data labels
require_once 'phplot.php';
/*
$data = array(
    array('China', 1306.31),
    array('India', 1080.26),
    array('United States', 295.73),
    array('Indonesia', 241.97),
    array('Brazil', 186.11),
    array('Pakistan', 162.42),
    array('Bangladesh', 144.32),
    array('Russia', 143.42),
);
 // $ret_val = ret_Qtd_MonbySec($conn, $Fref)
*/

$data = array(
    array('GAB.', ret_Qtd_MonbySec($conn, "22")),
    array('VICE', ret_Qtd_MonbySec($conn, "23")),
    array('PROC.', ret_Qtd_MonbySec($conn, "24")),
    array('CONTR.', ret_Qtd_MonbySec($conn, "25")),
    array('OUV.', ret_Qtd_MonbySec($conn, "26")),
    array('SEMAD', ret_Qtd_MonbySec($conn, "29")),
    array('SEMAA', ret_Qtd_MonbySec($conn, "39")),
    array('SEMAS', ret_Qtd_MonbySec($conn, "37")),
    array('SECOM', ret_Qtd_MonbySec($conn, "28")),
    array('SEDUH', ret_Qtd_MonbySec($conn, "34")),
    array('SMECLJ', ret_Qtd_MonbySec($conn, "42")),
    array('SEMED', ret_Qtd_MonbySec($conn, "35")),
    array('SEFAZ', ret_Qtd_MonbySec($conn, "32")),
    array('SEGOV', ret_Qtd_MonbySec($conn, "30")),
    array('SEICTT', ret_Qtd_MonbySec($conn, "41")),
    array('SEMMA', ret_Qtd_MonbySec($conn, "40")),
    array('SEMOV', ret_Qtd_MonbySec($conn, "38")),
    array('SEPLAN', ret_Qtd_MonbySec($conn, "31")),
    array('SESA', ret_Qtd_MonbySec($conn, "36")),
    array('SMTI', ret_Qtd_MonbySec($conn, "33")),
);



$plot = new PHPlot(800, 300);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
$plot->SetTitle("Monitores por Secretarias");

# Turn off X tick labels and ticks because they don't apply here:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

# Make sure Y=0 is displayed:
$plot->SetPlotAreaWorld(NULL, 0);
# Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
$plot->SetYTickIncrement(100);

# Turn on Y data labels:
$plot->SetYDataLabelPos('plotin');

# With Y data labels, we don't need Y ticks or their labels, so turn them off.
$plot->SetYTickLabelPos('none');
$plot->SetYTickPos('none');

# Format the Y Data Labels as numbers with 1 decimal place.
# Note that this automatically calls SetYLabelType('data').
$plot->SetPrecisionY(1);

$plot->DrawGraph();
