<?php 
	include_once("../../_conn/conn.php");

$id_funcionario = $_POST['txtcode'];
$ativa 			= @$_POST['checkbox'];

if($ativa == "on")
	$ativa ="1";
if($ativa == "")
	$ativa ="0";

	try {
		
		$libera_acesso = $patrimonio->prepare("UPDATE usuario SET ativo = :ativa WHERE id_funcionario = :id_funcionario");
		$libera_acesso->execute(array(
			':ativa' => $ativa,
			':id_funcionario' => $id_funcionario
		));

		$libero_acesso = $patrimonio->prepare("SELECT ativo, nome FROM usuario WHERE id_funcionario = :id_funcionario");
		$libero_acesso->execute(array(
			':id_funcionario' => $id_funcionario
		));
		while($tbl = $libero_acesso->fetch(PDO::FETCH_ASSOC)){
		$ativo = $tbl['ativo'];
		$nome = $tbl['nome'];

		if($ativo == '1'){
			echo "<div class='alert alert-success text-center acesso msgconta'>Conta ativada ($nome)</div>";
			return true;
			exit();
		}
		else{
			echo "<div class='alert alert-danger text-center acesso msgconta'>Conta desativada ($nome)</div>";
			return true;
			exit();
		}
	}
		//var_dump($_POST);
		//var_dump($libera_acesso);
		
	} catch ( PDOExcepiton $e ) {
		//echo 'Error: ' . $e->getMessage();
		echo "<div class='alert alert-info text-center'>Desculpa, o sistema caiu. Por favor, volte e tente novamente.</div>";
	}
/*include("../../_conn/conn.php");

$id_pagina = $_POST['txtcodigo'];
$dashboard = $_POST['txtdashboard'];
$cadastro = $_POST['txtcadastro'];
$tabela_manutencao = $_POST['txttabela_manutencao'];
$tabela_baixa =  $_POST['txttabela_baixa'];
$acesso = $_POST['txtacesso'];
$ativo = isset($_POST['txtativo']);


	try {
		
		$libera_acesso = "UPDATE pagina_acesso SET dashboard = $dashboard, cadastro_ativo = $cadastro, tabela_manutencao = $tabela_manutencao, tabela_baixa = $tabela_baixa, acesso = $acesso WHERE id_pagina = $id_pagina";
		$liberar_acesso = $patrimonio->prepare($libera_acesso);
		$liberar_acesso->execute();
		
		$libera_acesso = "UPDATE usuario SET ativo = $ativo WHERE id_funcionario = $id_pagina";
		$liberar_acesso = $patrimonio->prepare($libera_acesso);
		$liberar_acesso->execute();
		
		echo "<div class='alert alert-success text-center'>Acesso atualizado</div>";
		return true;
		exit();
		
	} catch ( PDOExcepiton $e ) {
		echo 'Error: ' . $e->getMessage();
	}
*/
?>