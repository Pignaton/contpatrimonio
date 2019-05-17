<?php
include ("../../../_conn/conn.php");

try
{
	$nome = $_POST['txtnome'];
	$email = $_POST['txtemail'];
	$departamento = $_POST['txtdepartamento'];
	$senha = $_POST['txtsenha'];
	$nivel = $_POST['txtnivel'];

	$nome_usuario = ucwords(strtolower($nome));
	$login = str_replace(' ', '.', $nome);
	/*Ignorar*/
	/*$str = str_replace(' ', '', $nome);
	$tam = strlen($str);
	$novo_nome = substr_replace($str, ".", $tam - 8) . substr($str, $tam - 8);
	$login = strtolower($novo_nome);*/
	include('../../includes/post-get.php');

	$query_pagina = $patrimonio->prepare("INSERT INTO usuario (nome, login, senha, email, departamento, ativo, trocasenha, nivel) VALUES ( :nome, :login, SHA1(:senha), :email, :departamento, :ativo, :trocasenha, :nivel)");
	$query_pagina->execute(array(
		':nome' => $nome_usuario,
		':login' => $login,
		':senha' => $senha,
		':departamento' => $departamento_novo,
		':email' => $email,
		':ativo' => 1,
		':trocasenha' => 1,
		':nivel' => $nivel
	));
	$id = $patrimonio->lastInsertId();
	//$id = 23;
	$dashboard = isset($_POST['txtdashboard']) ? $dashboard = '1' : $dashboard = '0';
	$acesso = isset($_POST['txtacesso']) ? $acesso = '1' : $acesso = '0';
	$backup = isset($_POST['txtnotas']) ? $backup = '1' : $backup = '0';
	$tabela_baixa = isset($_POST['txtbaixa']) ? $tabela_baixa = '1' : $tabela_baixa = '0';
	$cadastro_ativo = isset($_POST['txtativo']) ? $cadastro_ativo = '1' : $cadastro_ativo = '0';
	$tabela_manutencao = isset($_POST['txtmanutencao']) ? $tabela_manutencao = '1' : $tabela_manutencao = '0';
	$registra_manutencao = isset($_POST['txtregistramanu']) ? $registra_manutencao = '1' : $registra_manutencao = '0';
	$home = isset($_POST['txthome']) ? $home = '1' : $home = '0';
	$documentacao = isset($_POST['txtdocumentacao']) ? $documentacao = '1' : $documentacao = '0';
	$conta = isset($_POST['txtcriarconta']) ? $conta = '1' : $conta = '0';

	$query_pagina = $patrimonio->prepare("INSERT INTO pagina_acesso (funcionario, dashboard, cadastro_ativo, tabela_manutencao, tabela_baixa, acesso, registra_manutencao, backup, conta, documentacao, home) VALUES ( :funcionario, :dashboard, :cadastro_ativo, :tabela_manutencao, :tabela_baixa, :acesso, :registra_manutencao, :backup, :conta, :documentacao, :home)");
	$query_pagina->execute(array(
		':funcionario' => $id,
		':dashboard' => $dashboard,
		':cadastro_ativo' => $cadastro_ativo,
		':tabela_manutencao' => $tabela_manutencao,
		':tabela_baixa' => $tabela_baixa,
		':acesso' => $acesso,
		':registra_manutencao' => $registra_manutencao,
		':backup' => $backup,
		':conta' => $conta,
		':documentacao' => $documentacao,
		':home' => $home
	));
	echo "<div class='alert alert-success text-center'>Usuário adicionado com sucesso.</div>";
}

catch(PDOExcepiton $e)
{
	echo 'Error: ' . $e->getMessage();
	exit();
}

?>