/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - spk_uas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spk_uas` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spk_uas`;

/*Table structure for table `analisa` */

DROP TABLE IF EXISTS `analisa`;

CREATE TABLE `analisa` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nilainya` varchar(11) NOT NULL,
  PRIMARY KEY (`id_analisa`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `analisa` */

insert  into `analisa`(`id_analisa`,`id_kriteria`,`id_pegawai`,`nilainya`) values 
(15,1,22,'4'),
(16,2,22,'4'),
(17,3,22,'5'),
(18,4,22,'4'),
(19,5,22,'1'),
(20,6,22,'4'),
(21,7,22,'2'),
(22,1,23,'5'),
(23,2,23,'3'),
(24,3,23,'4'),
(25,4,23,'4'),
(26,5,23,'3'),
(27,6,23,'3'),
(28,7,23,'3'),
(29,1,24,'4'),
(30,2,24,'3'),
(31,3,24,'5'),
(32,4,24,'4'),
(33,5,24,'3'),
(34,6,24,'4'),
(35,7,24,'3'),
(36,1,25,'5'),
(37,2,25,'5'),
(38,3,25,'5'),
(39,4,25,'4'),
(40,5,25,'1'),
(41,6,25,'3'),
(42,7,25,'2'),
(43,1,26,'5'),
(44,2,26,'3'),
(45,3,26,'5'),
(46,4,26,'4'),
(47,5,26,'2'),
(48,6,26,'4'),
(49,7,26,'3'),
(50,1,27,'5'),
(51,2,27,'4'),
(52,3,27,'4'),
(53,4,27,'4'),
(54,5,27,'1'),
(55,6,27,'2'),
(56,7,27,'3'),
(64,1,29,'4'),
(65,2,29,'5'),
(66,3,29,'5'),
(67,4,29,'4'),
(68,5,29,'1'),
(69,6,29,'3'),
(70,7,29,'2');

/*Table structure for table `detail` */

DROP TABLE IF EXISTS `detail`;

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `toefl` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `jumlah_sertifikat` int(11) NOT NULL,
  `pengalaman_kerja` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `detail` */

insert  into `detail`(`id_detail`,`id_pegawai`,`ipk`,`pendidikan`,`toefl`,`tinggi`,`jumlah_sertifikat`,`pengalaman_kerja`,`usia`) values 
(3,22,2.4,'4',600,167,2,4,30),
(4,23,3.1,'3',420,175,5,3,27),
(5,24,2.6,'3',550,168,5,4,26),
(6,25,3.2,'5',620,172,2,3,33),
(7,26,3.7,'3',670,170,3,4,25),
(8,27,3.8,'4',500,169,1,2,25),
(10,29,2.9,'5',600,175,2,3,32);

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(50) NOT NULL,
  `bobot_nilai` varchar(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `type` enum('input','radio') NOT NULL DEFAULT 'input',
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`id_kriteria`,`atribut`,`bobot_nilai`,`nama_kriteria`,`type`) values 
(1,'benefit','5','Prestasi Akademik (IPK)','input'),
(2,'benefit','5','Pendidikan Terakhir','radio'),
(3,'benefit','4','Kemampuan Bahasa Inggris (TOEFL)','input'),
(4,'benefit','2','Tinggi Badan','input'),
(5,'benefit','2','Jumlah Sertifikat Pelatihan','input'),
(6,'benefit','3','Pengalaman Kerja','radio'),
(7,'benefit','3','Usia','input');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password_asli` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status` enum('admin','pemilik','user') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `login` */

insert  into `login`(`user`,`nama`,`alamat`,`no_telepon`,`email`,`password`,`password_asli`,`status`) values 
('admin','administrator','','','','21232f297a57a5a743894a0e4a801fc3','admin','admin');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`user`,`nama`,`telepon`,`alamat`,`foto`,`status`) values 
(22,'','John','08123456789','Jakarta','','y'),
(23,'','Alice','085465511202','Malang','','y'),
(24,'','Rekt','0838455121544','Malang','','y'),
(25,'','Pai','0838484451213','Malang','','y'),
(26,'','Udil','082611511423','Jakarta','','y'),
(27,'','Drian','0896941132662','Jakarta','','y'),
(29,'','Kiboy','08998989565','Malang','','y');

/*Table structure for table `t_kriteria` */

DROP TABLE IF EXISTS `t_kriteria`;

CREATE TABLE `t_kriteria` (
  `id_tkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nkriteria` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `t_kriteria` */

insert  into `t_kriteria`(`id_tkriteria`,`id_kriteria`,`keterangan`,`nkriteria`) values 
(5,2,'SMK / SMA','1'),
(6,2,'D3','2'),
(7,2,'S1','3'),
(8,2,'S2','4'),
(9,2,'S3','5'),
(26,6,'Kurang dari 6 bulan','1'),
(27,6,'6 bulan - 1 tahun','2'),
(28,6,'Diatas 1 tahun - 2 tahun','3'),
(29,6,'Diatas 2 tahun - 3 tahun','4'),
(30,6,'Diatas 3 tahun','5');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
