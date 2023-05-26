<?php
// Assuming you have received the login form data via POST method
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

    // Prepare the SELECT statement
    $stmt = $mysqli->prepare("SELECT * FROM user details WHERE username = ?");

    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        // Fetch the result
        $result = $stmt->get_result();

        // Check if a row is returned
        if ($result->num_rows === 1) {
            // Fetch the row as an associative array
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row['password'])) {
                echo "Login successful!";
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>
