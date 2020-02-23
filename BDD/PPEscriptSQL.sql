

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
pseudo VARCHAR(50) UNIQUE,
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
idProfile INT,
PRIMARY KEY (idMessage)
);

ALTER TABLE Bannit
ADD CONSTRAINT Bannit_idProfile
FOREIGN KEY (idProfile) 
REFERENCES Utilisateur(idProfile);

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idProfile
FOREIGN KEY (idProfile) 
REFERENCES Utilisateur(idProfile);

ALTER TABLE Message
ADD CONSTRAINT Message_idSujet
FOREIGN KEY (idSujet) 
REFERENCES Sujet(idSujet);

ALTER TABLE Message
ADD CONSTRAINT Message_idProfile
FOREIGN KEY (idProfile) REFERENCES Utilisateur(idProfile);

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

INSERT INTO Message(idMessage,text,likeMessage,dislikeMessage,URLimage,idSujet,idProfile)
VALUES (1,"qsdfjùlsdfjùlwsvjlsdfjkl",4,56,"inconnue",1,1),
(2,"uqiw<dqsuqsu",42,85,"inconnue",1,2),
(3,"fmuhqsdiowsfviosdjiisdisdjisdjio",74,85,"inconnue",2,3),
(4,"uqiw<dqsuqsu",42,85,"inconnue",2,4);


