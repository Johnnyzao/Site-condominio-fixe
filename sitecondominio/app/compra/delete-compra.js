$(document).ready(function(){
	$(document).on('click','.remove-cat-button',function(){
//retirar o id da categoria
roteiro_id=$(this).attr('data-id');
bootbox.confirm({
	message:"<h4>Tem a certeza que pretende eliminar este condomínio?</h4>",
	buttons:{
		confirm:{
			label:'<span class="glyphicon glyphicon-ok"></span> Sim',
			className:'btn-danger'
		},
		cancel:{
			label:'<span class="glyphicon glyphicon-remove"></span> Não',
			className:'btn-primary'
		}
	},
	callback:function(result)
	{
		if(result===true){
			$.ajax({
				url:"http://localhost:8080/apicondofixe/condominio/delete.php",
				type:"POST",
				dataType:'json',
				data: JSON.stringify({id: roteiro_id}),
				success: function(result){
					showCompra();
			},
			error: function(xhr,resp,text){
				console.log(xhr,resp,text);
			}
			});
		}
	}
});
});
});