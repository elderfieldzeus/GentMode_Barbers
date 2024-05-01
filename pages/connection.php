<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "getmode_db";
$conn = new mysqli($servername, $username, $password, $database, 3307);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}
echo "Connected successfully";
?>
