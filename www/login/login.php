<?php 
	if(isset($_SESSION["login"]) && $_SESSION["login"])
	{ 	?>
		<li><a href="/utilizadores/profile.php"><span class="glyphicon glyphicon-eye-open"></span> Ver Profile</a></li>
		<li><a href="/login/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
		<?php
	}else{ 
		?>
		<div class="login">
			<form method="post">
			  <div class="form-group">
			    <label for="user_email" <?php form_validation("user_email");?> >Email</label>
			    <input id="user_email" type="text" class="form-control" placeholder="Email" name="user_email">
			  </div>
			  
			  <div class="form-group">
			    <label for="user_password" <?php form_validation("user_password");?> >Password</label>
			    <input id="user_password" type="password" class="form-control" placeholder="Password" name="user_password">
			  </div>
			  
			  <button type="submit" name="login" class="btn btn-default">Login</button>
			</form>
		</div>
		<?php 
	} 
	
	//Verifica se o botão de 'submit' foi carregado
	if(isset($_POST['login']))
	{
		//Verifica se os campos do formulário não estão vazios
		if(	$_POST['user_email'] != "" and	$_POST['user_password'] != "")
		{
			//Query de pesquisa de utilizadores para o login
			$result = mysqli_query($con,
					"SELECT nomeconta, email, password
					FROM utilizadores
					WHERE email = '".$_POST['user_email']."' and password = '".$_POST['user_password']."';")
					or error_validation($con); //mensagem de erro sobre SQL

			//Verifica se existe só um utilizador com os dados submetidos
			if(mysqli_num_rows($result) == 1)
			{
				$row = mysqli_fetch_array($result);
				$_SESSION['user_name'] = $row['nomeconta'];
				$_SESSION['user_email'] = $row['email'];
				$_SESSION['login'] = true; //Valida a sessão
	
				mysqli_close($con); //Fecha a ligação à base de dados
				header("Location: /index.php"); //Faz 'refresh' à página do index
			}else
				$_SESSION['error'] = "Login não existente!";
		}else{
			$_SESSION['error'] = "Campos de Login vazios!";
		}
	}
?>