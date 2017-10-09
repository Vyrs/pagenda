<?php

include 'banco.php';
session_start();

class UsuariosFacade
{
	
	function __construct()
	{
		
	}

	public function createAcc($nome, $email, $senha, $resenha)
	{
		
			$n = addslashes($nome);
			$e = addslashes($email);
			$s = addslashes($senha);
			$rs = addslashes($resenha);

			if ($s == $rs) 
			{
				$con = new banco();
				$con->insert('usuarios',array('nome' => $n ,'email' => $e ,'senha' => md5($s)));
				$_SESSION['create'] = true;					
				header('Location: ../index.php'); 
			}
			
	}

	public function login($email, $senha)
	{
		$e = addslashes($email);
		$s = md5(addslashes($senha));

		$sql = "select id_usr, email, senha from usuarios where email = '$e' and senha = '$s' ";

		if(isset($e) && isset($s))
		{
			$con = new banco();
			$con->selectOne($sql);
			$result = $con->result();

			if (empty($result))
			{
				$_SESSION['false'] = true;					
				header('Location: ../index.php'); 
			}
			foreach ($result as $usuario => $value) 
			{
				if (($result['email'] == $e) && ($result['senha'] == $s))
				{
					$_SESSION['email'] = $e;
					$_SESSION['cod'] = $result['id_usr'];
					header('Location: ../home.php');		
				} 
			}

		}

	}

	public function logOff()
	{
		session_destroy();
		header('Location: ../index.php'); 
	}

}
	// cuida da criacao de contas
	if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['resenha']))
	{
		$user = new UsuariosFacade();
 		$user->createAcc($_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['resenha']);
	}

	//cuida do login
	if(isset($_POST['lemail']) && isset($_POST['lsenha']))
	{
		$user = new UsuariosFacade();
 		$user->login($_POST['lemail'],$_POST['lsenha']);	
	}
 	// executa o logoff
 	if(isset($_GET['sair']) && !empty($_GET['sair']))
 	{
 		$user = new UsuariosFacade();
 		$user->logOff();	
 	}
?>