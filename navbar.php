<nav class="navbar">
    <ul>
        <div></div>
        <li <?php if(isset($_GET['sexe']) && $_GET['sexe']=='femme'){
                        ?> style="border: 1px solid;" <?php } else{
                        ?> class="border" <?php }
                        ?>><a href="index.php?sexe=femme">FEMME</a></li>

        <li <?php if(isset($_GET['sexe']) && $_GET['sexe']=='homme'){
            echo"style='border: 1px solid;'"; } 
            else{
            echo"class='border'"; }
            ?>><a href="index.php?sexe=homme">HOMME</a></li>

        <li class="titre">VEPRI</li>
        <li class="logo">\V</li>
        <li class="border"><a href="panier.php">Panier</a></li>
        <?php

        if(isset($_SESSION['logged']) && $_SESSION["logged"] == "true"){
            echo "<li class='border'><a href='./php/deconnexion.php'>Deconnexion</a></li>";
            echo "<li class='border'><a href='./profil.php'>Profil</a></li>";
            }
            else{
            echo "<li class='border'><a href='./connexion.php'>Connexion</a></li>";
            }
        ?>
    </ul>
</nav>