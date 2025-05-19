
<?php
//$ref_ini = $_POST['num_ini'];
//$ref_fim = $_POST['num_fim'];


?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <title></title>
</head>
<style>
 body {
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
         margin: 20px;
      }
      span {
         font-size: 18px;
         font-weight: 600;
         color: white;
         padding: 8px;
      }
      .success {
         background-color: #4caf50;
      }
      .info {
         background-color: #2196f3;
      }
      .warning {
         background-color: #ff9800;
      }
      .danger {
         background-color: #f44336;
      }
      .other {
         background-color: #e7e7e7;
         color: black;
      }
      </style>


<body>

 <form method="post"action="buscador.php">
 
     <h1>Checagem de Identificaçao</h1>

      <input type="radio" name="opcao" value="id"/>ID
                <input type="radio" name="opcao" value="Plaqueta"/> Plaqueta
                <input type="radio" name="opcao" value="Nome"/>Nome Desktop<br /><br />

      <input type="text" name="digito" id="digito" value=""/>

 <input type="submit" name="button1"
                class="button" value=" consulta" />
          
       <br /><br /> 
 
   <span class="success">Success</span>
   <span class="info">Info</span>
   <span class="warning">Warning</span>
   <span class="danger">Danger</span>
   <span class="other">Other</span><br /><br />

     <a href="index.php" title="SELECIONAR ">Inicio </a>  <br /><br /> 
</form>
</body>
</html>