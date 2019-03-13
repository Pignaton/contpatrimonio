<?php 
error_reporting(0); 
session_start();

include('../_conn/conn.php');

if(empty($_SESSION[ 'id_funcionario' ])){
	header("Location: index.php");
}

include('includes/info.php');
include('includes/verificaacesso.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<noscript><meta http-equiv="refresh" content="1; url=htacess/noscript.html"></noscript>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="noindex, nofollow" />
	<title> Reports - Patrimônio </title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
	<link rel="stylesheet" href="js/pnotify.custom.min.css">
	<script  href="../js/pnotify.custom.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css"/>
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/cadastro_ativo.css"/>
</head>
<body>
<div class="wrapper">
<div class="container-superior-user" align="center">
<?php
	include_once('../../_conn/conn.php');
    $caminho_diretorio = $_SERVER['PHP_SELF']; 
	$caminho_diretorio_array = explode('/',$caminho_diretorio);
	$nome_arquivo = $caminho_diretorio_array[4];
	
    $caminho_diretorio = $_SERVER['PHP_SELF']; 
	$caminho_diretorio_array = explode('/',$caminho_diretorio);
	$nome_arquivo2 = $caminho_diretorio_array[5];	

	$nome_usuario = $_SESSION['nome'];
	$nome_usuario_remove = explode('.',$nome_usuario);
	$nome_usuario_separa =  implode(" ",$nome_usuario_remove);

   /*!= $nome_arquivo && 'trocasenha.php'*/						 
  // Certifique-se de que o usuário esteja logado antes de prosseguir.
  if (!isset($_SESSION['id_funcionario']) && 'index.php' != $nome_arquivo && 'recupera_senha.php' != $nome_arquivo && 'logout.php' != $nome_arquivo2 && 'noscript.php' != $nome_arquivo2) {
    echo '<p class="login">Por favor <a href="index.php"> faça o login </a> para acessar essa página.</p>';
     exit();

 }
else if('index.php' != $nome_arquivo && 'recupera_senha.php' != $nome_arquivo && 'trocasenha.php' != $nome_arquivo2 && 'logout.php' != $nome_arquivo2 && 'noscript.php' != $nome_arquivo2) {

?>
<header class="header">
		<label href="javascript:;" class="menu-icon open" for="menu-btn" data-toggle="dropdown" aria-expanded="true" title="menu" >
			<?=$nome_usuario_separa?>&nbsp; &nbsp;<span class=" fa fa-angle-down"></span>
		</label>
		<ul class="dropdown-menu dropdown-usermenu pull-right">
			<li>
				<a href="perfil.php">&nbsp;<i class="fas fa-user pull-left pt-1"  style="font-size:10px;"></i>
					<font>Perfil</font>
				</a>
			</li>
			<li>
			<a href="javascript:;">&nbsp; <i class="fas fa-th-list pull-left pt-1"  style="font-size:10px;"></i>
				<font>Configurações</font>
			</a>
			</li>
			<?php if($acesso == 1){ ?>
			<li>
				<a href="acesso.php">&nbsp;<i class="fas fa-door-open pull-left pt-1" style="font-size:10px;"></i>
					<font>Acesso</font>
				</a>
			</li>
			<?php } ?>
			<div class="dropdown-divider"></div>
			<li>
				<a class="text-danger" href="includes/logout.php"><i class="fa fa-sign-out pull-right"></i>
					<font>Sair</font>
				</a>
			</li>
		</ul>
</header>
<?php } ?>
</div>	
<?php include_once('menu.php'); ?>