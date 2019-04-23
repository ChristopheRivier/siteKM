
<?php
include ("util.php");

// get the information and affiche...
// confirm or not
ecritEntete();
ecritHeaderMenu();
$conn = connectionbase();
?>


<?php
function printtd($dat){
  echo "<td>\n";
  echo $dat;
  echo "</td>\n";
}
function addvalue($val){
  return "'".$val."'";
}
function loadcsv($file){
  echo "
  <h1>$file</h1>
  <table>
    <tr>
      <th>Date</th>
      <th>Distance</th>
      <th>description</th>
      <th>velo</th>
      <th>temps</th>
      <th> issue</th>
    </tr>
";
global $conn;
$row = 1;
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);

        if( $row<>1){
        echo "<tr>\n";
        // date
        printtd( $data[0]);
        printtd( $data[1]);
        $description=str_replace("'","''",$data[9]);
        printtd( $description);
        // velo => get the id.
        $sql = "select id from velo where name='".$data[7]."'";
        $conn->real_query($sql);
        $res = $conn->use_result();
        //on ne recupere que le premier element c'est un select unique
        $row = $res->fetch_assoc();

        printtd( $data[7].$row['id']);
        $id=$row['id'];
        $res->close();
        printtd( $data[3]);
        echo "</tr>\n";
        $sql="insert into v_sortie(description,date_sortie,v_id,distance,tps_parcours) values (" ;
        $sql.= addvalue($description).",STR_TO_DATE('".$data[0]."','%d-%m-%y'),".addvalue($id).",".addvalue($data[1]).",".addvalue($data[3]).")";
        if ($conn->query($sql) === TRUE) {
            printtd("New record created successfully");
        } else {
            printtd( "Error: " . $sql . "<br>" . $conn->error );
        }
      }
        $row++;
    }

    fclose($handle);
    echo "</table>";
}
}

loadcsv("2012.csv");
loadcsv("2013.csv");
loadcsv("2014.csv");
loadcsv("2015.csv");
loadcsv("2016.csv");
loadcsv("2017.csv");
?>

<?php
    $conn->close();
ecritFin();
?>
