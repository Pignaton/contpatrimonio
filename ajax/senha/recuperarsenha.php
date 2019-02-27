<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

  if( !empty($_POST) ){
    
    require_once("../../../_conn/conn.php");
    
    $email = $_POST['email'];
    
    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $query_user = $patrimonio->prepare($query);
	$query_user->execute();
    if($count = $query_user->rowCount() == 1 ){
 
      // gerar a chave
      // exemplo adaptado de http://snipplr.com/view/20236/
     $chave = sha1(uniqid( mt_rand(), true));
     //$data_expiracao = (new DateTime())->format('Y-m-d H:i:s'); 
     date_default_timezone_set('america/sao_paulo');
     $script_tz = date_default_timezone_get();
                        
                        
    /*$data_expiracao = date('d/m/Y H:i:s', strtotime('+30 minutes'));
    $query_recupera = "INSERT INTO recuperacao VALUES ('$user', '$chave', '$data_expiracao')";
 	$query_recu_senha = $anexxa->prepare($query_recupera);
	$query_recu_senha->execute();*/
		
      //if($row = $query_recu_senha->rowCount() == 1 ){
 
        $link = "http://changegames.ga/recuperar_senha.php?utilizador=$email&confirmacao=$chave";
       
                        require '../../PHPMailer/PHPMailer/src/Exception.php';
                        require '../../PHPMailer/PHPMailer/src/PHPMailer.php';
                        require '../../PHPMailer/PHPMailer/src/SMTP.php';
		
                        $mail = new PHPMailer(); 
						//$mail->SMTPDebug = 1;
						//$mail->Debugoutput = 'html';
						//$mail->setLanguage('pt');
						$mail->CharSet = 'UTF-8';
						$mail->isSMTP();
						$mail->Host = 'mail.onlinemania.com.br';
						$mail->SMTPAuth = true; 
						$mail->Port = 587; // ou 25
						$mail->SMTPAuth = false;  	
						$mail->SMTPAutoTLS = false;
						$mail->Username = 'nao-responder@onlinemania.com.br';
						$mail->Password = '#GoodShop611';
                                 
						$mail->setFrom('nao-responder@onlinemania.com.br','Recuperaçao de Senha');
                        $mail->AddAddress($email);
                        
                        $mail->IsHTML(true);
                        $mail->Subject = 'Recuperaçao de Senha';
                        $mail->Body = '<div style="background-color:#E6E6E6; border-radius:5px; font-size: 13px;" align="center">'. 
                             '<h3 align="center" style="background-color:#848484; border-radius:5px; padding:25px 25px 25px 25px; color:#FFFFFF; font-size: 20px;">Anexxa Report </h3>'.
                             '<p align="center"><b>Solicitaçao de recuperaçao de senha.</b></p>'.
                             '<p></p>'.
                             '<p>Foi solicitado a recuperaçao de senha no <a href="https://report.anexxa-network.com/" style="a:link=text-decoration:none; color:#848484;">Anexxa Report</a>.</p>'.
                             '<hr>'.
                             '<p>Para efetuar a troca de senha, clique no botao abaixo:</p>'.
                             '<a style=" background-color: #4CAF50;border: none; border-radius:5px; color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 35px 2px; cursor: pointer;" href='.$link.'>Recuperar Senha</a>'.
                         '</div>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
                echo 'Nao foi possível enviar a mensagem.<br>';
                echo 'Erro: ' . $mail->ErrorInfo;
            } else {
				echo "success";
                //echo '<p class="alert alert-success text-white rounded" align="center">Link de recuperaçao de senha foi enviado para seu email</p>';
           }
 
      /*} else {
        echo '<p class="mb-1 bg-danger text-white rounded align="center">Nao foi possível gerar o endereço único</p>';
 
      }*/
    } else {
		echo "erro";
	  //echo '<p class="alert alert-danger text-white rounded" align="center">Email nao encontrado</p>';
	}
  } 
?>