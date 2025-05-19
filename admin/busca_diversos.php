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
            background-color: #0094ff;
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
         span1 {
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
								<h2 class="title pull-left">Informacoes Diversas sobre Dispositivos   </h2> &nbsp &nbsp <a href="busca_alt.php" title="alteraçoes executadas em Dispositivos ">Busca em Alteraçoes  </a> <br />
						
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
								    <td> <label><input type="radio" name="opcao" checked value="ctrl_TI"/></label>  </td>  <td> &nbsp <label title="Numero de Controle CTI"> Controle TI</label>  </td>   <td>&nbsp &nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Plaqueta"/></label> </td> <td> &nbsp <label title="Numero de Patrimonio">Patrimonio</label>  </td> <td>&nbsp &nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Nome"/></label> </td> <td> &nbsp <label title="Breve Descricao do Nome do dispositivo ">Descricao</label> </td> <td>&nbsp &nbsp &nbsp </td> 
									<td><label><input type="radio" name="opcao" value="Local"/></label> </td> <td> &nbsp<label title="Nome do Local do Dispositivo">Nome do Local</label> </td> <td>&nbsp &nbsp &nbsp </td> 
									<td><label><input type="radio" name="opcao" value="Local_Cod"/></label> </td> <td> &nbsp <label title="Codigo do Local ">Codigo do Local</label></td> <td>&nbsp &nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Secretaria"/> </label></td> <td> &nbsp <label title="Nome da Secretaria"> Secretaria</label></td> <td>&nbsp &nbsp &nbsp </td> 
								    </tr>
                                     </tr>
									<tr> <td>&nbsp &nbsp </td></tr>
                                     <tr><td>&nbsp &nbsp </td></tr>
                                 
								   <tr>
                                   <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Usuarios"/></label> </td> <td>&nbsp <label title="Nome do Utilizador do Pc">Usuarios</label></td> <td>&nbsp &nbsp </td> 
								   <td><label> <input type="radio" name="opcao"  value="Tecnicos"/> </label> </td>  <td> &nbsp <label title="Nome do Tecnico ">Tecnicos </label>  </td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Data"/></label> </td> <td> &nbsp <label title="Data de Cadastro aaaa/mm/dd ">Data</label></td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Id"/></label> </td> <td> &nbsp <label title="ID da tabela tbequip ">Identificacao</label> </td> <td>&nbsp &nbsp </td> 
									<td><label><input type="radio" name="opcao" value="Sequencial"/></label> </td> <td> &nbsp<label title="SEquencia de Inicio e fim para conferencia">Sequencial</label> </td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="Excluidos"/></label> </td> <td>&nbsp  <label title="Lista todos os Dispositivos Excluidos">Excluidos</label></td> <td>&nbsp &nbsp </td> 
                                   </tr>
								<tr> <td>&nbsp &nbsp </td></tr>
                                     <tr><td>&nbsp &nbsp </td></tr>
									   <tr>
                                   <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="rack"/></label> </td> <td>&nbsp <label title="Visualiza Racks ( ativo) ">Rack</label></td> <td>&nbsp &nbsp </td> 
								   <td><label> <input type="radio" name="opcao"  value="swi"/> </label> </td>  <td> &nbsp <label title="Visualiza Switch  ">Switch </label>  </td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="pat"/></label> </td> <td> &nbsp <label title="Visualiza Patch Panels "> Patch Panel </label>&nbsp</td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="mon_0"/></label> </td> <td> &nbsp <label title="Visualiza Computadores sem Monitores ">Pcs Sem Monitor</label> </td> <td>&nbsp &nbsp </td> 
									<td><label><input type="radio" name="opcao" value="mon_1"/></label> </td> <td> &nbsp<label title="Visualiza Computadores com 1  Monitor ">Pcs 1 Monitor</label> </td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="mon_2"/></label> </td> <td>&nbsp <label title="Visualiza Computadores com 2 Monitores ">Pcs 2 Monitor</label></td> <td>&nbsp &nbsp </td> 
                                   </tr>
								
                                 
                                     <tr> <td>&nbsp &nbsp </td></tr>
                                     <tr><td>&nbsp &nbsp </td></tr>
									   <tr>
                                   <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="mon"/></label> </td> <td> &nbsp<label title="Visualiza Monitores em lista ">Monitores</label> </td> <td>&nbsp &nbsp </td>
                                     <td><label><input type="radio" name="opcao" value="Monitor_0"/></label> </td> <td> &nbsp <label title="Visualiza Monitores sem vinculos com PCs "> Monitor s/ PC </label>&nbsp</td> <td>&nbsp &nbsp </td>
                                     <td><label><input type="radio" name="opcao" value="Resumo"/></label> </td> <td>&nbsp <label title="Breve Resumo do Dispositivo (CTI) ">Resumo</label></td> <td>&nbsp &nbsp </td> 
								   <td><label> <input type="radio" name="opcao"  value="Visual"/> </label> </td>  <td> &nbsp <label title="Visualiza Dispositivos em um Intervalo de CTI ">Visual </label>  </td> <td>&nbsp &nbsp </td>
									<td><label><input type="radio" name="opcao" value="div"/></label> </td> <td> &nbsp <label title="Visualiza Dispositivos Diversos ">Diversos</label> </td> <td>&nbsp &nbsp </td> 
									<td><label><input type="radio" name="opcao" value="resp"/></label> </td> <td> &nbsp <label title="Visualiza Controle CTI por Responsavel ">Responsavel</label> </td> <td>&nbsp &nbsp </td> 
									
                                   </tr>
								    <tr> <td>&nbsp &nbsp </td></tr>
                                     <tr> <td>&nbsp &nbsp </td></tr>
                               
									<tr>
									
									  <td>&nbsp &nbsp </td>   <td>&nbsp &nbsp </td>
									<td><input type="radio" name="opcao" value="arm_tp"/> </td> <td>&nbsp <label title="Visualiza Registros por tipo de armazenamento (IDE , SATA_HD , SATA_SSD, NVME , NAS , SCSI)  ">Armazenamento</label> </td> <td>&nbsp &nbsp </td> 
									<td><input type="radio" name="opcao" value="arm_tam"/> </td> <td>&nbsp <label title="Visualiza Registros por tamanho de armazenamento ( INFERIORES , 120GB, 256GB, 512GB, 1TB, 2TB OU ACIMA 2TB)">Tamanho </label></td> <td>&nbsp &nbsp </td> 
								    <td><input type="radio" name="opcao" value="pl_mae"/> </td> <td> &nbsp<label title="Visualiza Registros tipo Placa Mae "> Placa Mae </label>&nbsp</td> <td>&nbsp &nbsp </td> 
									 <td><input type="radio" name="opcao" value="proc"/> </td> <td>&nbsp <label title="Visualiza Registros tipo Processador ">Processador</label></td> <td>&nbsp &nbsp </td> 
                                     <td><input type="radio" name="opcao" value="mem_tp"/> </td> <td>&nbsp <label title="Visualiza Registros tipo Memoria ">Mem. tipo</label></td> <td>&nbsp &nbsp </td> 
									 <td><input type="radio" name="opcao" value="mem_tam"/> </td> <td>&nbsp <label title="Visualiza Registros tamanho Memoria ">Mem. Tam</label></td> <td>&nbsp &nbsp </td> 
									</tr>
							

									
									</table>
									 
						                                 
                                 <div>  
                                             
							<br /><br />  
							 <input type="text" name="digito" id="digito" value="<?php echo $ref_cti; ?>  "/>
							&nbsp&nbsp 	&nbsp&nbsp 	&nbsp&nbsp 
								<button class="button-48" type="submit"  role="button"> <span class="text">Consulta </span></button>

							 		  
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
