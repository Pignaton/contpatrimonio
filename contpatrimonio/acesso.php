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
						<h2>Adiministrar <b>Acesso</b></h2>
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
			<div class='outer_div'></div>
          </div>
   	   </div>
	</div>
</div>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_acesso.php");?>
<script>window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);</script>
<script src="js/acesso.js"></script>
<?php include("includes/footer.php");?>
  <script type="text/javascript">

   /* $('#liberar_acesso').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var codigo = button.data('code')
      var nome = button.data('nome')
      var dashboard = button.data('dashboard')

      var modal = $(this)
      modal.find('.modal-title').text('ID ' + codigo)
      modal.find('#txtcodigo').val(codigo)
      modal.find('#txtnome').val(nome)
      if(dashboard  == '1'){
         $("#txtdashboard").attr('checked', true); 
         modal.find('#txtdashboard').val(dashboard)
      }
     
      
    })*/
  </script>
