<?php
require "./php/sessionutils.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Homme</title>

    <script src="js/login.js"></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <div></div>
                <li class="border"><a href="femme.php">FEMME</a></li>
                <li style="border: 1px solid;"><a href="homme.php">HOMME</a></li>
                <li class="titre">VEPRI</li>
                <li class="logo">\V</li>
                <li class="border"><a href="panier.php">Panier</a></li>

                <?php

                if($_SESSION["logged"] == "true"){
                    echo "<li class='border'><a href='./php/deconnexion.php'>Deconnexion</a></li>";
                    echo "<li class='border'><a href='./profil.php'>Profil</a></li>";
                }
                else{
                    echo "<li class='border'><a href='./connexion.php'>Connexion</a></li>";
                    echo $_SESSION["logged"];
                }
                ?>
            </ul>
        </nav>
    </header>
    <hr>
    <div class="menu">
        <ul>
            <li class="border" style="font-weight: bold;"> <a>NEWS</a></li>
            <li class="border" style="font-weight: bold;"> <a>MARQUE</a></li>
            <li class="border" style="font-weight: bold;"> <a>VETEMENTS</a></li>
            <li class="border" style="font-weight: bold;"> <a>ACCESSOIRES</a></li>
        </ul>
    </div>

    <p style="text-align: center; font-size: 7rem; margin-bottom: 5px;">HOMME</p>


    <div class="slider">
        <div class="slider-viewport">
            <div id="img1">
                <div id="img2" <div id="img3">
                    <div id="img4">
                        <div id="img5">
                            <div class="slider-content">
                                <img src="https://cutt.ly/z8Dp2p9">
                                <img src="https://vu.fr/VvuM">
                                <img src="https://vu.fr/AKTd">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-nav">
        <a href="#img1"></a>
        <a href="#img2"></a>
        <a href="#img3"></a>
    </div>
    </div>

    <script>



    </script>

</body>

</html>