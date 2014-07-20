<?php
	session_start();
	$title = "Listar Rubricas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT * FROM rubricas")
			or error_validation($con);
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Lista de Rubricas</h2>
	<br />
	<table class="table table table-hover table-rubricas">
		<tr>
			<th>Id</th>
			<th>Rubrica</th>
			<th>Tipo</th>
			<th></th>
			<th></th>
		</tr>
	
		<?php
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
		  		echo "<td>" . $row['idrub'] . "</td>";
				echo "<td>" . $row['rubrica'] . "</td>";
				echo "<td>" . $row['tipo'] . "</td>";
				echo "<td><a href=alterar_rubrica.php?id=" . $row['idrub'] . ">Alterar</a></td>";
				echo "<td><a href=apagar_rubrica.php?id=" . $row['idrub'] . ">Apagar</a></td>";
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