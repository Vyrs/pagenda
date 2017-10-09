<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/bootbox.min.js"></script>
	<title>Pagenda - sua agenda de contatos online</title>
	<!--personal css-->
	<link rel="stylesheet" href="css/pessoal.css">
</head>
<body class="jumbotron">
    <div class="container">
        <div class="row"> <!--titulo-title-->
            <center><span class="pagenda-font" id="title">Pagenda</span></center>
            </br></br>
        </div>
        <div class="row form-group"> <!--formulario-form-->
            <div class="col-lg-6"> 
				<form method="post" action="php/usuariosFacade.php">
            		<label class="pagenda-font">E-mail</label>
            		<input class="form-control" type="text" name="lemail" placeholder="seu e-mail"></input>
            		<input type="checkbox"><span class="pagenda-font">Lembrar</span></input>
            		</br></br>
            		<label class="pagenda-font">Senha</label>
            		<input class="form-control" type="password" name="lsenha" placeholder="******"></input>
            		<a class="pagenda-font" href="#">Esqueci minha senha</a>
            		</br></br>
            		<input class="btn btn-pagenda pagenda-font" type="submit" name="Entrar" value="Entrar"></input>
            	</form>
            </div>
            <div class="col-lg-5 col-lg-offset-1"><!--cadastrar-->
            	</br></br>
            	<div class="row">
            		<span class="pagenda-font fontm-pagenda">Ainda não tem sua conta, é só clicar no botão abaixo e realizar o seu cadastro, é bem rapidinho, com o Pagenda, você tem seus contatos onde estiver, é só acessar via web.</span>
            	</div>
            	</br></br>
            	<div class="row">
            		<button class=" col-lg-4 col-lg-offset-4 pagenda-font btn btn-pagenda" type="button" data-toggle="modal" data-target="#cadastroModal">Cadastrar</button>
            	</div>
            </div> 
        </div>
        <div class="modal fade" id="cadastroModal" role="dialog">
        	<div class="modal-dialog .modal-lg">
        		<!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <center><h4 class="modal-title">Cadastro</h4></center>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <form action="php/usuariosFacade.php" method="POST">
	                                    <tbody id="habilidadesModal">
		                                    <label>Nome</label>
		                                    <input class="form-control" type="text" name="nome">
		                                    <label>E-mail</label>
		                                    <input class="form-control" type="email" name="email">
		                                    <label>Senha</label>	
		                                    <input class="form-control" type="password" name="senha">
		                                    <label>Repetir Senha</label>
		                                    <input class="form-control" type="password" name="resenha"></br>	
	                                    </tbody>
	                                    <tfoot>
	                                        <input class=" col-lg-4 col-lg-offset-1 btn btn-pagenda pagenda-font" type="submit" name="Entrar" value="Cadastrar"></input>
	                                        <button type="button" class=" col-lg-3 col-lg-offset-3 btn btn-danger pagenda-font" data-dismiss="modal">Sair</button>
	                                	</tfoot>
                                    </form>
                                </table> 
                            </div>
                        </div>
                    </div>
          	</div><!--fim da div modal--> 
            <?php 
                if (isset($_SESSION['create']) && !empty($_SESSION['create']))
                    {
                        echo "<script> alert('Usuario cadastrado com sucesso.');</script>" ;
                        session_destroy();
                    } 

                if (isset($_SESSION['false']) && !empty($_SESSION['false']))
                    {
                        echo "<script> alert('Usuario ou senha invalidos.');</script>" ;
                        session_destroy();
                    } 
            ?>                                   
    	</div>

       
</body>
</html>
