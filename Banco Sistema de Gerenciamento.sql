drop database sistema_de_gerenciamento;
create database Sistema_de_Gerenciamento;

use  Sistema_de_Gerenciamento;

select * from cadastro;

alter table Cadastro
add column cpf char(20);

alter table Cadastro
modify cpf char(20) not null;

alter table Cadastro
modify celular char(20);

ALTER TABLE Cadastro 
MODIFY COLUMN inscestadual char(100);



CREATE TABLE Cadastro (
    id                  INT(20) AUTO_INCREMENT PRIMARY KEY	not null,
    nome 				VARCHAR(100)	not null	                ,
    data_cadastro 		date		not null               	 	    ,
    genero		 		VARCHAR(50)					                ,
    cpf 				char(15)	 	not null		            ,
    rg 					char(20)					                ,
    endereco 			VARCHAR(100)				                ,
    num 				INT(5)						                ,
    numcomp 			CHAR(5)						                ,
    bairro 				VARCHAR(50)					                ,
    cidade 				VARCHAR(50)					                ,
    estado 				VARCHAR(10)					                ,
    celular 			char(20)					                ,
    email 				VARCHAR(60)					                ,
    statu 				VARCHAR(50)
);

CREATE TABLE Usuarios (
    id 					INT(20) AUTO_INCREMENT PRIMARY KEY			,
    usuario 			CHAR(100) NOT NULL							,
    senha 				CHAR(100) NOT NULL
);

select * from Usuarios;

INSERT INTO Usuarios (usuario, senha)
VALUES ('admin', '1234');

INSERT INTO Usuarios (usuario, senha)
values ('Diego', '238563');

ALTER TABLE Cadastro 
CHANGE COLUMN obs status char(100);

ALTER TABLE Cadastro 
CHANGE COLUMN cnpj data_cadastro DATE;

DELETE FROM Usuarios WHERE usuario = 'aaaa' AND senha = '$2y$10$zNpUdylfgXOGsrngNI0lW.Znca9pBehRtdC54EDoonZuOtu475C5K' LIMIT 1;




