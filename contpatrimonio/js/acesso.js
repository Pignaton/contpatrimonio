// JavaScript Document
$(function() {
		load(1);
});	
		function load(pagina){
			var query=$("#q").val();
			var por_pagina=10;
			var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/acesso/acesso.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Carregando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#liberar_acesso').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#txtcodigo').val(code)
		  var nome = button.data('nome') 
		  $('#txtnome').val(nome)
		  var dashboard = button.data('dashboard') 
		  $('#txtdashboard').val(dashboard)
		  var cadastro_ativo = button.data('cadastro_ativo') 
		  $('#txtcadastro').val(cadastro_ativo)
		  var tabela_manutencao = button.data('tabela_manutencao') 
		  $('#txttabela_manutencao').val(tabela_manutencao)
		  var tabela_baixa = button.data('tabela_baixa') 
		  $('#txttabela_baixa').val(tabela_baixa)
		  var registramanutencao = button.data('registramanutencao') 
		  $('#txtregistramanutencao').val(registramanutencao)
		  var backup = button.data('backup') 
		  $('#txtbackup').val(backup)
		  var ativo = button.data('ativo') 
		  $('#txtativo').val(ativo)
		  var acesso = button.data('acesso') 
		  $('#txtacesso').val(acesso)	
		})

		$("#libera_acesso").submit(function( event ) {
		  $("#btnatualizar").hide();
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/acesso/atualizaacesso.php",
					data: parametros,
					 beforeSend: function(objeto){
						//$("#resultados").html("Enviando...");
						$("#btnloading").html('<button class="btn btn-primary btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Atualizando...</button>');
						$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
						//$('#liberar_acesso').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
					load(1);
					$("#btnloading").html("");
					$("#btnatualizar").show();	
					$('#liberar_acesso').modal('hide');
				  }
			});
		  event.preventDefault();
		});
