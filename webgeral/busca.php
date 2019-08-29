<?php 

    #	Busca
    
    if (!isset($_SESSION['login'])) 
    header('location:?a=login');

	include_once('func/func-busca.php');

	$filtro = false;
?>

<script>
    document.title = "Coopa-Ifes | Busca";
</script>

<div class="container-fluid mb-2 mt-4">
	
	<div class="text-center headerb">
		<a class="" href="?a=busca"><h1 class="txtwow">Busca</h1></a>
	</div>

	<hr>

	<form class="formb" action="" method="post" onkeypress="this.submit();">
		<fieldset>
			<div>
			<label>Filtrar por Nome</label><br>
			<input type="text" name="filtro">
			<button type="submit">Filtrar <i class="fa fa-filter"></i></button>
			<!--<input type="button" value="Filtrar">-->
			</div>
		</fieldset>
	</form>

	<?php 
		if(count($_POST) > 0)
		$filtro = $_POST["filtro"];
	?>

	<div class="busca">
		<div>
			<table class="mb-4">
				<tr>
				<th>Perfil Completo</th>	
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Situação</th>
				<th>Sexo</th>
				<th>CPF</th>
				</tr>
					<?php funcoes::listar($filtro); ?>
			</table>
		</div>
	</div>
</div>