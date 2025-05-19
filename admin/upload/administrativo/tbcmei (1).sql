-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2018 às 15:42
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `semed`
--

--
-- Extraindo dados da tabela `tbcmei`
--

INSERT INTO `tbcmei` (`tbcmcei_id`, `tbcmei_nome`, `tbcmei_tel`, `tbcmei_coord`, `tbcmei_email`, `tbcmei_cep`, `tbcmei_end`, `tbcmei_num`, `tbcmei_comp`, `tbcmei_bairro`, `tbcmei_cidade`, `tbcmei_login`, `dados_usuarios_ID`) VALUES
(12, 'TIA GLORIA', '36636945', 'FABIANE', 'cmeitiagloria@gmail.com', '83403-420', 'Rua Rio Iguaçu', '286', '', 'Roça Grande', NULL, '', 25),
(16, 'COORDENAÇÃO', '36058223', 'Paulo', 'coodencaocmeis@gmail.com', '83408538', 'Rua Marli Senhorianha da Silva', '25', 'Casa', 'ALTO MARACANÃ', NULL, '', 123),
(17, 'DEPTO DE INFORMÁTICA', '3755963', 'Helelenildo de Lima Arrais', 'helenildo_ti@hotmail.com', '83405030', 'Rua Dorval Seccon', '664', '2 andar', 'Nossa Sra de Fatima', NULL, '', 123),
(23, 'Aquarela', '3663-6998', 'Maria Sueli Bruzda Silveira', 'cmeiaquarela@gmail.com', '83403-000', 'Prefeito Pio Alberti ', '564', '', 'Osasco', NULL, NULL, 123),
(24, 'Arco íris', '3606-0493', 'Regiane Aparecida de Quieiroz', 'arcoiriscmei@gmail.com ', '83401-040', 'Do Curió', '55', '', 'Ana Rosa', NULL, NULL, 123),
(25, 'Balão Mágico', '3656-2096', 'Marta Aparecida Padovani Amancio', 'balaomagicocmei@gmail.com ', '83414-690', 'Do Juazeiro', '77', '', 'Parque Embu', NULL, NULL, 123),
(26, 'Berço de Ouro', '3663-6407', 'Monica Aparecida Paulino Lima', 'cmeibercodeouro@gmail.com ', '83408-450', 'Joaquim Rocha', '355', '', 'Jd Adriana', NULL, NULL, 123),
(27, 'Branca de Neve', '3621-0444', 'Gerci Pereira Lopes', 'brancadenevecmei@gmail.com  ', '83402-310', 'José Brito Juca', '67', '', 'Cesar Augusto', NULL, NULL, 123),
(28, 'Canaã', '3621-5062', 'Sirlei Aparecida dos Santos', 'canaacmei@gmail.com ', '83404-710', 'Travessa Alasca', '158', '', 'Campo Pequeno', NULL, NULL, 123),
(29, 'Carrossel', '3606-1394', 'Lourdes Barbosa da Fonseca de Borba', 'cmeicarrosselcolombo@gmail.com', '83411-400', 'Das Dálias', '5', '', 'Parque Monte Castelo', NULL, NULL, 123),
(30, 'Cantinho Feliz', '3666-2681', 'Vera Lúcia Tavares', 'cmeicantinho@gmail.com', '83410-110', 'Balsa Nova', '449', '', 'Guaraituba', NULL, NULL, 123),
(31, 'Chapeuzinho Vermelho', '3621-2635', 'Denir da Silva Medeiros', 'cmeichapeuzinhov@gmail.com ', '83411-360', 'Das Orquideas', '751', '', 'Parque Monte Castelo', NULL, NULL, 123),
(32, 'Cinderela', '3621-7712', 'Edilene Pires Covaleski', 'cmeicinderela135@gmail.com ', '83404-680', 'Nicarágua', '135', '', 'Campo Pequeno', NULL, NULL, 123),
(33, 'Crisálida', '3663-0836', 'Nilza Candido da Silva Bellemer', 'cmeicrisalida@gmail.com ', '83405-100', 'Getúlio Vargas', '485', '', 'Rio Verde', NULL, NULL, 123),
(34, 'Estrela Dalva', '3663-1651', 'Jurema F.B.S. Da Cruz', 'cmeiestreladalva@gmail.com ', '83409-510', 'Cassiano Ricardo', '17', '', 'Vila Guarani', NULL, NULL, 123),
(35, 'Favo de Mel', '3666-3280', 'Marcia Eluisa Contente', 'cmeifavodemel@gmail.com ', '83411-520', 'São Francisco', '272', '', 'Jd Esmeralda', NULL, NULL, 123),
(36, 'Florzinha do R. Encantado', '3656-2553', 'Carmen Lucia Militão dos Santos Costa', 'cmeiflorzinha@gmail.com ', '83401-270', 'Do Pelicano', '177', '', 'Jd Sta Tereza', NULL, NULL, 123),
(37, 'Genoveva Brenner', '3621-9452', 'Jucelia GonÃ§alves de Lima', 'genovevabrenner112@gmail.com ', '83402-130', 'Manoel de Carvalho', '112', '', 'Jd Carvalho', NULL, NULL, 123),
(38, 'Girassol', '3675-7958', 'Sirlete Becher', 'cmeigirassolcolombo@gmail.com', '83413-690', 'Judith Schlug', '600', '', 'C.I MaÃºa', NULL, NULL, 123),
(39, 'Gota  de Orvalho', '3621-9542', 'Celia Regina Pereira', 'cmeigotadeorvalho@gmail.com ', '83405-250', 'Francisco Xavier', '116', '', 'Nossa SrÂª FÃ¡tima', NULL, NULL, 123),
(40, 'Jardim Palmares', '3606-8598', 'Silvana Monteiro', 'cmeijdpalmares@gmail.com ', '83412-540', 'Alzenir Toldo', '272', '', 'Jd Palmares', NULL, NULL, 123),
(41, 'Lua de Cristal', '3621-7171', 'Delmira de CÃ¡ssia ApolinÃ¡rio', 'cmeiluadecristal94@gmail.com ', '83410-850', 'Pato Branco', '27', '', 'Jd. Cristina III', NULL, NULL, 123),
(42, 'Meu Cantinho', '3663-7231', 'Marili Bonfim de Lima ', 'cmeimeucantinhocolombo@gmail.com ', '83407-000', 'Prefeito Joao Batista Stocco', '836', '', ' Jd. GuarujÃ¡', NULL, NULL, 123),
(46, 'Mundo Mágico', '3621-9588', 'Patricia Vieira', 'cmeimundomagico2014@gmail.com ', '83406-050', 'Antonio Francisco Scrok', '39', 'casa', 'Vale Verde', NULL, NULL, 123),
(47, 'Nona Joana', '3663-6629', 'Maria Aparecida R.Ribeiro', 'cmeinonajoana@gmail.com ', '83413-140', 'Maria Geronasso do Rosário', '412', 'casa', 'Vila Mª do Rosário', NULL, NULL, 123),
(48, 'Novo Atubinha', '3675-6015', 'Ana Carla Fischer', 'novoatubinha.cmei@gmail.com ', '83408-280', 'Abel Scuiciatto', '3143', 'casa', 'Atuba', NULL, NULL, 123),
(49, 'Padre Eugenio Belotto', '3656-4260', 'Gisele Maria D''Agostin Karpinski', 'cmeieugeniobelotto@gmail.com', '83415-180', 'Francisco Mottin Neto', '288', 'casa', 'Cercadinho', NULL, NULL, 123),
(50, 'Pedacinho do Céu', '3663-8555', 'Jorgina da Silva Leme Severnini', 'cmeipedacinhodoceu1@gmail.com', '83407-690', 'Angela Tereza C. Coleto', '344', 'casa', 'S. Gabriel', NULL, NULL, 123),
(51, 'Pequeninos do Jardim', '3606-6408', 'Dircelia de Carvalho Parise', 'pequeninosdojardim2014@gmail.com ', '83407-470', 'Das Bananeiras', '49', 'casa', 'Jd. Das Graças', NULL, NULL, 123),
(52, 'Pequenos Brilhantes', '3675-6931', 'Josilda Fernandes Sinhori', 'pequenosbrilhantes94@gmail.com ', '83413-020', 'Alfredo Puppi', '94', 'casa', 'Jd. Ana Maria', NULL, NULL, 123),
(53, 'Peter Pan', '3656-4348', 'Karin Regiane Barbosa da Silva', 'cmeipeterpan@gmail.com', '83414-420', 'Dos Trabalhadores', '26', 'casa', 'Jd. Florença', NULL, NULL, 123),
(54, 'Pingo DÁgua', '3562-9156', 'Marli De Fátima Padilha da Silva', 'cmeipingodagua@gmail.com ', '83406-170', 'José Coradin', '159', 'casa', 'Jd. Monza', NULL, NULL, 123),
(55, 'Pingo de Gente', '3606-4568', 'Evanir Gross', 'pingocmei@gmail.com ', '83409-010', 'José de Alencar', '383', 'casa', 'Jd. Monte Castelo', NULL, NULL, 123),
(56, 'Pinóquio', '3621-0482', 'Vania Cristina Santos Oliveira Spichela', 'cmeipinoquio@gmail.com', '83402-640', 'Ana Souza Jonhsson', '337', 'casa', 'Jd. Osasco', NULL, NULL, 123),
(57, 'Piu-Piu', '3663-8369', 'Veranice de Jesus Rocha', 'piupiucmei@gmail.com ', '83402-490', 'Brasilio Bontorin', '530', 'casa', 'Jd Esperança', NULL, NULL, 123),
(58, 'Quero Aprender', '3621-6051', 'Fernanda Rodrigues Gonçalves', 'cmeiqueroaprender@gmail.com', '83401-650', 'Cristóvão Colombo', '198', 'casa', 'JD Central', NULL, NULL, 123),
(59, 'Raio de Sol', '3666-6450', 'Magdala dos Anjos Reis', 'cmeiraiodesolcolombo@gmail.com', '83412-290', 'Luiza Guarise Tosin', '332', 'casa', 'Belo rincão', NULL, NULL, 123),
(60, 'Recanto dos Baixinhos', '3663-8909', 'Solange Virgínia dos Santos Silva', 'cmeirecantodosbaixinhos@gmail.com', '83407-080', 'Luiz Bonato', '46', 'casa', 'São Sebastião', NULL, NULL, 123),
(61, 'Sonho Azul', '3605-3674', 'Maria Jaqueline Rodrigues Leme', 'cmeivivendo@gmail.com ', '83410-390', 'Paranaguá', '1116', 'casa', 'São José', NULL, NULL, 123),
(62, 'Tia Didi', '3606-4579', 'Cleide Daparé Detoni', 'cmeisonhoazul@gmail.com ', '83411-050', 'Pres. Faria', '235', 'casa', 'São Dimas', NULL, NULL, 123),
(64, 'Tia Itamara', '3562-1295', 'Cristiane Strapasson de Aguiar', 'tiagloriacmei@gmail.com ', '83410-040', 'Apucarana', '244', 'casa', 'Jd Guaraituba', NULL, NULL, 123),
(65, 'Tia Nair', '3663-8327', 'Maria Marta Dias', 'cmeitiaitamara@gmail.com ', '83408-090', 'Allan Kardec', '626', 'casa', 'Campo Alto', NULL, NULL, 123),
(66, 'Tia Sula', '3562-1013', 'Luciane de Fattima Berlesi', 'tianaircolombo@gmail.com ', '83412-210', 'Renato Soares de Almeida', '267', 'casa', 'Sta Rita', NULL, NULL, 123),
(67, 'Turma da Mônica', '3656-7523', 'Ivete Chemin Strapasson', 'cmeitiasula.colombo@gmail.com ', '83414-280', 'Pç. N. Sra. Do Rosário', '178', 'casa', 'Centro', NULL, NULL, 123),
(68, 'Vivendo e Aprendendo', '3663-4067', 'Irde Zanoni da Luz', 'turmadamonicamatriz@gmail.com ', '83414-020', 'Madre Paulina', '753', 'casa', 'Eucaliptos', NULL, NULL, 123),
(69, 'Complexo Pré-EscolaTurma da Monica', '3656-3696', 'Roseli Solange Soave', 'anexomonica@gmail.com ', '83408-545', 'Venancio Trevisan', '319', 'casa', 'Centro', NULL, NULL, 123),
(70, 'Vó Jandira', '3621-9067', 'Maria Jose de Lima', 'cmeivojandira@gmail.com ', '83404-010', 'Da Pedreira', '874', 'casa', 'Campo Pequeno', NULL, NULL, 123),
(71, 'CENTRO MUNICIPAL DE EDUCAÃ‡ÃƒO INFANTIL JARDIM PALMARES', '41 3606-8598', 'SILVANA MONTEIRO', 'cmeijdpalmares@gmail.com', '83412540', 'RUA ALZENIR TOLDO', '272', '', 'JARDIM PALMARES', NULL, NULL, 153),
(72, 'TIANAIR', '36638327', 'MARTA DIAS', 'tianaircolombopr@gmail.com', '83408090', 'ALAN KARDEC', '626', '', 'CAMPO ALTO', NULL, NULL, 175);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
