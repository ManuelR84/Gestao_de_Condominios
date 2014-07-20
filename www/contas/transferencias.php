<?php 
	session_start();
	$title = "Transferências";
	include "../header.php";
	session_validation();	
	
	//query obter contas
	$result = mysqli_query($con,
			"SELECT idconta, descricaoconta
			FROM contas;")
			or error_validation($con);
	
	$result2 = mysqli_query($con,
			"SELECT idconta, descricaoconta
			FROM contas;")
	or error_validation($con);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["corigem"] != "" and
		$_POST["cdestino"] != "" and
		$_POST["valor"] != "" and
		$_POST["data"] != "")
		{
						
			//query de envio do formulario para a base de dados
			mysqli_query($con,
			"INSERT INTO transferencias (idcontaorigem, idcontadestino, valor, data)
			VALUES ('" . $_POST['corigem'] ."',
					'" . $_POST['cdestino'] ."',
					'" . $_POST['valor'] ."',
					'" . $_POST['data'] ."');")
			or error_validation($con);
			
			mysqli_query($con,
			"UPDATE contas
			SET saldoatual = saldoatual + '" . $_POST['valor'] ."'
			WHERE idconta = '" . $_POST['cdestino'] ."';")
			or error_validation($con);
			
			mysqli_query($con,
			"UPDATE contas
			SET saldoatual = saldoatual - '" . $_POST['valor'] ."'
			WHERE idconta = '" . $_POST['corigem'] ."';")
			or error_validation($con);
			
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Transferências Bancárias</h2>
	<br />

	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form method="post">
				  <div class="form-group">
				    <label for="corigem">Conta Origem</label>
				     <select class="form-control" name="corigem">
					    	<option value="">Escolha conta...</option>
					    	<?php 
					    		while($row = mysqli_fetch_array($result)){
						   			echo "<option value=". $row['idconta'] .">". $row['descricaoconta'] ."</option>";
					    		}
							?>
					 </select>
				  </div>
				  
				 <div class="form-group">
				    <label for="cdestino">Conta Destino</label>
				    <select class="form-control" name="cdestino">
					    	<option value="">Escolha conta...</option>
					    	<?php 
					    		while($row2 = mysqli_fetch_array($result2)){
						   			echo "<option value=". $row2['idconta'] .">". $row2['descricaoconta'] ."</option>";
					    		}
							?>
					 </select>
				  </div>
				  
				 <div class="form-group">
				    <label for="valor">Valor Transferência</label>
				    <input id="valor" type="text" class="form-control" placeholder="Valor Transferência" name="valor">
				  </div>
				  
				  <div class="form-group">
				    <label for="data">Data Transferência</label>
				    <input id="data" type="date" class="form-control" name="data">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Transferir</button>
				</form>
	
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>