<?php

require "sessionutils.php";

$_SESSION["logged"] = "false";

header('Location: ../index.php');

?>