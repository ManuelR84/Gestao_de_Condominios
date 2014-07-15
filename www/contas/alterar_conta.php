<?php 
	session_start();
	$title = "Alterar Conta";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT descricaoconta, numeroconta
			FROM contas
			WHERE idconta = " . $_GET['id'] . ";")
			or error_validation($con);
		
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit'])){
		mysqli_query($con,"UPDATE contas
		SET descricaoconta = '" . $_POST['descconta'] ."', numeroconta = '" . $_POST['numconta'] ."'
		WHERE idconta = " . $_GET['id'] . ";")
		or error_validation($con);
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Conta Bancária</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form method="post">
				  <div class="form-group">
				    <label for="descconta">Descrição da Conta Bancária</label>
				    <input id="descconta" type="text" class="form-control" placeholder="Descrição da Conta" value="<?php echo $row['descricaoconta'] ?>" name="descconta">
				  </div>
				  
				  <div class="form-group">
				    <label for="numconta">Numero da Conta Bancária</label>
				    <input id="numconta" type="number" class="form-control" placeholder="Número da Conta" value="<?php echo $row['numeroconta'] ?>" name="numconta">
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default" name="submit" >Alterar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>

<?php
	mysqli_close($con);
	include "../footer.php";
?>