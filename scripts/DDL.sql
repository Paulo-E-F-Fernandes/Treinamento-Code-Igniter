create database mercado;

use mercado;

create table usuarios(id integer auto_increment primary key, nome varchar(255), email varchar(255), senha varchar (255));

create table produtos(id integer auto_increment primary key, nome varchar(255), descricao text, preco decimal(10,2), usuario_id integer);

create table vendas(id integer auto_increment primary key, produto_id integer, comprador_id integer, data_de_entrega date);

alter table produtos add vendido boolean default false;