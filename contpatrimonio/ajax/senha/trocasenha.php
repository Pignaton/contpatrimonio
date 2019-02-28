<?php
require_once( '../../../_conn/conn.php' );
session_start();
/*if(isset($_SESSION['id_user'])){
		   header('location:dashboard.php');
		   exit();
	   }*/
//if ( isset( $_POST[ 'submit' ] ) ):
	//$senha ="Mudar123";
	$email = $_POST['email'];
	$funcionario = $_SESSION['id_funcionario']; 
	$senha = $_POST[ 'senha' ];

//$query_logar = "UPDATE usuario SET email = '$email', senha = SHA('$senha'), trocasenha = 0 WHERE ativo NOT IN('0')";

		$query_trocar = "UPDATE usuario SET senha = SHA('$senha'), trocasenha = 0 WHERE id_funcionario = '$funcionario' AND ativo NOT IN('0') ";
		//$query_logar = "SELECT * FROM user WHERE email = '$email' AND senha = SHA('$senha') AND ativo NOT IN ('0')";
		$query_troca = $patrimonio->prepare( $query_trocar );
		$query_troca->execute();
		//$row = $query_login->rowCount();

$query_logar = "SELECT * FROM usuario WHERE email = '$email' AND senha = SHA('$senha') AND ativo NOT IN ('0')";
$query_login = $patrimonio->prepare( $query_logar );
$query_login->execute();
$row = $query_login->rowCount();

if ( $row == 1 ) {
	
	while ($usuario_existe = $query_login->fetch(PDO::FETCH_ASSOC)) {
		// $usuario_ativo = $_SESSION['ativo'] = $usuario_existe['ativo'];
		$usuario_email = $usuario_existe['email'];
		$usuario_nome = $_SESSION['nome'] = $usuario_existe['nome'];
		$usuario_login = $usuario_existe['login'];
		$usuario_senha = $usuario_existe['senha'];
		$usuario_id = $_SESSION['id_funcionario'] = $usuario_existe['id_funcionario'];
		
	}
	//echo "<meta name='refresh' content='0;url=../dashboard.php' />";
	
	exit();
	//header('Location: http://localhost/kaleb/Patrimonio_ativo/teste/dashboard.php');

}else{echo 'não achou';}
//endif;
?>