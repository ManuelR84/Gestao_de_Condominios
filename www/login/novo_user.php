<?php
	session_start();
	$title = "Novo Utilizador";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Novo Utilizador</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nome de Conta</label>
				    <input type="text" class="form-control" placeholder="Nome" name="username">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">E-mail</label>
				    <input type="text" class="form-control" placeholder="Email" name="email">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="text" class="form-control" placeholder="Password" name="password">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Registar</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>
