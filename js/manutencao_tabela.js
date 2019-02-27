$(function() {
	load(1);
});
	function load(pagina){
		var query=$("#q").val();
		var por_pagina=10;
		var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
		$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/manutencao/manutencao.php',
				data: parametros,
				 beforeSend: function(objeto){
					$("#loader").html("Carregando...");
			},
			success:function(data){
				$("#manutencao").html(data).fadeIn('slow');
				$("#loader").html("");
		}
	})
}
$('#manutencao_retorna').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var patrimonio = button.data('patrimonio') 
		  $('#txtpatrimonio').val(patrimonio)
		  var manutencao = button.data('manutencao')
		  $('#txtmanutencao').val(manutencao) 
})

$("#manu_retorna").submit(function(event){
	$(".btndespachar").hide();
	var parametros = $(this).serialize();
		$.ajax({
			type:"POST",
			url:'ajax/manutencao/manutencao_retorna.php',
			data:parametros,
			beforeSend: function(objeto){
				$("#btnloading4").html('<button class="btn btn-success btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" aria-hidden="true"></span>Atualizando...</button>');
			},
			success: function(dados){
				$("#resultados").html(dados);
				window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
				load(1);
				$("#btnloading4").html("");
				$(".btndespachar").show();
				$("#manutencao_retorna").modal('hide');
			}
		});
		event.preventDefault();
});