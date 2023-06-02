<?php
    require "./php/sessionutils.php";

    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
    $res = $mysqli->query("SELECT idClient FROM client WHERE idLogin = '".$_SESSION["idLogin"]."'");
    $idClient = $res->fetch_assoc()["idClient"];
    $result = $mysqli->query("SELECT * FROM commandes WHERE idClient = ".$idClient."");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" type="text/css" title="Mon design 1" rel="stylesheet">
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

                                //loop through all the rows returned by the query
                                while($row = $result->fetch_assoc()){
                                    echo "<div class='commande'>";
                                    echo "<p>Commande n°".$row["idCommande"]."</p>";
                                    
                                    //open file containing the order details
                                    $file = fopen("./commandes/".$row["idCommande"].".json", "r");

                                    //parse the json file
                                    $json = json_decode(fread($file, filesize("./commandes/".$row["idCommande"].".json")), true);

                                    //loop through all the items in the order
                                    foreach($json as $item){
                                        echo "<div class='flex-center' >";
                                        echo "<img src='./assets/img/".$item["img"]."' alt='image' width='100px' height='100px'>";
                                        echo "<p>".$item["name"]."</p>";
                                        echo "<p>".$item["price"]."€</p>";
                                        echo "<p>Quantité : ".$item["quantity"]."</p>";
                                        echo "</div>";
                                        echo "<hr>";
                                    }

                                    echo "<br>";
                                    echo "</div>";
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

