-- Database creation
DROP DATABASE IF EXISTS catalogo_productos;
CREATE DATABASE catalogo_productos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE catalogo_productos;

-- Table: unidades
CREATE TABLE unidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    abreviatura VARCHAR(10) NOT NULL
) ENGINE=InnoDB;

-- Table: categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
) ENGINE=InnoDB;

-- Table: marcas
CREATE TABLE marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Table: productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    precio_compra DECIMAL(10, 2) NOT NULL,
    precio_venta DECIMAL(10, 2) NOT NULL,
    id_categoria INT,
    id_marca INT,
    id_unidad INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE SET NULL,
    FOREIGN KEY (id_marca) REFERENCES marcas(id) ON DELETE SET NULL,
    FOREIGN KEY (id_unidad) REFERENCES unidades(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Insert initial test data
INSERT INTO unidades (nombre, abreviatura) VALUES 
('Pieza', 'pza'),
('Kilogramo', 'kg'),
('Litro', 'lt');

INSERT INTO categorias (nombre, descripcion) VALUES 
('Electrónica', 'Dispositivos electrónicos'),
('Ropa', 'Prendas de vestir'),
('Alimentos', 'Comestibles');

INSERT INTO marcas (nombre) VALUES 
('Samsung'),
('Nike'),
('Coca-Cola'),
('Genérica');
