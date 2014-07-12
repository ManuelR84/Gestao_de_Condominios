<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Listar Receita";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Lista de Receitas</h2>
		<br />
		
		<table class="table table table-hover">
			<tr>
				<th>Id</th>
				<th>Rubrica</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Data Pagamento</th>
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
						"SELECT a.idreceita, b.rubrica, a.descricao, a.valor, a.datapagamento, c.descricaoconta
						FROM receitas a, rubricas b, contas c
						WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta;")
						or die("Error2: ".mysqli_error($con));
				
				while($row = mysqli_fetch_array($result)) 
				{
					echo "<tr>";
			  		echo "<td>" . $row['idreceita'] . "</td>";
					echo "<td>" . $row['rubrica'] . "</td>";
					echo "<td>" . $row['descricao'] . "</td>";
					echo "<td>" . $row['valor'] . "</td>";
					echo "<td>" . $row['datapagamento'] . "</td>";
					echo "<td>" . $row['descricaoconta'] . "</td>";
					echo "<td><a href=alterar_receita.php?id=" . $row['idreceita'] . ">Alterar</a></td>";
					echo "<td><a href=apagar_receita.php?id=" . $row['idreceita'] . ">Apagar</a></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
<!-- /container -->

<?php 
	include "../footer.php";
?>