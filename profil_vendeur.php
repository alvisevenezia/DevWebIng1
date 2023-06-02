<?php require "./php/sessionutils.php"; ?>

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
        <<?php include_once('navbar.php');?>
    </header>
    <hr>

    <div class="compte">
        <h1 class="titre_compte">PROFIL</h1>
        <div class="information-perso">
            <h2 style="padding:20px 0px;">NOM PRENOM</h2>
            <hr>
            <div class="produits">
                <hr>
                <h3 style="padding:20px 0px">MES PRODUITS</h3>
                <div class="produits-container">
                    <div class="produit">
                        <img  class="produit-image" src="https://tinyurl.com/32htxj6p" alt="Produit 1">
                        <h4>Nom du produit 1</h4>
                        <p>Prix de vente : 10€</p>
                    </div>
                    <div class="produit">
                        <img  class="produit-image"src="https://tinyurl.com/32htxj6p" alt="Produit 2">
                        <h4>Nom du produit 2</h4>
                        <p>Prix de vente : 15€</p>
                    </div>
                    <div class="produit">
                        <img  class="produit-image" src="https://tinyurl.com/32htxj6p" alt="Produit 3">
                        <h4>Nom du produit 3</h4>
                        <p>Prix de vente : 20€</p>
                    </div>
                </div>
                <h4 style="padding:20px 0px">Profit total: 45€</h4>
            </div>
           
            <button class="valider2" type="button" onclick="toggleHistorique()">HISTORIQUE DE MES VENTES</button>
            <div class="historique-produits">

        </div>

        <script>
            function toggleHistorique() {
                var historique = document.querySelector('.historique-produits');
                historique.classList.toggle('visible');
            }
        </script>

        <div class="historique-produits">
                <hr>
                <h3 style="padding:20px 0px">HISTORIQUE DES PRODUITS VENDUS</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom du produit</th>
                            <th>Prix de vente</th>
                            <th>Solde</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Produit 1</td>
                            <td>10€</td>
                            <td>+10€</td>
                        </tr>
                        <tr>
                            <td>Produit 2</td>
                            <td>15€</td>
                            <td>+15€</td>
                        </tr>
                        <tr>
                            <td>Produit 3</td>
                            <td>20€</td>
                            <td>+20€</td>
                        </tr>
                    </tbody>
                </table>
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
        
       
    </div>

    <script>
        function toggleContent(content) {
            var contentElement = document.querySelector('.product-' + content + '-content');
            contentElement.classList.toggle('show');
        }
    </script>
</body>
</html>
