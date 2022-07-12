CREATE DATABASE IF NOT EXISTS livroteca;

USE livroteca;

CREATE OR REPLACE TABLE livros (
    id int primary key auto_increment,
    nome varchar (250) not null,
    foto longtext not null,
    autor varchar (45) not null,
    tipo varchar (20) not null,
    arqv longtext not null,
    created_at timestamp not null default current_timestamp 
    )ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('livroteca@gmail.com', md5('livroteca@123'));