<?php

// Ligar à base de dados
include_once '../config/database.php';

// Incluir a classe 'user'
include_once 'user.php';
$database = new Database();

// Ligação à base de dados
$db = $database->getConnection();
$user = new User($db);
$st = $user->read();
$num = $st->rowCount();

// Verificar se existem registos na tabela 'utilizador'
if ($num > 0) // Existem registos
{
  $user_arr = array();
  $user_arr["records"] = array();
  while ($row = $st->fetch(PDO::FETCH_ASSOC))
  {
    extract($row);
    $user_item = array("id"=>$id, "username"=>$username, "password"=>$password);
    array_push($user_arr["records"], $user_item);
  }
  http_response_code(200); // Ok
  echo json_encode($user_arr);
}
else // Não existem registos
{
  http_response_code(404);
  echo json_encode(array("message"=>"Não existem categorias."));
}

?>
