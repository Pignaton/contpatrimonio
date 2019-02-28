// JavaScript Document
		$(function() {
			load(1);
		});		
		function load(pagina){
			//var query=$("#q").val();
			var por_pagina=5;
			var parametros = {"acao":"ajax","pagina":pagina,'por_pagina':por_pagina};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/exibidashboard.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Carregando...");
			  },
				success:function(data){
					$(".div-table").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
