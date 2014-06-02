<?php 
	$title = "Novo Condomino";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nome do condómino</label>
				    <input type="text" class="form-control" placeholder="Nome" name="AAA">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">Cartão de cidadão</label>
				    <input type="text" class="form-control" placeholder="CC" name="AAA">
				  </div>
				  
				 <div class="form-group">
				    <label for="exampleInputPassword1">Morada do condómino</label>
				    <input type="text" class="form-control" placeholder="Morada" name="AAA">
				  </div>
				  
				  <br>
				  
				   <div class="form-group">
				    <label for="exampleInputPassword1">Telefone</label>
				    <input type="number" class="form-control" placeholder="Telefone" name="AAA">
				  </div>
				  
				   <div class="form-group">
				    <label for="exampleInputPassword1">Email</label>
				    <input type="email" class="form-control" placeholder="Email" name="AAA">
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