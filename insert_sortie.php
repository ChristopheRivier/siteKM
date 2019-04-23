<?php
session_start();
include ("util.php");

ecritEntete();
ecritHeaderMenu();
?>
<!-- Ecriture du formulaire dans une section-->
<section>

  <form action="add_sortie.php" method="post">
    <p>
      <label> Velo:</label>
	  <select name="nomvelo" size="20">
<?
//list des velos
$conn = connectionbase();
$conn->real_query("SELECT name, id from velo ORDER BY id ASC");
$res = $conn->use_result();
while ($row = $res->fetch_assoc()) {
	$name=$row['name'];
	$id=$row['id'];
	echo '<option value="'.$id.'">'.$name.'</option>';
}
$res->close();
$conn->close();
?>
	  </select>
    </p><p>
      <label>Date Sortie</label>
      <input type="date" name="datein" />
  	</p><p>
		<label>Distance</label>
		<input type="number" name="distance" />
    </p><p>
      <label>Description Sortie</label>
      <input type="text" name="description" size="200"/>
    </p>
    <p>
    <input type="submit" value="Add Sortie">
  </p>
  </form>
</section>

<?php
ecritFin();
?>
