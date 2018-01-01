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
echo '<!DOCTYPE html>';
echo '<html>'."\n"."\n";
echo '   <head>'."\n";
echo ' <meta charset="utf-8" />'."\n";
echo ' <link rel="stylesheet" href="km.css"/>'."\n";
echo ' <title>Saisie des km</title>'."\n";
echo '<script type="text/javascript">
function handleClick(){

  var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("resultat").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET", "gethint.php?q=c", true);
          xmlhttp.send();


}

</script>';
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
        <li>
          <a href="profile.php">Membre</a>
          <ul>
              <li><a href="connexion.php">Login</a></li>
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
