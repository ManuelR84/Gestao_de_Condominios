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
			    <label for="nome" <?php form_validation("nome");?> >Nome</label>
			    <input id="nome" type="text" class="form-control" placeholder="Nome" name="nome">
			  </div>
			  
			  <div class="form-group">
			    <label for="pass" <?php form_validation("password");?> >Password</label>
			    <input id="pass" type="password" class="form-control" placeholder="Password" name="password">
			  </div>
			  
			  <button type="submit" name="submit" class="btn btn-default">Login</button>
			</form>
		</div>
		<?php 
	} 
?>