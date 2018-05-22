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
  id int SERIAL NOT NULL,
  nome text NOT NULL,
  tipo_categoria int NOT NULL,
  responsavel text,
  email text,
  fone varchar(255) DEFAULT NULL,
  rua text,
  numero text,
  bairro text,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "categorias"
--

BEGIN;
LOCK TABLE categorias;
/*!40000 ALTER TABLE "categorias" DISABLE KEYS */;
INSERT INTO categorias VALUES (5,'Auxilio Moradia',2,'Coordenadoria de Restaurante Universitário','case@ufc.br','3366 7444','Rua Paulino Nogueira','315 - Bloco III - 1° Andar','Benfica','2018-05-17 22:00:28','2018-05-17 22:00:28'),(6,'Ajuda de Custo',2,'DIVISÃO DE APOIO ADMINISTRATIVO','prae@ufc.br','(85) 3366 7443','Rua Paulino Nogueira','315 - Bloco III - 1° Andar','Benfica','2018-05-22 19:17:24','2018-05-22 19:17:24'),(7,'Acompanhamento Psicopedagógico, Psicológico e Psicossocial',4,'DIVISÃO DE ATENÇÃO AO ESTUDANTE','psicopedagogico@ufc.br','(85) 3366 7447','Rua Paulino Nogueira','315 – Bloco III – 1° andar','Benfica','2018-05-22 19:19:01','2018-05-22 19:20:43'),(8,'Bolsa de Iniciação Acadêmica',1,'DIVISÃO DE GESTÃO DE BENEFÍCIOS','prae.digeb@ufc.br','(85) 3366 7446','Rua Paulino Nogueira','315 – Bloco III – 1º Andar','Benfica','2018-05-22 19:20:21','2018-05-22 19:20:21'),(9,'Bolsa de Incentivo ao Desporto',1,'COORDENADORIA DE ATIVIDADES DESPORTIVAS','desportoufc@ufc.br','(85) 3366 7871','Rua Paulino Nogueira','2762','Benfica','2018-05-22 19:21:49','2018-05-22 19:21:49'),(10,'Residência Universitária',3,'DIVISÃO DE GESTÃO DE MORADIA','residencia@ufc.br','(85) 3366 7448','Rua Paulino Nogueira','315','Benfica','2018-05-22 19:22:58','2018-05-22 19:22:58'),(11,'Restaurante Universitário',4,'COORDENADORIA DE RESTAURANTE UNIVERSITÁRIO','ru@ufc.br','(85) 3366 7441','Rua Paulino Nogueira','315 - Bloco III - 1° Andar','Benfica','2018-05-22 19:23:58','2018-05-22 19:23:58');
/*!40000 ALTER TABLE "categorias" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "compromissos"
--

DROP TABLE IF EXISTS compromissos;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE compromissos (
  id int SERIAL NOT NULL,
  coordenadoria_id bigint NOT NULL,
  titulo text NOT NULL,
  data timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "compromissos"
--

BEGIN;
LOCK TABLE compromissos;
/*!40000 ALTER TABLE "compromissos" DISABLE KEYS */;
/*!40000 ALTER TABLE "compromissos" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "coordenadorias"
--

DROP TABLE IF EXISTS coordenadorias;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE coordenadorias (
  id int SERIAL NOT NULL,
  nome text NOT NULL,
  coordenador text,
  fone varchar(255) DEFAULT NULL,
  fax varchar(255) DEFAULT NULL,
  email text,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "coordenadorias"
--

BEGIN;
LOCK TABLE coordenadorias;
/*!40000 ALTER TABLE "coordenadorias" DISABLE KEYS */;
INSERT INTO coordenadorias VALUES (4,'Coordenadoria de Assistência Estudantil','Profª Elidihara Trigueiro','(85) 3366 7444 / 3366 7445','(85) 3366 7442','prae@ufc.br','2018-05-17 22:37:22','2018-05-22 19:24:49'),(5,'Coordenadoria de Atividades Desportivas','Wildner Lins de Souza','(85) 3366 7871',NULL,'desportoufc@ufc.br','2018-05-22 19:25:28','2018-05-22 19:25:28'),(6,'Coordenadoria de Restaurante Universitário','Francisco José Albuquerque Cruz','(85) 3366 7441','(85) 3366 7441','prae@ufc.br','2018-05-22 19:26:15','2018-05-22 19:26:15');
/*!40000 ALTER TABLE "coordenadorias" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "descricoes"
--

DROP TABLE IF EXISTS descricoes;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE descricoes (
  id int SERIAL NOT NULL,
  titulo text NOT NULL,
  texto text NOT NULL,
  categoria_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "descricoes"
--

BEGIN;
LOCK TABLE descricoes;
/*!40000 ALTER TABLE "descricoes" DISABLE KEYS */;
INSERT INTO descricoes VALUES (15,'Auxílio Moradia','O Programa Auxílio Moradia tem por objetivo viabilizar a permanência de estudantes matriculados nos Cursos de Graduação dos Campi da Universidade Federal do Ceará (UFC) em Sobral, Cariri e Quixadá, em comprovada situação de vulnerabilidade econômica, assegurando-lhes auxílio institucional para complementação de despesas com moradia e alimentação durante todo o período do curso ou enquanto persistir a mesma situação.\r\n\r\nImportante! A vinculação dos estudantes ao Programa Auxílio Moradia não os impede de receber, por mérito, qualquer uma das bolsas dos diversos programas da UFC, de agências de fomento ou de empresas.',5,'2018-05-17 22:00:50','2018-05-17 22:00:50');
/*!40000 ALTER TABLE "descricoes" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "divisoes"
--

DROP TABLE IF EXISTS divisoes;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE divisoes (
  id int SERIAL NOT NULL,
  nome text NOT NULL,
  coordenadoria_id bigint NOT NULL,
  fone varchar(255) DEFAULT NULL,
  fax varchar(255) DEFAULT NULL,
  email text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
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
  id int SERIAL NOT NULL,
  categoria_id int NOT NULL,
  rota text NOT NULL,
  nome text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "documentos"
--

BEGIN;
LOCK TABLE documentos;
/*!40000 ALTER TABLE "documentos" DISABLE KEYS */;
INSERT INTO documentos VALUES (4,3,'3/Requisitos','Requisitos','2018-05-17 21:52:38','2018-05-17 21:52:38'),(6,4,'4/Requisitos','Requisitos','2018-05-17 21:54:03','2018-05-17 21:54:03');
/*!40000 ALTER TABLE "documentos" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "itens"
--

DROP TABLE IF EXISTS itens;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE itens (
  id int SERIAL NOT NULL,
  nome varchar(255) NOT NULL,
  descricao text,
  categoria_id bigint NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "itens"
--

BEGIN;
LOCK TABLE itens;
/*!40000 ALTER TABLE "itens" DISABLE KEYS */;
INSERT INTO itens VALUES (3,'Foto 3x4',NULL,1,'2018-05-17 21:02:44','2018-05-17 21:02:44'),(4,'Foto 3x4',NULL,5,'2018-05-17 22:01:07','2018-05-17 22:01:07'),(5,'Carteira de identidade',NULL,5,'2018-05-17 22:01:13','2018-05-17 22:01:13'),(6,'CPF',NULL,5,'2018-05-17 22:01:21','2018-05-17 22:01:21'),(7,'Comprovante de aprovação do ultimo vestibular',NULL,5,'2018-05-17 22:01:35','2018-05-17 22:01:35'),(8,'Comprovante de matrícula e histórico do estudante',NULL,5,'2018-05-17 22:01:55','2018-05-17 22:01:55'),(9,'Histórico do Ensino Médio',NULL,5,'2018-05-17 22:02:11','2018-05-17 22:02:11'),(10,'Declaração de bolsa integral ou parcial','no caso de escola particular',5,'2018-05-17 22:02:35','2018-05-17 22:02:35'),(11,'Carteira do Ministério do Trabalho',NULL,5,'2018-05-17 22:02:47','2018-05-17 22:02:47'),(12,'Comprovante de renda própria',NULL,5,'2018-05-17 22:02:58','2018-05-17 22:02:58'),(13,'Última declaração de Imposto de Renda (se declara);',NULL,5,'2018-05-22 19:28:03','2018-05-22 19:28:03'),(14,'Comprovante de renda da família','Comprovantes aceitos: contracheque, Carteira do Ministério do Trabalho, comprovante de pensão alimentícia, comprovante de aposentadoria, declaração de autônomo por instituições oficiais',5,'2018-05-22 19:29:11','2018-05-22 19:29:11'),(15,'Comprovante de moradia','Comprovantes aceitos: IPTU, ITR, escritura de imóvel, recibo de pagamento de aluguel, documento de posse.',5,'2018-05-22 19:29:38','2018-05-22 19:29:38'),(16,'Última conta de energia elétrica',NULL,5,'2018-05-22 19:29:58','2018-05-22 19:29:58'),(17,'Certidão de nascimento dos irmãos menores dependentes da renda familiar',NULL,5,'2018-05-22 19:30:10','2018-05-22 19:30:10'),(18,'Atestado de óbito dos pais ou responsável se falecidos',NULL,5,'2018-05-22 19:30:22','2018-05-22 19:30:22'),(19,'Comprovante de benefícios sociais recebi do do Governo Federal e outros comprovantes dependendo do caso',NULL,5,'2018-05-22 19:30:33','2018-05-22 19:30:33');
/*!40000 ALTER TABLE "itens" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "mapas"
--

DROP TABLE IF EXISTS mapas;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mapas (
  id int SERIAL NOT NULL,
  nome text NOT NULL,
  coordenadoria_id bigint NOT NULL,
  rota text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
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
  id int SERIAL NOT NULL,
  migration varchar(255) NOT NULL,
  batch int NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "migrations"
--

BEGIN;
LOCK TABLE migrations;
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO migrations VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_15_194109_create_categorias_table',1),(4,'2018_03_20_183411_create_descricoes_table',1),(5,'2018_03_20_183457_create_documentos_table',1),(6,'2018_05_02_200811_create_coordenadorias_table',1),(7,'2018_05_02_200835_create_divisoes_table',1),(8,'2018_05_02_200840_create_mapas_table',1),(9,'2018_05_03_195258_create_compromissos_table',1),(10,'2018_05_16_170847_create_itens_table',1);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;
COMMIT;

--
-- Table structure for table "password_resets"
--

DROP TABLE IF EXISTS password_resets;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE password_resets (
  email varchar(255) PRIMARY KEY NOT NULL,
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
  id int SERIAL NOT NULL,
  nome varchar(255) NOT NULL,
  email varchar(255) UNIQUE NOT NULL,
  usuario varchar(255) NOT NULL,
  senha varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
  
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "usuarios"
--

BEGIN;
LOCK TABLE usuarios;
/*!40000 ALTER TABLE "usuarios" DISABLE KEYS */;
INSERT INTO usuarios VALUES (1,'admin','admin@admin','admin','$2y$10$p4Jw/lAh8ij1sB2j9iO7M.PwLanSpr3XOG7XKWGxuwijCTzI4lUZu','l39T8WlcIlGRVcwsoeGe3P13fwKIUz7AyaVFcbSml9jHHwLb8lW44jdDHNuU','2018-05-17 19:16:57','2018-05-17 19:16:57');
/*!40000 ALTER TABLE "usuarios" ENABLE KEYS */;
COMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-22 13:33:45
