<?php
include "../../Config/config_sistema.php";

function ret_Qtd_des($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%des%' and status='1'" ;
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_not($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%not%' and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}


function ret_Qtd_tab($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%tab%'and status='1' ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_cel($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequi_tipo like '%cel%' and status='1'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_div($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_diversos WHERE descricao_cod = '".$Fref."' and status='1' "; // 
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_controle_ti  where tab_origem=1 and status='1' ";//WHERE tbequip_sec = '" . $Fref . "'";
      //  $sql = "SELECT * FROM tbequip where status='1' ";//WHERE tbequip_sec = '" . $Fref . "'";
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
        $sql = "SELECT * FROM tb_diversos where status='1' ";//WHERE sec_cod = '" . $Fref . "'";
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
        $sql = "SELECT * FROM tb_monitores where status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_CTRL_TI($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_controle_ti where status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total <> 0)
            return $total;
        else
            return 0;
    }
}




# PHPlot Example: Pie/text-data-single
require_once 'phplot.php';

# The data labels aren't used directly by PHPlot. They are here for our
# reference, and we copy them to the legend below.

$data = array(
    array('Desktop', ret_Qtd_des($conn, "22")),
    array('Notebook', ret_Qtd_not($conn, "23")),
    array('Tablet', ret_Qtd_tab($conn, "23")), 
    array('Celular', ret_Qtd_cel($conn, "23")),
    array('Monitores', ret_Qtd_MonbySec($conn, "23")),
    array('Patch Panel', ret_Qtd_div($conn, "1")),
    array('Rack', ret_Qtd_div($conn, "2")),
    array('Switch', ret_Qtd_div($conn, "3")),
    array('TV', ret_Qtd_div($conn, "4")),
    array('Impressora', ret_Qtd_div($conn, "5")),
    array('Acess Point', ret_Qtd_div($conn, "6")),
    array('No-Break', ret_Qtd_div($conn, "7")),
    array('Modulo Bateria', ret_Qtd_div($conn, "8")),
    array('Controlador WiFi', ret_Qtd_div($conn, "9")),
    
);

$plot = new PHPlot(800,700);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
//$plot->SetDataColors(array('red', 'green', 'blue','yellow','#C9C1CB','#A58BCB'));

$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
                      'magenta', 'brown', 'lavender', 'pink',
                    'gray', 'orange','SlateBlue','salmon','violet'));
 //'salmon', 'SlateBlue', 'YellowGreen', 'magenta', 'aquamarine1', 'gold', 'violet'


# Main plot title:
$plot->SetTitle("Todos Dispositivos Instalados  ". ret_Qtd_CTRL_TI($conn, "1"));

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();



