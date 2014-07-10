<?php echo $_GET['id']."----";
	$title = "Alterar Fração";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Alterar Fração</h2>
		<br />
		
		<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<?php
					$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
						or die("Error1: ".mysqli_error($con));
					
					if (mysqli_connect_errno()) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}

					$result = mysqli_query($con,
								"SELECT a.idfrac, b.nome, a.iuf, a.permilagem, a.andar, a.tipo, a.observacoes, b.idcond
								FROM fracoes a, condominos b
								WHERE a.idcond = b.idcond and a.idfrac = " .$_GET['id']. ";")
								or die("Error2: ".mysqli_error($con));
					
					$row = mysqli_fetch_array($result);
					
					$result2 = mysqli_query($con,"SELECT idcond, nome FROM condominos;")
					or die("Error3: ".mysqli_error($con));
				?>

				<form method="post">
				  <div class="form-group">
				    <label for="ctf">Condómino Titular da Fração</label>
				    <select class="form-control" name="ctf">
				    	<option value="<?php echo $row['idcond']; ?>"><?php echo $row['nome']; ?></option>
				    	<?php 
				    		while($row2 = mysqli_fetch_array($result2)){
					   			echo "<option value=". $row2['idcond'] .">". $row2['nome'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="iuf">Identificação Unica da Fração</label>
				    <input type="text" class="form-control" placeholder="ID fração" value="<?php echo $row['iuf']; ?>" name="iuf">
				  </div>
				  
				 <div class="form-group">
				    <label for="permi">Permilagem da Fração</label>
				    <input type="text" class="form-control" placeholder="Permilagem" value="<?php echo $row['permilagem']; ?>"  name="permi">
				  </div>
				  
				   <div class="form-group">
				    <label for="du">Designação Usual</label>
				    <input type="text" class="form-control" placeholder="Andar" value="<?php echo $row['andar']; ?>" name="du">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Fração</label>
				    <select class="form-control" name="tipo">
					    <option value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
						<option value="Habitacional">Habitacional</option>
						<option value="Loja">Loja</option>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="obs">Observações</label>
				   	<textarea rows="1" cols="5" type="text" class="form-control" placeholder="Obervações" name="obs"><?php echo $row['observacoes']; ?></textarea>
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>

<?php

	if(isset($_POST['submit']))
	{
		mysqli_query($con,
				"UPDATE fracoes
				SET idcond = '" . $_POST['ctf'] ."', iuf = '" . $_POST['iuf'] ."', permilagem = '" . $_POST['permi'] ."', andar = '" . $_POST['du'] ."', tipo = '" . $_POST['tipo'] ."', observacoes = '" . $_POST['obs'] ."'
				WHERE idfrac = " . $_GET['id'] . ";")
				or die("Error4: ".mysqli_error($con));
	}
	

	mysqli_close($con);
	include "../footer.php";
?>