<?php
	session_start();
	$title = "Nova Rubrica";
	include "../header.php";
	session_validation();
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["rubrica"] != "" and
		$_POST["tipo"] != "")
		{
			mysqli_query($con,
			"INSERT INTO rubricas (rubrica, tipo)
			VALUES ('" . $_POST['rubrica'] ."','" . $_POST['tipo'] ."');")
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
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>