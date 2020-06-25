create database gssm
character set utf8 collate utf8_general_ci;

use gssm;

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

-- Usuario: Admin Senha: Admin
insert into usuario (nome,cpf,rg,cep,login,senha,setor) values ('Iago Alves','333','333','333','21232f297a57a5a743894a0e4a801fc3','21232f297a57a5a743894a0e4a801fc3','Administrador');
-- Na tabela encomenda 
-- Tabela encomenda, criada pelo sistema ao concluir a venda, registrando o ID do usuario responsavel pela compra, data e horario atual 

create table encomenda (
ID varchar(6) primary key,
ID_user INT NOT NULL,
data_pedid timestamp,
valor_total decimal(6,3) NOT NULL,
constraint foreign key (ID_user) references usuario(ID)
);

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


create table encom_prod (
ID_encom varchar(6),
ID_prod INT NOT NULL,
quant_prod INT NULL,
constraint foreign key (ID_encom) references encomenda(ID),
constraint foreign key (ID_prod) references produto(ID) 
);



DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `login` ()
BEGIN

	select login,senha from usuario;

END$$

DELIMITER ;



DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `busca_por_user` ()
BEGIN

	select encomenda.id,usuario.nome, encomenda.valor_total, usuario.setor from usuario,encomenda where usuario.id = ID_user;


END$$

DELIMITER ;

call busca_por_user();


DELIMITER $$
USE `gssm`$$
CREATE PROCEDURE `busca_prod` ()
BEGIN

	select * from produto;


END$$

DELIMITER ;



-- busca por funcionario (Pessoa)
select usuario.nome,encomenda.ID as 'ID da encomenda' from encomenda,usuario where encomenda.ID_user = usuario.ID;


-- busca por setor
select usuario.setor,encomenda.ID as 'ID da encomenda' from encomenda,usuario where encomenda.ID_user = usuario.ID;


-- faturamento da empresa
select encomenda.valor_total as 'Faturamento' from encomenda;


-- por produtos mais vendidos (falta order...) 
select nome_prod from encomenda,encom_prod,produto where encom_prod.ID_prod = produto.ID;
