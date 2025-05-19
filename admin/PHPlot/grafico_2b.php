<?php
include "../../Config/config_sistema.php";

function ret_Qtd_CentroCustosbySec($Fconexao,$Fref)
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $ident = $Fref;
        $sql = "SELECT * FROM tbcmei WHERE tbcmei_sec_id = '" . $ident . "'";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}



# PHPlot Example: Bar chart, with data labels
require_once 'phplot.php';
$image_map = "";
 
$data = array(
 array('GAB.',ret_Qtd_CentroCustosbySec($conn,"22")),
 array('VICE',ret_Qtd_CentroCustosbySec($conn, "23")),
 array('PROC.',ret_Qtd_CentroCustosbySec($conn, "24")),
 array('CONTR.',ret_Qtd_CentroCustosbySec($conn, "25")),
 array('OUV.',ret_Qtd_CentroCustosbySec($conn, "26")),
 array('SEMAD',ret_Qtd_CentroCustosbySec($conn, "29")),
 array('SEMAA',ret_Qtd_CentroCustosbySec($conn, "39")),
 array('SEMAS',ret_Qtd_CentroCustosbySec($conn, "37")),
 array('SECOM',ret_Qtd_CentroCustosbySec($conn, "28")),
 array('SEDUH',ret_Qtd_CentroCustosbySec($conn, "34")),
 array('SMECLJ',ret_Qtd_CentroCustosbySec($conn, "42")),
 array('SEMED',ret_Qtd_CentroCustosbySec($conn, "35")),
 array('SEFAZ',ret_Qtd_CentroCustosbySec($conn, "32")),
 array('SEGOV',ret_Qtd_CentroCustosbySec($conn, "30")),
 array('SEICTT',ret_Qtd_CentroCustosbySec($conn, "41")),
 array('SEMMA',ret_Qtd_CentroCustosbySec($conn, "40")),
 array('SEMOV',ret_Qtd_CentroCustosbySec($conn, "38")),
 array('SEPLAN',ret_Qtd_CentroCustosbySec($conn, "31")),
 array('SESA',ret_Qtd_CentroCustosbySec($conn, "36")),
 array('SMTI',ret_Qtd_CentroCustosbySec($conn, "33")),
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
        . " title=\"$title\" alt=\"$alt\" href=\"$href\">\n";
}


$plot = new PHPlot(740, 300);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
$plot->SetTitle("Centro de Custos por Secretarias");

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


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
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
<h1>Centro de Custos por Secretaria</h1>

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
      <th scope="col">Secretaria</th>
      <th scope="col">Centro Custos</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">GAB</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "22"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">Vice</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "23"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">Proc.</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "24"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">Contr.</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "25"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">Ouv.</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "26"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMAD</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "29"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMAA</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "39"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMAS</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "37"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SECOM</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "28"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEDUH</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "34"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SMECLJ</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "42"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMED</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "35"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEFAZ</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "32"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEGOV</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "30"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEICTT</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "41"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMMA</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "40"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEMOV</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "38"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SEPLAN</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "31"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SESA</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "36"); ?> </td>
     
    </tr>
   <tr>
      <th scope="row">SMTI</th>
      <td><?php echo ret_Qtd_CentroCustosbySec($conn, "33"); ?> </td>
     
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
