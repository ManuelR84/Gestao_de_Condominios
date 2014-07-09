<?php
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
						
					$result = mysqli_query($con,"SELECT a.idfrac, b.nome, a.iuf, a.permilagem, a.andar, a.tipo, a.observacoes
												FROM fracoes a, condominos b
												WHERE a.idcond = b.idcond;") or die("Error2: ".mysqli_error($con));
					
					
					$row = mysqli_fetch_array($result);
					
				  	
				?>

				<div class="container">
		<div class="row">
			<div class="col-xs-4">
		
				<form role="form">
				  <div class="form-group">
				    <label for="ctf">Condómino Titular da Fração</label>
				    <input type="text" class="form-control" placeholder="Nome" name="ctf">
				  </div>
				  
				  <div class="form-group">
				    <label for="iuf">Identificação Unica da Fração</label>
				    <input type="text" class="form-control" placeholder="ID fração" name="iuf">
				  </div>
				  
				 <div class="form-group">
				    <label for="permi">Permilagem da Fração</label>
				    <input type="text" class="form-control" placeholder="Permilagem" name="permi">
				  </div>
				  
				   <div class="form-group">
				    <label for="du">Designação Usual</label>
				    <input type="text" class="form-control" placeholder="Andar" name="du">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Fração</label>
				    <select class="form-control" name="tipo">
					    <option value="">Escolha tipo...</option>
						<option value="Habitacional">Habitacional</option>
						<option value="Loja">Loja</option>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="obs">Observações</label>
				   	<textarea rows="1" cols="5" type="text" class="form-control" placeholder="Obervações" name="obs"></textarea>
				  </div>
				  
				  <br />
				  <button type="submit" class="btn btn-default">Inserir</button>
				</form>
	
			</div>
		</div>
	</div>
	
</div>

<?php

	if(isset($_POST['submit'])){
		mysqli_query($con,"UPDATE condominos
								SET nome = '" . $_POST['nome'] ."', cc = '" . $_POST['cc'] ."', morada = '" . $_POST['morada'] ."', contacto = '" . $_POST['tele'] ."', email = '" . $_POST['email'] ."'
								WHERE idcond = " . $_GET['id'] . ";")
								or die("Error2: ".mysqli_error($con));
	}

	mysqli_close($con);
	include "../footer.php";
?>