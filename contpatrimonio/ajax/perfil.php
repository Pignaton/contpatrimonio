<?php
header('Content-Type: text/html; charset=utf8mb4');
include("../../_conn/conn.php");
session_start();
$id_funcionario = $_SESSION[ 'id_funcionario' ];

date_default_timezone_set( 'America/Sao_Paulo' );

$nome = $_POST[ 'txtnome' ];
$email = $_POST[ 'txtemail' ];
$login = $_POST[ 'txtusuario' ];
$senha = $_POST[ 'txtsenha' ];
$confirma = $_POST[ 'txtconfirma' ];

set_time_limit( 0 );
include('../includes/post-get.php');
try{
	if($senha == ""){
		$query_inserir = $patrimonio->prepare("UPDATE usuario SET nome = :nome, email = :email, login = :login WHERE id_funcionario = :id_funcionario"); 
		$query_inserir->execute(array(
			':nome'  => $nome,
			':email' => $email,
			':login'  => $login,
			':id_funcionario' => $id_funcionario
		));

		echo "<div class='alert alert-success text-center'>Ativo cadastrado com sucesso!</div>";
		return true;
	}else{

		  $caracter = '/^(?=(?:.*?[!@#$%*()_+^&}{:;?.]){1})/';

		  if($senha != $confirma)
		  {
		  	echo "<div class='alert alert-danger text-center'>Senhas coincidem!</div>";	
		  	return false;
		  }
		  if(strlen($senha) < 8 )
		  {
			echo "<div class='alert alert-danger text-center'>Senha deve conter no mínimo 8 caracteres!</div>";
			return false;
		  }
		  if(!$caracter.exec($senha))	
		  {
			echo "<div class='alert alert-danger text-center '>A senha deve conter no mínimo 1 caractere especial!</div>";
			return false;
		  }

		$query_inserir = $patrimonio->prepare("UPDATE usuario SET nome = :nome, email = :email, login = :login, senha = SHA1(:senha) WHERE id_funcionario = :id_funcionario"); 
		$query_inserir->execute(array(
			':nome'  => $nome,
			':email' => $email,
			':login' => $login,
			':senha' => $senha,
			':id_funcionario' => $id_funcionario
		));

		echo "<div class='alert alert-success text-center'>Ativo cadastrado com sucesso!</div>";
		return true;
	}
	}catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		//echo "<div class='alert alert-info text-center'>Desculpe, houve um erro. Por favor, volte e tente novamente.</div>";
		return false;
		exit;
}
?>