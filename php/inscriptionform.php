<?php

require "sessionutils.php";

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

$dateInscription = time();

$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

$result = mysqli_query($mysqli,"SELECT * FROM login WHERE idLogin = '$email'");

if(mysqli_num_rows($result) > 0){
  header('Location: ../index.php');
  exit();
}

$mysqli->query("INSERT INTO login(idLogin,mdp) VALUES ('$email','$password')");
$mysqli->query("INSERT INTO personne(prenom,nom,dateNaissance,codePostal,ville,adresse,sexe) VALUES ('$prenom','$nom','$date','$codePostal','$ville','$adresse','$sexesql')");
$result = $mysqli->query("SELECT idPersonne FROM personne WHERE prenom = '$prenom' and nom = '$nom' and dateNaissance = '$date'");
$idPersonne = $result->fetch_assoc()["idPersonne"];
$result = $mysqli->query("INSERT INTO client(dateInscription,dateConnection,idPersonne,idLogin) VALUES ('$dateInscription','$dateInscription','$idPersonne','$email')");

print_r($mysqli->error_list);

$_SESSION["logged"] = "true";
$_SESSION["client"] = "true";
$_SESSION["sexe"] = $sexe;
$_SESSION["idLogin"] = $email;

header('Location: ../index.php');