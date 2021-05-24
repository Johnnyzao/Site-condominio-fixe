$(document).ready(function(){

//verifica se o botao editar foi clicado
	$(document).on('click','.update-cat-button',function(){

		var id=$(this).attr('data-id');
		
		$.getJSON("http://localhost:8080/apicondofixe/condominio/read_one.php?id=" + id,
	 function(data){
	 	var id=data.id;
	 	var name=data.name;
	 	var condominium=data.condominium;
	 	var valor=data.valor;
	 	var update_html="";
	 	
	 	update_html+="<div id='read-categories' ";
	 	update_html+="class='btn btn-primary pull-right m-b-15px ";
	 	update_html+="read-categories-button'>";
	 	update_html+="<span class='glyphicon glyphicon-list'></span>";
	 	update_html+="Ver Compras";
	 	update_html+="</div>";
	 	update_html+="<form id='update-category-form' method='post' border=0>";
	 	update_html+="<table class='table table-responsive table-hover table-bordered'>";
	 	update_html+="<tr>";
	 	update_html+="<td>Nome do Condomínio</td>";
	 	update_html+="<td><input value=\"" + name +"\" type='text' name='name' ";
	 	update_html+=" class='form-control' required></td>";
	 	update_html+="</tr>";
	 	update_html+="<tr><td>Local do Condomínio</td>";
	 	update_html+="<td><textarea name='condominium' class='form-control' required>";
	 	update_html+=condominium+"</textarea></td>";
	 	update_html+="</tr>";
	 	update_html+="<tr><td>Valor do Condomínio</td>";
	 	update_html+="<td><textarea name='valor' class='form-control' required>";
	 	update_html+=valor+"</textarea></td>";
	 	update_html+="</tr>";
	 	update_html+="<tr><td><input type='hidden' name='id' value=\""+ id +"\"></td>";
	 	update_html+="<td><button type='submit' class='btn btn-info'>";
	 	update_html+="<span class='glyphicon glyphicon-edit'></span> Editar</button></td>";
	 	update_html+="</tr>";
	 	update_html+="</table>";
	 	update_html+="</form>";



	 	//enviar html para a pagina
	 	$("#page-content").html(update_html);
	 	//alterar titulo
	 	changePageTitle("Alterar compra do Condomínio");
	 	
		
	 });
	});
	$(document).on('submit','#update-category-form',function(){
		var form_data=JSON.stringify($(this).serializeObject());
		$.ajax({
			url:"http://localhost:8080/apicondofixe/condominio/update.php",
			type:"Post",
			contentType: 'application/json',
			data:form_data,
			success: function(result)
			{
				showCompra();
			},
			error: function(xhr,resp,text){
				console.log(xhr,resp,text);
			}
		});
		return false;
	});
});