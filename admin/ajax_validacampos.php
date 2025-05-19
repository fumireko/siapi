<?php
include "../Config/config_sistema.php";
include('conexao.php');
$servico = $_REQUEST['servico'];

if ($servico == 'Suporte Tecnico CPU')
{ 
  $aqui = 'aqui';
} 
?>
<input type="hidden" id="servico" class="form-control" name="servico" value = <?php echo $aqui;?>>

