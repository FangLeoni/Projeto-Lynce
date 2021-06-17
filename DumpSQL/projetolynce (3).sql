-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2021 às 20:24
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
('03eff55aa3b04aa9c91b3d38262298fd3e57256d3d8d042e0bd278386c8f', 'Roberto Augusto', 'roberto@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$bXE0VW1yemJGN2wzMjJtZg$aJn5aihar4+KlmC15AOg2belbVrOQVksFOo3ucEEDFw', NULL, '(13) 9811-2802', 'MG', 'Belo Horizonte', 'user.jpg'),
('14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'Lucas Fontes de Oliveira', 'teste2@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$Vjl5QUc2YVdMdzkySlRaeA$Omw8H3pqlQ8FURplaqIvdg44g14EK8KL9xctgDsD8JA', NULL, '(13) 9811-2802', 'SP', 'São Vicente', 'logo v1.3.png'),
('294884236420bc5cfd3cb0a3ca4e3229c66effa37f0862bd442297d54e16', 'Júlia Roberta', 'teste3@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$ZlpGMW1lWE9Bcy5QSkVsdg$uwwWP87ogWrAeWn5vFrn4yHBGSe2AWY9V6tKHdkmNhU', NULL, '(13) 9811-2802', 'MG', 'Caxambu', 'user.jpg'),
('3ad4637a569d9c47e431898f405003651b8618c956482ed4d297591c10b9', 'Rogério Rodrigues', 'roger@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$SWt2NGhlaS5VdjFhdTBqRQ$QfMLbbjdhH/oe96Y7Q7nM0G9BOSWEbxGcRe5TV9Etb0', NULL, '(13) 9811-2802', 'RS', 'Gramado', 'user.jpg'),
('60ca57d2c27feaccce6c0b012acf9636166f18d6a360c2cc3463c3e6b98d', 'Rogério Rodrigues', 'rogerio@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$ZEFPNEhhbmlpYTRVb3A1ZQ$zqZjUHdGSwufkT73iV/h+Mgl2H0jM52IXjGKnBHL6Wo', NULL, '(13) 9811-2802', 'RS', 'Gramado', 'user.jpg'),
('96542bdd2946042b9fc532d5a2758dd6e575ffa75ce953749ba843301923', 'Rodrigo Roger ', 'rodrigo.roger@gamil.com', '$argon2i$v=19$m=65536,t=4,p=1$ck9xdzNqQUJwOUIwclU2ZQ$R5ddOGOiCjJ19JKfGHG9pyQl5ILXKh41wxA9dd3Zbwo', NULL, '(13) 9811-2802', 'MG', 'Belo Horizonte', 'user.jpg');

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
-- Estrutura da tabela `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `cd_marca` char(60) NOT NULL,
  `nm_marca` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_marcas`
--

INSERT INTO `tb_marcas` (`cd_marca`, `nm_marca`) VALUES
('03b84846f306bd4cc9ab081590b57681ebeedd8ea8131bd0923e758e5b5f', 'Motorola'),
('55e375c30ff793b598c9d3a158d6bc78bb7a6e46eb421169d93ff1dd7f27', 'Apple'),
('74daeb8485a7e5478561fcd1818324e7fa30717dd1bd36501f0130dce95b', 'Samsung'),
('c8b01e6d38cd00642e8517ced494d67337dcf0d0ba98222fe9f003a0a6df', 'LG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_messages`
--

CREATE TABLE `tb_messages` (
  `cd_message` char(60) NOT NULL,
  `ds_message` varchar(500) DEFAULT NULL,
  `md_file` varchar(1000) DEFAULT NULL,
  `dt_creation` datetime DEFAULT NULL,
  `cd_main` char(60) DEFAULT NULL,
  `cd_other` char(60) DEFAULT NULL,
  `fk_conversa` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_messages`
--

INSERT INTO `tb_messages` (`cd_message`, `ds_message`, `md_file`, `dt_creation`, `cd_main`, `cd_other`, `fk_conversa`) VALUES
('2f5d9c80a685c22b7748ef57a936c99e8d21562c2a3ee5b0ad1ce59a99fa', 'Ola', NULL, '2021-06-15 15:39:40', '14a508dcd02e818e49223c81bde453a7a61215e50b115a26771ed05b3ea5', 'd9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', '7116dc89dba820ed147debb0eca868889eb1b0ff2b8241a81342141c4794');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `cd_modelo` char(60) NOT NULL,
  `nm_modelo` varchar(18) DEFAULT NULL,
  `fk_marca` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_modelos`
--

INSERT INTO `tb_modelos` (`cd_modelo`, `nm_modelo`, `fk_marca`) VALUES
('d712cb5d4a4cac867b951aa78f026d33d7efb68ac380e00e8503e2923595', 'SM-G973FZBJZTO', '74daeb8485a7e5478561fcd1818324e7fa30717dd1bd36501f0130dce95b'),
('f3b5481630abecdfcc7d942837bd8426af0df7a623b3ccc4c9a18a6e8535', 'SM-A526BZKJZTO', '74daeb8485a7e5478561fcd1818324e7fa30717dd1bd36501f0130dce95b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perguntas`
--

CREATE TABLE `tb_perguntas` (
  `cd_pergunta` char(60) NOT NULL,
  `ds_pergunta` varchar(150) NOT NULL,
  `ic_resposta` tinyint(1) NOT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_possivel_defeito` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_perguntas`
--

INSERT INTO `tb_perguntas` (`cd_pergunta`, `ds_pergunta`, `ic_resposta`, `qt_pontos`, `fk_possivel_defeito`) VALUES
('17d01fbb69f15e96ba8584bbacaa6dd18c559bf6c8dfd5d2ad6b16b961e5', 'O defeito iniciou após uma queda ou pressão causada sobre a tela?', 0, 2, '83af0ee8609f5929ee2c1dd3a882182d4c9683566dacf3435500f91fac4c'),
('3c235d4721e80b12b0af5e88af21c8f9704f4a754a994a4da6995163d2e7', 'O aparelho desliga sozinho no meio da inicialização?', 0, 1, 'cb4c26f8c5f6d031a7014dbd1d398582d6782cd92f25d10dc79e70bb60e1'),
('42228b99fa42241848841d3b963869e72aea592c14c313d9f6ef04e017e6', 'O aparelho apresenta alguma mensagem de Erro ao inicializar?', 1, 5, '1a0ea81ea677b847d6d50ebdb9bab8b332f89a04589271633202cb2bc35e'),
('489b46dd312d0e7008dcc452bacf202d74bec65fbeefe425bda800a6e948', 'O aparelho não finaliza a inicialização, se mantendo preso na logo da marca.', 1, 5, 'cb4c26f8c5f6d031a7014dbd1d398582d6782cd92f25d10dc79e70bb60e1'),
('8fb70f8036037f19ef66eff3e139c7c401c294896e54672732e8b0884467', 'O aparelho desliga sozinho ininterruptamente durante a inicialização?', 1, 5, '2f8ce5cc0f1157464c375ec9e3b1e895336f06c8ba03ce000bb9066da08c'),
('91303d17dba94513558e05b06e2de440a9af321e66a0ad4bc81c4e99acfe', 'O aparelho atualizou?', 1, 5, '83af0ee8609f5929ee2c1dd3a882182d4c9683566dacf3435500f91fac4c'),
('99ee44c68aed150b7f44ce1c9bd2073b9818fe9859cb829626571db1ca4b', 'A falha ocorreu após um descarregamento completo de sua carga?', 0, 4, '2f8ce5cc0f1157464c375ec9e3b1e895336f06c8ba03ce000bb9066da08c'),
('a5790a19369a823ae439530ba744cf60be6c06e62fba42aa657fd6301a77', 'O dispositivo está com sua tela original de fábrica?', 0, 3, '83af0ee8609f5929ee2c1dd3a882182d4c9683566dacf3435500f91fac4c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_possiveis_defeitos`
--

CREATE TABLE `tb_possiveis_defeitos` (
  `cd_defeito` char(60) NOT NULL,
  `nm_defeito` varchar(45) NOT NULL,
  `ds_descricao` varchar(200) NOT NULL,
  `ds_possivel_solucao` varchar(150) NOT NULL,
  `fk_modelo` char(60) NOT NULL,
  `nm_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_possiveis_defeitos`
--

INSERT INTO `tb_possiveis_defeitos` (`cd_defeito`, `nm_defeito`, `ds_descricao`, `ds_possivel_solucao`, `fk_modelo`, `nm_tipo`) VALUES
('1a0ea81ea677b847d6d50ebdb9bab8b332f89a04589271633202cb2bc35e', 'Mensagem de Erro', 'O aparelho não finaliza a inicialização apresentando uma tela com alguma mensagem de falha.', 'Substituição de Firmware', 'f3b5481630abecdfcc7d942837bd8426af0df7a623b3ccc4c9a18a6e8535', 'software'),
('2f8ce5cc0f1157464c375ec9e3b1e895336f06c8ba03ce000bb9066da08c', 'Reboot Infinito', 'O aparelho liga e desliga sozinho permanecendo travado na tela de inicialização (logo da marca), assim o impedindo de inicializar.', 'Reparo de software Substituição de Firmware', 'f3b5481630abecdfcc7d942837bd8426af0df7a623b3ccc4c9a18a6e8535', 'software'),
('83af0ee8609f5929ee2c1dd3a882182d4c9683566dacf3435500f91fac4c', 'Falha após Atualização', 'Ao atualizar, alguma função do sistema deixa de funcionar, como câmera traseira, alto falantes e até mesmo a o funcionamento do touch.', 'Downgrade, o técnico irá inserir o dispositivo no android anterior, pois nele, o aparelho estava em pleno funcionamento.', 'f3b5481630abecdfcc7d942837bd8426af0df7a623b3ccc4c9a18a6e8535', 'software'),
('cb4c26f8c5f6d031a7014dbd1d398582d6782cd92f25d10dc79e70bb60e1', 'Loop Infinito', 'Ao inicializar, o aparelho fica travado na logo da marca do dispositivo de maneira ininterrupta.', 'Reparo de software Substituição de Firmware', 'f3b5481630abecdfcc7d942837bd8426af0df7a623b3ccc4c9a18a6e8535', 'software');

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
  `md_picture` varchar(1000) NOT NULL DEFAULT 'user.jpg',
  `ds_descricao_loja` varchar(200) DEFAULT NULL,
  `qt_votos` int(11) DEFAULT 0,
  `qt_pontuacao` int(11) DEFAULT 0,
  `ic_licenciado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tecnicos`
--

INSERT INTO `tb_tecnicos` (`cd_tecnico`, `nm_tecnico`, `ds_email`, `ds_senha`, `dt_Online`, `ds_telefone`, `sg_estado`, `nm_cidade`, `ds_endereco`, `ds_numero_complementar`, `ic_premium`, `md_picture`, `ds_descricao_loja`, `qt_votos`, `qt_pontuacao`, `ic_licenciado`) VALUES
('45df3f2c3b6248e956f5f39cdb93629a602d6537b0c2156e307b0add6210', 'Theresina Celular', 'jooj34@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$RWQzRzhtRDMwVWRCcDlvLg$51xtyWpj6HHdNFWqL8BLD9LLfQdskcAaHlxNHTPwQK8', NULL, '(55) 8632-1364', 'PI', 'Teresina', 'Av. Miguel Rosa', '516', 0, 'user.jpg', NULL, 0, 0, 0),
('afe503315527e543837b173dd36e7b21f06f007c23d88acd9213119c948c', 'Lofi Assistencias de Celular', 'lofi.assistencias@gmail.com.br', '$argon2i$v=19$m=65536,t=4,p=1$MTFDMzRJLzVxQmE0Q3BWVw$V5Uz1wZU3R+OJnVTG8C2lDCESa7AQ1bpGc2ADNjBDLI', NULL, '(13) 9811-2802', 'SP', 'São Vicente', 'Tenente Durval do Amaral', '539', 0, 'user.jpg', NULL, 0, 0, 1),
('c5e4e484e2081e9c16fef2f994ccdf08eb078b1433aedcbdc97e89987e2f', 'Super Celulares Assistencia', 'super.celulares.assistencia@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SlV6MUs5ZTZvVUVYQU0uQQ$q+RH3AGm2SPpF+HnF9DbLDvSbWryBiRzLD5amxFq050', NULL, '(13) 9811-2802', 'SP', 'São Vicente', 'Rua Seis', '188', 0, 'user.jpg', NULL, 0, 0, 0),
('ceef487fc5f2acda1fa135ea85bf4226fbf39eeef52750fd15fa94b073dd', 'Best Phone - Assistência Técnica e Formação de Técnicos', 'jooj@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MmJWWG16dmZpM2tMVXU4OA$CiFNFKzEdMw+xhWTNNNXYYcSjg3pFQD7RzflUcob9Cs', NULL, '(55) 1193-4674', 'SP', 'Santo André', 'Rua Carneiro Ribeiro,', '10 ', 0, 'user.jpg', '', 0, 0, 0),
('d9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153', 'Vida Cell Assistência Técnica', 'lolipop@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$UGZCTmxVTVRlZ0lWUGVybg$BpCcjAbbc9ONduWhjeXzxfnVVwiBc5grwjZgCM18I7M', NULL, '(13) 3468-7752', 'SP', 'São Vicente', 'Rua Jacob Emerick', '393', 1, 'minimalist-woman.png', 'Assistência muito legal mesmo.', 23, 90, 0),
('f2c8dd764616c15aa951303f319eaf771c2109da2cece8969f93e7397c87', 'Power Assistencia', 'power.assistencia@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$V2hvNTVrZWNaS3pYZVBkMw$9FMIJ/tpnV4upgp/NzDmXQrIDcNfG6UIeOkysTmqWr4', NULL, '(13) 9811-2802', 'SP', 'São Vicente', 'Rua Marques de São Vicente', '849', 0, 'user.jpg', NULL, 0, 0, 0);

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
  ADD KEY `fk_possivel_defeito` (`fk_possivel_defeito`);

--
-- Índices para tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD PRIMARY KEY (`cd_defeito`),
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
  ADD CONSTRAINT `fk_possivel_defeito` FOREIGN KEY (`fk_possivel_defeito`) REFERENCES `tb_possiveis_defeitos` (`cd_defeito`);

--
-- Limitadores para a tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
