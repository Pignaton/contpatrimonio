/*$limitar_ext = "sim";
$tipo_foto = array( ".jpeg", ".jpg", ".png", ".gif" );
$caminho_arquivo = "../img_nota_fiscal/";
$sobreescrever = "nao";
set_time_limit( 0 );
$erro = FALSE;

$Data_do_banco = $data_aquisicao;
$Nova_Data_do_Banco = DateTime::createFromFormat( 'Y-m-d', $Data_do_banco );
$data1 = $Nova_Data_do_Banco->format( 'Y-m-d' );

/*if ( $_FILES[ "txtimgfiscal" ][ "error" ] == UPLOAD_ERR_OK ) {
	$img_nota_fiscal = $_FILES[ "txtimgfiscal" ][ "name" ];
	$img_nota_fiscal_tmp = $_FILES[ "txtimgfiscal" ][ "tmp_name" ];
	$img_nota_fiscal_size = $_FILES[ "txtimgfiscal" ][ "size" ];

	if ( $sobreescrever == "nao" && file_exists( "$caminho_arquivo/$img_nota_fiscal" ) ) {
		$erro = TRUE;
		/*$_SESSION[ 'msg' ] = "
			<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<p class='mb-1 text-white' align='center'>Arquivo $img_nota_fiscal já existe! renomeei o arquivo.</p>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
	</div>";
		echo 'erro';
		//header( 'Location: ../cadastro_ativo.php' );
	}
	$ext = strrchr( $img_nota_fiscal, '.' );
	if ( $limitar_ext == "sim" && !in_array( $ext, $tipo_foto ) ) {
		$erro = TRUE;
		/*$_SESSION[ 'msg' ] = "
			<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<p align='center' class='mb-1 text-white'> $img_nota_fiscal é uma extençao de arquivo inválida para upload.</p>				
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
	</div>";
		echo 'erro';
		//header( 'Location: ../cadastro_ativo.php' );

	}
}*/
