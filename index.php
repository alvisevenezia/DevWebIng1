<?php

require "./php/sessionutils.php";

if(!isset($_GET["sexe"])){
    header('Location: ./index.php?sexe=femme');
}else{
$sexe=$_GET['sexe'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>VEPRI</title>
</head>
<body>
    <header> 
        <?php include_once('navbar.php');?>
    </header>
    <hr>
    <?php include_once('menuBar.php');?>
    <?php echo(" <p style='text-transform: uppercase; text-align: center; font-size: 7rem; margin-bottom: 5px;'>$sexe</p> ");?>


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

    <div class="produit">

           <?php 
           $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");
            $result = $mysqli->query("SELECT * FROM produit");

            while($row = $result->fetch_assoc()){
                echo("<div class='wrapper'>");
                echo("<a href='page_produit.php?filtre=idproduit&value=".$row["idproduit"]."'>");
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



