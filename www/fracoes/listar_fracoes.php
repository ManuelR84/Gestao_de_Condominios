<?php
	session_start();
	$title = "Listar Frações";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT a.idfrac, b.nome, a.iuf, a.permilagem, a.andar, a.tipo, a.observacoes
			FROM fracoes a, condominos b
			WHERE a.idcond = b.idcond
			order by idfrac;")
			or error_validation($con);
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Lista de Frações</h2>
	<br />
	
	<table class="table table table-hover">
	<tr>
		<th>Id</th>
		<th>Condómino</th>
		<th>Identificação Unica<br /> da Fração</th>
		<th>Permilagem</th>
		<th>Andar</th>
		<th>Tipo</th>
		<th>Observações</th>
		<th></th>
		<th></th>
	</tr>
	
	<?php
		while($row = mysqli_fetch_array($result))
		{
	  		echo "<tr>";
	  		echo "<td>" . $row['idfrac'] . "</td>";
			echo "<td>" . $row['nome'] . "</td>";
			echo "<td>" . $row['iuf'] . "</td>";
			echo "<td>" . $row['permilagem'] . "</td>";
			echo "<td>" . $row['andar'] . "</td>";
			echo "<td>" . $row['tipo'] . "</td>";
			echo "<td>" . $row['observacoes'] . "</td>";
			echo "<td><a href=alterar_fracao.php?id=" . $row['idfrac'] . ">Alterar</a></td>";
			echo "<td><a href=apagar_fracao.php?id=" . $row['idfrac'] . ">Apagar</a>";
			echo "</td>";
		};
	?>
	</table>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>