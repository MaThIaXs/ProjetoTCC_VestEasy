CREATE DATABASE bd_VestEasy

CREATE TABLE tipo_produto (
	id_tipo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tipo VARCHAR(20) NOT NULL
);

INSERT INTO tipo_produto(tipo) VALUES("camiseta");
INSERT INTO tipo_produto(tipo) VALUES("calça");
INSERT INTO tipo_produto(tipo) VALUES("jaqueta");
INSERT INTO tipo_produto(tipo) VALUES("moletom");
INSERT INTO tipo_produto(tipo) VALUES("camisa");

CREATE TABLE tipo_usuario (
	id INT AUTO_INCREMENT PRIMARY KEY,
	tipo VARCHAR(10) NOT NULL
);

INSERT INTO tipo_usuario(tipo) VALUES("Cliente");
INSERT INTO tipo_usuario(tipo) VALUES("Vendedor");

CREATE TABLE produto (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cod_vendedor INT,
	imagem1 VARCHAR(255) NOT NULL,
	imagem2 VARCHAR(255) NOT NULL,
	imagem3 VARCHAR(255) NOT NULL,
	imagem4 VARCHAR(255),
	imagem5 VARCHAR(255),
	nome VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	preco VARCHAR(10) NOT NULL,
	marca VARCHAR(30),
	loja VARCHAR(50) NOT NULL,
	endereco VARCHAR(50) NOT NULL,
	cidade VARCHAR(60) NOT NULL,
	estado VARCHAR(2) NOT NULL,
	cod_tipo INT,
	CONSTRAINT fk_tipo FOREIGN KEY(cod_tipo) REFERENCES tipo_produto(id_tipo),
	CONSTRAINT fk_vendedor FOREIGN KEY(cod_vendedor) REFERENCES usuario(id)
);

CREATE TABLE usuario (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nomeUsuario VARCHAR(45) NOT NULL,
	email VARCHAR(60) NOT NULL,
	senha VARCHAR(15) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	endereco VARCHAR(60) NOT NULL,
	cidade VARCHAR(30) NOT NULL,
	estado VARCHAR(2) NOT NULL,
	cod_tipo INT,
	CONSTRAINT fk_usuario FOREIGN KEY(cod_tipo) REFERENCES tipo_usuario(id)
);