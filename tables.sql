CREATE DATABASE IF NOT EXISTS phpmyadmin;

USE phpmyadmin;

drop TABLE IF EXISTS Commandes;
drop TABLE IF EXISTS Commentaires;
drop TABLE IF EXISTS Articles;
drop TABLE IF EXISTS Membres;


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
    img VARCHAR(255),
    idVendeur INT,
    stock INT,
    categorie ENUM('informatique', 'electromenager', 'figurine', 'vetement', 'mobilier', 'poster'),
    nbVentes INT DEFAULT 0,
    FOREIGN KEY (idVendeur) REFERENCES Membres(idMembre) 
    )ENGINE=InnoDB;

CREATE TABLE Commandes(
    idCommande INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT NOT NULL ,
    idArticle INT NOT NULL ,
    idVendeur INT NOT NULL ,
    qteArticle INT,
    prixArticle FLOAT NOT NULL,
    img VARCHAR(255),
    nomArticle VARCHAR(128) NOT NULL,
    dateCommande DATE
    
    
   
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
INSERT INTO Membres VALUES(NULL, 'moi', 'Tota', 'balle', 'totoa@outlook.com', '7 rue TOTA', SHA1(CONCAT(SHA1('TOTOtoto'), SHA1('balle'))),'vendeur');
INSERT INTO Membres VALUES(NULL, 'toi', 'Fanck', 'Bidack', 'farnck@gmail.com', '7 rue Bidack', SHA1(CONCAT(SHA1('FRANCKfranck'), SHA1('Bidack'))),'client');

INSERT INTO Membres VALUES(NULL, 'Louis', 'Louis', 'Marliac', 'louis.marliac@etu.univ-st-etienne.fr', '7 rue Louis', SHA1(CONCAT(SHA1('Louis'), SHA1('Marliac'))),'admin');
INSERT INTO Membres VALUES(NULL, 'Walid', 'Walid', 'Zeghdallou', 'walid.zeghdallou@etu.univ-st-etienne.fr', '7 rue Walid', SHA1(CONCAT(SHA1('Walid'), SHA1('Zeghdallou'))),'admin');
INSERT INTO Membres VALUES(NULL, 'Corentin', 'Corentin', 'Bohelay', 'corentin.bohelay@etu.univ-st-etienne.fr', '7 rue Corentin', SHA1(CONCAT(SHA1('Corentin'), SHA1('Bohelay'))),'admin');

-- Articles (idArticle, nomArticle, descriptif, prix, img, idVendeur, stock, categorie <ENUM>, nbVentes)
INSERT INTO Articles VALUES(NULL, "frigo", "préservez vos aliments dans ce magnifique frigo", '899.99', 'frigo1.jpeg', 3, 15, 'electromenager', 0);
INSERT INTO Articles VALUES(NULL, "four", "Préparer vos meilleures plats avec ce four électrique", '259.99', 'four.webp', 3, 15, 'electromenager', 0);
INSERT INTO Articles VALUES(NULL, "lave vaisselle", "lave la vaisselle comme un chef", 200, 'lavevaisselle.jpg', 3, 35, 'electromenager', 0);
INSERT INTO Articles VALUES(NULL, "machine à laver", "Machine à laver plutôt pratique pour nettoyer son linge", '329.99', 'machinealaver.webp', 3, 15, 'electromenager', 0);
INSERT INTO Articles VALUES(NULL, "explode", "vive le php", 5, 'phpexplode.webp', 3, 15, 'poster', 0);
INSERT INTO Articles VALUES(NULL, "le magicien zoro", "avec son épée", 500, 'zoro.jpg', 3, 1, 'figurine', 0);
INSERT INTO Articles VALUES(NULL, "Sweat bleu", "Taille S, de couleur bleu ciel, unisexe", '11.49', 'pull_bleu.webp', 1, 100, 'vetement', 0);
INSERT INTO Articles VALUES(NULL, "Sweat Tommy Hilfiger", "Taille M, de couleur bleu marine, Homme, Marque : Tommy Hilfiger", '79.95', 'pull_tommy.webp', 1, 55, 'vetement', 0);
INSERT INTO Articles VALUES(NULL, "Sweat Viande crue", "Taille XXL, ce magnifique pull à camouflage fait à base de viande crue vous permettera une fabuleuse aventure de carnivore, Unisexe", '352.99', 'pull_viande.webp', 1, 4000, 'vetement', 0);
INSERT INTO Articles VALUES(NULL, "Sweat à Capuche Fourré Patch Détaillé avec Poche", "Taille L, veste fourée pour une chaleur garantie !, Unisexe", '25.70', 'veste_laine.webp', 1, 100, 'vetement', 0);
INSERT INTO Articles VALUES(NULL, "PHP pour les nuls", "Apprenez facilement à développer en PHP, en seulement une seule étape !", '22.99', 'autre.jpg', 3, 39, 'poster', 0);
INSERT INTO Articles VALUES(NULL, "PHP programmers", "Afficher ce magnifique poster dans votre maison, votre décoration sera splendide", '11.95', 'programmers.jpg', 3, 55, 'poster', 0);
INSERT INTO Articles VALUES(NULL, "Meuble design", "Double plateau PHOENIX Vous aimez passer des soirées en famille ou entre amis ? Le meuble TV double plateau PHOENIX bois et noir est fait pour vous ! Grâce à ses deux longs plateaux 116 cm épaisseur 15 mm en particules de bois mélaminé, vous pourrez passer de bonnes soirées devant un plateau TV ou autour d'un apéritif.", '89.99', 'petit_meuble.png', 1, 150, 'mobilier', 0);
INSERT INTO Articles VALUES(NULL, "Bibliothèque design", "Tablettes, montants et façades : panneaux dérivés de bois, panneau aggloméré mélaminé et/ou plaqué, épaisseur 19mm. Ferrures : accessoires et quincaillerie de première qualité. Caisson et tiroir : multiplex. Poignée : aluminium, option laque colorée. Option tablettes renforcées : celles de 37 cm de large peuvent supporter une charge maximale de 60 kg, celles de 73 cm de 40 kg. Les tablettes renforcées sont disponibles dans le configurateur.Profondeur: 35cm Hauteur: 195cm Largeur: 231cm ", 1100, 'bibliotheque.webp', 1, 200, 'mobilier', 0);
INSERT INTO Articles VALUES(NULL, "Canapé", "    Plus produit : Coffre de rangement, Canapé convertible Type d'angle : Réversible Dimensions du couchage : 140 x 200 cm Epaisseur du matelas : 8 cm ype de couchage : Occasionnel Densité de l'assise : 25 kg/m3 Matière du revêtement : Tissu Couleur(s) : Gris Made in Europe : Oui ", '619.49', 'canape.webp', 1, 200, 'mobilier', 0);
INSERT INTO Articles VALUES(NULL, "PC portable Asus", "
    Processeur AMD Ryzen 7 4800H (Octo-Core 2.9 GHz / 4.2 GHz Turbo - 16 Threads - Cache 8 Mo)
    16 Go de mémoire vive DDR4 3200 MHz (2x 8 Go - 2 slots - maximum 32 Go au total)
    Ecran de niveau IPS 17.3 avec résolution Full HD (1920 x 1080 pixels) et fréquence de 144 Hz
    Puce graphique NVIDIA GeForce RTX 3060 avec 6 Go de mémoire dédiée GDDR6
    SSD M.2 PCIe de 512 Go
    Communication sans fil performante : Wi-Fi 6 + Bluetooth 5.1
    Clavier gaming avec touches rétroéclairées RGB 4 zones
    Haut-parleurs intégrés 2 x 4W avec technologie Smart Amp
    PC portable fourni sans système d'exploitation
    Garantie constructeur 2 ans (enlèvement et retour sur site en France métropolitaine)
", 1999, 'pc_asus.webp', 3, 140, 'informatique', 0);
INSERT INTO Articles VALUES(NULL, "Samsung M3 Portable 1 To Disque dur - externe", " Samsung M3 Portable est conçu pour stocker en toute sécurité une grande capacité de photos, films, musique et autres données. ", 180, 'disque_dur.webp', 1, 45, 'informatique', 0);
INSERT INTO Articles VALUES(NULL, "Razer Basilisk V3 souris", "Créez, contrôlez et imposez votre propre style de jeu avec la Razer Basilisk V3, la souris gaming ergonomique pour des performances individuelles. Toutes les macros disponibles vous proposent de nombreuses possibilités", '79.99', 'souris.webp', 1, 100, 'informatique', 0);
INSERT INTO Articles VALUES(NULL, "Naruto", "Fonçant droit vers Obito devenu invulnérable en réceptacle de Jûbi, on voit ici Naruto - Fourth Great Ninja War Ikigai combiner son attaque Futon Rasen Shuriken avec l’Enton Kagutsuchi de son rival Sasuke, décidés à anéantir ensemble leur ennemi commun. Dans une pose ultra dynamique, il utilise le mode Chakra de Kyubi transcrit grâce aux symboles caractéristiques de sa tenue et sa silhouette flamboyant dans des nuances enflammées. De sa main droite, il prépare son attaque, étant la technique d’élément vent qu’il créa après avoir compris les principes du Fûton en fusionnant celui-ci avec son Rasengan. Le décor rocheux du socle nous transporte sur le champ de bataille de la 4ème Grande Guerre Ninja. ", '341.03', 'naruto.jpg', 3, 4, 'figurine', 0);
INSERT INTO Articles VALUES(NULL, "Saïtama", "Son entrainement 100 pompes, 100 abdos, 100 squats et 10 km de course a fait de lui l'homme le plus fort du monde, capable de vaincre tous ses ennemis en un coup de poing, mais a aussi rendu sa vie ennuyeuse à mourir. Devenu membre de l'association des Héros, il débarrasse le pays de ses monstres tout en cherchant un adversaire à sa taille.", '426.50', 'saitama.jpg', 3, 8, 'figurine', 0);
