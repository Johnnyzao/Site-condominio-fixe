<?php
// incluir bd e objeto categoria
include_once '../config/database.php';
include_once '../objects/category.php';

// ligacao bd
$database = new Database();
$db = $database->getConnection();
$category = new Category($db);

$data = json_decode(file_get_contents("php://input"));

// remover
if($category->deleteSelected($data->ids)){
	
	echo "Removido com sucesso.";
}

// if unable to delete the category
else{
	echo "Impossível remover categorias.";
}
?>
