<?php
	session_start();
	$title = "Listar Despesas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT a.iddespesa, b.rubrica, a.descricao, a.valor, a.datapagamento, a.datavencimento, c.descricaoconta
			FROM despesas a, rubricas b, contas c
			WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta;")
			or error_validation($con);
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Lista de Despesas</h2>
	<br />

	<table class="table table table-hover">
		<tr>
			<th>Id</th>
			<th>Despesa</th>
			<th>Descrição</th>
			<th>Valor</th>
			<th>Data Vencimento</th>
			<th>Data Pagamento</th>
			<th>Conta Destino</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php 
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
		  		echo "<td>" . $row['iddespesa'] . "</td>";
				echo "<td>" . $row['rubrica'] . "</td>";
				echo "<td>" . $row['descricao'] . "</td>";
				echo "<td>" . $row['valor'] . "</td>";
				echo "<td>" . $row['datavencimento'] . "</td>";
				echo "<td>" . $row['datapagamento'] . "</td>";
				echo "<td>" . $row['descricaoconta'] . "</td>";
				echo "<td><a href=alterar_despesa.php?id=" . $row['iddespesa'] . ">Alterar</a></td>";
				echo "<td><a href=apagar_despesa.php?id=" . $row['iddespesa'] . ">Apagar</a></td>";
				echo "</tr>";
			}
			?>
	</table>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>