<?php
//error_reporting(0);
include("../../../_conn/conn.php");

$id_pagina           = $_POST['txtcodigo'];
$dashboard           = isset($_POST['txtdashboard'])		  ?: $dashboard = '0';
$cadastro            = isset($_POST['txtativo'])           ?: $cadastro  = '0';
$tabela_manutencao   = isset($_POST['txtmanutencao'])  ?: $tabela_manutencao = '0';
$registra_manutencao = isset($_POST['txtregistramanu']) ?: $registra_manutencao = "0";
$tabela_baixa        = isset($_POST['txtbaixa'])		  ?: $tabela_baixa = "0";
$backup              = isset($_POST['txtnotas'])			  ?: $backup = "0";
$acesso              = isset($_POST['txtacesso'])             ?: $acesso = '0';
/*$ativo             = isset($_POST['txtativo'])              ?: $ativo = '0';*/
$conta               = isset($_POST['txtcriaconta'])          ?: $conta = '0';
$documentacao        = isset($_POST['txtdocumentacao'])       ?: $documentacao = '0';
$home        		 = isset($_POST['txthome'])               ?: $home = '0';
try {

	$libera_acesso = $patrimonio->prepare("UPDATE pagina_acesso SET dashboard = :dashboard, cadastro_ativo = :cadastro, tabela_manutencao = :tabela_manutencao, tabela_baixa = :tabela_baixa, acesso = :acesso, registra_manutencao = :registra_manutencao, backup = :backup, conta = :conta, documentacao = :documentacao WHERE id_pagina = :id_pagina");
	$libera_acesso->execute(array(
		':dashboard'           => $dashboard,
		':cadastro'            => $cadastro,
		':tabela_manutencao'   => $tabela_manutencao,
		':registra_manutencao' => $registra_manutencao,
		':tabela_baixa'        => $tabela_baixa,
		':backup'              => $backup,
		':acesso'              => $acesso,
		':conta'               => $conta,
		':documentacao'        => $documentacao,
		':id_pagina'           => $id_pagina
	));

	/*$libera_acesso = $patrimonio->prepare("UPDATE usuario SET ativo = :ativo WHERE id_funcionario = :id_pagina");
	$libera_acesso->execute(array(
		':ativo'     => $ativo,
		':id_pagina' => $id_pagina
	));*/

	echo "<div class='alert alert-success text-center'>Acesso atualizado</div>";
	return true;
	exit();

} catch ( PDOExcepiton $e ) {
	echo 'Error: ' . $e->getMessage();
}

?>
