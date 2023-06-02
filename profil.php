<?php
    require "./php/sessionutils.php";

    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
    $result = $mysqli->query("SELECT * FROM commande WHERE idCLient = ".$_SESSION['idLogin']."");

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
                <h2 style="padding:20px 0px;">NOM PRENOM</h2>
              <hr>
                <h3 style="padding:20px 0px 20px 0px;">SUIVI DE COMMANDES</h3>
                <button class="valider2" onclick="toggleContent('commande-list')">VOIR MES COMMANDES</button>
                    <div class="commande-list">
                        <?php

                            if($result == false ||$result->num_rows == 0){
                                echo "<p>Vous n'avez pas encore passé de commande</p>";
                            }else{

                                //loop throw all the commands in $data
                                while($data = $result->fetch_assoc()){
                                    echo "<div class='commande'>";
                                    echo "<h4>Commande n°".$data['idCommande']."</h4>";
                                    echo "<p>Produit : ".$data['idProduit']."</p>";
                                    echo "<p>Quantité : ".$data['quantite']."</p>";
                                    echo "<p>Prix : ".$data['prix']."</p>";
                                    echo "<p>Date : ".$data['date']."</p>";
                                    echo "</div>";
                                    $data = $result->fetch_assoc();
                                }
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
                        <h4>Prénom</h4>
                        <input class="prenom" type="text" placeholder="Prénom..." name="prenom">
                    </div>
                    <div class="right-container">
                        <h4>Nom</h4>
                        <input class="nom" type="text" placeholder="Nom..." name="nom">
                    </div>
                </div>
                <div class="container">
                    <div class="left-container">
                        <h5>Email</h5>
                        <input class="email" type="text" placeholder="E-mail..." name="email">
                    </div>
                    <div class="right-container">
                        <h5>Date de naissance</h5>
                        <input class="email" id="date" type="date" value="Date de Naissance..." name="date">
                    </div>
                </div>
                <button class="valider2" type="submit">MODIFIER MES INFORMATIONS</button>
            </form>
            
        </div>
        

    </div>
    

    <script>
        function toggleContent(content) {
            var contentElement = document.querySelector(content);
            contentElement.classList.toggle('show');
        }
    </script>


</body>
</html>

