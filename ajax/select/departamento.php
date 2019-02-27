<?php
include_once('../../_conn/conn.php');
$departamento="";
$query_depa = "SELECT id_departamento, departamento FROM departamento WHERE 1";

$query_departamento = $patrimonio->prepare($query_depa);
$query_departamento->execute();
$rows = $query_departamento->rowCount();
$departamento = "<option value=''></option>";
while ( $tbl = $query_departamento->fetch(PDO::FETCH_OBJ)){

$departamento .= "<option value=".$tbl->id_departamento.">$tbl->departamento</option>";
}

echo $departamento;
?>