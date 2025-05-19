<link rel="stylesheet" href="css/style.css">
<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
$login_usuario = $_SESSION['login_usuario'];

// faz consulta no banco de dados
$consulta = mysql_query("SELECT * FROM dados_usuarios where Login = '".$login_usuario."'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel= "stylesheet" type="text/css" href="../estilocme.css".css"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AGENDANDO CONSULTA</title>
<link rel= "stylesheet" type="text/css" href="../estilocme.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ALTERANDO SENHA</title>
 <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="js/gmaps.js" type="text/javascript"></script>
        <script src="js/cep.js" type="text/javascript"></script>
        <link href="css/main.css" rel="stylesheet" />
        <style type="text/css">
        asterisco {
	color: #FF0000;
}
        </style>
<script language="javascript">
    function valida(frmdados)
   {
        if (frmdados.Nome.value=="") 
        {
         alert("Por favor, digite o nome do usuário!");
         return(false);
		}
		if (frmPac.dt_guia.value=="") 
        {
         alert("Por favor, digite a data da guia!");
         return(false);
		}
		if (frmPac.status.value=="") 
        {
         alert("Por favor, digite o status!");
         return(false);
		}
		return(true); 
   }


</script>



</head>

<body  onload="carregaData()">
<?php
while($linhas = mysql_fetch_object($consulta)) {

?>


  


    
    
    
    
    

</html>