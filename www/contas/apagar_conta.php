<?php 
	session_start();
	$title = "Apagar Contas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT descricaoconta
			FROM contas
			WHERE idconta = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"DELETE FROM contas
		WHERE idconta = " . $_GET['id'] . ";")
		or error_validation($con);
		
		mysqli_close($con);
		header("Location: listar_contas.php");
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Apagar Conta</h2>
	<br />
	
	<p>Deseja apagar: "<u><?php echo $row['descricaoconta']; ?></u>" da lista de Contas?</p>
	
	<form method="post">
		<input type="button" value="Não" name="nao" class="btn btn-default" onClick="javascript:history.back(1)">
		<button type="submit" name="submit" class="btn btn-default">Sim</button>
	</form
	
</div>
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>