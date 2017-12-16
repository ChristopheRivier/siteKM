
<?php

include ("util.php");

// get the information and affiche...
// confirm or not
ecritEntete();
ecritHeaderMenu();

/*Add velo*/
// connect to database
$conn = connectionbase();
$lstVelo=array();
//affichage de la liste des vélos dans une table
?>
<table>
  <tr>
    <th>Annee/Vélo</th>
<?php
//list des velos
$conn->real_query("SELECT name, id from velo ORDER BY id ASC");
$res = $conn->use_result();
//construction requete en fonction du nombre de velo
$query="";
$querySom="";
$somTotal="sum(";
$sousquery="";
$count=0;
while ($row = $res->fetch_assoc()) {
    $name=$row['name'];
    $id=$row['id'];
    array_push($lstVelo,$id);
    echo "<th>$name</th>\n";
    if( $count <> 0 ){
      $querySom.=",";
      $somTotal.="+";
      $sousquery.=",";
    }
    $count++;
    $querySom .= "sum(f.v$id) as v$id";
    $somTotal .= "f.v$id";
    $sousquery .= "case when v_id=$id then t.dist else 0 end as v$id";
}
$res->close();
?>
    <th>Total</th>
  </tr>
<?php

// on itere sur les années

$query = "select f.annee,".$querySom.",".$somTotal.") as total from ( select t.annee," .$sousquery." FROM (

SELECT year( date_sortie ) AS annee, sum( distance ) AS dist, v_id
FROM v_sortie
GROUP BY year( date_sortie ) , v_id
)t
)f
GROUP BY f.annee";

$conn->real_query($query);
$res = $conn->use_result();

while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    $annee=$row['annee'];
    echo "<td>$annee</td>\n";
    for($i=0;$i<count($lstVelo);++$i){
      $vv = "v".$lstVelo[$i];
      echo "<td>".$row[$vv]."</td>\n";
    }
    $total=$row['total'];
    echo "<td>$total</td>\n";
    echo "</tr>";
}
$res->close();

//on affiche la somme totale

$query = "select ".$querySom.",".$somTotal.") as total from ( select ".$sousquery." FROM (
SELECT sum( distance ) AS dist, v_id
FROM v_sortie
GROUP BY  v_id
)t
)f
";
$conn->real_query($query);
$res = $conn->use_result();

while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td>Total</td>\n";
    for($i=0;$i<count($lstVelo);++$i){
      $vv = "v".$lstVelo[$i];
      echo "<td>".$row[$vv]."</td>\n";
    }
    $total=$row['total'];
    echo "<td>$total</td>\n";
    echo "</tr>";
}
$res->close();
echo "</table>";

$conn->close();



ecritFin();
?>
