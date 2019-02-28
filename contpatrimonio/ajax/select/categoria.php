<?php
include_once('../../_conn/conn.php');

$categoria = "";

$query_condi = "SELECT id_categoria, categoria FROM categoria WHERE 1";

$query_condicao = $patrimonio->prepare($query_condi);
$query_condicao->execute();
$rows = $query_condicao->rowCount();

$categoria = '<option value=""></option>';

while ( $tbl = $query_condicao->fetch(PDO::FETCH_OBJ)){
	$categoria1 = $tbl->categoria;

$categoria .= "<option value='$tbl->id_categoria'>$tbl->categoria</option>";
}

echo $categoria;

?>
