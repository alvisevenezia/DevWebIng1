<?php

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

$result = $mysqli->query("SELECT MDP FROM login WHERE idLogin = '$login'");

$row = $result->fetch_assoc();
if($row["MDP"] == $password){

    $_SESSION["logged"] = "true";

    //get idPersonne on client table
    $res = $mysqli->query("SELECT idPersonne FROM client WHERE idLogin = '$login'");
    $idPersonne = $res->fetch_assoc()["idClient"];

    $sexe = $mysqli->query("SELECT sexe FROM personne WHERE idPersonne = '$idPersonne'");
    $res = $mysqli->query("SELECT * FROM vendeur WHERE idLogin = '$login'");


    if(mysqli_num_rows($res) > 0){
        $_SESSION["client"] = "false";
    }else{
        $_SESSION["client"] = "true";
    }

    if($sexe == 0){
        $sexe = "femme";
    }
    else{
        $sexe = "homme";
    }

    $_SESSION["sexe"] = $sexe;
    $_SESSION["idLogin"] = "$login";  
    

}else{

    $_SESSION["logged"] = "false";

}

header('Location: ../index.php');
