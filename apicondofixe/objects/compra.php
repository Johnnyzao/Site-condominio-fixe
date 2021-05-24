<?php
class Compra
{
	//ligacao à bd
	private $conn;
	private $table_name="fatura";
	//propriedades do objeto
	public $nome;
	public $email;
	public $telefone;
	public $datanasc;

	//construtor da classe
	public function __construct($db)
	{
		$this->conn=$db;
	}

	//ler uma categoria
	public function readOne()
	{
		$query="SELECT * FROM ".$this->table_name." WHERE email=? LIMIT 0,1";
		$st=$this->conn->prepare($query);
		$st->bindParam(1,$this->email);
		$st->execute();
		$row=$st->fetch(PDO::FETCH_ASSOC);
		$this->nome=$row['nome'];
		$this->telefone=$row['telefone'];
		$this->datanasc=$row['datanasc'];
	}
	
	//atualizar uma categoria
	public function update()
	{
		$query="UPDATE ".$this->table_name." SET nome=:nome, telefone=:telefone, datanasc=:datanasc WHERE email=:email";
		$st=$this->conn->prepare($query);
		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->telefone=htmlspecialchars(strip_tags($this->telefone));
		$this->datanasc=htmlspecialchars(strip_tags($this->datanasc));
		$st->bindParam(':nome',$this->nome);
		$st->bindParam(':email',$this->email);
		$st->bindParam(':telefone',$this->telefone);
		$st->bindParam(':datanasc',$this->datanasc);
		if ($st->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// funcao para remover categoria
	public function delete()
	{
		$query="DELETE FROM ".$this->table_name." WHERE email=:email";
		$st=$this->conn->prepare($query);
		$st->bindParam(':email',$this->email);
		if ($st->execute())
		{
			return true;
		}
		else
		{
			return false;
		}

	}
// inserir categoria
	public function insert()
	{
		$query="INSERT INTO ".$this->table_name." SET nome=?,email=?, telefone=?, datanasc=?";
		$st=$this->conn->prepare($query);
		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->telefone=htmlspecialchars(strip_tags($this->telefone));
		$this->datanasc=htmlspecialchars(strip_tags($this->datanasc));
		$st->bindParam(1,$this->nome);
		$st->bindParam(2,$this->email);
		$st->bindParam(3,$this->telefone);
		$st->bindParam(4,$this->datanasc);
		if ($st->execute())
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	
	//ler todas as categorias
	public function read()
	{
		$qry="SELECT nome,email,telefone,datanasc FROM ".$this->table_name."";
		$st=$this->conn->prepare($qry);
		$st->execute();
		return $st;
	}
	public function count()
    {
        $query="SELECT count(*) FROM ".$this->table_name;
        $st=$this->conn->prepare($query);
        $st->execute();
        $row=$st->fetch(PDO::FETCH_ASSOC);
        $total_rows=$row['total'];
        return $total_rows;
    }

}

?>