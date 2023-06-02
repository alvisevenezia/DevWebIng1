-- add 10 colis with random ID and adresse to colis table and in command and 3 livreur to livreur table

INSERT INTO colis (id, idLivreur, taille, poids, adresse, date_de_livraison, statut) VALUES 
    ('UYUFMCPD', 0, 'Petit', '1', '92 boulevard Aristide Briand', '06-06-23', 'En-cours'),
    ('EDFEYOZ6', 0, 'Moyen', '2', '39 Rue du Palais', '2023-06-02', 'Arrive'),
    ('ZWYTE3WM', 0, 'Petit', '1', '78 rue des Lacs', '06-06-23', 'En-cours'),
    ('CCVOWP66', 0, 'Moyen', '2', '78 rue des Lacs', '2023-06-02', 'Arrive'),
    ('PQ9WOSYW', 0, 'Petit', '1', '88 rue de Penthièvre', '06-06-23', 'En-cours'),
    ('UKW6LZU8', 0, 'Moyen', '2', '53 rue Isambard', '2023-06-02', 'Arrive'),
    ('65AQSPXV', 0, 'Petit', '1', '93 rue Grande Fusterie', '06-06-23', 'En-cours'),
    ('NGC386OD', 0, 'Moyen', '2', '20 rue de Lille', '2023-06-02', 'Arrive'),
    ('8D4PN5K0', 0, 'Petit', '1', '7 rue Reine Elisabeth', '06-06-23', 'En-cours'),
    ('BCSWV0VN', 0, 'Moyen', '2', '59 Faubourg Saint Honoré', '2023-06-02', 'En-cours'),
    ('RQ9P1YWL', 0, 'Petit', '1', '3 Avenue de la République', '2023-06-02', 'En-cours'),
    ('U0T1K7ZP', 0, 'Moyen', '2', '9 Rue du Commerce', '2023-06-02', 'En-cours'),
    ('V5X6J2MN', 0, 'Petit', '1', '21 Rue de la Paix', '2023-06-02', 'En-cours'),
    ('S3K9I8BH', 0, 'Moyen', '2', '12 Avenue des Ternes', '2023-06-02', 'En-cours'),
    ('L7M4N1JP', 0, 'Petit', '1', '2 Boulevard Saint-Germain', '2023-06-02', 'En-cours'),
    ('P8O2R6TQ', 0, 'Moyen', '2', '15 Rue du Faubourg Saint-Antoine', '2023-06-02', 'En-cours'),
    ('N6A1F4VK', 0, 'Petit', '1', '11 Avenue de l Opéra', '2023-06-02', 'En-cours'),
    ('T9L2V5UJ', 0, 'Moyen', '2', '18 Rue de Passy', '2023-06-02', 'En-cours'),
    ('W4Z7Y1XK', 0, 'Petit', '1', '7 Avenue Montaigne', '2023-06-02', 'En-cours'),
    ('Q1R6T9MJ', 0, 'Moyen', '2', '13 Rue de la République', '2023-06-02', 'En-cours'),
    ('X8Z3W6OI', 0, 'Petit', '1', '4 Rue du Faubourg Saint-Honoré', '2023-06-02', 'En-cours'),
    ('K2U7V4SX', 0, 'Moyen', '2', '10 Avenue Montaigne', '2023-06-02', 'En-cours'),
    ('A5B2C7DQ', 0, 'Petit', '1', '20 Avenue George V', '2023-06-02', 'En-cours'),
    ('M3N6B9VC', 0, 'Moyen', '2', '16 Rue de Rivoli', '2023-06-02', 'En-cours'),
    ('E8R1T4KJ', 0, 'Petit', '1', '8 Place de la Concorde', '2023-06-02', 'En-cours'),
    ('C7X2Z9YH', 0, 'Moyen', '2', '17 Rue de la Paix', '2023-06-02', 'En-cours'),
    ('H4G9F6QA', 0, 'Petit', '1', '5 Avenue des Champs-Élysées', '2023-06-02', 'En-cours'),
    ('B1D6C9XE', 0, 'Moyen', '2', '11 Rue du Faubourg Saint-Honoré', '2023-06-02', 'En-cours'),
    ('J7K4L2ZG', 0, 'Petit', '1', '6 Rue Royale', '2023-06-02', 'En-cours'),
    ('G2P5H9ON', 0, 'Moyen', '2', '14 Avenue de Friedland', '2023-06-02', 'En-cours'),
    ('Y5T1R4CE', 0, 'Petit', '1', '9 Boulevard Haussmann', '2023-06-02', 'En-cours'),
    ('F8J3V6SK', 0, 'Moyen', '2', '12 Rue de la Liberté', '2023-06-02', 'En-cours'),
    ('Z6W1Q4DM', 0, 'Petit', '1', '7 Place de la Madeleine', '2023-06-02', 'En-cours'),
    ('O3N6B9VX', 0, 'Moyen', '2', '8 Rue du Faubourg Saint-Antoine', '2023-06-02', 'En-cours'),
    ('I7K4L2ZP', 0, 'Petit', '1', '13 Rue du Bac', '2023-06-02', 'En-cours');

-- add the 10 command to command table

INSERT INTO commandes (idCommande, idClient) VALUES 
    ('UYUFMCP', 1), 
    ('EDFEYOZ6', 1),
    ('ZWYTE3WM', 2),
    ('CCVOWP66', 2),
    ('PQ9WOSYW', 3),
    ('UKW6LZU8', 3),
    ('65AQSPXV', 1),
    ('NGC386OD', 1),
    ('8D4PN5K0', 2),
    ('BCSWV0VN', 2),
    ('RQ9P1YWL', 3),
    ('U0T1K7ZP', 3),
    ('V5X6J2MN', 1),
    ('S3K9I8BH', 1),
    ('L7M4N1JP', 2),
    ('P8O2R6TQ', 2),
    ('N6A1F4VK', 1),
    ('T9L2V5UJ', 1),
    ('W4Z7Y1XK', 2),
    ('Q1R6T9MJ', 2),
    ('X8Z3W6OI', 3),
    ('K2U7V4SX', 3),
    ('A5B2C7DQ', 1),
    ('M3N6B9VC', 1),
    ('E8R1T4KJ', 2),
    ('C7X2Z9YH', 2),
    ('H4G9F6QA', 3),
    ('B1D6C9XE', 3),
    ('J7K4L2ZG', 1),
    ('G2P5H9ON', 1),
    ('Y5T1R4CE', 2),
    ('F8J3V6SK', 2),
    ('Z6W1Q4DM', 3),
    ('O3N6B9VX', 3),
    ('I7K4L2ZP', 1);

-- add 3 livreur to livreur table

INSERT INTO livreur (nom, prenom, email, mot_de_passe, permis) VALUES
  ('Jean', 'Dupont', 'jean.dupont@example.com', 'motdepasse1', 'A'),
  ('Marie', 'Martin', 'marie.martin@example.com', 'motdepasse2', 'B'),
  ('Pierre', 'Lefebvre', 'pierre.lefebvre@example.com', 'motdepasse3', 'C');









