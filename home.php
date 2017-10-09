<?php
	session_start();

    if (!isset($_SESSION['email']) && empty($_SESSION['email']) && !isset($_SESSION['cod']) && empty($_SESSION['cod'])) {
    	return header('location: index.php');
    }

    $logado =  $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/bootbox.min.js"></script>
	<title>Pagenda - sua agenda de contatos online</title>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container">
    		<ul class="nav navbar-nav"> 
    			<li class="active"><a href="#">Inicio</a></li>
    			<li><a href="#">Cadastrar Contatos</a></li> 
    			<li><a href="#">Consultar Contatos</a></li> 
    		</ul>
    		<ul class=" nav navbar-right">
				<li>Bem vindo(a): <?php echo $logado ;?></li>
				<li><a href="/pagenda/php/usuariosFacade.php?sair=true">Sair</a></li>
			</ul>
			
  		</div>
	</nav>
    <div class="container">
        
        <div class="form jumbotron"> <!--formulario-->

		
        </div>

    </div>

</body>
</html>
