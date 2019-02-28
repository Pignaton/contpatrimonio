<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Inicio do modal visualizar-->
				<div class="modal fade" id="Modalvisualiza" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header modaltodos">
										<h5 class=""><i class="fas fa-info-circle pt-1"></i> Informaçao da Baixa</h5>
										<button type="button" class="close fechar pb-3" data-dismiss="modal" aria-label="Close">
          										<span aria-hidden="true" class="">&times;</span>
        								</button>
									</div>
									<div class="modal-body">
										<span class="badge badge-danger form-control pt-2 erro" name="erro"></span>
										<form method="POST" action='#' enctype="multipart/form-data">
											<input type="hidden" class="form-control txtvspatrimonio" id="txtvspatrimonio" name="txtvspatrimonio">
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label for="validationTooltip01" class="col-form-label">Nome Produto:</label>
														<input type="text" class="form-control txtvsnome" name="txtvsnome" id="txtvsnome" disabled>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="codigo" class="col-form-label">Placa Patrimônio:</label>
														<input type="text" class="form-control txtvscodigo" name="txtbacodigo" id="txtvscodigo" disabled>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="responsavel" class="col-form-label">Responsavel:</label>
														<input type="text" class="form-control txtvsnomeusuario" name="txtbanomeusuario" id="txtvsresponsavel" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="Data" class="col-form-label">Data:</label>
														<input type="text" class="form-control txtbadata" name="txtvsdata" id="txtvsdata" disabled>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="valor" class="col-form-label">Valor:</label>
														<input type="text" class="form-control txtbavalor" name="txtbavalor" id="txtvsvalor" disabled>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="responsavel" class="col-form-label">Usuário:</label>
														<input type="text" class="form-control txtbaresponsavel" name="txtbaresponsavel" id="txtvsusuario" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm">
													<div class="form-group">
														<label for="motivo" class="col-form-label">Motivo:</label>
														<textarea type="text" class="form-control txtbamotivo" name="txtbamotivo" id="txtvsmotivo" rows="3" style="resize:none;" disabled><?= $motivo_baixa ?></textarea>
													</div>
												</div>
											</div>	
										</form>
									</div>
								</div>
							</div>
						</div>
						<!--Fim-->