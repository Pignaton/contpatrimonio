
<div id="manutencao_retorna" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<form name="manu_retorna" id="manu_retorna" action="javascript:void(0);">
				<div class="modal-header">						
					<h4 class="modal-title"><i class="fas fa-undo"></i> Retorna para Ativos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="txtpatrimonio" name="txtpatrimonio">
					<input type="hidden" id="txtmanutencao" name="txtmanutencao">
					<div class="row">
						Tem certeza que deseja remover o patrimônio da manutenção ? 		
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<div id="btnloading4"></div>
					<input type="submit" class="btn btn-success btndespachar" id="btndespachar" value="Despachar">
					<!--<input type="submit" class="btn btn-success" name="btnCadastrar" id="btnCadastrar" value="Cadastrar">-->
				</div>
			</form>
		</div>
	</div>
</div>