<?php
//error_reporting(0);
include("../../../_conn/conn.php");

$id_pagina           = array_key_exists($_POST['txtcodigo']);
$dashboard           = isset($_POST['txtdashboard'])		  ?: $dashboard = '0';
$cadastro            = isset($_POST['txtcadastro'])           ?: $cadastro  = '0';
$tabela_manutencao   = isset($_POST['txttabela_manutencao'])  ?: $tabela_manutencao = '0';
$registra_manutencao = isset($_POST['txtregistramanutencao']) ?: $registra_manutencao = "0";
$tabela_baixa        = isset($_POST['txttabela_baixa'])		  ?: $tabela_baixa = "0";
$backup              = isset($_POST['txtbackup'])			  ?: $backup = "0";
$acesso              = isset($_POST['txtacesso'])             ?: $acesso = '0';
$ativo               = isset($_POST['txtativo'])              ?: $ativo = '0';

try {

	$libera_acesso = $patrimonio->prepare("UPDATE pagina_acesso SET dashboard = :dashboard, cadastro_ativo = :cadastro, tabela_manutencao = :tabela_manutencao, tabela_baixa = :tabela_baixa, acesso = :acesso, registra_manutencao = :registra_manutencao, backup = :backup WHERE id_pagina = :id_pagina");
	$libera_acesso->execute(array(
		':dashboard'           => $dashboard,
		':cadastro'            => $cadastro,
		':tabela_manutencao'   => $tabela_manutencao,
		':registra_manutencao' => $registra_manutencao,
		':tabela_baixa'        => $tabela_baixa,
		':backup'              => $backup,
		':acesso'              => $acesso,
		':id_pagina'           => $id_pagina
	));

	$libera_acesso = $patrimonio->prepare("UPDATE usuario SET ativo = :ativo WHERE id_funcionario = :id_pagina");
	$libera_acesso->execute(array(
		':ativo'     => $ativo,
		':id_pagina' => $id_pagina
	));

	echo "<div class='alert alert-success text-center'>Acesso atualizado</div>";
	return true;
	exit();

} catch ( PDOExcepiton $e ) {
	echo 'Error: ' . $e->getMessage();
}

?>
