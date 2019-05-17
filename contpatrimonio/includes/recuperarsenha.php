<?php    
  require_once( '../../_conn/conn.php'); 
?>
<html lang="pt-br">
  <head>
    <title>Alteração de Senha</title>
    <noscript><meta http-equiv="refresh" content="1; url=htacess/noscript.html"></noscript>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="recuperasenha/css/recuperasenha.css" />
  </head>
  <body id="bodyindex">
    <div class="wrapper">
    <div class="container-superior-user" align="center">
    <br><br><br><br><br>
<?php

 //if( empty($_GET['utilizador']) || empty($_GET['confirmacao']) )
  // die('<div class="width:50%;"><p class="text-center alert alert-info ">Não é possível alterar a senha: dados em falta</p></div>');
  
  $email = base64_decode($_GET['utilizador']);
  $confirmacao = base64_decode($_GET['confirmacao']);

  
 $troca_senha = $patrimonio->prepare("SELECT * FROM recuperacao WHERE email = :email AND confirmacao = :confirmacao");
  $troca_senha->execute(array(
    ':email' => $email,
    ':confirmacao' => $confirmacao
  ));
  $rows = $troca_senha->rowCount();
  while($tbl = $troca_senha->fetch(PDO::FETCH_ASSOC)){
    $datahora = $tbl['datahora'];
  }
     date_default_timezone_set('america/sao_paulo');
     $script_tz = date_default_timezone_get();
     
     $dataatual = date('Y-m-d H:i:s');

 
  //if( $rows == 1){
       // if($dataatual < $datahora){

  ?>
      <div class="container">
        <div class="row">
            <br>
            <div class="text-center logo-anexxa col-md-12 ">
                <img class="img-fluid" src="../img/anexxa_group.png"/>
                <!--<h3 class="h3 text-white" Style="text-align: center">Recuperação De Senha</h3>-->
            </div>
        </div>
        <div class="row">
           <div class="col-md-3"></div>
              <div class=" col-md-6 text-center">
                  <div class="jumbotron form">
                    <form id="alterasenha" method="POST">
                        <p id="msg_form"></p>
                        <h3>Alterar Senha</h3>
                        <div class="form-group">
                          <label  for="senha">Senha</label>
                            <input class="password form-control" type="password" id="senha" name="senha" data-component="password-strength" data-monitor-id="password-strength-monitor" required autofocus/>
                        </div>
                        <div class="form-group">
                          <label class="" for="">Confirme a senha</label>
                            <input class="form-control" type="password" id="confirma" name="confirma" required autofocus />
                        </div>
                        <button type="button" name="submit" class="btn btn-primary form-control btnsenha" id="load" disabled data-loading-text="<i class='fa fa-spinner fa-spin'></i> Enviando">Alterar Senha</button>
                    </form>
                      <div class="container alert alert-info text-left">
                        <div class="row"> 
                          <div class="col-sm-6">
                            <p class="paragrafo"><i class="fas fa-circle"></i> Senha de deve ser de no minimo 8 caracteres.</p>
                            <p class="paragrafo"><i class="fas fa-circle"></i> Conter caracteres especiais, no minimo 1.</p>
                            <p class="paragrafo"><i class="fas fa-circle"></i> Caracteres permitidos:</p>
                             <p class="paragrafo recuo">! @ # ; $ % * () {} _ + ^ & </p>
                          </div>
                          <div class="col-sm-6">
                            <p class="paragrafo"><i class="fas fa-circle"></i> Deve ter no minimo uma letra maiúscula.</p>
                            <p class="paragrafo"><i class="fas fa-circle"></i> Deve ter no minimo um número.</p>
                          </div>
                        </div> 
                      </div>
                  </div>
              </div>
            <div class="col-md-3"></div>
        </div>
      </div>
 <?php

     // os dados estão corretos: eliminar o pedido e permitir alterar a password
   $deleta_senha = $patrimonio->prepare("DELETE FROM recuperacao WHERE email = :email AND confirmacao = :confirmacao");
   $deleta_senha->execute(array(
    ':email' => $email,
    ':confirmacao' => $confirmacao
  ));
 /*} else {
    echo '<div class="width:50%;"><p class="text-center alert alert-info ">Passou o tempo limite de 30 minutos, faça uma nova solicitação</p></div>';
          // os dados estão corretos: eliminar o pedido e permitir alterar a password
         $deleta_senha = $patrimonio->prepare("DELETE FROM recuperacao WHERE email = :email AND confirmacao = :confirmacao");
         $deleta_senha->execute(array(
          ':email' => $email,
          ':confirmacao' => $confirmacao
        ));
 
  }
   } else {
    echo '<div class="width:50%;"><p class="text-center alert alert-info ">Não é possível alterar a senha: dados incorretos</p></div>';
 
  }*/
?>
 <!--</div>Fim do container-->
</div> <!--Fim do wrapper-->
</div> <!--Fim do wrapper-->
<div class="container-rodape">
    <hr>
    <p class="font-footer text-center pt-3">Anexxa Patrimônio 1.0 - Desenvolvimento Web - Anexxa Group</p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type='text/javascript' src='recuperasenha/js/recuperasenha.js'></script>
<script type="text/javascript">
  /*$(document).ready(function() {
    var password1       = $('#password1');
    var password2       = $('#password2');
    var passwordsInfo   = $('#pass-info');

    passwordStrengthCheck(password1,password2,passwordsInfo);

});

function passwordStrengthCheck(password1, password2, passwordsInfo){
    var WeakPass = /(?=.{5,})$/; 
    var MediumPass = /^(?=S*?[a-z])(?=S*?[0-9])S{5,}$/; 
    var StrongPass = /^(?=S*?[A-Z])(?=S*?[a-z])(?=S*?[0-9])S{5,}$/; 
    var VryStrongPass = /^(?=S*?[A-Z])(?=S*?[a-z])(?=S*?[0-9])(?=S*?[^w*])S{5,}$/; 

    $(password1).on('keyup', function(e) {
        if(VryStrongPass.test(password1.val())){
            passwordsInfo.removeClass().addClass('vrystrongpass').html("Muito Forte! (Impressionante, por favor não se esqueça da password!)");
        }   
        else if(StrongPass.test(password1.val())){
            passwordsInfo.removeClass().addClass('strongpass').html("Forte! (Insira caracteres especiais para tornar ainda mais forte");
        }   
        else if(MediumPass.test(password1.val())){
            passwordsInfo.removeClass().addClass('goodpass').html("Bom! (Ponha letras maiúsculas)");
        }
        else if(WeakPass.test(password1.val())){
            passwordsInfo.removeClass().addClass('stillweakpass').html("Algo fraco! (Digitos aumentar a força da password)");
        }
        else{
            passwordsInfo.removeClass().addClass('weakpass').html("Muito fraca! (Deve ter 5 ou mais caracteres)");
        }
    });

    $(password2).on('keyup', function(e) {
        if(password1.val() !== password2.val()){
            passwordsInfo.removeClass().addClass('weakpass').html("As passwords não são iguais!");   
        }else{
            passwordsInfo.removeClass().addClass('goodpass').html("Passwords iguais!");  
        }
    });
}*/

$(document).ready(function() 
  {
    var senha = $("#senha"); 
    var confirma = $("#confirma");
    checasenha(senha,confirma);
  }); 
  function checasenha(senha, confirma)
  {
    var minimo = /(?=.{8,})$/;
    var maiuscula = /([A-Z])/;
    var numero = /[0-9]/;
    var caractere = /[!@#;$%*(){}_+^&]/;
    
    $(confirma).on('keyup', function(e)
    {  
      if(!caractere.exec(senha.val()) || !numero.exec(senha.val()))
      {
        $("#msg_form").removeClass().addClass('iguais').html('<div class="alert alert-danger">Senhas não corresponde com os críterios</div>');
        $('.btnsenha').attr('disabled', 'disabled');
        //return false;
      }
      else if(!maiuscula.exec(senha.val()))
      {
        $("#msg_form").removeClass().addClass('pequeno').html('<div class="alert alert-danger">Esqueceu da letra maiúscula</div>'); 
        $('.btnsenha').attr('disabled', 'disabled');
        //return false;
      }
      else if(senha.val().length < 8)
      {
        $("#msg_form").removeClass().addClass('pequeno').html('<div class="alert alert-danger">Minimo de 8 digitos</div>'); 
        $('.btnsenha').attr('disabled', 'disabled');
        //return false;
      }
     else if(senha.val() !== confirma.val())
      {
        $("#msg_form").removeClass().addClass('naopassou').html('<div class="alert alert-danger">As senha não coincidem</div>');
        $('.btnsenha').attr('disabled', 'disabled');
        //return false;
    }else if(senha.val() === confirma.val() && caractere.exec(senha.val()) && maiuscula.exec(senha.val()) && numero.exec(senha.val()) && senha.val().length >= 8 ){
        $("#msg_form").removeClass().addClass('simpassou').html('<div class="alert alert-success">Senhas iguais!</div>');
        $('.btnsenha').removeAttr('disabled');
      }
    });

    $(document).ready(function() {
    $(".btnsenha").on('click', function () {
        var botao = $(this); 
        var senha = $("#senha").val(); 
        var email = '<?=$email?>';
        $.ajax({
         type: 'POST',
         url: '../ajax/senha/alterarsenha.php',
         data: {senha: senha, email: email},
         cache: false,
         processData: true,  
         beforeSend: function(objeto){
          botao.button('loading');
         },
         success: function(data){
            botao.button('reset');
            $("#msg_form").html('<div class="alert alert-success">'+data+'</div>'); 
         }

      });
        return false;
    });
}); 
}
</script> 
</body>
</html>