<?php 
	session_start();
	$title = "Alterar Receitas";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT idrub, rubrica
			FROM rubricas
			WHERE tipo = 'Receita';")
			or error_validation($con);
	
	$result3 = mysqli_query($con,
			"SELECT a.idreceita, b.rubrica, a.descricao, a.valor, a.datapagamento, c.descricaoconta, a.idrub, c.idconta
			FROM receitas a, rubricas b, contas c
			WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta and idreceita = " . $_GET['id'] . ";")
			or error_validation($con);
	
	$row3 = mysqli_fetch_array($result3);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"UPDATE receitas
		SET idrub = '" . $_POST['rubrica'] ."', descricao = '" . $_POST['descricao'] ."', datapagamento = '" . $_POST['data'] ."'
		WHERE idreceita = " . $_GET['id'] . ";")
		or error_validation($con);
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form method="post">
				
				<div class="form-group">
				    <label for="rub">Rubrica</label>
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
				   <label for="dr">Descrição</label>
				   <input id="dr" type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php echo $row3['descricao']; ?>">
				 </div>
				  
				  <div class="form-group">
				    <label for="datapagrec">Data Pagamento</label>
				    <input id="datapagrec" type="date" class="form-control" name="data" value="<?php echo $row3['datapagamento']; ?>">
				  </div>

				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
	
</div>

<?php
	mysqli_close($con);
	include "../footer.php";
?>