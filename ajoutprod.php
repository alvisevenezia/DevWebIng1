<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>AjoutProd</title>
</head>

<body>
    <header>
        <?php include_once("navbar.php");?>
    </header>
    <h2>Ajouter un produit de vêtement</h2>
    <form action="ajoutprod.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="left-container">
                <h4>Nom du produit</h4>
                <input id="nom" class="prenom" type="text" placeholder="Nom du produit..." name="nom" required>
            </div>
        </div>

        <div class="container">
            <div class="left-container">
                <h4>Type de vêtement:</h4>
                <select id="type" name="type" required>
                    <option value="bague">Bague</option>
                    <option value="chapeau">Chapeau</option>
                    <option value="chaussette">Chaussette</option>
                    <option value="pantalon">Pantalon</option>
                    <option value="tshirt">T-Shirt</option>
                    <option value="jeans">Jeans</option>
                    <option value="hoddie">Hoodie</option>
                </select>
            </div>
        </div>


        <div class="container">
                    <div class="left-container">
                        <h4>Taille:</h4>
        <input type="text" id="taille"  name="taille"><br><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" min="1" required><br><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" min="0" placeholder="Prix..." step="1" required><br><br>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" name="formsend" id="formsend" value="Ajouter le produit">
    </form>

    <?php
    // Inclure la deuxième page PHP ici
    if (isset($_POST['formsend'])){
    include_once('./php/reccupprod.php');
    }
    ?>
</body>

</html>