<?
  $nome = $_POST['name'];
  $cpf = $_POST['cpf'];
  
  $cpf = str_replace("." , "" , $cpf ); // Primeiro tira os pontos
  $cpf = str_replace("," , "" , $cpf); // Depois tira a vírgula
  $cpf = str_replace("-" , "" , $cpf); // Depois tira a vírgula
  $cpf = str_replace("/" , "" , $cpf); // Depois tira a vírgula

  echo $nome; "<br>";
  echo $cpf;
?>