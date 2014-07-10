<?php 
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}
	
	$title = "Apagar Condominos";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Apagar Condóminos</h2>
	<br />
	
</div>

<?php 
	include "../footer.php";
?>