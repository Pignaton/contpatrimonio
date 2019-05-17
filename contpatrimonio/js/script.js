		$(function() {
			load(1);
		});
		function load(pagina){
			var query=$("#q").val();
			var por_pagina=10;
			var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/cadastro/exibi.php',
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
$(document).ready(function() {

		$('#editar_ativo').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#txtpatrimonio').val(code)
		  var nome = button.data('nome') 
		  $('#txtvsnome').val(nome)
		  var codigo = button.data('codigo') 
		  $('#txtvscodigo').val(codigo)
		  var responsavel = button.data('responsavel') 
		  $('#txtvsresponsavel').val(responsavel)
		  var valor = button.data('valor') 
		  $('#txtvsvalor').val(valor)
		  var condicao = button.data('condicao') 
		  $('#txtvscondicao').val(condicao)
		  var departamento = button.data('departamento') 
		  $('#txtvsdepartamento').val(departamento)	
		  var descricaopa = button.data('descricaopa') 
		  $('#txtvsdescricaopadrao').val(descricaopa)
		  var categoria = button.data('categoria') 
		  $('#txtvscategoria').val(categoria)
		  var status = button.data('status')
		  $("#txtvsstatus").val(status)
		  var descricao = button.data('descricao')
		  $("#txtvsdescricao").val(descricao)
		  var data1 = button.data('date1')
		  $("#txtvsdata").val(data1)
		  var notafiscal = button.data('nf') 
		  $('#txtvsnotafiscal').val(notafiscal)
		  var nfantigo = button.data('nfantigo') 
		  $('#txtnotafiscalantigo').val(nfantigo)	
		  var valoran = button.data('valoran') 
		  $('#txtvalor_antigo').val(valoran)
		  var codigoan = button.data('codigoan') 
		  $('#txtvspatrimonioantigo').val(codigoan)
		  var id = button.data('id') 
		  $('#txtpatrimonio').val(id)
		})
		
		$('#deletar_ativo').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		  var codigo = button.data('codigo') 
		  $('#txtbaplacapatrimonio').val(codigo)
	      var idpatrimonio = button.data('txtpatrimonio') 
		  $('#txtbapatrimonio').val(idpatrimonio)
		  var nome = button.data('nome') 
		  $('#txtbanome').val(nome)
		  var valor = button.data('valor') 
		  $('#txtbavalor').val(valor)
		  var data1 = button.data('date1')
		  $("#txtbadata").val(data1)
		  var notafiscal = button.data('nf') 
		  $('#txtbanotafiscal').val(notafiscal)
		  var imgnotafiscal = button.data('imgnotafiscal') 
		  $('#txtbaimgfiscal').val(imgnotafiscal)
		  var responsavel = button.data('responsavel') 
		  $('#txtbaresponsavel').val(responsavel)
		  var valoran = button.data('valoran') 
		  $('#txtbavalorantigo').val(valoran)
		})

		$('#dashboard_ativo').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#txtdspatrimonio').val(code)
		  var nome = button.data('nome') 
		  $('#txtdsnome').val(nome)
		  var codigo = button.data('codigo') 
		  $('#txtdscodigo').val(codigo)
		  var responsavel = button.data('responsavel') 
		  $('#txtdsresponsavel').val(responsavel)
		  var valor = button.data('valor') 
		  $('#txtdsvalor').val(valor)
		  var condicao = button.data('condicao') 
		  $('#txtdscondicao').val(condicao)
		  var departamento = button.data('departamento') 
		  $('#txtdsdepartamento').val(departamento)	
		  var descricaopa = button.data('descricaopa') 
		  $('#txtdsdescricaopadrao').val(descricaopa)
		  var categoria = button.data('categoria') 
		  $('#txtdscategoria').val(categoria)
		  var status = button.data('status')
		  $("#txtdsstatus").val(status)
		  var descricao = button.data('descricao')
		  $("#txtdsdescricao").val(descricao)
		  var data1 = button.data('data')
		  $("#txtdsdata").val(data1)
		  var notafiscal = button.data('nf') 
		  $('#txtdsnotafiscal').val(notafiscal)
		})

		$( "#edita_ativo" ).submit(function( event ) {
		  var $botao = $("#btnAtualizar");
		  var formcada = document.getElementById('edita_ativo');
		  var formData = new FormData(formcada); 
			$.ajax({
					type: "POST",
					url: "ajax/cadastro/atualizar.php",
					data: formData,
					cache: false,
					processData: false,  
					contentType: false,
					 beforeSend: function(objeto){
					 	$botao.button('loading');
						$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
						//$('#editar_ativo').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					$botao.button('reset');
					load(1);
					$('#editar_ativo').modal('hide');

				  }
			});
		  event.preventDefault();
		});
		
		$( "#add_ativo" ).submit(function( event ) {
		  var $botao = $("#btncadastrar");
		  var formcada = document.getElementById('add_ativo');
		  var formData = new FormData(formcada);
			$.ajax({
					type: "POST",
					url: "ajax/cadastro/cadastrar.php",
					data: formData,
					cache: false,
					processData: false,  
					contentType: false,
					 beforeSend: function(objeto){
					 	$botao.button('loading');
						$("#resultados").html("Enviando...");
						$('#adicionar_ativo').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					load(1);
					$botao.button('reset');
					$('#adicionar_ativo').modal('hide');
					$(':input','#add_ativo')
			          .not(':button, :submit, :reset, :hidden')
			          .val('')
			          /*.removeAttr('checked')*/
			          .removeAttr('selected');
					  document.getElementById("txtimgfiscal").value = "";
				  }

			});
			 event.preventDefault();
		});

		$( "#deleta_ativo" ).submit(function( event ) {
		  	var $botao = $("#btnbaixa");
		  	var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/baixa/baixa.php",
					data: parametros,
					 beforeSend: function(objeto){
					 	$botao.button('loading');
						$('#deletar_ativo').modal('hide');
					  },
					success: function(dados){
				    $botao.button('reset');
					$("#resultados").html(dados);
					load(1);
					$('#deletar_ativo').modal('hide');
					$(':input','#deleta_ativo')
			          .not(':button, :submit, :reset, :hidden')
			          .val('')
				  }
			});
		  	event.preventDefault();
		});
			
		$( "#edita_perfil" ).submit(function(event) {
		  var $botao = $("#btnAtualizar");
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/perfil.php",
					data: parametros,
					 beforeSend: function(objeto){
						//$("#resultados").html("Enviando...");
						$botao.button('loading');
					  },
					success: function(dados){
					$("#perfilexibi").html(dados);
					$botao.button('reset');
					$("#txtsenha").val("");
					$("#txtconfirma").val("");
					load(1);
				  }
			});
		  event.preventDefault();
		});
		window.setTimeout(function() {$(".alerta").fadeTo(500, 0).slideUp(500, function(){$(".alerta").remove();});}, 6000);
	});
	
		 
