<?php
	session_start();
	$title = "Novo Utilizador";
	include "../header.php";
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Novo Utilizador</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form method="post">
				  <div class="form-group">
				    <label for="nu-username" <?php form_validation("username");?> >Nome de Conta</label>
				    <input id="nu-username" type="text" class="form-control" placeholder="Nome" name="username">
				  </div>
				  
				  <div class="form-group">
				    <label for="nu-email" <?php form_validation("email");?> >E-mail</label>
				    <input id="nu-email" type="text" class="form-control" placeholder="Email" name="email">
				  </div>
				  
				  <div class="form-group">
				    <label for="nu-pass" <?php form_validation("password");?> >Password</label>
				    <input id="nu-pass" type="text" class="form-control" placeholder="Password" name="password">
				  </div>
				  
				  <button type="submit" name="submit" class="btn btn-default">Registar</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- END Página de <?php echo $title?> -->

<?php 
	//Verifica se o botão de 'submit' foi carregado
	if(isset($_POST['submit']))
	{
		//Verifica se os campos do formulário não estão vazios
		if(	$_POST["username"] != "" and
		$_POST["email"] != "" and
		$_POST["password"] != "")
		{
			//Query de verificação se já existe um utilizador idêntico
			$result = mysqli_query($con,
					"SELECT nomeconta
						FROM utilizadores
						WHERE nomeconta = '".$_POST['nome']."';")
						or error_validation($con);
				
			//Verifica quantos utilizadores existem com o mesmo nome
			if(mysqli_num_rows($result)<1)
			{
				mysqli_query($con,
				"INSERT INTO utilizadores (nomeconta, email, password)
					VALUES ('" . $_POST['username'] ."',
							'" . $_POST['email'] ."',
							'" . $_POST['password'] ."');")
							or error_validation($con); //mensagem de erro sobre SQL
			}else
				echo "<div class='error_message'>Um utilizador idêntico já existente. Use outro nome.</div>";
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
	
	mysqli_close($con);
	include "../footer.php";
?>
