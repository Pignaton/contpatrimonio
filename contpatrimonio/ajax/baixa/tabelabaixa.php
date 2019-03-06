<?php 
header("Content-Type: text/html; charset=utf8mb4");
include('../../../_conn/conn.php');
	$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
if($acao == 'ajax')
{
	$query =$_REQUEST['query'];
	
	$tabela="registro_baixa";
	$campos="*";
	$condicao=" ( registro_baixa.nome_produto LIKE '%".$query."%' OR ";
	$condicao.=" registro_baixa.placa_patrimonio LIKE '".$query."%' OR";
	$condicao.=" registro_baixa.id_baixa LIKE '%".$query."%' OR";
	$condicao.=" registro_baixa.valor_baixa LIKE '%".$query."%')";
	$condicao.=" order by registro_baixa.data_aquisicao DESC";
	include '../paginacao.php';
	
	$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
	$por_pagina = intval($_REQUEST['por_pagina']);
	$adjacente = 10;
	$offset = ($pagina -  1) * $por_pagina;
	
	$count_query  = "SELECT count(*) AS numrows FROM $tabela WHERE $condicao";
	$count_query_user = $patrimonio->prepare($count_query);
	$count_query_user->execute();
	$qnt_linhas = $count_query_user->rowCount();
	
	if($row = $count_query_user->fetch(PDO::FETCH_ASSOC)){$numrows = $row['numrows'];}
	else {/*echo mysqli_error($patrimonio);*/}
	$total_paginas = ceil($numrows/$por_pagina);
	
	$query = "SELECT $campos FROM  $tabela where $condicao LIMIT $offset,$por_pagina";
	$query_user = $patrimonio->prepare($query);
	$query_user->execute();
	$qnt_linhas = $query_user->rowCount();

	if ($numrows>0){
	?>
				<div class="row">
					<div class="col-sm">
						<div class="table-responsive rounded">
							<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Nome do Ativo</th>
										<th>Placa Patrimônio</th>
										<th>Data da Baixa</th>
										<th>R$</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$final =0;
									while ( $tbl = $query_user->fetch( PDO::FETCH_OBJ ) ) {
										
										$id_baixa = $tbl->id_baixa;
										$data = $tbl->data_baixa;
										$nome_produto = $tbl->nome_produto;
										$placa_patrimonio = $tbl->placa_patrimonio;
										$valor = $tbl->valor_baixa;
										$id_patrimonio = $tbl->id_patrimonio;
										$responsavel_id = $tbl->id_funcionario;
										$nome_usuario = $tbl->nome_usuario;
										$responsavel = $tbl->responsavel;
										$motivo_baixa = $tbl->motivo_baixa;
										/*$nf_registro = $tbl->nf_baixa;*/
										$img_nf_fiscal = $tbl->img_nf_baixa;
										$Data_do_banco = $data;
										$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
										$data1 = $Nova_Data_do_Banco->format( 'd/m/Y' );
										//$valor_antigo = $valor;
										//$placa_patrimonio_antigo = $placa_patrimonio;
										$final++;
										
										?>
									<tr class="clicar" data-target="#Modalvisualiza" data-id="<?=$id_baixa?>" data-codigo="<?=$placa_patrimonio?>" data-nome="<?=$nome_produto?>" data-valor="<?=$valor?>" data-date1="<?=$data?>" data-motivo="<?=$motivo_baixa; ?>" data-usuario="<?=$nome_usuario;?>" data-responsavel="<?=$responsavel?>" data-toggle="modal" >
										<td ><?= $id_baixa ?></td>
										<td><?= $nome_produto ?></td>
										<td><?= $placa_patrimonio ?></td>
										<td><?= $data1 ?></td>
										<td ><?= number_format($valor, 2, ',', '.'); ?></td>
										<td><a href="includes/baixar.php?arquivo=<?=$img_nf_fiscal?>"><i data-toggle="tooltip" title="Baixar PDF" class="far fa-file-pdf material-icons"></i></a>&nbsp;</td>
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
								<!--Fim da tabela-->		
							</tbody>
							</table>
						</div>
					</div>
				</div>
		<!--Fim-->
<?php 
	}else{
		echo "<p class='text-center'>Nenhum Resultado Encontrado</p>";
	}
}
?>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>