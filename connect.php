<?php
session_start();
include ("util.php");

ecritEntete();
ecritHeaderMenu();

// get information from form
$login = $_POST['login'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$conn = connectionbase();

$sql = "select id from membre_ where login ='$login' and pass='$pass'";

  $result=$conn->query($sql);
  $res = false;
  if ($result->num_rows == 1) {
      // output data of each row
      $row = $result->fetch_assoc();
    $_SESSION["pass"] = $pass;
    $_SESSION["id"] = $row['id'];
	$res=true;
}
  
$result->close();
$conn->close();

ecritFin();
?>
