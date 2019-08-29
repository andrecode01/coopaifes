<?php 

	# Operação de verificação para iniciar a sessão do usuário
	

	session_start();

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$configs = include('../bd/config.php');

	$con = mysqli_connect(
		$configs['BD_HOST'], 
		$configs['BD_USERNAME'], 
		$configs['BD_PASSWORD'], 
		$configs['BD_DATABASE']);

	if (!mysqli_connect())
	echo 'Sem conexão com o banco de dados';

	$result = mysqli_query($con,
		"SELECT * FROM `USUARIO` 
		 WHERE `USUA_LOGIN` = '$login' 
		 AND `USUA_SENHA`= '$senha'"
	);

	$fet = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) > 0) {
		$nome = $fet['USUA_NOME'];

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome'] = $nome;

 		header('location:../?a=home');
		
	}
	else{
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		header('location:../index.php');
	   
	  }

 ?>