<?php

if(!isset($_SESSION)) 
 { 
//		session_start(); 
		// inclui o arquivo de configurção do sistema
		include "Config/config_sistema.php";
		// verifica se a variavel existir
	if(isset($_SESSION['id_usuario']) and isset($_SESSION['email_usuario']) 
	and isset($_SESSION['senha_usuario']) and isset($_SESSION['nivel_usuario']) 
	and isset($_SESSION['funcao_usuario'])
	and isset($_SESSION['nome_usuario']) and isset($_SESSION['unidade_usuario'])
	and isset($_SESSION['tbcmei_nome']) and isset($_SESSION['sec_id']) 
	and isset($_SESSION['sec_nome'])
	) 
	{
		// se existie as sessões coloca os valores em uma varivel
			$id_usuario = $_SESSION['id_usuario'];
			$email_usuario = $_SESSION['email_usuario'];
			$senha_usuario = $_SESSION['senha_usuario'];
			$nivel_usuario = $_SESSION['nivel_usuario'];
			$funcao_usuario = $_SESSION['funcao_usuario'];
			$nome_usuario = $_SESSION['nome_usuario'];
			$unidade_usuario = $_SESSION['unidade_usuario'];
			$tbcmei_nome = $_SESSION['tbcmei_nome'];
			$sec_id = $_SESSION['sec_id'];
			$sec_nome = $_SESSION['sec_nome'];

	} 
	else
	{
		$erro = urlencode("Você não esta logado!");
		header("Location: index.php?par=nao_logado.$erro");
	}


	// verifica se as variaveis estão atribuidas
   
 if(!(empty($email_usuario) or empty($senha_usuario)))
	{
		// se estiverem atribuidos vamos ver se existe o login
		$consulta = mysqli_query($conn,"select * from usuarios where email = '$email_usuario'");
		if(mysqli_num_rows($consulta) != 0) 
		 {
					// se o usuario existir vamos verificar a senha
					if($senha_usuario != mysql_result($consulta,0,"senha"))
					{
						// se a senha está correta vamos apagar a
						// sessão que existia mas erra a errada
						unset($_SESSION['id_usuario']);
						unset($_SESSION['email_usuario']);
						unset($_SESSION['senha_usuario']);
						unset($_SESSION['nivel_usuario']);
						unset($_SESSION['nome_usuario']);
						unset($_SESSION['funcao_usuario']);
						unset($_SESSION['unidade_usuario']);
						unset($_SESSION['tbcmei_nome']);
						unset($_SESSION['sec_id']);
						unset($_SESSION['sec_nome']);
			

						$erro = urlencode("Você não esta logado!");
						header("Location: index.php?par=senha_vazio");
					}
		}
		 else
		   {
						unset($_SESSION['id_usuario']);
						unset($_SESSION['email_usuario']);
						unset($_SESSION['senha_usuario']);
						unset($_SESSION['nivel_usuario']);
						unset($_SESSION['nome_usuario']);
						unset($_SESSION['funcao_usuario']);
						unset($_SESSION['unidade_usuario']);
						unset($_SESSION['tbcmei_nome']);
						unset($_SESSION['sec_id']);
						unset($_SESSION['sec_nome']);

	  				   $erro = urlencode("Você não esta logado!");
					   header("Location: index.php?par=erro_senha");
			  }
	} 
  else 
	{
		 // caso as sessões estarem vaizias
 		 $erro = urlencode("Você não esta logado!");
		  //header("Location: index.php?par=campos_vazios");
        echo $erro;
 }
	// mysql_close($conn);
}
?>