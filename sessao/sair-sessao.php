<?php 

	#	Saindo da Sessão
	
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');

 ?>