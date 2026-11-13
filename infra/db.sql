CREATE DATABASE mecanica;
USE mecanica;

CREATE TABLE usuario(
    id int primary key AUTO_INCREMENT not null,
    nome varchar(100) not null,
    senha varchar(100) not null
);

CREATE TABLE cliente(
    id int primary key AUTO_INCREMENT not null,
    nome varchar(100) not null,
    senha varchar(100) not null
);

CREATE TABLE peca(
    id int primary key AUTO_INCREMENT not null,
    nome varchar(100) not null
);

CREATE TABLE pedido(
    id int primary key AUTO_INCREMENT not null,
    data_pedido date not null,
    id_cliente int,
    id_peca int,
    foreign key (id_cliente) references cliente(id),
    foreign key (id_peca) references peca(id)
);

INSERT INTO usuario (nome, senha) VALUES ('Tomazia', '123'), ('Ana', '321');