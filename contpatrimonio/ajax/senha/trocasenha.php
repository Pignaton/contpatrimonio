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

		$query_trocar = $patrimonio->prepare("UPDATE usuario SET senha = SHA(:senha), trocasenha = 0 WHERE id_funcionario = :funcionario AND ativo NOT IN('0')");
		$query_trocar->execute(array(
			':senha' => $senha,
			':funcionario' => $funcionario
		));

$query_logar = $patrimonio->prepare("SELECT * FROM usuario WHERE email = :email AND senha = SHA(:senha) AND ativo NOT IN ('0')");
$query_logar->execute(array(
	':email' => $email,
	':senha' => $senha
));
$row = $query_logar->rowCount();

if ( $row == 1 ) {
	
	while ($usuario_existe = $query_logar->fetch(PDO::FETCH_ASSOC)) {
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