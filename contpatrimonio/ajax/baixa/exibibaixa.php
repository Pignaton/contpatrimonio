<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include("../../../_conn/conn.php");
//Selecionar os cursos a serem apresentado na página
$query_limit = "SELECT * FROM registro_ativo";
$query_limite = $patrimonio->prepare($query_limit);
$query_limite->execute();
$qnt_linhas = $query_limite->rowCount();						
echo '	<div class="table-responsive rounded">
				<table class="table table-lg table-fixed " id="listar-usuario">
					<thead class="thead-dark">
						<tr>
							<th>Nome</th>
							<th>Placa patrimonio</th>
							<th>Data</th>
							<th>R$</th>
						</tr>
					</thead>
					<tbody>';
while($tbl = $query_limite->fetch(PDO::FETCH_ASSOC)){
	
	        $nome_produto = $tbl['nome_produto'];
			$valor = $tbl['valor'];
			$data_aquisicao = $tbl['data_aquisicao'];
			$placa_patriomio = $tbl['placa_patrimonio'];
			$id_patrimonio = $tbl['id_patrimonio'];
		echo '
			<tr class="clicar tabela-hover" data-target="#Modalvisualiza'.$id_patrimonio.'" data-toggle="modal" >
				<td>'.$nome_produto.'</td>
				<td>'.$placa_patriomio.'</td>
				<td>'.$data_aquisicao.'</td>
				<td>R$ '.number_format($valor, 2, ',', '.').'</td>
			</tr>';
}
echo '</tbody>
	</table>';
?>
