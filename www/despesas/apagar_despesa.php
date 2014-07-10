<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Apagar Despesas";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Apagar Despesas</h2>
		<br />
		
	</div>

</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>