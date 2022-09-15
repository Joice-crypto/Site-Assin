
-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 27/07/2022 às 10:24
-- Versão do servidor: 10.1.38-MariaDB-0+deb9u1
-- Versão do PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ASSIN_DB`Cards_IDCards_ThumbnailUsers_ID_FK_AuthorUsers_ID_FK_LastEditionAuthorcarouselimages
--

-- --------------------------------------------------------

--

((SELECT DepoimentosID, Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor,
IJ1.Users_Name, IJ2.Users_Name, DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description,
 DepoimentosTranslations_Content FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.DepoimentosID = DepoimentosTranslations.DepoimentosID_FK
 INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Depoimentos.Users_ID_FK_Author
 INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Depoimentos.Users_ID_FK_LastEditionAuthor WHERE DepoimentosTranslations.DepoimentosTranslations_Language = ?));

-- Estrutura para tabela `ActivityLogs`
--

CREATE TABLE `ActivityLogs` (
  `Logs_ID` int(11) NOT NULL,
  `Users_ID_FK` int(11) DEFAULT NULL,
  `Logs_DateTime` datetime DEFAULT NULL,
  `Logs_Text` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagesPages_IDpagespagesmobilidadein_estudantesCards`
--

CREATE TABLE `Cards` (
  `Cards_ID` int(50) NOT NULL,
  `Cards_Date` date DEFAULT NULL,
  `Cards_LastEditionDate` date DEFAULT NULL,
  `Cards_Thumbnail` varchar(512) DEFAULT NULL,
  `Users_ID_FK_Author` int(11) DEFAULT NULL,
  `Users_ID_FK_LastEditionAuthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `Cards`
--

INSERT INTO `Cards` (`Cards_ID`, `Cards_Date`, `Cards_LastEditionDate`, `Cards_Thumbnail`, `Users_ID_FK_Author`, `Users_ID_FK_LastEditionAuthor`) VALUES
(1, '2019-04-09', '2021-02-04', 'grafismo pref verm.png', 1, 1),
(2, '2019-04-09', '2022-07-26', 'grafismo outline preto.png', 1, 1),
(3, '2019-04-09', '2020-03-18', 'Ciência sem fonteiras.png', 1, 1);



-- --------------------------------------------------------

--
-- Estrutura para tabela `CardsTranslations`
--

CREATE TABLE `CardsTranslations` (
  `CardsTranslations_ID` int(50) NOT NULL,
  `CardsTranslations_Language` varchar(5) DEFAULT NULL,
  `CardsTranslations_Name` varchar(255) DEFAULT NULL,
  `CardsTranslations_Description` varchar(255) DEFAULT NULL,
  `CardsTranslations_Content` mediumtext,
  `Cards_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `CardsTranslations`
--

INSERT INTO `CardsTranslations` (`CardsTranslations_ID`, `CardsTranslations_Language`, `CardsTranslations_Name`, `CardsTranslations_Description`, `CardsTranslations_Content`, `Cards_ID_FK`) VALUES
(1, 'pt-br', 'Editais Abertos', 'OPORTUNIDADES DE INTERCAMBIO', 'Os alunos selecionados receberão benefícios, de acordo com as regras de cada universidade participante do processo, conforme relação abaixo:Universidad de Guanajuato, México (1 vaga); Universidad Autônoma del Estado de Hidalg, México (1 vaga); Universidad de Cundinamarca ? Col?mbia (1 vaga); eUniversidad Los Llanos ? Col?mbia (1 vaga).Os programas Bracol e Bramex consistem na mobilidade de estudantes de gradua??o entre universidades do Brasil, da Col?mbia e do M?xico. O objetivo principal ? contribuir para a integra??o e o fortalecimento regional por meio da aproxima??o acad?mico-cient?fica dos pa?ses.Para acessar o edital e participar do processo seletivo, o candidato dever? fazer a inscri??o na p?gina da Assin. D?vidas devem encaminhadas para o e-mail assin.intercambio@ufsj.edu.br,pelo telefone (32) 3379-5812 ou pelas redes sociais da Assin.', 1),
(2, 'en-us', 'Open Call', 'EXCHANGE OPPORTUNITIES - COLOMBIA AND MEXICO', 'teste ingl?s', 1),
(3, 'es-es', '*Editais Abertos', 'OPORTUNIDADES DE INTERCAMBIO - COLOMBIA Y M?XICO', 'teste espanhol', 1),
(4, 'fr-fr', 'Editais Abertos', 'OPPORTUNIT?S D&#39;?CHANGE - COLOMBIE ET MEXIQUE', 'test francês', 1),
(5, 'pt-br', 'Mobilidade', 'Mobilidade é um conceito amplo....', 'Mobilidade é um conceito amplo....', 2),
(6, 'en-us', 'Mobility', 'Mobility is a broad concept....', '', 2),
(7, 'es-es', 'Movilidad', 'La movilidad es un concepto amplio....', 'La movilidad es un concepto amplio....', 2),
(8, 'fr-fr', 'Mobilidade', '', '', 2),
(9, 'pt-br', 'Idiomas sem fronteiras', 'atividades do Programa Idiomas sem Fronteiras', 'Atualmente as atividades do Programa Idiomas sem Fronteiras estão suspensas.&nbsp;Acreditamos que o Idiomas sem Fronteiras-Português terá seu funcionamento normalizado.Estamos trabalhando para que em breve tenhamos boas notícias', 3),
(10, 'en-us', 'Language Without Borders Program', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 3),
(11, 'es-es', 'Language Without Borders Program', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 3),
(12, 'fr-fr', 'Language Without Borders Program', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 'The activities of the Idiomas sem Fronteiras Program are suspended.', 3);



-- --------------------------------------------------------

--
-- Estrutura para tabela `CarouselImages`
--

CREATE TABLE `CarouselImages` (
  `CImages_ID` int(11) NOT NULL,
  `Users_ID_FK` int(11) DEFAULT NULL,
  `CImages_Name` varchar(250) DEFAULT NULL,
  `CImages_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `CarouselImages`
--

INSERT INTO `CarouselImages` (`CImages_ID`, `Users_ID_FK`, `CImages_Name`, `CImages_Date`) VALUES
(1, 1, 'ufsj_campus_santo_antonio.jpg', '2019-04-09'),
(3, 1, 'SJDR-SaoFrancisco.jpg', '2019-04-09'),
(6, 6, 'csl_aereo_site.jpg', '2022-07-06'),
(10, 6, 'cco(1).jpg', '2022-07-06'),
(13, 6, 'ufsj-cap-site 2.jpg', '2022-07-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `GalleryImages`
--

CREATE TABLE `GalleryImages` (
  `GImages_ID` int(11) NOT NULL,
  `Users_ID_FK` int(11) DEFAULT NULL,
  `GImages_Name` varchar(512) DEFAULT NULL,
  `GImages_Date` date DEFAULT NULL,
  `GImages_Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `GalleryImages`
--

INSERT INTO `GalleryImages` (`GImages_ID`, `Users_ID_FK`, `GImages_Name`, `GImages_Date`, `GImages_Description`) VALUES
(1, 4, 'CAP.jpg', '2022-02-10', 'Campus Alto Paraopeba - CAP'),
(3, 4, 'CDB.jpg', '2022-02-10', 'Campus Dom Bosco - CDB'),
(5, 4, 'CSA.jpg', '2022-02-10', 'Campus Santo Antônio - CSA'),
(9, 6, 'campus-tancredo-neves-da-ufsj-750x430.jpg', '2022-07-06', 'ctan'),
(10, 6, 'IMG_2433.jpg', '2022-07-06', 'imgUfsj'),
(11, 6, 'DSC09721.jpg', '2022-07-06', 'salaUfsj'),
(12, 6, 'DSC09678.jpg', '2022-07-06', 'imgUfsj'),
(13, 6, 'DSC09718.jpg', '2022-07-06', 'zootec'),
(14, 6, 'DSC08965.jpg', '2022-07-06', 'labUFSJ'),
(15, 6, 'IMG_2431.jpg', '2022-07-06', 'ufsj'),
(16, 6, 'IMG_2423.jpg', '2022-07-06', 'labUFSJ'),
(17, 6, 'DSC08952.jpg', '2022-07-06', 'campus');

-- --------------------------------------------------------

--
-- Estrutura para tabela `GeneralSettings`
--

CREATE TABLE `GeneralSettings` (
  `GeneralSettings_ID` int(11) NOT NULL,
  `GeneralSettings_Key` varchar(255) DEFAULT NULL,
  `GeneralSettings_Value` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `GeneralSettings`
--

INSERT INTO `GeneralSettings` (`GeneralSettings_ID`, `GeneralSettings_Key`, `GeneralSettings_Value`) VALUES
(1, 'institutional_video', 'https://www.youtube.com/embed/AQc0rMqqA6Y');

-- --------------------------------------------------------
-- --------------------------------------------------------
-- Estrutura para tabela de 'Depoimentos'



CREATE TABLE  `Depoimentos` (
 `DepoimentosID` int(11) NOT NULL,
 `Depoimentos_Date` date DEFAULT NULL,
  `Depoimentos_Thumbnail` varchar(512) DEFAULT NULL,
 `Depoimentos_LastEditonDate` date DEFAULT NULL,
 `Users_ID_FK_Author` int(11) DEFAULT NULL,
 `Users_ID_FK_LastEditionAuthor` int(11) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `DepoimentosTranslations` (
  `DepoimentosTranslations_ID` int(11) NOT NULL,
  `DepoimentosTranslations_Language` varchar(5) DEFAULT NULL,
  `DepoimentosTranslations_Title` varchar(255) DEFAULT NULL,
  `DepoimentosTranslations_Content` varchar(522),
  `DepoimentosTranslations_Description` varchar(512) DEFAULT NULL,
  `DepoimentosID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Depoimentos` (`DepoimentosID`,`Depoimentos_Date`,`Depoimentos_Thumbnail`,`Depoimentos_LastEditonDate`, `Users_ID_FK_Author`, `Users_ID_FK_LastEditionAuthor`) VALUES 
(2,'2022-10-10','campus-tancredo-neves-da-ufsj-750x430.jpg','2022-10-10',1,1);

INSERT INTO `depoimentostranslations` (`DepoimentosTranslations_ID`,`DepoimentosTranslations_Language`,`DepoimentosTranslations_Title`,`DepoimentosTranslations_Content`, `DepoimentosTranslations_Description`,`DepoimentosID_FK`)
VALUES (2,'pt-br','teste','uga/2017','alo',2);
--
-- Estrutura para tabela `Highlights`
--

CREATE TABLE `Highlights` (
  `Highlights_ID` int(11) NOT NULL,
  `Highlights_Date` date DEFAULT NULL,
  `Highlights_LastEditonDate` date DEFAULT NULL,
  `Highlights_Thumbnail` varchar(512) DEFAULT NULL,
  `Users_ID_FK_Author` int(11) DEFAULT NULL,
  `Users_ID_FK_LastEditionAuthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


    
-- --------------------------------------------------------
--
-- Estrutura para tabela `HighlightsTranslations`
--

CREATE TABLE `HighlightsTranslations` (
  `HighlightsTranslations_ID` int(11) NOT NULL,
  `HighlightsTranslations_Language` varchar(5) DEFAULT NULL,
  `HighlightsTranslations_Title` varchar(255) DEFAULT NULL,
  `HighlightsTranslations_Description` varchar(512) DEFAULT NULL,
  `HighlightsTranslations_Content` text,
  `Highlights_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Estrutura para tabela `Menus`
--

CREATE TABLE `Menus` (
  `Menus_ID` int(11) NOT NULL,
  `Menus_Redirection` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `Menus`
--

INSERT INTO `Menus` (`Menus_ID`, `Menus_Redirection`) VALUES
(1, NULL),
(2, NULL),
(3, 'http://200.17.67.185/'),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `MenusChilds`
--

CREATE TABLE `MenusChilds` (
  `MenusChilds_ID` int(11) NOT NULL,
  `MenusChilds_Redirection` text,
  `Menus_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `MenusChilds`
--

INSERT INTO `MenusChilds` (`MenusChilds_ID`, `MenusChilds_Redirection`, `Menus_ID_FK`) VALUES
(1, 'http://192.168.2.175/page.php?type=3&id=1', 1),
(2, 'http://192.168.2.175/page.php?type=3&id=2', 1),
(3, NULL, 1),
(4, NULL, 1),
(5, 'http://192.168.2.175/page.php?type=3&id=3', 2),
(6, NULL, 2),
(7, 'http://192.168.2.175/page.php?type=3&id=5', 2),
(8, NULL, 2),
(9, NULL, 2),
(10, NULL, 2),
(11, NULL, 3),
(12, NULL, 3),
(13, NULL, 3),
(14, 'http://192.168.2.175/page.php?type=3&id=6', 3),
(15, 'http://192.168.2.175/page.php?type=3&id=5', 3),
(16, NULL, 4),
(17, NULL, 4),
(18, NULL, 5),
(19, NULL, 5),
(20, NULL, 5),
(21, NULL, 5),
(22, NULL, 6),
(23, NULL, 6),
(24, NULL, 7),
(25, NULL, 7),
(26, NULL, 7),
(27, NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `MenusGrandChilds`
--

CREATE TABLE `MenusGrandChilds` (
  `MenusGrandChilds_ID` int(11) NOT NULL,
  `MenusGrandChilds_Redirection` text,
  `MenusChilds_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `MenusGrandChilds`
--

INSERT INTO `MenusGrandChilds` (`MenusGrandChilds_ID`, `MenusGrandChilds_Redirection`, `MenusChilds_ID_FK`) VALUES
(1, 'http://192.168.2.175/panel/editPage.php?id=7', 3),
(2, NULL, 4),
(3, NULL, 4),
(4, NULL, 4),
(5, NULL, 4),
(6, 'http://192.168.2.175/panel/editPage.php?id=7', 4),
(7, NULL, 11),
(8, 'http://192.168.2.175/assets/files/Res022Consu2018_PoliticaInternacionalizaco.pdf', 11),
(9, NULL, 11),
(10, NULL, 11),
(11, NULL, 11),
(12, 'http://192.168.2.175/page.php?type=3&id=4', 16),
(13, NULL, 16),
(14, 'http://200.17.67.185/#', 12),
(15, 'http://200.17.67.185/#', 19),
(16, 'http://192.168.2.175/index.php', 12),
(17, 'http://192.168.2.175/index.php', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `MenusTranslations`
--

CREATE TABLE `MenusTranslations` (
  `MenusTranslations_ID` int(11) NOT NULL,
  `MenusTranslations_Language` varchar(5) DEFAULT NULL,
  `MenusTranslations_Name` text,
  `Menus_ID_FK` int(11) DEFAULT NULL,
  `MenusChilds_ID_FK` int(11) DEFAULT NULL,
  `MenusGrandChilds_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `MenusTranslations`
--

INSERT INTO `MenusTranslations` (`MenusTranslations_ID`, `MenusTranslations_Language`, `MenusTranslations_Name`, `Menus_ID_FK`, `MenusChilds_ID_FK`, `MenusGrandChilds_ID_FK`) VALUES
(1, 'pt-br', 'Sobre a UFSJ', 1, NULL, NULL),
(2, 'en-us', 'About UFSJ', 1, NULL, NULL),
(3, 'es-es', 'Sobre la UFSJ', 1, NULL, NULL),
(4, 'fr-fr', 'Sobre a UFSJ', 1, NULL, NULL),
(5, 'pt-br', 'Campi', 2, NULL, NULL),
(6, 'en-us', 'Campuses', 2, NULL, NULL),
(7, 'es-es', 'Campi', 2, NULL, NULL),
(8, 'fr-fr', 'Campi', 2, NULL, NULL),
(9, 'pt-br', 'Assessoria Internacional', 3, NULL, NULL),
(10, 'en-us', 'International Office', 3, NULL, NULL),
(11, 'es-es', 'Oficina Internacional', 3, NULL, NULL),
(12, 'fr-fr', 'Bureau Internacional', 3, NULL, NULL),
(13, 'pt-br', 'Ensino', 4, NULL, NULL),
(14, 'en-us', 'Education', 4, NULL, NULL),
(15, 'es-es', 'Enseñanza', 4, NULL, NULL),
(16, 'fr-fr', 'Ensino', 4, NULL, NULL),
(17, 'pt-br', 'Pesquisa e Inovação', 5, NULL, NULL),
(18, 'en-us', 'Research and Innovation', 5, NULL, NULL),
(19, 'es-es', 'Investigación y innovación', 5, NULL, NULL),
(20, 'fr-fr', 'Pesquisa e Inovação', 5, NULL, NULL),
(21, 'pt-br', 'Extensão', 6, NULL, NULL),
(22, 'en-us', 'Community Service', 6, NULL, NULL),
(23, 'es-es', 'Extensión', 6, NULL, NULL),
(24, 'fr-fr', 'Extensão', 6, NULL, NULL),
(25, 'pt-br', 'Vida Estudantil', 7, NULL, NULL),
(26, 'en-us', 'University Life', 7, NULL, NULL),
(27, 'es-es', 'Vida Estudiantil', 7, NULL, NULL),
(28, 'fr-fr', 'Vida Estudantil', 7, NULL, NULL),
(29, 'pt-br', 'Chat', 8, NULL, NULL),
(30, 'en-us', 'Chat', 8, NULL, NULL),
(31, 'es-es', 'Chat', 8, NULL, NULL),
(32, 'fr-fr', 'Chat', 8, NULL, NULL),
(33, 'pt-br', 'Histórico', NULL, 1, NULL),
(34, 'en-us', 'History', NULL, 1, NULL),
(35, 'es-es', 'Histórico', NULL, 1, NULL),
(36, 'fr-fr', 'Histórico', NULL, 1, NULL),
(37, 'pt-br', 'Missão, visão e valores', NULL, 2, NULL),
(38, 'en-us', 'Mission, vision and values', NULL, 2, NULL),
(39, 'es-es', 'Misión, visión y valores', NULL, 2, NULL),
(40, 'fr-fr', 'Missão, visão e valores', NULL, 2, NULL),
(41, 'pt-br', 'Gestão', NULL, 3, NULL),
(42, 'en-us', 'Rectory', NULL, 3, NULL),
(43, 'es-es', 'Gestión', NULL, 3, NULL),
(44, 'fr-fr', 'Gestão', NULL, 3, NULL),
(45, 'pt-br', 'Espaços Acadêmico-culturais', NULL, 4, NULL),
(46, 'en-us', 'Academic and Cultural spaces', NULL, 4, NULL),
(47, 'es-es', 'Espacios académicos culturales', NULL, 4, NULL),
(48, 'fr-fr', 'Espaços Acadêmico-culturais', NULL, 4, NULL),
(49, 'pt-br', 'Campus Santo Antônio', NULL, 5, NULL),
(50, 'en-us', 'Campus Santo Antônio', NULL, 5, NULL),
(51, 'es-es', 'Campus Santo Antônio', NULL, 5, NULL),
(52, 'fr-fr', 'Campus Santo Antônio', NULL, 5, NULL),
(53, 'pt-br', 'Campus Dom Bosco', NULL, 6, NULL),
(54, 'en-us', 'Campus Dom Bosco', NULL, 6, NULL),
(55, 'es-es', 'Campus Dom Bosco', NULL, 6, NULL),
(56, 'fr-fr', 'Campus Dom Bosco', NULL, 6, NULL),
(57, 'pt-br', 'Campus Tancredo Neves', NULL, 7, NULL),
(58, 'en-us', 'Campus Tancredo Neves', NULL, 7, NULL),
(59, 'es-es', 'Campus Tancredo Neves', NULL, 7, NULL),
(60, 'fr-fr', 'Campus Tancredo Neves', NULL, 7, NULL),
(61, 'pt-br', 'Campus Alto Paraopeba', NULL, 8, NULL),
(62, 'en-us', 'Campus Alto Paraopeba', NULL, 8, NULL),
(63, 'es-es', 'Campus Alto Paraopeba', NULL, 8, NULL),
(64, 'fr-fr', 'Campus Alto Paraopeba', NULL, 8, NULL),
(69, 'pt-br', 'Campus Sete Lagoas', NULL, 10, NULL),
(70, 'en-us', 'Campus Sete Lagoas', NULL, 10, NULL),
(71, 'es-es', 'Campus Sete Lagoas', NULL, 10, NULL),
(72, 'fr-fr', 'Campus Sete Lagoas', NULL, 10, NULL),
(73, 'pt-br', 'Sobre a ASSIN', NULL, 11, NULL),
(74, 'en-us', 'About ASSIN', NULL, 11, NULL),
(75, 'es-es', 'Sobre la ASSIN', NULL, 11, NULL),
(76, 'fr-fr', 'Sobre a ASSIN', NULL, 11, NULL),
(77, 'pt-br', 'Acordos de Colaboração Internacional', NULL, 12, NULL),
(78, 'en-us', 'International Collaboration Agreements', NULL, 12, NULL),
(79, 'es-es', 'Acuerdos de Colaboración Internacional', NULL, 12, NULL),
(80, 'fr-fr', 'Acordos de Colaboração Internacional', NULL, 12, NULL),
(81, 'pt-br', 'Programas Internacionais', NULL, 13, NULL),
(82, 'en-us', 'International Programs', NULL, 13, NULL),
(83, 'es-es', 'Programas Internacionales', NULL, 13, NULL),
(84, 'fr-fr', 'Programas Internacionais', NULL, 13, NULL),
(85, 'pt-br', 'Seminário de Internacionalização', NULL, 14, NULL),
(86, 'en-us', 'Internationalization Seminar', NULL, 14, NULL),
(87, 'es-es', '*Seminário de Internacionalização', NULL, 14, NULL),
(88, 'fr-fr', 'Seminário de Internacionalização', NULL, 14, NULL),
(89, 'pt-br', 'Estágio Internacional', NULL, 15, NULL),
(90, 'en-us', 'International Internship', NULL, 15, NULL),
(91, 'es-es', 'Pasantía Internacional', NULL, 15, NULL),
(92, 'fr-fr', 'Estágio Internacional', NULL, 15, NULL),
(93, 'pt-br', 'Graduação', NULL, 16, NULL),
(94, 'en-us', 'Undergraduate Programs', NULL, 16, NULL),
(95, 'es-es', 'Pregrado', NULL, 16, NULL),
(96, 'fr-fr', 'Graduação', NULL, 16, NULL),
(97, 'pt-br', 'Pós-Graduação', NULL, 17, NULL),
(98, 'en-us', 'Graduate Programs', NULL, 17, NULL),
(99, 'es-es', 'Posgrado', NULL, 17, NULL),
(100, 'fr-fr', 'Pós-Graduação', NULL, 17, NULL),
(105, 'pt-br', 'Redes Internacionais de Pesquisa', NULL, 19, NULL),
(106, 'en-us', 'International Research Networks', NULL, 19, NULL),
(107, 'es-es', 'Redes Internacionales de Investigación', NULL, 19, NULL),
(108, 'fr-fr', 'Redes Internacionais de Pesquisa', NULL, 19, NULL),
(109, 'pt-br', 'NETEC', NULL, 20, NULL),
(110, 'en-us', 'NETEC', NULL, 20, NULL),
(111, 'es-es', 'NETEC', NULL, 20, NULL),
(112, 'fr-fr', 'NETEC', NULL, 20, NULL),
(113, 'pt-br', 'Startups', NULL, 21, NULL),
(114, 'en-us', 'Startups', NULL, 21, NULL),
(115, 'es-es', 'Startups', NULL, 21, NULL),
(116, 'fr-fr', 'Startups', NULL, 21, NULL),
(117, 'pt-br', 'Programas e Projetos de Extensão', NULL, 22, NULL),
(118, 'en-us', 'Community Service Projects', NULL, 22, NULL),
(119, 'es-es', 'Programas y Proyectos de Extensión', NULL, 22, NULL),
(120, 'fr-fr', 'Programas e Projetos de Extensão', NULL, 22, NULL),
(121, 'pt-br', 'Inverno Cultural', NULL, 23, NULL),
(122, 'en-us', 'Winter Cultural Festival', NULL, 23, NULL),
(123, 'es-es', 'Invierno Cultural', NULL, 23, NULL),
(124, 'fr-fr', 'Inverno Cultural', NULL, 23, NULL),
(125, 'pt-br', 'Moradia Estudantil', NULL, 24, NULL),
(126, 'en-us', 'Student Accommodation', NULL, 24, NULL),
(127, 'es-es', 'Morada Estudiantil', NULL, 24, NULL),
(128, 'fr-fr', 'Moradia Estudantil', NULL, 24, NULL),
(129, 'pt-br', 'Restaurantes Universitários', NULL, 25, NULL),
(130, 'en-us', 'University Restaurant', NULL, 25, NULL),
(131, 'es-es', 'Restaurante Universitario', NULL, 25, NULL),
(132, 'fr-fr', 'Restaurantes Universitários', NULL, 25, NULL),
(133, 'pt-br', 'Horários e Pontos de Ônibus', NULL, 26, NULL),
(134, 'en-us', 'Bus Stops and Timetables', NULL, 26, NULL),
(135, 'es-es', 'Horarios y Paradas de Bus', NULL, 26, NULL),
(136, 'fr-fr', 'Horários e Pontos de Ônibus', NULL, 26, NULL),
(137, 'pt-br', 'Informações Úteis', NULL, 27, NULL),
(138, 'en-us', 'Useful Information', NULL, 27, NULL),
(139, 'es-es', 'Informaciones Útiles', NULL, 27, NULL),
(140, 'fr-fr', 'Informações Úteis', NULL, 27, NULL),
(141, 'pt-br', 'Palavra do Presidente', NULL, NULL, 1),
(142, 'en-us', 'President\'s Word (Rector\'s Word)', NULL, NULL, 1),
(143, 'es-es', 'Palabra del Presidente', NULL, NULL, 1),
(144, 'fr-fr', 'Palavra do Presidente', NULL, NULL, 1),
(145, 'pt-br', 'Centro Cultural', NULL, NULL, 2),
(146, 'en-us', 'Cultural Center', NULL, NULL, 2),
(147, 'es-es', 'Centro Cultural', NULL, NULL, 2),
(148, 'fr-fr', 'Centro Cultural', NULL, NULL, 2),
(149, 'pt-br', 'Cerem', NULL, NULL, 3),
(150, 'en-us', 'CEREM', NULL, NULL, 3),
(151, 'es-es', 'Cerem', NULL, NULL, 3),
(152, 'fr-fr', 'Cerem', NULL, NULL, 3),
(153, 'pt-br', 'Fortim dos Emboabas', NULL, NULL, 4),
(154, 'en-us', 'Emboaba\'s Little Fortress', NULL, NULL, 4),
(155, 'es-es', 'Fortim dos Emboabas', NULL, NULL, 4),
(156, 'fr-fr', 'Fortim dos Emboabas', NULL, NULL, 4),
(157, 'pt-br', 'Fazendas', NULL, NULL, 5),
(158, 'en-us', 'Farms', NULL, NULL, 5),
(159, 'es-es', 'Haciendas', NULL, NULL, 5),
(160, 'fr-fr', 'Fazendas', NULL, NULL, 5),
(161, 'pt-br', 'Planetário', NULL, NULL, 6),
(162, 'en-us', 'Planetarium', NULL, NULL, 6),
(163, 'es-es', 'Planetario', NULL, NULL, 6),
(164, 'fr-fr', 'Planetário', NULL, NULL, 6),
(165, 'pt-br', 'Missão, visão e valores', NULL, NULL, 7),
(166, 'en-us', 'Mission, vision and values', NULL, NULL, 7),
(167, 'es-es', 'Misión, visión y valores', NULL, NULL, 7),
(168, 'fr-fr', 'Missão, visão e valores', NULL, NULL, 7),
(169, 'pt-br', 'Política de Internacionalização', NULL, NULL, 8),
(170, 'en-us', 'Internationalization Policy', NULL, NULL, 8),
(171, 'es-es', 'Política de Internacionalización', NULL, NULL, 8),
(172, 'fr-fr', 'Política de Internacionalização', NULL, NULL, 8),
(177, 'pt-br', 'Política Linguística', NULL, NULL, 10),
(178, 'en-us', 'Language Policy', NULL, NULL, 10),
(179, 'es-es', 'Política Lingüística', NULL, NULL, 10),
(180, 'fr-fr', 'Política Linguística', NULL, NULL, 10),
(181, 'pt-br', 'Resoluções', NULL, NULL, 11),
(182, 'en-us', 'Resolutions', NULL, NULL, 11),
(183, 'es-es', 'Resoluciones', NULL, NULL, 11),
(184, 'fr-fr', 'Resoluções', NULL, NULL, 11),
(185, 'pt-br', 'Cursos de Graduação', NULL, NULL, 12),
(186, 'en-us', 'Undergraduate Programs', NULL, NULL, 12),
(187, 'es-es', '*Cursos de Graduação', NULL, NULL, 12),
(188, 'fr-fr', 'Cursos de Graduação', NULL, NULL, 12),
(189, 'pt-br', 'Ementas', NULL, NULL, 13),
(190, 'en-us', 'Course Descriptions', NULL, NULL, 13),
(191, 'es-es', 'Contenidos de las carreras', NULL, NULL, 13),
(192, 'fr-fr', 'Ementas', NULL, NULL, 13),
(193, 'pt-br', 'Modelo de Acordos', NULL, NULL, 14),
(194, 'en-us', 'Drafts', NULL, NULL, 14),
(195, 'es-es', 'Modelos', NULL, NULL, 14),
(196, 'fr-fr', 'Modelos', NULL, NULL, 14),
(197, 'pt-br', 'NACQUA - Núcleo Int. de Estudos Avançados em Águas', NULL, NULL, 15),
(198, 'en-us', 'NACQUA - Núcleo Int. de Estudos Avançados em Águas', NULL, NULL, 15),
(199, 'es-es', 'NACQUA - Núcleo Int. de Estudos Avançados em Águas', NULL, NULL, 15),
(200, 'fr-fr', 'NACQUA - Núcleo Int. de Estudos Avançados em Águas', NULL, NULL, 15),
(201, 'pt-br', 'Acordo Internacionais', NULL, NULL, 16),
(202, 'en-us', 'International Agreements', NULL, NULL, 16),
(203, 'es-es', 'Acuerdos Internacionales', NULL, NULL, 16),
(204, 'fr-fr', 'International Agreements', NULL, NULL, 16),
(205, 'pt-br', 'Programas internacionais', NULL, NULL, 17),
(206, 'en-us', 'International', NULL, NULL, 17),
(207, 'es-es', 'Internacionale', NULL, NULL, 17),
(208, 'fr-fr', 'aaa', NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pages`
--

CREATE TABLE `Pages` (
  `Pages_ID` int(11) NOT NULL,
  `Pages_Date` date DEFAULT NULL,
  `Pages_LastEditionDate` date DEFAULT NULL,
  `Users_ID_FK_Author` int(11) DEFAULT NULL,
  `Users_ID_FK_LastEditionAuthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `Pages`
--

INSERT INTO `Pages` (`Pages_ID`, `Pages_Date`, `Pages_LastEditionDate`, `Users_ID_FK_Author`, `Users_ID_FK_LastEditionAuthor`) VALUES
(1, '2019-10-10', '2021-02-04', 1, 1),
(2, '2019-10-10', '2020-02-20', 1, 1),
(3, '2019-10-10', '2021-02-04', 1, 1),
(4, '2021-02-04', '2022-02-10', 1, 4),
(5, '2022-04-04', '2022-04-04', 1, 1),
(6, '2022-04-04', '2022-04-04', 1, 1),
(7, '2022-07-25', '2022-07-25', 1, 1),
(8, '2022-07-26', '2022-07-26', 6, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PagesTranslations`
--

CREATE TABLE `PagesTranslations` (
  `PagesTranslations_ID` int(11) NOT NULL,
  `PagesTranslations_Language` varchar(5) DEFAULT NULL,
  `PagesTranslations_Title` varchar(256) DEFAULT NULL,
  `PagesTranslations_Content` text,
  `Pages_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `PagesTranslations`
--

INSERT INTO `PagesTranslations` (`PagesTranslations_ID`, `PagesTranslations_Language`, `PagesTranslations_Title`, `PagesTranslations_Content`, `Pages_ID_FK`) VALUES
(1, 'pt-br', 'Historico', '<div><div><div style=\"text-align: justify;\">Histórico Institucional</div><br style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; background-color: rgb(179, 179, 179);\"><div style=\"text-align: justify;\">A<strong>&nbsp;Universidade Federal de São João del-Rei</strong>&nbsp;(<strong>UFSJ</strong>) foi instituída pela&nbsp;<a href=\"http://www.planalto.gov.br/ccivil_03/leis/L7555.htm\">Lei 7.555, de 18 de dezembro de 1986</a>, como&nbsp;<strong>Fundação de Ensino Superior de São João del-Rei</strong>&nbsp;(<strong>Funrei</strong>), sendo resultado da reunião e federalização de duas instituições: a Faculdade Dom Bosco de Filosofia, Ciências e Letras, cujas atividades iniciaram em 1954, mantidas pela Inspetoria de São João Bosco; e a Fundação Municipal de São João del-Rei, mantenedora da Faculdade de Ciências Econômicas, Administrativas e Contábeis (Faceac) e da Faculdade de Engenharia Industrial (Faein), cujas atividades iniciaram-se em 1972 e 1976 respectivamente.</div><div>Em 19 de abril de 2002, a Funrei foi transformada em Universidade por meio da&nbsp;<a href=\"http://www.planalto.gov.br/ccivil_03/leis/2002/L10425.htm\">Lei 10.425</a>, adotando a sigla UFSJ, eleita pela comunidade acadêmica. A UFSJ é pessoa jurídica de direito público, com financiamento pelo Poder Público, vinculada ao Ministério da Educação, que tem sede e foro na cidade de São João&nbsp;del-Rei, e possui unidades educacionais em Divinópolis, na região do Alto Paraopeba e em Sete Lagoas, todas no Estado de Minas Gerais. Como uma Instituição federal de ensino público superior, a UFSJ zela pela autonomia científica, didática, administrativa, disciplinar e de gestão financeira e patrimonial.</div><div>A UFSJ foi uma das poucas instituições federais de ensino superior criadas na década de 1980. Desde o processo de federalização, já assumia como um dos eixos centrais de suas atividades fins a indissociabilidade entre as atividades de Ensino, Pesquisa e Extensão. Desde o início, a Instituição trabalhou para a qualificação de seu quadro docente, sobretudo com o incentivo ao doutoramento, bem como da formação e a estabilização dos grupos de pesquisa e da implantação de pós-graduação&nbsp;<em>stricto sensu</em>, elementos fundamentais para a sua transformação em Universidade.</div><div>Atualmente, a Instituição estrutura-se administrativamente em seis unidades educacionais e um centro cultural. Estão localizados em São João del-Rei o&nbsp;<em>Campus</em>&nbsp;Santo Antônio, o&nbsp;<em>Campus</em>&nbsp;Dom Bosco e o&nbsp;<em>Campus</em>&nbsp;Tancredo de Almeida Neves, além do Centro Cultural da UFSJ. Entre 2007 e 2008, a UFSJ criou três unidades educacionais em outros municípios de Minas Gerais: o&nbsp;<em>Campus</em>&nbsp;Alto Paraopeba, localizado na divisa entre os municípios de Congonhas e Ouro Branco; o&nbsp;<em>Campus</em>&nbsp;Sete Lagoas, na cidade homônima; e o&nbsp;<em>Campus</em>&nbsp;Centro-Oeste Dona Lindu, situado no município de Divinópolis.</div></div></div>', 1),
(2, 'en-us', 'History', '<div><div>The Federal University of São João del-Rei - UFSJ originated from the three institutions of higher education existing in São João del-Rei in the 1980s: Dom Bosco (School of Philosophy, Sciences and Language) and the Municipal Foundation (School of Economics, Administration and Accounting and the School of Industrial Engineering). In the context of historical rescue, the Foundation of Higher Education of S?o Jo?o del-Rei - FUNREI, was born, after the signing of the Law No. 7555 of December 18, 1986 by the then-President Jose Sarney. Finally, on April 19, 2002, the institution was transformed into a federal university, Law 10,425.</div><div><br></div><div>UFSJ has three campuses in São João del-Rei: Santo Antônio, Dom Bosco, and Tancredo Neves, and a Cultural Center: \"Solar da Baronesa.\" In São João del-Rei, the following undergraduate courses are offered: Administration, Life Sciences, Accounting, Economics, Physical Education, Industrial Electrical Engineering, Industrial Mechanical Engineering, Philosophy, Physics, History, Literature, Mathematics, Education, Psychology, Chemistry and Music.</div><div>Even here in São João del-Rei, UFSJ offers Graduate Programs, such as that of Chemistry and Physics and a Masters in Literary Theory and Cultural Criticism. In 2008, UFSJ started offering masters degrees in Education, Psychology, History, and Energy Engineering. Since 1997, the Federal University of São João del-Rei has been offering specialization courses in several areas, such as Administration, Economics and Agricultural Business Management, Mathematics, Philosophy and History.</div><div>A fourth campus has been implemented to meet the expansion project of the federal government. It is located in Alto Paraopeba in the city of Ouro Branco. It started in 2008 and offers five undergraduate courses in the field of Engineering: Civil Engineering, Mechatronics, Telecommunication Engineering and Chemical Engineering. A fifth campus was built in the city of Divin?polis, with four new courses in Health: Medicine, Pharmacy, Nursing and Biochemistry.</div><div><br></div><div>With the developments in teaching, research and extension, UFSJ now has 482 professors and 336 effective technical and administrative staff. More teachers and technical-administrative public employees are to work on the new campuses of Divinópolis and Alto Paraopeba.</div><div><br></div><div>The high standard of training of our professional staff and the availability of evening courses at UFSJ give this public institution an outstandingly high quality and inclusiveness, with about 70% of its entrants being high school graduates.</div></div>', 1),
(3, 'es-es', 'Historico', '<div><span lang=\"ES\" style=\"font-size: 12pt;\">Histórico institucional<o:p></o:p></span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">&nbsp;</span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">La Universidade Federal de São João del-Rei (UFSJ) fue instituida por la\r\nLey 7.555, de 18 de&nbsp;diciembre de 1986, como Fundação de Ensino Superior de\r\nSão João del-Rei (Funrei), siendo&nbsp;resultado de la reuni?ó y federalización\r\nde dos instituciones: la Facultad Dom Bosco de&nbsp;Filosofía, Ciencias y\r\nLenguas, cuyas actividades empezaron en 1954, mantenidas por la&nbsp;Inspectora\r\nde S?o Jo?o Bosco; y la Fundación Municipal de São João del-Rei, mantenedora\r\nde&nbsp;la Facultad de Ciencias Administrativas y Contables (Faceac) y de la\r\nFacultad de Ingeniería&nbsp;Industrial (Faein), cuyas actividades empezaron en\r\n1972 y 1976, respectivamente.<o:p></o:p></span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">&nbsp;</span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">En 19 de abril de 2002, la Funrei fue transformada en Universidad por\r\nmedio de la Ley 10.425,&nbsp;adoptando la sigla UFSJ, electa por la comunidad\r\nacadêmica. La UFSJ es persona jurídica de&nbsp;derecho público, con\r\nfinanciación por el Poder Público, vinculada al Ministerio de la\r\nEducación,&nbsp;que tiene sede y foro en la ciudad de São João del-Rei, e posee\r\nunidades educacionales en&nbsp;Divinópolis, en la región del Alto Paraopeba y\r\nen Sete Lagoas, todas en el estado de Minas Gerais. Como una Institución\r\nfederal de enseñanza pública superior, la UFSJ cela por la&nbsp;autonomía\r\ncientífica, didáctica, administrativa, disciplinar y de gestión financiera y\r\npatrimonial.</span></div><div><span lang=\"ES\" style=\"font-size: 12pt;\">\r\n<!--[if !supportLineBreakNewLine]--><br>\r\n<!--[endif]--><o:p></o:p></span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">La UFSJ fue una de las pocas instituciones de enseñanza superior creadas\r\nen los años 1980.<o:p></o:p></span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">Desde el proceso de federalización, ya asumía como uno de los ejes\r\ncentrales de sus&nbsp;actividades finales la inseparabilidad entre las\r\nactividades de Enseñanza, Investigación y&nbsp;Extensión. Desde el inicio, la\r\nInstitución trabajó para la cualificación de su cuadro docente,&nbsp;sobre todo\r\ncon el incentivo al doctorado, bien como de la formación y la estabilización de\r\nlos&nbsp;grupos de investigación y de implementación de posgrado stricto sensu,\r\nelementos&nbsp;fundamentales para su transformación en Universidad.</span></div><div><span lang=\"ES\" style=\"font-size: 12pt;\">\r\n<!--[if !supportLineBreakNewLine]--><br>\r\n<!--[endif]--><o:p></o:p></span></div>\r\n\r\n<div><span lang=\"ES\" style=\"font-size: 12pt;\">Actualmente, la Institución estructurase administrativamente en seis\r\nunidades educacionales y&nbsp;un centro cultural. Están ubicados en São João\r\ndel-Rei los Campi Santo António, Dom Bosco y&nbsp;Tancredo de Almeida Neves,\r\nademás del Centro Cultural de la UFSJ. Entre 2007 y 2008, la UFSJ&nbsp;creó\r\ntres unidades educacionales en otros municipios de Minas Gerais: el Campus\r\nAlto&nbsp;Paraopeba, ubicado en la divisa de los municipios de Congonhas y Ouro\r\nBranco; el Campus&nbsp;Sete Lagoas, en la ciudad homónima; y el Campus Centro\r\nOeste Dona Lindu, ubicado en el&nbsp;municipio de Divinópolis.<o:p></o:p></span></div>', 1),
(4, 'fr-fr', 'Histoire', '<div style=\"text-align: justify;\">Histórico Institucional</div><br style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; background-color: rgb(179, 179, 179);\"><div style=\"text-align: justify;\">A<span style=\"font-weight: bolder;\">&nbsp;Universidade Federal de São João del-Rei</span>&nbsp;(<span style=\"font-weight: bolder;\">UFSJ</span>) foi instituída pela&nbsp;<a href=\"http://www.planalto.gov.br/ccivil_03/leis/L7555.htm\">Lei 7.555, de 18 de dezembro de 1986</a>, como&nbsp;<span style=\"font-weight: bolder;\">Fundação de Ensino Superior de São João del-Rei</span>&nbsp;(<span style=\"font-weight: bolder;\">Funrei</span>), sendo resultado da reunião e federalização de duas instituições: a Faculdade Dom Bosco de Filosofia, Ciências e Letras, cujas atividades iniciaram em 1954, mantidas pela Inspetoria de São João Bosco; e a Fundação Municipal de São João del-Rei, mantenedora da Faculdade de Ciências Econômicas, Administrativas e Contábeis (Faceac) e da Faculdade de Engenharia Industrial (Faein), cujas atividades iniciaram-se em 1972 e 1976 respectivamente.</div><div>Em 19 de abril de 2002, a Funrei foi transformada em Universidade por meio da&nbsp;<a href=\"http://www.planalto.gov.br/ccivil_03/leis/2002/L10425.htm\">Lei 10.425</a>, adotando a sigla UFSJ, eleita pela comunidade acadêmica. A UFSJ é pessoa jurídica de direito público, com financiamento pelo Poder Público, vinculada ao Ministério da Educação, que tem sede e foro na cidade de São João&nbsp;del-Rei, e possui unidades educacionais em Divinópolis, na região do Alto Paraopeba e em Sete Lagoas, todas no Estado de Minas Gerais. Como uma Instituição federal de ensino público superior, a UFSJ zela pela autonomia científica, didática, administrativa, disciplinar e de gestão financeira e patrimonial.</div><div>A UFSJ foi uma das poucas instituições federais de ensino superior criadas na década de 1980. Desde o processo de federalização, já assumia como um dos eixos centrais de suas atividades fins a indissociabilidade entre as atividades de Ensino, Pesquisa e Extensão. Desde o início, a Instituição trabalhou para a qualificação de seu quadro docente, sobretudo com o incentivo ao doutoramento, bem como da formação e a estabilização dos grupos de pesquisa e da implantação de pós-graduação&nbsp;<em>stricto sensu</em>, elementos fundamentais para a sua transformação em Universidade.</div><div>Atualmente, a Instituição estrutura-se administrativamente em seis unidades educacionais e um centro cultural. Estão localizados em São João del-Rei o&nbsp;<em>Campus</em>&nbsp;Santo Antônio, o&nbsp;<em>Campus</em>&nbsp;Dom Bosco e o&nbsp;<em>Campus</em>&nbsp;Tancredo de Almeida Neves, além do Centro Cultural da UFSJ. Entre 2007 e 2008, a UFSJ criou três unidades educacionais em outros municípios de Minas Gerais: o&nbsp;<em>Campus</em>&nbsp;Alto Paraopeba, localizado na divisa entre os municípios de Congonhas e Ouro Branco; o&nbsp;<em>Campus</em>&nbsp;Sete Lagoas, na cidade homônima; e o&nbsp;<em>Campus</em>&nbsp;Centro-Oeste Dona Lindu, situado no município de Divinópolis.</div>', 1),
(5, 'pt-br', 'Missão, Visão e Valores', '<div>Missão, Visão e Valores<br></div><div><br></div><div>Teste</div>', 2),
(6, 'en-us', 'Missão, Visão e Valores', '<div><div>Miss?o, Vis?o e Valores<br></div><div><br></div><div>Teste</div></div>', 2),
(7, 'es-es', 'Missão, Visão e Valores', '<div><div>Miss?o, Vis?o e Valores<br></div><div><br></div><div>Teste</div></div>', 2),
(8, 'fr-fr', 'Missão, Visão e Valores', '<div><div>Miss?o, Vis?o e Valores<br></div><div><br></div><div>Teste</div></div>', 2),
(9, 'pt-br', 'CAMPUS SANTO ANTONIO', '<div><br></div><div><span class=\"text-title\"><strong><em>Campus</em>&nbsp;Santo Antônio (CSA)</strong>: localizado em São João del-Rei&nbsp;</span><br></div><div><span class=\"text-title\"><br></span></div><div><span class=\"text-title\"><img alt=\"\" src=\"https://ufsj.edu.br/portal2-repositorio/Image/pdi/CSA.jpg\" style=\"width: 247px; height: 150px; cursor: default;\"><br></span></div>', 3),
(10, 'en-us', 'CAMPUS SANTO ANTONIO', '<div><br></div><div><div><span class=\"text-title\"><span style=\"font-weight: bolder;\"><em>Campus</em>&nbsp;Santo Ant?nio (CSA)</span>: located in São João&nbsp;del-Rei&nbsp;</span><br></div><div><span class=\"text-title\"><br></span></div><div><span class=\"text-title\"><img alt=\"\" src=\"https://ufsj.edu.br/portal2-repositorio/Image/pdi/CSA.jpg\" style=\"width: 247px; height: 150px; cursor: default;\"></span></div></div>', 3),
(11, 'es-es', 'CAMPUS SANTO ANTONIO', '<div><br></div><div><div><span class=\"text-title\"><span style=\"font-weight: bolder;\"><em>Campus</em>&nbsp;Santo Antônio (CSA)</span>: ubicado en São João&nbsp;del-Rei&nbsp;</span><br></div><div><span class=\"text-title\"><br></span></div><div><span class=\"text-title\"><img alt=\"\" src=\"https://ufsj.edu.br/portal2-repositorio/Image/pdi/CSA.jpg\" style=\"width: 247px; height: 150px; cursor: default;\"></span></div></div>', 3),
(12, 'fr-fr', 'CAMPUS SANTO ANTONIO', '<div><br></div><div><div><span class=\"text-title\"><span style=\"font-size: 1rem; font-weight: bolder;\"><em>Campus</em>&nbsp;Santo Antônio (CSA)</span><span style=\"font-size: 1rem;\">: localizado em São João</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem;\">del-Rei&nbsp;</span>&nbsp;</span><br></div><div><span class=\"text-title\"><br></span></div><div><span class=\"text-title\"><img alt=\"\" src=\"https://ufsj.edu.br/portal2-repositorio/Image/pdi/CSA.jpg\" style=\"width: 247px; height: 150px; cursor: default;\"></span></div></div>', 3),
(13, 'pt-br', 'CURSOS DE GRADUAÇÃO', '<div><span style=\"font-size:18px;\">CURSOS OFERECIDOS</span><span style=\"font-size:16px;\"></span><span style=\"font-size:16px;\"></span></div><div><br></div><div><br></div>', 4);
INSERT INTO `PagesTranslations` (`PagesTranslations_ID`, `PagesTranslations_Language`, `PagesTranslations_Title`, `PagesTranslations_Content`, `Pages_ID_FK`) VALUES
(14, 'en-us', 'UNDERGRADUATE COURSES', '<div><div><b><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:\r\n107%\">Available Undergraduate Courses<o:p></o:p></span></b></div>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;</span></div>\r\n\r\n<div><b><span lang=\"EN-US\">Santo Antônio Campus (CSA)<o:p></o:p></span></b></div>\r\n\r\n<div>Praça Frei Orlando,\r\n170,&nbsp;Centro, CEP: 36.307-352,&nbsp;São João del-Rei – MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/comat/\"><span style=\"color: windowtext;\">Mathematics</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">comat@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5917<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coenp/\"><span style=\"color: windowtext;\">Production</span></a>\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coenp@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5911<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/comec/\"><span style=\"color: windowtext;\">Mechanica</span></a>l\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">comec@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5915<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <a href=\"https://ufsj.edu.br/coele/\" target=\"_self\">Electrical Engineering</a><div><span lang=\"EN-US\"><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coele@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5913<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;<o:p></o:p></span></div>\r\n\r\n<div><b><span lang=\"EN-US\">Dom Bosco Campus (CDB)<o:p></o:p></span></b></div>\r\n\r\n<div>Praça Dom Helvécio,\r\n74, Fábricas, CEP: 36301-160, São João del-Rei - MG&nbsp;<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/colet/\"><span style=\"color: windowtext;\">Letters</span></a><a href=\"https://ufsj.edu.br/colet/\"><span style=\"color: windowtext;\">- Portuguese</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">colet@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5120<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/colet/\"><span style=\"color: windowtext;\">Letters</span></a><a href=\"https://ufsj.edu.br/colil/\"><span style=\"color: windowtext;\"> - English And Its Literatures</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">colil@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">&nbsp;-&nbsp;<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/copsi/\"><span style=\"color: windowtext;\">Psychology</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">copsi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5115<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Physics<a href=\"http://www.ufsj.edu.br/cofis/\"><span style=\"color: windowtext;\"> (Teacher Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cofis@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5123<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Physics<a href=\"http://www.ufsj.edu.br/cofis/\"><span style=\"color: windowtext;\"> (Bachelor)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cofis@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5123<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coqui/\"><span style=\"color: windowtext;\">Chemistry (Teacher\r\n  Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coqui@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5124<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Chemistry <a href=\"http://www.ufsj.edu.br/coqui/\"><span style=\"color: windowtext;\">(Bachelor)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coqui@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5124<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cofil/\"><span style=\"color: windowtext;\">Philosophy</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cofil@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5118<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coped/\"><span style=\"color: windowtext;\">Pedagogy</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coped@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5121<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cohis/\"><span style=\"color: windowtext;\">History</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cohis@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5119<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cobio/\"><span style=\"color: windowtext;\">Biological Sciences(Teacher\r\n  Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cobio@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5117<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Biological Sciences <a href=\"http://www.ufsj.edu.br/cobio/\"><span style=\"color: windowtext;\">&nbsp;(Bachelor)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cobio@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-5117<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cmedi/\"><span style=\"color: windowtext;\">Medicine</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cmedi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3371-5125<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cobit/\"><span style=\"color: windowtext;\">Biotechnology</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cobit@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5126<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;<o:p></o:p></span></div>\r\n\r\n<div><b><span lang=\"EN-US\">Campus Tancredo Neves (CTAN)<o:p></o:p></span></b></div>\r\n\r\n<div>Av. Visconde do Rio\r\nPreto, Km 02,&nbsp;Colônia do Bengo CEP: 36301-360,&nbsp;São João del-Rei – MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coadm/\"><span style=\"color: windowtext;\">Administration</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coadm@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-4926<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/artes/\"><span style=\"color: windowtext;\">Applied</span></a>\r\n  Arts<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coaap@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-4974<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/arquitetura/\"><span style=\"color: windowtext;\">Architecture and Urbanism</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coarq@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32)3379-4972<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cocic/\"><span style=\"color: windowtext;\">Accounting</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cocic@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4911/4912<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/ccomp/\"><span style=\"color: windowtext;\">&nbsp;Computer</span></a> Science<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">ccomp@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4937<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coeco/\"><span style=\"color: windowtext;\">Economical&nbsp;</span></a>\r\n  Science<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coeco@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4924<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/jornalismo/\"><span style=\"color: windowtext;\">Social</span></a> Communication - Journalism<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">ccoms@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4258<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coefi/\"><span style=\"color: windowtext;\">Physical\r\n  Education (Teacher Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coefi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3373-5203<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cogeo/\"><span style=\"color: windowtext;\">Geography (Teacher\r\n  Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cogeo@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4930<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cogeo/\"><span style=\"color: windowtext;\">Geography\r\n  (Bachelor)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cogeo@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4930<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cmusi/\"><span style=\"color: windowtext;\">Music (Teacher\r\n  Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cmusi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4962<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/teatro/\"><span style=\"color: windowtext;\">Theatre (Teacher\r\n  Education)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cotea@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4981<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/teatro/\"><span style=\"color: windowtext;\">Theatre (Bachelor)</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cotea@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4981<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cozoo\"><span style=\"color: windowtext;\">Zoothecny</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cozoo@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-4968<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;<o:p></o:p></span></div>\r\n\r\n<div><b><span lang=\"EN-US\">Alto Paraopeba Campus (CAP)<o:p></o:p></span></b></div>\r\n\r\n<div>Rodovia MG 443, KM 7,\r\nCEP: 36420-000, Ouro Branco – MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/ccivi/\"><span style=\"color: windowtext;\">Civil</span></a>\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coenci@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31)3749-7312<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cbiop/\"><span style=\"color: windowtext;\">Bioprocess</span></a>\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coenbio@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31)3749-7314<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/ctele/\"><span style=\"color: windowtext;\">Telecommunications</span></a>\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coentel@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3749-7319<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Chemical Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coenqui@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3749-7313<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cmeca/\"><span style=\"color: windowtext;\">Mechatronic</span></a>\r\n  Engineering<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coenmec@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3749-7318<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;<o:p></o:p></span></div>\r\n\r\n<div><b>Centro-Oeste Dona\r\nLindu Campus (CCO)<o:p></o:p></b></div>\r\n\r\n<div>R. Sebastião Gonçalves\r\nCoelho, 400,&nbsp;Chanadour, CEP: 35.5014-296,&nbsp;Divinópolis – MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"123\" style=\"width:91.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"150\" style=\"width:112.65pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"61\" style=\"width:45.95pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Telefone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"123\" style=\"width:91.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/coenf/\"><span style=\"color: windowtext;\">Nursing</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"150\" style=\"width:112.65pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coordenacaoenfermagem@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"61\" style=\"width:45.95pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(37)3690-4496<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"123\" style=\"width:91.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cofar/\"><span style=\"color: windowtext;\">Pharmacy</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"150\" style=\"width:112.65pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coordenacaofarmacia@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"61\" style=\"width:45.95pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(37)3690-4497<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"123\" style=\"width:91.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cobqi/\"><span style=\"color: windowtext;\">Biochemistry</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"150\" style=\"width:112.65pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coordenacaobioquimica@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"61\" style=\"width:45.95pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(37)3690-4499<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"123\" style=\"width:91.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/comed/\"><span style=\"color: windowtext;\">Medicine</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"150\" style=\"width:112.65pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">coordenacaomedicina@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"61\" style=\"width:45.95pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(37)3690-4498<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;<o:p></o:p></span></div>\r\n\r\n<div><b><span lang=\"EN-US\">Sete Lagoas Campus (CSL)<o:p></o:p></span></b></div>\r\n\r\n<div>Rua Sétimo Moreira\r\nMartins, 188,&nbsp;Itapoã, CEP: 35.702-031,&nbsp;Sete Lagoas – MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Food <a href=\"http://www.ufsj.edu.br/ceali/\"><span style=\"color: windowtext;\">Engineering</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">ceali@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3775-5514<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/ceagr/\"><span style=\"color: windowtext;\">Agricultura</span></a>l\r\n  <a href=\"http://www.ufsj.edu.br/ceali/\"><span style=\"color: windowtext;\">Engineering</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">ceagr@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3775-5513<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/cobib/\"><span style=\"color: windowtext;\">Biosystems</span></a>\r\n  (Bachelor)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">cobib@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3775-5513<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://www.ufsj.edu.br/ceflo/index.php\"><span style=\"color: windowtext;\">Forestry</span></a> <a href=\"http://www.ufsj.edu.br/ceali/\"><span style=\"color: windowtext;\">Engineering</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"mailto:ceflo@ufsj.edu.br\"><span style=\"color: windowtext;\">ceflo@ufsj.edu.br</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(31) 3775-5523<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;</span></div>\r\n\r\n<div><span lang=\"EN-US\"><br>\r\n<b>Distance Learning Centre -&nbsp;<a href=\"http://www.nead.ufsj.edu.br/portal/\"><span style=\"color: windowtext;\">EAD</span></a><o:p></o:p></b></span></div>\r\n\r\n<div>Praça Frei Orlando,\r\n170, Centro, CEP: 36.307-352, São João del-Rei - MG<o:p></o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">\r\n <tbody><tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Course<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">e-mail<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">Phone<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://grad.nead.ufsj.edu.br/AdmP/site/index.php\"><span style=\"color: windowtext;\">Public</span></a>\r\n  Administration<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">admpublica@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5831/5833<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://grad.nead.ufsj.edu.br/mat/site/index.php?secao=principal\"><span style=\"color: windowtext;\">Mathematics</span></a>\r\n  (Teacher Education)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">matematica@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5831/5833<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://grad.nead.ufsj.edu.br/pedag/site/index.php?secao=principal\"><span style=\"color: windowtext;\">Pedagogy</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">pedagogia@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5831/5833<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"178\" style=\"width:133.4pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\"><a href=\"http://curso.nead.ufsj.edu.br/FIL/site/\"><span style=\"color: windowtext;\">Philosophy</span></a> (Teacher Education)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"89\" style=\"width:66.7pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">filosofia@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"67\" style=\"width:49.9pt;padding:0cm 0cm 0cm 0cm\">\r\n  <div><span lang=\"EN-US\">(32) 3379-5831/5833<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"EN-US\">&nbsp;</span></div></div>', 4);
INSERT INTO `PagesTranslations` (`PagesTranslations_ID`, `PagesTranslations_Language`, `PagesTranslations_Title`, `PagesTranslations_Content`, `Pages_ID_FK`) VALUES
(15, 'es-es', 'CARRERAS DE PREGRADOS', '<div><div><b><span style=\"font-size:14.0pt;mso-ansi-language:PT-BR\">CARRERAS DE\r\nPREGRADOS OFRECIDAS<o:p></o:p></span></b></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<div><b>Campus Santo Antônio</b>\r\n(CSA)<o:p></o:p></div>\r\n\r\n<div>Praça Frei Orlando, 170, Centro,\r\nCEP: 36.307-352, São João del-Rei/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"567\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería de Producción<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coenp@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5911<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Eléctrica<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coele@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5913<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Mecánica<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">comec@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5915<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Matemática<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">comat@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5917<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"ES\">&nbsp;</span></div>\r\n\r\n<div><b><span lang=\"ES\">Campus Dom Bosco</span></b><span lang=\"ES\"> (CDB)<o:p></o:p></span></div>\r\n\r\n<div>Praça Dom Helvécio, 74, Bairro\r\nFábricas, CEP: 36.301-160, São João del-Rei/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"567\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Biotecnología<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cobit@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5126<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:2;height:27.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">Ciencias Biológicas\r\n  (Licenciatura)<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\">Ciencias Biológicas (Bachillerato)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">cobio@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5117<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Filosofía<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cofil@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5118<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:4;height:27.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">Física (Licenciatura)<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\">Física (Bachillerato)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">cofis@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5123<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Historia<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cohis@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5119<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Lenguas – Inglés y sus Literaturas <o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">colil@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">-<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Lenguas – Portugués<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">colet@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5120<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Medicina<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cmedi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3371-5125<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Pedagogía<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coped@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5121<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Psicología<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">copsi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5115<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11;mso-yfti-lastrow:yes;height:27.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">Química (Licenciatura)<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\">Química (Bachillerato)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">coqui@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-5124<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"ES\">&nbsp;</span></div>\r\n\r\n<div><b><span lang=\"ES\">Campus Tancredo\r\nNeves</span></b><span lang=\"ES\"> (CTAN)<o:p></o:p></span></div>\r\n\r\n<div>Avenida Visconde do Rio Preto, Km\r\n02, Colônia do Bengo, CEP: 36.301-360, São João del-Rei/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"567\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Administración <o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coadm@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4926<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Arquitectura y Urbanismo<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coarq@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4972<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:3;height:14.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">Artes Aplicadas<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">coaap@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4974<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ciencia de la Computación<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">ccomp@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4937<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:5;height:15.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 15pt;\">\r\n  <div><span lang=\"ES\">Ciencias Contables<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 15pt;\">\r\n  <div><span lang=\"ES\">cocic@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 15pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4911 +55 (32) 3379-4912<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ciencias Económicas <o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coeco@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4924<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Comunicación Social - Periodismo<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">ccoms@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4258<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Educación Física (Licenciatura)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coefi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3371-5203<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Geografía (Licenciatura)<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\">Geografía (Bachillerato)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cogeo@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4930<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Música (Licenciatura)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cmusi@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4962<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11;height:27.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">Teatro (Licenciatura)<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\">Teatro (Bachillerato)<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">cotea@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 27pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4981<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:12;mso-yfti-lastrow:yes;height:14.0pt\">\r\n  <td width=\"272\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">Zootecnia<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">cozoo@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt; height: 14pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3379-4968<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><b><span lang=\"ES\">Campus Alto\r\nParaopeba</span></b><span lang=\"ES\"> (CAP)<o:p></o:p></span></div>\r\n\r\n<div>Rodovia MG 443, Km 7, CEP:\r\n36.420-000, Ouro Branco/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"567\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Civil<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coenci@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (32) 3749-7312<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería de Bioprocesos<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coenbio@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3749-7314<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería de Telecomunicaciones<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coentel@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3749-7319<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Química<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coenqui@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3749-7313<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"272\" valign=\"top\" style=\"width: 203.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Mecatrónica<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"151\" valign=\"top\" style=\"width: 4cm; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coenmec@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"144\" valign=\"top\" style=\"width: 107.95pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3749-7318<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"ES\">&nbsp;</span></div>\r\n\r\n<div><b>Campus Centro-Oeste “Dona Lindu”</b> (CCO)<o:p></o:p></div>\r\n\r\n<div>Rua Sebastião Gonçalves Coelho,\r\n400, Bairro Chanadour, CEP: 35.501-296, Divinópolis/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"565\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"149\" valign=\"top\" style=\"width: 111.75pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"274\" valign=\"top\" style=\"width: 205.5pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"149\" valign=\"top\" style=\"width: 111.75pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Bioquímica<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"274\" valign=\"top\" style=\"width: 205.5pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coordenacaobioquimica@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (37) 3690-4499<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"149\" valign=\"top\" style=\"width: 111.75pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Enfermería<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"274\" valign=\"top\" style=\"width: 205.5pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coordenacaoenfermagem@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (37) 3690-4496<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"149\" valign=\"top\" style=\"width: 111.75pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Farmacia<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"274\" valign=\"top\" style=\"width: 205.5pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coordenacaofarmacia@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (37) 3690-4497<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"149\" valign=\"top\" style=\"width: 111.75pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Medicina<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"274\" valign=\"top\" style=\"width: 205.5pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">coordenacaomedicina@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (37) 3690-4498<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"ES\">&nbsp;</span></div>\r\n\r\n<div><b><span lang=\"ES\">Campus Sete Lagos</span></b><span lang=\"ES\"> (CSL)<o:p></o:p></span></div>\r\n\r\n<div>Rua Sétimo Moreira Martins, 188,\r\nBairro Itapoã, CEP: 35.702-031, Sete Lagoas/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"565\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"270\" valign=\"top\" style=\"width: 202.85pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"153\" valign=\"top\" style=\"width: 114.4pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"270\" valign=\"top\" style=\"width: 202.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería de Alimentos<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"153\" valign=\"top\" style=\"width: 114.4pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">ceali@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3775-5514<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"270\" valign=\"top\" style=\"width: 202.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Agronómica<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"153\" valign=\"top\" style=\"width: 114.4pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">ceagr@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3775-5513<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"270\" valign=\"top\" style=\"width: 202.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Bachillerato Interdisciplinar en Biosistemas<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"153\" valign=\"top\" style=\"width: 114.4pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">cobib@ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3775-5513<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"270\" valign=\"top\" style=\"width: 202.85pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Ingeniería Forestal <o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"153\" valign=\"top\" style=\"width: 114.4pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\"><a href=\"mailto:ceflo@ufsj.edu.br\"><span style=\"color: windowtext;\">ceflo@ufsj.edu.br</span></a><o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"142\" valign=\"top\" style=\"width: 106.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 (31) 3775-5523<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><span lang=\"ES\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></span></div>\r\n\r\n<div><b><span lang=\"ES\">Núcleo de\r\nEducación a Distancia</span></b><span lang=\"ES\"> (NEAD)<o:p></o:p></span></div>\r\n\r\n<div>Praça Frei Orlando, 170, Centro,\r\nCEP: 36.307-352, São João del-Rei/MG<o:p></o:p></div>\r\n\r\n<div><o:p>&nbsp;</o:p></div>\r\n\r\n<table class=\"MsoNormalTable\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"581\" style=\"border: none;\">\r\n <tbody><tr>\r\n  <td width=\"206\" style=\"width: 154.25pt; border-width: 1pt; border-color: black; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Carrera<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"242\" style=\"width: 181.35pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Correo<o:p></o:p></span></b></div>\r\n  </td>\r\n  <td width=\"134\" style=\"width: 100.4pt; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0cm 5.4pt;\">\r\n  <div><b><span lang=\"ES\">Teléfono<o:p></o:p></span></b></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"206\" style=\"width: 154.25pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Administración Pública<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"242\" style=\"width: 181.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\" style=\"font-size:12.0pt;line-height:115%\">admpublica@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"134\" rowspan=\"4\" style=\"width: 100.4pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">+55 </span><span lang=\"ES\" style=\"font-size:\r\n  10.0pt;line-height:115%\">(32) 3379-5831<o:p></o:p></span></div>\r\n  <div><span lang=\"ES\" style=\"font-size:10.0pt;line-height:115%\">+55\r\n  (32) 3379-5833</span><span lang=\"ES\"><o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"206\" style=\"width: 154.25pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Licenciatura en Filosofía<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"242\" style=\"width: 181.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\" style=\"font-size:12.0pt;line-height:115%\">filosofia@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"206\" style=\"width: 154.25pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Licenciatura en Matemática<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"242\" style=\"width: 181.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\" style=\"font-size:12.0pt;line-height:115%\">matematica@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td width=\"206\" style=\"width: 154.25pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; border-right-color: black; border-bottom-color: black; border-left-color: black; border-top: none; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\">Pedagogía<o:p></o:p></span></div>\r\n  </td>\r\n  <td width=\"242\" style=\"width: 181.35pt; border-top: none; border-left: none; border-bottom-width: 1pt; border-bottom-color: black; border-right-width: 1pt; border-right-color: black; padding: 0cm 5.4pt;\">\r\n  <div><span lang=\"ES\" style=\"font-size:12.0pt;line-height:115%\">pedagogia@nead.ufsj.edu.br<o:p></o:p></span></div>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<div><a name=\"_gjdgxs\"></a><span lang=\"ES\">&nbsp;</span></div></div>', 4);
INSERT INTO `PagesTranslations` (`PagesTranslations_ID`, `PagesTranslations_Language`, `PagesTranslations_Title`, `PagesTranslations_Content`, `Pages_ID_FK`) VALUES
(16, 'fr-fr', 'CARRERAS DE PREGRADOS', '<div><br></div>', 4),
(17, 'pt-br', 'CAMPUS TANCREDO NEVES', '<div>CAMPUS TANCREDO NEVES<br></div>', 5),
(18, 'en-us', 'CAMPUS TANCREDO NEVES', '<div>CAMPUS TANCREDO NEVES<br></div>', 5),
(19, 'es-es', 'CAMPUS TANCREDO NEVES', '<div>CAMPUS TANCREDO NEVES<br></div>', 5),
(20, 'fr-fr', 'CAMPUS TANCREDO NEVES', '<div>CAMPUS TANCREDO NEVES<br></div>', 5),
(21, 'pt-br', 'Seminário', '<div><b>aaaaa</b></div><div><b><font color=\"#ff0000\"><br></font></b></div><div><b><font color=\"#ff0000\">bbb</font></b></div><div><b><i><br></i></b></div><div><b><i><br></i></b></div><div><b><i>bb</i></b></div><div><b><i>b</i></b></div><div><b><font face=\"Arial Black\">ff</font></b></div><div><b><font face=\"Arial Black\"><br></font></b></div><div><b><font face=\"Arial Black\">f</font></b></div>', 6),
(22, 'en-us', 'Seminário', '<div>aaaa</div><div><br></div><div><br></div><div>rrrrr</div><div>g</div><div>g</div><div><font color=\"#0000ff\">g</font></div><div><font color=\"#0000ff\">g</font></div><div><font color=\"#0000ff\">g</font></div>', 6),
(23, 'es-es', 'Seminário', '<div>aaaa</div>', 6),
(24, 'fr-fr', 'Seminário', '<div><b>aaaaa</b></div>', 6),
(25, 'pt-br', 'Planetário', '<div>TESTE</div><div><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">O planetário, espaço de educação não formal excepcional, oferece diversas sessões na cúpula que abordam, interdi</span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">sciplinarmente, conteúdos&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: \" acumin=\"\" variable=\"\" concept\";=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"font-family: arial, helvetica, sans-serif;\">de Astronomia e Ciência, com linguagens apropriadas para a ampla faixa etária e de escolaridade</span></span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">&nbsp;de seu público.&nbsp;</span><br></div>', 7),
(26, 'en-us', 'Planetarium', '<div><div>TESTE</div><div><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">O planetário, espaço de educação não formal excepcional, oferece diversas sessões na cúpula que abordam, interdi</span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">sciplinarmente, conteúdos&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: \" acumin=\"\" variable=\"\" concept\";=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"font-family: arial, helvetica, sans-serif;\">de Astronomia e Ciência, com linguagens apropriadas para a ampla faixa etária e de escolaridade</span></span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">&nbsp;de seu público.&nbsp;</span></div></div>', 7),
(27, 'es-es', 'Planetario', '<div><div>TESTE</div><div><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">O planetário, espaço de educação não formal excepcional, oferece diversas sessões na cúpula que abordam, interdi</span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">sciplinarmente, conteúdos&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: \" acumin=\"\" variable=\"\" concept\";=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"font-family: arial, helvetica, sans-serif;\">de Astronomia e Ciência, com linguagens apropriadas para a ampla faixa etária e de escolaridade</span></span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">&nbsp;de seu público.&nbsp;</span></div></div>', 7),
(28, 'fr-fr', 'Planetário', '<div><div>TESTE</div><div><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">O planetário, espaço de educação não formal excepcional, oferece diversas sessões na cúpula que abordam, interdi</span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">sciplinarmente, conteúdos&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: \" acumin=\"\" variable=\"\" concept\";=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"font-family: arial, helvetica, sans-serif;\">de Astronomia e Ciência, com linguagens apropriadas para a ampla faixa etária e de escolaridade</span></span><span style=\"color: rgb(0, 0, 0); text-align: justify; font-family: arial, helvetica, sans-serif;\">&nbsp;de seu público.&nbsp;</span></div></div>', 7),
(29, 'pt-br', 'teste', '<div>teste&nbsp;<span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><span style=\"font-size: 1rem;\">teste&nbsp;</span><a href=\"http://192.168.2.175/assets/files/Res022Consu2018_PoliticaInternacionalizaco.pdf\" target=\"_blank\">teste&nbsp;teste&nbsp;</a><span style=\"font-size: 1rem;\"></span></div><div><span style=\"font-size: 1rem;\"><br></span></div><div><span style=\"font-size: 1rem;\"><br></span></div><div><span style=\"font-size: 1rem;\"><br><br><div class=\"videoEmbed\" style=\"position:relative;height:0;padding-bottom:56.25%\"><iframe src=\"https://www.youtube-nocookie.com/embed/AQc0rMqqA6Y?ecver=2\" width=\"640\" height=\"360\" frameborder=\"0\" style=\"position:absolute;width:100%;height:100%;left:0\" webkitallowfullscreen=\"\" mozallowfullscreen=\"\" allowfullscreen=\"\"></iframe></div><br><br><br></span></div><div><span style=\"font-size: 1rem;\"><br></span></div><a href=\"http://192.168.2.175/assets/files/Res022Consu2018_PoliticaInternacionalizaco.pdf\" target=\"_self\">politica int</a><a href=\"http://192.168.2.175/assets/files/termo de referência - contratação sistema de gestão de RI corrigido secol.doc\" target=\"_blank\">http://192.168.2.175/assets/files/termo de referência - contratação sistema de gestão de RI corrigido secol.doc</a><div><a href=\"http://192.168.2.175/assets/files/termo de referência - contratação sistema de gestão de RI corrigido secol.doc\" target=\"_self\"></a><img src=\"http://192.168.2.175/assets/files/ufsj-cap-site 2.jpg\" style=\"text-align: left;\"><br><div><span style=\"font-size: 1rem;\"></span></div><div><br></div><div><br></div></div>', 8),
(30, 'en-us', 'teste', '<div><br></div>', 8),
(31, 'es-es', 'teste', '<div><br></div>', 8),
(32, 'fr-fr', 'i8', '<div><br></div>', 8);

-- --------------------------------------------------------





--
-- Estrutura para tabela `ServerFiles`
--

CREATE TABLE `ServerFiles` (
  `ServerFiles_ID` int(11) NOT NULL,
  `Users_ID_FK` int(11) DEFAULT NULL,
  `ServerFiles_Name` varchar(512) DEFAULT NULL,
  `ServerFiles_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `ServerFiles`
--

INSERT INTO `ServerFiles` (`ServerFiles_ID`, `Users_ID_FK`, `ServerFiles_Name`, `ServerFiles_Date`) VALUES
(1, 4, 'Res022Consu2018_PoliticaInternacionalizaco.pdf', '2022-02-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Users`
--

CREATE TABLE `Users` (
  `Users_ID` int(11) NOT NULL,
  `Users_Name` varchar(255) DEFAULT NULL,
  `Users_Email` varchar(255) DEFAULT NULL,
  `Users_Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `Users`
--

INSERT INTO `Users` (`Users_ID`, `Users_Name`, `Users_Email`, `Users_Password`) VALUES
(1, 'Usuário', 'user@gmail.com', '$2y$10$PJqTrF5D8PemI.RVGcAWKOKT1EnnA4.FqsW50uWF9IlrWSstSvBje'),
(2, 'Gallo', 'assin.intercambio@ufsj.edu.br', '$2y$10$VoHNGFylMzmCKY8eRfG8U.HwmzyWgeVn4lxPHqvf0fp.C.W6TIQhS'),
(3, 'José Roberto', 'incoming.assin@ufsj.edu.br', '$2y$10$cFpGZaLZtmx0oJgMEYUrbOfNaf3QXiLfZW86dr/5dvBFKyB3Etv4q'),
(4, 'Kátia', 'assin@ufsj.edu.br', '$2y$10$E68.4CppfYcQlaH2LkuE9utoaS2X84Ts.rABbV3P3Up2wY1izfZ6a'),
(5, 'Liliane', 'lilisade@ufsj.edu.br', '$2y$10$xKsAcxtdVE4BGHS4o5nzsOE8M86rvTpRU5u9DKtGVOJCG28m4vN2K'),
(6, 'Joice Cristina', 'joyciinha_cristina@hotmail.com', '$2y$10$szgUdiJyqHt5DX7fn7lkKeshYF465zUlpfJCVPyyxWvF4A1whvjmG'),
(7, 'Livia', 'liviamgimenez25@aluno.ufsj.edu.br', '$2y$10$6/kuhLRr3F9ylbbDgCj/web/tIC42xt/akdGJC67xs/tTovq6kFt2');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ActivityLogs`
--
ALTER TABLE `ActivityLogs`
  ADD PRIMARY KEY (`Logs_ID`),
  ADD KEY `Users_ID_FK` (`Users_ID_FK`);

--
-- Índices de tabela `Cards`
--
ALTER TABLE `Cards`
  ADD PRIMARY KEY (`Cards_ID`),
  ADD KEY `Users_ID_FK_Author` (`Users_ID_FK_Author`),
  ADD KEY `Users_ID_FK_LastEditionAuthor` (`Users_ID_FK_LastEditionAuthor`);

--
-- Índices de tabela `CardsTranslations`
--
ALTER TABLE `CardsTranslations`
  ADD PRIMARY KEY (`CardsTranslations_ID`),
  ADD KEY `Cards_ID_FK` (`Cards_ID_FK`);

--
-- Índices de tabela `CarouselImages`
--
ALTER TABLE `CarouselImages`
  ADD PRIMARY KEY (`CImages_ID`),
  ADD KEY `Users_ID_FK` (`Users_ID_FK`);

--
-- Índices de tabela `GalleryImages`
--
ALTER TABLE `GalleryImages`
  ADD PRIMARY KEY (`GImages_ID`),
  ADD KEY `Users_ID_FK` (`Users_ID_FK`);

--
-- Índices de tabela `GeneralSettings`
--
ALTER TABLE `GeneralSettings`
  ADD PRIMARY KEY (`GeneralSettings_ID`);

--
-- Índices de tabela `Depoimentos`
--
ALTER TABLE `Depoimentos`
  ADD PRIMARY KEY (`DepoimentosID`),
  ADD KEY `Users_ID_FK_Author` (`Users_ID_FK_Author`),
  ADD KEY `Users_ID_FK_LastEditionAuthor` (`Users_ID_FK_LastEditionAuthor`);

--
-- Índices de tabela `Highlights`
--
ALTER TABLE `Highlights`
  ADD PRIMARY KEY (`Highlights_ID`),
  ADD KEY `Users_ID_FK_Author` (`Users_ID_FK_Author`),
  ADD KEY `Users_ID_FK_LastEditionAuthor` (`Users_ID_FK_LastEditionAuthor`);

--
-- Índices de tabela `DepoimentosTranslations`
--
ALTER TABLE `DepoimentosTranslations`
  ADD PRIMARY KEY (`DepoimentosTranslations_ID`),
  ADD KEY `DepoimentosID_FK` (`DepoimentosID_FK`);

--
-- Índices de tabela `HighlightsTranslations`
--
ALTER TABLE `HighlightsTranslations`
  ADD PRIMARY KEY (`HighlightsTranslations_ID`),
  ADD KEY `Highlights_ID_FK` (`Highlights_ID_FK`);

--
-- Índices de tabela `Menus`
--
ALTER TABLE `Menus`
  ADD PRIMARY KEY (`Menus_ID`);

--
-- Índices de tabela `MenusChilds`
--
ALTER TABLE `MenusChilds`
  ADD PRIMARY KEY (`MenusChilds_ID`),
  ADD KEY `Menus_ID_FK` (`Menus_ID_FK`);

--
-- Índices de tabela `MenusGrandChilds`
--
ALTER TABLE `MenusGrandChilds`
  ADD PRIMARY KEY (`MenusGrandChilds_ID`),
  ADD KEY `MenusChilds_ID_FK` (`MenusChilds_ID_FK`);

--
-- Índices de tabela `MenusTranslations`
--
ALTER TABLE `MenusTranslations`
  ADD PRIMARY KEY (`MenusTranslations_ID`),
  ADD KEY `Menus_ID_FK` (`Menus_ID_FK`),
  ADD KEY `MenusChilds_ID_FK` (`MenusChilds_ID_FK`),
  ADD KEY `MenusGrandChilds_ID_FK` (`MenusGrandChilds_ID_FK`);

--
-- Índices de tabela `Pages`
--
ALTER TABLE `Pages`
  ADD PRIMARY KEY (`Pages_ID`),
  ADD KEY `Users_ID_FK_Author` (`Users_ID_FK_Author`),
  ADD KEY `Users_ID_FK_LastEditionAuthor` (`Users_ID_FK_LastEditionAuthor`);

--
-- Índices de tabela `PagesTranslations`
--
ALTER TABLE `PagesTranslations`
  ADD PRIMARY KEY (`PagesTranslations_ID`),
  ADD KEY `Pages_ID_FK` (`Pages_ID_FK`);

--
-- Índices de tabela `ServerFiles`
--
ALTER TABLE `ServerFiles`
  ADD PRIMARY KEY (`ServerFiles_ID`),
  ADD KEY `Users_ID_FK` (`Users_ID_FK`);

--
-- Índices de tabela `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Users_ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ActivityLogs`
--
ALTER TABLE `ActivityLogs`
  MODIFY `Logs_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Cards`
--
ALTER TABLE `Cards`
  MODIFY `Cards_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `CardsTranslations`
--
ALTER TABLE `CardsTranslations`
  MODIFY `CardsTranslations_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `CarouselImages`
--
ALTER TABLE `CarouselImages`
  MODIFY `CImages_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `GalleryImages`
--
ALTER TABLE `GalleryImages`
  MODIFY `GImages_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de tabela `GeneralSettings`
--
ALTER TABLE `GeneralSettings`
  MODIFY `GeneralSettings_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `Highlights`
--
ALTER TABLE `Highlights`
  MODIFY `Highlights_ID` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `Depoimentos`
  MODIFY `DepoimentosID` int(11) NOT NULL AUTO_INCREMENT;
--
ALTER TABLE `DepoimentosTranslations`
  MODIFY `DepoimentosTranslations_ID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT de tabela `HighlightsTranslations`
--
ALTER TABLE `HighlightsTranslations`
  MODIFY `HighlightsTranslations_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Menus`
--
ALTER TABLE `Menus`
  MODIFY `Menus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `MenusChilds`
--
ALTER TABLE `MenusChilds`
  MODIFY `MenusChilds_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de tabela `MenusGrandChilds`
--
ALTER TABLE `MenusGrandChilds`
  MODIFY `MenusGrandChilds_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de tabela `MenusTranslations`
--
ALTER TABLE `MenusTranslations`
  MODIFY `MenusTranslations_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT de tabela `Pages`
--
ALTER TABLE `Pages`
  MODIFY `Pages_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `PagesTranslations`
--
ALTER TABLE `PagesTranslations`
  MODIFY `PagesTranslations_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de tabela `ServerFiles`
--
ALTER TABLE `ServerFiles`
  MODIFY `ServerFiles_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `Users`
--
ALTER TABLE `Users`
  MODIFY `Users_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `ActivityLogs`
--
ALTER TABLE `ActivityLogs`
  ADD CONSTRAINT `ActivityLogs_ibfk_1` FOREIGN KEY (`Users_ID_FK`) REFERENCES `Users` (`Users_ID`);

--
-- Restrições para tabelas `Cards`
--
ALTER TABLE `Cards`
  ADD CONSTRAINT `Cards_ibfk_1` FOREIGN KEY (`Users_ID_FK_Author`) REFERENCES `Users` (`Users_ID`),
  ADD CONSTRAINT `Cards_ibfk_2` FOREIGN KEY (`Users_ID_FK_LastEditionAuthor`) REFERENCES `Users` (`Users_ID`);

--
-- Restrições para tabelas `CardsTranslations`
--
ALTER TABLE `CardsTranslations`
  ADD CONSTRAINT `CardsTranslations_ibfk_1` FOREIGN KEY (`Cards_ID_FK`) REFERENCES `Cards` (`Cards_ID`);

--
-- Restrições para tabelas `CarouselImages`
--
ALTER TABLE `CarouselImages`
  ADD CONSTRAINT `CarouselImages_ibfk_1` FOREIGN KEY (`Users_ID_FK`) REFERENCES `Users` (`Users_ID`);

--
-- Restrições para tabelas `GalleryImages`
--
ALTER TABLE `GalleryImages`
  ADD CONSTRAINT `GalleryImages_ibfk_1` FOREIGN KEY (`Users_ID_FK`) REFERENCES `Users` (`Users_ID`);

--
-- Restrições para tabelas `Highlights`
--
ALTER TABLE `Highlights`
  ADD CONSTRAINT `Highlights_ibfk_1` FOREIGN KEY (`Users_ID_FK_Author`) REFERENCES `Users` (`Users_ID`),
  ADD CONSTRAINT `Highlights_ibfk_2` FOREIGN KEY (`Users_ID_FK_LastEditionAuthor`) REFERENCES `Users` (`Users_ID`);

ALTER TABLE `HighlightsTranslations`
  ADD CONSTRAINT `HighlightsTranslations_ibfk_1` FOREIGN KEY (`Highlights_ID_FK`) REFERENCES `Highlights` (`Highlights_ID`);
--


ALTER TABLE `Depoimentos`
  ADD CONSTRAINT `Depoimentos_ibfk_1` FOREIGN KEY (`Users_ID_FK_Author`) REFERENCES `Users` (`Users_ID`),
  ADD CONSTRAINT `Depoimentos_ibfk_2` FOREIGN KEY (`Users_ID_FK_LastEditionAuthor`) REFERENCES `Users` (`Users_ID`);
  
  
  
-- Restrições para tabelas `HighlightsTranslations`
--
ALTER TABLE `DepoimentosTranslations`
  ADD CONSTRAINT `DepoimentosTranslations_ibfk_1` FOREIGN KEY (`DepoimentosID_FK`) REFERENCES `Depoimentos` (`DepoimentosID`);

--
-- Restrições para tabelas `MenusChilds`
--
ALTER TABLE `MenusChilds`
  ADD CONSTRAINT `MenusChilds_ibfk_1` FOREIGN KEY (`Menus_ID_FK`) REFERENCES `Menus` (`Menus_ID`);

--
-- Restrições para tabelas `MenusGrandChilds`
--
ALTER TABLE `MenusGrandChilds`
  ADD CONSTRAINT `MenusGrandChilds_ibfk_1` FOREIGN KEY (`MenusChilds_ID_FK`) REFERENCES `MenusChilds` (`MenusChilds_ID`);

--
-- Restrições para tabelas `MenusTranslations`
--
ALTER TABLE `MenusTranslations`
  ADD CONSTRAINT `MenusTranslations_ibfk_1` FOREIGN KEY (`Menus_ID_FK`) REFERENCES `Menus` (`Menus_ID`),
  ADD CONSTRAINT `MenusTranslations_ibfk_2` FOREIGN KEY (`MenusChilds_ID_FK`) REFERENCES `MenusChilds` (`MenusChilds_ID`),
  ADD CONSTRAINT `MenusTranslations_ibfk_3` FOREIGN KEY (`MenusGrandChilds_ID_FK`) REFERENCES `MenusGrandChilds` (`MenusGrandChilds_ID`);

--
-- Restrições para tabelas `Pages`
--
ALTER TABLE `Pages`
  ADD CONSTRAINT `Pages_ibfk_1` FOREIGN KEY (`Users_ID_FK_Author`) REFERENCES `Users` (`Users_ID`),
  ADD CONSTRAINT `Pages_ibfk_2` FOREIGN KEY (`Users_ID_FK_LastEditionAuthor`) REFERENCES `Users` (`Users_ID`);

--
-- Restrições para tabelas `PagesTranslations`
--
ALTER TABLE `PagesTranslations`
  ADD CONSTRAINT `PagesTranslations_ibfk_1` FOREIGN KEY (`Pages_ID_FK`) REFERENCES `Pages` (`Pages_ID`);

--
-- Restrições para tabelas `ServerFiles`
--
ALTER TABLE `ServerFiles`
  ADD CONSTRAINT `ServerFiles_ibfk_1` FOREIGN KEY (`Users_ID_FKCards_ID`) REFERENCES `Users` (`Users_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;