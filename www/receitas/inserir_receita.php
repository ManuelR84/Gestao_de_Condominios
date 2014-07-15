<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Inserir Receita";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>

<div class="jumbotron">

	<h2>Inserir Receita</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<?php 
				$result = mysqli_query($con,
						"SELECT idrub, rubrica
						FROM rubricas
						WHERE tipo = 'Receita';")
						or die("Error1: ".mysqli_error($con));

				$result2 = mysqli_query($con,
						"SELECT idconta, descricaoconta
						FROM contas;")
						or die("Error2: ".mysqli_error($con));
							
				?>
				
				<form method="post">
				
				<div class="form-group">
				    <label for="rub">Rubrica</label>
				    <select class="form-control" name="rubrica">
				    	<option value="">Escolha rubrica...</option>
				    	<?php 
				    		while($row = mysqli_fetch_array($result)){
					   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				
				 <div class="form-group">
				   <label for="dr">Descrição</label>
				   <input type="text" class="form-control" placeholder="Descrição" name="descricao">
				 </div>
				  
				 <div class="form-group">
				    <label for="valorres">Valor</label>
				    <input type="text" class="form-control" placeholder="Valor da Receita" name="valor">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagrec">Data Pagamento</label>
				    <input type="date" class="form-control" name="data">
				  </div>
				  
				   <div class="form-group">
				    <label for="contades">Conta destino</label>
				    <select class="form-control" name="contadestino">
				    	<option value="">Escolha conta...</option>
				    	<?php 
				    		while($row2 = mysqli_fetch_array($result2)){
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

	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"INSERT INTO receitas (idrub, descricao, valor, datapagamento, idcontadestino)
				VALUES ('" . $_POST['rubrica'] ."',
						'" . $_POST['descricao'] ."',
						'" . $_POST['valor'] ."',
						'" . $_POST['data'] ."',
						'" . $_POST['contadestino'] ."');")
								or die("Error3: ".mysqli_error($con));
								
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual + '" . $_POST['valor'] ."'
		WHERE idconta = " . $_POST['contadestino'] . ";")
		or die("Error4: ".mysqli_error($con));
	}

	mysqli_close($con);
	include "../footer.php";
?>