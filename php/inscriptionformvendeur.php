<?php

$nom = $_POST['nom'];
$siret = $_POST['siret'];
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pays = $_POST['pays'];

$duree = 0;
$comission = 0;

if($_POST["check3"] = "on"){
  $duree = 3;
  $comission = 5;
}else if($_POST["check1"] = "on"){
  $duree = 1;
  $comission = 10;
}
else{
  $duree = 6;
  $comission = 2; 
}

if($_POST["check2"] = "on"){
  $sexe = "Homme";
  $sexesql = 0;
}
else{
  $sexe = "Femme";
  $sexesql = 1;
}


$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
$result = mysqli_query($mysqli,"SELECT * FROM login WHERE idLogin = '$email'");

if(mysqli_num_rows($result) > 0){
  header('Location: ../index.php');
  exit();
}

$result = $mysqli->query("INSERT INTO login(idLogin,mdp) VALUES ('$email','$password')");
$result = $mysqli->query("INSERT INTO vendeur(dateInscription,chiffreAffaire,comission,dureeContrat,nomSociete,siret,telephone,pays,idLogin) VALUES ('$date',0,$comission,$duree,'$nom','$siret','$tel','$pays','$email')");

$_SESSION["logged"] = "true";
$_SESSION["client"] = "false";
$_SESSION["idLogin"] = $email;

header('Location: ../index.php');