<?php
	session_start();
	$title = "Resumo Financeiro";
	include "../header.php";
	session_validation();
	
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Resumo Financeiro</h2>
	<br />
	
	<div class="container">
		<div class="form-inline">
	
				<form method="post">
				
					<div class="form-group">
						<label for="mesi">Mês</label>
						<select class="form-control" name="mesi">
							<option value="">Escolha mês...</option>
							<option value="01">1- Janeiro</option>
							<option value="02">2- Fevereiro</option>
							<option value="03">3- Março</option>
							<option value="04">4- Abril</option>
							<option value="05">5- Maio</option>
							<option value="06">6- Junho</option>
							<option value="07">7- Julho</option>
							<option value="08">8- Agosto</option>
							<option value="09">9- Setembro</option>
							<option value="10">10- Outubro</option>
							<option value="11">11- Novembro</option>
							<option value="12">12- Dezembro</option>
						</select>
					</div>
				  
					<div class="form-group">
						<label for="anoi">Ano</label>
						<input id="anoi" type="number" class="form-control" placeholder="Ano" name="anoi" max="3000" min="2000" value="2014">
					</div>
					
					<br />
					
					<div class="form-group">
						<label for="mesf">Mês</label>
						<select class="form-control" name="mesf">
							<option value="">Escolha mês...</option>
							<option value="01">1- Janeiro</option>
							<option value="02">2- Fevereiro</option>
							<option value="03">3- Março</option>
							<option value="04">4- Abril</option>
							<option value="05">5- Maio</option>
							<option value="06">6- Junho</option>
							<option value="07">7- Julho</option>
							<option value="08">8- Agosto</option>
							<option value="09">9- Setembro</option>
							<option value="10">10- Outubro</option>
							<option value="11">11- Novembro</option>
							<option value="12">12- Dezembro</option>
						</select>
					</div>
				  
					<div class="form-group">
						<label for="anof">Ano</label>
						<input id="anof" type="number" class="form-control" placeholder="Ano" name="anof" max="3000" min="2000" value="2014">
					</div>
					
					<br /><br />
					
					<button type="submit" name="submit" class="btn btn-default">Visualizar</button>
					
				</form>
	
			</div>
		</div>
		
		<br /><br />
		<div class="row">
			<p>Receitas:</p>
			<table class="table table table-hover">
			<tr>
				<th>Id Rubrica</th>
				<th>Rubrica</th>
				<th>Valor</th>
			</tr>
				
			<?php 
				if(isset($_POST['submit']))
				{
					$result = mysqli_query($con,
							"SELECT a.idrub, rubrica, sum(valor)
							FROM receitas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01'
							GROUP BY idrub;")
							or error_validation($con);

					$result2 = mysqli_query($con,
							"SELECT sum(valor)
							FROM receitas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01';")
							or error_validation($con);
				
			
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $row['idrub'] . "</td>";
						echo "<td>" . $row['rubrica'] . "</td>";
						echo "<td>" . round($row['sum(valor)'], 2) . "</td>";
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
				<th>Id Rubrica</th>
				<th>Rubrica</th>
				<th>Valor</th>
			</tr>
				
			<?php 
				if(isset($_POST['submit']))
				{
					$result3 = mysqli_query($con,
							"SELECT a.idrub, rubrica, sum(valor)
							FROM despesas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01'
							GROUP BY idrub;")
							or error_validation($con);

					$result4 = mysqli_query($con,
							"SELECT sum(valor)
							FROM despesas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01';")
							or error_validation($con);
				
			
					while($row3 = mysqli_fetch_array($result3)) {
						echo "<tr>";
						echo "<td>" . $row3['idrub'] . "</td>";
						echo "<td>" . $row3['rubrica'] . "</td>";
						echo "<td>" . round($row3['sum(valor)'], 2) . "</td>";
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

<!-- /container -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>