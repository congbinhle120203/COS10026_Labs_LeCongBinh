-- Lab 09 - Task 4: run each query one by one in phpMyAdmin > SQL tab
USE exhibition_db;

-- 1. Show every column of every row
SELECT * FROM cars;

-- 2. Show make, model, price sorted by make, then by model (A to Z)
SELECT make, model, price FROM cars ORDER BY make, model;

-- 3. Show make and model of cars costing 20000 or more
SELECT make, model FROM cars WHERE price >= 20000;

-- 4. Show the average price for each make
SELECT make, AVG(price) FROM cars GROUP BY make;

-- 5. Show make and model of cars priced between 10000 and 15000 (exclusive)
SELECT make, model FROM cars WHERE price < 15000 AND price > 10000;
