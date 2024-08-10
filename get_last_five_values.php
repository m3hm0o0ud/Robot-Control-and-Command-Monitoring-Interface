<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'robot_control');

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Fetch the last 5 commands
$sql = "SELECT command FROM robot_commands ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(['status' => 'error', 'message' => 'Query failed: ' . $conn->error]);
} else {
    $commands = [];
    while ($row = $result->fetch_assoc()) {
        $commands[] = $row['command'];
    }
    // Ensure we have exactly 5 values, fill in with null if not enough
    while (count($commands) < 5) {
        array_push($commands, null);
    }
    echo json_encode(['status' => 'success', 'values' => $commands]);
}

// Close the connection
$conn->close();
?>
