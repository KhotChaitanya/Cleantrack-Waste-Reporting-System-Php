<?php
$host = "localhost";
$user = "root";
$password = "root"; // change if your MySQL has a password
$db = "cleantrack_db";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
