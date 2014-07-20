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
	
	$result2 = mysqli_query($con,
				"SELECT a.idreceita, b.rubrica, a.descricao, a.valor, a.datapagamento, c.descricaoconta, a.idrub, c.idconta
				FROM receitas a, rubricas b, contas c
				WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta and idreceita = " . $_GET['id'] . ";")
				or error_validation($con);
	
	$row2 = mysqli_fetch_array($result2);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["rubrica"] != "" and
		$_POST["descricao"] != "" and
		$_POST["data"] != "")
		{
			mysqli_query($con,
			"UPDATE receitas
			SET idrub = '" . $_POST['rubrica'] ."',
				descricao = '" . $_POST['descricao'] ."',
				datapagamento = '" . $_POST['data'] ."'
			WHERE idreceita = " . $_GET['id'] . ";")
			or error_validation($con);
			
			mysqli_close($con);
			header("Location: listar_receitas.php");
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Alterar Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form method="post">
					<div class="form-group">
					    <label for="rub">Rubrica</label>
					    <select id="rub" class="form-control" name="rubrica">
					    	<option value="<?php echo $row2['idrub']; ?>"><?php echo $row2['rubrica']; ?></option>
					    	<?php 
					    		while($row = mysqli_fetch_array($result))
								{
						   			if($row['idrub']!=$row2['idrub'])
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
					    <label for="datap" <?php form_validation("datapagamento");?> >Data Pagamento</label>
					    <input id="datap" type="date" class="form-control" name="data" value="<?php echo $row2['datapagamento']; ?>">
					  </div>
	
					  <br />
					  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>