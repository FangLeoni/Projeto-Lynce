-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Fev-2021 às 01:07
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

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
-- Estrutura da tabela `tb_chats`
--

CREATE TABLE `tb_chats` (
  `cd_chat` int(11) NOT NULL,
  `ds_message` varchar(500) DEFAULT NULL,
  `md_image` varchar(1000) DEFAULT NULL,
  `dt_creation` datetime DEFAULT NULL,
  `cd_main` int(11) NOT NULL,
  `cd_other` int(11) NOT NULL,
  `fk_conversa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_chats`
--

INSERT INTO `tb_chats` (`cd_chat`, `ds_message`, `md_image`, `dt_creation`, `cd_main`, `cd_other`, `fk_conversa`) VALUES
(-2147483648, 'sdfadsfdsafdsaf', NULL, '2021-02-05 19:59:24', 1275251979, 1667061383, 129831),
(1212321, 'Usuario mandou mensagem', NULL, '2020-11-21 16:34:12', 1275251979, 1667061383, 129831),
(1223419, 'Tecnico mandou mensagem', NULL, '2020-11-21 16:30:12', 1667061383, 1275251979, 129831),
(1282719, 'Usuario mandou mensagem', NULL, '2020-11-21 16:32:12', 1275251979, 1667061383, 129831),
(6681758, 'FSEFSEFSEF', NULL, '2020-11-22 01:54:02', 1667061383, 1667061383, 129831),
(93976849, 'gdrgdrgdrzg', NULL, '2020-11-22 01:52:54', 1667061383, 1667061383, 129831),
(100306898, 'Ola', NULL, '2020-11-23 17:31:17', 1275251979, 1667061383, 129831),
(131308156, 'Ola', NULL, '2020-11-22 02:35:28', 1667061383, 1667061383, 129831),
(159477702, 'SDRGRGDTHTRRFT', NULL, '2020-11-22 01:59:07', 1275251979, 1667061383, 129831),
(176978316, 'Ola', NULL, '2020-11-23 17:31:57', 1667061383, 1667061383, 129831),
(227243606, 'GSGSGRSGSEE', NULL, '2020-11-22 01:54:38', 1667061383, 1667061383, 129831),
(228416821, 'FESFEFSEFSEF', NULL, '2020-11-22 01:56:03', 1667061383, 1667061383, 129831),
(262639757, 'GSGSRGDSGDR', NULL, '2020-11-22 01:54:28', 1667061383, 1667061383, 129831),
(324116152, 'fcbhfgnjvgfnjc', NULL, '2020-11-22 02:42:02', 1667061383, 1667061383, 129831),
(357110704, '8', NULL, '2020-11-22 01:39:54', 1667061383, 1667061383, 129831),
(378309429, 'iuhfisue', NULL, '2020-11-22 21:53:18', 1667061383, 1667061383, 129831),
(442647809, 'jjjjjjj', NULL, '2020-11-22 02:28:45', 1275251979, 1667061383, 129831),
(520989906, 'Vai Brbrbrbrbrbr', NULL, '2021-02-05 19:54:43', 1275251979, 1667061383, 129831),
(527508582, 'GGGGGGGGGGGGGGGGGGGGGG', NULL, '2020-11-22 01:54:47', 1667061383, 1667061383, 129831),
(546725883, 'drgdrgrdgr', NULL, '2020-11-22 02:33:38', 1275251979, 1667061383, 129831),
(581083719, 'SRGDRSRDGSRDGD', NULL, '2020-11-22 01:56:28', 1667061383, 1667061383, 129831),
(583439488, 'grdgdhydthdtyhtr', NULL, '2020-11-22 01:51:37', 1667061383, 1667061383, 129831),
(586511095, 'Ola', NULL, '2020-11-22 21:51:41', 1667061383, 1667061383, 129831),
(623517204, 'yjgyjgyj', NULL, '2020-11-22 02:30:33', 1275251979, 1667061383, 129831),
(624273166, 'hfchtcfhfh', NULL, '2020-11-22 01:52:31', 1667061383, 1667061383, 129831),
(647802008, 'FESFIOEJSIOFSEF', NULL, '2020-11-22 01:55:23', 1667061383, 1667061383, 129831),
(670013346, 'EEEEEEEEEEEEEEEEEEEEEEEEE', NULL, '2020-11-22 01:58:33', 1667061383, 1667061383, 129831),
(673472619, 'kuhkhuku', NULL, '2020-11-22 02:30:20', 1275251979, 1667061383, 129831),
(732319308, 'Ola', NULL, '2020-11-23 16:22:37', 1275251979, 1667061383, 129831),
(763656344, 'EFRSEFSEGTSRTGR', NULL, '2020-11-22 01:56:39', 1667061383, 1667061383, 129831),
(770763668, 'fffffffffffffffffffffffffffffffff', NULL, '2020-11-22 01:35:19', 1667061383, 1667061383, 129831),
(782742180, 'vxdfgdxhdhbxdtfb', NULL, '2020-11-22 01:51:43', 1667061383, 1667061383, 129831),
(802727517, '6', NULL, '2020-11-22 01:39:50', 1667061383, 1667061383, 129831),
(811084105, 'esfsfseagtrger', NULL, '2020-11-22 01:34:09', 1275251979, 1667061383, 129831),
(850149072, 'asdfsdafasdfsad', NULL, '2021-02-05 20:01:33', 1275251979, 1667061383, 129831),
(888565560, 'afdsafsdsda', NULL, '2021-02-05 20:01:29', 1275251979, 1667061383, 129831),
(935363426, 'fewafseafee', NULL, '2021-02-05 20:18:40', 1275251979, 1667061383, 129831),
(936136964, 'dsfakufhsakufhweiuhf4iuwhu34', NULL, '2021-02-05 20:06:49', 1275251979, 1667061383, 129831),
(946481361, 'dsdawdawdaw', NULL, '2020-11-22 01:44:07', 1667061383, 1667061383, 129831),
(948936429, 'Ola', NULL, '2020-11-22 21:49:52', 1275251979, 1667061383, 129831),
(981782462, 'fsefsefsefeffefsfed', NULL, '2020-11-22 01:39:20', 1667061383, 1667061383, 129831),
(1002332866, 'Olá meu', NULL, '2021-02-05 19:52:30', 1275251979, 1667061383, 129831),
(1080209574, '123', NULL, '2020-11-22 02:28:59', 1275251979, 1667061383, 129831),
(1120823944, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '2020-11-22 01:41:18', 1667061383, 1667061383, 129831),
(1125591203, 'asdfdsafsdfsdfsd', NULL, '2021-02-05 20:01:38', 1275251979, 1667061383, 129831),
(1149177195, 'fsefesfse', NULL, '2020-11-22 02:29:38', 1275251979, 1667061383, 129831),
(1159750451, 'oeidhfeoafhorweihiofw4', NULL, '2021-02-05 20:06:41', 1667061383, 1275251979, 129831),
(1196790295, 'fsdafdsafsafsdf', NULL, '2021-02-05 20:03:35', 1667061383, 1275251979, 129831),
(1202573034, 'gdgdetrdhtdh', NULL, '2020-11-22 01:42:13', 1667061383, 1667061383, 129831),
(1207619226, 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF', NULL, '2020-11-22 01:55:36', 1667061383, 1667061383, 129831),
(1211419775, 'sddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL, '2020-11-23 05:33:47', 1275251979, 1667061383, 129831),
(1212421234, 'Olá meu amigo', NULL, '2021-02-05 19:51:58', 1667061383, 1275251979, 129831),
(1241794028, 'lll', NULL, '2020-11-22 02:29:04', 1275251979, 1667061383, 129831),
(1319488313, 'aerfrsetgestsertyseb5', NULL, '2020-11-22 01:31:10', 1275251979, 1667061383, 129831),
(1321028095, 'lllllllllll', NULL, '2020-11-22 02:30:25', 1275251979, 1667061383, 129831),
(1333087021, 'ofjigdorijgd', NULL, '2020-11-22 02:40:02', 1275251979, 1667061383, 129831),
(1355979018, 'flakjsdfhsdlkjfhsdaf', NULL, '2021-02-05 20:03:27', 1275251979, 1667061383, 129831),
(1364765665, 'GRGSGSRGERG', NULL, '2020-11-22 01:54:54', 1667061383, 1667061383, 129831),
(1386527431, 'gfdsgdfsgdfgfds', NULL, '2021-02-05 20:04:55', 1275251979, 1667061383, 129831),
(1398470722, 'orjsgíjrg', NULL, '2020-11-22 02:39:55', 1275251979, 1667061383, 129831),
(1403764753, 'fsdfsdfsdfsdf', NULL, '2020-11-22 02:37:03', 1667061383, 1667061383, 129831),
(1448973862, 'dawdawdwadawdafgegery', NULL, '2020-11-22 01:45:43', 1667061383, 1667061383, 129831),
(1516720468, 'fasdfsdfdsaf', NULL, '2021-02-05 19:45:54', 1275251979, 1667061383, 129831),
(1517596238, '1', NULL, '2020-11-22 01:39:57', 1667061383, 1667061383, 129831),
(1550571188, 'hhhhhhhhhhhhhhhhhhhhh', NULL, '2020-11-22 02:28:37', 1275251979, 1667061383, 129831),
(1551448314, 'Primeira mensagem séria', NULL, '2021-02-05 19:49:46', 1275251979, 1667061383, 129831),
(1570547057, 'fgdfgdgtertdrybd5byd', NULL, '2020-11-22 01:37:20', 1667061383, 1667061383, 129831),
(1588392440, 'FFFFFFFFFFFFFFFFFFFFFFFF', NULL, '2020-11-22 01:58:30', 1667061383, 1667061383, 129831),
(1674860380, 'dfsfsdfsdafdasfdsasd', NULL, '2021-02-07 02:14:43', 1275251979, 1667061383, 129831),
(1685855412, 'llll', NULL, '2020-11-22 02:28:50', 1275251979, 1667061383, 129831),
(1686842609, 'FSEFSEFSEF', NULL, '2020-11-22 01:58:27', 1667061383, 1667061383, 129831),
(1693664413, 'gddrgrdhtdrhdtr', NULL, '2020-11-22 01:52:22', 1667061383, 1667061383, 129831),
(1718761658, '3', NULL, '2020-11-22 01:40:01', 1667061383, 1667061383, 129831),
(1724298225, 'fdgsdgfsdgsgsdgf', NULL, '2020-11-22 01:30:19', 1275251979, 1667061383, 129831),
(1724993456, 'dasfsdf', NULL, '2021-02-05 20:03:36', 1275251979, 1667061383, 129831),
(1790570751, 'GSGDHGTRHYTRDHGTR', NULL, '2020-11-22 01:54:18', 1667061383, 1667061383, 129831),
(1793717055, 'waifouaweoiawoi', NULL, '2021-02-05 20:06:39', 1275251979, 1667061383, 129831),
(1798501603, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '2020-11-22 01:41:06', 1667061383, 1667061383, 129831),
(1833675340, 'Vai brazilian', NULL, '2021-02-05 20:02:52', 1275251979, 1667061383, 129831),
(1838157757, 'gjyjgyjgyjgy', NULL, '2020-11-22 02:40:43', 1667061383, 1667061383, 129831),
(1844918910, 'fdbegfdgdfgsdgsfdgds', NULL, '2021-02-05 20:20:15', 1667061383, 3162, 191677497),
(1908438987, 'sdfsdfsdfsdf', NULL, '2020-11-22 02:37:00', 1667061383, 1667061383, 129831),
(1912750687, 'gsxdrhhdth dtrh drt h', NULL, '2020-11-22 01:46:30', 1667061383, 1667061383, 129831),
(1918305431, '\\Vai brazilaina', NULL, '2021-02-05 20:04:34', 1275251979, 1667061383, 129831),
(1939911080, 'hdttfdhtfdhtf', NULL, '2020-11-22 01:53:00', 1667061383, 1667061383, 129831),
(1952099044, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '2020-11-22 01:41:29', 1667061383, 1667061383, 129831),
(1952842246, 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFF', NULL, '2020-11-22 01:58:07', 1667061383, 1667061383, 129831),
(1991206759, 'adsfdsfdsfsadfdsfasd', NULL, '2021-02-05 20:16:17', 1667061383, 17, 255828455),
(2016270234, 'fsdfsdfsefsefse', NULL, '2020-11-22 01:32:00', 1275251979, 1667061383, 129831),
(2052770507, 'asdfsadfdsafsadf', NULL, '2021-02-05 19:46:25', 1275251979, 1667061383, 129831),
(2054360400, 'lgherhiureshgurdhue', NULL, '2021-02-05 20:06:17', 1667061383, 1275251979, 129831),
(2055442229, 'adfuhsluewiufwiuhe', NULL, '2021-02-05 20:06:52', 1667061383, 1275251979, 129831),
(2066957481, 'lllllllllllllll', NULL, '2020-11-22 02:30:30', 1275251979, 1667061383, 129831),
(2070144786, 'awreewfewaew', NULL, '2021-02-05 19:59:58', 1275251979, 1667061383, 129831),
(2072819064, 'fffffffffffffffffffffffffffffffffffff', NULL, '2020-11-22 01:38:33', 1667061383, 1667061383, 129831),
(2109876970, 'rdgdrgrdgsr', NULL, '2020-11-22 01:51:46', 1667061383, 1667061383, 129831),
(2119266480, '5423252', NULL, '2020-11-22 01:40:04', 1667061383, 1667061383, 129831),
(2139195883, 'sdafhlgfadsjhgsfahsfd', NULL, '2021-02-05 20:06:19', 1275251979, 1667061383, 129831),
(2147483647, 'sssssssssssssssssssssssssssssssss', NULL, '2020-11-22 01:27:44', 1275251979, 1667061383, 129831);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conversas`
--

CREATE TABLE `tb_conversas` (
  `cd_conversa` int(11) NOT NULL,
  `ic_unread` char(1) DEFAULT 'n',
  `dt_modification` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_creation` datetime DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_tecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_conversas`
--

INSERT INTO `tb_conversas` (`cd_conversa`, `ic_unread`, `dt_modification`, `dt_creation`, `fk_usuario`, `fk_tecnico`) VALUES
(129831, 'n', '2020-11-15 20:16:37', '2020-11-15 17:14:20', 1275251979, 1667061383),
(191677497, 'n', '2021-02-05 23:20:08', '2021-02-05 20:20:08', 3162, 1667061383),
(255828455, 'n', '2021-02-05 23:16:10', '2021-02-05 20:16:10', 17, 1667061383),
(864027049, 'n', '2021-02-08 02:00:47', '2021-02-07 23:00:47', 1275251979, 31749324),
(1827619386, 'n', '2021-02-05 23:19:24', '2021-02-05 20:19:24', 74674, 1667061383);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formularios`
--

CREATE TABLE `tb_formularios` (
  `cd_formulario` int(11) NOT NULL,
  `qt_pontos_totais` int(11) NOT NULL,
  `cd_tec_usu` int(11) NOT NULL,
  `fk_problema` int(11) NOT NULL,
  `fk_pergunta` int(11) NOT NULL,
  `fk_resposta` int(11) NOT NULL,
  `fk_modelo` int(11) NOT NULL,
  `fk_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `cd_marca` int(11) NOT NULL,
  `nm_marca` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `cd_modelo` int(11) NOT NULL,
  `nm_modelo` varchar(18) DEFAULT NULL,
  `fk_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perguntas`
--

CREATE TABLE `tb_perguntas` (
  `cd_pergunta` int(11) NOT NULL,
  `ds_perguntas` varchar(200) NOT NULL,
  `fk_resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_problemas`
--

CREATE TABLE `tb_problemas` (
  `cd_problema` int(11) NOT NULL,
  `nm_problema` varchar(20) NOT NULL,
  `fk_pergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_respostas`
--

CREATE TABLE `tb_respostas` (
  `cd_resposta` int(11) NOT NULL,
  `ds_resposta` varchar(50) DEFAULT NULL,
  `qt_pontos` int(11) NOT NULL,
  `fk_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tecnicos`
--

CREATE TABLE `tb_tecnicos` (
  `cd_tecnico` int(11) NOT NULL,
  `nm_tecnico` varchar(80) NOT NULL,
  `ds_email` varchar(80) NOT NULL,
  `ds_senha` varchar(96) DEFAULT NULL,
  `ds_telefone` varchar(14) NOT NULL,
  `sg_estado` char(2) NOT NULL,
  `nm_cidade` varchar(90) NOT NULL,
  `ds_endereco` varchar(120) NOT NULL,
  `qt_numero_complementar` int(11) DEFAULT NULL,
  `ic_premium` char(1) DEFAULT 'n',
  `md_picture` varchar(1000) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tecnicos`
--

INSERT INTO `tb_tecnicos` (`cd_tecnico`, `nm_tecnico`, `ds_email`, `ds_senha`, `ds_telefone`, `sg_estado`, `nm_cidade`, `ds_endereco`, `qt_numero_complementar`, `ic_premium`, `md_picture`) VALUES
(14, 'Kauê Arthur da Rocha', 'kauearthurdarocha__kauearthurdarocha@flexvale.com.br', '56uGiOsU9y', '14991386604', 'SP', 'Bauru', 'Vila Viana, 940', NULL, 'n', 'user.jpg'),
(15, 'Tatiane Rosa Evelyn da Conceição', 'tatianerosaevelyndaconceicao..tatianerosaevelyndaconceicao@fundasa.com.br', 'g6l8cBDlfj', '42998430170', 'Gu', 'Rua Fortunato Rodrigues de Moraes, 42', 'PR', NULL, 'n', 'user.jpg'),
(16, 'Ayla Mariah Mirella Aparício', 'aylamariahmirellaaparicio..aylamariahmirellaaparicio@etirama.com.br', '0rjNjNnjjF', '27994376223', 'Ar', 'Rua do Triunfo, 34', 'ES', NULL, 'n', 'user.jpg'),
(17, 'Carlos Cláudio Iago Peixoto', 'carlosclaudioiagopeixoto__carlosclaudioiagopeixoto@realweb.com.br', 'ul8HczxJXD', '84995774003', 'Na', 'Rua Professor Lobo, 32', 'RN', NULL, 'n', 'user.jpg'),
(18, 'Emanuel Diogo Vieira', 'emanueldiogovieira_@riguetti.com.br', 'GsckcGiOu3', '67992672075', 'Ca', 'Rua Senador José Ferreira de Souza, 201', 'MS', NULL, 'n', 'user.jpg'),
(19, 'Luana Sebastiana Malu Monteiro', 'lluanasebastianamalumonteiro@soluxenergiasolar.com.br', 'kFdpJa9RG2', '68981827763', 'Ri', 'Rua Otília Coelho Netto, 302', 'AC', NULL, 'n', 'user.jpg'),
(20, 'Isadora Maya Louise da Mota', 'isadoramayalouisedamota_@sp.senac.com.br', 'Fe1O11F6eQ', '62982086990', 'Go', 'Rua 7, 401', 'GO', NULL, 'n', 'user.jpg'),
(21, 'Enrico Severino Nogueira', 'eenricoseverinonogueira@senioraereo.com.br', 'sm2wo5ep5T', '62994616867', 'Go', 'Rua Carlos Gomes, 899', 'GO', NULL, 'n', 'user.jpg'),
(22, 'Rafaela Isabelly Vitória da Rocha', 'rrafaelaisabellyvitoriadarocha@lojabichopapao.com.br', 'lRKy1GqNsR', '68985204733', 'Ri', 'Rua A 24, 407', 'AC', NULL, 'n', 'user.jpg'),
(23, 'Esther Pietra Raquel da Mata', 'estherpietraraqueldamata__estherpietraraqueldamata@tigra.com.br', 'SfNCuJ3rRc', '19981524701', 'Ca', 'Rua Apurinã, 30', 'SP', NULL, 'n', 'user.jpg'),
(24, 'Bruno Samuel Baptista', 'bbrunosamuelbaptista@outershoes.com.br', 'e7ocT2zbKX', '91984238516', 'Be', 'Rua José Antônio Botasso, 13', 'PA', NULL, 'n', 'user.jpg'),
(25, 'Luiza Sophia Lopes', 'luizasophialopes__luizasophialopes@coraza.com.br', 'im4BpmJMS7', '69982671903', 'Po', 'Rua C, 608', 'RO', NULL, 'n', 'user.jpg'),
(26, 'Leonardo Mário Silveira', 'leonardomariosilveira-97@goldfinger.com.br', 'RKL39Nb4mh', '85984846313', 'Fo', 'Rua Osório, 507', 'CE', NULL, 'n', 'user.jpg'),
(27, 'Sebastião Erick Leonardo', 'sebastiaoerickleonardorocha_@power.alston.com', 'L8Bfk7EOwU', '(54)98715-0080', 'RS', 'Caxias do Sul', 'Rua Goiás, 638', NULL, 'n', 'user.jpg'),
(28, 'Joana Liz da Conceição', 'joanalizdaconceicao_@umbernardo.com.br', 'EDsAnO7Si8', '(98)98658-0967', 'MA', 'Imperatriz', 'Rua Um, 894', NULL, 'n', 'user.jpg'),
(30, 'Clarice Vanessa Cecília Pereira', 'claricevanessaceciliapereira-76@ibest.com.br', 'R6PXWApfSI', '(28)98487-1038', 'ES', 'Cachoeiro de Itapemirim', 'Rua Agildo Romero, 976', NULL, 'n', 'user.jpg'),
(31, 'Raul Renan Fábio Mendes', 'raulrenanfabiomendes@betti.com.br', 'burLj0FYU2', '(27)98324-2073', 'ES', 'Vila Velha', 'Rua Mangabeira, 820', NULL, 'n', 'user.jpg'),
(32, 'Bento Felipe Pires', 'bentofelipepires_@ddfnet.com.br', 'HjysUboi0S', '(27)98254-4789', 'ES', 'Vitória', 'Rua Goiás, 765', NULL, 'n', 'user.jpg'),
(34, 'Cristiane Allana Assis', 'cristianeallanaassis@vizzacchi.com.br', 'CNZcc3I5aA', '(61)98969-5899', 'DF', 'Brasília', 'Avenida Raimundo Ludgero, 620', NULL, 'n', 'user.jpg'),
(35, 'Nelson Augusto Paulo Moreira', 'nnelsonaugustopaulomoreira@outlook.com', 'bj2PHdnhC4', '(95)98164-0562', 'RR', 'Boa Vista', 'Rua Ecildon de Souza Pinto, 523', NULL, 'n', 'user.jpg'),
(36, 'Gabrielly Lara da Costa', 'gabriellylaradacosta@imaxbrasil.com.br', 'FJHu3ahIXh', '(63)98420-6402', 'TO', 'Lizarda', 'Praça de Lizarda M. Freitas, 123', NULL, 'n', 'user.jpg'),
(37, 'Roberto Benício Drumond', 'robertobeniciodrumond@andrelam.com.br', 'ikwDZ1zTHt', '(44)98822-7727', 'PR', 'Umuarama', 'Rua F, 412', NULL, 'n', 'user.jpg'),
(38, 'Marcela Emilly Aparício', 'marcelaemillyaparicio@nelsonalfredoimoveis.com.br', '3TnLszOzRC', '(79)98409-0416', 'SE', 'Aracaju', 'Rua Doutor Álvaro Santana, 145', NULL, 'n', 'user.jpg'),
(39, 'Lavínia Emanuelly da Silva', 'laviniaemanuellydasilva_@gilbertorodrigues.com', 'TCgz9dYZXa', '(45)98689-5204', 'PR', 'Toledo', 'Rua Crispin Soares, 325', NULL, 'n', 'user.jpg'),
(198, 'Ohaiou', 'ohaiou.sagacidade@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(278, 'Daga Kotoaru', 'lucas.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(11)40028-9220', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(326, 'Oferjendos', 'oferjendos.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(399, 'Wàguynnêr', 'waguynner.mito@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(8892, 'Lionerferdes', 'lionerferdes.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(16433, 'Samanaeul', 'samanaeul.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(31681, 'Wiukson', 'wiukson.exemplo@gmail.com', 'hewrw323e3h289efw', '(13)12345-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(84724, 'Rodigen', 'rodigen.exemplo@gmail.com', 'h2esfefu4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(84726, 'Boris', 'boris.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(84787, 'Khaterynny', 'khaterynny.exemplo@gmail.com', 'h2eihefy49hwehw9efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(102347, 'Forgues', 'forgues.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(328689, 'Elizabety', 'liz.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(389798, 'Valdisnei', 'valdisnei.exemplo@gmail.com', 'h2eh389r33h289efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(763421, 'Lucas Fontes', 'lucas.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(11)40028-9220', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1283238, 'Ricardinho', 'ricardo.sagacidade@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1423244, 'Yhasmin', 'yhasmin.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(3242137, 'Joelsmison', 'joelsmison.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(3742984, 'Ranyele', 'rany.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(3764283, 'Emanuelis', 'emanu.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(9824390, 'Bia B.', 'beatriz.exemplo@gmail.com', 'h2esfefu4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(11238239, 'Raquel', 'raquel.exemplo@gmail.com', 'hewrw323e3h289efw', '(13)12345-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(11738723, 'Enzo', 'enzo.exemplo@gmail.com', 'h2eihefy49hwehw9efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(12376382, 'Isabela', 'isa.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(12828218, 'Mariah', 'mariah.exemplo@gmail.com', 'h2eh389r33h289efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(31749324, 'Rodrigo', 'midorima.mito@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(37423981, 'Sabrina', 'sabrina.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(39840291, 'Duda', 'duda.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(327957174, 'Lucas Fontes de Oliveira', '012389dfsdf@gmail.com', '123', '(13) 9911-2117', 'PB', 'SV', 'Rua dos bobos', 123, 'n', 'user.jpg'),
(387429382, 'Gabriel Cardoso', 'cardoso.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', '(13)18298-1212', 'SP', 'São Vicente', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1026504190, 'Lucas Fontes de Oliveira', 'teste2077@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$OXpZNHFORDloMThGdnd5ZA$IXLPPeF', '(13)981128023', 'MG', 'SV', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1212004181, 'Bruha', 'brunes@bool.com', '$argon2i$v=19$m=65536,t=4,p=1$a3VlTDJraThMTXc1L3FxVQ$9LA4vNp50G+znkDBnSgtNQ4MlaxtJUUyitqKFeixYco', '13981128023', 'PB', 'Sopa', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1266151061, 'Lucas Fontes', 'teste2@bol.com', '123', '(13) 9911-2117', 'MA', 'São juuj', 'Rua dos bobos', 123, 'n', 'user.jpg'),
(1591193764, 'Lucas Fontes de Oliveira', 'jooj34@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eW1GOEJpTElCRGY0eDE2TA$RxanAHk', '(13) 991121171', 'PA', 'ddddddddd', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(1667061383, 'Lucas Fontes de Oliveira', 'lolipop@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$VjBvVTY5VnkvUk5NMndRZg$v0EBmHavuRcXRHaJhFm15xN9X6IPqo9ou2m1+8wwiac', '(13)981128023', 'ES', 'São Jooj', 'Rua dos bobos', 0, 'n', 'image 6cesar.svg'),
(1695626931, 'Lucas ', 'jooj@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '(13)991121171', 'MS', 'São Jooj', 'Rua dos bobos', 0, 'n', 'user.jpg'),
(2147483647, 'Lucas Fontes de Oliveira', '12jooj@gmail.com', '123', '55555555555555', 'PE', 'São juuj', 'Rua dos bobos', 0, 'n', 'user.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(80) NOT NULL,
  `ds_email` varchar(80) NOT NULL,
  `ds_senha` varchar(96) DEFAULT NULL,
  `md_Picture` varchar(1000) DEFAULT 'user.jpg',
  `dt_Online` datetime DEFAULT NULL,
  `ds_telefone` varchar(14) NOT NULL,
  `sg_estado` char(2) NOT NULL,
  `nm_cidade` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`cd_usuario`, `nm_usuario`, `ds_email`, `ds_senha`, `md_Picture`, `dt_Online`, `ds_telefone`, `sg_estado`, `nm_cidade`) VALUES
(0, 'Lucas Fontes de Oliveira', 'lucas.fontes04@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OFdOVFlMcVpSV0hDdVhmcg$flI4VXoYpURV1m8KoryZnqZ1Rncvv9f8pcznYfRx6Y0', 'user.jpg', NULL, '13981128023', 'PE', 'Sopa'),
(14, 'Anthony Nunes', 'anthony.nunes@gmail.com', '12345', 'user.jpg', '2020-08-13 20:17:45', '400289202', 'SP', 'São Vicente'),
(15, 'Arthur Alves', 'arthur.alves123@hotmail.com', '54321', 'user.jpg', '2020-08-13 20:17:45', '593827184', 'RJ', 'Copacabana'),
(16, 'Edson Elias Jesus', 'edsoneliasjesus__edsoneliasjesus@flir.com.br', 'w2HTm3ipnD', 'user.jpg', '2020-08-13 20:17:50', '(84) 98423-451', 'RN', 'Parnamirim'),
(17, 'Thales Guilherme Vitor Drumond', 'tthalesguilhermevitordrumond@michaelpage.com.br', 'RL11MgiDjH', 'user.jpg', '2020-08-13 20:21:50', '(84) 98953-335', 'RN', 'Natal'),
(18, 'Camila Luna Fogaça', 'camilalunafogaca_@gigaonline.com.br', 'jQiuHz7s3Z', 'user.jpg', '2020-08-13 20:27:50', '(63) 99721-458', 'TO', 'Araguaína'),
(19, 'Danilo Pedro Oliveira', 'danilopedrooliveira_@valparaibaimoveis.com.br', '1AqLgZ5ZuL', 'user.jpg', '2020-08-13 20:54:50', '(96) 99718-938', 'AP', 'Macapá'),
(20, 'Tiago Francisco André Teixeira', 'tiagofranciscoandreteixeira-75@lphbrasil.com.br', 'oZXgFdB1Il', 'user.jpg', '2020-08-13 20:17:50', '(82) 99655-277', 'AL', 'Arapiraca'),
(21, 'Louise Allana Manuela Ribeiro', 'louiseallanamanuelaribeiro-78@tecnew.net', 'YHBZWxKgIr', 'user.jpg', '2020-08-13 21:17:50', '(79) 99614-414', 'SE', 'Aracaju'),
(22, 'Rafael Sérgio Carlos Carvalho', 'rafaelsergiocarloscarvalho_@lanchesdahora.com.br', 'YmdfDTcGXP', 'user.jpg', '2020-08-13 21:17:50', '(92) 98225-914', 'AM', 'Manaus'),
(23, 'Luna Mariah Isabela Nogueira', 'isabelanogueira@ambarnet.com.br', 'ewFS6EeHRM', 'user.jpg', '2020-10-13 20:17:50', '(77) 99107-141', 'BA', 'Vitória da Conquista'),
(24, 'Bryan César Corte Real', 'bryancesarcortereal-98@hotmail.de', 'efgYJki9Ui', 'user.jpg', '2020-08-13 20:37:50', '(11) 98314-659', 'SP', 'Osasco'),
(25, 'Isaac Davi Manuel Carvalho', 'iisaacdavimanuelcarvalho@transportadoratransdel.com.br', '0rKMDfYkwN', 'user.jpg', '2020-08-13 20:19:50', '(34) 99307-198', 'MG', 'Patos de Minas'),
(26, 'Emilly Benedita Moura', 'emillybeneditamoura@fernandesfilpi.com.br', 'SajGnrRNeO', 'user.jpg', '2020-08-13 22:19:50', '(92) 98273-218', 'AM', 'Manaus'),
(27, 'Nathan Vinicius Luan Moura', 'nathanviniciusluanmoura-93@hotmail.com', 'lMkyXuDXC2', 'user.jpg', '2020-07-20 17:45:03', '(85) 2633-6383', 'Fo', 'CE'),
(28, 'Raquel Andrea Almeida', 'nathanviniciusluanmoura-93@gmail.com', 'wRJdWqTyu7', 'user.jpg', '2020-07-22 13:20:43', '(16) 98311-128', 'SP', 'Matão'),
(29, 'Alessandra Sandra de Paula', 'alessandrasandradepaula-99@eccofibra.com.br', 'xRE8XDbRfq', 'user.jpg', '2020-07-22 14:35:53', '(84)98676-6832', 'RN', 'Mossoró'),
(30, 'Raul Igor Galvão', 'rauligorgalvao__@ideiaviva.com.br', '4GJ3kte3qT', 'user.jpg', '2020-07-22 09:23:41', '(35)98108-5542', 'MG', 'Belo Horizonte'),
(31, 'Pietra Rosângela Sandra', 'pietrarosangelasandrasantos@brasildakar.com.br', '7xwON2ELZI', 'user.jpg', '2020-07-22 09:24:00', '(92)3616-5068', 'AM', 'Manaus'),
(32, 'Danilo Yuri Almada', 'daniloyurialmada-85@tirel.com.br', 'I55oPY39UD', 'user.jpg', '2020-07-22 09:24:00', '(92)98497-4620', 'AM', 'Manaus'),
(33, 'Joaquim Emanuel Kevin Fogaça', 'joaquimemanuelkevinfogaca-74@victorseguros.com.br', 'zdT6TyqdYk', 'user.jpg', '2020-08-02 10:17:07', '(64)99936-6632', 'GO', 'Catalão'),
(34, 'Renato Leandro das Neves', 'renatoleandrodasneves_@gmail.com', 'KZuO8r4LC1', 'user.jpg', '2020-08-03 15:32:00', '(81)98291-1024', 'PE', 'Recife'),
(35, 'Sophia Nina Alessandra', 'ssophianinaalessandra@cvc.com.br', 's4T1dTKGh7', 'user.jpg', '2020-08-03 16:04:00', '(34)98201-7735', 'MG', 'Patos de Minas'),
(36, 'Brenda Heloise Nunes', 'brendaheloisenunes@outlook.com', 'tEwG0xOTJ5', 'user.jpg', '2020-08-03 20:37:50', '(21)99846-3549', 'RJ', 'Rio de Janeiro'),
(37, 'Sophia Manuela Moreira', 'sophiamanuelamoreira_@inepar.com.br', 'Wz8TFLl40z', 'user.jpg', '2020-08-03 20:39:20', '(67)98609-6104', 'MS', 'Ponta Porã'),
(38, 'Noah Matheus Luiz da Silva', 'nnoahmatheusluizdasilva@regler.com.br', '8hNfPqnKKL', 'user.jpg', '2020-08-03 21:17:57', '(82)99349-2086', 'AL', 'Arapiraca'),
(39, 'Sebastião Erick Leonardo', 'sebastiaoerickleonardorocha_@power.alston.com', 'L8Bfk7EOwU', 'user.jpg', '2020-08-03 21:59:27', '(54)98715-0080', 'RS', 'Caxias do Sul'),
(193, 'Lucas Fontes de Oliveira', '12jooj@gmail.com', '123', 'user.jpg', NULL, '55555555555555', 'RN', 'São Jooj'),
(578, 'Lucas Looooooll', 'lucas.fontes04@gmail.com', '123', 'user.jpg', NULL, '55555555555555', 'AM', 'santos'),
(3162, 'Leonardo Da Vinci', 'leo.genio@gmail.com', 'hewrw323e3h289efw', 'user.jpg', '2020-07-15 13:20:30', '(13)12345-1212', 'SP', 'São Vicente'),
(7613, 'Ada Bairon', 'ada.algo@gmail.com', 'h2eihefy49hwehw9efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(8713, 'Diego Fernandes', 'diego.rocket@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(17362, 'Nikola Tesla', 'nikola.tesla_coil@gmail.com', 'h2eh389r33h289efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(24633, 'Tony Stark', 'jarvis.friday.edith@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(34681, 'Lucas Fontes de Oliveira', 'lucas.fontes04@gmail.com', '$2b$10$BKwsRG5Tix34vMJySMtqGOP5uCkQ4LzXEg0GnvYNiClzF/23OnkCe', 'user.jpg', NULL, '12312312312312', 'PB', 'Sopa'),
(39382, 'Thomas Edson', 'thomas.thief@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(74342, 'Numdig', 'number.digit@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(11)40028-9220', 'SP', 'São Vicente'),
(74674, 'Deus', 'godlike@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(187639, 'Marrie Currie', 'radio.nobel@gmail.com', 'h2esfefu4309efw', 'user.jpg', '2020-08-15 18:50:30', '(13)18298-1212', 'SP', 'São Vicente'),
(318787, 'Albert Einstein', 'nuclear.quantum@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(763421, 'Lucas Fontes', 'lucas.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(11)40028-9220', 'SP', 'São Vicente'),
(817474, 'Monty Oum', 'role.of.cool@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(847267, 'JK Rouling', 'avada.kedavra@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(1283238, 'Ricardinho', 'ricardo.sagacidade@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(1423244, 'Yhasmin', 'yhasmin.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(3742984, 'Ranyele', 'rany.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(3764283, 'Emanuelis', 'emanu.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(4742623, 'Mayky Brito', 'maiky.rocket@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(9824390, 'Bia B.', 'beatriz.exemplo@gmail.com', 'h2esfefu4309efw', 'user.jpg', '2020-08-15 18:50:30', '(13)18298-1212', 'SP', 'São Vicente'),
(11238239, 'Raquel', 'raquel.exemplo@gmail.com', 'hewrw323e3h289efw', 'user.jpg', '2020-07-15 13:20:30', '(13)12345-1212', 'SP', 'São Vicente'),
(11738723, 'Enzo', 'enzo.exemplo@gmail.com', 'h2eihefy49hwehw9efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(12376382, 'Isabela', 'isa.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(12828218, 'Mariah', 'mariah.exemplo@gmail.com', 'h2eh389r33h289efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(31749324, 'Rodrigo', 'midorima.mito@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(34086432, 'Lucas Fontes de Oliveira', '12lucas.fontes04@gmail.com', '123', 'user.jpg', NULL, '55555555555555', 'RN', 'São juuj'),
(37423981, 'Sabrina', 'sabrina.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(39840291, 'Duda', 'duda.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(89723874, 'Alan Turring', 'ia.enigmacracker@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(191658398, 'Bicano de Soulza', 'teste24@bol.com', '123', 'user.jpg', NULL, '123921', 'SP', 'São Vicente'),
(239151720, 'Lucas Fontes de Oliveira', 'joghoj@gmail.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'MS', 'SV'),
(387429382, 'Gabriel Cardoso', 'cardoso.exemplo@gmail.com', 'h2ehr4uryh4i3u4309efw', 'user.jpg', '2020-08-15 18:20:30', '(13)18298-1212', 'SP', 'São Vicente'),
(411331251, 'Lucas Fontes de Oliveira', 'dfdsafsdfda2@bol.com', '123', 'user.jpg', NULL, '(13) 1418-1212', 'MS', 'santos'),
(598260417, 'Lucas Fontes de Oliveira', 'ewafawlfk@gmail.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'MG', 'Sopa'),
(665979562, 'Lucas Fontes de Oliveira', 'faoihsdoi@gmail.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'PI', 'Sopa'),
(841963902, 'Lucas Fontes de Oliveira', 'hacker@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user.jpg', NULL, '(13)981128023', 'PE', 'SV'),
(955832935, 'Bruna', 'bruna@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$d1hNZUpkdnNWZ09SZDhpNQ$WZDuP6UeYqto2LzeDNY6gsodGjqvFYVsy6HN2PnUnCg', 'user.jpg', NULL, '(13)981128023', 'ES', 'Sopa'),
(1067362028, 'Lucas Fontes', 'afsdfadsffda@gmail.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'PB', 'SV'),
(1194690004, 'Lucas Fontes de Oliveira', 'dasfjbsdaf@bol.com', '123', 'user.jpg', NULL, '(13) 9911-2117', 'RN', 'São juuj'),
(1275251979, 'Lucas Fontes 43', 'teste16@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$VjBvVTY5VnkvUk5NMndRZg$v0EBmHavuRcXRHaJhFm15xN9X6IPqo9ou2m1+8wwiac', 'image 5lucas.svg', NULL, '(13)981128023', 'SP', 'São Vicente'),
(1327645288, 'Lucas Fontes de Oliveira', 'hgjhste@bol.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'MS', 'São Jooj'),
(1407527930, 'Lucas Fontes de Oliveira', 'fdsalfhdasio@bol.com', '123', 'user.jpg', NULL, '(13) 9911-2117', 'PA', 'santos'),
(1428233162, 'Lucas Fontes de Oliveira', 'teste@bol.com', '$argon2i$v=19$m=65536,t=4,p=1$alZ6WEgvSUdDYWV5MHM4Sg$/ceyOU7', 'user.jpg', NULL, '(13)981128023', 'PA', 'Sopa'),
(1531194918, 'Lucas', 'addhask@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'user.jpg', NULL, '13141812121232', 'Es', 'São juuj'),
(1747035980, 'Lucas Fontes', 'dasfadsfs@bol.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'PB', 'São juuj'),
(1900355025, 'Lucas Fontes de Oliveira', 'tentativa@bol.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'PA', 'Sopa'),
(2049908267, 'Lucas Fontes de Oliveira', 'hjgygu@bol.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'MS', 'São Jooj'),
(2136321646, 'Lucas Fontes de Oliveira', 'jlhiugu@bol.com', '123', 'user.jpg', NULL, '(13) 9811-2802', 'MS', 'São Jooj'),
(2147483647, 'Lucas Fontes ', 'fontes04@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user.jpg', NULL, '13141812121232', 'PR', 'São juuj');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_chats`
--
ALTER TABLE `tb_chats`
  ADD PRIMARY KEY (`cd_chat`),
  ADD KEY `fk_conversa` (`fk_conversa`);

--
-- Índices para tabela `tb_conversas`
--
ALTER TABLE `tb_conversas`
  ADD PRIMARY KEY (`cd_conversa`),
  ADD KEY `fk_usuario` (`fk_usuario`),
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
-- Índices para tabela `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  ADD PRIMARY KEY (`cd_tecnico`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_chats`
--
ALTER TABLE `tb_chats`
  ADD CONSTRAINT `fk_conversa` FOREIGN KEY (`fk_conversa`) REFERENCES `tb_conversas` (`cd_conversa`);

--
-- Limitadores para a tabela `tb_conversas`
--
ALTER TABLE `tb_conversas`
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`fk_tecnico`) REFERENCES `tb_tecnicos` (`cd_tecnico`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `tb_usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_formularios`
--
ALTER TABLE `tb_formularios`
  ADD CONSTRAINT `fk_problema` FOREIGN KEY (`fk_problema`) REFERENCES `tb_problemas` (`cd_problema`),
  ADD CONSTRAINT `tb_formularios_ibfk_1` FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`),
  ADD CONSTRAINT `tb_formularios_ibfk_2` FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`),
  ADD CONSTRAINT `tb_formularios_ibfk_3` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`),
  ADD CONSTRAINT `tb_formularios_ibfk_4` FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`);

--
-- Limitadores para a tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`fk_marca`) REFERENCES `tb_marcas` (`cd_marca`);

--
-- Limitadores para a tabela `tb_perguntas`
--
ALTER TABLE `tb_perguntas`
  ADD CONSTRAINT `fk_resposta` FOREIGN KEY (`fk_resposta`) REFERENCES `tb_respostas` (`cd_resposta`);

--
-- Limitadores para a tabela `tb_problemas`
--
ALTER TABLE `tb_problemas`
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`fk_pergunta`) REFERENCES `tb_perguntas` (`cd_pergunta`);

--
-- Limitadores para a tabela `tb_respostas`
--
ALTER TABLE `tb_respostas`
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`fk_modelo`) REFERENCES `tb_modelos` (`cd_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
