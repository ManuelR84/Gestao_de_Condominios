<?php
	session_start();
	$title = "Apagar Receitas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT descricao
			FROM receitas
			WHERE idreceita = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
	
	/*
	 $result2 = mysqli_query($con,
	 		"SELECT valor
	 		FROM receitas
	 		WHERE idreceita = " . $_GET['id'] . ";")
	or error_validation($con);
	
	$row2 = mysqli_fetch_array($result2);*/
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"DELETE FROM receitas
		WHERE idreceita = " . $_GET['id'] . ";")
		or error_validation($con);
	
		/*
		 mysqli_query($con,
		 		"UPDATE contas
		 		SET saldoatual = saldoatual - '" . $_POST['valoraremover'] . "'
		 		WHERE idconta = " . $_POST['idreceita'] . ";")
		or error_validation($con);
		*/
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Apagar Receitas</h2>
	<br />
	
	<p>Deseja apagar: "<u><?php echo $row['descricao']; ?></u>" da lista de Receitas?</p>
	
	<form method="post">
		<!-- /<input name="valoraremover" value="<?php/* $row2['valor']*/?>">-->
		<input type="button" value="Não" name="nao" class="btn btn-default" onClick="javascript:history.back(1)">
		<button type="submit" name="submit" class="btn btn-default">Sim</button>
	</form
		
</div>
<!-- /container -->

<?php
	mysqli_close($con);
	include "../footer.php";
?>