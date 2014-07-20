<?php 
	session_start();
	$title = "Cancelar Transferencias";
	include "../header.php";
	session_validation();
		
	if(isset($_POST['submit']))
	{
		//obter as transferencias
		$result = mysqli_query($con,
		"SELECT idcontaorigem, idcontadestino, valor
		FROM transferencias
		WHERE idtransf = " . $_GET['id'] . ";")
		or die("Error2: ".mysqli_error($con));
		
		$row = mysqli_fetch_array($result);
		
		
		//retirar o valor da conta que recebeu transferencia
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual - '" . $row['valor'] ."'
		WHERE idconta = " . $row['idcontadestino'] . ";")
		or error_validation($con);
		
		//recuperar valor da conta que fez a transferencia
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual + '" . $row['valor'] ."'
		WHERE idconta = " . $row['idcontaorigem'] . ";")
		or error_validation($con);
		
		//apagar transferencia
		mysqli_query($con,
		"DELETE FROM transferencias
		WHERE idtransf = " . $_GET['id'] . ";")
		or error_validation($con);
		
		mysqli_close($con);
		header("Location: listar_transferencias.php");
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Cancelar Transferências</h2>
	<br />
	
	<p>Deseja cancelar esta transferência?</p>
	
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