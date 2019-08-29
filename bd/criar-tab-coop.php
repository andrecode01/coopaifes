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
	$sql_create_tb = "CREATE TABLE COOPERADO (
			COOP_ID				INT 			NOT NULL AUTO_INCREMENT PRIMARY KEY,	
			COOP_NOME 			VARCHAR(45) 	NOT NULL,
			COOP_MATANO			DECIMAL(4)		NOT NULL,
			COOP_MATCUR			VARCHAR(10)		NOT NULL,
			COOP_MATNUM			DECIMAL(4)		NOT NULL,
			COOP_MATRICULA		VARCHAR(20) 	NOT NULL,
			COOP_DATANASC		DATE 			NOT NULL,
			COOP_SEXO 			VARCHAR(1)  	NOT NULL,
			COOP_CPF			DECIMAL(11) 	NOT NULL,
			COOP_RGUF			VARCHAR(11) 	NOT NULL,		
			COOP_ORGX 			VARCHAR(20) 	NOT NULL,		
			COOP_DATAX			DATE 			NOT NULL,		
			COOP_NATU 			VARCHAR(45) 	NOT NULL,	
			COOP_NACIO 			VARCHAR(45)		NOT NULL,		
			COOP_FIL 			VARCHAR(45)		NOT NULL, 		
			COOP_EMAIL 			VARCHAR(45)		NOT NULL,
			
			COOP_ENDERECO 		VARCHAR(100)	NOT NULL,
			COOP_NUM_ENDE		DECIMAL(5)		NOT NULL,
			COOP_COMPLEMENTO 	VARCHAR(100)	NOT NULL,
			COOP_BAIRRO 		VARCHAR(45)		NOT NULL,
			COOP_MUNICIPIO		VARCHAR(45)		NOT NULL,
			COOP_CEP 			DECIMAL(10)		NOT NULL,
			COOP_UF_ENDE		VARCHAR(2)		NOT NULL,
			COOP_TELE_RESI		DECIMAL(15)		NOT NULL,
			COOP_TEL_CELU		DECIMAL(15)		NOT NULL,
			
			COOP_ESTADO_CIVIL			VARCHAR(45)	NOT NULL,
			COOP_NIVEL_ESCOLARIDADE		VARCHAR(45)	NOT NULL,
			COOP_NECESSIDADES_ESPECIAIS VARCHAR(45)	NOT NULL,
			COOP_RENDA					VARCHAR(45)	NOT NULL,
			COOP_RACA_COR				VARCHAR(45)	NOT NULL

	)";

	if (!mysqli_query($con, $sql_create_tb))
 		echo 'Erro ao criar a tabela <em>COOPERADO<em> <hr>' . mysqli_error();	
	

	#	Desconecta do banco de dados
	mysqli_close($con);
	
	header('location: ?a=php-menu');
 ?>
