<?php 
	session_start();
	$_SESSION["login"] = false;	
	$title = "Gestor de Condomínios";
	include "header.php";
?>
	<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">
		<h2>Gestor de Condomínios Online</h2>
		<p>Bem-vindo ao nosso sistema de gestão de condomínios online.</p>
	</div>
	
<?php 
	include_once "footer.php";
?>