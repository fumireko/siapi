<?php
//include "bco_fun.php";
include "../validar_session_off.php";  



$tbequip_id = $_GET['tbequip_id'];
$sql = "SELECT tbequip.tbequip_id,
tbequip.tbequip_plaqueta,
tbequip.tbequip_monitor,
tbequip.tbequi_mod,
tbequip.tbequi_modplaca,
tbequip.tbequi_memoria,
tbequip.tbequi_modelomemoria, 
tbequip.tbequi_armazenamento,	 
tbequip.tbequi_tparmazenamento,
tbequip.tbequi_datalanc,
tbequip.tbequi_teclado,
tbequip.tbequi_mouse,
tbequip.tbequi_filtrodelinha,
tbequip.tbequi_tecnico,
tbequip.tbequi_tbcmei_id,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbequip.tbequi_nome,
tbequip.tbequi_arm_sec,
tbequip.tbequi_arm_sectam,
tbequip.tbequi_slots,
tbequip.tbequi_slots_uso,
tbequip.tbequip_so,
tbequip.tbequi_so_arq,
tbequip.tbequi_app,
tbequip.tbequi_app_out,
tbequip.tbequi_obs,
tbequip.tbequi_tipo
FROM tbequip INNER JOIN tbcmei 
ON tbequip.tbequi_tbcmei_id = tbcmei.tbcmei_id
where tbequip.tbequip_id = '$tbequip_id' ORDER BY tbequip_id";
//$qr = mysql_query($sql) or die(mysql_error());
$qr = mysqli_query($conn, $sql) ;//or die(mysqli_error());
//$qr = mysqli_query($conn,$sql) or die (mysqli_error("erro "));
//$ln = mysqli_fetch_assoc($qr);    ///while( $ln = mysqli_fetch_assoc($qr) )
do {
    $unidade_id = $ln['tbcmei_id'];
    $nomeunidade = $ln['tbcmei_nome'];
    $codequip = $ln['tbequip_id'];
    $dtlan = $ln['tbequi_datalanc'];
    $datalanc = implode("/", array_reverse(explode("-", $dtlan)));

    //}
    ?>
<!DOCTYPE html >

<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>SMTI - Sistema de Gestao T.I</title>
    </head>
<style>

    body {
        background-image: url("img/siapi.jpg");
      
       
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
    

    input[type=text] {
        height: 100px;
    }


</style>


    <!-- BEGIN BODY -->
    <body>
         <!-- START TOPBAR -->
        <?php
        //  include "index_eng.php"
        ?> 
   
        <div id="main-content">
        <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
        <div class="pull-left">
            <center>
            <h1 class="title">Sistema de Gestao T.I</h1>
       </center>
                </div>
    </div>
    </div>
     <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
    <center>
        <h2 class="title pull-left">Visualiza Dados do equipamento COD  <?php echo $codequip; ?></h2><br />
       <a  class='btn btn-primary' href="https:\\portal.colombo.pr.gov.br\siap\" title="Historico de Manutencao do Equipamento">Historico de Manutenção do Equipamento</a>
        <div class="form-group  col-md-6">
            </div>
            <div class="actions panel_actions pull-right">
                 
                 <i class="box_toggle fa fa-chevron-down"></i>
                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                 <i class="box_close fa fa-times"></i>
            </div>
    </center> 
    </header>

    <form class="form-horizontal" method="POST" id="sdev" action="smudaequip.php">
  
        <br />
           <div>
               <center>
  Equipamento : <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 15px; text-align:center;"  value= "<?php echo $ln['tbequi_nome'] ?> "  disabled >  Patrimonio: <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 14px; text-align:center;"  size =15  disabled  value= <?php echo $ln['tbequip_plaqueta'] ?>  >
            
            
			
             <input type="hidden" name="equip_id" value="<?php echo $ln['tbequip_id'] ?>"><br /><br /> 
             
             Secretaria  : <input type="text" name="secretaria" size=60 value= "<?php echo nomedesecretaria($conn, (cod_sec($conn, $ln['tbequi_tbcmei_id']))); ?>" style="text-align:center "  > <br /> 
             <br />Local : <input type="text" name="local" size=65 value="<?php echo nomedolocal($conn, $ln['tbequi_tbcmei_id']) ?> "style="text-align:center "> <br /><br /> 
             Tipo Equipamento : <input type="text"  name="equip_tipo" size=15 value=<?php echo $ln['tbequi_tipo'] ?>> 
             
             SO : <input type=text name="sistema" size=15  readonly="readonly" value= "<?php echo $ln['tbequip_so']; ?>"  > 
             <input type=text name="sistema_arq" size=5 value="<?php echo $ln['tbequi_so_arq']; ?>"><br /><br />

        Placa Mãe :<input type=text name="processador_tipo"  size=60 value= "<?php ?>" > <br /><br />     
        Processador : <input type="text" name="processador" size=58 value=<?php echo $ln['tbequi_mod'] ?> style="text-align:center " >  <br /><br />
              
              Memoria : <input type=text name="memoria"  size =10 value= "<?php echo $ln['tbequi_memoria'] ?> " >
                            <input type=text name="memoria_qtd"  size=5 value= <?php echo $ln['tbequi_modelomemoria'] ?> > 
               HD  : <input type=text name="hd" size=10 value="<?php echo $ln['tbequi_armazenamento'] ?> "style="text-align:center "> 
                  <input type=text name="hd_tipo"  size=5 value= <?php echo $ln['tbequi_tparmazenamento'] ?> > <br />  <br />     
        


             Monitor  : <input type=text name="monitor" size=60 value= "<?php echo $ln['tbequip_monitor'] ?> "style="text-align:center "   > <br /><br />
           
             
             
            Obs. : <input type=text name="observacao" size=65 value="<?php echo $ln['tbequi_obs'] ?>"> <br />  <br />           <br />  <br />  
             <label> Tecnico :  "<?php echo $ln['tbequi_tecnico'] ?>"  </label>  <br />  <br />  <br />  <br />  
			 
        
        <a href= 'https:\\portal.colombo.pr.gov.br\siap\'> ** Acesso ao Sistema **</a>  <br />  <br />                       

</center>
        
        
       
        
        
        
        </div>
        
      </form>
                       <?php
                    } while ($ln = mysqli_fetch_assoc($qr));

                 ?>
    </section> 
    </section>   
    </div>
    </body>

    </html>

    