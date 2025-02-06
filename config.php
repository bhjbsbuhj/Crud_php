<?php
$servername = "localhost";
$username = "root";  
$password = "Ampfer221.";      
$dbname = "crud_php";

$conn = $connection = new mysqli('127.0.0.1', 'root', '', 'crud_php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
