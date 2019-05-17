<?php 
include("includes/header.php"); ?>
<br>
<style>
.ui-pnotify.dark .ui-pnotify-container {
    color: #E9EDEF;
    background-color: rgba(255,96,80,.88);
    border-color: rgba(255,96,80,.88);
	margin-right:20px;
}
*, :after, :before {
    box-sizing: border-box;
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Administrar <b>Ativos</b></h2>
						<?php 
						/*$nome = 'Kaleb Pignaton';
						$str = str_replace(' ', '.', $nome);
						echo $str;*/
						?>
					</div>
					<div class="col-sm-6">
						<a href="#adicionar_ativo" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Cadastrar novo ativo</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="load(1);">
                                <span class="glyphicon glyphicon-search"></span>
                             </button>
                        </span>
                    </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<?php isset($_SESSION['msgimg']);
				echo $_SESSION['msgimg'];
				unset($_SESSION['msgimg']);
			?>
			<div class="ui-pnotify dark ui-pnotify-fade-normal ui-pnotify-in ui-pnotify-fade-in ui-pnotify-move" aria-live="assertive" aria-role="alertdialog">
				<div class="alert ui-pnotify-container alert-info ui-pnotify-shadow" role="alert" style="min-height: 16px;">
					<div class="ui-pnotify-closer"  class="close" data-dismiss="alert" aria-label="Close" aria-role="button" tabindex="0" title="Close">
						<span class="glyphicon glyphicon-remove"></span>
					</div>
					<div class="ui-pnotify-sticker" aria-role="button" aria-pressed="true" tabindex="0" title="Unstick" style="cursor: pointer; visibility: hidden; display: none;">
						<span class="glyphicon glyphicon-play" aria-pressed="true"></span>
					</div>
					<div class="ui-pnotify-icon">
						<span class="glyphicon glyphicon-info-sign"></span>
					</div>
					<h4 class="ui-pnotify-title">
						Atenção</h4><div class="ui-pnotify-text" aria-role="alert">As notas fiscais têm que estar no formato PDF.
					</div>
				</div>
			</div>
			<hr>
			<div id="loader"></div>
			<div id="resultados"></div>
			<div class='outer_div'></div>	
   </div>
    </div>
		</div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_add.php");?>
	<!-- Delete Modal HTML -->
	<?php include("html/modal_deleta.php");?>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_edit.php");?>
<script>
window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);</script>	
<script src="js/script.js"></script>
<?php include("includes/footer.php");?>

<br>
