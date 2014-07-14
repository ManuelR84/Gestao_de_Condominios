<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Rubricas";
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

		<h2>Prestação de Contas por Rubricas</h2>
		<br />
		

	</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>