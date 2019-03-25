		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			.msg{
				z-index:4;
				position: absolute;
			}

		</style>
		<div id="liberar_acesso" class="modal fade" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					   <form action="javascript:void(0);" name="libera_acesso" id="libera_acesso" method="POST">
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
										<div class=" pl-4">
											<label>Usúario: </label>
											<input type="text" class="txtnome" name="txtnome" id="txtnome" readonly="readonly">
										</div>
										<div class="row">
										<div class="col-sm-4">
											<span class="msg"></span>
											<section class="boxe">
												<div class="checkbox c-checkbox">
													<label class="desativa">
													  <input type="checkbox" class="txtativo" name="txtativo" id="txtativo" />
													  <span class="fa fa-check"></span>
													  &nbsp; Conta ( Ativa / Desativa )
													</label>
												</div>									
											</section>
										</div>
										<div class="col-sm-3">								
										<section class="boxe">
											<div class="sidebar-dropdown">
												<a href="#" class="link">
													<div class="checkbox c-checkbox">
														<label>
														  <input type="checkbox" id="checkdashboard" class="checkdashboard" />
													      <span class="fa fa-check"></span>
														 <i data-toggle="collapse" class="link">&nbsp; Dashboard</i><i class="seta fas">&nbsp;</i>
														</label>
													</div>
												</a>
												<div class="collapse">
													<div class="corfundo">
														<div class="checkbox c-checkbox">
														<label>
														  <input type="checkbox" class="txtdashboard" name="txtdashboard" id="txtdashboard" />
														  <span class="fa fa-check"></span>
														  &nbsp; Dashboard 
														</label>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-sm-4">
										<section class="boxe">
											<div class="sidebar-dropdown">
            									<a href="#">
													<div class="checkbox c-checkbox">
														<label>
														  <input type="checkbox" id="checkativo" class="checkativo" />
													      <span class="fa fa-check"></span>
														 <i data-toggle="collapse" class="link">&nbsp; Ativos</i><i class="seta fas">&nbsp;</i> 
														</label>
													</div>
												</a>
												<div class="collapse">
													<div class="corfundo">
														<div class="checkbox c-checkbox">
															<label>
															  <input type="checkbox" class="txtcadastro" name="txtcadastro" id="txtcadastro" />
															  <span class="fa fa-check"></span>
															  &nbsp; Tabela de Ativos 
															</label>
														</div>
													</div>
												</div>
											</div>
										</section>
										</div>	
										<div class="col-sm-4">								
											<section class="boxe">
												<div class="checkbox c-checkbox">
													<label class="desativa">
													  <input type="checkbox" class="txtbackup" name="txtbackup" id="txtbackup" />
													  <span class="fa fa-check "></span>
													  &nbsp; Cópia das Notas
													</label>
												</div>										
											</section>
										</div>
										<div class="col-sm-3">
										<section class="boxe">
											<div class="sidebar-dropdown">
            								 <a href="#">
												<div class="checkbox c-checkbox">
													<label>
													  <input type="checkbox" id="checkbaixa" class="checkbaixa" />
												      <span class="fa fa-check"></span>
													 <i data-toggle="collapse" class="link">&nbsp; Baixa</i><i class="seta fas">&nbsp;</i>
													</label>
												</div>
											 </a>
											<div class="collapse">
												<div class="corfundo">
													<div class="checkbox c-checkbox">
													<label>
													  <input type="checkbox" class="txttabela_baixa" name="txttabela_baixa" id="txttabela_baixa" />
													  <span class="fa fa-check"></span>
													  &nbsp; Tabela de Baixa 
													</label>
													</div>
												</div>
											</div>
										</div>
										</section>
										</div>
										<div class="col-sm-4">
										<section class="boxe">
											<div class="sidebar-dropdown">
												<a href="#">
													<div class="checkbox c-checkbox ">
														<label>
														  <input type="checkbox" id="checkmanutencao" class="checkmanutencao" />
														  <span class="fa fa-check"></span>
														  <i data-toggle="collapse" class="link">&nbsp; Manutenção</i><i class="seta fas">&nbsp;</i>
														</label>
													</div>
												</a>
												<div class="collapse" >
													<div class="corfundo">
														<div class="checkbox c-checkbox">
															<label>
															  <input type="checkbox" class="txtmanu" name="txtregistramanutencao" id="txtregistramanutencao" />
															  <span class="fa fa-check"></span>
															  &nbsp; Tabela de Manutenção 
															</label>
														</div>
														<div class="checkbox c-checkbox">
															<label>
															  <input type="checkbox" class="txtmanu" name="txttabela_manutencao" id="txttabela_manutencao"/>
															  <span class="fa fa-check"></span>
															  &nbsp; Registrar Manutenção 
															</label>
														</div>
													</div>
												</div>
											</div>
										</section>
										</div>
										<div class="col-sm-4">
											<section class="boxe">
												<div class="checkbox c-checkbox">
													<label  class="desativa" >
													  <input type="checkbox" name="txtacesso" id="txtacesso"/>
													  <span class="fa fa-check"></span>
													  &nbsp; Acesso 
												    </label>
											    </div>									
											</section>
										</div>
										<div class="col-sm-5">
											<section class="boxe checkno">
												<div class="checkbox c-checkbox">
													<label  class="desativa" >
													  <input type="checkbox" name="txthome" id="txthome" class="checkno" disabled="" />
													  <span class="fa fa-check"></span>
													  &nbsp; Home <i class="text-danger checkno">(DESABILITADO)</i>
												    </label>
											    </div>									
											</section>
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
					<script>
						$("#txtativo").click(function(){
							/*if($("#txtativo").prop(':checked')){alert("Conta ativada");return true;}*/
							if($(this).prop('checked') == "")
								$(".msg").html("<p class='conta alert alert-danger text-center'>Conta será desativada</p>");
							else
								$(".msg").html("<p class='conta alert alert-success text-center'>Conta será ativada &nbsp;&nbsp;&nbsp;</p>");
							
							window.setTimeout(function() {$(".conta").fadeTo(500, 0).slideUp(500, function(){$(".conta").remove();});}, 1000);
						});

						  $(".sidebar-dropdown > a").click(function() {
						  $(".collapse").slideUp(200);
						  if (
						    $(this)
						      .parent()
						      .hasClass("active")
						  ) {
						    $(".sidebar-dropdown").removeClass("active");
						    $(this)
						      .parent()
						      .removeClass("active");
						  } else {
						    $(".sidebar-dropdown").removeClass("active");
						    $(this)
						      .next(".collapse")
						      .slideDown(200);
						    $(this)
						      .parent()
						      .addClass("active");
						  }
						});

						$(".checkmanutencao").change(function () {
						    $(".txtmanu").prop('checked', $(this).prop("checked"));
						});
						$(".checkativo").change(function () {
						    $(".txtcadastro").prop('checked', $(this).prop("checked"));
						});
						$(".checkbaixa").change(function () {
						    $(".txttabela_baixa").prop('checked', $(this).prop("checked"));
						});
						$(".checkdashboard").change(function () {
						    $(".txtdashboard").prop('checked', $(this).prop("checked"));
						});

						/*$("#checkmanutencao").click(function(){
						    $('.txtmanu').not(this).prop('checked', this.checked);
						});*/

						/*var checkmanutencao = $("#checkmanutencao");
						checkmanutencao.click(function() {
							if($(this).is(':checked')){
								$('.txtmanu').prop("checked", true);
							}else{
								$('.txtmanu').prop("checked", false);
							}
						});*/
					</script>
