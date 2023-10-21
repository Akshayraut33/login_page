<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "akshay45";
$database = "ak45";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the HTML form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for security (you should use a more secure method)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the data into the MySQL database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the MySQL connection
$conn->close();
?>
