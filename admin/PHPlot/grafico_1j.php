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
        $sql = "SELECT * FROM tbequip where status='1' ";//WHERE tbequip_sec = '" . $Fref . "'";
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

/*
function ret_Qtd_Monby0($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tb_monitores where id_equip=0 and status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}
*/
function ret_Qtd_Monby1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 1";
        //$sql = "SELECT * FROM tb_monitores where id_equip=0 and status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_Monby2($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 2";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_Monby0($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
       // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_monitores where id_equip=0 and status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Tot_Mon($Fconexao) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        // $sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 0";
        $sql = "SELECT * FROM tb_monitores where  status='1' ";//WHERE sec_id = '" . $Fref . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}



# PHPlot Example: Pie/text-data-single
require_once 'phplot.php';

# The data labels aren't used directly by PHPlot. They are here for our
# reference, and we copy them to the legend below.

$data = array(
    array('Sem Pcs', ret_Qtd_Monby0($conn, "22")),
    array('Unico no Pc', ret_Qtd_Monby1($conn, "23")),
    array('Duplo no Pc', ret_Qtd_Monby2($conn, "23")), 
    
    
);

$plot = new PHPlot(800,700);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
$plot->SetDataColors(array('red', 'green', 'blue'));

//$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
  //                    'magenta', 'brown', 'lavender', 'pink',
    //                'gray', 'orange','SlateBlue','salmon','violet'));
 //'salmon', 'SlateBlue', 'YellowGreen', 'magenta', 'aquamarine1', 'gold', 'violet'


# Main plot title:
$plot->SetTitle("Todos os Monitores da base   ".ret_Tot_Mon($conn));

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();



