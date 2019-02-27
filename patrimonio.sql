-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Fev-2019 às 16:48
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patrimonio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Móvies e Utensílios'),
(2, 'Equipamentos de Informática'),
(3, 'Eletrotomésticos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicao_ativo`
--

DROP TABLE IF EXISTS `condicao_ativo`;
CREATE TABLE IF NOT EXISTS `condicao_ativo` (
  `id_condicao_ativo` int(11) NOT NULL AUTO_INCREMENT,
  `condicao_ativo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_condicao_ativo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `condicao_ativo`
--

INSERT INTO `condicao_ativo` (`id_condicao_ativo`, `condicao_ativo`) VALUES
(1, 'Excelente'),
(2, 'Normal'),
(3, 'Regular'),
(4, 'Péssima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento`) VALUES
(1, 'Copa'),
(2, 'Limpeza'),
(3, 'Suporte'),
(4, 'Recurso Humano'),
(5, 'Desenvolvimento Web'),
(6, 'Desenvolvimento App'),
(7, 'Financeiro'),
(8, 'Setor Operacional'),
(9, 'SAC'),
(10, 'Criação e Mídia'),
(11, 'Diretoria'),
(12, 'Recepção'),
(13, 'Infraestrutura de TI'),
(14, 'Espedição'),
(15, 'Presidente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao_padrao`
--

DROP TABLE IF EXISTS `descricao_padrao`;
CREATE TABLE IF NOT EXISTS `descricao_padrao` (
  `id_descricao_padrao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_padrao` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_descricao_padrao`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `descricao_padrao`
--

INSERT INTO `descricao_padrao` (`id_descricao_padrao`, `descricao_padrao`) VALUES
(1, 'Telefone'),
(2, 'Monitor de Vídeo'),
(3, 'Armario'),
(4, 'Geladeira'),
(5, 'Ar condicionado'),
(6, 'ventilador'),
(7, 'Cadeira'),
(8, 'Mesa'),
(9, 'Teclado'),
(10, 'CPU'),
(11, 'Mouse'),
(12, 'Notebook'),
(13, 'Impressora'),
(14, 'Microondas'),
(15, 'TV'),
(16, 'Cafeteira Industrial'),
(17, 'Roteador Wirelles');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_fora`
--

DROP TABLE IF EXISTS `img_fora`;
CREATE TABLE IF NOT EXISTS `img_fora` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `responsavel` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `img_fora`
--

INSERT INTO `img_fora` (`id_img`, `data`, `hora`, `responsavel`, `img`) VALUES
(1, '2019-05-04', '10:32:57', 'Kaleb Pignaton', 'nota_devolucao.pdf'),
(2, '2019-05-04', '10:34:18', 'Kaleb Pignaton', 'teste2.pdf'),
(10, '2019-05-04', '10:51:57', 'Kaleb Pignaton', 'teste2.pdf'),
(11, '2019-05-04', '10:52:05', 'Kaleb Pignaton', 'teste.pdf'),
(8, '2019-05-04', '10:47:45', 'Kaleb Pignaton', 'teste2.pdf'),
(9, '2019-05-04', '10:48:00', 'Kaleb Pignaton', 'teste.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nome`) VALUES
(1, 'Adiministrador'),
(2, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
CREATE TABLE IF NOT EXISTS `nota_fiscal` (
  `id_nota_fiscal` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `nf_manutencao` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `img_nf_manutencao` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nf_baixa` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `img_nf_baixa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nf_ativo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `img_nf_ativo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nota_fiscal`),
  KEY `fk_id_patrimonio` (`id_patrimonio`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id_nota_fiscal`, `id_patrimonio`, `nf_manutencao`, `img_nf_manutencao`, `nf_baixa`, `img_nf_baixa`, `nf_ativo`, `img_nf_ativo`) VALUES
(64, 71, NULL, NULL, NULL, NULL, '000.000.456', 'danfe23.png'),
(65, 72, NULL, NULL, NULL, NULL, '7867', 'nota_devolucao.png'),
(66, 73, NULL, NULL, NULL, NULL, '546547567567567', 'download.jpg'),
(67, 74, NULL, NULL, NULL, NULL, '67567567', 'danfe2.png'),
(68, 75, NULL, NULL, NULL, NULL, '2353657678', 'danfe23we.png'),
(69, 76, NULL, NULL, NULL, NULL, '678978089-', 'danfe.png'),
(70, 77, NULL, NULL, NULL, NULL, '78679', 'notafiscal.png'),
(71, 78, NULL, NULL, NULL, NULL, '8789089-90-', 'nota_devolucao.png'),
(72, 79, NULL, NULL, NULL, NULL, '67978089-90', 'danfe23we.png'),
(73, 80, NULL, NULL, NULL, NULL, '6786787689', 'danfe.png'),
(74, 81, NULL, NULL, NULL, NULL, '6547568678', 'danfe23.png'),
(75, 82, NULL, NULL, NULL, NULL, '65467576', 'danfe2.png'),
(76, 83, NULL, NULL, NULL, NULL, '78679789', 'download.jpg'),
(77, 84, NULL, NULL, NULL, NULL, '56457567', 'danfe23we.png'),
(78, 85, NULL, NULL, NULL, NULL, '45756768', 'danfe2.png'),
(79, 88, NULL, NULL, NULL, NULL, '000.000.460', 'download.jpg'),
(80, 89, NULL, NULL, NULL, NULL, '000.000.461', 'download.jpg'),
(81, 90, NULL, NULL, NULL, NULL, '000.000.462', 'nota_devolucao.png'),
(82, 87, NULL, NULL, '000.000.459', 'danfe.png', NULL, NULL),
(63, 86, NULL, NULL, NULL, NULL, '000.000.452', 'teste.pdf'),
(87, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(88, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(89, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(90, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(91, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(92, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(93, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(94, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(95, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(96, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(97, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(98, 73, '000.000.456', 'danfe23we.pdf', NULL, NULL, '546547567567567', NULL),
(99, 90, '988.025.453', 'teste.pdf', NULL, NULL, '000.000.462', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_acesso`
--

DROP TABLE IF EXISTS `pagina_acesso`;
CREATE TABLE IF NOT EXISTS `pagina_acesso` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` int(11) NOT NULL,
  `dashboard` char(1) NOT NULL DEFAULT '1',
  `cadastro_ativo` char(1) NOT NULL DEFAULT '1',
  `tabela_manutencao` char(1) NOT NULL DEFAULT '1',
  `tabela_baixa` char(1) NOT NULL DEFAULT '1',
  `acesso` char(1) NOT NULL DEFAULT '1',
  `registra_manutencao` char(1) CHARACTER SET utf8mb4 NOT NULL DEFAULT '1',
  `backup` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pagina`),
  KEY `funcionario` (`funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagina_acesso`
--

INSERT INTO `pagina_acesso` (`id_pagina`, `funcionario`, `dashboard`, `cadastro_ativo`, `tabela_manutencao`, `tabela_baixa`, `acesso`, `registra_manutencao`, `backup`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1'),
(2, 2, '1', '1', '1', '1', '0', '1', '0'),
(3, 3, '1', '1', '1', '1', '0', '1', '0'),
(4, 4, '1', '1', '1', '1', '0', '1', '0'),
(5, 5, '1', '1', '1', '1', '1', '1', '1'),
(6, 6, '1', '1', '1', '1', '0', '1', '0'),
(7, 7, '1', '1', '1', '1', '0', '1', '0'),
(8, 8, '1', '1', '1', '1', '0', '1', '0'),
(9, 9, '1', '1', '1', '1', '0', '1', '0'),
(10, 10, '1', '1', '1', '1', '0', '1', '0'),
(11, 11, '1', '1', '1', '1', '0', '1', '0'),
(12, 12, '1', '1', '1', '1', '0', '1', '0'),
(13, 13, '1', '1', '1', '1', '0', '1', '0'),
(14, 14, '1', '1', '1', '1', '0', '1', '0'),
(15, 15, '1', '1', '1', '1', '0', '1', '0'),
(16, 16, '1', '1', '1', '1', '0', '1', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperacao`
--

DROP TABLE IF EXISTS `recuperacao`;
CREATE TABLE IF NOT EXISTS `recuperacao` (
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `confirmacao` varchar(40) CHARACTER SET latin1 NOT NULL,
  `datahora` datetime NOT NULL,
  KEY `kc_utilizador` (`email`,`confirmacao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_ativo`
--

DROP TABLE IF EXISTS `registro_ativo`;
CREATE TABLE IF NOT EXISTS `registro_ativo` (
  `id_patrimonio` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL,
  `id_descricao_padrao` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_status_ativo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_condicao_ativo` int(11) DEFAULT NULL,
  `placa_patrimonio` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `responsavel` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nome_produto` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `departamento` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `descricao_padrao` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `descricao` varchar(250) CHARACTER SET latin1 NOT NULL,
  `condicao_ativo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_aquisicao` date DEFAULT NULL,
  `hora_aquisicao` time DEFAULT NULL,
  `categoria` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 DEFAULT 'E',
  `nf_registro` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `img_nf_ativo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_patrimonio`),
  KEY `fk_patrimonio_ativo` (`id_funcionario`),
  KEY `fk_descricao_padrao` (`id_descricao_padrao`),
  KEY `fk_id_departamento` (`id_departamento`),
  KEY `fk_status_ativo` (`id_status_ativo`),
  KEY `fk_categoria` (`id_categoria`),
  KEY `fk_condicao_ativo` (`id_condicao_ativo`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro_ativo`
--

INSERT INTO `registro_ativo` (`id_patrimonio`, `id_funcionario`, `id_descricao_padrao`, `id_departamento`, `id_status_ativo`, `id_categoria`, `id_condicao_ativo`, `placa_patrimonio`, `responsavel`, `nome_produto`, `departamento`, `descricao_padrao`, `descricao`, `condicao_ativo`, `valor`, `data_aquisicao`, `hora_aquisicao`, `categoria`, `status`, `nf_registro`, `img_nf_ativo`) VALUES
(86, 1, 2, 3, 1, 2, 1, '000222', 'Kaleb Pignaton', 'Optiplex 3060 Micro', 'Suporte', 'Monitor de Vídeo', 'Desktop ultra compacto com diversas solucoes de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Excelente', '8.98', '2019-05-04', '11:59:12', 'Equipamentos de Informática', 'E', '000.000.452', 'teste.pdf'),
(73, 1, 4, 6, 3, 3, 3, '000444', 'Kaleb Pignaton', 'teste 12', 'Desenvolvimento App', 'Geladeira', 'Desktop ultra compacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Regular', '12.00', '2019-01-12', '10:59:53', 'Eletrotomésticos', 'M', '546547567567567', 'Nubank_2018-12-06.pdf'),
(74, 2, 3, 5, 3, 1, 2, '000111', 'André Santos', 'Optiplex 3060 Micro', 'Desenvolvimento Web', 'Armario', 'blá blá', 'Normal', '77.88', '2019-01-11', '16:21:54', 'Móvies e Utensílios', 'M', '67567567', 'Nubank_2018-12-06.pdf'),
(88, 1, 9, 8, 2, 1, 2, '000999', 'Kaleb Pignaton', 'Teste 13', 'Setor Operecional', 'Teclado', 'blá blá blá blá blá', 'Normal', '92.71', '2019-02-08', '11:11:24', 'Móvies e Utensílios', 'B', '000.000.460', 'Nubank_2018-12-06.pdf'),
(89, 2, 12, 13, 1, 3, 2, '001222', 'André Santos', 'Teste 14', 'Infraestrutura de TI', 'Notebook', ' 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '694.00', '2019-02-16', '15:30:08', 'Eletrotomésticos', 'E', '000.000.461', 'Nubank_2018-12-06.pdf'),
(90, 1, 1, 4, 3, 2, 2, '0001333', 'Kaleb Pignaton', 'Teste 15', 'Recuros Humano', 'Telefone', 'blá blá blá blá', 'Normal', '332.16', '2019-02-07', '10:43:33', 'Equipamentos de Informática', 'M', '000.000.462', 'Nubank_2018-12-06.pdf'),
(85, 1, 3, 1, 2, 1, 3, '000333', 'Kaleb Pignaton', 'teste 4', 'Copa', 'Armario', 'blá blá blá', 'Regular', '77.88', '2019-01-04', '16:15:34', 'Móvies e Utensílios', 'B', '45756768', 'Nubank_2018-12-06.pdf'),
(82, 1, 2, 2, 1, 1, 2, '000000', 'Kaleb Pignaton', 'teste7', 'Limpeza', 'Monitor de Vídeo', 'Desktop ultra compacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '77.88', '2019-01-05', '16:07:39', 'Móvies e Utensílios', 'E', '65467576', 'Nubank_2018-12-06.pdf'),
(83, 1, 2, 4, 2, 1, 2, '3546457', 'Kaleb Pignaton', 'teste8', 'Recuros Humano', 'Monitor de Vídeo', 'Desktop umtracompacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '77.88', '2019-01-02', '16:37:39', 'Móvies e Utensílios', 'B', '78679789', 'Nubank_2018-12-06.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_baixa`
--

DROP TABLE IF EXISTS `registro_baixa`;
CREATE TABLE IF NOT EXISTS `registro_baixa` (
  `id_baixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `placa_patrimonio` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `hora_baixa` time DEFAULT NULL,
  `data_aquisicao` date DEFAULT NULL,
  `motivo_baixa` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `nome_produto` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `nome_usuario` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `responsavel` varchar(30) CHARACTER SET latin1 NOT NULL,
  `valor_baixa` decimal(10,2) NOT NULL,
  `nf_baixa` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `img_nf_baixa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_baixa`),
  KEY `fk_patrimonio_baixa` (`id_funcionario`),
  KEY `id_patrimonio` (`id_patrimonio`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro_baixa`
--

INSERT INTO `registro_baixa` (`id_baixa`, `id_patrimonio`, `id_funcionario`, `placa_patrimonio`, `data_baixa`, `hora_baixa`, `data_aquisicao`, `motivo_baixa`, `nome_produto`, `nome_usuario`, `responsavel`, `valor_baixa`, `nf_baixa`, `img_nf_baixa`) VALUES
(122, 53, 1, '000222', '2019-02-01', '09:45:42', '2019-01-03', 'werwerwer', 'Optiplex 3060 Micro', 'Kaleb Pignaton', 'Kaleb Pignaton', '7788.00', '000.000.456', 'danfe23.pdf'),
(123, 53, 4, '65768', '2019-02-01', '09:52:51', '2019-01-04', '45345345', 'Optiplex 3060 Micro', 'Kaleb Pignaton', '4', '7788.00', '7867', 'nota_devolucao.pdf'),
(128, 87, 2, '000888', '2019-02-13', '14:37:32', '2019-02-08', 'Teste 20', 'Optiplex 3060 Micro', 'Kaleb Pignaton', 'Andre Santos', '5.65', '000.000.459', 'danfe.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_manutencao`
--

DROP TABLE IF EXISTS `registro_manutencao`;
CREATE TABLE IF NOT EXISTS `registro_manutencao` (
  `id_manutencao` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `placa_patrimonio` varchar(11) DEFAULT NULL,
  `nome_produto` varchar(40) DEFAULT NULL,
  `responsavel` varchar(30) NOT NULL,
  `departamento` varchar(25) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data_manutencao` date DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL,
  `hora_manutencao` time DEFAULT NULL,
  `valor_manutencao` decimal(7,2) DEFAULT NULL,
  `nf_manutencao` varchar(50) DEFAULT NULL,
  `img_nf_manutencao` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `devolvido` char(1) NOT NULL DEFAULT '1' COMMENT '(1) patrimônio não foi devolvido.',
  PRIMARY KEY (`id_manutencao`),
  KEY `fk_patrimonio_manutencao` (`id_patrimonio`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro_manutencao`
--

INSERT INTO `registro_manutencao` (`id_manutencao`, `id_patrimonio`, `placa_patrimonio`, `nome_produto`, `responsavel`, `departamento`, `descricao`, `data_manutencao`, `data_conclusao`, `hora_manutencao`, `valor_manutencao`, `nf_manutencao`, `img_nf_manutencao`, `devolvido`) VALUES
(14, 73, '000444', 'teste 12', '1', 'Desenvolvimento App', 'Tela trincada', '2017-06-12', NULL, '17:36:17', '100.00', '201.847.456', 'danfe23we.pdf', '1'),
(15, 73, '000444', 'teste 12', '1', 'Desenvolvimento App', 'Tela trincada', '2019-01-26', NULL, '17:45:22', '78.20', '025.874.402', 'danfe23we.pdf', '1'),
(16, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2018-11-02', NULL, '09:09:25', '150.00', '000.898.456', 'danfe23we.pdf', '1'),
(17, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2019-01-25', '2019-02-26', '13:50:13', '895.23', '250.890.450', 'danfe23we.pdf', '0'),
(18, 74, '000111', 'Optiplex 3060 Micro', '1', 'Desenvolvimento App', 'Tela trincada', '2019-02-03', NULL, '11:16:34', '500.00', '780.012.658', 'danfe23we.pdf', '1'),
(19, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2018-04-29', NULL, '13:17:29', '55.00', '936.000.896', 'danfe23we.pdf', '1'),
(20, 90, '0001333', 'Teste 15', '1', 'Recuros Humano', 'Não sei o que quebrou', '2019-05-02', '2019-02-26', '09:08:41', '5555.00', '988.025.453', 'teste.pdf', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_ativo`
--

DROP TABLE IF EXISTS `status_ativo`;
CREATE TABLE IF NOT EXISTS `status_ativo` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_ativo`
--

INSERT INTO `status_ativo` (`id_status`, `status`) VALUES
(1, 'Em uso'),
(2, 'Baixa'),
(3, 'Manutenção'),
(4, 'Parado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `login` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `departamento` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ativo` char(1) CHARACTER SET latin1 DEFAULT '0' COMMENT '(1)permisão para acessar (0) não',
  `trocasenha` char(1) CHARACTER SET latin1 DEFAULT '1' COMMENT '(1) a senha não foi alterada, direciona para troca senha',
  `nivel` char(1) CHARACTER SET latin1 NOT NULL COMMENT '(1) tem permissão para trocar a placa de patrimônio ',
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `email` (`email`),
  KEY `usuario_nivel_fk` (`nivel`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_funcionario`, `nome`, `login`, `senha`, `email`, `departamento`, `ativo`, `trocasenha`, `nivel`) VALUES
(1, 'Kaleb Pignaton', 'kaleb.pignaton', 'd28d48075d9ddcdea76e791a719e099ebe667089', 'kaleb.pignaton@anexxa.com.br', 'Desenvolvimento Web', '1', '0', '1'),
(2, 'André Santos', 'andre.santos', 'd28d48075d9ddcdea76e791a719e099ebe667089', 'andre.santos@anexxa.com.br', 'Desenvolvimento Web', '0', '0', '1'),
(3, 'Sabrina Elias', 'sabrina.elias', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'sabrina.elias@anexxa.com.br', 'Desenvolvimento Web', '0', '1', '0'),
(4, 'Daniela Oliveira', 'daniela.oliveira', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'daniela.oliveira@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(5, 'Adriano Lopes', 'adriano.lopes', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'adriano.lopes@anexxa.com.br', 'Presidente', '1', '1', '1'),
(6, 'André Portella', 'andre.portella', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'portella@tisoftware.com.br', 'Diretoria', '0', '1', '0'),
(7, 'Glaucia Villa', 'glaucia.villa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'financeiro@anexxa.com.br', 'Financeiro', '0', '1', '0'),
(8, 'Rodrigo Cesar', 'rodrigo.cesar', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'cesar@anexxa.com.br', 'Infraestrutura de TI', '0', '1', '0'),
(9, 'Tainan Paiva', 'tainan.paiva', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', '', 'Recepção', '0', '1', '0'),
(10, 'Stefany Costa', 'stefany.costa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'recepcao@goodshoptv.com.br', 'SAC', '0', '1', '0'),
(11, 'Cleidson Sousa', 'cleidson.sousa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'cleidson.sousa@anexxa.com.br', 'Expedição', '0', '1', '0'),
(12, 'Daniela Xavier', 'daniela.xavier', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'daniela.xavier@goodshoptv.com.br', '', '0', '1', '0'),
(13, 'Luciana de Góes', 'luciana.goes', '01d15653039418f39223925b54f9f1aabf4efb37', 'faturamento@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(14, 'Matheus Wesley', 'matheus.wesley', '01d15653039418f39223925b54f9f1aabf4efb37', 'devolucao2@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(15, 'Paulo Ricardo', 'paulo.ricardo', '01d15653039418f39223925b54f9f1aabf4efb37', 'devolução@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(16, 'Edivan Fontes', 'edivan.fontes', '01d15653039418f39223925b54f9f1aabf4efb37', 'edifontes@tisoftware.com.br', 'Desenvolvimento App', '0', '1', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
