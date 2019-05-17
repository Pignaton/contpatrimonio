-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Abr-2019 às 13:56
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

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
-- Estrutura da tabela `acesso_pagina`
--

DROP TABLE IF EXISTS `acesso_pagina`;
CREATE TABLE IF NOT EXISTS `acesso_pagina` (
  `usuario` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  KEY `fk_ac_usuario` (`usuario`),
  KEY `fk_ac_id_pagina` (`id_pagina`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso_pagina`
--

INSERT INTO `acesso_pagina` (`usuario`, `id_pagina`) VALUES
(1, 0),
(1, 0),
(1, 0),
(1, 0),
(1, 0),
(1, 0),
(1, 0),
(1, 0),
(1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `img_fora`
--

INSERT INTO `img_fora` (`id_img`, `data`, `hora`, `responsavel`, `img`) VALUES
(1, '2019-05-04', '10:32:57', 'Kaleb Pignaton', 'nota_devolucao.pdf'),
(2, '2019-05-04', '10:34:18', 'Kaleb Pignaton', 'teste2.pdf'),
(10, '2019-05-04', '10:51:57', 'Kaleb Pignaton', 'teste2.pdf'),
(11, '2019-05-04', '10:52:05', 'Kaleb Pignaton', 'teste.pdf'),
(12, '2019-02-26', '14:40:51', 'Kaleb Pignaton', 'download.pdf'),
(8, '2019-05-04', '10:47:45', 'Kaleb Pignaton', 'teste2.pdf'),
(9, '2019-05-04', '10:48:00', 'Kaleb Pignaton', 'teste.pdf'),
(13, '2019-02-26', '14:41:23', 'Kaleb Pignaton', 'download.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) NOT NULL,
  `pagina` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `icon` varchar(30) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `pagina`, `name`, `class`, `icon`) VALUES
(1, 1, 'dashboard', 'txtdashboard', 'checkdashboard', 'fa fa-chart-line'),
(3, 3, 'baixa', 'txtbaixa', 'checkbaixa', 'fas fa-eraser'),
(4, 4, 'ativo', 'txtativo', 'checkativo', 'fas fa-clipboard-check'),
(5, 5, 'manutencao', 'txtmanutencao', 'checkmanutencao', 'fas fa-retweet'),
(6, 0, 'sem_categoria', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id_nota_fiscal`, `id_patrimonio`, `nf_manutencao`, `img_nf_manutencao`, `nf_baixa`, `img_nf_baixa`, `nf_ativo`, `img_nf_ativo`) VALUES
(1, 1, NULL, NULL, NULL, NULL, '000.000.452', 'teste.pdf'),
(2, 2, NULL, NULL, NULL, NULL, '546547567567567', 'download.pdf'),
(3, 3, NULL, NULL, NULL, NULL, '67567567', 'download.pdf'),
(4, 4, NULL, NULL, NULL, NULL, '000.000.460', 'nota_devolucao.pdf'),
(5, 5, NULL, NULL, NULL, NULL, '000.000.461', 'danfe.pdf'),
(6, 6, NULL, NULL, NULL, NULL, '000.000.462', 'danfe.pdf'),
(7, 7, NULL, NULL, NULL, NULL, '45756768', 'nota_devolucao.pdf'),
(8, 8, NULL, NULL, NULL, NULL, '65467576', 'teste2.pdf'),
(9, 9, NULL, NULL, NULL, NULL, '78679789', 'teste2.pdf'),
(10, 10, NULL, NULL, NULL, NULL, '020.254.897', 'teste.pdf'),
(11, 11, NULL, NULL, NULL, NULL, '234.676.765', 'nota_devolucao2.pdf'),
(12, 53, NULL, NULL, '000.000.456', 'danfe23.pdf', NULL, NULL),
(13, 53, NULL, NULL, '7867', 'nota_devolucao.pdf', NULL, NULL),
(14, 87, '', '', '000.000.459', 'danfe.pdf', NULL, NULL),
(15, 2, '201.847.456', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(16, 2, '025.874.402', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(17, 1, '000.898.456', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(18, 1, '250.890.450', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(19, 3, '780.012.658', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(20, 1, '936.000.896', 'danfe23we.pdf', NULL, NULL, NULL, NULL),
(21, 6, '988.025.453', 'teste.pdf', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

DROP TABLE IF EXISTS `pagina`;
CREATE TABLE IF NOT EXISTS `pagina` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` char(1) DEFAULT NULL,
  `menu` int(11) NOT NULL,
  `checkbox` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nome_pagina` varchar(30) NOT NULL,
  `arquivo` varchar(30) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pagina`),
  KEY `fk_pagina_categoria` (`categoria`),
  KEY `fk_pagina_manu` (`menu`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `categoria`, `menu`, `checkbox`, `name`, `nome_pagina`, `arquivo`, `icon`) VALUES
(1, '1', 1, 'checkdashboard', 'txtdashboard', 'Dashboard', 'dashboard', ''),
(2, '0', 0, '', 'txtacesso', 'Acesso', 'acesso', ''),
(3, '0', 0, '', 'txtnotas', 'Cópia de notas', 'backup', 'fas fa-copy'),
(4, '3', 3, 'checkbaixa', 'txtbaixa', 'Tabela de baixas', 'baixa-ativo', ''),
(5, '4', 4, 'checkativo', 'txtativo', 'Tabela de ativos', 'cadastro-ativo', ''),
(6, '5', 5, 'checkmanutencao', 'txtmanutencao', 'Tabela de manutenção', 'manutencao-ativo', ''),
(7, '5', 5, '', 'txtregistramanu', 'registrar manutenção', 'manutencao-tabela', ''),
(8, '0', 0, '', 'txthome', 'Home', 'dashboard', 'fas fa-home'),
(9, '0', 0, '', 'txtdocumentacao', 'documentação', 'documentacao', 'fa fa-book'),
(10, '0', 0, '', 'txtcriaconta', 'Criar Usuário', 'admin-conta', '');

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
  `conta` char(1) NOT NULL,
  `documentacao` char(1) NOT NULL,
  `home` char(1) NOT NULL,
  PRIMARY KEY (`id_pagina`),
  KEY `funcionario` (`funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagina_acesso`
--

INSERT INTO `pagina_acesso` (`id_pagina`, `funcionario`, `dashboard`, `cadastro_ativo`, `tabela_manutencao`, `tabela_baixa`, `acesso`, `registra_manutencao`, `backup`, `conta`, `documentacao`, `home`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(2, 2, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(3, 3, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(4, 4, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(5, 5, '1', '0', '0', '0', '1', '0', '0', '0', '0', '1'),
(6, 6, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(7, 7, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(8, 8, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(9, 9, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(10, 10, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(11, 11, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(12, 12, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(13, 13, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(14, 14, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(15, 15, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(16, 16, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0'),
(17, 20, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_categoria`
--

DROP TABLE IF EXISTS `pagina_categoria`;
CREATE TABLE IF NOT EXISTS `pagina_categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` char(1) DEFAULT NULL,
  `pagina` varchar(30) DEFAULT NULL,
  `class` varchar(30) NOT NULL,
  `checkbox` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagina_categoria`
--

INSERT INTO `pagina_categoria` (`id_categoria`, `categoria`, `pagina`, `class`, `checkbox`) VALUES
(1, '1', 'dashboard', 'txtdashboard', 'checkdashboard'),
(3, '3', 'baixa', 'txtbaixa', 'checkbaixa'),
(4, '4', 'ativo', 'txtativo', 'checkativo'),
(5, '5', 'manutencao', 'txtmanutencao', 'checkmanutencao'),
(6, '0', 'sem_categoria', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quantidade_por_ativo`
--

DROP TABLE IF EXISTS `quantidade_por_ativo`;
CREATE TABLE IF NOT EXISTS `quantidade_por_ativo` (
  `id_quantidade` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `departamento_nome` varchar(30) DEFAULT NULL,
  `departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_quantidade`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quantidade_por_ativo`
--

INSERT INTO `quantidade_por_ativo` (`id_quantidade`, `id_patrimonio`, `departamento_nome`, `departamento`) VALUES
(1, 1, 'Suporte', 3),
(2, 2, 'Desenvolvimento App', 6),
(3, 3, 'Desenvolvimento Web', 5),
(4, 4, 'Setor Operecional', 8),
(5, 5, 'Infraestrutura de TI', 13),
(6, 6, 'Recuros Humano', 4),
(7, 7, 'Copa', 1),
(8, 8, 'Limpeza', 2),
(9, 9, 'Recuros Humano', 4),
(10, 10, 'Desenvolvimento Web', 5),
(11, 104, 'Desenvolvimento Web', 5);

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

--
-- Extraindo dados da tabela `recuperacao`
--

INSERT INTO `recuperacao` (`email`, `confirmacao`, `datahora`) VALUES
('kpignaton@ymail.com', '742940493ae74bb73c9f2c5a2bf0f76178712b1a', '2019-04-11 09:34:45'),
('kpignaton@ymail.com', 'c69a58383188e844613f4c1c95c925a240b5bbba', '2019-04-11 09:35:12'),
('kpignaton@ymail.com', '24ab15c6d663a1ef8f8140ab6aaaf0fbac813c1c', '2019-04-11 09:35:15'),
('kpignaton@ymail.com', '65d79c4cf7be91a8d2162d0427483a65c8d7e201', '2019-04-11 09:35:16'),
('kpignaton@ymail.com', '3a0d8805d087691eaaa3db312f97ef638b6f80f0', '2019-04-11 15:24:05'),
('kpignaton@ymail.com', 'cdca4763d75513ed001dab0edadd6be1efb10660', '2019-04-11 09:36:03'),
('kpignaton@ymail.com', 'd25ddc281fe7387bd143be43b46999e7849c97fe', '2019-04-11 09:38:03'),
('kpignaton@ymail.com', '252717ee6f59e97bf6525544ab4dc57b07038b30', '2019-04-11 09:39:56'),
('kpignaton@ymail.com', 'c4b5a4a5ae166e85b2f055ace32b52b59734af4f', '2019-04-11 09:45:07'),
('kpignaton@ymail.com', '155981711346fc909bdf873ca878a45463489d90', '2019-04-11 09:45:35'),
('kpignaton@ymail.com', 'a534a6887af39be47eb68ba21e817e912e0ea03e', '2019-04-11 09:46:01'),
('kpignaton@ymail.com', '8fa558f2939e650e76dcc4e8391aa169b52b4df1', '2019-04-11 09:50:41'),
('kpignaton@ymail.com', '73bab90331038fdb87dc08d43ef4b47c8a8db777', '2019-04-11 09:51:37'),
('kpignaton@ymail.com', 'f765a7e99ff026b6b88c0dc04dc8287b63fde8cf', '2019-04-11 09:51:41'),
('kpignaton@ymail.com', 'b84e4bdf5fe68ee42a1b1acd22f2b062174e5086', '2019-04-11 09:52:18'),
('teste@teste.com.br', '9b996fa937a296d0995a70fb25bc16a47664ce2d', '2019-04-11 09:55:04'),
('kpignaton@ymail.com', '19b7de8338fd3922ae1d8226afea7e5ecdb74b03', '2019-04-12 15:47:52'),
('teste@teste.com.br', '6ace9582a1bb46c724a8bc8e9afbc0c911d50701', '2019-04-11 09:55:53'),
('teste@teste.com.br', 'bb1576b787cfb6f5dcf4ca1c344a7227d1643474', '2019-04-11 09:55:54'),
('teste@teste.com.br', '60bb14b9af9bd5f610e1034f9de57813fa07b45f', '2019-04-11 09:56:29'),
('teste@teste.com.br', 'bf98d940f31128a31671f1aec41c6bda3eb734f0', '2019-04-11 09:56:33'),
('teste@teste.com.br', 'f55994b4a9655e9b89926cc691d4a5275f08da58', '2019-04-11 09:58:09'),
('teste@teste.com.br', 'e76ff6be4712ea27cf34d1c00ea25fb65950ca6f', '2019-04-11 10:01:31'),
('teste@teste.com.br', 'c0e04c108c7c4384476ed6758c291c8a709244bf', '2019-04-11 10:01:35'),
('kpignaton@ymail.com', 'a22fa67653c4c1856d4943fffde8af2f43c71462', '2019-04-12 17:22:00'),
('teste@teste.com.br', '95969d77469dceb936827c6b93da02408c25e38e', '2019-04-11 10:01:37'),
('teste@teste.com.br', '42f96c12f21043e228ae2ee79dd6728e92a34ddb', '2019-04-11 10:01:37'),
('teste@teste.com.br', 'da49e4ae7ddec58209d9fe093ea77052096d24dc', '2019-04-11 10:01:38'),
('teste@teste.com.br', 'ebba4e61ea96e9bfb7711120dce2b6c3b0264285', '2019-04-11 10:03:09'),
('teste@teste.com.br', 'f7bdeb58a82c9a2695b3d95830501a7c35a98838', '2019-04-11 10:04:20'),
('teste@teste.com.br', '2b6fe007ddb489018f8bbe84dd9bf700f1a09afe', '2019-04-11 10:26:57'),
('teste@teste.com.br', 'f7fb893e49bb0b64cb8362138bd5d8aa92575533', '2019-04-11 10:35:03'),
('teste@teste.com.br', 'b662dddbcb2a2429fb5e99ef0107fb27ee3328a6', '2019-04-11 10:39:25'),
('teste@teste.com.br', 'ea394476f706dee5ba3af4d63a11131665148e3f', '2019-04-11 10:42:46'),
('kpignaton@ymail.com', '6a995a396b1b910be474525873d23940166bf0f4', '2019-04-12 17:07:25'),
('kpignaton@ymail.com', '22a9a62d6ce177f1f6d6992f71a3b0c50d51ed07', '2019-04-12 17:16:25'),
('kpignaton@ymail.com', '5ca1355a3acdf448788f241f70945d77b70c55a3', '2019-04-12 17:22:18'),
('kpignaton@ymail.com', '0b544898c5612e887d2ae68f1864e2cd0ae1373c', '2019-04-12 17:24:24');

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
  `departamento` varchar(30) CHARACTER SET latin1 NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro_ativo`
--

INSERT INTO `registro_ativo` (`id_patrimonio`, `id_funcionario`, `id_descricao_padrao`, `id_departamento`, `id_status_ativo`, `id_categoria`, `id_condicao_ativo`, `placa_patrimonio`, `responsavel`, `nome_produto`, `departamento`, `descricao_padrao`, `descricao`, `condicao_ativo`, `valor`, `data_aquisicao`, `hora_aquisicao`, `categoria`, `status`, `nf_registro`, `img_nf_ativo`) VALUES
(1, 1, 2, 3, 3, 2, 1, '000222', 'Kaleb Pignaton', 'Optiplex 3060 Micro', 'Suporte', 'Monitor de Vídeo', 'Desktop ultra compacto com diversas solucoes de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Excelente', '8.98', '2019-05-04', '11:59:12', 'Equipamentos de Informática', 'M', '000.000.452', 'teste.pdf'),
(2, 1, 4, 6, 3, 3, 3, '000444', 'Kaleb Pignaton', 'teste 12', 'Desenvolvimento App', 'Geladeira', 'Desktop ultra compacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Regular', '12.00', '2019-01-12', '10:59:53', 'Eletrotomésticos', 'M', '546547567567567', 'download.pdf'),
(3, 2, 3, 5, 3, 1, 2, '000111', 'André Santos', 'Optiplex 3060 Micro', 'Desenvolvimento Web', 'Armario', 'blá blá', 'Normal', '77.88', '2019-01-11', '16:21:54', 'Móvies e Utensílios', 'M', '67567567', 'download.pdf'),
(4, 1, 9, 8, 2, 1, 2, '000999', 'Kaleb Pignaton', 'Teste 13', 'Setor Operecional', 'Teclado', 'blá blá blá blá blá', 'Normal', '92.71', '2019-02-08', '11:11:24', 'Móvies e Utensílios', 'B', '000.000.460', 'nota_devolucao.pdf'),
(5, 2, 12, 13, 1, 3, 2, '001222', 'André Santos', 'Teste 14', 'Infraestrutura de TI', 'Notebook', ' 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '694.00', '2019-02-16', '15:30:08', 'Eletrotomésticos', 'E', '000.000.461', 'danfe.pdf'),
(6, 1, 1, 4, 3, 2, 2, '0001333', 'Kaleb Pignaton', 'Teste 15', 'Recuros Humano', 'Telefone', 'blá blá blá blá', 'Normal', '332.16', '2019-02-07', '10:43:33', 'Equipamentos de Informática', 'M', '000.000.462', 'danfe.pdf'),
(7, 1, 3, 1, 2, 1, 3, '000333', 'Kaleb Pignaton', 'teste 4', 'Copa', 'Armario', 'blá blá blá', 'Regular', '77.88', '2019-01-04', '16:15:34', 'Móvies e Utensílios', 'B', '45756768', 'nota_devolucao.pdf'),
(8, 1, 2, 2, 1, 1, 2, '000000', 'Kaleb Pignaton', 'teste7', 'Limpeza', 'Monitor de Vídeo', 'Desktop ultra compacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '77.88', '2019-01-05', '16:07:39', 'Móvies e Utensílios', 'E', '65467576', 'teste2.pdf'),
(9, 1, 2, 4, 2, 1, 2, '3546457', 'Kaleb Pignaton', 'teste8', 'Recuros Humano', 'Monitor de Vídeo', 'Desktop umtracompacto com diversas soluções de montagem e apenas 18,2 cm de altura e 3,6 cm de largura.', 'Normal', '77.88', '2019-01-02', '16:37:39', 'Móvies e Utensílios', 'B', '78679789', 'teste2.pdf'),
(10, 1, 8, 5, 1, 1, 1, '0001444', 'Kaleb Pignaton', 'Kappesberg', 'Desenvolvimento Web', 'Mesa', 'Call Center Teca Itália De Madeira Móveis Kappesberg', 'Excelente', '261.99', '2019-02-26', '09:45:58', 'Móvies e Utensílios', 'E', '020.254.897', 'teste.pdf'),
(104, 1, 12, 5, 1, 2, 1, '0001555', 'Kaleb Pignaton', 'Samsung Notebook Essentials E20 ', 'Desenvolvimento Web', 'Notebook', 'blá blá blá blá e mais blá blá', 'Excelente', '1604.99', '2019-03-01', '11:03:00', 'Equipamentos de Informática', 'E', '234.676.765', 'nota_devolucao2.pdf');

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
(14, 73, '000444', 'teste 12', '1', 'Desenvolvimento App', 'Tela trincada', '2017-06-12', '2019-03-01', '17:36:17', '100.00', '201.847.456', 'danfe23we.pdf', '0'),
(15, 73, '000444', 'teste 12', '1', 'Desenvolvimento App', 'Tela trincada', '2019-01-26', NULL, '17:45:22', '78.20', '025.874.402', 'danfe23we.pdf', '1'),
(16, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2018-11-02', '2019-03-01', '09:09:25', '150.00', '000.898.456', 'danfe23we.pdf', '0'),
(17, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2019-01-25', '2019-02-26', '13:50:13', '895.23', '250.890.450', 'danfe23we.pdf', '0'),
(18, 74, '000111', 'Optiplex 3060 Micro', '1', 'Desenvolvimento App', 'Tela trincada', '2019-02-03', NULL, '11:16:34', '500.00', '780.012.658', 'danfe23we.pdf', '1'),
(19, 86, '000222', 'Optiplex 3060 Micro', '1', 'Suporte', 'Tela trincada', '2018-04-29', NULL, '13:17:29', '55.00', '936.000.896', 'danfe23we.pdf', '1'),
(20, 90, '0001333', 'Teste 15', '1', 'Recuros Humano', 'Não sei o que quebrou', '2019-05-02', NULL, '09:08:41', '5555.00', '988.025.453', 'teste.pdf', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_funcionario`, `nome`, `login`, `senha`, `email`, `departamento`, `ativo`, `trocasenha`, `nivel`) VALUES
(1, 'Kaleb Pignaton', 'kaleb.pignaton', '6751eadf0ec2f77b133e0e20fd7b09d8f000c761', 'kaleb.pignaton@anexxa.com.br', 'Desenvolvimento Web', '1', '0', '1'),
(2, 'André Santos', 'andre.santos', 'd28d48075d9ddcdea76e791a719e099ebe667089', 'andre.santos@anexxa.com.br', 'Desenvolvimento Web', '0', '0', '1'),
(3, 'Sabrina Elias', 'sabrina.elias', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'sabrina.elias@anexxa.com.br', 'Desenvolvimento Web', '0', '1', '0'),
(4, 'Daniela Oliveira', 'daniela.oliveira', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'daniela.oliveira@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(5, 'Adriano Lopes', 'adriano.lopes', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'adriano.lopes@anexxa.com.br', 'Presidente', '1', '1', '1'),
(6, 'André Portella', 'andre.portella', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'portella@tisoftware.com.br', 'Diretoria', '0', '1', '0'),
(7, 'Glaucia Villa', 'glaucia.villa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'financeiro@anexxa.com.br', 'Financeiro', '0', '1', '0'),
(8, 'Rodrigo Cesar', 'rodrigo.cesar', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'cesar@anexxa.com.br', 'Infraestrutura de TI', '0', '1', '1'),
(9, 'Tainan Paiva', 'tainan.paiva', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', '', 'Recepção', '0', '1', '0'),
(10, 'Stefany Costa', 'stefany.costa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'recepcao@goodshoptv.com.br', 'SAC', '0', '1', '0'),
(11, 'Cleidson Sousa', 'cleidson.sousa', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'cleidson.sousa@anexxa.com.br', 'Expedição', '0', '1', '0'),
(12, 'Daniela Xavier', 'daniela.xavier', '1ef47d10fedd9da0bc014f2ce7649e5f3b99408b', 'daniela.xavier@goodshoptv.com.br', '', '0', '1', '0'),
(13, 'Luciana de Góes', 'luciana.goes', '01d15653039418f39223925b54f9f1aabf4efb37', 'faturamento@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(14, 'Matheus Wesley', 'matheus.wesley', '01d15653039418f39223925b54f9f1aabf4efb37', 'devolucao2@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(15, 'Paulo Ricardo', 'paulo.ricardo', '01d15653039418f39223925b54f9f1aabf4efb37', 'devolução@goodshoptv.com.br', 'Setor Operacional', '0', '1', '0'),
(16, 'Edivan Fontes', 'edivan.fontes', '01d15653039418f39223925b54f9f1aabf4efb37', 'edifontes@tisoftware.com.br', 'Desenvolvimento App', '0', '1', '0'),
(20, 'Teste teste', 'te.steteste', '4f6627f3c551e4d786f8c0853be450aea4e233f8', 'kpignaton@ymail.com', '12', '1', '0', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
