 <?php

	$configs = include('config.php');

	#	Conecta ao banco de dados
	$con = mysqli_connect(
		$configs['BD_HOST'], 
		$configs['BD_USERNAME'],
		$configs['BD_PASSWORD']
	);

	if (!$con) {
    	die('Sem Conexão <hr>' . mysqli_error());
	}

	# 	Destroi Banco de dados caso ele exista
	if(!mysqli_query($con, 'DROP DATABASE IF EXISTS '.$configs['BD_DATABASE']))
	 echo mysqli_error();
	
	#	Cria o banco de dados
	if (!mysqli_query($con, 'CREATE DATABASE '.$configs['BD_DATABASE']))
     echo mysqli_error();

	#	Desconecta do banco de dados
	mysqli_close($con);

	header('location: ?a=php-menu');
	
 ?>