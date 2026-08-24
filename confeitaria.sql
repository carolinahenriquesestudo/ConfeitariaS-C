-- 1. Criação do Banco de Dados
CREATE DATABASE IF NOT EXISTS `confeitaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `confeitaria`;

-- 2. Criação da Tabela de Usuários
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `perfil` ENUM('administrador', 'confeiteiro', 'entregador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Inserção dos Usuários de Teste
INSERT INTO `usuario` (`nome`, `usuario`, `senha`, `perfil`) VALUES
('Administrador', 'admin@confeitaria.com', '1234', 'administrador'),
('Confeiteiro Principal', 'confeiteiro@confeitaria.com', '1234', 'confeiteiro'),
('Entregador Responsável', 'entregador@confeitaria.com', '1234', 'entregador');