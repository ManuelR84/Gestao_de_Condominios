<?php 
	session_start();
	$title = "Nova Fração";
	include "../header.php";
	session_validation();
	
	$nf = new Fracoes();
	
	$result = mysqli_query($con,
			"SELECT idcond, nome
			FROM condominos;")
			or error_validation($con);
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(	$_POST["condomino"] != "" and
			$_POST["fracao"] != "" and
			$_POST["permilagem"] != "" and
			$_POST["designacao"] != "" and
			$_POST["tipo"] != "" and
			$_POST["observacoes"] != "")
		{
			//query de envio do formulario para a base de dados
			mysqli_query($con,
			"INSERT INTO fracoes (idcond, iuf, permilagem, andar, tipo, observacoes)
			VALUES ('" . $_POST['condomino'] ."',
					'" . $_POST['fracao'] ."',
					'" . $_POST['permilagem'] ."',
					'" . $_POST['designacao'] ."',
					'" . $_POST['tipo'] ."',
					'" . $_POST['observacoes'] ."');")
			or error_validation($con);
			
			mysqli_close($con);
			header("Location: listar_fracoes.php");
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Página de <?php echo $title?> -->
<div class="jumbotron">

	<h2>Inserir Fração</h2>
	<br />
	
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
		
				<form method="post">
				  <div class="form-group">
				    <label for="condomino" <?php form_validation("condomino");?> >Condómino Titular da Fração</label>
					<select id="condomino" class="form-control" name="condomino">
						<option value="">Escolha Condomino...</option>
						<?php 
							while($row = mysqli_fetch_array($result))
							{
								echo "<option value=". $row['idcond'] .">". $row['nome'] ."</option>";
							}
						?>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="iuf" <?php form_validation("fracao");?> >Identificação Unica da Fração</label>
				    <input id="iuf" type="text" class="form-control" placeholder="ID fração" name="fracao" maxlength="10">
				  </div>
				  
				 <div class="form-group">
				    <label for="permi" <?php form_validation("permilagem");?> >Permilagem da Fração</label>
				    <input id="permi" type="text" class="form-control" placeholder="Permilagem" name="permilagem">
				  </div>
				  
				   <div class="form-group">
				    <label for="du" <?php form_validation("designacao");?> >Designação Usual</label>
				    <input id="du" type="text" class="form-control" placeholder="Andar" name="designacao" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo" <?php form_validation("tipo");?> >Tipo de Fração</label>
				    <select class="form-control" name="tipo">
					    <option value="">Escolha tipo...</option>
						<option value="Habitacional">Habitacional</option>
						<option value="Loja">Loja</option>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="obs" <?php form_validation("observacoes");?> >Observações</label>
				    <textarea rows="1" cols="5" type="text" class="form-control" placeholder="Observações" name="observacoes"></textarea>
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
	mysqli_close($con);
	include "../footer.php";
?>