<?php include_once('includes/header.php'); include_once('includes/post-get.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7">
						<h2>Adicionar a <b>Manutenção</b></h2>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                   <div class="input-group col-md-12">
                       <input type="text" class="form-control" placeholder="Buscar" id="pesquisar" onkeyup="load(1);" />
                       <span class="input-group-btn">
                           <button class="btn btn-info" type="button" onclick="load(1);">
                               <span class="glyphicon glyphicon-search"></span>
                           </button>
                       </span>
                   </div>
                </div>
			</div>
				<div class='clearfix'></div>
				<hr>
				<div id="loader"></div>
				<div id="resultados"></div>
				<div class='outer_div'></div>
			</div>
		</div>
	</div>
</div>
<?php include("html/modal_manutencao.php"); ?>
<script type="text/javascript" src="js/manutencao.js"></script>
<?php include('includes/footer.php'); ?>