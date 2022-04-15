la table sql :
CREATE TABLE clients (
 idClient int NOT NULL AUTO_INCREMENT,
 pseudo varchar(40) NOT NULL,
 prenom varchar(20) DEFAULT NULL,
 nom varchar(20) DEFAULT NULL,
 mail varchar(40) DEFAULT NULL,
 adresse varchar(40) DEFAULT NULL,
 mdp varchar(20) DEFAULT NULL,
 PRIMARY KEY (idClient)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

table commentaire :

CREATE TABLE clients (
    nom VARCHAR(30),
    prenom VARCHAR(30),
    email VARCHAR(30),
    Idclient INT PRIMARY KEY AUTO_INCREMENT,
    commentaire TEXT,
);

