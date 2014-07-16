<?php
	session_start();
	$title = "Registo de Conta";
	include "../header.php";
	session_validation();
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(	$_POST["descricao"] != "" and
			$_POST["numero"] != "" and
			$_POST["saldo"] != "")
		{
			//query de envio do formulario para a base de dados
			mysqli_query($con,
			"INSERT INTO contas (descricaoconta, numeroconta, saldoinicial, saldoatual)
			VALUES ('" . $_POST['descricao'] ."',
					'" . $_POST['numero'] ."',
					'" . $_POST['saldo'] ."',
					'" . $_POST['saldo'] ."');")
								or error_validation($con);
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<div class="jumbotron">

	<h2>Registo de Contas Bancárias</h2>
	<br />

	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form method="post">
				  <div class="form-group">
				    <label for="descconta" <?php form_validation("descricao");?> >Descrição da Conta Bancária</label>
				    <input id="descconta" type="text" class="form-control" placeholder="Descrição da Conta" name="descricao">
				  </div>
				  
				  <div class="form-group">
				    <label for="numconta" <?php form_validation("numero");?> >Numero da Conta Bancária</label>
				    <input id="numconta" type="number" class="form-control" placeholder="Número da Conta" name="numero">
				  </div>
				  
				 <div class="form-group">
				    <label for="saldoini" <?php form_validation("saldo");?> >Saldo Inicial</label>
				    <input id="saldoini" type="text" class="form-control" placeholder="Saldo Inicial" name="saldo">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Registar</button>
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