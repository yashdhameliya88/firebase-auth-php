<?php
// MySQL connection settings
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_google_auth_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} else {
    // echo "<script>alert('Connection successful!');</script>";
}
?>