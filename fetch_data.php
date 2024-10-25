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

// Default SQL query to fetch last 5 entries
$sql = "SELECT flowRate, pressure, pH FROM reservoir_data ORDER BY timestamp DESC LIMIT 5";

// Execute query and fetch results
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row; // Store each row in an array
    }
}
echo json_encode($data); // Return JSON response

$conn->close();
?>