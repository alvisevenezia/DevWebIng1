<?php require('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        .product-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .product-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajout de cette propriété */
        }

        .product-price {
            position: relative;
            padding: 5px;
        }

        .price-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #8B4513; /* Couleur marron */
            opacity: 0.8;
            z-index: -1;
        }

        .price-text {
            position: relative;
            z-index: 1;
            color: white;
        }
    </style>
    <title>VEPRI</title>
</head>
<body>
    <header> 
        <?php include_once('navbar.php');?>
    </header>
    <hr>
    <?php include_once('menuBar.php');?>
    <?php echo(" <p style='text-transform: uppercase; text-align: center; font-size: 7rem; margin-bottom: 5px;'>RING</p> ");?>


    <div class="slider">
        <div class="slider-viewport">
        <div id="img1">
            <div id="img2">
            <div id="img3">
                <div id="img4">
                <div id="img5">
                    <div class="slider-content">
                        <img src="https://www.carhartt-wip.com/binaries/content/gallery/pagetypes/topics/ss23/cw21-wip-magazine-issue-8/home-slider-desktop-.jpg/home-slider-desktop-.jpg/carhartt%3Adesktopfull">
                        <img src="https://www.carhartt-wip.com/binaries/content/gallery/pagetypes/topics/ss23/cw22-day-at-the-beach/home/home-slider-desktop.jpg/home-slider-desktop.jpg/carhartt%3Adesktopfull">
                        <img src="https://media.cnn.com/api/v1/images/stellar/prod/211207113434-carhartt-winter-outerwear-lead.jpg?q=h_900,w_1600,x_0,y_0">
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
        <h1>NEW IN \\\\RING </h1>
        <img src="http://bitly.ws/CMtp">
    </div>

    <div class="product-grid">

        <?php

            $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
            $result = $mysqli->query("SELECT * FROM produit WHERE type = 'ring'");

            while($row = $result->fetch_assoc()){
                echo("<div class='product-item'>");
                echo("<a href=''>");
                echo("<img src='./assets/img/".$row["photo"]."'>");
                echo("</a>");
                echo("<div class='product-price'>");
                echo("<div class='price-background'></div>");
                echo("<div class='price-text'>Prix: ".$row["prix"]."€</div>");
                echo("</div>");
                echo("<div class='overlay'>");
                echo("<div class='content'>");
                echo("<a href='#'>Voir plus</a>");
                echo("</div>");
                echo("</div>");
                echo("</div>");
            }

        ?>
    </div>

</body>
</html>