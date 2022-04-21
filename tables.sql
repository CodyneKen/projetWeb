drop TABLE Commandes;
drop TABLE Commentaires;
drop TABLE Articles;
drop TABLE Membres;


CREATE TABLE Membres (
 idMembre int AUTO_INCREMENT,
 pseudo varchar(40) NOT NULL,
 prenom varchar(20) DEFAULT NULL,
 nom varchar(20) DEFAULT NULL,
 mail varchar(40) DEFAULT NULL,
 adresse varchar(128) DEFAULT NULL,
 mdp varchar(20) DEFAULT NULL,
 typemembre	ENUM('client','vendeur','admin'),
 PRIMARY KEY (idMembre)
) ENGINE=InnoDB;

CREATE TABLE Articles(
    idArticle INT AUTO_INCREMENT PRIMARY KEY,
    nomArticle VARCHAR(128) NOT NULL,
    descriptif TEXT NOT NULL,
    prix FLOAT NOT NULL,
    img VARCHAR(128),
    idVendeur INT,
    stock INT,
    FOREIGN KEY (idVendeur) REFERENCES Membres(idMembre) 
    )ENGINE=InnoDB;

CREATE TABLE Commandes(
    idCommande INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT NOT NULL,
    idArticle INT NOT NULL,
    dateCommande DATE,
    FOREIGN KEY (idArticle) REFERENCES Articles(idArticle),
    FOREIGN KEY (idClient) REFERENCES Membres(idMembre),
    UNIQUE (idClient, idArticle)
    )ENGINE=InnoDB;

CREATE TABLE Commentaires(
    idCommentaire INT AUTO_INCREMENT PRIMARY KEY,
    dateCommentaire DATE,
    mess TEXT,
    idMembre INT,
    FOREIGN KEY (idMembre) REFERENCES Membres(idMembre) 
)ENGINE=InnoDB;

INSERT INTO Membres VALUES(NULL, 'lala', 'Jean', 'Monnet', 'jean@univ.fr', '7 rue Jean', 'JEANjean','client');
INSERT INTO Membres VALUES(NULL, 'toto', 'Toto', 'Treto', 'toto@outlook.com', '7 rue TOTO', 'TOTOtoto','client');
INSERT INTO Membres VALUES(NULL, 'moi', 'Anonyme', '????', 'personne@mystere.fr', '7 rue mystere', 'RIENrien', 'vendeur');
INSERT INTO Membres VALUES(NULL, 'toi', 'Fanck', 'Bidack', 'farnck@gmail.com', '7 rue Bidack', 'FRANCKfranck','client');


INSERT INTO Articles VALUES(NULL, 'frigo', 'gros frigo', '1239.69','photos/frigo1.jpeg', 1, 28);

