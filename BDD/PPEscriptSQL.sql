CREATE DATABASE BDD_PPE1
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE BDD_PPE1 ;

CREATE TABLE Bannit 
(
idBannit INT NOT NULL AUTO_INCREMENT,
pseudoBannit VARCHAR(50),
justification VARCHAR(50),
idProfile INT,
PRIMARY KEY (idBannit)
);

CREATE TABLE Utilisateur
(
idProfile INT NOT NULL AUTO_INCREMENT,
pseudo VARCHAR(50),
MDP VARCHAR(50),
grade VARCHAR(50),
URLimageProfile VARCHAR(50),
PRIMARY KEY (idProfile)

);

CREATE TABLE Sujet
(
idSujet INT NOT NULL AUTO_INCREMENT,
nomSujet VARCHAR(50),
likeSujet INT,
dislikeSujet INT,
text TEXT,
idProfile INT,
PRIMARY KEY (idSujet)
);

CREATE  TABLE Message 
(
idMessage INT NOT NULL AUTO_INCREMENT,
text TEXT,
likeMessage INT,
dislikeMessage INT,
URLimage VARCHAR(50),
idSujet INT,
PRIMARY KEY (idMessage)
);

ALTER TABLE Bannit
ADD CONSTRAINT Bannit_idProfile
FOREIGN KEY (idProfile) 
REFERENCES Profile(idProfile);

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idProfile 
FOREIGN KEY (idProfile) 
REFERENCES Profile(idProfile);

ALTER TABLE Message
ADD CONSTRAINT Message_idSujet
FOREIGN KEY (idSujet) 
REFERENCES Sujet(idSujet);