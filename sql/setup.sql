CREATE TABLE `projetweb`.`personne` (
  `idPersonne` INT NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `dateNaissance` DATE NOT NULL,
  `codePostal` INT NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPersonne`),
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);

CREATE TABLE `projetweb`.`client` (
  `idClient` INT NOT NULL,
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
  `idvendeur` INT NOT NULL,
  `dateInscription` DATE NOT NULL,
  `idPersonne` INT NOT NULL,
  PRIMARY KEY (`idvendeur`),
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);
  
  CREATE TABLE `projetweb`.`produit` (
  `idproduit` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL,
  `prix` INT NOT NULL,
  `poid` INT NOT NULL,
  `idVendeur` INT NOT NULL,
  UNIQUE INDEX `idproduit_UNIQUE` (`idproduit` ASC) VISIBLE,
  PRIMARY KEY (`idproduit`));

CREATE TABLE `projetweb`.`panier` (
  `idpanier` INT NOT NULL,
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
  `idadminMarketPlace` INT NOT NULL,
  `idPersonne` INT NOT NULL,
  PRIMARY KEY (`idadminMarketPlace`),
  UNIQUE INDEX `idadminMarketPlace_UNIQUE` (`idadminMarketPlace` ASC) VISIBLE,
  UNIQUE INDEX `idPersonne_UNIQUE` (`idPersonne` ASC) VISIBLE);


