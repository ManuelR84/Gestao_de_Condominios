<?php 
	if(isset($_SESSION["login"]))
		if($_SESSION["login"])
		{ ?>
	
			<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Ver Profile</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
	
<?php 	}else{ ?>

		<div class="login">
			<form role="form">
			  <div class="form-group">
			    <label for="nomerub">Nome</label>
			    <input type="text" class="form-control" placeholder="Nome" name="nome">
			  </div>
			  
			  <div class="form-group">
			    <label for="nomerub">Password</label>
			    <input type="password" class="form-control" placeholder="Password" name="password">
			  </div>
			  
			  <button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	
<?php 	} ?>