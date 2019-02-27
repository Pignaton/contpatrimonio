<?php
header('Content-Type: text/html; charset=utf-8');
include("../../../_conn/conn.php");
session_start();
$_SESSION[ 'id_funcionario' ];

date_default_timezone_set( 'America/Sao_Paulo' );

$hora_aquisicao = date( 'H:i:s' );
//if ( isset( $_POST['btnCadastrar'] ) ) {

$idpatrimonio = $_POST['txtcodigo'];
$nome_produto = $_POST[ 'txtnome' ];
$placa_patrimonio = $_POST[ 'txtplaca' ];
$departamento = $_POST[ 'txtdepartamento' ];
$descricao = $_POST[ 'txtdescricao' ];
$data_aquisicao = $_POST[ 'txtdata' ];
$valor = $_POST[ 'txtvalor' ];
$nf_registro = $_POST[ 'txtnotafiscal' ];

$limitar_ext = "sim";
$tipo_foto = array( ".pdf" );
$caminho_arquivo = "../../img_nota_fiscal/manutencao";
$sobreescrever = "nao";
set_time_limit( 0 );

include('../../includes/post-get.php');

$erro = FALSE;

$Data_do_banco = $data_aquisicao;
$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
$data1 = $Nova_Data_do_Banco->format( 'Y-m-d' );

if ( $_FILES[ "txtimgfiscal3" ][ "error" ] == UPLOAD_ERR_OK ) {
	$img_nota_fiscal = $_FILES[ "txtimgfiscal3" ][ "name" ];
	$img_nota_fiscal_tmp = $_FILES[ "txtimgfiscal3" ][ "tmp_name" ];
	$img_nota_fiscal_size = $_FILES[ "txtimgfiscal3" ][ "size" ];

	if ( $sobreescrever == "nao" && file_exists( "$caminho_arquivo/$img_nota_fiscal" ) ) {
		
		echo "<div class='alert alert-danger text-center'>Arquivo ' $img_nota_fisca' já existe! renomeei o arquivo.</div>";
		return false;
		exit;	
	}
	$ext = strrchr( $img_nota_fiscal, '.' ); 
	if ( $limitar_ext == "sim" && !in_array( $ext, $tipo_foto ) ) {
		
		echo "<div class='alert alert-danger text-center'>'$img_nota_fiscal' não é uma extençao de arquivo .pdf</div>";
		return false;
		exit;	

	}
}

$query_nota_fiscal = "SELECT nf_manutencao FROM registro_manutencao WHERE nf_manutencao = '$nf_registro'";
$query_verificar = $patrimonio->prepare( $query_nota_fiscal );
$query_verificar->execute();
$rows = $query_verificar->rowCount();

if ( $rows > 0 ) {
		echo "<div class='alert alert-danger text-center'>Já existe uma nota fiscal registrada com esse digitos!</div>";
		return false;
		exit;	

}
try{
		move_uploaded_file($img_nota_fiscal_tmp, "$caminho_arquivo/$img_nota_fiscal");

		/*adiciona vircula no campo valor*/
		$valor2 = str_replace( ".", "", $_POST['txtvalor'] );
		$valor_novo = str_replace( ",", ".", $valor2 );

		$query_inserir = "INSERT INTO registro_manutencao ( id_patrimonio, placa_patrimonio, nome_produto, responsavel, departamento, descricao, data_manutencao, hora_manutencao, valor_manutencao, nf_manutencao, img_nf_manutencao) 
						  VALUE 
						  ( :id_patrimonio, :placa_patrimonio, :nome_produto, :responsavel, :departamento, :descricao, :data_manutencao, :hora_manutencao, :valor_manutencao, :nf_manutencao, :img_nf_manutencao)";
		$query_inseri = $patrimonio->prepare( $query_inserir );
		$query_inseri->bindValue( ':id_patrimonio', $idpatrimonio );
		$query_inseri->bindValue( ':placa_patrimonio', $placa_patrimonio );
		$query_inseri->bindValue( ':nome_produto', $nome_produto );
		$query_inseri->bindValue( ':responsavel', $_SESSION[ 'id_funcionario' ]);
		$query_inseri->bindValue( ':departamento', $departamento );
		$query_inseri->bindValue( ':descricao', $descricao );
		$query_inseri->bindValue( ':data_manutencao', $data1 );
		$query_inseri->bindValue( ':hora_manutencao', $hora_aquisicao );
		$query_inseri->bindValue( ':valor_manutencao', $valor_novo );
		$query_inseri->bindValue( ':nf_manutencao', $nf_registro );
		$query_inseri->bindValue( ':img_nf_manutencao', $img_nota_fiscal );
		$query_inseri->execute();

		//$id = $patrimonio->lastInsertId();

		$query_nota = "INSERT INTO nota_fiscal ( id_patrimonio, nf_manutencao, img_nf_manutencao) VALUE ( :id_patrimonio, :nf_manutencao, :img_nf_manutencao)";

		$query_nota_fiscal = $patrimonio->prepare( $query_nota );
		$query_nota_fiscal->bindValue( ':id_patrimonio', $idpatrimonio );
		$query_nota_fiscal->bindValue( ':nf_manutencao', $nf_registro );
		$query_nota_fiscal->bindValue( ':img_nf_manutencao', $img_nota_fiscal );
		$query_nota_fiscal->execute();

		$query_status = "UPDATE registro_ativo SET status = :status, id_status_ativo = :id_status_ativo WHERE id_patrimonio = :id_patrimonio";
		$query_statu = $patrimonio->prepare($query_status);
		$query_statu->bindValue( ':status', 'M' );
		$query_statu->bindValue( 'id_status_ativo', '3' );
		$query_statu->bindValue( ':id_patrimonio', $idpatrimonio );
		$query_statu->execute();

		echo "<div class='alert alert-success text-center'>Patrimônio despachado para manutenção!</div>";
		return true;
	
	}catch(PDOException $e) {
		 //echo 'ERROR: ' . $e->getMessage();
		echo "<div class='alert alert-info text-center'>Desculpe, ocorreu um erro. Por favor, volte e tente novamente.</div>";
		return false;
		exit;
}
?>
