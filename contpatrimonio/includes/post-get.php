<?php
/*Converte as id em seus respectivos significados*/
error_reporting(0);

$categoria_novo = $categoria;
	 //$categoria_novo = '';
	if($categoria_novo == '1'){ $categoria_novo = "Móvies e Utensílios"; }
	else if($categoria_novo  == '2'){ $categoria_novo = "Equipamentos de Informática"; }
	else if($categoria_novo  == '3'){ $categoria_novo = "Eletrotomésticos"; }

$condicao_ativo_novo = $condicao_ativo;
	if($condicao_ativo_novo == '1'){ $condicao_ativo_novo = "Excelente"; }
	else if($condicao_ativo_novo  == '2'){ $condicao_ativo_novo = "Normal"; }
	else if($condicao_ativo_novo  == '3'){ $condicao_ativo_novo = "Regular"; }
	else if($condicao_ativo_novo  == '4'){ $condicao_ativo_novo = "Péssima"; }

$status_novo = $status;
	if($status_novo == '1'){ $status_novo = "E"; }
	else if($status_novo  == '2'){ $status_novo = "B"; }
	else if($status_novo  == '3'){ $status_novo = "M"; }
	else if($status_novo  == '4'){ $status_novo = "P"; }

$descricao_padrao_novo = $descricao_padrao;
    if($descricao_padrao_novo  == '1'){ $descricao_padrao_novo = "Telefone"; }
	else if($descricao_padrao_novo  == '2'){ $descricao_padrao_novo  = "Monitor de Vídeo"; }
	else if($descricao_padrao_novo  == '3'){ $descricao_padrao_novo  = "Armario"; }
	else if($descricao_padrao_novo  == '4'){ $descricao_padrao_novo  = "Geladeira"; }
	else if($descricao_padrao_novo  == '5'){ $descricao_padrao_novo  = "Ar condicionado"; }
	else if($descricao_padrao_novo  == '6'){ $descricao_padrao_novo  = "ventilador"; }
	else if($descricao_padrao_novo  == '7'){ $descricao_padrao_novo  = "Cadeira"; }
	else if($descricao_padrao_novo  == '8'){ $descricao_padrao_novo  = "Mesa"; }
	else if($descricao_padrao_novo  == '9'){ $descricao_padrao_novo  = "Teclado"; }
	else if($descricao_padrao_novo  == '10'){ $descricao_padrao_novo = "CPU"; }
	else if($descricao_padrao_novo  == '11'){ $descricao_padrao_novo = "Mouse"; }
	else if($descricao_padrao_novo  == '12'){ $descricao_padrao_novo = "Notebook"; }
	else if($descricao_padrao_novo  == '13'){ $descricao_padrao_novo = "Impressora"; }
	else if($descricao_padrao_novo  == '14'){ $descricao_padrao_novo = "Microondas"; }
	else if($descricao_padrao_novo  == '15'){ $descricao_padrao_novo = "TV"; }

$departamento_novo = $departamento;
	if($departamento_novo == '1'){ $departamento_novo = "Copa"; }
	else if($departamento_novo  == '2'){ $departamento_novo  = "Limpeza"; }
	else if($departamento_novo  == '3'){ $departamento_novo  = "Suporte"; }
	else if($departamento_novo  == '4'){ $departamento_novo  = "Recursos Humano"; }
	else if($departamento_novo  == '5'){ $departamento_novo  = "Desenvolvimento Web"; }
	else if($departamento_novo  == '6'){ $departamento_novo  = "Desenvolvimento App"; }
	else if($departamento_novo  == '7'){ $departamento_novo  = "Financeiro"; }
	else if($departamento_novo  == '8'){ $departamento_novo  = "Setor Operecional"; }
	else if($departamento_novo  == '9'){  $departamento_novo = "SAC"; }
	else if($departamento_novo  == '10'){ $departamento_novo = "Criação e Mídia"; }
	else if($departamento_novo  == '11'){ $departamento_novo = "Diretoria"; }
	else if($departamento_novo  == '12'){ $departamento_novo = "Recepção"; }
	else if($departamento_novo  == '13'){ $departamento_novo = "Infraestrutura de TI"; }
	else if($departamento_novo  == '14'){ $departamento_novo = "Espedição"; }
	else if($departamento_novo  == '15'){ $departamento_novo = "Telemarketing"; }

$responsavel_novo = $responsavel;
	if($responsavel_novo == '1'){ $responsavel_novo = "Kaleb Pignaton"; }
	else if($responsavel_novo  == '2'){ $responsavel_novo  = "André Santos"; }
	else if($responsavel_novo  == '3'){ $responsavel_novo  = "Sabrina Elias"; }
	else if($responsavel_novo  == '4'){ $responsavel_novo  = "Daniela Oliveira"; }
	else if($responsavel_novo  == '5'){ $responsavel_novo  = "Adriano Lopez"; }
	else if($responsavel_novo  == '6'){ $responsavel_novo  = "André Portella"; }
	else if($responsavel_novo  == '7'){ $responsavel_novo  = "Glaucia Villa"; }
	else if($responsavel_novo  == '8'){ $responsavel_novo  = "Rodrigo Cesar"; }
	else if($responsavel_novo  == '9'){ $responsavel_novo  = "Tainan Paiva"; }
	else if($responsavel_novo  == '10'){ $responsavel_novo = "Stefany Costa"; }
	else if($responsavel_novo  == '11'){ $responsavel_novo = "Cleidson Sousa"; }
	else if($responsavel_novo  == '12'){ $responsavel_novo = "Daniela Xavier"; }
	else if($responsavel_novo  == '13'){ $responsavel_novo = "Luciana de Góes"; }
	else if($responsavel_novo  == '14'){ $responsavel_novo = "Matheus Wesley"; }
	else if($responsavel_novo  == '15'){ $responsavel_novo = "Paulo Ricardo"; }
	else if($responsavel_novo  == '16'){ $responsavel_novo = "Edivan Fontes"; }
	else if($responsavel_novo  == '21'){ $responsavel_novo = "Lucas Ferreira"; }
	else if($responsavel_novo  == '20'){ $responsavel_novo = "Teste teste"; }
	else if($responsavel_novo  == '22'){ $responsavel_novo = "Marcios Silva"; }
	else if($responsavel_novo  == '23'){ $responsavel_novo = "Izabel Araujo"; }
	else if($responsavel_novo  == '25'){ $responsavel_novo = "Caio Jaime"; }
?>