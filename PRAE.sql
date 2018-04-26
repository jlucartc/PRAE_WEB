-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 25/04/2018 às 16:59
-- Versão do servidor: 5.7.22-0ubuntu0.16.04.1
-- Versão do PHP: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `PRAE`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE categorias (
  id int(10) UNSIGNED NOT NULL,
  nome text COLLATE utf8mb4_unicode_ci NOT NULL,
  responsavel text COLLATE utf8mb4_unicode_ci,
  email text COLLATE utf8mb4_unicode_ci,
  fone varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  rua text COLLATE utf8mb4_unicode_ci NOT NULL,
  numero text COLLATE utf8mb4_unicode_ci NOT NULL,
  bairro text COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO categorias (id, nome, responsavel, email, fone, rua, numero, bairro, created_at, updated_at) VALUES
(1, 'Auxilio Moradia', 'COORDENADORIA DE ASSISTÊNCIA ESTUDANTIL', 'prae@ufc.br', 'Benfica', 'Rua Paulino Nogueira', '315 - Bloco III - 1° Andar', 'Benfica', '2018-03-22 19:23:34', '2018-03-28 19:47:34'),
(2, 'Categoria 2', '---', '---', '---', '---', '---', '---', '2018-04-11 21:49:19', '2018-04-11 21:49:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `descricoes`
--

CREATE TABLE descricoes (
  id int(10) UNSIGNED NOT NULL,
  titulo text COLLATE utf8mb4_unicode_ci NOT NULL,
  texto text COLLATE utf8mb4_unicode_ci NOT NULL,
  categoria_id int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `descricoes`
--

INSERT INTO descricoes (id, titulo, texto, categoria_id, created_at, updated_at) VALUES
(1, 'Auxílio Moradia', 'O Programa Auxílio Moradia tem por objetivo viabilizar a permanência de estudantes matriculados nos Cursos de Graduação dos Campi da Universidade Federal do Ceará (UFC) em Sobral, Cariri e Quixadá, em comprovada situação de vulnerabilidade econômica, assegurando-lhes auxílio institucional para complementação de despesas com moradia e alimentação durante todo o período do curso ou enquanto persistir a mesma situação.\r\n\r\nImportante! A vinculação dos estudantes ao Programa Auxílio Moradia não os impede de receber, por mérito, qualquer uma das bolsas dos diversos programas da UFC, de agências de fomento ou de empresas.', 1, '2018-03-22 21:06:07', '2018-03-28 19:47:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE documentos (
  id int(10) UNSIGNED NOT NULL,
  categoria_id int(11) NOT NULL,
  rota text COLLATE utf8mb4_unicode_ci NOT NULL,
  nome text COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `documentos`
--

INSERT INTO documentos (id, categoria_id, rota, nome, created_at, updated_at) VALUES
(7, 1, '1/Exemplo', 'Exemplo', '2018-04-10 21:36:24', '2018-04-10 21:36:24'),
(8, 1, '1/Relatorio', 'Relatorio', '2018-04-10 21:37:27', '2018-04-10 21:37:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE migrations(
  id int(10) UNSIGNED NOT NULL,
  migration varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO migrations (id, migration, batch) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_15_194109_create_categorias_table', 1),
(4, '2018_03_20_183411_create_descricoes_table', 1),
(5, '2018_03_20_183457_create_documentos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE password_resets (
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  token varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE usuarios (
  id int(10) UNSIGNED NOT NULL,
  nome varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  usuario varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  senha varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO usuarios (id, nome, email,usuario, senha, remember_token, created_at, updated_at) VALUES
(1, 'admin', 'admin@admin', 'admin', '$2y$10$/FzOcCGm4TtleSbiFFc.euHN5.hXBwVe2N7dcUqOY5j5TrZch3586', '8A8tp6CWNt3HpzKugJwMFxW0aj0KkE4aQfc6ADiGwd7Hh4kNuQuUm7g3vA5h', '2018-03-20 22:34:17', '2018-03-20 22:34:17'),
(3, 'Usuario 22', 'user2@user2', 'User2', '$2y$10$SQFtaVA8tfV99eyOIvorK.Du/aCY0nagPqQgwOm6mS/wADeDEwn.q', NULL, '2018-03-27 22:19:02', '2018-03-27 22:49:32');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE categorias
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `descricoes`
--
ALTER TABLE descricoes
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE documentos
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE migrations
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE password_resets
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE usuarios
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE categorias
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `descricoes`
--
ALTER TABLE descricoes
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE documentos
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE migrations
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE usuarios
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
