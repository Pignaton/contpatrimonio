<?php
header('Content-Type: text/html; charset=mb4utf8');
include("../../_conn/conn.php");
$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
	if($acao == 'ajax')
	{
		//$query =$_REQUEST['query'];

		$data_inicial = date('Y-m-d');
		$data_final = date('Y-m-d', strtotime('-30 days'));

		$tabela="registro_ativo";
		$campos="*";
		$condicao="registro_ativo.data_aquisicao BETWEEN '$data_final' AND '$data_inicial'";
		/*$condicao.=" registro_ativo.status NOT IN('M')";*/
		$condicao.=" ORDER BY registro_ativo.data_aquisicao DESC";

		include 'paginacao.php';

		$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
		$por_pagina = intval($_REQUEST['por_pagina']);// quantos registros voce deseja mostrar
		$adjacente = 4; // lacuna entre as p�ginas ap�s o n�mero de adjacentes
		$offset = ($pagina -  1) * $por_pagina;
		
		$count_query  = "SELECT count(*) AS numrows FROM $tabela WHERE $condicao ";
		$count_query_user = $patrimonio->prepare($count_query);
		$count_query_user->execute();
		$qnt_linhas = $count_query_user->rowCount();

		if($row = $count_query_user->fetch(PDO::FETCH_ASSOC)){$numrows = $row['numrows'];}
		else { }
		$total_paginas = ceil($numrows/$por_pagina);
		
		$query = "SELECT $campos FROM  $tabela WHERE $condicao LIMIT $offset,$por_pagina";
		$query_user = $patrimonio->prepare($query);
		$query_user->execute();
		$qnt_linhas = $query_user->rowCount();
		
		/*$sql_exibi = "SELECT nome_produto, placa_patrimonio, data_aquisicao, valor, status FROM registro_ativo WHERE data_aquisicao BETWEEN '$data_final' AND '$data_inicial' ORDER BY data_aquisicao";
		$sql_exibe = $patrimonio->prepare( $sql_exibi );
		$sql_exibe->execute();
		$rows = $sql_exibe->rowCount();*/
	/*if ($numrows>0)
		{*/
				
?>
		<!--#E3E3E3-->
		&nbsp;
			<p class="font-titulo"><i class="far fa-list-alt"></i>&nbsp; Cadastros nos &Uacute;ltimos 30 dias<p>
				<hr>
				<div class=" table-responsive rounded">
					<?php if($numrows > 0){ ?>
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th >Nome</th>
								<th>Placa </th>
								<th>Data</th>
								<th>Valor</th>
								<th>PDF</th>
							</tr>
						</thead>
					<tbody>
						<?php 
						$final=0;
						while($tbl = $query_user->fetch(PDO::FETCH_OBJ))
						{ 
									
							$id = $tbl->id_patrimonio;
							$data = $tbl->data_aquisicao;
							$nome_produto = $tbl->nome_produto;
							$placa_patrimonio = $tbl->placa_patrimonio;
							$valor = $tbl->valor;
							$descricaopa = $tbl->descricao_padrao;
							$responsavel = $tbl->responsavel;
							$condicao = $tbl->condicao_ativo;
							$departamento = $tbl->departamento;		
							$categoria = $tbl->categoria;
							$descricao = $tbl->descricao;
							$nf_registro = $tbl->nf_registro;
							$imgfiscal = $tbl->img_nf_ativo;
 							$status = $tbl->status;

							$status_novo = $status;

							if($status_novo == 'E')
								$status_novo = 'Em uso';
							if($status_novo == 'B')
								$status_novo = 'Baixa';
							if($status_novo == 'M')
								$status_novo = 'Manuten��o';
							if($status_novo == 'P')
								$status_novo = 'Parado';

							$Data_do_banco = $data;
							$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
							$nova_data = $Nova_Data_do_Banco->format( 'd/m/Y' );

							$final++;
						?>
						<tr data-toggle="modal" data-target="#dashboard_ativo" class="clicar" data-code="<?=$id?>" data-data="<?=$data?>" data-nome="<?=$nome_produto?>" data-responsavel="<?=$responsavel?>" data-valor="<?='R$ '.$valor?>" data-codigo="<?=$placa_patrimonio?>" data-status="<?= utf8_encode($status_novo)?>" data-condicao="<?=$condicao?>" data-departamento="<?=$departamento?>" data-descricaopa="<?=$descricaopa?>" data-descricao="<?=$descricao?>" data-categoria="<?=$categoria?>" data-nf="<?=$nf_registro?>" data-tooltip="tooltip" title="Visualizar Ativo">
							<td><?= $id ?></td>
							<td><?= $nome_produto ?></td>
							<td><?= $placa_patrimonio ?></td>
							<td><?= $nova_data ?></td>
							<!--<td title="<?//=$status_novo?>" align="center"><?//= $status ?></td>-->
							<td><?= 'R$ ' .number_format($valor, 2, ',', '.') ?></td>
							<td><a href="img_nota_fiscal/<?=$imgfiscal?>" data-tooltip="tooltip" title="Visualizar PDF" target="_blanck"><i class="far fa-file-pdf"></i></a></td>
						</tr>
						<?php 
						} 
							//}

						?>
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
		}else
			{ 
				echo '<p class="text-center"> Nenhum registro de ativo no �ltimo m�s </p>'; 
			}
	}
?>
<script>
/*$(document).ready(function(){
  $('[data-tooltip="tooltip"]').tooltip();   
});*/
</script>