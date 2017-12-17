
<?php

include ("util.php");

// get the information and affiche...
// confirm or not
ecritEntete();
ecritHeaderMenu();

/*Add velo*/
// connect to database
$conn = connectionbase();
$StatAnnuelle=$_GET['annee'];

tableauAnnuelle($StatAnnuelle);

function tableauAnnuelle($ann){
  $lstVelo=array();
  //affichage de la liste des vélos dans une table
  echo "
  <table>
    <tr>
      <th>";
  if( !isset($ann) ) echo " Année";
  else echo '<a href="aff_stat.php">'.$ann ."</a>";
  echo "/Vélo</th>";

  //list des velos
  global $conn;
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

  SELECT ";
  if(isset($ann)) $query .= " month";
  else $query .= " year";
  $query.= "( date_sortie ) AS annee, sum( distance ) AS dist, v_id
  FROM v_sortie ";
  if(isset($ann)) $query .=" where year(date_sortie)=$ann ";
  $query .= "
  GROUP BY ";
  if(isset($ann)) $query .= " month";
  else $query .= " year";
  $query .="( date_sortie ) , v_id
  )t
  )f
  GROUP BY f.annee";

  $conn->real_query($query);
  $res = $conn->use_result();

  while ($row = $res->fetch_assoc()) {
      echo "<tr>";
      $annee=$row['annee'];
      echo "<td>";
      if(!isset($ann)) echo '<a href="aff_stat.php?annee='.$annee.'">';
      if( isset($ann) ){
        //il faut convertir les mois en lisible
        switch( $annee ){
          case 1:
            echo "Janvier";
            break;
          case 2:
            echo "Février";
            break;
          case 3:
            echo "Mars";
            break;
          case 4:
            echo "Avril";
            break;
          case 5:
            echo "Mai";
            break;
          case 6:
            echo "Juin";
            break;
          case 7:
            echo "Juillet";
            break;
          case 8:
            echo "Aout";
            break;
          case 9:
            echo "Septembre";
            break;
          case 10:
            echo "Octobre";
            break;
          case 11:
            echo "Novembre";
            break;
          default:
            echo "Décembre";
            break;
          }
      }else
        echo $annee;
      if(!isset($ann)) echo '</a>';
      echo "</td>\n";
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
  FROM v_sortie ";
  if( isset($ann) ) $query .= " where year(date_sortie)=$ann ";
  $query.= "
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

}


ecritFin();
?>
