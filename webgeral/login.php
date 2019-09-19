<?php 

	#	Login

 	if (isset($_SESSION['login'])) 
 	header('location:?a=home');

 ?>
 
 <script>
 	document.title = "Coopa-Ifes | Login";
 </script>
	
 <div class="container-fluid">
 	
 	<div class="row">
 	<div class="col-4"></div>

	<form  class="col-4 mb-3 mt-3 p-4 login" method="post" action="sessao/ope-sessao.php">

	<fieldset>
		<label>Login </label><br>
		<input type="text" name="login" id="login"  /><br><br>
		<label>Senha</label><br>
		<input type="password" name="senha" id="senha" /><br>
		
		<div class="control-group">
        	<label class="m-1 control control-checkbox">
            	Exibir Senha
           	<input type="checkbox" id="ck" onclick="check();" />
            <div class="ml-1 control_indicator"></div>
        	</label>
    	</div>

		<input class="btn btn-warning btn-sm mt-4 mb-2" type="submit" value="Entrar  "  />
	</fieldset>
	</form>
 	</div>
 </div>
</div>

<script>
	var ck = document.getElementById('ck');
	var pass = document.getElementById('senha');
	
	function check() {
		if (ck.checked)
			pass.type = 'text';
		else
			pass.type = 'password';
	}
</script>