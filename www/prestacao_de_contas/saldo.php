<?php
	session_start();
	$title = "Saldo de Contas";
	include "../header.php";
	session_validation();
	
	$result2 = mysqli_query($con,
	"SELECT sum(saldoatual) FROM contas;")
	or error_validation($con);
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Saldo de Contas</h2>
	<br />

	<table class="table table table-hover">
		<tr>
			<th>Id</th>
			<th>Descrição Conta</th>
			<th>Numero Conta</th>
			<th>Saldo Inicial</th>
			<th>Saldo Atual</th>
			<th></th>
		</tr>
		
		<?php
			$result = mysqli_query($con,"SELECT * FROM contas") or die("Error2: ".mysqli_error($con));
			
			while($row = mysqli_fetch_array($result)) {
		  		echo "<tr>";
		  		echo "<td>" . $row['idconta'] . "</td>";
				echo "<td>" . $row['descricaoconta'] . "</td>";
				echo "<td>" . $row['numeroconta'] . "</td>";
				echo "<td>" . $row['saldoinicial'] . "</td>";
				echo "<td>" . $row['saldoatual'] . "</td>";
				echo "</td>";
			}
		?>
	</table>
		
	<p>Valor total das contas:
		<?php
			$row2 = mysqli_fetch_array($result2);
			echo round($row2['sum(saldoatual)'], 2);
		?>
		€
	</p>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>