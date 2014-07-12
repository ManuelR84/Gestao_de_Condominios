<?php 
	session_start();
	if(!isset($_SESSION["login"]) or !$_SESSION["login"])
	{
		header("Location: ../index.php");
	}

	$title = "Nova Fração";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Fração</h2>
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
				?>
		
				<form method="post">
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
				"INSERT INTO fracoes (idcond, iuf, permilagem, andar, tipo, observacoes)
				VALUES ('" . $_POST['ctf'] ."', '" . $_POST['iuf'] ."','" . $_POST['permi'] ."', '" . $_POST['du'] ."', '" . $_POST['tipo'] ."', '" . $_POST['obs'] ."');")
				or die("Error4: ".mysqli_error($con));
	}
	

	mysqli_close($con);
	include "../footer.php";
?>