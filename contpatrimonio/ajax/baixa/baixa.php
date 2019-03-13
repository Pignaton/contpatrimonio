<?php
header('Content-Type: text/html; charset=latin1');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../../../_conn/conn.php");
session_start();

date_default_timezone_set( 'America/Sao_Paulo' );
$hora_aquisicao = date( 'H:i:s' );
$data_baixa = date('Y-m-d');
//if ( isset( $_POST['btnAtualizar'] )) {

$id_patrimonio = $_POST['txtbapatrimonio'];
$nome_produto = $_POST['txtbanome'];
$placa_patrimonio = $_POST['txtbaplacapatrimonio'];
$responsavel = $_POST['txtbaresponsavel'];
$descricao = $_POST['txtbadescricaomotivo'];
$data_aquisicao = $_POST['txtbadata'];
$valor = $_POST['txtbavalor'];
$nf_registro = $_POST['txtbanotafiscal'];
$imginotafiscal = $_POST['txtbaimgfiscal'];
$valor_antigo = $_POST['txtbavalorantigo'];
/*if ( $_FILES[ "txtbaimgfiscal" ][ "error" ] == UPLOAD_ERR_OK ) {
$imginotafiscal = $_FILES[ "txtbaimgfiscal" ][ "name" ];
$imginotafiscal_tmp = $_FILES[ "txtbaimgfiscal" ][ "tmp_name" ];
$imginotafiscal_size = $_FILES[ "txtbaimgfiscal" ][ "size" ];
}*/
$responsavel_novo = $responsavel;
	if($responsavel_novo == '1'){ $responsavel_novo = "Kaleb Pignaton"; }
	else if($responsavel_novo  == '2'){ $responsavel_novo = "Andre Santos"; }

		/*adiciona vircula no campo valor*/
if(!empty($valor != $valor_antigo)){
		$valor = str_replace( ".", "", $valor );
		$valor = str_replace( ",", ".", $valor );
}
try{	
$query_inseri = "INSERT INTO registro_baixa (id_patrimonio, id_funcionario, placa_patrimonio, data_baixa, hora_baixa, data_aquisicao, motivo_baixa, nome_produto, nome_usuario, responsavel, valor_baixa, nf_baixa, img_nf_baixa) VALUES (:id_patrimonio, :id_funcionario, :placa_patrimonio, :data_baixa, :hora_baixa, :data_aquisicao, :motivo_baixa, :nome_produto, :nome_usuario, :responsavel, :valor_baixa, :nf_baixa, :img_nf_baixa)";
$query_inserir = $patrimonio->prepare($query_inseri);

		$query_inserir->bindValue( ':id_patrimonio', $id_patrimonio  );
		$query_inserir->bindValue( ':id_funcionario', $responsavel);
		$query_inserir->bindValue( ':placa_patrimonio', $placa_patrimonio);
		$query_inserir->bindValue( ':data_baixa', $data_baixa);
		$query_inserir->bindValue( ':hora_baixa', $hora_aquisicao);
		$query_inserir->bindValue( ':data_aquisicao', $data_aquisicao );
		$query_inserir->bindValue( ':motivo_baixa', $descricao );
		$query_inserir->bindValue( ':nome_produto', $nome_produto );
		$query_inserir->bindValue( ':responsavel', $responsavel_novo);
	    $query_inserir->bindValue( ':nome_usuario', $_SESSION['nome']);
		$query_inserir->bindValue( ':valor_baixa', $valor );
		$query_inserir->bindValue( ':nf_baixa', $nf_registro);
		$query_inserir->bindValue( ':img_nf_baixa', $imginotafiscal);
$query_inserir->execute();

$id = $patrimonio->lastInsertId();

		$query_nota = "INSERT INTO nota_fiscal ( id_patrimonio, nf_baixa, img_nf_baixa) VALUE ( :id_patrimonio, :nf_baixa, :img_nf_baixa)";

		$query_nota_fiscal = $patrimonio->prepare( $query_nota );
		$query_nota_fiscal->bindValue( ':id_patrimonio', $id_patrimonio );
		$query_nota_fiscal->bindValue( ':nf_baixa', $nf_registro );
		$query_nota_fiscal->bindValue( ':img_nf_baixa', $imginotafiscal );
		$query_nota_fiscal->execute();

$query_deleta = "DELETE FROM registro_ativo WHERE id_patrimonio = $id_patrimonio";
$query_deletar = $patrimonio->prepare($query_deleta);
$query_deletar->execute();

	
	    require '../../PHPMailer/PHPMailer/src/Exception.php';
        require '../../PHPMailer/PHPMailer/src/PHPMailer.php';
        require '../../PHPMailer/PHPMailer/src/SMTP.php';
		
        $mail = new PHPMailer(); 
		//$mail->SMTPDebug = 1;
		//$mail->Debugoutput = 'html';
		//$mail->setLanguage('pt');
		$mail->CharSet = 'utf8mb4';
		$mail->isSMTP();
		$mail->Host = 'mail.onlinemania.com.br';
		$mail->SMTPAuth = true; 
		$mail->Port = 587; // ou 25
		$mail->SMTPAuth = false;  	
		$mail->SMTPAutoTLS = false;
		$mail->Username = 'nao-responder@onlinemania.com.br';
		$mail->Password = '#GoodShop611';
                                 
		$mail->setFrom('nao-responder@onlinemania.com.br','Baixa em ativo');
        $mail->AddAddress('kaleb.pignaton@anexxa.com.br','Baixa em ativo');
                        
        $mail->IsHTML(true);
        $mail->Subject = 'Baixa em ativo';
        $mail->Body = '<div style="background-color:#E6E6E6; border-radius:5px; font-size: 13px;" align="center">
                             <h3 align="center" style="background-color:#848484; border-radius:5px; padding:25px 25px 25px 25px; color:#FFFFFF; font-size: 20px;">Anexxa Report </h3>
                             <p align="center"><b>Foi efetuato uma baixa.</b></p>
							 <h4><b>Informaç&atilde;o</b></h4>
							<ul style="text-align: justify;">
							 <li>Usuário:'.$_SESSION['nome'].'</li>
							 <li>Dia:    '.$data_baixa.'</li>
	 						 <li>Hora:   '.$hora_aquisicao.'</li>
							 <li>Placa:  '.$placa_patrimonio.'</li>
							</ul>
                             <hr>
							 <p>Caso haja alguma irregularidade, entre em contato com a equipe de desenvolvimento.</p>
                         </div>';
       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
                echo 'Nao foi possível enviar a mensagem.<br>';
                echo 'Erro: ' . $mail->ErrorInfo;
            } else {
				//echo "success";
				echo "<div class='alert alert-success text-center' role='alert'>Patrimônio despachado para baixa!</div>";
				return true;
                //echo '<p class="alert alert-success text-white rounded" align="center">Link de recuperaçao de senha foi enviado para seu email</p>';
           }
		exit;

	} catch ( PDOExcepiton $e ) {
		//echo 'Error: ' . $e->getMessage();
		echo "<div class='alert alert-info text-center'>Desculpe, ocorreu um problema. Por favor, volte e tente novamente.</div>";
	}
//}

?>