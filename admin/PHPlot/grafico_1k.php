<?php
include "../../Config/config_sistema.php";


function ret_Qtd_Pcby0mon($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
     $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
 //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 0) {
                    do {
                        $cont = $cont + 1;
                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($linha = mysqli_fetch_assoc($dados));
    }
    return $cont;
}

function ret_Qtd_Pcby0monV_1($Fconexao, $Fref) // informa qtd de pcs  com 0 monitores com base no cti
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
            //$ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 0) {
                    do {
                        $cont = $cont + 1;
                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}



function ret_Qtd_Pcby1monV_1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
           // $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "' and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm == 1) {
                    do {
                        $cont = $cont + 1;
                       } while ($linham = mysqli_fetch_assoc($dadosm));
                 }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}


function ret_Qtd_Pcby2monV_1($Fconexao, $Fref) // informa qtd de pcs por secretaria
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    $conn = $Fconexao;
    $conteudo = "";
    $i = 0;
    $cont = 0;
    $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
    //   $sql = "SELECT * from tbequip where status=1";
    $dados = mysqli_query($conn, $sql) or die(mysqli_error());
    $ln_ini = mysqli_fetch_assoc($dados);
    //$linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    $col = 0;
    if ($total == 0) {
        $titulo = "\n  " . $total . "  Registro Localizado (s) em Controle TI ";
        //  echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
    } else {
        do {
            $i = $i + 1;
        //    $ln_ini = mysqli_fetch_assoc($dados);
            $ret_tabela = "1";
            //$ln_ini['tab_origem'];
            //$ret_chave = $ln_ini['tbequip_id'];
            $ret_chave = $ln_ini['tab_chave'];
            if (($ret_tabela == "1") or ($ret_tabela == 1)) {
                // consulta em outra tabela // monitores 
                $sqlm = "SELECT * FROM tb_monitores WHERE id_equip = '" . $ret_chave . "'and status=1"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                $linham = mysqli_fetch_assoc($dadosm);
                $totalm = mysqli_num_rows($dadosm);
                if ($totalm > 1) {
                    $cont = $cont + 1;
                    do {
                      
                        //$pc_id = $linham['id_equip'];
                        //$retm_ctrl_ti = $linham['ctrl_ti'];
                        //if (($pc_id <> 0) or ($pc_id <> "0")) {
                        // $conteudo .= $ret_chave."  "; 
                        // $cont= $cont +1;
                        // }
                    } while ($linham = mysqli_fetch_assoc($dadosm));
                    //$cont = $cont + 1;
                }
            }
        } while ($ln_ini = mysqli_fetch_assoc($dados));
    }
    return $cont;
}





function ret_Qtd_Pcby1mon($Fconexao, $Fref) // informa qtd de pcs com 1 monitor
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        //SELECT `tbcmei_id`,`tbcmei_nome`, COUNT(`tbcmei_nome`) FROM tbcmei GROUP BY `tbcmei_nome` HAVING COUNT(`tbcmei_nome`) > 1;
        $sql = " SELECT `status`,`id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) = 1 and status =1 ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}




function ret_Qtd_Pcby2mon($Fconexao, $Fref) // informa qtd de pcs com 2 monitores
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        //SELECT `tbcmei_id`,`tbcmei_nome`, COUNT(`tbcmei_nome`) FROM tbcmei GROUP BY `tbcmei_nome` HAVING COUNT(`tbcmei_nome`) > 1;
        $sql = " SELECT `status`,`id`,`id_equip`, COUNT(`id_equip`) FROM tb_monitores GROUP BY `id_equip` HAVING COUNT(`id_equip`) > 1 and status =1 ";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
        if ($total == 0)
            return 0;
        else
            return $total;
    }
}

function ret_Qtd_total($Fconexao, $Fref) // informa qtd total de pcs 
{
    //	echo "<center> ".nomedesecretaria($conn,$campo)."</center>";				 
    {
        $sql = "SELECT * from tb_controle_ti where tab_origem=1 and status=1";
        $dados = mysqli_query($Fconexao, $sql) or die(mysqli_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
       // if ($total == 0)
         //   return 0;
        //else
            return $total;
    }
}





# PHPlot Example: Pie/text-data-single
require_once 'phplot.php';
$total_geral = ret_Qtd_total($conn, "22");
# The data labels aren't used directly by PHPlot. They are here for our
# reference, and we copy them to the legend below.

$data = array(
    array('Equip sem Monitor', ret_Qtd_Pcby0MonV_1($conn, "22")),
    array('Equip com 1 monitor', ret_Qtd_Pcby1MonV_1($conn, "23")),
    array('Equip com 2 monitor', ret_Qtd_Pcby2MonV_1($conn, "23")), 
  
    
);

$plot = new PHPlot(800,700);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
$plot->SetDataColors(array('red', 'green', 'blue', 'gold'));

//$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
  //                    'magenta', 'brown', 'lavender', 'pink',
    //                'gray', 'orange','SlateBlue','salmon','violet'));
 //'salmon', 'SlateBlue', 'YellowGreen', 'magenta', 'aquamarine1', 'gold', 'violet'


# Main plot title:
$plot->SetTitle("Computadores  da base"."  total = ".$total_geral);

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();



