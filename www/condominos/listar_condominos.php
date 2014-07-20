<?php
	session_start();
	$title = "Listar Condominos";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con, "SELECT * FROM condominos order by idcond;")
	or error_validation($con);
?>

<!-- Página de <?php echo $title?> -->
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
	include "../footer.php";
?>