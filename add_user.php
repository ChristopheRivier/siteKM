<?php
session_start();
include ("util.php");

// get information from form
$login = $_POST['login'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$mail = $_POST['mail'];

$conn = connectionbase();

$sql = "INSERT INTO membre_(login,mail,pass,date_inscrit)
VALUES ('$login','$mail','$pass',CURRENT_DATE )";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $_SESSION["id"] = $last_id;
    $_SESSION["pass"] = $pass;
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
ecritEntete();
ecritHeaderMenu();

ecritFin();
?>
