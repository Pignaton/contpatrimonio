<?php
if ( empty( $_GET[ 'utilizador' ] ) || empty( $_GET[ 'confirmacao' ] ) )
	die( '<p>Não é possível alterar a password: dados em falta</p>' );

require_once( "../../_conn/conn.php" );

$user = (trim($_GET['utilizador']));
$hash = (trim($_GET['confirmacao']));

$query_recupera = "SELECT utilizador,confirmacao FROM recuperacao WHERE email = '$user' AND confirmacao = '$hash'";
$query_recu_senha = $anexxa->prepare($query_recupera);
$query_recu_senha->execute;
$row = $query_recu_senha->fetchAll(PDO::FETCH_ASSOC);
//$row = mysqli_fetch_array( $data );

if ( $row == NULL ) {
	$home_url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) . '/htaccess/erro404.html';
	header( 'Location: ' . $home_url );

} else {
	$query_hora = "SELECT datahora FROM recuperacao WHERE email = '$user' AND confirmacao = '$hash'";
	$query_compara_data = $anexxa->prepare($query_hora);
	$query_compara_data->execute;
	$row = $query_compara_data->fetchAll(PDO::FETCH_ASSOC);
	//$row = mysqli_fetch_array( $data );

	if ( $row != NULL ) {
		date_default_timezone_set( 'america/sao_paulo');
		$script_tz = date_default_timezone_get();
		$datahora = $row[ 'datahora' ];
		$horaatual = date( 'd/m/Y H:i:s' );

		if ( $horaatual < $datahora ) {
			$query = "SELECT COUNT(*) FROM recuperacao WHERE email = '$user' AND confirmacao = '$hash'";
			$query_compara = $anexxa->prepare($query);
			$query_compara->execute;
			$row = $query_compara->fetchAll(PDO::FETCH_ASSOC);
			//$data = mysqli_query( $dbc, $q );
			//$row = mysqli_fetch_array( $data );
			if ( $row != NULL ) {
				//os dados estão corretos: eliminar o pedido e permitir alterar a password
				//echo 'Sucesso! (Mostrar formulário de alteração de password aqui)';   
				?>
				<html>
				<head>
					<meta charset="utf-8">
					<noscript>
						<meta http-equiv="refresh" content="1; url=http://changegames.ga/htaccess/errojavascript.html">
					</noscript>
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
					<script type="text/javascript" src="jquery/jquery.min.js"></script>
					<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<script>
						$( document ).ready( function () {
							$( "#senhaerro" ).hide();
							$( "#senhaerro2" ).hide();
							$( "#btnIdentificador" ).click( function () {
								var maiuscula = /[a-zA-Z]/;
								var numero = /[0-9]/;
								var caractere = /[!@#;$%*(){}_+^&]/;

								senha1 = document.getElementById( "exampleInputPassword1" );
								senha2 = document.getElementById( "exampleInputPassword2" );
								if ( senha1.value != senha2.value ) {
									//alert("Senhas diferentes!");
									$( "#senhaerro2" ).hide();
									$( "#senhaerro" ).show();
									return false;

								}
								if ( senha1.value.length < 8 || !caractere.exec( senha1.value ) || !maiuscula.exec( senha1.value ) || !numero.exec( senha1.value ) ) {
									$( "#senhaerro" ).hide();
									$( "#senhaerro2" ).show();
									return false;
								} else {
									$( "#senhaerro" ).hide();
									$( "#senhaerro2" ).hide();
									return true;
								}
							} );
						} );
					</script>
					<style>
						.erro {
							color: #FA5858;
						}
					</style>
				</head>

				<body class="bg-dark">
					<br>
					<br>
					<div align="center">
						<div class="col-md-2"></div>
						<div class="col-md-2"></div>
						<div class="col-md-4 text-center">
							<?php
							if ( isset( $_POST[ 'submit' ] ) ) {
								$senha_nova = mysqli_real_escape_string( $dbc, trim( $_POST[ 'senha' ] ) );
								$confirma_senha = mysqli_real_escape_string( $dbc, trim( $_POST[ 'confirma_senha' ] ) );

								$sql = "SELECT email FROM usuario WHERE email = '$user'";
								$data2 = mysqli_query( $dbc, $sql );
								$row = mysqli_fetch_array( $data2 );

								if ( $row != NULL ) {
									//echo "insere os dados aqui";
									$sql2 = "UPDATE usuario SET senha = '$senha_nova' WHERE email = '$user'";
									mysqli_query( $dbc, $sql2 );
									mysqli_query( $dbc, "DELETE FROM recuperacao WHERE email = '$user' AND confirmacao = '$hash'" );
									echo "<p class='mb-1 bg-success text-white rounded'>Senha Alterada com sucesso</p>";
								} else {
									echo "email não encontrado";
								}

							}
							?>

							<div class="jumbotron">
								<form method="POST" onsubmit="validasenha()">
									<div class="form-group">
										<label for="exampleInputEmail1">
                                <h3>Informe a senha</h3>
                            </label>
									

										<input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha"/>
									</div>
									<div>
										<small class="erro" id="senhaerro">Senhas são diferentes</small>
										<small class="erro" id="senhaerro2">Senhas não corresponde com os criterios</small>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">
                                <h3>Confirme a Senha</h3>
                            </label>
									

										<input type="password" class="form-control" id="exampleInputPassword2" name="confirma_senha" placeholder="Confirma Senha"/>
									</div>
									<input type="submit" name="submit" class="btn btn-primary" id="btnIdentificador" value="Prosseguir"/>
								</form>
							</div>
						</div>
					</div>
				</body>
				</html>
				<?php
			} else {
				echo '<p>Não é possível alterar a password: dados incorretos</p>';
				$home_url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) . '/htaccess/erro404.html';
				header( 'Location: ' . $home_url );
			}

		} else {
			// echo "seu tempo acabou ,envie uma solicitação novamente";
			mysqli_query( $dbc, "DELETE FROM recuperacao WHERE email = '$user' AND confirmacao = '$hash'" );
			$home_url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) . '/htaccess/404.html';
			header( 'Location: ' . $home_url );
		}

	}

}
?>