<?php
include_once('../../_conn/conn.php');
$condicao="";
$query_condi = "SELECT id_condicao_ativo, condicao_ativo FROM condicao_ativo WHERE 1";

$query_condicao = $patrimonio->prepare($query_condi);
$query_condicao->execute();
$rows = $query_condicao->rowCount();
$condicao = "<option value=''></option>";
while ( $tbl = $query_condicao->fetch(PDO::FETCH_OBJ)){
//$array_ativo[] = $tbl->condicao_ativo;
$condicao .= "<option value=".$tbl->id_condicao_ativo." ($tbl->id_condicao_ativo == $tbl->id_condicao_ativo)? 'selected': ''; '>$tbl->condicao_ativo</option>";
}
echo $condicao;

?>