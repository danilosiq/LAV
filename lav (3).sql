-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2023 às 04:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lav`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(80) DEFAULT NULL,
  `nomerua` varchar(80) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `complemento` varchar(80) NOT NULL,
  `numero` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `modo_pagamento` varchar(80) DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_compra`, `id_usuario`, `modo_pagamento`, `preco`) VALUES
(3, 64, '0', 11.5),
(4, 64, '0', 5.75),
(5, 64, 'dinheiro', 4.3),
(6, 64, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_servico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `bermuda` float DEFAULT NULL,
  `calcinha` float DEFAULT NULL,
  `camiseta` float DEFAULT NULL,
  `meia` float DEFAULT NULL,
  `casaco` float DEFAULT NULL,
  `sutia` float DEFAULT NULL,
  `cueca` float DEFAULT NULL,
  `jeans` float DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_servico`, `id_usuario`, `bermuda`, `calcinha`, `camiseta`, `meia`, `casaco`, `sutia`, `cueca`, `jeans`, `preco`) VALUES
(224, 64, 1, 0, 0, 0, 0, 0, 0, 0, 5.75),
(225, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(226, 64, 2, 0, 0, 0, 0, 0, 0, 0, 11.5),
(227, 64, 1, 0, 0, 0, 0, 0, 0, 0, 5.75),
(228, 64, 0, 2, 0, 0, 0, 0, 0, 0, 4.3),
(229, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `genero` varchar(80) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `sobrenome`, `cpf`, `email`, `genero`, `senha`) VALUES
(58, '', '', '', '', NULL, 'd41d8cd98f00b204e9800998ecf8427e'),
(59, '', '', '', '', NULL, 'd41d8cd98f00b204e9800998ecf8427e'),
(60, '', '', '', '', NULL, 'd41d8cd98f00b204e9800998ecf8427e'),
(61, 'da', 'danilo', '213', 'danilo.dante01@hotmail.com', 'masculino', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(62, 'da', 'danilo', '213', 'danilo.dante01@hotmail.com', 'masculino', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(63, '2', '2', '242.342.342-34', '2@43242.com', 'masculino', '979d472a84804b9f647bc185a877a8b5'),
(64, '3', '2', '3', '2@43242.com', 'masculino', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(65, '3', '2', '3', '2@43242.com', 'masculino', 'eccbc87e4b5ce2fe28308fd9f2a7baf3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_compra`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
