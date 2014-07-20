<?php
	session_start();
	$title = "Inserir Receita";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT idrub, rubrica
			FROM rubricas
			WHERE tipo = 'Receita';")
			or error_validation($con);
	
	$result2 = mysqli_query($con,
			"SELECT idconta, descricaoconta
			FROM contas;")
			or error_validation($con);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["rubrica"] != "" and
		$_POST["descricao"] != "" and
		$_POST["valor"] != "" and
		$_POST["data"] != "" and
		$_POST["contadestino"] != "")
		{
			mysqli_query($con,
			"INSERT INTO receitas (idrub, descricao, valor, datapagamento, idcontadestino)
			VALUES ('" . $_POST['rubrica'] ."',
					'" . $_POST['descricao'] ."',
					'" . round($_POST['valor'], 2) /*Valor arredondado*/."',
					'" . $_POST['data'] ."',
					'" . $_POST['contadestino'] ."');")
			or error_validation($con);
		
			mysqli_query($con,
			"UPDATE contas
			SET saldoatual = saldoatual + '" . $_POST['valor'] ."'
			WHERE idconta = " . $_POST['contadestino'] . ";")
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

	<h2>Inserir Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				
				<form method="post">
					<div class="form-group">
					    <label for="rub" <?php form_validation("rubrica");?> >Rubrica</label>
					    <select id="rub" class="form-control" name="rubrica">
					    	<option value="">Escolha rubrica...</option>
					    	<?php 
					    		while($row = mysqli_fetch_array($result))
								{
						   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
					    		}
							?>
						</select>
					  </div>
					
					 <div class="form-group">
					   <label for="desc" <?php form_validation("descricao");?> >Descrição</label>
					   <input id="desc" type="text" class="form-control" placeholder="Descrição" name="descricao">
					 </div>
					  
					 <div class="form-group">
					    <label for="valor" <?php form_validation("valor");?> >Valor</label>
					    <input id="valor" type="text" class="form-control" placeholder="Valor da Receita" name="valor">
					  </div>
					  
					  <div class="form-group">
					    <label for="data" <?php form_validation("data");?> >Data Pagamento</label>
					    <input id="data" type="date" class="form-control" name="data">
					  </div>
				  
					  <div class="form-group">
					    <label for="contad" <?php form_validation("contadestino");?> >Conta destino</label>
					    <select id="contad" class="form-control" name="contadestino">
					    	<option value="">Escolha conta...</option>
					    	<?php 
					    		while($row2 = mysqli_fetch_array($result2))
								{
						   			echo "<option value=". $row2['idconta'] .">". $row2['descricaoconta'] ."</option>";
					    		}
							?>
						</select>
					 </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Inserir</button>
				</form>
		
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>