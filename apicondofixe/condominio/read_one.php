<?php
// cabeçalhos
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// bd e objeto
include_once '../config/database.php';
include_once '../objects/category.php';

$database = new Database();
$db = $database->getConnection();
$category = new Category($db);

// identificar registo a encontrar
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

// ver os detalhes do elemento a editar
$category->readOne();

// array
$category_arr = array(
	"id" =>  $category->id,
	"name" => $category->name,
	"condominium" => $category->condominium,
	"valor" => $category->valor
);

// formatar json
print_r(json_encode($category_arr));
?>
