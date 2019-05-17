<?php include_once('includes/header.php'); include_once('includes/post-get.php'); ?>
<style>
	.edit, #delete{
		font-size:19px;
	}
	.edit{
		color:#FFC107;
	}
	#delete{
		color:#F44336;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm">
        <div class="table-wrapper">
            <div class="table-title">
            	<h2 class="text-center"><b>Documentação</b></h2>
            </div>
        	<br>
            <div>
            	<div class="titulo-documentacao">
            		<h4 class="text-center">Como cadastrar o ativo</h4>
            	</div>
            	<br>
            	<p>No menu <i class="fas fa-bars"></i> acesse a aba <strong>"ativo"</strong> e clique em tabela de ativos</p>
            	<p>Clique no botão <a href="#" class="btn btn-success btn-sm"><i class="material-icons" style="font-size:13px;">&#xE147;</i> <span>Cadastrar novo ativo</span></a></p>
            	<p>• Todos os campos são obrigatorio.</p>
            	<p>• No campo <label>placa de patrimônio</label> é inserido o número de registro da plaqueta de identificação.</p>
            	<p>• A placa nunca pode se repitir, o sistema irá identificar placas repetidos é não deixará registrar.</p>
            	<p>• Campo <label>Nota Fiscal</label> é inserido número do cupom da nota fiscal.</p>
            	<p>• Campo <label>Selecionar Arquivo</label> irá adicionar a imagem da nota fiscal, *Lembrando que tem que estar no formato PDF.</p>
            	<p>Abaixo tem um link de um site para conveter imagens em pdf, mais pode usar qualquer outro site para fazer o conversão.</p>
            	<p class="text-center">Para converter imagens em PDF, acesse&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;<a target="_blank" href="https://smallpdf.com/pt/jpg-para-pdf">Clique aqui</a></p>
            </div>
            <br>
            <div>
            	<div class="titulo-documentacao">
            		<h4 class="text-center">Como editar o ativo</h4>
            	</div>
            	<br>
            	<p>No menu <i class="fas fa-bars"></i> acesse a aba <strong>"ativo"</strong> e clique em tabela de ativos</p>
            	<p>Para editar o item clique o icon <a href="#"><i class="material-icons edit" data-toggle="tooltip" title="Editar">&#xE254;</i></a>.  Você também poderá visualizar as informações do patrimônio.</p>
            	<p>Edite o campo que for necessario e clique em <button class="btn btn-sm btn-primary">Atualizar</button></p>
            	<p>As mesma regras aplicadas no cadastro de ativo são aplicados para editar o patrimônio também.</p>
            </div>
            <br>
            <div>
            	<div class="titulo-documentacao">
            		<h4 class="text-center">Como dar baixa no ativo</h4>
            	</div>
					<br>
					<p>No menu <i class="fas fa-bars"></i> acesse a aba <strong>"ativo"</strong> e clique em tabela de ativos</p>
					<p>Para dar baixa clique em <a href="#"><i class="material-icons" title="Eliminar" data-toggle="tooltip" id="delete" title="Despachar para baixa">&#xE872;</i></a></p>
					<p>Informe o <label>motivo da baixa</label>, POR EXEMPLO: "Mesa está sendo substituída por uma nova mesa, pois, a antiga está quebrada é não há conserto".</p>
					<p>E clique em <button class="btn btn-sm btn-danger">Dar baixa</button></p>
					<p>Alguns dados serão gravados na página <strong>tabela de baixas</strong> será exibido algumas informações referente ao patrimônio que receberam baixa.</p>
            </div>
            <br>
            <div>
            	<div class="titulo-documentacao">
					<h4 class="text-center">Como deixar em manutenção um ativo</h4>
            	</div>
            	<br>
            	<p>No menu <i class="fas fa-bars"></i> acesse a aba <strong>"manutenção"</strong> e clique em <strong>Tabela de manutenção</strong></p>
            	<p>Escolha a ativo que queira colocar em manutenção e clique no icon <i class="fas fa-tools edit"></i>  alguns dados serão solicitados como <label>motivo, data, valor e nota fiscal</label></p>
            	<p>E clique em <button class="btn btn-sm btn-success">Despachar</button></p>
            	<p>Para visualizar ou acompanhar os ativos em manutenção, no menu clique em <label>Registrar manutenção</label></p>
            </div>
				<!--<div class='clearfix'></div>
				<hr>
				<div id="loader"></div>
				<div id="resultados"></div>
				<div class='outer_div'></div>-->
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php'); ?>
