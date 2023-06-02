<?php
require "sessionutils.php";

$_SESSION["logged"] = "false";
?>

<script> localStorage.removeItem("basket")</script>

<?php

header("Location: ../index.php");
?>

