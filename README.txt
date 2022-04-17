CREATE DATABASE carReview;

CREATE TABLE users(
    idUsers INTEGER AUTO_INCREMENT PRIMARY KEY,
    uidUsers VARCHAR(255) UNIQUE NOT NULL,
    emailUsers VARCHAR(255) NOT NULL,
    pwdUsers VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE posts(
    id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(255)  NOT NULL,
    imageurl VARCHAR(255) NOT NULL,
    comments VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;



INSERT INTO users (idUsers, uidUsers, emailUsers, pwdUsers) VALUES(
    '1',
    'boris',
    'boris@hotmail.com',
    '12345'
),(
    '2',
    'max',
    'max@hotmail.com',
    '123'
);

INSERT INTO posts ( title, imageurl, comments) VALUES(

    'car one',
    'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=452&q=80',
    'awesome car'
),(

    'car two',
    'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
    'another car'
),(

    'car three',
    'https://images.unsplash.com/photo-1542362567-b07e54358753?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
    'third car'
);