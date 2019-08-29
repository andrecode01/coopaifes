<?php
	

	$nome 		= $_POST['nome'];
	$login 		= $_POST['login'];
	$radio 		= $_POST['radio'];
	$selecao 	= $_POST['selecao'];
	$senha 		= $_POST['senha'];
	$email 		= $_POST['email'];


	$configs = include('config.php');

	#	Conecta ao banco de dados
	$con = mysqli_connect(
		$configs['BD_HOST'], 
		$configs['BD_USERNAME'],
		$configs['BD_PASSWORD'],
		$configs['BD_DATABASE']
	);

	if (!$con) {
    	die('Sem Conexão <hr>' . mysqli_error());
	}

	#	Insere Usuario
	$sql_insert = 
	"INSERT INTO USUARIO(USUA_NOME, USUA_LOGIN, USUA_RADIO, USUA_SELECT, USUA_SENHA, USUA_EMAIL)
	 VALUES('$nome', '$login', '$radio', '$selecao', '$senha', '$email')";

	if(!mysqli_query($con, $sql_insert))
 		echo 'Erro ao inserir <hr>' . mysqli_error();

	#	Desconecta do banco de dados
	mysqli_close($con);
	
	header('location: ?a=php-menu');
 ?>