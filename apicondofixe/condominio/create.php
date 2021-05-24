<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// ligaçao à bd
include_once '../config/database.php';

// objeto categoria
include_once '../objects/category.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);

// retirar informação do formulário
$data = json_decode(file_get_contents("php://input"));

// atribuir valores às propriedades
$category->name = $data->name;
$category->condominium = $data->condominium;
$category->valor = $data->valor;

// criar categoria
if($category->insert()){
	echo '{';
		echo '"message": "Compra do condomínio realizada com sucesso."';
	echo '}';
}

// se nao for possível criar
else{
	echo '{';
		echo '"message": "Impossível realizar a compra deste condomínio."';
	echo '}';
}
?>
