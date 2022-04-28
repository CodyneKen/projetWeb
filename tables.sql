CREATE DATABASE IF NOT EXISTS phpmyadmin;

USE phpmyadmin;

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
 mdp varchar(256) DEFAULT NULL,
 typemembre	ENUM('client','vendeur','admin'),
 PRIMARY KEY (idMembre)
) ENGINE=InnoDB;

CREATE TABLE Articles(
    idArticle INT AUTO_INCREMENT PRIMARY KEY,
    nomArticle VARCHAR(128) NOT NULL,
    descriptif TEXT NOT NULL,
    prix FLOAT NOT NULL,
    img BLOB,
    idVendeur INT,
    stock INT,
    categorie ENUM('informatique', 'electromenager', 'figurine', 'vetement', 'mobilier', 'poster'),
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

-- Membres (idMembre, pseudo, prenom, nom, mail, adresse, mdp , typemembre) 
INSERT INTO Membres VALUES(NULL, 'lala', 'Jean', 'Monnet', 'jean@univ.fr', '7 rue Jean', SHA1(CONCAT(SHA1('JEANjean'), SHA1('Monnet'))),'client');
INSERT INTO Membres VALUES(NULL, 'toto', 'Toto', 'Treto', 'toto@outlook.com', '7 rue TOTO', SHA1(CONCAT(SHA1('TOTOtoto'), SHA1('Treto'))),'client');
INSERT INTO Membres VALUES(NULL, 'moi', 'Anonyme', '????', 'personne@mystere.fr', '7 rue mystere', SHA1(CONCAT(SHA1('RIENrien'), SHA1('????'))), 'vendeur');
INSERT INTO Membres VALUES(NULL, 'toi', 'Fanck', 'Bidack', 'farnck@gmail.com', '7 rue Bidack', SHA1(CONCAT(SHA1('FRANCKfranck'), SHA1('Bidack'))),'client');

INSERT INTO Membres VALUES(NULL, 'Louis', 'Louis', 'Marliac', 'louis.marliac@etu.univ-st-etienne.fr', '7 rue Louis', SHA1(CONCAT(SHA1('Louis'), SHA1('Marliac'))),'admin');
INSERT INTO Membres VALUES(NULL, 'Walid', 'Walid', 'Zeghdallou', 'walid.zeghdallou@etu.univ-st-etienne.fr', '7 rue Walid', SHA1(CONCAT(SHA1('Walid'), SHA1('Zeghdallou'))),'admin');
INSERT INTO Membres VALUES(NULL, 'Corentin', 'Corentin', 'Bohelay', 'corentin.bohelay@etu.univ-st-etienne.fr', '7 rue Corentin', SHA1(CONCAT(SHA1('Corentin'), SHA1('Bohelay'))),'admin');

-- Articles (idArticle, nomArticle, descriptif, prix, img, idVendeur, stock, categorie <ENUM>)
INSERT INTO Articles VALUES(NULL, "frigo", "frigo", 5, LOAD_FILE('./photos/frigo1.jpeg'), 3, 15, 'electromenager');
INSERT INTO Articles VALUES(NULL, "four", "un four", 18, LOAD_FILE('./photos/four.webp'), 3, 15, 'electromenager');
INSERT INTO Articles VALUES(NULL, "lave vaisselle", "lave la vaisselle", 5, LOAD_FILE('./photos/lavevaiselle.jpg'), 3, 15, 'electromenager');
INSERT INTO Articles VALUES(NULL, "machine à laver", "lave la machine", 5, LOAD_FILE('./photos/machinealaver.webp'), 3, 15, 'electromenager');
INSERT INTO Articles VALUES(NULL, "pc asu", "ASUS ROG EXTREME", 870, LOAD_FILE('./photos/pc_asus.webp'), 3, 15, 'informatique');
INSERT INTO Articles VALUES(NULL, "frigo", "frigo", 5, LOAD_FILE('./photos/frigo1.jpeg'), 3, 15, 'electromenager');


