<?php
session_start();
include ("util.php");

// get the information and affiche...
// confirm or not
ecritEntete();
ecritHeaderMenu();

/*Add velo*/
// connect to database
$conn = connectionbase();

//affichage de la liste des vélos dans une table
?>
<table>
  <tr>
    <th>Nom</th>
    <th>Description</th>
    <th>Date D'achat</th>
    <th>Date De vente</th>
  </tr>
<?php

// on itere sur la table

$conn->real_query("SELECT name,description, datein, dateout from velo ORDER BY datein ASC");
$res = $conn->use_result();

while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    $name=$row['name'];
    $description=$row['description'];
    $datein=$row['datein'];
    $dateout=$row['dateout'];
    echo "<td>$name</td>
          <td>$description</td>
          <td>$datein</td>
          <td>$dateout</td>";
    echo "</tr>";
}
echo "</table>";

$res->close();
$conn->close();



ecritFin();
?>
