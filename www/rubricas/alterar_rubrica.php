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
		if($_POST["nome"] != "")
		{
			mysqli_query($con,
			"UPDATE rubricas
			SET rubrica = '" . $_POST['nome'] ."'
			WHERE idrub = " . $_GET['id'] . ";")
			or error_validation($con);
			
			mysqli_close($con);
			header("Location: listar_rubricas.php");
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Alterar Rubrica</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				
				<form method="post">
				  <div class="form-group">
				    <label for="nome" <?php form_validation("nome");?> >Nome Rubrica</label>
				    <input id="nome" type="text" class="form-control" placeholder="Rubrica" value="<?php echo $row['rubrica']; ?>" name="nome">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				  <input type="button" value="Voltar" class="btn btn-default" onClick="javascript:history.back(1)">
				</form>
		
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->
	
<?php 
	include "../footer.php";
?>