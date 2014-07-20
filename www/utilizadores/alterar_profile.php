<?php
	session_start();
	$title = "Alterar Profile";
	include "../header.php";
	session_validation();
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Alterar Profile</h2>
	<br />
	
	<table class="table table table-hover">
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
		
			<?php
				$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
					or die("Error1: ".mysqli_error($con));
				
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
					
				$result = mysqli_query($con, "SELECT * FROM condominos")
				or die("Error2: ".mysqli_error($con));
				
				while($row = mysqli_fetch_array($result)) 
				{
					echo "<tr>";
			  		echo "<td>" . $row['idcond'] . "</td>";
					echo "<td>" . $row['nome'] . "</td>";
					echo "<td>" . $row['cc'] . "</td>";
					echo "<td>" . $row['morada'] . "</td>";
					echo "<td>" . $row['contacto'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td><a href=alterar_condomino.php?id=" . $row['idcond'] . ">Alterar</a></td>";
					echo "<td><a href=apagar_condomino.php?id=" . $row['idcond'] . ">Apagar</a></td>";
					echo "</tr>";
				}
			?>
			
		</table>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>