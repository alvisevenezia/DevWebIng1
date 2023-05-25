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
    <title>Femme</title>
</head>
<body>
    <header> 
        <nav class="navbar">
                <ul>
                    <div></div>
                    <li style="border: 1px solid;"><a href="femme.php">FEMME</a></li>
                    <li class="border" ><a href="homme.php">HOMME</a></li>
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
                    }
                    ?>
                </ul>
        </nav>
    </header>
    <hr>
    <div class="menu">
        <ul>
            <li class="border" style="font-weight: bold;"> <a href="#">NEWS</a></li>
            <li class="border" style="font-weight: bold;"> <a>MARQUE</a>  
                <div class="submenu2"><ul class="submenu">
                    <li><a href="#">Nike</a></li>
                    <li><a href="#">Carhartt</a></li>
                    <li><a href="#">Adidas</a></li>
                </ul>   
            </li>

            <li class="border" style="font-weight: bold;"> <a>VETEMENTS</a>
                <ul class="submenu" >
                    <li><a href="#">Pantalon</a></li>
                    <li><a href="#">T-Shirt</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Hoddies</a></li>
                </ul>
            </li>
            <li class="border" style="font-weight: bold;"> <a>ACCESSOIRES</a>
                <ul class="submenu">
                    <li><a href="#">Ring</a></li>
                    <li><a href="#">Hat</a></li>
                    <li><a href="#">Socks</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <p style="text-align: center; font-size: 7rem; margin-bottom: 5px;">FEMME</p>


    <div class="slider">
        <div class="slider-viewport">
        <div id="img1">
            <div id="img2">
            <div id="img3">
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

    <p><i class="fa-regular fa-bag-shopping"></i></p>
    <div class="New_in">
        <h1>NEW IN \\\\VEPRI </h1>
        <img src="http://bitly.ws/CMtp">
    </div>

    <div class="wrapper">
        <img src="https://rb.gy/44w4e">
        <div class="overlay">
            <div class="content">
                <a> Voir plus </a>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <img src="https://rb.gy/l4y35">
        <div class="overlay">
            <div class="content">
                <a> Voir plus </a>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <img src="https://rb.gy/btcis">
        <div class="overlay">
            <div class="content">
                <a> Voir plus </a>
            </div>
        </div>
    </div>
    <div class="wrapper2">
        <img src="https://rb.gy/wphgk">
        <div class="overlay">
            <div class="content">
                <a> Voir plus </a>
            </div>
        </div>
    </div>
    <div class="wrapper2">
        <img src="https://rb.gy/m1ff1">
        <div class="overlay">
            <div class="content">
                <a> Voir plus </a>
            </div>
        </div>
    </div>




</body>
</html>


