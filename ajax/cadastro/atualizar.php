<?php
//error_reporting(0);
header('Content-Type: text/html; charset=utf8mb4');
include( "../../../_conn/conn.php" );

session_start(); 

$placa_patrimonio_antigo = $_POST[ 'txtvspatrimonioantigo' ];
$valor_antigo = $_POST[ 'txtvalor_antigo' ];
$nf_registro_antigo = $_POST['txtnotafiscalantigo'];
date_default_timezone_set( 'America/Sao_Paulo' );
$hora_aquisicao = date( 'H:i:s' );
//if ( isset( $_POST['btnAtualizar'] )) {
$id_patrimonio = $_POST[ 'txtpatrimonio' ];
$nome_produto = $_POST[ 'txtvsnome' ];
$placa_patrimonio = $_POST[ 'txtvscodigo' ];
$responsavel = $_POST[ 'txtvsresponsavel' ];
$departamento = $_POST[ 'txtvsdepartamento' ];
$descricao = $_POST[ 'txtvsdescricao' ];
$descricao_padrao = $_POST[ 'txtvsdescricaopadrao' ];
$data_aquisicao = $_POST[ 'txtvsdata' ];
$valor = $_POST[ 'txtvsvalor' ];
$categoria = $_POST[ 'txtvscategoria' ];
$status = $_POST[ 'txtvsstatus' ];
$condicao_ativo = $_POST[ 'txtvscondicao' ];
$nf_registro = $_POST[ 'txtvsnotafiscal' ];
$imgnotafiscal = $_POST[ 'txtvsimgnotafiscal' ];

include( '../../includes/post-get.php' );

$limitar_ext = "sim";
$tipo_foto = array( ".pdf");
$caminho_arquivo = "../img_nota_fiscal/";
$caminho_arquivo2 = "../img_nota_fiscal/img_fora/";
$sobreescrever = "nao";
set_time_limit( 0 );
$erro = FALSE;

if ( !empty( $_FILES[ "txtimgfiscal2" ]) ) 
{
	if ( $_FILES[ "txtimgfiscal2" ][ "error" ] == UPLOAD_ERR_OK ) 
	{
		$img_nota_fiscal = $_FILES[ "txtimgfiscal2" ][ "name" ];
		$img_nota_fiscal_tmp = $_FILES[ "txtimgfiscal2" ][ "tmp_name" ];
		$img_nota_fiscal_size = $_FILES[ "txtimgfiscal2" ][ "size" ];

		if ( $sobreescrever == "nao" && file_exists( "$caminho_arquivo/$img_nota_fiscal" ) ) 
		{
			echo "<div class='alert alert-danger text-center'>Arquivo ' $img_nota_fiscal' já existe! renomeei o arquivo.<div>";
			return false;
			exit;	
		}
		$ext = strrchr( $img_nota_fiscal, '.' );
		if ( $limitar_ext == "sim" && !in_array( $ext, $tipo_foto ) ) 
		{
			echo "<div class='alert alert-danger text-center'>$img_nota_fiscal' não é uma extençao de arquivo .pdf<div>";
			return false;
			exit;

		}
	}
}
$Data_do_banco = $data_aquisicao;
$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
$data1 = $Nova_Data_do_Banco->format( 'Y-m-d' );

if ( $placa_patrimonio != $placa_patrimonio_antigo ) 
{
	$query_patrimonio = "SELECT placa_patrimonio FROM registro_ativo WHERE placa_patrimonio = '$placa_patrimonio'";
	$query_verificar = $patrimonio->prepare( $query_patrimonio );
	$query_verificar->execute();
	$rows = $query_verificar->rowCount();

	if ( $rows > 0 ) 
	{
		echo "<div class='alert alert-danger text-center'>Já existe uma placa de patrimônio registrada com esse digitos!<div>";
		return false;
		exit;	
	}
}

if($nf_registro != $nf_registro_antigo)
{
	$query_nota_fiscal = "SELECT nf_registro FROM registro_ativo WHERE nf_registro = '$nf_registro'";
	$query_verificar = $patrimonio->prepare( $query_nota_fiscal );
	$query_verificar->execute();
	$rows = $query_verificar->rowCount();

	if ( $rows > 0 ) 
	{
		echo "<div class='alert alert-danger text-center'>Já existe uma nota fiscal registrada com esse digitos!<div>";
		return false;
		exit;	
	}
}

if ( !$erro ) 
{
	try 
	{

		if ( !empty($img_nota_fiscal) ) 
		{

			if($valor != $valor_antigo)
			{
				echo "entrou";
				$valor_novo = str_replace( ".", "", $valor );
				$valor = str_replace( ",", ".", $valor_novo );
			}

			/*$delcheck = "UPDATE registro_ativo SET img_nf_ativo = '$img_nota_fiscal' WHERE img_nf_ativo <> '$img_nota_fiscal' AND id_patrimonio = $id_patrimonio"; 
			$delcheck1 = $patrimonio->prepare( $delcheck );
			$delcheck1->execute();*/

			move_uploaded_file( $img_nota_fiscal_tmp, "$caminho_arquivo/$img_nota_fiscal" );

   			$query_inserir = "UPDATE registro_ativo SET 
							   id_funcionario = :id_funcionario,
							   id_descricao_padrao = :id_descricao_padrao,
							   id_departamento = :id_departamento,
							   id_status_ativo = :id_status_ativo,
							   id_categoria = :id_categoria,
							   id_condicao_ativo = :id_condicao_ativo,
							   placa_patrimonio = :placa_patrimonio,
							   nome_produto = :nome_produto,
							   responsavel = :responsavel,
							   departamento = :departamento,
							   descricao_padrao = :descricao_padrao,
							   descricao = :descricao,
							   condicao_ativo = :condicao_ativo,
							   data_aquisicao = :data_aquisicao,
							   hora_aquisicao = :hora_aquisicao,
							   valor = :valor,
							   categoria = :categoria,
							   status = :status,
							   nf_registro = :nf_registro,
							   img_nf_ativo = :img_nf_ativo
							   WHERE id_patrimonio = $id_patrimonio";

			$query_atualiza = $patrimonio->prepare( $query_inserir );
			$query_atualiza->bindValue( ':id_funcionario', $responsavel );
			//$query_inseri->bindValue( ':id_notafiscal', $id_notafiscal);
			$query_atualiza->bindValue( ':id_descricao_padrao', $descricao_padrao );
			$query_atualiza->bindValue( ':id_departamento', $departamento );
			$query_atualiza->bindValue( ':id_status_ativo', $status );
			$query_atualiza->bindValue( ':id_categoria', $categoria );
			$query_atualiza->bindValue( ':id_condicao_ativo', $condicao_ativo );
			$query_atualiza->bindValue( ':placa_patrimonio', $placa_patrimonio );
			$query_atualiza->bindValue( ':nome_produto', $nome_produto );
			$query_atualiza->bindValue( ':responsavel', $responsavel_novo );
			$query_atualiza->bindValue( ':departamento', $departamento_novo );
			$query_atualiza->bindValue( ':descricao_padrao', $descricao_padrao_novo );
			$query_atualiza->bindValue( ':descricao', $descricao );
			$query_atualiza->bindValue( ':condicao_ativo', $condicao_ativo_novo );
			$query_atualiza->bindValue( ':data_aquisicao', $data1 );
			$query_atualiza->bindValue( ':hora_aquisicao', $hora_aquisicao );
			$query_atualiza->bindValue( ':valor', $valor );
			$query_atualiza->bindValue( ':categoria', $categoria_novo );
			$query_atualiza->bindValue( ':status', $status_novo );
			$query_atualiza->bindValue( ':nf_registro', $nf_registro );
			$query_atualiza->bindValue( ':img_nf_ativo', $img_nota_fiscal );
			$query_atualiza->execute();

			//$id = $patrimonio->lastInsertId();

			$query_nota = "UPDATE nota_fiscal SET  nf_ativo = :nf_ativo, img_nf_ativo = :img_nf_ativo WHERE id_patrimonio = $id_patrimonio";

			$query_nota_fiscal = $patrimonio->prepare( $query_nota );
			//$query_nota_fiscal->bindValue( ':id_patrimonio', $id_patrimonio );
			$query_nota_fiscal->bindValue( ':nf_ativo', $nf_registro );
			$query_nota_fiscal->bindValue( ':img_nf_ativo', $img_nota_fiscal );
			$query_nota_fiscal->execute();

			$query_img = "INSERT INTO img_fora (data, hora, responsavel, img) VALUES (:data, :hora, :responsavel, :img)";

			$query_imgs = $patrimonio->prepare( $query_img );
			$query_imgs->bindValue( ':data', $data1 );
			$query_imgs->bindValue( ':hora', $hora_aquisicao );
			$query_imgs->bindValue( ':responsavel', $responsavel_novo );
			$query_imgs->bindValue( ':img', $img_nota_fiscal );
			$query_imgs->execute();
 			copy($caminho_arquivo.$imgnotafiscal, $caminho_arquivo2.$imgnotafiscal);
			//move_uploaded_file( $img_nota_fiscal_tmp, "$caminho_arquivo2/$imgnotafiscal" );

			unlink($caminho_arquivo.$imgnotafiscal);

			echo "<div class='alert alert-success text-center pt-2'>Ativo atualizado com  sucesso!<div>";
			return true;
			exit;
			
		} 
		else 
		{

			if($valor != $valor_antigo)
			{
				echo "entrou";
				$valor = str_replace( ".", "", $valor );
				$valor = str_replace( ",", ".", $valor );
			}

	   		$query_inserir = "UPDATE registro_ativo SET 
							   id_funcionario = :id_funcionario,
							   id_descricao_padrao = :id_descricao_padrao,
							   id_departamento = :id_departamento,
							   id_status_ativo = :id_status_ativo,
							   id_categoria = :id_categoria,
							   id_condicao_ativo = :id_condicao_ativo,
							   placa_patrimonio = :placa_patrimonio,
							   nome_produto = :nome_produto,
							   responsavel = :responsavel,
							   departamento = :departamento,
							   descricao_padrao = :descricao_padrao,
							   descricao = :descricao,
							   condicao_ativo = :condicao_ativo,
							   data_aquisicao = :data_aquisicao,
							   hora_aquisicao = :hora_aquisicao,
							   valor = :valor,
							   categoria = :categoria,
							   status = :status,
							   nf_registro = :nf_registro
							   WHERE id_patrimonio = $id_patrimonio";

			$query_atualiza = $patrimonio->prepare( $query_inserir );
			$query_atualiza->bindValue( ':id_funcionario', $responsavel );
			//$query_inseri->bindValue( ':id_notafiscal', $id_notafiscal);
			$query_atualiza->bindValue( ':id_descricao_padrao', $descricao_padrao );
			$query_atualiza->bindValue( ':id_departamento', $departamento );
			$query_atualiza->bindValue( ':id_status_ativo', $status );
			$query_atualiza->bindValue( ':id_categoria', $categoria );
			$query_atualiza->bindValue( ':id_condicao_ativo', $condicao_ativo );
			$query_atualiza->bindValue( ':placa_patrimonio', $placa_patrimonio );
			$query_atualiza->bindValue( ':nome_produto', $nome_produto );
			$query_atualiza->bindValue( ':responsavel', $responsavel_novo );
			$query_atualiza->bindValue( ':departamento', $departamento_novo );
			$query_atualiza->bindValue( ':descricao_padrao', $descricao_padrao_novo );
			$query_atualiza->bindValue( ':descricao', $descricao );
			$query_atualiza->bindValue( ':condicao_ativo', $condicao_ativo_novo );
			$query_atualiza->bindValue( ':data_aquisicao', $data1 );
			$query_atualiza->bindValue( ':hora_aquisicao', $hora_aquisicao );
			$query_atualiza->bindValue( ':valor', $valor );
			$query_atualiza->bindValue( ':categoria', $categoria_novo );
			$query_atualiza->bindValue( ':status', $status_novo );
			$query_atualiza->bindValue( ':nf_registro', $nf_registro );
			//$query_atualiza->bindValue( ':img_nf_ativo', $img_nota_fiscal );
			$query_atualiza->execute();

			$query_nota = "UPDATE nota_fiscal SET id_patrimonio = :id_patrimonio, nf_ativo = :nf_ativo WHERE id_patrimonio = :id_patrimonio";

			$query_nota_fiscal = $patrimonio->prepare( $query_nota );
			$query_nota_fiscal->bindValue( ':id_patrimonio', $id_patrimonio );
			$query_nota_fiscal->bindValue( ':nf_ativo', $nf_registro );
			$query_nota_fiscal->bindValue( ':id_patrimonio', $id_patrimonio );
			//$query_nota_fiscal->bindValue( ':img_nf_ativo', $img_nota_fiscal );
			$query_nota_fiscal->execute();

			echo "<div class='alert alert-success text-center'>Ativo atualizado com  sucesso!<div>";
			return true;
			exit;
		}
	} 
	catch ( PDOExcepiton $e ) 
	{
		echo "<div class='alert alert-info text-center'>Desculpe, ocorreu um erro. Por favor, volte e tente novamente.</div>";
		return false;
		exit;
		//echo 'Error: ' . $e->getMessage();
	}
}
//}
//}
?>