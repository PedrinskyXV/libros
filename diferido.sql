drop database exFinal;
create database exFinal;
use exFinal;

CREATE TABLE usuario
(
	usuario VARCHAR(30) NOT NULL,
	contrasena VARCHAR(30) NOT NULL,
	rol INT(11) NOT NULL,
    foto VARCHAR(250),
	estado smallint default 1
);

CREATE TABLE editorial
(
	codigoEditorial INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    pais VARCHAR(75) NOT NULL,
	estado smallint default 1
);

CREATE TABLE libro
(
	codigoLibro INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    precio DOUBLE NOT NULL,
    codigoEditorial INT(11) NOT NULL,
    FOREIGN KEY (codigoEditorial) REFERENCES editorial(codigoEditorial),
	estado smallint default 1
);

CREATE TABLE autor
(
	codigoAutor INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    edad INT(11) NOT NULL,
    codigoLibro INT(11) NOT NULL,
    FOREIGN KEY (codigoLibro) REFERENCES libro(codigoLibro),
	estado smallint default 1
);

INSERT INTO usuario (usuario, contrasena, rol, estado)VALUES
('admin', 'admin123', 1,1),
('bibliotecario', 'abc123', 2,1),
('supervisor', 'abc123', 3,1);

INSERT INTO editorial (nombre, pais,estado) VALUES
('Editorial A', 'Pais A',1),
('Editorial B', 'Pais B',1),
('Editorial C', 'Pais C',1),
('Editorial D', 'Pais D',1),
('Editorial F', 'Pais E',1);

INSERT INTO libro (nombre, isbn, precio, codigoEditorial, estado) values
('Crimen y Castiho', '9788420741468', 25, 1, 1),
('Cien Años de Soledad', '9780060114183', 25, 1, 1),
('Fahrenheit 451', '9780345342966', 25, 2, 1),
('Drácula', '9780194789431', 25, 3, 1),
('La Divina Comedia', '9783111168104', 25, 3, 1);

INSERT INTO autor (nombre, edad, codigoLibro, estado) values
('Fedor Dostoievski', 80, 1, 1),
('Gabriel Garcia Marquez', 87, 2, 1),
('Ray Bradbury', 90, 3, 1),
('Bram Stoker', 60, 4, 1),
('Dante Alighieri', 35, 5, 1);