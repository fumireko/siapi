<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Informa </title>
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

                            <form method="post" action="direciona.php">
                                <input type="hidden" name="tipo" id="tipo" size=50 value="15">
                                    <input type="hidden" name="nome" id="nome" size=50 value="17">
                                      <input type="hidden" name="id_loc" id="id_loc" size=50 value="17">
                                        <input type="hidden" name="id_sec" id="id_sec" size=50 value="17">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left"> Secretaria Mun. de Tec. da Informaçao </h2>
                                        <div class="actions panel_actions pull-right">
                                        
                                        </div>
                        </div>
                  
                        <h4>Informe de correçoes e outros </h4>
                        <br> 
                            <label> Nome:     </label>
                            &nbsp  &nbsp  &nbsp  &nbsp  <input id="usuario" name="usuario" style="background-color:white;" type="text" value="" size="55" REQUIRED> 
                     <br> 
                       <label> Titulo:     </label>
                        &nbsp  &nbsp  &nbsp  &nbsp  <input id="titulo" name="titulo" style="background-color:white;" type="text" value="" title="Informe um Titulo para a Desciçao " size="55" REQUIRED> 
                     <br> 
                     <label> Descreva:     </label><br>
                         <textarea id="descricao"  name="descricao" rows="5" cols="55"  REQUIRED ></textarea>
                        <br /><br />
                        <button type="submit" id="btn_cadastro_unidade" title="Registrar dados Informados  "  name="btn_cadastro_unidade" class="btn btn-primary">Registrar</button>  &nbsp  &nbsp   <a href="newsfeed.php?" title="Voltar ao Inicio" class="btn btn-primary">Inicio</a> 
                    </div>
            </div>
            </form>
            </div>
        </section></div>
    </section>
    </section>
</body>
</html>