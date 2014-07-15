<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Inserir Despesa";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<div class="jumbotron">

	<h2>Inserir Despesa</h2>
	<br />

<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
			
				<?php 
				$result = mysqli_query($con,
						"SELECT idrub, rubrica
						FROM rubricas
						WHERE tipo = 'Despesa';")
						or die("Error1: ".mysqli_error($con));

				$result2 = mysqli_query($con,
						"SELECT idconta, descricaoconta
						FROM contas;")
						or die("Error2: ".mysqli_error($con));
							
				?>
	
				<form method="post">
				
				  <div class="form-group">
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
				    <label for="dd">Descrição</label>
				    <input type="text" class="form-control" placeholder="Descrição" name="dd">
				  </div>
				  
				 <div class="form-group">
				    <label for="valordes">Valor</label>
				    <input type="text" class="form-control" placeholder="Valor da Despesa" name="valordes">
				  </div>
				  
				  <div class="form-group">
				    <label for="datapagdes">Data Pagamento</label>
				    <input type="date" class="form-control" name="datapagdes">
				  </div>
				  
				  <div class="form-group">
				    <label for="datavendes">Data Vencimento</label>
				    <input type="date" class="form-control" name="datavendes">
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
		"INSERT INTO despesas (idrub, descricao, valor, datapagamento, datavencimento, idcontadestino)
				VALUES ('" . $_POST['rubrica'] ."',
						'" . $_POST['dd'] ."',
						'" . $_POST['valordes'] ."',
						'" . $_POST['datapagdes'] ."',
						'" . $_POST['datavendes'] ."',
						'" . $_POST['contadestino'] ."');")
								or die("Error3: ".mysqli_error($con));
								
		mysqli_query($con,
		"UPDATE contas
		SET saldoatual = saldoatual - '" . $_POST['valordes'] ."'
		WHERE idconta = " . $_POST['contadestino'] . ";")
		or die("Error4: ".mysqli_error($con));
		
	}

	mysqli_close($con);
	include "../footer.php";
?>