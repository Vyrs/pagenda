<?php

class usuarios
{


	private $id_usr;
	private $nome;
	private $email;
	private $senha;
	private $banco;

	public function __construct()
	{
		
	} 

	public function CadastraUsuario($dados = array())
	{
		$result =  $this->$banco->insert('usuarios',$dados);

	}


}

?>