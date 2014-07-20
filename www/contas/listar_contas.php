<?php
	session_start();
	$title = "Listar Contas";
	include "../header.php";
	session_validation();
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Lista de Contas Bancárias</h2>
	<br />

	<table class="table table table-hover">
		<tr>
			<th>Id</th>
			<th>Descrição Conta</th>
			<th>Numero Conta</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php
			$result = mysqli_query($con,"SELECT * FROM contas") or die("Error2: ".mysqli_error($con));
			
			while($row = mysqli_fetch_array($result)) {
		  		echo "<tr>";
		  		echo "<td>" . $row['idconta'] . "</td>";
				echo "<td>" . $row['descricaoconta'] . "</td>";
				echo "<td>" . $row['numeroconta'] . "</td>";
				echo "<td><a href=alterar_conta.php?id=" . $row['idconta'] . ">Alterar</a>";
				echo "<td><a href=apagar_conta.php?id=" . $row['idconta'] . ">Apagar</a>";
				echo "</td>";
			}
		?>
	</table>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>