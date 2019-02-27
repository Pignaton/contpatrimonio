		$(function() {
			load(1);
		});
		function load(pagina){
			var query=$("#q").val();
			var por_pagina=10;
			var parametros = {"acao":"ajax","pagina":pagina,'query':query,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/notas.php',
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