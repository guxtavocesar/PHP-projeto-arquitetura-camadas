-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/06/2024 às 02:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Cafeteria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `IdCardapio` int(11) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  `ValorCusto` float NOT NULL,
  `ValorVenda` float NOT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio_ingrediente`
--

CREATE TABLE `cardapio_ingrediente` (
  `IdCardapio` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `QtdIngrediente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_cardapio`
--

CREATE TABLE `categoria_cardapio` (
  `IdCategoria` int(11) NOT NULL,
  `Descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `IdFornecedor` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IdFuncionario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Nascimento` date NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `IdTipoFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `IdIngrediente` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `ValorCusto` float NOT NULL,
  `EstoqueAtual` int(11) NOT NULL,
  `EstoqueMaximo` int(11) NOT NULL,
  `IdFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mesa`
--

CREATE TABLE `mesa` (
  `IdMesa` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_funcionario`
--

CREATE TABLE `tipo_funcionario` (
  `IdTipoFuncionario` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Venda`
--

CREATE TABLE `Venda` (
  `IdVenda` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValorTotal` float NOT NULL,
  `NumeroMesa` int(11) NOT NULL,
  `IdFuncionario` int(11) NOT NULL,
  `IdCardapio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`IdCardapio`),
  ADD KEY `fk_Cardapio_IdCategoria` (`IdCategoria`) USING BTREE;

--
-- Índices de tabela `cardapio_ingrediente`
--
ALTER TABLE `cardapio_ingrediente`
  ADD KEY `fk_cardapio_ingrediente_IdCardapio` (`IdCardapio`) USING BTREE,
  ADD KEY `fk_cardapio_ingrediente_IdIngrediente` (`IdIngrediente`) USING BTREE;

--
-- Índices de tabela `categoria_cardapio`
--
ALTER TABLE `categoria_cardapio`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`IdFornecedor`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`IdFuncionario`),
  ADD KEY `fk_funcionario_IdTipoFuncionario` (`IdTipoFuncionario`) USING BTREE;

--
-- Índices de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`IdIngrediente`),
  ADD KEY `fk_ingrediente_IdFornecedor` (`IdFornecedor`) USING BTREE;

--
-- Índices de tabela `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`IdMesa`);

--
-- Índices de tabela `tipo_funcionario`
--
ALTER TABLE `tipo_funcionario`
  ADD PRIMARY KEY (`IdTipoFuncionario`);

--
-- Índices de tabela `Venda`
--
ALTER TABLE `Venda`
  ADD PRIMARY KEY (`IdVenda`),
  ADD KEY `fk_venda_IdCardapio` (`IdCardapio`),
  ADD KEY `fk_venda_IdFuncionario` (`IdFuncionario`) USING BTREE,
  ADD KEY `fk_venda_NumeroMesa` (`NumeroMesa`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `IdCardapio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria_cardapio`
--
ALTER TABLE `categoria_cardapio`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `IdFornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IdFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `IdIngrediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mesa`
--
ALTER TABLE `mesa`
  MODIFY `IdMesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_funcionario`
--
ALTER TABLE `tipo_funcionario`
  MODIFY `IdTipoFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Venda`
--
ALTER TABLE `Venda`
  MODIFY `IdVenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `fk_IdCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria_cardapio` (`IdCategoria`);

--
-- Restrições para tabelas `cardapio_ingrediente`
--
ALTER TABLE `cardapio_ingrediente`
  ADD CONSTRAINT `fk_IdCardapio` FOREIGN KEY (`IdCardapio`) REFERENCES `cardapio` (`IdCardapio`),
  ADD CONSTRAINT `fk_IdIngrediente` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingrediente` (`IdIngrediente`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_IdTipoFuncionario` FOREIGN KEY (`IdTipoFuncionario`) REFERENCES `tipo_funcionario` (`IdTipoFuncionario`);

--
-- Restrições para tabelas `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `fk_IdForncedor` FOREIGN KEY (`IdFornecedor`) REFERENCES `fornecedor` (`IdFornecedor`);

--
-- Restrições para tabelas `Venda`
--
ALTER TABLE `Venda`
  ADD CONSTRAINT `fk_IdFuncionario` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`IdFuncionario`),
  ADD CONSTRAINT `fk_NumeroMesa` FOREIGN KEY (`NumeroMesa`) REFERENCES `mesa` (`IdMesa`),
  ADD CONSTRAINT `fk_venda_IdCardapio` FOREIGN KEY (`IdCardapio`) REFERENCES `cardapio` (`IdCardapio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
