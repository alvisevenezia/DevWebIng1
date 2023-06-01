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
    <hr>

    <div class="compte">
        <h1 class="titre_compte">COMPTE</h1> 
    <p style="padding: 20px 0px;">Vente d'un produit</p>

    <form action="ajoutprod.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="left-container">
                <h4>Nom du produit</h4>
                <input id="nom" class="prenom" type="text" placeholder="Nom du produit..." name="nom" required>
            </div>
        </div>

        <div class="container">
            <div class="left-container">
                <h4>Type de produit:</h4>
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
                        <h4>Taille :</h4>
        <input type="text" id="taille"  class="prenom" name="taille">
        </div>
                </div>

        <div class="container">
                    <div class="left-container">
                        <h4>Quantité : </h4>
        <input type="number" id="quantite" class="prenom" name="quantite" placeholder="Quantité..." min="1" required>
        </div>
                </div>

        <div class="container">
                    <div class="left-container">
                        <h4>Prix :</h4>
        <input type="number" id="prix" class="prenom" name="prix" min="0" placeholder="Prix..." step="1" required>
        </div>
                </div>

        <div class="container">
                    <div class="left-container">
                        <h4>Images du produit</h4>
        <input type="file" id="photo" accept="image/*" multiple onchange="previewImages(event)" name="photo" required>
        </div>
                </div>

        <div class="container">
                    <div class="left-container">
                        <h4>Description :<h4>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        </div>
                </div>

        <input type="submit" name="formsend" id="formsend" value="Ajouter le produit">
    </form>
</div>

<script>
        function previewImages(event) {
        var files = event.target.files;
        var previewContainer = document.getElementById('imagePreviewContainer');

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            image.classList.add('produit-image'); // Appliquer la classe CSS

            // Bouton pour supprimer l'image
            var deleteButton = document.createElement('button');
            deleteButton.innerHTML = 'Supprimer';
            deleteButton.classList.add('delete-button');
            deleteButton.addEventListener('click', deleteImage);

            // Créer un conteneur pour l'image et le bouton
            var imageContainer = document.createElement('div');
            imageContainer.classList.add('produit');

            // Ajouter l'image et le bouton au conteneur
            imageContainer.appendChild(image);
            imageContainer.appendChild(deleteButton);

            // Ajouter le conteneur au conteneur de prévisualisation
            previewContainer.appendChild(imageContainer);
        }
        }

        function deleteImage(event) {
        var imageContainer = event.target.parentNode;
        imageContainer.parentNode.removeChild(imageContainer);
        }

    </script>



    <?php
    if (isset($_POST['formsend'])){
    include_once('./php/reccupprod.php');
    }
    ?>
</body>

</html>