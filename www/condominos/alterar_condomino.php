<?php 
	$title = "Alterar Condominos";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Condómino</h2>
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
							"SELECT nome, cc, morada, contacto, email
							FROM condominos
							WHERE idcond = " . $_GET['id'] . ";")
							or die("Error2: ".mysqli_error($con));
					
					$row = mysqli_fetch_array($result);
				?>

				<form method="post">
				  <div class="form-group">
				    <label for="nomecondo">Nome do condómino</label>
				    <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $row['nome'] ?>" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="cccondo">Cartão de cidadão</label>
				    <input type="text" class="form-control" placeholder="CC" name="cc" value="<?php echo $row['cc'] ?>" maxlength="8">
				  </div>
				  
				 <div class="form-group">
				    <label for="moradacondo">Morada do condómino</label>
				    <input type="text" class="form-control" placeholder="Morada" name="morada" value="<?php echo $row['morada'] ?>" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="telecondo">Telefone</label>
				    <input type="text" class="form-control" placeholder="Telefone" name="tele" value="<?php echo $row['contacto'] ?>" maxlength="9">
				  </div>
				  
				   <div class="form-group">
				    <label for="emailcondo">E-mail</label>
				    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $row['email'] ?>" maxlength="50">
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
				"UPDATE condominos
				SET nome = '" . $_POST['nome'] ."', cc = '" . $_POST['cc'] ."', morada = '" . $_POST['morada'] ."', contacto = '" . $_POST['tele'] ."', email = '" . $_POST['email'] ."'
				WHERE idcond = " . $_GET['id'] . ";")
				or die("Error3: ".mysqli_error($con));
	}

	mysqli_close($con);
	include "../footer.php";
?>