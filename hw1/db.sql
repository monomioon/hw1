CREATE TABLE users (
    id integer primary key AUTO_INCREMENT,
    username VARCHAR(16) not null UNIQUE,
    password VARCHAR(255) not null,
    email VARCHAR(255) not null UNIQUE,
    name VARCHAR(255) not null,
    surname VARCHAR(255) not null,
    nfollowers INTEGER DEFAULT 0,
    nfollowing INTEGER DEFAULT 0,
    nposts INTEGER DEFAULT 0
    ) Engine = InnoDB;


CREATE TABLE favourites (
    id integer primary key AUTO_INCREMENT,
    id_user integer,
    movie_title varchar(255) not NULL,
    movie_img VARCHAR(255),
    FOREIGN KEY(id_user) references users(id) on delete CASCADE
) Engine = InnoDB;