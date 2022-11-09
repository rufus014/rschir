CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users (name, password)
SELECT * FROM (SELECT 'admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'admin' AND password = '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc='
) LIMIT 1;

CREATE TABLE IF NOT EXISTS catalog (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  product_name TEXT NOT NULL,
  product_desc TEXT NOT NULL,
  product_price INT(11) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Макароны', 'С сыром', 70) AS tmp
WHERE NOT EXISTS (
    SELECT product_name FROM catalog WHERE product_name = 'Макароны' 
) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Корзинка', 'С фруктами', 100) AS tmp
WHERE NOT EXISTS (
    SELECT product_name FROM catalog WHERE product_name = 'Корзинка' 
) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Салат', 'С морковью', 50) AS tmp
WHERE NOT EXISTS (
    SELECT product_name FROM catalog WHERE product_name = 'Салат' 
) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Чай', 'С сахаром', 15) AS tmp
WHERE NOT EXISTS (
    SELECT product_name FROM catalog WHERE product_name = 'Чай' 
) LIMIT 1;


