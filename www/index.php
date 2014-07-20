<?php 
	session_start();
	$title = "Gestor de Condomínios";
	include "header.php";
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">
	<h2>Gestor de Condomínios Online</h2>
	<p>Bem-vindo ao nosso sistema de gestão de condomínios online.</p>
</div>
<!-- END Página de <?php echo $title?> -->
	
<?php 
	include_once "footer.php";
?>