<?php
	session_start();
	$title = "Apagar Despesas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT descricao
			FROM despesas
			WHERE iddespesa = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Apagar Despesas</h2>
		<br />
	
	<p>Deseja apagar: "<u><?php echo $row['descricao']; ?></u>" da lista de Receitas?</p>
	
	<form method="post">
		<input type="button" value="Não" name="nao" class="btn btn-default" onClick="javascript:history.back(1)">
		<button type="submit" name="submit" class="btn btn-default">Sim</button>
	</form
		
	</div>

</div>
<!-- /container -->

<?php
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"DELETE FROM despesas
		WHERE iddespesa = " . $_GET['id'] . ";")
		or die("Error3: ".mysqli_error($con));
		
	}
	
	mysqli_close($con);
	include "../footer.php";
?>