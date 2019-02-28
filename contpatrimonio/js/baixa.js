// JavaScript Document
		$(function() {
			load(1);
		});
		function load(pagina){
			var query=$("#q").val();
			//var query2=$("#p").val();
			var por_pagina=10;
			var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/baixa/tabelabaixa.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Carregando...");
			  },
				success:function(data){
					$("#busca").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
$('#Modalvisualiza').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#').val(code)
		  var codigo = button.data('codigo') 
		  $('#txtvscodigo').val(codigo)
	      var idpatrimonio = button.data('txtpatrimonio') 
		  $('#txtvspatrimonio').val(idpatrimonio)
		  var nome = button.data('nome') 
		  $('#txtvsnome').val(nome)
		  var valor = button.data('valor') 
		  $('#txtvsvalor').val(valor)
		  var data1 = button.data('date1')
		  $("#txtvsdata").val(data1)
		  var motivo = button.data('motivo') 
		  $('#txtvsmotivo').val(motivo)
		  var usuario = button.data('usuario') 
		  $('#txtvsusuario').val(usuario)
		  var responsavel = button.data('responsavel') 
		  $('#txtvsresponsavel').val(responsavel)
		  var id = button.data('id') 
		  $('#txtvspatrimonio').val(id)
		})