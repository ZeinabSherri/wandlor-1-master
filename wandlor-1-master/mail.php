<?php
if(isset($_POST['email'])){
        $mailTo = "zeinabsherri70@gmail.com";
        $subject = "mail from wandlor";
        $body = "New message from client
<br><br>
FROM: ".$_POST['email']."<br>
NAME: ".$_POST['name']."<br>
COMMENTS: ".$_POST['message']."<br>";   
        $headers = "To: Solido <".$mailTo.">\r\n";
        $headers .= "From: ".$_POST['author']." <".$_POST['email'].">\r\n";
        $headers .= "Content-Type: text/html";
        //envio destinatario
        $mail_success =  mail($mailTo, utf8_decode($subject), utf8_decode($body), $headers);        
}
?>  