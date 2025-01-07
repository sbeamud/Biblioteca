-- Active: 1733823502192@@127.0.0.1@3306@biblioteca
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

CREATE TABLE Libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    disponible BOOLEAN DEFAULT TRUE
)

CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
)

CREATE TABLE Prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_prestamo DATE NOT NULL,
    id_libro INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_libro) REFERENCES Libros(id),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE
)