<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <noscript><meta http-equiv="refresh" content="1; url=htacess/noscript.html"></noscript>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
<style type="text/css">
    html{
            font-size: 16px !important;
        }
    html, body{height: 100%; margin: 0; padding: 0; }
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    #bodyindex {  
      justify-content: center;
      align-items: center;
      background-color: #3bb2b8;
      background: linear-gradient(
        20deg,
        rgba(66, 230, 149, 1),
        rgba(66, 32, 149, 1)
      );
      /*background-repeat:;*/
      height: 100vh;
      weidth:100wh;
      background-size:128% 128%;
      font-family: "Open Sans", sans-serif;
    }
    label {
      font-family: 'Staatliches', cursive;
    }
.font-footer {
    color: #343a40 !important;
    font-weight: 300 !important;
}
hr{
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}
.font{
    font-size:15px;
}
.container-superior-user{font-color:black; font-weight: 500;}
    .container-rodape{height: 60px;}
    .wrapper{ min-height: calc(100vh - 80px)}
    @media (min-width: 320px) and (max-width: 480px) {

        .container-rodape {font-size:12px; display:;}
    }
    .logo-anexxa{border-radius:5px; padding-bottom: 4rem !important;}
</style>
</head>
    <body id="bodyindex">
    <div class="wrapper">
    <div class="container-superior-user" align="center">
    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <br>
            <div class="text-center logo-anexxa col-md-12 ">
                <img class="img-fluid" src="img/anexxa_group.png"/>
                <!--<h3 class="h3 text-white" Style="text-align: center">Recuperação De Senha</h3>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <div class="jumbotron">
                    <form method="POST">
						<p id="msg_form"></p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                <h3 class="text-primary">Informe seu E-mail</h3>
                            </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required />
						</div>
                        <button type="button" name="submit" class="btn btn-primary form-control btnProsseguir" id="load" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Enviando">Prosseguir</button>
                    </form>
					<br>
					<a class="btn-voltar" href="index.php">Voltar ao login</a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
 <!--</div>Fim do container-->
</div> <!--Fim do wrapper-->
</div> <!--Fim do wrapper-->
<div class="container-rodape">
    <hr>
    <p class="font-footer text-center pt-3">Anexxa Patrimônio 1.0 - Desenvolvimento Web - Anexxa Group</p>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script> 
        <script>
           $(document).ready(function () {
           

            $(".btnProsseguir").on('click', function () {
                var reg = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{3,}(\.[A-Za-z0-9])?/);
                var $this = $(this);
                var email = $("#email").val();

                if($("#email").val() == ""){
                    $("#msg_form").html("<div class='alert alert-danger font'>Preencha o campo email</div>");
                    return false;
                }else{
                    $("#msg_form").html("");
                }
                if(!reg.test($("#email").val())){
                     $("#msg_form").html("<div class='alert alert-danger font'>Formato de email inválido</div>");
                    return false;
                }
            
                $.ajax({
                    type: "POST",
                    url: "ajax/senha/recuperarsenha.php",
                    data: {
                        email: email
                    },
                    cache: false,
                    processData: true, 
                    beforeSend: function(objeto){
                       $this.button('loading');
                    },
                    success: function (data) {
                    if(data=="success")
                          {
                           $this.button('reset');
                           $("#msg_form").html("<div class='alert alert-success font'>Link de recuperação de senha foi enviado para seu email</div>"); 
                          }
                    if(data=="erro")
                          {
                            $this.button('reset');
                            $("#msg_form").html("<div class='alert alert-danger font'>Email não encontrado</div>");
                            
                          }
                    }
                });
                window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(".alert").remove();});}, 4000);
                return false;
            });
        });
    </script>
</body>
</html>