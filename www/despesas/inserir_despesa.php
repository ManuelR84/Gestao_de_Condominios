<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Inserir Despesa";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<div class="jumbotron">

	<h2>Inserir Despesa</h2>
	<br />

<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form method="post">
				  <div class="form-group">
				    <label for="dd">Descrição da Despesa</label>
				    <input type="text" class="form-control" placeholder="Descrição" name="dd">
				  </div>
				  
				  <div class="form-group">
				    <label for="rub">Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" name="rub">
				  </div>
				  
				 <div class="form-group">
				    <label for="valordes">Valor da Despesa</label>
				    <input type="text" class="form-control" placeholder="Valor da Despesa" name="valordes">
				  </div>
				  
				  <div class="form-group">
				    <label for="datavendes">Data Vencimento</label>
				    <input type="date" class="form-control" name="datavendes">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagdes">Data Pagamento</label>
				    <input type="date" class="form-control" name="datapagdes">
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
	include "../footer.php";
?>