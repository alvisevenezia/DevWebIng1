<?php
// Récupérer les données du formulaire
extract($_POST);
$nom = $_POST['nom'];
$type = $_POST['type'];
$marque = $_POST['marque'];
$taille = $_POST['taille'];
$stock = $_POST['quantite'];
$prix = $_POST['prix'];
$description = $_POST['description'];

// Traitement de l'image
$photo = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$photo_dest = './assets/img/' . $photo;
move_uploaded_file($photo_tmp, $photo_dest);

// Connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "projetweb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Préparer et exécuter la requête SQL pour insérer le produit dans la base de données
$sql = "INSERT INTO produit (nom, type, marque, taille, stock, prix, description, photo)
        VALUES ('$nom', '$type', '$marque', '$taille', '$stock', '$prix', '$description', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Le produit a été ajouté avec succès!";
} else {
    echo "Erreur lors de l'ajout du produit: " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>