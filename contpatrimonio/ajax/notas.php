<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once ("../../_conn/conn.php");
	
	$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
if($acao == 'ajax'){

	$query =$_REQUEST['query'];
	$calendario =$_REQUEST['calendario'];

	$tabela="img_fora";
	$campos="*";
	/*Pesquisa pela data ou id e nome*/
	if($calendario != ""){
		$query = $calendario;

		$condicao=" ( img_fora.id_img LIKE '%".$query."%' OR ";
		$condicao.=" img_fora.data LIKE '%".$calendario."%' OR ";
		$condicao.=" img_fora.responsavel LIKE '%".$query."%') ";
		$condicao.=" ORDER BY img_fora.data";
	}else{

		$condicao=" ( img_fora.id_img LIKE '%".$query."%' OR ";
		$condicao.=" img_fora.responsavel LIKE '%".$query."%') ";
		$condicao.=" ORDER BY img_fora.data";
	}

	include 'paginacao.php'; //include pagination arquivo
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
	$query = "SELECT $campos FROM $tabela where $condicao LIMIT $offset,$por_pagina";
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
						<th class='text-center'>#</th>
						<th></th>
						<th>Data</th>
						<th>Hora</th>
						<th class='text-center'>Responsavel</th>
						<th class='text-right'>Ação</th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$final=0;
						while($row = $query_user->fetch(PDO::FETCH_ASSOC)){	
							$id_img=$row['id_img'];
							$data=$row['data'];
							$hora=$row['hora'];
							$responsavel=$row['responsavel'];
							$img_nf_fiscal = $row['img'];
							$Data_do_banco = $data;
							$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
							$data1 = $Nova_Data_do_Banco->format( 'd/m/Y' );
							$final++;
						?>	
						<tr class="">
							<td class='text-center'><?= $id_img?></td>
							<td></td>
							<td ><?= $data1?></td>
							<td ><?= $hora?></td>
							<td class='text-center' ><?= $responsavel?></td>
							<td colspan="2" class="text-right">
								<a href="includes/baixarnotas.php?arquivo=<?=$img_nf_fiscal?>" data-toggle="tooltip" title="Baixar pdf"><i class="fas fa-file-download material-icons"></i></a>&nbsp;
                   
								<a class="lightbox" href="img_nota_fiscal/img_fora/<?=$img_nf_fiscal?>" data-toggle="tooltip" title="Visualizar pdf" target="_blank">
								    <i class="far fa-file-pdf" ></i>
								</a>
							</td>
							<td></td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan='8'> 
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

     