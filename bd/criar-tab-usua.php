<?php

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

	#	Cria Tabela Usuario
	$sql_create_tb = "CREATE TABLE USUARIO (
			USUA_ID			INT 		NOT NULL AUTO_INCREMENT PRIMARY KEY,	
			USUA_NOME 		VARCHAR(45) NOT NULL,
			USUA_LOGIN		VARCHAR(20) NOT NULL,
			USUA_RADIO		VARCHAR(20),
			USUA_SELECT		VARCHAR(20),
			USUA_SENHA 		VARCHAR(16) NOT NULL,
			USUA_EMAIL		VARCHAR(35)
	)";


	if (!mysqli_query($con, $sql_create_tb))
 		echo 'Erro ao criar a tabela USUARIO <hr>' . mysqli_error();	
	
	$sql_insert = 
	"INSERT INTO USUARIO(USUA_NOME, USUA_LOGIN, USUA_SENHA)
	 VALUES('Admin André', 'admin', 'admin8800')";

	if(!mysqli_query($con, $sql_insert))
 		echo 'Erro ao inserir <hr>' . mysqli_error();

	#	Desconecta do banco de dados
	mysqli_close($con);
	
	header('location: ?a=php-menu');
 ?>
