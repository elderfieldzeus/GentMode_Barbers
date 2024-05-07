<?php
session_start();

$_SESSION = [];

if(session_destroy()){
    header("location: ../../../../gentmode/index.html");
    exit();
} else {
    echo "Failed to log out. Please try again.";
}
?>
