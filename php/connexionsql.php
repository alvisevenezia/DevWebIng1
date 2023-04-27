<?php

$login = $_POST['login'];
$password = $_POST['password'];

$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

$result = $mysqli->query("SELECT * FROM login WHERE idLogin = '$login' AND mdp = '$password'");

if($result->num_rows == 1){

    $_COOKIE["logged"] = "true";
    $sexe = $mysqli->query("SELECT sexe FROM personne WHERE idLogin = '$login'");

    if($sexe == 0){
        $sexe = "Homme";
    }
    else{
        $sexe = "Femme";
    }

    $_COOKIE["sexe"] = $sexe;
    

}else{

    $_COOKIE["logged"] = "false";

}

header('Location: ../index.php');