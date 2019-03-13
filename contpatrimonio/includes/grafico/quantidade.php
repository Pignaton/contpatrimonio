<?php
include("../../../_conn/conn.php");

$total_resul = ""; $quant2 = "";

$query_grafico = $patrimonio->prepare("SELECT Count(departamento) AS operacional,
       (SELECT Count(departamento) AS suporte
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 3 ))  AS suporte,
       (SELECT Count(departamento) AS app
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 6 ))  AS app,
       (SELECT Count(departamento) AS web
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 5 ))  AS web,
       (SELECT Count(departamento) AS infraestrutura
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 13 )) AS infraestrutura,
       (SELECT Count(departamento) AS rh
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 4 ))  AS rh,
       (SELECT Count(departamento) AS copa
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 1 ))  AS copa,
       (SELECT Count(departamento) AS limpeza
        FROM   quantidade_por_ativo
        WHERE  departamento IN( 2 ))  AS departamento
FROM   quantidade_por_ativo
WHERE  departamento IN( 8 )");

$query_grafico->execute();

while($tbl = $query_grafico->fetch(PDO::FETCH_ASSOC)){

	$operacional = $tbl['operacional'];
	$suporte = $tbl['suporte'];
	$app = $tbl['app'];
	$web = $tbl['web'];
	$infraestrutura = $tbl['infraestrutura'];
	$rh = $tbl['rh'];
	$copa = $tbl['copa'];
	$limpeza = $tbl['limpeza'];
}

$quant2 .= "'$app','$web','$operacional','$suporte','$infraestrutura','$rh','$limpeza','$copa'";

$data_incio = mktime(0, 0, 0, date('m')-1 , 1 , date('Y'));
$data_fim = mktime(0, 0, 0, date('m')+1, -date('t'), date('Y'));

//$data_fim = date("t", mktime(0,0,0,date('m')-1,'01',date('Y')));

$data1 = date('Y-m-d',$data_incio);
$data2 = date('Y-m-d',$data_fim);

	$query_porc = $patrimonio->prepare("SELECT SUM(a.valor) AS ativo,
			(SELECT SUM(b.valor_baixa) FROM registro_baixa AS b WHERE b.data_baixa BETWEEN '$data1' AND '$data2') AS baixa, 
	   		(SELECT SUM(m.valor_manutencao) FROM registro_manutencao AS m WHERE m.data_manutencao BETWEEN '$data1' AND '$data2') AS manutencao 
   		FROM registro_ativo AS a WHERE a.data_aquisicao BETWEEN '$data1' AND '$data2'");
	$query_porc->execute();
	
	while($tbl_porc = $query_porc->fetch(PDO::FETCH_ASSOC)){
		$total_ativo = $tbl_porc['ativo'];
		$total_baixa = $tbl_porc['baixa'];
		$total_manu = $tbl_porc['manutencao'];
	}
	$total_resul_ativo = $soma_ativo - $total_ativo;
	//echo $total - $soma_ativo;

	/*Calcula porcentagem de função*/
	function porcentagem_ativo ($parcial, $total)
	{
		return ($parcial * 100) / $total;	
	}
	$valor_ativo = porcentagem_ativo($total_resul_ativo, $soma_ativo);

	$total_resul_baixa = $soma_baixa - $total_baixa;
	//echo $total - $soma_ativo;

	function porcentagem_baixa ($parcial2, $total2)
	{
		return ($parcial2 * 100) / $total2;	
	}
	$valor_baixa = porcentagem_baixa($total_resul_baixa, $soma_baixa);

	$total_resul_manu = $soma_manutencao - $total_manu;
	//echo $total - $soma_ativo;

	function porcentagem_manu ($parcial3, $total3)
	{
		return ($parcial3 * 100) / $total3;	
	}
	$valor_manu = porcentagem_manu($total_resul_manu, $soma_manutencao);

	 if($valor_ativo > 0 ){
	 	$color ="class='text-success' title='aumento'";
	 	$icon  = "<i class='fas fa-long-arrow-alt-up'></i>";
	 }elseif($valor_ativo == 0 ){
	 	$color = "class='text-dark' title='estagnado'";
	 	$icon  = "<i class='fas fa-minus' ></i>";
	 }elseif($valor_ativo < 0 ){
	 	$color = "class='text-danger' title='diminuição'";
		$icon  = "<i class='fas fa-long-arrow-alt-down'></i>";
	 }

	 if($valor_baixa > 0 ){
	 	$color2 ="class='text-success' title='aumento'";
	 	$icon2 = "<i class='fas fa-long-arrow-alt-up'></i>";
	 }elseif($valor_baixa == 0 ){
	 	$color2 = "class='text-dark' title='estagnado'";
	 	$icon2  = "<i class='fas fa-minus' ></i>";
	 }elseif($valor_baixa < 0 ){
	 	$color2 = "class='text-danger' title='diminuição'";
		$icon2  = "<i class='fas fa-long-arrow-alt-down'></i>";
	 }

	 if($valor_manu > 0 ){
	 	$color3 ="class='text-success' title='aumento'";
	 	$icon3  = "<i class='fas fa-long-arrow-alt-up'></i>";
	 }elseif($valor_manu == 0 ){
	 	$color3 = "class='text-dark' title='estagnado'";
	 	$icon3 = "<i class='fas fa-minus'></i>";
	 }elseif($valor_manu < 0 ){
	 	$color3 = "class='text-danger' title='diminuição'";
		$icon3  = "<i class='fas fa-long-arrow-alt-down'></i>";
	 }


?>