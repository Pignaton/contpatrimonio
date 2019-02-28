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
															<option value="1" <?=( $resposanvel_id=='1' )? 'selected': ''; ?>>kaleb Pignaton</option>
															<option value="2" <?=( $resposanvel_id=='2' )? 'selected': ''; ?>>André Santos</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label for="txtvsdepartamento" class="col-form-label">Departamento:</label>
														<select class="form-control txtvsdepartamento" id="txtvsdepartamento" name="txtvsdepartamento" required>
															<option value="1" <?=( $departamento_id=='1' )? 'selected': ''; ?>>Copa</option>
															<option value="2" <?=( $departamento_id=='2' )? 'selected': ''; ?>>Limpeza</option>
															<option value="3" <?=( $departamento_id=='3' )? 'selected': ''; ?>>Suporte</option>
															<option value="4" <?=( $departamento_id=='4' )? 'selected': ''; ?>>Recurso Humano</option>
															<option value="5" <?=( $departamento_id=='5' )? 'selected': ''; ?>>Desenvolvimento Web</option>
															<option value="6" <?=( $departamento_id=='6' )? 'selected': ''; ?>>Desenvolvimento App</option>
															<option value="7" <?=( $departamento_id=='7' )? 'selected': ''; ?>>Fina nceiro</option>
															<option value="8" <?=( $departamento_id=='8' )? 'selected': ''; ?>>Setor Operacional</option>
															<option value="9" <?=( $departamento_id=='9' )? 'selected': ''; ?>>SAC</option>
															<option value="10" <?=( $departamento_id=='10' )? 'selected': ''; ?>>Criaçao e Mídia</option>
															<option value="11" <?=( $departamento_id=='11' )? 'selected': ''; ?>>Diretoria</option>
															<option value="12" <?=( $departamento_id=='12' )? 'selected': ''; ?>>Recepçao</option>
															<option value="13" <?=( $departamento_id=='13' )? 'selected': ''; ?>>Infraestrutura de TI</option>
															<option value="14" <?=( $departamento_id=='14' )? 'selected': ''; ?>>Espediçao</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="descricao_padrao" class="col-form-label">descrição Padrão:</label>
														<select class="form-control txtvsdescricaopadrao" id="txtvsdescricaopadrao" name="txtvsdescricaopadrao" required>
															<option value="1" <?=( $descricao_padrao_id=='1' )? 'selected': ''; ?>>Telefone</option>
															<option value="2" <?=( $descricao_padrao_id=='2' )? 'selected': ''; ?>>Monitor de Vídeo</option>
															<option value="3" <?=( $descricao_padrao_id=='3' )? 'selected': ''; ?>>Armario</option>
															<option value="4" <?=( $descricao_padrao_id=='4' )? 'selected': ''; ?>>Geladeira</option>
															<option value="5" <?=( $descricao_padrao_id=='5' )? 'selected': ''; ?>>Ar condicionado</option>
															<option value="6" <?=( $descricao_padrao_id=='6' )? 'selected': ''; ?>>ventilador</option>
															<option value="7" <?=( $descricao_padrao_id=='7' )? 'selected': ''; ?>>Cadeira</option>
															<option value="8" <?=( $descricao_padrao_id=='8' )? 'selected': ''; ?>>Mesa</option>
															<option value="9" <?=( $descricao_padrao_id=='9' )? 'selected': ''; ?>>Teclado</option>
															<option value="10" <?=( $descricao_padrao_id=='10' )? 'selected': ''; ?>>CPU</option>
															<option value="11" <?=( $descricao_padrao_id=='11' )? 'selected': ''; ?>>Mouse</option>
															<option value="12" <?=( $descricao_padrao_id=='12' )? 'selected': ''; ?>>Notebook</option>
															<option value="13" <?=( $descricao_padrao_id=='13' )? 'selected': ''; ?>>Impressora</option>
															<option value="14" <?=( $descricao_padrao_id=='14' )? 'selected': ''; ?>>Microondas</option>
															<option value="15" <?=( $descricao_padrao_id=='15' )? 'selected': ''; ?>>TV</option>
															<option value="16" <?=( $descricao_padrao_id=='16' )? 'selected': ''; ?>>Cafeteira Industrial</option>
															<option value="17" <?=( $descricao_padrao_id=='17' )? 'selected': ''; ?>>Roteador Wirelles</option>
														</select>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="condicao" class="col-form-label">Condição:</label>
														<select class="form-control txtvscondicao" name="txtvscondicao" id="txtvscondicao" required>
															<option value="1" <?=( $condicao_id=='1' )? 'selected': ''; ?>>Excelente</option>
															<option value="2" <?=( $condicao_id=='2' )? 'selected': ''; ?>>Normal</option>
															<option value="3" <?=( $condicao_id=='3' )? 'selected': ''; ?>>Regular</option>
															<option value="4" <?=( $condicao_id=='4' )? 'selected': ''; ?>>Péssima</option>
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
															<option value="1" <?=( $categoria_id=='1' )? 'selected': ''; ?>>Móvies e Utensílios</option>
															<option value="2" <?=( $categoria_id=='2' )? 'selected': ''; ?>>Equipamentos de Informática</option>
															<option value="3" <?=( $categoria_id=='3' )? 'selected': ''; ?>>Eletrotomésticos</option>
														</select>
													</div>
												</div>
												</div>
												<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="status" class="col-form-label">Status:</label>
														<select class="form-control txtvsstatus" name="txtvsstatus"  id="txtvsstatus" required>
															<option value="1" <?=( $status_id=='1' )? 'selected': ''; ?>>Em uso</option>
															<option value="2" <?=( $status_id=='2' )? 'selected': ''; ?>>Baixa</option>
															<option value="3" <?=( $status_id=='3' )? 'selected': ''; ?>>Manutençao</option>
															<option value="4" <?=( $status_id=='4' )? 'selected': ''; ?>>Parado</option>
														</select>
													</div>
												</div>
												<div class="col-sm-9>
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
												<div id="btnloading2"></div>
												<input type="submit" class="btn btn-primary " name="btnAtualizar" id="btnAtualizar"  value="Atualizar"  >
											
											</div>
										</form>
									</div>
								</div>
							</div>