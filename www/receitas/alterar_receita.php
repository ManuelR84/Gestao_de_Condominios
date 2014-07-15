<?php 
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Alterar Receitas";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Receita</h2>
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


				$result3 = mysqli_query($con,
				"SELECT a.idreceita, b.rubrica, a.descricao, a.valor, a.datapagamento, c.descricaoconta, a.idrub, c.idconta
				FROM receitas a, rubricas b, contas c
				WHERE a.idrub = b.idrub and a.idcontadestino = c.idconta and idreceita = " . $_GET['id'] . ";")
						or die("Error3: ".mysqli_error($con));

				$row3 = mysqli_fetch_array($result3)
							
				?>
				
				<form method="post">
				
				<div class="form-group">
				    <label for="rub">Rubrica</label>
				    <select class="form-control" name="rubrica">
				    	<option value="<?php echo $row3['idrub']; ?>"><?php echo $row3['rubrica']; ?></option>
				    	<?php 
				    		while($row = mysqli_fetch_array($result)){
					   			echo "<option value=". $row['idrub'] .">". $row['rubrica'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				
				 <div class="form-group">
				   <label for="dr">Descrição</label>
				   <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php echo $row3['descricao']; ?>">
				 </div>
				  
				  <div class="form-group">
				    <label for="datapagrec">Data Pagamento</label>
				    <input type="date" class="form-control" name="data" value="<?php echo $row3['datapagamento']; ?>">
				  </div>

				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
	
</div>

<?php

	if(isset($_POST['submit']))
	{
		mysqli_query($con,
				"UPDATE receitas
				SET idrub = '" . $_POST['rubrica'] ."', descricao = '" . $_POST['descricao'] ."', datapagamento = '" . $_POST['data'] ."'
				WHERE idreceita = " . $_GET['id'] . ";")
				or die("Error4: ".mysqli_error($con));
	}
	

	mysqli_close($con);
	include "../footer.php";
?>