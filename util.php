<?php
function connectionbase()
{
  $servername = "sql.free.fr";
  $username= "chrivier";
  $password = "2TAureau";


  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}
function ecritEntete()
{
echo'<?xml version="1.0" encoding="iso-8859-1"?>'."\n";
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'."\n";
echo'    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n";
echo'<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">'."\n"."\n";
echo'   <head>'."\n";
echo ' <meta charset="utf-8" />'."\n";
echo ' <link rel="stylesheet" href="km.css"/>'."\n";
echo ' <title>Saisie des km</title>'."\n";
echo'   </head>'."\n";
echo'   <body>'."\n";
}
function ecritHeaderMenu() {
echo '
<header>
    <h1>Marau</h1>
    <h2>Kilometre...</h2>
</header>
<nav>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Saisie</a>
          <ul>
            <li><a href="insert_sortie.php">Sortie</a></li>
            <li><a href="insert_velo.php">Vélo</a></li>
          </ul>
        </li>
        <li><a href="#">Affichage</a>
        <ul>
          <li><a href="aff_sortie.php">Sortie</a></li>
          <li><a href="aff_velo.php">Vélo</a></li>
          <li><a href="aff_stat.php">Statistic</a></li>
        </ul>
        </li>
    </ul>
</nav>
';

}

function ecritFin()
{
echo '</body></html>';
}
?>
