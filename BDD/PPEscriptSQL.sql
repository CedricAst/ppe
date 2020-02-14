

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
<<<<<<< HEAD

INSERT INTO Sujet(idSujet,nomSujet,likeSujet,dislikeSujet,text,idProfile)
VALUES(1,"test1",10,2,"dum sodales, augue velit cursus nu",1),
(2,"test2",5,2,"dum sodales, augue velit cursus nu",1),
(3,"test3",19,4,"dum sodales,sdfhbhklf<sksdjkbbjksbjkmbjksjmk augue velit cursus nu",2),
(4,"test4",1340,289,"dum sefuomjksefjsefmjkssjsodales, augue velit cursus nu",3),
(5,"test5",1093,42,"dum ssduilsdjksdjsdjljlmsdfmjisrfmjilwsdfjklssdfodales, augue velit cursus nu",2);

INSERT INTO Utilisateur(idProfile,pseudo,MDP,grade,URLimageProfile)
VALUES(1,"CCLR","azerty123","Utlisateur","inconnue"),
(2,"Mickey","zerty123","Utlisateur","inconnue"),
(3,"pickwii","123","Utlisateur","inconnue"),
(4,"EEEEE","EEEEE","Utlisateur","inconnue");

INSERT INTO Message(idMessage,text,likeMessage,dislikeMessage,URLimage,idSujet)
VALUES (1,"qsdfjùlsdfjùlwsvjlsdfjkl",4,56,"inconnue",1),
(2,"uqiw<dqsuqsu",42,85,"inconnue",1),
(3,"fmuhqsdiowsfviosdjiisdisdjisdjio",74,85,"inconnue",2),
(4,"uqiw<dqsuqsu",42,85,"inconnue",2);
=======
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






>>>>>>> be20d7a712ba395ec8e81705350102021644294a
