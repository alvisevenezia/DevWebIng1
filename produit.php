<?php require "./php/sessionutils.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>VEPRI</title>
</head>
<body>
    <header> 
        <?php include_once('navbar.php');?>
    </header>
    <div style="border: 2px solid black">

<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM produit';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
    ?>
    <div><?php  $recipe['nom'] ?></div>
    <div><?php  $recipe['prix'] ?></div>
    <div><?php  $recipe['poid'] ?></div>
    <div><?php  $recipe['marque'] ?></div>
    <div><?php  $recipe['type'] ?></div>
    <div><?php  $recipe['taille'] ?></div>
    <div><?php  $recipe['stock'] ?></div>
    <?php
}
?>


</div>
</body>
</html>