<?php
require_once( '../../../_conn/conn.php' );

$email = $_POST['email'];
$senha = $_POST[ 'senha' ];
try{
	$query_trocar = $patrimonio->prepare("UPDATE usuario SET senha = SHA(:senha) WHERE email = :email AND ativo NOT IN('0') AND trocasenha NOT IN('1')");
	$query_trocar->execute(array(
		':senha' => $senha,
		':email' => $email
	));
	echo 'Senha alterada com sucesso';
} 
catch(PDOException $e) 
{
    //echo 'ERROR: ' . $e->getMessage();
	//header('Location: error.php');
	echo 'Usuário sem permissão para trocar senha ou sem acesso.';
}

?>