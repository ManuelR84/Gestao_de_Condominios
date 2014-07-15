<?php 
	session_start();
	$title = "Alterar Despesas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT idrub, rubrica
			FROM rubricas
			WHERE tipo = 'Despesa';")
			or error_validation($con);
	
	$result3 = mysqli_query($con,
				"SELECT a.iddespesa, b.rubrica, a.descricao, a.valor, a.datapagamento, datavencimento, c.descricaoconta, a.idrub, c.idconta
				FROM despesas a, rubricas b, contas c
				WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta and iddespesa = " . $_GET['id'] . ";")
				or error_validation($con);
	
	$row3 = mysqli_fetch_array($result3);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"UPDATE despesas
		SET idrub = '" . $_POST['rubrica'] ."',
		descricao = '" . $_POST['dd'] ."',
		datapagamento = '" . $_POST['datapagdes'] ."',
		datavencimento = '" . $_POST['datavendes'] ."'
		WHERE iddespesa = " . $_GET['id'] . ";")
		or error_validation($con);
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Despesa</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				
				<form method="post">
				  <div class="form-group">
				    <select class="form-control" name="rubrica">
				    	<option value="<?php echo $row3['idrub']; ?>"><?php echo $row3['rubrica']; ?></option>
				    	<?php
				    		while($row = mysqli_fetch_array($result))
							{
					   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				
				  <div class="form-group">
				    <label for="dd">Descrição</label>
				    <input type="text" class="form-control" placeholder="Descrição" name="dd" value="<?php echo $row3['descricao']; ?>">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagdes">Data Pagamento</label>
				    <input type="date" class="form-control" name="datapagdes" value="<?php echo $row3['datapagamento']; ?>">
				  </div>
				  
				  <div class="form-group">
				    <label for="datavendes">Data Vencimento</label>
				    <input type="date" class="form-control" name="datavendes" value="<?php echo $row3['datavencimento']; ?>">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
		
			</div>
		</div>
	</div>
</div>

<?php
	mysqli_close($con);
	include "../footer.php";
?>