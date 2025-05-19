<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun2.php";
//$resolucao = ver_res_w();


if (isset($_GET['cti'])) {
    $ref_cti = $_GET['cti'];
} else
    $ref_cti = "";
//include "index.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Visualizaçao Infs</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
   
    </head>
<!-- BEGIN BODY -->
<style>
    /* CSS */
    .button-48 {
        appearance: none;
        background-color: #808080;
        border-width: 0;
        box-sizing: border-box;
        color: #000000;
        cursor: pointer;
        display: inline-block;
        font-family: Clarkson,Helvetica,sans-serif;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 1em;
        margin: 0;
        opacity: 1;
        outline: 0;
        padding: 1.5em 2.2em;
        position: relative;
        text-align: center;
        text-decoration: none;
        text-rendering: geometricprecision;
        text-transform: uppercase;
        transition: opacity 300ms cubic-bezier(.694, 0, 0.335, 1),background-color 100ms cubic-bezier(.694, 0, 0.335, 1),color 100ms cubic-bezier(.694, 0, 0.335, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        white-space: nowrap;
    }

        .button-48:before {
            animation: opacityFallbackOut .5s step-end forwards;
            backface-visibility: hidden;
            background-color: #78DE5C;
            clip-path: polygon(-1% 0, 0 0, -25% 100%, -1% 100%);
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            transform: translateZ(0);
            transition: clip-path .5s cubic-bezier(.165, 0.84, 0.44, 1), -webkit-clip-path .5s cubic-bezier(.165, 0.84, 0.44, 1);
            width: 100%;
        }

        .button-48:hover:before {
            animation: opacityFallbackIn 0s step-start forwards;
            clip-path: polygon(0 0, 101% 0, 101% 101%, 0 101%);
        }

        .button-48:after {
            background-color: #FFFFFF;
        }

        .button-48 span {
            z-index: 1;
            position: relative;
        }
    span {
        font-size: 18px;
        font-weight: 600;
        color: white;
        padding: 8px;
    }

</style>


<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php 
       include "index.php"
    ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>
                    <h2 class="title pull-left"> <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a> </h2></h2>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                             
                                

                            </header>
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         
                                        	<header class="panel_header">
							   <center>
								<h2 class="title pull-left">Informacoes Diversas sobre Dispositivos   </h2><br />
						
							   </center> 
							</header>
						
                                        
                        
                               
                                        <div class="actions panel_actions pull-right">
                                 
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                         	<form method="post"action="buscador_div2.php">
                                  
                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                    
                               <br />        <br />
                                 <table>
								 	<tr> <td>&nbsp &nbsp </td></tr>
                                     <tr><td>&nbsp &nbsp </td></tr>
                                     <tr>
                                 <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td> <input type="radio" name="opcao" checked value="ctrl_TI"/>  </td>  <td> &nbsp Controle TI &nbsp  </td>   <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Plaqueta"/> </td> <td>&nbsp Patrimonio &nbsp </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Nome"/> </td> <td>&nbsp Descricao &nbsp </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Local"/> </td> <td>&nbsp Local &nbsp </td> <td>&nbsp &nbsp </td>  
									<td><input type="radio" name="opcao" value="Local_Cod"/> </td> <td> &nbsp Codigo do Local &nbsp</td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Secretaria"/> </td> <td> &nbsp Secretaria &nbsp</td> <td>&nbsp &nbsp </td>  
								    </tr>
									<tr> <td>&nbsp &nbsp </td></tr>
                                     <tr><td>&nbsp &nbsp </td></tr>
                                 
								   <tr>
                                   <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Usuarios"/> </td> <td> &nbsp Usuarios &nbsp </td> <td>&nbsp &nbsp </td> 
								   <td> <input type="radio" name="opcao"  value="Tecnicos"/>  </td>  <td> &nbsp Tecnicos &nbsp </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Data"/> </td> <td>&nbsp Data &nbsp </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Id"/> </td> <td>&nbsp Identificacao &nbsp </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="Sequencial"/> </td> <td>&nbsp Sequencial &nbsp </td> <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="Excluido"/> </td> <td> &nbsp Excluidos &nbsp</td> <td>&nbsp &nbsp </td> 
                                    <td><input type="radio" name="opcao" value="Visual"/> </td> <td> &nbsp Visual &nbsp</td> <td>&nbsp &nbsp </td> 
								    </tr>
									<tr></tr>
								
									
									</table>
									 
							<br /><br />  
                            
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 <div>  
                                             
							<br /><br />  
							 <input type="text" name="digito" id="digito" value="<?php echo $ref_cti; ?>  "/>
							&nbsp&nbsp 	&nbsp&nbsp 	&nbsp&nbsp 
								<button class="button-48" type="submit"  role="button"><span class="text">Consulta </span></button>

							 		  
							  <br /><br /> 
							
						</center>




                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                                      
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
