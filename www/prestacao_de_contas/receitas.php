<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Receitas";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Prestação de Contas por Receitas</h2>
		<br />
		

	</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>