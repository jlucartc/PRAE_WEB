-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: PRAE
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "categorias"
--

DROP TABLE IF EXISTS categorias;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE categorias (
  id BIGSERIAL PRIMARY KEY,
  nome text NOT NULL,
  tipo_categoria int NOT NULL,
  responsavel text,
  email text,
  fone varchar(255) DEFAULT NULL,
  rua text NOT NULL,
  numero text NOT NULL,
  bairro text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "categorias"
--

BEGIN;
LOCK TABLE categorias;
/*!40000 ALTER TABLE "categorias" DISABLE KEYS */;
/*!40000 ALTER TABLE "categorias" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "coordenadorias"
--

DROP TABLE IF EXISTS coordenadorias;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE coordenadorias (
  id BIGSERIAL PRIMARY KEY,
  nome text NOT NULL,
  coordenador text,
  fone varchar(255) DEFAULT NULL,
  fax varchar(255) DEFAULT NULL,
  email text,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "coordenadorias"
--

BEGIN;
LOCK TABLE coordenadorias;
/*!40000 ALTER TABLE "coordenadorias" DISABLE KEYS */;
/*!40000 ALTER TABLE "coordenadorias" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "descricoes"
--

DROP TABLE IF EXISTS descricoes;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE descricoes (
  id BIGSERIAL PRIMARY KEY,
  titulo text NOT NULL,
  texto text NOT NULL,
  categoria_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "descricoes"
--

BEGIN;
LOCK TABLE descricoes;
/*!40000 ALTER TABLE "descricoes" DISABLE KEYS */;
/*!40000 ALTER TABLE "descricoes" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "divisoes"
--

DROP TABLE IF EXISTS divisoes;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE divisoes (
  id BIGSERIAL PRIMARY KEY,
  nome text NOT NULL,
  coordenadoria_id bigint NOT NULL,
  fone varchar(255) DEFAULT NULL,
  fax varchar(255) DEFAULT NULL,
  email text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "divisoes"
--

BEGIN;
LOCK TABLE divisoes;
/*!40000 ALTER TABLE "divisoes" DISABLE KEYS */;
/*!40000 ALTER TABLE "divisoes" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "documentos"
--

DROP TABLE IF EXISTS documentos;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE documentos (
  id BIGSERIAL PRIMARY KEY,
  categoria_id int NOT NULL,
  rota text NOT NULL,
  nome text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "documentos"
--

BEGIN;
LOCK TABLE documentos;
/*!40000 ALTER TABLE "documentos" DISABLE KEYS */;
/*!40000 ALTER TABLE "documentos" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "mapas"
--

DROP TABLE IF EXISTS mapas;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mapas (
  id BIGSERIAL PRIMARY KEY,
  nome text NOT NULL,
  coordenadoria_id bigint NOT NULL,
  rota text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "mapas"
--

BEGIN;
LOCK TABLE mapas;
/*!40000 ALTER TABLE "mapas" DISABLE KEYS */;
/*!40000 ALTER TABLE "mapas" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "migrations"
--

DROP TABLE IF EXISTS migrations;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE migrations (
  id BIGSERIAL PRIMARY KEY,
  migration varchar(255) NOT NULL,
  batch int NOT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "migrations"
--

BEGIN;
LOCK TABLE migrations;
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO migrationS VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_15_194109_create_categorias_table',1),(4,'2018_03_20_183411_create_descricoes_table',1),(5,'2018_03_20_183457_create_documentos_table',1),(6,'2018_05_02_200811_create_coordenadorias_table',1),(7,'2018_05_02_200835_create_divisoes_table',1),(8,'2018_05_02_200840_create_mapas_table',1);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "password_resets"
--

DROP TABLE IF EXISTS password_resets;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE password_resets (
  email varchar(255) NOT NULL PRIMARY KEY,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "password_resets"
--

BEGIN;
LOCK TABLE password_resets;
/*!40000 ALTER TABLE "password_resets" DISABLE KEYS */;
/*!40000 ALTER TABLE "password_resets" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "usuarios"
--

DROP TABLE IF EXISTS usuarios;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE usuarios (
  id BIGSERIAL PRIMARY KEY,
  nome varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  usuario varchar(255) NOT NULL,
  senha varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "usuarios"
--

BEGIN;
LOCK TABLE usuarios;
/*!40000 ALTER TABLE "usuarios" DISABLE KEYS */;
/*!40000 ALTER TABLE "usuarios" ENABLE KEYS */;
COMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-03 15:47:07
