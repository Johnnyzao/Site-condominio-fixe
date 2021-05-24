<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// ligaçao à bd
include_once '../config/database.php';

// objeto categoria
include_once '../objects/compra.php';

$database = new Database();
$db = $database->getConnection();

$compra = new Compra($db);

// retirar informação do formulário
$data = json_decode(file_get_contents("php://input"));

// atribuir valores às propriedades
//$compra->compra = $data->compra;
$compra->nome= $data->nome;
$compra->email= $data->email;
$compra->telefone = $data->telefone;
$compra->datanasc = $data->datanasc;

// criar categoria
if($compra->insert()){
	echo '{';
		echo '"message": "Dados enviados com sucesso."';
	echo '}';
}

// se nao for possível criar
else{
	echo '{';
		echo '"message": "Impossível criar novo destino."';
	echo '}';
}
?>
