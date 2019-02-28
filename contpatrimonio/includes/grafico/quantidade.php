<?php
include("../../../_conn/conn.php");
$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS operacional FROM quantidade_por_ativo WHERE departamento IN(8)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$operacional = $tbl['operacional'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS suporte FROM quantidade_por_ativo WHERE departamento IN(3)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$suporte = $tbl['suporte'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS app FROM quantidade_por_ativo WHERE departamento IN(6)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$app = $tbl['app'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS web FROM quantidade_por_ativo WHERE departamento IN(5)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$web = $tbl['web'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS infraestrutura FROM quantidade_por_ativo WHERE departamento IN(13)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$infraestrutura = $tbl['infraestrutura'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS rh FROM quantidade_por_ativo WHERE departamento IN(4)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$rh = $tbl['rh'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS copa FROM quantidade_por_ativo WHERE departamento IN(1)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$copa = $tbl['copa'];
}

$quant_setor = $patrimonio->prepare("SELECT COUNT(departamento) AS limpeza FROM quantidade_por_ativo WHERE departamento IN(2)");
$quant_setor->execute();

while($tbl = $quant_setor->fetch(PDO::FETCH_ASSOC)){
	$limpeza = $tbl['limpeza'];
}
$quant2 .= "'$app','$web','$operacional','$suporte','$infraestrutura','$rh','$limpeza','$copa'";
/*echo $operacional;
echo $suporte;
echo $app;
echo $web;
echo $infraestrutura;
echo $rh;
echo $limpeza;
echo $copa;*/
?>