<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once ("../../../_conn/conn.php");
	
	$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
if($acao == 'ajax'){
	$query =$_REQUEST['query'];

	$tabela="registro_ativo";
	$campos="*";
	$condicao=" ( registro_ativo.nome_produto LIKE '%".$query."%' OR";
	$condicao.=" registro_ativo.placa_patrimonio LIKE '%".$query."%' OR";
	$condicao.=" registro_ativo.id_patrimonio LIKE '%".$query."%' OR";
	$condicao.=" registro_ativo.valor LIKE '%".$query."%') AND";
	$condicao.=" registro_ativo.status NOT IN('M')";
	$condicao.=" order by registro_ativo.id_patrimonio";
	
	
	include '../paginacao.php'; //include pagination arquivo
	//pagination variaveis
	$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
	$por_pagina = intval($_REQUEST['por_pagina']);// quantos registros voce deseja mostrar
	$adjacente = 4; // lacuna entre as páginas após o número de adjacentes
	$offset = ($pagina -  1) * $por_pagina;
	// Conte o número total de linhas na sua tabela * /
	$count_query  = "SELECT count(*) AS numrows FROM $tabela WHERE $condicao";
	$count_query_user = $patrimonio->prepare($count_query);
	$count_query_user->execute();
	$qnt_linhas = $count_query_user->rowCount();	
	
	//if ($row = mysqli_fetch_array($count_query_user)){$numrows = $row['numrows'];}
	if($row = $count_query_user->fetch(PDO::FETCH_ASSOC)){$numrows = $row['numrows'];}
	else {/*echo mysqli_error($patrimonio);*/}
	$total_paginas = ceil($numrows/$por_pagina);
	// consulta principal para buscar os dados
	$query = "SELECT $campos FROM  $tabela where $condicao LIMIT $offset,$por_pagina";
	$query_user = $patrimonio->prepare($query);
	$query_user->execute();
	$qnt_linhas = $query_user->rowCount();
	// loop pelos dados buscados
	
	if ($numrows>0){
			
		?>	
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th >Código</th>
						<th></th>
						<th colspan="">Placa Patrimônio</th>
						<th colspan="">Produto</th>
						<th>Data e hora</th>
						<th class="">Ação</th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$final=0;
						while($row = $query_user->fetch(PDO::FETCH_ASSOC)){	
							$produto_id=$row['id_patrimonio'];
							$data=$row['data_aquisicao'];
							$prod_nome=$row['nome_produto'];
							$placa_patrimonio=$row['placa_patrimonio'];
							//$prod_qty=$row['prod_qty'];
							$valor=$row['valor'];	
							$resposanvel_id =$row['id_funcionario'];
							$resposanvel = $row['responsavel'];
							$departamento_id = $row['id_departamento'];
							$departamento = $row['departamento'];
							$descricao_padrao_id = $row['id_descricao_padrao'];
							$descricao_padrao = $row['descricao_padrao'];
							$descricao_produto = $row['descricao'];
							$condicao_id = $row['id_condicao_ativo'];
							$condicao_ativo = $row['condicao_ativo'];
							$hora_aquisicao = $row['hora_aquisicao'];
							$categoria_id = $row['id_categoria'];
							$categoria = $row['categoria'];
							$status_id = $row['id_status_ativo'];
							$status = $row['status'];
							$nf_registro = $row['nf_registro'];
							$img_nf_fiscal = $row['img_nf_ativo'];
							$Data_do_banco = $data;
							$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
							$data1 = $Nova_Data_do_Banco->format( 'd/m/Y' );
							$notafiscalantiga = $nf_registro;
							$valor_antigo = $valor;
							$placa_patrimonio_antigo = $placa_patrimonio;
							$final++;

						?>	
						<tr class="<?php //echo $text_class;?>">
							<td><?php echo $produto_id;?></td>
							<td></td>
							<td colspan=""><?php echo $placa_patrimonio;?></td>
							<td colspan=""><?php echo $prod_nome;?></td>
							<td><?= $data1 .' '.$hora_aquisicao ?></td>
							<td><a href="#" data-target="#manutencao_ativo" class="manutencao" data-toggle="modal" data-code='<?= $produto_id;?>' data-placa="<?=$placa_patrimonio?>" data-nome="<?= $prod_nome ?>" data-usuario="<?=$resposanvel?>" data-departamento="<?=$departamento?>"><i class='fas fa-tools' data-toggle="tooltip" title="fazer manutenção" style="color:#FFC107;"></i></a></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicio=$offset+1;
									$final+=$inicio -1;
									echo "Mostrando $inicio a $final de $numrows registros";
									echo paginate( $pagina, $total_paginas, $adjacente);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	
	<?php	
	}	
}
?>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>          