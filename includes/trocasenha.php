<?php 
require_once('header-index.php');
session_start();

?>
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="text-center logo-anexxa col-sm-11">
			<img class="img-fluid" src="../img/anexxa_group.png" />
		</div>
	</div>
	<div class="row" >
		<div class="col-sm-3 "></div>
		<div class="col-sm-5 text-center pt-5 ">
			<div class="jumbotron pt-5 form">
				<form id="trocasenha" name="trocasenha">
					<div class="container-fluid">
						<div id="erros" name="erros"></div>
						<div class="form-group">
							<label for="Email">
								<b class="text-primary">Email</b>
							</label>
							<div class="input-group">
								<i class="fas pt-2 pl-2 icon-login">&#xf0e0;</i><input type="email" class="form-control icon-login2" id="email_senha" maxlength="30" name="email" aria-describedby="emailHelp" placeholder="Entre com seu email" required="required" value="<?= $_SESSION['email']; ?>" readonly onpaste="return false;">
							<small id="emailHelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group">
							<label for="Password1">
                                <b class="text-primary">Nova Senha</b>
                            </label>
							<div class="input-group">
								<i class="fas pt-2 pl-2 icon-login">&#xf023;</i><input type="password" name="senha" class="form-control icon-login2" id="senha" required="required" >
							</div>
						</div>
						<div class="form-group">
							<label for="Password2">
                                <b class="text-primary">Repita a Senha</b>
                            </label>
								<div class="input-group">
								<i class="fas pt-2 pl-2 icon-login">&#xf023;</i><input type="password" name="senha2" class="form-control icon-login2" id="senha2" required="required">
								<div class="row pt-4 " style="position: absolute; z-index: 1000;">
									<div  class="col-sm-3"></div>
									<div class="col-sm-2 text-center" id="" >
										<div id="resultados"></div>
									</div>
									<div class="col-sm-1"></div>
								</div>
							</div>
						</div>
						<button type="submit" name="submit" id="btn" class="btn-entrar btn btn-primary form-control" />
						Entrar<span class="fas" style="font-size:18px;">&nbsp; &#xf35a;</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="../js/trocasenha.js"></script>
<?php
require_once('footer-index.php');
?>