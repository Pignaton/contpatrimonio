<?php

include('../../_conn/conn.php');

/*Pega a primeira dia e o dia atual do mês*/
$data_incio = mktime(0, 0, 0, date('m'), 1, date('Y'));
$data_incio1 = date('Y-m-d',$data_incio);
$data_final2 = date('Y-m-d');

$quant ="";
/*Quantidade para gráfico da dashboard.*/
$sql_quant_ativo = $patrimonio->prepare("SELECT COUNT(id_patrimonio) AS quant FROM registro_ativo");
$sql_quant_ativo->execute();
$rows3 = $sql_quant_ativo->rowCount();
while($tbl = $sql_quant_ativo->fetch(PDO::FETCH_OBJ)){
	$quant_ativo = $tbl->quant;
}

$sql_quant_baixa = $patrimonio->prepare("SELECT COUNT(id_baixa) AS quant FROM registro_baixa");
$sql_quant_baixa->execute();
$rows3 = $sql_quant_baixa->rowCount();
while($tbl3 = $sql_quant_baixa->fetch(PDO::FETCH_OBJ)){
	$quant_baixa = $tbl3->quant;
}

$sql_quant_manu = $patrimonio->prepare("SELECT  COUNT(id_manutencao) AS quant FROM registro_manutencao");
$sql_quant_manu->execute();
$rows3 = $sql_quant_manu->rowCount();
while($tbl1 = $sql_quant_manu->fetch(PDO::FETCH_OBJ)){
	$quant_manutencao = $tbl1->quant;
}
/*Valor total de cada patrimonio.*/
$sql_exibi = $patrimonio->prepare("SELECT SUM(valor) AS soma FROM registro_ativo WHERE data_aquisicao BETWEEN '$data_incio1' AND '$data_final2'");
$sql_exibi->execute();
$rows = $sql_exibi->rowCount();
while ($tbl2 = $sql_exibi->fetch( PDO::FETCH_OBJ )) {
	$soma_ativo = $tbl2->soma;
}
$sql_baixa = $patrimonio->prepare("SELECT SUM(valor_baixa) AS soma FROM registro_baixa WHERE data_baixa BETWEEN '$data_incio1' AND '$data_final2'");
$sql_baixa->execute();
$rows1 = $sql_baixa->rowCount();
while ($tbl3 = $sql_baixa->fetch(PDO::FETCH_OBJ)) {
	$soma_baixa = $tbl3->soma;
}

$sql_manutencao = $patrimonio->prepare("SELECT SUM(valor_manutencao) AS soma FROM registro_manutencao WHERE data_manutencao BETWEEN '$data_incio1' AND '$data_final2'");
$sql_manutencao->execute();
$rows2 = $sql_manutencao->rowCount();
while ($tbl1 = $sql_manutencao->fetch(PDO::FETCH_OBJ)) {
	$soma_manutencao = $tbl1->soma;
}
/*Concatena os valores para o gráfico*/
$quant .= "'$quant_ativo','$quant_baixa','$quant_manutencao'";
$valortotal .= "'$soma_ativo','$soma_baixa','$soma_manutencao'";
?>