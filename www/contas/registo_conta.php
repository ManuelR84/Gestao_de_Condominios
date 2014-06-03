<?php 
	$title = "Registo de Conta";
	include_once "../header.php";
?>

<div class="jumbotron">

	<h2>Registo de Contas Bancárias</h2>
	<br />

	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form role="form">
				  <div class="form-group">
				    <label for="descconta">Descrição da Conta Bancária</label>
				    <input type="text" class="form-control" placeholder="Descrição da Conta" name="descconta">
				  </div>
				  
				  <div class="form-group">
				    <label for="numconta">Numero da Conta Bancária</label>
				    <input type="number" class="form-control" placeholder="Número da Conta" name="numconta">
				  </div>
				  
				 <div class="form-group">
				    <label for="saldoini">Saldo Inicial</label>
				    <input type="text" class="form-control" placeholder="Saldo Inicial" name="saldoini">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default">Registar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include_once "../footer.php";
?>