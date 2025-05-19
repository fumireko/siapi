<?php
include "../../Config/config_sistema.php";

function ret_Qtd_PcbySec($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * FROM tbequip WHERE tbequip_sec = '" . $Fref . "' and status='1'";
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
        $sql = "SELECT * FROM tb_diversos WHERE sec_cod = '" . $Fref . "' and status='1' ";
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
        $sql = "SELECT * FROM tb_monitores WHERE sec_id = '" . $Fref . "' and status='1' ";
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
    array('GAB.', ret_Qtd_PcbySec($conn, "22"), ret_Qtd_MonbySec($conn, "22"), ret_Qtd_DivbySec($conn, "22")),
    array('VICE' ,ret_Qtd_PcbySec($conn, "23"), ret_Qtd_MonbySec($conn, "23"), ret_Qtd_DivbySec($conn, "23")),
    array('PROC.',ret_Qtd_PcbySec($conn, "24"), ret_Qtd_MonbySec($conn, "24"), ret_Qtd_DivbySec($conn, "24")),
    array('CONTR.',ret_Qtd_PcbySec($conn, "25"), ret_Qtd_MonbySec($conn, "25"), ret_Qtd_DivbySec($conn, "25")),
    array('OUV.',ret_Qtd_PcbySec($conn, "26"), ret_Qtd_MonbySec($conn, "26"), ret_Qtd_DivbySec($conn, "26")),
    array('SEMAD',ret_Qtd_PcbySec($conn, "29"), ret_Qtd_MonbySec($conn, "29"), ret_Qtd_DivbySec($conn, "29")),
    array('SEMAA',ret_Qtd_PcbySec($conn, "39"), ret_Qtd_MonbySec($conn, "39"), ret_Qtd_DivbySec($conn, "39")),
    array('SEMAS',ret_Qtd_PcbySec($conn, "37"), ret_Qtd_MonbySec($conn, "37"), ret_Qtd_DivbySec($conn, "37")),
    array('SECOM',ret_Qtd_PcbySec($conn, "28"), ret_Qtd_MonbySec($conn, "28"), ret_Qtd_DivbySec($conn, "28")),
    array('SEDUH',ret_Qtd_PcbySec($conn, "34"), ret_Qtd_MonbySec($conn, "34"), ret_Qtd_DivbySec($conn, "34")),
    array('SMECLJ',ret_Qtd_PcbySec($conn, "42"), ret_Qtd_MonbySec($conn, "42"), ret_Qtd_DivbySec($conn, "42")),
    array('SEMED',ret_Qtd_PcbySec($conn, "35"), ret_Qtd_MonbySec($conn, "35"), ret_Qtd_DivbySec($conn, "35")),
    array('SEFAZ',ret_Qtd_PcbySec($conn, "32"), ret_Qtd_MonbySec($conn, "32"), ret_Qtd_DivbySec($conn, "32")),
    array('SEGOV',ret_Qtd_PcbySec($conn, "30"), ret_Qtd_MonbySec($conn, "30"), ret_Qtd_DivbySec($conn, "30")),
    array('SEICTT',ret_Qtd_PcbySec($conn, "41"), ret_Qtd_MonbySec($conn, "41"), ret_Qtd_DivbySec($conn, "41")),
    array('SEMMA',ret_Qtd_PcbySec($conn, "40"), ret_Qtd_MonbySec($conn, "40"), ret_Qtd_DivbySec($conn, "40")),
    array('SEMOV',ret_Qtd_PcbySec($conn, "38"), ret_Qtd_MonbySec($conn, "38"), ret_Qtd_DivbySec($conn, "38")),
    array('SEPLAN',ret_Qtd_PcbySec($conn, "31"), ret_Qtd_MonbySec($conn, "31"), ret_Qtd_DivbySec($conn, "31")),
    array('SESA',ret_Qtd_PcbySec($conn, "36"), ret_Qtd_MonbySec($conn, "36"), ret_Qtd_DivbySec($conn, "36")),
    array('SMTI',ret_Qtd_PcbySec($conn, "33"), ret_Qtd_MonbySec($conn, "33"), ret_Qtd_DivbySec($conn, "33")),
);




/*
    array('1950', 40, 95, 20),
    array('1960', 45, 85, 30),
    array('1970', 50, 80, 40),
    array('1980', 48, 77, 50),
    array('1990', 38, 72, 60),
    array('2000', 35, 68, 70),
    array('2010', 30, 67, 80),
);
*/
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
$plot = new PHPlot(740, 300);
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
<h1>Dispositivos Cadastrados por Secretaria</h1>
<map name="map1">
<?php echo $image_map; ?>
</map>

<img src="<?php echo $plot->EncodeImage();?>" alt="Plot Image" usemap="#map1">
     <br /> <br />
<label style="color:cornflowerblue" >  Computadores </label> &nbsp  &nbsp   &nbsp  &nbsp   &nbsp  &nbsp  
<label  style="color:greenyellow" > Monitores </label>   &nbsp  &nbsp &nbsp  &nbsp   &nbsp  &nbsp  
     <label style="color:orange" > Diversos </label>     <br /> <br />

<table>
  <caption>
  
  </caption>
  <thead>
    <tr>
      <th scope="col">Secretaria</th>
      <th scope="col">Computadores</th>
      <th scope="col">Monitores</th>
      <th scope="col">Diversos</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">GAB</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "22"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "22"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "22"); ?> </td>
    </tr>
   <tr>
      <th scope="row">Vice</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "23"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "23"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "23"); ?> </td>
    </tr>
   <tr>
      <th scope="row">Proc.</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "24"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "24"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "24"); ?> </td>
    </tr>
   <tr>
      <th scope="row">Contr.</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "25"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "25"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "25"); ?> </td>
    </tr>
   <tr>
      <th scope="row">Ouv.</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "26"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "26"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "26"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMAD</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "29"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "29"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "29"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMAA</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "39"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "39"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "39"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMAS</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "37"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "37"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "37"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SECOM</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "28"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "28"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "28"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEDUH</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "34"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "34"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "34"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SMECLJ</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "42"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "42"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "42"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMED</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "35"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "35"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "35"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEFAZ</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "32"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "32"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "32"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEGOV</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "30"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "30"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "30"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEICTT</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "41"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "41"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "41"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMMA</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "40"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "40"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "40"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEMOV</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "38"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "38"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "38"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SEPLAN</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "31"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "31"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "31"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SESA</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "36"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "36"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "36"); ?> </td>
    </tr>
   <tr>
      <th scope="row">SMTI</th>
      <td><?php echo ret_Qtd_PcbySec($conn, "33"); ?> </td>
      <td><?php echo ret_Qtd_MonbySec($conn, "33"); ?> </td>
      <td><?php echo ret_Qtd_DivbySec($conn, "33"); ?> </td>
    </tr>
   


  </tbody>
  <tfoot>
    <tr>
      <th scope="row" colspan="2"></th>
      <td></td>
        <td></td>
    </tr>
  </tfoot>
</table>






</body>

</html>
