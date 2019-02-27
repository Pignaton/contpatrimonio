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
						<h2>Informações de <b>Perfil</b></h2>
					</div>
                </div>
            </div>
			<div class="clearfix"></div>
			<hr>
			<!--<div id="loader"></div>-->
			<div id="perfilexibi"></div>
			<div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><font>Editar Perfil</font></h4>
                                </div>
                                <div class="card-body">
                                    <form id="edita_perfil" name="edita_perfil">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label><font>Empresa (desativada)</font></label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Anexxa Group">
                                                </div>
                                            </div>
											<div class="col-md-7">
                                                <div class="form-group">
                                                    <label><font>Nome</font></label>
                                                    <input type="text" class="form-control" placeholder="Company" id="txtnome" name="txtnome">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label><font>Nome de usuário</font></label>
                                                    <input type="text" class="form-control" placeholder="Username" id="txtusuario" name="txtusuario">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><font>Endereço de e-mail</font></label>
                                                    <input type="email" class="form-control" placeholder="Email" id="txtemail" name="txtemail">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label><font>Departamento</font></label>
                                                    <input type="text" class="form-control" placeholder="" id="txtdepartamento" name="txtdepartamento">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label><font>Senha</font></label>
                                                    <input type="text" class="form-control" placeholder="senha" id="txtsenha" name="txtsenha">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label><font>Confirmar Senha</font></label>
                                                    <input type="text" class="form-control" placeholder="confirma senha" name="txtconfirma" name="txtconfirma">
                                                </div>
                                            </div>
                                        </div>
										<div id="btnloading" ></div>
                                        <button type="submit"  class="btn btn-info btn-fill pull-right btnatualiza"><font>Atualizar perfil</font></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		   </div>
		</div>
	</div>
</div>
<script>window.setTimeout(function() {$(".some").fadeTo(500, 0).slideUp(500, function(){$(".some").remove();});}, 6000);</script>	
<script src="js/script.js"></script>
<?php include("includes/footer.php");?>
