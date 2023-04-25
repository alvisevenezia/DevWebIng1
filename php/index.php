<?php

if(!in_array("logged",$_COOKIE)){
    setcookie("logged", "true", time() + 3600);
}

if(!in_array("sexe",$_COOKIE)){
    setcookie("sexe", "Homme", time() + 3600);
}

if($_COOKIE["sexe"] == "Homme"){
   header('Location: ../html/Homme.php');
}
else{
    header('Location: ../html/Femme.php');
}