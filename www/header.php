<?php
	//Classes
	include "classes/db_connect.php";
	include "classes/condominos.php";
	include "classes/despesas.php";
	include "classes/fracoes.php";
	include "classes/receitas.php";
	include "classes/registocontas.php";
	include "classes/rubricas.php";
	include "classes/transferencias.php";
	
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "gestao_condominios";
	
	$dblink = new DBConnect($dbhost, $dbusername, $dbpassword, $dbname);
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
	<div class="container">
		<!-- Static navbar -->
		<div class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a href="http://localhost" class="navbar-brand">GCO</a>
				</div>
		
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
		
						<!-- Condóminos -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Condóminos <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/condominos/listar_condominos.php"><span class="glyphicon glyphicon-eye-open"></span> Listar condónimos</a></li>
								<li class="divider"></li>
								<li><a href="/condominos/novo_condomino.php"><span class="glyphicon glyphicon-plus-sign"></span> Novo condónimo</a></li>
								<li><a href="/condominos/apagar_condomino.php"><span class="glyphicon glyphicon-minus-sign"></span> Apagar condónimo</a></li>
							</ul>
						</li>
		
						<!-- Frações -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Frações <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/fracoes/listar_fracoes.php"><span class="glyphicon glyphicon-eye-open"></span> Listar frações</a></li>
								<li class="divider"></li>
								<li><a href="/fracoes/nova_fracao.php"><span class="glyphicon glyphicon-plus-sign"></span> Nova fração</a></li>
								<li><a href="/fracoes/apagar_fracao.php"><span class="glyphicon glyphicon-minus-sign"></span> Apagar fração</a></li>
							</ul>
						</li>
		
						<!-- Rubricas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Rubricas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/rubricas/listar_rubricas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar rubricas</a></li>
								<li class="divider"></li>
								<li><a href="/rubricas/nova_rubrica.php"><span class="glyphicon glyphicon-plus-sign"></span> Nova rubrica</a></li>
							</ul>
						</li>
		
						<!-- Receitas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Receitas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/receitas/listar_receitas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar receitas</a></li>
								<li class="divider"></li>
								<li><a href="/receitas/inserir_receita.php"><span class="glyphicon glyphicon-plus-sign"></span> Inserir receita</a></li>
								<li><a href="/receitas/apagar_receita.php"><span class="glyphicon glyphicon-minus-sign"></span> Apagar receita</a></li>
							</ul>
						</li>
		
						<!-- Despesas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Despesas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/despesas/listar_despesas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar Despesas</a></li>
								<li class="divider"></li>
								<li><a href="/despesas/inserir_despesa.php"><span class="glyphicon glyphicon-plus-sign"></span> Inserir Despesa</a></li>
								<li><a href="/despesas/apagar_despesa.php"><span class="glyphicon glyphicon-minus-sign"></span> Apagar Despesa</a></li>
							</ul>
						</li>
		
						<!-- Contas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/contas/listar_contas.php"><span class="glyphicon glyphicon-eye-open"></span> Listar Contas</a></li>
								<li class="divider"></li>
								<li><a href="/contas/registo_conta.php"><span class="glyphicon glyphicon-plus-sign"></span> Registo de Conta</a></li>
								<li><a href="/contas/transferencias.php"><span class="glyphicon glyphicon-euro"></span> Transferências</a></li>
							</ul>
						</li>
		
						<!-- Prestação de Contas -->
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
		
					<ul class="nav navbar-nav navbar-right">
						<li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo "Nome"; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php include "/login/login.php"; ?>
							</ul>
						</li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>