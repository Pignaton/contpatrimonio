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
											<?= include("ajax/select/pagina_acesso.php")?>
										</div>
									</div>
									<div class="modal-footer">
										<div id="btnloading"></div>
										<button type="submit" class="btn btn-primary btnatualizar" name="btnAtualizar" id="btnatualizar" value="Atualizar"  data-loading-text="<i class='fa fa-spinner fa-spin'></i> Atualizando">Atualizar</button>
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
						    $(".txtmanutencao").prop('checked', $(this).prop("checked"));
						});
						$(".checkativo").change(function () {
						    $(".txtativo").prop('checked', $(this).prop("checked"));
						});
						$(".checkbaixa").change(function () {
						    $(".txtbaixa").prop('checked', $(this).prop("checked"));
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
