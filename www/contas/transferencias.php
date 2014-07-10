<?php 
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Transferências";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Transferências Bancárias</h2>
	<br />

	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form role="form">
				  <div class="form-group">
				    <label for="idcontaori">Número Conta Origem</label>
				    <input type="number" class="form-control" placeholder="Número Conta Origem" name="idcontaori">
				  </div>
				  
				 <div class="form-group">
				    <label for="idcontades">Número Conta Destino</label>
				    <input type="number" class="form-control" placeholder="Número Conta Destino" name="idcontades">
				  </div>
				  
				 <div class="form-group">
				    <label for="valortrans">Valor Transferência</label>
				    <input type="text" class="form-control" placeholder="Valor Transferência" name="valortrans">
				  </div>
				  
				  <div class="form-group">
				    <label for="datatrans">Data Transferência</label>
				    <input type="date" class="form-control" name="datatrans">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default">Transferir</button>
				</form>
	
			</div>
		</div>
	</div>
	
</div>

<?php 
	include "../footer.php";
?>