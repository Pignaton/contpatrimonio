<?php 

$funcionario = $_SESSION[ 'id_funcionario' ];

$query_logar = "SELECT * FROM usuario WHERE id_funcionario = '$funcionario' AND ativo NOT IN ('0')";
$query_login = $patrimonio->prepare( $query_logar );
$query_login->execute();
$row = $query_login->rowCount();

if ( $row == 1 ) {

	while ( $usuario_existe = $query_login->fetch( PDO::FETCH_ASSOC ) ) {
		$usuario_ativo = $_SESSION[ 'ativo' ] = $usuario_existe[ 'ativo' ];
		$usuario_email = $_SESSION[ 'email' ] = $usuario_existe[ 'email' ];
		$usuario_login = $_SESSION['login'] = $usuario_existe['login'];
		$usuario_nome = $_SESSION[ 'nome' ] = $usuario_existe[ 'nome' ];
		$usuario_departamento = $_SESSION[ 'departamento' ] = $usuario_existe[ 'departamento' ];
		$usuario_senha = $_SESSION[ 'senha' ] = $usuario_existe[ 'senha' ];
		$usuario_id = $_SESSION[ 'id_funcionario' ] = $usuario_existe[ 'id_funcionario' ];
		$usuario_trocasenha = $_SESSION[ 'trocasenha' ] = $usuario_existe[ 'trocasenha' ];
		$usuario_nivel = $_SESSION[ 'nivel' ] = $usuario_existe[ 'nivel' ];

	}
}
$nivel = $usuario_nivel;
	if($nivel == '1'){ $nivel = "Adiministrador"; }
	else if($nivel  == '0'){$nivel = "Usuário"; }

?>