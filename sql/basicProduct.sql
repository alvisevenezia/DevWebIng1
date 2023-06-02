-- add product to product table
-- prodcut info are in the product table
-- add t-shirt

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (1,'t-shirt',10,20,200,1,'adidas','t-shirt-noir',40,'t-shirt de couleur noir adidas','t-shirt-noir-adidas.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (2,'t-shirt',10,20,200,1,'nike','t-shirt-blanc',40,'t-shirt de couleur blanc nike','t-shirt-blanc-nike.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (3,'t-shirt',10,20,200,1,'carhartt','t-shirt-rouge',40,'t-shirt de couleur rouge carhartt','t-shirt-rouge-carhartt.jpg');


-- insert pantalon

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (4,'pantalon',10,20,200,1,'adidas','pantalon-noir',40,'pantalon de couleur noir adidas','pantalon-noir-adidas.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (5,'pantalon',10,20,200,1,'carhartt','pantalon-blanc',40,'pantalon de couleur blanc carhartt','pantalon-blanc-carhartt.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (6,'pantalon',10,20,200,1,'nike','pantalon-rouge',40,'pantalon de couleur rouge nike','pantalon-rouge-nike.jpg');

-- insert pull

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (7,'pull',10,20,200,1,'carhartt','pull-noir',40,'pull de couleur noir carhartt','pull-noir-carhartt.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (8,'pull',10,20,200,1,'nike','pull-blanc',40,'pull de couleur blanc nike','pull-blanc-nike.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (9,'pull',10,20,200,1,'adidas','pull-rouge',40,'pull de couleur rouge adidas','pull-rouge-adidas.jpg');

-- insert hat but none of carhartt

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (10,'hat',10,20,200,1,'nike','hat-noir',40,'hat de couleur noir nike','hat-noir-nike.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (11,'hat',10,20,200,1,'adidas','hat-blanc',40,'hat de couleur blanc adidas','hat-blanc-adidas.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (12,'hat',10,20,200,1,'nike','hat-rouge',40,'hat de couleur rouge nike','hat-rouge-nike.jpg');

-- insert ring 

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (13,'ring',10,20,200,1,'adidas','ring-noir',40,'ring de couleur noir adidas','ring-noir-adidas.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (14,'ring',10,20,200,1,'nike','ring-blanc',40,'ring de couleur blanc nike','ring-blanc-nike.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (15,'ring',10,20,200,1,'carhartt','ring-rouge',40,'ring de couleur rouge carhartt','ring-rouge-carhartt.jpg');

-- insert socks

INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (16,'socks',10,20,200,1,'adidas','socks-noir',40,'socks de couleur noir adidas','socks-noir-adidas.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (17,'socks',10,20,200,1,'nike','socks-blanc',40,'socks de couleur blanc nike','socks-blanc-nike.jpg');
INSERT INTO produit(idProduit,type,stock,prix,poid,idVendeur,marque,nom,taille,description,photo) VALUES (18,'socks',10,20,200,1,'carhartt','socks-rouge',40,'socks de couleur rouge carhartt','socks-rouge-carhartt.jpg');

INSERT INTO livreur (nom, prenom, email, mot_de_passe, permis)
VALUES 
  ('JAN', 'Sara', 'sarajan@gmail.com', 'test2023', 'B'),
  ('TERCHANI', 'Loucas', 'loucasterchani@gmail.com', 'test2023', 'C');

INSERT INTO colis (id, idLivreur, taille, poids, adresse, date_de_livraison, statut)
VALUES ('12345AVGTF', 1, 'Petit', '1', '22 avenue des lilas', '06-06-23', 'En-cours'),
       ('45678KLOHP', 1, 'Moyen', '2', '56 rue de la mort', curdate(), 'Arrive');

-- create admin login

INSERT INTO login(idLogin,mdp) VALUES ('wantoine@outlook.fr','test2023');
INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse,sexe) VALUES ('Antoine','WARLET','23/10/2002','95430','Auvers','21 rue de pontoise','0');
INSERT INTO client(dateInscription,dateConnection,idPersonne,idLogin) VALUES ('0','0','1','wantoine@outlook.fr');