<?php

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

$result = $mysqli->query("SELECT MDP FROM login WHERE idLogin = '$login'");

$row = $result->fetch_assoc();
echo $row["MDP"];

if($row["MDP"] == $password){

    $_SESSION["logged"] = "true";
    echo $_SESSION["logged"];
    $sexe = $mysqli->query("SELECT sexe FROM personne WHERE idLogin = '$login'");

    if($sexe == 0){
        $sexe = "femme";
    }
    else{
        $sexe = "homme";
    }

    $_SESSION["sexe"] = $sexe;
    

}else{

    $_SESSION["logged"] = "false";

}

header('Location: ../index.php');
