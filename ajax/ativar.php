<?php
include("../../_conn/conn.php");

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

?>