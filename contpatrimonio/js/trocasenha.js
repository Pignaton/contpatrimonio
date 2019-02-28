$( "#trocasenha" ).submit(function( event ) {
	var parametros = $(this).serialize();
	var senha2 = $("#senha2").val();
	var senha1 = $("#senha").val();
	var	caracter = /^(?=(?:.*?[!@#$%*()_+^&}{:;?.]){1})/;
	window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 4000);
	if(senha1 != senha2){
		$("#erros").html("<div class='alert alert-danger text-center'>As senhas não coincidem</div>");
		return false;
	}
	else if(senha1 < 8){
		$("#erros").html("<div class='alert alert-danger text-center'>Minimo de oito(8) digitos</div>");	
		return false;
	}
	else if(!caracter.exec(senha1)){
		$("#erros").html("<div class='alert alert-danger text-center'>A senha deve conter no mínimo 1 caractere especial!</div>");
		return false;
	}
		$.ajax({
			type: "POST",
			url: "../ajax/senha/trocasenha.php",
			data: parametros,
			beforeSend: function(objeto){
			//$("#resultados").html("Enviando...");
			$("#resultados").html('<img src="../ajax/img/loading.gif" style="width:220px;">');
			},
			success: function(dados){
			location.href='http://localhost/kaleb/Patrimonio_ativo/teste/dashboard.php';
			//$("#resultados").html(dados);
			//window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
			//load(1);
		 }
	});
	event.preventDefault();
});
