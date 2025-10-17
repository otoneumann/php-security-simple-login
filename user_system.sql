CREATE DATABASE user_system;
USE user_system;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(100) NOT NULL
);