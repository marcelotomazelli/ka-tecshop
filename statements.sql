PHP MySQL

CREATE DATABASE db_ka

-- selecionando operação no menu, alterei o agrupamento para 'utf8mb4_unicode_ci'

CREATE TABLE tb_produtos(
	id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(250) NOT NULL,
	nome_curto VARCHAR(20) NOT NULL,
	valor float(11,2) NOT NULL,
	descricao TEXT NULL
);


CREATE TABLE tb_categorias(
	id_produto int NOT NULL,
	foreign key(id_produto) references tb_produtos(id_produto),
	categoria VARCHAR(2) NOT NULL
);


/*

-< Legenda categorias >-

pf - perifericos
nb - notebook
sp - smartphone
dk - desktop
tb - tablet
ms - mouse
tc - teclado
hs - headset
cm - camera
gb - gabinete
mt - monitor
tv - televisão

*/

INSERT INTO 
	tb_categorias(id_produto, categoria)
VALUES 
	(1, 'hs'), (2, 'nb'), (3, 'sp'), (4, 'tc'), (5, 'sp'),
	(6, 'gb'), (7, 'dk'), (8, 'nb'), (9, 'sp'), (10, 'sp'),
	(11, 'nb'), (12, 'tc'), (13, 'ms'), (14, 'cm'), (15, 'tb'),
	(16, 'dk'), (17, 'ms'), (18, 'nb'), (19, 'sp'), (20, 'sp'),
	(21, 'hs'), (22, 'tb'), (23, 'dk'), (24, 'hs'), (25, 'sp'),
	(26, 'dk'), (27, 'dk'), (28, 'tc'), (29, 'tb'), (30, 'gb'),
	(31, 'tc'), (32, 'sp'), (33, 'dk'), (34, 'sp'), (35, 'tb'),
	(36, 'nb'), (37, 'ms'), (38, 'nb'), (39, 'pf'), (40, 'nb'),
	(41, 'dk'), (42, 'hs'), (43, 'nb'), (44, 'mt'), (45, 'sp'),
	(46, 'tv'), (47, 'sp'), (48, 'sp'), (49, 'ms'), (50, 'dk')
;

ALTER TABLE 
	tb_categorias
ADD COLUMN 
	categoria_especial VARCHAR(10) NULL;

UPDATE 
	tb_categorias
SET
	categoria_especial = 'destaque'
WHERE
	id_produto IN(2,19,42,11,32,34,22,7,3);

UPDATE 
	tb_categorias
SET
	categoria_especial = 'temp_oft'
WHERE
	id_produto IN(4,21,27,50,13,6,48,18,43);