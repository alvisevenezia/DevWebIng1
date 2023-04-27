<?php

require "./php/sessionutils.php";

if($_SESSION["sexe"] == "homme"){
   header('Location: ./homme.php');
}
else{
    header('Location: ./femme.php');
}   