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
	
	$result2 = mysqli_query($con,
				"SELECT a.iddespesa, b.rubrica, a.descricao, a.valor, a.datapagamento, datavencimento, c.descricaoconta, a.idrub, c.idconta
				FROM despesas a, rubricas b, contas c
				WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta and iddespesa = " . $_GET['id'] . ";")
				or error_validation($con);
	
	$row2 = mysqli_fetch_array($result2);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["rubrica"] != "" and
		$_POST["descricao"] != "" and
		$_POST["datapagdes"] != "" and
		$_POST["datavendes"] != "")
		{
			mysqli_query($con,
			"UPDATE despesas
			SET idrub = '" . $_POST['rubrica'] ."',
			descricao = '" . $_POST['descricao'] ."',
			datapagamento = '" . $_POST['datapagdes'] ."',
			datavencimento = '" . $_POST['datavendes'] ."'
			WHERE iddespesa = " . $_GET['id'] . ";")
			or error_validation($con);
			
			mysqli_close($con);
			header("Location: listar_despesas.php");
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
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
					    	<option value="<?php echo $row2['idrub']; ?>"><?php echo $row2['rubrica']; ?></option>
					    	<?php
					    		while($row = mysqli_fetch_array($result))
								{
									if($row['idrub'] != $row2['idrub'])
						   				echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
					    		}
							?>
						</select>
					  </div>
					
					  <div class="form-group">
					    <label for="descricao" <?php form_validation("descricao");?> >Descrição</label>
					    <input id="descricao" type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php echo $row2['descricao']; ?>">
					  </div>
					  
					  <div class="form-group">
					    <label for="datavendes" <?php form_validation("datavendes");?> >Data Vencimento</label>
					    <input id="datavendes" type="date" class="form-control" name="datavendes" value="<?php echo $row2['datavencimento']; ?>">
					  </div>
					  
					  <div class="form-group">
					    <label for="datapagdes" <?php form_validation("datapagdes");?> >Data Pagamento</label>
					    <input id="datapagdes" type="date" class="form-control" name="datapagdes" value="<?php echo $row2['datapagamento']; ?>">
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