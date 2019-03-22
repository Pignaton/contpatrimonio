   $(document).ready(function () {

        $("#btn-entrar").click(function () {
			if($("#email").val() == ""){
 				$("#erros").html("<p class='alert alert-danger text-center'>Preencha o campo o email</p>");
 				return false;
            }

            if ($("#senha").val() == "") {
                $("#erros").html("<p class='alert alert-danger text-center'>Preencha o campo o senha</p>");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "ajax/logar.php",
                data: {
                    email: $("#email").val(),
                    senha: $("#senha").val()
                },
                beforeSend: function(objeto){
                	$(".btn-entrar").hide();
					$("#loading").html('<button class="btn btn-entrar" type="button" disabled>&nbsp;<span class="spinner-border " role="status" aria-hidden="true"></span> &nbsp; Entrando...</button>');
                },
                success: function (data) {
                if(data == "success")
					{
					  //$("#loading").hide();
					  //$("#btn-entrar").show();
					  window.location.href=" dashboard.php";
					}
				else if(data == "trocasenha")
                    {
				       window.location.href="includes/trocasenha.php";
					}
				else if(data == "erro")
					{
					  $("#erros").html('<p class="alert alert-danger text-danger">Usuário ou senha estão incorreto</p>');
					  $("#btn-entrar").show();
					  $("#loading").hide();
					}
				else if(data == "permissao")
                    {
					  $("#erros").html('<p class="alert alert-danger text-center">Usuário sem permissão - contate o administrador</p>');
					  $("#btn-entrar").show();
					}
                }
            });
			return false;
        });
        window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
 });