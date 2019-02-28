<?php 
include("includes/header.php"); ?>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
        	<div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-6">
							<h2>Visualizar <b>Notas</b></h2>
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
					<?php 
					isset($_SESSION['msgimg']);
						echo $_SESSION['msgimg'];
					  unset($_SESSION['msgimg']);
					?>
					<hr>
					<div id="loader"></div>
					<div id="resultados"></div>
					<div class='outer_div'></div>
   			</div>
  		</div>
	</div>
</div>
<script>
window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);</script>
 <script src="js/notas.js"></script>
<?php include("includes/footer.php"); ?>


