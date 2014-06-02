<?php 
	$title = "Listar Condominos";
	include_once "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<form role="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nome</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome">
	  </div>
	  
	  <div class="form-group">
	    <label for="exampleInputPassword1">CC</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="CC">
	  </div>
	  
	 <div class="form-group">
	    <label for="exampleInputPassword1">Morada</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Morada">
	  </div>
	  
	   <div class="form-group">
	    <label for="exampleInputPassword1">Telefone</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefone">
	  </div>
	  
	   <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
	  </div>
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	
</div>

<?php 
	include_once "../footer.php";
?>