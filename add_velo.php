
<?php

include ("util.php");

// get the information and affiche...
// confirm or not

$isconfirm=$_GET['isconfirm'];
ecritEntete();
ecritHeaderMenu();
echo ' ecriture de mmm '.$isconfirm.'exnd';
if( !$isconfirm || $isconfirm<>'Y'){
  echo '<section>
      <p>
        Velo: ';
        echo  $_POST['nomvelo'];
        echo '
      </p>
      <p>
        <label>Date Acquisition</label> '. $_POST['datein'].'
      </p><p>
        <label>Date D arret d utilisation</label>'.$_POST['dateout'].'
      </p><p>
        <label>Description Velo</label>'.$_POST['description'].'
      </p>
<a href="add_velo.php?isconfirm=Y">Confirm</a>
  </section>';

}else {
  echo '<section>
      <p>
        Velo: '. $_POST['nomvelo'].'
      </p>
      <p>
        <label>Date Acquisition</label> '. $_POST['datein'].'
      </p><p>
        <label>Date D arret d utilisation</label>'.$_POST['dateout'].'
      </p><p>
        <label>Description Velo</label>'.$_POST['description'].'
      </p>

  </section>';


}

ecritFin();
?>
