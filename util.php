<?php
function connectionbase()
{
$sql_serveur = "sql.free.fr";
$sql_user= "chrivier";
$sql_passwd = "2TAureau";
$db_link = mysql_connect("$sql_serveur","$sql_user","$sql_passwd");
return $db_link;
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
    <dl>
        <li><a href="#">Accueil</a></li>
        <li><a href="insert.php">Saisie</a></li>
        <li><a href="insert_velo.php">Saisie</a></li>
    </dl>
</nav>
';

}

function ecritFin()
{
echo '</body></html>';
}
?>
