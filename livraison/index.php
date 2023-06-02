<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Livraison de Colis</title>
    <link rel="stylesheet" type="text/css" href="livraison.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>ColisPoste</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php">Contact</a></li>
                <li><a href="connexion.php">Connexion</a></li> <!-- Nouveau lien pour la page de connexion -->
            </ul>
        </nav>
    </header>

    <section id="banner">
        <h2>Livraison de Colis Rapide et Fiable</h2>
        <p>Confiez-nous vos colis et bénéficiez d'un service de livraison sécurisé.</p>
    
    </section>

    <section id="tracking">
        <h2>Suivi de Colis</h2>
        <form method="GET" action="">
            <label for="tracking-number">Numéro de Suivi :</label>
            <input type="text" id="tracking-number" name="tracking-number" required>
            <input type="submit" value="Suivre">
        </form>
    </section>

    <?php
    if (isset($_GET['tracking-number'])) {
        $trackingNumber = $_GET['tracking-number'];

        $query = "SELECT statut, date_de_livraison, livreur.nom, livreur.prenom FROM colis
                  INNER JOIN livreur ON colis.idLivreur = livreur.id
                  WHERE colis.id = '$trackingNumber'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $status = $row['statut'];
            $deliveryDate = $row['date_de_livraison'];
            $deliveryPerson = $row['prenom'] . ' ' . $row['nom'];

            echo "<section id=\"profile\">";
            echo "<h2>Info Colis</h2>";
            echo "<div class=\"profile-info\">";
            echo "<p>Le colis $trackingNumber est : $status</p>";
            echo "<p>Date de livraison prévue : $deliveryDate</p>";
            echo "<p>Livreur en charge du colis : $deliveryPerson</p>";
            echo "</div>";
            echo "</section>";
            
            echo "<script>";
            echo "document.getElementById('banner').classList.add('hidden');";
            echo "document.getElementById('tracking').classList.add('hidden');";
            echo "</script>";
        } else {
            echo "<section id=\"profile\">";
            echo "<h2>Info Colis</h2>";
            echo "<div class=\"profile-info\">";
            echo "Le colis $trackingNumber n'a pas été trouvé.";
            echo "</div>";
            echo "</section>";
        }
    }
    ?>

    <section id="contact">
        <h2>Contact</h2>
        <p>Remplissez le formulaire ci-dessous pour nous contacter :</p>
        <form>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Sara. Tous droits réservés.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
