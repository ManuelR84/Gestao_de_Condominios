<?php
	$title = "Inserir Receita";
	include "../header.php";
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
	
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nome</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">CC</label>
				    <input type="text" class="form-control" placeholder="CC">
				  </div>
				  
				 <div class="form-group">
				    <label for="exampleInputPassword1">Morada</label>
				    <input type="text" class="form-control" placeholder="Morada">
				  </div>
				  
				   <div class="form-group">
				    <label for="exampleInputPassword1">Telefone</label>
				    <input type="text" class="form-control" placeholder="Telefone">
				  </div>
				  
				   <div class="form-group">
				    <label for="exampleInputPassword1">Email</label>
				    <input type="email" class="form-control" placeholder="Email">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
		
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	include_once "../footer.php";
?>