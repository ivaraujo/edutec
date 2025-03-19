-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/03/2025 às 01:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_edutec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anfitrioes`
--

CREATE TABLE `anfitrioes` (
  `idanfitrioes` int(11) NOT NULL,
  `nome_anfitrioes` varchar(45) NOT NULL,
  `cpf_anfitrioes` varchar(14) NOT NULL,
  `senha_anfitrioes` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `anfitrioes`
--

INSERT INTO `anfitrioes` (`idanfitrioes`, `nome_anfitrioes`, `cpf_anfitrioes`, `senha_anfitrioes`) VALUES
(1, 'administrador', '111.111.111-11', '1234'),
(2, 'gerente', '222.222.222-22', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nome_categorias` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nome_categorias`) VALUES
(1, 'Eletrônicos'),
(2, 'Eletrodómesticos'),
(3, 'Móveis');

-- --------------------------------------------------------

--
-- Estrutura para tabela `checkout`
--

CREATE TABLE `checkout` (
  `idcheckout` int(11) NOT NULL,
  `convidados_idconvidados` int(11) NOT NULL,
  `presentes_idpresentes` int(11) NOT NULL,
  `eventos_ideventos` int(11) NOT NULL,
  `pagamentos_idpagamentos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `convidados`
--

CREATE TABLE `convidados` (
  `idconvidados` int(11) NOT NULL,
  `cpf_convidados` varchar(14) NOT NULL,
  `nome_convidados` varchar(45) NOT NULL,
  `telefone_convidados` varchar(13) NOT NULL,
  `email_convidados` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `convidados`
--

INSERT INTO `convidados` (`idconvidados`, `cpf_convidados`, `nome_convidados`, `telefone_convidados`, `email_convidados`) VALUES
(21, '111.111.111-11', 'convidado1', '(11)11111-111', 'convidado1@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `ideventos` int(11) NOT NULL,
  `nome_eventos` varchar(45) NOT NULL,
  `data_eventos` date NOT NULL,
  `localizacao_eventos` varchar(255) NOT NULL,
  `anfitrioes_idanfitrioes` int(11) NOT NULL,
  `senha_eventos` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`ideventos`, `nome_eventos`, `data_eventos`, `localizacao_eventos`, `anfitrioes_idanfitrioes`, `senha_eventos`) VALUES
(1, 'PizzaFest', '2025-03-31', 'Rua A', 1, '999999'),
(8, 'PizzaFest', '2025-03-31', 'Rua BA', 1, '999999'),
(11, 'PastelMania', '2025-03-22', 'Rua X', 1, '222222');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista`
--

CREATE TABLE `lista` (
  `idlista` int(11) NOT NULL,
  `checkout_idcheckout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `idpagamentos` int(11) NOT NULL,
  `nome_pagamentos` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pagamentos`
--

INSERT INTO `pagamentos` (`idpagamentos`, `nome_pagamentos`) VALUES
(1, 'PIX'),
(2, 'Entrega'),
(3, 'Link'),
(4, 'Cartão de crédito');

-- --------------------------------------------------------

--
-- Estrutura para tabela `presentes`
--

CREATE TABLE `presentes` (
  `idpresentes` int(11) NOT NULL,
  `nome_presentes` varchar(45) NOT NULL,
  `preco_presentes` float NOT NULL,
  `limite_presentes` int(11) NOT NULL,
  `categorias_idcategorias` int(11) NOT NULL,
  `imagem_presentes` varchar(150) DEFAULT NULL,
  `pagamentos_idpagamentos` int(11) NOT NULL,
  `senha_evento_presentes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `presentes`
--

INSERT INTO `presentes` (`idpresentes`, `nome_presentes`, `preco_presentes`, `limite_presentes`, `categorias_idcategorias`, `imagem_presentes`, `pagamentos_idpagamentos`, `senha_evento_presentes`) VALUES
(5, 'Moto G8', 789.5, 669, 1, '', 4, '999999'),
(6, 'Batedeira', 89.95, 1, 2, '', 1, '999999'),
(7, 'Geladeira', 4500, 1, 2, '', 4, '222222'),
(8, 'SmarthTV LG', 2690.49, 3, 1, '', 2, '999999'),
(9, 'Sofá', 400, 3, 3, '', 1, '222222'),
(10, 'Guarda-Roupa', 3687, 2, 3, '', 3, '222222'),
(11, 'teste', 9.3, 0, 1, '', 1, '999999');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anfitrioes`
--
ALTER TABLE `anfitrioes`
  ADD PRIMARY KEY (`idanfitrioes`),
  ADD UNIQUE KEY `cpf_anfitrioes_UNIQUE` (`cpf_anfitrioes`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Índices de tabela `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`idcheckout`),
  ADD KEY `fk_checkout_convidados1_idx` (`convidados_idconvidados`),
  ADD KEY `fk_checkout_presentes1_idx` (`presentes_idpresentes`),
  ADD KEY `fk_checkout_eventos1_idx` (`eventos_ideventos`);

--
-- Índices de tabela `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`idconvidados`),
  ADD UNIQUE KEY `cpf_convidados_UNIQUE` (`cpf_convidados`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ideventos`),
  ADD KEY `fk_eventos_anfitrioes1_idx` (`anfitrioes_idanfitrioes`);

--
-- Índices de tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`idlista`),
  ADD KEY `fk_lista_checkout1_idx` (`checkout_idcheckout`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`idpagamentos`);

--
-- Índices de tabela `presentes`
--
ALTER TABLE `presentes`
  ADD PRIMARY KEY (`idpresentes`),
  ADD KEY `fk_presentes_categorias_idx` (`categorias_idcategorias`),
  ADD KEY `fk_presentes_pagamentos1_idx` (`pagamentos_idpagamentos`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anfitrioes`
--
ALTER TABLE `anfitrioes`
  MODIFY `idanfitrioes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `checkout`
--
ALTER TABLE `checkout`
  MODIFY `idcheckout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `convidados`
--
ALTER TABLE `convidados`
  MODIFY `idconvidados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `idlista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `idpagamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `presentes`
--
ALTER TABLE `presentes`
  MODIFY `idpresentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_checkout_convidados1` FOREIGN KEY (`convidados_idconvidados`) REFERENCES `convidados` (`idconvidados`),
  ADD CONSTRAINT `fk_checkout_eventos1` FOREIGN KEY (`eventos_ideventos`) REFERENCES `eventos` (`ideventos`),
  ADD CONSTRAINT `fk_checkout_presentes1` FOREIGN KEY (`presentes_idpresentes`) REFERENCES `presentes` (`idpresentes`);

--
-- Restrições para tabelas `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_anfitrioes1` FOREIGN KEY (`anfitrioes_idanfitrioes`) REFERENCES `anfitrioes` (`idanfitrioes`);

--
-- Restrições para tabelas `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk_lista_checkout1` FOREIGN KEY (`checkout_idcheckout`) REFERENCES `checkout` (`idcheckout`);

--
-- Restrições para tabelas `presentes`
--
ALTER TABLE `presentes`
  ADD CONSTRAINT `fk_presentes_categorias` FOREIGN KEY (`categorias_idcategorias`) REFERENCES `categorias` (`idcategorias`),
  ADD CONSTRAINT `fk_presentes_pagamentos1` FOREIGN KEY (`pagamentos_idpagamentos`) REFERENCES `pagamentos` (`idpagamentos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
