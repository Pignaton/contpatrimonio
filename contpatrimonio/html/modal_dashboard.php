<?php
header('http-equiv="Content-Type" content="text/html; charset=utf8mb4');
?>
<div id="dashboard_ativo" class="modal fade" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="javascript:void(0);" name="dashboard_abrir_ativo" id="dashboard_abrir_ativo">
				<div class="modal-header">						
					<h4 class="modal-title">Informações do Ativo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<input type="hidden" id="txtdspatrimonio" name="txtdspatrimonio">
				<div class="modal-body">				
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
								 <label for="validationTooltip01" class="col-form-label">Nome Produto:</label>
								<input type="text" class="form-control " name="txdsnome" id="txtdsnome" readonly>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								 <label for="codigo" class="col-form-label">Placa Patrimônio:</label>
								<input type="text" class="form-control " id="txtdscodigo" name="txtdscodigo" readonly>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								 <label for="responsavel" class="col-form-label">Responsavel:</label>
								<input type="text" class="form-control " name="txtdsresponsavel" id="txtdsresponsavel" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
								 <label for="txtvsdepartamento" class="col-form-label">Departamento:</label>
								<input type="text" class="form-control " id="txtdsdepartamento" name="txtdsdepartamento" readonly>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								 <label for="descricao_padrao" class="col-form-label">descrição Padrão:</label>
								<input type="text" class="form-control" id="txtdsdescricaopadrao" name="txtdsdescricaopadrao" readonly>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								 <label for="condicao" class="col-form-label">Condição:</label>
								<input type="text" class="form-control " name="txtdscondicao" id="txtdscondicao" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
							    <label for="descricao" class="col-form-label">descrição:</label>
							   <textarea class="form-control " name="txtdsdescricao" id="txtdsdescricao" rows="3" style="resize:none;" readonly>
							   </textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								 <label for="Data" class="col-form-label">Data:</label>
								<input type="date" class="form-control" name="txtdsdata" id="txtdsdata" readonly>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								 <label for="valor" class="col-form-label">Valor:</label>
								<input type="text" class="form-control " name="txtdsvalor" id="txtdsvalor" readonly>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								 <label for="categoria" class="col-form-label">Categoria:</label>
								<input type="text" class="form-control " name="txtdscategoria" id="txtdscategoria" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								 <label for="status" class="col-form-label">Status:</label>
								<input type="text" class="form-control " name="txtdsstatus"  id="txtdsstatus" readonly>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								 <label for="notafiscal" class="col-form-label">Nota fiscal:</label>
								<input type="text" class="form-control " name="txtdsnotafiscal" id="txtdsnotafiscal" readonly> &nbsp;
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</form>
		</div>
	</div>

</div>