-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/06/2024 às 01:52
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `IdFornecedor` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`IdFornecedor`, `Nome`) VALUES
(1, 'Ambev');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IdFuncionario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Nascimento` date NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Senha` varchar(150) NOT NULL,
  `IdTipoFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`IdFuncionario`, `Nome`, `Nascimento`, `CPF`, `Senha`, `IdTipoFuncionario`) VALUES
(1, 'Gustavo Cesar', '2024-12-03', '50155054856', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Nicolas Fernandes', '2004-12-03', '55055055056', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Fernando Gomes', '2004-12-03', '55555555555', '14e1b600b1fd579f47433b88e8d85291', 1),
(4, 'Roberto da Silva', '2004-05-12', '44444444444', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Ricardo Rodrigues', '2006-05-12', '88888888888', '25f9e794323b453885f5181f1b624d0b', 1);

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

--
-- Despejando dados para a tabela `ingrediente`
--

INSERT INTO `ingrediente` (`IdIngrediente`, `Descricao`, `Marca`, `ValorCusto`, `EstoqueAtual`, `EstoqueMaximo`, `IdFornecedor`) VALUES
(1, 'Café expresso', 'Nescafé', 50, 150, 200, 1);

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

--
-- Despejando dados para a tabela `tipo_funcionario`
--

INSERT INTO `tipo_funcionario` (`IdTipoFuncionario`, `Descricao`) VALUES
(1, 'Atendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `IdVenda` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValorTotal` float NOT NULL,
  `NumeroMesa` int(11) NOT NULL,
  `IdFuncionario` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

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
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`IdVenda`),
  ADD KEY `fk_venda_IdFuncionario` (`IdFuncionario`) USING BTREE,
  ADD KEY `fk_venda_NumeroMesa` (`NumeroMesa`) USING BTREE,
  ADD KEY `fk_venda_IdIngrediente` (`IdIngrediente`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `IdFornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IdFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `IdIngrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mesa`
--
ALTER TABLE `mesa`
  MODIFY `IdMesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_funcionario`
--
ALTER TABLE `tipo_funcionario`
  MODIFY `IdTipoFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `IdVenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

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
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_IdFuncionario` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`IdFuncionario`),
  ADD CONSTRAINT `fk_NumeroMesa` FOREIGN KEY (`NumeroMesa`) REFERENCES `mesa` (`IdMesa`),
  ADD CONSTRAINT `fk_venda_IdIngrediente` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingrediente` (`IdIngrediente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
