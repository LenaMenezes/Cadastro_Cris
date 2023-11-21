create database cadastro;
use cadastro;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idade INT NOT NULL,
    altura FLOAT NOT NULL,
    peso FLOAT NOT NULL,
    genero VARCHAR(10) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    gosto VARCHAR(100) NOT NULL
);


CREATE USER 'Cris'@'localhost' IDENTIFIED WITH mysql_native_password BY '1234';
 GRANT ALL PRIVILEGES ON cadastro.* TO 'Cris'@'localhost' WITH GRANT OPTION;
 
 select * from usuarios
