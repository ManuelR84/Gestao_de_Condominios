<?php
	session_start();
	$title = "Alterar Profile";
	include "../header.php";
	session_validation();
	
	$result = mysqli_query($con,
			"SELECT * FROM utilizadores
			WHERE email='".$_SESSION['user_email']."';")
			or error_validation($con);
	
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))
	{
		if( $_POST["nomeconta"] != "")
		{
			mysqli_query($con,
			"UPDATE utilizadores
			SET nomeconta = '" . $_POST['nomeconta'] ."',
				nomegestor = '" . $_POST['nomegestor'] ."',
				nomecondominio = '" . $_POST['nomecondominio'] ."',
				morada = '" . $_POST['morada'] ."',
				codigopostal = '" . $_POST['codigopostal'] ."'
			WHERE email='".$_SESSION['user_email']."';")
			or error_validation($con);
				
			mysqli_close($con);
			header("Location: profile.php");
		}else{
			$_SESSION['warning'] = "Faltam campos por preencher";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Alterar Profile</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				
				<form method="post">
				  <div class="form-group">
				    <label for="nomeconta" <?php form_validation("nomeconta");?> >Nome de Conta</label>
				    <input id="nomeconta" type="text" class="form-control" placeholder="Nome de Conta" value="<?php echo $row['nomeconta']; ?>" name="nomeconta">
				  </div>
				  
				  <div class="form-group">
				    <label for="nomegestor">Nome do Gestor</label>
				    <input id="nomegestor" type="text" class="form-control" placeholder="Nome do Gestor" value="<?php echo $row['nomegestor']; ?>" name="nomegestor">
				  </div>
				  
				  <div class="form-group">
				    <label for="nomecondominio">Nome do Condominio</label>
				    <input id="nomecondominio" type="text" class="form-control" placeholder="Rubrica" value="<?php echo $row['nomecondominio']; ?>" name="nomecondominio">
				  </div>
				  
				  <div class="form-group">
				    <label for="morada">Morada</label>
				    <input id="morada" type="text" class="form-control" placeholder="Morada" value="<?php echo $row['morada']; ?>" name="morada">
				  </div>
				  
				   <div class="form-group">
				    <label for="codigopostal">Codigo Postal</label>
				    <input id="codigopostal" type="number" class="form-control" placeholder="Codigo Postal" value="<?php echo $row['codigopostal']; ?>" name="codigopostal">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Alterar</button>
				  <input type="button" value="Voltar" class="btn btn-default" onClick="javascript:history.back(1)">
				</form>
		
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	include "../footer.php";
?>