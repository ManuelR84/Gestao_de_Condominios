<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Inserir Receita";
	include "../header.php";
?>

<div class="jumbotron">

	<h2>Inserir Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form role="form">
				  <div class="form-group">
				    <label for="dr">Descrição da Receita</label>
				    <input type="text" class="form-control" placeholder="Descrição" name="dr">
				  </div>
				  
				  <div class="form-group">
				    <label for="rub">Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" name="rub">
				  </div>
				  
				 <div class="form-group">
				    <label for="valorres">Valor da Receita</label>
				    <input type="text" class="form-control" placeholder="Valor da Receita" name="valorres">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagrec">Data Pagamento</label>
				    <input type="date" class="form-control" name="datapagrec">
				  </div>
				  
				   <div class="form-group">
				    <label for="contades">Conta destino</label>
				    <input type="number" class="form-control" placeholder="ID Conta" name="contades">
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