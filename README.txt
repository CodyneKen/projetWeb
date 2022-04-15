la table sql :

CREATE TABLE clients (
    pseudo VARCHAR(40) PRIMARY KEY,
    prenom VARCHAR(20),
    nom VARCHAR(20),
    mail VARCHAR(40),
    adresse VARCHAR(40),
    mdp VARCHAR(20)
);

table commentaire :

CREATE TABLE clients (
    nom VARCHAR(30),
    prenom VARCHAR(30),
    email VARCHAR(30),
    Idclient INT PRIMARY KEY AUTO_INCREMENT,
    commentaire TEXT,
);

