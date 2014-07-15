<?php
	session_start();
	$title = "Saldo de Contas";
	include "../header.php";
	session_validation();
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Saldo de Contas</h2>
	<br />

</div>
<!-- /container -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>