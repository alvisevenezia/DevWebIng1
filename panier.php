<?php require "./php/sessionutils.php"; ?>
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
                    <?php if ($_SESSION['logged'] == "true") {?>

                        <h2>Souscrire à l'abonnement premium</h2>
                            <form action="./php/traitement_livraison.php" method="post" id="form">
                                <label for="abonnement">Abonnement Premium :</label>
                                <input type="checkbox" name="abonnement" id="abonnement">
                                <br>
                            <label>
                                <input type="radio" name="livraison" value="domicile" required>
                                Livraison à domicile
                            </label>
                            <label>
                                <input type="radio" name="livraison" value="point_relais">
                                Livraison en point relais
                            </label>
                            <br><br>
                            <input type="text" name="adresse" placeholder="Entrez votre adresse">
                            <!-- champ pour l'adresse de livraison à domicile -->
                            <input type="text" name="point_relais" placeholder="Entrez le point relais">
                            <!-- champ pour le point relais -->
                            <br><br>
                            </form>

                            <script>

                                function submitForm(){

                                    var panier = JSON.stringify(getBasket());

                                    console.log(panier);
                                    
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("POST", "./php/traitement_livraison.php", true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.send("abonnement=" + document.getElementById("abonnement").checked + "&livraison=" + document.querySelector('input[name="livraison"]:checked').value + "&adresse=" + document.querySelector('input[name="adresse"]').value + "&point_relais=" + document.querySelector('input[name="point_relais"]').value + "&basket=" + panier);
                                    
                                    xhr.onreadystatechange = function() {
                                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {

                                            //add the response to the page
                                            document.getElementById("injectJs").innerHTML = "Votre numéro de commande est le "+this.responseText;
                                            
                                            //clear basket and reload page
                                            localStorage.clear();

                                            console.log(this.responseText);
                                        }
                                    }

                                }

                            </script>
                            
                            <button id="valider" class="button_recap" style="background-color: #007aab" onClick="submitForm()">VALIDER MA COMMANDE</button    >
                        </form>

                    <!-- le bouton continuer pour obtenir notre ticket et changer les stocks s'affichent -->
                    <?php } else { ?>
                    <a href="connexion.php" class="button_recap" style="background-color:rgb(255, 91, 91)"> CONNECTEZ-VOUS POUR COMMANDER</a>
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