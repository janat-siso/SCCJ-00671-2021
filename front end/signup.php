<?php
// Assuming you have received the signup form data via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a new MySQLi object
    $mysqli = new mysqli("localhost", "username", "password", "green apple");

    // Check connection
    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    // Prepare the INSERT statement
    $stmt = $mysqli->prepare("INSERT INTO user details (username, password) VALUES (?, ?)");

    // Bind the parameters and execute the statement
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>
