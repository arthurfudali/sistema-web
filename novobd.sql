-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para uploadarquivos
CREATE DATABASE IF NOT EXISTS `uploadarquivos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `uploadarquivos`;

-- Copiando estrutura para tabela uploadarquivos.bloginfo
CREATE TABLE IF NOT EXISTS `bloginfo` (
  `bloginfo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bloginfo_titulo` varchar(250) DEFAULT NULL,
  `bloginfo_corpo` longtext,
  `bloginfo_data` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bloginfo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.bloginfo: ~44 rows (aproximadamente)
DELETE FROM `bloginfo`;
/*!40000 ALTER TABLE `bloginfo` DISABLE KEYS */;
INSERT INTO `bloginfo` (`bloginfo_codigo`, `bloginfo_titulo`, `bloginfo_corpo`, `bloginfo_data`) VALUES
	(2, 'amanda', 'amanda', '2023-06-12 00:00:00'),
	(3, 'Gica ', 'é linda', '2023-06-02 00:00:00'),
	(4, 'asdas ', 'amanda', '2023-06-15 00:00:00'),
	(5, 'asdas ', 'amanda', '2023-06-15 00:00:00'),
	(6, 'amanda ', '', '0000-00-00 00:00:00'),
	(7, 'amanda ', 'amanda', '2023-06-02 00:00:00'),
	(8, 'teste2  ', 'mudei o caminho do diretorio', '2023-06-04 00:00:00'),
	(9, 'teste3 ', 'msm coisa', '2023-06-02 00:00:00'),
	(10, 'se funcionar ', 'vou ficar feliz', '2023-06-07 00:00:00'),
	(11, 'duda ', 'duda', '2023-06-02 00:00:00'),
	(12, 'duda ', 'duda', '2023-06-02 00:00:00'),
	(13, 'duda ', 'duda', '2023-06-02 00:00:00'),
	(14, 'duda ', 'duda', '2023-06-02 00:00:00'),
	(15, 'testedig ', 'dig goat', '2023-06-02 00:00:00'),
	(16, 'testedig ', 'dig goat', '2023-06-02 00:00:00'),
	(17, 'testedig ', 'dig goat', '2023-06-02 00:00:00'),
	(18, 'testedig ', 'dig goat', '2023-06-02 00:00:00'),
	(19, 'testedig ', 'dig goat', '2023-06-02 00:00:00'),
	(20, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 'aaaaaaaaaaaaaaa', '2023-06-02 00:00:00'),
	(21, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 'aaaaaaaaaaaaaaa', '2023-06-02 00:00:00'),
	(22, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 'aaaaaaaaaaaaaaa', '2023-06-02 00:00:00'),
	(23, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 'aaaaaaaaaaaaaaa', '2023-06-02 00:00:00'),
	(24, 'socorrp ', 'sos', '0000-00-00 00:00:00'),
	(25, 'scooro ', 'aaa', NULL),
	(26, 'scoroooooooooooo ', 'aaa', '2023-06-02 00:00:00'),
	(27, 'asssssssssssssssss ', 'aaaaaaaaaa', '2023-06-01 00:00:00'),
	(28, 'narh ', 'tem', '2023-06-02 00:00:00'),
	(29, ' ', '', '0000-00-00 00:00:00'),
	(30, 'Amanda ', 'uma menina do campo muito linda', '2023-06-02 00:00:00'),
	(31, 'amanda ', 'amanda', '0000-00-00 00:00:00'),
	(32, 'aaaaaaaaaaaasdsd ', 'awe242342', '2023-06-08 00:00:00'),
	(33, 'amanda ', 'é muito feia', '2023-06-05 00:00:00'),
	(34, 'amanda ', 'é linda ', '2023-06-05 00:00:00'),
	(35, 'igor do balacobaco ', 'o igor ta roubando de vckkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2006-02-02 00:00:00'),
	(36, 'igao da massa ', 'faça o Y', '2023-06-17 00:00:00'),
	(37, 'igorzao ', 'igor grande', '2023-06-20 00:00:00'),
	(38, 'diego ', 'digidigide', '2023-06-12 00:00:00'),
	(39, 'amanda ', 'fdassadfdsafdsdsad', '2023-06-16 00:00:00'),
	(40, ' ', '', '0000-00-00 00:00:00'),
	(41, 'amanda ', 'asdfsadf', '2023-06-16 00:00:00'),
	(42, 'amanda ', 'asdfsadf', '2023-06-16 00:00:00'),
	(43, 'amanda ', 'asda', '2023-06-16 00:00:00'),
	(44, 'amanda ', 'asda', '2023-06-16 00:00:00'),
	(45, 'ryuki ', 'mt foda', '2023-06-16 00:00:00');
/*!40000 ALTER TABLE `bloginfo` ENABLE KEYS */;

-- Copiando estrutura para tabela uploadarquivos.imagens
CREATE TABLE IF NOT EXISTS `imagens` (
  `id_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(100) DEFAULT NULL,
  `nome_randomico_imagem` varchar(100) DEFAULT NULL,
  `fk_id_imagem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imagem`),
  KEY `FK_id_imagem_bloginfo` (`fk_id_imagem`),
  CONSTRAINT `FK_id_imagem_bloginfo` FOREIGN KEY (`fk_id_imagem`) REFERENCES `bloginfo` (`bloginfo_codigo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.imagens: ~34 rows (aproximadamente)
DELETE FROM `imagens`;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` (`id_imagem`, `nome_imagem`, `nome_randomico_imagem`, `fk_id_imagem`) VALUES
	(1, 'foto.png', '7d0f79df27ae30c96f54f13ceaef44f5.png', NULL),
	(2, 'Captura de tela 2023-04-03 144854.png', 'f758a3846b98b2c6eb8bb6823bc6d088.png', NULL),
	(3, 'foto.png', 'ffd0833f46dabeff5f110a7d2e36753c.png', NULL),
	(4, '1234.png', '1234.png', NULL),
	(5, 'testeimg.png', 'cd2c6ee91331309480d42dc1fc525b83.png', NULL),
	(6, 'testeimg2.png', '75481db75253a45e50837c55129a774b.png', NULL),
	(7, 'testeimg2.png', 'cafb5d8829e02f993f0f6bd23e783acc.png', NULL),
	(8, 'testeimg2.png', '94b8675f80ef53de94807549483d291d.png', NULL),
	(9, 'testeimg2.png', '9df955a1890699d38ca7f69a17a254d8.png', NULL),
	(10, 'testeimg2.png', '267a867f35e4417aa486c7e7ade99029.png', NULL),
	(11, 'testeimg2.png', '58edf8a4ce0c9f0c7583f21422ee11d7.png', NULL),
	(12, 'testeimg2.png', '7a9b6a2c33940510764228596692cfb6.png', NULL),
	(13, 'testeimg2.png', 'f466d7ee57f4a68f00004b64a849bcc3.png', NULL),
	(14, 'testeimg2.png', '467bdbcdd83d95c588dbbb84fae0ff13.png', NULL),
	(15, 'testeimg2.png', '07d3b235bc530855d7f52d2efd9c808e.png', NULL),
	(16, 'testeimg2.png', '485c0c50458d9aca609ee72f5862d955.png', NULL),
	(17, 'testeimg2.png', 'e32778c3fa273af69158e56728667213.png', NULL),
	(18, 'testeimg2.png', '3193a110ee84f6a93f53642dffbfbb57.png', NULL),
	(19, 'testeimg2.png', '5fc5df6f5319f7596b5abd9b22494cfa.png', NULL),
	(20, 'testeimg2123.png', '90db9aff1dcd0c1782c4187d91ffe645.png', NULL),
	(21, 'testeimg2123.png', '3ac54c65906584a5535bbeb9d458fa92.png', NULL),
	(22, 'testeimg2123.png', '2115ac459dd3f8bac9980b99bc99ae11.png', NULL),
	(23, 'Captura de Tela (1).png', 'f008e354504cb91c9617de44d0fdbe0a.png', NULL),
	(24, 'Captura de Tela (1).png', '7bc901c8f8b7163f6404fd233128f047.png', NULL),
	(25, 'Captura de Tela (1).png', '9a549970afb83c0c5701ac7b34e691c6.png', NULL),
	(26, 'Igor.png', 'cb601d959aa6f66639907d34f5df3f35.png', NULL),
	(27, 'Captura de Tela (1).png', '2dc258676d2b18589faf4513bf22038a.png', NULL),
	(28, 'Captura de tela 2023-04-03 144601.png', '0e29b07d068c7aa2ebd7d0120eaf9bef.png', NULL),
	(29, 'Captura de Tela (1).png', '6a33b04bd2eb7e45f6da4e369b543747.png', NULL),
	(30, 'Captura de Tela (1).png', '4532c549309f2834f35b705a735686c6.png', NULL),
	(31, 'Captura de Tela (1).png', '76dee47743c3734fa5f653c8f7204e26.png', NULL),
	(32, 'Captura de Tela (1).png', 'b03c21880c5371fc85270b20607bade8.png', NULL),
	(33, 'Captura de tela 2023-04-03 144601.png', '0f5fa0d1046cedb0675a340397c99c02.png', 45),
	(34, 'foto.png', 'fe913497a742c6074d01a2104a2517b8.png', 45);
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;

-- Copiando estrutura para tabela uploadarquivos.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `blog_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blog_bloginfo_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_blogimgs_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_usuario_codigo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_codigo`),
  KEY `FK_blog_bloginfo` (`blog_bloginfo_codigo`),
  KEY `FK_blog_blogimgs` (`blog_blogimgs_codigo`),
  KEY `FK_blog_usuario` (`blog_usuario_codigo`),
  CONSTRAINT `FK_blog_blogimgs` FOREIGN KEY (`blog_blogimgs_codigo`) REFERENCES `imagens` (`id_imagem`),
  CONSTRAINT `FK_blog_bloginfo` FOREIGN KEY (`blog_bloginfo_codigo`) REFERENCES `bloginfo` (`bloginfo_codigo`),
  CONSTRAINT `FK_blog_usuario` FOREIGN KEY (`blog_usuario_codigo`) REFERENCES `usuario` (`usuario_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.posts: ~3 rows (aproximadamente)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`blog_codigo`, `blog_bloginfo_codigo`, `blog_blogimgs_codigo`, `blog_usuario_codigo`) VALUES
	(1, 39, 28, 1),
	(5, 43, 31, 4),
	(7, 45, 34, 4);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Copiando estrutura para tabela uploadarquivos.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(250) NOT NULL DEFAULT '0',
  `usuario_email` varchar(250) NOT NULL DEFAULT '0',
  `usuario_senha` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.usuario: ~4 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`usuario_codigo`, `usuario_nome`, `usuario_email`, `usuario_senha`) VALUES
	(1, 'igor', 'igor@gmail', '123'),
	(2, 'arthur', 'art', '123'),
	(3, 'arthur', 'a2a', '12345'),
	(4, 'amanda', 'a', '202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
