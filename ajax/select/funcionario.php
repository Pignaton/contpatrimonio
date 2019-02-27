<?php
header('Content-Type: text/html; charset=UTF8');
//mysql_query('SET NAMES utf8');
ini_set ('default_charset', 'UTF8');
include_once( '../../_conn/conn.php' );
$funcionario ="";
$query_condi = "SELECT id_funcionario, nome FROM usuario WHERE 1";

$query_condicao = $patrimonio->prepare( $query_condi );
$query_condicao->execute();
$rows = $query_condicao->rowCount();
?>

<?php
$funcionario = '<option value=""></option>';
while ( $tbl = $query_condicao->fetch( PDO::FETCH_OBJ) ) {

	$funcionario .= "<option value=".$tbl->id_funcionario." ($tbl->id_funcionario == $tbl->id_funcionario)?'selected':''; >$tbl->nome</option>";
}
echo $funcionario;

?>