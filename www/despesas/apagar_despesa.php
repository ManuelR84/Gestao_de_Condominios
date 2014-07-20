<?php
	session_start();
	$title = "Apagar Despesas";
	include "../header.php";
	session_validation();
	
	//obter nome para conferir se apaga
	$result = mysqli_query($con,
			"SELECT descricao
			FROM despesas
			WHERE iddespesa = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
	
	
	if(isset($_POST['submit'])){
	
		//obter valor da despesa
		$result2 = mysqli_query($con,
		"SELECT idcontadestino, valor
		FROM despesas
		WHERE iddespesa = " . $_GET['id'] . ";")
		or error_validation($con);
	
		$row2 = mysqli_fetch_array($result2);
	
	
		//recuperar o valor da despesa a determinada conta
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual + '" . $row2['valor'] . "'
		WHERE idconta = " . $row2['idcontadestino'] . ";")
		or error_validation($con);
	
		//eliminar a despesa
		mysqli_query($con,
		"DELETE FROM despesas
		WHERE iddespesa = " . $_GET['id'] . ";")
		or error_validation($con);
		
		mysqli_close($con);
		header("Location: listar_despesas.php");
	}
?>

<!-- Página de <?php echo $title?> -->
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
<!-- END Página de <?php echo $title?> -->

<?php
	
	mysqli_close($con);
	include "../footer.php";
?>