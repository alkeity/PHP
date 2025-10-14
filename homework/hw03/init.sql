-- init.sql: Создает структуру базы данных photo_app и таблицы для пользователей и их изображений.

-- CREATE DATABASE IF NOT EXISTS photo_app;
-- Назначение: Создает базу данных photo_app, если она еще не существует.
-- Параметры: Имя базы данных (photo_app).
CREATE DATABASE IF NOT EXISTS photo_app;

-- USE photo_app;
-- Назначение: Переключает контекст на базу photo_app для выполнения последующих запросов.
-- Параметры: Имя базы данных (photo_app).
USE photo_app;

-- CREATE TABLE IF NOT EXISTS Users (...);
-- Назначение: Создает таблицу users для хранения учетных данных пользователей, если она не существует.
-- Параметры:
--   id: INT AUTO_INCREMENT PRIMARY KEY - Уникальный идентификатор записи, автоматически увеличивается.
--   username: VARCHAR(50) NOT NULL UNIQUE - Имя пользователя (до 50 символов, не NULL, уникальное).
--   password: VARCHAR(255) NOT NULL - Хэш пароля (до 255 символов, не NULL).
CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- CREATE TABLE IF NOT EXISTS Images (...);
-- Назначение: Создает таблицу Images для хранения информации об изображениях пользователей.
-- Параметры:
--   id: INT AUTO_INCREMENT PRIMARY KEY - Уникальный идентификатор изображения.
--   user_id: INT NOT NULL - Идентификатор пользователя в таблице users. (извините, но мне "религия не позволяет" использовать юзернейм для внешних ключей)
--   image_path: VARCHAR(255) NOT NULL - Путь к файлу изображения (не NULL).
--   uploaded_at: TIMESTAMP DEFAULT CURRENT_TIMESTAMP - Время загрузки (по умолчанию текущее время).
--   FOREIGN KEY (username) REFERENCES users(username) - Внешний ключ, связывающий username с таблицей users, обеспечивает целостность.
CREATE TABLE IF NOT EXISTS Images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_UserImage FOREIGN KEY (user_id) REFERENCES Users(id)
);
