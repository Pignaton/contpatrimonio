<?php
include_once('../../_conn/conn.php');
$status ="";
$query_condi = "SELECT id_status, status FROM status_ativo WHERE 1";

$query_condicao = $patrimonio->prepare($query_condi);
$query_condicao->execute();
$rows = $query_condicao->rowCount();
$status = "<option value=''></option>";
while ( $tbl = $query_condicao->fetch(PDO::FETCH_OBJ)){

$status .= "<option value=".$tbl->id_status.">".$tbl->status."</option>";
}

echo $status;
?>