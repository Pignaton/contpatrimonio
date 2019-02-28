<?php

include('../../_conn/conn.php');
$quant ="";
$sql_exibi = "SELECT COUNT(id_patrimonio) AS quant, SUM(valor) AS soma FROM registro_ativo";
$sql_exibe = $patrimonio->prepare( $sql_exibi );
$sql_exibe->execute();
$rows = $sql_exibe->rowCount();
while ($tbl2 = $sql_exibe->fetch( PDO::FETCH_OBJ )) {
	$quant_ativo = $tbl2->quant;
	$soma_ativo = $tbl2->soma;
}
$sql_baixa = "SELECT COUNT(id_baixa) AS quant, SUM(valor_baixa) AS soma FROM registro_baixa";
$sql_baixa1 = $patrimonio->prepare( $sql_baixa );
$sql_baixa1->execute();
$rows1 = $sql_baixa1->rowCount();
while ($tbl3 = $sql_baixa1->fetch( PDO::FETCH_OBJ )) {
	$quant_baixa = $tbl3->quant;
	$soma_baixa = $tbl3->soma;
}

$sql_manutencao = "SELECT COUNT(id_manutencao) AS quant, SUM(valor_manutencao) AS soma FROM registro_manutencao";
$sql_manutencao1 = $patrimonio->prepare( $sql_manutencao );
$sql_manutencao1->execute();
$rows2 = $sql_manutencao1->rowCount();
while ($tbl1 = $sql_manutencao1->fetch( PDO::FETCH_OBJ )) {
	$quant_manutencao = $tbl1->quant;
	$soma_manutencao = $tbl1->soma;
	
}
$quant .= "'$quant_ativo','$quant_baixa','$quant_manutencao'";
$valortotal .= "'$soma_ativo','$soma_baixa','$soma_manutencao'";
?>