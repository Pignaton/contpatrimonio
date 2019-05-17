   $(document).ready(function () {

        $("#btn-entrar").click(function () {
            var $botao = $(this);
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
                	$botao.button('loading');
                },
                success: function (data) {
                if(data == "success")
					{
					  window.location.href=" dashboard.php";
					}
				else if(data == "trocasenha")
                    {
				       window.location.href="includes/trocasenha.php";
					}
				else if(data == "erro")
					{
                      $botao.button('reset');
					  $("#erros").html('<p class="alert alert-danger text-danger">Usuário ou senha estão incorreto</p>');
					}
				else if(data == "permissao")
                    {
                      $botao.button('reset');
					  $("#erros").html('<p class="alert alert-danger text-center">Usuário sem permissão - contate o administrador</p>');
					}
                }
            });
			return false;
        });
        window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 6000);
 });