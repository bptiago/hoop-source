INSERT INTO TIME (Nome_time, Tecnico, Cidade, Estado, Arena) VALUES
("Milwaukee Bucks", "Adrian Griffin", "Milwaukee", "Wisconsin", "Fiserv Forum"),
("Golden State Warriors", "Steve Kerr", "São Francisco", "California", "Chase Center"),
("Miami Heat", "Erik Spoelstra", "Miami", "Florida", "Kaseya Center");

INSERT INTO JOGADOR (Nome, Data_nascimento, Nacionalidade, Altura, Posicao, Valor, Numero, fk_Time_Nome_time)
VALUES
	("Jimmy Butler", "1994-09-14", "Norte-Americano", 2.01, "Ala", 184000000, 22, "Miami Heat"),
    ("Bam Adebayo", "1997-07-18", "Norte-Americano", 2.06, "Pivô", 163000000, 13, "Miami Heat"),
    ("Giannis Antetokounmpo", "1994-12-06", "Grego", 2.11, "Ala-Pivô", 183000000, 34, "Milwaukee Bucks"),
    ("Damian Lillard", "1990-07-15", "Norte-Americano", 1.88, "Armador", 122000000, 0, "Milwaukee Bucks"),
    ("Stephen Curry", "1988-03-14", "Norte-Americano", 1.88, "Armador", 261000000, 30,  "Golden State Warriors"),
    ("Andrew Wiggins", "1995-02-23", "Norte-Americano", 2.01, "Ala", 140000000, 22, "Golden State Warriors");