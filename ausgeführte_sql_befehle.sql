create database fallstudie;

CREATE TABLE nobel (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    `Year` INT,
    Category VARCHAR(255),
    Prize VARCHAR(255),
    Motivation TEXT,
    Prize_Share VARCHAR(250),
    Laureate_ID INT,
    Laureate_Type VARCHAR(255),
    Full_Name VARCHAR(255),
    Birth_Date DATE,
    Birth_City VARCHAR(255),
    Birth_Country VARCHAR(255),
    Sex VARCHAR(10),
    Organization_Name VARCHAR(255),
    Organization_City VARCHAR(255),
    Organization_Country VARCHAR(255),
    Death_Date DATE,
    Death_City VARCHAR(255),
    Death_Country VARCHAR(255),
    INDEX idx_year (`Year`),
    INDEX idx_category (Category)
) AUTO_INCREMENT=1;


LOAD DATA INFILE 'D:/AKAD/Projekt/nobel.csv'
INTO TABLE nobel
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(`Year`, `Category`, `Prize`, `Motivation`, `Prize_Share`, `Laureate_ID`, `Laureate_Type`, `Full_Name`, `Birth_Date`, `Birth_City`, `Birth_Country`, `Sex`, `Organization_Name`, `Organization_City`, `Organization_Country`, `Death_Date`, `Death_City`, `Death_Country`);

CREATE TABLE `nobel-analyse` ( Decade INT, Category VARCHAR(100), Percentage_Female FLOAT, Percentage_Male FLOAT, Average_Age FLOAT, PRIMARY KEY (Decade, Category) );

LOAD DATA INFILE 'D:/AKAD/Projekt/nobel-analyse.csv'
INTO TABLE `nobel-analyse`
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(`Decade`, `Category`, `Percentage_Female`, `Percentage_Male`, `Average_Age`);


CREATE TABLE `user` (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);


INSERT INTO `user` (username, password) VALUES ('testuser', 'testpassword');
