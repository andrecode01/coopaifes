 <?php 

	// 	==========================
	//	MENU PHP-BD
	//	==========================
	
	// echo '<div class="m-3 alert alert-success text-center">Base de dados criada com sucesso.</div>';
		
 ?>


 <div class="container-fluid mb-2" style="display: flex; justify-content: center;">
 	<div class="w-75">

 		<div class="row mt-3" style="display: flex; border: 1px dashed #000; 
 		justify-content: center;">

 			<a href="?a=criar-bd" class="col-10 btn btn-warning m-1 btn-block">
 				Criar BD
 			</a><hr>
 			<a href="?a=criar-tab-usua" class="w-25 btn btn-warning m-1 btn-block">
 				Criar Tabela Usuario
 			</a>
 			<a href="?a=criar-tab-coop" class="w-25 btn btn-warning m-1 btn-block">
 				Criar Tabela Cooperado
 			</a>
 		</div>

 		<div class="col-12 mt-2 mb-2 p-3 text-center" style="
 			color: #000;
 			background: linear-gradient(to right,#eee, transparent, #eee);
 			">
 			<form method="post" action="?a=inserir-usua">
 				<fieldset style="">
	 				<label>ID: <br><strong>+ AUTO INCREMENTO +</strong></label><br>
	 				<label class="text-justify">Nome:
	 					<input type="text" name="nome" id="nome">
	 				</label><br>
	 				<label class="">Radio:<br>
	 					<input type="radio" name="radio" value="Marcou 1" checked>Marcar 1
	 					<input type="radio" name="radio" value="Marcou 2">Marcar 2
	 				</label><br>
	 				<label>Selecione:<br>
	 					<select name="selecao">
	 						<option value="não selecionou">selecionar...</option>
	 						<option value="Selecionou 1">Selecionar 1</option>
	 						<option value="Selecionou 2">Selecionar 2</option>
	 					</select>
	 				</label><br>
	 				<label class="text-justify">Login:
	 					<input type="text" name="login" id="login">
	 				</label><br>
	 				<label class="text-justify">Senha:
	 					<input type="password" name="senha" id="senha">
	 				</label><br> 				
	 				<label class="text-justify">E-Mail:
	 					<input type="email" name="email" id="email">
	 				</label>
 					<input class="btn btn-warning btn-sm mt-4 mb-2" type="submit" value="Inserir Usuário"/>	
 			</fieldset>
 			</form>
 		</div>
 	</div>
 </div>