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


// insert statment
$name=$_POST['nomvelo'];
$description=$_POST['description'];
$dist=$_POST['distance'];

//$datein = DateTime::createFromFormat('Y-m-d', $_POST['datein']);
$date = date_create_from_format('Y-m-d', $_POST['datein']);
echo "date : ".$date->format('Y-m-d') ." ou " . $_POST['datein'];
//$sql = "INSERT INTO v_sortie(description, date_sortie, v_id,distance,user_id) VALUES ('$description',".$datein->format('Y-m-d').",'$name',$dist,".$_SESSION["id"]." )";
$sql = "INSERT INTO v_sortie(description, date_sortie, v_id,distance,user_id) VALUES ('$description','".$date->format('Y-m-d')."','$name',$dist,".$_SESSION["id"]." )";;
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
ecritFin();
?>
