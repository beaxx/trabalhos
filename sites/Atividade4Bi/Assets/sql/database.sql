create database deco;
use deco;

-- CREATE TABLE produtos(

-- );
-- CREATE TABLE categorias(

-- );

CREATE TABLE usuarios(
    id int auto_increment primary key,
    imagem varchar(255),
    nome varchar(50) not null,
    sobrenome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null,
    idade int not null,
    endereco varchar(200) not null,
    tipo int
);

-- CREATE TABLE pedidos(

-- );

-- CREATE TABLE itens_pedido(

-- );

INSERT INTO usuarios(nome,sobrenome,email,senha,tipo) VALUES("Beatriz","Oliveira", "bia@gmail.com", "1234", 2);