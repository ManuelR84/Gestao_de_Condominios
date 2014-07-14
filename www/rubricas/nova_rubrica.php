<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Nova Rubrica";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(!isset($_POST["rubrica"])){
		}elseif(!isset($_POST["tipo"])){
			//codigo para enviar para a db
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Rubrica</h2>
	<br />
		
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form method="post">
				  <div class="form-group">
				    <label for="nomerub">Nome Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" name="rubrica">
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
				  <button type="submit" name="submit" class="btn btn-default">Inserir</button>
				</form>
		
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>