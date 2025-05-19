<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Estagiarios Contatos </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" type="text/css" href="css/semed.css">
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet"
            type="text/css" media="screen" />
        <link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css"
            media="screen" />
        <link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"
            type="text/css" media="screen" /> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- CORE CSS TEMPLATE - END -->
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
        <!-- ANGULAR -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- JS -->
 <style>
 input {
  display: block;
  height: 22px;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 4px 10px;
}
 </style>
        
        <script>
        const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}
</script>
        </head>
    <!-- BEGIN BODY -->
    
<!-- BEGIN BODY -->

<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php
   // include "index.php"
    ?>
    <!-- aqui termina o menu -->
    <!-- MAIN MENU - END -->
    <!--  SIDEBAR - END -->
    <!-- START CONTENT -->

    <section id="main-content" class=" ">
        <section class="wrapper main-wrapper" style=''>
            <div class="clearfix"></div>
       

            <div class="col-lg-8">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title pull-left">
                            Sistema de Gestão T.I
                        </h2>
                        </h1>

                    </header>
                    <div class="content-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8">

                                <!-- ********************************************** -->
                                <div id="consulta">
                                    <!-- ********************************************** -->
                                </div>
                                <div class="form-group">

                                </div>
                            </div>

                            <form method="post" action="salvacontato.php">
                                <input type="hidden" name="modalidade" size=50 value="<?php echo $tipo ?>">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left"> Secretaria Mun. de Tec. da Informaçao </h2>
                                        <div class="actions panel_actions pull-right">
                                        
                                        </div>
                        </div>
                       <h4>Contato Funcionarios </h4>
                        <br> 
                            <label> Nome:     </label>
                            &nbsp  &nbsp  &nbsp  &nbsp  <input id="patrimonio" name="patrimonio" style="background-color:white;" type="text" value=" " size="55"> 
                     <br> 
                     <table>
                     <tr>
                     <td> <label>   Celular :    </label> </td>
                     <td>  &nbsp  &nbsp  </td>
                       <td> <label>   Sexo :    </label></td>
                       <td>  &nbsp  &nbsp </td>
                     <td> <label>   Local :    </label> </td>
                   <td></td>
                     </tr>
                     <tr>
                     <td>  <input id="celular" name="celular"  type="text" value=" " title="Digite um número de telefone" onkeyup="handlePhone(event)">  </td>
                   <td>  &nbsp  &nbsp  </td>
                     <td>  
                       <select title="Selecione uma opção"  style="background-color:#FEFFFC"  id="local" name="local" >
                                         <option value="VAZIO"></option>
                                         <option value="m">Masculino</option>                
                                         <option value="f">Feminino </option>        
                                        
                                         </select>        
                     </td>
                       <td>  &nbsp  &nbsp </td>
                     <td>   <select title="Selecione uma opção"  style="background-color:#FEFFFC"  id="local" name="local" >
                                         <option value="VAZIO"></option>
                                         <option value="Sede">T.I. SEDE</option>                
                                         <option value="Regional Maracana">T.I. MARACANA </option>        
                                         <option value="Osasco">T.I.OSASCO </option>        
                                          <option value="Obras">T.I.OBRAS</option>
                                          <option value="Saude">T.I.SAUDE</option>
                                         </select>        
                          </td>
                     </tr>

                     </table>
                     
                     
                     
                  
                           
                             
                        

                            <script>

                                                                                function calcular() {
                                                                                  var n1 = parseInt(document.getElementById('portas_tot').value, 10);
                                                                                  var n2 = parseInt(document.getElementById('portas_uso').value, 10);
                                                                                  //document.getElementById('portas_livre').innerHTML = n1 - n2;
                                                                                    document.getElementById('portas_livre').value = n1 - n2;
                                                                                }
                            </script>

                        
                        <br /><br />
                        <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                    </div>
            </div>
            </form>
            </div>
        </section></div>
    </section>
    </section>
</body>
</html>