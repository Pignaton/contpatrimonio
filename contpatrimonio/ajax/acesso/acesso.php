<script src="http://malsup.github.com/jquery.form.js"></script> 
<style class="cp-pen-styles">
/*.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
    opacity: 1.1;
}*/
</style>
<?php
header('Content-Type: text/html; charset=utf8');
session_start();
require_once ("../../../_conn/conn.php");
	
	$acao = (isset($_REQUEST['acao']) && $_REQUEST['acao'] != NULL)?$_REQUEST['acao']:'';
if($acao == 'ajax'){
	$query =$_REQUEST['query'];

	$tabela="usuario";
	$campos="*";
	$condicao=" ( usuario.nome LIKE '%".$query."%' OR";
	$condicao.=" usuario.id_funcionario LIKE '%".$query."%' OR";
	$condicao.=" usuario.email LIKE '%".$query."%' OR";
	$condicao.=" usuario.departamento LIKE '%".$query."%')";
	$condicao.=" order by usuario.nome";
	
	
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
						<th class='text-center'>Nome</th>
						<th class='text-center'>email</th>
						<th class='text-center'>Departamento</th>
						<th colspan="2" class="text-right">Conta / Ação &nbsp;</th>
					</tr>
				</thead>
				<tbody>	
						<?php
						$final=0;
						while($row = $query_user->fetch(PDO::FETCH_ASSOC)){	
							$funcionario_id = $row['id_funcionario'];
							$nome = $row['nome'];
							$email=$row['email'];
							$departamento=$row['departamento'];
							$ativo = $row['ativo'];
							$final++;
							
						$query_exibi = "SELECT * FROM pagina_acesso WHERE funcionario = $funcionario_id";
						$query_exibir = $patrimonio->prepare( $query_exibi );
						$query_exibir->execute();
						$rows = $query_exibir->rowCount();

						while($row = $query_exibir->fetch(PDO::FETCH_ASSOC)){	
							$dashboard=$row['dashboard'];
							$id_pagina=$row['id_pagina'];
							$funcionario=$row['funcionario'];
							$cadastro_ativo=$row['cadastro_ativo'];
							$tabela_manutencao=$row['tabela_manutencao'];
							$manutencao_ativo=$row['registra_manutencao'];
							$tabela_baixa=$row['tabela_baixa'];
							$backup=$row['backup'];
							$acesso=$row['acesso'];
							$documentacao=$row['documentacao'];
							$conta=$row['conta'];
							$home=$row['home'];
						}
						if ($ativo == 1){
							$checked = "checked='' ";
							 $status = "Usuário online";
						}
						else{
							$checked = ""; 
							$status = "Usuário offline";
						}
						?>	
						<tr class="">
							<td class='text-center'><?= $funcionario_id?></td>
							<td class='text-center'><?= $nome ?></td>
							<td class='text-center'><?= $email?></td>
							<td class='text-center' ><?= $departamento?></td>
							<td colspan="3" class="text-right">
								<div class="btn-group" role="group">
								<form id="ativaconta" method="post" action="ajax/ativar.php" role="form" name="ativaconta">
									<input type="checkbox" id="checkbox" name="checkbox" class="checkboxativo " data-size="small" <?=$checked?>>
									<input type="hidden" name="txtcode" id="txtcode" value="<?=$funcionario_id?>">
								</form>
								</div>
								<div class="btn-group">
									<button href="#" data-target="#liberar_acesso" data-toggle="modal" data-tooltip="tooltip" title="Editar acesso" class="edit btn btn-sm btn-warning" data-toggle="modal" data-code="<?=$funcionario_id?>" data-nome="<?=$nome?>" data-dashboard="<?=$dashboard?>" data-cadastro_ativo="<?=$cadastro_ativo?>" data-tabela_manutencao="<?=$tabela_manutencao?>" data-tabela_baixa="<?=$tabela_baixa?>" data-ativo="<?=$ativo?>" data-registramanutencao="<?=$manutencao_ativo?>" data-backup="<?=$backup?>" data-acesso="<?=$acesso?>" data-conta="<?=$conta?>" data-documentacao="<?=$documentacao?>" data-home="<?=$home?>">Editar</button>
								</div>
                    		</td>
						</tr>
						<?php } ?>
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
<script type="text/javascript" src="js/conta.js"></script>
<script>
$(document).ready(function(){
    $('.checkboxativo').bootstrapToggle({});
  });
$(document).ready(function(){
  $('[data-tooltip="tooltip"]').tooltip();   
});
</script>  
        