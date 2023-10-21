<?php
// Database connection parameters
$hostname = "localhost"; // Your MySQL server hostname
$username = "root"; // Your MySQL username
$password = "akshay45"; // Your MySQL password
$database = "ak45"; // Your database name

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login Action
if (isset($_POST['login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // Perform SQL query to retrieve the hashed password for the provided username
    $sql = "SELECT password FROM users WHERE username = '$login_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_hashed_password = $row['password'];

        // Check if the user input password matches the stored hash
        if (password_verify($login_password, $stored_hashed_password)) {
            // Redirect to Spotify website upon successful login
            header("Location: https://zcoer.in/");
            exit; // Ensure that the script stops here and doesn't continue processing
        } else {
            echo "Login failed. Invalid username or password.";
        }
    } else {
        echo "Login failed. Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>
