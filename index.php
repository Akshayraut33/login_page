<?php
echo "hello wolrd";
// Database connection parameters
$hostname = "localhost"; // MySQL server hostname
$username = "root"; // Your MySQL username
$password = "akshay45"; // Your MySQL password
$database = "db1"; // Your database name

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    die("connection done !");
}

// Now, you can execute SQL queries using this connection
// Example query:
$sql = "SELECT * FROM t1";
$result = $conn->query($sql);

// Handle the query result (fetch data, display, etc.)

// Close the database connection when done
$conn->close();
?>


