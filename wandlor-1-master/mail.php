<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = 'zeinabsherri70@gmail.com';
    $subject = 'New Contact Form Submission';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $message = $_POST['message'];

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $messageBody = "First Name: $first\nLast Name: $last\nEmail: $email\nLocation: $location\nMessage: $message";

    if (mail($to, $subject, $messageBody, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>







<!-- <?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'example@domain.com';//<== UPDATE THE EMAIL ADDRESS
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n $message".
    
$to = "example@domain.com";//<== UPDATE THE EMAIL ADDRESS
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: index.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
}
}

?>
 -->


<!-- ?php
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
? -->