<?php
	session_start();
	$title = "Rubricas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT *
			FROM rubricas")
	or error_validation($con);
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Prestação de Contas por Rubricas</h2>
	<br />
	
	<div class="container">
		<div class="form-inline">
	
				<form method="post">
				
					<div class="form-group">
						<label for="rub" <?php form_validation("rubrica");?> >Rubrica</label>
						    <select id="rub" class="form-control" name="rubrica">
						    	<option value="0">Escolha rubrica...</option>
						    	<?php 
						    		while($row = mysqli_fetch_array($result)){
							   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
						    		}
								?>
							</select>
					</div>
				  
						<button type="submit" name="submit" class="btn btn-default">Visualizar</button>
				
				</form>
				
			</div>
			
			<br /><br />
			<div class="row">
				<p>Receitas:</p>
				<table class="table table table-hover">
				<tr>
					<th>Id</th>
					<th>Rubrica</th>
					<th>Descrição</th>
					<th>Valor</th>
					<th>Data Pagamento</th>
				</tr>
				
				<?php 
					if(isset($_POST['submit'])){
						$result = mysqli_query($con,
								"SELECT a.idrub, rubrica, descricao, valor, datapagamento
								FROM rubricas a, receitas b
								WHERE a.idrub = b.idrub and a.idrub = " . $_POST['rubrica'] . ";")
								or error_validation($con);

						$result2 = mysqli_query($con,
							"SELECT sum(valor)
							FROM rubricas a, receitas b
							WHERE a.idrub = b.idrub and a.idrub = " . $_POST['rubrica'] . ";")
							or error_validation($con);

			
				
						while($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $row['idrub'] . "</td>";
							echo "<td>" . $row['rubrica'] . "</td>";
							echo "<td>" . $row['descricao'] . "</td>";
							echo "<td>" . $row['valor'] . "</td>";
							echo "<td>" . $row['datapagamento'] . "</td>";
							echo "</tr>";
						}
						
					}
				?>
				</table>
			
			</div>
			
			<p>Total das Receitas:
				<?php if(isset($_POST['submit'])){
					$row2 = mysqli_fetch_array($result2);
					echo round($row2['sum(valor)'], 2); }
				?>
				€
			</p>
			
		<br /><br />
			<div class="row">
				<p>Despesas:</p>
				<table class="table table table-hover">
				<tr>
					<th>Id</th>
					<th>Rubrica</th>
					<th>Descrição</th>
					<th>Valor</th>
					<th>Data Pagamento</th>
				</tr>
				
				<?php 
					if(isset($_POST['submit'])){
						$result3 = mysqli_query($con,
								"SELECT a.idrub, rubrica, descricao, valor, datapagamento
								FROM rubricas a, despesas b
								WHERE a.idrub = b.idrub and a.idrub = " . $_POST['rubrica'] . ";")
								or error_validation($con);

						$result4 = mysqli_query($con,
							"SELECT sum(valor)
							FROM rubricas a, despesas b
							WHERE a.idrub = b.idrub and a.idrub = " . $_POST['rubrica'] . ";")
							or error_validation($con);

			
				
						while($row3 = mysqli_fetch_array($result3)) {
							echo "<tr>";
							echo "<td>" . $row3['idrub'] . "</td>";
							echo "<td>" . $row3['rubrica'] . "</td>";
							echo "<td>" . $row3['descricao'] . "</td>";
							echo "<td>" . $row3['valor'] . "</td>";
							echo "<td>" . $row3['datapagamento'] . "</td>";
							echo "</tr>";
						}
						
					}
				?>
				</table>
			
			</div>
			
			<p>Total das Despesas:
				<?php if(isset($_POST['submit'])){
					$row4 = mysqli_fetch_array($result4);
					echo round($row4['sum(valor)'], 2); }
				?>
				€
			</p>	
			
		
	</div>
</div>
<!-- /container -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>