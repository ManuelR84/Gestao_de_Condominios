<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Apagar Receitas";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Apagar Receitas</h2>
		<br />
		
		<?php
			
		$result = mysqli_query($con,
				"SELECT descricao
				FROM receitas
				WHERE idreceita = " . $_GET['id'] . ";")
				or die("Error2: ".mysqli_error($con));
		
		$row = mysqli_fetch_array($result);
		
		/*
		$result2 = mysqli_query($con,
				"SELECT valor
				FROM receitas
				WHERE idreceita = " . $_GET['id'] . ";")
						or die("Error2: ".mysqli_error($con));
		
		$row2 = mysqli_fetch_array($result2);
		$_POST['valoraremover'] = $row2;*/
	?>
	
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
		"DELETE FROM receitas
		WHERE idreceita = " . $_GET['id'] . ";")
		or die("Error3: ".mysqli_error($con));
		
		/*
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual - '" . $_POST['valoraremover'] ."'
		WHERE idconta = " . $_POST['idreceita'] . ";")
		or die("Error4: ".mysqli_error($con));
		*/
		
	}
	
	mysqli_close($con);
	include "../footer.php";
?>