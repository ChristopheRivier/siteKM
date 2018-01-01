
<?php

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
    <th>Date Sortie</th>
    <th>Distance</th>
    <th>Vélo</th>
    <th>description</th>
  </tr>
<?php

// on itere sur la table
$conn->real_query("SELECT s.date_sortie,s.distance, v.name, s.description from v_sortie s inner join velo v on v.id=s.v_id ORDER BY date_sortie desc");

$res = $conn->use_result();

while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    $name=$row['date_sortie'];
    $description=$row['distance'];
    $datein=$row['name'];
    $dateout=$row['description'];
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
