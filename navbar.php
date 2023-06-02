<nav class="navbar">
    <ul>
        <div class="flex navdiv space">
            <div class="flex navdiv">
                <li <?php if(isset($_GET['sexe']) && $_GET['sexe']=='femme'){
                        ?> style="border: 1px solid;" <?php } else{
                        ?> class="border" <?php }
                        ?>><a href="index.php?sexe=femme">FEMME</a></li>

                <li <?php if(isset($_GET['sexe']) && $_GET['sexe']=='homme'){
            echo"style='border: 1px solid;'"; } 
            else{
            echo"class='border'"; }
            ?>><a href="index.php?sexe=homme">HOMME</a></li>
            </div>
            <div class="flex navdiv">
                <li class="titre">VEPRI</li>
                <li class="logo">\V</li>
            </div>
            <div class="flex navdiv">
                <li> <a href="./livraison/index.php">COLIS<a></li>
                <li class="border"><a href="panier.php">Panier</a></li>
                <?php

        if(isset($_SESSION['logged']) && $_SESSION["logged"] == "true"){
            echo "<li class='border'><a href='./php/deconnexion.php'>Deconnexion</a></li>";

            if($_SESSION["client"] == "true"){
                echo "<li class='border'><a href='./profil.php'>Profil</a></li>";
            }else if($_SESSION["client"] == "false"){
                echo "<li class='border'><a href='./ajoutprod.php'>Ajout Produit</a></li>";
                echo "<li class='border'><a href='./profil_vendeur.php'>Profil</a></li>";
            }
            
            }
            else{
            echo "<li class='border'><a href='./connexion.php'>Connexion</a></li>";
            }
        ?>
            </div>
        </div>
    </ul>
</nav>