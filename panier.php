<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link href="css/style.css" type="text/css" title="Mon design 1" rel="stylesheet">
  <link href="css/panier.css" type="text/css" title="Mon design 1" rel="stylesheet">
</head>
<body>
    <header>
    <?php include_once('navbar.php');?>
    </header>
    <hr>
    <section>
        <!--  titre panier -->
        <div>
            <h1 style="text-align:center;font-size: 65px;">
                MON PANIER
            </h1>
        </div>
        <!-- fiche complete carte + recapitulatif panier -->
        <div class="around_flex">
            <!-- carte panier -->

            <div id="injectJs">
                <div id="basketProduit">
                    <!--c'est ici que s'ecrit le panier  -->
                </div>
            </div>

            <!-- recapitulatif panier -->
            <div id="basket-recap">
                <h2>Récapitulatif</h2>
                <ul id="articleliste">
                    <!-- c'est ici que s'ecrit le recapitulatif -->
                </ul>
                <div style="border:2px solid black; margin:10px 0 10px 0"></div>
                <div class="between_flex">
                    <div>
                    Montant du panier
                    </div>
                    <div class="between_flex">      
                    <p id="prixHT">0</p>€
                    <!-- c'est ici que s'ecrit la variable prix Ht -->
                    </div>
                </div>
                <div>
                    <p><i>Livraison offerte</i></p>
                </div>
                </br>
                <div style="text-align:center">
                    <!-- si on est connecte -->
                    <?php if (isset($_SESSION['email']) && (isset($_SESSION['prenom']))) {

                    ?>
                    <a href="#" class="button_recap" style="background-color: #007aab">
                            VALIDER MA COMMANDE
                    </a>
                    <!-- le bouton continuer pour obtenir notre ticket et changer les stocks s'affichent -->
                    <?php } else { ?>
                    <a href="login.php" class="button_recap" style="background-color:rgb(255, 91, 91)"> CONNECTEZ-VOUS POUR COMMANDER</a>
                    <!-- sinon affiche un lien pour se connecter necessaire a la poursuite des achats -->
                    <?php } ?> </br><br>
                    <button class="button_back_recap" onclick="window.history.back()">CONTINUER MES ACHATS</button>
                </div>
                
            </div>
        </div>
    </section>

    <script type="text/javascript" src="js/panier.js"></script>

</body>
</html>