<?php
extract($_POST);
if(isset($exibir)){
  echo "O valor do nome é: ".$nome;
}else{
  echo "Sem valor no isset";
}
?>

