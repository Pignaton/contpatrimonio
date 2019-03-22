<?php
require_once( '../../_conn/conn.php' );
session_start();
if(isset($_POST['email']) || (isset($_POST['senha']))):

$email = strip_tags(trim($_POST[ 'email' ]));
$senha = $_POST[ 'senha' ];

$query_logar = $patrimonio->prepare("SELECT * FROM usuario WHERE email = :email AND senha = SHA1(:senha)");
$query_logar->execute(array(
	':email' => $email,
	':senha' => $senha
));
$row = $query_logar->rowCount();

if ( $row == 1 ) 
{

	while ( $usuario_existe = $query_logar->fetch( PDO::FETCH_ASSOC ) ) {

		$usuario_ativo = $_SESSION[ 'ativo' ] = $usuario_existe[ 'ativo' ];
		$usuario_email = $_SESSION[ 'email' ] = $usuario_existe[ 'email' ];
		$usuario_nome = $_SESSION[ 'nome' ] = $usuario_existe[ 'nome' ];
		$usuario_login = $usuario_existe[ 'login' ];
		$usuario_senha = $_SESSION[ 'senha' ] = $usuario_existe[ 'senha' ];
		$usuario_id = $_SESSION[ 'id_funcionario' ] = $usuario_existe[ 'id_funcionario' ];
		$usuario_trocasenha = $_SESSION[ 'trocasenha' ] = $usuario_existe[ 'trocasenha' ];
		$usuario_nivel = $_SESSION[ 'nivel' ] = $usuario_existe[ 'nivel' ];

	}
	if($usuario_ativo == 0)
	{
		 echo "permissao";
		 exit;
		  //$msg_erro = '<p class="msg-erro badge badge-danger form-control pt-2">Usuário sem permissao - contate o adiministrador</p>';
	}
	else
	{
		if ( $_SESSION[ 'trocasenha' ] == 1 ) 
		{
			echo "trocasenha";
			exit;
			//header( 'location:../includes/trocasenha.php' );
		} 
		else 
		{
			echo "success";
			//header( 'location:../index.php' );
		}
	}	
} else 
	{
		echo "erro";
		exit;
		//$_SESSION['msg'] = '<p class="msg-erro alert alert-danger text-danger form-control pt-2">Usuário ou senha estao incorreto</p>';
			//header( 'location:../index.php' );
	}
endif;
?>