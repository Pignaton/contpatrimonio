<?php require_once("includes/header.php"); ?>
    <style type="text/css">

        .h3 {
            color: white;
        }

        .erro {
            color: red;
        }

        .btninfo {
            background-color: #4CAF50;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>
	<script>
		   $(document).ready(function () {

            //atualizarLista();
		
		    $("#loading_spinner").hide();
            $(".btnProsseguir").click(function () {
				
				if($("#email").val() == ""){
     				alert("Preencha o campo email");
                    return;
                }
			
				$("#loading_spinner").css({"display":"block"});
				$("#loading_spinner").show();
                $.ajax({
                    type: "POST",
                    url: "ajax/recuperarsenha.php",
                    data: {
                        email: $("#email").val()
                    },
                    success: function (data) {
                    if(data=="success")
						  {
							  //alert("foi");
							$("#msg_form").html("<span class='alert alert-success form-control'>Link de recuperação de senha foi enviado para seu email</span>");
							$("#loading_spinner").css({"display":"none"});
						  }
					if(data=="erro")
						  {
							//alert("erro");
							$("#msg_form").html("<span class='alert alert-danger form-control'>Email não encontrado</span>");
							$("#loading_spinner").css({"display":"none"});
							//alert("");
						  }
                    }
                });
				return false;
            });
 });
	</script>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <br>
            <div class="col-md-12">
                <h3 class="h3 text-white" Style="text-align: center">Recuperação De Senha</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
				<div class="row pl-3" style="position: absolute; z-index: 1000;">
					<div  class="col-sm-5"></div>
						<div class="col-sm-2 text-center" id="loading_spinner" >
							<img class="" src="../teste/ajax/img/loading.gif" style="width:260px;">
						</div>
					<div class="col-sm-1"></div>
				</div>
                <div class="jumbotron form">
                    <form method="POST">
						<p id="msg_form"></p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                <h3 class="text-primary">Informe seu E-mail</h3>
                            </label>

                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required />
						</div>
                        <button type="button" name="submit" class="btn btn-primary form-control btnProsseguir" />Prosseguir</button>
                    </form>
					<br>
					<a class="btn-voltar" href="index.php">Voltar ao login</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
require_once("includes/footer.php");
?>
