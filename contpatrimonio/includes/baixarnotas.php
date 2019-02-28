<?php
session_start();
set_time_limit(0);

$arquivo = $_GET["arquivo"]; 
$testa =  substr($arquivo,-3); 
//$arquivo = pathinfo($arquivo); 
 
$bloqueados = array('php', 'html', 'htm', 'asp','jpg', 'png', 'jpeg'); 
 
if(!in_array($testa,$bloqueados)){  
	
$arquivoLocal = '../img_nota_fiscal/img_fora/'.$arquivo; // caminho absoluto do arquivo
// Verifica se o arquivo não existe
if (!file_exists($arquivoLocal)) {
 $_SESSION['msgimg']= "<p class='text-center some'>Arquivo não foi encontrado</p>";
	 echo "<script>window.onload = function(){javascript:history.back();};</script>";
	 //header("Location:../cadastro_ativo.php");
exit;
}
//$novoNome = 'imagem_nova.jpg';
// Configuramos os headers que serão enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$arquivo.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($arquivo));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
ob_end_clean(); 
flush();
// Envia o arquivo para o cliente
readfile($arquivo);	

}else{ $_SESSION['msgimg'] = "<p class='text-center some'>Erro! Arquivo não é uma extenção pdf</p>"; 
	  echo "<script>window.onload = function(){javascript:history.back();};</script>";
	  //header("Location:../cadastro_ativo.php");
	  exit;} 
   
?>