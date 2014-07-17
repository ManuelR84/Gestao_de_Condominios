<?php
	session_start();
	$title = "Profile";
	include "../header.php";
	session_validation();
?>

<div class="jumbotron">

	<h2>Profile</h2>
	<br />
	
	<table class="table table table-hover">
		<tr>
			<th>Nome Conta</th>
			<th>E-mail</th>
			<th>Nome do Gestor</th>
			<th>Nome do Condómino</th>
			<th>Morada</th>
			<th>Código Postal</th>
		</tr>
	</table>	
</div>

<?php 
	mysqli_close($con);
	include "../footer.php";
?>