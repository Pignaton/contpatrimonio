<?php
header('Content-Type: text/html; charset=utf8mb4');
include("../../../_conn/conn.php");
session_start();
$_SESSION[ 'id_funcionario' ];

date_default_timezone_set( 'America/Sao_Paulo' );

$hora_aquisicao = date( 'H:i:s' );
//if ( isset( $_POST['btnCadastrar'] ) ) {
$nome_produto = $_POST[ 'txtnome' ];
$placa_patrimonio = $_POST[ 'txtcodigo' ];
$responsavel = $_POST[ 'txtresponsavel' ];
$departamento = $_POST[ 'txtdapartamento' ];
$descricao = $_POST[ 'txtdescricao' ];
$descricao_padrao = $_POST[ 'txtdescricaopadrao' ];
$data_aquisicao = $_POST[ 'txtdata' ];
$valor = $_POST[ 'txtvalor' ];
$categoria = $_POST[ 'txtcategoria' ];
$status = $_POST[ 'txtstatus' ];
$condicao_ativo = $_POST[ 'txtcondicao' ];
$nf_registro = $_POST[ 'txtnotafiscal' ];

$limitar_ext = "sim";
$tipo_foto = array( ".pdf" );
$caminho_arquivo = "../../img_nota_fiscal/";
$sobreescrever = "nao";
set_time_limit( 0 );

include('../../includes/post-get.php');

$erro = FALSE;

$Data_do_banco = $data_aquisicao;
$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
$data1 = $Nova_Data_do_Banco->format( 'Y-m-d' );

if ( $_FILES[ "txtimgfiscal" ][ "error" ] == UPLOAD_ERR_OK ) {
	$img_nota_fiscal = $_FILES[ "txtimgfiscal" ][ "name" ];
	$img_nota_fiscal_tmp = $_FILES[ "txtimgfiscal" ][ "tmp_name" ];
	$img_nota_fiscal_size = $_FILES[ "txtimgfiscal" ][ "size" ];

	if ( $sobreescrever == "nao" && file_exists( "$caminho_arquivo/$img_nota_fiscal" ) ) {
		
		echo "<div class='alert alert-danger text-center alerta'>Arquivo ' $img_nota_fiscal' já existe! renomeei o arquivo.</div>";
		return false;
		exit;	
	}
	$ext = strrchr( $img_nota_fiscal, '.' );
	if ( $limitar_ext == "sim" && !in_array( $ext, $tipo_foto ) ) {
		
		echo "<div class='alert alert-danger text-center alerta'>'$img_nota_fiscal' é uma extençao de arquivo inválida para upload<p>extensão .pdf é a unica permitida</p></div>";
		return false;
		exit;	

	}
}
	
$query_patrimonio = "SELECT placa_patrimonio FROM registro_ativo WHERE placa_patrimonio = '$placa_patrimonio'";
$query_verificar = $patrimonio->prepare( $query_patrimonio );
$query_verificar->execute();
$rows1 = $query_verificar->rowCount();

if ( $rows1 > 0 ) {
		echo "<div class='alert alert-danger  text-center alerta'>Já existe uma placa de patrimônio registrada com esse digitos!</div>";
		return false;
		exit;	

}

$query_nota_fiscal = "SELECT nf_registro FROM registro_ativo WHERE nf_registro = '$nf_registro'";
$query_verificar = $patrimonio->prepare( $query_nota_fiscal );
$query_verificar->execute();
$rows = $query_verificar->rowCount();

if ( $rows > 0 ) {
		echo "<div class='alert alert-danger text-center alerta'>Já existe uma nota fiscal registrada com esse digitos!</div>";
		return false;
		exit;	

}
if(!$erro){
		move_uploaded_file($img_nota_fiscal_tmp, "$caminho_arquivo/$img_nota_fiscal");

		/*adiciona vircula no campo valor*/
		$valor2 = str_replace( ".", "", $_POST['txtvalor'] );
		$valor_novo = str_replace( ",", ".", $valor2 );

		$query_inserir = "INSERT INTO registro_ativo ( id_funcionario, id_descricao_padrao, id_departamento, id_status_ativo, id_condicao_ativo, id_categoria, placa_patrimonio, nome_produto, responsavel, departamento, descricao_padrao, descricao, condicao_ativo, data_aquisicao, hora_aquisicao, valor, categoria, status, nf_registro, img_nf_ativo) 
						  VALUES 
						  ( :id_funcionario, :id_descricao_padrao, :id_departamento, :id_status_ativo, :id_condicao_ativo, :id_categoria, :placa_patrimonio, :nome_produto, :responsavel, :departamento, :descricao_padrao, :descricao, :condicao_ativo, :data_aquisicao, :hora_aquisicao, :valor, :categoria, :status, :nf_registro, :img_nf_ativo)";
		$query_inseri = $patrimonio->prepare( $query_inserir );
		$query_inseri->bindValue( ':id_funcionario', $responsavel );
		//$query_inseri->bindValue( ':id_notafiscal', $id_notafiscal);
		$query_inseri->bindValue( ':id_descricao_padrao', $descricao_padrao );
		$query_inseri->bindValue( ':id_departamento', $departamento );
		$query_inseri->bindValue( ':id_status_ativo', $status );
		$query_inseri->bindValue( ':id_categoria', $categoria );
		$query_inseri->bindValue( ':id_condicao_ativo', $condicao_ativo );
		$query_inseri->bindValue( ':placa_patrimonio', $placa_patrimonio );
		$query_inseri->bindValue( ':nome_produto', $nome_produto );
		$query_inseri->bindValue( ':responsavel', $responsavel_novo);
		$query_inseri->bindValue( ':departamento', $departamento_novo );
		$query_inseri->bindValue( ':descricao_padrao', $descricao_padrao_novo );
		$query_inseri->bindValue( ':descricao', $descricao );
		$query_inseri->bindValue( ':condicao_ativo', $condicao_ativo_novo );
		$query_inseri->bindValue( ':data_aquisicao', $data1 );
		$query_inseri->bindValue( ':hora_aquisicao', $hora_aquisicao );
		$query_inseri->bindValue( ':valor', $valor_novo );
		$query_inseri->bindValue( ':categoria', $categoria_novo);
		$query_inseri->bindValue( ':status', $status_novo );
		$query_inseri->bindValue( ':nf_registro', $nf_registro );
		$query_inseri->bindValue( ':img_nf_ativo', $img_nota_fiscal );
		$query_inseri->execute();

		$id = $patrimonio->lastInsertId();

		$query_nota = "INSERT INTO nota_fiscal ( id_patrimonio, nf_ativo, img_nf_ativo) VALUES ( :id_patrimonio, :nf_ativo, :img_nf_ativo)";

		$query_nota_fiscal = $patrimonio->prepare( $query_nota );
		$query_nota_fiscal->bindValue( ':id_patrimonio', $id );
		$query_nota_fiscal->bindValue( ':nf_ativo', $nf_registro );
		$query_nota_fiscal->bindValue( ':img_nf_ativo', $img_nota_fiscal );
		$query_nota_fiscal->execute();

		$query_quantidade_grafico = $patrimonio->prepare('INSERT INTO quantidade_por_ativo (id_patrimonio, departamento_nome, departamento) VALUES (:id_patrimonio, :departamento_nome, :departamento)');
		$query_quantidade_grafico->execute(array(
			':id_patrimonio' => $id,
			':departamento_nome' => $departamento_novo,
			':departamento' => $departamento
		));
		
		echo "<div class='alert alert-success text-center alerta'>Ativo cadastrado com sucesso!</div>";
		return true;
	
	}else {
		echo "<div class='alert alert-info text-center alerta'>Desculpe, o sistema caiu. Por favor, volte e tente novamente.</div>";
		return false;
		exit;
}
?>