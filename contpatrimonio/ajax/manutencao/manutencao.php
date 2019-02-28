<?php	
header('Content-Type: text/html; charset=utf8mb4');
session_start();
require_once("../../../_conn/conn.php");
	$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
	if($acao == "ajax"){
		$query = $_REQUEST['query'];
		
		$tabela="registro_manutencao";
		$campos="DISTINCT id_patrimonio, nome_produto, placa_patrimonio, departamento, responsavel";
		$condicao="( registro_manutencao.nome_produto LIKE '%".$query."%' OR";
		$condicao.=" registro_manutencao.placa_patrimonio LIKE '%".$query."%' OR";
		$condicao.=" registro_manutencao.id_patrimonio LIKE '%".$query."%')";
		$condicao.=" ORDER BY registro_manutencao.id_patrimonio ASC";
		
		include('../paginacao.php');
		
		$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
		$por_pagina = intval($_REQUEST['por_pagina']);
		$adjacente = 10;
		$offset = ($pagina -  1) * $por_pagina;
		
		$count_manutencao = "SELECT count(*) AS numrows FROM $tabela WHERE $condicao";
		$count_manutencao_pagina = $patrimonio->prepare($count_manutencao);
		$count_manutencao_pagina->execute();
		$qnt_linhas = $count_manutencao_pagina->rowCount();
		
		if($row = $count_manutencao_pagina->fetch(PDO::FETCH_ASSOC)){$numrows = $row['numrows'];}
		else{echo "erro";}
		
		$total_paginas = ceil($numrows/$por_pagina);
		
		$query_exibi = "SELECT DISTINCT $campos FROM $tabela WHERE $condicao LIMIT $offset,$por_pagina";
		$query_exibir = $patrimonio->prepare($query_exibi);
		$query_exibir->execute();
		$rows = $query_exibir->rowCount();
if($numrows >0){
?>

<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr align="center">
				<th>#</th>
				<th>Nome do Patrimônio</th>
				<th>Placa Patrimônio</th>
				<th>Departamento</th>
				<th>Total de Gasto</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
		<?php

		$final = 0;
		foreach ( $query_exibir->fetchAll(PDO::FETCH_ASSOC) as $p) {

			$id_patrimonio = $p['id_patrimonio'];	

			$valor_total = $patrimonio->prepare("SELECT SUM(valor_manutencao) AS total FROM registro_manutencao WHERE id_patrimonio = $id_patrimonio");
			$valor_total->execute();

			while($tbl = $valor_total->fetch(PDO::FETCH_ASSOC))
			{
				$total = $tbl['total'];	
			}

			$sub_patrimonio = $patrimonio->prepare("SELECT * FROM registro_manutencao WHERE id_patrimonio = $id_patrimonio ORDER BY id_manutencao DESC");
			$sub_patrimonio->execute();
			$total_patrimonio = $sub_patrimonio->fetchAll(PDO::FETCH_ASSOC);
			$final++;

		?>
			<tr>
				<td><?= $p['id_patrimonio']?></td>
				<td><?= $p['nome_produto']?></td>
				<td><?= $p['placa_patrimonio']?></td>
				<td><?= $p['departamento']?></td>
				<td><?= 'R$'.number_format($total, 2, '.', ',')?></td>
				<td><button class= " btn btn-primary btn-sm bottao" id="id_btn<?=$p['id_patrimonio'];?>" onclick="alterar('#id_pai<?=$p['id_patrimonio']?>', this.id);">Abrir</button></td>
			</tr>
			<tr>
				<th colspan="10" style="display: none;" id="id_pai<?=$p['id_patrimonio']?>">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Responsavel</th>
								<th>Valor</th>
								<th>Data</th>
								<th>Data Devolução</th>
								<th>Nota Fiscal</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($total_patrimonio as $s){
								$devolucao = $s['data_conclusao'];

								if($devolucao != ""){$devolucao = date('d/m/Y', strtotime($devolucao)); }else{ $devolucao = "Em manutenção";}

								if($s['devolvido'] != '1')
									$disabled="class='some' style='display:none;'";
								else
									$disabled="";
							?>
							<tr>
								<td><?= $s['id_manutencao']?></td>
								<td><?= $s['responsavel'] ?></td>
								<td><?= 'R$'.number_format($s['valor_manutencao'], 2, '.', ',');?></td>
								<td><?= date('d/m/Y', strtotime($s['data_manutencao'])).' - '. $s['hora_manutencao'];?></td>
								<td><?= $devolucao ?></td>
								<td><?= $s['nf_manutencao']?></td>
							    <td><a href="includes/baixamanu.php?arquivo=<?=$s['img_nf_manutencao']?>"><i title="Baixar PDF" class="far fa-file-pdf material-icons pdf" data-toggle="tooltip"></i></a>

								<a href="#" <?=$disabled?> data-target="#manutencao_retorna" data-toggle="modal" data-patrimonio="<?=$id_patrimonio?>" data-manutencao="<?=$s['id_manutencao']?>"><i class="fas fa-undo"  data-toggle="tooltip" data-placement="top" title="Remover da manutenção"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } ?>
				</th>
			</tr>
			<tr>
				<td colspan='6'> 
				<?php 
					$inicio=$offset+1;
					$final+=$inicio -1;
					echo "Mostrando $inicio a $final de $final registros";
					echo paginate( $pagina, $total_paginas, $adjacente);
				?>
				</td>
			</tr>
		</tbody>
	</table>
	<!--Fim-->
</div>
<?php 
	}
}
flush();
ob_flush();

?>
<script type="text/javascript">
function alterar(id, btn){
	if($('#'+btn).html() == 'Fechar'){
			$(id).hide(250);
			$('#'+btn).html('Abrir');
			return;
		}
		$(id).show(250);
		$('#'+btn).html('Fechar');
	}
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

