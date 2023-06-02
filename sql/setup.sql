DROP TABLE IF exists adminmarketplace;
DROP TABLE IF exists livreur;
DROP TABLE IF exists panier;
DROP TABLE IF exists produit;
DROP TABLE IF exists vendeur;
DROP TABLE IF exists client;
DROP TABLE IF exists personne;
DROP TABLE IF exists login;
DROP TABLE IF EXISTS livreur;
DROP TABLE IF EXISTS colis;
DROP TABLE IF EXISTS commandes;

CREATE TABLE `projetweb`.`personne` (
  `idPersonne` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `dateNaissance` DATE NOT NULL,
  `codePostal` INT NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(45) NOT NULL,
  `sexe` INT NOT NULL,
  PRIMARY KEY (`idPersonne`),
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);

CREATE TABLE `projetweb`.`client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `dateInscription` DATE NOT NULL,
  `dateConnection` DATE NOT NULL,
  `idPersonne` INT NOT NULL,
  `idLogin` VARCHAR(45) NOT NULL UNIQUE, 
  PRIMARY KEY (`idClient`),
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);

  CREATE TABLE `projetweb`.`vendeur` (
  `idVendeur` INT NOT NULL AUTO_INCREMENT,
  `dateInscription` DATE NOT NULL,
  `chiffreAffaire` INT NOT NULL,
  `comission` INT NOT NULL, 
  `nomSociete` VARCHAR(45) NOT NULL,
  `siret` INT NOT NULL,
  `telephone` INT NOT NULL, 
  `pays` VARCHAR(45) NOT NULL,
  `idLogin` VARCHAR(45) NOT NULL UNIQUE,
  `dureeContrat` INT NOT NULL,
  PRIMARY KEY (`idVendeur`));
  
  CREATE TABLE `projetweb`.`produit` (
  `idproduit` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL,
  `prix` INT NOT NULL,
  `poid` INT NOT NULL,
  `idVendeur` INT NOT NULL,
  `marque` VARCHAR(45) NOT NULL,
  `type` VARCHAR(45),
  `taille` INT NOT NULL,
  `description` VARCHAR(45),
  `photo` VARCHAR(45),
  UNIQUE INDEX `idproduit_UNIQUE` (`idproduit` ASC) VISIBLE,
  PRIMARY KEY (`idproduit`));

CREATE TABLE `projetweb`.`panier` (
  `idpanier` INT NOT NULL AUTO_INCREMENT,
  `idListeProduit` INT NOT NULL,
  PRIMARY KEY (`idpanier`),
  UNIQUE INDEX `idListeProduit_UNIQUE` (`idListeProduit` ASC) VISIBLE);

CREATE TABLE `projetweb`.`adminmarketplace` (
  `idadminMarketPlace` INT NOT NULL AUTO_INCREMENT,
  `idPersonne` INT NOT NULL,
  PRIMARY KEY (`idadminMarketPlace`),
  UNIQUE INDEX `idadminMarketPlace_UNIQUE` (`idadminMarketPlace` ASC) VISIBLE,
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);
  
CREATE TABLE `projetweb`.`login` (
`idlogin` VARCHAR(45) NOT NULL,
`mdp` VARCHAR(45) NOT NULL,
PRIMARY KEY (`idlogin`),
UNIQUE INDEX `idlogin_UNIQUE` (`idlogin` ASC) VISIBLE);

CREATE TABLE `projetweb`.`commandes` (
  `idCommande` INT NOT NULL,
  `idClient` INT NOT NULL
);

CREATE TABLE `projetweb`.livreur (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  mot_de_passe VARCHAR(100) NOT NULL,
  permis VARCHAR(50) NOT NULL
);

CREATE TABLE `projetweb`.colis (
  id VARCHAR(10) PRIMARY KEY,
  idLivreur INT NOT NULL,
  taille VARCHAR(100) NOT NULL,
  poids VARCHAR(100) NOT NULL,
  adresse VARCHAR(100) NOT NULL,
  date_de_livraison VARCHAR(100) NOT NULL,
  statut VARCHAR(100) NOT NULL,
  FOREIGN KEY (idLivreur) REFERENCES livreur(id)
);

DROP TABLE IF exists ventes;

CREATE TABLE `projetweb`.ventes(
  id INT PRIMARY KEY AUTO_INCREMENT,
  idProduit INT NOT NULL,
  idClient INT NOT NULL,
  idVendeur INT NOT NULL,
  quantite INT NOT NULL,
  idCommande INT NOT NULL
);


