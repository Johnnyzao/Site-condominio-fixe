$(document).ready(function(){
	//verificar se foi clicado o botao de criar
	$(document).on('click','.comprar-cat-button', function(){

		create_html="";
		create_html+="<div id='read-categories' ";
		create_html+="class='btn btn-primary pull-right m-b-15px ";
		create_html+="read-categories-button'>";
		create_html+="<span class='glyphicon glyphicon-check-mark'></span>";
		create_html+="Voltar</div>";

		create_html+="<form id='comprar-category-form'";
		create_html+=" action='#' method='post' border='0'>";
		create_html+="<table class='table table-hover table-responsive ";
		create_html+="table-bordered'>";
		create_html+="<tr>";
		create_html+="<td>Nome</td>";
		create_html+="<td><input type='text' name='nome' ";
		create_html+="class='form-control'";
		create_html+=" required /></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td>Email</td>";
		create_html+="<td><input type='text' name='email' ";
		create_html+="class='form-control'";
		create_html+=" required /></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td>Telefone</td>";
		create_html+="<td><input type='value' name='telefone' ";
		create_html+="class='form-control'";
		create_html+=" required /></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td>Data de Nascimento</td>";
		create_html+="<td><input type='date' name='datanasc' ";
		create_html+="class='form-control'";
		create_html+=" required /></td>";
		create_html+="</tr>";
		create_html+="<tr>";
		create_html+="<td></td>";
        create_html+="<td><button type='submit' class='btn btn-primary'>";
        create_html+="<span class='glyphicon glyphicon-floppy-disk'></span>";
        create_html+=" Finalizar Compra</button></td></tr>";
        create_html+="</table>";
        create_html+="</form>";

        $("#page-content").html(create_html);
        changePageTitle("Dados da Fatura");

        $(document).on('submit','#comprar-category-form',function(){

        var form_data=JSON.stringify($(this).serializeObject());
        $.ajax({
            url:"http://localhost:8080/apicondofixe/condominio/finalizar.php",
            type:"Post",
            contentType: 'application/json',
            data: form_data,
            success: function(result){
                bootbox.alert("Compra realizada com sucesso!");
                showCompra();
            },
            error : function(xhr,resp,text){
                console.log(xhr,resp,text);
            }
        });
        return false;
    });
    });
});