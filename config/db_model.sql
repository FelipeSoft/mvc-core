CREATE DATABASE db_scheduler_app;
USE db_scheduler_app;

CREATE TABLE users (
    `user_id_pk` BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `user_document` VARCHAR(255) NOT NULL
);

CREATE TABLE services (
    `service_id_pk` BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(255) NOT NULL
);

CREATE TABLE schedules (
    `schedule_id_pk` BIGINT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `date` DATETIME NOT NULL,
    `service_id_fk` BIGINT NOT NULL ,
    `user_id_fk` BIGINT NOT NULL
);

ALTER TABLE
    `schedules` ADD CONSTRAINT `schedules_user_id_fk` FOREIGN KEY(`user_id_fk`) REFERENCES `users`(`user_id_pk`);