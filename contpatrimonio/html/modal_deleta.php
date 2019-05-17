<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="deletar_ativo" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form name="deleta_ativo" id="deleta_ativo" action="javascript:void(0);">
				<div class="modal-header">
					<div class="modal-title" >
						<h4>Informações da baixa</h4>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			<div class="modal-body">
			<div class="container">
				<span id="errobaixa"></span>
				<input type="hidden" name="txtbavalorantigo" id="txtbavalorantigo" >
				<input type="hidden" name="delete_id" id="delete_id">
				<div class="row">
					<div class="col-sm-2">
						<label class="letra">#: </label>
						<input type="text" id="txtbapatrimonio" name="txtbapatrimonio"  size="5" readonly>
					</div>
					<div class="col-sm-2">
						<label class="letra">Placa Patrimonio: </label>
						<input type="text" id="txtbaplacapatrimonio" name="txtbaplacapatrimonio" size="7" readonly>
					</div>
					<div class="col-sm-4">
						<label class="letra">Nome: </label>
						<input type="text" id="txtbanome" name="txtbanome" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label class="letra">Valor: </label>
						<input type="text" id="txtbavalor" name="txtbavalor"size="10" readonly>
					</div>
					<div class="col-sm-2">
						<label class="letra">Data: </label>
						<input type="text" id="txtbadata" name="txtbadata" readonly size="10">
					</div>
					<div class="col-sm-4">
						<label class="letra">Número da Nota: </label>
						<input type="text" id="txtbanotafiscal" name="txtbanotafiscal" readonly size="10" readonly>
					</div>
				</div>
				<input type="hidden" id="txtbaresponsavel" name="txtbaresponsavel" class="" readonly>
				<input type="hidden" id="txtbaimgfiscal" name="txtbaimgfiscal" class="" readonly>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<div class="form-group">
						<label for="motivo" class="col-form-label">informe o motivo da baixa:</label>
						<textarea class="form-control " id="txtbadescricaomotivo" name="txtbadescricaomotivo" rows="4" style="resize:none;" required></textarea>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-danger deletaUser" name="btnbaixa" id="btnbaixa" value="Dar Baixa" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Enviando">Dar baixa</button>
			</div>
			</form>
		</div>
	</div>
</div>