<?php

    $tbequip_id = $_GET['tbequip_id'];
    $codequip = $tbequip_id;
    $nome= $_GET['par1'];
    $patrimonio = $_GET['par2'];
    $secretaria = $_GET['par3'];
    $local = $_GET['par4'];
    $tipo = $_GET['par5'];
    $so = $_GET['par6'];    
    $placa = $_GET['par7'];
    $proc = $_GET['par8'];
    $memoria = $_GET['par9'];
    $arm = $_GET['par10'];
    $monitor = $_GET['par11'];
    $obs = $_GET['par12'];

    
//    $dtlan = $ln['tbequi_datalanc'];
  //  $datalanc = implode("/", array_reverse(explode("-", $dtlan)));

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

    label {
        font-family: 'Roboto Medium', sans-serif;
        font-size: 25px;
        color: #000;
        font-weight: 500;
    }



    input[type=text] {
        height: 80px;
        font-family: 'Roboto Medium', sans-serif;
        font_size: 80px;
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
       <br /><br />
              <h1 class="title"></h1>
          </center>
          </div>
    </div>
    </div>
     <div class="clearfix"></div>
    <section class="box ">
    <header class="panel_header">
    <center>
        <br /><br /><br /><br />
         <h2 class="title pull-left"> GESTAO DE TI </h2>
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

    <form class="form-horizontal" method="POST" id="sdev" action="">
  
        <br />
           <div>
               <center>
               <label for="name"> Equipamento :</label>
                   <input type="text" name="equip_nome" id="equip_nome"  size=15 style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  value= "<?php echo $nome ?> "  disabled >
               <label for="name">Patrimonio:</label>
                   <input type="text" name="pat_num"  style="font-family: 'Arial Black'; font-size: 30px; text-align:center;"  size =12  disabled  value= <?php echo $patrimonio ?> disabled >
            
             <input type="hidden" name="equip_id" value="<?php echo $tbequip_id ?>"><br /><br /> 
             
        
            <input type="text" name="secretaria" size=40 value= "<?php echo $secretaria; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;"  disabled > <br /> 
       <br /> 
           <input type="text" name="local" size=40 value="<?php echo $local ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br /> 
       <label for="name">Tipo Equipamento : </\label>
          <input type="text"  name="equip_tipo" size=10 value="<?php echo $tipo; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled  > 
             
      <br /> <br />  <label for="name"> SO : </\label>
           <input type=text name="sistema" size=30   value= "<?php echo $so ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
             <br /><br />

        <label for="name"> Placa Mae :</\label> 
              <input type=text name="placa"  size=35 value= "<?php echo $placa; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />     
        <label for="name"> Processador :</\label> 
            <input type="text" name="processador" size=35 value="<?php echo $proc; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br /><br />
              
              <label for="name"> Memoria : </\label>
                  <input type=text name="memoria"  size =34 value= "<?php echo $memoria; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled >
<br /><br />                  
               <label for="name"> HD  : </\label>
                   <input type=text name="hd" size=35 value="<?php echo $arm; ?> " style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > 
                   <br />  <br />     
        


             <label for="name"> Monitor  :</\label> 
                 <input type=text name="monitor" size=28 value= "<?php echo $monitor; ?> "style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled   > <br /><br />
           
             
            <label for="name"> Obs. :</\label>
                <input type=text name="observacao" size=30 value="<?php echo $obs; ?>" style= "font-family: 'Arial Black'; font-size: 30px; text-align:center;" disabled > <br />  <br />           <br />  <br />  
               <br />  <br />  <br />  <br />  
			 
        
        <a href= 'https:\\portal.colombo.pr.gov.br\siap\'> ** Acesso ao Sistema **</a>  <br />  <br />                       

</center>
        
        
       
        
        
        
        </div>
        
      </form>
    
    </section> 
    </section>   
    </div>
    </body>

    </html>

    