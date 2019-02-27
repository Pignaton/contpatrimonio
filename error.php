<?php
function grava_log_moip($msg){
//pega o path completo
$caminho_atual = getcwd();
//muda o contexto de execução para a pasta logs
chdir($caminho_atual."/wp-content/themes/SEUTEMA/logs");
$data = date("d-m-y");
$hora = date("H:i:s");
$ip = $_SERVER[‘REMOTE_ADDR’];
//Nome do arquivo:
$arquivo = "logerror.txt";
//Texto a ser impresso no log:
$texto = "[$data][$hora][$ip]> $msg \n";
$manipular = fopen("$arquivo", "a+b");
fwrite($manipular, $texto);
fclose($manipular);
//Volta o contexto de execução para o caminho em que estava antes
chdir($caminho_atual);
}
?>