<?php require "./php/sessionutils.php"; 
    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
    $res = $mysqli->query("SELECT idVendeur FROM vendeur WHERE idLogin = '".$_SESSION["idLogin"]."'");
    $idVendeur = $res->fetch_assoc()["idVendeur"];
    $result = $mysqli->query("SELECT * FROM ventes GROUP BY idProduit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Profil</title>
</head>
<body>
    <header> 
        <?php include_once('navbar.php');?>
    </header>
    <hr>

    <div class="compte">
        <h1 class="titre_compte">PROFIL</h1>
        <div class="information-perso">
            <h2 style="padding:20px 0px;"><?php echo $mysqli->query("SELECT nomSociete FROM vendeur WHERE idVendeur = ".$idVendeur."")->fetch_assoc()["nomSociete"];?></h2>
            <hr>
            <div class="produits">
            
                <?php


                    //get all the products sold by the seller
                    $res = $mysqli->query("SELECT * FROM produit WHERE idVendeur = ".$idVendeur."");

                    //loop through all the rows returned by the query and display them
                    while($row = $res->fetch_assoc()){
                        echo "<div class='produit'>";
                        echo "<img src='./assets/img/".$row["photo"]."' alt='image' width='100px' height='100px'>";
                        echo "<h4>".$row["nom"]."</h4>";
                        echo "<p>Prix de vente : ".$row["prix"]."€</p>";
                        echo "<p>Quantité en stock : ".$row["stock"]."</p>";
                        echo "<hr>";
                        echo "</div>";
                    }

                ?>
            
            </div>
           
            <button class="valider2" type="button">HISTORIQUE DE MES VENTES</button>
            <div class="historique-produits">

        </div>


        <div class="historique-produits">

            <?php

                if($result == false ||$result->num_rows == 0){
                    echo "<p>Vous n'avez rien encore vendu</p>";
                }else{

                    //loop through all the rows returned by the query and display them
                    
                    $total = 0;

                    echo "<div class='produit-container'>";

                    while($row = $result->fetch_assoc()){

                        $data = $mysqli->query("SELECT * FROM produit WHERE idProduit = ".$row["idProduit"]."")->fetch_assoc();
                        
                        echo "<div class='produit'>";
                        echo "<img src='./assets/img/".$data["photo"]."'.>";
                        echo "<h4>".$data["nom"]."</h4>";
                        echo "<p>Prix de vente : ".$data["prix"]."€</p>";
                        echo "<p> Quantité vendue : ".$row["quantite"]."</p>";
                        echo "<p> Solde : ".$data["prix"]*$row["quantite"]."€</p>";  
                        $total += $data["prix"]*$row["quantite"];
                        echo "</div>";
                        echo "<hr>";
                        

                    }

                    if($_SESSION["idLogin"] == "admin"){

                         //compute the amout taken by the marketplace on all the sales

                        $comission = 0;

                        //get all sales
                        $res = $mysqli->query("SELECT * FROM ventes");

                        //loop through all the rows returned by the query and compute the total amount taken by the marketplace
                        while($row = $res->fetch_assoc()){
                            $data = $mysqli->query("SELECT * FROM produit WHERE idProduit = ".$row["idProduit"]."")->fetch_assoc();
                            $comission += $data["prix"]*$row["quantite"]*($mysqli->query("SELECT comission FROM vendeur WHERE idVendeur = ".$idVendeur."")->fetch_assoc()["comission"])/100;
                        }

                        echo "<p>Montant total des ventes: ".$total."€</p>";
                        echo "<p>Montant total de la commission : ".$comission."€</p>";
                        echo "<p>Montant total : ".($total+$comission)."€</p>";


                    }else{

                        $total = $total*(1-($mysqli->query("SELECT comission FROM vendeur WHERE idVendeur = ".$idVendeur."")->fetch_assoc()["comission"])/100);
                   
                    //print total amount and ivide it by the comission 

                    echo "<p> Montant total : ".$total."€</p>";
                    echo "<p>Montant reçu apres commission : ".$total*(1-($mysqli->query("SELECT comission FROM vendeur WHERE idVendeur = ".$idVendeur."")->fetch_assoc()["comission"])/100)."€</p>";
                    
                }
                    echo "</div>";

                }

            ?>
            </div>
          </div>
          
           
        <div class="identité">
            <hr>
            <h3 style="padding:20px 0px">INFORMATIONS PERSONNELLES </h3>
            <form action="./php/changeInfo.php" method="post">
                <div class="container">
                    <div class="left-container">
                        <h4>Nom société</h4>
                        <input class="prenom" type="text" placeholder="Nom société" name="nom">
                    </div>
                    <div class="right-container">
                        <h4>Siret</h4>
                        <input class="nom" type="text" placeholder="Siret" name="siret">
                    </div>
                </div>
                <div class="container">
                    <div class="left-container">
                        <h5>Email</h5>
                        <input class="email" type="text" placeholder="E-mail..." name="email">
                    </div>
                    <div class="right-container">
                        <h5>Date de Création</h5>
                        <input class="email" id="date" type="date" value="Date de Création" name="date">
                    </div>
                </div>
                <button class="valider2" type="submit">MODIFIER MES INFORMATIONS</button>
            </form>
            
        </div>
            </br>
        
       
    </div>

    <script>
        function toggleContent(content) {
            var contentElement = document.querySelector('.product-' + content + '-content');
            contentElement.classList.toggle('show');
        }
    </script>
</body>
</html>
