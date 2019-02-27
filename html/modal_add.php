
<div id="adicionar_ativo" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<form name="add_ativo" id="add_ativo" action="javascript:void(0);">
				<div class="modal-header">						
					<h4 class="modal-title"><i class="fas fa-plus-circle"></i>  Cadastro do Ativo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<span id="erros" name="erros" class="erros"></span>
					<!--<div id="">
						<div class="row pt-4" style="position: absolute; z-index: 1000;">
							<div  class="col-sm-7"></div>
							<div class="col-sm-1 text-center " id="loading_spinner" >
								<img class="" src="ajax/img/loading.gif" style="width:290px;">
							</div>
							<div class="col-sm-1"></div>
						</div>
					</div>-->
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
								<label for="nome" class="col-form-label">Nome Produto:</label>
								<input type="text" class="form-control" name="txtnome" id="txtnome" value="Optiplex 3060 Micro" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="codigo" class="col-form-label">Placa Patrimônio:</label>
								<input type="text" class="form-control" onkeypress="return letras();" name="txtcodigo" id="txtcodigo" value="000222" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="responsavel" class="col-form-label">Responsavel:</label>
								<select class="form-control" name="txtresponsavel" id="txtresponsavel" required>
										<?php include('ajax/select/funcionario.php') ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
								<label for="departamento" class="col-form-label">Departamento:</label>
								<select class="form-control" name="txtdapartamento" id="txtdapartamento" required>
									<?php include('ajax/select/departamento.php'); ?>
								<select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="descricao_padrao" class="col-form-label">descrição Padrão:</label>
								<select class="form-control" name="txtdescricaopadrao" id="txtdescricaopadrao" required>
									<?php include('ajax/select/descricao.php'); ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="condicao" class="col-form-label">Condição:</label>
								<select class="form-control" name="txtcondicao" id="txtcondicao" required>
									<?php include('ajax/select/condicao.php'); ?>
								<select>
							</div>
						</div>
					</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="departamento" class="col-form-label">descrição:</label>
										<textarea class="form-control" name="txtdescricao" id="txtdescricao" rows="3" style="resize:none;" required>Desktop umtracompacto com diversas soluçoes de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="Data" class="col-form-label">Data:</label>
										<input type="date" class="form-control" name="txtdata" id="txtdata" required>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="valor" class="col-form-label">Valor:</label>
										<input type="text" class="form-control" name="txtvalor" id="txtvalor" value="" onkeypress="return letras();" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="categoria" class="col-form-label">Categoria:</label>
										<select class="form-control" name="txtcategoria" id="txtcategoria" required>
											<?php include('ajax/select/categoria.php'); ?>
											<select>
									</div>
								</div>
								</div>
								<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label for="status" class="col-form-label">Status:</label>
										<select class="form-control" name="txtstatus" id="txtstatus" required>
											<?php include('ajax/select/status.php'); ?>
											<select>
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="notafiscal" class="col-form-label">Nota fiscal:</label>
										<input type="text" class="form-control" name="txtnotafiscal" id="txtnotafiscal" value="000.000.456" required> &nbsp;
										<div class="input-group mb-3">
											<div class="form-group">
												<input type="file" class="input-file" name="txtimgfiscal" id="txtimgfiscal" required>
												<label for="txtimgfiscal" class="btn btn-tertiary js-labelFile">
											<i class="icon fa fa-check"></i>
											<span class="js-fileName">Selecionar arquivo</span>
											</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
								<div id="btnloading3"></div>
								<input type="submit" class="btn btn-success btncadastrar" value="Cadastrar">
								<!--<input type="submit" class="btn btn-success" name="btnCadastrar" id="btnCadastrar" value="Cadastrar">-->
							</div>
			</form>
		</div>
	</div>
</div>