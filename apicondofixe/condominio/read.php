<?php
//read.php
//incluir classes
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
include_once '../config/database.php';
include_once '../objects/category.php';
//ligar à bd
$database=new Database();
$db=$database->getConnection();
//classe categoria
$category=new Category($db);
$st=$category->read();
$num=$st->rowCount();
//verificar se existem registos
if($num>0)
{
    //existem registos
    $categories_arr=array();
    $categories_arr["records"]=array();
    while ($row=$st->fetch(PDO::FETCH_ASSOC))
    {
        //retira os valores de cada linha
        extract($row);
        $category_item=array(
            "id"=>$id,
            "name" =>$name,
            "condominium"=>$condominium,
            "valor" =>$valor);
        array_push($categories_arr["records"],
        $category_item);
    }
    http_response_code(200);
    echo json_encode($categories_arr);
}
else
{
    //não existem registos
    http_response_code(404);
    echo json_encode(
        array("message"=>"Não existem categorias."));
}

?>