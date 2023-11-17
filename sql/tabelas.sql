/* Lógico: */
DROP DATABASE IF EXISTS HOOPSOURCE;

CREATE DATABASE HoopSource;

USE HoopSource;

CREATE TABLE Time (
    Id_time INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    Nome_time VARCHAR(50) UNIQUE,
    Tecnico VARCHAR(50),
    Cidade VARCHAR(50),
    Estado VARCHAR(20),
    Arena VARCHAR(50),
    UNIQUE (Id_time, Nome_time)
);

CREATE TABLE Jogador (
    ID_jogador INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    Nome VARCHAR(50),
    Data_nascimento DATE,
    Nacionalidade VARCHAR(20),
    Altura FLOAT,
    Posicao VARCHAR(20),
    Valor FLOAT,
    Numero INT,
    fk_Time_Id_time INT
);

CREATE TABLE Usuario (
    ID_usuario INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    Nome_completo VARCHAR(50),
    Data_nascimento DATE,
    Email VARCHAR(50),
    Senha VARCHAR(200),
    UNIQUE (ID_usuario, Email)
);
 
ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_2
    FOREIGN KEY (fk_Time_Id_time)
    REFERENCES Time (Id_time)
    ON DELETE CASCADE;