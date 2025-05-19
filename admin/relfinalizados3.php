<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $email_usuario = $_SESSION['email_usuario'];

if (isset($_GET['tipo'])) {
    $tipo = "1";   // id index exists
}
else
    $tipo = "0";   // id index exists


if ($tipo == "1") {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SISTEMA DE GESTÃO T.I</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body >
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php
    //        include "index.php";
    ?> 
        <!-- aqui termina o menu -->
         <div id="main-content">

        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Chamados 2025 REG. MARACANA</h2>
       <h5 class="title pull-left"> <a id="gerarExcel" href="relfinalizados3.php" class="btn btn-primary">Dados sem Borda</a></h5>             
       </header>
         <!-- Dados do atendimento-->
      
            </form>
         
   <?php
     $requisicao = "";
     /*
     $quantidade = 100000;
    $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $inicio     = ($quantidade * $pagina) - $quantidade;
              if (isset($_REQUEST['regiao']) == "")
                  $requisicao = "";
              else
                  $requisicao = $_REQUEST['regiao'];


              $get = "&regiao=" . $requisicao;

     */

     if ($requisicao) {
         $sql = "SELECT tbldados.id_dados,
	tbldados.data,
	tbldados.telefone,
	tbldados.nsolicitante,
    tbldados.regiao,
    tbldados.tpservico,
	tbldados.id_setor,
	tbldados.prob,
	tbldados.solucao,
	tbldados.status,
    tbldados.tecnico,
    tbldados.hora,
	tbldados.id_sec,
	tbsecretaria.sec_id,
	tbsecretaria.sec_nome,
	tbcmei.tbcmei_id,
	tbcmei.tbcmei_nome
	from tbldados 
	inner Join tbsecretaria
	On tbsecretaria.sec_id = tbldados.id_sec 
	Inner Join tbcmei
	ON tbcmei.tbcmei_id = tbldados.id_setor  
	where tbldados.regiao LIKE '%" . $requisicao . "%'
	and tbldados.status = 'finalizado'
    and tbldados.data >= '2025/01/01'
   	ORDER BY id_dados desc ";
         // $sql.=" LIMIT ".$inicio.",". $quantidade;  // and tbldados.dtafin >= '2022-11-18'
     } else {
         $sql = "SELECT tbldados.id_dados,
		tbldados.data,
		tbldados.telefone,
        tbldados.regiao,
        tbldados.tpservico,
		tbldados.nsolicitante,
		tbldados.id_setor,
		tbldados.prob,
		tbldados.solucao,
		tbldados.status,
        tbldados.tecnico,
        tbldados.hora,
		tbldados.id_sec,
		tbsecretaria.sec_id,
		tbsecretaria.sec_nome,
		tbcmei.tbcmei_id,
		tbcmei.tbcmei_nome
		from tbldados 
		inner Join tbsecretaria
		On tbsecretaria.sec_id = tbldados.id_sec 
		Inner Join tbcmei
		ON tbcmei.tbcmei_id = tbldados.id_setor  
		where tbldados.status = 'finalizado'
        and tbldados.data >= '2025/01/01'
        and tbldados.regiao = 'REGIONAL MARACANA'
     	ORDER BY id_dados desc ";

         //ORDER BY id_dados desc LIMIT " . $inicio . ',' . $quantidade;    // and tbldados.dtafin >= '2022-11-18'
         //	ORDER BY id_dados desc;
 
     }//Executa o SQL
     $qr = mysqli_query($conn, $sql) or die(mysqli_error());
     ?>
            </p>
            <table id="example" class="display" align="left" cellspacing="0" width="100%" border="1">
                <thead>
                    <tr>
                       <th></th>
                       <th>Cod</th>
                        <th></th>
                       <th>Data aber</th>
                          <th></th>
                          
                        <th align="left" >Regiao</th>
                           <th></th>
                        <th align="left">Tp serviço</th>
                       <th align="left">Nome</th>
                       <th align="left">Depto</th>
                       <th>Tecnico</th>
                    
                      
            
                    </tr>
                </thead>
            <tbody>
            <?php
            //  $i=0;
            // $ordem=0;
            while ($ln = mysqli_fetch_assoc($qr)) {

                $data_aber = $ln['data'];
                $dtaab = implode("/", array_reverse(explode("-", $data_aber)));
                // $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                ?>
            <tr>
                <td>  &nbsp &nbsp</td>
                <td><?php echo $ln['id_dados']; ?></u></a></td>
                <td>  &nbsp &nbsp</td>
                <td><?php echo $dtaab; ?></td>
                <td>  &nbsp &nbsp</td>
                 
                <td><?php echo $ln['regiao']; ?></td>
                <td>  &nbsp &nbsp</td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['tpservico']); ?></td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['nsolicitante']); ?></td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['tbcmei_nome']); ?></td>
                <td><?php echo $ln['tecnico']; ?></td>
            </tr>
            <?php
            }
            ?>    
            </tbody>                              
        </table>
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>
<?php
} else {
    ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SISTEMA DE GESTÃO T.I</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body >
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php
    //        include "index.php";
    ?> 
        <!-- aqui termina o menu -->
         <div id="main-content">

        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Chamados 2025 REG. MARACANA</h2>
            <h5 class="title pull-left"> <a id="gerarExcel" href="relfinalizados3.php?tipo=1" class="btn btn-primary">Dados com Borda</a></h5>        
       </header>
         <!-- Dados do atendimento-->
      
            </form>
         
   <?php
     $requisicao = "";
     /*
     $quantidade = 100000;
    $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $inicio     = ($quantidade * $pagina) - $quantidade;
              if (isset($_REQUEST['regiao']) == "")
                  $requisicao = "";
              else
                  $requisicao = $_REQUEST['regiao'];


              $get = "&regiao=" . $requisicao;

     */

     if ($requisicao) {
         $sql = "SELECT tbldados.id_dados,
	tbldados.data,
	tbldados.telefone,
	tbldados.nsolicitante,
    tbldados.regiao,
    tbldados.tpservico,
	tbldados.id_setor,
	tbldados.prob,
	tbldados.solucao,
	tbldados.status,
    tbldados.tecnico,
    tbldados.hora,
	tbldados.id_sec,
	tbsecretaria.sec_id,
	tbsecretaria.sec_nome,
	tbcmei.tbcmei_id,
	tbcmei.tbcmei_nome
	from tbldados 
	inner Join tbsecretaria
	On tbsecretaria.sec_id = tbldados.id_sec 
	Inner Join tbcmei
	ON tbcmei.tbcmei_id = tbldados.id_setor  
	where tbldados.regiao LIKE '%" . $requisicao . "%'
	and tbldados.status = 'finalizado'
    and tbldados.data >= '2025/01/01'
   	ORDER BY id_dados desc ";
         // $sql.=" LIMIT ".$inicio.",". $quantidade;  // and tbldados.dtafin >= '2022-11-18'
     } else {
         $sql = "SELECT tbldados.id_dados,
		tbldados.data,
		tbldados.telefone,
        tbldados.regiao,
        tbldados.tpservico,
		tbldados.nsolicitante,
		tbldados.id_setor,
		tbldados.prob,
		tbldados.solucao,
		tbldados.status,
        tbldados.tecnico,
        tbldados.hora,
		tbldados.id_sec,
		tbsecretaria.sec_id,
		tbsecretaria.sec_nome,
		tbcmei.tbcmei_id,
		tbcmei.tbcmei_nome
		from tbldados 
		inner Join tbsecretaria
		On tbsecretaria.sec_id = tbldados.id_sec 
		Inner Join tbcmei
		ON tbcmei.tbcmei_id = tbldados.id_setor  
		where tbldados.status = 'finalizado'
        and tbldados.data >= '2025/01/01'
        and tbldados.regiao = 'REGIONAL MARACANA'
     	ORDER BY id_dados desc ";

         //ORDER BY id_dados desc LIMIT " . $inicio . ',' . $quantidade;    // and tbldados.dtafin >= '2022-11-18'
         //	ORDER BY id_dados desc;
 
     }//Executa o SQL
     $qr = mysqli_query($conn, $sql) or die(mysqli_error());
     ?>
            </p>
            <table id="example" class="display" align="left" cellspacing="0" width="100%" border="0">
                <thead>
                    <tr>
                       <th></th>
                       <th>Cod</th>
                        <th></th>
                       <th>Data aber</th>
                          <th></th>
                          <th></th>
                        <th align="left" >Regiao</th>
                           <th></th>
                        <th align="left">Tp serviço</th>
                       <th align="left">Nome</th>
                       <th align="left">Depto</th>
                       <th>Tecnico</th>
                    
                      
            
                    </tr>
                </thead>
            <tbody>
            <?php
            //  $i=0;
            // $ordem=0;
            while ($ln = mysqli_fetch_assoc($qr)) {

                $data_aber = $ln['data'];
                $dtaab = implode("/", array_reverse(explode("-", $data_aber)));
                // $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                ?>
            <tr>
                <td>  &nbsp &nbsp</td>
                <td><?php echo $ln['id_dados']; ?></u></a></td>
                <td>  &nbsp &nbsp</td>
                <td><?php echo $dtaab; ?></td>
                <td>  &nbsp &nbsp</td>
                 <td>  &nbsp &nbsp</td>
                <td><?php echo $ln['regiao']; ?></td>
                <td>  &nbsp &nbsp</td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['tpservico']); ?></td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['nsolicitante']); ?></td>
                <td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', $ln['tbcmei_nome']); ?></td>
                <td><?php echo $ln['tecnico']; ?></td>
            </tr>
            <?php
            }
            ?>    
            </tbody>                              
        </table>
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>
<?php
}
?>

