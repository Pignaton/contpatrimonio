<?=include("includes/header.php");

$id = $_GET['id'];

/*$query_acesso = $patrimonio->prepare("SELECT * FROM pagina_acesso WHERE funcionario = $id");
$query_acesso->execute();
while($tbl = $query_acesso->fetch(PDO::FETCH_ASSOC)){
	$txtdashboard = $tbl['dashboard'];
	$txtativo = $tbl['cadastro_ativo'];
	$txtmanutencao = $tbl['tabela_manutencao'];
	$txtbaixa = $tbl['tabela_baixa'];
	$txtacesso = $tbl['acesso'];
	$txtregistramanu = $tbl['registra_manutencao'];
	$txtnotas = $tbl['backup'];
	$txtcriaconta = $tbl['conta'];
	$txtdocumentacao = $tbl['documentacao'];
	$txthome = $tbl['home'];

}*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	.msg{
		z-index:4;
		position: absolute;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Liberar <b>Acesso</b></h2>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div>
			<div id="resultados"></div>
			<div class="row">
				<form action="javascript:void(0);" name="libera_acesso" id="libera_acesso" method="POST">
                <input type="text" name="txtcodigo" id="txtcodigo">
                <?=include("ajax/select/pagina_acesso2.php");?>
                <div class="modal-footer">
					<div id="btnloading"></div>
					<input type="submit" class="btn btn-primary btnatualizar" name="btnAtualizar" id="btnatualizar" value="Atualizar">
				</div>
				</form>
            </div>
			<div class='outer_div'></div>
   		</div>
    </div>
		</div>
    </div>
<script>
window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);</script>	
<script type="text/javascript">
						/*$("#txtativo").click(function(){
							/*if($("#txtativo").prop(':checked')){alert("Conta ativada");return true;}
							if($(this).prop('checked') == "")
								$(".msg").html("<p class='conta alert alert-danger text-center'>Conta será desativada</p>");
							else
								$(".msg").html("<p class='conta alert alert-success text-center'>Conta será ativada &nbsp;&nbsp;&nbsp;</p>");
							
							window.setTimeout(function() {$(".conta").fadeTo(500, 0).slideUp(500, function(){$(".conta").remove();});}, 1000);
						});*/

						 /* $(".sidebar-dropdown > a").click(function() {
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
						});*/

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
<script src="js/acesso2.js"></script>
<?php include("includes/footer.php");?>
<br>
