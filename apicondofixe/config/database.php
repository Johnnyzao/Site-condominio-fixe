<?php
//especificar ligacao à bd
class Database
{
	//definir atributos
	private $host="localhost";
	private $db_name="condofixe";
	private $username="root";
	private $password="usbw";
	private $port=3307;
	public $conn;
	//criar métodos para a classe
	public function getConnection()
	{
		$this->conn=null;
		try{
		$this->conn=new PDO("mysql:host=$this->host;
			dbname=$this->db_name;
			port=$this->port;",
			$this->username,
			$this->password);

		$this->conn->exec("set names utf8");
		}
		catch(PDOException $exception)
		{
			echo "Impossível ligar ao servidor da BD. ".$exception->getMessage();
		}

		return $this->conn;

	}
}


?>