<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $userEmail = $_POST['email'];
    $location = $_POST['location'];
    $messageBody = $_POST['message'];

    // Instantiate PHPMailer
    $phpmailer = new PHPMailer(true);

    try {
        // SMTP settings
        $phpmailer->isSMTP();
        $phpmailer->Host = "smtp.gmail.com";
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'wandloragency@gmail.com'; // Replace with your Gmail email
        $phpmailer->Password = 'rarnrkdnjccfvgvq'; // Replace with your Gmail password or App Password
        $phpmailer->SMTPSecure = 'tls';
        
        // Set sender and recipient
        $phpmailer->setFrom($userEmail, $firstName . ' ' . $lastName);
        $phpmailer->addAddress('wandloragency@gmail.com'); // Replace with recipient's email
        
        // Email content
        $phpmailer->isHTML(true);
        $phpmailer->Subject = 'Contact Form Submission';
        $phpmailer->Body = "Name: $firstName $lastName<br>Email: $userEmail<br>Location: $location<br>Message: $messageBody";

        $phpmailer->send();
        echo "Message sent successfully";
    } catch (Exception $e) {
        echo "Message not sent: " . $phpmailer->ErrorInfo;
    }
}
?>






<!-- ?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $phpmailer = new PHPMailer(true);
        
        try {
            $phpmailer->isSMTP();
            $phpmailer->Host = "smtp.gmail.com";
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 587;
            $phpmailer->Username = 'zeinabsherri70@gmail.com'; // Use user's email as sender
            $phpmailer->Password = 'viepgsetdhjdowye'; // Replace with your Gmail password
            $phpmailer->SMTPSecure = 'tls';
            
            $phpmailer->setFrom('zeinabsherri70@gmail.com', 'Zeinab'); // Set sender's info
            $phpmailer->addAddress('zeinabsherri70@gmail.com'); // Replace with recipient's email
            
            $phpmailer->isHTML(true);
            $phpmailer->Subject = 'Test Subject';
            $phpmailer->Body = "Test Body";
            
            $phpmailer->send();
            echo "Message sent successfully";
        } catch (Exception $e) {
            echo "Message not sent: " . $phpmailer->ErrorInfo;
        }
    } else {
        echo "Invalid email address";
    }
}
? -->


<!-- ?php require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$phpmailer = new PHPMailer(true);
    try{
  $phpmailer->isSMTP();
  $phpmailer->CharSet = 'UTF-8';
$phpmailer->Host = "smtp.gmail.com";
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 587;
$phpmailer->Username = 'zeinabsherri70@gmail.com';
$phpmailer->Password ='viep gset dhjd owye';
  $phpmailer->SMTPSecure = 'tls';
  // clear addresses of all types
  $phpmailer->ClearAddresses();  // each AddAddress add to list
  $phpmailer->ClearCCs();
  $phpmailer->ClearBCCs();
  $phpmailer->setFrom('sender','sender name');
$phpmailer->addAddress('receiver');

  $phpmailer->isHTML(true);
  $phpmailer->Subject = 'test subject';
  $phpmailer->Body = "test body ";

$phpmailer->send();
} catch (Exception $e){
    echo "Message not sentt";
}

? -->










