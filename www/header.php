<?php
//Disable error reporting
	error_reporting(0);

//Chamamento das Classes
	include "classes/dbconnect.php";
	include "classes/condominos.php";
	include "classes/despesas.php";
	include "classes/fracoes.php";
	include "classes/receitas.php";
	include "classes/registocontas.php";
	include "classes/rubricas.php";
	include "classes/transferencias.php";
	
//Estabelecimento da ligação à base de dados
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "gestao_condominios";
	
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or 
	die	("<h2>Nao foi possivel estabelecer a ligacao ao MySQL!</h2>"); //mensagem de erro sobre a ligação
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="#">

<title><?php echo $title;?></title>

<!-- Bootstrap core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/css/styles.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!-- START Container -->
	<div class="container">
		<!-- Static navbar -->
		<div class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a href="/index.php" class="navbar-brand">GCO</a>
				</div>
		
				<div class="navbar-collapse collapse">
				
					<!-- *** Lado Esquerdo *** -->
					<ul class="nav navbar-nav">
		
						<!-- Menu dos Condóminos -->
						<li class="dropdown l-vline"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Condóminos <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/condominos/listar_condominos.php"><span class="glyphicon glyphicon-eye-open"></span> Listar condónimos</a></li>
								<li class="divider"></li>
								<li><a href="/condominos/novo_condomino.php"><span class="glyphicon glyphicon-plus-sign"></span> Novo condónimo</a></li>
							</ul>
						</li>
		
						<!-- Menu das Frações -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Frações <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/fracoes/listar_fracoes.php"><span class="glyphicon glyphicon-eye-open"></span> Listar frações</a></li>
								<li class="divider"></li>
								<li><a href="/fracoes/nova_fracao.php"><span class="glyphicon glyphicon-plus-sign"></span> Nova fração</a></li>
							</ul>
						</li>
		
						<!-- Menu das Rubricas -->
						<li class="dropdown l-vline"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Rubricas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/rubricas/listar_rubricas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar rubricas</a></li>
								<li class="divider"></li>
								<li><a href="/rubricas/nova_rubrica.php"><span class="glyphicon glyphicon-plus-sign"></span> Nova rubrica</a></li>
							</ul>
						</li>
		
						<!-- Menu das Receitas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Receitas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/receitas/listar_receitas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar receitas</a></li>
								<li class="divider"></li>
								<li><a href="/receitas/inserir_receita.php"><span class="glyphicon glyphicon-plus-sign"></span> Inserir receita</a></li>
							</ul>
						</li>
		
						<!-- Menu das Despesas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Despesas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/despesas/listar_despesas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar Despesas</a></li>
								<li class="divider"></li>
								<li><a href="/despesas/inserir_despesa.php"><span class="glyphicon glyphicon-plus-sign"></span> Inserir Despesa</a></li>
							</ul>
						</li>
		
						<!-- Menu das Contas -->
						<li class="dropdown l-vline"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/contas/listar_contas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar Contas</a></li>
								<li><a href="/contas/listar_transferencias.php"><span class="glyphicon glyphicon-sort"></span> Listar Transferências</a></li>
								<li class="divider"></li>
								<li><a href="/contas/registo_conta.php"><span class="glyphicon glyphicon-plus-sign"></span> Registo de Conta</a></li>
								<li><a href="/contas/transferencias.php"><span class="glyphicon glyphicon-euro"></span> Transferências</a></li>
							</ul>
						</li>
		
						<!-- Menu das Prestação de Contas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Prestação de Contas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/prestacao_de_contas/resumo_financeiro.php"><span class="glyphicon glyphicon-eye-open"></span> Resumo Financeiro</a></li>
								<li class="divider"></li>
								<li><a href="/prestacao_de_contas/saldo.php"><span class="glyphicon glyphicon-eye-open"></span> Saldo de Contas</a></li>
								<li class="divider"></li>
								<li><a href="/prestacao_de_contas/receitas.php"><span class="glyphicon glyphicon-eye-open"></span> Por Receitas</a></li>
								<li><a href="/prestacao_de_contas/despesas.php"><span class="glyphicon glyphicon-eye-open"></span> Por Despesas</a></li>
								<li><a href="/prestacao_de_contas/rubricas.php"><span class="glyphicon glyphicon-eye-open"></span> Por Rubricas</a></li>
							</ul>
						</li>
					</ul>
					
					<!-- *** Lado Direito *** -->
					<ul class="nav navbar-nav navbar-right">
						
						<?php if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ ?>
								<!-- Botão de Registo de Contas de Utilizadores -->
								<div class="navbar-header">
									<a href="/utilizadores/novo_utilizador.php" class="navbar-brand l-vline">Nova Conta</a>
								</div>
						<?php } ?>
						
						<!-- Menu do Login -->
						<li class="active dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php 
									if(!isset($_SESSION["login"]) or !$_SESSION["login"])
									{
										echo "<b>Login</b>";
									}else{
										echo '<span class="glyphicon glyphicon-user"></span> ';
										echo "<b>".$_SESSION['username']."</b>"; //Nome do utilizador durante a sessão
									}
								?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<?php include "/login/login.php"; ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
<?php 
//DIV para mensagens de avisos 
	if(isset($_SESSION['warning']) and !$_SESSION['warning']=='')
	{
		echo "<div class='error_message'>".$_SESSION['warning']."</div>";
		$_SESSION['warning'] = '';
	}
	
//DIV para mensagens de erros
	if(isset($_SESSION['error']) and !$_SESSION['error']=='')
	{
		echo "<div class='error_message'>".$_SESSION['error']."</div>";
		$_SESSION['error'] = '';
	}
	
//Funções de Validações
	function session_validation()
	{
		//Verifica se a sessão de login foi validada
		if(!isset($_SESSION["login"]) or !$_SESSION["login"])
			header("Location: ../utilizadores/novo_utilizador.php"); //caso contrário envia para a página de registo
	}
	
	function form_validation($name)
	{
		if(isset($_POST[$name]) and $_POST[$name]=="")
			echo "class= 'red_error'"; //aviso de erro sobre os campos de formulário
	}
	
	function error_validation($con)
	{
		include "footer.php"; //Para se poder usar os menus depois da mensagem de erro
	
		die(
			'<div class="error_message">ERRO de MySQL: '.mysqli_error($con).'</div>
			<input type="button" value="Voltar" class="btn btn-default" onClick="javascript:history.back(1)">'
		);
	}
?>