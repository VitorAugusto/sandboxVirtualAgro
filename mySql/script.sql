show databases ;

CREATE DATABASE IF NOT EXISTS virtualagro;

use virtualagro;
CREATE TABLE cadastros(id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  username VARCHAR(100),
  senha VARCHAR(100));

INSERT INTO cadastros(nome, username, senha) VALUES ('NOME TESTE 1', 'teste1', 'teste1' );
INSERT INTO cadastros(nome, username, senha) VALUES ('NOME TESTE 2', 'teste2', 'teste2' );
INSERT INTO cadastros(nome, username, senha) VALUES ('NOME TESTE 3', 'teste3', 'teste3' );




CREATE TABLE IF NOT EXISTS anuncios(id INT PRIMARY KEY AUTO_INCREMENT,
  id_anunciante int,
  categoria ENUM('FRUTA', 'VERDURA','LEGUME','TEMPERO','OUTRO'),
  texto_anuncio TEXT,
  FOREIGN KEY (id_anunciante) references cadastros(id),
  id_produto INT,
  FOREIGN KEY (id_produto) references produtos(id),
  observacao TEXT);

INSERT INTO anuncios(id_anunciante, tipo_anuncio, texto_anuncio) VALUES (1,"LEGUME","GRANDE VOLUME DE DISTRIBUIÇÃO DE LEGUMES");
INSERT INTO anuncios(id_anunciante, tipo_anuncio, texto_anuncio) VALUES(2,"FRUTA", "CEREJA");
INSERT INTO anuncios(id_anunciante, tipo_anuncio, texto_anuncio) VALUES(3,"VERDURA", "RABANETE");
INSERT INTO anuncios(id_anunciante, tipo_anuncio, texto_anuncio) VALUES(2,"FRUTA", "BANANA");




CREATE TABLE IF NOT EXISTS produtos(id INT PRIMARY KEY AUTO_INCREMENT,
  nome TEXT,
  categoria ENUM('FRUTA', 'VERDURA','LEGUME','TEMPERO','OUTRO'),
  imagemprincipal varchar(100),
  imagemadd1 varchar(100),
  imagemadd2 varchar(100));



