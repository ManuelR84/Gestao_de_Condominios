<?php 
	$title = "Listar Condominos";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Lista de Condóminos</h2>
	<br />
	
	
	<table class="table table table-hover">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Cartão Cidadão</th>
			<th>Morada</th>
			<th>Contacto</th>
			<th>E-mail</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php
		$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
			or die("Error1: ".mysqli_error($con));
		
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
			
		$result = mysqli_query($con,"SELECT * FROM condominos") or die("Error2: ".mysqli_error($con));
		
		
		while($row = mysqli_fetch_array($result)) {
	  		echo "<tr>";
	  		echo "<td>" . $row['idcond'] . "</td>";
			echo "<td>" . $row['nome'] . "</td>";
			echo "<td>" . $row['cc'] . "</td>";
			echo "<td>" . $row['morada'] . "</td>";
			echo "<td>" . $row['contacto'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td><a href=alterar_condomino.php?id=" . $row['idcond'] . ">Alterar</a></td>";
			echo "<td><a href=apagar_condomino.php?id=" . $row['idcond'] . ">Apagar</a></td>";
		}
		?>
		
			</tr>
		</table>

</div>

<?php 
	include "../footer.php";
?>