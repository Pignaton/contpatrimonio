<?php
include("../../../_conn/conn.php");


$id_patrimonio = $_POST['txtpatrimonio'];
$id_manutencao = $_POST['txtmanutencao'];
$data = date('Y-m-d');
try {
$manutencao_atualiza = $patrimonio->prepare("UPDATE registro_ativo SET id_status_ativo = :id_status_ativo, status = :status WHERE id_patrimonio = :id_patrimonio");
$manutencao_atualiza->execute(array(
	':id_patrimonio' => $id_patrimonio,
	':id_status_ativo' => 1,
	':status' => 'E'
));

$atualiza_registro = $patrimonio->prepare("UPDATE registro_manutencao SET data_conclusao = :data_conclusao, devolvido = :devolvido WHERE id_manutencao = :id_manutencao");
$atualiza_registro ->execute(array(
	':id_manutencao'  => $id_manutencao,
	':devolvido' => 0,
	':data_conclusao' => $data
));

 echo "<div class='alert alert-success text-center'>Despacho realizado com sucesso</div>"; 
 
 }catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>