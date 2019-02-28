<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/*include('../_conn/conn.php');
		$query_exibi = "SELECT * FROM pagina_acesso";
		$query_exibir = $patrimonio->prepare( $query_exibi );
		$query_exibir->execute();
		$rows = $query_exibir->rowCount();

						while($row = $query_exibir->fetch(PDO::FETCH_ASSOC)){	
							$dashboard=$row['dashboard'];
							$id_pagina=$row['id_pagina'];
							$funcionario=$row['funcionario'];
							$cadastro_ativo=$row['cadastro_ativo'];
							$tabela_manutencao=$row['tabela_manutencao'];
							$tabela_baixa=$row['tabela_baixa'];
							$manutencao_ativo=$row['registra_manutencao'];
							$acesso=$row['acesso'];
						}*/
?>
<style>
#ver{
	/*background-color:#FF613B;*/
}
</style>
<div id="liberar_acesso" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			   <form action="javascript:void(0);" name="libera_acesso" id="libera_acesso">
					<div class="modal-header">						
						<h4 class="modal-title">Liberar Acesso</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
							<div class="modal-body">
								<input type="hidden" name="txtcodigo" id="txtcodigo" >
								<!--<div class="form-group">
									<label class="col-form-label" for="">Ativar Usuário:</label>
										<input type="checkbox" data-toggle="toggle" name="txtativo" id="txtativo" />
								</div>-->
								<div class="row">
										<div class="form-group">
											<label for="validationTooltip01" class="col-form-label"> Funcionario:</label>
											<input type="text" class="form-control txtnome" name="txtnome" id="txtnome" disabled="">
										</div>
									<div class="form-group pl-1">
										<label for="codigo" class="col-form-label"> Conta: </label>
										<select class="form-control txtativo" name="txtativo" id="txtativo" required >
											<option id="ver" value="0" <?=( $ativo=='0' )? 'selected': ''; ?>>DESATIVADA</option>
											<option value="1" <?=( $ativo=='1' )? 'selected': ''; ?>>ATIVADA</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label for="codigo" class="col-form-label"> Dashboard: </label>
										<select class="form-control txtdashboard" name="txtdashboard" id="txtdashboard" required>
											<option value="0" <?=( $dashboard=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $dashboard=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="cadastro" class="col-form-label"> Cadastro de Ativo: &nbsp;</label>
										<select class="form-control txtcadastro" name="txtcadastro" id="txtcadastro" required>
											<option value="0" <?=( $cadastro_ativo=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $cadastro_ativo=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="backup" class="col-form-label"> Cópia das Notas: </label>
										<select class="form-control txtbackup" name="txtbackup" id="txtbackup" required>
											<option value="0" <?=( $backup=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $backup=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="baixa" class="col-form-label"> Adiministra Baixa: &nbsp;</label>
										<select class="form-control txttabela_baixa" name="txttabela_baixa" id="txttabela_baixa" required>
											<option value="0" <?=( $tabela_baixa=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $tabela_baixa=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="adicionarmanutenção" class="col-form-label"> Adicionar Manutenção: &nbsp;</label>
										<select class="form-control txtregistramanutencao" name="txtregistramanutencao" id="txtregistramanutencao" required>
											<option value="0" <?=( $manutencao_ativo=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $manutencao_ativo=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="manutencao" class="col-form-label"> Administra Manutenção: &nbsp;</label>
										<select class="form-control txttabela_manutencao" name="txttabela_manutencao" id="txttabela_manutencao" required>
											<option value="0" <?=( $tabela_manutencao=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $tabela_manutencao=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
									<div class="form-group pl-1">
										<label for="acesso" class="col-form-label"> Acesso: </label>
										<select class="form-control txtacesso" name="txtacesso" id="txtacesso" required>
											<option value="0" <?=( $acesso=='0' )? 'selected': ''; ?>>NÃO</option>
											<option value="1" <?=( $acesso=='1' )? 'selected': ''; ?>>SIM</option>
										</select>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<div id="btnloading"></div>
								<input type="submit" class="btn btn-primary btnatualizar" name="btnAtualizar" id="btnatualizar" value="Atualizar">
							</div>
						</form>
					</div>
				</div>
			</div>
