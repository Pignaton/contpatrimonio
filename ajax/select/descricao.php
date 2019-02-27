<?php
include_once('../../_conn/conn.php');
$descricao = "";
$query_desc = "SELECT id_descricao_padrao, descricao_padrao FROM descricao_padrao WHERE 1";

$query_descricao = $patrimonio->prepare($query_desc);
$query_descricao->execute();
$rows = $query_descricao->rowCount();
$descricao = "<option value=''></option>";
while ( $tbl = $query_descricao->fetch(PDO::FETCH_OBJ)){

$descricao .= "<option value=".$tbl->id_descricao_padrao.">".$tbl->descricao_padrao."</option>";
}

echo $descricao;

?>