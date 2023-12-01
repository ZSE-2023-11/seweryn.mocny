CREATE TABLE users
(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    login varchar(256) UNIQUE NOT NULL,
    password varchar(256) NOT NULL
);

INSERT INTO users(login,password) VALUES ('admin','test');