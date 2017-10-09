<?php


class Banco 
{

	private $pdo;
	private $rows;
	private $array;
	private $dbname ="agenda";
	private $host="localhost";
	private $dbuser = "root";
	private $dbpass = "123456";

	public function __construct() 
	{	
		try
		{
			$this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host, $this->dbuser, $this->dbpass);
		} 
		catch (PDOException $e) 
		{
			echo 'ERROR: ' . $e->getMessage();
		}	

	}

	public function query($sql)
	{
		$query = $this->pdo->query($sql);
		$this->rows = $query->rowCount();
		$this->array = $query->fetchAll();

	}

	public function selectOne($sql)
	{
		$query = $this->pdo->query($sql);
		$this->rows = $query->rowCount();
		$this->array = $query->fetch();

	}

	public function insert($table, $data)
	{
		if(!empty($table) && (is_array($data) && count($data) > 0))
		{
			$sql = "INSERT INTO ".$table." SET ";
			$dados  = array();
			
			foreach ($data as $key => $valor) 
			{
				$dados[] = $key." ='".addslashes($valor)."'";
			}
			$sql = $sql.implode(",", $dados);
			
			$this->pdo->query($sql);

		}

	}

	public function update($table, $data, $where = array(), $w_cond = "and")
	{
		if(!empty($table) && (is_array($data) && count($data) > 0) && is_array($where)) 
		{
			$sql = "UPDATE ".$table." SET ";
			$dados = array();

			foreach ($data as $key => $valor) 
			{
				$dados[] = $key." ='".addslashes($valor)."'";
			}

			$sql = $sql.implode(",", $dados);

			if(count($where) > 0)
			{
				$dados = array();
			foreach ($where as $key => $valor) 
			{
				$dados[] = $key." ='".addslashes($valor)."'";
			}
			$sql = $sql." where ".implode("".$w_cond."", $dados);
			}

			$this->pdo->query($sql);
		}
	}

	public function delete($table, $where, $w_cond = "and")
	{
		if(!empty($table) && (is_array($where) && count($where) > 0))
		{
			$sql = "DELETE FROM ".$table;
			$dados = array();

			if(count($where) > 0)
			{
				$dados = array();
			foreach ($where as $key => $valor) 
			{
				$dados[] = $key." ='".addslashes($valor)."'";
			}
			$sql = $sql." where ".implode("".$w_cond."", $dados);
			}

			$this->pdo->query($sql);
		}
	}

	public function result()
	{
		return $this->array;
	}

	public function numRows() 
	{
		return $this->rows;
	}

}
?>