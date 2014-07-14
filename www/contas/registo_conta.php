<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Registo de Conta";
	include "../header.php";
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(!isset($_POST["descricao"])){
		}elseif(!isset($_POST["numero"])){
		}elseif(!isset($_POST["saldo"])){
			//codigo para enviar para a db
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
				    <label for="descconta">Descrição da Conta Bancária</label>
				    <input type="text" class="form-control" placeholder="Descrição da Conta" name="descricao">
				  </div>
				  
				  <div class="form-group">
				    <label for="numconta">Numero da Conta Bancária</label>
				    <input type="number" class="form-control" placeholder="Número da Conta" name="numero">
				  </div>
				  
				 <div class="form-group">
				    <label for="saldoini">Saldo Inicial</label>
				    <input type="text" class="form-control" placeholder="Saldo Inicial" name="saldo">
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