<?php
// db_connection.php

$servername = "localhost";  // MySQL server name
$username = "root";         // MySQL username
$password = "";             // MySQL password (empty by default)
$dbname = "your_database";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

