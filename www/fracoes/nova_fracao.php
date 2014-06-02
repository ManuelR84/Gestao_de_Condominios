<?php 
	$title = "Nova Fração";
	include "../header.php";
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
		
				<form role="form">
				  <div class="form-group">
				    <label>Nome do Condómino</label>
				    <input type="text" class="form-control" placeholder="Nome" name="AAA">
				  </div>
				  
				  <div class="form-group">
				    <label>ID da Fração</label>
				    <input type="text" class="form-control" placeholder="CC" name="AAA">
				  </div>
				  
				 <div class="form-group">
				    <label>Permilagem</label>
				    <input type="text" class="form-control" placeholder="Morada" name="AAA">
				  </div>
				  
				   <div class="form-group">
				    <label>Designação Usual</label>
				    <input type="text" class="form-control" placeholder="Telefone" name="AAA">
				  </div>
				  
				   <div class="form-group">
				    <label>Tipo de Fração</label>
				    <input type="email" class="form-control" placeholder="Email" name="AAA">
				  </div>
				  
				  <div class="form-group">
				    <label>Observações</label>
				   	<textarea rows="1" cols="5" type="text" class="form-control" placeholder="Obervações" name="AAA"></textarea>
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