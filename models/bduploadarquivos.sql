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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.bloginfo: ~2 rows (aproximadamente)
DELETE FROM `bloginfo`;
/*!40000 ALTER TABLE `bloginfo` DISABLE KEYS */;
INSERT INTO `bloginfo` (`bloginfo_codigo`, `bloginfo_titulo`, `bloginfo_corpo`, `bloginfo_data`) VALUES
	(2, 'igor 2 ', 'igor é igor', '2023-05-25 00:00:00');
/*!40000 ALTER TABLE `bloginfo` ENABLE KEYS */;

-- Copiando estrutura para tabela uploadarquivos.imagens
CREATE TABLE IF NOT EXISTS `imagens` (
  `id_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(100) DEFAULT NULL,
  `nome_randomico_imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.imagens: ~2 rows (aproximadamente)
DELETE FROM `imagens`;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` (`id_imagem`, `nome_imagem`, `nome_randomico_imagem`) VALUES
	(1, 'foto.png', '7d0f79df27ae30c96f54f13ceaef44f5.png'),
	(2, 'Captura de tela 2023-04-03 144854.png', 'f758a3846b98b2c6eb8bb6823bc6d088.png'),
	(3, 'foto.png', 'ffd0833f46dabeff5f110a7d2e36753c.png'),
	(4, '1234.png', '1234.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.posts: ~1 rows (aproximadamente)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`blog_codigo`, `blog_bloginfo_codigo`, `blog_blogimgs_codigo`, `blog_usuario_codigo`) VALUES
	(1, 2, 4, 1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Copiando estrutura para tabela uploadarquivos.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(250) NOT NULL DEFAULT '0',
  `usuario_email` varchar(250) NOT NULL DEFAULT '0',
  `usuario_senha` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela uploadarquivos.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`usuario_codigo`, `usuario_nome`, `usuario_email`, `usuario_senha`) VALUES
	(1, 'igor', 'igor@gmail', '123');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
