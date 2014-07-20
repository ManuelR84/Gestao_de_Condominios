<?php
	session_start();
	$title = "Receitas";
	include "../header.php";
	session_validation();
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Prestação de Contas por Receitas</h2>
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
				<th>Id</th>
				<th>Rubrica</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Data Pagamento</th>
			</tr>
				
			<?php 
				if(isset($_POST['submit']))
				{
					$result = mysqli_query($con,
							"SELECT a.idreceita, b.rubrica, a.descricao, a.valor, a.datapagamento
							FROM receitas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01';")
							or error_validation($con);

					$result2 = mysqli_query($con,
							"SELECT sum(valor)
							FROM receitas a, rubricas b
							WHERE a.idrub = b.idrub and datapagamento between '" . $_POST['anoi']. "-" . $_POST['mesi']. "-01' and '". $_POST['anof']."-". $_POST['mesf']."-01';")
							or error_validation($con);
				
			
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $row['idreceita'] . "</td>";
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
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>