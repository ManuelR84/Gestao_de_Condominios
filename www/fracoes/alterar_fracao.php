<?php
	session_start();
	$title = "Alterar Fração";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT a.idfrac, b.nome, a.iuf, a.permilagem, a.andar, a.tipo, a.observacoes, b.idcond
			FROM fracoes a, condominos b
			WHERE a.idcond = b.idcond and a.idfrac = " .$_GET['id']. ";")
			or error_validation($con);
		
	$row = mysqli_fetch_array($result);
		
	$result2 = mysqli_query($con,"SELECT idcond, nome FROM condominos;")
			or error_validation($con);
	
	if(isset($_POST['submit']))
	{
		if(	$_POST["ctf"] != "" and
		$_POST["iuf"] != "" and
		$_POST["permi"] != "" and
		$_POST["du"] != "" and
		$_POST["tipo"] != "" and
		$_POST["obs"] != "")
		{
			mysqli_query($con,
			"UPDATE fracoes
			SET idcond = '" . $_POST['ctf'] ."',
				iuf = '" . $_POST['iuf'] ."',
				permilagem = '" . $_POST['permi'] ."',
				andar = '" . $_POST['du'] ."',
				tipo = '" . $_POST['tipo'] ."',
				observacoes = '" . $_POST['obs'] ."'
			WHERE idfrac = " . $_GET['id'] . ";")
			or error_validation($con);
			
			mysqli_close($con);
			header("Location: listar_fracoes.php");
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Alterar Fração</h2>
	<br />
		
	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form method="post">
				  <div class="form-group">
				    <label for="ctf">Condómino Titular da Fração</label>
				    <select class="form-control" name="ctf">
				    	<option value="<?php echo $row['idcond']; ?>"><?php echo $row['nome']; ?></option>
				    	<?php 
				    		while($row2 = mysqli_fetch_array($result2))
							{
								if($row['idcond'] != $row2['idcond'])
					   				echo "<option value=". $row2['idcond'] .">". $row2['nome'] ."</option>";
				    		}
						?>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="iuf">Identificação Unica da Fração</label>
				    <input id="iuf" type="text" class="form-control" placeholder="ID fração" value="<?php echo $row['iuf']; ?>" name="iuf">
				  </div>
				  
				 <div class="form-group">
				    <label for="permi">Permilagem da Fração</label>
				    <input id=permi"" type="text" class="form-control" placeholder="Permilagem" value="<?php echo $row['permilagem']; ?>"  name="permi">
				  </div>
				  
				   <div class="form-group">
				    <label for="du">Designação Usual</label>
				    <input id="du" type="text" class="form-control" placeholder="Andar" value="<?php echo $row['andar']; ?>" name="du">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Fração</label>
				    <select class="form-control" name="tipo">
					    <option value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
						<?php 
				    		if($row['tipo'] == 'Habitacional'){
				    			echo '<option value="Loja">Loja</option>';
				    		}else{
				    			echo '<option value="Habitacional">Habitacional</option>';
				    		}
				    	?>
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
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>