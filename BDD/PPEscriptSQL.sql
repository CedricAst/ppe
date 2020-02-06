CREATE DATABASE BDD_PPE1
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE BDD_PPE1 ;

CREATE TABLE Bannit 
(
idBannit INT NOT NULL AUTO_INCREMENT,
pseudoBannit VARCHAR(50),
justification VARCHAR(50),
idUtilisateur INT,
PRIMARY KEY (idBannit)
);

CREATE TABLE Utilisateur
(
idUtilisateur INT NOT NULL AUTO_INCREMENT,
pseudo VARCHAR(50) UNIQUE,
MDP VARCHAR(50),
grade VARCHAR(50),
URLimageProfile VARCHAR(50),
PRIMARY KEY (idUtilisateur)

);

CREATE TABLE Sujet
(
idSujet INT NOT NULL AUTO_INCREMENT,
nomSujet VARCHAR(50),
likeSujet INT,
dislikeSujet INT,
text TEXT,
idUtilisateur INT,
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
ADD CONSTRAINT Bannit_idUtilisateur
FOREIGN KEY (idUtilisateur) 
REFERENCES Utilisateur(idUtilisateur);

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idUtilisateur 
FOREIGN KEY (idUtilisateur) 
REFERENCES Utilisateur(idUtilisateur);

ALTER TABLE Message
ADD CONSTRAINT Message_idSujet
FOREIGN KEY (idSujet) 
REFERENCES Sujet(idSujet);
/* cree un utilisateur */
INSERT INTO Utilisateur (idUtilisateur,pseudo,MDP,grade,URLimageProfile) VALUES
(null,"superkiller",123456789,0,"DATA\image\image_Utilisateur")

/* banne un utilisateur */
INSERT INTO Bannit (idBannit,pseudoBannit,justification,idUtilisateur) VALUES
(null,"superkiller","pas bien",null)

/* cree un Sujet */
INSERT INTO Sujet  (idSujet,nomSujet,likeSujet,dislikeSujet,text,idUtilisateur) VALUES
(null,"IOS<android",0,0,"voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.",null)

/* cree un Message */
INSERT INTO Message (idMessage,text,likeMessage,dislikeMessage,URLimage,idSujet) VALUES
(null,"blablabla gfdsfdf ",0,0,"DATA\image\image-message",null)

/* like un sujet */
UPDATE Sujet SET likeSujet=likeSujet+1
WHERE idSujet=1;

/* dislike un sujet */
UPDATE Sujet SET dislikeSujet=dislikeSujet+1
WHERE idSujet=1;

/* like un Message */
UPDATE Message SET likeMessage=likeMessage+1
WHERE idMessage=1;

/* dislike un Message */
UPDATE Message SET dislikeMessage=dislikeMessage+1
WHERE idMessage=1;

/* change MDP*/
UPDATE Utilisateur SET MDP="password"
WHERE idUtilisateur=1;






