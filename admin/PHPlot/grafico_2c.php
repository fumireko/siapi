<?php
include "../../Config/config_sistema.php";

function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip ";//WHERE tbequip_sec = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_DivbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos ";//WHERE sec_cod = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_MonbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}




# PHPlot Example:  Flat Pie with options
require_once 'phplot.php';

$data = array(
    array('PCs', ret_Qtd_PcbySec($conn, "22")),
    array('Mon', ret_Qtd_MonbySec($conn, "23")),
    array('Div', ret_Qtd_DivbySec($conn, "24")),
    
);


/*
$data = array(
    array('', 10),
    array('', 20),
    array('', 30),
    array('', 35),
    array('', 5),
); */

$plot = new PHPlot(800, 600);
$plot->SetImageBorderType('plain');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
$plot->SetPlotType('pie');

$colors = array('red', 'green', 'blue');
$plot->SetDataColors($colors);
$plot->SetLegend($colors);
$plot->SetShading(0);
$plot->SetLabelScalePosition(0.2);

$plot->DrawGraph();