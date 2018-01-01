<?php
    $username = "crr";
    $password = "salut";
    if( isset($_REQUEST['login']) ){
        if($_REQUEST['login'] == $username ){ // Si les infos correspondent...
            session_start();
            $_SESSION['user'] = $username;
            echo "Success";
        }
        else{ // Sinon
            echo "Failed";
        }
    }
?>
