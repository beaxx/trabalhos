create database deco;
use deco;

-- CREATE TABLE produtos(

-- );
-- CREATE TABLE categorias(

-- );

CREATE TABLE usuarios(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null unique
    senha varchar(16) not null
);

-- CREATE TABLE pedidos(

-- );

-- CREATE TABLE itens_pedido(

-- );

