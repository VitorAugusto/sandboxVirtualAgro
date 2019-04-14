CREATE DATABASE IF NOT EXISTS virtualagro;

use virtualagro;


CREATE table cadastros(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome LONGTEXT NOT NULL,
  telefone VARCHAR(50) UNIQUE NOT NULL,
  pin VARCHAR(50)NOT NULL);

INSERT INTO cadastros(nome, telefone, pin) VALUES ('NOME TESTE 1', 11111111111, MD5(1234) );
INSERT INTO cadastros(nome, telefone, pin) VALUES ('NOME TESTE 2', 22222222222, MD5(1234) );
INSERT INTO cadastros(nome, telefone, pin) VALUES ('NOME TESTE 3', 33333333333, MD5(1234) );


CREATE TABLE IF NOT EXISTS produtos(id INT PRIMARY KEY AUTO_INCREMENT,
  nome TEXT,
  categoria ENUM('FRUTA', 'VERDURA','LEGUME','TEMPERO','OUTRO','ESPECIARIA','GRÃOS'),
  imagemprincipal varchar(100),
  imagemadd1 varchar(100),
  imagemadd2 varchar(100));

CREATE TABLE IF NOT EXISTS anuncios(id INT PRIMARY KEY AUTO_INCREMENT,
  id_anunciante int,
  categoria ENUM('FRUTA', 'VERDURA','LEGUME','TEMPERO','OUTRO', 'ESPECIARIA','GRÃOS'),
  texto_anuncio TEXT,
  FOREIGN KEY (id_anunciante) references cadastros(id),
  id_produto INT,
  FOREIGN KEY (id_produto) references produtos(id),
  observacao TEXT,
  preco TEXT);

CREATE TABLE categoria(id INT PRIMARY KEY AUTO_INCREMENT, nome TEXT, imagem TEXT);

INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (1, 'FRUTA', 'fruta/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (2, 'VERDURA', 'verdura/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (3, 'LEGUME', 'legume/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (4, 'TEMPERO', 'tempero/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (5, 'ESPECIARIA', 'especiaria/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (6, 'GRÃOS', 'grãos/main.jpg');
INSERT INTO virtualagro.categoria (id, nome, imagem) VALUES (7, 'OUTRO', 'outro/main.jpg');

INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (1, 'abacate', 'FRUTA', 'fruta/abacate.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (2, 'abacaxi', 'FRUTA', 'fruta/abacaxi.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (3, 'acerola', 'FRUTA', 'fruta/acerola.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (4, 'ameixa', 'FRUTA', 'fruta/ameixa.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (5, 'banana', 'FRUTA', 'fruta/banana.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (6, 'cacau', 'FRUTA', 'fruta/cacau.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (7, 'carambola', 'FRUTA', 'fruta/carambola.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (8, 'coco seco', 'FRUTA', 'fruta/coco_seco.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (9, 'coco verde', 'FRUTA', 'fruta/coco_verde.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (10, 'framboesa', 'FRUTA', 'fruta/framboesa.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (11, 'jaca', 'FRUTA', 'fruta/jaca.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (12, 'kiwi', 'FRUTA', 'fruta/kiwi.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (13, 'laranja', 'FRUTA', 'fruta/laranja.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (14, 'lima', 'FRUTA', 'fruta/lima.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (15, 'limão', 'FRUTA', 'fruta/limão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (16, 'maçã', 'FRUTA', 'fruta/maçã.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (17, 'mamão', 'FRUTA', 'fruta/mamão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (18, 'manga', 'FRUTA', 'fruta/manga.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (19, 'maracujá', 'FRUTA', 'fruta/maracujá.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (20, 'melancia', 'FRUTA', 'fruta/melancia.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (21, 'melão', 'FRUTA', 'fruta/melão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (22, 'mexerica', 'FRUTA', 'fruta/mexerica.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (23, 'morango', 'FRUTA', 'fruta/morango.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (24, 'pêra', 'FRUTA', 'fruta/pêra.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (25, 'pêssego', 'FRUTA', 'fruta/pêssego.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (26, 'romã', 'FRUTA', 'fruta/romã.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (27, 'uva', 'FRUTA', 'fruta/uva.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (28, 'agrião', 'VERDURA', 'verdura/agrião.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (29, 'alface', 'VERDURA', 'verdura/alface.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (30, 'brócolis', 'VERDURA', 'verdura/brócolis.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (31, 'chicória', 'VERDURA', 'verdura/chicória.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (32, 'couve chinês', 'VERDURA', 'verdura/couve_chinês.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (33, 'couve flor', 'VERDURA', 'verdura/couve_flor.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (34, 'couve verde', 'VERDURA', 'verdura/couve_verde.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (35, 'espinafre', 'VERDURA', 'verdura/espinafre.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (36, 'mostarda', 'VERDURA', 'verdura/mostarda.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (37, 'radite', 'VERDURA', 'verdura/radite.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (38, 'repolho', 'VERDURA', 'verdura/repolho.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (39, 'rúcula', 'VERDURA', 'verdura/rúcula.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (40, 'abóbora', 'LEGUME', 'legume/abóbora.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (41, 'abobrinha', 'LEGUME', 'legume/abobrinha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (42, 'batata doce', 'LEGUME', 'legume/batata_doce.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (43, 'batata inglesa', 'LEGUME', 'legume/batata_inglesa.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (44, 'berinjela', 'LEGUME', 'legume/berinjela.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (45, 'beterraba', 'LEGUME', 'legume/beterraba.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (46, 'cenoura', 'LEGUME', 'legume/cenoura.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (47, 'chuchu', 'LEGUME', 'legume/chuchu.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (48, 'mandioca', 'LEGUME', 'legume/mandioca.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (49, 'mandioquinha', 'LEGUME', 'legume/mandioquinha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (50, 'milho verde', 'LEGUME', 'legume/milho_verde.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (51, 'moranga', 'LEGUME', 'legume/moranga.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (52, 'nabo', 'LEGUME', 'legume/nabo.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (53, 'pepino', 'LEGUME', 'legume/pepino.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (54, 'pimentão', 'LEGUME', 'legume/pimentão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (55, 'quiabo', 'LEGUME', 'legume/quiabo.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (56, 'rabanete', 'LEGUME', 'legume/rabanete.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (57, 'tomate', 'LEGUME', 'legume/tomate.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (58, 'alecrim', 'TEMPERO', 'tempero/alecrim.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (59, 'alho', 'TEMPERO', 'tempero/alho.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (60, 'alho poró', 'TEMPERO', 'tempero/alho_poró.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (61, 'cebola', 'TEMPERO', 'tempero/cebola.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (62, 'cebolinha', 'TEMPERO', 'tempero/cebolinha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (63, 'cheiro verde', 'TEMPERO', 'tempero/cheiro_verde.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (64, 'coentro', 'TEMPERO', 'tempero/coentro.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (65, 'hortelã', 'TEMPERO', 'tempero/hortelã.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (66, 'louro', 'TEMPERO', 'tempero/louro.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (67, 'manjericão', 'TEMPERO', 'tempero/manjericão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (68, 'manjerona', 'TEMPERO', 'tempero/manjerona.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (69, 'orégano', 'TEMPERO', 'tempero/orégano.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (70, 'pimenta', 'TEMPERO', 'tempero/pimenta.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (71, 'salsa', 'TEMPERO', 'tempero/salsa.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (72, 'sálvia', 'TEMPERO', 'tempero/sálvia.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (73, 'tempero verde', 'TEMPERO', 'tempero/tempero_verde.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (74, 'tomilho', 'TEMPERO', 'tempero/tomilho.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (75, 'aipo', 'OUTRO', 'outro/aipo.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (76, 'alcachofra', 'OUTRO', 'outro/alcachofra.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (77, 'ervilha', 'OUTRO', 'outro/ervilha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (78, 'inhame', 'OUTRO', 'outro/inhame.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (79, 'ovo', 'OUTRO', 'outro/ovo.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (80, 'palmito', 'OUTRO', 'outro/palmito.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (81, 'pinhão', 'OUTRO', 'outro/pinhão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (82, 'açafrão', 'ESPECIARIA', 'especiaria/açafrão.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (83, 'amendoim', 'ESPECIARIA', 'especiaria/amendoim.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (84, 'canela palito', 'ESPECIARIA', 'especiaria/canela_palito.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (85, 'coco ralado', 'ESPECIARIA', 'especiaria/coco_ralado.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (86, 'cogumelo', 'ESPECIARIA', 'especiaria/cogumelo.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (87, 'cravo da india', 'ESPECIARIA', 'especiaria/cravo_da_india.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (88, 'gengibre', 'ESPECIARIA', 'especiaria/gengibre.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (89, 'gergelim', 'ESPECIARIA', 'especiaria/gergelim.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (90, 'noz moscada', 'ESPECIARIA', 'especiaria/noz_moscada.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (91, 'pimenta do reino', 'ESPECIARIA', 'especiaria/pimenta_do_reino.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (92, 'ervilha', 'GRÃOS', 'grãos/ervilha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (93, 'feijão branco', 'GRÃOS', 'grãos/feijão_branco.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (94, 'feijão preto', 'GRÃOS', 'grãos/feijão_preto.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (95, 'feijão vermelho', 'GRÃOS', 'grãos/feijão_vermelho.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (96, 'grão de bico', 'GRÃOS', 'grãos/grão_de_bico.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (97, 'lentilha', 'GRÃOS', 'grãos/lentilha.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (98, 'quinoa', 'GRÃOS', 'grãos/quinoa.jpg', null, null);
INSERT INTO virtualagro.produtos (id, nome, categoria, imagemprincipal, imagemadd1, imagemadd2) VALUES (99, 'soja', 'GRÃOS', 'grãos/soja.jpg', null, null);

INSERT INTO virtualagro.anuncios (id, id_anunciante, categoria, texto_anuncio, id_produto, observacao, preco) VALUES (6, 3, 'FRUTA', 'KG', 3, 'ABACATE MADURO.', null);
INSERT INTO virtualagro.anuncios (id, id_anunciante, categoria, texto_anuncio, id_produto, observacao, preco) VALUES (7, 3, 'FRUTA', 'KG', 3, 'ABACATE MADURO.', null);
INSERT INTO virtualagro.anuncios (id, id_anunciante, categoria, texto_anuncio, id_produto, observacao, preco) VALUES (38, 1, 'TEMPERO', 'KG', 63, '', '6,00');
INSERT INTO virtualagro.anuncios (id, id_anunciante, categoria, texto_anuncio, id_produto, observacao, preco) VALUES (39, 1, 'ESPECIARIA', 'PACOTE', 87, 'pacote pequeno, pra vender rápido.', '4,00');

SET PASSWORD FOR 'root'@'localhost' = PASSWORD('virtualagroeunapolisbahia');