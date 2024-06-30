-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 00:13
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
(1, 'Empresa stack');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `mesa`
--

CREATE TABLE `mesa` (
  `IdMesa` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mesa`
--

INSERT INTO `mesa` (`IdMesa`, `Descricao`) VALUES
(1, 'Mesa 1'),
(2, 'Mesa 2'),
(3, 'Mesa 3'),
(4, 'Mesa 4'),
(5, 'Mesa 5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `IdProduto` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `ValorCusto` float(10,2) NOT NULL,
  `ValorVenda` float(10,2) NOT NULL,
  `EstoqueAtual` int(11) NOT NULL,
  `EstoqueMaximo` int(11) NOT NULL,
  `IdFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`IdProduto`, `Descricao`, `Marca`, `ValorCusto`, `ValorVenda`, `EstoqueAtual`, `EstoqueMaximo`, `IdFornecedor`) VALUES
(1, 'Café expresso', 'Nescafé', 15.90, 16.90, 110, 250, 1),
(2, 'Café Italiano', 'Jaguari', 12.55, 19.99, 445, 800, 1),
(3, 'Chá Matte', 'Chá Matte', 10.99, 15.98, 35, 90, 1),
(4, 'Chá alemão', 'Nescafe', 15.99, 16.99, 150, 200, 1),
(5, 'Café Europeu', 'Boscov', 15.99, 19.99, 50, 850, 1);

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
  `IdFuncionario` int(11) NOT NULL,
  `IdProduto` int(11) NOT NULL,
  `NumeroMesa` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValorTotal` float NOT NULL,
  `Status` enum('FEC','ABE') NOT NULL DEFAULT 'ABE' COMMENT 'FEC = ''Fechado'', ABE = ''Aberto'''
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
-- Índices de tabela `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`IdMesa`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`IdProduto`),
  ADD KEY `fk_produto_IdFornecedor` (`IdFornecedor`) USING BTREE;

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
  ADD KEY `fk_venda_IdProduto` (`IdProduto`) USING BTREE;

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
-- AUTO_INCREMENT de tabela `mesa`
--
ALTER TABLE `mesa`
  MODIFY `IdMesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `IdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_IdForncedor` FOREIGN KEY (`IdFornecedor`) REFERENCES `fornecedor` (`IdFornecedor`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_IdFuncionario` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`IdFuncionario`),
  ADD CONSTRAINT `fk_NumeroMesa` FOREIGN KEY (`NumeroMesa`) REFERENCES `mesa` (`IdMesa`),
  ADD CONSTRAINT `fk_venda_IdProduto` FOREIGN KEY (`IdProduto`) REFERENCES `produto` (`IdProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
