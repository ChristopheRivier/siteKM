<?php
session_start();
include ("util.php");

ecritEntete();
ecritHeaderMenu();

// create formulaire
if( checkConnection() ){
  echo "<section> Your are already connected with ".$_SESSION["id"]."</section>";
}else{

?>

<section>
  <form id="connexion" action="connect.php" method="POST">
    <p>
      <label>Login</label>
      <input type="text" id="login" placeholder="Login..." name="login" size="100"/>
    </p>
    <p>
      <label>Mot de Pass</label>
      <input type="password" id="pass" name="pass"/>
    </p>
    <p>
      <input type="submit" id="submit" value="Login"/>
    </p>
  </form>
</section>

<?php
}

ecritFin();
?>
