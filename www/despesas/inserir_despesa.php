<?php
	session_start();
	$title = "Inserir Despesa";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT idrub, rubrica
			FROM rubricas
			WHERE tipo = 'Despesa';")
			or error_validation($con);
	
	$result2 = mysqli_query($con,
			"SELECT idconta, descricaoconta
			FROM contas;")
			or error_validation($con);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["rubrica"] != "" and
		$_POST["descricao"] != "" and
		$_POST["valordes"] != "" and
		$_POST["datapagamento"] != "" and
		$_POST["datavencimento"] != "" and 
		$_POST["contadestino"] != "")
		{
			mysqli_query($con,
			"INSERT INTO despesas (idrub, descricao, valor, datapagamento, datavencimento, idcontadestino)
			VALUES ('" . $_POST['rubrica'] ."',
					'" . $_POST['descricao'] ."',
					'" . round($_POST['valordes'], 2) /*Valor arredondado*/."',
					'" . $_POST['datapagamento'] ."',
					'" . $_POST['datavencimento'] ."',
					'" . $_POST['contadestino'] ."');")
			or error_validation($con);
		
			mysqli_query($con,
			"UPDATE contas
			SET saldoatual = saldoatual - '" . $_POST['valordes'] ."'
			WHERE idconta = " . $_POST['contadestino'] . ";")
			or error_validation($con);
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	
	}
?>

<div class="jumbotron">

	<h2>Inserir Despesa</h2>
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
				    		while($row = mysqli_fetch_array($result)){
					   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				
				  <div class="form-group">
				    <label for="descricao" <?php form_validation("descricao");?> >Descrição</label>
				    <input id="descricao" type="text" class="form-control" placeholder="Descrição" name="descricao">
				  </div>
				  
				 <div class="form-group">
				    <label for="valor" <?php form_validation("valordes");?> >Valor</label>
				    <input id="valor" type="text" class="form-control" placeholder="Valor da Despesa" name="valordes">
				  </div>
				  
				  <div class="form-group">
				    <label for="datav" <?php form_validation("datavencimento");?> >Data Vencimento</label>
				    <input id="datav" type="date" class="form-control" placeholder="AAAA-MM-DD" name="datavencimento">
				  </div>
				  
				  <div class="form-group">
				    <label for="datap" <?php form_validation("datapagamento");?> >Data Pagamento</label>
				    <input id="datap" type="date" class="form-control" placeholder="AAAA-MM-DD" name="datapagamento">
				  </div>				  
				  
				   <div class="form-group">
				    <label for="contades" <?php form_validation("contadestino");?> >Conta destino</label>
				    <select class="form-control" name="contadestino">
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
<!-- /container -->

<?php
	mysqli_close($con);
	include "../footer.php";
?>