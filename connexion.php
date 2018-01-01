<?php

include ("util.php");

ecritEntete();
ecritHeaderMenu();

// create formulaire
?>


<script>
function showHint(str) {
   if (str.length == 0) {
       document.getElementById("txtHint").innerHTML = "";
       return;
   } else {
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("txtHint").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET", "connect.php?login=" + str, true);
       xmlhttp.send();
   }
}
</script>


<section>
  <form id="connexion" action="JavaScript:showHint('crr')">
    <p>
      <label>Login</label>
      <input type="text" id="login" placeholder="Login..." name="login" size="100"/>
    </p>
    <p>
      <label>Mot de Pass</label>
      <input type="password" id="pass" value="pass1"/>
    </p>
    <p>
      <label>Retapez votre mot de Pass</label>
      <input type="password" value="pass2"/>
    </p>
    <p>
      <label>Mail</label>
      <input type="text" value="mail" placeholder="login@mail.com" />
    </p>
    <p>
      <input type="submit" id="submit" value="Create User"/>
    </p>
  </form>
</section>

<?php
ecritFin();
?>
