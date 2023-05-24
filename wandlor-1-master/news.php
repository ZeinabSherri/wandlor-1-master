<?php
// Retrieve form data
$email = $_POST['email'];

// Create a connection to the database
$servername = "localhost";
$username = "root"; // Assuming you are using the default XAMPP username
$password = ''; // Assuming you are using the default XAMPP password
$dbname = "wandlor";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO news (email) VALUES (?)");
$stmt->bind_param("s", $email);
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    echo "Form data inserted successfully.";
} else {
    echo "Error inserting form data.";
}

// Close the statement and connection
$stmt->close();
$conn->close();


?>