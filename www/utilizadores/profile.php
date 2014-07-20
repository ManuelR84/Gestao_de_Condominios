<?php
	session_start();
	$title = "Profile";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT * FROM utilizadores
			WHERE email='".$_SESSION['user_email']."';")
			or error_validation($con);
?>

<div class="jumbotron">

	<h2>Profile</h2>
	<br />
	
	<table class="table table table-hover">
		<tr>
			<th>Nome de Conta</th>
			<th>E-mail</th>
			<th>Nome do Gestor</th>
			<th>Nome do Condominio</th>
			<th>Morada</th>
			<th>Código Postal</th>
		</tr>
	</table>
	
	<?php
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
	  		echo "<td>" . $row['nomeconta'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['nomegestor'] . "</td>";
			echo "<td>" . $row['nomecondominio'] . "</td>";
			echo "<td>" . $row['morada'] . "</td>";
			echo "<td>" . $row['codigopostal'] . "</td>";
			echo "</tr>";
		}
	?>
	
	<br />
	<a href="alterar_profile.php" class="btn btn-default">Alterar</a>
</div>

<?php 
	include "../footer.php";
?>