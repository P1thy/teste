# Host: localhost  (Version 5.5.27-log)
# Date: 2016-06-09 16:55:46
# Generator: MySQL-Front 5.3  (Build 5.39)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "aluno2"
#

DROP TABLE IF EXISTS `aluno2`;
CREATE TABLE `aluno2` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_nome` varchar(50) NOT NULL,
  `a_apelido` varchar(255) DEFAULT NULL,
  `a_data` date DEFAULT NULL,
  `a_cpf` bigint(20) DEFAULT NULL,
  `a_rg` int(11) DEFAULT NULL,
  `a_end` varchar(50) NOT NULL,
  `a_bairro` varchar(30) NOT NULL DEFAULT '',
  `a_city` varchar(30) NOT NULL,
  `a_cep` int(11) NOT NULL,
  `a_fone` int(11) NOT NULL,
  `a_cel` int(11) DEFAULT NULL,
  `a_mail` varchar(50) NOT NULL,
  `cur_id` int(11) NOT NULL,
  `aux_s` varchar(255) DEFAULT NULL,
  `permission` binary(1) NOT NULL DEFAULT '2',
  `tur_id` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT '',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

#
# Data for table "aluno2"
#

INSERT INTO `aluno2` VALUES (1,'Vitor','Vitor','1996-06-10',43938545860,456121821,'R.teste','Bairro','Bauru',17490000,1432659100,2147483647,'teste@teste.com.br',4,'40bd001563085fc35165329ea1ff5c5ecbdbbeef',X'32',1,'gg.jpg');

#
# Structure for table "audax"
#

DROP TABLE IF EXISTS `audax`;
CREATE TABLE `audax` (
  `aux_u` varchar(40) DEFAULT NULL,
  `aux_s` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "audax"
#


#
# Structure for table "curso"
#

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_nome` varchar(50) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "curso"
#

INSERT INTO `curso` VALUES (4,'teste');

#
# Structure for table "disciplina"
#

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE `disciplina` (
  `disci_id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`disci_id`),
  UNIQUE KEY `disci_id` (`disci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "disciplina"
#


#
# Structure for table "empresa"
#

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_nome` varchar(50) NOT NULL,
  `e_cnpj` bigint(20) DEFAULT NULL,
  `e_end` varchar(50) NOT NULL,
  `e_bairro` varchar(30) NOT NULL DEFAULT '',
  `e_city` varchar(30) NOT NULL,
  `e_cep` int(11) NOT NULL,
  `e_fone` int(11) NOT NULL,
  `e_cel` int(11) DEFAULT NULL,
  `e_mail` varchar(50) NOT NULL,
  `e_contato` varchar(255) NOT NULL,
  `aux_s` varchar(255) DEFAULT NULL,
  `permission` binary(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

#
# Data for table "empresa"
#


#
# Structure for table "professor"
#

DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_nome` varchar(50) NOT NULL,
  `p_apelido` varchar(255) DEFAULT NULL,
  `p_data` date DEFAULT NULL,
  `p_cpf` bigint(20) DEFAULT NULL,
  `p_rg` int(11) DEFAULT NULL,
  `p_end` varchar(50) NOT NULL,
  `p_bairro` varchar(30) NOT NULL DEFAULT '',
  `p_city` varchar(30) NOT NULL,
  `p_cep` int(11) NOT NULL,
  `p_fone` int(11) NOT NULL,
  `p_cel` int(11) DEFAULT NULL,
  `p_mail` varchar(50) NOT NULL,
  `p_form` varchar(255) NOT NULL,
  `aux_s` varchar(255) DEFAULT NULL,
  `permission` binary(1) NOT NULL DEFAULT '1',
  `p_tit` varchar(20) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT '',
  `tur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

#
# Data for table "professor"
#

INSERT INTO `professor` VALUES (1,'teste,','teste','1996-05-02',43938545860,152652363,'R.teste','teste','Bauru',17490000,1432659100,1498965871,'teste@teste]','pedreiro','123',X'31','mestre','koala.jpg',1);

#
# Structure for table "turma"
#

DROP TABLE IF EXISTS `turma`;
CREATE TABLE `turma` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_ano` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "turma"
#

INSERT INTO `turma` VALUES (1,2010,4);
