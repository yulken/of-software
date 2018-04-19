-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2018 às 19:47
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj-bd`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `mostra_tudo`
-- (See below for the actual view)
--
CREATE TABLE `mostra_tudo` (
`nome_jogo` varchar(150)
,`idjogo` int(11)
,`nome_plataforma` varchar(150)
,`idplataforma` int(11)
,`nome_genero` varchar(150)
,`idgenero` int(11)
,`nome_foto` varchar(150)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relaciona_genero`
--

CREATE TABLE `relaciona_genero` (
  `idjogo` int(11) NOT NULL,
  `idgenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `relaciona_genero`
--

INSERT INTO `relaciona_genero` (`idjogo`, `idgenero`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 3),
(5, 4),
(6, 4),
(7, 5),
(8, 4),
(9, 6),
(2, 2),
(3, 2),
(10, 7),
(11, 5),
(12, 1),
(13, 4),
(13, 6),
(9, 2),
(7, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relaciona_plataforma`
--

CREATE TABLE `relaciona_plataforma` (
  `idjogo` int(11) NOT NULL,
  `idplataforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `relaciona_plataforma`
--

INSERT INTO `relaciona_plataforma` (`idjogo`, `idplataforma`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 2),
(2, 2),
(2, 4),
(2, 3),
(3, 4),
(5, 2),
(5, 4),
(5, 3),
(6, 2),
(6, 4),
(7, 2),
(7, 4),
(8, 2),
(8, 4),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 2),
(12, 1),
(13, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

CREATE TABLE `tb_contato` (
  `idcontato` int(11) NOT NULL,
  `nome_contato` varchar(150) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `assunto` char(3) COLLATE utf8_bin NOT NULL,
  `mensagem` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fotjog`
--

CREATE TABLE `tb_fotjog` (
  `idjogo` int(11) NOT NULL,
  `nome_foto` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_fotjog`
--

INSERT INTO `tb_fotjog` (`idjogo`, `nome_foto`) VALUES
(1, 'purrsona.jpg'),
(2, 'barksouls.jpg'),
(3, 'pierauto.jpg'),
(4, 'dupercrash.jpg'),
(5, 'shadowlord.jpg'),
(6, 'redbad.jpg'),
(7, 'falou.jpg'),
(8, 'nomanos.jpg'),
(9, 'cuckhead.jpg'),
(10, 'mchero.jpg'),
(11, 'masterchef.jpg'),
(12, 'finalfantasy.jpg'),
(13, 'sanicboom.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_galjog`
--

CREATE TABLE `tb_galjog` (
  `idjogo` int(11) NOT NULL,
  `nome_pasta` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_galjog`
--

INSERT INTO `tb_galjog` (`idjogo`, `nome_pasta`) VALUES
(2, 'bark-souls/img1.jpg'),
(2, 'bark-souls/img2.jpg'),
(2, 'bark-souls/img3.jpg'),
(2, 'bark-souls/img4.jpg'),
(2, 'bark-souls/img5.jpg'),
(3, 'pier-autopata/img1.jpg'),
(3, 'pier-autopata/img2.jpg'),
(3, 'pier-autopata/img3.jpg'),
(3, 'pier-autopata/img4.jpg'),
(3, 'pier-autopata/img5.jpg'),
(1, 'discovery-purrsona/img1.png'),
(1, 'discovery-purrsona/img2.png'),
(1, 'discovery-purrsona/img3.jpg'),
(1, 'discovery-purrsona/img4.jpg'),
(1, 'discovery-purrsona/img5.jpg'),
(5, 'shadow-the-edgelord/img1.jpg'),
(5, 'shadow-the-edgelord/img2.jpg'),
(5, 'shadow-the-edgelord/img3.png'),
(5, 'shadow-the-edgelord/img4.png'),
(5, 'shadow-the-edgelord/img5.jpg'),
(4, 'super-crash-sis/img1.jpg'),
(4, 'super-crash-sis/img2.jpg'),
(4, 'super-crash-sis/img3.jpg'),
(4, 'super-crash-sis/img4.jpg'),
(4, 'super-crash-sis/img5.jpg'),
(9, 'cuckhead/img1.jpg'),
(9, 'cuckhead/img2.jpg'),
(9, 'cuckhead/img3.jpg'),
(9, 'cuckhead/img4.jpg'),
(9, 'cuckhead/img5.jpg'),
(7, 'falou/img1.jpg'),
(7, 'falou/img2.jpg'),
(7, 'falou/img3.jpg'),
(7, 'falou/img4.jpg'),
(8, 'no-manos-sky/img1.jpg'),
(8, 'no-manos-sky/img2.jpg'),
(8, 'no-manos-sky/img3.jpg'),
(8, 'no-manos-sky/img4.png'),
(8, 'no-manos-sky/img5.jpg'),
(6, 'red-bad-recovery-2/img1.jpg'),
(6, 'red-bad-recovery-2/img2.jpg'),
(6, 'red-bad-recovery-2/img3.jpg'),
(6, 'red-bad-recovery-2/img4.jpg'),
(6, 'red-bad-recovery-2/img5.jpg'),
(10, 'mchero/img1.jpg'),
(10, 'mchero/img2.jpg'),
(10, 'mchero/img3.jpg'),
(10, 'mchero/img4.png'),
(10, 'mchero/img5.jpg'),
(11, 'halo/img1.jpg'),
(11, 'halo/img2.jpg'),
(11, 'halo/img3.jpg'),
(11, 'halo/img4.jpg'),
(11, 'halo/img5.jpg'),
(12, 'final-fantasy/img1.jpg'),
(12, 'final-fantasy/img2.jpg'),
(12, 'final-fantasy/img3.jpg'),
(12, 'final-fantasy/img4.jpg'),
(12, 'final-fantasy/img5.jpg'),
(7, 'falou/img5.jpg'),
(13, 'sanic-boom/img1.jpg'),
(13, 'sanic-boom/img2.jpg'),
(13, 'sanic-boom/img3.png'),
(13, 'sanic-boom/img4.jpg'),
(13, 'sanic-boom/img5.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `idgenero` int(11) NOT NULL,
  `nome_genero` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`idgenero`, `nome_genero`) VALUES
(1, 'RPG'),
(2, 'Ação'),
(3, 'Luta'),
(4, 'Aventura'),
(5, 'FPS'),
(6, 'Plataforma'),
(7, 'Musical');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_jogo`
--

CREATE TABLE `tb_jogo` (
  `idjogo` int(11) NOT NULL,
  `nome_jogo` varchar(150) COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_jogo`
--

INSERT INTO `tb_jogo` (`idjogo`, `nome_jogo`, `descricao`) VALUES
(1, 'Discovery: Purrsona\r\n', 'Se passando em 1996, o jogo se concentra em torno do protagonista e seus colegas de classe na Escola Primária St. Garfield, em Neko City. Alvina convence todos os seus amigos a jogarem um jogo chamado \"Purrsona\", que é muito parecido com o jogo/ritual \"Maria Sangrenta\". Enquanto jogam, os estudantes perdem a consciência e conhecem Shalquoir, quem lhes dá a habilidade de invocar reflexos físicos de suas personalidades em forma de gatos, que são conhecidos como purrsonas.'),
(2, 'Bark Souls\r\n', 'Liberte seu instinto canino enquanto explora masmorras e sinta o medo que surge quando você encontra inimigos nesse cenário. O jogo se passa em um ambiente de mundo aberto e usa uma perspectiva em terceira-pessoa. O jogador batalha usando armas, magias e estratégias para sobreviver em um mundo sombrio e fantástico, onde as feras dominam o ambiente. Características online permitem jogadores compartilharem a experiência de jogar sem necessidade de comunicação direta, afinal, cachorros não falam. Está pronto para soltar seu latido mais forte?'),
(3, 'Pier: Autopata\r\n', 'No ano de 11945 durante a 14ª Guerra das Máquinas, a Terra foi repentinamente invadida por formas de vida extraterrestres, armados com armas conhecidas como \"bio-márquinas\". Enfrentando a destruição iminente, a humanidade não teve escolha a não ser deixar a Terra e se refugiar na lua. Numa tentativa de recuperar seu planeta, a humanidade formou uma resistência formada de soldados andróides acompanhados de seus patos mecânicos, chamados de AutoPatas.'),
(4, 'Duper Crash Sis. Draw\r\n', 'Esse não é o seu jogo de desenho típico. Seu objetivo é continuar golpeando seus inimigos violentamente com sua arte até que eles sejam jogados para fora da arena. As maiores heroínas da desenvolvedora estão reunidas para saber quem é a mais talentosa. Com combates de até 8 jogadores na mesma tela, tente não se sujar de tinta nesta batalha.\r\n'),
(5, 'Shadow The Edgelord\r\n', 'Você está na pele de Shadow, um dos ouriços mais nervosos e revoltados do planeta. Correr na velocidade do som? Nada disso. Pegue seu equipamento, carregue suas armas e vá para luta contra a positividade e a graça do mundo, porque é isso o que ouriços legais fazem.'),
(6, 'Red Bad Recovery II\r\n', 'A aguardada prequel do Read Bad Recovery original seguirá a história do fora da lei Artur Morgão, um membro da gangue \"Duque van der Lindo\" e que é famoso por sua característica peculiar de ficar vermelho quando está estressado.\r\n'),
(7, 'Falou - New Fellas', 'Amizade... amizade nunca muda. Supere a perda de seus amigos num mundo destruído por uma guerra nuclear enquanto você tenta socializar e criar novos relacionamentos. Só não esqueça de abastecer o oxigênio de sua armadura quando ousar sair de seu abrigo.\r\n'),
(8, 'No Mano\'s Sky\r\n', 'Depois de presenciar a lendária Pior Tirinha Meme, nosso herói Mano acorda perdido em um planeta desconhecido sem sua memória, e o mais grave, sem seus lados. Colete o material e as peças necessárias para criar sua primeira nave, e embarque neste vasto universo vazio e sem vida na grande busca de recuperar aquilo que é mais valioso para você.'),
(9, 'Cuckhead', 'A história de dois irmãos que caíram na maior tentação da juventude atual (webnamoradas) e agora buscam vingança. Para recuperar sua honra, eles precisam derrotar todos os caras com quem foram traídos, para assim quebrar a maldição e perderem seus chifres.'),
(10, 'MC Hero III: Legends Of Funk', 'Comece sua jornada para ser o maior MC de todos os tempos. O caminho para o sucesso não é fácil, mas lembre-se: TUDO pode virar um ótimo funk!\r\n'),
(11, 'Halo: The Master Chef Collection ', 'Pela primeira vez, todas as melhores receitas de Master Chef compiladas em uma coleção.'),
(12, 'Final Fantasy VIIIIIIIIIII', 'O mundo é muito semelhante ao daquele de Final Fantasy VIIIIIIIIII, em que é muito mais avançado tecnologicamente do que nos jogos anteriores da série. O mercenário Cláudio Strife ajuda o grupo ecoterrorista ABALANCHE a atacar um reator Bako na cidade de Mibgar, controlada pela companhia Shinba. Barreto Wallace, o líder da equipe, acredita que a energia Bako consumida pelos reatores é a força vital do planeta.'),
(13, 'Sanic Boom - Rise Of Lynux (& Knuckles)', 'A Sociedade Protetora do Software Livre realiza um lendário ritual e faz com que o Grande Rei Lynux retorne dos mortos, para assim impor o uso de todos os programas open source no mercado, sem ligar para as preferências dos usuários. Sanic & sua equipe são os heróis que representarão a força do software pago nessa batalha do século.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_plataforma`
--

CREATE TABLE `tb_plataforma` (
  `idplataforma` int(11) NOT NULL,
  `nome_plataforma` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_plataforma`
--

INSERT INTO `tb_plataforma` (`idplataforma`, `nome_plataforma`) VALUES
(1, 'PS4'),
(2, 'Xbox One'),
(3, 'Switch'),
(4, 'PC'),
(6, 'Linux\r\n');

-- --------------------------------------------------------

--
-- Structure for view `mostra_tudo`
--
DROP TABLE IF EXISTS `mostra_tudo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostra_tudo`  AS  select `tb_jogo`.`nome_jogo` AS `nome_jogo`,`tb_jogo`.`idjogo` AS `idjogo`,`tb_plataforma`.`nome_plataforma` AS `nome_plataforma`,`tb_plataforma`.`idplataforma` AS `idplataforma`,`tb_genero`.`nome_genero` AS `nome_genero`,`tb_genero`.`idgenero` AS `idgenero`,`tb_fotjog`.`nome_foto` AS `nome_foto` from (((((`tb_jogo` left join `relaciona_plataforma` on((`tb_jogo`.`idjogo` = `relaciona_plataforma`.`idjogo`))) left join `tb_plataforma` on((`relaciona_plataforma`.`idplataforma` = `tb_plataforma`.`idplataforma`))) left join `relaciona_genero` on((`tb_jogo`.`idjogo` = `relaciona_genero`.`idjogo`))) left join `tb_genero` on((`relaciona_genero`.`idgenero` = `tb_genero`.`idgenero`))) left join `tb_fotjog` on((`tb_jogo`.`idjogo` = `tb_fotjog`.`idjogo`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relaciona_genero`
--
ALTER TABLE `relaciona_genero`
  ADD KEY `cons_rel-gen-jog` (`idjogo`),
  ADD KEY `cons_rel-gen-gen` (`idgenero`);

--
-- Indexes for table `relaciona_plataforma`
--
ALTER TABLE `relaciona_plataforma`
  ADD KEY `cons_rel-pla-jog` (`idjogo`),
  ADD KEY `cons_rel-pla-pla` (`idplataforma`);

--
-- Indexes for table `tb_contato`
--
ALTER TABLE `tb_contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Indexes for table `tb_fotjog`
--
ALTER TABLE `tb_fotjog`
  ADD KEY `cons_fot-jog` (`idjogo`);

--
-- Indexes for table `tb_galjog`
--
ALTER TABLE `tb_galjog`
  ADD KEY `jogo_galeria` (`idjogo`);

--
-- Indexes for table `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indexes for table `tb_jogo`
--
ALTER TABLE `tb_jogo`
  ADD PRIMARY KEY (`idjogo`);

--
-- Indexes for table `tb_plataforma`
--
ALTER TABLE `tb_plataforma`
  ADD PRIMARY KEY (`idplataforma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contato`
--
ALTER TABLE `tb_contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_plataforma`
--
ALTER TABLE `tb_plataforma`
  MODIFY `idplataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `relaciona_genero`
--
ALTER TABLE `relaciona_genero`
  ADD CONSTRAINT `cons_rel-gen-gen` FOREIGN KEY (`idgenero`) REFERENCES `tb_genero` (`idgenero`),
  ADD CONSTRAINT `cons_rel-gen-jog` FOREIGN KEY (`idjogo`) REFERENCES `tb_jogo` (`idjogo`);

--
-- Limitadores para a tabela `relaciona_plataforma`
--
ALTER TABLE `relaciona_plataforma`
  ADD CONSTRAINT `cons_rel-pla-jog` FOREIGN KEY (`idjogo`) REFERENCES `tb_jogo` (`idjogo`),
  ADD CONSTRAINT `cons_rel-pla-pla` FOREIGN KEY (`idplataforma`) REFERENCES `tb_plataforma` (`idplataforma`);

--
-- Limitadores para a tabela `tb_fotjog`
--
ALTER TABLE `tb_fotjog`
  ADD CONSTRAINT `cons_fot-jog` FOREIGN KEY (`idjogo`) REFERENCES `tb_jogo` (`idjogo`);

--
-- Limitadores para a tabela `tb_galjog`
--
ALTER TABLE `tb_galjog`
  ADD CONSTRAINT `jogo_galeria` FOREIGN KEY (`idjogo`) REFERENCES `tb_jogo` (`idjogo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
