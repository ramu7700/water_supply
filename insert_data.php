<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "tanu"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO reservoir_data (flowRate, pressure, pH) VALUES (?, ?, ?)");
$stmt->bind_param("ddd", $data['flowRate'], $data['pressure'], $data['pH']);

// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>