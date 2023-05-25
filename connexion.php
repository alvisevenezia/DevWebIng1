<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <header> 
        <nav class="navbar">
                <ul>
                    <div></div>
                    <li class="border" ><a href="femme.php">FEMME</a></li>
                    <li class="border" ><a href="homme.php">HOMME</a></li>
                    <li class="titre">VEPRI</li>
                    <li class="logo">\V</li> 
                    <li class="border"><a href="#">Panier</a></li>
                    <li class="border"><a  href="./connexion.php">Connexion</a></li>
                </ul>
        </nav>
        </header>
        <hr>
    
        <div class="compte">
            <h1 class="titre_compte">COMPTE</h1>
            <div class="connexion">Se connecter</div>
            <button class="inscription_button" onclick="window.location.href='inscription.php';">Inscription</button>
            <form action="./php/connexionsql.php" method="post">
            <input class="email" type="text" placeholder="E-mail..." name="login">
            <input class="email" type="password" placeholder="Mot de passe..." name="password">
            <button class="valider" type="submit"   >Valider</button>
        </form>
    </div>

    </div>
    



</body>
</html>


