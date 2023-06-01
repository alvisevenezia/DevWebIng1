<?php

require "sessionutils.php";

$nom = null;
$prenom = null;
$date = null;
$email = null;
$siret = null;

if(isset($_POST['nom'])){

    $nom = $_POST['nom'];

}

if(isset($_POST['prenom'])){

    $prenom = $_POST['prenom'];

}

if(isset($_POST['date'])){

    $date = $_POST['date'];

}

if(isset($_POST['email'])){

    $email = $_POST['email'];

}

if(isset($_POST['siret'])){

    $siret = $_POST['siret'];

}

$idLogin = $_SESSION["idLogin"];

$mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

if($_SESSION["client"] == "true"){
  
    //get the idPersone from the client table
    $result = $mysqli->query("SELECT idPersonne FROM client WHERE idLogin = '$idLogin'");

    //use this idPersonne to update the personne table

    $idPersonne = $result->fetch_assoc()["idPersonne"];

    if($nom != null){

        $mysqli->query("UPDATE personne SET nom = '$nom' WHERE idPersonne = '$idPersonne'");

    }

    if($prenom != null){

        $mysqli->query("UPDATE personne SET prenom = '$prenom' WHERE idPersonne = '$idPersonne'");

    }

    if($date != null){

        $mysqli->query("UPDATE personne SET dateNaissance = '$date' WHERE idPersonne = '$idPersonne'");

    }

    if($email != null){

        $mysqli->query("UPDATE client SET idLogin = '$email' WHERE idPersonne = '$idPersonne'");
        $mysqli->query("UPDATE login SET idLogin = '$email' WHERE idLogin = '$idLogin'");
        $_SESSION["idLogin"] = $email;

    }

}else{

    //update the vendor table base on input of the form and the idLogin of the session

    print("vendeur");
    $login = $_SESSION["idLogin"];

    if($nom != null){

        $mysqli->query("UPDATE vendeur SET nomSociete = '$nom' WHERE idLogin = '$login'");
        print("nom");

    }

    if($prenom != null){

        $mysqli->query("UPDATE vendeur SET siret = '$siret' WHERE idLogin = '$login'");
        print("prenom");
    }

    if($date != null){

        $mysqli->query("UPDATE vendeur SET dateCreation = '$date' WHERE idLogin = '$login'");
        print("date");
    }

    if($email != null){

        $mysqli->query("UPDATE vendeur SET idLogin = '$email' WHERE idLogin = '$login'");
        $mysqli->query("UPDATE login SET idLogin = '$email' WHERE idLogin = '$login'");
        $_SESSION["idLogin"] = $email;
        print("email");

    }
}

header('Location: ../index.php');