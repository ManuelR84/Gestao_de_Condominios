<?php 
	session_start();
	$title = "Transferências";
	include "../header.php";
	session_validation();
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["corigem"] != "" and
		$_POST["cdestino"] != "" and
		$_POST["valor"] != "" and
		$_POST["data"] != "")
		{
			//query de envio do formulario para a base de dados
			mysqli_query($con,
			"INSERT INTO transferencias (xxx, xxx, xxx, xxx, xxx, xxx)
			VALUES ('" . $_POST['corigem'] ."',
					'" . $_POST['cdestino'] ."',
					'" . $_POST['valor'] ."',
					'" . $_POST['data'] ."');")
			or error_validation($con);
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
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
				    <label for="corigem">Número Conta Origem</label>
				    <input id="corigem" type="number" class="form-control" placeholder="Número Conta Origem" name="corigem">
				  </div>
				  
				 <div class="form-group">
				    <label for="cdestino">Número Conta Destino</label>
				    <input id="cdestino" type="number" class="form-control" placeholder="Número Conta Destino" name="cdestino">
				  </div>
				  
				 <div class="form-group">
				    <label for="valor">Valor Transferência</label>
				    <input id="valor" type="text" class="form-control" placeholder="Valor Transferência" name="valor">
				  </div>
				  
				  <div class="form-group">
				    <label for="data">Data Transferência</label>
				    <input id="data" type="date" class="form-control" name="data">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default">Transferir</button>
				</form>
	
			</div>
		</div>
	</div>
</div>

<?php 
	mysqli_close($con);
	include "../footer.php";
?>