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
        <label for="nom">Nom du produit:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="type">Type de vêtement:</label>
        <select id="type" name="type" required>
            <option value="bague">Bague</option>
            <option value="chapeau">Chapeau</option>
            <option value="chaussette">Chaussette</option>
            <option value="pantalon">Pantalon</option>
            <option value="tshirt">T-Shirt</option>
            <option value="jeans">Jeans</option>
            <option value="hoddie">Hoodie</option>
        </select><br><br>

        <label for="marque">Marque:</label>
        <select id="marque" name="marque" required>
            <option value="nike">Nike</option>
            <option value="carhartt">Carhartt</option>
            <option value="addidas">Addidas</option>
        </select><br><br>

        <label for="taille">Taille:</label>
        <input type="text" id="taille" name="taille"><br><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" min="1" required><br><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" min="0" step="0.01" required><br><br>

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


