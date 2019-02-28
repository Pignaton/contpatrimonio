
<div id="manutencao_ativo" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<form name="manu_ativo" id="manu_ativo" action="javascript:void(0);">
					<div class="modal-header">						
						<h4 class="modal-title"><i class="fas fa-plus-circle"></i> Despachar para Manutenção</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
							<input type="hidden" id="txtcodigo" name="txtcodigo">
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<label for="nome" class="col-form-label">Nome Produto:</label>
										<input type="text" class="form-control" name="txtnome" id="txtnome"  readonly="readonly">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="codigo" class="col-form-label">Placa Patrimônio:</label>
										<input type="text" class="form-control" name="txtplaca" id="txtplaca" readonly="readonly">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="responsavel" class="col-form-label">Responsavel:</label>
										<input class="form-control" name="txtresponsavel" id="txtresponsavel" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<label for="departamento" class="col-form-label">Departamento:</label>
										<input class="form-control" name="txtdepartamento" id="txtdepartamento" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="departamento" class="col-form-label">descrição:</label>
										<textarea class="form-control" name="txtdescricao" id="txtdescricao" rows="3" style="resize:none;" required="required">Desktop umtracompacto com diversas soluçoes de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="Data" class="col-form-label">Data:</label>
										<input type="date" class="form-control" name="txtdata" id="txtdata" required="required" value="2019-05-02">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="valor" class="col-form-label">Valor:</label>
										<input type="text" class="form-control" name="txtvalor" id="txtvalor" value="55.55" onkeypress="return letras();" required="required">
									</div>
								</div>


								<div class="col-sm-6">
									<div class="form-group">
										<label for="notafiscal" class="col-form-label">Nota fiscal:</label>
										<input type="text" class="form-control" name="txtnotafiscal" id="txtnotafiscal" value="000.000.456" required="required"> &nbsp;
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-group mb-3">
									<div class="form-group">
										<input type="file" class="input-file3" name="txtimgfiscal3" id="txtimgfiscal3" required="required">
										<label for="txtimgfiscal3" class="btn btn-tertiary3 js-labelFile3">
											<i class="icon fa fa-check"></i>
											<span class="js-fileName3">Selecionar arquivo</span>
										</label>
									</div>
								</div>
							</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
								<div id="btnloading4"></div>
								<input type="submit" class="btn btn-success btndespachar" value="Despachar">
								<!--<input type="submit" class="btn btn-success" name="btnCadastrar" id="btnCadastrar" value="Cadastrar">-->
							</div>
						</form>
					</div>
				</div>
			</div>