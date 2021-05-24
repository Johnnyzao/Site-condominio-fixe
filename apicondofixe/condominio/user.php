<?php
class User
{
  // Ligação à base de dados
  private $conn;
  private $table_name = "login";

  // Propriedades do objecto
  public $id;
  public $username;
  public $password;


  // Construtor da classe
  public function __construct($db) {
    $this->conn=$db;
  }

  // Ler todas as categorias
  public function read() {
    $qry = "SELECT * FROM ".$this->table_name." ORDER BY id";
    $st=$this->conn->prepare($qry);
    $st->execute();
    return $st;
  }
}
?>
