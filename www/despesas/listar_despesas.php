<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Listar Despesas";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Lista de Despesas</h2>
		<br />

		<table class="table table table-hover">
			<tr>
				<th>Id</th>
				<th>Despesa</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Data Pagamento</th>
				<th>Data Vencimento</th>
				<th>Conta Destino</th>
				<th></th>
				<th></th>
			</tr>
			
			<?php 
				$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
					or die("Error1: ".mysqli_error($con));
				
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
					
				$result = mysqli_query($con,
						"SELECT a.iddespesa, b.rubrica, a.descricao, a.valor, a.datapagamento, a.datavencimento, c.descricaoconta
						FROM despesas a, rubricas b, contas c
						WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta;")
						or die("Error2: ".mysqli_error($con));
				
				while($row = mysqli_fetch_array($result)) 
				{
					echo "<tr>";
			  		echo "<td>" . $row['iddespesa'] . "</td>";
					echo "<td>" . $row['rubrica'] . "</td>";
					echo "<td>" . $row['descricao'] . "</td>";
					echo "<td>" . $row['valor'] . "</td>";
					echo "<td>" . $row['datapagamento'] . "</td>";
					echo "<td>" . $row['datavencimento'] . "</td>";
					echo "<td>" . $row['descricaoconta'] . "</td>";
					echo "<td><a href=alterar_despesa.php?id=" . $row['iddespesa'] . ">Alterar</a></td>";
					echo "<td><a href=apagar_despesa.php?id=" . $row['iddespesa'] . ">Apagar</a></td>";
					echo "</tr>";
				}
				?>
		</table>
</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>