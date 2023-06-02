<?php

//Save the basket in a file named after the userID in the folder ../paniers/
//If the file already exists, it is overwritten

require "sessionutils.php";


function genererNumeroCommande() {
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Chiffres et lettres possibles pour le numéro de commande
    $longueur = 10; // Longueur du numéro de commande

    $numeroCommande = '';

    // Générer le numéro de commande en choisissant aléatoirement les caractères
    for ($i = 0; $i < $longueur; $i++) {
        $indexAleatoire = mt_rand(0, strlen($caracteres) - 1);
        $caractereAleatoire = $caracteres[$indexAleatoire];
        $numeroCommande .= $caractereAleatoire;
    }

    return $numeroCommande;

}   

if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "true"){

    $commandeID = genererNumeroCommande();

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

    foreach($json as $item){

        $mysqli->query("UPDATE produit SET stock = stock - ".$item["quantity"]." WHERE idProduit = ".$item["id"]."");
        $mysqli->query("INSERT INTO ventes(idProduit, idClient, idVendeur, idCommande, quantite) VALUES (".$item["id"].", ".$idClient.", ".$item["vendeur"].", ".$commandeID.", ".$item["quantity"].")");
    
    }

    //add the colis to the database
    $taille = count($json);

    //set if taille is petit, moyen or grand
    if($taille < 1){
        $taille = "petit";

    }else if($taille < 5){
        $taille = "moyen";

    }else{
        $taille = "grand";
    }

    //compute the total weight of the order
    $poids = 0;

    foreach($json as $item){
        $poids += $item["quantity"]*$mysqli->query("SELECT poid FROM produit WHERE idProduit = ".$item["id"]."")->fetch_assoc()["poid"];
    }

    $poids = $poids/1000;

    //set the date of delivery to 3 days after the order
    $date = date('Y-m-d', strtotime("+3 days"));

    $mysqli->query("INSERT INTO colis (id, idLivreur,taille ,poids,adresse,date_de_livraison,statut) VALUES ('$commandeID', 0, '$taille', $poids, '".$_POST["adresse"]."', $date, 'en attente')");
    print_r($mysqli->error);

    echo $commandeID;   
}

