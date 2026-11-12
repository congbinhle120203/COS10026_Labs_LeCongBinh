-- Lab 09 - Task 1 to 3: create database, table and records
-- Run the whole file in phpMyAdmin > SQL tab (or Import)

DROP DATABASE IF EXISTS exhibition_db;
CREATE DATABASE exhibition_db;
USE exhibition_db;

-- Task 2: create the cars table
CREATE TABLE cars (
  car_id INT NOT NULL AUTO_INCREMENT,
  make   VARCHAR(25) NOT NULL,
  model  VARCHAR(25) NOT NULL,
  price  INT NOT NULL,
  yom    INT NOT NULL,
  PRIMARY KEY (car_id)
);

-- Task 3: add records (car_id is auto-incremented, so it is not listed)
INSERT INTO cars (make, model, price, yom) VALUES
  ('Holden', 'Astra',     14000, 2009),
  ('BMW',    'X3',        35000, 2010),
  ('Ford',   'Falcon',    39000, 2013),
  ('Toyota', 'Corolla',   20000, 2012),
  ('Holden', 'Commodore', 28000, 2009);
