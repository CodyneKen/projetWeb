drop TABLE Commandes;
drop TABLE Commentaires;
drop TABLE Articles;
drop TABLE Vendeurs;
drop TABLE Clients;


CREATE TABLE Clients (
 idClient int AUTO_INCREMENT,
 pseudo varchar(40) NOT NULL,
 prenom varchar(20) DEFAULT NULL,
 nom varchar(20) DEFAULT NULL,
 mail varchar(40) DEFAULT NULL,
 adresse varchar(128) DEFAULT NULL,
 mdp varchar(20) DEFAULT NULL,
 PRIMARY KEY (idClient)
) ENGINE=InnoDB;

CREATE TABLE Vendeurs (
 idVendeur int AUTO_INCREMENT,
 nom varchar(32) DEFAULT NULL,
 prenom varchar(32) DEFAULT NULL,
 mail varchar(64) DEFAULT NULL,
 mdp varchar(64) DEFAULT NULL,
 PRIMARY KEY (idVendeur)
) ENGINE=InnoDB;

CREATE TABLE Articles(
    idArticle INT AUTO_INCREMENT PRIMARY KEY,
    nomArticle VARCHAR(128) NOT NULL,
    descriptif TEXT NOT NULL,
    prix FLOAT NOT NULL,
    img VARCHAR(128),
    idVendeur INT,
    FOREIGN KEY (idVendeur) REFERENCES Vendeurs(idVendeur) 
    )ENGINE=InnoDB;

CREATE TABLE Commandes(
    idCommande INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT NOT NULL,
    idArticle INT NOT NULL,
    FOREIGN KEY (idClient) REFERENCES Clients(idClient),
    FOREIGN KEY (idArticle) REFERENCES Articles(idArticle),
    dateCommande DATE,
    UNIQUE (idClient, idArticle)
)ENGINE=InnoDB;

CREATE TABLE Commentaires(
    idCommentaire INT AUTO_INCREMENT PRIMARY KEY,
    dateCommentaire DATE,
    mess TEXT,
    idClient INT,
    FOREIGN KEY (idClient) REFERENCES Clients(idClient) 
)ENGINE=InnoDB;

INSERT INTO Clients VALUES(NULL, 'lala', 'Jean', 'Monnet', 'jean@univ.fr', '7 rue Jean', 'JEANjean');
INSERT INTO Clients VALUES(NULL, 'toto', 'Toto', 'Treto', 'toto@outlook.com', '7 rue TOTO', 'TOTOtoto');
INSERT INTO Clients VALUES(NULL, 'moi', 'Anonyme', '????', 'personne@mystere.fr', '7 rue mystere', 'RIENrien');
INSERT INTO Clients VALUES(NULL, 'toi', 'Fanck', 'Bidack', 'farnck@gmail.com', '7 rue Bidack', 'FRANCKfranck');


INSERT INTO Vendeurs VALUES(NULL, 'Fanck', 'Bidack', 'farnck@gmail.com', 'FRANCKfranck');
INSERT INTO Vendeurs VALUES(NULL, 'Mickael', 'Bilbi', 'GrosVendeur@gmail.com', 'vendredeschoses');
INSERT INTO Vendeurs VALUES(NULL, 'Maurice', 'Galiner', 'Momo@gmail.com', 'MOMOmomo');

INSERT INTO Articles VALUES(NULL, 'frigo', 'gros frigo', '1239.69','photos/frigo1.jpeg', 1);

