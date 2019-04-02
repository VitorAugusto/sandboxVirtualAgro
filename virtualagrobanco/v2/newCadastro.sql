

desc cadastros;


drop table cadastros;

show tables;

select * FROM cadastros;

select * from anuncios;

drop table cadastros;
drop table anuncios;
drop table categoria;
drop table produtos;



CREATE table cadastros(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome LONGTEXT NOT NULL,
  telefone VARCHAR(50)NOT NULL,
  pin VARCHAR(50)NOT NULL);

desc cadastros2;

show tables;

desc cadastros;

select * from cadastros;

INSERT INTO cadastros (nome,telefone,pin) VALUES ('NOME TESTE 1', 73111111, MD5(1234));

INSERT INTO cadastros (nome,telefone,pin) VALUES ('NOME TESTE 2', 73222222, MD5(1234));

INSERT INTO cadastros (nome,telefone,pin) VALUES ('NOME TESTE 3', 73111111, MD5(1234));

SELECT id FROM cadastros where telefone = 73981443066 AND pin = MD5(5454);

select * from anuncios;
select * from cadastros;

delete from cadastros WHERE id = 5;
delete from cadastros;

DELETE FROM anuncios;

ALTER TABLE cadastros2 RENAME TO cadastros;

desc cadastros;
desc cadastros2;

INSERT INTO cadastros2(nome, telefone, pin) VALUES ("VITOR AUGUSTO RIBEIRO", 73999598620, MD5(9715));

