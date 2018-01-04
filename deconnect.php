<?php
session_start();
include ("util.php");

ecritEntete();
ecritHeaderMenu();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
// Suppression des cookies de connexion automatique
setcookie('id', '');
setcookie('pass', ''); 
  

ecritFin();
?>
