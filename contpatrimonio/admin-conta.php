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
        						  <h2>Criar <b>Usuário</b></h2>
        					   </div>
                  </div>
              </div>
        			<div class='col-sm-4 pull-right'>
              </div>
              	<div class='clearfix' ></div>
              	<hr>
              	<div id="loader"></div>
                <div id="resultados"></div>
              	<div>
                  <form name="criaracesso" id='criaracesso' > 
                      <div class="row">
                          <div class="col-sm">
                            <label>Nome: </label>
                             <input type="text" id="txtnome" name="txtnome" class="form-control" required value="Teste teste">
                          </div>
                          <div class="col-sm">
                            <label>Email: </label>
                             <input type="email" id="txtemail" name="txtemail" class="form-control" required value="teste@gmail.com.br">
                          </div>
                          <div class="col-sm">
                            <label>Departamento: </label>
                              <select class="form-control" name="txtdepartamento" required>
                                <?= include("ajax/select/departamento.php");?>
                              </select>  
                          </div>
                          <div class="col-sm">
                            <label>Senha:<strong class="text-danger"> - SENHA PADRÃO </strong></label>
                             <input type="text" id="txtsenha" name="txtsenha" class="form-control" value="Mudar123" readonly>
                          </div>
                          <div class="col-sm">
                            <label>Nível: </label>
                              <select class="form-control" name="txtnivel"  required>
                                <option></option>
                                <option value="1">Adiministrador</option>
                                <option value="0">Usuário</option>
                              </select>
                          </div>
                      </div>
                </div>
            <div class='outer_div'></div>
        </div>
   	  </div>
	</div>
</div>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                      <h2>Libera <b>Acesso</b></h2>
                     </div>
                  </div>
              </div>
              <div class='col-sm-4 pull-right'>
              </div>
                <div class='clearfix'></div>
                <hr>
                <div id="loader"></div>
                <div> 
                    <div class="row">
                        <?=include("ajax/select/pagina_acesso.php");?>
                    </div>
                    <div class="btn-group">
                    <span id="loading"></span>
                    <input id="btnenviar" class="btn btn-primary" type="submit" value="Cadastrar">
                  </div>
                </form>
                </div>
                <div class='outer_div'></div>
        </div>
      </div>
  </div>
</div>

<script>
  /*window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);*/
</script>
<script type="text/javascript" src="js/criarconta.js"></script>
<?php include("includes/footer.php");?>
  <script type="text/javascript">
                /*$("#txtativo").click(function(){
              //if($("#txtativo").prop(':checked')){alert("Conta ativada");return true;}//
              if($(this).prop('checked') == "")
                $(".msg").html("<p class='conta alert alert-danger text-center'>Conta será desativada</p>");
              else
                $(".msg").html("<p class='conta alert alert-success text-center'>Conta será ativada &nbsp;&nbsp;&nbsp;</p>");
              
              window.setTimeout(function() {$(".conta").fadeTo(500, 0).slideUp(500, function(){$(".conta").remove();});}, 1000);
            });*/

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
