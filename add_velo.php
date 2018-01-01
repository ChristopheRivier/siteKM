
<?php

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
$datein = $_POST['datein'];
$dateout= $_POST['dateout'];

$sql = "INSERT INTO velo(name,description, datein, dateout)
VALUES ('$name','$description',STR_TO_DATE('$datein','%d/%m/%Y'),STR_TO_DATE('$dateout','%d/%m/%Y') )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$res->close();
$conn->close();



ecritFin();
?>
