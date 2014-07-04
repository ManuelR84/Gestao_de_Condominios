<?php
	session_start();
	$title = "Nova Rubrica";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Rubrica</h2>
	<br />
		
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form role="form">
				  <div class="form-group">
				    <label for="nomerub">Nome Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" name="nomerub">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Rubrica</label>
				    <select class="form-control" name="tipo">
					    <option value="">Escolha tipo...</option>
						<option value="Despesa">Despesa</option>
						<option value="Receita">Receita</option>
					</select>
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
	include "../footer.php";
?>