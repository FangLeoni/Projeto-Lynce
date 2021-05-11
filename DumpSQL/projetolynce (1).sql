-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2021 às 02:17
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetolynce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `cd_cliente` char(60) NOT NULL,
  `nm_cliente` varchar(80) NOT NULL,
  `ds_email` varchar(80) NOT NULL,
  `ds_senha` varchar(96) DEFAULT NULL,
  `dt_Online` datetime DEFAULT NULL,
  `ds_telefone` varchar(14) NOT NULL,
  `sg_estado` char(2) NOT NULL,
  `nm_cidade` varchar(90) NOT NULL,
  `md_Picture` varchar(1000) DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`cd_cliente`, `nm_cliente`, `ds_email`, `ds_senha`, `dt_Online`, `ds_telefone`, `sg_estado`, `nm_cidade`, `md_Picture`) VALUES
('14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'Lucas Fontes de Oliveira', 'teste2@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$Vjl5QUc2YVdMdzkySlRaeA$Omw8H3pqlQ8FURplaqIvdg44g14EK8KL9xctgDsD8JA', NULL, '(13) 9811-2802', 'SP', 'São Vicente', 'logo v1.3.png'),
('294884236420bc5cfd3cb0a3ca4e3229c66effa37f0862bd442297d54e16', 'Júlia Roberta', 'teste3@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$ZlpGMW1lWE9Bcy5QSkVsdg$uwwWP87ogWrAeWn5vFrn4yHBGSe2AWY9V6tKHdkmNhU', NULL, '(13) 9811-2802', 'MG', 'Caxambu', 'user.jpg'),
('3ad4637a569d9c47e431898f405003651b8618c956482ed4d297591c10b9', 'Rogério Rodrigues', 'roger@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$SWt2NGhlaS5VdjFhdTBqRQ$QfMLbbjdhH/oe96Y7Q7nM0G9BOSWEbxGcRe5TV9Etb0', NULL, '(13) 9811-2802', 'RS', 'Gramado', 'user.jpg'),
('60ca57d2c27feaccce6c0b012acf9636166f18d6a360c2cc3463c3e6b98d', 'Rogério Rodrigues', 'rogerio@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$ZEFPNEhhbmlpYTRVb3A1ZQ$zqZjUHdGSwufkT73iV/h+Mgl2H0jM52IXjGKnBHL6Wo', NULL, '(13) 9811-2802', 'RS', 'Gramado', 'user.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conversas`
--

CREATE TABLE `tb_conversas` (
  `cd_conversa` char(60) NOT NULL,
  `ic_unread` char(1) DEFAULT 'n',
  `dt_modification` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_creation` datetime DEFAULT NULL,
  `fk_cliente` char(60) NOT NULL,
  `fk_tecnico` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_conversas`
--

INSERT INTO `tb_conversas` (`cd_conversa`, `ic_unread`, `dt_modification`, `dt_creation`, `fk_cliente`, `fk_tecnico`) VALUES
('7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794', 'n', '2021-04-13 13:45:54', '2021-04-13 10:45:54', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formularios`
--

CREATE TABLE `tb_formularios` (
  `cd_formulario` char(60) NOT NULL,
  `qt_pontos_totais` int(11) NOT NULL,
  `cd_tec_usu` int(11) NOT NULL,
  `fk_problema` char(60) NOT NULL,
  `fk_pergunta` char(60) NOT NULL,
  `fk_resposta` char(60) NOT NULL,
  `fk_modelo` char(60) NOT NULL,
  `fk_marca` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `cd_marca` char(60) NOT NULL,
  `nm_marca` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_messages`
--

CREATE TABLE `tb_messages` (
  `cd_message` char(60) NOT NULL,
  `ds_message` varchar(500) DEFAULT NULL,
  `md_image` varchar(1000) DEFAULT NULL,
  `dt_creation` datetime DEFAULT NULL,
  `cd_main` char(60) DEFAULT NULL,
  `cd_other` char(60) DEFAULT NULL,
  `fk_conversa` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_messages`
--

INSERT INTO `tb_messages` (`cd_message`, `ds_message`, `md_image`, `dt_creation`, `cd_main`, `cd_other`, `fk_conversa`) VALUES
('120b265df9d4a6023b2047c2a063916914b327d5cff076abb52fb8b46be4', 'sdfsfsdfsdf', NULL, '2021-04-13 11:06:43', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('21c8a2f4e4776c78a894193b566ee6f971c5f8bd6583a20801ef7ea67803', 'dsdsd', NULL, '2021-04-13 11:04:16', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('255cf26ceaa45fe9272a47fce4c47cd93713e3a67f7719473edb04e5cac9', 'hgfhfgh', NULL, '2021-04-13 11:05:38', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('31821c6cba5c1c4617b33266628f982d3c98048d4947f544929c6ceb3ec6', 'fsdfsdf', NULL, '2021-04-13 11:06:22', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('608267d9a0afbeacf64b13a42ed0a7cfc80dfb9ff6e01a9f5fd2d3f39ccc', 'Ola', NULL, '2021-04-13 14:29:53', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('6286d4e314b2ed4720bee7064575becaa2a396a3b38390dc27ee65e27fef', 'gfdgdf', NULL, '2021-04-13 14:13:38', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('668a6521e26199fffc810b94a4dfa39bf4c3e3d6a37ea9d92479a2475fda', 'xgfsdfgsgfdsgfdsg', NULL, '2021-04-13 11:26:42', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('7e0be1d2b0719bfed26999c02b04911476a6d5081c2cee7ec244ae542a1a', 'Olá2', NULL, '2021-04-13 11:03:52', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('87fd5d356f5f507bb10019d2f6d6a914bd70d52a9da3d100ab023bc50dbb', 'sdfgdfgsdfgsdfgsdfg', NULL, '2021-04-13 11:26:45', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('9ced46f86824361916301f4813d5974687d94a0b9eba449e2f3987a1e1d2', 'Olá', NULL, '2021-04-13 14:13:14', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('a70a7c5b8a05dc3375b1bc59ad3ab0df0bb8f1ed101d434ba354a565ba16', 'Olá', NULL, '2021-04-13 14:04:41', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('bc470f6f364031f04e84bdeb91cf07a132e6791ee78b6b2c79e91b988e5c', 'lá3', NULL, '2021-04-13 11:04:01', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('c5d0085e861c9124dfa43c984c2af5ea97e06b1d025d8c768cd2f7b5c919', 'Olá', NULL, '2021-04-13 10:57:26', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('c97893739cd974d2838902443d2db1720141910ddf1b5475ad05956cf177', 'fsdfs', NULL, '2021-04-13 15:55:47', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('e9be87ce41a0f37b7b4cb08e78adff311766873b4d29b2e7083404d9acb3', 'fdsfsdfsdf', NULL, '2021-04-13 11:06:36', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794'),
('fa23a4c21d228024bc360fb6e58418dfc1dd12d46486b14af099136c27cd', 'dfgdfgdfg', NULL, '2021-04-13 11:06:54', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `cd_modelo` char(60) NOT NULL,
  `nm_modelo` varchar(18) DEFAULT NULL,
  `fk_marca` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perguntas`
--

CREATE TABLE `tb_perguntas` (
  `cd_pergunta` char(60) NOT NULL,
  `ds_perguntas` varchar(200) NOT NULL,
  `fk_resposta` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_possiveis_defeitos`
--

CREATE TABLE `tb_possiveis_defeitos` (
  `cd_possivel_defeito` char(60) NOT NULL,
  `ds_possivel_defeito` varchar(60) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_formulario` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_problemas`
--

CREATE TABLE `tb_problemas` (
  `cd_problema` char(60) NOT NULL,
  `nm_problema` varchar(20) NOT NULL,
  `fk_pergunta` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_respostas`
--

CREATE TABLE `tb_respostas` (
  `cd_resposta` char(60) NOT NULL,
  `ds_resposta` varchar(50) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_modelo` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tecnicos`
--

CREATE TABLE `tb_tecnicos` (
  `cd_tecnico` char(60) NOT NULL,
  `nm_tecnico` varchar(80) NOT NULL,
  `ds_email` varchar(80) NOT NULL,
  `ds_senha` varchar(96) DEFAULT NULL,
  `dt_Online` datetime DEFAULT NULL,
  `ds_telefone` varchar(14) NOT NULL,
  `sg_estado` char(2) NOT NULL,
  `nm_cidade` varchar(90) NOT NULL,
  `ds_endereco` varchar(120) NOT NULL,
  `ds_numero_complementar` varchar(3) DEFAULT NULL,
  `ic_premium` tinyint(1) DEFAULT 0,
  `md_picture` varchar(1000) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tecnicos`
--

INSERT INTO `tb_tecnicos` (`cd_tecnico`, `nm_tecnico`, `ds_email`, `ds_senha`, `dt_Online`, `ds_telefone`, `sg_estado`, `nm_cidade`, `ds_endereco`, `ds_numero_complementar`, `ic_premium`, `md_picture`) VALUES
('45df3f2c3b6248e956f5f39cdb93629a602d6537b0c2156e307b0add6210', 'Theresina Celular', 'jooj34@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$RWQzRzhtRDMwVWRCcDlvLg$51xtyWpj6HHdNFWqL8BLD9LLfQdskcAaHlxNHTPwQK8', NULL, '(55) 8632-1364', 'PI', 'Teresina', 'Av. Miguel Rosa', '516', 0, 'user.jpg'),
('ceef487fc5f2acda1fa135ea85bf4226fbf39eeef52750fd15fa94b073dd', 'Best Phone - Assistência Técnica e Formação de Técnicos', 'jooj@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MmJWWG16dmZpM2tMVXU4OA$CiFNFKzEdMw+xhWTNNNXYYcSjg3pFQD7RzflUcob9Cs', NULL, '(55) 1193-4674', 'SP', 'Santo André', 'Rua Carneiro Ribeiro,', '10 ', 0, 'user.jpg'),
('d9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', 'Vida Cell Assistência Técnica', 'lolipop@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$UGZCTmxVTVRlZ0lWUGVybg$BpCcjAbbc9ONduWhjeXzxfnVVwiBc5grwjZgCM18I7M', NULL, '(13) 3468-7752', 'SP', 'São Vicente', 'Rua Jacob Emmerich', '393', 0, 'MonumetoNiemayer.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Índices para tabela `tb_conversas`
--
ALTER TABLE `tb_conversas`
  ADD PRIMARY KEY (`cd_conversa`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_tecnico` (`fk_tecnico`);

--
-- Índices para tabela `tb_formularios`
--
ALTER TABLE `tb_formularios`
  ADD PRIMARY KEY (`cd_formulario`),
  ADD KEY `fk_problema` (`fk_problema`),
  ADD KEY `fk_pergunta` (`fk_pergunta`),
  ADD KEY `fk_resposta` (`fk_resposta`),
  ADD KEY `fk_modelo` (`fk_modelo`),
  ADD KEY `fk_marca` (`fk_marca`);

--
-- Índices para tabela `tb_marcas`
--
ALTER TABLE `tb_marcas`
  ADD PRIMARY KEY (`cd_marca`);

--
-- Índices para tabela `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD PRIMARY KEY (`cd_message`),
  ADD KEY `fk_conversa` (`fk_conversa`);

--
-- Índices para tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD PRIMARY KEY (`cd_modelo`),
  ADD KEY `fk_marca` (`fk_marca`);

--
-- Índices para tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  ADD PRIMARY KEY (`cd_pergunta`),
  ADD KEY `fk_resposta` (`fk_resposta`);

--
-- Índices para tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD PRIMARY KEY (`cd_possivel_defeito`),
  ADD KEY `fk_formulario` (`fk_formulario`);

--
-- Índices para tabela `tb_problemas`
--
ALTER TABLE `tb_problemas`
  ADD PRIMARY KEY (`cd_problema`),
  ADD KEY `fk_pergunta` (`fk_pergunta`);

--
-- Índices para tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD PRIMARY KEY (`cd_resposta`),
  ADD KEY `fk_modelo` (`fk_modelo`);

--
-- Índices para tabela `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  ADD PRIMARY KEY (`cd_tecnico`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_conversas`
--
ALTER TABLE `tb_conversas`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `tb_clientes` (`cd_cliente`),
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`fk_tecnico`) REFERENCES `tb_tecnicos` (`cd_tecnico`);

--
-- Limitadores para a tabela `tb_formularios`
--
ALTER TABLE `tb_formularios`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`),
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`),
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`),
  ADD CONSTRAINT `fk_problema` FOREIGN KEY (`fk_problema`) REFERENCES `tb_problemas` (`cd_problema`),
  ADD CONSTRAINT `fk_resposta` FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`);

--
-- Limitadores para a tabela `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD CONSTRAINT `fk_conversa` FOREIGN KEY (`fk_conversa`) REFERENCES `tb_conversas` (`cd_conversa`);

--
-- Limitadores para a tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD CONSTRAINT `tb_modelos_ibfk_1` FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`);

--
-- Limitadores para a tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  ADD CONSTRAINT `tb_perguntas_ibfk_1` FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`);

--
-- Limitadores para a tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD CONSTRAINT `fk_formulario` FOREIGN KEY (`fk_formulario`) REFERENCES `tb_formularios` (`cd_formulario`);

--
-- Limitadores para a tabela `tb_problemas`
--
ALTER TABLE `tb_problemas`
  ADD CONSTRAINT `tb_problemas_ibfk_1` FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`);

--
-- Limitadores para a tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD CONSTRAINT `tb_respostas_ibfk_1` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
