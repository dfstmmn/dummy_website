<?php
// Start session
session_start();

// Connect to MySQL
$mysqli = new mysqli('localhost', 'root', '', 'login_demo');

// Check connection
if ($mysqli->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $mysqli->connect_error]));
}

// Get the submitted username and password from the form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare and bind
$stmt = $mysqli->prepare("SELECT id, name, password FROM users WHERE name = ?");
$stmt->bind_param("s", $username);

// Execute the statement
$stmt->execute();

// Store the result
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind result variables
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $name;

        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Login Failed: Incorrect password."]);
    }
} else {
    echo json_encode(["error" => "Login Failed: User not found"]);
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>