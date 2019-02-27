<?php include_once('includes/header.php'); include_once('includes/post-get.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
			<?php include_once('includes/menu.php'); ?>
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-7">
							<h2>Geral sobre as <b>Manutenções</b></h2>
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
				 <hr>
				 <div id="loader"></div>
				 <div id="resultados"></div>
				 <div id="manutencao"></div>
			</div>
		</div>
	</div>
</div>
<?php include('html/modal_retorna.php'); ?>

<script type="text/javascript" src="js/manutencao_tabela.js"></script>
<?php include('includes/footer.php'); ?>