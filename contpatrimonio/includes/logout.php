<?php
session_start();
 // Se o usuário estiver logado, exclua a sessão vars para desconectá-los
  if (isset($_SESSION['id_funcionario'])) {  
// Exclui a sessão vars limpando o array $ _SESSION
    $_SESSION = array();

// Exclua o cookie da sessão definindo sua expiração para uma hora atrás (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }
 
// Destrua a sessão
    session_destroy();
  }

// Exclua os cookies de ID de usuário e nome de usuário definindo suas expirações para uma hora atrás (3600)
  /*setcookie('id_funcionario', '', time() - 3600);
  setcookie('nome', '', time() - 3600);
  setcookie('senha', '', time() - 3600);
  setcookie('email', '', time() - 3600);*/

// Redirecionar para a home page
/*criptografa o link da mensagem de logout */
  $msg_logout = "Logout realizado com sucesso";
	$url = base64_encode($msg_logout);
  //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '../index.php';
  header("location: ../index.php?msg=$url");
// echo $_COOKIE['favcolor'];

?>