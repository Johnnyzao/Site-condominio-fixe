$(document).ready(function(){
	$(document).on('click','.read-categories-button', function(){
	showCompra();
	});
showCompra();
});

function showCompra()
{
	read_cat="";
	read_cat+="<div id='create-category' ";
	read_cat+="class='btn btn-primary pull-right m-b-15px create-cat-bt'>";
	read_cat+="<span class='glyphicon glyphicon-plus'></span>Criar Compra</div>";

	$.getJSON("http://localhost:8080/apicondofixe/condominio/read.php",
	 function(data){
		read_cat+="<table class='table table-bordered table-hover'>";
		//cabeçalho
		read_cat+="<tr>";
		read_cat+="<th class='w-25-pct'>Número da Compra</th>";
		read_cat+="<th class='w-25-pct'>Nome da Compra</th>";
		read_cat+="<th class='w-25-pct'>Local da Compra</th>";
		read_cat+="<th class='w-25-pct'>Valor da Compra</th>";
		read_cat+="</tr>";
		//listar todas as categorias
		$.each(data.records, function(key,val){
			read_cat+="<tr>";
			read_cat+="<td>"+val.id+"</td>";
			read_cat+="<td>"+val.name+"</td>";
			read_cat+="<td>"+val.condominium+"</td>";
			read_cat+="<td>"+val.valor+"€</td>";
			read_cat+="<td>";
			read_cat+="<button class='btn btn-primary m-r-10px update-cat-button' ";
			read_cat+=" data-id='"+ val.id + "'>";
			read_cat+="<span class='glyphicon glyphicon-edit'></span> Editar";
			read_cat+="</button>";
			//botao remover
			read_cat+="<button class='btn btn-danger m-r-10px remove-cat-button' ";
			read_cat+=" data-id='"+ val.id + "'>";
			read_cat+="<span class='glyphicon glyphicon-remove'></span> Remover";
			read_cat+="</button>";
			read_cat+="<button class='btn btn-secundary m-r-10px comprar-cat-button' ";
			read_cat+=" data-id='"+ val.id + "'>";
			read_cat+="<span class='glyphicon glyphicon-euro'></span> Comprar";
			read_cat+="</button>";
			read_cat+="</td>";
			read_cat+="</tr>";
		});
		read_cat+="</table>";
		changePageTitle("Lista de Compras");
		$("#page-content").html(read_cat);
	 });
}