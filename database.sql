CREATE DATABASE student_management;

USE student_management_system;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    fullname VARCHAR(100),
    gender VARCHAR(10),
    age INT,
    course VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20)
);
