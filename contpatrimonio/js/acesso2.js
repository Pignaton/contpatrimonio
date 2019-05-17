		$('#liberar_acesso').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var codigo = button.data('codigo') 
		  $('#txtcodigo').val(codigo)

		  var tabela_manutencao1 = button.data('tabela_manutencao')
		  var registramanutencao1 = button.data('registramanutencao') 
		  if(registramanutencao1  == '1' || tabela_manutencao1 == '1'){
		  $("#checkmanutencao").prop('checked', true); 	
		  }else{
		  	$("#checkmanutencao").prop('checked', false); 
		  }

		  var dashboard1 = button.data('dashboard') 
		  if(dashboard1  == '1'){
		  $("#checkdashboard").prop('checked', true); 	
		  }else{
		  	$("#checkdashboard").prop('checked', false); 
		  }

		  var cadastro_ativo1 = button.data('cadastro_ativo') 
		  if(cadastro_ativo1  == '1'){
		  $("#checkativo").prop('checked', true); 	
		  }else{
		  	$("#checkativo").prop('checked', false); 
		  }

		  var tabela_baixa1 = button.data('tabela_baixa') 
		  if(tabela_baixa1  == '1'){
		  $("#checkbaixa").prop('checked', true); 	
		  }else{
		  	$("#checkbaixa").prop('checked', false); 
		  }
		}) 


		$('#liberacesso').on('form', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var code = button.data('code') 
		  $('#txtcodigo').val(code)
		  var nome = button.data('nome') 
		  $('#txtnome').val(nome)

		  var dashboard = button.data('dashboard') 
		  if(dashboard  == '1'){
		  $("#txtdashboard").prop('checked', true); 	
		  	$('#txtdashboard').val(dashboard)
		  }else{
		  	$("#txtdashboard").prop('checked', false); 
		  }

		  var cadastro_ativo = button.data('cadastro_ativo') 
		  if(cadastro_ativo  == '1'){
		  $("#txtativo").prop('checked', true);
		  	$('#txtativo').val(cadastro_ativo)
		   }else{
		  	$("#txtativo").prop('checked', false); 
		  }

		  var tabela_baixa = button.data('tabela_baixa') 
		  if(tabela_baixa == '1'){
		  	$("#txtbaixa").prop('checked', true);
		  	$('#txtbaixa').val(tabela_baixa)
		  }else{
		  	$("#txtbaixa").prop('checked', false); 
		  }

		  var tabela_manutencao = button.data('tabela_manutencao') 
		  if(tabela_manutencao  == '1'){
		 	 $("#txtmanutencao").prop('checked', true);
		  	 $('#txtmanutencao').val(tabela_manutencao)
		  }else{
		  	$("#txtmanutencao").prop('checked', false); 
		  }

  		  var registramanutencao = button.data('registramanutencao')
		  if(registramanutencao == '1'){
			$("#txtregistramanu").prop('checked', true);
		  	$('#txtregistramanu').val(registramanutencao)
		  }else{
		  	$("#txtregistramanu").prop('checked', false); 
		  }
		  var backup = button.data('backup') 
		  if(backup == '1'){
			$("#txtnotas").prop('checked', true);
		  	$('#txtnotas').val(backup)
		  }else{
		  	$("#txtnotas").prop('checked', false); 
		  }
		  /*var ativo = button.data('ativo') 
		  if(ativo == '1'){
		  	$("#txtativo").prop('checked', true);
		 	$('#txtativo').val(ativo)
		  }else{
		  	$("#txtativo").prop('checked', false); 
		  }*/

		  var acesso = button.data('acesso') 
		  if(acesso == '1'){
			$("#txtacesso").prop('checked', true);
		 	$('#txtacesso').val(acesso)
		  }else{
		  	$("#txtacesso").prop('checked', false);
		  }	
		  var conta = button.data('conta') 
		  if(conta == '1'){
			$("#txtcriaconta").prop('checked', true);
		 	$('#txtcriaconta').val(conta)
		  }else{
		  	$("#txtcriaconta").prop('checked', false);
		  }
		  var documentacao = button.data('documentacao') 
		  if(documentacao == '1'){
			$("#txtdocumentacao").prop('checked', true);
		 	$('#txtdocumentacao').val(documentacao)
		  }else{
		  	$("#txtdocumentacao").prop('checked', false);
		  }
		  var home = button.data('home') 
		  if(home == '1'){
			$("#txthome").prop('checked', true);
		 	$('#txthome').val(home)
		  }else{
		  	$("#txthome").prop('checked', false);
		  }

		})

		$("#libera_acesso").submit(function( event ) {
		  $("#btnatualizar").hide();
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					dataType:"html",
					cache:false,
					url: "ajax/acesso/atualizaacesso.php",
					data: parametros,
					 beforeSend: function(objeto){
						//$("#resultados").html("Enviando...");
						$("#btnloading").html('<button class="btn btn-primary btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Atualizando...</button>');
						$("#resultados").html('<div><img src="ajax/img/processando.gif" height="40px">Atualizando...</div>');
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

