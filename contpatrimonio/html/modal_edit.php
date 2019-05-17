<?php
header('http-equiv="Content-Type" content="text/html; charset=utf8mb4');
?>
<div id="editar_ativo" class="modal fade" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			   <form action="javascript:void(0);" name="edita_ativo" id="edita_ativo">
					<div class="modal-header">						
						<h4 class="modal-title">Informações do Ativo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
									<div class="modal-body">
											<input type="hidden" name="txtpatrimonio" id="txtpatrimonio" >
											<input type="hidden" name="txtvsimgnotafiscal" id="txtvsimgnotafiscal" >
											<input type="hidden" class="form-control txtpatrimonioantigo" name="txtvspatrimonioantigo" id="txtvspatrimonioantigo" >
											<input type="hidden" class="form-control txtnotafiscalantigo" id="txtnotafiscalantigo" name="txtnotafiscalantigo">
											<input type="hidden" class="form-control txtvalor_antigo" name="txtvalor_antigo" id="txtvalor_antigo">
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label for="validationTooltip01" class="col-form-label">Nome Produto:</label>
														<input type="text" class="form-control txtvsnome" name="txtvsnome" id="txtvsnome" required>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="codigo" class="col-form-label">Placa Patrimônio:</label>
														<input type="text" class="form-control " id="txtvscodigo" name="txtvscodigo" onkeypress="return letras();" required <?=$disabled?> title="<?=$permi?>">
														<span class="text-danger"><?=$permi?></span>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="responsavel" class="col-form-label">Responsavel:</label>
														<select class="form-control txtvsresponsavel" name="txtvsresponsavel" id="txtvsresponsavel" required>
															<?= include("ajax/select/funcionario.php"); ?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label for="txtvsdepartamento" class="col-form-label">Departamento:</label>
														<select class="form-control txtvsdepartamento" id="txtvsdepartamento" name="txtvsdepartamento" required>
															<?= include("ajax/select/departamento.php"); ?>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="descricao_padrao" class="col-form-label">descrição Padrão:</label>
														<select class="form-control txtvsdescricaopadrao" id="txtvsdescricaopadrao" name="txtvsdescricaopadrao" required>
																<?= include("ajax/select/departamento.php"); ?>
														</select>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="condicao" class="col-form-label">Condição:</label>
														<select class="form-control txtvscondicao" name="txtvscondicao" id="txtvscondicao" required>
															<?= include("ajax/select/condicao.php"); ?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label for="descricao" class="col-form-label">descrição:</label>
														<textarea class="form-control txtvsdescricao" name="txtvsdescricao" id="txtvsdescricao" rows="3" style="resize:none;"></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label for="Data" class="col-form-label">Data:</label>
														<input type="date" class="form-control txtvsdata" name="txtvsdata" id="txtvsdata"  required>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="valor" class="col-form-label">Valor:</label>
														<input type="text" class="form-control txtvsvalor" name="txtvsvalor" id="txtvsvalor"  onkeypress="return letras();" required>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="form-group">
														<label for="categoria" class="col-form-label">Categoria:</label>
														<select class="form-control txtvscategoria" name="txtvscategoria" id="txtvscategoria" required>
															<?= include("ajax/select/categoria.php"); ?>
														</select>
													</div>
												</div>
												</div>
												<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="status" class="col-form-label">Status:</label>
														<select class="form-control txtvsstatus" name="txtvsstatus"  id="txtvsstatus" required>
															<?= include("ajax/select/status.php"); ?>
														</select>
													</div>
												</div>
												<div class="col-sm-9">
													<div class="form-group">
														<label for="notafiscal" class="col-form-label">Nota fiscal:</label>
														<input type="text" class="form-control txtvsnotafiscal" name="txtvsnotafiscal" id="txtvsnotafiscal" onkeypress="return letras();" required> &nbsp;
														<div class="input-group mb-3">
															<div class="form-group">
																<input type="file" class="input-file2" id="txtimgfiscal2" name="txtimgfiscal2" >
															<label for="txtimgfiscal2" class="btn btn-tertiary2 js-labelFile2">								
																<i class="icon fa fa-check"></i>
																<span class="js-fileName2">Selecionar arquivo</span>
															</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary " name="btnAtualizar" id="btnAtualizar" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Atualizando">Atualizar</button>
											
											</div>
										</form>
									</div>
								</div>
							</div>