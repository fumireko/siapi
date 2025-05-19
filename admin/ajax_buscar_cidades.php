<?php
include "../Config/config_sistema.php";
include('conexao.php');
$estado = $_GET['estado'];
$sql = "SELECT * FROM tbcmei WHERE tbcmei_sec_id = $estado ORDER BY tbcmei_nome";
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);
mysql_query('SET character_set_results=utf8');
for ($i = 0; $i < $num; $i++) {
  $dados = mysql_fetch_array($res);
  $arrCidades[$dados['tbcmei_id']] = ($dados['tbcmei_nome']);
}
?>
<div  class="form-group">
<label class="form-label">Departamento</label>
<select name="cidade" id="cidade" class="form-control m-bot15">>
  <?php foreach($arrCidades as $value => $nome){
    echo "<option value='{$value}'>{$nome}</option>";
    echo $estado;
  }
?>
</select>
</div>