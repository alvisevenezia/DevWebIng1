<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajouter un produit</title>
        
    </head>
    <body>
        <header>
            <?php include_once('navbar.php');?>
        </header>
    <hr>
 
    <div class="compte">
        <h1 class="titre_compte">VENTE</h1>     
        <form action="./php/inscriptionform.php" method="post" class="form-example">
            <p style="padding: 20px 0px;">Vente d'un produit</p>
                   
                <div class="container">
                    <div class="left-container">
                        <h4>Nom du produit</h4>
                        <input class="prenom" type="text" placeholder="Nom du produit..." name="Nom du produit" required>
                    </div>
                </div>

                <div class="container">
                    <div class="left-container">
                        <h4>Prix</h4>
                        <input class="prenom" type="number" placeholder="Prix..." name="prix" required>
                    </div>
                </div>

                <div class="container">
                    <div class="left-container">
                        <h4>Quantité</h4>
                        <input class="prenom" type="number" placeholder="Quantité..." name="quantite" required>
                    </div>
                </div>

                <div class="container">
                    <div class="left-container">
                        <h4>Description</h4>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                </div>

                <div class="container">
                    <div class="left-container">
                        <h4>Images du produit</h4>
                        <input type="file" id="imagesProduit" accept="image/*" multiple onchange="previewImages(event)" required>
                        <div id="imagePreviewContainer" class="produits-container"></div>
                    </div>
                </div>

                <button class="valider2" type="submit">Valider</button>
                   
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
    
    
</body>
</html>
