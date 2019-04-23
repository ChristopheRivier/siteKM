<?php
session_start();
include ("util.php");

// get information from form
$login = $_POST['login'];
//$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$pass = $_POST['pass'];

$conn = connectionbase();

$sql = "select id,pass from membre_ where login ='$login'";

$result=$conn->query($sql);


$res = false;
if ($result->num_rows == 1) {
 // output data of each row
	$row = $result->fetch_assoc();
	$isPasswordCorrect = password_verify($pass,$row['pass']);
	if( $isPasswordCorrect )
	{
		$_SESSION["id"] = $row['id'];
		$_SESSION["pass"] = $row['pass'];
	}else
	{
		echo 'login failed';
	}
}
else{
	echo 'login failed';
}

$result->close();
$conn->close();
ecritEntete();
ecritHeaderMenu();
ecritFin();
?>
