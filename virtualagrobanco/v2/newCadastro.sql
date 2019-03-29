

desc cadastros;



CREATE table cadastros2(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome LONGTEXT NOT NULL,
  telefone VARCHAR(50)NOT NULL,
  pin VARCHAR(50)NOT NULL);

desc cadastros2;

show tables;

INSERT INTO cadastros2(nome, telefone, pin) VALUES ("VITOR AUGUSTO RIBEIRO", 73999598620, MD5(9715));

select * from cadastros2;

SELECT id from cadastros2 WHERE telefone = 73999598620 AND pin =

delete from cadastros2;


delete from cadastros2;

select * from cadastros2 where pin = MD5(9715);

 drop table cadastros2;


select * from cadastros;
