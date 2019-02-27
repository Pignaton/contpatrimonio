<?php
require_once( '../../_conn/conn.php' );
session_start();
//if(isset($_POST['do_login'])):

$email = $_POST[ 'email' ];
$senha = $_POST[ 'senha' ];

$query_logar = "SELECT * FROM usuario WHERE email = '$email' AND senha = SHA('$senha') AND ativo NOT IN ('0')";
$query_login = $patrimonio->prepare( $query_logar );
$query_login->execute();
$row = $query_login->rowCount();

if ( $row == 1 ) {

	while ( $usuario_existe = $query_login->fetch( PDO::FETCH_ASSOC ) ) {

		$usuario_ativo = $_SESSION[ 'ativo' ] = $usuario_existe[ 'ativo' ];
		$usuario_email = $_SESSION[ 'email' ] = $usuario_existe[ 'email' ];
		$usuario_nome = $_SESSION[ 'nome' ] = $usuario_existe[ 'nome' ];
		$usuario_login = $usuario_existe[ 'login' ];
		$usuario_senha = $_SESSION[ 'senha' ] = $usuario_existe[ 'senha' ];
		$usuario_id = $_SESSION[ 'id_funcionario' ] = $usuario_existe[ 'id_funcionario' ];
		$usuario_trocasenha = $_SESSION[ 'trocasenha' ] = $usuario_existe[ 'trocasenha' ];
		$usuario_nivel = $_SESSION[ 'nivel' ] = $usuario_existe[ 'nivel' ];

	}
	if ( $_SESSION[ 'trocasenha' ] == 1 ) {
		echo "trocasenha";
		//header( 'location:../includes/trocasenha.php' );
	} else {
		echo "success";
		//header( 'location:../index.php' );
	}
	if($usuario_ativo == '0'){
		 echo "permissao";
		  //$msg_erro = '<p class="msg-erro badge badge-danger form-control pt-2">Usuário sem permissao - contate o adiministrador</p>';
	  }
} else {
	echo "erro";
	//$_SESSION['msg'] = '<p class="msg-erro alert alert-danger text-danger form-control pt-2">Usuário ou senha estao incorreto</p>';
		//header( 'location:../index.php' );
}
//endif;
?>