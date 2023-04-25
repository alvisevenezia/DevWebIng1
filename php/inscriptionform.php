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
}
else{
  $sexe = "Femme";
}


$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

echo $mysqli->host_info . "\n";
$result = $mysqli->query("INSERT INTO login(idLogin,mdp) VALUES ('$email','$password')");
$result = $mysqli->query("INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse) VALUES ('$prenom','$nom','$date','$codePostal','$ville','$adresse')");

if(!in_array("sexe",$_COOKIE)){
  setcookie("sexe", "Homme", time() + 3600);
}

if($_COOKIE["sexe"] == "Homme"){
 header('Location: ../homme.php');
}
else{
  header('Location: ../femme.php');
}