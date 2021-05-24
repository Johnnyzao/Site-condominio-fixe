<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// liga�ao � bd
include_once '../config/database.php';

// objeto categoria
include_once '../objects/category.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);

// retirar informa��o do formul�rio
$data = json_decode(file_get_contents("php://input"));

// atribuir valores �s propriedades
$category->name = $data->name;
$category->condominium = $data->condominium;
$category->valor = $data->valor;

// criar categoria
if($category->insert()){
	echo '{';
		echo '"message": "Compra do condom�nio realizada com sucesso."';
	echo '}';
}

// se nao for poss�vel criar
else{
	echo '{';
		echo '"message": "Imposs�vel realizar a compra deste condom�nio."';
	echo '}';
}
?>
