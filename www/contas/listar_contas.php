<?php
	session_start();
	$title = "Listar Contas";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Lista de Contas Bancárias</h2>
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
		$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
			or die("Error1: ".mysqli_error($con));
		
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
			
		$result = mysqli_query($con,"SELECT * FROM contas") or die("Error2: ".mysqli_error($con));
		
		
		while($row = mysqli_fetch_array($result)) {
	  		echo "<tr>";
	  		echo "<td>" . $row['idconta'] . "</td>";
			echo "<td>" . $row['descricaoconta'] . "</td>";
			echo "<td>" . $row['numeroconta'] . "</td>";
			echo "<td>" . $row['saldoinicial'] . "</td>";
			echo "<td>" . $row['saldoatual'] . "</td>";
			echo "<td><a href=alterar_conta.php?id=" . $row['idconta'] . ">Alterar</a></td>";
		}
		?>
		
			</tr>
		</table>
	
	
</div>

<?php 
	include "../footer.php";
?>