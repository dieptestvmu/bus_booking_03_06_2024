<?php
// includes/db.php

$servername = "localhost";
$username = "root";
$password = "";
// $dbname = "doan_xuan";
// $dbname = "abook3105";
// $dbname = "update_db";
$dbname = "doan_xuan_10";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
