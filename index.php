<?php


if($_COOKIE["sexe"] == "Homme"){
   header('Location: ./homme.php');
}
else{
    header('Location: ./femme.php');
}