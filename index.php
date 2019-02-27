<?php include('includes/header-index.php'); ?>
<div class="wrapper">
<div class="container-superior-user" align="center">

<?php
require_once( '../_conn/conn.php' );

/*descriptografa o link da mensagem de logout */
if(!empty($_GET[ 'msg' ])){
$msg = $_GET[ 'msg' ];
$msg_logout = base64_decode( $msg );
}
$msg_erro = $_SESSION['msg'];

//Verifica se o usuario ja esta logado, se a sessão não estiver vazio. 
if ( isset( $_SESSION[ 'id_funcionario' ] ) ) {
	header( 'location:dashboard.php' );
	exit();
}

?>
<style>
.btn-entrar{
	width: 100%;
}
</style>
<script>
    $(document).ready(function () {

		    $(".msg-erro1").hide();

            $("#btn-entrar").click(function () {
				$(".btn-entrar").hide();
				$(".msg-erro").hide();
				if($("#email").val() == ""){
     				$("#erros").html("<span class='alert alert-danger text-center form-control pt-2'>Preencha o campo o email</span>");
                    return;
                }

                if ($("#senha").val() == "") {
                    $("#erros").html("<span class='alert alert-danger text-center form-control pt-2'>Preencha o campo o senha</span>");
                    return;
                }
			
				$("#loading").html('<button class="btn   btn-entrar" type="button" disabled>&nbsp;<span class="spinner-border " role="status" aria-hidden="true"></span> &nbsp; Entrando...</button>');
                $.ajax({
                    type: "POST",
                    url: "ajax/logar.php",
                    data: {
                        email: $("#email").val(),
                        senha: $("#senha").val()
                    },
                    success: function (data) {
                    if(data=="success")
						  {
						  	$("#loading").hide();
						  	$("#btn-entrar").show();
							window.location.href=" Dashboard.php";
						  }
					if(data=="trocasenha"){
					 window.location.href="includes/trocasenha.php";
							}
					if(data=="erro")
						  {
							$(".msg-erro1").show();
							$("#btn-entrar").show();
						    $("#loading").hide();
						  }
					if(data=="permissao"){
						$("#erros").html('<p class="alert alert-danger text-center">Usuário sem permissao - contate o adiministrador</p>');
						}
                    }
                });
				return false;
            });
 });
</script>
<br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="text-center logo-anexxa col-sm-12">
			<img class="img-fluid" src="img/anexxa_group.png"/>
		</div>
		<!--<h2  class="text-justify text-center font">Group <span class="text-dark">Ane</span>xx<span class="text-dark">A</span></h2>-->
	</div>
	<div class="row">
		<div class="col-sm-3 "></div>
		<div class="col-sm-6 text-center pt-5 ">
			<div class="jumbotron pt-5 form">
				<form method="post">
					<p class="msg-erro1 alert alert-danger text-danger form-control pt-2">Usuário ou senha estão incorreto</p>
					<div id="erros"></div>
					<div class="container">
						<?php
						// Se a sessão var estiver vazia, mostre qualquer mensagem de erro e o formulário de login; caso contrário, confirme o login
						if ( empty( $_SESSION[ 'id_funcionario' ] ) ) {

							if ( isset( $msg ) )
								echo "<p class='alert alert-success msg-erro form-control pt-2'>$msg_logout</p>";
							unset( $msg );

							if (isset($_SESSION['msg']))
								echo $_SESSION['msg'];
							unset( $_SESSION['msg']);
							?>

						<div class="form-group">
							<label for="Email">
								<b class="text-primary">Email</b>
							</label>
							<div class="input-group largura-input">
								<i class="fas pt-2 pl-2  icon-login">&#xf007;</i>
								<input type="email" class="form-control icon-login2" id="email" maxlength="50" name="email" aria-describedby="emailHelp" placeholder="E-mail" required="required" value="kaleb.pignaton@anexxa.com.br"/>
							</div>
						</div>
						<div class="form-group">
							<label for="Password">
                                <b class="text-primary">Senha</b>
                            </label>
							<div class="input-group" style="">
								<i class="fas pt-2 pl-2 icon-login">&#xf023;</i><input type="password" name="senha" class="form-control icon-login2" id="senha" placeholder="Senha" value="Chinelo199!" required="required">
							</div>
						</div>
						<div id="loading"></div>
						<button type="button" name="submit" class="btn-entrar btn btn-primary form-control" id="btn-entrar">Entrar <span class="fas" style="font-size:18px;">&nbsp; &#xf35a;</span></button>
						<p></p>
						<div>
							<a href="recupera_senha.php">Esqueceu a senha ?</a>
						</div>
					</div>
				</form>
				<?php
				} else {
					// Confirma o login bem sucedido
					echo( '<p class="login">Você está logado como' . $_SESSION[ 'email' ] . '.</p>' );
				}
				?>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>
<?php include('includes/footer-index.php'); ?>