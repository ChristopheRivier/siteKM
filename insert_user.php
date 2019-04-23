<?php
session_start();
include ("util.php");

ecritEntete("$(document).ready(function(){

    var ".'$pseudo'." = $('#login'),
        ".'$mdp'." = $('#pass'),
        ".'$confirmation'." = $('#confirmation'),
        ".'$mail'." = $('#mail'),
        ".'$envoi'." = $('#submit');

		".'$confirmation'.".keyup(function(){
	        if($(this).val() != ".'$mdp'.".val()){ // si la confirmation est différente du mot de passe
	            $(this).css({ // on rend le champ rouge
	     	        borderColor : 'red',
	        	color : 'red'
	            });
	        }
	        else{
		    $(this).css({ // si tout est bon, on le rend vert
		        borderColor : 'green',
		        color : 'green'
		    });
	        }
	    });

		".'$envoi'.".click(function(e){

			if( ".'$mdp'.".val() != ".'$confirmation'.".val() || !verifier(".'$pseudo'.") || !verifier(".'$mail'.") || !verifier(".'$pass'.") ){
				e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
				alert('argument not valid');
			}
		});

		function verifier(champ){
			 if(champ.val() == ''){ // si le champ est vie.preventDefault(); // on annule la fonction par défaut du bouton d'envoide
				 ".'$erreur'.".css('display', 'block'); // on affiche le message d'erreur
				 champ.css({ // on rend le champ rouge
					 borderColor : 'red',
					 color : 'red'
				 });
				 return false;
			 }else{
				$(this).css({ // si tout est bon, on le rend vert
				    borderColor : 'green',
				    color : 'green'
				});
				return true;
			}
 		}
});
");
ecritHeaderMenu();

// create formulaire
if( checkConnection() ){
  echo "<section> Your are connected with ".$_SESSION["id"]."</section>";
}else{

?>
<section>
  <div id="txtHint" ></div>
  <form id="connexion" action="add_user.php" method="POST">
    <p>
      <label>Login</label>
      <input type="text" id="login" placeholder="Login..." name="login" size="100"/>
    </p>
    <p>
      <label>Mot de Pass</label>
      <input type="password" id="pass" name="pass"/>
    </p>
    <p>
      <label>Retapez votre mot de Pass</label>
      <input type="password" id="confirmation" name="confirmation"/>
    </p>
    <p>
      <label>Mail</label>
      <input type="text" id="mail" placeholder="login@mail.com" name="mail"/>
    </p>
    <p>
      <input type="submit" id="submit" />
    </p>
  </form>
</section>

<?php
}

ecritFin();
?>
