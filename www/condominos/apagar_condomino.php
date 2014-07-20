<?php 
	session_start();
	$title = "Apagar Condominos";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT nome
			FROM condominos
			WHERE idcond = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"DELETE FROM condominos
		WHERE idcond = " . $_GET['id'] . ";")
		or error_validation($con);
		
		mysqli_close($con);
		header("Location: listar_condominos.php");
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Apagar Condóminos</h2>
	<br />
	
	<p>Deseja apagar: "<u><?php echo $row['nome']; ?></u>" da lista de Condominos?</p>
	
	<form method="post">
		<input type="button" value="Não" name="nao" class="btn btn-default" onClick="javascript:history.back(1)">
		<button type="submit" name="submit" class="btn btn-default">Sim</button>
	</form
	
</div>
<!-- END Página de <?php echo $title?> -->

<?php
	mysqli_close($con);
	include "../footer.php";
?>