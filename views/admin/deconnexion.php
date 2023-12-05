<?php
session_start();
//unset($_SESSION["connecter"]);
session_destroy();
//header("Location: index.php");
//$a =SCRIPTS.
header("Location: connexion");


?>