<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Portal do Pólo UAB - Balneário Pinhal</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div align="center">
		  <p >Pesquisa de curriculos:</p>

<p> </p>

<script type="text/javascript">

<!--  
	      
 function validar()
{
	if (document.getElementById ('espanhol').checked == false &&
	    document.getElementById('matematica').checked == false &&
		document.getElementById('pedagogia').checked == false &&
		document.getElementById('plageder').checked == false &&
	    document.getElementById('tsiad').checked == false)
		{
		alert ('Favor clicar em pelo menos em um dos cursos!');
		return false;
		}
	else
		{
		//alert ('Ok. marcado');
		return true;
		}
	}
-->
</script>



<p>
<form name="pesquisa" id="pesquisa" method="post" action="resut_pesq_curriculo.php">
<?php
echo'<p>Nome do aluno </p>';

		  echo'<input type="text" name="login" id="login" size="60" maxlength="30" />
</p>';
  echo'<p class="style1">[ Campo opcional, mas se deixar em branco o sistema irá mostrar todos os aluno do(s) curso(s) escolhido(s) ]
</p>';

echo'<p>Cursos </p>
<p align="left">';

	echo'<input type="checkbox"  name="cursos[]" id="espanhol" value="espanhol"/>
<a href="http://localhost/pagina_do_curso.html">Letras espanhol - UFEPel</a></p>
<p align="left">';
	
	
echo'<input type="checkbox" name="cursos[]" id="matematica" value="matematica" />
<a href="http://localhost/pagina_do_curso.html">Licenciatura plena em matemática - UFEPel</a></p>
<p align="left">';
		
echo'<input type="checkbox" name="cursos[]" id="pedagogia" value="pedagogia"/>
<a href="http://localhost/pagina_do_curso.html">Pedagogia - UFEPel</a></p>
<p align="left">';
			
			
echo'<input type="checkbox" name="cursos[]" id="plageder" value="plageder"/>
<a href="http://localhost/pagina_do_curso.html"> Planejamento e desenvolvimento em gestão de projetos rurais - UFRGS </a></p>
<p align="left">';
					
					
echo'<input type="checkbox" name="cursos[]" id="tsiad" value="tsiad"/>
<a href="http://localhost/pagina_do_curso.html">Tecnologia em Sistemas para Internet - UFSUL</a> </p>
<p align="left"> </p>';
						  
						  
						  
echo '<p><span class="style1">[ Campo obrigatório de pelo menos uma opção ]</span></p>
<p> </p>
<p align="center">';
?>



								  <input name="pesquisar" type="submit" value="Pesquisar" onMouseDown="validar()"/>
								  <label>
								  <input name="Limpar" type="reset" id="Limpar" value="Limpar" />
								  </label>
								  <a href="http://localhost">
								  <input name="Voltar" type="button" onClick="anterior.html";" value="Voltar" />
 
</form>
</p>
	  </div>

	</div>
</body>
</html