<?php
// cabeçalhos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// incluir bd e objeto categoria
include_once '../config/database.php';
include_once '../objects/category.php';

// ligar bd
$database = new Database();
$db = $database->getConnection();
$category = new Category($db);
// identificar qual a categoria a eliminar
$data = json_decode(file_get_contents("php://input"));

// atribuir o valor do elemento a eliminar
$category->id = $data->id;

// remover categoria
if($category->delete()){
	echo '{';
		echo '"message": "Categoria removida."';
	echo '}';
}

// se nao for possivel
else{
	echo '{';
		echo '"message": "Impossível remover categoria."';
	echo '}';
}
?>
