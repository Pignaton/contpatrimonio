$( "#criaracesso" ).submit(function( event ) {
  $("#btnenviar").hide();
  var paremetros = $(this).serialize();
	$.ajax({
			type: "POST",
			url: "ajax/conta/criarconta.php",
			data: paremetros,
			cache: false,	
			 beforeSend: function(objeto){
				$("#resultados").html("Enviando...");
				$("#loading").html('<button class="btn btn-primary btn-fill pull-right" type="button" disabled><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> Cadastrando...</button>');
				//$('#editar_ativo').modal('hide');
			  },
			success: function(dados){
			$("#resultados").html(dados);
			window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
			load(1);
			$("#loading").hide();
			$("#btnenviar").show();
			$('#editar_ativo').modal('hide');
		  }
	});
  event.preventDefault();
});