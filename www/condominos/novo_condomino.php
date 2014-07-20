<?php
	session_start();
	$title = "Novo Condomino";
	include "../header.php";
	session_validation();
	
	if(isset($_POST['submit']))
	{	
		if(	$_POST["nome"] != "" and
		$_POST["cc"] != "" and
		$_POST["morada"] != "" and
		$_POST["tele"] != "" and
		$_POST["email"] != "")
		{
			mysqli_query($con,
			"INSERT INTO condominos (nome, cc, morada, contacto, email)
			VALUES ('" . $_POST['nome'] ."',
					'" . $_POST['cc'] ."',
					'" . $_POST['morada'] ."',
					'" . $_POST['tele'] ."',
					'" . $_POST['email'] ."');")
			or error_validation($con);
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Inserir Condómino</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form method="post">
				  <div class="form-group">
				    <label for="nome" <?php form_validation("nome");?> >Nome</label>
				    <input id="nome" type="text" class="form-control" placeholder="Nome" name="nome" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="cc" <?php form_validation("cc");?> >Cartão de cidadão</label>
				    <input id="cc" type="text" class="form-control" placeholder="CC" name="cc" maxlength="8">
				  </div>
				  
				 <div class="form-group">
				    <label for="morada" <?php form_validation("morada");?> >Morada</label>
				    <input id="morada" type="text" class="form-control" placeholder="Morada" name="morada" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="tele" <?php form_validation("tele");?> >Telefone</label>
				    <input id="tele" type="text" class="form-control" placeholder="Telefone" name="tele" maxlength="9">
				  </div>
				  
				   <div class="form-group">
				    <label for="email" <?php form_validation("email");?> >E-mail</label>
				    <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" maxlength="50">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Inserir</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php
	include "../footer.php";
?>