<?php
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Inserir Receita";
	include "../header.php";
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(!isset($_POST["descricao"])){
		}elseif(!isset($_POST["rubrica"])){
		}elseif(!isset($_POST["valor"])){
		}elseif(!isset($_POST["data"])){
			//codigo para enviar para a db
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<div class="jumbotron">

	<h2>Inserir Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form method="post">
				  <div class="form-group">
				    <label for="dr">Descrição da Receita</label>
				    <input type="text" class="form-control" placeholder="Descrição" name="descricao">
				  </div>
				  
				  <div class="form-group">
				    <label for="rub">Rubrica</label>
				    <input type="text" class="form-control" placeholder="Rubrica" name="rubrica">
				  </div>
				  
				 <div class="form-group">
				    <label for="valorres">Valor da Receita</label>
				    <input type="text" class="form-control" placeholder="Valor da Receita" name="valor">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagrec">Data Pagamento</label>
				    <input type="date" class="form-control" name="data">
				  </div>
				  
				   <div class="form-group">
				    <label for="contades">Conta destino</label>
				    <input type="number" class="form-control" placeholder="ID Conta" name="destino">
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
	include_once "../footer.php";
?>