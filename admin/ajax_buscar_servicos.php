<?php
include "../Config/config_sistema.php";
include('conexao.php');
$servicos = $_REQUEST['servicos'];
$sub = $_REQUEST['sub'];

if ($servicos == 'Suporte Tecnico CPU')
{
    $sql = "SELECT * FROM tbtiposservicos order by tbtiposservicos_desc";
    $resultado = mysql_query($sql) or die('Erro: ' .mysql_error());
    $option = '';
    while($row = mysql_fetch_array($resultado))
    { 
        $subservico = $row['tbtiposservicos_desc'];
        $option .= "<option value = '".$row['tbtiposservicos_id']."'>".$row['tbtiposservicos_desc']."</option>";
    }        
    ?>
    <div  class="form-group">
    <label class="form-label">Descrição</label>
    <select class="form-control m-bot15" name="sub" id ="sub" class="form-control input-md" required>  
    <?php  
        echo "<option value='0'></option>";
        echo $option;
    }
   

   else
		if ($servicos == 'Suporte Tecnico REDE/INTERNET') 
		{
		echo $sub;
		}
  else 

	{
	echo $sub;
    }
		
    ?>
       
   