<?php
session_start();

$_SESSION = [];

if(session_destroy()){
    header("location: ../../../../GentMode_Barber/index.html");
    exit();
} else {
    echo "Failed to log out. Please try again.";
}
?>
