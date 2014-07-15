<?php 
	session_start();
	$title = "Alterar Rubricas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT * FROM rubricas WHERE idrub = " .$_GET['id']. ";")
			or error_validation($con);
		
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"UPDATE rubricas
		SET rubrica = '" . $_POST['nomerub'] ."', tipo = '" . $_POST['tipo'] ."'
		WHERE idrub = " . $_GET['id'] . ";")
		or error_validation($con);
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Rubrica</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				
				<form method="post">
				  <div class="form-group">
				    <label for="nomerub">Nome Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" value="<?php echo $row['rubrica']; ?>" name="nomerub">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Rubrica</label>
				    <select class="form-control" name="tipo">
					    <option value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
						<option value="Despesa">Despesa</option>
						<option value="Receita">Receita</option>
					</select>
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
		
			</div>
		</div>
	</div>
</div>
	
</div>

<?php 
	mysqli_close($con);
	include "../footer.php";
?>