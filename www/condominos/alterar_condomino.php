<?php 
	session_start();
	$title = "Alterar Condominos";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT nome, cc, morada, contacto, email
			FROM condominos
			WHERE idcond = " . $_GET['id'] . ";")
			or error_validation($con);
		
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))
	{
		mysqli_query($con,
		"UPDATE condominos
		SET nome = '" . $_POST['nome'] ."',
			cc = '" . $_POST['cc'] ."',
			morada = '" . $_POST['morada'] ."',
			contacto = '" . $_POST['tele'] ."',
			email = '" . $_POST['email'] ."'
		WHERE idcond = " . $_GET['id'] . ";")
		or error_validation($con);
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Alterar Condómino</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">

				<form method="post">
				  <div class="form-group">
				    <label for="nome">Nome do condómino</label>
				    <input id="nome" type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $row['nome']; ?>" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="cc">Cartão de cidadão</label>
				    <input id="cc" type="text" class="form-control" placeholder="CC" name="cc" value="<?php echo $row['cc']; ?>" maxlength="8">
				  </div>
				  
				 <div class="form-group">
				    <label for="morada">Morada do condómino</label>
				    <input id="morada" type="text" class="form-control" placeholder="Morada" name="morada" value="<?php echo $row['morada']; ?>" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="tele">Telefone</label>
				    <input id="tele" type="text" class="form-control" placeholder="Telefone" name="tele" value="<?php echo $row['contacto']; ?>" maxlength="9">
				  </div>
				  
				   <div class="form-group">
				    <label for="email">E-mail</label>
				    <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>" maxlength="50">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				</form>
	
			</div>
		</div>
	</div>
</div>

<?php
	mysqli_close($con);
	include "../footer.php";
?>