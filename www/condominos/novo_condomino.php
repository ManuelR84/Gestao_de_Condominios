<?php
	session_start();
	$title = "Novo Condomino";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Condómino</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form role="form">
				  <div class="form-group">
				    <label for="nomecondo">Nome do condómino</label>
				    <input type="text" class="form-control" placeholder="Nome" name="nomecondo">
				  </div>
				  
				  <div class="form-group">
				    <label for="cccondo">Cartão de cidadão</label>
				    <input type="text" class="form-control" placeholder="CC" name="cccondo">
				  </div>
				  
				 <div class="form-group">
				    <label for="moradacondo">Morada do condómino</label>
				    <input type="text" class="form-control" placeholder="Morada" name="moradacondo">
				  </div>
				  
				  <div class="form-group">
				    <label for="telecondo">Telefone</label>
				    <input type="number" class="form-control" placeholder="Telefone" name="telecondo">
				  </div>
				  
				   <div class="form-group">
				    <label for="emailcondo">E-mail</label>
				    <input type="email" class="form-control" placeholder="E-mail" name="emailcondo">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default">Inserir</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include_once "../footer.php";
?>