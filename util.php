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
function checkConnection()
{
  $conn = connectionbase();

  $sql = "SELECT id  FROM membre_ where id='".$_SESSION["id"]."' and pass='".$_SESSION["pass"]."'";
  $result = $conn->query($sql);
  $res = false;
  if ($result->num_rows == 1) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $res=true;
      }
  }
  $result->close();
  $conn->close();
  return $res;
}

function ecritEntete()
{
echo '<!DOCTYPE html>';
echo '<html>'."\n"."\n";
echo '   <head>'."\n";
echo ' <meta charset="utf-8" />'."\n";
echo ' <meta name="viewport" content="width=device-width, user-scalable=no"/>'."\n";
echo ' <link rel="stylesheet" media="(min-width: 768px)" href="km.css"/>'."\n";
echo ' <link rel="stylesheet" media="(max-width: 767px)" href="km2.css"/>'."\n";
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
          <ul>';
if( checkConnection() ){
	echo '
              <li><a href="deconnect.php">Deconnection</a></li>';
}else{
	echo '
            <li><a href="connexion.php">Login</a></li>
              <li><a href="insert_user.php">Create User</a></li>';
}
echo '
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
