-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_prakerin
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB-2ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keg_pkl`
--

DROP TABLE IF EXISTS `keg_pkl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keg_pkl` (
  `pkl_id` varchar(27) NOT NULL,
  `siswa_id` varchar(6) DEFAULT NULL,
  `perusahaan_id` varchar(4) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `status_pkl` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pkl_id`),
  KEY `perusahaan_id` (`perusahaan_id`),
  KEY `siswa_id` (`siswa_id`),
  CONSTRAINT `keg_pkl_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `tb_perusahaan` (`perusahaan_id`),
  CONSTRAINT `keg_pkl_ibfk_3` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keg_pkl`
--

LOCK TABLES `keg_pkl` WRITE;
/*!40000 ALTER TABLE `keg_pkl` DISABLE KEYS */;
INSERT INTO `keg_pkl` VALUES ('PKL-S00003-P001-01','S00003','P001','2022-07-01','2022-09-30','2022/2023',1,'Masih PKL'),('PKL-S00005-P001-02','S00005','P001','2022-07-19','2022-07-30','2022/2023',1,'Masih PKL');
/*!40000 ALTER TABLE `keg_pkl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jurusan`
--

DROP TABLE IF EXISTS `tb_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jurusan` (
  `jurusan_id` varchar(2) NOT NULL,
  `nama_jurusan` varchar(4) DEFAULT NULL,
  `deskripsi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jurusan`
--

LOCK TABLES `tb_jurusan` WRITE;
/*!40000 ALTER TABLE `tb_jurusan` DISABLE KEYS */;
INSERT INTO `tb_jurusan` VALUES ('J1','TKJ','TEKNIK KOMPUTER DAN JARINGAN'),('J2','TKR','TEKNIK KENDARAAAN RINGAN'),('J3','RPL','REKAYASA PERANGKAT LUNAK'),('J4','AK','AKUNTANSI');
/*!40000 ALTER TABLE `tb_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kelas` (
  `kelas_id` varchar(7) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL,
  `jurusan_id` varchar(2) DEFAULT NULL,
  `tahun_masuk` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`kelas_id`),
  KEY `jurusan_id` (`jurusan_id`),
  CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `tb_jurusan` (`jurusan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kelas`
--

LOCK TABLES `tb_kelas` WRITE;
/*!40000 ALTER TABLE `tb_kelas` DISABLE KEYS */;
INSERT INTO `tb_kelas` VALUES ('KLS-001','2223-TKJ-A','J1','2022/2023'),('KLS-002','2223-TKJ-B','J1','2022/2023'),('KLS-003','2223-TKR-A','J2','2022/2023');
/*!40000 ALTER TABLE `tb_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_perusahaan`
--

DROP TABLE IF EXISTS `tb_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_perusahaan` (
  `perusahaan_id` varchar(4) NOT NULL,
  `nama_perusahaan` varchar(40) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `jenis_perusahaan` varchar(25) DEFAULT NULL,
  `bidang_usaha` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_perusahaan`
--

LOCK TABLES `tb_perusahaan` WRITE;
/*!40000 ALTER TABLE `tb_perusahaan` DISABLE KEYS */;
INSERT INTO `tb_perusahaan` VALUES ('P001','PT. JURAGAN WIFI INDONESIA','JL. MT HARYONO','KOTA JAKARTA TIMUR','12820','PERUSAHAAN IT','INTERNET PROVIDER');
/*!40000 ALTER TABLE `tb_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_siswa` (
  `siswa_id` varchar(6) NOT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `nisn` int(10) DEFAULT NULL,
  `nama_siswa` varchar(45) DEFAULT NULL,
  `kelas_id` varchar(7) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `status_siswa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`siswa_id`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES ('S00003','1920.11.0057',46958716,'AHMAD FAUZAN AL GHAZALI','KLS-001',NULL,'Jl. Alia V RT. 003/25 Harapan Jaya Bekasi Utara','081727262622','MASIH BERSEKOLAH'),('S00004','1920.11.0058',41694780,'AHMAD FAUZI','KLS-001',NULL,'Kp. Rawa Bugel Jl. Ampel Jaya 4 Harapan Jaya Bekasi Utara','081727262623','MASIH BERSEKOLAH'),('S00005','1920.11.0059',44073699,'ALIKA ATUR PERDANA','KLS-001',NULL,'Kp. Rawa Bambu Mawar 04 RT.003/06 Kali Baru Medan Satria','081727262624','MASIH BERSEKOLAH'),('S00006','1920.11.0060',31897822,'ANWAR IBRAHIM','KLS-001',NULL,'Jl. Perjuangan Gg. Damai RT.001/05 Marga Mulya Bekasi Utara','081727262625','MASIH BERSEKOLAH'),('S00007','1920.11.0061',41694786,'APRIO DWI HASAN','KLS-001',NULL,'Kp. Rawa Bugel RT. 002/10 Harapan Mulya Medan Satria','081727262626','MASIH BERSEKOLAH'),('S00008','1920.11.0062',35454939,'ARIFIN PERDANA PUTRA','KLS-001',NULL,'Jl. Cemara Raya Blok A No. 145 Harapan Jaya Bekasi Utara','081727262627','MASIH BERSEKOLAH'),('S00009','1920.11.0063',43541984,'ASYIFAH MAHARANI','KLS-001',NULL,'Jl. Perjuangan RT.001/011 Marga Mulya Bekasi Utara','081727262628','MASIH BERSEKOLAH'),('S00010','1920.11.0064',41223231,'DIAN RAHMASARI','KLS-001',NULL,'Kav. Sawah Indah No 07 RT. 003/05 Marga Mulya Bekasi Utara','081727262629','MASIH BERSEKOLAH'),('S00011','1920.11.0065',41694779,'FITRIAH NURMALA SARI','KLS-001',NULL,'Kp. Rawa Bugel RT.003/10 Harpan Mulya Medan Satria','081727262630','MASIH BERSEKOLAH'),('S00012','1920.11.0066',25455685,'HELWA WULANIA','KLS-001',NULL,'Kp. Rawa Bugel RT. 004/03 Marga Mulya Bekasi Utara','081727262631','MASIH BERSEKOLAH'),('S00013','1920.11.0068',36341976,'INDAH WIJAYANTI','KLS-001',NULL,'Jl. Perjuangan Kp. Asem RT.001/011 Marga Mulya Bekasi Utara','081727262632','MASIH BERSEKOLAH'),('S00014','1920.11.0069',41572900,'MELATI INDAH','KLS-001',NULL,'Kp. Rawa Bugel RT. 006/03 Marga Mulya Bekasi Utara','081727262633','MASIH BERSEKOLAH'),('S00015','1920.11.0070',41694539,'MUHAMAD RAIHAN','KLS-001',NULL,'Bulak Perwira RT. 001/17 Perwira Bekasi Utara','081727262634','MASIH BERSEKOLAH'),('S00016','1920.11.0071',37750563,'NANDA FITRIA FAZRIN','KLS-001',NULL,'Kp. Rawa Bambu RT.003/06 Kali Baru Medan Satria','081727262635','MASIH BERSEKOLAH'),('S00017','1920.11.0072',42351854,'NAZLAH ADDINI HAQ FAJRIANI','KLS-001',NULL,'Jl. Segarawana No. 01 C RT.009/25 Harapan Jaya Bekasi Utara','081727262636','MASIH BERSEKOLAH'),('S00018','1920.11.0073',37173588,'NICHOLAS SHEVIANUS','KLS-001',NULL,'Jl. Swadaya I RT.002/04 No.12 Harapan Jaya Bekasi Utara','081727262637','MASIH BERSEKOLAH'),('S00019','1920.11.0074',42351799,'NURAZIZAH','KLS-001',NULL,'Kav. Pesona Rawa Indah RT. 007/03 Marga Mulya Bekasi Utara','081727262638','MASIH BERSEKOLAH'),('S00020','1920.11.0075',43677827,'PUTRI HILWIYATUL AHYA','KLS-001',NULL,'Kp. Ujung Harapan RT. 008/05 Ds. Bahagia Babelan','081727262639','MASIH BERSEKOLAH'),('S00021','1920.11.0076',42292406,'SALSA BILAH','KLS-001',NULL,'Jl. Perjuangan Dalam RT. 002/11 Teluk Buyung Marga Mulya Bekasi Utara','081727262640','MASIH BERSEKOLAH'),('S00022','1920.11.0077',42351831,'SATRIA DAMAR GALIH','KLS-001',NULL,'Kp. Rawa Bugel RT.001/04 Harapan Jaya Bekasi Utara','081727262641','MASIH BERSEKOLAH'),('S00023','1920.11.0078',44073670,'SITI HARYANIH','KLS-001',NULL,'Jl. Mawar III Kp. Rawa Bambu RT.001/07 Kali Baru Medan Satria','081727262642','MASIH BERSEKOLAH'),('S00024','1920.11.0079',45786335,'SULASTRI RAHMAWATI','KLS-001',NULL,'Jl. Perjuangan Kp. Asem RT.001/011 Marga Mulya Bekasi Utara','081727262643','MASIH BERSEKOLAH'),('S00025','1920.11.0080',59149562,'ZAINUR RAFLI','KLS-001',NULL,'Kp. Rawa Bugel RT.001/10 Marga Mulya Bekasi Utara','081727262644','MASIH BERSEKOLAH'),('S00026','1920.11.0121',39925500,'WAHYU ENGGAL KHOIRUDDIN','KLS-001',NULL,'Kp. Rawa Bambu Jl. Mawar III RT. 002/07 Kali Baru Medan Satria','081727262645','MASIH BERSEKOLAH');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Prily','prily.rizky04@gmail.com',NULL,'$2y$10$pJEY8iODOZtkAxl9U8K31uZ1vPPALKc/fxv0Oj1cAw1Lqbpaw.Zpq',NULL,'2022-07-18 01:52:57','2022-07-18 01:52:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-19 10:07:02
