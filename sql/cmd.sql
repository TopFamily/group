# Create user table
CREATE TABLE `user` (
    uid int(11) AUTO_INCREMENT NOT null,
    username varchar(20) not null,
    email varchar(50) not null,
    password varchar(100) not null,
    groupid int(11) not null,
    PRIMARY KEY (uid),
    UNIQUE username(username),
    UNIQUE email(email),
    avatar text not null
);

CREATE TABLE `userprofile` (
    uid int(11) NOT null,
    PRIMARY KEY (uid),
    registertime DATETIME not null,
    lastactive DATETIME not null
);

CREATE TABLE `usercard` (
    uid int(11) NOT null,
    PRIMARY KEY (uid)
);
