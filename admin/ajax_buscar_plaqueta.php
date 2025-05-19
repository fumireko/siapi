<?php
include "../Config/config_sistema.php";
include('conexao.php');
$plaqueta = $_REQUEST['plaqueta'];
$sql = "SELECT * FROM tbequip WHERE tbequip_plaqueta = '$plaqueta' ORDER BY tbequip_id";
$qr  = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )
{
  $tbequip_id = $ln['tbequip_id']; 
  $tbequi_mod = $ln['tbequi_mod'];
  $tbequi_memoria = $ln['tbequi_memoria'];
  $tbequi_modelomemoria = $ln['tbequi_modelomemoria'];
  $tbequi_armazenamento = $ln['tbequi_armazenamento'];
?>
<div  class="form-group">
<label class="form-label">Descrição</label>
<textarea class="form-control" cols="5" id="desc" name="desc" disabled> 
<?php  
}
  echo $tbequi_mod;   
  echo ' HD - ';echo $tbequi_armazenamento; 
  echo ' Memória -'; echo $tbequi_memoria;
  echo ' Tipo de memória -';echo $tbequi_modelomemoria;
?> 
</textarea>
<input type="hidden" id="id_equip" class="form-control" name="id_equip" value = <?php echo $tbequip_id;?>>
</div>