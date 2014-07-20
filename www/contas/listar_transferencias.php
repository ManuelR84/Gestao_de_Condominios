<?php
	session_start();
	$title = "Listar Transferencias";
	include "../header.php";
	session_validation();
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Lista de Transferências Bancárias</h2>
	<br />

	<table class="table table table-hover">
		<tr>
			<th>ID</th>
			<th>Número Conta Origem</th>
			<th>Nome Conta Origem</th>
			<th>Número Conta Destino</th>
			<th>Nome Conta Destino</th>
			<th>Valor</th>
			<th>Data</th>
			<th></th>
		</tr>
		
		<?php
			$result = mysqli_query($con,
						"SELECT idtransf, descricaoconta, numeroconta
						FROM transferencias, contas
						WHERE idcontaorigem = idconta
						ORDER BY idtransf;")
						or die("Error2: ".mysqli_error($con));
			
			$result2 = mysqli_query($con,"SELECT idtransf, descricaoconta, numeroconta, valor, data
						FROM transferencias, contas
						WHERE idcontadestino = idconta
						ORDER BY idtransf;")
						or die("Error2: ".mysqli_error($con));
			
			while($row = mysqli_fetch_array($result) and $row2 = mysqli_fetch_array($result2)) {
				
		  		echo "<tr>";
		  		echo "<td>" . $row['idtransf'] . "</td>";
		  		echo "<td>" . $row['numeroconta'] . "</td>";
		  		echo "<td>" . $row['descricaoconta'] . "</td>";
		  		echo "<td>" . $row2['numeroconta'] . "</td>";
		  		echo "<td>" . $row2['descricaoconta'] . "</td>";
				echo "<td>" . $row2['valor'] . "</td>";
				echo "<td>" . $row2['data'] . "</td>";
				echo "<td><a href=apagar_transferencias.php?id=" . $row['idtransf'] . ">Cancelar</a></td>";
				echo "</td>";
			}
		?>
	</table>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>