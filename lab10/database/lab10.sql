-- lab10.sql - Week 10 lab: user table for the profile page
-- Run in phpMyAdmin: tab SQL (or Import) -> Go
-- Le Cong Binh (106419738)

CREATE DATABASE IF NOT EXISTS lab10_db;
USE lab10_db;

DROP TABLE IF EXISTS user;
CREATE TABLE user (
  username VARCHAR(50)  NOT NULL,
  password VARCHAR(255) NOT NULL,
  email    VARCHAR(100) NOT NULL,
  PRIMARY KEY (username)
);

-- Task 1: my name as username, my student ID as password
INSERT INTO user (username, password, email)
VALUES ('Binh', '106419738', 'i_love_web_development@swinburne.com');
