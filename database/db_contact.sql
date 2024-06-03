CREATE DATABASE chat_system;

USE chat_system;

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50),
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
