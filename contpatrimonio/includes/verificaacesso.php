<?php
include("../../_conn/conn.php");
$funcionario = $_SESSION['id_funcionario'];
$libera_acesso = "SELECT * FROM pagina_acesso WHERE funcionario = $funcionario";
$liberar_acesso = $patrimonio->prepare($libera_acesso);
$liberar_acesso->execute();
while($tbl = $liberar_acesso->fetch(PDO::FETCH_ASSOC)){
		
	$dashboard=$tbl['dashboard'];
	$id_pagina=$tbl['id_pagina'];
	$funcionario=$tbl['funcionario'];
	$cadastro_ativo=$tbl['cadastro_ativo'];
	$tabela_manutencao=$tbl['tabela_manutencao'];
	$tabela_baixa=$tbl['tabela_baixa'];
	$manutencao_ativo=$tbl['registra_manutencao'];
	$backup=$tbl['backup'];
	$acesso=$tbl['acesso'];
}

    $caminho_diretorio = $_SERVER['PHP_SELF']; 
	$caminho_diretorio_array = explode('/',$caminho_diretorio);
	$nome_arquivo = $caminho_diretorio_array[4];

if($nome_arquivo == 'dashboard.php' && $dashboard != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'cadastro_ativo.php' && $cadastro_ativo != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'manutencao_tabela.php' && $tabela_manutencao != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'baixa_ativo.php' && $tabela_baixa != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'acesso.php' && $acesso != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'manutencao_ativo.php' && $manutencao_ativo != 1){
	header("Location:sempermissao.php");
}
else if($nome_arquivo == 'backup.php' && $backup != 1){
	header("Location:sempermissao.php");
}
if($usuario_nivel != 1){	
	$disabled="readonly='readonly' style='cursor:not-allowed;'"; 
 	$permi="Edição não permitida ";
}else{
	$disabled="";
}

if($nome_arquivo == 'dashboard.php'){
	$active1 = 'active';
	$block1 = 'style="display:block;"';
	$color1 = 'style="color: #337ab7 !important;"';
}

else if($nome_arquivo == 'cadastro_ativo.php'){
	$active2 = 'active';
	$block2 = 'style="display:block;"';
	$color2 = 'style="color: #337ab7 !important; "';
}
else if($nome_arquivo == 'baixa_ativo.php'){
	$active3 = 'active';
	$block3 = 'style="display:block;"';
	$color3 = 'style="color: #337ab7 !important; "';
}
else if($nome_arquivo == 'manutencao_tabela.php'){
	$active4 = 'active';
	$block4 = 'style="display:block;"';
	$color4 = 'style="color: #337ab7 !important; "';
}
else if($nome_arquivo == 'manutencao_ativo.php'){
	$active4 = 'active';
	$block4 = 'style="display:block;"';
	$color5 = 'style="color: #337ab7 !important; "';
}
else if($nome_arquivo == 'backup.php'){
	$active6 = 'active';
	$color6 = 'style="color: #337ab7 !important; "';
}
?>