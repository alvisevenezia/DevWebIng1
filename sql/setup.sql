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
  `idSession` INT NOT NULL,
  `dateInscription` DATE NOT NULL,
  `dateConnection` DATE NOT NULL,
  `idPanier` INT NOT NULL,
  `idPersonne` INT NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE INDEX `idSession_UNIQUE` (`idSession` ASC) VISIBLE,
  UNIQUE INDEX `idPanier_UNIQUE` (`idPanier` ASC) VISIBLE,
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);
  
  CREATE TABLE `projetweb`.`vendeur` (
  `idVendeur` INT NOT NULL AUTO_INCREMENT,
  `dateInscription` DATE NOT NULL,
  `idPersonne` INT NOT NULL,
  `chiffreAffaire` INT NOT NULL,
  `comission` INT NOT NULL, 
  `nomSociete` VARCHAR(45) NOT NULL,
  `siret` INT NOT NULL,
  `telephone` INT NOT NULL, 
  `pays` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idVendeur`),
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);
  
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

CREATE TABLE `projetweb`.`livreur` (
  `idlivreur` INT NOT NULL,
  `idLivraison` VARCHAR(45) NOT NULL,
  `idPersonne` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlivreur`),
  UNIQUE INDEX `idLivraison_UNIQUE` (`idLivraison` ASC) VISIBLE,
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);

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



