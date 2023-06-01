<?php 

    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
    $result = $mysqli->query("SELECT * FROM produit WHERE ".$_GET['filtre']." = ".$_GET['value']."");
    $data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <title>Profil</title>
    <style>
        .popup {
            position: fixed;
            top: 10px; /* Ajustez ces valeurs selon votre besoin */
            right: 10px; /* Ajustez ces valeurs selon votre besoin */
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            display: none;
        }

        .popup img {
            width: 50px; /* Ajustez cette valeur selon votre besoin */
            height: 50px; /* Ajustez cette valeur selon votre besoin */
            margin-right: 10px;
            vertical-align: middle;
        }

        .popup h3, .popup p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
        <header>
            <?php include_once('navbar.php');?>
        </header>
    <hr>
    <body>
        <div class="product-container">
            <div class="product-image">
                
                <?php
                    echo "<img src='./assets/img/".$data["photo"]."'.>";
                ?>
            </div>
            <div class="product-details">
                <h1 class="product-name">
                    <?php
                        echo $data['nom'];
                    ?>

                </h1>
                <h2 class="product-price">
                    <?php
                        echo $data['prix'];
                    ?>
                </h2>
                <div class="product-size">
                    <label>Taille:</label>
                    <button class="size-button">XS</button>
                    <button class="size-button">S</button>
                    <button class="size-button">M</button>  
                    <button class="size-button">L</button>
                </div>
                <div class="add-to-cart">
                    <button id="addToCartButton">Ajouter au Panier</button>
                </div>
                <div class="product-description">
                    <button onclick="toggleContent('description')">Description</button>
                    <div class="product-description-content">
                        <?php

                            echo $data['description'];

                        ?>
                    </div>
                </div>
                <div class="product-service">
                    <button onclick="toggleContent('service')">Service</button>
                    <div class="product-service-content">
                        <p>EXPEDITION EN 24H
                            TOUTE COMMANDE PASSÉE AVANT 13H EST PRÉPARÉE ET EXPÉDIÉE DANS LA JOURNÉE. LES COMMANDES PASSÉES APRÈS 13H SONT TRAITÉES EN PRIORITÉ LE JOUR OUVRÉ SUIVANT.</p>
                        <br>
                        <p>LIVRAISON & RETOUR
                            LA LIVRAISON EN POINTS RETRAITS EST OFFERTE !</p>
                        <br>
                        <p>SHOPPEZ TRANQUILLE, RETOUR / ECHANGE SOUS 10 JOURS OFFERTS 
                            DANS LES 10 JOURS CALENDAIRES QUI SUIVENT LA DATE D'EXPÉDITION DE VOTRE COLIS, CITADIUM.COM ÉCHANGE OU REMBOURSE UN ARTICLE QUI NE VOUS DONNE PAS ENTIÈRE SATISFACTION.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup" class="popup"></div>

        <script>
            function toggleContent(content) {
                var contentElement = document.querySelector('.product-' + content + '-content');
                contentElement.classList.toggle('show');
            }

            var sizeButtons = document.querySelectorAll('.size-button');
            var addToCartButton = document.getElementById('addToCartButton');

            addToCartButton.addEventListener('click', function() {
                var selectedSize = document.querySelector('.size-button.selected');

                if (selectedSize) {
                    var productInfo = {
                        name: "Nom du produit",
                        description: "Description du produit",
                        size: selectedSize.innerText
                    };

                    var productImage = "https://tinyurl.com/32htxj6p";

                    var popupContent = '<img src="' + productImage + '" alt="Product Image" />';
                    popupContent += '<h3>' + productInfo.name + '</h3>';
                    popupContent += '<p>' + productInfo.description + '</p>';
                    popupContent += '<p>Taille : ' + productInfo.size + '</p>';

                    var popupDiv = document.getElementById('popup');
                    popupDiv.innerHTML = popupContent;
                    popupDiv.style.display = 'block';

                    setTimeout(function() {
                        popupDiv.innerHTML = '';
                        popupDiv.style.display = 'none';
                    }, 3000);
                } else {
                    alert("Veuillez choisir la taille du produit.");
                }
            });

            sizeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var isSelected = this.classList.contains('selected');

                    if (isSelected) {
                        this.classList.remove('selected');
                    } else {
                        sizeButtons.forEach(function(btn) {
                            btn.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    }
                });
            });
        </script>
    </body>
</html>
