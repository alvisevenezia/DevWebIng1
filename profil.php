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
      <?php include_once('navbar.php');?>
    </header>
        <hr>
    
        <div class="compte">
            <h1 class="titre_compte">PROFIL</h1>
            <div class="information-perso">
                <h2 style="padding:20px 0px;">NOM PRENOM</h2>
              <hr>
                <h3 style="padding:20px 0px 20px 0px;">SUIVI DE COMMANDES</h3>
                <button class="valider2" type="submit" >VOIR MES COMMANDES</button>
            </div>
            <div class="identité">
              <hr>
              <h3 style="padding:20px 0px ">INFORMATIONS PERSONNELLES </h3>
              
              <div class="container">
                <div class="left-container">
                  <h4>Prénom</h4>
                  <input class="prenom" type="text" placeholder="Prénom..." name="prenom" required>
                </div>
                <div class="right-container">
                  <h4>Nom</h4>
                  <input class="nom" type="text" placeholder="Nom..." name="nom" required>
                </div>
              </div>
              <div class="container">
                <div class="left-container">
                  <h5>Email</h5>
                  <input class="email" type="text" placeholder="E-mail..." name="email" required>
                </div>
                <div class="right-container">
                  <h5>Date de naissance</h5>
                  <input class="email" id="date" type="date" value="Date de Naissance..." name="date" required>
                </div>
              </div>
              <button class="valider2" type="submit" >MODIFIER MES INFORMATIONS</button>
            
        </div>
        

    </div>
    



</body>
</html>

