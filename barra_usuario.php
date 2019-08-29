<?php 

	//==================
	// Barra do Usuaário
	//==================

 ?>

 <div class="contrainer-fluid">
 	<div class="row barra-ut">
 		<div class="col-8" style="background: transparent;">
 		</div>
 		<div class="col-4">
 			
 			<?php if (isset($_SESSION['login'])): ?>
 				<label>
 				<i style="color: #00ff00;" class="fa fa-user bu-icon anima"></i>
 				Bem-Vindo(a) <b><?php echo $_SESSION['nome']; ?></b>	
 				</label><br>
 				<a class='btn btn-warning btn-sm m-1 text-right' href='?a=logout'>Sair
 				<i class="fa fa-sign-out"></i></a>
 			<?php else: ?>
 				<label>
 				<i style="color: red;" class="fa fa-user bu-icon"></i>
 					Nenhum Usuário
 				</label><br>
 				<a class='btn btn-info btn-sm m-1 text-right' href='?a=login'>Entrar
 				<i class="fa fa-sign-in"></i></a>
 			<?php endif ?>
 			
 		</div>
 	</div>
 </div>

 <hr>