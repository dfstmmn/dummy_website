<?php
// Database connection
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "login_demo"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample data
$users = [
    ['name' => 'name', 'password' => 'password'],
    ['name' => 'foo', 'password' => 'bar'],
];

// Insert sample data
foreach ($users as $user) {
    $name = $conn->real_escape_string($user['name']);
    $realPassword = $user['password'];
    $hashedPassword = password_hash($realPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, password) VALUES ('$name', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully for user $name with password $realPassword\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
