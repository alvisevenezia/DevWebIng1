<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livraison";

// Établir une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des informations de connexion dans la base de données
    $query = "SELECT * FROM livreur WHERE email = '$email' AND mot_de_passe = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // L'utilisateur est connecté avec succès
        $user = $result->fetch_assoc();
        $prenom = $user['prenom'];
        $nom = $user['nom'];
        $permis = $user['permis'];
        $idLivreur = $user['id'];

        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['permis'] = $permis;
        $_SESSION['idLivreur'] = $idLivreur;
    } else {
        // Les informations de connexion sont incorrectes, afficher un message d'erreur
        $error_message = "Email ou mot de passe incorrect.";
    }
}

if (isset($_POST['logout'])) {
    // Déconnexion de l'utilisateur
    session_destroy();
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Livreur - ColisPoste</title>
    <link rel="stylesheet" type="text/css" href="livraison.css">
</head>
<body>
    <header>
        <h1>ColisPoste</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php">Contact</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <?php
    if (isset($_SESSION['prenom'])) {
        // Utilisateur connecté, afficher la page du profil du livreur
        ?>

        <section id="profile">
            <h2>Profil Livreur</h2>
            <div class="profile-info">
                <p><strong>Nom :</strong> <?php echo $_SESSION['nom']; ?></p>
                <p><strong>Prénom :</strong> <?php echo $_SESSION['prenom']; ?></p>
                <p><strong>Permis :</strong> <?php echo $_SESSION['permis']; ?></p>
            </div>

            <h3>Colis affectés :</h3>
            <?php
            $idLivreur = $_SESSION['idLivreur'];

            // Récupérer les colis affectés au livreur connecté
            $query = "SELECT * FROM colis WHERE idLivreur = $idLivreur";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo '<ul>';
                while ($colis = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<strong>ID :</strong> ' . $colis['id'] . '<br>';
                    echo '<strong>Adresse :</strong> ' . $colis['adresse'];
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucun colis affecté pour le moment.</p>';
            }
            ?>

            <form method="POST" action="">
                <input type="hidden" name="logout" value="true">
                <input type="submit" value="Se déconnecter" class="btn">
            </form>
        </section>

        <?php
    } else {
        // Utilisateur non connecté, afficher le formulaire de connexion
        ?>

        <section id="login">
            <h2>Connexion</h2>
            <?php
            if (isset($error_message)) {
                echo '<p class="error">' . $error_message . '</p>';
            }
            ?>
            <form method="POST" action="">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" style="width: 100%; height: 40px; border-radius: 5px; border: 1px solid #ccc;" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Se connecter">
            </form>
        </section>

    <?php
    }
    ?>

    <footer>
        <p>&copy; 2023 Sara. Tous droits réservés.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
