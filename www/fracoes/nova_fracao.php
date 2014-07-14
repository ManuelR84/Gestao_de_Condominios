<?php 
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Nova Fração";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
		
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{echo "bp0";
		if(!isset($_POST["condomino"])){echo "bp1";
		}elseif(!isset($_POST["fracao"])){echo "bp2";
		}elseif(!isset($_POST["permilagem"])){echo "bp3";
		}elseif(!isset($_POST["designacao"])){echo "bp4";
		}elseif(!isset($_POST["tipo"])){echo "bp5";
		}elseif(!isset($_POST["observacoes"])){echo "bp6";
			//query de envio do formulario para a base de dados
			echo "bp7";
			mysqli_query($con,
			"INSERT INTO fracoes (idcond, iuf, permilagem, andar, tipo, observacoes)
			VALUES ('" . $_POST['condomino'] ."', '" . $_POST['fracao'] ."','" . $_POST['permilagem'] ."', '" . $_POST['designacao'] ."', '" . $_POST['tipo'] ."', '" . $_POST['observacoes'] ."');")
				or die("Error4: ".mysqli_error($con));
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Fração</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
		
				<form method="post">
				  <div class="form-group">
				    <label for="ctf">Condómino Titular da Fração</label>
				    <input type="text" class="form-control" placeholder="Nome" name="condomino">
				  </div>
				  
				  <div class="form-group">
				    <label for="iuf">Identificação Unica da Fração</label>
				    <input type="text" class="form-control" placeholder="ID fração" name="fracao">
				  </div>
				  
				 <div class="form-group">
				    <label for="permi">Permilagem da Fração</label>
				    <input type="text" class="form-control" placeholder="Permilagem" name="permilagem">
				  </div>
				  
				   <div class="form-group">
				    <label for="du">Designação Usual</label>
				    <input type="text" class="form-control" placeholder="Andar" name="designacao">
				  </div>
				  
				  <div class="form-group">
				    <label for="tipo">Tipo de Fração</label>
				    <select class="form-control" name="tipo">
					    <option value="">Escolha tipo...</option>
						<option value="Habitacional">Habitacional</option>
						<option value="Loja">Loja</option>
					</select>
				  </div>
				  
				  <div class="form-group">
				    <label for="obs">Observações</label>
				    <textarea rows="1" cols="5" type="text" class="form-control" placeholder="Observações" name="observacoes"></textarea>
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Inserir</button>
				</form>

			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php 
	mysqli_close($con);
	include "../footer.php";
?>