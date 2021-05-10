
--
-- Banco de dados: `projetolynce`
--


-- CREATE DATABASE projetolynce
-- CHARACTER SET = 'utf8'
-- COLLATE = 'utf8_general_ci';

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_messages`
--

CREATE TABLE `tb_messages` (
  `cd_message` char(60) NOT NULL,
  `ds_message` varchar(500) DEFAULT NULL,
  `md_image` varchar(1000) DEFAULT NULL,
  `dt_creation` datetime DEFAULT NULL,
  `cd_main` int(11) NOT NULL,
  `cd_other` int(11) NOT NULL,
  `fk_conversa` char(60) NOT NULL
);

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
);

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
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `cd_marca` char(60) NOT NULL,
  `nm_marca` varchar(8) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `cd_modelo` char(60) NOT NULL,
  `nm_modelo` varchar(18) DEFAULT NULL,
  `fk_marca` char(60) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_respostas`
--

CREATE TABLE `tb_respostas` (
  `cd_resposta` char(60) NOT NULL,
  `ds_resposta` varchar(50) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_modelo` char(60) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_possiveis_defeitos`
--

CREATE TABLE `tb_possiveis_defeitos` (
  `cd_possivel_defeito` char(60) NOT NULL,
  `ds_possivel_defeito` varchar(60) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_formulario` char(60) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perguntas`
--

CREATE TABLE `tb_perguntas` (
  `cd_pergunta` char(60) NOT NULL,
  `ds_perguntas` varchar(200) NOT NULL,
  `fk_resposta` char(60) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_problemas`
--

CREATE TABLE `tb_problemas` (
  `cd_problema` char(60) NOT NULL,
  `nm_problema` varchar(20) NOT NULL,
  `fk_pergunta` char(60) NOT NULL
);


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
  `ic_premium` TINYINT(1) DEFAULT 0,
  `md_picture` varchar(1000) NOT NULL DEFAULT 'user.jpg'
);
-- ------------------------

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
);

--
-- Índices para tabela `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD PRIMARY KEY (`cd_message`),
  ADD KEY `fk_conversa` (`fk_conversa`);

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
-- Índices para tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD PRIMARY KEY (`cd_possivel_defeito`),
  ADD KEY `fk_formulario` (`fk_formulario`);

--
-- Índices para tabela `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  ADD PRIMARY KEY (`cd_tecnico`);

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD CONSTRAINT `fk_conversa` FOREIGN KEY (`fk_conversa`) REFERENCES `tb_conversas` (`cd_conversa`);

--
-- Limitadores para a tabela `tb_conversas`
--
ALTER TABLE `tb_conversas`
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`fk_tecnico`) REFERENCES `tb_tecnicos` (`cd_tecnico`),
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `tb_clientes` (`cd_cliente`);

--
-- Limitadores para a tabela `tb_formularios`
--
ALTER TABLE `tb_formularios`
  ADD CONSTRAINT `fk_problema` FOREIGN KEY (`fk_problema`) REFERENCES `tb_problemas` (`cd_problema`),
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`),
  ADD CONSTRAINT `fk_resposta` FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`),
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`),
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`);

--
-- Limitadores para a tabela `tb_possiveis_defeitos`
--
ALTER TABLE `tb_possiveis_defeitos`
  ADD CONSTRAINT `fk_formulario` FOREIGN KEY (`fk_formulario`) REFERENCES `tb_formularios` (`cd_formulario`);

--
-- Limitadores para a tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`);

--
-- Limitadores para a tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  ADD FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`);

--
-- Limitadores para a tabela `tb_problemas`
--
ALTER TABLE `tb_problemas`
  ADD FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`);

--
-- Limitadores para a tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`);
COMMIT;

