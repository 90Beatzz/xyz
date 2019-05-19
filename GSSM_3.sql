
create database gssm
character set utf8 collate utf8_general_ci;

use gssm;

-- tabela usuario, formulario que é prenchido pelos usuarios do APP, para fazer login ao aplicativo


create table usuario (
ID INT not null primary key auto_increment,
nome varchar(250),
CPF varchar(14) not null,
RG varchar(11) not null,
CEP varchar(9) not null,
login varchar(250) not null,
senha varchar(250) not null,
moderador enum('S','N'),
setor enum('Atendente','Gerente','Administrador')
);
-- Na tabela encomenda 
-- Tabela encomenda, criada pelo sistema ao concluir a venda, registrando o ID do usuario responsavel pela compra, data e horario atual 


create table encomenda (
ID INT primary key not null auto_increment,
ID_user INT NOT NULL,
data_pedid timestamp,
valor_total decimal(7,2) NOT NULL,
constraint foreign key (ID_user) references usuario(ID)

);


insert into encomenda (ID,ID_user,data_pedid,valor_total) values (DEFAULT,1,'2008-01-01 00:00:01',42256.33);

insert into usuario values (DEFAULT,"Iago A","032.796.035-10","15484746-51","40253-190","Admin","Admin","S","Administrador");



select nome, nome_prod from usuario,produto join encom_prod where usuario.id = encom_prod.ID_user;

 
-- Tabela Produto, cada produto possui seu ID, Seu nome, Quantidade em Estoque, Marca e Categoria

Create table produto (
ID int primary key not null auto_increment, 
nome_prod varchar(250) NOT NULL,
quant INT,
marca varchar(100),
categoria varchar(100),
valor_uni decimal(7,2) NOT NULL
);

insert into produto (ID,nome_prod,quant,marca,categoria,valor_uni) values (DEFAULT,'Feijão',100,'Mariazinha Alimentos','Alimento',20.00);
insert into produto (ID,nome_prod,quant,marca,categoria,valor_uni) values (DEFAULT,'Arroz',100,'Joãozinho Alimentos','Alimento',10.00);
insert into produto (ID,nome_prod,quant,marca,categoria,valor_uni) values (DEFAULT,'Macarrão',100,'Macarrões Saborosos','Alimento',25.00);
insert into produto (ID,nome_prod,quant,marca,categoria,valor_uni) values (DEFAULT,'Carne Shark',100,'Quero carne','Alimento',300.20);

-- A Tabela "Encom_prod" relaciona a ENCOMENDA feita pelo USUARIO a tabela de PRODUTOS VENDIDOS especificando o VALOR TOTAL
-- Atributos:
-- ID da encomenda, ID do Produto, Quantidade do Produto, ID do Usuario e Valor total da transação

create table encom_prod (
ID_encom INT NOT NULL,
ID_prod INT NOT NULL,
quant_prod INT NULL,

constraint foreign key (ID_encom) references encomenda(ID),
constraint foreign key (ID_prod) references produto(ID) 
);


insert into produto values (DEFAULT,"Feijão",20,"Pretinho","Alimento");


-- ID da encomenda gerada pelo backend

insert into encomenda values (DEFAULT,1,'2028-01-01 00:00:01',"2.5");
insert into encom_prod values (1,1,20,1);

-- Selecionar Usuario por nome do usuario e nome do produto

select nome, nome_prod from usuario,produto join encom_prod where usuario.id = encom_prod.ID_user;

use gssm;
select * from usuario;


select * from encomenda;
select * from encom_prod;


DROP procedure IF EXISTS `logins`;

DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `logins` ()
BEGIN

	select login,senha from usuario;

END$$

DELIMITER ;

call login;




DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `busca_por_user` ()
BEGIN

	select encomenda.id as 'ID da encomenda',usuario.nome as 'Usuario Responsavel', encomenda.valor_total 'Valor de compra' from usuario,encomenda where usuario.id = ID_user;


END$$

DELIMITER ;


DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `busca_prod` ()
BEGIN

	select * from produto;


END$$

DELIMITER ;



