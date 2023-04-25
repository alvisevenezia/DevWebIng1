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


$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

echo $mysqli->host_info . "\n";

$result = $mysqli->query("INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse) VALUES ('$prenom','$nom','$date','0000','0','0')");
