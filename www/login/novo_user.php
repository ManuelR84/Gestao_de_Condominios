<?php
	session_start();
	$title = "Novo Utilizador";
	include_once "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nome de Conta</label>
				    <input type="text" class="form-control" placeholder="Nome" name="AAA">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">E-mail</label>
				    <input type="text" class="form-control" placeholder="Morada" name="AAA">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="text" class="form-control" placeholder="CC" name="AAA">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include_once "../footer.php";
?>
