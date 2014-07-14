<?php 
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Alterar Conta";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Conta Bancária</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<?php
					$result = mysqli_query($con,
						"SELECT descricaoconta, numeroconta
						FROM contas
						WHERE idconta = " . $_GET['id'] . ";") 
						or die("Error2: ".mysqli_error($con));
					
					$row = mysqli_fetch_array($result);
				?>

				<form method="post">
				  <div class="form-group">
				    <label for="descconta">Descrição da Conta Bancária</label>
				    <input type="text" class="form-control" placeholder="Descrição da Conta" value="<?php echo $row['descricaoconta'] ?>" name="descconta">
				  </div>
				  
				  <div class="form-group">
				    <label for="numconta">Numero da Conta Bancária</label>
				    <input type="number" class="form-control" placeholder="Número da Conta" value="<?php echo $row['numeroconta'] ?>" name="numconta">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default" name="submit" >Alterar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>

<?php

	if(isset($_POST['submit'])){
		mysqli_query($con,"UPDATE contas
			SET descricaoconta = '" . $_POST['descconta'] ."', numeroconta = '" . $_POST['numconta'] ."'
			WHERE idconta = " . $_GET['id'] . ";")
			or die("Error2: ".mysqli_error($con));
	}

	mysqli_close($con);
	include "../footer.php";
?>