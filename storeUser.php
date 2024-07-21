<?php
require_once 'dbConn.php';

// Get the posted user data
$userData = json_decode(file_get_contents('php://input'), true);

// Insert user data into the database
$sql = "INSERT INTO users (email, display_name, phone_number, photo_url, firebase_user_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $userData['email'], $userData['displayName'], $userData['phoneNumber'], $userData['photoURL'], $userData['uid']);
if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

// Close connection
$conn->close();
?>