<?php

$nom = $_POST['nom'];
$siret = $_POST['siret'];
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pays = $_POST['pays'];
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
$result = $mysqli->query("INSERT INTO vendeur(dateInscription,idPersonne,chiffreAffaire,commission,nomSociete,siret,telephone,pays) VALUES ('$date','$email',0,0,'$nom','$siret','$tel','France')");

$_SESSION["logged"] = "true";

header('Location: ../index.php');