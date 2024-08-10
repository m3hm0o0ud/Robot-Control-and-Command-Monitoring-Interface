<?php
header('Content-Type: application/json');

// Get the command from the request
$data = json_decode(file_get_contents('php://input'), true);
$command = $data['command'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'robot_control');

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Insert the command into the database
$sql = "INSERT INTO robot_commands (command) VALUES ('$command')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Command "' . $command . '" sent successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}

// Close the connection
$conn->close();
?>
