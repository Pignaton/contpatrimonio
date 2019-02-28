<?php
header('Content-Type: text/html; charset=utf8mb4');
include("../../_conn/conn.php");
session_start();
$_SESSION[ 'id_funcionario' ];

date_default_timezone_set( 'America/Sao_Paulo' );

$nome = $_POST[ 'txtnome' ];
$email = $_POST[ 'txtemail' ];
$departamento = $_POST[ 'txtdepartamento' ];
$senha = $_POST[ 'txtsenha' ];

set_time_limit( 0 );
include('../includes/post-get.php');
try{
	if($senha == ""){
		$query_inserir = "UPDATE usuario SET nome = $nome, email = $email, departamento = $departamento"; 
		$query_inseri = $patrimonio->prepare( $query_inserir );
		$query_inseri->execute();

		echo "<div class='alert alert-success text-center'>Ativo cadastrado com sucesso!</div>";
		return true;
	}else{
		$query_inserir = "UPDATE usuario SET nome = $nome, email = $email, departamento = $departamento, senha = SHA1($senha)"; 
		$query_inseri = $patrimonio->prepare( $query_inserir );
		$query_inseri->execute();

		echo "<div class='alert alert-success text-center'>Ativo cadastrado com sucesso!</div>";
		return true;
	}
	}catch(PDOException $e) {
		echo "<div class='alert alert-info text-center'>Desculpe, houve um erro. Por favor, volte e tente novamente.</div>";
		return false;
		exit;
}
?>