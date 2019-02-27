// JavaScript Document
		$(function() {
			load(1);
		});
		function load(pagina){
			var query=$("#pesquisar").val();
			var por_pagina=10;
			var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/manutencao/exibimanutencao.php',
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
$('#manutencao_ativo').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#').val(code)
		  var codigo = button.data('code') 
		  $('#txtcodigo').val(codigo)
		  var nome = button.data('nome') 
		  $('#txtnome').val(nome)
	      var idpatrimonio = button.data('patrimonio') 
		  $('#txtpatrimonio').val(idpatrimonio)
		  var placa = button.data('placa') 
		  $('#txtplaca').val(placa)
		  var usuario = button.data('usuario') 
		  $('#txtresponsavel').val(usuario)
		  var departamento = button.data('departamento') 
		  $('#txtdepartamento').val(departamento)
		})

		$( "#manu_ativo" ).submit(function( event ) {
		  $(".btndespachar").hide();
			  var formcada = document.getElementById('manu_ativo');
		  	  var formData = new FormData(formcada);
			$.ajax({
					type: "POST",
					url: "ajax/manutencao/realiza_manutencao.php",
					data: formData,
					cache: false,
					processData: false,  
					contentType: false,
					 beforeSend: function(objeto){
						//$("#resultados").html("Enviando...");
						$("#btnloading4").html('<button class="btn btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Atualizando...</button>');
						//$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
					load(1);
					$("#btnloading4").hide();
					$(".btndespachar").show();
					$('#manutencao_ativo').modal('hide');
				  }
			});
		  event.preventDefault();
		});


	