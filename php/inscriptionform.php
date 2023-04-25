<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];

if($_POST["checkHomme"] = "on"){
  $sexe = "Homme";
}
else{
  $sexe = "Femme";
}


$mysqli = new mysqli("localhost", "web", "web", "projetweb");

$result = $mysqli->query("INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse) VALUES ('$prenom','$nom','$date','0000','0','0')");
