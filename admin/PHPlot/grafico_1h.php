<?php
include "../../Config/config_sistema.php";



function ret_Qtd_Pcby0mon($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        //SELECT `tbcmei_id`,`tbcmei_nome`, COUNT(`tbcmei_nome`) FROM tbcmei GROUP BY `tbcmei_nome` HAVING COUNT(`tbcmei_nome`) > 1;
        //$sql = " SELECT `id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 1";
        $sql = " SELECT * FROM tb_monitores where id_equip = 0 and status=1";
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

# This global string accumulates the image map AREA tags.
$image_map = "";

# Data for bar chart:
$data = array(
    array('0 Dispositivos', ret_Qtd_Pcby0Mon($conn, "22"))
);

# Callback for 'data_points': Generate 1 <area> line in the image map:
function store_map($im, $passthru, $shape, $row, $col, $x1, $y1, $x2, $y2)
{
    global $image_map;

    # Title, also tool-tip text:
    $title = "Group $row, Bar $col";
    # Required alt-text:
    $alt = "Region for group $row, bar $col";
    # Link URL, for demonstration only:
    $href = "javascript:alert('($row, $col)')";
    # Convert coordinates to integers:
    $coords = sprintf("%d,%d,%d,%d", $x1, $y1, $x2, $y2);
    # Append the record for this data point shape to the image map string:
    $image_map .= "  <area shape=\"rect\" coords=\"$coords\""
               .  " title=\"$title\" alt=\"$alt\" href=\"$href\">\n";
}

# Create and configure the PHPlot object.
$plot = new PHPlot(340, 200);
# Disable error images, since this script produces HTML:
$plot->SetFailureImage(False);
# Disable automatic output of the image by DrawGraph():
$plot->SetPrintImage(False);
# Set up the rest of the plot:
$plot->SetTitle("");
$plot->SetImageBorderType('plain');
$plot->SetDataValues($data);
$plot->SetDataType('text-data');
$plot->SetPlotType('bars');
$plot->SetXTickPos('none');
# Set the data_points callback which will generate the image map.
$plot->SetCallback('data_points', 'store_map');
$plot->SetPlotAreaWorld(NULL, 0, NULL, 100);
# Produce the graph; this also creates the image map via callback:
$plot->DrawGraph();

# Now output the HTML page, with image map and embedded image:
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Dispositivos</title>

<style>

    table {
        border-collapse: collapse;
        border: 2px solid rgb(140 140 140);
        font-family: sans-serif;
        font-size: 0.8rem;
        letter-spacing: 1px;
    }

    caption {
        caption-side: bottom;
        padding: 10px;
        font-weight: bold;
    }

    thead,
    tfoot {
        background-color: rgb(228 240 245);
    }

    th,
    td {
        border: 1px solid rgb(160 160 160);
        padding: 8px 10px;
    }

        td:last-of-type {
            text-align: center;
        }

    tbody > tr:nth-of-type(even) {
        background-color: rgb(237 238 242);
    }

    tfoot th {
        text-align: right;
    }

    tfoot td {
        font-weight: bold;
    }



</style>



</head>
<body>
<h1>Sem Dispositivos </h1>
<map name="map1">
<?php echo $image_map; ?>
</map>

<img src="<?php echo $plot->EncodeImage();?>" alt="Plot Image" usemap="#map1">
     <br /> <br />

<table>
  <caption>
  
  </caption>
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Monitor</th>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td><?php echo ret_Qtd_Pcby0Mon($conn, "22"); ?> </td>
    </tr>
   


  </tbody>
  <tfoot>
    <tr>
      <th scope="row" colspan="2"></th>
   
        <td></td>
    </tr>
  </tfoot>
</table>


<a href="../tabelas_abas0.php?campo=VAZIO&busca=VAZIO&tipo=mon_monitor">Visualizar Equipamentos </a><br /> <br />



</body>

</html>
