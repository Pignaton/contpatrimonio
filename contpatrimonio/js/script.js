
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
		  $("#btnAtualizar").hide();
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
						//$("#resultados").html("Enviando...");
						$("#btnloading2").html('<button class="btn btn-primary btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Atualizando...</button>');
						$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
						//$('#editar_ativo').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
					load(1);
					$("#btnloading2").html("");
					$("#btnAtualizar").show();
					$('#editar_ativo').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#add_ativo" ).submit(function( event ) {
		  $(".btncadastrar").hide();
		  //var parametros = $("#add_ativo").serialize();
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
						$("#btnloading3").html('<button class="btn btn-success btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Enviando...</button>');
						$("#resultados").html("Enviando...");
						$('#adicionar_ativo').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
					load(1);
					$("#btnloading3").hide();
					$(".btncadastrar").show();
					$('#adicionar_ativo').modal('hide');
					$(':input','#add_ativo')
			          .not(':button, :submit, :reset, :hidden')
			          .val('')
			          .removeAttr('checked')
			          .removeAttr('selected');
					  document.getElementById("txtimgfiscal").value = "";
				  }

			});
			 event.preventDefault();
		});

		$( "#deleta_ativo" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/baixa/baixa.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html('<div style="float:left;"><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
						$('#deletar_ativo').modal('hide');
					  },
					success: function(dados){
					$("#resultados").html(dados);
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 4000);	
					load(1);
					$('#deletar_ativo').modal('hide');
					$(':input','#deleta_ativo')
			          .not(':button, :submit, :reset, :hidden')
			          .val('')
				  }
			});
		  	event.preventDefault();
		});
			
		$( "#edita_perfil" ).submit(function( event ) {
		  $(".btnatualiza").hide();

		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/perfil.php",
					data: parametros,
					 beforeSend: function(objeto){
						//$("#resultados").html("Enviando...");
						$("#btnloading").html('<button class="btn btn-info btn-fill pull-right " type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Atualizando...</button>');
						//$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Enviando...</div>');
					  },
					success: function(dados){
					$("#perfilexibi").html(dados);
					$("#btnloading").hide();
				    $(".btnatualiza").show();
					window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
					$("#txtsenha").val("");
					$("#txtconfirma").val("");
					load(1);
				  }
			});
		  event.preventDefault();
		});

		 
