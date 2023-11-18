INSERT INTO TIME (Nome_time, Tecnico, Cidade, Estado, Arena) VALUES
("Milwaukee Bucks", "Adrian Griffin", "Milwaukee", "Wisconsin", "Fiserv Forum"),
("Golden State Warriors", "Steve Kerr", "São Francisco", "California", "Chase Center"),
("Miami Heat", "Erik Spoelstra", "Miami", "Florida", "Kaseya Center");

INSERT INTO JOGADOR (Nome, Data_nascimento, Nacionalidade, Altura, Posicao, Valor, Numero, fk_Time_Id_time)
VALUES
	("Jimmy Butler", "1994-09-14", "Norte-Americano", 2.01, "Ala", 184000000, 22, 3),
    ("Bam Adebayo", "1997-07-18", "Norte-Americano", 2.06, "Pivo", 163000000, 13, 3),
    ("Giannis Antetokounmpo", "1994-12-06", "Grego", 2.11, "Ala", 183000000, 34, 1),
    ("Damian Lillard", "1990-07-15", "Norte-Americano", 1.88, "Armador", 122000000, 0, 1),
    ("Stephen Curry", "1988-03-14", "Norte-Americano", 1.88, "Armador", 261000000, 30,  2),
    ("Andrew Wiggins", "1995-02-23", "Norte-Americano", 2.01, "Ala", 140000000, 22, 2)
;

USE HOOPSOURCE;

SELECT * FROM TIME;

SELECT * FROM JOGADOR;
    
SELECT * FROM USUARIO;