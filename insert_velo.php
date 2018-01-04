
<?php

include ("util.php");

ecritEntete();
ecritHeaderMenu();
?>
<!-- Ecriture du formulaire dans une section-->
<section>

  <form action="add_velo.php" method="post">
    <p>
      <label> Velo:</label>
      <input type="text" placeholder="Name..." name="nomvelo" size="20"/>
    </p>
    <p>
      <label>Date Acquisition</label>
      <input type="date" name="datein" placeholder="dd/mm/yyyy"/>
    </p><p>
      <label>Date D'arret d'utilisation</label>
      <input type="date" name="dateout" placeholder="dd/mm/yyyy"/>
    </p><p>
      <label>Description Velo</label>
      <input type="text" name="description" placeholder="Description..." size="200"/>
    </p>
    <p>
    <input type="submit" value="Add velo">
  </p>
  </form>
</section>

<?php
ecritFin();
?>
