<?php
	session_start();
	$title = "Listar Rubricas";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">
	
		<h2>Lista de Rubricas</h2>
		<br />

		<!--
		<table class="table table table-hover">
		<tr>
			<th>Id Rubrica</th>
			<th>Rubrica</th>
			<th>Tipo</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php /*
		$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
			or die("Error1: ".mysqli_error($con));
		
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
			
		$result = mysqli_query($con,"SELECT * FROM rubricas") or die("Error2: ".mysqli_error($con));
		
		
		while($row = mysqli_fetch_array($result)) {
	  		echo "<tr>";
	  		echo "<td>" . $row['idrub'] . "</td>";
			echo "<td>" . $row['rubrica'] . "</td>";
			echo "<td>" . $row['tipo'] . "</td>";
			echo "<td><a href=alterar_rubrica.php?id=" . $row['idrub'] . ">Alterar</a></td>";
			echo "<td><a href=apagar_rubrica.php?id=" . $row['idrub'] . ">Apagar</a></td>";
		}
		*/?>
		
			</tr>
		</table>-->

	</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>