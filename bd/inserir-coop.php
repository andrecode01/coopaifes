<?php

	#	Inserir Cooperado
	
	$nome 		= $_POST['nome'];
	$matAno		= $_POST['nmat1'];
	$matCur		= $_POST['nmat2'];
	$matNum		= $_POST['nmat3'];
	$matricula	= $matAno.$matCur.$matNum;
	$cpf		= $_POST['cpf'];
	$datanasci 	= $_POST['datanasci'];
	$sexo		= $_POST['sexo'];
	$rguf		= $_POST['rguf'];
	$orgx		= $_POST['orgx'];
	$datax		= $_POST['datax'];
	$natu		= $_POST['natu'];
	$nacio		= $_POST['nacio'];
	$fil		= $_POST['fil'];
	$email		= $_POST['email'];

	$end		= $_POST['end'];
	$endnum 	= $_POST['endnum'];
	$endcomp	= $_POST['endcomp'];
	$endbairro	= $_POST['endbairro'];	
	$endmun		= $_POST['endmun'];
	$endcep		= $_POST['endcep'];
	$enduf		= $_POST['enduf'];
	$telres		= $_POST['telres'];
	$telcel		= $_POST['telcel'];
	
	$ec 		= $_POST['ec'];
	$ne 		= $_POST['ne'];
	$nec 		= $_POST['nec'];
	$rf 		= $_POST['rf'];
	$rc 		= $_POST['rc'];	

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
	"INSERT INTO COOPERADO(COOP_NOME,		COOP_MATANO,	COOP_MATCUR,	COOP_MATNUM,
				 		   COOP_MATRICULA,	COOP_DATANASC,	COOP_SEXO,		COOP_CPF,
				 		   COOP_RGUF,		COOP_ORGX,		COOP_DATAX,		COOP_NATU,	
				 		   COOP_NACIO,		COOP_FIL, 		COOP_EMAIL, 	COOP_ENDERECO,
				 		   COOP_NUM_ENDE,	COOP_COMPLEMENTO, 				COOP_BAIRRO,
				 		   COOP_MUNICIPIO,	COOP_CEP,		COOP_UF_ENDE,	COOP_TELE_RESI,
				 		   COOP_TEL_CELU,	COOP_ESTADO_CIVIL,
				 		   COOP_NIVEL_ESCOLARIDADE,			COOP_NECESSIDADES_ESPECIAIS,
				 		   COOP_RENDA,		COOP_RACA_COR)
	 VALUES('$nome', '$matAno', '$matCur', '$matNum', '$matricula', '$datanasci','$sexo', '$cpf',
			'$rguf', '$orgx', '$datax', '$natu', '$nacio', '$fil', '$email', '$end', '$endnum',
			'$endcomp', '$endbairro', '$endmun', '$endcep', '$enduf', '$telres', '$telcel', '$ec',
			'$ne', '$nec', '$rf', '$rc')";

	if(!mysqli_query($con, $sql_insert))
 		echo 'Erro ao inserir <hr>' . mysqli_error();

	#	Desconecta do banco de dados
	mysqli_close($con);
	
	// header('location: ?a=home');
 ?>