<?php

//Save the basket in a file named after the userID in the folder ../paniers/
//If the file already exists, it is overwritten

require "sessionutils.php";

if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "true"){

    $commandeID = rand(0, 999999);

    //check if this commadn id already exist in bdb
    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
    $result = $mysqli->query("SELECT * FROM commandes WHERE idCommande = '$commandeID'");

    while($result->num_rows > 0){

        $commandeID = rand(0, 999999);
        $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
        $result = $mysqli->query("SELECT * FROM commandes WHERE idCommande = '$commandeID'");
    }

    $res = $mysqli->query("SELECT idClient FROM client WHERE idLogin = '".$_SESSION["idLogin"]."'");
    $idClient = $res->fetch_assoc()["idClient"];
    $mysqli->query("INSERT INTO commandes (idCommande, idClient) VALUES ('$commandeID', '".$idClient."')");

    $basket = $_POST["basket"];

    $file = fopen("../commandes/$commandeID.json", "w");
    fwrite($file, $basket);
    fclose($file);

    //parse the json object

    $json = json_decode($basket, true);

    print(sizeof($json));

    foreach($json as $item){

        $mysqli->query("UPDATE produit SET stock = stock - ".$item["quantity"]." WHERE idProduit = ".$item["id"]."");
        $mysqli->query("INSERT INTO ventes(idProduit, idClient, idVendeur, idCommande, quantite) VALUES (".$item["id"].", ".$idClient.", ".$item["vendeur"].", ".$commandeID.", ".$item["quantity"].")");
        echo $mysqli->error;
    
    }


    echo $commandeID;   
}

