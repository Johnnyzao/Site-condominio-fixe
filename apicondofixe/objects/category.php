<?php
class Category
{
	//ligacao à bd
	private $conn;
	private $table_name="compra";
	//propriedades do objeto
	public $id;
	public $name;
	public $condominium;
	public $valor;

	//construtor da classe
	public function __construct($db)
	{
		$this->conn=$db;
	}

	//ler uma categoria
	public function readOne()
	{
		$query="SELECT id,name,condominium,valor FROM ".$this->table_name." WHERE id=? LIMIT 0,1";
		$st=$this->conn->prepare($query);
		$st->bindParam(1,$this->id);
		$st->execute();
		$row=$st->fetch(PDO::FETCH_ASSOC);
		$this->name=$row['name'];
		$this->condominium=$row['condominium'];
		$this->valor=$row['valor'];
	}
	//atualizar uma categoria
	public function update()
	{
		$query="UPDATE ".$this->table_name." SET name=:name, condominium=:condominium, valor=:valor WHERE id=:id";
		$st=$this->conn->prepare($query);
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->condominium=htmlspecialchars(strip_tags($this->condominium));
		$this->valor=htmlspecialchars(strip_tags($this->valor));
		$st->bindParam(':name',$this->name);
		$st->bindParam(':condominium',$this->condominium);
		$st->bindParam(':valor',$this->valor);
		$st->bindParam(':id',$this->id);
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
		$query="DELETE FROM ".$this->table_name." WHERE id=:id";
		$st=$this->conn->prepare($query);
		$st->bindParam(':id',$this->id);
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
		$query="INSERT INTO ".$this->table_name." SET name=?, condominium=?, valor=?";
		$st=$this->conn->prepare($query);
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->condominium=htmlspecialchars(strip_tags($this->condominium));
		$this->valor=htmlspecialchars(strip_tags($this->valor));
		$st->bindParam(1,$this->name);
		$st->bindParam(2,$this->condominium);
		$st->bindParam(3,$this->valor);
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
		$qry="SELECT id,name,condominium,valor FROM ".$this->table_name." order by id";
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