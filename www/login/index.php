<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

<title>Gestor de Condomínios Index</title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/navbar.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

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
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar condónimos</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Novo condónimo</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-minus-sign"></span> Apagar condónimo</a></li>
							</ul>
						</li>

						<!-- Frações -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Frações <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar frações</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Nova fração</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-minus-sign"></span> Apagar fração</a></li>
							</ul>
						</li>

						<!-- Rubricas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Rubricas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar rubricas</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Nova rubrica</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-minus-sign"></span> Apagar rubrica</a></li>
							</ul>
						</li>

						<!-- Receitas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Receitas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar receitas</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Inserir receita</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-minus-sign"></span> Apagar receita</a></li>
							</ul>
						</li>

						<!-- Despesas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Despesas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar Despesas</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Inserir Despesa</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-minus-sign"></span> Apagar Despesa</a></li>
							</ul>
						</li>

						<!-- Contas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Listar Contas</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Registo de Conta</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-euro"></span> Transferências</a></li>
							</ul>
						</li>

						<!-- Prestação de Contas -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Prestação de Contas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Resumo Financeiro</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Saldo de Contas</a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Por Receitas</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Por Despesas</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Por Rubrica</a></li>
							</ul>
						</li>
					</ul>
					<!-- navbar left -->

					<ul class="nav navbar-nav navbar-right">
						<li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login <b class="caret"></b></a>
							
							<ul class="dropdown-menu">
								<li>
									<a>
										<form role="form">
											 <div class="form-group">
												<label>Email address</label> 
												<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
											</div>
											
											 <div class="form-group">
												<label>Password</label> 
												<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
											</div>
										</form>
									</a>
								</li>
							</ul>
							
							
						</li>

						<li><a href="#"> Registar Conta</a></li>
					</ul>
					<!-- navbar right -->
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>

		<!-- Main component for a primary marketing message or call to action -->
		<div class="jumbotron">
			<h2>Gestor de Condomínios Online</h2>
			<p>Bem-vindo ao nosso sistema de gestão de condomínios online.</p>
		</div>

	</div>
	<!-- /container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
