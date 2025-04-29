CREATE DATABASE IF NOT EXISTS TicketSystem;
USE TicketSystem;

DROP TABLE IF EXISTS attractions;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS reviews;

-- Tabuľka pre používateľov
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    adress VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Tabuľka pre atrakcie
CREATE TABLE attractions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nameOfAttraction VARCHAR(100) NOT NULL,
    costOfAttraction DECIMAL(10, 2) NOT NULL
);

INSERT INTO attractions (nameOfAttraction, costOfAttraction) VALUES
    ('Bratislavský hrad', 5.5),
    ('Oravský hrad', 4.8), 
    ('Bojnický zámok', 4.5),
    ('Starý zámok Banská Štiavnica', 5),
    ('Demänovská jaskyňa slobody', 6.7),
    ('Dobšinská ľadová jaskyňa', 6.2),
    ('Vysoké Tatry', 2),
    ('Slovenský raj', 3); 
             
-- Tabuľka pre objednávky
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    attraction_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (attraction_id) REFERENCES attractions(id) ON DELETE CASCADE,
    numberOfTickets INT NOT NULL,
    totalCost DECIMAL(10, 2) NOT NULL,
    dateOfAttraction DATE NOT NULL
);

--Tabuľka pre recenzie
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pozition ENUM('Študent', 'Učiteľ', 'Iné') NOT NULL,
    classOfStudent VARCHAR(20) DEFAULT 'Žiadny',
    text TEXT NOT NULL
);