<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "projectdb";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    die("Database connection failed.");
}
?>
