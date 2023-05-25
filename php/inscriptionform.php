<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$adresse = "0";
$codePostal = "0";
$ville = "0";

if($_POST["checkHomme"] = "on"){
  $sexe = "Homme";
  $sexesql = 0;
}
else{
  $sexe = "Femme";
  $sexesql = 1;
}


$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
$result = $mysqli->query("INSERT INTO login(idLogin,mdp) VALUES ('$email','$password')");
$result = $mysqli->query("INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse,sexe) VALUES ('$prenom','$nom','$date','$codePostal','$ville','$adresse','$sexesql')");

$_SESSION["logged"] = "true";

if($_SESSION["sexe"] == "Homme"){
 header('Location: ../homme.php');
}
else{
  header('Location: ../femme.php');
}