$(document).ready(function(){
$(document).on('click','.create-cat-bt',function(){


		create_html="";
		create_html+="<div id='read-categories' ";
		create_html+="class='btn btn-primary pull-right m-b-15px ";
		create_html+="read-categories-button'>";
		create_html+="<span class='glyphicon glyphicon-list'></span>";
		create_html+=" Lista</div>";
		create_html+="<form id='create-category-form' action='#' method='post' border='0'>";
		create_html+="<table class='table table-hover table-responsive table-bordered'>";
		create_html+="<tr>";
		create_html+="<td> Nome do Condomínio</td>";
		create_html+="<td><input type='text' id='name-c' name='nome_condominium' class'form-control' ";
		create_html+="required/></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td> Local do Condomínio</td>";
		create_html+="<td><input type='text' id='local-c' name='local_condominium' class'form-control' ";
		create_html+="required/></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td> Valor do Condomínio</td>";
		create_html+="<td><input type='number' id='valor-c' name='valor_condominium' class'form-control' ";
		create_html+="required/></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td></td>";
		create_html+="<td><button type='submit' class='btn btn-primary'>";
		create_html+="<span class='glyphicon glyphicon-plus'></span>";
		create_html+="Guardar</button></td></tr>";
		create_html+="</table>";
		create_html+="</form>";

		$("#page-content").html(create_html);
		changePageTitle("Criar Compra");	



		$(document).on('submit','#create-category-form',function() {

		var form_data = {
        "name": document.getElementById("name-c").value,
        "condominium": document.getElementById("local-c").value,
        "valor": document.getElementById("valor-c").value
      };
		$.ajax({
			url:"http://localhost:8080/apicondofixe/condominio/create.php",
			type:"Post",
			contentType: 'application/json',
			data: JSON.stringify(form_data),
			success: function(result){
				alert("Criado com sucesso!");
				showCompra();
			},
			error : function(xhr,resp,text){
				console.log(xhr, resp, text);
          		console.warn(xhr.responseText);
			}
		});
		return false;
	});
			});
});