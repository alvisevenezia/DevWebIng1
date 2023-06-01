<?php

session_start();

if(!isset($_SESSION["logged"])){
    $_SESSION["logged"] = "false";
}

if(!isset($_SESSION["client"])){
    $_SESSION["client"] = "true";
}

?>