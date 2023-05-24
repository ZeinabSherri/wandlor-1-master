<?php
// Retrieve form data
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$location = $_POST['location'];
$message = $_POST['message'];

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
$stmt = $conn->prepare("INSERT INTO mail (first, last, email, location, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $first, $last, $email, $location, $message);
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

if (isset($_POST['email'])) {
    // Email configuration
    $mailTo = "zeinabsherri70@gmail.com";
    $subject = "Mail from wandlor";
    $body = "New message from client<br><br>
            FROM: " . $_POST['email'] . "<br>
            NAME: " . $_POST['first'] . " " . $_POST['last'] . "<br>
            LOCATION: " . $_POST['location'] . "<br>
            MESSAGE: " . $_POST['message'] . "<br>";

    // Set the headers
    $headers = "From: " . $_POST['email'] . "\r\n";
    $headers .= "Reply-To: " . $_POST['email'] . "\r\n";
    $headers .= "Content-Type: text/html\r\n";

    // Send the email
    $mail_success = mail($mailTo, $subject, $body, $headers);

    if ($mail_success) {
        echo "Email sent successfully.";
    } else {
        echo "Error sending email.";
    }
}
?>